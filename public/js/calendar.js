$(document).ready(function () {
    var events = window.events
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next,today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        height: $(window).height() * 0.7,
        buttonText: {
            prev: 'prev',
            next: 'next'
        },
        timeFormat: 'h(:mm)t',
        selectable: true,
        events: events,
        eventRender: function(event, element) {
            element.find(".fc-event-title").append("<a style='color: unset' onclick=\"return confirm('Are you sure you want to delete this work?');\" href='delete?id="+event.id+"'><i class='ml-3 fa fa-trash'></i></a>");
            element.find(".fc-event-title").append("<a style='color: unset' href='show_edit?id="+event.id+"'><i class='ml-3 fa fa-pencil'></i></a>");
        }
    });
});