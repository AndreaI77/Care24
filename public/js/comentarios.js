$(document).ready(function () {

    $.ajax({
        method: "GET",
        url: "valoraciones",
        success: function (data) {

            console.log(data);
        },
        error: function(){
         console.log('error');
        }
    });
});
