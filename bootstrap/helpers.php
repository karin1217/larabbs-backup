<?php
/**
 * Created by PhpStorm.
 * User: karin
 * Date: 17/11/18
 * Time: 上午1:35
 */

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}