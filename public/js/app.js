$(document).ready(function () {
    $("select[name='limit']").on("change", function (e) {
        $(this).closest("form").trigger("submit");
    });
});
