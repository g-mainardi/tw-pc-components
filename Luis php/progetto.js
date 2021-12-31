$(document).ready(function(){


    $(".mostra").click(function(){
        
        if($(".tabella").css("display") == "none"){
            $(".tabella").css("display", "");
        } else {
            $(".tabella").css("display", "none");
        }

        });

        $(".bottoneMenu").click(function(){
        
            if($(".menu").css("display") == "none"){
                $(".menu").css("display", "block");
            } else {
                $(".menu").css("display", "none");
            }
    
            });
    // $("select.quantità").change(function(){
    //   var selectedNumber = $(this).children("option:selected").val();
    //});

    var temp = 0;
    $(".prezzo").each(function(){
    var tdTxt = $(this).text();
    temp+= parseFloat(tdTxt); 
    $(".totale").text(temp+" $");
    });





});