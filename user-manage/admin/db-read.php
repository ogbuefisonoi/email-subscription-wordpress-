<?php
    include_once plugin_dir_path( __FILE__ ) . 'db-delete.php';
?>

<div class="table wrapper">
    <div class="inner">
        <?php if(!isset($_POST['custom_user_search'])) { ?>
        <table class="user-table original">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Website</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
                global $wpdb;    
                $usertable = $wpdb->prefix.'user_manage';
                
                
                $results = $wpdb->get_results ( "SELECT * FROM $usertable");
                
                foreach($results as $result){?>

                <tr class="user-manage original">
                    <form action="admin.php?page=user-manage" method="POST">
                    <td>
                        <input type="text" name="user_name" value="<?php echo $result->user_name ?>" disabled> 
                    </td>   
                    <td>
                        <input type="text" name="user_address" value="<?php echo $result->user_address ?>" disabled> 
                    </td>   
                    <td>
                        <input type="text" name="user_website" value="<?php echo $result->user_website ?>" disabled> 
                    </td>   
                    <td>
                        <input type="text" name="user_email" value="<?php echo $result->user_email ?>" disabled> 
                    </td>   
                    <td class="table edit">

                        <span class="user table row edit">Edit</span>
                            <input type="hidden" name = "id" value="<?php echo $result->id ?>" >
                            <input type="hidden" name = "update" value="update">  
                            <input type="submit" value="Save" class="user table row update">
                    </td>
                    </form>
                    <td class = "table col delete">                    
                        <form action="admin.php?page=user-manage" method="POST" class="row delete">
                            <input type="hidden" name = "id" value="<?php echo $result->id ?>" >    
                            <input type="hidden" name = "delete" value="delete">    
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php } 
    
            ?>
        </table>
        <?php }?>
    <!-- </div>
</div> -->
