/**
 * Created by fridurmus on 2/8/17.
 */
$("#registerForm").on("submit", (function (e) {
    e.preventDefault();
    const registerData = $( this ).serialize();

    const successmess = $("<div class='alert alert-success alert-dismissable fade' role='alert'>"+
        "<strong>Registration successful!</strong>"+
        "<button type='button' href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</button>"+
        "</div>");
    const errormess = $("<div class='alert alert-danger alert-dismissable fade' role='alert'>"+
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
        "<strong>Registration failed.</strong> Please contact support."+
        "</div>");
    function showAlert(){
        $(".alert").addClass("show");
    }
    console.log(registerData);
    $.post("./processing/register_processing.php", registerData, function (data) {
        $(".alert-dismissable").alert('close');
        console.log(data);
        let resultstate = true;
        var resarray = data.split('|');
        for(let i = 1; i < resarray.length; i++){
            console.log(resarray[i]);
            if(resarray[i] != 's'){
                resultstate = false;
            }
        }
        if(resultstate){
            $("#messagebox").append(successmess);
            setTimeout(function(){
                //location.replace("./index.php");
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