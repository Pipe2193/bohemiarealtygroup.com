$(document).ready(function () {
//    BUILDING TABLE SETTINGS
    $('#buildingTable').DataTable({
        responsive: true
    });

    $table = $('table#buildingTable').DataTable();

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

    $table.on('click', 'button.btnDelete_user', function () {
        var idUser = $(this).data("id");
        var urlajax = url + 'users/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('deleteUser=' + idUser),
            success: function (data) {

                $('#addUser_panel').fadeOut(300);
                $('#user_update_panel').fadeOut(300);
                $("#deleteUser_panel").show();
                $('html, body').animate({scrollTop: $('#deleteUser_panel').offset().top}, 'slow');
                $("#deleteUser_panel").html(data);
            }
        });
    });

    var btnAdd_building = $(".btnAdd_building");
    $(btnAdd_building).on('click', function () {
        var landlord_hash = $(this).data("hash");
        var urlajax = url + 'building/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('addBuilding='+ landlord_hash),
            success: function (data) {
                $('#deleteBuilding_panel').fadeOut(300);
                $("#addBuilding_panel").show();
                $('html, body').animate({scrollTop: $('#addBuilding_panel').offset().top}, 'slow');
                $("#addBuilding_panel").html(data);
            }
        });
    });
    
    //APARTMENTS TABLE SETTINGS 
    $('#apartments').DataTable({
        responsive: true
    });

    $table = $('table#apartments').DataTable();

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

    $table.on('click', 'button.btnDelete_user', function () {
        var idUser = $(this).data("id");
        var urlajax = url + 'users/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('deleteUser=' + idUser),
            success: function (data) {

                $('#addUser_panel').fadeOut(300);
                $('#user_update_panel').fadeOut(300);
                $("#deleteUser_panel").show();
                $('html, body').animate({scrollTop: $('#deleteUser_panel').offset().top}, 'slow');
                $("#deleteUser_panel").html(data);
            }
        });
    });

    var btnAdd_apartment = $(".btnAdd_apartment");
    $(btnAdd_apartment).on('click', function () {
        var landlord_hash = $(this).data("hash");
        var urlajax = url + 'apartment/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('addApartment='+ landlord_hash),
            success: function (data) {
                $('#deleteApartment_panel').fadeOut(300);
                $("#addApartment_panel").show();
                $('html, body').animate({scrollTop: $('#addApartment_panel').offset().top}, 'slow');
                $("#addApartment_panel").html(data);
            }
        });
    });
    

});

