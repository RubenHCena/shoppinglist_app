<template>
  <q-page>
    <q-form
        @submit.prevent="saveItem"
        class="q-gutter-md"
      >
        <q-input
         filled
          v-model.trim="category.name"
          type="text"
          label="Name"
          lazy-rules
          :rules="[ val => val && val.length > 1 || 'Please type something']"
        />
        <q-input
         filled
          v-model="category.icon_name"
          type="text"
          label="Icon"
          lazy-rules
          :rules="[ val => val && val.length > 1 || 'Please type something']"
        />
        <div>
          <a href="https://fonts.google.com/icons?selected=Material+Symbols+Outlined:search:FILL@0;wght@400;GRAD@0;opsz@24&icon.size=24&icon.color=%23e8eaed">Icons</a>
        </div>

        <div>
          <q-btn label="Submit" type="submit" color="primary"/>
          <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
        </div>
      </q-form>

      <div class="q-pa-md list">
        <q-list bordered separator>
          <q-slide-item
          v-for="(item) in categories"  :key="item" 
          >
          <q-slide-item>
            <q-avatar :icon="item.icon_name" />
              {{ item.name }} 
            <template v-slot:left>
              <div class="row justify-between">
                <q-icon name="done" />
                  {{ item.name }}
                <q-icon class="more" name="close" @click="deleteItem(item.id) "/>
              </div>
            </template>
          </q-slide-item>
          </q-slide-item>
        </q-list>
      </div>

    </q-page>

</template>
<script setup>
  import { ref, onMounted } from 'vue'
  import axios from 'axios';

  const category = ref({
    name: "", 
    icon_name: "",
  })

  const categories = ref([])

  
  const saveItem = async () => {
    await axios.post("https://shoppinglist_db.test/api/categories", category.value)
    category.value = {
      name: "", 
      icon_name: "",
    }
    await fetchItems()
  }
  
  const fetchItems = async () => {
    const response = await axios.get("https://shoppinglist_db.test/api/categories")
    categories.value = response.data
  }
  onMounted(async () => {
    await fetchItems()
  })

  const deleteItem = async (id) => {
    await axios.delete("https://shoppinglist_db.test/api/categories/" + id)
    await fetchItems()
  } 

</script>

<style scoped>
</style>