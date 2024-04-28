<script setup>
  import Note from './Note.vue';
</script>

<template>
    <div class="bg-blue-500 m-10 rounded-lg p-8 w-s2/4">
        <note :checked="true" noteBody="First note Очень длинная статья очень длинная заметка лооооооол" tags="#mynote"/>
        <note :checked="false" noteBody="My note" tags="#mynote"/>
    </div>
</template>