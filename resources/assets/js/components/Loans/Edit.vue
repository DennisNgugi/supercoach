<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Loans</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings mr-1"></i> Settings</button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated"><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something
                                        else here</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add Loan</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form submit.prevent="add">

                      <fieldset>
                        <legend>Loan Information</legend>
                        <div :class="['form-group row',allerrors.date ? 'has-error' : '']">

                            <label class="col-sm-2 col-form-label">Date loan given</label>
                            <div class="col-sm-10">
                                <input type="date" id="date" v-model="post.date" class="form-control" placeholder="">
                                <span v-if="allerrors.date" :class="['label label-danger']"><p style="color:red;">{{ allerrors.date[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.member ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member</label>
                            <div class="col-sm-10">
                                <Select  id="member"  v-model="post.member" class="form-control" placeholder="">
                                  <option value="">Choose Member</option>

                                  <option value=""></option>

                                </select>
                                <span v-if="allerrors.member" :class="['label label-danger']"><p style="color:red;">{{ allerrors.member[0]}}</p></span>

                            </div>
                        </div>

                        <div :class="['form-group row',allerrors.vehicle_no ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Vehicle number
                            </label>
                            <div class="col-sm-10">
                                <Select  id="vehicle"  v-model="post.vehicle_no" class="form-control" placeholder="">
                                  <option value="">choose vehicle</option>

                                </select>
                                <span v-if="allerrors.vehicle_no" :class="['label label-danger']"><p style="color:red;">{{ allerrors.vehicle_no[0]}}</p></span>

                            </div>
                        </div>

                        <div :class="['form-group row',allerrors.amount ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Amount loaned</label>
                            <div class="col-sm-10">
                                <input type="amount" id="amount"  v-model="post.amount" class="form-control" placeholder="">
                                <span v-if="allerrors.amount" :class="['label label-danger']"><p style="color:red;">{{ allerrors.amount[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.rate ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Interest rate per month</label>
                            <div class="col-sm-10">
                                <input type="text" id="rate" v-model="post.rate" class="form-control" placeholder="">
                                <span v-if="allerrors.rate" :class="['label label-danger']"><p style="color:red;">{{ allerrors.rate[0]}}</p></span>

                            </div>



                        </div>
                        <div :class="['form-group row',allerrors.duration ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Duration in months</label>
                            <div class="col-sm-10">
                                <input type="text" id="duration" v-model="post.duration" class="form-control" placeholder="">
                                <span v-if="allerrors.duration" :class="['label label-danger']"><p style="color:red;">{{ allerrors.duration[0]}}</p></span>

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
    </div><!-- end row -->

  </div>
</template>

<script>
export default {

    data() {
        return {

            vehicle: [],
            member: [],

            post: {
                date: '',
                duration:'',
                amount: '',
                vehicle_no: '',
                member: '',
                rate:''


            },
            allerrors: [],
        }
    },
    mounted: function() {
        this.fetchMember();
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


            form.append('name', self.post.name);
            form.append('rate', self.post.rate);
            form.append('amount', self.post.amount);
            form.append('date', self.post.date);
            form.append('duration', self.post.duration);
            form.append('member', self.post.member);
            form.append('vehicle_no', self.post.vehicle_no);


            //let params = Object.assign({}, self.post);
            axios.post('/api/products', form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.name = '';
                    self.post.duration = '';
                    self.post.amount = '';
                    self.post.member = '';
                    self.post.vehicle_no = '';
                    self.post.date = '';
                    self.post.rate = '';

                    toast.fire({
                        type: 'success',
                        title: 'Loan added successfully'
                    })
                    //flash('post added Succesfully', 'success');
                })
                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                });
            return;
        },
    }
}
</script>


<style lang="css" scoped>
</style>
