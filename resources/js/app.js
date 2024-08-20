import './bootstrap.js';
import { createApp } from 'vue';
import App from './components/App.vue';

const app = createApp(App);
app.mount('#app');

// Exemplo simples de um componente Vue para testar
createApp({
  data() {
    return {
      message: 'Hello, Vue!'
    };
  }
}).mount('#app');
