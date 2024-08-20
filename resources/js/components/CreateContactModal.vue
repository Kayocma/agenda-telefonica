<template>
  <div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true" v-if="showModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center w-100" id="createModalLabel">Criar Novo Contato</h5>
            <button type="button" class="close" @click="closeModal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div v-html="modalContent"></div>
          </div>
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
      modalContent: ''
    };
  },
  methods: {
    openModal() {
      this.showModal = true;
      this.$nextTick(() => {
        $('#createModal').modal('show');
      });
      this.loadModalContent();
    },
    closeModal() {
      this.showModal = false;
      $('#createModal').modal('hide');
    },
    loadModalContent() {
      axios.get('/create')
        .then(response => {
          this.modalContent = response.data;
        })
        .catch(error => {
          console.error('Error loading modal content:', error);
        });
    }
  }
};
</script>

<style scoped>
/* Adicione estilos personalizados aqui se necessário */
</style>