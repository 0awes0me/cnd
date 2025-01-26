<script setup>
const props = defineProps({
  width: {
    type: String,
    default: '50px'
  },
  height: {
    type: String,
    default: '50px'
  }
})
</script>

<template>
  <span :style="{height: height, width: width}" class="loader"></span>

</template>

<style scoped>
.loader {
  border: 5px solid #FFF;
  border-bottom-color: transparent;
  border-radius: 50%;
  display: inline-block;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>