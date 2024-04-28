<script setup>
  import axios from 'axios';
  import {onMounted} from 'vue';

  import CreateNoteComponent from './components/CreateNoteComponent.vue';
  import NoteList from './components/NoteList.vue';
  import TagList from './components/TagList.vue';

  onMounted(() => {
    axios.get('')
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
      <note-list/>
    </div>
  </div>
</template>
