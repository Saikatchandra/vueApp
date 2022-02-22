<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Content update</h1>
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
                  <h3 class="card-title">Update Content</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form @submit.prevent="updateContent">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-7 right-border">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Select Category</label
                              >
                              <select
                                class="form-control"
                                name="cat_id"
                                v-model="cat_id"
                                @change="getSubCategory"
                              >
                                <option
                                  :value="category.id"
                                  v-for="category in getCategoryList"
                                  :key="category.id"
                                >
                                  {{ category.cat_name }}
                                </option>
                              </select>
                              <!-- <div v-if="form.errors.has('cat_id')" v-html="form.errors.get('cat_id')" /> -->
                              <!-- <has-error :form="form" field="cat_id"></has-error> -->
                              <div v-if="errors && errors.cat_id">
                                {{ errors.cat_id[0] }}
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Select Sub Category</label
                              >
                              <select
                                class="form-control"
                                name="sub_cat_id"
                                v-model="sub_cat_id"
                              >
                                <option
                                  :value="item.id"
                                  v-for="item in subCategory"
                                  :key="item.id"
                                >
                                  {{ item.sub_cat_name }}
                                </option>
                              </select>
                              <!-- <div v-if="form.errors.has('cat_id')" v-html="form.errors.get('cat_id')" /> -->
                              <!-- <has-error :form="form" field="sub_cat_id"></has-error> -->
                              <div v-if="errors && errors.sub_cat_id">
                                {{ errors.sub_cat_id[0] }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">upload image</label>
                          <input
                            type="file"
                            class="form-control"
                            name="file"
                            id="exampleInputEmail1"
                            @change="getFile"
                            placeholder="Enter sub category name"
                          />
                          <!-- <div v-if="form.errors.has('sub_cat_name')" v-html="form.errors.get('sub_cat_name')" /> -->

                          <div v-if="errors && errors.file">
                            {{ errors.file[0] }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Content Title</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                name="title"
                                v-model="title"
                                id="exampleInputEmail1"
                                placeholder="Enter content title"
                              />
                              <!-- <div v-if="form.errors.has('title')" v-html="form.errors.get('title')" /> -->
                              <div v-if="errors && errors.title">
                                {{ errors.title[0] }}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1"
                                >Content details</label
                              >
                              <textarea
                                class="form-control"
                                name="details"
                                v-model="details"
                                id="exampleInputEmail1"
                              ></textarea>

                              <!-- <div v-if="form.errors.has('title')" v-html="form.errors.get('title')" /> -->
                              <div v-if="errors && errors.details">
                                {{ errors.details[0] }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Vedio URL</label>
                          <input
                            type="text"
                            class="form-control"
                            name="vedioUrl"
                            v-model="vedioUrl"
                            id="exampleInputEmail1"
                            placeholder="Enter url"
                          />
                          <!-- <div v-if="form.errors.has('vedioUrl')" v-html="form.errors.get('vedioUrl')" /> -->
                          <div v-if="errors && errors.vedioUrl">
                            {{ errors.vedioUrl[0] }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">
                      Submit
                    </button>
                    <router-link to="/contentList" class="btn btn-warning">
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

  data() {
    return {
      subCategory: [],
      cat_id: "",
      sub_cat_id: "",
      title: "",
      details: "",
      file: "",
      vedioUrl: "",
      errors: {},
    };
  },

  computed: {
    getCategoryList() {
      return this.$store.getters.categoryList;
    },
    // getSubCategoryList() {
    //   return this.$store.getters.subCategoryList;
    // },
  },

  created() {
    axios.get("/subCategoryList").then((response) => {
      // alert('hi');
      console.log(response);
      this.subCategory = response.data.subCategoryList;
    });

    axios
      .get("/getContentById/" + this.$route.params.contentId)
      .then((res) => {
        console.log(res.data.contentById);
        this.cat_id = res.data.contentById.category_id;
        this.sub_cat_id = res.data.contentById.subCategory_id;
        this.title = res.data.contentById.title;
        this.details = res.data.contentById.details;
        this.vedioUrl = res.data.contentById.vedioUrl;
        // this.form.fill(res.data.subCategoryById);
      })
      .catch((e) => {
        console.log(e);
      });
  },

  mounted() {
    this.$store.dispatch("getCategoryList");
    // this.$store.dispatch("getSubCategoryList");
  },

  methods: {
    updateContent() {
       let form = new FormData;
          form.append('file', this.file);
          form.append('cat_id', this.cat_id);
          form.append('sub_cat_id', this.sub_cat_id);
          form.append('title', this.title);
          form.append('details', this.details);
          form.append('vedioUrl', this.vedioUrl);
            
              axios.post(`/updateContent/${this.$route.params.contentId}`,form)
                .then((res) => {
                    console.log(res);
                    this.$router.push("/contentList");
                    Toast.fire({
                        icon: "success",
                        title: "Content updated successfully",
                    });
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors;
                });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>