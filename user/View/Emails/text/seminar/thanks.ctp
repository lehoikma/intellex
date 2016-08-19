----------------------------------------------------------------------
※このメールはアセットシェアリングホームページよりセミナー参加予約を
　いただいたお客様に自動的にお送りしております。
※お心当たりのない方は、お手数をお掛けしますが、本文なしでそのまま
ご返信ください。
----------------------------------------------------------------------

<?php echo $user['name_sei'] ?>　<?php echo $user['name_mei'] ?> 　様

この度は、株式会社インテリックスが主催するセミナーにご予約を頂きありが
とうございます。ご予約の内容は下記の通りとなります。

■タイトル
　<?php echo $seminar['Seminar']['title'] . "\n" ?>

■開催日時
　<?php echo $this->Seminar->formalizeDateTimeByDateTime($seminar['Seminar']['open_from']); ?>　　開場時間　【　<?php echo $this->Seminar->getTimeFromDateTime($seminar['Seminar']['open_door_at']); ?>　】

■担当講師
<?php if(!empty($seminar['SeminarSpeakerRelation'])): ?>
<?php foreach($seminar['SeminarSpeakerRelation'] as $seminarSpeakers): ?>
　<?php echo $seminarSpeakers['Speaker']['name']  . "\n" ?><?php endforeach; ?>
<?php endif ?>

■会場
　<?php echo $seminar['Seminar']['venue'] . "\n" ?>

■会場までのアクセス
　<?php echo $seminar['Seminar']['access'] ?> 　

■当日のお問い合わせ先
　<?php echo $seminar['Seminar']['contact'] . "\n" ?>

<?php echo $user['name_sei'] ?> 様のご来場をスタッフ一同、心よりお待ちしております。

---------------------------------------------
★アセットシェアリングホームページはこちら
　http://www.intellex.co.jp/as/
---------------------------------------------

--------------------------------------------------
株式会社インテリックス
ソリューション事業部　受付窓口：田村・日高
【Tel】0120-77-8940
【E-mail】asset@intellex.co.jp
〒150-0002 東京都渋谷区渋谷2-12-19
東建インターナショナルビル11F
【宅地建物取引業者免許】 国土交通大臣(3)第6392号
【不動産特定共同事業者免許】 東京都知事 第97号
--------------------------------------------------