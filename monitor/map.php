<!doctype html>
<?php  ?>
<html class="no-js" lang="en"> 
  <meta charset="utf-8">
  <title>Multiple Markers from JSON</title>
  <link rel="stylesheet" href="style.css">
  <style>
            body{
                font-size: 15px;
                background-color:azure;
                font-family: Arial, Helvetica, sans-serif;
            }
            .chart-container{
                margin: auto;
                widows: 1;
                height:auto;
                width:20cm;
            }
            .label{
                margin: 10px auto 50px auto;
                text-align: center;
                align-content: center;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                /* background-color: brown; */
                color:brown;
            }
            #graph_title {
                text-align: center;
                color: brown;
                margin: 0px 0px 10px 0px;
                font-size: 200%;
                background-color: #4CAF50;
                color: white;
            }
            #tranformer_list{
                list-style: none;
                position: relative;
                bottom:0px;
                /* border: 1px solid red; */
                margin: 0px auto 0px auto;
                font-size: 80%;
                height: auto;
                width: 120px;
                text-align: right;
            }
            #tranformer_list li{
                border: 1px solid grey;
            }
            .title{
                /* align-content: center; */
                font-size: 200%;
                text-align: center;
                /* table-layout: auto; */
                background-color: #4CAF50;
                color: white;
                /* padding: 14px 20px; */
                /* margin: 8px 0; */
                border: none;
                /* width: 100%; */
            }
            #submit{
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
                margin: 8px 0;
                border: none;
            }
            .selection{
                background-color:#4CAF50;
                color: white;
                cursor: pointer;
                margin: 8px 0;
                border: none;
            }
            .button{
                /* align-content: center; */
                /* font-size: 200%; */
                text-align: left;
                /* table-layout: auto; */
                background-color: #4CAF50;
                color: white;
                /* padding: 14px 20px; */
                /* margin: 8px 0; */
                border: none;
                /* width: 100%; */
            }
    </style>
    <div class="button">
        <input class=button value="HOME" type="button" onClick="window.location='/login.php'"></a>            
        <input class=button value=LOGOUT type="button" onClick="window.location='/action_page.php?logout=<?php $key=$_GET["key"]; echo $key;?>'"></a>
        <input class=button value="TRANSFORMER MAP" type="button" onClick="window.location='/monitor/map.php?key=<?php $key=$_GET["key"]; echo $key;?>'"></a>
    </div> 
    </head>
    <body>
        <div class="title">TRANSFORMER MONITORING PLATFORM</div>
</head>
<body>
    <script>
        var json=<?php
            require("credentials.php");
            $conn =mysqli_connect('127.0.0.1', $username,$password,$database); 

            if (!$conn){
                ?>
                <script>console.log("connection failure")</script>

                <?php
            }

            // Select all the rows in the markers table
            $query = sprintf("SELECT tx_id,lat,lng,service_area FROM transformer");
            $result=$conn->query($query);
            $data=array();
            foreach($result as $row){
                $data[]=$row;
            }           
            $result->close();


            $conn->close();

            //print the data
            echo json_encode($data);?></script> 
  <div id="map"></div>
  <script src="map.js"></script>
  <script src="main.js"></script>