<?php

namespace App\Enums;

enum UserType: int
{
    case Admin = 10;
    //case Senior = 11;
    case Master = 12;
    case Agent = 20;
    case Player = 30;

    public static function usernameLength(UserType $type)
    {
        return match ($type) {
            self::Admin => 1,
            //self::Senior => 2,
            self::Master => 2,
            self::Agent => 3,
            self::Player => 4,
        };
    }

    public static function childUserType(UserType $type)
    {
        return match ($type) {
            self::Admin => self::Master,
            //self::Senior => self::Master,
            self::Master => self::Agent,
            self::Agent => self::Player,
            self::Player => self::Player
        };
    }
}
