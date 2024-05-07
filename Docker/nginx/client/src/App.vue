<script setup>
import axios from 'axios';
import {onMounted, ref, defineAsyncComponent} from 'vue';

import CreateNoteComponent from './components/CreateNoteComponent.vue';
import NoteList from './components/NoteList.vue';
import TagList from './components/TagList.vue';
import EditWindow from './components/EditWindow.vue'

const items = ref([])

onMounted(async () => {
  try{
    const { data } = await axios.get('http://127.0.0.1:8000/todo')
    items.value = data
  } 
    catch (err) {
    console.log(err)
  }
})


</script>

<template>
  <div>
    <div>
    </div>
    <div class="">
      <h2 class="text-2xl m-10">Создайте свой список задач!</h2>
      <!-- <tag-list/> -->
      <create-note-component/>
      <note-list :items="items"/>
      <!-- <edit-window :todo=" "/> -->
    </div>
  </div>
</template>
