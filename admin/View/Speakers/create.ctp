<?php
if($this->Speaker->isEditing() || $this->Speaker->isUpdating()) {
    $this->assign('title', 'Intellex | 講師編集');
} else {
    $this->assign('title', 'Intellex | 講師登録');
}
?>

<div id="content" class="col-lg-9 col-sm-9">
    <!-- ここからコンテンツを入れてください -->
    <div class="page-header">
        <h3>講師登録</h3>
    </div>

    <?php
    echo $this->Form->create(null, array(
            'url' => array(
                    'controller' => 'speakers',
                    'action' => ($this->Speaker->isEditing() || $this->Speaker->isUpdating()) ? 'update' : 'save'
            ),
            'type' => 'file',
            'class' => 'form-horizontal'
    ));
    ?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> 講師情報</h2>
                    <div class="box-icon"></div>
                </div>
                <div class="box-content">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">セミナー講師名 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('name', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'default'   => ($this->Speaker->isEditing() || $this->Speaker->isUpdating()) ? $speaker['Speaker']['name'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Speaker.name')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Speaker.name'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">講師プロフィール <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php echo $this->Form->textarea('introduction', array(
                                        'class'     => 'ckeditor',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'default'   => $this->Speaker->isEditing() ? $speaker['Speaker']['introduction'] : ''
                                )); ?>
                                <?php if($this->Form->isFieldError('Speaker.introduction')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Speaker.introduction'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">講師画像 <span class="label-default label label-danger">必須</span></label>
                            <div class="col-md-6">
                                <?php
                                    if (empty($speaker)) echo $this->Html->image('/img/no_img.jpg', array('alt' => 'no image'));
                                    else echo $this->Html->image($speaker['Speaker']['image']);
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
                                        'error'     => false,
                                        'required' => ($this->Speaker->isEditing() || $this->Speaker->isUpdating()) ? false : true
                                )); ?>
                                <?php if($this->Form->isFieldError('Speaker.image')): ?>
                                    <div class="alert-danger col-md-12">
                                        <?php echo $this->Form->error('Speaker.image'); ?>
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
    <div class="row box col-md-12">
        <div class="col-md-3 center">
        <span class="pull-left">
            <?php
            if (!empty($speaker)) echo $this->Form->input('id', array('type' => 'hidden', 'value' => $speaker['Speaker']['id']));
            echo $this->Form->submit(
                ($this->Speaker->isEditing() || $this->Speaker->isUpdating()) ? '更新' : '保存',
                array('class' => 'btn btn-info'));
            ?>
        </span>
        </div>
    </div>

</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
