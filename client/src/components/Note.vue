<script setup>
defineProps({
    checked: Boolean,
    noteBody: String,
    tags: String
})
</script>

<template>
    <div class="border-slate-500 bg-blue-200 rounded-lg flex mb-4 w-96 text-center items-center">
        <input type="checkbox" class="mx-2 checked:bg-gray-300" :checked="checked">
        <span class="mr-2 text-left">{{ noteBody }}</span>
        <span class="mr-2 mx-1">{{ tags }}</span>
        <button onclick="" class="border-2 rounded-lg color bg-orange-400 m-1 ml-auto">Изменить</button>
        <button class="border-2 rounded-lg color bg-red-400 m-1 float-end ml-auto">Удалить</button>
    </div>
</template>