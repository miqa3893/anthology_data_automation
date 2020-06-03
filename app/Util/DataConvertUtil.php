<?php


namespace App\Util;


class DataConvertUtil
{
    private static $integerToCharacterArray = [
        '1' => 'MEIKO',
        '2' => 'KAITO',
        '4' => '初音ミク',
        '8' => '鏡音リン',
        '16' => '鏡音レン',
        '32' => '巡音ルカ',
        '63' => '全キャラクター',
    ];

    private static $integerToYearArray = [
        '1' => '2013',
        '2' => '2014',
        '4' => '2015',
        '8' => '2016',
        '16' => '2017',
        '32' => '2018',
        '64' => '2019',
        '128' => '2020夏',
        '255' => '全年度',
    ];

    /**
     * キャラクターコードをキャラクター名に変換します
     * @param array $characters
     */
    public static function toCharacter(array $characters){
        $str = '';
        $sum = 0;

        for ($i=0;$i<sizeof($characters);$i++){
            $str .= self::$integerToCharacterArray[$characters[(string)$i]];
            $sum += $characters[$i];
            if($i!=sizeof($characters)){
                $str .= ",";
            }
        }

        if(key_exists($sum,self::$integerToCharacterArray)) $str = self::$integerToCharacterArray[(string)$sum];

        return $str;
    }

    /**
     * 年度コードをキャラクター名に変換します
     * @param array $years
     */
    public static function toYear(array $years){
        $str = '';
        $sum = 0;
        for ($i=0;$i<sizeof($years);$i++){
            $str .= self::$integerToYearArray[$years[(string)$i]];
            $sum += $years[$i];
            if($i!=sizeof($years)){
                $str .= ",";
            }
        }

        if(key_exists($sum,self::$integerToYearArray)) $str = self::$integerToYearArray[(string)$sum];

        return $str;
    }
}
