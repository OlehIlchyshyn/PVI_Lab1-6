$('#switch').change(function() {
    if (this.checked) {
        $('body').css({"background-color": "#363636", "color": "white"});
        $('h1').addClass("text-light");
    }
    else {
        $('body').css({"background-color": "white", "color": "black"});
        $('h1').removeClass("text-light");
    }
});