$(document).ready(function () {
    $("#showAdvice").on("click", function () {
        $.getJSON("https://api.adviceslip.com/advice", function (data) {
            alert(data.slip.advice);
        });
    });
});