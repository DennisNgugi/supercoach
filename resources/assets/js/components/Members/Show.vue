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

            <div class="col-xl-3 col-md-6">
              <img :src="'/images/' +post.image" class="rounded-circle mb-3" alt="">
                <h4 class="page-title mt-3">{{post.name}}</h4> <br>
                <p v-if="post.status == 'Active'" class="page-title">Status: <span class="text-success">{{post.status}}</span> </p>
                <p v-else class="page-title">Status: <span class="text-danger">Inactive</span> </p>

            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Profile</h4>
                        <div class="latest-massage"><a href="#" class="latest-message-list">
                                <div class="border-bottom position-relative">
                                      <div class="massage-desc">

                              <h5 class="font-14 mt-0 text-dark">Email:</h5>
                                        <p class="text-muted text-dark">{{post.email}}</p>
                                    </div>
                                </div>
                            </a><a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">
                                        <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Mobile</h5>
                                        <p class="text-muted text-dark">0{{post.mobile}}</p>
                                    </div>
                                </div>
                            </a><a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">

                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">National ID</h5>
                                        <p class="text-muted text-dark">{{post.national_id}}</p>
                                    </div>
                                </div>
                            </a><a href="#" class="latest-message-list">
                                <div class="border-bottom mt-3 position-relative">

                                    <div class="massage-desc">
                                        <h5 class="font-14 mt-0 text-dark">Date Registered</h5>
                                        <p class="text-muted text-dark">{{post.registration_date|date}}</p>
                                    </div>
                                </div>
                            </a>

                          </div>
                    </div>
                </div>
            </div><!-- end col -->

              <div class="col-xl-3 col-md-6">
                  <div class="card bg-primary mini-stat text-white">
                      <div class="p-3 mini-stat-desc">
                          <div class="clearfix">
                              <h6 class="text-uppercase mt-0 float-left text-white-80">Shares</h6>
                              <h4 class="mb-3 mt-0 float-right">{{totalShares}}</h4>
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
                              <h4 class="mb-3 mt-0 float-right">{{totalLoan}}</h4>
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
                          <h4 class="mt-0 header-title mb-4">Shares Trasaction for {{post.name}}
                            <span class="float-right">
                              <button type="button" @click.prevent="printme" class="btn btn-secondary btn-sm" name="button">Print report</button>
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
                                          <td>{{p.amount}}</td>
                                          <td>{{p.payment_date|date}}</td>


                                      </tr>



                                  </tbody>
                                  <tr>
                                    <td  rowspan="1"><b>Total</b></td>
                                    <td style="color:red; text-align:center;" rowspan="1" ><b>{{totalShares}}</b></td>

                                  </tr>

                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Applied Loan Report for {{post.name}}</h4>
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


</div>
</template>


<script>
export default {
  data() {
      return {
          post: {},
          shares:[],
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

  },

  created() {
      let url = `/api/member/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.post = response.data;
          });
  },

  methods:{
    printme(){
      window.print();
    },
    fetchShares:function(){
      let url = `/api/membershares/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.shares = response.data;
          });
    },
    fetchLoan:function(){
      let url = `/api/memberloan/${this.$route.params.id}`;
      this.axios.get(url)
          .then((response) => {
              this.loans = response.data;
          });
  },
  }

}
</script>
