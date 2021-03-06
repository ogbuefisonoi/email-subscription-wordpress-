<?php 
    add_action('init', 'register_script');
    
    function register_script() {
        wp_register_script( 'custom_jquery', plugins_url('/js/admin.js', __FILE__), array('jquery'));
        wp_register_style( 'new_style', plugins_url('/css/style.css', __FILE__), false, '1.0.0', 'all');
    }

    add_action( 'admin_enqueue_scripts', 'enqueue_style' ); 

    add_action('wp_enqueue_scripts', 'enqueue_style');
    
    function enqueue_style(){
        wp_enqueue_script('custom_jquery');
        wp_enqueue_style( 'new_style' );
    }
?>