$(document).ready(function(){

    $(".bottoneMenu").click(function(){
        
        if($(".menu").css("display") == "none"){
            $(".menu").css("display", "block");
        } else {
            $(".menu").css("display", "none");
        }

        });

});