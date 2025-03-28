<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const items = ref(null);
const cartId = ref(null);


const getItems = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/items/');
    items.value = response.data;
  } catch (error) {
    console.log(error);
  }
};

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

const createCart = async () => {
  const cartData = {
    customer_id: 1,
    address_id: 1,
    status: 'active',
    total_order_price: 0.00,
    shipping_cost: 0.00
  };

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/carts/', cartData);
    cartId.value = response.data.id;
    console.log('Cart created:', cartId.value);
  } catch (error) {
    console.log('Error creating cart:', error);
  }
};

const addItems = async (itemId) => {
  if (!cartId.value) {
    await createCart();
  }

  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/cartitems/?cart_id=${cartId.value}`);
    console.log('Cart items fetched:', response.data);

    const existingItem = response.data.find(
      item => item.cart_id == cartId.value && item.item_id == itemId
    );

    if (existingItem) {
      console.log('Item already in cart:', existingItem);
      const newQuantity = existingItem.quantity + 1;

      await axios.put(`http://127.0.0.1:8000/api/cartitems/${existingItem.id}`, {
        quantity: newQuantity
      });

      console.log(`Quantity updated for item ${itemId}: ${newQuantity}`);
    } else {
      const response = await axios.post("http://127.0.0.1:8000/api/cartitems/", {
        cart_id: cartId.value,
        item_id: itemId,
        quantity: 1,
        price_at_purchase: 0.00
      });

      console.log('Item added to cart:', response.data);
    }
  } catch (error) {
    console.log('Error adding item to cart:', error);
  }
};



onMounted(() => {
  getItems();
  ActiveCart();
});
</script>

<template>
  <div class="container">
    <div class="table-container">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
          <thead>
            <tr>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Add</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items" :key="item.id">
              <td>{{ item.name }}</td>
              <td>{{ item.quantity }}</td>
              <td>{{ item.price }}</td>
              <td>
                <button class="btn btn-primary" @click="addItems(item.id)">Add</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>





