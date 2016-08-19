<?php $this->assign('title', 'Intellex | 管理アカウント作成') ?>
<div id="content" class="col-lg-10 col-sm-10">
    <div class="page-header">
        <?php if ($this->Admin->isEditing() || $this->Admin->isUpdating()):?>
            <h3>管理アカウント編集</h3>
        <?php else:?>
            <h3>管理アカウント作成</h3>
        <?php endif;?>
    </div>
    <div class="row">
        <div class="box col-md-7">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i>アカウント情報</h2>
                </div>
                <div class="box-content">
                    <?php
                    echo $this->Form->create(null, array(
                        'url' => array(
                            'controller' => 'admins',
                            'action' => ($this->Admin->isEditing() || $this->Admin->isUpdating()) ? 'update' : 'create'
                        ),
                        'class' => 'form-horizontal'
                    ));
                    ?>
                    <div class="form-group">
                        <label class="control-label col-md-5">名前</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->input('name', array(
                                'type'           => 'text',
                                'class'          => 'form-control',
                                'placeholder'    => '名前',
                                'label'          => false,
                                'div'            => false,
                                'default'        => $this->Admin->isEditing() ? $admin['name'] : '',
                                'error'          => array(
                                    'attributes' => array('class' => 'alert-danger')
                                ),
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">メールアドレス(ログインID)</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->input('email', array(
                                'type'           => 'text',
                                'placeholder'    => 'メールアドレス',
                                'class'          => 'form-control',
                                'label'          => false,
                                'div'            => false,
                                'default'        => ($this->Admin->isEditing() || $this->Admin->isUpdating()) ? $admin['email'] : '',
                                'disabled'       => ($this->Admin->isEditing() || $this->Admin->isUpdating()) ? 'disabled' : '',
                                'error'          => array(
                                    'attributes' => array('class' => 'alert-danger')
                                )
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">パスワード</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->input('password', array(
                                'type'           => 'password',
                                'placeholder'    => 'パスワード',
                                'class'          => 'form-control',
                                'label'          => false,
                                'div'            => false,
                                'error'          => array(
                                    'attributes' => array('class' => 'alert-danger')
                                )
                            )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">パスワード確認</label>
                        <div class="col-md-6">
                            <?php echo $this->Form->input('password_confirm', array(
                                'type'           => 'password',
                                'placeholder'    => 'パスワード確認',
                                'class'          => 'form-control',
                                'label'          => false,
                                'div'            => false,
                                'error'          => array(
                                    'attributes' => array('class' => 'alert-danger')
                                )
                            )); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="center col-md-12">
                            <?php echo $this->Form->button(
                                $this->Admin->isEditing() || $this->Admin->isUpdating() ? '更新' : '作成',
                                array('type' => 'submit', 'class' => 'btn btn-primary'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    <!-- content ends -->
</div><!--/#content.col-md-0-->