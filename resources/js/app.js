import './bootstrap.js';
import Alpine from 'alpinejs';
import { createApp } from 'vue';
import createContactModal from './components/CreateContactModal.vue';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({
    components: {
        'create-contact-modal': createContactModal
    },
    data() {
        return {
            showModal: false
        };
    },
    methods: {
        openModal() {
            this.$refs.createContactModal.openModal();
        }
    }
});

app.mount('#app');