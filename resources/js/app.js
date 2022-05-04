require('./bootstrap');

import { createApp } from 'vue'
import SaveComponent from './components/SaveComponent.vue';
import BookmarkSearchComponent from './components/BookmarkSearchComponent.vue';

const app = createApp({})
app.component('save-component', SaveComponent);
app.component('bookmark-search-component', BookmarkSearchComponent);

app.mount('#app')