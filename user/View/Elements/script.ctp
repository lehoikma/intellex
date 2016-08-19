<?php

echo $this->Html->script('/js/jquery-1.12.0.min.js');
echo $this->Html->script('/js/common.js');
echo $this->Html->script('/js/jquery.colorbox-min.js');
echo $this->Html->script('/js/jquery.bxslider.min.js');
echo $this->Html->script('/js/jquery.common.js');

?>

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>