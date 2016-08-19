<?php $this->assign('title', 'Intellex | ログイン'); ?>
<div class="row">
    <div class="col-md-12 center login-header"></div>
</div>
<div class="row">
    <div class="well col-md-5 center login-box">
        <?php if($this->Form->isFieldError('Admin.email')): ?>
            <div class="alert alert-danger">
                <?php echo $this->Form->error('Admin.email'); ?>
            </div>
        <?php endif; ?>
        <?php
            echo $this->Form->create(null, array(
                'url' => array('controller' => 'admins', 'action' => 'authAdmin'),
                'class' => 'form-horizontal'
            ));
        ?>
            <fieldset>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                    <?php echo $this->Form->input('email', array(
                        'type' => 'text',
                        'default' => $this->Admin->getUrlParam('email'),
                        'placeholder' => 'メールアドレス',
                        'class' => 'form-control',
                        'label' => false,
                        'div' => false,
                        'error' => false
                    )); ?>
                </div>
                <div class="clearfix"></div><br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                    <?php echo $this->Form->input('password', array(
                        'type' => 'password',
                        'placeholder' => 'パスワード',
                        'class' => 'form-control',
                        'label' => false,
                        'div' => false,
                        'error' => array(
                            'attributes' => array('class' => 'alert-danger')
                        )
                    )); ?>
                </div>
                <div class="clearfix"></div>
                <p class="center col-md-5">
                    <?php echo $this->Form->button('ログイン', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
                </p>
            </fieldset>
    </div>
    <!--/span-->
</div><!--/row-->
