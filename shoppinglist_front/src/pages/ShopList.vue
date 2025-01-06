<template>
  <q-page class="flex flex-top-left ">
    <div class="q-pa-md row">

      <q-form
        @submit.prevent="saveItem"
        class="q-gutter-md"
      >
        <q-input
         filled
          v-model.trim="shoppingItem.text"
          type="text"
          label="Item"
          lazy-rules
          :rules="[ val => val && val.length > 1 || 'Please type something']"
        />

      <q-toggle v-model="shoppingItem.high_prio" label="High Priority" />

      <q-select 
        filled
        v-model="shoppingItem.category_id"
        :options="drops"
        label="Category"
        color="standard"
        option-label="name"
        option-value="id"
        emit-value
        map-options
        clearable
        >
        <template v-slot:option="scope">
          <q-item v-bind="scope.itemProps">
            <q-item-section avatar>
              <q-icon :name="scope.opt.icon_name" />
            </q-item-section>
            <q-item-section>
              <q-item-label>{{ scope.opt.name }}</q-item-label>
            </q-item-section>
          </q-item>
        </template>
      </q-select>

        <div>
          <q-btn label="Submit" type="submit" color="primary"/>
          <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
        </div>
      </q-form>

      <div class="q-pa-md list">
        <q-list bordered separator>
          <q-slide-item
          v-for="(item) in shoppingItems"  
          :key="item" 
          :class="{prioStyle: item.high_prio}"
          >
          <q-slide-item>
            <q-avatar :icon="item.category.icon_name" />
              {{ item.text }}
            <template v-slot:left>
    
              <div class="row justify-between">
                <q-icon name="done" />
                  {{ item.text }}
                <q-icon name="close" @click="deleteItem(item.id) "/>
              </div>
            </template>
          </q-slide-item>
          </q-slide-item>
        </q-list>
      </div>

    </div>
  </q-page>
</template>
  
<script setup>
  import { ref, onMounted, reactive } from 'vue'
  import axios from 'axios';
  //import { useQuasar } from 'quasar'

  const drops = ref([])
  const shoppingItems = ref([])

 const fetchIcons = async () => {
    const response = await axios.get("https://shoppinglist_db.test/api/categories")
    drops.value = response.data
  }

const shoppingItem = reactive({
  text: "",
  high_prio: false,
  category_id: 1,
})

  const saveItem = async () => {
  await axios.post("https://shoppinglist_db.test/api/shoppingitems", shoppingItem)
      shoppingItem.text = ""
      shoppingItem.high_prio = false
     shoppingItem.category_id = 1
    
    await fetchItems()
  }
  
  const fetchItems = async () => {
    const response = await axios.get("https://shoppinglist_db.test/api/shoppingitems")
    shoppingItems.value = response.data
    
  }
  onMounted(async () => {
    await fetchItems()
    await fetchIcons()
  })

  const deleteItem = async (id) => {
    await axios.delete("https://shoppinglist_db.test/api/shoppingitems/" + id)
    await fetchItems()
  } 

  // const iconForItem = () => {
  //   if (drops.id == shoppingItem.category_id) {
  //     drops.icon_name = 
  //   }

  // }

</script>

<style scoped>

  .prioStyle {
    color: red;
  }
  
  .deleteStyle {
    display: none;
  }

  .list {
    width: 30rem;
    border-radius: 10rem;
    padding-left: 10rem;
  }
  
  .listItem {
    height: 6rem;
  }
</style>
  