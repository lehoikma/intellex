<?php

$config['per_page'] = 10;
$config['top_per_page'] = 8;
$config['current_datetime'] = date('Y-m-d H:i:s');
$config['seminar_statuses'] = array(
    'draft' => 1,
    'publish' => 2
);
$config['preview_token'] = 'kl21h48932hidqA9Q0eyfewdcl1dwD4!$%1qR';

$config['seminar_type_css'] = array(
    1 => 'color1',
    2 => 'color2',
    3 => 'color3',
    4 => 'color4',
);

$config['production_domain'] = 'www.intellex.co.jp';
$config['staging_domain'] = 'www.intellex.co.jp';
$config['development_domain'] = 'dev.user.intellex.local';

$config['master_prefs'] = [
    '北海道',
    '青森県',
    '岩手県',
    '宮城県',
    '秋田県',
    '山形県',
    '福島県',
    '茨城県',
    '栃木県',
    '群馬県',
    '埼玉県',
    '千葉県',
    '東京都',
    '神奈川県',
    '新潟県',
    '富山県',
    '石川県',
    '福井県',
    '山梨県',
    '長野県',
    '岐阜県',
    '静岡県',
    '愛知県',
    '三重県',
    '滋賀県',
    '京都府',
    '大阪府',
    '兵庫県',
    '奈良県',
    '和歌山県',
    '鳥取県',
    '島根県',
    '岡山県',
    '広島県',
    '山口県',
    '徳島県',
    '香川県',
    '愛媛県',
    '高知県',
    '福岡県',
    '佐賀県',
    '長崎県',
    '熊本県',
    '大分県',
    '宮崎県',
    '鹿児島県',
    '沖縄県',
];

$config['know_from'] = [
    [
        'source' => 'インテリックスホームページ',
        'group'  => 1
    ],
    [
        'source' => 'テレビCM',
        'group'  => 1
    ],
    [
        'source' => 'ラジオ',
        'group'  => 1
    ],
    [
        'source' => '日経新聞',
        'group'  => 1
    ],
    [
        'source' => 'ダイレクトメール',
        'group'  => 1
    ],
    [
        'source' => 'インターネット広告（バナー）',
        'group'  => 1
    ],
    [
        'source' => 'インターネット検索（ヤフー・グーグル等）',
        'group'  => 2
    ],
    [
        'source' => 'セミナー',
        'group'  => 2
    ],
    [
        'source' => 'SNS（Facebook、Twitter等）',
        'group'  => 2
    ],
    [
        'source' => '雑誌',
        'group'  => 2,
        'additionalInput' => [
            'placeholder' => '雑誌名をご記入ください'
        ]
    ],
    [
        'source' => '紹介',
        'group'  => 2,
        'additionalInput' => [
            'placeholder' => 'ご紹介いただいた方のお名前を記入ください'
        ]
    ],
    [
        'source' => 'その他',
        'group'  => 2,
        'additionalInput' => [
            'placeholder' => 'ご希望や不明点がありましたら記入ください'
        ]
    ],
];
