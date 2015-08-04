<?php


class Box {
    function add_price_option($opt){
        $option_name = 'price' ;

        if ( get_option( $option_name ) != $opt ) {
            update_option( $option_name, $opt );
        } else {
            $deprecated = ' ';
            $autoload = 'no';
            add_option( $option_name, $opt, $deprecated, $autoload );
        }
    }
} 