import {ref, onMounted, onUnmounted} from 'vue'
import {useFetch} from "@/composables/useFetch.js";

export function useContactFormSubmit(data) {
    return useFetch(import.meta.env.VITE_API_URL + '/contact-form', data, 'POST')
}
