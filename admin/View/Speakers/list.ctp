<?php
    $this->assign('title', 'Intellex | 講師一覧');
?>
<div class="row">
    <div class="box col-md-9">
        <div class="box-inner">
            <div class="box-header well" data-original-title=""></div>
            <div class="box-content">

                <div class="clearfix">
                    <div class="pull-left">
                        <p class="result-text"><?php echo $this->CustomPaginator->renderSummaryInfo();?></p>
                    </div>
                    <ul class="pagination pagination-centered pull-right pagination-table">
                        <?php echo $this->CustomPaginator->renderNumbers($this->params['url']);?>
                    </ul>
                </div>
                <br>
                <table class="table table-striped table-bordered responsive">
                    <thead>
                        <tr>
                            <th>画像</th>
                            <th>講師名</th>
                            <th>詳細情報</th>
                            <th>アクションボタン</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($speakers as $speaker):?>
                        <tr data-speaker_id="<?php echo $speaker['Speaker']['id']?>">
                            <?php echo $this->Form->input('', array('type' => 'hidden', 'class' => 'jsSpeakerId', 'value' => $speaker['Speaker']['id']));?>
                            <td><img class="thumbnail" style="max-width: 100px;" src="<?php echo h($speaker['Speaker']['image']) ?>"></td>
                            <td class="center"><?php echo h($speaker['Speaker']['name']) ?></td>
                            <td class="center"><?php echo h($speaker['Speaker']['introduction'])?></td>
                            <td class="center">
                                <span class="btn btn-info jsEditSpeaker">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </span>
                                <span class="btn btn-danger jsDeleteSpeaker">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </span>
                            </td>
                        </tr>
                    <?php endforeach;?>
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
<?php echo $this->Html->script('/js/jquery.speaker.list.js'); ?>
