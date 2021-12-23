<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Class DatabaseFactory
 *
 * Cách sử dụng:
 * $database = DatabaseFactory::getFactory()->getConnection();
 * 
 * Tạo một kết nối duy nhất đến db
 * Singleton
 */
class DatabaseFactory
{
    private static $factory;
    private $database;

    public static function getFactory()
    {
        if (!self::$factory) {
            self::$factory = new DatabaseFactory();
        }
        return self::$factory;
    }

    public function getConnection() {
        // Nếu chưa có kết nối thì tạo, có rồi thì chỉ return
        if (!$this->database) {
            try {
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $this->database = new PDO(
                   Config::get('DB_TYPE') . ':host=' . Config::get('DB_HOST') . ';dbname=' .
                   Config::get('DB_NAME') . ';port=' . Config::get('DB_PORT') . ';charset=' . Config::get('DB_CHARSET'),
                   Config::get('DB_USER'), Config::get('DB_PASS'), $options
                   );
            } catch (PDOException $ex) {
                echo 'Không thể kết nối database, hãy thử lại sau' . '<br>';
                echo 'Error code: ' . $ex->getCode();

                // Tắt app
                exit;
            }
        }
        return $this->database;
    }
}