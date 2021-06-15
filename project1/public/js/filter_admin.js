$(document).ready(function () {
    $(document).ready(function (e) {
        $('#mnu-status').find('a').click(function (e) {
            e.preventDefault();
            var cat = $(this).text();
            $('#srch-status').text(cat);
            $('#txt-status').val($(this).attr('href'));
        });
    });
    $(document).ready(function (e) {
        $('#mnu-field').find('a').click(function (e) {
            e.preventDefault();
            var cat = $(this).text();
            $('#srch-field').text(cat);
            $('#txt-field').val($(this).attr('href'));
        });
    });
});   