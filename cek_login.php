<?php 
// mengaktifkan session pada php
    session_start();
    
    // menghubungkan php dengan koneksi database
    include 'koneksi.php';
    
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);
    
    // cek apakah username dan password di temukan pada database
    if($cek > 0){
    
        $data = mysqli_fetch_assoc($login);
    
        // cek jika user login sebagai admin
        if($data['role_user']=="admin"){
    
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role_user'] = "admin";
            // alihkan ke index dashboard admin
            header("location:content_index/index_admin.php");
            
        // cek jika user login sebagai pegawai
        }else if($data['role_user']=="guru"){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role_user'] = "guru";
            // alihkan ke index dashboard pegawai
            header("location:content_index/index_guru.php");
                
        // cek jika user login sebagai pengurus
        }else if($data['role_user']=="siswa"){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['role_user'] = "siswa";
            // alihkan ke index dashboard pengurus
            header("location:content_index/index_siswa.php");
            
        }else{
    
            // alihkan ke index login kembali
            header("location:index.php?pesan=gagal");
        }	
    }else{
        header("location:index.php?pesan=gagal");
    }
 
?>