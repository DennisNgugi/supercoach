<template>
<div>
          <!-- Page-Title -->
          <div class="row">
              <div class="col-sm-12">
                  <div class="page-title-box">
                      <div class="row align-items-center">
                          <div class="col-md-8">
                              <h4 class="page-title mt-3">Vehicle Details</h4>
                          </div>
                          <div class="col-md-4">
                              <div class="float-right d-none d-md-block">
                                <router-link class="btn btn-primary"to="/vehicle">Back to Vehicle List</router-link>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div><!-- end page title end breadcrumb -->
          <div class="row">

            <div class="col-xl-3 col-md-6">
                <h2 class="page-title mt-3">{{post.registration_no}}</h2>
                <h6 class="page-title mt-3">Owner: {{post.member.name}}</h6>
                <p class="page-title mt-3"><b>Status:</b> <span class="badge badge-pill badge-success">{{post.status}}</span></p>
                <div class="card bg-info mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-80">Shares</h6>
                                                  </div>
                        <div><h4 class="mb-3 mt-0 float-right">{{totalShares}}</h4></div>
                    </div>
                    <div class="p-3">
                        <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>
                        <p class="font-14 m-0"></p>
                    </div>
                </div>
                <div class="card bg-secondary mini-stat text-white">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-80">Loan amount</h6>

                        </div>
                          <div><h4 class="mb-3 mt-0 float-right">{{totalLoan}}</h4></div>
                      </div>
                    <div class="p-3">
                        <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>
                        <p class="font-14 m-0"></p>
                    </div>
                </div>
            </div>

              <div class="col-xl-9 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Applied Loan Report</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#.</th>
                                        <th scope="col">Loan ID</th>
                                        <th scope="col">Principle</th>
                                        <th scope="col">Interest rate(%)</th>
                                        <th scope="col">Duration(months)</th>
                                        <th scope="col">Date issued</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <tr v-for="(p,index) in loans" @key="index">

                                        <th scope="row">{{index+1}}</th>
                                        <td>{{p.loan_id}}</td>
                                        <td>{{p.amount}}</td>
                                        <td>{{p.interest_rate}}</td>
                                        <td>{{p.duration}}</td>
                                        <td>{{p.date|date}}</td>
                                        <td>

                                          <router-link :to="{ name: '', params: {} }" class="btn btn-secondary btn-sm">View Loan</router-link>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              </div>




          </div><!-- end row -->
          <div class="row">
              <div class="col-xl-9">
              </div>
          </div><!-- end row -->


</div>
</template>


<script>
export default {
  data() {
      return {
          post:[],
          shares: [],
          loans:[],
      }
  },

  computed:{
    totalShares: function() {
        var total = 0;
        this.shares.forEach(function(item) {
          total += parseInt(item.amount);

        });
      //  this.form.total = total;
        return total;

    },
    totalLoan: function() {
        var total = 0;
        this.loans.forEach(function(item) {
          total += parseInt(item.amount);

        });
      //  this.form.total = total;
        return total;

    },
  },

  mounted: function() {
      this.fetchShares();
      this.fetchLoan();
      this.fetchVehicle();
  },

  methods:{
    fetchShares:function(){
      let url = `/api/membershares/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.shares = response.data;
          });
    },

    fetchLoan:function(){
      let url = `/api/vehicleloan/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.loans = response.data;
          });
  },
  fetchVehicle:function(){
    let url = `/api/vehicle/${this.$route.params.id}`;
    this.axios.get(url)
        .then((response) => {
            this.post = response.data;
        });
},
    }
  }


</script>
