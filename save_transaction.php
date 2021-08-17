<?php
session_start();
require('db/db_config.php');

if(isset($_POST))
{
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amt = $_POST['amt'];
    $date = date("YYYY-mm-dd");
    $sql = "INSERT INTO TRANSACTIONS (from_cust_id, to_cust_id, transfer_amt, transfer_date) VALUES
    ($from, $to, $amt,$date)";

    if($conn->query($sql)===TRUE)
    {
        $updated_balance = $_SESSION['cust_old_amt']+$amt;
        $update  = "UPDATE CUSTOMERS SET current_balance=$updated_balance where id=$to";
        if($conn->query($update)===TRUE)
        {
            $update_to  = "UPDATE CUSTOMERS AS U1, CUSTOMERS AS U2
            SET U1.current_balance = U2.current_balance-$amt
            WHERE U1.id=$from and U2.id=$from";
            if($conn->query($update_to)===TRUE)
            {
            echo "<script type='text/javascript'>alert('Date Save Successfully');
            window.location = 'allcustomers.php'</script>";
            }else{
                echo "<script type='text/javascript'>alert('Failed to Update From User')</script>";
            }
        }else{
            echo "<script type='text/javascript'>alert('Failed to Update')</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('Failed')</script>";
    }
}
?>