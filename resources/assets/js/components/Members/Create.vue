<template lang="html">
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Members</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                          <router-link class="btn btn-primary"to="/member">Members list</router-link>

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

                    <form @submit.prevent="add">

                      <div :class="['form-group row',allerrors.name ? 'has-error' : '']">

                            <label class="col-sm-2 col-form-label">Member name</label>
                            <div class="col-sm-10">
                                <input type="text" v-model="post.name" class="form-control" placeholder="">
                                <span v-if="allerrors.name" :class="['label label-danger']"><p style="color:red;">{{ allerrors.name[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.number ? 'has-error' : '']">

                              <label class="col-sm-2 col-form-label">Member number</label>
                              <div class="col-sm-10">
                                  <input type="text" v-model="post.number" class="form-control" placeholder="">
                                  <span v-if="allerrors.number" :class="['label label-danger']"><p style="color:red;">{{ allerrors.number[0]}}</p></span>

                              </div>
                          </div>
                        <div :class="['form-group row',allerrors.email ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email"  v-model="post.email" class="form-control" placeholder="">
                                <small class="text-muted">Optional</small>
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
                        <!-- <div :class="['form-group row',allerrors.image ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Member photo</label>
                            <div class="col-sm-10">
                              <div class="col-md-3" v-if="post.image">
                              </div>
                              <input type="file" v-on:change="onImageChange" class="form-control"  aria-describedby="fileHelp">
                                      <small class="text-muted">(optional)</small>
                                                            <span v-if="allerrors.image" :class="['label label-danger']"><p style="color:red;">{{ allerrors.image[0]}}</p></span>
                                <img :src="post.image" class="rounded" height="100" width="100" alt="">


                            </div>
                        </div> -->
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

            post: {
                name: '',
                number:'',
                email:'',
                national_id: '',
                mobile: '',
                //image: '',
                registration_date:''


            },
            allerrors: [],
        }
    },


    methods: {
        // onImageChange(e) {
        //     let files = e.target.files || e.dataTransfer.files;
        //     if (!files.length)
        //         return;
        //     this.createImage(files[0]);
        // },
        // createImage(file) {
        //     let reader = new FileReader();
        //     let vm = this;
        //     reader.onload = (e) => {
        //         vm.post.image = e.target.result;
        //     };
        //     reader.readAsDataURL(file);
        // },

        add: function() {

            let self = this;
            form = new FormData();

            // const config = {
            //     headers: {
            //         'content-type': 'multipart/form-data'
            //     }
            // }

            form.append('name', self.post.name);
            form.append('number', self.post.number);
            form.append('mobile', self.post.mobile);

            form.append('email', self.post.email);
            //form.append('image', self.post.image);
            form.append('national_id', self.post.national_id);
            form.append('registration_date', self.post.registration_date);


            //let params = Object.assign({}, self.post);
            axios.post('/api/member', form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.name = '';
                    self.post.number = '';
                    self.post.email = '';
                    self.post.mobile = '';
                    self.post.registration_date = '';
                    self.post.national_id = '';
                    //self.post.image = '';

                    toast.fire({
                        type: 'success',
                        title: 'Member added successfully'
                    })
                    //flash('post added Succesfully', 'success');
                })
                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                    toast.fire({
                        type: 'error',
                        title: 'Member not added. Check your inputs again!'
                    })
                });
            return;
        },
    }
}
</script>


<style lang="css" scoped>
</style>
