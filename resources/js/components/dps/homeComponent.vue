<template>
  <div class dir="ltr" id="tinymce">
    <!-- <div style="display: flex; justify-content: stretch; margin-top: 50px; margin-right: 50px">
            <div style="margin-left: 50px; flex: 1">
            <Container behaviour="copy" group-name="1" :get-child-payload="getChildPayload1">
                <Draggable>
                    <div class="draggable-item">
                        <button @click="addHtml(1)">1 Column</button>
                    </div>
                </Draggable>
                <Draggable>
                    <div class="draggable-item">
                        <button @click="addHtml(2)">2 Column</button>
                    </div>
                </Draggable>
                <Draggable>
                        <button @click="addHtml(3)">3 Column</button>
                        <button @click="addRow('textarea')">Textarea</button>
                        <button @click="addRow('file')">File</button>
                        <button @click="addRow('video')">Video</button>
                        <button @click="addRow('videoLink')">Youtube Link</button>
                </Draggable>
            </Container>
            </div>
            <div style="margin-left: 50px; flex: 1">
            <Container group-name="1" :get-child-payload="getChildPayload2" @drop="onDrop('items2', $event)">
                <Draggable v-for="(item, index) in items2" :key="index">
                <div class="draggable-item">
                    <div v-if="item.data.length > 0" v-html="item.data"></div>
                    <button @click="items2.splice(index, 1)">X</button>
                </div>
                </Draggable>
            </Container>
            </div>
            <div style="margin-left: 50px; flex: 1">
            <Container group-name="1" :get-child-payload="getChildPayload3" @drop="onDrop('items3', $event)">
                <Draggable v-for="item in items3" :key="item.id">
                <div class="draggable-item">
                    {{item.data}}
                </div>
                </Draggable>
            </Container>
            </div>
    </div>-->
    <!-- <DivComponent id="2132" /> -->
    <div class="row justify-content-center editor_data">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Home Component</div>
          <div class="card-body">
            <div v-if="dragInputs.length > 0">
              <div v-for="(input, index) in dragInputs" :key="index">
                <div
                  draggable="true"
                  @dragstart="dragStart(index, $event)"
                  @dragover.prevent
                  @dragenter="dragEnter"
                  @dragleave="dragLeave"
                  @dragend="dragEnd"
                  @drop="dragFinish(index, $event)"
                >
                  <div
                    v-html="input.col"
                    :id="input.id"
                    @click="addInupts(input.id, index)"
                    class="name"
                    @input="changeInput"
                  ></div>
                </div>
              </div>
            </div>
            <div v-if="inputs.length > 0">
              <div
                v-for="(input, index) in inputs"
                :key="index"
                draggable="true"
                @dragstart="dragStart(index, $event)"
                @dragover.prevent
                @dragenter="dragEnter"
                @dragleave="dragLeave"
                @dragend="dragEnd"
                @drop="dragFinish(index, $event)"
              >
                <div v-if="input.textbox" @click="onfocusFun('textbox', index)">
                  <div
                    v-html="input.textbox.name"
                    contenteditable="true"
                    :id="input.textbox.id"
                    :class="input.textbox.class"
                  >Hodor!</div>
                </div>
                <div v-if="input.textarea">
                  <p contenteditable="true">
                    <textarea
                      name
                      @click="onfocusFun('textarea', index)"
                      :id="input.textarea.id"
                      cols="30"
                      rows="10"
                      v-model="input.textarea.name"
                      :class="input.textarea.class"
                      :style="input.textarea.style"
                    ></textarea>
                  </p>
                </div>
                <div v-if="input.file">
                  <p contenteditable="true">
                    <img
                      src="/image/avatar_image.jpg"
                      @click="onfocusFun('file', index), setFileId(input.file.id)"
                      :id="input.file.id"
                      alt
                      srcset
                      width="100px"
                      :style="input.file.style"
                    >
                  </p>
                </div>
                <div v-if="input.video">
                  <p contenteditable="true">
                    <video
                      :id="input.video.id"
                      playsinline="playsinline"
                      webkit-playsinline="true"
                      width="320"
                      height="240"
                      tabindex="-1"
                      autoplay
                      :src="input.video.src"
                      :style="input.video.style"
                      controls
                    ></video>
                  </p>
                </div>

                <div v-if="input.videoLink">
                  <p contenteditable="true">
                    <iframe
                      width="420"
                      height="315"
                      :src="input.videoLink.src"
                      :style="input.videoLink.style"
                      frameborder="0"
                      allowfullscreen
                    ></iframe>
                  </p>
                </div>

                <button @click="deleteRow(index)">Delete</button>
              </div>
            </div>

            <button @click="saveData">Save</button>
          </div>
        </div>
      </div>
      <div class="col-md-2">
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
                <button @click="addHtml(1)">1 Column</button>
                <button @click="addHtml(2)">2 Column</button>
                <button @click="addHtml(3)">3 Column</button>
                <button @click="addRow('textarea')">Textarea</button>
                <button @click="addRow('file')">File</button>
                <button @click="addRow('video')">Video</button>
                <button @click="addRow('videoLink')">Youtube Link</button>
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
import DivComponent from "./divComponent";
import TextBoxCSS from "./textboxCSSComponent";
import { mapState, mapMutations, mapGetters, mapActions } from "vuex";
import { Container, Draggable } from "vue-smooth-dnd";
import { applyDrag, generateItems } from "../utils/helpers";
export default {
  computed: {
    ...mapState(["test", "show", "showIn", "selectedClass", "width", "height"]),
    isDragging() {
      return this.dragging > -1;
    }
  },
  components: {
    DivComponent,
    TextBoxCSS,
    Container,
    Draggable
  },
  data() {
    return {
      textModel: [],
      testtest: "",
      testtest2: "",
      inputs: [],
      indexs: 0,
      inputType: "",
      newItem: "",
      dragging: -1,
      classes: [],
      fileId: "",
      liveLink: "",
      tabSelected: 1, // 1 for input and 2 for css
      youtubeId: "",
      dragInputs: [],
      commonId: "",
      items1: generateItems(15, i => ({
        id: "1" + i,
        data: `Source Draggable - ${i}`
      })),
      items2: generateItems(15, i => ({
        id: "2" + i,
        data: `Draggable 2 - ${i}`
      })),
      items3: generateItems(15, i => ({
        id: "3" + i,
        data: `Draggable 3 - ${i}`
      }))
    };
  },
  methods: {
    ...mapMutations([
      "CHANGE_TEST",
      "CHANGE_TEST2",
      "CHANGE_STATE",
      "CHANGE_SELECTED_CLASS"
    ]),
    ...mapActions(["ACTION_CHANGE_STATE"]),
    changeInput(e) {
      var abc = $("#" + e.target.id).html();
      console.log(abc);
      // console.log('sasassasassassas', e.target)
      // Dynamic state changes
      this.CHANGE_STATE([e.target.name, e.target.value]);
    },
    // Add row in the editor
    addRow(inputType) {
      var id = this.inputs.length;
      this.tabSelected = 2;
      var fileId =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      if (inputType == "textbox") {
        this.inputs.push({
          textbox: {
            name: "Valar morghulis! Valar dohaeris!",
            id: "input_" + id,
            class: "",
            style: ""
          }
        });
      }
      if (inputType == "textarea") {
        this.inputs.push({
          textarea: {
            name: "",
            id: "teaxarea_" + id,
            class: "form-control",
            style: ""
          }
        });
      }
      if (inputType == "file") {
        this.inputs.push({
          file: {
            name: "",
            id: fileId,
            class: "",
            style: "",
            src: ""
          }
        });
      }
      if (inputType == "video") {
        this.inputs.push({
          video: {
            name: "",
            id: fileId + 1,
            class: "",
            style: "",
            src: ""
          }
        });
      }
      if (inputType == "videoLink") {
        this.inputs.push({
          videoLink: {
            name: "",
            id: fileId + 11,
            class: "",
            style: "",
            src: "https://www.youtube.com/embed/"
          }
        });
      }
      this.inputType = inputType;
      this.indexs = id;
      console.log();
      this.fileId = fileId;
    },
    deleteRow(index) {
      this.inputs.splice(index, 1);
      this.indexs = 0;
      if (this.inputs.length == 0) {
        this.inputs = [];
        // console.log(this.inputs)
      }
    },
    saveData() {
      if (this.inputs.length > 0) {
        this.inputs.forEach(element => {
          if (element.textbox != undefined) {
            var id = element.textbox.id;
            element.textbox.name = $("#" + id).html();
          }
        });
      }
      console.log(this.dragInputs, "kandarp");

      // below code is get selected text from tag
      // var sel = window.getSelection(), range;
      // if (sel.getRangeAt) {
      //     range = sel.getRangeAt(0);
      //         alert(range);
      // }
      // var markup = document.documentElement.innerHTML;
      // console.log(markup);
    },
    // change color
    changeColor(e) {
      this.addfont("foreColor", false, e.target.value);
    },
    setFileId(fileId) {
      this.fileId = fileId;
    },
    uploads(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      reader.onload = e => {
        var id = this.fileId;
        this.inputs[this.indexs].file.value = e.target.result;
        $("#" + id).attr("src", e.target.result);
        // this.uploadImage(this.image);
      };
      reader.readAsDataURL(file);
    },
    onfocusFun(inputType, index) {
      this.inputType = inputType;
      this.indexs = index;
    },
    setCss(style, value) {
      var css = {
        [style]: value,
        test
      };
      if (this.inputType == "textbox") {
        this.inputs[this.indexs].textbox.style = css;
      }
      if (this.inputType == "textarea") {
        this.inputs[this.indexs].textarea.style = css;
      }
      if (this.inputType == "file") {
        this.inputs[this.indexs].file.style = css;
      }
    },
    // apply css on button click
    applyCss() {
      if (this.commonId) {
        console.log(this.commonId);
        this.dragInputs[this.indexs].style = {
          width: this.width,
          height: this.height
        };
      }
      var classData = "";
      if (this.selectedClass.length > 0) {
        classData = this.selectedClass.join();
        classData = classData.replace(",", " ");
      }
      if (this.inputType == "textbox") {
        this.inputs[this.indexs].textbox.style = {
          width: this.width,
          height: this.height
        };
        this.inputs[this.indexs].textbox.class = classData;
      }
      if (this.inputType == "textarea") {
        this.inputs[this.indexs].textarea.style = {
          width: this.width,
          height: this.height
        };
        this.inputs[this.indexs].textarea.class = classData;
      }
      if (this.inputType == "file") {
        this.inputs[this.indexs].file.style = {
          width: this.width,
          height: this.height
        };
        this.inputs[this.indexs].file.class = classData;
      }
      if (this.inputType == "video") {
        this.inputs[this.indexs].video.style = {
          width: this.width,
          height: this.height
        };
        this.inputs[this.indexs].video.src = this.liveLink;
      }

      if (this.inputType == "videoLink") {
        this.inputs[this.indexs].videoLink.style = {
          width: this.width,
          height: this.height
        };
        this.inputs[this.indexs].videoLink.src =
          "https://www.youtube.com/embed/" + this.youtubeId;
      }
      // Remove selectedClass Value
      this.CHANGE_SELECTED_CLASS([]);
    },
    removeItem(item) {
      this.dragInputs.splice(this.dragInputs.indexOf(item), 1);
    },
    removeItemAt(index) {
      this.dragInputs.splice(index, 1);
    },
    dragStart(which, ev) {
      ev.dataTransfer.setData("Text", this.id);
      ev.dataTransfer.dropEffect = "move";
      this.dragging = which;
    },
    dragEnter(ev) {
      /* 
                          if (ev.clientY > ev.target.height / 2) {
                              ev.target.style.marginBottom = '10px'
                          } else {
                              ev.target.style.marginTop = '10px'
                          }
                          */
    },
    dragLeave(ev) {
      /* 
                          ev.target.style.marginTop = '2px'
                          ev.target.style.marginBottom = '2px'
                          */
    },
    dragEnd(ev) {
      this.dragging = -1;
    },
    dragFinish(to, ev) {
      this.moveItem(this.dragging, to);
      ev.target.style.marginTop = "2px";
      ev.target.style.marginBottom = "2px";
    },
    moveItem(from, to) {
      if (to === -1) {
        this.removeItemAt(from);
      } else {
        this.dragInputs.splice(to, 0, this.dragInputs.splice(from, 1)[0]);
      }
    },
    changePtag(e) {
      var id = e.target.id;
      var inputData = $("#" + id).html();
      console.log(inputData);
      // this.inputs[this.indexs].textbox.name = inputData
    },
    addfont(command, showUI, value) {
      document.execCommand(command, showUI, value);
    },
    addHtml(type) {
      var id =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var id1 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var id2 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var id3 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      if (type === 1) {
        this.dragInputs.push({
          col:
            '<div class="row"><div class="col-md-12 cell"  contenteditable="true" id="' +
            id1 +
            '"></div></div>',
          id: id,
          style: ""
        });
      }
      if (type === 2) {
        this.dragInputs.push({
          col:
            '<div class="row"><div class="col-md-6 cell" contenteditable="true" @click="addInupts" id="' +
            id1 +
            '"><p>kandarp</p></div><div class="col-md-6 cell" contenteditable="true" @click="addInupts" id="' +
            id2 +
            '"><p>kandarp</p></div></div>',
          id: id,
          style: ""
        });
      }
      if (type === 3) {
        this.dragInputs.push({
          col:
            '<div class="row"><div class="col-md-4 cell" contenteditable="true" @click="addInupts" id="' +
            id1 +
            '"><p>kandarp</p></div><div class="col-md-4 cell" contenteditable="true" @click="addInupts" id="' +
            id3 +
            '"><p>kandarp</p></div><div class="col-md-4 cell" contenteditable="true" @click="addInupts" id="' +
            id3 +
            '"><p>kandarp</p></div></div>',
          id: id,
          style: ""
        });
      }
    },
    onDrop(collection, dropResult) {
      this[collection] = applyDrag(this[collection], dropResult);
    },
    getChildPayload1(index) {
      var id =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var id1 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var id2 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var id3 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var data = "";
      if (index === 0) {
        data =
          '<div class="row"><div class="col-md-12 cell"  contenteditable="true" id="' +
          id1 +
          '"><p @click="addInupts">kandarp pandya</p></div></div>';
      }
      if (index === 1) {
        data =
          '<div class="row"><div class="col-md-6 cell" contenteditable="true" @click="addInupts" id="' +
          id1 +
          '"><p>kandarp</p></div><div class="col-md-6 cell" contenteditable="true" @click="addInupts" id="' +
          id2 +
          '"><p>kandarp</p></div></div>';
      }
      if (index === 2) {
        data =
          '<div class="row"><div class="col-md-4 cell" contenteditable="true" @click="addInupts" id="' +
          id1 +
          '"><p>kandarp</p></div><div class="col-md-4 cell" contenteditable="true" @click="addInupts" id="' +
          id3 +
          '"><p>kandarp</p></div><div class="col-md-4 cell" contenteditable="true" @click="addInupts" id="' +
          id3 +
          '"><p>kandarp</p></div></div>';
      }
      this.items1[index].data = data;
      return this.items1[index];
    },
    getChildPayload2(index) {
      return this.items2[index];
    },
    getChildPayload3(index) {
      return this.items3[index];
    },
    addInupts(id, index) {
      this.tabSelected = 2;
      this.commonId = id;
      this.indexs = index;
    }
  }
};
</script>

<style scopped>
/* .if{
     outline: 1px dashed rgba(170,170,170,0.7);
    outline-offset: -2px;
} */

.right_side button {
  padding: 30px;
  width: 100%;
  margin-bottom: 10px;
}

.editor_data {
  padding-top: 20px;
}

.card-header {
  text-align: center;
}

.cell {
  /* min-height:75px;
    flex-grow:1;
    flex-basis:100%; */
  width: 50%;
  /* height:1000px; */
  min-height: 75px;
  /* flex-grow: 1; */
  flex-basis: 50%;
  float: left;
  padding: 20px 25px;
  outline: 1px dashed rgba(170, 170, 170, 0.7);
  outline-offset: -8px;
}

.text-line {
  background-color: transparent;
  outline: none;
  outline-style: none;
  border-top: none;
  border-left: none;
  border-right: none;
  border-bottom: solid #eeeeee 1px;
  padding: 3px 10px;
}

textarea {
  height: 28px;
  width: 400px;
}

#textarea {
  -moz-appearance: textfield-multiline;
  -webkit-appearance: textarea;
  border: 1px solid gray;
  font: medium -moz-fixed;
  font: -webkit-small-control;
  height: 28px;
  overflow: auto;
  padding: 2px;
  resize: both;
  width: 400px;
}

input {
  margin-top: 5px;
  width: 400px;
}

#input {
  -moz-appearance: textfield;
  -webkit-appearance: textfield;
  background-color: -moz-field;
  border: 1px solid darkgray;
  box-shadow: 1px 1px 1px 0 lightgray inset;
  font: -moz-field;
  font: -webkit-small-control;
  margin-top: 5px;
  padding: 2px 3px;
  width: 398px;
  border: none;
}
</style>