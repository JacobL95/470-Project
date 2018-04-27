<?php



function connection_failed()
{
    readfile('connection_error_customer.html');
}

function login_failed()
{
    readfile('login_error_customer.html');
   
}

function table_head($var = null)
{
    if($var == null)
        $name = " BLANK ";
    
    else
        $name = $var;
    return '
<html>
<head>
</head>
<body style="background-color:gray; width: 1298px; height: 355px; position: absolute;">
    <p class="auto-style1" style">
<!-- This is the link for the below image https://www.thepearlpost.com/wp-content/uploads/2017/12/UBER_1.jpg-->
<img alt="Image result for uber" src="UBER_1.jpg" style="margin:auto; width:200sx;display:block" ></p>
    <h2 align="center">Welcome '.$name.'!</h2>
    <table id="myTable" class="display" style="width:100%">
    <thead>
      <tr>
        <th style="width:10%;" align= "left">Customer Name</th>
        <th style="width:10%;" align= "center">Pick up latitude</th>
        <th style="width:10%;" align= "center">Pick up longitude</th>
        <th style="width:10%;" align= "center">Drop off latitude</th>
        <th style="width:10%;" align= "center">Drop off longitude</th>
        <th style="width:10%;" align= "center">Distance</th>
        <th style="width:5%;"  align= "right">Cost</th>
      </tr>
      </thead>
      <tbody>
      ';
}
function table_ending(Type $var = null)
{
   return' 
   </tbody>
          <tfoot>
            <tr>
                <th style="width:10%;" align= "left">Customer Name</th>
                <th style="width:10%;" align= "center">Pick up latitude</th>
                <th style="width:10%;" align= "center">Pick up longitude</th>
                <th style="width:10%;" align= "center">Drop off latitude</th>
                <th style="width:10%;" align= "center">Drop off longitude</th>
                <th style="width:10%;" align= "center">Distance</th>
                <th style="width:5%;"  align= "right">Cost</th>
            </tr>
          </tfoot>
          </table>
          <script type="text/javascript" src="jquery-3.3.1.js"></script>
          <script type="text/javascript" src="script.js"></script>
          <link rel="stylesheet" type="text/css" href="Datatables/datatables.min.css"/> 
           <script type="text/javascript" src="Datatables/datatables.min.js"></script>
           </body>
           </html>';
}
 

?>