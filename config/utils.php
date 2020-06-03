<?php

return [
    /**
     * 募集中の合同誌企画の名前。.envで定義
     */
    'project_name' => env('PROJECT_NAME',"合同誌企画"),

    /**
     * 合同誌企画で規定するファイルの幅と高さ（px）
     */
    'imageRules' => [
        'height' => '3624',
        'width' => '2591',
    ],

    /**
     * 合同誌企画で規定するファイルの解像度（dpi）
     */
    'dpi' => 350,
];
