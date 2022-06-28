<?php
namespace AgrandesR;

class DefineConstant {

    function __construct( $dictionaryPath='dictionary.json') {
        $language=substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en', 0, 2);
        $dictionary = json_decode(file_get_contents($dictionaryPath), true);
        foreach($dictionary as $key=>$constant) {
            define($key, $constant[$language] ?? $constant['en']);
        }
    }

}