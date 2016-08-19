var SeminarCreator = (function () {

    const SUBMIT_TYPE_DRAFT = 1;
    const SUBMIT_TYPE_PUBLISH = 2;

    return {
        changeSubmissionType: function() {
            $('.jsSubmitDraft').click(function () {
                $('.jsSubmitType').val(SUBMIT_TYPE_DRAFT);
                $('.jsCreateSeminar').submit();
            });
            $('.jsSubmitPublish').click(function () {
                $('.jsSubmitType').val(SUBMIT_TYPE_PUBLISH);
                $('.jsCreateSeminar').submit();
            });
        },
        copySeminar: function() {
            var seminarId = $('#SeminarId').val();
            $('.dialog-title').html('セミナー情報をコピーして、新しく作成しますか？');
            $('.dialog-action').attr('action', seminarId + '/copy');
        },
        selectSpeakers: function() {
            //show speaker selector
            $('.jsSpeakerName').click(function(){
                $('#jsSelectSpeakers').modal('show');
            });

            $('.jsSubmitSpeakerSelector').click(function(){
                var speakerIds = [];
                $('.jsSpeakerCheckbox').each(function () {
                    if (this.checked) {
                        speakerIds.push($(this).val());
                    }
                });

                //remove all of current speakers if no speaker selected and return
                if (speakerIds.length == 0) {
                    $('.jsSpeakerName').val('');
                    $('.jsSpeakerId').val('');
                    $('.jsSpeakerExpansion').find('.jsAppendedElement').remove();
                    return;
                }
                $.ajax({
                    url : '/speakers/findAllByIds',
                    type: 'POST',
                    data : {
                        ids : speakerIds
                    }
                }).done(function(json){
                    //remove all of current speakers
                    $('.jsSpeakerExpansion').find('.jsAppendedElement').remove();

                    //append new speakers
                    var data = JSON.parse(json);
                    if (data.length > 0) {
                        //fill first selected speaker to the first speaker on view
                        $('.jsSpeakerName').val(data[0].Speaker.name);
                        $('.jsSpeakerId').val(data[0].Speaker.id);

                        //fill and append the rest of selected speakers to view
                        for(var i=1; i<data.length; i++) {
                            var $element = $($('.jsSpeakerCloner').find('>:first-child')[0]).clone();
                            $element.find('.jsFillName').val(data[i].Speaker.name);
                            $element.find('.jsFillId').val(data[i].Speaker.id);
                            $element.appendTo('.jsSpeakerExpansion');
                        }
                    }
                });

            });
        },
        deleteSpeaker: function() {
            $(document).on('click', '.jsDeleteSpeaker', function(){
                $(this).closest('.jsAppendedElement').remove();
            });
        }


    }
})();

$(function () {
    SeminarCreator.changeSubmissionType();
    SeminarCreator.selectSpeakers();
    SeminarCreator.deleteSpeaker();

    $('.jsCopy').click(function(){
        SeminarCreator.copySeminar();
    });

});
