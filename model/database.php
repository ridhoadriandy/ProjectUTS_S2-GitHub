<?php
    class database {
        var $con;
        function __construct(){
            $this->con = mysqli_connect('localhost','root','','onepage');        
    }

    function tampil() {
        $query = mysqli_query($this->con, "SELECT * FROM user");
        while($d=mysqli_fetch_array($query)){
            $hasil[]=$d;
        }
        return $hasil;
    }

    function tampil2() {
        $query = mysqli_query($this->con, "SELECT * FROM customer");
        while($d=mysqli_fetch_array($query)){
            $hasil[]=$d;
        }
        return $hasil;
    }

    function insert($username, $password, $email) {
        mysqli_query($this->con, "INSERT INTO user values('','$username','$password','$email')");
    }

    function insert2($name, $email, $message) {
        mysqli_query($this->con, "INSERT INTO customer values('','$name','$email','$message',now())");
    }

    function edit($id){
        
        $data = mysqli_query($this->con,"SELECT * FROM user WHERE id ='$id'");
        while ($d=mysqli_fetch_array($data)){
            $hasil[]=$d;
        }
        return $hasil;
    }
    function hapus($id){
        mysqli_query($this->con,"DELETE FROM user WHERE id ='$id' ");
    }

    function hapus2($id){
        mysqli_query($this->con,"DELETE FROM customer WHERE id ='$id' ");
    }

    function update($id,$username,$password,$email){
        mysqli_query($this->con,"UPDATE user Set username = '$username', password = '$password',email = '$email' WHERE id = '$id' ");
    }
}

?>