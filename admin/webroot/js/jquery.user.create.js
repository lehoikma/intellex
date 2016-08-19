var CreateUser = (function () {

    return {
        showExtraData: function(title, extraData) {
            $('.jsExtraData').jsonViewer(extraData);
            $('.jsExtraDataTitle').html(title);
            $('#jsExtraDataModal').modal('show');
        }
    }
})();

$(function () {
    $(document).on('click', '.jsShowExtraData', function(){
        var extraData = $(this).data('extra');
        var title = $(this).data('title');
        CreateUser.showExtraData(title, extraData);
    });
});
