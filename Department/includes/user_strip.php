<?php
    echo '<div class="user_strip">
    <div class="holder_1">
        <a href="' . BASE_URL_DEPT . '/dashboard.php" class="user_to_dash">
        <i class="fa-solid fa-angle-left"></i>
        </a>    
        <div class="user">
            <img src="' . $pic . '" class="user_image" />
            <h3>' . $fname . ' ' . $lname . '</h3>
        </div>
    </div> 
    <div class="logout_btn_holder">
        <a href="' . BASE_URL . '/logout.php" class="">
            <button class="logout_btn">Logout</button>
                </a>
    </div> 
    </div>';
?>