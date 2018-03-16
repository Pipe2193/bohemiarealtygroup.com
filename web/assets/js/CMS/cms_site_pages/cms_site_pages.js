/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
      $('#site_pages').DataTable({
        responsive: true,

    });
    

    $table = $('table#site_pages').DataTable();

    $table.on('click', 'button.btnUpdate_user', function () {
        var idUser = $(this).data("id");
        var urlajax = url + 'users/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('userID=' + idUser),
            success: function (data) {

                $('#addUser_panel').fadeOut(300);
                $('#deleteUser_panel').fadeOut(300);
                $("#user_update_panel").show();
                $('html, body').animate({scrollTop: $('#user_update_panel').offset().top}, 'slow');
                $("#user_update_panel").html(data);
            }
        });
    });

    $table.on('click', 'button.btnDelete_blog', function () {
        var idUser = $(this).data("id");
        var urlajax = url + '/CMS/blogs/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('deleteBlog=' + idUser),
            success: function (data) {

                $("#deleteBlog_panel").show();
                $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                $("#deleteBlog_panel").html(data);
            }
        });
    });
    

});

