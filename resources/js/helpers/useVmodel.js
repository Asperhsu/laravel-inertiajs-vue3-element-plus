// source: https://dev.to/thomasfindlay/how-to-easily-sync-with-multiple-v-models-in-vue-3-using-composition-api-1pmg

import { computed, getCurrentInstance } from 'vue'

export default (props, propName) => {
    const vm = getCurrentInstance().proxy

    return computed({
        get() {
            return props[propName]
        },
        set(value) {
            vm.$emit(`update:${propName}`, value)
        },
    })
}
