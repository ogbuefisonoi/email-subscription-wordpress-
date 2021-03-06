<?php
/*
Plugin Name: User Manage
Description: Manage User Data.
Version: 3.3.0
Author: Sunshine
Copyright: � 2020 Algoritmika Ltd.
WC tested up to: 4.7
*/
    
    if ( ! defined( 'ABSPATH' ) ) exit;

    include_once plugin_dir_path( __FILE__ ) . 'index.php';
    include_once plugin_dir_path( __FILE__ ) . '/admin/db-create.php';
    include_once plugin_dir_path( __FILE__ ) . '/admin/db-update.php';
    include_once plugin_dir_path( __FILE__ ) . '/assets/user-manage-public.php';

    add_action('admin_menu', 'user_manage_setup_menu', 10);

    function user_manage_setup_menu() {
        add_menu_page('user_manage', 'User Manage', 'administrator', 'user-manage', 'user_management');
    }
    
    register_activation_hook( __FILE__, 'user_manage_create_db' );
?>
