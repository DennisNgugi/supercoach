<template lang="html">
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Vehicles</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                          <router-link class="btn btn-primary"to="/vehicle">Vehicle List</router-link>

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
                    <h4 class="mt-0 header-title">Add vehicle</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add">
                      <div :class="['form-group row',allerrors.registration_no ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Vehicle registration number</label>
                            <div class="col-sm-10">
                                <input type="text" id="registration_no" v-model="post.registration_no" class="form-control" placeholder="">
                                <span v-if="allerrors.registration_no" :class="['label label-danger']"><p style="color:red;">{{ allerrors.registration_no[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.member_id ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Owner name</label>
                            <div class="col-sm-10">
                                <select id="member_id"  v-model="post.member_id" class="form-control" placeholder="">
                                  <option value="">Choose owner</option>
                                  <option v-for="p in member"v-bind:value="p.id" >{{p.name}}</option>

                                </select>
                                <span v-if="allerrors.member_id" :class="['label label-danger']"><p style="color:red;">{{ allerrors.member_id[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.registration_date ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Registration date</label>
                            <div class="col-sm-10">
                                <input type="date" id="registration_date" v-model="post.registration_date" class="form-control" placeholder="">
                                <span v-if="allerrors.registration_date" :class="['label label-danger']"><p style="color:red;">{{ allerrors.registration_date[0]}}</p></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" id="vehicles_submit" class="btn btn-success btn-round" value="Submit">
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
export default {

    data() {
        return {

            member: [],

            post: {
                registration_no: '',
                member_id:'',
                registration_date: '',


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



            form.append('registration_no', self.post.registration_no);
            form.append('member_id', self.post.member_id);

            form.append('registration_date', self.post.registration_date);


            //let params = Object.assign({}, self.post);
            axios.post('/api/vehicle', form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.registration_no = '';
                    self.post.member_id = '';
                    self.post.registration_date = '';

                    toast.fire({
                        type: 'success',
                        title: 'Vehicle added successfully'
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
