<?php 

    if(isset($_POST) && $_REQUEST['id'] && $_REQUEST['delete']){
        
        global $wpdb;    
        $id = $_REQUEST['id'];
        $usertable = $wpdb->prefix.'user_manage';

        $wpdb->delete( $usertable, array( 'id' => $id ) );

    }
?>