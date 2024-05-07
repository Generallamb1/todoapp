<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';



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
    } 
    catch (err) {
      console.log(err)
    }
}

function changeCheckBox(changeId, changeChecked){
    axios.put("http://127.0.0.1:8000/todo", {
        id: changeId,
        checked: !changeChecked,
        tags: null,
        todoBody: null
    })
    console.log(changeId)
    console.log(changeChecked)
}

</script>

<template>
    <div class="border-slate-500 bg-blue-200 rounded-lg flex mb-4 w-96 text-center items-center">
        <input v-on:change="changeCheckBox(id, checked)" type="checkbox" class="mx-2 checked:bg-gray-300" :checked="checked">
        <span class="mr-2 text-left">{{ todoBody }}</span>
        <span class="mr-2 mx-1">{{ tags }}</span>
        <button @click="" class="border-2 rounded-lg color bg-orange-400 m-1 ml-auto">Изменить</button>
        <button @click="deleteTodo(id)" class="border-2 rounded-lg color bg-red-400 m-1 float-end ml-auto">Удалить</button>
    </div>
</template>