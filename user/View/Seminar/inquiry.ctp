<?php $this->assign('title', '相談会・セミナーお申し込み｜ アセットシェアリング') ?>
<?php $this->assign('description', '東証一部上場、[インテリックス］が提供するセミナーの詳細内容をお伝えします。アセットシェアリングは東証一部上場、[インテリックス］が提供する不動産を小口で少額から所有できる資産商品で、皆様の資産運用や相続にてご活用頂けます。') ?>
<?php $this->assign('h1', '東証の一部上場[インテリックス]提供のセミナー参加お申し込み') ?>

<article class="contents"><div class="contentsCont">
        <?php echo $this->Form->create("User", array(
                'url' => array('controller' => 'seminar', 'action' => 'inquiry/' . $seminar['Seminar']['id']),
                'type' => 'post',
                'id' => 'form1',
                'name' => 'form1'
        )); ?>
        <section class="inquiryArea">
            <p class="headlineImg1"><?php echo $this->Html->image('seminar/title.gif', array('alt' => 'セミナー情報', 'width' => '136', 'height' => '24')); ?></p>
            <h2 class="headline1"><?php echo h($seminar['Seminar']['title'])?></h2>
            <p class="center mb20">
                <?php echo $this->Html->image('seminar/inquiry/title.gif', array('alt' => 'へのセミナーお申し込み', 'width' => '278', 'height' => '25')); ?></p>

            <ul class="stepArea">
                <li><?php echo $this->Html->image('common/icon_step_01.png', array('alt' => 'STEP1 お客様情報入力', 'width' => '299', 'height' => '40', 'class' => 'switch')); ?></li>
                <li><?php echo $this->Html->image('common/icon_step_02_c.png', array('alt' => 'STEP2 完了', 'width' => '305', 'height' => '40', 'class' => 'switch')); ?></li>
            </ul>
            <div class="contectHead">
                <p class="text">相談会・セミナーお申し込みはこちらより承ります。<br>お問い合わせ後は、弊社担当者より速やかにご連絡させていただきますので<br>メールアドレス、お電話番号などご連絡先はお間違えのないよう、ご注意ください。<br></p>
                <p class="notice">※<strong>必須</strong>は選択、入力必須項目となります</p>
            </div>

            <h3 class="headline2">お客様情報</h3>

            <table class="formTable">
                <tr>
                    <th>お名前<span class="req">必須</span></th>
                    <td>
                        <table class="clum2">
                            <tr>
                                <th>姓</th>
                                <td>
                                    <?php echo $this->Form->input('User.name_sei', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'required'  => false,
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                    )); ?>
                                    <span class="ex">記入例：山田</span>
                                </td>
                                <th>名</th>
                                <td>
                                    <?php echo $this->Form->input('User.name_mei', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'required'  => false,
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                    )); ?>
                                    <span class="ex">記入例：太郎</span>
                                </td>
                            </tr>
                        </table>
                        <?php if($this->Form->isFieldError('User.name')): ?>
                            <p class="error"><?php echo $this->Form->error('User.name', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>フリガナ</th>
                    <td>

                        <table class="clum2">
                            <tr>
                                <th>セイ</th>
                                <td>
                                    <?php echo $this->Form->input('User.name_sei_kana', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                    )); ?>
                                    <span class="ex">記入例：ヤマダ</span></td>
                                <th>メイ</th>
                                <td>
                                    <?php echo $this->Form->input('User.name_mei_kana', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                    )); ?>
                                    <span class="ex">記入例：タロウ</span></td>
                            </tr>
                        </table>
                        <?php if($this->Form->isFieldError('User.name_kana')): ?>
                            <p class="error"><?php echo $this->Form->error('User.name_kana', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>法人名</th>
                    <td>
                        <?php echo $this->Form->input('User.company_name', array(
                                'type'      => 'text',
                                'class'     => 'sizeL',
                                'label'     => false,
                                'div'       => false,
                                'error'     => false,
                        )); ?>
                        <p class="ex">記入例：株式会社インテリックス</p>
                        <?php if($this->Form->isFieldError('User.company_name')): ?>
                            <p class="error"><?php echo $this->Form->error('User.company_name', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span class="req">必須</span></th>
                    <td>
                        <?php echo $this->Form->input('User.email', array(
                                'type'      => 'text',
                                'class'     => 'sizeL',
                                'required'  => false,
                                'label'     => false,
                                'div'       => false,
                                'error'     => false,
                        )); ?>
                        <p class="ex">記入例：yamada.taro@intellex.co.jp</p>
                        <?php if($this->Form->isFieldError('User.email')): ?>
                            <p class="error"><?php echo $this->Form->error('User.email', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>お電話番号</th>
                    <td>
                        <?php echo $this->Form->input('User.tel', array(
                                'type'      => 'text',
                                'class'     => 'sizeL',
                                'required'  => false,
                                'label'     => false,
                                'div'       => false,
                                'error'     => false,
                        )); ?>
                        <p class="ex">記入例：03-1234-5678</p>
                        <?php if($this->Form->isFieldError('User.tel')): ?>
                            <p class="error"><?php echo $this->Form->error('User.tel', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
            </table>


            <h3 class="headline2">お申込み内容</h3>
            <table class="formTable">
                <tr>
                    <th>セミナータイトル</th>
                    <td>
                        <p class="bold"><?php echo h($seminar['Seminar']['title'])?></p>
                    </td>
                </tr>
                <tr>
                    <th>参加人数<span class="req">必須</span></th>
                    <td>
                        <?php echo $this->Form->input('SeminarUser.attendees', array(
                                'type' => 'text',
                                'label' => false,
                                'class' => 'sizeM',
                                'required'  => false,
                                'div' => false,
                                'error' => false
                        ));
                        ?>
                        名
                        <p class="ex">記入例：1</p>
                        <?php if($this->Form->isFieldError('SeminarUser.attendees')): ?>
                            <p class="error"><?php echo $this->Form->error('SeminarUser.attendees', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>その他</th>
                    <td><p class="pb10">※ご希望や不明点がございましたら記入ください。</p>
                        <?php echo $this->Form->textarea('SeminarUser.additional_info'); ?></td>
                </tr>
            </table>

            <p>「<a href="http://www.intellex.co.jp/policy/privacy.html" target="_blank">プライバシーポリシー</a>」及び「<a href="http://www.intellex.co.jp/policy/sitepolicy.html" target="_blank">サイトポリシー</a>」をお読みの上、内容に同意いただいた場合のみ、「送信する」ボタンを押してください。</p>

            <p class="consentArea">
                <label><?php echo $this->Form->checkbox('User.accept', array('class' => 'jsAcceptPolicy')); ?>同意する</label>
                <span class="error jsAcceptPolicyError" style="display: none;">会員規約に同意してください。</span>
            </p>

            <div class="btnArea">
                <p>
                    <?php echo $this->Form->end(array('label' => '送信する', 'class' => 'jsApplySeminar')); ?>
                </p>
            </div>
        </section>
    </div>
</article>

<?php echo $this->Html->script('/js/jquery.applySeminar.js'); ?>
