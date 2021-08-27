<?php
if(isset($_GET['d'])) {
    $id = $_GET['d'];
}else{
    $id = "0";
}
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="assets/css/print.css" />
</head>
<body>
<div class="container">
  <div id="invoiceholder">
  <div id="invoice" class="effect2">
    
    <div id="invoice-top">
      <div class="logo"><img src="assets/image/logo.png" alt="Logo" /></div>
      <div class="title">
        <h1>Invoice #<span class="invoiceVal invoice_num">Test-12345</span></h1>
        <p>Invoice Date: <span id="invoice_date"><?php echo date('d-M-Y'); ?></span>
        </p>
      </div>
    </div>

    <div id="invoice-mid">   
      <div id="message">
        <h2>Hello User,</h2>
        <p>An invoice with invoice number #<span id="invoice_num">Test-12345</span> is created.</p>
      </div>
        <div class="clearfix">
            <div class="col-left">
                <div class="clientlogo"><img src="assets/image/card.png" alt="Sup" /></div>
                <div class="clientinfo">
                    <h2 id="supplier">TEST User</h2>
                    <p><span id="address">Little House, 48</span><br><span id="city">Chakkarakattu Road</span><br><span id="country">Perumbavoor</span> - <span id="zip">686142</span></p>
                </div>
            </div>
            <div class="col-right">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><span>Invoice Total</span><label id="invoice_total">61.2</label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>       
    </div><!--End Invoice Mid-->
    
    <div id="invoice-bot">
      
      <div id="table">
      <table class="table table-bordered" id="tableData">
            <thead>
                <tr>
                <th scope="col">Slno</th>
                <th scope="col">Name</th>
                <th scope="col" style='text-align:right;'>Quantity</th>
                <th scope="col" style='text-align:right;'>Unit Price</th>
                <th scope="col" style='text-align:right;'>Tax Amount</th>
                <th scope="col" style='text-align:right;'>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td ></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr class="list-item total-row">
                    <th colspan="5" class="tableitem">SubTotal (Excl Tax)</th>
                    <td data-label="Grand Total" class="tableitem"><span id="subTotalExcTax"></span></td>
                </tr>
                <tr class="list-item total-row">
                    <th colspan="5" class="tableitem">Discount</th>
                    <td data-label="Grand Total" class="tableitem">111.84</td>
                </tr>
                <tr class="list-item total-row">
                    <th colspan="5" class="tableitem">SubTotal (Inc Tax)</th>
                    <td data-label="Grand Total" class="tableitem"><span id="subTotalIncTax"></span></td>
                </tr>
                <tr class="list-item total-row">
                    <th colspan="5" class="tableitem">Total Amount</th>
                    <td data-label="Grand Total" class="tableitem"><span id="total"></span></td>
                </tr>
            </tbody>
        </table>
      </div><!--End Table-->
    </div><!--End InvoiceBot-->
    <footer>
      <div id="legalcopy" class="clearfix">
        <p class="col-right">Our mailing address is:
            <span class="email"><a href="mailto:support@mycompany.com">support@mycompany.com</a></span>
        </p>
      </div>
    </footer>
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
<input type="hidden" id='hidId' data-id="<?php echo $id;?>" />
 </div> 
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="assets/js/print.js"></script> 

</body>