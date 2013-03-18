
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

    $('form .calendar-colors li').click(calendar_toggle_color);
});

function calendar_get_max_height(row) {
    if ($(row).find('.appointment').length > 0) {
        return 139;
    }
    return 40;

}

function calendar_toggle_color() {
    $('form .calendar-colors li').removeClass('active');
    $(this).addClass('active');
    var id = $(this).attr('id');
    $('#category_color').val(id);

}