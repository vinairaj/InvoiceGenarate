<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
<h3>
  Product Add
</h3>
<div class="row" id="errorItem" style="display:none;">
    <div class="col-8 col-md-12" style="text-align:left;color:red;"><span id="msg"></span></div>
</div>
<form>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Item Name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputQty">Quantity</label>
      <input type="text" class="form-control numericOnly" id="inputQty" placeholder="Quantity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPrice">Unit Price</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control rateOnly" id="inputPrice" placeholder="Unit Price">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="selectTax">Tax</label>
      <select class="form-control" id="selectTax">
        <option value="0">0%</option>
        <option value="1">1%</option>
        <option value="5">5%</option>
        <option value="10">10%</option>
      </select>
    </div>
  </div>
  <button type="button" class="btn btn-primary" id="add">Add</button>
</form>


<h3>
  Product List
</h3>
  <table class="table table-bordered" id="table">
  <thead>
    <tr>
      <th scope="col">Slno</th>
      <th scope="col">Name</th>
      <th scope="col" style='text-align:right;'>Quantity</th>
      <th scope="col" style='text-align:right;'>Unit Price</th>
      <th scope="col" style='text-align:right;'>Tax Amount</th>
      <th scope="col" style='text-align:right;'>Total</th>
      <th scope="col">Action</th>
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
      <td><button type="button" class="btn btn-danger">Remove</button></td>
    </tr>
  </tbody>
</table>
<div class="row">
    <div class="col-12 col-md-10" style="text-align:right;">SubTotal (Excl Tax)</div>
    <div class="col-6 col-md-2" style="text-align:right;"><b>$<span id="subTotalExcTax"></span></b></div>
</div>
<hr>
<div class="row">
    <div class="col-8 col-md-10" style="text-align:right;">Discount 
    <div class="form-check" style="width: 100%;">
  <input class="form-check-input" type="radio" name="discountRadios" id="radioamount" value="1" checked>
  <label class="form-check-label" for="discountRadios">
    as Amount
  </label>
</div>
<div class="form-check" style="width: 95.3%;">
  <input class="form-check-input" type="radio" name="discountRadios" id="radioPer" value="2">
  <label class="form-check-label" for="discountRadios">
    as %
  </label>
</div>
    </div>
    <div class="col-2 col-md-1"><input type="text" id="inputDiscount" class="form-control rateOnly" /></div>
    <div class="col-2 col-md-1"><button type="button" class="btn btn-primary" id="applyDiscount">Apply</button></div>
</div>
<div class="row" id="error" style="display:none;">
    <div class="col-8 col-md-10" style="text-align:right;color:red;">Discount should not be greater than SubTotal (Excl Tax)</div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-10" style="text-align:right;">SubTotal (Inc Tax)</div>
    <div class="col-6 col-md-2" style="text-align:right;"><b>$<span id="subTotalIncTax"></span></b></div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-10" style="text-align:right;"><h5>Total Amount</h5></div>
    <div class="col-6 col-md-2" style="text-align:right;"><h4>$<span id="total"></span></h4></div>
</div>
<div class="row">
    <div class="col-12 col-md-12" style="text-align:right;"><button type="button" class="btn btn-success" id="generateInv">Generate Invoice</button></div>
</div>
</div>
<input type="hidden" id='hidId' data-id="0" value="0"/>
<script>
  var insertId = 0;
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="assets/js/base.js"></script>
</html>