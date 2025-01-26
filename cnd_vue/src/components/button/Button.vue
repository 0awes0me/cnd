<script setup>
import LoadingSpinner from "@/components/LoadingSpinner.vue";

const props = defineProps({
  name: {
    type: String,
    default: ''
  },
  type: {
    type: String,
    default: 'button'
  },
  loading: {
    type: Boolean,
    default: false
  }
})
</script>

<template>
  <button :type="type" :disabled="loading"
          class="flex relative  flex-row items-center justify-center gap-2 px-4 text-slate-300 py-2 text-[22px] font-bold bg-blue-800 cursor-pointer hover:bg-blue-900 transition-all rounded-[12px]">
    <slot/>
    <div class="absolute top-0 left-0 w-full h-full" v-if="loading">
      <div class="flex flex-row w-full items-center justify-end px-4 h-full">
        <loading-spinner width="32px" height="32px"/>
      </div>
    </div>
  </button>
</template>

<style scoped>

</style>