import './bootstrap.js';
import { createApp } from 'vue';
import App from './components/App.vue';

const appContainer = document.getElementById('app');

if (appContainer.__vue_app__) {
  appContainer.__vue_app__.unmount();
}

const app = createApp(App);
app.mount('#app');
appContainer.__vue_app__ = app; // Armazena a nova instância
