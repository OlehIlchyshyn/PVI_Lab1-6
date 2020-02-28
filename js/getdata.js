var index = 0;
$('#getData').on('click', function () {
    $.get("data.php", {"index": index}, function (data) {
        $('#result').html(data);
        index+=1;
    })
});