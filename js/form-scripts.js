$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Nous savons que le formulaire est compliqué, mais encore un petit effort, il nous faut au moins votre prénom et le titre de la chanson!");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var song = $("#song").val();

    $.ajax({
        type: "POST",
        url: "form-process.php",
        data: "name=" + name + "&song=" + song,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "C'est noté !");
    setTimeout(function(){submitMSG(true, "");}, 4000);
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "tada animated text-success";
    } else {
        var msgClasses = "text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
