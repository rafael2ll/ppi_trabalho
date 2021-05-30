<?php
session_start();
if (!isset($_SESSION['id'])) {
    http_response_code(401);
    exit();
}