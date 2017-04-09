<?php

class Config
{
    public static function get($path = null){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach ($path as $bit) {
                if(isset($config[$bit])){
                    $config = $config[$bit];  //setting config
                }
            }
            return $config;
        }
        return false;  //false gdyby nic nie istniało
    }

}