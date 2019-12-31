<template >
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
                    <h4 class="mt-0 header-title">Upload schedule (Only accepts Excel files with organized data as specified)</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="upload" enctype="multipart/form-data">

                      <fieldset>


                        <div :class="['form-group row',allerrors.file ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Upload amortization schedule </label>
                            <div class="col-sm-10">
                              <!-- <div class="col-md-3" v-if="post.file">
                              </div> -->
                              <input type="file" ref="file" class="form-control"  aria-describedby="fileHelp">

                                  <span v-if="allerrors.file" :class="['label label-danger']"><p style="color:red;">{{ allerrors.file[0]}}</p></span>



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
export default{
data(){
  return{
    allerrors:[]
  }

},
methods:{
upload() {
    this.formData = new FormData();
    this.formData.append('file', this.$refs.file.files[0]);
    let url = `/schedule/${this.$route.params.id}`;
    axios.post(url, this.formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
            // handle success response
            this.allerrors = [];
            console.log(response);
            toast.fire({
                type: 'success',
                title: 'Amortization data added successfully'
            })
              this.$router.push({ name: 'loan' })
    }).catch(error => {
        // handle failed response

          this.allerrors = error.response.data.errors;
        console.log(error);
        toast.fire({
            type: 'error',
            title: 'Amortization data not added. Check your inputs!'
        })
        window.location.reload(true);
    });
},
}
}
</script>


<style lang="css" scoped>
</style>
