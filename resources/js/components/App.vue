<template>
    <div class="text-center">
      <h1 class="mb-4">Vue.js Está Funcionando!</h1>
      <button @click="increment" class="btn btn-primary btn-lg">Clique Me</button>
      <transition name="fade" @before-enter="beforeEnter" @enter="enter" @leave="leave">
        <p v-if="count > 0" class="mt-3">Você clicou <strong>{{ count }}</strong> vezes.</p>
      </transition>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        count: 0
      }
    },
    methods: {
      increment() {
        this.count++;
      },
      beforeEnter(el) {
        el.style.opacity = 0;
      },
      enter(el, done) {
        el.offsetHeight; // trigger reflow
        el.style.transition = 'opacity 0.5s';
        el.style.opacity = 1;
        done();
      },
      leave(el, done) {
        el.style.transition = 'opacity 0.5s';
        el.style.opacity = 0;
        done();
      }
    }
  }
  </script>
  
  <style scoped>
  /* Adiciona uma transição suave */
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }
  button {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  button:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }
  </style>
  