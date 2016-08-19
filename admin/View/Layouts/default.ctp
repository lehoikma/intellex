<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="utf-8">
    <title><?php echo $this->fetch('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        echo $this->element('css');
        echo $this->element('script');
    ?>

</head>
<body>

<?php if(!empty($msgContent) && !empty($msgType)): ?>
    <script type="text/javascript">
        $(function() {
            noty({text: '<?php echo $msgContent; ?>', layout: 'top', type: '<?php echo $msgType; ?>', timeout: 3000});
        });
    </script>
    <?php
    ?>
<?php endif; ?>

<?php echo $this->element('header'); ?>
<?php echo $this->element('dialog'); ?>
<div class="ch-container">
    <div class="row">
        <?php
            if (!empty($admin)) {
                echo $this->element('menu');
            }
        ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <hr>
    <?php echo $this->element('footer'); ?>
</div>
</body>
