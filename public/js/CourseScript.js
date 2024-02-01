$(document).ready(function(){
    $('.nav-tabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    // Initialize FullCalendar in each tab
    $('#calendarProgrammes').fullCalendar({
        // FullCalendar options for Programmes tab
        // ...
    });

    $('#calendarCours').fullCalendar({
        // FullCalendar options for Cours Déjà Pris tab
        // ...
    });
});