$(document).ready(function () {
    $("#creationMove").click(function () {
        window.location.href = "creationGroup.php";
    });

    $("#EditProfilMove").click(function () {
        window.location.href = "EditionCompte.php";
    });

    $("#logOff").click(function () {
        $.ajax({
            type: "POST",
            url: "php/logOff.php",
            success: function () {
                window.location.href = "index.php";
            }
        });
    });
    
    $("#arrowDownToHide").click(function(){
       $("#arrowDownToHide").fadeOut(1000);
       $("#arrowUpToHide").fadeIn(1000); 
       $("#menuMain").fadeIn(1000); 
    });
    $("#arrowUpToHide").click(function(){
       $("#arrowUpToHide").fadeOut(1000);
       $("#arrowDownToHide").fadeIn(1000); 
       $("#menuMain").fadeOut(1000); 
    });
    

    $(function () {
        $('#dateScrolling').jqxScrollView({width: 600, height: 450, buttonsOffset: [1, 1]});
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
