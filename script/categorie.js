$(document).ready(function(){
   
    $(".filtroBottoni1").click(function(){
        $("button.disabilitato").removeClass("disabilitato")
        $(this).addClass("disabilitato")
    });

    $(".filtroBottoni2").click(function(){
        $("button.disabilitato").removeClass("disabilitato")
        $(this).addClass("disabilitato")
    });

});