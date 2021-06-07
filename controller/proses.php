<?php
    include "../model/database.php";
    $db = new database();

    $aksi = $_GET['aksi'];
    

    if ($aksi == "tambah") {
        $db->insert($_POST['username'],md5($_POST['password']),$_POST['email']);
        header("Location:../view/tables.php");
    }

    elseif ($aksi == "tambah2") {
        $db->insert2($_POST['name'],$_POST['email'],$_POST['message']);
        header("Location:../view/home.php");
    }

    elseif($aksi == "tambahuser") {
        if($_POST['password'] == $_POST['password2']) {
            $db->insert($_POST['username'],md5($_POST['password']),$_POST['email']);
            session_start();
            $_SESSION['username'] = $_POST['username'];
            header("Location:../view/home.php");
        }

        else{
            session_start();
            $_SESSION['error'] = true;
            header("Location:../view/register.php");
        }
    }

    elseif($aksi == "edit"){
        $db->update($_POST['id'],$_POST['username'],md5($_POST['password']),$_POST['email']);
        header("Location:../view/tables.php");
    }

    elseif($aksi == "hapus"){
        $db->hapus($_GET['id']);
        header("Location:../view/tables.php");
    }

    elseif($aksi == "hapus2"){
        $db->hapus2($_GET['id']);
        header("Location:../view/admin.php");
    }

    elseif($aksi == "login"){
        if($_POST['username'] == "Admin") {
            header("Location:../view/admin.php");
        }
        
        else {
            session_start();
            foreach ($db->tampil() as $u ) {
                if($_POST['username'] == $u['username'] && md5($_POST['password']) == $u['password']) {
                    $_SESSION['email'] = $u['email'];
                    $_SESSION['username'] = $u['username'];
                    header("Location:../view/home.php");
                    break;
                }

                else {
                    $_SESSION['error'] = "true";
                    header("Location:../view/index.php");
                }
            }
        }
    }

    elseif($aksi == "logingoogle") {
        include("../config/config.php");
            if(isset($_SESSION['acces_token'])){
                $google_client->setAccessToken($_SESSION['access_token']);
            }
            elseif (isset($_GET['code'])) {
                $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
                $_SESSION['access_token'] = $token;
            }

            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo_v2_me->get();
            $_SESSION['email'] = $data['email'];
        
            

        foreach ($db->tampil() as $u ) {
            if($_SESSION['email'] == $u['email']) {
                $_SESSION['username'] = $u['username'];
                header("Location:../view/home.php");
                break;
            }

            else {
                header("Location:../view/register.php");
            }
        }
    }

    elseif($aksi == "refresh") {
        session_start();
        $_SESSION['email'] = '';
        $_SESSION['error'] = '';
        header('location:../view/register.php');
    }
?>