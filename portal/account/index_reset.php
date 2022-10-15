<?php

/**
 * Credential Changes
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jerry Padgett <sjpadgett@gmail.com>
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2019-2021 Jerry Padgett <sjpadgett@gmail.com>
 * @copyright Copyright (c) 2019 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

$ignoreAuth_onsite_portal = $ignoreAuth = false;
// Will start the (patient) portal OpenEMR session/cookie.
require_once(dirname(__FILE__) . "/../../src/Common/Session/SessionUtil.php");
OpenEMR\Common\Session\SessionUtil::portalSessionStart();

$landingpage = "./../index.php?site=" . urlencode($_SESSION['site_id']);
// kick out if patient not authenticated
if (isset($_SESSION['pid']) && isset($_SESSION['patient_portal_onsite_two'])) {
    $ignoreAuth_onsite_portal = true;
} else {
    OpenEMR\Common\Session\SessionUtil::portalSessionCookieDestroy();
    header('Location: ' . $landingpage . '&w');
    exit;
}
require_once(dirname(__FILE__) . '/../../interface/globals.php');
require_once(dirname(__FILE__) . "/../lib/appsql.class.php");

use OpenEMR\Common\Auth\AuthHash;
use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;

$logit = new ApplicationTable();
//exit if portal is turned off
if (!(isset($GLOBALS['portal_onsite_two_enable'])) || !($GLOBALS['portal_onsite_two_enable'])) {
    echo xlt('Portal de usuarios fuera de servicio');
    exit;
}
if (!empty($_POST)) {
    if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"], "portal_index_reset")) {
        CsrfUtils::csrfNotVerified();
    }
}
$_SESSION['credentials_update'] = 1;

DEFINE("TBL_PAT_ACC_ON", "patient_access_onsite");
DEFINE("COL_ID", "id");
DEFINE("COL_PID", "pid");
DEFINE("COL_POR_PWD", "portal_pwd");
DEFINE("COL_POR_USER", "portal_username");
DEFINE("COL_POR_LOGINUSER", "portal_login_username");
DEFINE("COL_POR_PWD_STAT", "portal_pwd_status");

$sql = "SELECT " . implode(",", array(COL_ID, COL_PID, COL_POR_PWD, COL_POR_USER, COL_POR_LOGINUSER, COL_POR_PWD_STAT)) .
    " FROM " . TBL_PAT_ACC_ON . " WHERE pid = ?";

$auth = privQuery($sql, array($_SESSION['pid']));
$valid = ((!empty(trim($_POST['uname']))) &&
    (!empty(trim($_POST['login_uname']))) &&
    (!empty(trim($_POST['pass_current']))) &&
    (!empty(trim($_POST['pass_new']))) &&
    (trim($_POST['uname']) == $auth[COL_POR_USER]) &&
    (AuthHash::passwordVerify(trim($_POST['pass_current']), $auth[COL_POR_PWD])));
if (isset($_POST['submit'])) {
    if (!$valid) {
        $errmsg = xlt("Invalid Current Credentials Error.") . xlt("Unknown.");
        $logit->portalLog('Credential update attempt', '', ($_POST['uname'] . ':unknown'), '', '0');
        die($errmsg);
    }
    $new_hash = (new AuthHash('auth'))->passwordHash(trim($_POST['pass_new']));
    if (empty($new_hash)) {
        // Something is seriously wrong
        error_log('OpenEMR Error : OpenEMR is not working because unable to create a hash.');
        die("OpenEMR Error : OpenEMR is not working because unable to create a hash.");
    }
    $sqlUpdatePwd = " UPDATE " . TBL_PAT_ACC_ON . " SET " . COL_POR_PWD . "=?, " . COL_POR_LOGINUSER . "=?" . " WHERE " . COL_ID . "=?";
    privStatement($sqlUpdatePwd, array(
        $new_hash,
        $_POST['login_uname'],
        $auth[COL_ID]
    ));
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo xlt('Cambiar contraseña [Credenciales]'); ?></title>
    <?php
    Header::setupHeader(['opener']);
    if (!empty($_POST['submit'])) {
        unset($_POST['submit']);
        echo "<script>dlgclose();</script>\n";
    }
    ?>
    <script>
        function checkUserName() {
            let vacct = document.getElementById('uname').value;
            let vsuname = document.getElementById('login_uname').value;
            let data = {
                'action': 'userIsUnique',
                'account': vacct,
                'loginUname': vsuname
            };
            $.ajax({
                type: 'GET',
                url: './account.php',
                data: data
            }).done(function (rtn) {
                if (rtn === '1') {
                    return true;
                }
                alert(<?php echo xlj('No está disponible!. Intente de nuevo!'); ?>);
                return false;
            });
        }

        function process_new_pass() {
            if (document.getElementById('login_uname').value != document.getElementById('confirm_uname').value) {
                alert(<?php echo xlj('Los campos de nombre de usuario no son los mismos.'); ?>);
                return false;
            }
            if (document.getElementById('pass_new').value != document.getElementById('pass_new_confirm').value) {
                alert(<?php echo xlj('Los campos de la nueva contraseña no son los mismos.'); ?>);
                return false;
            }
            if (document.getElementById('pass_current').value == document.getElementById('pass_new_confirm').value) {
                if (!confirm(<?php echo xlj('La nueva contraseña es la misma que la anterior. Click OK para aceptar de todos modos.'); ?>)) {
                    return false;
                }
            }
            return true;
        }
    </script>
    <style>
        .table > tbody > tr > td {
            border-top: 0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" onsubmit="return process_new_pass()">
            <input style="display:none" type="text" name="dummyuname" />
            <input style="display:none" type="password" name="dummypassword" />
            <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken("portal_index_reset")); ?>" />
            <table class="table table-sm" style="border-bottom:0px;width:100%">
                <tr>
                    <td width="35%"><strong><?php echo xlt('Nombre de usuario'); ?><strong></td>
                    <td><input class="form-control" name="uname" id="uname" type="text" readonly
                            value="<?php echo attr($auth['portal_username']); ?>" /></td>
                </tr>
                <tr>
                    <td><strong><?php echo xlt('Nuevo o actual usuario'); ?><strong></td>
                    <td><input class="form-control" name="login_uname" id="login_uname" type="text" required onblur="checkUserName()"
                            title="<?php echo xla('Cambiar o mantener actual. Ingrese 12 a 80 caracteres. Sugerimos incluir símbolos y números pero no es obligatorio.'); ?>" pattern=".{12,80}"
                            value="<?php echo attr($auth['portal_login_username']); ?>" />
                    </td>
                </tr>
                <tr>
                <tr>
                    <td><strong><?php echo xlt('Confirmar usuario'); ?><strong></td>
                    <td><input class="form-control" name="confirm_uname" id="confirm_uname" type="text" required
                            title="<?php echo xla('Tiene que confirmar su usuario.'); ?>"
                            autocomplete="none" pattern=".{8,80}" value="" />
                    </td>
                </tr>
                </tr>
                <tr>
                    <td><strong><?php echo xlt('Contraseña actual'); ?><strong></td>
                    <td>
                        <input class="form-control" name="pass_current" id="pass_current" type="password" required
                            placeholder="<?php echo xla('Contraseña actual para autorizar cambios.'); ?>"
                            title="<?php echo xla('Introduzca su contraseña actual que utilizo al ingresar.'); ?>"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo xlt('Contraseña nueva o actual'); ?><strong></td>
                    <td>
                        <input class="form-control" name="pass_new" id="pass_new" type="password" required
                            placeholder="<?php echo xla('8 caracteres mínimo, mix de mayúsculas y minúscular'); ?>"
                            title="<?php echo xla('You must enter a new or reenter current password to keep it. Even for Username change.'); ?>"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo xlt('Confirar Contraseña'); ?><strong></td>
                    <td>
                        <input class="form-control" name="pass_new_confirm" id="pass_new_confirm" type="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="none" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><br /><input class="btn btn-primary float-right" type="submit" name="submit" value="<?php echo xla('Grabar'); ?>" /></td>
                </tr>
            </table>
            <div><strong><?php echo '* ' . xlt("Todas las contraseñas distinguen mayúsculas y minúscular!") ?></strong></div>
        </form>
    </div><!-- container -->
</body>
</html>
