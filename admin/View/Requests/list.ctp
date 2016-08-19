<?php $this->assign('title', 'Intellex | 資料お申し込み一覧'); ?>

<div id="content" class="col-lg-10 col-sm-10">
    <div class="page-header">
        <h3>資料お申し込み一覧</h3>
    </div>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon"></i> 検索</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php
                        echo $this->Form->create(null, array(
                            'url'   => array('controller' => 'requests', 'action' => 'index'),
                            'type'  => 'get',
                            'class' => 'form-horizontal'
                        ));
                    ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">氏名 </label>
                            <div class="col-md-6">
                                <?php echo $this->Form->input('name', array(
                                    'name'      => 'name',
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
                            <label class="control-label col-md-3">性別 </label>
                            <div class="col-md-6">
                                <?php foreach($this->User->getSex() as $key=>$label): ?>
                                    <label class="checkbox-inline">
                                        <?php echo $this->Form->checkbox("sex", array(
                                                'name'      => "sex[$key]",
                                                'checked'   => !empty($this->User->getUrlParam('sex')) ? boolval($this->User->getUrlParam('sex')[$key]) : false,
                                                'label'     => false,
                                                'div'       => false,
                                                'error'     => false
                                            )
                                        ); ?>
                                        <?php echo $label;?>
                                    </label>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">年齢 </label>
                            <div class="col-sm-7 form-inline">
                                <?php echo $this->Form->input('age_fr', array(
                                    'name'      => 'age_fr',
                                    'default'   => $this->User->getUrlParam('age_fr'),
                                    'type'      => 'number',
                                    'class'     => 'form-control jsInputAge',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false
                                )); ?>
                                〜
                                <?php echo $this->Form->input('age_to', array(
                                    'name'      => 'age_to',
                                    'default'   => $this->User->getUrlParam('age_to'),
                                    'type'      => 'number',
                                    'class'     => 'form-control jsInputAge',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false
                                )); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">申込日 </label>
                            <div class="col-sm-7 form-inline">
                                <?php echo $this->Form->input('re_fr', array(
                                    'name'      => 're_fr',
                                    'default'   => $this->User->getUrlParam('re_fr'),
                                    'type'      => 'text',
                                    'class'     => 'form-control datetimePicker',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false
                                )); ?>
                                〜
                                <?php echo $this->Form->input('re_to', array(
                                    'name'      => 're_to',
                                    'default'   => $this->User->getUrlParam('re_to'),
                                    'type'      => 'text',
                                    'class'     => 'form-control datetimePicker',
                                    'label'     => false,
                                    'div'       => false,
                                    'error'     => false
                                )); ?>
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
                    <h2>申込一覧</h2>
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
                            <th>id</th>
                            <th>氏名</th>
                            <th>氏名（フリガナ）</th>
                            <th>性別</th>
                            <th>年齢</th>
                            <th>希望口数</th>
                            <th>申込日</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($requests as $request): ?>
                            <tr>
                                <td class="center"><?php echo $request['DocRequest']['id'];?></td>
                                <td class="center"><?php echo $this->Html->link($request['User']['full_name'], '/users/' . $request['User']['id']);?></td>
                                <td class="center"><?php echo $request['User']['full_name_kana'];?></td>
                                <td class="center"><?php echo $this->User->getSexLabelByCode($request['User']['sex']);?></td>
                                <td class="center"><?php echo $this->User->calculateAge($request['User']['birthday']);?></td>
                                <td class="center"><?php echo $request['DocRequest']['quantity'];?></td>
                                <td class="center"><?php echo $this->User->dateTimeToString($request['DocRequest']['created']);?></td>
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
    <!-- content ends -->
</div><!--/#content.col-md-0-->
<script type="text/javascript">
    $.datetimepicker.setLocale('ja');
    jQuery('.datetimePicker').datetimepicker({
        lang: 'ja',
        format:'Y-m-d',
        timepicker:false
    });
</script>