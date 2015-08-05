<?php
define('ADD_BOX_DIR', plugin_dir_path(__FILE__));

require_once(ADD_BOX_DIR . "/lib/parser_box.php");
require_once(ADD_BOX_DIR . "/lib/Box.php");

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
    wp_enqueue_script( 'mail', get_template_directory_uri() . '/js/mail.js', array(), '1');
    wp_enqueue_script( 'order_mail', get_template_directory_uri() . '/js/order_mail.js', array(), '1');




        wp_localize_script('jq', 'myajax',
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

add_action('wp_ajax_get_mail', 'get_mail_function');
add_action('wp_ajax_nopriv_get_mail', 'get_mail_function');

add_action('wp_ajax_get_order', 'get_order_function');
add_action('wp_ajax_nopriv_get_order', 'get_order_function');

add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );




function price_menu_page()
{
    add_menu_page('ADD PRICE', 'Цены', 'edit_others_posts', 'price', 'price_admin_page');
}

add_action('admin_menu', 'price_menu_page');

function price_admin_page()
{
    if(isset($_POST['mfdvc'])){
        $price = json_encode($_POST);
        $box = new Box();
        $box->add_price_option($price);
        see_price();
    }
    else{
        see_price();
    }
}

function see_price(){
    $parser = new Parser_box();
    $err = get_option( 'price', 0 );
    if($err=='0'){
        $parser->parse(ADD_BOX_DIR . "/view/price/price.php", array(), true);
    }
    else{
        $err = json_decode($err);
        $err = (array)$err;
        $parser->parse(ADD_BOX_DIR . "/view/price/price_value.php", $err, true);
    }

}

function get_price(){
    $parser = new Parser_box();
    $err = get_option( 'price', 0 );
    if($err=='0'){
        echo "<br />";
    }
    else{
        $err = json_decode($err);
        $err = (array)$err;
        $err['shade'] = "<img id='shade' class='sec3' src='".get_template_directory_uri()."/img/shade.png'>";
        $parser->parse(ADD_BOX_DIR . "/view/site/price/price.php", $err, true);
    }
}

add_shortcode('price', 'get_price');

function get_mail_function(){
    $name = $_POST['name'];
    $from_mail = $_POST['mail'];
    $text = $_POST['text'];

    $massage = "Имя: $name <br /> e-mail: $from_mail <br /> $text";

    mail('korol_dima@list.ru', 'Сообщение с вашего сайта', $massage, "Content-type: text/html; charset=UTF-8\r\n");
}

function get_order_function(){
    $name = $_POST['name'];
    $from_mail = $_POST['mail'];
    $text = $_POST['text'];

    $massage = "Имя: $name <br /> e-mail: $from_mail <br /> $text";

    mail('korol_dima@list.ru', 'Заказ с вашего сайта', $massage, "Content-type: text/html; charset=UTF-8\r\n");
}


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

function get_product()
{
    $parser = new Parser_box();
    $products = get_posts(array(
            'numberposts' => 3,
            'category' => '14',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_status' => 'publish'
        )
    );
    foreach($products as $product){
        $img = get_the_post_thumbnail($product->ID);
        $permalink = get_permalink( $product->ID );
        $parser->parse(ADD_BOX_DIR . "/view/product/product.php", array('images'=>$img,'title'=>$product->post_title), true);
    }

}

add_shortcode('product','get_product');