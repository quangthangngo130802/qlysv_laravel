function openPopup() {
    document.getElementById("productPopup").style.display = "block";
}

function closePopup() {
    document.getElementById("productPopup").style.display = "none";
}
function addCourse() {
    var courseName = $('input[name="course_name"]').val();
    var yoa = $('input[name="year_of_admission"]').val();
    if (courseName === '') {
        $('#course_name').html('<p class="error-message">The course field is required.</p>');
        return;
    }
    if (yoa === '') {
        $('#yoa').html('<p class="error-message">The year_of_admission field is required.</p>');
        return;
    }
    document.getElementById('productForm').submit();
}

