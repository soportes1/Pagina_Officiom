$(document).ready(function(){
    $(".categoryContainer").mouseleave(function(){
    $(".subCategory").hide();

  });
});

ecarCount();
function shown(id,tittle){
  var tam=0;
  var tam2=2;
  var mem=0;
  var mem2=0;
  var mem3=0;
  var page="";
  //$(".inContainer").empty();
  $(".category-tittle").html(tittle);
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
        page = page + '<div class="tpContainer">';
        tam2 = result[mem].length;///obtenemos la cantidad de elementos de subcategoria
        if(tam2>4){
          tam2 = 4;
          mem3 ='<a href="#" style="color:#B4B4B4" class="btn btn-link">Ver más...</a>';
        }else{
          mem3='';
        }
        for(mem2=0;mem2<tam2;mem2++){
          if(mem2==0){
            page = page + '<a href="#"><b>'+result[mem][mem2][1]+'</b></a>';
          }else{
            page = page + '<a href="#">'+result[mem][mem2][1]+'</a>';
          }
        }///end of second for
        page = page+mem3;
        page = page + '</div>';
      }///end of first for
      $(".inContainer").html(page); ///remove previus content and render new
    });
  $(".subCategory").show();
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
