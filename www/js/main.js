$(document).ready(function () {
    $("#creationMove").click(function () {
        window.location.href = "creationGroup.php";
    });

    $("#EditProfilMove").click(function () {
        window.location.href = "EditionCompte.php";
    });


    $(function () {
        $('#dateScrolling').jqxScrollView({width: 600, height: 450, buttonsOffset: [0, 0]});
        $('#StartBtn').jqxButton({theme: theme});
        $('#StopBtn').jqxButton({theme: theme});
        $('#StartBtn').click(function () {
            $('#dateScrolling').jqxScrollView({slideShow: true});
        });
        $('#StopBtn').click(function () {
            $('#dateScrolling').jqxScrollView({slideShow: false});
        });
    });

    $('#yes').click(function () {
        console.log("Test Yes! ");
        UIkit.notify({
            message: 'yES §§	 !',
            status: 'info',
            timeout: 2000,
            pos: 'top-center'
        });
    });

//     alert($(".derby_name_session"));


});
