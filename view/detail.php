<?php 
    include "../model/conn.php";
    include "../php/header.php";
    $db = new DataBase();
    include "../php/checkCookie.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $checkID = "SELECT * 
        FROM microbits
        WHERE microbit_id = '$id'";
        $num = $db->num( $checkID);
        if($num == 0){
            header("Location: dashboard.php");
        }else{
            $sqlcheck = $db->send( $checkID);
            $row = $sqlcheck->fetch_assoc();
            if($row['microbit_owner'] != $_COOKIE['user-id']){
                header("Location: dashboard.php");
            }
        }
    }else{
        header("Location: dashboard.php");
    }
?>
    <div id="wr-header">
        <div id="header-1" class="container justify-content-between d-flex">
            <img id="logo" src="../icon.png" alt="logo">
            <div class="mobile-look">
                <strong>SMART GARDEN PROJECT - TEAM A</strong>
            </div>

            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Tài Khoản
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="info.php">Thông tin</a></li>
                        <li><a class="dropdown-item" href="login.php?logout=true">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="wr-body" class="container">
    </div>