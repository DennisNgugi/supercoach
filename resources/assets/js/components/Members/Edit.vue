<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Members</h4>
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
                    <h4 class="mt-0 header-title">Add member</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->

                    <form @submit.prevent="update">

                      <div :class="['form-group row',allerrors.name ? 'has-error' : '']">

                            <label class="col-sm-2 col-form-label">Member name</label>
                            <div class="col-sm-10">
                                <input type="text" v-model="post.name" class="form-control" placeholder="">
                                <span v-if="allerrors.name" :class="['label label-danger']"><p style="color:red;">{{ allerrors.name[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.email ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email"  v-model="post.email" class="form-control" placeholder="">
                                <span v-if="allerrors.email" :class="['label label-danger']"><p style="color:red;">{{ allerrors.email[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.national_id ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">National ID</label>
                            <div class="col-sm-10">
                                <input type="national_id" id="national_id"  v-model="post.national_id" class="form-control" placeholder="">
                                <span v-if="allerrors.national_id" :class="['label label-danger']"><p style="color:red;">{{ allerrors.national_id[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.mobile ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member mobile</label>
                            <div class="col-sm-10">
                                <input type="text" id="mobile" v-model="post.mobile" class="form-control" placeholder="">
                                <span v-if="allerrors.mobile" :class="['label label-danger']"><p style="color:red;">{{ allerrors.mobile[0]}}</p></span>

                            </div>
                        </div>

                        <div :class="['form-group row',allerrors.registration_date ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Registration date</label>
                            <div class="col-sm-10">
                                <input type="date" id="registration_date" v-model="post.registration_date" class="form-control" placeholder="">
                                <span v-if="allerrors.registration_date" :class="['label label-danger']"><p style="color:red;">{{ allerrors.registration_date[0]}}</p></span>

                            </div>
                        </div>
                            <div class="col-sm-10">
                                <input type="submit" id="member_submit" class="btn btn-success btn-round" value="Submit">
                            </div>
                                </form>
                    </div>




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

            post: {},
            allerrors: [],
        }
    },
      created(){
        let url = `/member/edit/${this.$route.params.id}`
        this.axios.get(url).then((response) => {
          console.log(response.data);
          this.post = response.data;
        });
      },

    methods: {
             update: function() {

            let self = this;
            form = new FormData();


            form.append('name', self.post.name);
            form.append('mobile', self.post.mobile);

            form.append('email', self.post.email);

            form.append('national_id', self.post.national_id);
            form.append('registration_date', self.post.registration_date);


            //let params = Object.assign({}, self.post);
            let uri = `/member/${this.$route.params.id}`;
            axios.put(uri, this.post)
                .then((response) => {
                    self.allerrors = [];
                    self.post.name = '';
                    self.post.email = '';
                    self.post.mobile = '';
                    self.post.registration_date = '';
                    self.post.national_id = '';


                    toast.fire({
                        type: 'success',
                        title: 'Member updated successfully'
                    })

                    this.$router.push({ name: 'member' })
                    //flash('post added Succesfully', 'success');
                })
                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                    toast.fire({
                        type: 'error',
                        title: 'Member not updated. Please Check your inputs!'
                    })
                });
            return;
        },
    }
}
</script>


<style lang="css" scoped>
</style>
