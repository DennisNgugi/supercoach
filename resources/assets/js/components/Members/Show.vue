<template>
<div>
          <!-- Page-Title -->
          <div class="row">
              <div class="col-sm-12">
                  <div class="page-title-box">
                      <div class="row align-items-center">
                          <div class="col-md-8">
                              <h4 class="page-title mt-3">Member Details</h4>
                          </div>
                          <div class="col-md-4">
                              <div class="float-right d-none d-md-block">
                                  <router-link class="btn btn-primary"to="/member">Back to Members List</router-link>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div><!-- end page title end breadcrumb -->
          <div class="row">

            <div class="col-xl-2 col-md-6">
              <!-- <img :src="'/images/' +post.image" class="rounded-circle mb-3" alt=""> -->
                <h4 class="page-title mt-3">{{post.name}}</h4> <br>
                <p v-if="post.status == 'Active'" class="page-title">Status: <span class="text-success">
              <b>{{post.status}}</b>
                </span> </p>
                <p v-else class="page-title">Status: <span class="text-danger">Inactive</span> </p>
                  <p v-if="post.email == null" class="text-muted text-dark">Email: <b>N/A</b> </p>
                <p v-else class="text-muted text-dark">Email: <b>{{post.email}}</b> </p>
                <p class="text-muted text-dark">Phone: <b>0{{post.mobile}}</b> </p>
                <p v-if="post.national_id == null" class="text-muted text-dark">National ID: <b>N/A</b> </p>
                <p v-else class="text-muted text-dark">National ID: <b>{{post.national_id}}</b> </p>
                <p class="text-muted text-dark">Date Registered: <b>{{post.registration_date|date}}</b> </p>

            </div>

              <div class="col-xl-3 col-md-6">
                  <div class="card bg-primary mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Total Shares</h6>
                              <h4 class="mb-3 mt-0 float-right">{{totalShares|formatNumber}}</h4>
                          </div>
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>

                      </div>
                  </div>
                  <div class="card bg-success mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Loan amount</h6>
                              <h4 class="mb-3 mt-0 float-right">{{totalLoan|formatNumber}}</h4>
                          </div>
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>

                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-secondary mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Withdrawn Shares</h6>
                              <h4 class="mb-3 mt-0 float-right">{{totalWithdrawanShares|formatNumber}}</h4>
                          </div>
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>

                      </div>
                  </div>
                  <div class="card bg-warning mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Loan paid</h6>
                              <h4 class="mb-3 mt-0 float-right">{{totalLoan|formatNumber}}</h4>
                          </div>
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>

                      </div>
                  </div>
              </div>


              <div class="col-xl-3 col-md-6">
                  <div class="card bg-pink mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Current balance</h6>
                              <h4 class="mb-3 mt-0 float-right">{{currentBalance|formatNumber}}</h4>
                          </div>
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>

                      </div>
                  </div>
                  <div class="card bg-info mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Dividends this year</h6>
                              <h4 class="mb-3 mt-0 float-right">{{this.dividends|formatNumber}}</h4>
                          </div>
                      </div>
                      <div class="p-3">
                          <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>

                      </div>
                  </div>

              </div>


              <div class="col-xl-2">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title mb-4">Vehicles Owned</h4>
                          <div class="latest-massage"><a href="#" class="latest-message-list">
                                  <div class="border-bottom position-relative">
                                        <div v-for=" v in post.vehicle" class="massage-desc">
                                          <h5 class="font-14 mt-0 text-dark">{{v.registration_no}}</h5>

                                      </div>
                                  </div>
                              </a></div>
                      </div>
                  </div>
              </div><!-- end col -->



          </div><!-- end row -->
          <div class="row">
              <div class="col-xl-4">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title mb-4">Shares Trasaction
                            <span class="float-right">
                              <button type="button" @click.prevent="downloadIndividualMemberShares" class="btn btn-secondary btn-sm" name="button">Download report</button>
                            </span>
                          </h4>

                          <div class="table-responsive">
                              <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th scope="col">Amount</th>
                                          <th scope="col">Payment Date</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(p,index) in shares" @key="index">

                                          <th scope="row">{{index+1}}</th>
                                          <td>{{p.amount|formatNumber}}</td>
                                          <td>{{p.payment_date|date}}</td>


                                      </tr>



                                  </tbody>
                                  <tr>
                                    <td  rowspan="1"><b>Total</b></td>
                                    <td style="color:red; text-align:center;" rowspan="1" ><b>{{totalShares|formatNumber}}</b></td>

                                  </tr>

                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Applied Loan Report</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#.</th>
                                        <th scope="col">Loan ID</th>
                                        <th scope="col">Amount loaned</th>
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
                                        <td>{{p.amount |formatNumber}}</td>
                                        <td>{{p.interest_rate}}</td>
                                        <td>{{p.duration}}</td>
                                        <td>{{p.date|date}}</td>
                                        <td>

                                          <router-link :to="{ name: 'view_member_loan', params: {id: p.id} }" class="btn btn-secondary btn-sm">View Loan</router-link>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              </div>

              <!-- <div class="col-xl-3">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title mb-4">Document files</h4>
                          <table class="table table-striped mb-0">
                              <tbody>
                                  <tr>
                                      <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                      <td>
                                          <h6 class="mt-0">2015</h6>
                                          <p class="text-muted mb-0">dolor sit amet</p>
                                      </td>
                                      <td><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a></td>
                                  </tr>
                                  <tr>
                                      <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                      <td>
                                          <h6 class="mt-0">2016</h6>
                                          <p class="text-muted mb-0">dolor sit amet</p>
                                      </td>
                                      <td><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a></td>
                                  </tr>
                                  <tr>
                                      <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                      <td>
                                          <h6 class="mt-0">2017</h6>
                                          <p class="text-muted mb-0">pretium quis</p>
                                      </td>
                                      <td><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a></td>
                                  </tr>
                                  <tr>
                                      <td><i class="far fa-file-pdf text-primary h2"></i></td>
                                      <td>
                                          <h6 class="mt-0">2018</h6>
                                          <p class="text-muted mb-0">ultricies nec</p>
                                      </td>
                                      <td><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-download"></i></a></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div> -->
          </div><!-- end row -->
            <div class="row">
              <div class="col-xl-4">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="mt-0 header-title mb-4">Withdrawal Trasaction
                            <span class="float-right">
                              <button type="button" @click.prevent="downloadIndividualWithdrawnMemberShares" class="btn btn-secondary btn-sm" name="button">Download report</button>
                            </span>
                          </h4>

                          <div class="table-responsive">
                              <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th scope="col">Amount</th>
                                          <th scope="col">Withdrawal Date</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(p,index) in withdrawnShares" @key="index">

                                          <th scope="row">{{index+1}}</th>
                                          <td>{{p.amount|formatNumber}}</td>
                                          <td>{{p.date|date}}</td>


                                      </tr>



                                  </tbody>
                                  <tr>
                                    <td  rowspan="1"><b>Total</b></td>
                                    <td style="color:red; text-align:center;" rowspan="1" ><b>{{totalWithdrawanShares|formatNumber}}</b></td>

                                  </tr>

                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-5">
                <div class="card m-b-20">
                  <div class="card-body">
                      <h4 class="mt-0 header-title mb-4"><b>Monthly shares ({{myYear}})</b>
                        <span class="float-right">
                          <!-- <button type="button" @click.prevent="monthlyDividendsDownload" class="btn btn-secondary btn-sm" name="button">Download report</button> -->
                        </span>

                      </h4>

                      <div class="table-responsive">
                          <table class="table table-vertical">
                            <thead>
                              <tr>
                                <th>Month</th>
                                <th>Total</th>

                            </tr>
                            </thead>
                              <tbody>
                              <tr v-for="(i,index) in monthlydividends" @key="index">
                                  <td>
                                      <img src="/img/calendar.png" alt="calendar-image" class="thumb-sm rounded-circle mr-2"/>
                                      {{i.month}}
                                  </td>
                                  <!-- <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td> -->
                                  <td>
                                    <b>{{i.total_amount}} /=</b>
                                      <!-- <p class="m-0 text-muted font-14">Amount</p> -->
                                  </td>


                              </tr>
                              <!-- <tr>

                              <td  rowspan="1"><b>Grand Total</b></td>
                              <td style="color:red; text-align:center;" rowspan="1" ><b>{{yearTotal}}</b></td>
                              <td style="color:red; text-align:center;" rowspan="1"><b> {{yearQuantity}}</b></td>


                              </tr> -->



                              </tbody>


                          </table>
                      </div>
                  </div>

                </div>

              </div>

            </div>

</div>
</template>


<script>
export default {
  data() {
      return {
        myYear : new Date().getFullYear(),
          post: {},
          shares:[],
          withdrawnShares:[],
          loans:[],
          dividends:null,
          monthlydividends:[]
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
    totalWithdrawanShares: function() {
        var total = 0;
        this.withdrawnShares.forEach(function(item) {
          total += parseInt(item.amount);

        });
      //  this.form.total = total;
        return total;

    },
    currentBalance:function(){
      var totalShares = 0;
      var withdrawnShares = 0;
      this.shares.forEach(function(item) {
        totalShares += parseInt(item.amount);

      });
      this.withdrawnShares.forEach(function(item) {
        withdrawnShares += parseInt(item.amount);

      });
      return totalShares-withdrawnShares;
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
      this.fetchWithdrawnShares();
      this.fetchDividends();
      this.fetchMonthlyDividends();

  },

  created() {
      let url = `/api/member/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.post = response.data;
          });
  },

  methods:{

    fetchShares:function(){
      let url = `/api/membershares/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.shares = response.data;
          });
    },
    fetchWithdrawnShares:function(){
      let url = `/api/memberwithdrawnshares/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.withdrawnShares = response.data;
          });
    },
    fetchLoan:function(){
      let url = `/api/memberloan/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.loans = response.data;
          });
  },
  fetchDividends:function(){
    let url = `/api/dividends/${this.$route.params.id}`;
    this.axios.get(url)
        .then((response) => {
            this.dividends = response.data;
        });
},
fetchMonthlyDividends:function(){
  let url = `/api/monthlydividends/${this.$route.params.id}`;
  this.axios.get(url)
      .then((response) => {
          this.monthlydividends = response.data;
      });
},
  downloadIndividualMemberShares:function(){
    let url = `/api/individual/shares/${this.$route.params.id}`;
    axios.get(url)
  },
  downloadIndividualWithdrawnMemberShares:function(){
    let url = `/api/individual/withdrawn/shares/${this.$route.params.id}`;
    axios.get(url)
  },
  }

}
</script>
