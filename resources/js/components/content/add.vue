<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Content add</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category add</li>
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
                  <h3 class="card-title">Add new Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form
                  @submit.prevent="saveSubCategory"
                  @keydown="form.onKeydown($event)"
                >
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-8 right-border">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Select Category</label
                              >
                              <select
                                class="form-control"
                                name="cat_id"
                                v-model="form.cat_id"
                              >
                                <option
                                  :value="category.id"
                                  v-for="category in getCategoryList"
                                  :key="category.id"
                                >
                                  {{ category.cat_name }}
                                </option>
                              </select>
                              <div
                                v-if="form.errors.has('cat_id')"
                                v-html="form.errors.get('cat_id')"
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Select Sub Category</label
                              >
                              <select
                                class="form-control"
                                name="cat_id"
                                v-model="form.cat_id"
                              >
                                <option
                                  :value="category.id"
                                  v-for="category in getCategoryList"
                                  :key="category.id"
                                >
                                  {{ category.cat_name }}
                                </option>
                              </select>
                              <div
                                v-if="form.errors.has('cat_id')"
                                v-html="form.errors.get('cat_id')"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1"
                            >Sub Category Name</label
                          >
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
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Content Title</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                name="title"
                                v-model="form.title"
                                id="exampleInputEmail1"
                                placeholder="Enter content title"
                              />
                              <div
                                v-if="form.errors.has('title')"
                                v-html="form.errors.get('title')"
                              />
                            </div>
                          </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Content description</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                name="title"
                                v-model="form.title"
                                id="exampleInputEmail1"
                                placeholder="Enter content title"
                              />
                              <div
                                v-if="form.errors.has('title')"
                                v-html="form.errors.get('title')"
                              />
                            </div>
                          </div>
                         
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1"
                            >Sub Category Name</label
                          >
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

  mounted() {
    this.$store.dispatch("getCategoryList");
  },
  computed: {
    getCategoryList() {
      return this.$store.getters.categoryList;
    },
  },

  methods: {
    saveSubCategory() {
      this.form
        .post("/saveSubCategory")
        .then((res) => {
          console.log(res);
          this.$router.push("/subCategoryList");
          Toast.fire({
            icon: "success",
            title: "Sub Category Added successfully",
          });
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style>
.right-border{
  border-right: 1px solid black;
}
</style>