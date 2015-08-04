<?php

function add_style(){    
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array(), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array(), '1');
    wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-bootstrap-extension'), '1');
}

function add_script(){   
    wp_enqueue_script( 'jq', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array(), '1');
    wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/nav.js', array(), '1', true);
    
    wp_enqueue_script( 'prices', get_template_directory_uri() . '/js/prices.js', array(), '1', true);
    wp_enqueue_script( 'moreworks', get_template_directory_uri() . '/js/moreworks.js', array(), '1', true);
    wp_enqueue_script( 'popup', get_template_directory_uri() . '/js/popup.js', array(), '1', true);
    wp_enqueue_script( 'form', get_template_directory_uri() . '/js/form.js', array(), '1', true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1', true);
        wp_localize_script('my-script', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
    wp_localize_script( 'nav', 'img',
    array(
        'url' => get_template_directory_uri(),
        'act' => admin_url('admin-ajax.php')
    ));
}

add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
    ,'format' => ''
    ,'current' => max( 1, get_query_var('paged') )
    ,'total' => $wp_query->max_num_pages
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}

function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');


if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'post-thumbnails' );



