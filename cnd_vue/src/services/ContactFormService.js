import {useContactFormStore} from "@/stores/useContactFormStore.js";
import {useContactFormSubmit} from "@/composables/useContactFormSubmit.js";
import {ref, watch} from "vue";

export const contactFormService = {
    send: (
        input
    ) => {

        const store = useContactFormStore();
        store.requested();
        const {loading, data, error} = useContactFormSubmit(input);

        watch(loading, (newVal) => {
            if (newVal) return;
            if (data.value) {
                store.succeeded(data.value)
            }
            if (error.value) {
                store.failed(error.value)
            }
        });

    },

}
