<script setup>
import {ref, onMounted, nextTick } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();
const cartId = ref(null);
const cartItemsDetails = ref([]);
const totalWithoutTax = ref(0);
const totalWithTax = ref(0);

const ActiveCart = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/carts/');
    const activeCarts = response.data.find(cart => cart.status === 'active');
    if (activeCarts) {
      cartId.value = activeCarts.id;
      console.log('Active cart found:', cartId.value);
    } else {
      console.log('No active cart found.');
    }
  } catch (error) {
    console.log('Error fetching active cart:', error);
  }
};

const getCartItemsId = async () => {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/cartitems/`);
    const cartItems = response.data.filter(cart_id => cart_id.cart_id == cartId.value);
    const cartItemsId = cartItems.map(item => ({item_id: item.item_id, quantity: item.quantity}));
    console.log(cartItemsId);
    return cartItemsId;
  } catch (error) {
    console.log(error);
  }
};

const cartDetails = async() =>{

  try {
    const cartItems =await getCartItemsId();
    let cartDetails = [];
    for (const cartItem of cartItems) {
      const response = await axios.get(`http://127.0.0.1:8000/api/items/${cartItem.item_id}`);
      const itemData =response.data;
      const total = parseFloat(itemData.price) * cartItem.quantity;
      cartDetails.push({
        id: itemData.id,
        name: itemData.name,
        quantity: cartItem.quantity,
        price: parseFloat(response.data.price),
        total: total
      });
    }
    cartItemsDetails.value = cartDetails;
    console.log(cartDetails);
    console.log(cartItemsDetails.value, 'cartItemsDetails');

    totalWithoutTax.value = cartDetails.reduce((total, item) => total + item.total, 0);

    totalWithTax.value = totalWithoutTax.value * 1.16;

    totalWithoutTax.value = parseFloat(totalWithoutTax.value.toFixed(2));
    totalWithTax.value = parseFloat((totalWithoutTax.value * 1.16).toFixed(2));

    return cartDetails;




  } catch (error) {
    console.log(error);
  }

};

const checkout = async () => {
  const checkoutData = {
    items: JSON.stringify(cartItemsDetails.value),
    subtotal: totalWithoutTax.value || 0,
    total: totalWithTax.value || 0,
  };
  console.log("CheckoutData:", checkoutData);
    await nextTick();
  router.push({
    name: 'checkout',
    query: {
      data: JSON.stringify(checkoutData)
    }
  });

};



onMounted(() => {
  ActiveCart();
  getCartItemsId();
  cartDetails();
});
</script>

<template>
  <div>
    <h2>Resumen del Carrito</h2>

    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Precio Unitario</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in cartItemsDetails" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.quantity }}</td>
          <td>${{ item.price.toFixed(2) }}</td>
          <td>${{ (item.price * item.quantity).toFixed(2) }}</td>
        </tr>
      </tbody>
    </table>

    <div class="totals">
      <h3>cost whitout taxes: ${{ totalWithoutTax.toFixed(2) }}</h3>
      <h3>taxes: ${{ (totalWithTax - totalWithoutTax).toFixed(2) }}</h3>
      <h3>cost with taxes: ${{ totalWithTax.toFixed(2) }}</h3>
    </div>

    <button
      @click="checkout"
      class="checkout-btn"
      :disabled="cartItemsDetails.length === 0">
      Proceed to Checkout
    </button>
  </div>
</template>

<style scoped>
.checkout-button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 20px;
  transition: background-color 0.3s;
}

.checkout-button:hover {
  background-color: #45a049;
}

.totals {
  margin: 20px 0;
  padding: 15px;
  background-color: #f9f9f9;
  border-radius: 5px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}
</style>
