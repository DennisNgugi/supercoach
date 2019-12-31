
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import moment from 'moment'
import numeral from 'numeral'
import FunctionalCalendar from 'vue-functional-calendar';
import VueAxios from 'vue-axios';
import axios from 'axios';
import vSelect from 'vue-select'
import Vue from 'vue';

//working vue select 2
Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';

// const opts = {}
//
// export default new Vuetify(opts)
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000
});
window.toast = toast;

import {
    Form,
    HasError,
    AlertError
} from 'vform'

window.form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter)
Vue.use(VueAxios, axios);
Vue.filter('capitalize', function (value) {
  return value.charAt(0).toUpperCase() + value.slice(1)
})

Vue.filter('date', function (created) {
  return moment(created).format('LL');
})
Vue.filter("formatNumber", function (value) {
    return numeral(value).format("0,0"); // displaying other groupings/separators is possible, look at the docs
  });


import Dashboard from './components/Dashboard.vue';

//
import MemberCreate from './components/Members/Create.vue';
import MemberEdit from './components/Members/Edit.vue';
import MemberIndex from './components/Members/Index.vue';
import MemberShow from './components/Members/Show.vue';


import VehicleCreate from './components/Vehicles/Create.vue';
import VehicleEdit from './components/Vehicles/Edit.vue';
import VehicleIndex from './components/Vehicles/Index.vue';
import VehicleShow from './components/Vehicles/Show.vue';

import LoanCreate from './components/Loans/Create.vue';
import LoanEdit from './components/Loans/Edit.vue';
import LoanIndex from './components/Loans/Index.vue';
import LoanShow from './components/Loans/Show.vue';

import MyLoan from './components/Members/MyLoan.vue';


import LoanPay from './components/LoanPayment/PayLoan.vue';

import Amortization from './components/Loans/Amortization.vue';


import ShareCreate from './components/Shares/Create.vue';
import ShareEdit from './components/Shares/Edit.vue';
import ShareIndex from './components/Shares/Index.vue';
import ShareWithdraw from './components/Shares/Withdraw.vue';

import GuarantorCreate from './components/Guarantors/Create.vue';
import GuarantorEdit from './components/Guarantors/Edit.vue';
import GuarantorIndex from './components/Guarantors/Index.vue';
import GuarantorShow from './components/Guarantors/Show.vue';

import ShareReport from './components/Report/ShareReport.vue';

const routes = [
  {
      name: 'dashboard',
      path: '/',
      component: Dashboard
  },
  {
      name: 'member_create',
      path: '/admin/member/create',
      component: MemberCreate
  },
  {
      name: 'member',
      path: '/admin/member',
      component: MemberIndex
  },
  {
      name: 'member_edit',
      path: '/admin/member/edit/:id',
      component: MemberEdit
  },
  {
      name: 'member_show',
      path: '/admin/member/:id',
      component: MemberShow
  },

  {
      name: 'vehicle_create',
      path: '/admin/vehicle/create',
      component: VehicleCreate
  },
  {
      name: 'vehicle',
      path: '/admin/vehicle',
      component: VehicleIndex
  },
  {
      name: 'vehicle_edit',
      path: '/admin/vehicle/edit/:id',
      component: VehicleEdit
  },
  {
      name: 'vehicle_show',
      path: '/admin/vehicle/:id',
      component: VehicleShow
  },
  {
      name: 'loan_create',
      path: '/admin/loan/create',
      component: LoanCreate
  },
  {
      name: 'loan',
      path: '/admin/loan',
      component: LoanIndex
  },
  {
      name: 'loan_edit',
      path: '/admin/loan/edit/:id',
      component: LoanEdit
  },
  {
      name: 'loan_show',
      path: '/admin/loan/view/:name/:no/:id',
      component: LoanShow
  },
  {
      name: 'view_member_loan',
      path: '/admin/myloan/:id',
      component: MyLoan
  },
  {
      name: 'amortization',
      path: '/admin/amortization/:id',
      component: Amortization
  },
  {
      name: 'loan_pay',
      path: '/admin/payloan/:id',
      component: LoanPay
  },
  {
      name: 'share_create',
      path: '/admin/share/create',
      component: ShareCreate
  },
  {
      name: 'share',
      path: '/admin/share',
      component: ShareIndex
  },
  {
      name: 'share_edit',
      path: '/admin/share/edit/:id',
      component: ShareEdit
  },

  {
      name: 'sharereport',
      path: '/admin/share/report',
      component: ShareReport
  },
  {
      name: 'sharewithdraw',
      path: '/admin/share/withdraw',
      component: ShareWithdraw
  },
  {
      name: 'guarantor_create',
      path: '/admin/guarantor/create/:name/:id',
      component:  GuarantorCreate
  },
  {
      name: 'guarantor',
      path: '/admin/guarantor',
      component:  GuarantorIndex
  },
  {
      name: 'guarantor_edit',
      path: '/admin/guarantor/edit/:id',
      component:  GuarantorEdit
  },
  {
      name: 'guarantor_show',
      path: '/admin/guarantor/:id',
      component:  GuarantorShow
  },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

const app = new Vue({
    el: '#app',
    router
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
