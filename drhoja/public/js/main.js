function showAlert(text, type) {
    $('#alert_content_' + type).html(text);
    $('#alert-' + type).removeClass("hidden");
    setTimeout(function () {
        $('#alert-' + type).addClass("hidden");
    }, 3000);
}
