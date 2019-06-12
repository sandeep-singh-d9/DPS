<template>
    <div>
        <div id="parentDiv" class="cell col-sm-12" >
    </div>
    <button type="button" class="btn btn-primary" disabled  onclick="abc(1)">one</button>
    <button  type="button" class="btn btn-success" disabled onclick="abc(2)">two</button>
    <button  type="button" class="btn btn-info" disabled onclick="abc(3)">three</button>

    <button @click="getId(1)" type="button" class="btn btn-primary">one</button>
    <button @click="getId(2)" type="button" class="btn btn-success">two</button>
    <button @click="getId(3)" type="button" class="btn btn-info">three</button>
    <button @click="addtext" type="button" class="btn btn-info">ADD TEXT</button>
    <button @click="deleteData" type="button" class="btn btn-info">Delete Data</button>
    </div>
</template>

<script>
export default {
  mounted(){
        $('#parentDiv').click(function(event){
            event.stopPropagation();
            console.log('Mounted' ,event.target.id);
                localStorage.setItem('dynamicId', event.target.id)
                var current = document.getElementsByClassName("active");
                console.log(current, 'current')
                if(current.length > 0){
                current[0].className = current[0].className.replace(" active", "");}
               
                 $("#"+event.target.id).toggleClass('active');
        });
       
    },
    methods: {
      getId (value) {
            var topId = localStorage.getItem('dynamicId') 
            var fileId1 =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
            var fileId2 =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
            var fileId3 =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
             var className =  Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
            if(value == 1){
                $("#"+topId).append('<div class="col-sm-12 one_'+className+'  cell" id="'+fileId1+'"></div>')
            }
            if(value ==2){
                $("#"+topId).append('<div class="col-sm-6 two_'+className+' cell" id="'+fileId1+'"></div><div class="col-sm-6 three_'+className+' cell" id="'+fileId2+'"></div>')
            }
            if(value ==3){
                $("#"+topId).append('<div  class="col-sm-4 four_'+className+' cell" id="'+fileId1+'"></div><div  class="col-sm-4 five_'+className+' cell" id="'+fileId2+'"></div><div  class="col-sm-4 six_'+className+' cell" id="'+fileId3+'"></div>')
            }
            console.log('getId')

           
        },
        abc (value) {
            if(value ==1){
            $("#parentDiv").append('<div class="col-sm-12  cell"id="childDiv1">I am child1</div>')
            }
            if(value ==2){
            $("#parentDiv").append('<div class="col-sm-6 cell" id="childDiv2">I am child2</div><div class="col-sm-6  cell" id="childDiv3">I am child3</div>')
            }
            if(value ==3){
            $("#parentDiv").append('<div  class="col-sm-4  cell" id="childDiv4">I am child4</div><div  class="col-sm-4  cell" id="childDiv5">I am child5</div><div  class="col-sm-4  cell" id="childDiv6">I am child6</div>')
            }
        },
        addtext(){
             var topId = localStorage.getItem('dynamicId')
             console.log(topId);
             $("#"+topId).attr('contentEditable', true) ;
             
        },
         deleteData () {  
            var topId = localStorage.getItem('dynamicId')
            if (topId != 'parentDiv') {
                // console.log($('#'+topId)[0].classList[1])
                var className = $('#'+topId)[0].classList[1]
                var classEx = className.split('_')
                var type = classEx[0]
                var typeId = classEx[1]
                if (type == 'two') {
                    $('.three_'+typeId).addClass('col-sm-12')
                } else if (type == 'three') {
                    $('.two_'+typeId).addClass('col-sm-12')
                } else if (type == 'four') {
                    console.log('four', $('div').hasClass('five_'+typeId) && $('div').hasClass('six_'+typeId));

                    if ($('div').hasClass('five_'+typeId) && $('div').hasClass('six_'+typeId) ) {
                        $('.five_'+typeId).addClass('col-sm-6')
                        $('.six_'+typeId).addClass('col-sm-6')   
                    } else if ($('div').hasClass('five_'+typeId)) {
                        $('.five_'+typeId).addClass('col-sm-12')
                    } else if ($('div').hasClass('six_'+typeId)) {
                        $('.six_'+typeId).addClass('col-sm-12')
                    }
                } else if (type == 'five') {
                    console.log('five');

                    if ($('div').hasClass('four_'+typeId) && $('div').hasClass('six_'+typeId) ) {
                        $('.four_'+typeId).addClass('col-sm-6')
                        $('.six_'+typeId).addClass('col-sm-6')   
                    } else if ($('div').hasClass('four_'+typeId)) {
                        $('.four_'+typeId).addClass('col-sm-12')
                    } else if ($('div').hasClass('six_'+typeId)) {
                        $('.six_'+typeId).addClass('col-sm-12')
                    }
                } else if (type == 'six') {

                    if ($('div').hasClass('five_'+typeId) && $('div').hasClass('four_'+typeId)) {
                        $('.five_'+typeId).addClass('col-sm-6')
                        $('.four_'+typeId).addClass('col-sm-6')   
                    } else if ($('div').hasClass('five_'+typeId)) {
                        $('.five_'+typeId).addClass('col-sm-12')
                    } else if ($('div').hasClass('four_'+typeId)) {
                        $('.four_'+typeId).addClass('col-sm-12')
                    }
                }
                $('#'+topId).remove();   
            }
            
         }
    }

}
</script>

<style>
   .cell.active{
        outline: 1px dashed rgb(5, 131, 248);
   }
</style>
