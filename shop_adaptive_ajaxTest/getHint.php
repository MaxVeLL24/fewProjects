<?php
require_once 'autoloader.php';
if ((!$_POST['getHint'] == '')) {
    $get_hint = user::validate($_POST['getHint']);
    if (!empty($get_hint)) {
        foreach ($get_hint as $get) {
            echo "<a class='hint'>" . $get[0] . "</a>";
        }
    }
}