<!DOCTYPE html>
<?php 
if(!isset($_GET["key"])){
    header("Location:/login.php");
}
else{
    $username=$_GET["uname"];
    $key=$_GET["key"];
    $conn =mysqli_connect('127.0.0.1', 'root', '', 'distribution_tx'); 
    $query ="SELECT userkey,id_no FROM userkeys WHERE userkey='$key' AND id_no='$username' AND stat='allow'";
    $result=mysqli_query($conn,$query);
    $match=mysqli_num_rows($result)>0? 'yes':'no';
    if($match=="yes"){
    }
    else{
        header("Location:/login.php");
        exit();
    }
    

}
?>
<html>
    <head>
        <title>Statistics</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <title>Page Title</title> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="chart-container">
            <div class="label">
            <label style="border: 1px solid green; color:brown; text-align:right;" for="transformer_type">Transformer</label>
            <select class ="js-example-basic-single" name="cars" id="transformer_type">
                <?php 
                    $conn =mysqli_connect('127.0.0.1', 'root', '', 'distribution_tx'); 
                    $query = sprintf("SELECT tx_id,service_area,power_rating FROM transformer  WHERE id_no='$username'");//WHERE id_no=\'simon\'
                    $result=$conn->query($query);
                    while($rows=$result->fetch_assoc()){
                        echo "<option value=".$rows['tx_id'].">".$rows['tx_id']." ".$rows['power_rating']." ".$rows['service_area']." region";"</option>";//"     
                    }
                    $result->close();
                    
                    $conn->close();       
                ?>
            </select>
            <input type="date" class="label" id=start_date value="date">
            <input type="date" class="label" id=end_date value="date" placeholder=time()>
            <input type="submit" id="submit" value="SUBMIT">
            </div>   
            <div id="graph_title">GRAPH FOR TRANSFORMER <span id="trans_name"></span></div>
            <canvas id="mycanvas"></canvas>
        </div>
        <script type="text/javascript"  src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript"  src="js/Chart.min.js"></script>
        <link href="select2/dist/css/select2.min.css" rel="stylesheet"/>
        <script src="select2/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function(){$(".js-example-basic-single").select2();});
            var interval;
            function get_data(name,date,endt){
                clearInterval(interval);
                $("#trans_name").html(name);
                var start_date=$("#start_date").val();
                var end_date=$("#end_date").val();
                data(name,start_date,end_date);
                interval = setInterval(function(){data(name,start_date,end_date);},20000)
               
            }

            $("#submit").click(function(){
                var transformer= $("#transformer_type").val();
                var start_date=$("#start_date").val();
                var end_date=$("#end_date").val();
                //console.log(start_date);
                var t=transformer.split(" ",1);
                var transformer_name=t[0];
                get_data(transformer_name,start_date,end_date);
            });
            function data(name,date,end){
                $.ajax({
                    url : "/chartjs/followersdata.php?tx_id="+name+"&start_date="+date+"&end_date="+end,
                    type : "GET",
                    success : function(data){
                  console.log(data);

                    var record_id = [];
                    var Current1 = [];
                    var Current2 = [];
                    var Temperature = [];

                    for(var i in data) {
                        record_id.push(data[i].record_id);
                        Current1.push(data[i].Current1);
                        Current2.push(data[i].Current2);
                        Temperature.push(data[i].Temperature);
                    }

                    var chartdata = {
                        labels: record_id,
                        datasets: [
                        {
                            label: "Current1",
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(59, 89, 152, 0.75)",
                            borderColor: "rgba(59, 89, 152, 1)",
                            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
                            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                            data: Current1
                        },
                        {
                            label: "Current2",
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(29, 202, 255, 0.75)",
                            borderColor: "rgba(29, 202, 255, 1)",
                            pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
                            pointHoverBorderColor: "rgba(29, 202, 255, 1)",
                            data: Current2
                        }
                        ]
                    };

                    var ctx = $("#mycanvas");

                    var LineGraph = new Chart(ctx, {
                        type: 'line',
                        data: chartdata
                    });
                    },
                    error : function(data) {

                    }
                });
            }
            
        </script>
    </body>
</html>