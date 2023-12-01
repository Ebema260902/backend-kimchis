<?php 
    session_start();
    session_destroy();

    //redirect to index page
    header("location: ./homepage.php");
?>