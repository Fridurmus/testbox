//noinspection JSAnnotator

console.log(existingUsers);
$(".passVerifyForm").on("keyup", function(){
    let $passIn = $("#newPassword").val();
    let $passVal = $("#newPasswordVerify").val();
    if($passVal != $passIn){
        verifyError(".passVerifyForm", ".passVerify", "#registerSubmit");
        $("#pwNoMatch").addClass("show");
    }
    else if($passVal.length == 0 && $passIn.length == 0){
        verifyClear(".passVerifyForm", ".passVerify", "#registerSubmit");
        $("#pwNoMatch").removeClass("show");
    }
    else{
        verifySuccess(".passVerifyForm", ".passVerify", "#registerSubmit");
        $("#pwNoMatch").removeClass("show");
    }
});
$("#newUserName").on("keyup", function(){
    if(existingUsers.includes($(this).val())){
        verifyError(".newUserNameForm", ".userName", "#registerSubmit");
        $("#takenUserName").addClass("show");
    }
    else if($(this).val().length == 0){
        verifyClear(".newUserNameForm", ".userName", "#registerSubmit");
        $("#takenUserName").removeClass("show");
    }
    else{
        verifySuccess(".newUserNameForm", ".userName", "#registerSubmit");
        $("#takenUserName").removeClass("show");
    }
});
$("#newEmail").on("keyup", function(){
    let emailValue = $(this).val();
    if(emailValue.length == 0){
        verifyClear(".newEmailForm", ".newEmail", "#registerSubmit");
        $("#invalidEmail").removeClass("show");
    }
    else if($(this)[0].checkValidity()){
        verifySuccess(".newEmailForm", ".newEmail", "#registerSubmit");
        $("#invalidEmail").removeClass("show");
    }
    else{
        verifyError(".newEmailForm", ".newEmail", "#registerSubmit");
        $("#invalidEmail").addClass("show");
    }
});/**
 * Created by fridurmus on 2/9/17.
 */
