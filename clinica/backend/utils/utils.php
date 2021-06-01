<?php
function post_or_default($name, $default)
{
    if (isset($_POST[$name]))
        return htmlspecialchars($_POST[$name]);
    else return $default;
}

function get_or_default($name, $default)
{
    if (isset($_GET[$name]))
        return htmlspecialchars($_GET[$name]);
    else return $default;
}

function post_or_error($name, $error)
{
    if (isset($_POST[$name]) && !empty($_POST[$name]))
        return htmlspecialchars($_POST[$name]);
    else {
        http_response_code(400);
        echo json_encode(array('erro' => $error));
        exit(0);
    }
}

function get_or_error($name, $error)
{
    if (isset($_GET[$name]) && !empty($_GET[$name]))
        return htmlspecialchars($_GET[$name]);
    else {
        http_response_code(400);
        echo json_encode(array('erro' => $error));
        exit(0);
    }
}

function json_encode_not_null($values)
{
    header('Content-Type: application/json');
    $json = json_encode($values);
    return preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $json);
}