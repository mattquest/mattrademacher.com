require('./bootstrap')
import vuetify from './plugins/vuetify'
import WhHome from './WhHome';
import ContactForm from './ContactForm';

Vue.component('wh-home', WhHome);
Vue.component('contact-form', ContactForm);

import { VueReCaptcha } from 'vue-recaptcha-v3'

Vue.use(VueReCaptcha, {
    siteKey: '6Le-PbkUAAAAALW0d-FK732SvEpsKxrOT75lLZKj',
    loaderOptions: {
        autoHideBadge: true
    }
})

var app = new Vue({
    vuetify,
}).$mount('#app');
