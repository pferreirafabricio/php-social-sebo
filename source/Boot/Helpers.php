<?php

function dd($param = [])
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
    die();
}