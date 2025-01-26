import {ref} from "vue";

export function useFetch(url, body, method = 'get') {
    const data = ref(null)
    const loading = ref(true)
    const error = ref(null)


    fetch(url, {
        headers: [
            ['Content-Type', 'application/json'],
            ['Accept', 'application/json'],
        ], method, body: JSON.stringify(body)
    })
        .then((res) => {
            return res.json()
        })
        .then((json) => (data.value = json))
        .catch((err) => (error.value = err))
        .finally(() => (loading.value = false))

    return {data, error, loading}
}