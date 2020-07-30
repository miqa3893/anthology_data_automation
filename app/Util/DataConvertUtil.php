<?php


namespace App\Util;


use App\Work;

class DataConvertUtil
{
    /**
     * 全キャラコードを足し合わせた固定値
     */
    public const ALL_CHARACTER_SUM = 63;

    /**
     * 全年コードを足し合わせた固定値
     */
    public const ALL_YEAR_SUM = 255;

    private static $allCharactersArray = ['1','2','4','8','16','32'];

    private static $allYearsArray = ['1','2','4','8','16','32','64','128'];

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
     * @return string
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
     * キャラクターコードをキャラクター名に変換します
     * @param int $characters
     * @return string
     */
    public static function toCharacterWithSum(int $characters){
        $str = '';
        if($characters==0){
            return self::$integerToCharacterArray[self::ALL_CHARACTER_SUM];
        }

        foreach (self::$allCharactersArray as $item){
            if($characters & $item) $str .= self::$integerToCharacterArray[$item].",";
        }

        return $str;
    }

    /**
     * キャラクターコード（合計）を配列に変換します
     * @param int $characters
     * @return array|string
     */
    public static function toArrayForCharacter(int $characters){
        $arr = [];
        if($characters==0){
            $characters = self::ALL_CHARACTER_SUM;
        }

        foreach (self::$allCharactersArray as $item){
            if($characters & $item) $arr[] = $item;
        }

        return $arr;
    }

    /**
     * 年度コードをキャラクター名に変換します
     * @param array $years
     * @return string
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

    /**
     * 年度コードをキャラクター名に変換します
     * @param int $years
     * @return string
     */
    public static function toYearWithSum(int $years){
        $str = '';
        if($years==0){
            return self::$integerToYearArray[self::ALL_YEAR_SUM];
        }

        foreach (self::$allYearsArray as $item){
            if($years & $item) $str .= self::$integerToYearArray[$item].",";
        }

        return $str;
    }

    /**
     * 年度コード（合計）を配列に変換します
     * @param int $years
     * @return array|string
     */
    public static function toArrayForYear(int $years){
        $arr = [];
        if($years==0){
            $years = self::ALL_YEAR_SUM;
        }

        foreach (self::$allYearsArray as $item){
            if($years & $item) $arr[] = $item;
        }
        return $arr;
    }

    /**
     * 作品が提出されているかチェックし、提出されていた場合はTrueを返します。
     * @param $twitterUser
     * @return bool
     */
    public static function existsWork($twitterUser){
        $twitterId = $twitterUser->twitter_id;
        $works = Work::where('twitter_id','=',$twitterId);

        if($works->count() != 0){
            return true;
        }

        return false;
    }

    public static function sumCode(array $codes){
        $sum = 0;
        foreach ($codes as $code){
            $sum += $code;
        }
        return $sum;
    }
}
