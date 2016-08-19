<?php $this->assign('title', 'Intellex | セミナー一覧'); ?>

<div id="content" class="col-lg-10 col-sm-10">
    <div class="page-header">
        <h3>セミナー一覧</h3>
    </div>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>セミナー一覧</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="clearfix">
                        <div class="pull-left">
                            <p class="result-text"><?php echo $this->CustomPaginator->renderSummaryInfo();?></p>
                        </div>
                        <ul class="pagination pagination-centered pull-right pagination-table">
                            <?php echo $this->CustomPaginator->renderNumbers($this->params['url']);?>
                        </ul>
                    </div>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th style="width: 26%;">タイトル</th>
                            <th style="width: 28%">開催日</th>
                            <th>参加人数（定員）</th>
                            <th  style="width: 15%;">会場住所</th>
                            <th style="width: 7%;">ステータス</th>
                            <th style="width: 20%;">タイプ</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($seminars as $seminar): ?>
                            <tr>
                                <td><?php echo $seminar['Seminar']['id']; ?></td>
                                <td><?php echo $this->Html->link($seminar['Seminar']['title'], '/seminars/' . $seminar['Seminar']['id']);?></td>
                                <td><?php echo $this->Seminar->dateTimeToString($seminar['Seminar']['open_from']) . ' 〜 ' . $this->Seminar->dateTimeToString($seminar['Seminar']['open_to']);?></td>
                                <td><?php echo $this->Seminar->countAttendees($seminar['SeminarUser']) . '（' . $seminar['Seminar']['capacity'] . '）'; ?></td>
                                <td><?php echo $seminar['Seminar']['venue']; ?></td>
                                <td><?php echo $this->Seminar->getStatusLabel($seminar['Seminar']); ?></td>
                                <td><?php echo implode('・', Hash::extract($seminar['SeminarTypeRelation'], '{n}.SeminarType.name')); ?></td>
                                <td><?php echo $this->Html->link('参加者一覧', $seminar['Seminar']['id'] . '/attendees', array('class' => 'btn btn-info btn-sm')) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <ul class="pagination pagination-centered pull-right pagination-table">
                            <?php echo $this->CustomPaginator->renderNumbers($this->params['url']);?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    <!-- content ends -->
</div><!--/#content.col-md-0-->