<?php
header('Content-Type:application/json');
//database
if(isset($_GET["tx_id"])){
    $tx_id=$_GET["tx_id"];
    $start_date=$_GET["start_date"];
    $end_date=$_GET["end_date"];


}
// else{
//     $tx_id="TX1";
// }

$conn =mysqli_connect('127.0.0.1', 'root', '', 'distribution_tx'); 

if (!$conn){
    ?>
    <script>console.log("connection failure")</script>

    <?php
}

$query = sprintf("SELECT tx_id,record_id, Voltage, Current1, Current2, Temperature FROM records WHERE tx_id=\"$tx_id\" AND Time_received>=\"$start_date\" AND Time_received<=\"$end_date\"");//AND Time_received>=\"$start_date\" AND Time_received<=\"$end_date\"
$result=$conn->query($query);
$data=array();
foreach($result as $row){
    $data[]=$row;
}           
//free memory associayed with result
$result->close();

//close connection
$conn->close();

//print the data
print json_encode($data);
?>