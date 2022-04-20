require('../bootstrap');

window.Vue = require('vue');

import LocationApp from './LocationApp.vue';
// import router from './router';


const locationApp = new Vue({
    el: '#location-app',
    render: h => h(LocationApp),
    // router
});
