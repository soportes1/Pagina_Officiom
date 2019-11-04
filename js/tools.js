
ecarCount();

var initialState = 0; ///estado inicial del menu
var actualSize = $( window ).width(); ///tamano inicial de la pantalla

$(document).ready(function(){
  $(window).resize(function(){
    actualSize = $( window ).width(); ///tamano inicial de la pantalla
    if(actualSize<769){ ///cerramos el menu de navegacion
      $(".categoryContainer").slideUp();
      $(".subCategory").slideUp();
      $(".subCategory2").slideUp();
      initialState = 0;
    }
  });

  ////detectamos si da click en el contenedor fuera del menu
  $('.categoryContainer').on('click',function(e){
    if(e.target !== this) ///no cerramos el menu
    return;

    $(".categoryContainer").slideUp(); ////cerramos el menu
    $(".subCategory").slideUp();
    $(".subCategory2").slideUp();
    initialState = 0;

  });


});

function menuDown(){
  if(initialState<1){
    $(".categoryContainer").slideDown();
    initialState = 1;
  }else{
    $(".categoryContainer").slideUp();
    $(".subCategory").slideUp();
    $(".subCategory2").slideUp();
    initialState = 0;
  }
}


function closeMenu(){
  $(".categoryContainer").slideUp();
  $(".subCategory").slideUp();
  $(".subCategory2").slideUp();
  initialState = 0;

}



function shown(id,tittle){
  var tam=0;
  var mem=0;
  var page="";
  //$(".inContainer").empty();
  $(".subCategory2").slideUp("fast");
  $(".subCategory").slideUp("fast",function(){
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
            var element = '<li class="categoryName" onclick="shown2('+result[mem][0]+');" >'+result[mem][1]+'<i class="fas fa-chevron-right catChev"></i></li>';
            $("#subContainer").append(element);
          }///end of first for
        });
      $(".subCategory").slideDown();
 ///mostramos el nivel de subcategoria
      $(".subCategory2").fadeOut();
  }); ///end of slideUp

}////fin de muncion 1


function shown2(id){
  var tam=0;
  var mem=0;
  var baseurl = $("#baseUrl").val();
  $(".subCategory2").slideUp("fast",function(){
    $("#subContainer2").empty(); ///limpiamos la
    var url = $("#baseUrl").val();
    url = url+'tienda/getMenu2';
    $.post(url,
      {
        'id':id
      },
      function(result){
        var erro = result;
        result = JSON.parse(result); ///convertimos JSON
        for(mem=0;mem<result.length;mem++){
          var element = '<li  class="categoryName" ><a class="inCategoryName" href="'+baseurl+'producto/results/tipo_producto/'+result[mem][0]+'"> + '+result[mem][1]+'<a/></li>';
          $("#subContainer2").append(element);
        }///end of first for*/
      });
    $(".subCategory2").slideDown();
 ///mostramos el nivel de subcategoria
  }); ///end of slideUp
 ///mostramos el nivel de subcategoria
}

////meotodo que nos permite verificar los campos para registrar nuevos clientes
function newUser(){
}

////metodo que compueba si un correo es valido
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
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

///funcion para agregar un producto al carrito a productos del slider
function adder2(id){
  ////obtenemos el numero actual
  var addItems = $("#eitem"+id).val();
  if(addItems<50){
    addItems++;
    $(".eitem"+id).val(addItems);
  }
}

///funcion para agregar un producto al carrito a productos del slider
function adder3(id){
  ////obtenemos el numero actual
  $("#finaliza").attr('disabled','true');
  var addItems = $("#eitem"+id).val();
  if(addItems<50){
    addItems++;
    $("#eitem"+id).val(addItems);
  }
  /////actualizamos el carrito
  var price = $("#eprice"+id).val();
  addtoCart(id,price,'generic');

  location.reload();
}

////funcion para restar elementos
function rest(id){
  var addItems = $("#eitem"+id).val();
  if(addItems>1){
    addItems--;
    $("#eitem"+id).val(addItems);
  }
}

////funcion para restar elementos a productos de slider
function rest2(id){
  var addItems = $("#eitem"+id).val();
  if(addItems>1){
    addItems--;
    $(".eitem"+id).val(addItems);
  }
}

////funcion para restar elementos a productos de slider
function rest3(id){
  $("#finaliza").attr('disabled','true');
  var addItems = $("#eitem"+id).val();
  if(addItems>1){
    addItems--;
    $("#eitem"+id).val(addItems);
  }
  var price = $("#eprice"+id).val();
  addtoCart(id,price,'generic');

  location.reload();
}

/////funcion para eliminar un producto del carrito
function removeEcar(id){
  $.post('/officium/web/ecar/remove_item',{
    'id_producto':id
  },
  function(result){
    if(result>0){
      location.reload();
    }else{
      alert("Error al actualizar el Carrito. Contacte a un asesor");
    }
  });
}///end of function result

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
        floatcarDisplay();
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
 $.post('/officium/web/ecar/floatDisplay',
  {
  },function(result){

    result = JSON.parse(result);
    var citems =result.length;
    var i=0;
    var adds="";
    for(i=0;i<citems;i++){
      var img = result[i][1].substring(2)
       img = 'https://officiumix.com.mx/'+img;
        adds= adds+'<div style="margin-bottom:15px;" class="col-3"><img class="rounded" src="'+img+'" style="width:75px"> </div>'+
        '<div style="margin-bottom:15px; padding-top:12px;" class="col-6"><small>'+result[i][0]+'</small></div>'+
        '<div style="margin-bottom:15px;" class="col-2 text-right">'+result[i][2]+'</div>';
    }
    $("#ecarList").html(adds);
    $('#exampleModal').modal('toggle');
  }); ///end of comuniccation

}///end of function
