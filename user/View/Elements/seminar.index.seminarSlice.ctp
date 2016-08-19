<article class="seminarList">
    <h2><?php echo $this->Html->link(h($seminar['title']), $seminar['id']);?></h2>
    <div class="sideLeft">
        <figure>
            <?php echo $this->Html->image(h($seminar['image']),
                    array('url' => $seminar['id'])
            );?>
        </figure>
        <p class="category">
            <?php foreach($seminarTypeRelation as $type):?>
                <span class="color<?php echo h($type['seminar_type_id']);?>"><?php echo h($type['SeminarType']['name']);?></span>
            <?php endforeach;?>
        </p>
    </div>
    <div class="inner">
        <h3>開催日時</h3>
        <p class="date"><?php echo h($this->Seminar->formalizeDateByDateTime($seminar['open_from']));?>
            <span>
                <?php echo h($this->Seminar->getTimeFromDateTime($seminar['open_from']));?>
                〜
                <?php echo h($this->Seminar->getTimeFromDateTime($seminar['open_to']));?>
            </span>
        </p>
        <h3>開催場所</h3>
        <p><?php echo h($seminar['venue']);?></p>
        <h3 class="spHide">交通</h3>
        <p class="spHide"><?php echo h($seminar['access']);?></p>
            <div class="clum2">
                <h3>参加費</h3>
                <p><?php echo h($seminar['entry_fee']);?></p>
                <h3>定 員</h3>
                <p><?php echo h($seminar['capacity']);?>名
                    <span class="sold">
                        <?php echo h($this->Seminar->getAlertLabel($seminar['capacity'], $seminar['capacity_alert_num'], $seminarUser));?>
                    </span>
                </p>
            </div>
        <ul>
            <li><?php echo $this->Html->link('詳細はこちら', $seminar['id']);?></li>
            <?php if($this->Seminar->hasSlots($seminar['capacity'], $seminarUser)):?>
                <li><?php echo $this->Html->link('お申し込み', array('controller' => 'seminar', 'action' => 'inquiry', $seminar['id']));?></li>
            <?php endif;?>
        </ul>
    </div>
</article>