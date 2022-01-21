$(document).ready(function(){
   
    $(".filtroBottoni").click(function(){
        $("button.disabilitato").removeClass("disabilitato")
        $(this).addClass("disabilitato")
    });
});