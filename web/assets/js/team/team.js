$(document).ready(function () {

    $('#teams').DataTable({
        responsive: true
    });

    $table = $('table#teams').DataTable();

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

    var btnAdd_team = $(".btnAdd_team");
    btnAdd_team.on('click', function () {
        var urlajax = url + 'users/teams/ajax';
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: urlajax,
            data: ('add_team'),
            beforeSend: function () {
                $("#addTeam_panel").show();
                $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                $("#addTeam_panel").html('<div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>');
            },
            success: function (data) {
                $('#deleteTeam_panel').fadeOut(300);
                $('#updateTeam_panel').fadeOut(300);
                $("#addTeam_panel").show();
                $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                $("#addTeam_panel").html(data);
            }
        });
    });


});

