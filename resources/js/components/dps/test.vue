<template>
  <div class="tree">
    <!-- <ul class="tree-list">
        {{trees}}
      <span v-for="(tree, index) in trees" :key="index" >
         <h2> {{tree.label}}</h2>
      </span>
    </ul>-->
    <div class="row">
      <div class="col-md-12 cell" contenteditable="true" id="'+id1+'">
        <p @click="addInupts">kandarp pandya</p>
      </div>
    </div>
  </div>
</template>

<script>
import { tree } from "./data";
const trees = [
  {
    label: "A cool folder",
    children: [
      {
        label: "A cool sub-folder 1",
        children: [
          { label: "A cool sub-sub-folder 1" },
          { label: "A cool sub-sub-folder 2" }
        ]
      },
      { label: "This one is not that cool" }
    ]
  }
];
export default {
  data() {
    return {
      trees: trees
    };
  }
};
</script>

<style>
</style>
