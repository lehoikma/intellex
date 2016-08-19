<?php $this->assign('title', '資料請求 | アセットシェアリング') ?>
<?php $this->assign('description', 'アセットシェアリングの資料請求に関する内容をご紹介します。アセットシェアリングは、東証一部上場、[インテリックス］が提供する良質な不動産を小口で所有する資産商品。「相続の３大対策」や「資産運用」にてご活用頂けます。御覧ください。') ?>
<?php $this->assign('h1', '東証一部上場[インテリックス]提供のアセットシェアリング資料請求') ?>

<article class="contents">
    <div class="contentsCont">

        <section class="inquiryArea">
            <h2 class="headlineImg1"><?php echo $this->Html->image('inquiry/title.gif', array('alt' => '資料請求', 'width' => '144', 'height' => '35')); ?></h2>
            <ul class="stepArea">
                <li><?php echo $this->Html->image('common/icon_step_01_c.png', array('alt' => 'STEP1 お客様情報入力', 'width' => '299', 'height' => '40', 'class' => 'switch')); ?></li>
                <li><?php echo $this->Html->image('common/icon_step_02.png', array('alt' => 'STEP2 完了', 'width' => '305', 'height' => '40', 'class' => 'switch')); ?></li>
            </ul>
            <div class="endText">
                <p class="text"><?php echo $this->Html->image('inquiry/text_end.gif', array('width' => '469', 'height' => '32')); ?></p>
                <p>ご記入頂いた情報は無事送信されました。<br>確認のためお客様へ自動返信メールをお送りさせて頂きました。<br>お申し込み頂き、ありがとうございました。</p>
            </div>
        </section>
    </div>
</article>
