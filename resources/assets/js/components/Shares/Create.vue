<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Shares</h4>
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
                    <h4 class="mt-0 header-title">Add shares</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add" enctype="multipart/form-data">


                        <div :class="['form-group row',allerrors.member_id ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member name
                            </label>
                            <div class="col-sm-10">
                                <!-- <select  id="member"  v-model="post.member_id" class="form-control" placeholder="">
                                      <option value="">Choose Member</option>
                                      <option v-for="p in member" v-bind:value="p.id" >{{p.name}}</option>
                                </select> -->
                                <v-select  v-model="post.member_id" label="name" :options="member" :reduce="member => member.id" />

                                <span v-if="allerrors.member_id" :class="['label label-danger']"><p style="color:red;">{{ allerrors.member_id[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.amount ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Amount</label>
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

    },

    methods: {

        fetchMember: function() {
            console.log('Fetching data....');

            this.axios.get('/api/member').then((response) => {
                //  console.log(response.data);
                this.member = response.data.data;
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
            axios.post('/api/share', form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.member_id = '';
                    self.post.amount = '';
                    self.post.payment_date = '';

                    toast.fire({
                        type: 'success',
                        title: 'Shares added successfully'
                    })
                    //flash('post added Succesfully', 'success');
                })
                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                    toast.fire({
                        type: 'error',
                        title: 'Shares not added. Check your inputs again!'
                    })
                });
            return;
        },
    }
}
</script>


<style lang="css" scoped>
</style>
