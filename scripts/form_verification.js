/**
 * Created by fridurmus on 2/9/17.
 */
function verifyError(formClass, formGroupClass, formButton){
    $(formClass).addClass("form-control-danger");
    $(formGroupClass).addClass("has-danger");
    $(formClass).removeClass("form-control-success");
    $(formGroupClass).removeClass("has-success");
    $(formButton).prop("disabled", true);
}

function verifySuccess(formClass, formGroupClass, formButton){
    $(formClass).removeClass("form-control-danger");
    $(formGroupClass).removeClass("has-danger");
    $(formClass).addClass("form-control-success");
    $(formGroupClass).addClass("has-success");
    $(formButton).prop("disabled", false);
}

function verifyClear(formClass, formGroupClass, formButton){
    $(formClass).removeClass("form-control-danger");
    $(formGroupClass).removeClass("has-danger");
    $(formClass).removeClass("form-control-success");
    $(formGroupClass).removeClass("has-success");
    $(formButton).prop("disabled", false);
}