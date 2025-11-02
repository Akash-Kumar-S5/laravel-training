<?php
// helpers.php

/**
 * helps in navigation bar to change active according to the page
 *
 * @param $routeName
 * @return bool
 */
if (!function_exists('isActiveRoute')) {
    function isActiveRoute($routeName): bool
    {
        return request()->routeIs($routeName);
    }
}
