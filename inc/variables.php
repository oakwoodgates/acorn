<?php 

class Acorn_Vars {
    
    private static $some_var = 'something';

    public static function get_some_var() {
        return apply_filters( 'acorn_vars_some_var', self::$some_var );
    }

}
