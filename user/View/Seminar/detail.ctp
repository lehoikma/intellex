<?php $this->assign('title', $seminar['Seminar']['title'] . ' ｜ アセットシェアリング') ?>
<?php $this->assign('description', '不動産小口化商品の活用セミナー、相続対策セミナーを随時開催しております。アセットシェアリングは「資産運用」や「相続」にてご活用頂ける、東証一部上場の[インテリックス］が提供する不動産小口化商品です。') ?>
<?php $this->assign('h1', '東証一部上場[インテリックス]提供のセミナー一覧') ?>

<div class="contents"><div class="contentsCont">

        <ul class="bredNav">
            <li><?php echo $this->Html->link('ホーム', '/');?></li>
            <li><?php echo $this->Html->link('セミナー一覧', '/seminar');?></li>
            <li><?php echo h($seminar['Seminar']['title']);?></li>
        </ul>

        <article>
            <p class="headlineImg1"><?php echo $this->Html->image('seminar/title.gif', array('alt' => 'セミナー情報一覧', 'width' => '136', 'height' => '24')); ?></p>
            <h2 class="headline1"><?php echo h($seminar['Seminar']['title']);?></h2>



            <div class="seminarDetail">
                <div class="mainContents">
                    <p class="category">
                        <?php foreach($seminar['SeminarTypeRelation'] as $type):?>
                            <span class="color<?php echo h($type['seminar_type_id']);?>"><?php echo h($type['SeminarType']['name']);?></span>
                        <?php endforeach;?>
                    </p>
                    <figure class="thumb">
                        <?php echo $this->Html->image($seminar['Seminar']['image']); ?>
                    </figure>
                    <div class="commentArea">
                        <?php echo $seminar['Seminar']['description'];?>
                    </div>
                    <section class="teacherBox">
                        <?php foreach($seminar['SeminarSpeakerRelation'] as $speaker):?>
                            <?php echo $this->element('seminar.detail.speaker', array('speaker' => $speaker['Speaker'])); ?>
                        <?php endforeach;?>
                    </section>
                </div>
                <div class="sideContents">
                    <div class="sideContentsCont">
                        <div class="inner">
                            <h3>開催日時</h3>
                            <p class="date"><?php echo h($this->Seminar->formalizeDateByDateTime($seminar['Seminar']['open_from']))?>
                                <span>
                                    <?php echo h($this->Seminar->getTimeFromDateTime($seminar['Seminar']['open_from']))?>
                                    〜
                                    <?php echo h($this->Seminar->getTimeFromDateTime($seminar['Seminar']['open_to']))?>
                                </span>
                            </p>
                            <h3>開場時間</h3>
                            <p>
                                <?php echo $this->Seminar->getTimeFromDateTime($seminar['Seminar']['open_door_at']);?>
                            </p>
                            <h3>開催場所</h3>
                            <p><?php echo nl2br(h($seminar['Seminar']['venue']));?></p>
                            <h3>交通</h3>
                            <p><?php echo nl2br(h($seminar['Seminar']['access']));?></p>
                            <h3>参加費</h3>
                            <p><?php echo h($seminar['Seminar']['entry_fee']);?></p>
                            <h3>定 員</h3>
                            <p><?php echo nl2br(h($seminar['Seminar']['capacity']));?>名
                                <span class="sold">
                                    <?php echo h($this->Seminar->getAlertLabel($seminar['Seminar']['capacity'], $seminar['Seminar']['capacity_alert_num'], $seminar['SeminarUser']));?>
                                </span>
                            </p>
                            <h3>当日のお問合せ</h3>
                            <p><?php echo nl2br(h($seminar['Seminar']['contact']));?></p>
                            <h3>主催</h3>
                            <p>株式会社インテリックス</p>
                        </div>
                        <?php if($this->Seminar->hasSlots($seminar['Seminar']['capacity'], $seminar['SeminarUser'])):?>
                            <p class="button"><?php echo $this->Html->link('お申し込み', '/seminar/inquiry/' . $seminar['Seminar']['id'], array('class' => 'buttonStyle01'));?></p>
                        <?php else:?>
                            <p class="button finish">満席</p>
                        <?php endif;?>
                        <?php echo $this->element('seminar.detail.googlemap', array('seminar' => $seminar['Seminar'])); ?>
                    </div>
                    <p class="notice">※開催日以外でもご対応致します。予約フォームにご希望日時（第3希望程度）をご記入頂きご連絡下さい。ご来訪日程について数日中以内にご連絡を差し上げます。</p>
                </div>
            </div>
        </article>
    </div>
</div>
