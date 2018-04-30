<?php
 DEFINE("LOCALHOST", "localhost");
 DEFINE("USERNAME", "root");
 DEFINE("PASSWORD", "12345");
 DEFINE("DBNAME", "uber");

function login_driver($email, $userpassword)
{

    $conn = new mysqli(LOCALHOST, USERNAME, PASSWORD, DBNAME);
    if ($conn->connection_error){
        $conn->close();
        return "ConnectionFailed";
    }
    $password = check_input_password($userpassword);
    $mail = check_input_password($email);
    
    if($mail == "failed" || $password == "failed")
        return "LoginFailed";
    $sql = "SELECT DRIVER_ID FROM DRIVER WHERE '" . $mail . "' = DRIVER_EMAIL AND '" . $password."' = DRIVER_PASSWORD";
    $result = $conn->query($sql);
    
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $value = retrive_driver_data($row["DRIVER_ID"], $conn); 
        $conn->close();
        return $value;
    }
    $conn->close();
    return "LoginFailed";         
}

function retrive_driver_data($id, $conn)
{
    
    $sql ="SELECT C.CUSTOMER_FIRST_NAME,C.CUSTOMER_LAST_NAME,D.DRIVER_FIRST_NAME,D.DRIVER_LAST_NAME,
    R.PICK_UP_LATITUDE,R.PICK_UP_LONGITUDE,R.DROP_OFF_LATITUDE,R.DROP_OFF_LONGITUDE,R.DISTANCE,car_type.PRICE_PER_MILE
    FROM ride AS R,customers AS C,  
    driver As D
    inner join CAR on car.LICENSE_PLATE_NUMBER = D.CAR_LICENSE_PLATE_NUMBER
    inner join car_type on car.CAR_CATEGORY_ID = car_type.CATEGORY_ID
    WHERE $id = R.RIDE_DRIVER_ID AND $id =D.DRIVER_ID AND R.RIDE_CUSTOMER_ID = C.CUSTOMER_ID;";
    $result = $conn->query($sql);
 
    return $result;
}
function check_input_password($var){
    $check = true;
    for($i = 0; $i < strlen($var); $i++){
        if( $var[$i] == ';' || $var[$i] =="'" ||$var[i] == "="){
             $check = false;
        }
    }
    
    if($check){
        return $var;
    }   
    return "failed";
}


?>