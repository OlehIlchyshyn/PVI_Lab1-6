let usrPass = $("[name='password']");
let passConfirm = $("[name='password_confirm']");
let passError = $("#password_confirm_error");
function validateSignUp() {
    if (usrPass.val() !== passConfirm.val()){
        passError.text("Passwords must match!");
        return false;
    }
    return true;
}