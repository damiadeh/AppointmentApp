<?php  

namespace App\Helpers;


class Utilities  
{
        public static function prettyTime($time)
      {
        $arr = explode(":",$time);
        $timeFormat = (int)$arr[0];
        if ($timeFormat > 12){
            return $timeFormat-12 .":".$arr[1]."PM";
        }elseif($timeFormat == 12){
            return "12:00PM";
        }elseif($timeFormat == 00){
            return "12:00AM";
        }else{
            return $arr[0].":".$arr[1]."AM";
        }
      }

    
}