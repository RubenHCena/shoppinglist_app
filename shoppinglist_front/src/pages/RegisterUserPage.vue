<template>
    <q-page class="bg-primary window-height window-width row justify-center items-center">
      <div class="column">
        <div class="row">
          <h5 class="text-h5 text-white q-my-md">Company & Co</h5>
        </div>
        <div class="row">
          <q-card square bordered class="q-pa-lg shadow-1">
            <q-card-section>
              <q-form @submit.prevent="saveItem" class="q-gutter-md">
                <q-input  filled v-model="user.username" type="text" label="username" :rules="[ val => val && val.length > 1 || 'Please type something']" />
                <q-input  filled v-model="user.email" type="email" label="email" :rules="[ val => val && val.length > 1 || 'Please type something']" />
                <q-input  filled v-model="user.password" type="password" label="password" :rules="[ val => val && val.length > 1 || 'Please type something']" />
                <q-btn unelevated color="primary" size="lg" class="full-width" label="Register" type="submit" />
              </q-form>
            </q-card-section>
            <q-card-section class="text-center q-pa-none">
              <p class="text-grey-6">Already have an account?</p>
            </q-card-section>
          </q-card>
        </div>
      </div>
    </q-page>
  </template>
  
  <script setup>
  import { ref, onMounted,} from 'vue' // reactive
  import axios from 'axios';
  //import { useQuasar } from 'quasar'

  const user = ref({
    username: "",
    email: "",
    password: "",
  })

  const users = ref([])

  const saveItem = async () => {
  await axios.post("https://shoppinglist_db.test/api/users", user.value)
    user.value = {
      username: "",
      email: "",
      password: "",
    }
  }

  const fetchItems = async () => {
    const response = await axios.get("https://shoppinglist_db.test/api/users")
    users.value = response.data
  }
  onMounted(async () => {
    await fetchItems()
  })
  </script>
  
  <style>
  .q-card {
    width: 30rem;
  }
  </style>