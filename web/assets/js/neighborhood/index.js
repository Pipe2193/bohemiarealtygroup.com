/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $('#neighborhood').DataTable({
        responsive: true,
         "pageLength": 50
    });

    $table = $('table#neighborhood').DataTable();

//button add role function
    var btnAdd_neighborhood = $(".btnAdd_neighborhood");
    $(btnAdd_neighborhood).on('click', function () {
        var urlajax = url + '/system/boroughs/neighborhood/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('addNeighborhood'),
            success: function (data) {
                $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                $("#addNeighborhood_panel").show();
                $("#addNeighborhood_panel").html(data);
            }
        });
    });
});

