/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    $('#savoyPark').DataTable({
        responsive: true
    });

    $table = $('table#savoyPark').DataTable();

    var btnAdd_listing = $(".btnAdd_listing");
    btnAdd_listing.on('click', function () {
        var urlajax = url + 'brgdm/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('add_listing'),
            success: function (data) {
                $('#deleteListing_panel').fadeOut(300);
                $("#addListing_panel").show();
                $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                $("#addListing_panel").html(data);
            }
        });
    });
});

