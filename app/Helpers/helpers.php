<?php

/**
 * @param $viewName
 * @param array $context
 */
function view($viewName, $context = [])
{
    extract($context);
    $filePath = str_replace('.', '/', $viewName);

    require "resources/views/$filePath.php";
}

/**
 * @return string
 */
function getUri()
{
    $request = str_replace('/', '', $_SERVER['REQUEST_URI']);

    return '/' . trim(
        parse_url($request, PHP_URL_PATH), '/'
    );
}

/**
 * @return mixed
 */
function getRequestMethod()
{
    return $_SERVER['REQUEST_METHOD'];
}

/**
 * @param $date
 * @param string $format
 * @return false|string
 */
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);

    if ($d && $d->format($format) === $date) {
        return $d->format($format);
    }
    
    return false;
}

/**
 *Redirect previous page
 */
function redirectBack()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

/**
 *Redirect to page home
 */
function redirectHome()
{
    header('Location: ' . '/');
}