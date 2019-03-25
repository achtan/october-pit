<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28/08/2018
 * Time: 16:45
 */

namespace Pit\Core\Classes;


class DateHelpers
{

    const FORMAT_NICE_WITH_TIME = 'l G:i (j. M. Y)';


    public static function niceWithTime($date) {
        return self::format($date, self::FORMAT_NICE_WITH_TIME);
    }

    public static function format($date, $format) {
        if(!$date) return '';

        return $date->format($format);
    }

}