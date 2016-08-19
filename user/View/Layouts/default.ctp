<!DOCTYPE html>
<html lang="ja">
    <head>

        <meta charset="UTF-8">
        <title><?php echo $this->fetch('title'); ?></title>
        <?php echo $this->element('meta'); ?>
        <?php echo $this->element('css'); ?>
        <?php echo $this->element('script');?>

    </head>
    <body<?php if($this->params['controller'] == 'top') echo ' id="top"'?>>
        <?php echo $this->element('analytics'); ?>
        <?php echo $this->element('header'); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('footer'); ?>

    </body>
</html>
