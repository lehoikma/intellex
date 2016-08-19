<?php $this->assign('title', '安定利回りと手間いらずの不動産投資・相続対策ならアセットシェアリング｜インテリックス') ?>
<?php $this->assign('description', 'アセットシェアリングは、東証一部上場、[インテリックス］ご提供する良質な不動産を小口で所有する資産商品です。これ１つで相続の３大対策「分割」「節税」「納税資金」が可能です。さらに管理の手間いらずの賃貸収益を期待できる上、リスク分散も可能です。')?>
<?php $this->assign('h1', '相続対策と資産運用に効く、不動産小口化商品 アセットシェアリング')?>

<div class="mainvisual">
    <div class="mainvisualCont">
        <ul id="js-slider">
            <li><?php echo $this->Html->image('index/mainvisual_01_pc.jpg', array('class' => 'switch', 'alt' => '安定収益と手間のかからない安心の運営・管理 アセットシェアリング')) ?></li>
            <!-- <li><?php echo $this->Html->image('index/mainvisual_02_pc.jpg', array('class' => 'switch', 'alt' => '元町のキ・セ・キ 元町通りの真ん中に　アセットシェアリング横濱元町　誕生')) ?></li> -->
            <li><a href="<?php echo $this->Html->url('/seminar?type=3');?>"><?php echo $this->Html->image('index/mainvisual_03_pc.jpg', array('class' => 'switch', 'alt' => '相続相談<br>セミナー実施中 不動産や相続でお困りのことはありませんか？ 不動産・相続に役立つ、各種セミナーを開催しています。 相続セミナー 一覧はこちら')) ?></a></li>
            <li><?php echo $this->Html->image('index/mainvisual_01_pc.jpg', array('class' => 'switch', 'alt' => '安定収益と手間のかからない安心の運営・管理 アセットシェアリング')) ?></li>
            <li><a href="<?php echo $this->Html->url('/seminar?type=3');?>"><?php echo $this->Html->image('index/mainvisual_03_pc.jpg', array('class' => 'switch', 'alt' => '相続相談<br>セミナー実施中 不動産や相続でお困りのことはありませんか？ 不動産・相続に役立つ、各種セミナーを開催しています。 相続セミナー 一覧はこちら')) ?></a></li>
        </ul>
        <a href="#" id="prev"></a>
        <a href="#" id="next"></a>

        <!-- /mainvisualCont --></div>
    <div class="newsArea">
        <div id="js-news">
            <h2><?php echo $this->Html->image('index/title_news.gif', array('width' => '62', 'alt' => '')) ?></h2>
            <ul>
                <li><time>2016/08/09(火)</time>サイトがオープンしました。</li>
            </ul>
        </div>
        <!-- /newsArea --></div>
</div>
<!-- /============================mainvisual============================ -->


<!-- ============================contents============================ -->


<section class="seminarTopArea" id="seminar"><div class="section">
        <h2 class="headlineImg1"><?php echo $this->Html->image('index/title_seminar.png', array('alt' => 'セミナー情報', 'width' => '187'))?></h2>
        <div class="seminarCategoryMenu">
            <div class="inner">
                <p class="selectTitle">表示の切替：</p>
                <p class="select"><span>カテゴリーを選ぶ</span></p>
            </div>

            <ul>
                <li <?php echo $this->Seminar->getNoParamSeminarType() ?>><?php echo $this->Html->link('全て', '/#seminar');?></li>
                <?php foreach($this->Seminar->getAllSeminarTypes() as $id => $name):?>
                    <li <?php echo $this->Seminar->getCurrentSeminarType($id)?>><?php echo $this->Html->link($name, '?type=' . $id . '#seminar', array('class' => 'color' . $id))?></li>
                <?php endforeach;?>
            </ul>
        </div>

        <?php echo $this->Seminar->getCurrentSeminarLabel();?>

        <section class="seminarTopList">
            <?php foreach($seminars as $seminar): ?>
                <?php echo $this->element('index.seminarSlice', array(
                        'seminar' => $seminar['Seminar'],
                        'seminarUser' => $seminar['SeminarUser'],
                        'seminarTypeRelation' => $seminar['SeminarTypeRelation'],
                ));?>
            <?php endforeach ?>
        </section>
        <p class="more"><?php echo $this->Html->link('一覧を見る', '/seminar/')?></p>

    </div></section>



<section class="about">
    <div class="section">
        <h2 class="headlineImg1"><?php echo $this->Html->image('index/title_about.png', array('alt' => 'アセットシェアリングとは', 'width' => '330'))?></h2>
        <div class="text01">
            <p>「アセットシェアリング」は、インテリックス（東証一部上場）が提供する、不動産小口化商品です。</p>
            <p>不動産は「相続・贈与」・「資産運用」・「資産組替え」にメリットが多いため、<br><br>手段の一つとしてお考えの方も多いかと存じます。</p>
            <p>一方で、不動産には下記の要素もあるため、<br>敬遠してきた方もいらっしゃるのではないでしょうか。</p>
        </div>
        <p class="img01"><?php echo $this->Html->image('index/about_text_01_pc.png', array('class' => 'switch', 'alt' => '不動産投資は高額の資金が必要分割しにくいので相続に使えない 所有物件の管理が大変空室リスク等が心配'))?></p>
        <div class="text02">
            <h3><?php echo $this->Html->image('index/about_text_02_pc.png', array('alt' => '「アセットシェアリング」は一味違います。実物不動産の良さはそのままに、「小口化」することによってより一層扱い易く、身近にいたしました。'))?></h3>
            <p class="graph"><?php echo $this->Html->image('index/about_graph.png', array('alt' => ''))?></p>
            <p class="text">都心の良質な不動産は、従来個人では得難いものでした。<br>「アセットシェアリング」は、その良質な不動産を<br>小口（１口１００万円単位）で購入しやすくしております。</p>
            <p class="text">長く続く賃貸収益をシェアしながら、<br>リクスもシェアされ小さく。<br>また、物件管理はインテリックスが責任を持って行いますので、<br>日々の対応にオーナー様が煩わされることはありません。<br>少額で良質な不動産を所有し、長く活用してお子様・お孫様へ。</p>
            <p class="text">アセットシェアリングをぜひあなたのポートフォリオのひとつに </p>
        </div>
        <div class="detail">
            <h3> お客様の課題に応じた詳細を見る</h3>
            <div class="inner num1">
                <h4><strong>資産運用・資産の組換え</strong><br>を検討されている方</h4>
                <p><a href="/as/lp1/" target="_blank">詳細はこちら</a></p>
            </div>
            <div class="inner num2">
                <h4><strong>相続・贈与に不動産活用</strong><br>を検討されている方</h4>
                <p><a href="/as/lp2/" target="_blank">詳細はこちら</a></p>
            </div>
            <div class="inner num3">
                <h4><strong>相続についての相談先</strong><br>を探している方</h4>
                <p><a href="/as/lp3/" target="_blank">詳細はこちら</a></p>
            </div>
        </div>
    </div></section>



<section class="articleArea">
    <h2 class="headlineImg1"><?php echo $this->Html->image('index/title_airticle.gif', array('alt' => '物件情報', 'width' => '141')) ?></h2>
    <div class="cont">
        <div class="title">
            <p class="status">準備中</p>
        </div>
        <div class="inner">
            <figure>
                <?php echo $this->Html->image('base/comingsoon_pc.gif') ?>
            </figure>
            <p class="text">Coming Soon...</p>
        </div>
    </div>


    <div class="cont">
        <div class="title">
            <p class="status sold">完売<span>2015.7.31</span></p>
            <h3>アセットシェアリング原宿</h3>
            <p class="address">東京都渋谷区千駄ヶ谷三丁目3番20</p>
        </div>
        <div class="inner">
            <figure><?php echo $this->Html->image('index/article_img_02.jpg', array('alt' => ''))?></figure>
            <p class="text">グローバルな人材が集う「コミュニティスペース」と、稀少性を高めた「プライベート空間」の両立。</p>
            <p class="button"><a href="assets/harajuku.html" class="js-houseDetail">物件概要</a></p>
        </div>
    </div>
    <!-- /articleArea --></section>