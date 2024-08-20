import { createApp } from 'vue';
import CreateContactModal from './components/CreateContactModal.vue';

const app = createApp({
    components: {
        'create-contact-modal': CreateContactModal
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
