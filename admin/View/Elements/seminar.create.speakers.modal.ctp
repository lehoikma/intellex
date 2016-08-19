<!-- 講師選択用のhtml -->
<div class="hidden jsSpeakerCloner">
    <div class="form-group jsAppendedElement">
        <label class="control-label col-md-3"></label>
        <div class="col-md-6">
            <input name="appended_speaker" class="form-control jsFillName" type="text" disabled>
            <input name="data[Seminar][speaker_ids][]" class="form-control jsFillId" type="hidden">
        </div>
        <a class="btn btn-minimize btn-default jsDeleteSpeaker"><i class="glyphicon glyphicon-minus-sign"></i></a>
    </div>
</div>

<div class="modal fade" id="jsSelectSpeakers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header center">
                <button type="button" class="close close-dialog" data-dismiss="modal">×</button>
                <h3 class="dialog-title">講師を選択してください。</h3>
            </div>
            <div class="modal-body">
                <ul class="thumbnails speakerList">
                    <?php foreach($speakers as $speaker):?>
                    <li id="image-1" class="thumbnail jsThumbnail">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="jsSpeakerCheckbox" value="<?php echo $speaker['Speaker']['id']?>"><?php echo $speaker['Speaker']['name'];?>
                        </label>
                        <div style="background:url(<?php echo $speaker['Speaker']['image'];?>);background-size: 130px 130px;"></div>
                    </li>
                    <?php endforeach;?>
                </ul>

            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="btn btn-default close-dialog" data-dismiss="modal">閉じる</div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary jsSubmitSpeakerSelector close-dialog" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .thumbnail > div {
        z-index: 2;
        height: 130px;
        width: 130px;
        position: relative;
        display: block;
    }
    .thumbnail > li {
        display: inline-block;
    }
    .thumbnail {
        margin-bottom: 30px !important;
    }
    .checkbox-inline {
        padding-top: 0px !important;
    }
    .modal-body {
        height: 330px;
        overflow-y: scroll;
    }
</style>