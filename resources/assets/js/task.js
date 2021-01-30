window.Vue = require('vue')
import flatPickr from 'vue-flatpickr-component'
import { Japanese } from 'flatpickr/dist/l10n/ja'
import 'flatpickr/dist/flatpickr.css'

const app = new Vue({
    el: '#due_date',
    name: 'due_date',
    data() {
        return {
            // Initial value
            date: new Date(),
            // Get more form https://chmln.github.io/flatpickr/options/
            config: {
                wrap: true, // set wrap to true only when using 'input-group'
                altInput: true,
                altFormat: "Y/m/d",
                locale: Japanese,
                minDate: 'today' // locale for this instance onlys
            },
        }
    },
    components: {
        flatPickr
    },
})





