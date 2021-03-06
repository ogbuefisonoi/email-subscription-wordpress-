<?php
    
    if(isset($_POST) && $_REQUEST['id'] && $_REQUEST['update']){
        $user_name_error = $user_address_error = $user_website_error = $user_email_error = '';
        $user_id = $_REQUEST['id'];
        

        if(empty(trim($_REQUEST["user_name"]))) {
            $user_name_error = "User name required";
        }elseif(!filter_var(trim($_REQUEST["user_name"]),FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")) )){
            $user_name_error = "Invaild User Name";
        }else {
            $user_name = trim($_REQUEST["user_name"]);
        }

        if(empty(trim($_REQUEST["user_address"]))){
            $user_address_error = "Address required";
        }else {
            $user_address = trim($_REQUEST["user_address"]);
        } 

        if(empty(trim($_REQUEST["user_website"]))){
            $user_website_error = "Website required";
        }elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",trim($_REQUEST["user_website"]))){
            $user_website_error = "Invaild Website";
        } else {
            $user_website = trim($_REQUEST["user_website"]);
        } 

        if(empty(trim($_REQUEST["user_email"]))){
            $user_email_error = "Email required";
        }elseif(!filter_var(trim($_REQUEST["user_email"]), FILTER_VALIDATE_EMAIL)){
            $user_email_error = "Invaild Email";
        } else {
            $user_email = trim($_REQUEST["user_email"]);
        }

        if(empty($user_name_error) && empty($user_address_error) && empty($user_website_error) && empty($user_email_error)){
            global $wpdb;
            $table_name = $wpdb->prefix . 'user_manage';
            
            $wpdb->update( 
                $table_name, 
                array( 
                    'user_name' => $user_name,
                    'user_address' => $user_address, 
                    'user_website' => $user_website,
                    'user_email' => $user_email
                ),array('id'=>$user_id)
            );
        } else {
            echo $user_name_error;
            echo $user_address_error;
            echo $user_website_error;
            echo $user_email_error;
        }
    }
?>