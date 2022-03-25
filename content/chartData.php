<?php
header('Content-Type: application/json');
include '../connect_db.php';
$queryRevenuMonth = mysqli_query($con, "SELECT MONTH(dateTime), `totalMoney`  FROM `sales` ORDER BY `sales`.`dateTime` ASC");
    $RevenuMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    // var_dump($th1);exit;
    while($row = mysqli_fetch_array($queryRevenuMonth)) {
        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $row['totalMoney'];
            $th1 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $row['totalMoney'];
            $th2 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $row['totalMoney'];
            $th3 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $row['totalMoney'];
            $th4 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $row['totalMoney'];
            $th5 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $row['totalMoney'];
            $th6 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $row['totalMoney'];
            $th7 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $row['totalMoney'];
            $th8 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $row['totalMoney'];
            $th9 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $row['totalMoney'];
            $th10 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $row['totalMoney'];
            $th11 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $row['totalMoney'];
            $th12 ? : 0;
        }
    }
    $RevenuMonth = array(
        'Th1' => $th1, 
        'Th2' => $th2, 
        'Th3' => $th3, 
        'Th4' => $th4, 
        'Th5' => $th5, 
        'Th6' => $th6, 
        'Th7' => $th7, 
        'Th8' => $th8, 
        'Th9' => $th9, 
        'Th10' => $th10, 
        'Th11' => $th11, 
        'Th12' => $th12
    );
    echo json_encode($RevenuMonth);
    // $label = array();
    // $result = array();
    // foreach($RevenuMonth as $key => $value)  {
    //     $label.push($key);
    //     $result.push($value);
    // }
    // echo $label;

?>
