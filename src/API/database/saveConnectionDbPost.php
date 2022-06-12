<?php
namespace saveConfigDbPost;

require_once '../../../config/Constants.php';

use constants;

$dataPost = (file_get_contents('php://input'));

$pathOpen = fopen(constants\Constants::STRING_CONFIG_DATABASE_FILE, 'w');
if (fwrite($pathOpen, $dataPost)) {
    fclose($pathOpen);
} else {
    http_response_code(500);
}