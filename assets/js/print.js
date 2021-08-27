getProductList();
function getProductList(){
var insertId = ($('#hidId').attr('data-id')).trim();
  $.ajax({
    url: "inv-list.php",
    type: "POST",
    dataType: "json",
    data:{id:insertId},
    success: function(data) {

      if(data.status == "200") {
        generateList(data);
      }else{
      

      }      
    }

  });
}

function generateList(data){

  $('#tableData tbody>tr').remove();
  var i = 1;
  var subTotalExcTax  = subTotalIncTax = 0;
  var taxSum = 0; var discount = 0; var discountType = '';
  var total = 0;
  $.each(data.result, function(key,element){
    discount = (parseFloat(element['discount']));
    discountType = element['discountType'];
    var itemTotal = (parseFloat(element['qty']) * parseFloat(element['price']));
    subTotalExcTax = subTotalExcTax + itemTotal;
    taxSum = taxSum + parseFloat(element['tax']);
    var data="<tr><th scope='row'>"+i+"</th>";
        data +="<td>"+element['name']+"</td>";
        data +="<td style='text-align:right;'>"+element['qty']+"</td>";
        data +="<td style='text-align:right;'>$."+element['price']+"</td>";
        data +="<td style='text-align:right;'>"+element['tax']+"</td>";
        data +="<td style='text-align:right;'>"+itemTotal.toFixed(2)+"</td>";
        $('#tableData').append(data);
      i++;    
  });
  data +="<tr class='list-item total-row'>";
  data +="<th colspan='5' class='tableitem'>SubTotal (Excl Tax)</th>";
  data +="<td data-label='Grand Total' class='tableitem'><span id='subTotalExcTax'></span></td>";
  data +="</tr>";
  data +="<tr class='list-item total-row'>";
  data +="<th colspan='5' class='tableitem'>Discount "+ discountType+"</th>";
  data +="<td data-label='Grand Total' class='tableitem'><span id='discount'></span></td>";
  data +="</tr>";
  data +="<tr class='list-item total-row'>";
  data +="<th colspan='5' class='tableitem'>SubTotal (Inc Tax)</th>";
  data +="<td data-label='Grand Total' class='tableitem'><span id='subTotalIncTax'></span></td>";
  data +="</tr>";
  data +="<tr class='list-item total-row'>";
  data +="<th colspan='5' class='tableitem'>Total Amount</th>";
  data +="<td data-label='Grand Total' class='tableitem'><span id='total'></span></td>";
  data +="</tr>";
  $('#tableData').append(data);
  subTotalIncTax =  subTotalExcTax + taxSum;
  total = subTotalIncTax - discount;
  $('#subTotalExcTax').html('$'+subTotalExcTax.toFixed(2));
  $('#subTotalIncTax').html('$'+subTotalIncTax.toFixed(2));
  $('#total').html('$'+total.toFixed(2));
  $('#invoice_total').html('$'+total.toFixed(2));
  $('#discount').html('$'+discount.toFixed(2) );
  

}
