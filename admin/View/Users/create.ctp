<?php
if($this->Speaker->isEditing() || $this->Speaker->isUpdating()) {
    $this->assign('title', 'Intellex | ユーザー編集');
} else {
    $this->assign('title', 'Intellex | ユーザー登録');
}
?>

<div id="content" class="col-lg-9 col-sm-9">
    <div class="page-header">
        <?php if($this->User->isEditing() || $this->User->isUpdating()):?>
            <h3>ユーザー編集</h3>
        <?php else:?>
            <h3>ユーザー登録</h3>
        <?php endif;?>
    </div>

    <?php
    echo $this->Form->create(null, array(
            'url' => array(
                    'controller' => 'users',
                    'action' => ($this->User->isEditing() || $this->User->isUpdating()) ? 'update' : 'save'
            ),
            'class' => 'form-horizontal'
    ));
    ?>

    <?php echo $this->element('user.extra_data.modal');?>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> ユーザー情報</h2>
                    <div class="box-icon"></div>
                </div>
                <div class="box-content">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">退会ステータス </label>
                            <div class="col-md-3">
                                <?php echo $this->Form->select('withdraw_flg',
                                        $this->User->getWithdrawStatuses(),
                                        array(
                                                'escape' => false,
                                                'empty'=>false,
                                                'class' => 'form-control',
                                                'default' => $this->User->isEditing() ? $user['withdraw_flg'] : ''
                                        )
                                )
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">顧客管理 ID </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('customer_id', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['customer_id'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">名前（姓） </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('name_sei', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['name_sei'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">名前（名） </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('name_mei', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['name_mei'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">フリガナ（姓） </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('name_sei_kana', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['name_sei_kana'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">フリガナ（名） </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('name_mei_kana', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['name_mei_kana'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">法人名 </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('company_name', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['company_name'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">性別 </label>
                            <div class="col-md-6">
                                <?php foreach($this->User->getSex() as $value=>$label): ?>
                                    <label class="radio-inline">
                                        <?php if($this->User->isEditing() && $user['sex'] == $value):?>
                                            <input type="radio" name="data[User][sex]" value="<?php echo $value;?>" checked="checked"> <?php echo $label;?>
                                        <?php else:?>
                                            <input type="radio" name="data[User][sex]" value="<?php echo $value;?>"> <?php echo $label;?>
                                        <?php endif;?>
                                    </label>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">生年月日 </label>
                            <div class="col-md-3">
                                <?php echo $this->Form->input('birthday', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control datePicker',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['birthday'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">郵便番号 </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('postal_code', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['postal_code'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">住所１ </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('address1', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['address1'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">住所２ </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('address2', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['address2'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">住所３ </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('address3', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['address3'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">メールアドレス </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('email', array(
                                        'type'      => 'email',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['email'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">電話番号 </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('tel', array(
                                        'type'      => 'text',
                                        'class'     => 'form-control',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'default'   => $this->User->isEditing() ? $user['tel'] : ''
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">メールマガオプトイン </label>
                            <div class="col-md-1" style="padding-top: 8px;">
                                <?php echo $this->Form->checkbox('optin', array(
                                        'class'     => 'checkbox-inline',
                                        'label'     => false,
                                        'div'       => false,
                                        'error'     => false,
                                        'required'  => false,
                                        'checked'   => $this->User->isEditing() && $user['optin'] ? 'checked' : ''
                                )); ?>
                            </div>
                        </div>
                        <?php if ($this->User->isEditing()):?>
                            <div class="form-group">
                                <label class="control-label col-md-3">資料請求日時（希望口数） </label>
                                <div class="col-md-6">
                                    <?php if(empty($requests)):?>
                                        なし
                                    <?php else:?>
                                        <?php foreach($requests as $request):?>
                                            <div>・<?php echo $this->User->dateTimeToString($request['created']) . '（' . $request['quantity'] . '口）'?>
                                                <a href="#" class="btn btn-default jsShowExtraData"
                                                   data-extra="<?php echo h($this->User->convertStringToJapanese($request['extra_data']));?>"
                                                   data-title="<?php echo h($this->User->dateTimeToString($request['created']));?>"
                                                >
                                                    <i class="glyphicon glyphicon-question-sign"></i>
                                                </a>
                                            </div>
                                            <br>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                            </br>
                            <div class="form-group">
                                <label class="control-label col-md-3">セミナー参加履歴 </label>
                                <div class="col-md-6">
                                    <?php if(empty($seminar_users)):?>
                                        なし
                                    <?php else:?>
                                        <?php foreach($seminar_users as $su):?>
                                            <?php if(!$this->User->isAbsent($su['status'])):?>
                                                <div>・<?php echo $this->Html->link($su['Seminar']['title'], '/seminars/' . $su['seminar_id'], array('target' => '_blank')) . '（' . $this->User->dateTimeToString($su['created']) . '）';?>
                                                    <a href="#" class="btn btn-default jsShowExtraData"
                                                       data-extra="<?php echo h($this->User->convertStringToJapanese($su['extra_data']));?>"
                                                       data-title="<?php echo h($this->User->dateTimeToString($su['created']));?>"
                                                            >
                                                        <i class="glyphicon glyphicon-question-sign"></i>
                                                    </a>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="form-group">
                            <label class="control-label col-md-3">メモ </label>
                            <div class="col-md-3">
                                <?php echo $this->Form->textarea('memo', array(
                                            'rows'      => '5',
                                            'cols'      => '70',
                                            'required'  => false,
                                            'default'   => $this->User->isEditing() ? $user['memo'] : ''
                                ));?>
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
            <?php
                if (!empty($user)) echo $this->Form->input('id', array('type' => 'hidden', 'value' => $user['id']));
                echo $this->Form->submit($this->User->isEditing() ? '更新' : '保存',array('class' => 'btn btn-info'));
            ?>
        </div>
    </div>

</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
<script type="text/javascript">
    $.datetimepicker.setLocale('ja');
    jQuery('.datePicker').datetimepicker({
        lang: 'ja',
        format:'Y-m-d',
        timepicker:false
    });
</script>
<?php echo $this->Html->script('/js/jquery.user.create.js'); ?>
