<script setup>
  import Note from './Note.vue';
  defineProps({
    items: Array
  })

  
  </script>

<template>
    <div class="bg-blue-500 m-10 rounded-lg p-8 w-s2/4">
        <note 
            v-for="item in items"
            :checked="item.checked"
            :todoBody="item.todoBody"
            :tags="item.tags"
            :id="item.id"
            :key="item.id"
          />
    </div>
</template>