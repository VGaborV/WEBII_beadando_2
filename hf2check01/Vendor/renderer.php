<?php
function render($file, $params = []) {
    ob_start();
    include($file);
    return ob_get_clean();
}