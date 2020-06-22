import Vue from 'vue';
import router from './router';
import App from './App.vue';
import axios from 'axios';
import moment from 'moment';

// Global access
Vue.prototype.$axios = axios;
Vue.prototype.$axios.defaults.baseURL = process.env.APP_URL;
Vue.prototype.$baseUrl = process.env.APP_URL;

Vue.mixin({
    methods: {
        parseDates(string) {
            if (!string) {
                return;
            }
            let value = string.replace(/%F%/gi, moment().format('MMMM'));
            value = value.replace(/%Y%/gi, moment().format('YYYY'));
            return value;
        },
        localTime(dateTime, showTime = false, customFormat) {
            const dateFormat = customFormat ? customFormat : (showTime ? 'MM-DD-YYYY hh:mm:ss a' : 'YYYY-MM-DD');
            
            return moment.utc(dateTime).local().format(dateFormat);
        },
        fromNow(dateTime) {
            return moment.utc(dateTime).local().fromNow();
        },
    },
});

new Vue({
    router,
    // store,
    render: h => h(App)
}).$mount('#app');