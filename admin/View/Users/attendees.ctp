<?php $this->assign('title', 'Intellex | セミナー参加者一覧'); ?>

<div id="content" class="col-lg-10 col-sm-10">
    <div class="page-header">
        <h3>セミナー参加者一覧</h3>
    </div>
    <div><h4><?php echo $seminar['title'];?></h4><?php echo $this->User->dateTimeToString($seminar['open_from']);?> 〜 <?php echo $this->User->dateTimeToString($seminar['open_to']);?></div>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> 参加者検索</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php
                        echo $this->Form->create(null, array(
                                'url'=> array(
                                        'controller' => 'users',
                                        'action'     => 'seminarAttendees',
                                        'seminar_id' => $this->params['seminar_id']
                                ),
                                'type'  => 'get',
                                'class' => 'form-horizontal'
                        ));
                    ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">氏名 </label>
                            <div class="col-md-4">
                                <?php echo $this->Form->input('name', array(
                                    'name'      => 'name',
                                    'required'  => false,
                                    'default'   => $this->User->getUrlParam('name'),
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">ステータス </label>
                            <div class="col-md-6">
                                <?php foreach($this->User->getAttendeeStatuses() as $key=>$stt): ?>
                                    <label class="checkbox-inline">
                                    <?php echo $this->Form->checkbox("status", array(
                                            'name'      => "status[$key]",
                                            'checked'   => !empty($this->User->getUrlParam('status')) ? boolval($this->User->getUrlParam('status')[$key]) : false,
                                            'label'     => false,
                                            'div'       => false,
                                            'error'     => false
                                        )
                                    ); ?>
                                    <?php echo $stt;?>
                                    </label>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="center"><button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> 検索</button></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>参加者一覧</h2>
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
                            <?php echo $this->CustomPaginator->renderNumbers($this->params['url'], array(
                                    'url'=> array(
                                            'controller' => 'users',
                                            'action'     =>'seminarAttendees',
                                            'seminar_id' => $this->params['seminar_id']
                                    )));
                            ?>
                        </ul>
                    </div>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>ユーザーid</th>
                            <th>氏名</th>
                            <th>参加登録日</th>
                            <th>参加人数</th>
                            <th>ステータス</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($attendees as $attendee):?>
                            <tr>
                                <?php echo $this->Form->hidden('seminarUserId', array('default' => $attendee['SeminarUser']['id'], 'class' => 'seminarUserId')); ?>
                                <td><?php echo $attendee['User']['id'];?></td>
                                <td><?php echo $this->Html->link($attendee['User']['full_name'], '/users/' . $attendee['User']['id']);?></td>
                                <td><?php echo $this->User->dateTimeToString($attendee['SeminarUser']['created']);?></td>
                                <td><?php echo $attendee['SeminarUser']['attendees'];?></td>
                                <td><?php echo $this->Form->select('status',
                                            $this->User->getAttendeeStatuses(),
                                            array('escape' => false, 'empty'=>false, 'class' => 'form-control jsChangeStatus', 'default' => $attendee['SeminarUser']['status']))
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <ul class="pagination pagination-centered pull-right pagination-table">
                            <?php echo $this->CustomPaginator->renderNumbers($this->params['url'], array(
                                    'url'=> array(
                                            'controller' => 'users',
                                            'action'=>'seminarAttendees',
                                            'seminar_id'=> $this->params['seminar_id']
                                    )));
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
    <!-- content ends -->
</div><!--/#content.col-md-0-->
<?php echo $this->Html->script('/js/jquery.seminar.attendees.js'); ?>