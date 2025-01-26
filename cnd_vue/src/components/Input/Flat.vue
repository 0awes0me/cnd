<script setup>
import {nextTick, ref, watch} from 'vue'
import {useField} from "vee-validate";
import Textarea from "@/components/Input/Textarea.vue";
import InputErrorMessage from "@/components/InputErrorMessage.vue";

defineOptions({
  inheritAttrs: false
})

const props = defineProps({
  name: {
    type: String,
    required: true
  },
  label: String,
  type: String,
  placeholder: String,
  modelValue: String,
  slotName: String,
  error: Object
})


const inputRef = ref < HTMLInputElement | null > (null)

const handleFocus = () => {
  if (!props.slotName) return
  // toggleVisibility(true)
}

const emits = defineEmits(['update:modelValue'])

const {value, errorMessage, meta} = useField(() => props.name)

</script>

<template>
  <div class="flex w-full flex-col items-start justify-start gap-1">
    <div class="flex w-full relative" ref="outsideClickRef">
      <input
          ref="inputRef"
          autocomplete="off"
          :type="type"
          :id="name"
          class="w-full rounded-[8px] border px-[16px] pt-[26px] h-[58px] text-[16px] leading-[150%] peer focus:border-[1.5px]  transition-all outline-none peer disabled:opacity-40"
          :class="`${errorMessage ? 'border-red-400' : 'border-slate-300'}`"
          placeholder=" "
          v-model="value"
      />
      <p
          class="flex absolute left-[16px]  top-[12px] text-[16px] leading-[120%] peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-[16px] peer-placeholder-shown:leading-[150%] peer-focus:top-[12px] peer-focus:translate-y-0 peer-focus:text-[12px] peer-focus:leading-[120%] transition-all pointer-events-none peer-disabled:opacity-40"
      >
        {{ placeholder }}
      </p>

      <div
          v-if="$slots && isVisible"
          class="z-10 flex absolute bottom-full left-1/2 -translate-x-1/2 mb-[10px]"
      >
        <slot :handleUpdateSlot="handleUpdateSlot" :initialData="modelValue"/>
      </div>
    </div>


    <transition>

      <InputErrorMessage v-if="errorMessage" :error-message="errorMessage"></InputErrorMessage>
    </transition>
  </div>


</template>

<style scoped>

</style>