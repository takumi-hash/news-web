require('./bootstrap');

import { createApp } from 'vue'
import SaveComponent from './components/SaveComponent.vue';

const app = createApp({})
app.component('save-component', SaveComponent);
app.mount('#app')