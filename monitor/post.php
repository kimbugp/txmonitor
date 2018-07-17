<?php
$myfile="testfile.csv";
$post = trim(file_get_contents("php://input"));
$content=urldecode($post);

//getting message and time
$array = explode('&', $content);
    //message
$smsget=$array[1];
$smsvalue = explode('=', $smsget);
$message=$smsvalue[1];
    //date
$dateget=$array[2];
$datevalue=explode('=',$dateget);
$time=$datevalue[1];
file_put_contents($myfile,$time,FILE_APPEND);


$smsarray = explode(' ', $message);
$final_array = array();

foreach($smsarray as $value){
    $value_array = explode(':', $value);
    array_push($final_array, $value_array);
}
$Tx_id = $final_array[0][1];
$Voltage = $final_array[1][1];
$Current1 = $final_array[2][1];
$current2 = $final_array[3][1];
$Temperature = $final_array[4][1];
file_put_contents($myfile,$Tx_id,FILE_APPEND);
$conn =mysqli_connect('127.0.0.1', 'root', 'k', 'distribution_tx'); 
if (!$conn){
    ?>
    <script>console.log("connection failure")</script>

    <?php
}
$query = sprintf("INSERT INTO records (Tx_id, Time_received, Voltage, Current1, Current2, Temperature) VALUES ('$Tx_id', '$time', '$Voltage', '$Current1', '$current2', '$Temperature')");
                
if($conn->query($query) === TRUE){
    ?>
    <script>console.log("success")</script>
    <?php
}
else{
    ?>
    <script>console.log("failure")</script>

    <?php
}

?>