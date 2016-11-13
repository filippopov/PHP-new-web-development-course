<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 13.11.2016 г.
 * Time: 17:48
 */

namespace ViewEngine;


class Templates
{
    const TEMPLATES_FOLDER = 'Templates';

    public static function render($templateName, $data = null)
    {
        include self::TEMPLATES_FOLDER. '/' . $templateName . '.php';
    }
}