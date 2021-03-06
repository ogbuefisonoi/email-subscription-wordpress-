<?php 
    
    include_once plugin_dir_path( __FILE__ ) . 'db-download.php';
    
    if ( ! defined( 'ABSPATH' ) ) exit;

    $user_name_error = $user_address_error = $user_website_error = $user_email_error = '';
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST['insert']) {
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

            $wpdb->insert( 
                $table_name, 
                array( 
                    'user_name' => $user_name,
                    'user_address' => $user_address, 
                    'user_website' => $user_website,
                    'user_email' => $user_email
                ),array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                )
            );
        }   
    }
?>

<div class="admin user-manage  wrapper">
    <div class="admin user-manage inner">
        <div class="admin user-manage  head">
            <div>
                <button class="btn admin user-manage  member-create">Create New Company</button>    
            </div>
            <div>
                <button class="btn admin user-manage  member-search">Input name or email</button>    
            </div>
            <div>
                <form action="admin.php?page=user-manage" method="POST" class="csv form">
                    <input type="hidden" name = "csvstart" value="csv">
                    <input type='submit' value='Download CSV' name='Export' class="btn admin user-manage  member-csv">
                </form>
            </div>
        </div>
        <div class="admin user-manage body activate">
            <form action="admin.php?page=user-manage" method="POST" class="admin user-manage form">
                <div class="form-group">
                    <div class="input-item">
                        <label class="">Name</label>
                        <input type="text" name="user_name" placeholder="Name">
                        <span><?php echo $user_name_error?></span>
                    </div>

                    <div class="input-item">
                        <label class="">Address</label>
                        <input type="text" name="user_address" placeholder="Address">
                        <span><?php echo $user_address_error?></span>
                    </div>

                    <div class="input-item">
                        <label class="">Website</label>
                        <input type="text" name="user_website" placeholder="Website">
                        <span><?php echo $user_website_error?></span>
                    </div>

                    <div class="input-item">
                        <label class="">Email</label>
                        <input type="text" name="user_email" placeholder="Email">
                        <span><?php echo $user_email_error?></span>
                    </div>
                </div>

                <div class="user-insert">
                    <input type="hidden" name="insert" value="dd">
                    <input type="submit" value="Insert">
                </div>
            </form>
        </div>
        <div class="admin user-search">
            <form action="admin.php?page=user-manage" method="POST" class="custom user search form">
                <input type="text" name="custom_user_search" class="user-search-bar" placeholder="Input Name or Email To Search Company...">
                <input type="submit" value="Search" class="custom user search ">
            </form>
        </div>

    <!-- </div>
</div> -->