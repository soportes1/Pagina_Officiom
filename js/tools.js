$(document).ready(function(){
  /*
  $(".listCategory li").on('mouseover',function(event){
    var content =  $(this).text();
    $(".category-tittle").html(content);
    $(".subCategory").show();
  });*/
    $(".categoryContainer").mouseleave(function(){
    $(".subCategory").hide();
  });


});

function shown(id,tittle){
  var tam=0;
  var tam=2;
  var mem=0;
  var mem2=0;
  var page="";
  //$(".inContainer").empty();
  $(".category-tittle").html(tittle);
  var url = $("#baseUrl").val();
  url = url+'index.php/welcome/getMenu';
  $.post(url,
    {
      'id':id
    },
    function(result){
      var erro = result;
      result = JSON.parse(result); ///convertimos JSON
      for(mem=0;mem<result.length;mem++){
        page = page + '<div class="tpContainer">';
        tam2 = result[mem].length;///obtenemos la cantidad de elementos de subcategoria
        console.log(tam2);
        /*
        for(mem2=0;mem<=tam2;mem++){
          page = page + '<a href="#">'+result[mem][mem2][1]+'</a>';
        }
        page = page + '</div>';*/
      }

      //$(".inContainer").append(page);

    });
  $(".subCategory").show();

}
