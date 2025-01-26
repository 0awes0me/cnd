<script setup>

import Button from "@/components/button/Button.vue";

const onCtaClick = () => {
  const el = document.getElementById('form');
  el.scrollIntoView({behavior: "smooth"});
}
</script>

<template>
  <div class="min-h-screen fixed  dark:bg-gray-800 z-0   flex items-center w-full justify-center flex-col gap-5">
    <div class="flex flex-col items-start justify-center text-center gap-5">
      <div class="font-bebas text-slate-200  flex flex-col items-start gap-[1px] leading-[120px]">
        <div class="text-[101px] ">Welcome to our</div>
        <div class="text-[204.5px]"><span class="font-bold ">Website</span></div>
      </div>
      <div class="w-full">
        <Button class="w-full" @click="onCtaClick">Contact Us Now !</Button>
      </div>
    </div>
  </div>
  <div class="min-h-screen"></div>

</template>

<style scoped>

</style>