require('./bootstrap');

import { createApp } from 'vue'
import SearchPet from './components/SearchPet'

const app = createApp({})

app.component('search-pet', SearchPet)

app.mount('#app')
