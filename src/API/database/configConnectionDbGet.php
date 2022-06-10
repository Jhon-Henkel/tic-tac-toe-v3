<?php
namespace configConnectionDbGet;

include_once '../../../config/Constants.php';

use constants\Constants as constants;

$data = file_get_contents(Constants::STRING_CONFIG_DATABASE_FILE);

echo $data;