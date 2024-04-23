<?php
    session_start();

    $_SESSION=[];

    header('Location: '.dirname($_SERVER['PHP_SELF']));



?>