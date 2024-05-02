<script setup>
import axios from 'axios';
import { createRouter } from 'vue-router';
import { ref } from 'vue';

const todoText = ref()        

function createTodo(todoText) {
    axios.post('http://127.0.0.1:8000/todo', {
        checked: false,
        todoBody: todoText,
        tags: null
    })
    .then((response) => {
        // this.$router.go()
    }, 
    (error) => {
        console.log(error);
    });

}
</script>
    
<template>
    <div class="items-center flex bg-slate-200 w-1/2 ml-10 mt-10 p-4 rounded-lg align-center">
        <p>Введите свою задачу:</p>
        <textarea v-model.trim="todoText" rows="" cols="" class="mx-4 rounded-md" maxlength="75" type="text" placeholder="Вводи заметку"/>
        <button @click="createTodo(todoText)" class="mx-4 bg-green-800 rounded-lg ">Добавить</button>
        <button class="mx-4 rounded-lg bg-green-300">+ Тег</button>
    </div>
</template>