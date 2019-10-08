<template>
<div>
          <!-- Page-Title -->
          <div class="row">
              <div class="col-sm-12">
                  <div class="page-title-box">
                      <div class="row align-items-center">
                          <div class="col-md-8">
                              <h4 class="page-title mt-3">Dashboard</h4>
                          </div>

                      </div>
                  </div>
              </div>
          </div><!-- end page title end breadcrumb -->
          <div class="row">
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-primary mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-50">Total shares</h6>
                              <h4 class="mb-3 mt-0 float-right">{{this.shares | formatNumber}}</h4>
                          </div>
                          <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a></div>
                          <!-- <p class="font-14 m-0">Last : 1447</p> -->
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-info mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-50">Loan released</h6>
                              <h4 class="mb-3 mt-0 float-right">{{this.loans| formatNumber}}</h4>
                          </div>
                          <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a></div>
                          <!-- <p class="font-14 m-0">Last : 1447</p> -->
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-success mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-50">Loan payed</h6>
                              <h4 class="mb-3 mt-0 float-right">1,587</h4>
                          </div>
                          <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a></div>
                          <!-- <p class="font-14 m-0">Last : 1447</p> -->
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-pink mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-50">Total vehicles</h6>
                              <h4 class="mb-3 mt-0 float-right">{{this.vehicles}}</h4>
                          </div>
                          <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a></div>
                          <!-- <p class="font-14 m-0">Last : 1447</p> -->
                      </div>
                  </div>
              </div>

              <div class="col-xl-3 col-md-6">
                  <div class="card bg-secondary mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-50">Total members</h6>
                              <h4 class="mb-3 mt-0 float-right">{{this.members | formatNumber}}</h4>
                          </div>
                          <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a></div>
                          <!-- <p class="font-14 m-0">Last : 1447</p> -->
                      </div>
                  </div>
              </div>

              <div class="col-xl-3 col-md-6">
                  <div class="card bg-warning mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-50">Monthly shares</h6>
                              <h4 class="mb-3 mt-0 float-right">{{this.month}}</h4>
                          </div>
                          <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a></div>
                          <!-- <p class="font-14 m-0">Last : 1447</p> -->
                      </div>
                  </div>
              </div>

          </div><!-- end row -->
          <div class="row">
              <div class="col-4">
                  <div class="card m-b-30">
                      <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Latest Shares Trasaction
                          <span class="float-right">
                            <button type="button" @click.prevent="printme" class="btn btn-secondary btn-sm" name="button">Print report</button>
                          </span>
                        </h4>
                          <div class="table-rep-plugin">
                              <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table class="table table-hover table-striped">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Member name</th>

                                      <th>Shares amount</th>

                                      <th>Payment Date</th>

                                    </tr>
                                  </thead>
                                  <tbody>

                                    <tr v-for="(p,index) in sharesdata" @key="index">
                                      <td>{{index+1}}</td>

                                      <td>{{p.name}}</td>
                                      <td>{{p.amount | formatNumber}}</td>

                                      <td>{{p.payment_date|date}}</td>



                                    </tr>
                                  </tbody>
                                </table>

                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- end col -->
              <div class="col-8">
                <div class="card m-b-30">
                    <div class="card-body">
                      <h4 class="mt-0 header-title mb-4">Latest Loan Trasaction
                        <span class="float-right">
                          <button type="button" @click.prevent="printme" class="btn btn-secondary btn-sm" name="button">Print report</button>
                        </span>
                      </h4>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Loan ID</th>
                                    <th>Member name</th>

                                    <th>Loan amount </th>
                                    <th>Interest rate (p.m)</th>
                                    <th>Duration(months)</th>
                                    <th>Date issued</th>

                                  </tr>
                                </thead>
                                <tbody>

                                  <tr v-for="(p,index) in loansdata" @key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{p.loan_id}}</td>
                                    <td>{{p.name}}</td>
                                    <td>{{p.amount | formatNumber}}</td>
                                    <td>{{p.interest_rate}}</td>
                                    <td>{{p.duration}}</td>
                                    <td>{{p.date|date}}</td>





                                  </tr>
                                </tbody>
                              </table>

                            </div>
                        </div>
                    </div>
                </div>

              </div>
          </div><!-- end row -->




</div>
</template>

<script>
    export default {
      data(){
        return {
          loansdata:[],
          sharesdata:[],
          members:null,
          vehicles:null,
          shares:null,
          loans:null,
          month:null,
          monthly:null

        }
      },
        mounted() {
            this.fetchShares();
            this.fetchLoans();
            this.fetchVehicles();
            this.fetchMembers();
            this.fetchSharesList();
            this.fetchLoansList();
            this.monthShares();
        },
        methods:{
          fetchShares: function() {

              this.axios.get('/api/totalshares').then((response) => {
                    //console.log(response.data);
                  this.shares = response.data;

              }).catch((error) => {
                  console.log(error);
              })
          },
          fetchSharesList: function() {
              console.log('Fetching data....');

              this.axios.get('/api/share').then((response) => {
                  //  console.log(response.data);
                  this.sharesdata = response.data;
              }).catch((error) => {
                  console.log(error);
              })
          },
          fetchLoansList: function() {
              console.log('Fetching data....');

              this.axios.get('/api/loan').then((response) => {
                  //  console.log(response.data);
                  this.loansdata = response.data;
              }).catch((error) => {
                  console.log(error);
              })
          },
          fetchMembers: function() {

              this.axios.get('/api/totalmembers').then((response) => {
                  //  console.log(response.data);
                  this.members = response.data;
              }).catch((error) => {
                  console.log(error);
              })
          },
          fetchVehicles: function() {

              this.axios.get('/api/totalvehicles').then((response) => {
                  //  console.log(response.data);
                  this.vehicles = response.data;
              }).catch((error) => {
                  console.log(error);
              })
          },
          fetchLoans: function() {

              this.axios.get('/api/totalloans').then((response) => {
                  //  console.log(response.data);
                  this.loans = response.data;
              }).catch((error) => {
                  console.log(error);
              })
          },
          monthShares: function() {

              this.axios.get('/api/month').then((response) => {
                  //  console.log(response.data);
                  this.month = response.data;
              }).catch((error) => {
                  console.log(error);
              })
          },


        }
    }
</script>
