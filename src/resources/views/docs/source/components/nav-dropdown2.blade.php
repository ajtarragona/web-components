@nav([
    'items' => [
        [
            'title' => 'Item 1'  ,
            'icon' => 'home',
            'url' => 'http://www.google.com',
            'active ' => true,
            'visible' => false
        ],
        [
            'title' => 'Item 2'  ,
            'icon' => 'star',
            'url' => '',
            'children' => [
                [
                    'title' => 'Subifds ff tem 2.1'  ,
                    'url' => ''
                ],
                [
                    'title' => 'Subitem 2.2'  ,
                    'url' => '#',
                    'children' => [
                        [
                            'title' => 'Subitemfdf fd fds fds 2.2.1'  ,
                            'url' => ''
                        ],
                        [
                            'title' => 'Subitem 2.2.2'  ,
                            'url' => ''
                        ]
                    ]
                ],
                [
                    'title' => 'Subitem 2.3'  ,
                    'url' => ''
                ]
            ]
        ],
        [
            'title' => 'Item 3'  ,
            'icon' => 'file',
            'url' => '',
        ],
        [
            'title' => 'Item 4'  ,
            'icon' => 'check',
            'children' => [
                [
                    'title' => 'Subitem 4.1'  ,
                    'url' => ''
                ],
                [
                    'title' => 'Subitem 4.2'  ,
                    'url' => ''
                ]
            ]
        ]
    ],
    'navigation' => 'dropdown',
    'fullwidth' => false,
    'disposition'=>'horizontal',
    // 'class' => 'nav-light ',
    
],[
    'dropdown-vertical-direction'=> 'top'
])