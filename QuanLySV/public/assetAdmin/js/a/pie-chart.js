$(document).ready(function () {
    var select = document.getElementById("course_id");
    var id = select.value;
    ajax(id)
    $("#course_id").change(function () {
        select = document.getElementById("course_id");
        id = select.value;
        ajax(id);
    });


});
function ajax(id) {
    $.ajax({
        url: '/admin/pie-char/' + id,
        method: 'GET',
        success: function (data) {
            var ctx = document.getElementById('genderChart').getContext('2d');
            var genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Male: ' + data.male, 'Female: ' + data.female],
                    datasets: [{
                        data: [data.male, data.female],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Gender Ratio'
                    }
                }
            });
        }
    });
}
