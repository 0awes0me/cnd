<script setup>
import ContactForm from "@/components/forms/ContactForm.vue";
import {MotionComponent} from "@vueuse/motion";
</script>

<template>
  <div id="form"
       class="shadow-sm min-h-screen flex flex-col items-center justify-center z-10 dark:bg-slate-900 dark:text-slate-200 py-10">
    <div class="flex flex-row items-center justify-center">
      <div class="px-20 font-bold text-slate-300">
        <span class="font-playwrite text-amber-100 text-[80px] leading-[80px]">Tell us what you thinkssssss</span>
      </div>
      <MotionComponent is="div" preset="slideVisibleRight"
                       class="w-full flex flex-col w-full gap-5 bg-slate-800 rounded-[20px] py-8">
        <div>
          <h1 class="font-bebas text-[48px] font-bold text-center">Contact us</h1></div>
        <div>
          <ContactForm/>
        </div>
      </MotionComponent>
    </div>
  </div>
</template>

<style scoped>

</style>