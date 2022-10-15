<?php

/**
 *  package OpenEMR
 *  link    https://www.open-emr.org
 *  author  Sherwin Gaddis <sherwingaddis@gmail.com>
 *  Copyright (c) 2022.
 *  license https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

$ignoreAuth = true;
// Set $sessionAllowWrite to true to prevent session concurrency issues during authorization related code
$sessionAllowWrite = true;
require_once dirname(__FILE__) . "/../interface/globals.php";
require_once "photo_inc.php";

$id = rand();
try {
    $image = str_replace('data:image/jpeg;base64,', '', $_POST['imageFile']);
    file_put_contents("/var/www/html/errors/image-$id.jpg", base64_decode($image));
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    die;
}

echo xlt("Image Upload Complete");

//get the file from the tmp folder
$image = "/var/www/html/errors/image-$id.jpg";
processUploaedImage($image, $_POST['token']);

