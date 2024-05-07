<script>
import axios from 'axios';
import { ref } from 'vue';

const editedTodo = ref()


function editTodo(editedTodo){
    axios.put("http://127.0.0.1:8000/todo", {
        todoBody: editedBody,
        tags: editedTags
    })
}
</script>

<template>
    <div class="item-center">
        <textarea v-mode.trim="editedBody" value="lol" rows="" cols=""></textarea>
        <button>Изменить</button>
        <button>Назад</button>
    </div>
</template>