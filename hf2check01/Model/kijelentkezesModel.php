<?php
class kijelentkezesModel {
    function kilep() {
        $data = $_SESSION;
        unset($_SESSION["csn"]);
        unset($_SESSION["un"]);
        unset($_SESSION["login"]);
        return $data;
    }
}