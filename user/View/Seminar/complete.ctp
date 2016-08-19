<?php $this->assign('title', '相談会・セミナーお申し込み｜ アセットシェアリング') ?>
<?php $this->assign('description', '東証一部上場、[インテリックス］が提供するセミナーの詳細内容をお伝えします。アセットシェアリングは東証一部上場、[インテリックス］が提供する不動産を小口で少額から所有できる資産商品で、皆様の資産運用や相続にてご活用頂けます。') ?>
<?php $this->assign('h1', '東証の一部上場[インテリックス]提供のセミナー参加お申し込み') ?>

<div class="contents"><div class="contentsCont">

        <section class="inquiryArea">
            <p class="headlineImg1">
                <?php echo $this->Html->image('seminar/title.gif', array('alt' => 'セミナー情報', 'width' => '136', 'height' => '24')); ?>
            </p>
            <h2 class="headline1"><?php echo h($seminar['Seminar']['title']) ?></h2>

            <ul class="stepArea">
                <li>
                    <?php echo $this->Html->image('common/icon_step_01_c.png', array('alt' => 'STEP1 お客様情報入力', 'width' => '299', 'height' => '40', 'class' => 'switch')); ?>
                </li>
                <li><?php echo $this->Html->image('common/icon_step_02.png', array('alt' => 'STEP2 完了', 'width' => '299', 'height' => '40', 'class' => 'switch')); ?></li>
            </ul>
            <div class="endText">
                <p class="text"><?php echo $this->Html->image('seminar/inquiry/text_end.gif', array('alt' => 'お申し込みを受け付けました', 'width' => '437', 'height' => '32'))?></p>
                <p>ご記入頂いた情報は無事送信されました。<br>確認のためお客様へ自動返信メールをお送りさせて頂きました。<br>お申し込み頂き、ありがとうございました。</p>
            </div>


            <!-- /.inquiryArea --></section>


    </div></div>