<?php

namespace model;

class DB
{
    private static $db;

    public static function db() {
        if (self::$db === null) {
            self::$db = self::connection();
        }

        return self::$db;
    }

    protected static function connection() {
        // connection
    }
}