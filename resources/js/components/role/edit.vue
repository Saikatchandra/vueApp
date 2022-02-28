<template>
  <div>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Role update</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Role update</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  @submit.prevent="updateCategory">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="cat_name"
                        v-model="form.cat_name"
                        id="exampleInputEmail1"
                        placeholder="Enter category name"
                      />
                      <div
                        v-if="form.errors.has('cat_name')"
                        v-html="form.errors.get('cat_name')"
                      />
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">
                      Submit
                    </button>
                    <router-link to="/categoryList" class="btn btn-warning">
                      Back</router-link
                    >
                    <!-- <button type="submit" @click="goBack" class="btn btn-warning">Back</button> -->
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
</template>

<script>
import Form from "vform";
export default {
  name: "add",

   data: () => ({
    form: new Form({
      cat_name: "",
    }),
  }),

  mounted() {
      axios.get('/getCategoryById/'+this.$route.params.categoryId).then((res) => {
          console.log(res);
          this.form.fill(res.data.categoryById);
      }).catch((e) => {
          console.log(e);
      })
  },
  
  methods:{
    updateCategory(){
      this.form.post(`/updateCategory/${this.$route.params.categoryId}`)
      .then((res) => {
        console.log(res);
        this.$router.push('/categoryList');
        Toast.fire({
            icon: "success",
            title: "Category Updated successfully",
          });
      }).catch((e) => {
        console.log(e);
      })
    }
  }


};
</script>

<style lang="scss" scoped>
</style>