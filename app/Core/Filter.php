<?php

namespace App\Core;

class Filter
{
    // Lọc giá trị để tránh XSS, &$value là tham chiếu
    public static function XSSFilter(&$value)
    {
        // Nếu là string thì lọc string
        if (is_string($value)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        // nếu là array hay object thì loop qua rồi lọc
        } else if (is_array($value) || is_object($value)) {
            foreach ($value as &$valueInValue) {
                self::XSSFilter($valueInValue);
            }
        }

        // kiểu khác thì không xử lý
        return $value;
    }
}
