<?php
    if ( ! defined( 'ABSPATH' ) ) exit;

    function user_manage_create_db() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    
        $table_name = $wpdb->prefix . 'user_manage';
        $sql = "CREATE TABLE $table_name (
        id INT(5) NOT NUll AUTO_INCREMENT,
        user_name VARCHAR(100) NOT NULL,
        user_address VARCHAR(100) NOT NULL,
        user_website VARCHAR(100) NOT NULL,
        user_email VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
        ) $charset_collate;";
        dbDelta( $sql );
    }
?>