<?php
require_once("config.php");
if(isset($_POST)){
    $connectionObj = new DatabaseConnect();
    $connection = $connectionObj ->dbConnect(); 

    $subTotalExcTax =mysqli_real_escape_string( $connection,$_POST['itemData'][0]);
    $subTotalIncTax =mysqli_real_escape_string( $connection,$_POST['itemData'][1]);
    $discount =mysqli_real_escape_string( $connection,$_POST['itemData'][2]);
    $selectedValue =mysqli_real_escape_string( $connection,$_POST['itemData'][3]);
    $total =mysqli_real_escape_string( $connection,$_POST['itemData'][4]);
    $id =mysqli_real_escape_string( $connection,$_POST['itemData'][5]);

    $query = "UPDATE product_invoice_generate 
                SET n_sub_total_exc_tax = '$subTotalExcTax',
                n_sub_total_inc_tax = '$subTotalIncTax',
                n_discount = '$discount',
                n_discount_type = '$selectedValue',
                n_total = '$total',
                n_invoice_generate_flag = '1'
                WHERE n_id = '$id'";
    $getQuery = $connectionObj ->queryExecute($query); 
    
    if($getQuery>0) {
         $connectionObj -> dbClose();
         $response['status'] = '200';
         $response['message'] = 'success';
         $response['result'] = $output;
         
         echo json_encode($response);
    }else{
        $response['status'] = '400';
        $response['message'] = 'failed';
        $response['result'] = '';
        echo json_encode($response);
    }
}else{
    $response['status'] = '400';
    $response['message'] = 'failed';
    $response['result'] = '';
    echo json_encode($response);
}
?>