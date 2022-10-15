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

require_once dirname(__FILE__) . "/../interface/globals.php";
require_once "photo_inc.php";

use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;

$msg = xlt("Something is wrong with your link. Contact link provider to get corrected link.  Error code - ");


if (!isset($_GET['source'])) {
    echo $msg . 1;
   die;
}
if (!filter_input(INPUT_GET, 'source', FILTER_VALIDATE_INT)) {
    echo $msg . 2;
    die;
}
$patient_id = filter_input(INPUT_GET, 'source', FILTER_VALIDATE_INT);
$database = filter_input(INPUT_GET, 'd', FILTER_SANITIZE_SPECIAL_CHARS);

if (!empty($patient_id) && !empty($database)) {
    $check_source = isPatientHere($patient_id, $database);
} else {
    echo $msg . 3;
    die;
}


if (empty($check_source['pid'])) {
    echo $msg . 4;
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo xlt('Capture ID card'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <?php Header::setupHeader(); ?>
    <style>

        button {
            width: 120px;
            padding: 10px;
            display: block;
            margin: 20px auto;
            border: 2px solid #111111;
            cursor: pointer;
            background-color: white;
        }

        #start-camera {
            margin-top: 50px;
        }

        #video {
            display: none;
            margin: 60px 0 0 -138px;
        }

        #click-photo {
            display: none;
        }

        #dataurl-container {
            display: none;
        }

        #canvas {
            display: block;
            margin: 0 0 0 0;
        }

        #dataurl-header {
            text-align: center;
            font-size: 15px;
        }

        #dataurl {
            display: none;
            height: 400px;
            width: 620px;
            margin: 10px auto;
            resize: none;
            outline: none;
            border: 1px solid #111111;
            padding: 5px;
            font-size: 13px;
            box-sizing: border-box;
        }

    </style>
    <script>
        function reloadCapture() {
            window.location.reload();
        }
    </script>
</head>

<body>

<button id="start-camera"><?php echo xlt('Start Camera'); ?></button>
<video id="video" width="620" height="440" autoplay></video>
<button id="click-photo"><?php echo xlt("Click to capture Photo") ?></button>
<div id="dataurl-container" class="m-3">
    <canvas id="canvas" width="310" height="440"></canvas>
    <div id="dataurl-header"><?php echo xlt('Ready to upload next image?'); ?></div>
    <textarea id="dataurl" readonly></textarea>
    <button id="start-new-capture" onclick="reloadCapture()"><?php echo xlt('Next') ?></button>
</div>

<script>

    let camera_button = document.querySelector("#start-camera");
    let video = document.querySelector("#video");
    let click_button = document.querySelector("#click-photo");
    let canvas = document.querySelector("#canvas");
    let dataurl = document.querySelector("#dataurl");
    let dataurl_container = document.querySelector("#dataurl-container");

    camera_button.addEventListener('click', async function() {
        isMobileDevice();
        let stream = null;

        try {
            video = document.getElementById('video');
            video.style.width = document.width + 'px';
            video.style.height = document.height + 'px';
            video.setAttribute('autoplay', '');
            video.setAttribute('muted', '');
            video.setAttribute('playsinline', '');

            stream = await navigator.mediaDevices.getUserMedia({
                audio: false,
                video: {
                    facingMode: { exact: "environment" }
                }

            });
        }
        catch(error) {
            alert(error.message);
            return;
        }

        video.srcObject = stream;

        video.style.display = 'block';
        camera_button.style.display = 'none';
        click_button.style.display = 'block';
    });

    click_button.addEventListener('click', function() {
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        let image_data_url = canvas.toDataURL('image/jpeg');
        dataurl.value = image_data_url;
        let token = '<?php echo $patient_id; ?>';
        let formData = new FormData();
        formData.append('imageFile', image_data_url);
        formData.append('token', token);
        let request = new XMLHttpRequest();
        request.upload.addEventListener("progress", uploadProgress, false);
        request.addEventListener("load", uploadComplete, false);
        request.addEventListener("error", uploadFailed, false);
        request.addEventListener("abort", uploadCanceled, false);
        request.open( "POST", "image_receiver.php");

        request.send(formData);

        video.style.display = 'none';
        click_button.style.display = 'none';
        dataurl_container.style.display = 'block';
    });

    function isMobileDevice() {
        let isMobile = false; //initiate as false
        // device detection
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
            isMobile = true;
        }
        if (isMobile == false) {
            let $msg = '<?php echo xlt("Please use a mobile device to upload picture") ?>';
            alert($msg);
            Event.stopPropagation();
        }
    }

    function uploadProgress(evt) {

        if (evt.lengthComputable) {
            let percentComplete = Math.round(evt.loaded * 100 / evt.total);
            document.getElementById('progress').innerHTML = percentComplete.toString() + '%';
        }
        else {
            document.getElementById('progress').innerHTML = 'unable to compute';
        }
    }

    function uploadComplete(evt) {
        /* This event is raised when the server send back a response */
        alert(evt.target.responseText);
    }

    function uploadFailed(evt) {
        let ufailed = '<?php echo xlt("There was an error attempting to upload the file"); ?>';
        alert(ufailed);

    }

    function uploadCanceled(evt) {
        let ucancel = '<?php echo xlt("The upload has been canceled by the user or the browser dropped the connection"); ?>';
        alert(ucancel);

    }

</script>

</body>
</html>
