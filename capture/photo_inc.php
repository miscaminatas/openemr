<?php

/**
 *  package OpenEMR
 *  link    https://www.open-emr.org
 *  author  Sherwin Gaddis <sherwingaddis@gmail.com>
 *  Copyright (c) 2022.
 *  license https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

function isPatientHere($source, $database)
{
    $database = $database . ".";
    return sqlQuery("SELECT pid FROM " . $database . "patient_data WHERE pid = ?", [$source]);
}

function processUploaedImage($image, $pid)
{
    //move image to patient chart
}
