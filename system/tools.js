$(document).ready(function(){

  $(".listCategory li").on('mouseover',function(event){
    var content = this.html();
    console.log("test:"+content);

    $(".subCategory").show();
  });


  $(".listCategory li").on('mouseout',function(event){
    $(".subCategory").hide();
  });



});
