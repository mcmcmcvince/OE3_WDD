<?php 
//Initialize variables

$grossPay = $tax = $netPay = 0;
if(!empty("submit")){
    // value pairing

    $id = $_POST["empId"];
    $fname = $_POST["empName"];
    $Hours = $_POST["hoursWork"];
    $rate = $_POST["rate"];

    $grossPay = (int)$rate * (int)$Hours;

    if($grossPay > 25000){
        $tax = $grossPay * 0.12;
        $netPay = $grossPay - $tax;
    }else if ($grossPay <= 25000 && $grossPay >= 15000){
        $tax = $grossPay * 0.10;
        $netPay = $grossPay - $tax;
    }else if ($grossPay < 15000){
        $tax = $grossPay * 0.08;
        $netPay = $grossPay - $tax;
    }

    //for tax rate
    if($grossPay >25000){
        $taxRate = 12;
    }else if ($grossPay <= 25000 && $grossPay >= 15000){
        $taxRate = 10;
    }else if ($grossPay <15000){
        $taxRate = 8;
    }
    include('Course_Registration_Form.html');

    echo'<h2>Salary App Result</h2>';
    
    echo '<table class="center" style="width:75%">
            <tr>
            <th>Employee ID</th>
            <th>Emplyee Name</th>
            <th>Gross Pay</th>
            <th>Tax Rate</th>
            <th>Net Pay</th>
            </tr>';
    echo'<tr>';
        echo'<td style="margin-left: 10px">'.$id.'</td>';
        echo'<td>'.$fname.'</td>';
        echo'<td>'.$grossPay.'</td>';
        echo'<td>'.$taxRate.'</td>';
        echo'<td>'.$netPay.'</td>';
    echo'</tr>';
    echo '</table>';
}

?>
