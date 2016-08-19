<header class="header"><div class="headerCont">
    <div class="logoArea">
        <h1 class="text"><?php echo $this->fetch('h1') ?></h1>
        <p class="logo">
            <a href="<?php echo $this->Html->url('/');?>">
                <?php echo $this->Html->image('base/logo_text.gif', array('alt' => '不動産はシェアして共有する時代', 'width' => '181', 'height' => '14')); ?><?php echo $this->Html->image('base/logo.png', array('alt' => 'アセットシェアリング', 'width' => '210', 'height' => '26')); ?>
            </a>
        </p>
        </div>
        <div class="subArea">
            <?php if(!isset($isForm)):?>
                <p class="inquiry">
                    <?php echo $this->Html->link($this->Html->image('common/head_button_inquiry.png',array('width'=> '164', 'height' => '34', 'alt' => '資料請求はこちら', )),'/inquiry/', array('escape' => false)) ?>
                </p>
            <?php endif;?>
            <dl class="tel">
                <dt>お電話でのご相談<br>はこちらから</dt>
                <dd><?php echo $this->Html->image('common/head_text_tel.gif', array('alt' => '', 'width' => '211', 'height'  => '38')); ?></dd>
            </dl>
            <p class="spTel">
                <a href="tel:0120-77-8940">
                    <?php echo $this->Html->image('common/head_tel.gif', array('alt' => 'お電話でのお問い合わせ フリーダイヤル', 'width' => '92')); ?>
                </a>
            </p>
        </div>
    </div>
</header>