<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-9 card">
        <div class="card-header">
          <span class="card-body">Editor</span>
        </div>
        <div class="card-body">
          <div v-if="editorData.length > 0">
            <div v-for="(edit, index) in editorData" :key="index">
              <button @click="editorData.splice(index, 1)">
                Delete
              </button>
              <div class="row" v-if="edit.type == 'fullwidth' ">
                <div
                  v-html="edit.model.first"
                  @click="openModel(index, 'first')"
                  class="col-sm-12 cell"
                ></div>
              </div>
              <div class="row" v-if="edit.type == 'toside' ">
                <div
                  v-html="edit.model.second"
                  @click="openModel(index, 'second')"
                  class="col-sm-6 cell"
                ></div>
                <div
                  v-html="edit.model.third"
                  @click="openModel(index, 'third')"
                  class="col-sm-6 cell"
                ></div>
              </div>
              <div class="row" v-if="edit.type == 'threeside' ">
                <div
                  v-html="edit.model.fourth"
                  @click="openModel(index, 'fourth')"
                  class="col-sm-4 cell"
                ></div>
                <div
                  v-html="edit.model.five"
                  @click="openModel(index, 'five')"
                  class="col-sm-4 cell"
                ></div>
                <div v-html="edit.model.six" @click="openModel(index, 'six')" class="col-sm-4 cell"></div>
              </div>
              <input type v-model="edit.model" v-if="model" placeholder="sdfsdf">
            </div>
            <button @click="save">save</button>
          </div>
          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- <input type="text" name="" id="" > -->
                  <!-- <textarea class="form-control" v-model="inputType" autofocus rows="5"></textarea> -->
                  <p
                    id="inputId"
                    v-html="inputType"
                    contenteditable="true"
                    class="model_data"
                    autofocus
                  ></p>
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
                  <button @click="addfont('fontName', false , 'TimesNewRoman')">fontName</button>
                  <select @change="addfont('fontName', false , font)" v-model="font">
                    <option value>Select Font</option>
                    <option
                      v-for="(font, index) in fontFamily"
                      :key="index"
                      :value="font.family"
                    >{{ font.family }}</option>
                  </select>

                  <select @change="addfont(aligntext , false, null)" v-model="aligntext">
                    <option value="justifyCenter">justifyCenter</option>
                    <option value="justifyLeft">justifyLeft</option>
                    <option value="justifyRight">justifyRight</option>
                  </select>

                  <select v-model="fontsize" @change="addfont('fontSize', false, fontsize)"> 
                    <option value="1">
                      1
                    </option>
                    <option value="2">
                     2
                    </option>
                    <option value="3">
                      3
                    </option>
                    <option value="4">
                     4
                    </option>
                    <option value="5">
                     5
                    </option>
                    <option value="6">
                     6
                    </option>
                    <option value="7">
                     7
                    </option>              
                  </select>
                  <button
                    @click="addfont('insertImage', false, 'https://cdn.pixabay.com/photo/2018/05/28/22/11/message-in-a-bottle-3437294__340.jpg')"
                  >image</button>
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="applyInputChange"
                  >Save changes</button>
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
                <button @click="addFieldToEditor(3)">Image</button>
                <button @click="addFieldToEditor(3)">Video</button>
                <!-- <button @click="addRow('textarea')">Textarea</button>
                <button @click="addRow('file')">File</button>
                <button @click="addRow('video')">Video</button>
                <button @click="addRow('videoLink')">Youtube Link</button>-->
              </div>
              <div v-if="tabSelected == 2">
                <input v-if="inputType == 'file'" type="file" name @change="uploads"> Width:
                <input
                  type="text"
                  :value="width"
                  @input="changeInput"
                  placeholder="Width"
                  name="width"
                  title="width accept % and px"
                  class="form-control"
                > Height:
                <input
                  type="text"
                  :value="height"
                  @input="changeInput"
                  placeholder="Width"
                  name="height"
                  title="Height accept % and px"
                  class="form-control"
                >
                <!-- start text box css component -->
                <TextBoxCSS v-if="inputType == 'textbox'"/>
                <!-- <textarea v-if="inputs[indexs] != undefined && inputs[indexs].textbox" v-model="inputs[indexs].textbox.name" class="form-control" ></textarea> -->
                <!-- end text box css component -->
                <input
                  v-if="inputType == 'video'"
                  type="text"
                  v-model="liveLink"
                  class="form-control"
                  placeholder="Live Link"
                >
                <input
                  v-if="inputType == 'videoLink'"
                  type="text"
                  v-model="youtubeId"
                  class="form-control"
                  placeholder="Youtube Id"
                >
                <button @click="addfont('italic', false, null)">
                  <i>I</i>
                </button>
                <button @click="addfont('bold', false, null)">
                  <i>B</i>
                </button>
                <button @click="addfont('underline', false, null)">
                  <u>U</u>
                </button>
                <button @click="addfont('fontName', false , Arial)">fontName</button>
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
                <button @click="applyCss">Apply CSS</button>
              </div>
            </div>
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
      aligntext:"",
      fontsize:"",
    };
  },
  mounted() {
    $(".modal").on("shown.bs.modal", function() {
      $(this)
        .find("[autofocus]")
        .focus();
    });
    localStorage.removeItem('editorData')
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
        inputIndex: 0
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
      this.inputType = ''
      $('#inputId').empty()
      this.inputIndex = index
      this.modelNameType = type  
      $('#exampleModal').modal('toggle')
      this.inputType = this.editorData[index]['model'][type]
      $('#inputId').html(this.inputType)
    
    },
    addfont(command, showUI, value) {
      document.execCommand(command, showUI, value);
    },
    changeColor(e) {
      this.addfont("foreColor", false, e.target.value);
    },
    save() {
      console.log(this.editorData);
    },
    applyInputChange() {
      var test = this.modelNameType;
      this.editorData[this.inputIndex]["model"][test] = $("#inputId").html();
      var temp = this.editorData;
      $("#exampleModal").modal("toggle");
      console.log(this.editorData, "editorData");
      this.editorData = [];
      var self = this;
      setTimeout(function() {
        self.editorData = temp;
      }, 100);
    }
  }
};
</script>

<style scoped>
.cell {
  /* min-height:75px;
    flex-grow:1;
    flex-basis:100%; */
  width: 50%;
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
