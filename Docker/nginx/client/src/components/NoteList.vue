<script setup>
  import {defineAsyncComponent} from 'vue';

  defineProps({
    items: Array
  })


const Note = defineAsyncComponent(() => 
  import('./Note.vue')
)
  
  </script>

<template>
    <div class="bg-blue-500 m-10 rounded-lg p-8 w-s2/4">
        <Note
            v-for="item in items"
            :checked="item.checked"
            :todoBody="item.todoBody"
            :tags="item.tags"
            :id="item.id"
            :key="item.id"
          />
    </div>
</template>