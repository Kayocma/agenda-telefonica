<template>
  <div>
    <button @click="openModal" class="btn btn-dark mt-2">Novo Contato</button>

    <!-- Modal -->
    <div v-if="showModal" class="modal-overlay" @click.self="closeModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Criar Novo Contato</h5>
            <button type="button" class="close" @click="closeModal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body" v-html="modalContent"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      showModal: false,
      modalContent: '',
    };
  },
  methods: {
    openModal() {
      this.showModal = true;
      this.loadModalContent();
    },
    closeModal() {
      this.showModal = false;
      this.modalContent = '';
    },
    loadModalContent() {
      axios.get('/create')
        .then(response => {
          this.modalContent = response.data;
        })
        .catch(error => {
          console.error('Erro ao carregar conteúdo do modal:', error);
        });
    }
  }
};
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal-dialog {
  width: 500px;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
}
</style>
