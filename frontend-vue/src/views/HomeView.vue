<template>
  <div class="row">
    <div class="col-lg-8-offset-lg-2">
      <div class="table-responsive">
        <table class="table table-bordered-hover">
          <thead><tr><th>#</th><th>Name</th><th>Quantity</th><th>price</th><th>Add</th></tr></thead>
          <tbody>
            <tr v-for="item in items" :key="item.id">
              <td>{{ item.id }}</td>
              <td>{{ item.name }}</td>
              <td>{{ item.quantity }}</td>
              <td>{{ item.price }}</td>
              <td><button class="btn btn-primary">Add</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
  import axios from 'axios';
  export default {
    data(){
      return {
        items: null
      };
    },
    mounted() {
        this.getItems();
    },
    methods:{
      getItems(){
        axios.get('http://127.0.0.1:8000/api/items/').then(response => {
          this.items = response.data;
        }).catch(error => {
          console.log(error);
        });
      },
      /* Revisar como enviar el Id y cantidad de productos mediante post a items para is creando el carro */
      additems(){
        axios.post('http://127.0.0.1:8000/api/items/')
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });

        },
      }

    }


</script>
