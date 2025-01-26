<script setup>
import {ref} from "vue";
import {useField} from "vee-validate";
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
});

const textareaRef = ref < HTMLInputElement | null > (null)
const {value, errorMessage, meta} = useField(() => props.name)


const emits = defineEmits(['update:modelValue'])

const handleInput = (event) => {
  const target = event.target
  as
  HTMLInputElement

  emits('update:modelValue', target.value)
}
</script>

<template>
  <div class="w-full flex flex-col items-start justify-start">
    <textarea
        ref="textareaRef"
        :name="name"
        autocomplete="off"
        :placeholder="placeholder"
        v-model="value"
        v-bind="$attrs"
        class="flex p-[16px] border rounded-[8px] resize-none text-[16px] placeholder:text-white leading-[166%] min-h-[120px]  outline-none  placeholder:transition-all focus:placeholder:-indent-[100%] focus:border-[1.5px]  transition-all"
        :class="
      errorMessage
        ? 'border-[1.5px] border-red-400'
        : 'border-slate-300'
    "
    />

    <transition>

      <InputErrorMessage v-if="errorMessage" :error-message="errorMessage"></InputErrorMessage>
    </transition>
  </div>

</template>
