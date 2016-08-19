<?php if(empty($speakers)):?>
    <div class="form-group">
        <label class="control-label col-md-3">セミナー講師名 </label>
        <div class="col-md-4">
            <?php echo $this->Form->input('speaker_name', array(
                    'type'      => 'text',
                    'class'     => 'form-control jsSpeakerName',
                    'label'     => false,
                    'div'       => false,
                    'error'     => false
            )); ?>
            <input name="data[Seminar][speaker_ids][]" class="form-control jsSpeakerId" type="hidden">
        </div>
    </div>
<?php else:?>
    <?php foreach($speakers as $index=>$relation):?>
        <?php if($index == 0):?>
            <div class="form-group">
                <label class="control-label col-md-3">セミナー講師名 </label>
                <div class="col-md-4">
                    <?php echo $this->Form->input('speaker_name', array(
                            'type'      => 'text',
                            'class'     => 'form-control jsSpeakerName',
                            'label'     => false,
                            'div'       => false,
                            'error'     => false,
                            'default'   => $relation['Speaker']['name']
                    )); ?>
                    <input name="data[Seminar][speaker_ids][]" class="form-control jsSpeakerId" type="hidden" value="<?php echo $relation['Speaker']['id'];?>">
                </div>
                <a href="/speakers/<?php echo $relation['Speaker']['id'];?>" target="_blank" class="btn btn-default"><i class="glyphicon glyphicon-info-sign"></i></a>
            </div>
        <?php else:?>
            <div class="form-group jsAppendedElement">
                <label class="control-label col-md-3"></label>
                <div class="col-md-4">
                    <input name="appended_speaker" class="form-control jsFillName" type="text" disabled value="<?php echo $relation['Speaker']['name'];?>">
                    <input name="data[Seminar][speaker_ids][]" class="form-control jsFillId" type="hidden" value="<?php echo $relation['Speaker']['id']?>">
                </div>
                <a href="/speakers/<?php echo $relation['Speaker']['id'];?>" target="_blank" class="btn btn-default"><i class="glyphicon glyphicon-info-sign"></i></a>
                <a class="btn btn-default jsDeleteSpeaker"><i class="glyphicon glyphicon-minus-sign"></i></a>
            </div>
        <?php endif;?>
    <?php endforeach;?>
<?php endif;?>
