<template>
  <div>
    <div id="parentDiv" class="cell col-sm-12"></div>
    <button @click="getId(1)" type="button" class="btn btn-primary">one</button>
    <button @click="getId(2)" type="button" class="btn btn-success">two</button>
    <button @click="getId(3)" type="button" class="btn btn-info">three</button>
    <button @click="addtext" type="button" class="btn btn-info">ADD TEXT</button>
    <button @click="deleteData" type="button" class="btn btn-info">Delete Data</button>
    <select @change="addfont('fontName', false , font)" v-model="font">
      <option value>Select Font</option>
      <option
        v-for="(font, index) in fontFamily"
        :key="index"
        :value="font.family"
      >{{ font.family }}</option>
    </select>
    <button @click="addfont('italic', false, null)">
      <i>I</i>
    </button>
    <button @click="addfont('bold', false, null)">
      <i>B</i>
    </button>
    <button @click="addfont('underline', false, null)">
      <u>U</u>
    </button>
    <input type="color" name="favcolor" value="#ff0000" @change="changeColor" class="form-control">
    <button type="button" data-toggle="modal" data-target="#imageLibraryModal">Choose image</button>
    <select v-model="fontsize" @change="addfont('fontSize', false, fontsize)">
      <option value>Select Font Size</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
    </select>
    <button @click="save">Save</button>
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
import dataFont from "../dps/data";
export default {
  data() {
    return {
      fontFamily: dataFont,
      font: "",
      libraryImages: [],
      youtubeLink: "",
      type: 1,
      modelNameType: "",
       fontsize: "",
    };
  },
  mounted() {
    this.getImageLibrary();
    $("#parentDiv").click(function(event) {
      event.stopPropagation();
      console.log("Mounted", event.target.id);
      localStorage.setItem("dynamicId", event.target.id);
      var current = document.getElementsByClassName("active");
      console.log(current, "current");
      if (current.length > 0) {
        current[0].className = current[0].className.replace(" active", "");
      }

      $("#" + event.target.id).toggleClass("active");
    });
  },
  methods: {
    getId(value) {
      var topId = localStorage.getItem("dynamicId");
      var fileId1 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var fileId2 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var fileId3 =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      var className =
        Math.random()
          .toString(36)
          .substring(2, 15) +
        Math.random()
          .toString(36)
          .substring(2, 15);
      if (value == 1) {
        $("#" + topId).append(
          '<div class="col-sm-12 one_' +
            className +
            '  cell" id="' +
            fileId1 +
            '"></div>'
        );
      }
      if (value == 2) {
        $("#" + topId).append(
          '<div class="col-sm-6 two_' +
            className +
            ' cell" id="' +
            fileId1 +
            '"></div><div class="col-sm-6 three_' +
            className +
            ' cell" id="' +
            fileId2 +
            '"></div>'
        );
      }
      if (value == 3) {
        $("#" + topId).append(
          '<div  class="col-sm-4 four_' +
            className +
            ' cell" id="' +
            fileId1 +
            '"></div><div  class="col-sm-4 five_' +
            className +
            ' cell" id="' +
            fileId2 +
            '"></div><div  class="col-sm-4 six_' +
            className +
            ' cell" id="' +
            fileId3 +
            '"></div>'
        );
      }
      console.log("getId");
    },
    abc(value) {
      if (value == 1) {
        $("#parentDiv").append(
          '<div class="col-sm-12  cell"id="childDiv1">I am child1</div>'
        );
      }
      if (value == 2) {
        $("#parentDiv").append(
          '<div class="col-sm-6 cell" id="childDiv2">I am child2</div><div class="col-sm-6  cell" id="childDiv3">I am child3</div>'
        );
      }
      if (value == 3) {
        $("#parentDiv").append(
          '<div  class="col-sm-4  cell" id="childDiv4">I am child4</div><div  class="col-sm-4  cell" id="childDiv5">I am child5</div><div  class="col-sm-4  cell" id="childDiv6">I am child6</div>'
        );
      }
    },
    addtext() {

      var topId = localStorage.getItem("dynamicId");
      console.log(topId);
    if (topId != "parentDiv") {
      $("#" + topId).attr("contentEditable", true);
      }
    },
    deleteData() {
      var topId = localStorage.getItem("dynamicId");
      if (topId != "parentDiv") {
        // console.log($('#'+topId)[0].classList[1])
        var className = $("#" + topId)[0].classList[1];
        var classEx = className.split("_");
        var type = classEx[0];
        var typeId = classEx[1];
        if (type == "two") {
          $(".three_" + typeId).addClass("col-sm-12");
        } else if (type == "three") {
          $(".two_" + typeId).addClass("col-sm-12");
        } else if (type == "four") {
          console.log(
            "four",
            $("div").hasClass("five_" + typeId) &&
              $("div").hasClass("six_" + typeId)
          );

          if (
            $("div").hasClass("five_" + typeId) &&
            $("div").hasClass("six_" + typeId)
          ) {
            $(".five_" + typeId).addClass("col-sm-6");
            $(".six_" + typeId).addClass("col-sm-6");
          } else if ($("div").hasClass("five_" + typeId)) {
            $(".five_" + typeId).addClass("col-sm-12");
          } else if ($("div").hasClass("six_" + typeId)) {
            $(".six_" + typeId).addClass("col-sm-12");
          }
        } else if (type == "five") {
          console.log("five");

          if (
            $("div").hasClass("four_" + typeId) &&
            $("div").hasClass("six_" + typeId)
          ) {
            $(".four_" + typeId).addClass("col-sm-6");
            $(".six_" + typeId).addClass("col-sm-6");
          } else if ($("div").hasClass("four_" + typeId)) {
            $(".four_" + typeId).addClass("col-sm-12");
          } else if ($("div").hasClass("six_" + typeId)) {
            $(".six_" + typeId).addClass("col-sm-12");
          }
        } else if (type == "six") {
          if (
            $("div").hasClass("five_" + typeId) &&
            $("div").hasClass("four_" + typeId)
          ) {
            $(".five_" + typeId).addClass("col-sm-6");
            $(".four_" + typeId).addClass("col-sm-6");
          } else if ($("div").hasClass("five_" + typeId)) {
            $(".five_" + typeId).addClass("col-sm-12");
          } else if ($("div").hasClass("four_" + typeId)) {
            $(".four_" + typeId).addClass("col-sm-12");
          }
        }
        $("#" + topId).remove();
      }
    },
    addfont(command, showUI, value) {
      document.execCommand(command, showUI, value);
    },
    changeColor(e) {
      this.addfont("foreColor", false, e.target.value);
    },
    addImageToEditor(image) {
      this.addfont("insertImage", false, image);
      $("#imageLibraryModal").modal("toggle");
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
     save() {
      var html = $("#parentDiv").html();
      console.log(html, "html");
    },
  }
};
</script>

<style>
.cell.active {
  outline: 1px dashed rgb(5, 131, 248);
}
</style>
