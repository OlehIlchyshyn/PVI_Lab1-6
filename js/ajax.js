$(document).ready(function () {
    $("#showAdvice").on("click", function () {
        $.getJSON("https://official-joke-api.appspot.com/jokes/random", function (data) {
            alert(data.setup + " " + data.punchline);
        });
    });
});