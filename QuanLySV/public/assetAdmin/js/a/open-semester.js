$(document).ready(function(){
    $('.checkOpenSemester').change(function(){
        var semester_id = $(this).data("open-semester");
        $('#openSemester-'+ semester_id).show();
    });
});
