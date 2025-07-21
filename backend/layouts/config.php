<?php
// var_dump($_SERVER['SCRIPT_NAME']);
// die;

switch ($_SERVER['SCRIPT_NAME']) {
    
    default:
        $CURRENT_PAGE = 'backend.index';
        $PAGE_TITLE = 'Dashboard - Admin';
        break;
}