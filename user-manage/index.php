<?php 

    function user_management() {
        include_once plugin_dir_path( __FILE__ ) . '/admin/dashbord.php';
        include_once plugin_dir_path( __FILE__ ) . '/admin/db-update.php';
        include_once plugin_dir_path( __FILE__ ) . '/admin/db-read.php';
        include_once plugin_dir_path( __FILE__ ) . '/admin/db-search.php';
    }
?>