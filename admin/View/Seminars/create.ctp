<?php
    if($this->Seminar->isEditing() || $this->Seminar->isUpdating()) {
        $this->assign('title', 'Intellex | セミナー編集');
    } else {
        $this->assign('title', 'Intellex | セミナー登録');
    }
?>

<div id="content" class="col-lg-9 col-sm-9">
    <!-- ここからコンテンツを入れてください -->
    <div class="page-header">
        <?php if($this->Seminar->isEditing() || $this->Seminar->isUpdating()):?>
            <h3>セミナー編集</h3>
        <?php else:?>
            <h3>セミナー登録</h3>
        <?php endif;?>
    </div>

    <?php
    echo $this->Form->create(null, array(
        'url' => array(
            'controller' => 'seminars',
            'action' => ($this->Seminar->isEditing() || $this->Seminar->isUpdating()) ? 'update' : 'save'
        ),
        'type' => 'file',
        'class' => 'form-horizontal jsCreateSeminar'
    ));
    ?>
    <?php echo $this->element('seminar.create.speakers.modal', array('speakers' => $this->Seminar->findAllSpeakers()));?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> 基本情報</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php if($this->Seminar->isEditing() || $this->Seminar->isUpdating()):?>
                        <div class="center">
                                <h4><a href="<?php echo $seminar['Seminar']['id'];?>/attendees" target="_blank">参加者一覧</a></h4>
                        </div>
                    <?php endif;?>
                    <div class="form-horizontal">
                        <?php if($this->Seminar->isEditing() || $this->Seminar->isUpdating()):?>
                            <div class="form-group">
                                <label class="control-label col-md-3">ステータス</label>
                                <div class="col-md-3 checkbox-inline">
                                    <?php echo $this->Seminar->getStatusLabel($seminar['Seminar']); ?>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label class="control-label col-md-3">セミナー種別（テーマ）<span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input("seminar_types", array(
                                        'label'     => false,
                                        'type'      => 'select',
                                        'multiple'  => 'checkbox',
                                        'div'       => false,
                                        'options'   => $this->Seminar->getAllSeminarTypes(),
                                        'error'     => false,
                                        'class'     => 'checkbox-inline',
                                        'default'   => $this->Seminar->isEditing() ? Hash::extract($seminar['SeminarTypeRelation'], '{n}.seminar_type_id') : ''
                                    )
                                ); ?>
                                    <?php if($this->Form->isFieldError('Seminar.seminar_types')): ?>
                                        <div class="alert-danger col-md-12">
                                            <?php echo $this->Form->error('Seminar.seminar_types'); ?>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">社内管理コード </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('management_code', array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['management_code'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">タイトル <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('title', array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['title'] : ''
                                )); ?>
                            <?php if($this->Form->isFieldError('Seminar.title')): ?>
                                <div class="alert-danger col-md-12">
                                    <?php echo $this->Form->error('Seminar.title'); ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">詳細 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-8">
                                <?php echo $this->Form->textarea('description', array(
                                        'class'     =>'ckeditor',
                                        'id'        => 'description',
                                        'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['description'] : ''
                                    ));
                                ?>
                            <?php if($this->Form->isFieldError('Seminar.description')): ?>
                                <div class="alert-danger col-md-12">
                                    <?php echo $this->Form->error('Seminar.description'); ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 jsLabel">開催日時 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-sm-7 form-inline">
                                <?php echo $this->Form->input('open_from', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control datetimePicker',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['open_from'] : ''
                                )); ?>
                                                    〜
                                <?php echo $this->Form->input('open_to', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control datetimePicker',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['open_to'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.open_from')): ?>
                                    <div class="alert-danger col-md-8">
                                        <?php echo $this->Form->error('Seminar.open_from'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">掲載期間 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-sm-7 form-inline">
                                <?php echo $this->Form->input('publish_from', array(
                                    'type'      => 'text',
                                    'class'     => 'form-control datetimePicker',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['publish_from'] : ''
                                )); ?>
                                〜
                                <?php echo $this->Form->input('publish_to', array(
                                    'type'      => 'text',
                                    'class'     => 'form-control datetimePicker',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['publish_to'] : ''
                                )); ?>
                            <?php if($this->Form->isFieldError('Seminar.publish_from')): ?>
                                <div class="alert-danger col-md-8">
                                    <?php echo $this->Form->error('Seminar.publish_from'); ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">会場住所 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('venue', array(
                                    'type'      => 'textarea',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['venue'] : ''
                                )); ?>
                            <?php if($this->Form->isFieldError('Seminar.venue')): ?>
                                <div class="alert-danger col-md-12">
                                    <?php echo $this->Form->error('Seminar.venue'); ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">開場時間 <span class="label-default label label-danger">必須</span><br><small></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('Seminar.open_door_at', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control timePicker',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['open_door_at'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.open_door_at')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Seminar.open_door_at'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">参加費 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('entry_fee', array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['entry_fee'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.entry_fee')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Seminar.entry_fee'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">交通 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('access', array(
                                    'type'      => 'textarea',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['access'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.access')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Seminar.access'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">定員 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('capacity', array(
                                    'type'      => 'number',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['capacity'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.capacity')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Seminar.capacity'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">定員アラート人数 <span class="label-default label label-danger">必須</span><br><small>入力人数以下になると「のこりわずか」表示されます</small></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('capacity_alert_num', array(
                                        'type'      => 'number',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['capacity_alert_num'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.capacity_alert_num')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Seminar.capacity_alert_num'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">問い合わせ先情報 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('contact', array(
                                    'type'      => 'textarea',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false,
                                    'default'   => $this->Seminar->isEditing() ? $seminar['Seminar']['contact'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Seminar.contact')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Seminar.contact'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> 講師情報</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="form-horizontal jsSpeakerExpansion">
                        <?php
                            if($this->Seminar->isEditing() || $this->Seminar->isUpdating()) {
                                echo $this->element('seminar.update.speakers.list', array('speakers' => $seminar['SeminarSpeakerRelation']));
                            } elseif ($this->Seminar->isSaving()) {
                                echo $this->element('seminar.update.speakers.list', array('speakers' => $selectedSpeakers));
                            } else {
                                echo $this->element('seminar.update.speakers.list');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> セミナー画像</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">セミナー画像 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php
                                    if (empty($seminar)) echo $this->Html->image('/img/no_img.jpg', array('alt' => 'no image'));
                                    else echo $this->Html->image($seminar['Seminar']['image'], array('style' => 'max-width: 100%; height: auto;'));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->file('image', array(
                                    'label' => false,
                                    'div' => false,
                                    'accept' => 'image/*',
                                    'error'     => false
                                )); ?>
                            <?php if($this->Form->isFieldError('Seminar.image')): ?>
                                <div class="alert-danger col-md-12">
                                    <?php echo $this->Form->error('Seminar.image'); ?>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    </br>

    <?php
        if (!empty($seminar)) echo $this->Form->input('id', array('type' => 'hidden', 'value' => $seminar['Seminar']['id']));
        echo $this->Form->input('status', array('type' => 'hidden', 'class' => 'jsSubmitType'));
        if($this->Seminar->isEditing() || $this->Seminar->isUpdating()) {
            echo $this->element('seminar.update.buttons');
        } else {
            echo $this->element('seminar.create.buttons');
        }
    ?>
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

<script type="text/javascript">
    $.datetimepicker.setLocale('ja');
    CKEDITOR.replace('description', {language: 'ja'});
    jQuery('.datetimePicker').datetimepicker({
        lang: 'ja',
        format:'Y-m-d H:i',
        step: 30
    });
    jQuery('.timePicker').datetimepicker({
        lang: 'ja',
        datepicker:false,
        format:'H:i',
        step: 10
    });
</script>
<?php echo $this->Html->script('/js/jquery.seminar.create.js'); ?>
