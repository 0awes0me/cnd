import {ref, onMounted, onUnmounted} from 'vue'
import {useFetch} from "@/composables/useFetch.js";

export function useContactFormSubmit(data) {
    //todo use api url from env
    return useFetch('http://localhost:8000/api/contact-form', data, 'POST')
}
