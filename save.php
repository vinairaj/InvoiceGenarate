<?php
require_once("config.php");
if(isset($_POST)){
    $connectionObj = new DatabaseConnect();
    $connection = $connectionObj ->dbConnect(); 
    $name =mysqli_real_escape_string( $connection,$_POST['itemData'][0]);
    $qty =mysqli_real_escape_string( $connection,$_POST['itemData'][1]);
    $price =mysqli_real_escape_string( $connection,$_POST['itemData'][2]);
    $tax =mysqli_real_escape_string( $connection,$_POST['itemData'][3]);
    $insertId =mysqli_real_escape_string( $connection,$_POST['itemData'][4]);
    $taxAmount = $qty * $price * $tax /100;
    if($insertId==0){
        $query = "INSERT INTO product_invoice_generate(n_sub_total_exc_tax,n_sub_total_inc_tax,n_discount,n_discount_type,n_total,n_invoice_generate_flag) 
              VALUES('0.00','0.00','0.00','1','0.00','0')";
        $insertId = $connectionObj ->queryInsertExecute($query); 
    }
    
    $query = "INSERT INTO products(n_mst_id,c_name,n_quantity,n_price,n_tax_amount) VALUES('$insertId','$name','$qty','$price','$tax')";
    $getQuery = $connectionObj ->queryExecute($query); 
    
    if($getQuery>0) {
        $query = "SELECT prod.n_id,prod.n_mst_id,prod.c_name,prod.n_quantity,prod.n_price,prod.n_tax_amount FROM products prod
                    JOIN product_invoice_generate inv ON inv.n_id = prod.n_mst_id
                    WHERE inv.n_invoice_generate_flag='0';";
        $result = $connectionObj ->queryExecute($query); 
        $response = [];
        while($obj = mysqli_fetch_assoc($result)){
            $output[] = [
                'id'=>$obj["n_id"],
                'mstId'=>$obj["n_mst_id"],
                'name'=>$obj["c_name"],
                'qty'=>$obj["n_quantity"],
                'price'=>$obj["n_price"],
                'tax'=>$obj["n_tax_amount"]
            ];
         }
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