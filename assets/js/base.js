getProductList(); 
var insertId = 0;
$("#generateInv").click(function() {
  var itemData = [];
  var discount = parseFloat($('#inputDiscount').val());
  var subTotalExcTax = parseFloat($("#subTotalExcTax").text());
  var subTotalIncTax = parseFloat($("#subTotalIncTax").text());
  var total = parseFloat($("#total").text());
  var insertId = ($('#hidId').attr('data-id')).trim();
  var selectedValue = 1;
    if ($('input[name="discountRadios"]:checked').length > 0) {
      selectedValue = $('input[name="discountRadios"]:checked').val();  
    } 
  itemData.push(subTotalExcTax);
  itemData.push(subTotalIncTax);
  itemData.push(discount);
  itemData.push(selectedValue);
  itemData.push(total);
  itemData.push(insertId);
  $.ajax({
    url: "generateinv.php",
    type: "POST",
    data: {
      itemData:itemData
    },
    dataType: "json",
    success: function(data) {

      if(data.status == "200") {
        $('#inputName').val("");
        $('#inputQty').val("");
        $('#inputPrice').val("");
        generateList(data);

      }else{
      

      }      
    }

  });
  window.location.href = 'generate-invoice.php?d='+insertId;
});
$("#add").click(function() {
  var itemData = [];
  
  var itemName = ($('#inputName').val()).trim();
  var qty =  ($('#inputQty').val()).trim();
  var price =  ($('#inputPrice').val()).trim();
  var tax =  ($('#selectTax').val()).trim();
  var insertId = ($('#hidId').attr('data-id')).trim();
  if(itemName==""){
    $("#errorItem").show();
        $('#msg').html("Itemname should not be blank!");
        $('#inputName').focus();
        setTimeout(function(){
          $("#errorItem").hide();
         },3000);
         return false;
  }else if(qty=="" || qty<=0){
        $("#errorItem").show();
        $('#msg').html("Quantity should not be blank or zero");
        $('#inputQty').focus();
        setTimeout(function(){
          $("#errorItem").hide();
         },3000);
         return false;
  }else if(price=="" || price <=0){
    $("#errorItem").show();
        $('#msg').html("Unit price should not be blank or zero!");
        $('#inputPrice').focus();
        setTimeout(function(){
          $("#errorItem").hide();
         },3000);
         return false;
  }else{
    itemData.push(itemName);
    itemData.push(qty);
    itemData.push(price);
    itemData.push(tax);
    itemData.push(insertId);
    addProduct(itemData);

  }
  
  
});

$("#applyDiscount").click(function() {

  var discount = parseFloat($('#inputDiscount').val());
  var subTotalExcTax = parseFloat($("#subTotalExcTax").text());
  var subTotalIncTax = parseFloat($("#subTotalIncTax").text());
  var taxAmount = subTotalIncTax - subTotalExcTax;
  var total = 0;
  if(discount=="" || isNaN(discount)){
    total = subTotalIncTax;
  }else{
    var selectedValue = 1;
    if ($('input[name="discountRadios"]:checked').length > 0) {
      selectedValue = $('input[name="discountRadios"]:checked').val();  
    } 


    if(selectedValue == 1) {
      if(subTotalExcTax > discount ) {
        total = (subTotalExcTax - discount) + taxAmount;
      }else{
        $("#error").show();
        $('#inputDiscount').focus();
        setTimeout(function(){
          $("#error").hide();
         },3000);
         total = subTotalIncTax;
      }
      
    }else{
      if(discount>100){
        $("#error").show();
        $('#inputDiscount').focus();
        setTimeout(function(){
          $("#error").hide();
         },3000);
         total = subTotalIncTax;
      }else{
        var discamount = subTotalExcTax * discount/100;
        total = (subTotalExcTax - discamount) + taxAmount;
      }
      
    }

  }
  
  $('#total').html(total.toFixed(2));

});

function addProduct(itemData){
  $.ajax({
    url: "save.php",
    type: "POST",
    data: {
      itemData:itemData
    },
    dataType: "json",
    success: function(data) {

      if(data.status == "200") {
        $('#inputName').val("");
        $('#inputQty').val("");
        $('#inputPrice').val("");
        generateList(data);

      }else{
      

      }      
    }

  });

}

$("#table").on('click','.remrow',function(){
  var rowID = $(this).attr('data-id');
  $(this).parent().parent().remove(); 
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: {
        id:rowID
      },
      dataType: "json",
      success: function(data) {     
        getProductList(); 
      }

    });
  });

function getProductList(){
  $.ajax({
    url: "product-list.php",
    type: "POST",
    dataType: "json",
    success: function(data) {

      if(data.status == "200") {
        generateList(data);
      }else{
      

      }      
    }

  });
}

function generateList(data){

  $('#table tbody>tr').remove();
  var i = 1;
  var subTotalExcTax  = subTotalIncTax = 0;
  var taxSum = 0;
  $.each(data.result, function(key,element){
    $('#hidId').attr('data-id',element['mstId']);
    var itemTotal = (parseFloat(element['qty']) * parseFloat(element['price']));
    subTotalExcTax = subTotalExcTax + itemTotal;
    taxSum = taxSum + parseFloat(element['tax']);
    var data="<tr><th scope='row'>"+i+"</th>";
        data +="<td>"+element['name']+"</td>";
        data +="<td style='text-align:right;'>"+element['qty']+"</td>";
        data +="<td style='text-align:right;'>$."+element['price']+"</td>";
        data +="<td style='text-align:right;'>"+element['tax']+"</td>";
        data +="<td style='text-align:right;'>"+itemTotal.toFixed(2)+"</td>";
        data +="<td><button type='button' data-id ='"+element['id'] +"' class='btn btn-danger remrow'>Remove</button></td>";
        $('#table').append(data);
      i++;    
  });
  subTotalIncTax =  subTotalExcTax + taxSum;
  $('#subTotalExcTax').html(subTotalExcTax.toFixed(2));
  $('#subTotalIncTax').html(subTotalIncTax.toFixed(2));
  $('#total').html(subTotalIncTax.toFixed(2));

}

$(".numericOnly").keypress(function (e) {
  if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
  });

  $(".rateOnly").keypress(function (event) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) &&
  ((event.which < 48 || event.which > 57) &&
    (event.which != 0 && event.which != 8))) {
  event.preventDefault();
}

var text = $(this).val();

if ((text.indexOf('.') != -1) &&
  (text.substring(text.indexOf('.')).length > 3) &&
  (event.which != 0 && event.which != 8) &&
  ($(this)[0].selectionStart >= text.length - 2)) {
  event.preventDefault();
}
});