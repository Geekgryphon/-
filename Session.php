<?php 

// echo session_id();

function CheckLoginState(){
    if($_SESSION["username"] == NULL){
        header("Location: 登入頁");
    }
}

function Login(){
    if( 1 == 1){ // 有符合的資料
        Session_init();
        header("Location: 登入後首頁");
    }else{
        echo "錯誤訊息";
    }
}

function Session_init(){
    ini_set("session.cookie_httponly", 1);
    ini_set("session.cookie_secure", 1); 
    ini_set("session.use_strict_mode", 1); 
    ini_set('session.gc_maxlifetime', 1800);

    session_start();
    $_SESSION['username'] = '使用者的名字';
    $_SESSION['role'] = array('權限1','權限2');
}

function LogOut(){
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600);
    header("Location: 登入頁");
}


?>