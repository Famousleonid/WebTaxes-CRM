<?php

function debug($data){
    echo '<pre>'.print_r($data,1).'</pre>';
}

if(!function_exists('mb_str_replace')) {

    function mb_str_replace($needle, $text_replace, $haystack) {
        return implode($text_replace, explode($needle, $haystack));
    }

}
