require('./bootstrap');
require('bootstrap-toggle/js/bootstrap-toggle.min.js');

window.Vue = require('vue');
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';
import Chart from 'chart.js';

window.Chart = Chart;

Vue.use(Vuelidate)

Vue.use(Vuex);

window.moment = require('moment');

window.accounting = require('accounting');

import router from './router';
import store from './store';
import MenuSidebar from './components/MenuSidebar.vue';
import ActivitySidebar from './components/ActivitySidebar.vue';

//PASSPORT API
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

Vue.component('application-layout', require('./layouts/ApplicationView.vue'));

// Global Event Bus
window.Events = new Vue();

// Add the router to every vue instance.
Vue.prototype.router = router;


import {
    Alert
} from './utilities';
Vue.prototype.Alert = Alert;

const app = new Vue({
    created() {
        this.$store.commit('setUser', window.App.user);
    },
    el: '#app',
    components: {
        MenuSidebar,
        ActivitySidebar
    },
    router,
    store: store
});