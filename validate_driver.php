    
    <?php include "utility_driver.php";
          include 'page_layout_driver.php';
        
        $name = $_POST['login'];
        $password = $_POST['password'];
        $result =  login_driver($name,$password);


        switch ($result){

          case "ConnectionFailed":
            connection_failed();
            break;

          case "LoginFailed"://No matching driver email and password
            login_error();
            break;
            
          default: //Driver has login and return data.
            $row = $result->fetch_assoc();
            echo table_head($row['DRIVER_FIRST_NAME']." ".$row['DRIVER_LAST_NAME']);
            $result->data_seek(0);
            while($row = $result->fetch_assoc())
            {
                echo '
                <tr>
                  <td style="width:10%;" align= "left">'.  $row["CUSTOMER_FIRST_NAME"]." ".$row["CUSTOMER_LAST_NAME"].'</td>
                  <td style="width:10%;" align= "center">'.$row["PICK_UP_LATITUDE"].'</td>
                  <td style="width:10%;" align= "center">'.$row["PICK_UP_LONGITUDE"].'</td>
                  <td style="width:10%;" align= "center">'.$row["DROP_OFF_LATITUDE"].'</td>
                  <td style="width:10%;" align= "center">'.$row["DROP_OFF_LONGITUDE"].'</td>
                  <td style="width:10%;" align= "center">'.$row["DISTANCE"].'</td>
                  <td style="width:5%;"  align= "right">'. $row["DISTANCE"] * $row["PRICE_PER_MILE"].'</td>
                </tr>';
              }
            echo table_ending(); 
        break;
        }      
    ?>