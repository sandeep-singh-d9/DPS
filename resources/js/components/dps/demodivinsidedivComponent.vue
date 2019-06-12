<template>
<div>
    <div class="main-div" id="top">
     
    </div>
    <button @click="abc(2)">2 columns</button>
    <button @click="abc(1)" >1 columns</button>
     <button @click="abc(3)">3 columns</button>
     <button @click="addtext" id="btn">ADD TEXT</button>
</div>    
</template>

<script>
export default {
    data(){
        return {
              ids : ""
        }
    },
   methods:{
       abc (value) {
           var div = ''
            var fileId1 =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
             var fileId2 =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
              var fileId3 =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
           if (value == 1) {
               div = '<div class="row"><div class="col-sm-12 cell" id="'+fileId1+'"></div></div>'
           }
           if (value == 2) {
               div = '<div class="row"><div class="col-sm-6 cell" id="'+fileId1+'"></div><div class="col-sm-6 cell" id="'+fileId2+'"></div></div>'
           }
           if (value == 3) {
               div = '<div class="row"><div class="col-sm-4 cell" id="'+fileId1+'"></div><div class="col-sm-4 cell" id="'+fileId2+'"></div><div class="col-sm-4 cell" id="'+fileId3+'"></div></div>'
           }
           var topId = localStorage.getItem('dynamicId') ? localStorage.getItem('dynamicId') : 'top'
          
           $("#"+topId).append(div)
            this.getId();
       },
       getId(){
           $('.cell').click(function() {
                 console.log(this.id);
                 console.log('sasas')
                 localStorage.setItem('dynamicId', this.id)
            });
            // $('.cell').mouseout(()=>{
            //     console.log('this is removed ')
            //     localStorage.removeItem('dynamicId')
            // }) 
            $('#btn').css("display", "block")
       },
       addtext(){
            var topId = localStorage.getItem('dynamicId') ? localStorage.getItem('dynamicId') : 'top'
           $('#btn').click(function(){
            var $div=$('#'+topId), isEditable=$div.is('.editable');
             $($div).prop('contenteditable',!isEditable).toggleClass('editable')
            })
       }
   },
   mounted(){
       localStorage.removeItem('dynamicId')
   }
}
</script>

<style scoped>
.cell {
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

#btn{
    display: none;
}
.cell:hover{
    display: block;
}
</style>
