<?php

$dataPost = (file_get_contents('php://input'));

$pathOpen = fopen('../../../config/configDatabase.json', 'w');
if (fwrite($pathOpen, $dataPost)) {
    fclose($pathOpen);
} else {
    http_response_code(500);
}
