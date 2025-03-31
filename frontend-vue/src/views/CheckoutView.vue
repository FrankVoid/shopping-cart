<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios';
const route = useRoute()
const checkoutData = ref(null)
const customerForm = ref({
  first_name: (null),
  last_name: (null),
  line_1: (null),
  line_2: (null),
  city: (null),
  state: (null),
  zip: (null)
})

const getAddress = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/addresses/');
    console.log(response.data);
  } catch (error) {
    console.log(error);
  }
};

const storeAddress = async () => {

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/addresses/',{
      line_1: customerForm.value.line_1,
      line_2: customerForm.value.line_2,
      city: customerForm.value.city,
      state: customerForm.value.state,
      zip: customerForm.value.zip
    });
    console.log(response.data);
  } catch (error) {
    console.log(error);
  }
};



const getCustomers = async () => {

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/customers/', {
      first_name: customerForm.value.first_name,
      last_name: customerForm.value.last_name
    });

    console.log('Customer created:', response.data);
  } catch (error) {
    console.log(error);
  }
};

const storeCustomer = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/customers/');
    console.log(response.data);
  } catch (error) {
    console.log(error);
  }
};

const shipping = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/shippings/');
    console.log(response.data);
  } catch (error) {
    console.log(error);
  }
};

const payment = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/payments/');
    console.log(response.data);
  } catch (error) {
    console.log(error);
  }
};

const processCustomer = async () => {
  await shipping();
  await storeCustomer();
  await storeAddress();
  await payment();
};

onMounted(() => {
  if (route.query.data) {
    console.log('CheckoutView mounted');
    console.log('data query:', route.query);
    try {
      checkoutData.value = JSON.parse(route.query.data)
    } catch (error) {
      console.error('Error al parsear los datos del checkout:', error)
    }
  }


  getAddress();
  getCustomers();
  payment();
  shipping();
});
</script>

<template>
  <div class="checkout-container">
    <!-- Display checkout data if available -->
    <div v-if="checkoutData" class="order-summary">
      <h2> </h2>
      <div class="items-list">
        <div v-show="false" v-for="item in checkoutData.items" :key="item.id" class="item">
          <span>{{ item.name }}</span>
          <span>Quantity: {{ item.quantity }}</span>
          <span>${{ item.total.toFixed(2) }}</span>
        </div>
      </div>
      <div class="totals">
        <p v-show="false" >Subtotal: ${{ checkoutData.subtotal.toFixed(2) }}</p>
        <p>Total: ${{ checkoutData.total.toFixed(2) }}</p>
      </div>
    </div>

    <div class="form-container">
      <h2>Customer Information</h2>
      <form @submit.prevent="processCustomer">
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input
            type="text"
            id="first_name"
            v-model="customerForm.first_name"
          >
        </div>

        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input
            type="text"
            id="last_name"
            v-model="customerForm.last_name"
          >
        </div>
        <h2>address Information</h2>
          <div class="form-group">
            <label for="line_1">line_1</label>
            <input
              type="text"
              id="line_1"
              v-model="customerForm.line_1"
            >
          </div>

          <div class="form-group">
            <label for="line_2">line_2</label>
            <input
              type="text"
              id="line_2"
              v-model="customerForm.line_2"
            >
          </div>

          <div class="form-group">
            <label for="city">city</label>
            <input
              type="text"
              id="city"
              v-model="customerForm.city"
            >
          </div>

          <div class="form-group">
            <label for="state">state</label>
            <input
              type="text"
              id="state"
              v-model="customerForm.state"
            >
          </div>

          <div class="form-group">
            <label for="zip">zip</label>
            <input
              type="text"
              id="zip"
              v-model="customerForm.state"
            >
          </div>

        <button type="submit" class="submit-btn">proced to payment</button>
      </form>
    </div>
  </div>
</template>

<style scoped>

</style>
