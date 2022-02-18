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
                            <form @submit.prevent="contentSave" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7 right-border">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Category</label>
                                                        <select class="form-control" name ="cat_id" v-model= "cat_id" @change= "getSubCategory">
                                                            <option :value="category.id" v-for="category in getCategoryList" :key="category.id">
                                                                {{ category.cat_name }}
                                                            </option>
                                                        </select>
                                                        <!-- <div v-if="form.errors.has('cat_id')" v-html="form.errors.get('cat_id')" /> -->
                                                        <!-- <has-error :form="form" field="cat_id"></has-error> -->
                                                        <div v-if = "errors && errors.cat_id">{{errors.cat_id[0]}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Sub Category</label>
                                                        <select class="form-control" name="sub_cat_id" v-model= "sub_cat_id">
                                                            <option :value="item.id" v-for="item in subCategory" :key="item.id">
                                                                {{ item.sub_cat_name }}
                                                            </option>
                                                        </select>
                                                        <!-- <div v-if="form.errors.has('cat_id')" v-html="form.errors.get('cat_id')" /> -->
                                                        <!-- <has-error :form="form" field="sub_cat_id"></has-error> -->
                                                         <div v-if = "errors && errors.sub_cat_id">{{errors.sub_cat_id[0]}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">upload image</label>
                                                <input type="file" class="form-control" name="contentImage" id="exampleInputEmail1" @change = "getFile" placeholder="Enter sub category name" />
                                                <!-- <div v-if="form.errors.has('sub_cat_name')" v-html="form.errors.get('sub_cat_name')" /> -->
                                                <has-error :form="form" field="contentImage"></has-error>
                                                <div v-if = "errors && errors.contentImage">{{errors.contentImage[0]}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Content Title</label>
                                                        <input type="text" class="form-control" name="title" v-model= "title" id="exampleInputEmail1" placeholder="Enter content title" />
                                                        <!-- <div v-if="form.errors.has('title')" v-html="form.errors.get('title')" /> -->
                                                         <div v-if = "errors && errors.title">{{errors.title[0]}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Content description</label>
                                                        <ckeditor :editor="editor" name="desc" v-model= "desc" :config="editorConfig"></ckeditor>
                                                        <!-- <div v-if="form.errors.has('title')" v-html="form.errors.get('title')" /> -->
                                                         <div v-if = "errors && errors.desc">{{errors.desc[0]}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Vedio URL</label>
                                                <input type="text" class="form-control" name="vedioUrl" v-model= "vedioUrl" id="exampleInputEmail1" placeholder="Enter url" />
                                                <!-- <div v-if="form.errors.has('vedioUrl')" v-html="form.errors.get('vedioUrl')" /> -->
                                                <div v-if = "errors && errors.vedioUrl">{{errors.vedioUrl[0]}}</div>
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
                                        Back</router-link>
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
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    name: "add",

    data() {
        return {
          subCategory: [],
          cat_id: '',
          sub_cat_id: '',
          title: '',
          desc: '',
          contentImage: '',
          vedioUrl: '',
          errors: {},



            editor: ClassicEditor,
            editorData: '<p class="ckeditor">Rich-text editor content.</p>',
            editorConfig: {
                // The configuration of the rich-text editor.
            },
            // form: new Form({
            //     cat_id: "",
            //     sub_cat_name: "",
            // }),
        }
    },

    mounted() {
        this.$store.dispatch("getCategoryList");
    },
    computed: {
        getCategoryList() {
            return this.$store.getters.categoryList;
        },
    },

    methods: {
      getSubCategory(){
        // console.log(this.$route.params.this.cat_id);
         axios.get('/getSubCategoryByCategoryId/'+this.cat_id).then((res) => {
          console.log(res);
          this.subCategory = res.data.subCategoryList;
          // this.form.fill(res.data.categoryById);
      }).catch((e) => {
          console.log(e);
      })
      },

      getFile(e){
        this.contentImage = e.target.files[0];
      },
        contentSave() {
          let form = new FormData;
          form.append('contentImage', this.contentImage);
          form.append('cat_id', this.cat_id);
          form.append('sub_cat_id', this.sub_cat_id);
          form.append('title', this.title);
          form.append('desc', this.desc);
          form.append('vedioUrl', this.vedioUrl);
            
              axios.post("/saveContent",form)
                .then((res) => {
                    console.log(res);
                    this.$router.push("/contentList");
                    Toast.fire({
                        icon: "success",
                        title: "Content Added successfully",
                    });
                })
                .catch((e) => {
                    console.log(e);
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>

<style>
.right-border {
    border-right: 1px solid black;
}

.ckeditor {
    color: blue;
}
</style>
