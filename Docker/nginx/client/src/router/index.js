import { createMemoryHistory, createRouter } from 'vue-router';

import NoteList from '../components/NoteList.vue';

const routes = [
    {path: '/', component: NoteList}
  ]
  
const router = createRouter({
    history: createMemoryHistory(),
    routes,
})

export default router
  