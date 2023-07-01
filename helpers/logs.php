<?php
//dd function
if (!function_exists('dd')) {
    //should take multiple arguments
    function dd(...$data)
    {
        foreach ($data as $arg) {

            echo '<pre>';
            echo json_encode($arg);
            echo '</pre>';
        }
        die();
    }
}
