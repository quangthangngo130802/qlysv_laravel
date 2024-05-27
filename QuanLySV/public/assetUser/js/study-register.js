$(document).ready(function () {
    //Tính tổng số tín chỉ
    var rows = $("#creditTable tr");
    var total = 0;
    rows.each(function () {
        var span = $(this).find(".gridRegistered_lblCourseCredit_0");
        total += parseInt(span.text());
    });

    $("#totalCredits").text(total);
});

function formdangky() {
    $('#formdangky').submit();
}
function formdoilop() {
    $('#formdoilop').submit();
}
