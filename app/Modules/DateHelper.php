<?php
namespace App\Modules;

class DateHelper
{
   public static function getCurrentWeekDays()
   {
      $today = new \DateTime();

      // Получаем массив из 14 дней (6 дней назад + сегодня + 7 дней вперед)
      $dates = [];
      for ($i = -7; $i <= 6; $i++) {
         $dates[] = $today->modify(($i < 0 ? $i : '+' . $i) . ' day')->format('Y-m-d');
         $today->modify(-$i . ' day'); // Возвращаем дату на исходную позицию
      }
      return $dates;
   }


   public static function getRandomMidlle($min, $max , $drop){
      return  rand($min * $drop, $max * $drop) / $drop;
   }
}