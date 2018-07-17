<?php
$conn =mysqli_connect('127.0.0.1', 'root', '', 'distribution_tx'); 
if(isset($_GET["uname"])){
    $username=$_GET["uname"];
    $password=$_GET["psw"];
    $query ="SELECT id_no FROM personnel WHERE id_no='$username' AND psw='$password'";
    $result=mysqli_query($conn,$query);
    $match=mysqli_num_rows($result)>0? 'yes':'no';
    if($match=="no"){
        header("Location:/login.php");
    }
    else{
        $key=md5(microtime().rand());
        $query ="INSERT INTO userkeys (userkey,id_no,stat) VALUES ('$key','$username','allow')";
        if($conn->query($query) === TRUE){
            ?>
            <script>console.log("success")</script>
            <?php
        }
        $conn->close();     
        $url="/chartjs/linegraph.php?key=$key&uname=$username";
        header("Location:$url");
        exit();
    }
}
else if(isset($_GET["logout"])){
    $key=$_GET["logout"];
    $query ="UPDATE userkeys SET stat =false WHERE userkeys.userkey = '$key'";
        if($conn->query($query) === TRUE){
            ?>
            <script>console.log("success")</script>
            <?php
        }
        $conn->close(); 
        header("Location:/login.php");
        exit();
     
}
?>