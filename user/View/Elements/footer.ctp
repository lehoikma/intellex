<footer class="footer">
    <?php if(!isset($isForm)): ?>
        <div class="contactFooter">
            <div class="contactFooterCont">
                <div class="tel">
                    <h3>お電話でのご相談は<br>こちらから</h3>
                    <div class="inner">
                        <p class="spHide"><?php echo $this->Html->image('common/tel_text_01.gif', array('width' => '235', 'height' => '23', 'alt' => '0120-77-8940'))?></p><p class="pcHide"><a href="tel:0120-77-8940"><?php echo $this->Html->image('common/tel_text_01_sp.gif', array('alt' => '0120-77-9840')) ?></a></p><p class="date">営業時間 10:00〜18:00（土・日 定休日 ）</p>
                    </div>
                </div>
                <div class="contact">
                    <h3>WEBからの<br>お問い合わせはこちら</h3>
                    <ul>
                        <li><?php echo $this->Html->link('資料請求は<br>こちら', '/inquiry/', array('class' => 'docs', 'escape' => false))?></li>
                        <li><?php echo $this->Html->link('セミナー情報は<br>こちら','/seminar/', array('class' => 'seminar', 'escape' => false))?></li>
                    </ul>
                </div>
            </div>
            <!-- /contactFooter --></div>
    <?php else: ?>
        <div class="telBox">
            <div class="inner">
                <p class="copy">ご不明な点や、事前にご相談されたい場合はお気軽にお電話ください。</p>
                <p class="tel spHide"><?php echo $this->Html->image('common/tel_text_01.gif', array('alt' => '0120-77-8940', 'width' => '235', 'height' => '23')); ?></p><p class="tel pcHide"><a href="tel:0120-77-8940"><?php echo $this->Html->image('common/tel_text_01_sp.gif', array('alt' => '0120-77-9840')) ?></a></p><p class="date">営業時間 10:00〜18:00（土・日 定休日 ）</p>
            </div>
        </div>
    <?php endif ?>

    <?php if(!isset($isForm)): ?>
    <nav class="footLink">
        <ul>
            <li><?php echo $this->Html->link('会社情報', 'http://www.intellex.co.jp/company/', array('target' => '_blank'))?></li>
            <li><?php echo $this->Html->link('アクセス', 'http://www.intellex.co.jp/company/access.html', array('target' => '_blank'))?></li>
            <li><?php echo $this->Html->link('サイトポリシー', 'http://www.intellex.co.jp/policy/sitepolicy.html', array('target' => '_blank'))?></li>
            <li><?php echo $this->Html->link('プライバシーポリシー', 'http://www.intellex.co.jp/policy/privacy.html', array('target' => '_blank'))?></li>
        </ul>
    </nav>
    <?php endif ?>
    <div class="footerCont">
        <ul class="logoArea">
            <li><?php echo $this->Html->image('common/footer_logo_tosho.png', array('width' => '53', 'height' => '53', 'alt' => ''))?></li>
            <li><?php echo $this->Html->image('common/footer_logo_renovation.png', array('width' => '225', 'height' => '49', 'alt' => ''))?></li>
        </ul>
        <p class="inner">
            <a href="http://www.intellex.co.jp/" target="_blank">
                <?php echo $this->Html->image('base/logo_footer.png', array('alt' => '株式会社インテリックス', 'width' => '195', 'height' => '54')); ?>
            </a>
        </p>
    </div>
    <p class="copyright"><small>© INTELLEX. ALL RIGHTS RESERVED.</small></p>
</footer>