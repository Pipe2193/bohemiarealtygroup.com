/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {





///////////////////////////////////// mod1 uploader///////////////////////
$(".messages").hide();
//queremos que esta variable sea global
var fileExtension = "";
//función que observa los cambios del campo file y obtiene información
$('#upfile').change(function ()
{
//obtenemos un array con los datos del archivo
        var file = $("#upfile")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        showMessage("<td></td><td><span class='info'> " + upload_message_4 + fileName + ", Size: " + fileSize + " bytes.</span></td><td></td>");
});
//al enviar el formulario
$('#uploadfile').click(function () {
//información del formulario
        var inputFileImage = document.getElementById("upfile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('upfile', file);
        var message = "";
        var urlajax = url + 'CMS/blogs/ajax';
        //hacemos la petición ajax  
        $.ajax({
        url: urlajax,
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                //mientras enviamos el archivo
                beforeSend: function () {
                message = $("<td></td><td><span class='before'><i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>" + upload_message_3 + "...</span>" + upload_message_1 + "...</span></td><td></td>");
                        showMessage(message);
},
success: function (data) {
                        message = $(data);
                        showMessage(message);
},
//si ha ocurrido un error
error: function () {
                        message = $("<td></td><td><span class='error'>" + upload_message_2 + "</span></td><td></td>");
                        showMessage(message);
}
});
});
//como la utilizamos demasiadas veces, creamos una función para 
//evitar repetición de código
function showMessage(message) {
                        $(".messages").html("").show();
                        $(".messages").html(message);
}

///////////////////////////////////// mod1 uploader////////////////////////


});


