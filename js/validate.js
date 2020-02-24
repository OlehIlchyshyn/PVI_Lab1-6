let usrPass = $("#pass");
let passConfirm = $("#pass_confirm");
let passError = $("#password_confirm_error");
function validateSignUp() {
    if (usrPass.val() !== passConfirm.val()){
        passError.text("Паролі повинні збігатись!");
        return false;
    }
    return true;
}