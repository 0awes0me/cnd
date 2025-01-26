<script setup>
const props = defineProps({
  errorMessage: {
    type: String,
    default: 'Error !'
  }
})
</script>

<template>
  <div class="text-red-400" :class="errorMessage ? 'error_message' : ''">{{ errorMessage }}</div>

</template>

<style scoped>

</style>