

$(function () {

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
