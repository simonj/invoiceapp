/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap');
require('./home');

Vue.component('clients', require('./clients/clients.vue'));
Vue.component('client-edit', require('./clients/client-edit.vue'));
Vue.component('invoice-create', require('./invoices/invoice-create.vue'));
Vue.component('invoices', require('./invoices/invoices.vue'));
