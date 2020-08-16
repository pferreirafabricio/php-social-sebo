<?php

/**
 * Format and dump a variable and die
 * 
 * @param $variable Variable to be formated
 */
function dd($variable = []): void
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    die();
}

/**
 * Gets the query string data
 *
 * @param string $param The param to get in URL.
 * @param $filter The filter to be applied in the param.
 */
function get(string $param, $filter = FILTER_SANITIZE_STRING)
{
    return filter_input(INPUT_GET, $param, $filter);
}

/**
 * Gets the body data
 *
 * @param string $param The param to get in body request.
 * @param $filter The filter to be applied in the param.
 */
function post(string $param, $filter = FILTER_SANITIZE_STRING) 
{
    return filter_input(INPUT_POST, $param, $filter);
}

/**
 * Get all variables sents in request
 *
 * @param  array $filter Filters to be applied in the data
 * @return mixed
 */
function postAll(array $filter = [])
{
    return filter_input_array(INPUT_POST, $filter);
}

/**
 * Gets the current date
 * 
 * @param string $dateFormat Format to date be parsed
 * @return string
 */
function getCurrentDate(string $dateFormat = 'Y-m-d H:i:s'): string
{
    return date($dateFormat);
}

/**
 * Redirect the user to a specific URL
 * 
 * @param string $url URL to which the user will be redirected to
 */
function redirect(string $url): void
{
    header('Location: ' . $url);
}

/**
 * Hash a password
 * 
 * @param string $password Password to be encrypted
 * @return string
 */
function passwordHash(string $password): string
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function arrayTree(array $array, int $maxColumns = 4): array
{
    $temporaryArray = [];
    $newArray = [];
    $index = 0;
    $lasItem = end($array);

    foreach ($array as $item) {
        $temporaryArray[] = $item;
        $index++;

        if ($index == $maxColumns || $item == $lasItem) {
            $newArray[] = $temporaryArray;
            $temporaryArray = null;
            $index = 0;
        }
    }

    return $newArray;
}

function responseJson($data)
{
    header('Content-type: application/json;charset=utf-8');
    echo json_encode($data);
}
