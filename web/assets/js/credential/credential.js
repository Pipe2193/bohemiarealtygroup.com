/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $('#roles').DataTable({
        responsive: true
    });

    $table = $('table#roles').DataTable();

//button add role function
    var btnAdd_role = $(".btnAdd_role");
    $(btnAdd_role).on('click', function () {
        var urlajax = url + 'user/roles/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('addRole'),
            success: function (data) {
                $('html, body').animate({scrollTop: $('#addRole_panel').offset().top}, 'slow');
                $("#addRole_panel").show();
                $("#addRole_panel").html(data);
            }
        });
    });
});