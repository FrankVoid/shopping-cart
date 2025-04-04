import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import CartView from '../views/CartView.vue';
import CheckoutView from  '../views/CheckoutView.vue';
import PaymentView from '../views/PaymentView.vue';
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/cart',
      name: 'cart',
      component: CartView,
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: CheckoutView,
    },
    {
      path: '/payment',
      name: 'payment',
      component: PaymentView,
    },
  ],
})

export default router
