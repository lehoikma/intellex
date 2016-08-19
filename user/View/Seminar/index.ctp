<?php $this->assign('title', 'セミナー一覧｜ アセットシェアリング') ?>
<?php $this->assign('description', '不動産小口化商品の活用セミナー、相続対策セミナーを随時開催しております。アセットシェアリングは「資産運用」や「相続」にてご活用頂ける、東証一部上場の[インテリックス］が提供する不動産小口化商品です。') ?>
<?php $this->assign('h1', '東証一部上場[インテリックス]提供のセミナー一覧') ?>

<div class="contents"><div class="contentsCont">

        <ul class="bredNav">
            <li><?php echo $this->Html->link('ホーム', '/');?></li>
            <li>セミナー一覧</li>
        </ul>

        <section>
            <h2 class="headlineImg1"><?php echo $this->Html->image('seminar/title_list.gif', array('alt' => 'セミナー情報一覧', 'width' => '260', 'height' => '34')); ?></h2>
            <div class="seminarCategoryMenu">
                <div class="inner">
                    <p class="selectTitle">表示の切替：</p>
                    <p class="select"><span>カテゴリーを選ぶ</span></p>
                </div>

                <ul>
                    <li <?php echo $this->Seminar->getNoParamSeminarType() ?>><?php echo $this->Html->link('全て', '/seminar');?></li>
                    <?php foreach($this->Seminar->getAllSeminarTypes() as $id => $name):?>
                        <li <?php echo $this->Seminar->getCurrentSeminarType($id)?>>
                            <?php echo $this->Html->link($name, '/seminar?type=' . $id, array('escape' => false, 'class' => 'color' . $id));?>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>

            <?php echo $this->Seminar->getCurrentSeminarLabel();?>

            <?php foreach($seminars as $seminar):?>
                <?php echo $this->element('seminar.index.seminarSlice', array(
                        'seminar' => $seminar['Seminar'],
                        'seminarUser' => $seminar['SeminarUser'],
                        'seminarTypeRelation' => $seminar['SeminarTypeRelation'],
                ));?>
            <?php endforeach;?>

        </section>


        <ul class="pager">
            <?php echo $this->CustomPaginator->render($this->params['url']);?>
        </ul>

    </div>
</div>