$(".delete").each(function () {
    this.onclick = function () {
        $.get("delete-row.php", {index: $(this).parents('tr').children('td:first').text()});
        location.reload();
    }
});