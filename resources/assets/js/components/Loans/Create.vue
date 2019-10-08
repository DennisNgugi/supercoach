<template lang="html">
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Loans</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                          <router-link class="btn btn-primary"to="/loan">Loan list</router-link>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-9">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add Loan</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="calculate">

                      <fieldset>
                        <!-- <div :class="['form-group row',allerrors.date ? 'has-error' : '']">

                            <label class="col-sm-2 col-form-label">Date loan given</label>
                            <div class="col-sm-10">
                                <input type="date" id="date" v-model="post.date" class="form-control" placeholder="">
                                <span v-if="allerrors.date" :class="['label label-danger']"><p style="color:red;">{{ allerrors.date[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.member ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member</label>
                            <div class="col-sm-10">
                                <select  id="member"  v-model="post.member" class="form-control" placeholder="">
                                  <option value="">Choose Member</option>
                                  <option v-for="p in member"v-bind:value="p.id" >{{p.name}}</option>


                                </select>
                                <span v-if="allerrors.member" :class="['label label-danger']"><p style="color:red;">{{ allerrors.member[0]}}</p></span>

                            </div>
                        </div> -->

                        <div :class="['form-group row',allerrors.duration ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Duration in months</label>
                            <div class="col-sm-10">
                                <input type="text" id="duration" autocomplete="off" v-model="post.duration" class="form-control" placeholder="">
                                <span v-if="allerrors.duration" :class="['label label-danger']"><p style="color:red;">{{ allerrors.duration[0]}}</p></span>

                            </div>
                        </div>


                        <div :class="['form-group row',allerrors.amount ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Amount loaned</label>
                            <div class="col-sm-10">
                                <input type="amount" id="amount" autocomplete="off" v-model="post.amount" class="form-control" placeholder="">
                                <span v-if="allerrors.amount" :class="['label label-danger']"><p style="color:red;">{{ allerrors.amount[0]}}</p></span>
                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.rate ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Interest rate per month</label>
                            <div class="col-sm-10">
                                <input type="text" id="rate" autocomplete="off" v-model="post.rate" class="form-control" placeholder="">
                                <span v-if="allerrors.rate" :class="['label label-danger']"><p style="color:red;">{{ allerrors.rate[0]}}</p></span>

                            </div>



                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                  <input type="submit" id="loan_submit" class="btn btn-success btn-round" value="Submit">
                            </div>
                    </div>
                    </fieldset>

                    </form>


                </div>
            </div>
        </div><!-- end col -->
        <div class="col-3">
          <div class="card  mini-stat ">
              <div class="p-3 mini-stat-desc">
                  <div class="clearfix">
                      <h6 class="text-uppercase mt-0 float-left text-dark-50">Principal</h6>
                      <h4 class="mb-3 mt-0 float-right">{{calculatePrincipal}}</h4>
                  </div>
                  <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
              </div>

          </div>
          <div class="card  mini-stat ">
              <div class="p-3 mini-stat-desc">
                  <div class="clearfix">
                      <h6 class="text-uppercase mt-0 float-left text-dark-50">Interest</h6>
                      <h4 class="mb-3 mt-0 float-right">{{initialInterest}}</h4>
                  </div>
                  <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
              </div>

          </div>
          <div class="card y mini-stat ">
              <div class="p-3 mini-stat-desc">
                  <div class="clearfix">
                      <h6 class="text-uppercase mt-0 float-left text-dark-50">Duration</h6>
                      <h4 class="mb-3 mt-0 float-right">{{this.post.duration}}</h4>
                  </div>
                  <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
              </div>

          </div>
        </div>
            </div><!-- end row -->

            <div class="row">
              <div class="card y mini-stat ">
                  <div class="p-3 mini-stat-desc">
                      <div class="clearfix">
                          <table class="table table-striped">
                            <tr v-for="item in rowData" >
                            <th scope="row">{{ item.count }}</th>
                            <td>{{ item.monthlyPrincipal }}</td>
                            <td>{{ item.balance }}</td>
                            <td>{{ item.interest }}</td>

                            </tr>
                          </table>
                      </div>
                      <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                  </div>

              </div>
            </div>

  </div>
</template>

<script>
export default {

    data() {
        return {


          //  member: [],

            post: {
                date: '',
                duration:'',
                amount: '',

                member: '',
                rate:''
            },
            allerrors: [],
            rowData:[]
        }
    },
    computed:{
      calculatePrincipal(){
        var amount= this.post.amount;
        var duration = this.post.duration;
        var principal = amount/duration;
        return principal.toFixed(2);
      },
      initialInterest(){
        return this.post.amount*0.01
      },
          },
    mounted: function() {
        // this.fetchMember();
        // this.amortizationTable();
    },

    methods: {

        calculate:function(){
            var balance = this.post.amount;
            var interestRate = this.post.rate /100;
            var terms = this.post.duration;

            var monthlyRate = interestRate/12;
            var payment = balance * (monthlyRate/(1-Math.pow(
      1+monthlyRate, -terms)));

      for (var count = 0; count < terms; ++count){
        //in-loop interest amount holder
		var interest = 0;

		//in-loop monthly principal amount holder
		var monthlyPrincipal = 0;

    var count = count + 1;
    interest = balance * monthlyRate;
    monthlyPrincipal = payment - interest;

    var my_object = {
      interest:interest,
      count:count,
      balance:balance,
      monthlyPrincipal:monthlyPrincipal,

    };
    this.rowData.push(my_object)
      }


        }

        // fetchMember: function() {
        //     console.log('Fetching data....');
        //
        //     this.axios.get('/api/member').then((response) => {
        //         //  console.log(response.data);
        //         this.member = response.data.data;
        //     }).catch((error) => {
        //         console.log(error);
        //     })
        // },

        // add: function() {
        //
        //     let self = this;
        //     form = new FormData();
        //
        //
        //     form.append('rate', self.post.rate);
        //     form.append('amount', self.post.amount);
        //     form.append('date', self.post.date);
        //     form.append('duration', self.post.duration);
        //     form.append('member', self.post.member);
        //
        //
        //     //let params = Object.assign({}, self.post);
        //     axios.post('/api/loan', form)
        //         .then((response) => {
        //             self.allerrors = [];
        //             self.post.duration = '';
        //             self.post.amount = '';
        //             self.post.member = '';
        //             self.post.date = '';
        //             self.post.rate = '';
        //
        //             toast.fire({
        //                 type: 'success',
        //                 title: 'Loan added successfully'
        //             })
        //           this.$route.push('/loan')
        //             //flash('post added Succesfully', 'success');
        //         })
        //         .catch((error) => {
        //             self.allerrors = error.response.data.errors;
        //         });
        //     return;
        // },
    }
}
</script>


<style lang="css" scoped>
</style>
