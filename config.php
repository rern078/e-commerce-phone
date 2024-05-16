<?php

function getPageFile($PageName)
{
    $pagefile = "include/header.php";
    switch ($PageName) {
        case "smart-phones":
            $pagefile = "smart-phones.php";
            break;
        case "tablets":
            $pagefile = "tablets.php";
            break;
        case "smart-watchs":
            $pagefile = "smart-watchs.php";
            break;
        case "laptops":
            $pagefile = "laptops.php";
            break;
        case "monitors":
            $pagefile = "monitors.php";
            break;
        case "accessories":
            $pagefile = "accessories.php";
            break;
        case "sign_up":
            $pagefile = "sign_up.php";
            break;
        case "login":
            $pagefile = "login.php";
            break;
    }

    return $pagefile;
}




