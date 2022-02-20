//EDITANDO EL MENU
$(document).ready(function() {

    $( ".editar" ).click(function() {
        var idCliente      = $('#cliente_id').val(); 
        var id             = $(this).attr("id");
        var linkOne        = $('#linkOne').text();
        var linkTwo        = $('#linkTwo').text(); 
        var value          = $('.editable' + id).attr('contenteditable');
       // console.log('link1:' + linkOne + 'link2'+ linkTwo + 'idCliente'+ idCliente);

    
     if (value != 'true') {
            //console.log('true');
            $('.editable' + id).attr('contenteditable','true');
            $('.editar').hide();
            $('.guardar' + id).show();
            
            $("#linkOne" + id).addClass("nombreActivo"); //Agrego clase para el nombre
            $(".entrar" + id).addClass("borderActivo"); //Agrego una clase
            $(".barra").addClass("btn_seleccionado"); //AGREGO CLASE PARA MOSTRAR LA SECCION ACTIVADA 
            $("#linkOne" + id).focus();
        }
        else {
            console.log('false');
            $('.editable' + id).attr('contenteditable','false');
            $('.btn_edit' + id).show();
            $('.guardar' + id).hide();
             
            $('.edit').show();
            $("#linkOne" + id).removeClass("nombreActivo");
            $(".entrar" + id).removeClass("borderActivo"); //quito la clase

            $(".barra").removeClass("btn_seleccionado"); //quito la clase del elemento seleccionado
            
            var dataStringPlantilla = 'linkOne=' + linkOne + '&linkTwo=' + linkTwo + '&idCliente=' +idCliente;
            //console.log(dataStringPlantilla);
            url = "accionesHeader/dataMenu.php";
             $.ajax({
                   type: "POST",
                   url: url,
                   data: dataStringPlantilla,
                   success: function(data)
                   {
                     $('#resp').html(data);
                    // console.log(data);
                   }
               }); 
        }
    });
});






//EDITANDO EL TITULO DEL BANNER
$(document).ready(function() {
$( ".editarTitleBanner" ).click(function() {
    var idCliente      = $('#cliente_id').val(); 
    var id             = $(this).attr("id");
    var titleBanner    = $('#titleBanner').text();
    var value          = $('.editable' + id).attr('contenteditable');
    console.log('id: ' + id + 'titulo:' + titleBanner + 'idCliente'+ idCliente);


 if (value != 'true') {
    console.log('true');
        $('.editable' + id).attr('contenteditable','true');
        $('.editarTitleBanner').hide();
        $('.guardar' + id).show();
        
        $("#titleBanner" + id).addClass("nombreActivo"); //Agrego clase para el nombre
        $(".entrar" + id).addClass("borderActivo"); //Agrego una clase
        $(".barra").addClass("btn_seleccionado"); //AGREGO CLASE PARA MOSTRAR LA SECCION ACTIVADA 
        $("#titleBanner" + id).focus();
    }
    else {
        console.log('false');
        $('.editable' + id).attr('contenteditable','false');
        $('.btn_edit' + id).show();
        $('.guardar' + id).hide();
         
        $('.editarTitleBanner').show();
        $("#titleBanner" + id).removeClass("nombreActivo");
        $(".entrar" + id).removeClass("borderActivo"); //quito la clase

        $(".barra").removeClass("btn_seleccionado"); //quito la clase del elemento seleccionado
        
        var dataStringPlantilla = 'titleBanner='+ titleBanner + '&idCliente=' +idCliente;
        console.log(dataStringPlantilla);
        url = "accionesHeader/dataTitleBanner.php";
         $.ajax({
               type: "POST",
               url: url,
               data: dataStringPlantilla,
               success: function(data)
               {
                 $('#resp').html(data);
                // console.log(data);
               }
           }); 
    }
});

});