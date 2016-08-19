<article class="inner">
    <a href="<?php echo $this->Html->url('/seminar/' . $seminar['id']);?>">
        <figure><img src="<?php echo h($seminar['image'])?>"></figure>
        <p class="category"><?php foreach($seminarTypeRelation as $type):?><span class="color<?php echo h($type['seminar_type_id']);?>"><?php echo h($type['SeminarType']['name']);?></span><?php endforeach;?></p>
        <h3>
            <span class="title"><?php echo $this->Text->truncate($seminar['title'] , 35, array('ellipsis' => '…', 'exact' => true, 'html' => true)) ?></span>
            <span class="status">
                <?php echo h($this->Seminar->getAlertLabel($seminar['capacity'], $seminar['capacity_alert_num'], $seminarUser));?>
            </span>
        </h3>
        <p class="date">開催日時 :<?php echo h($this->Seminar->formalizeDateByDateTime($seminar['open_from']));?></p>
        <p class="button">詳細はこちら</p>
        <!-- /.inner -->
    </a>
</article>