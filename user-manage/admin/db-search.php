<?php 
    // add_action('wp_ajax_my_action', 'action_process');
    // function action_process() {
    //     if($_POST['val'] && !empty($_POST['val'])){
    //         echo $_POST['val'];
    //     }   
    //     die();
    // }


    if(isset($_POST['custom_user_search'])){   
        global $wpdb;    
        $usertable = $wpdb->prefix.'user_manage'; 
        $search_err = "";

        if(empty($_POST['custom_user_search'])){
            $search_err = "Didn't input any data to find";
        }else{
            if(!filter_var(trim($_POST["custom_user_search"]), FILTER_VALIDATE_EMAIL)){
                $user_name_search = trim($_POST["custom_user_search"]);
                $prepared_statement = $wpdb->prepare(
                    "SELECT * FROM $usertable WHERE user_name Like %s", $user_name_search.'%');
                
                $results = $wpdb->get_results( $prepared_statement );
                    // var_dump($results);
                if($results){
                    echo '<h3>Search Results</h3>';
                    echo '<table class="user-table search">';
                    echo '<tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>';
                    foreach($results as $result) {
                        echo '<tr>';
                        echo '<form action="admin.php?page=user-manage" method="POST">';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_name.'" disabled>';
                        echo '</td>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_address.'" disabled>';
                        echo '</td>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_website.'" disabled>';
                        echo '</td>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_email.'" disabled>';
                        echo '</td>';
                        echo '<td class="table edit">';
                        echo '<span class="user table row edit">Edit</span>';
                        echo '<input type="hidden" name = "id" value="'.$result->id.'" >';
                        echo '<input type="hidden" name = "update" value="update">';
                        echo '<input type="submit" value="Save" class="user table row update">';
                        echo '</td>';
                        echo '</form>';
                        echo '<td class = "table col delete"> ';
                        echo '<form action="admin.php?page=user-manage" method="POST" class="row delete">';
                        echo '<input type="hidden" name = "id" value="'.$result->id.'" >';
                        echo '<input type="submit" value="Delete">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }else {
                    $search_err = "찾으시려는 자료가 존재하지 않습니다";
                }

            } else {
                $user_email_search = trim($_POST["custom_user_search"]);
                $prepared_statement = $wpdb->prepare(
                    "SELECT * FROM $usertable WHERE user_email = %s", $user_email_search);
                
                $results = $wpdb->get_results( $prepared_statement );
                if($results){
                    echo '<h3>Search Results</h3>';
                    echo '<table class="user-table search">';
                    echo '<tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Edit</th>
                        </tr>';
                    foreach($results as $result) {
                        echo '<tr>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_name.'" disabled>';
                        echo '</td>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_address.'" disabled>';
                        echo '</td>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_website.'" disabled>';
                        echo '</td>';
                        echo '<td>';
                        echo '<input type="text" value="'.$result->user_email.'" disabled>';
                        echo '</td>';
                        echo '<td class="table edit">';
                        echo '<span class="user table row edit">Edit</span>';
                        echo '<form action="admin.php?page=user-manage" method="POST" class="row delete">';
                        echo '<input type="hidden" name = "id" value="'.$result->id.'" >';
                        echo '<input type="submit" value="Delete">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }else {
                    $search_err = "찾으시려는 자료가 존재하지 않습니다";
                }

            }
        }
            echo '<div><h3>'.$search_err.'</h3></div>';
    }
?>