<template>
    <div>
        <h1>Vue.js está funcionando!</h1>
        <button @click="increment">Clique me</button>
        <p>Você clicou {{ count }} vezes.</p>
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
        }
    }
}
</script>

<style scoped>
button {
    margin-top: 20px;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
}
</style>
