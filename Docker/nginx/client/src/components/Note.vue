<script setup>
import { ref } from 'vue';
import axios from 'axios';

defineProps({
    id: String,
    checked: Boolean,
    todoBody: String,
    tags: String
})



function deleteTodo(deleteId){
    try{
        fetch(`http://127.0.0.1:8000/todo/${deleteId}`, {
            method: "DELETE"
        });
        // axios.delete(`http://127.0.0.1:8000/todo/${deleteId}`);
    } 
    catch (err) {
      console.log(err)
    }
}

function editTodo(){
    axios.put('http://127.0.0.1:8000/todo', {

    })
}

</script>

<template>
    <div class="border-slate-500 bg-blue-200 rounded-lg flex mb-4 w-96 text-center items-center">
        <input type="checkbox" class="mx-2 checked:bg-gray-300" :checked="checked">
        <span class="mr-2 text-left">{{ todoBody }}</span>
        <span class="mr-2 mx-1">{{ tags }}</span>
        <button @click="editTodo()" class="border-2 rounded-lg color bg-orange-400 m-1 ml-auto">Изменить</button>
        <button @click="deleteTodo(id)" class="border-2 rounded-lg color bg-red-400 m-1 float-end ml-auto">Удалить</button>
    </div>
</template>