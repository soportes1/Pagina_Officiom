$(document).ready(function(){
    $(".categoryContainer").mouseleave(function(){
    $(".subCategory").hide();

  });
});

ecarCount();
function shown(id,tittle){
  var tam=0;
  var mem=0;
  var page="";
  //$(".inContainer").empty();
  $("#subContainer").empty();
  var url = $("#baseUrl").val();
  url = url+'tienda/getMenu';
  $.post(url,
    {
      'id':id
    },
    function(result){
      var erro = result;
      result = JSON.parse(result); ///convertimos JSON
      for(mem=0;mem<result.length;mem++){
        var element = '<li class="categoryName" onmouseover="shown2('+result[mem][0]+');" >'+result[mem][1]+'<i class="fas fa-chevron-right catChev"></i></li>';
        $("#subContainer").append(element);
      }///end of first for
    });
  $(".subCategory").show(); ///mostramos el nivel de subcategoria
}////fin de muncion 1


function shown2(id){
  var tam=0;
  var mem=0;
  $("#subContainer2").empty(); ///limpiamos la
  var url = $("#baseUrl").val();
  url = url+'tienda/getMenu2';
  $.post(url,
    {
      'id':id
    },
    function(result){/*
      var erro = result;
      result = JSON.parse(result); ///convertimos JSON
      for(mem=0;mem<result.length;mem++){
        var element = '<li class="categoryName" onmouseover="shown2('+result[mem][0]+');" >'+result[mem][1]+'<i class="fas fa-chevron-right catChev"></i></li>';
        $("#subContainer").append(element);
      }///end of first for*/
    });
  $(".subCategory2").show(); ///mostramos el nivel de subcategoria
}


/*#############funciones propias del carrito de compras*/

///funcion para agregar un producto al carrito
function adder(id){
  ////obtenemos el numero actual
  var addItems = $("#eitem"+id).val();
  if(addItems<50){
    addItems++;
    $("#eitem"+id).val(addItems);
  }

}


////funcion para restar elementos
function rest(id){
  var addItems = $("#eitem"+id).val();
  if(addItems>1){
    addItems--;
    $("#eitem"+id).val(addItems);
  }
}

///funcion para agregar al carrito de compras la cantidad requerida de productos
function addtoCart(id,price,name){
  ///obtememos la cantidad a agregar al carrito
  var cantidad = $("#eitem"+id).val();
  console.log(cantidad);
  if(cantidad>0){
    $.post('/officium/web/ecar/addToCart',
    {
      'id_producto':id,////id del producto
      'cantidad':cantidad,/// cantidad
      'price':price,
      'name':name
    },
    function(result){ ////verificamos el resultado
      if(result>0){
        ////recontamos los productos en el carrito de compras
        console.log('Item agregado al carrito');
        ////cambiamos la cantidad de productos en el carrito
        ecarCount();

      }else{
        alert('Error al agregar el producto. Contacte a su asesor de ventas'+result);
      }
    });
  }
}///end of function

///funcion para actualizar el numero de productos en la etiqueta del carrito
function ecarCount(){
  $.post('/officium/web/ecar/countEcar',
  {},function(result){
    ////actualizamos  la cantidad de productos en el flag
    $("#ecounter").html(result);

  });


}


////funcion que llena la ventana flotante del carrito de compras
function floatcarDisplay(){



}
