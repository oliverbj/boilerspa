require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
import Chart from 'chart.js';

window.Chart = Chart;

Vue.use(Vuex);

window.moment = require('moment');

window.accounting = require('accounting');

import router from './router';
import store from './store';
import MenuSidebar from './components/MenuSidebar.vue';

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
    },
    router,
    store: store
});