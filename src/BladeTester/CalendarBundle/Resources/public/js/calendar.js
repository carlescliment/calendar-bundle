
$('document').ready(function() {
    $('.timetable-table-row').each(function() {
        var max_height = calendar_get_max_height(this);
        $(this).find('.cell').each(function() {
            var height = $(this).height();
            if (height > max_height) {
                max_height = height;
            }
        });
        $(this).find('.cell').height(max_height);
    });
});

function calendar_get_max_height(row) {
    if ($(row).find('.appointment').length > 0) {
        return 139;
    }
    return 40;

}