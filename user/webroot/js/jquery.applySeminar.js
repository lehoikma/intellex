var Seminar = (function () {

})();

$(function () {
    $(document).on('click', '.jsApplySeminar', function(e){
        e.preventDefault();
        if (Common.policyIsAccepted($('.jsAcceptPolicy')) === false) {
            $('.jsAcceptPolicyError').show();
        } else {
            $('form').submit();
        }
    });
});
