<script setup>

import Flat from "@/components/Input/Flat.vue";
import {Form} from "vee-validate";
import Textarea from "@/components/Input/Textarea.vue";
import Button from "@/components/button/Button.vue";
import {computed, ref} from "vue";
import * as yup from "yup";
import {useContactFormSubmit} from "@/composables/useContactFormSubmit.js";
import {contactFormValidationSchema} from "@/validationSchemas/contactFormValidationSchema.js";
import {contactFormService} from "@/services/ContactFormService.js";
import {useContactFormStore} from "@/stores/useContactFormStore.js";

const form = ref(null)

const schema = contactFormValidationSchema;
const formData = ref({
  name: '',
  email: '',
  subject: '',
  message: ''
})
const contactStore = useContactFormStore()
const submit = (values) => {
  schema.isValid(values).then(() => {
    contactFormService.send(values);
  });
}
const messageSent = computed(() => contactStore.$state.data !== null && !contactStore.$state.loading)
</script>

<template>
  <Transition>
    <div class="flex flex-col items-center justify-center"
         v-if="messageSent">
      <div class="text-[42px]">Thanks for reaching out.</div>
      <div class="text-[24px] text-slate-300">We will be in touch shortly !</div>
    </div>
    <Form v-else id="form" :ref="form" :validation-schema="schema" @submit="submit" :initial-values="formData">
      <div class="flex flex-col items-center gap-5">
        <div class="flex flex-col items-center justify-center gap-5">
          <div class="w-full flex flex-row items-stretch justify-start gap-5">
            <Flat name="name" placeholder="Name"/>
            <Flat name="email" placeholder="Email"/>
          </div>
          <div class="w-full flex flex-row items-center justify-center gap-5">
            <Flat class="w-full" name="subject" placeholder="Subject"/>
          </div>
          <div class="w-full flex flex-row items-center justify-center gap-5">
            <Textarea name="message" class="w-full" placeholder="Message"/>
          </div>
          <div class="w-full">
            <Button type="submit" class="w-full" :loading="contactStore.$state.loading">
              <div class="text-center">Send !</div>
            </Button>
          </div>
        </div>
      </div>
    </Form>
  </Transition>
</template>

<style scoped>

</style>