<?php $this->assign('title', '資料請求 | アセットシェアリング') ?>
<?php $this->assign('description', 'アセットシェアリングの資料請求に関する内容をご紹介します。アセットシェアリングは、東証一部上場、[インテリックス］が提供する良質な不動産を小口で所有する資産商品。「相続の３大対策」や「資産運用」にてご活用頂けます。御覧ください。') ?>
<?php $this->assign('h1', '東証一部上場[インテリックス]提供のアセットシェアリング資料請求') ?>

<article class="contents"><div class="contentsCont">

        <section class="inquiryArea">
            <h2 class="headlineImg1"><?php echo $this->Html->image('inquiry/title.gif', array('alt' => '資料請求', 'width' => '144', 'height' => '35')); ?></h2>
            <ul class="stepArea">
                <li><?php echo $this->Html->image('common/icon_step_01.png', array('alt' => 'STEP1 お客様情報入力', 'width' => '299', 'height' => '40', 'class' => 'switch')); ?></li>
                <li><?php echo $this->Html->image('common/icon_step_02_c.png', array('alt' => 'STEP2 完了', 'width' => '305', 'height' => '40', 'class' => 'switch')); ?></li>
            </ul>
            <div class="contectHead">
                <p class="text">次の項目を入力のうえ、「送信する」ボタンを押して下さい。</p>
                <p class="notice">※<strong>必須</strong>は選択、入力必須項目となります</p>
            </div>


            <div class="telBox">
                <p class="copy">お急ぎで内容を確認されたい方は、お気軽にお電話ください。</p>
                <p class="tel"><?php echo $this->Html->image('common/tel_text_01.gif', array('alt' => '0120-77-8940', 'width' => '235', 'height' => '23')); ?></p>
                <p class="date">営業時間 10:00〜18:00（土・日 定休日 ）</p>
            </div>
            <h3 class="headline2">お客様情報</h3>

            <?php
                echo $this->Form->create(null, array(
                        'url' => array(
                            'controller' => 'inquiry',
                            'action' => 'index'
                        )
                ));
            ?>
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
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                            'required'  => false
                                    )); ?>
                                    <span class="ex">記入例：山田</span>
                                </td>
                                <th>名</th>
                                <td>
                                    <?php echo $this->Form->input('User.name_mei', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                            'required'  => false
                                    )); ?>
                                    <span class="ex">記入例：太朗</span>
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
                                            'required'  => false
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
                                            'required'  => false
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
                                'required'  => false
                        )); ?>
                        <p class="ex">記入例：株式会社インテリックス</p>
                        <?php if($this->Form->isFieldError('User.company_name')): ?>
                            <p class="error"><?php echo $this->Form->error('User.company_name', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>ご住所<span class="req">必須</span></th>
                    <td><table>
                            <tbody>
                            <tr>
                                <th>郵便番号</th>
                                <td>
                                    <?php echo $this->Form->input('User.postal_code1', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeM',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                            'maxlength' => 3,
                                            'required'  => false
                                    )); ?>
                                    -
                                    <?php echo $this->Form->input('User.postal_code2', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeM',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                            'maxlength' => 4,
                                            'required'  => false
                                    )); ?>
                                    <input type="button" name="button" value="自動入力" class="jsAutoFillAddress">
                                    <?php if($this->Form->isFieldError('User.postal_code')): ?>
                                        <p class="error"><?php echo $this->Form->error('User.postal_code', null, array('wrap' => '')); ?></p>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <tr>
                                <th>都道府県</th>
                                <td>
                                    <?php echo $this->Form->select('User.address1',
                                            $this->Inquiry->getPrefectureList(),
                                            array('empty' => '都道府県を選択', 'required' => false));
                                    ?>
                                    <?php if($this->Form->isFieldError('User.address1')): ?>
                                        <p class="error"><?php echo $this->Form->error('User.address1', null, array('wrap' => '')); ?></p>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <tr>
                                <th>市区郡</th>
                                <td>
                                    <?php echo $this->Form->input('User.address2', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                            'required'  => false
                                    )); ?>
                                    <span class="ex">記入例：渋谷区</span>
                                    <?php if($this->Form->isFieldError('User.address2')): ?>
                                        <p class="error"><?php echo $this->Form->error('User.address2', null, array('wrap' => '')); ?></p>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <tr class="addressLast">
                                <td colspan="2"><strong>町名・番地・建物名</strong>
                                    <?php echo $this->Form->input('User.address3', array(
                                            'type'      => 'text',
                                            'class'     => 'sizeL',
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false,
                                            'required'  => false
                                    )); ?>
                                    <span class="ex">記入例：渋谷2-12-19　東建インターナショナルビル11F</span>
                                    <?php if($this->Form->isFieldError('User.address3')): ?>
                                        <p class="error"><?php echo $this->Form->error('User.address3', null, array('wrap' => '')); ?></p>
                                    <?php endif;?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span class="req">必須</span></th>
                    <td>
                        <?php echo $this->Form->input('User.email', array(
                                'type'      => 'text',
                                'class'     => 'sizeL',
                                'label'     => false,
                                'div'       => false,
                                'error'     => false,
                                'required'  => false
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
                                'label'     => false,
                                'div'       => false,
                                'error'     => false,
                                'required'  => false
                        )); ?>
                        <p class="ex">記入例：03-1234-5678</p>
                        <?php if($this->Form->isFieldError('User.tel')): ?>
                            <p class="error"><?php echo $this->Form->error('User.tel', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>


                <tr>
                    <th>性別</th>
                    <td><div class="sex">
                            <?php echo $this->Form->input('User.sex', array(
                                    'type'      => 'radio',
                                    'legend'    => false,
                                    'options'   => $this->User->getSex(),
                                    'label'     => false,
                                    'error'     => false,
                                    'before'    => '<label>',
                                    'after'     => '</label>',
                                    'separator' => '</label><label>',
                                    'required'  => false
                            )); ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>
                        <?php echo $this->Form->input('User.birth_year', array(
                                'type'      => 'text',
                                'class'     => 'sizeS mr10',
                                'label'     => false,
                                'div'       => false,
                                'error'     => false,
                                'maxlength' => 4,
                                'required'  => false
                        )); ?>年
                        <?php echo $this->Form->input('User.birth_month', array(
                                'type'      => 'text',
                                'label'     => false,
                                'class'     => 'sizeXS mr10 ml20',
                                'div'       => false,
                                'error'     => false,
                                'maxlength' => 2,
                                'required'  => false
                        )); ?>月
                        <?php echo $this->Form->input('User.birth_day', array(
                                'type'      => 'text',
                                'label'     => false,
                                'class'     => 'sizeXS mr10 ml20',
                                'div'       => false,
                                'error'     => false,
                                'maxlength' => 2,
                                'required'  => false
                        )); ?>日
                        <?php if($this->Form->isFieldError('User.birthday')): ?>
                            <p class="error"><?php echo $this->Form->error('User.birthday', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>当商品を知った経緯<br><small>※複数回答可</small></th>
                    <td class="lavelList">
                        <div class="clum2">
                            <?php
                                foreach($this->Inquiry->getSourceGroup(1) as $src) {
                                    echo $this->Form->input('DocRequest.know_from.', array(
                                            'type'      => 'checkbox',
                                            'label'     => false,
                                            'error'     => false,
                                            'before'    => '<label>',
                                            'after'     => $src['source'] . '</label>',
                                            'value'     => $src['source'],
                                            'checked'   => $this->Inquiry->hasDataInRequest('DocRequest', 'know_from', $src['source']) ? 'checked' : '',
                                            'hiddenField' => false,
                                    ));
                                }
                            ?>
                        </div>
                        <?php
                            foreach($this->Inquiry->getSourceGroup(2) as $src) {
                                echo $this->Form->input('DocRequest.know_from.', array(
                                        'type'      => 'checkbox',
                                        'label'     => false,
                                        'error'     => false,
                                        'before'    => '<label>',
                                        'after'     => $src['source'] . $this->Inquiry->createInputTextFromSource($src) . '</label>',
                                        'value'     => $src['source'],
                                        'checked'   => $this->Inquiry->hasDataInRequest('DocRequest', 'know_from', $src['source']) ? 'checked' : '',
                                        'hiddenField' => false
                                ));
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>希望口数</th>
                    <td>
                        <?php echo $this->Form->input('DocRequest.quantity', array(
                                'type'      => 'text',
                                'label'     => false,
                                'class'     => 'sizeM',
                                'div'       => false,
                                'error'     => false,
                                'required'  => false
                            ));
                        ?>口
                        <?php if($this->Form->isFieldError('DocRequest.quantity')): ?>
                            <p class="error"><?php echo $this->Form->error('DocRequest.quantity', null, array('wrap' => '')); ?></p>
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th>その他</th>
                    <td><p class="pb10">※ご希望や不明点がございましたら記入ください。</p>
                        <?php echo $this->Form->textarea('DocRequest.additional_info'); ?>
                    </td>
                </tr>
                <?php /** オプトインを削除
                <tr>
                    <th>メールマガジン登録</th>
                    <td><label> <?php echo $this->Form->checkbox('User.optout'); ?> メルマガを希望しません</label></td>
                </tr>
                 **/ ?>
            </table>

            <p>「<a href="http://www.intellex.co.jp/policy/privacy.html" target="_blank">プライバシーポリシー</a>」及び「<a href="http://www.intellex.co.jp/policy/sitepolicy.html" target="_blank">サイトポリシー</a>」をお読みの上、内容に同意いただいた場合のみ、「送信する」ボタンを押してください。</p>

            <p class="consentArea">
                <label><?php echo $this->Form->checkbox('User.accept', ['class' => 'jsAcceptPolicy']); ?>同意する</label>
                <span class="error jsAcceptPolicyError" style="display: none;">会員規約に同意してください。</span>
            </p>

            <div class="btnArea">
                <p>
                    <?php echo $this->Form->end(array('label' => '送信する', 'class' => 'jsSubmitDocRequest')); ?>
                </p>
            </div>
            <!-- /.inquiryArea --></section>
    </div>
</article>
<?php echo $this->Html->script('/js/jquery.createDocRequest.js'); ?>
<?php echo $this->Html->script('https://ajaxzip3.github.io/ajaxzip3.js', ['charset' => 'UTF-8']); ?>
