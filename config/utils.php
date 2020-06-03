<?php

return [
    /**
     * 募集中の合同誌企画の名前。.envで定義
     */
    'project_name' => env('PROJECT_NAME',"合同誌企画"),

    /**
     * 合同誌企画で規定するファイルの幅と高さ（px）
     */
    'minHeight' => '3604',
    'maxHeight' => '3644',
    'minWidth' => '2571',
    'maxWidth' => '2611',

    /**
     * 合同誌企画で規定するファイルの解像度（dpi）
     */
    'dpi' => 350,
];
