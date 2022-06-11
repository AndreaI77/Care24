$(document).ready(function(){

    if(sessionStorage.getItem('testCookie') == null){
        var myoffcanvas=  $('#offcanvasBottom');
        setTimeout(function(){
            // new bootstrap.Offcanvas(myoffcanvas).show();
            $('.enlace')[0].click();
            sessionStorage.setItem('testCookie','mycookie');
        },3000);

    }

});
