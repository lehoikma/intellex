var SeminarAttendees = (function () {

    return {
        changeAttendeeStatus: function(obj) {
            var status = obj.val();
            var attendeeId = obj.closest('tr').find('.seminarUserId').val();
            $.ajax({
                url : '/users/updateAttendeeStatus',
                type: 'POST',
                data : {
                    status : status,
                    attendee_id : attendeeId
                }
            }).done(function(json){
                var data = jQuery.parseJSON(json);
                noty({text: data.msg, layout: 'topRight', type: data.result});
            });
        }
    }
})();

$(function () {
    $('.jsChangeStatus').change(function() {
        SeminarAttendees.changeAttendeeStatus($(this));
    });
});
