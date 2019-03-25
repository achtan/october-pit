<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24/09/2018
 * Time: 13:22
 */

namespace Pit\Core\Classes;
use \October\Rain\Argon\Argon;

class Token
{

    protected static function prepare($string, $expire = null) {
        $appKey = \Config::get('app.key');
        if(is_object($string) && $string->id) {
            $string = $string->id . '___' . get_class($string);
        }
        if($expire) {
            $expire = Argon::parse($expire);
            $string .= '___' . $expire->getTimestamp();
        }
        return $string . '___' . $appKey;
    }

    public static function calculate($string, $expire = null) {
        return md5(self::prepare($string, $expire));
    }

    public static function check($string, $token, $expire = null) {
        $expire = Argon::parse($expire);
        if($expire < Argon::parse('now')) {
            return false;
        }
        return self::calculate($string, $expire) == $token;
    }



}