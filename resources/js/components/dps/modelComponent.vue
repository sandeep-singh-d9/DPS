<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-9 card">
        <div class="card-header">
          <span>Editor {{ testID }}</span>
          <h2>
           </h2>
          <button class="pull-right" @click="privew">Preview</button>
        </div>
       
        <div class="card-body print">
          <div v-if="editorData.length > 0">
            <div v-for="(edit, index) in editorData" :key="index" class="abc">
              <!-- <a class="pull-right badge badge-pill badge-danger" style="cursor: pointer;" @click="editorData.splice(index, 1)">X</a> -->
              <div class="row" v-if="edit.type == 'fullwidth'">
                <div class="editor_open col-sm-12">
                  <div class="overlayeditor">
                    <div class="inner_editor">
                      <i class="fas fa-trash-alt" @click="editorData.splice(index, 1)"></i>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('underline', false, null)">
                        <i class="fas fa-underline"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('italic', false, null)">
                        <i class="fas fa-italic"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('bold', false, null)">
                        <i class="fas fa-bold"></i>
                      </button>
                    </div>
                  </div>
                  <div
                    v-html="edit.model.first"
                    @click="openModel(index, 'first'), getid()"
                    @focus="openModel(index, 'first')"
                    @hover="openModel(index, 'first')"
                    contenteditable="true"
                    @input="applyInputChange"
                    :id="'first_'+index"
                    class="cell"
                  ></div>
                </div>
              </div>
              <div class="row" v-if="edit.type == 'toside' ">
                <div class="editor_open col-sm-6">
                  <div class="overlayeditor">
                    <div class="inner_editor">
                      <i class="fas fa-trash-alt" @click="deleteData"></i>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('underline', false, null)">
                        <i class="fas fa-underline"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('italic', false, null)">
                        <i class="fas fa-italic"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('bold', false, null)">
                        <i class="fas fa-bold"></i>
                      </button>
                    </div>
                  </div>
                  <div
                    v-html="edit.model.second"
                    @click="openModel(index, 'second')"
                    @focus="openModel(index, 'second'), getid() "
                    @mouseover="openModel(index, 'second')"
                    contenteditable="true"
                    @input="applyInputChange"
                    :id="'second_'+index"
                    class="cell"
                  ></div>
                </div>
                <div class="editor_open col-sm-6">
                  <div class="overlayeditor">
                    <div class="inner_editor">
                      <i class="fas fa-trash-alt" @click="deleteData"></i>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('underline', false, null)">
                        <i class="fas fa-underline"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('italic', false, null)">
                        <i class="fas fa-italic"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('bold', false, null)">
                        <i class="fas fa-bold"></i>
                      </button>
                    </div>
                  </div>
                  <div
                    v-html="edit.model.third"
                    @click="openModel(index, 'third')"
                    @focus="openModel(index, 'third'), getid()"
                    @mouseover="openModel(index, 'third')"
                    contenteditable="true"
                    @input="applyInputChange"
                    :id="'third_'+index"
                    class="cell"
                  ></div>
                </div>
              </div>
              <div class="row" v-if="edit.type == 'threeside'">
                <div class="editor_open col-sm-4">
                  <div class="overlayeditor">
                    <div class="inner_editor">
                      <i class="fas fa-trash-alt" @click="deleteData"></i>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('underline', false, null)">
                        <i class="fas fa-underline"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('italic', false, null)">
                        <i class="fas fa-italic"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('bold', false, null)">
                        <i class="fas fa-bold"></i>
                      </button>
                    </div>
                  </div>
                  <div
                    v-html="edit.model.fourth"
                    @click="openModel(index, 'fourth')"
                    @focus="openModel(index, 'fourth') , getid()"
                     @mouseover="openModel(index, 'fourth')"
                    contenteditable="true"
                    @input="applyInputChange"
                    :id="'fourth_'+index"
                    class="cell"
                  ></div>
                </div>
                <div class="editor_open col-sm-4">
                  <div class="overlayeditor">
                    <div class="inner_editor">
                      <i class="fas fa-trash-alt" @click="deleteData"></i>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('underline', false, null)">
                        <i class="fas fa-underline"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('italic', false, null)">
                        <i class="fas fa-italic"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('bold', false, null)">
                        <i class="fas fa-bold"></i>
                      </button>
                    </div>
                  </div>
                  <div
                    v-html="edit.model.five"
                    @click="openModel(index, 'five')"
                    @focus="openModel(index, 'five'), getid()"
                      @mouseover="openModel(index, 'five')"
                    contenteditable="true"
                    @input="applyInputChange"
                    :id="'five_'+index"
                    class="cell"
                  ></div>
                </div>
                <div class="editor_open col-sm-4">
                  <div class="overlayeditor">
                    <div class="inner_editor">
                      <i class="fas fa-trash-alt" @click="deleteData"></i>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('underline', false, null)">
                        <i class="fas fa-underline"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('italic', false, null)">
                        <i class="fas fa-italic"></i>
                      </button>
                    </div>
                    <div class="inner_editor">
                      <button class="overlay_btn" @click="addfont('bold', false, null)">
                        <i class="fas fa-bold"></i>
                      </button>
                    </div>
                  </div>
                  <div
                    v-html="edit.model.six"
                    @click="openModel(index, 'six')"
                    @focus="openModel(index, 'six'), getid()"
                      @mouseover="openModel(index, 'six')"
                    contenteditable="true"
                    @input="applyInputChange"
                    :id="'six_'+index"
                    class="cell"
                  ></div>
                </div>
              </div>
              <input type v-model="edit.model" v-if="model" placeholder="sdfsdf">
            </div>
            <button @click="save">save</button>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- <p id="inputId" v-html="inputType" contenteditable="true" class="model_data" autofocus></p> -->
                </div>
                <div class="modal-footer">
                  <button @click="addfont('italic', false, null)">
                    <i>I</i>
                  </button>
                  <button @click="addfont('bold', false, null)">
                    <i>B</i>
                  </button>
                  <button @click="addfont('underline', false, null)">
                    <u>U</u>
                  </button>
                  <button @click="abc" id=1>2 columns</button>
                  <select @change="addfont('fontName', false , font)" v-model="font">
                    <option value>Select Font</option>
                    <option v-for="(font, index) in fontFamily" :key="index" :value="font.family" >{{ font.family }}</option>
                  </select>

                  <select @change="addfont(aligntext , false, null)" v-model="aligntext">
                    <option value="">Align</option>
                    <option value="justifyCenter">justifyCenter</option>
                    <option value="justifyLeft">justifyLeft</option>
                    <option value="justifyRight">justifyRight</option>
                  </select>

                  <select v-model="fontsize" @change="addfont('fontSize', false, fontsize)">
                    <option value="">Select Font Size</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                  </select>
                  <button type="button" data-toggle="modal" data-target="#imageLibraryModal">Choose image</button>
                  <input type="color" name="favcolor" value="#ff0000" @change="changeColor" class="form-control">
                  <button @click="addfont('fontSize', false, '2px')">Size</button>
                  <button @click="addfont('redo', false, null)">Redo</button>
                  <button @click="addfont('undo', false, null)">Undo</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" @click="applyInputChange">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-header">Components</div>
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a
                  @click="tabSelected = 1"
                  :class="{'nav-item': true, 'nav-link':true, 'active': tabSelected == 1}"
                  id="nav-home-tab"
                  data-toggle="tab"
                  href="#nav-home"
                  role="tab"
                  aria-controls="nav-home"
                  aria-selected="true"
                >Inputs</a>
                <a
                  @click="tabSelected = 2"
                  :class="{'nav-item': true, 'nav-link':true, 'active': tabSelected == 2}"
                  id="nav-profile-tab"
                  data-toggle="tab"
                  href="#nav-profile"
                  role="tab"
                  aria-controls="nav-profile"
                  aria-selected="false"
                >css</a>
              </div>
            </nav>
            <div class="tab-content py-5 px-5 px-sm-0 right_side" id="nav-tabContent">
              <div v-if="tabSelected == 1">
                <button @click="addFieldToEditor('fullwidth')">1 Column</button>
                <button @click="addFieldToEditor('toside')">2 Column</button>
                <button @click="addFieldToEditor('threeside')">3 Column</button>
                <!-- <button @click="addFieldToEditor(3)">Image</button>
                <button @click="addFieldToEditor(3)">Video</button>-->
                <!-- <button @click="addRow('textarea')">Textarea</button>
                <button @click="addRow('file')">File</button>
                <button @click="addRow('video')">Video</button>
                <button @click="addRow('videoLink')">Youtube Link</button>-->
              </div>
              <div v-if="tabSelected == 2">
                <button @click="addfont('italic', false, null)">
                  <i>I</i>
                </button>
                <button @click="addfont('bold', false, null)">
                  <i>B</i>
                </button>
                <button @click="addfont('underline', false, null)">
                  <u>U</u>
                </button>
                <!-- <button @click="addfont('fontName', false , 'TimesNewRoman')">fontName</button> -->
                <select
                  @change="addfont('fontName', false , font)"
                  v-model="font"
                  class="form-control"
                >
                  <option value>Select Font</option>
                  <option
                    v-for="(font, index) in fontFamily"
                    :key="index"
                    :value="font.family"
                  >{{ font.family }}</option>
                </select>

                <select
                  @change="addfont(aligntext , false, null)"
                  v-model="aligntext"
                  class="form-control"
                >
                  <option value>Align</option>
                  <option value="justifyCenter">Center</option>
                  <option value="justifyLeft">Left</option>
                  <option value="justifyRight">Right</option>
                </select>

                <select
                  v-model="fontsize"
                  @change="addfont('fontSize', false, fontsize)"
                  class="form-control"
                >
                  <option value>Select Font Size</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
                <button
                  type="button"
                  data-toggle="modal"
                  data-target="#imageLibraryModal"
                  @click="type = 1"
                >Choose image</button>
                <button
                  type="button"
                  data-toggle="modal"
                  data-target="#imageLibraryModal"
                  @click="type = 2"
                >Choose Video</button>
                <input
                  type="text"
                  placeholder="Youtube Link"
                  class="form-control"
                  v-model="youtubeLink"
                >
                <button type="button" @click="setYoutubeLink">Go</button>
                <!-- <button @click="addfont('insertImage', false, '/image/avatar_image.jpg')">image</button> -->
                <input
                  type="color"
                  name="favcolor"
                  value="#ff0000"
                  @change="changeColor"
                  class="form-control"
                >
                <button @click="addfont('fontSize', false, '2px')">Size</button>
                <button @click="addfont('redo', false, null)">Redo</button>
                <button @click="addfont('undo', false, null)">Undo</button>
                <!-- <button @click="applyCss">Apply CSS</button> -->

                <hr>
                <input type="text" placeholder="Width" v-model="width" class="form-control">
                <input type="text" placeholder="Heigth" v-model="heigth" class="form-control">
                <button @click="applyCss">Apply CSS</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for ImageLibrary -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="imageLibraryModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageLibraryModal">Choose Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div v-for="(lib, index) in libraryImages" :key="index">
              <div class="card" style="width: 18rem;" v-if="type == 1 && lib.type == 1">
                <img
                  class="card-img-top"
                  :src="lib.path"
                  @click="addImageToEditor(lib.path)"
                  alt="Card image cap"
                  style="crusor: pointer;"
                >
                <!-- <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>-->
              </div>
              <div class="card" style="width: 18rem;" v-if="type == 2 && lib.type == 2">
                <video
                  playsinline="playsinline"
                  webkit-playsinline="true"
                  width="286"
                  height="240"
                  tabindex="-1"
                  autoplay
                  :src="lib.path"
                  controls
                ></video>
                <div class="card-body">
                  <button class="btn btn-primary" @click="uploadVideo(lib.path)">upload</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="file" name="uploadImage" @change="uploadImage" id="uploadImage">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { setTimeout } from "timers";
import dataFont from "../dps/data";
export default {
  data() {
    return {
      tabSelected: 1,
      editorData: [],
      model: false,
      modelNameType: "",
      inputType: "",
      fontFamily: dataFont,
      font: "",
      aligntext: "",
      fontsize: "",
      libraryImages: [],
      type: "",
      youtubeLink: "",
      width: "",
      heigth: "",
      id:"",
      testID: '',
    };
  },
  mounted() {
    $(".modal").on("shown.bs.modal", function() {
      $(this)
        .find("[autofocus]")
        .focus();
    });
    this.getImageLibrary();
  },
  methods: {
    addFieldToEditor(type) {
      this.editorData.push({
        name: "",
        model: {},
        id: "",
        style: "",
        class: "",
        type: type,
        inputIndex: 0,
        image: "",
        dynamicId: ""
      });
    },
    // openModel(index, type) {
    //   this.inputType = "";
    //   $("#inputId").empty();
    //   this.inputIndex = index;
    //   this.modelNameType = type;
    //   $("#exampleModal").modal("toggle");
    //   this.inputType = this.editorData[index]["model"][type];
    // },
    openModel(index, type) {
      this.inputType = "";
      this.dynamicId = type + "_" + index;
      $("#inputId").empty();
      this.inputIndex = index;
      this.modelNameType = type;
      // $("#exampleModal").modal("toggle");
      this.inputType = this.editorData[index]["model"][type];
      $("#inputId").html(this.inputType);
    },
    addfont(command, showUI, value) {
      document.execCommand(command, showUI, value);
    },
    changeColor(e) {
      this.addfont("foreColor", false, e.target.value);
    },
    save() {
      console.log(this.editorData);
      var html = $(".print").html();
      console.log(html, "html");
    },
    applyInputChange(e) {
      console.log(e.target.id);
      var id = e.target.id;
      this.editorData[this.inputIndex]["model"][this.modelNameType] = $(
        "#" + id
      ).html();
      var temp = this.editorData;
      this.tabSelected = 2;
      // $("#exampleModal").modal("toggle");
      // console.log(this.editorData, "editorData");
      // this.editorData = [];
      // var self = this;
      // setTimeout(function() {
      //   self.editorData = temp;
      // }, 100);
    },
    getid(){
    //  console.log(e.target.id, "sasaassaas")
          $('#exampleModal').modal('show');
          $(":focus").each(function() {
          console.log("Focused Elem_id = "+ this.id );
          this.testID = this.id
          console.log(this.testID, 'this.testID')
          localStorage.setItem('editorid', this.testID);
      }); 
    },
    abc(){
      console.log(this.testID, 'this.testIDSQASASASASASASASASSSSSS')
    var newid =  localStorage.getItem('editorid')
    console.log(newid ,"asuoggsaiusasuh")
     var fileId =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
     var fileId2 = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

      $("#"+newid).append(function(){
       return $('<div class="row"><div class="col-sm-6 cell" id="'+fileId+'"></div> <div class="col-sm-6 cell" id="'+fileId2+'"></div></div>').on('click', function(){
         $(":focus").each(function() {
          console.log(this.testID, 'this.testIek;fkjsfdjkldsfjklfD')
          localStorage.setItem('editorid', this.testID);
        }); 
       });
      });
    },
    uploadImage(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.uploadImages(files[0]);
    },
    uploadImages(files) {
      console.log("Kandarp pandya", files);
      // upload image to database and folder
      // axios.defaults.headers.common['Authorization'] = this.$session.get('accessToken')
      var data = new FormData();
      var file = files;
      data.append("image", file);
      data.append("type", this.type);
      axios
        .post("api/imageLibrary", data)
        .then(response => {
          this.libraryImages = response.data.data;
          document.getElementById("uploadImage").value = "";
        })
        .catch(errorResponse => {
          console.log(errorResponse, "errorResponse");
        });
    },
    getImageLibrary() {
      axios.get("/api/imageLibrary").then(response => {
        this.libraryImages = response.data.data;
      });
    },
    addImageToEditor(image) {
      this.addfont("insertImage", false, image);
      $("#imageLibraryModal").modal("toggle");
    },
    uploadVideo(path) {
      var html =
        '<video playsinline="playsinline" webkit-playsinline="true"  width="320" height="240" tabindex="-1" autoplay="" src="' +
        path +
        '" controls></video>';
      var tempText = this.editorData[this.inputIndex]["model"][
        this.modelNameType
      ];
      var tempVideo = $("#" + this.dynamicId).append(html);

      this.editorData[this.inputIndex]["model"][this.modelNameType] =
        tempText + tempVideo;
      $("#imageLibraryModal").modal("toggle");
    },
    setYoutubeLink() {
      var link = "https://www.youtube.com/embed/" + this.youtubeLink;
      var html =
        '<iframe width="420" height="315" src="' +
        link +
        '" frameborder="0" allowfullscreen></iframe>';
      var tempText = this.editorData[this.inputIndex]["model"][
        this.modelNameType
      ];
      var tempVideo = $("#" + this.dynamicId).append(html);

      this.editorData[this.inputIndex]["model"][this.modelNameType] =
        tempText + tempVideo;
      // this.editorData[this.inputIndex]["model"][this.modelNameType] = $("#"+this.dynamicId).html(html);
    },
    applyCss() {
      document.execCommand("formatblock", false, "p");
      var listId = window.getSelection().focusNode.parentNode;
      // $(listId).addClass("alert alert-danger");
      $(listId).css({ width: this.width, heigth: this.heigth });
    },
    privew() {
      alert("gfdfg");
    },
    deleteData() {
      console.log("sasasasasasassas");
      // if(this.editorData[this.inputIndex]["model"]['second']){
      // }

      var bac = this.modelNameType;
      console.log(bac, "asaasaaaasas");
      var id = this.inputIndex;
      $("#" + bac + "_" + id).parent().remove();
      if (this.modelNameType == 'second') {
        if(document.getElementById("third_" + id)){
             $("#third_" + id).parent().addClass('col-sm-12');
        }
         else{
          this.editorData.splice(id, 1)
         }
      }
      else if(this.modelNameType == 'third'){
        if(document.getElementById("second_" + id)){
          $("#second_" + id).parent().addClass('col-sm-12');
        }
       else{
           this.editorData.splice(id, 1)
       }
      }
      else if(this.modelNameType == 'fourth'){
        if(document.getElementById("five_" + id) && document.getElementById("six_" + id) ){
          $("#five_" + id).parent().addClass('col-sm-6');
          $("#six_" + id).parent().addClass('col-sm-6');
        } else if (document.getElementById("five_" + id)) {
            $("#five_" + id).parent().addClass('col-sm-12');
        } else if (document.getElementById("six_" + id)) {
          $("#six_" + id).parent().addClass('col-sm-12');
        } else {
          this.editorData.splice(id, 1)
        }
      }
      else if(this.modelNameType == 'five'){

        if(document.getElementById("fourth_" + id) && document.getElementById("six_" + id) ){
          $("#fourth_" + id).parent().addClass('col-sm-6');
          $("#six_" + id).parent().addClass('col-sm-6');
        } else if (document.getElementById("fourth_" + id)) {
            $("#fourth_" + id).parent().addClass('col-sm-12');
        } else if (document.getElementById("six_" + id)) {
          $("#six_" + id).parent().addClass('col-sm-12');
        } else {
          this.editorData.splice(id, 1)
        }
      }
      else if(this.modelNameType == 'six'){

        if(document.getElementById("fourth_" + id) && document.getElementById("five_" + id) ){
          $("#fourth_" + id).parent().addClass('col-sm-6');
          $("#five_" + id).parent().addClass('col-sm-6');
        } else if (document.getElementById("fourth_" + id)) {
            $("#fourth_" + id).parent().addClass('col-sm-12');
        } else if (document.getElementById("five_" + id)) {
          $("#five_" + id).parent().addClass('col-sm-12');
        } else {
          this.editorData.splice(id, 1)
        }
      }
      
    }
  }
};
</script>

<style scoped>
.editor_open .cell {
  /* min-height:75px;
    flex-grow:1;
    flex-basis:100%; */
  width: 100%;
  /* height:1000px; */
  min-height: 75px;
  /* flex-grow: 1; */
  /* flex-basis: 50%; */
  float: left;
  padding: 20px 25px;
  outline: 1px dashed rgba(170, 170, 170, 0.7);
  outline-offset: -8px;
  color: black;
}
.model_data {
  outline-style: auto;
  outline-width: 5px;
  height: 200px;
  overflow: auto;
}
img {
  width: 100%;
  height: auto;
}
</style>
