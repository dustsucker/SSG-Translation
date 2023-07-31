<?php return[
    'debug' => true,
    'panel' => [
        'install' => true 
    ],
    'languages' => true,
    'language.detect' => true,
    'routes' => [
        [
            'pattern' => 'de/feed',
            'language' => '*',
            'action'  => function () {
                $options = [
                    'title' => 'Dokumentation',
                    'sort' => false,
                ];
                return site()->homePage()->index()->feed($options);
            }
        ],
        [
            'pattern' => 'en/feed',
            'language' => '*',
            'action'  => function () {
                $options = [
                    'title' => 'Documentation',
                    'sort' => false,
                ];
                return site()->homePage()->index()->feed($options);
            }
        ]
    ]
];