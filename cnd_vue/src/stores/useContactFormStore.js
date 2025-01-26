import {defineStore} from "pinia";

export const useContactFormStore =
    defineStore('contactForm', {
        // arrow function recommended for full type inference
        state: () => {
            return {
                data: null,
                loading: false,
                error: null
            }
        },
        actions: {
            requested() {
                console.log('request')

                this.loading = true
            },
            succeeded(data) {
                console.log('succ', data)
                this.loading = false;
                this.data = data;
            },
            failed(error) {
                console.log('error')

                this.loading = false
                this.error = error

            }
        }

    })
