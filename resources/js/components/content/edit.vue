<template>
  <div>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Sub Category update</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sub Category update</li>
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
                  <h3 class="card-title">Update Sub Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  @submit.prevent="updateSubCategory">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select category</label>
                      <select name="cat_id" v-model="form.cat_id" id="" class="form-control">
                        <option :value="category.id" v-for="category in getCategoryList" :key="category.id">{{ category.cat_name }}</option>
                      </select>
                      <div
                        v-if="form.errors.has('sub_cat_name')"
                        v-html="form.errors.get('sub_cat_name')"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">SubCategory Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="sub_cat_name"
                        v-model="form.sub_cat_name"
                        id="exampleInputEmail1"
                        placeholder="Enter sub category name"
                      />
                      <div
                        v-if="form.errors.has('sub_cat_name')"
                        v-html="form.errors.get('sub_cat_name')"
                      />
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">
                      Submit
                    </button>
                    <router-link to="/subCategoryList" class="btn btn-warning">
                      Back</router-link
                    >
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
      cat_id: "",
      sub_cat_name: "",
    }),
  }),

 
  computed: {
    getCategoryList() {
      return this.$store.getters.categoryList;
    },
  },

  created(){
      axios.get('/getSubCategoryById/'+this.$route.params.subCategoryId).then((res) => {
          console.log(res);
          this.form.fill(res.data.subCategoryById);
      }).catch((e) => {
          console.log(e);
      })
  },

  mounted() {
    this.$store.dispatch("getCategoryList");
  },
  
  methods:{
    updateSubCategory(){
      this.form.post(`/updateSubCategory/${this.$route.params.subCategoryId}`)
      .then((res) => {
        console.log(res);
        this.$router.push('/subCategoryList');
        Toast.fire({
            icon: "success",
            title: "Sub Category Updated successfully",
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