/**
 * Created by fridurmus on 2/11/17.
 */
$("#loginForm").on("submit", (function (e) {
    e.preventDefault();
    const loginData = $( this ).serialize();
    const successmess = $("<div class='alert alert-success alert-dismissable fade' role='alert'>"+
        "<strong>Login successful!</strong>"+
        "<button type='button' href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</button>"+
        "</div>");
    const errormess = $("<div class='alert alert-danger alert-dismissable fade' role='alert'>"+
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
        "<strong>Login Failed.</strong> Please check your details and try again."+
        "</div>");
    function showAlert(){
        $(".alert").addClass("show");
    }
    $.post("./processing/login_processing.php", loginData, function (data) {
        $(".alert-dismissable").alert('close');
        let resultstate = true;
        const resarray = data.split('|');
        for(let i = 1; i < resarray.length; i++){
            if(resarray[i] != 's'){
                resultstate = false;
            }
        }
        if(resultstate){
            $("#messagebox").append(successmess);
            setTimeout(function(){
                location.replace("./index.php");
            }, 2000);
        }
        else{
            $("#messagebox").append(errormess);
        }
        window.setTimeout(function () {
            showAlert();
        }, 50);
    });
}));