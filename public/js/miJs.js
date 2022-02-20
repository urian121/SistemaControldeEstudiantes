

$(document).ready(function () {

    /**Efecto cargando en el panel**/
    setTimeout(function () {
       $(".cargando").fadeOut(500);
    }, 100);


	/**Desaparecer la Alerta de msj con el boton X***/
    $('#bannerClose').click(function(){
        $("#proBanner").fadeOut(500);
    });

	/***Datos del usuario actualizados du**/
	setTimeout(function () {
        $(".du").fadeOut(1500);
    }, 3000);

	/**Producto eliminado***/
    setTimeout(function () {
        $(".dpf").fadeOut(1500);
    }, 3000);

    /***Msj de producto actualizado correctamente***/
    setTimeout(function () {
        $(".pa").fadeOut(1500);
    }, 3000);



/**Desaparecer mjs de registro exitoso Categoria**/
    setTimeout(function () {
        $(".ct").fadeOut(1500);
    }, 3000);

    /**Desaparecer mjs de registro exitoso etiqueta**/
    setTimeout(function () {
        $(".et").fadeOut(1500);
    }, 3000);

	/**Desaparecer msj de Producto Registrado Correctamente***/
    setTimeout(function () {
        $(".prx").fadeOut(1500);
    }, 3000);




/**Desaparecer msj de categoria Borrada**/
    setTimeout(function () {
        $(".dc").fadeOut(1500);
    }, 3000);

/**Desaparecer msj de Etiqueta Borrada**/
    setTimeout(function () {
        $(".de").fadeOut(1500);
    }, 3000);

 setTimeout(function () {
        $(".re").fadeOut(1500);
    }, 3000);
 
});






/****Cambiar Logo */
$('#conteLogo').on('change', '#logo', function(e){
    e.preventDefault();
    var formData = new FormData($(this).parents('form')[0]);

    $.ajax({
        url: 'accionesHeader/dataLogo.php',
        type: 'POST',
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },

       data: $("#Miform").serialize(), 
        success: function(data){
        //$("#conteLogo").html(data); 
        $("#Miform")[0].reset();
        location.href="header.php";  
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});


/****Banner 1 */
$('#conteBanner').on('change', '#bannerOne', function(e){
    e.preventDefault();
    var formData = new FormData($(this).parents('form')[0]);

    $.ajax({
        url: 'accionesHeader/dataBannerOne.php',
        type: 'POST',
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },

       data: $("#MiformBanner").serialize(), 
        success: function(data){
        //$("#conteLogo").html(data); 
        $("#MiformBanner")[0].reset();
        location.href="header.php";  
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});


/****Banner 2 */
$('#conteBannerTwo').on('change', '#bannerTwo', function(e){
    e.preventDefault();
    var formData = new FormData($(this).parents('form')[0]);

    $.ajax({
        url: 'accionesHeader/dataBannerTwo.php',
        type: 'POST',
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },

       data: $("#MiformBannerTwo").serialize(), 
        success: function(data){
        $("#resp").html(data); 
        $("#MiformBannerTwo")[0].reset();
        //location.href="header.php";  
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});


//Cambiar el estado de un producto activarlo -desactivarlo
$('.switchStatusStatusProduct').change(function() {
    var statusPublication     = $(this).prop('checked') == true ? 1 : 0; 
    var id   = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'acciones/activarPublicacion.php',
        data: {'statusPublication': statusPublication, 'id': id},
        success: function(data){
            location.href="publicPendientes.php?cp=1";
        }
    }); 
});