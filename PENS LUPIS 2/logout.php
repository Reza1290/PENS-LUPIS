<?php 
    session_start();
    $_SESSION=[];
    session_unset();
    session_destroy();

    setcookie('id', '', time() - 3600 );
    setcookie('key', '', time() - 3600 );

    echo '<script>window.location="login.php"</script>';

?>