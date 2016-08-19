<div class="row box col-md-11">
    <div class="col-md-3 pull-left">
        <?php echo $this->Form->button('コピー', array('type' => 'button', 'class' => 'btn btn-success jsCopy pull-right btn-setting')); ?>
    </div>
    <div class="col-md-2 pull-left">
        <?php echo $this->Html->link('プレビュー',
                Configure::read('user_domain') . '/seminar/' . $seminar['Seminar']['id'] . '?preview=' . Configure::read('preview_token'),
                array('class' => 'btn btn-success pull-right', 'target' => '_blank')
        );?>
    </div>
    <div class="col-md-3 pull-right">
        <span class="pull-left">
            <?php echo $this->Form->button('下書き', array('type' => 'button', 'class' => 'btn btn-info jsSubmitDraft')); ?>
        </span>
        <span class="pull-right">
            <?php if($seminar['Seminar']['status'] == Configure::read('seminar_statuses')['draft']):?>
                <?php echo $this->Form->button('公開', array('type' => 'button', 'class' => 'btn btn-info jsSubmitPublish')); ?>
            <?php else: ?>
                <?php echo $this->Form->button('保存', array('type' => 'button', 'class' => 'btn btn-info jsSubmitPublish')); ?>
            <?php endif ?>
        </span>
    </div>
</div>