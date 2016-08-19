var SpeakerList = (function () {

    return {
        deleteSpeaker: function(speakerId) {
            $('#myModal').modal('show');
            $('.dialog-title').html('講師情報を削除します。よろしいですか？');
            $('.dialog-action').attr('action', 'speakers/' + speakerId + '/delete');
        },
        editSpeaker: function(speakerId) {
            window.location.replace('speakers/' + speakerId);
        }
    }
})();

$(function () {
    $(document).on('click', '.jsDeleteSpeaker', function(){
        var speakerId = $(this).closest("tr").data("speaker_id");
        SpeakerList.deleteSpeaker(speakerId);
    });
    $(document).on('click', '.jsEditSpeaker', function(){
        var speakerId = $(this).closest("tr").data("speaker_id");
        SpeakerList.editSpeaker(speakerId);
    });
});
