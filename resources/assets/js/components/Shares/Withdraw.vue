<template lang="html">
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Withdraw Shares</h4>
                    </div>
                    <div class="col-md-4">
                      <router-link class="btn btn-primary"to="/share">Shares list</router-link>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Withdraw shares</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add" enctype="multipart/form-data">


                        <div :class="['form-group row',allerrors.member_id ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member name
                            </label>
                            <div class="col-sm-10">
                                <select  id="member"  v-model="post.member_id" class="form-control" placeholder="">
                                      <option value="">Choose Member</option>
                                      <option v-for="p in member" v-bind:value="p.id" >{{p.name}}</option>
                                </select>
                                <span v-if="allerrors.member_id" :class="['label label-danger']"><p style="color:red;">{{ allerrors.member_id[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.amount ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Withdrawal Amount</label>
                            <div class="col-sm-10">
                                <input type="text" id="amount"  v-model="post.amount" class="form-control" placeholder="">
                                <span v-if="allerrors.amount" :class="['label label-danger']"><p style="color:red;">{{ allerrors.amount[0]}}</p></span>

                            </div>
                        </div>

                        <div :class="['form-group row',allerrors.payment_date ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Payment date</label>
                            <div class="col-sm-10">
                                <input type="date" id="payment_date" v-model="post.payment_date" class="form-control" value="" placeholder="">
                                <!-- <FunctionalCalendar  :is-modal='true' :date-format="'yyyy/mm/dd'" v-model="post.payment_date"  :is-date-picker='true'></FunctionalCalendar> -->
                                <span v-if="allerrors.payment_date" :class="['label label-danger']"><p style="color:red;">{{ allerrors.payment_date[0]}}</p></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" id="shares_submit" class="btn btn-success btn-round" value="Submit">
                            </div>
                    </div>
                  </form>


                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <!-- <h4 class="mt-0 header-title">Example</h4>
                    <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                  <th>Member number</th>
                                <th>Member name</th>

                                <th>Amount withdrawn</th>

                                <th>Withdrawal Date</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr v-for="(p,index) in withdrawaldata" @key="index">
                                <td>{{index+1}}</td>
                                <td>{{p.number}}</td>
                                <td>{{p.name}}</td>
                                <td>{{p.amount}}</td>

                                <td>{{p.date|date}}</td>
                                <td>


                                <input type="submit" @click.prevent="disable(p.id)" class="btn btn-danger btn-sm" value="Delete">
                                </td>

                              </tr>
                            </tbody>
                          </table>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->

  </div>
</template>

<script>
//import { FunctionalCalendar } from 'vue-functional-calendar';
export default {
  // components: {
  //       FunctionalCalendar
  //   },
    data() {
        return {

            member: [],
            withdrawaldata: [],
            post: {
                member_id:'',
                amount: '',
                payment_date: '',
            },
            allerrors: [],
        }
    },
    mounted: function() {
        this.fetchMember();
        this.fetchWithdrawnShares();
    },

    methods: {

        fetchMember: function() {


            this.axios.get('/api/member').then((response) => {
                //  console.log(response.data);
                this.member = response.data.data;
            }).catch((error) => {
                console.log(error);
            })
        },
        fetchWithdrawnShares: function() {


            this.axios.get('/api/sharewithdrawal').then((response) => {
                // console.log(response.data);
                this.withdrawaldata = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },

        add: function() {

            let self = this;
            form = new FormData();



            form.append('member_id', self.post.member_id);

            form.append('amount', self.post.amount);
            form.append('payment_date', self.post.payment_date);


            //let params = Object.assign({}, self.post);
            axios.post('/api/share/withdraw', form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.member_id = '';
                    self.post.amount = '';
                    self.post.payment_date = '';
                    this.fetchWithdrawnShares();
                    toast.fire({
                        type: 'success',
                        title: 'Shares withdrawn from account successfully'
                    })
                    //flash('post added Succesfully', 'success');
                })

                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                });
            return;
        },
        disable(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value) {
                  let uri = `/api/sharewithdrawal/${id}`;
                  this.axios.delete(uri).then(response => {
                      this.withdrawaldata.splice(this.withdrawaldata.indexOf(id), 1);
                      this.fetchData();
                  });
                    swal.fire(
                        'Deleted!',
                        'This information has been deleted.',
                        'success'
                    )
                }
            }).
            catch(()=>{
              swal("Failed","There was something wrong","warning");
            })


        }

    }
}
</script>


<style lang="css" scoped>
</style>
