var DocRequest = (function () {

    return {
        autoFillAddress: function() {
            AjaxZip3.zip2addr('data[User][postal_code1]', 'data[User][postal_code2]', 'data[User][address1]', 'data[User][address2]', 'data[User][address3]');
        }
    }
})();

$(function () {
    $(document).on('click', '.jsSubmitDocRequest', function(e){
        e.preventDefault();
        if (Common.policyIsAccepted($('.jsAcceptPolicy')) === false) {
            $('.jsAcceptPolicyError').show();
        } else {
            $('form').submit();
        }
    });

    $('.jsAutoFillAddress').click(function() {
         DocRequest.autoFillAddress();
    });
});
