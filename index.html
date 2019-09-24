
<?php
require('worth.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Net Worth Calculator</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Team Deimos: NET WORTH CALCULATOR</h3>
   <br />
   <h4 align="center">Enter Asset Details</h4>
   <br />
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
        <th>Select Assets Name</th>
       <th>Enter Value</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
    </div>
    <br>
   <hr>
   <br>
   <h4 align="center">Enter Laibility Details</h4>
    <div class="table-repsonsive">
     <span id="error1"></span>
     <table class="table table-bordered" id="liability_table">
      <tr>
        <th>Select Laibility Name</th>
       <th>Enter Value</th>
       <th><button type="button" name="add1" class="btn btn-success btn-sm add1"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <span>Your Current Net Worth $:</span> <span><label type="radio" id="result" class="result" name="net_worth"></label></span>
     <div align="center">
      <input type="" name="calculator" class="btn btn-info cal-btn" value="Calculate" />&nbsp &nbsp<span><input type="submit" name="submit" class="btn btn-info" value="Save" /></span>
     </div>
    </div>
   </form>
  </div>
  <script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  let html = '';
  html += '<tr>';
  html += '<td><select name="assets_unit[]" class="form-control assets_unit"><option value="">Select Unit</option><?php echo fill_assets_select_box($connect); ?></select></td>';
   html += '<td><input type="text" name="assets_name[]" class="form-control assets_name" data-asset="" placeholder="Assets value"/></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
$(document).ready(function(){
  $(document).on('click', '.add1', function(){
  let html = '';
  html += '<tr>';
  html += '<td><select name="liability_unit[]" class="form-control liability_unit"><option value="">Select Laibility Unit</option><?php echo fill_liability_select_box($connect); ?></select></td>';
   html += '<td><input type="text" name="liability_name[]" class="form-control liability_name" data-liable="" placeholder=" Laibility value"/></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#liability_table').append(html);
 });
 
 $(document).on('click', '.remove1', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  let error = '';
  $('.assets_name').each(function(){
   let count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter value at row "+count+"</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.liability_name').each(function(){
   let count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at row "+count+"</p>";
    return false;
   }
   count = count + 1;
  });

  const form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
    });
  });
});
</script>
<!-- net worth calculator -->
<script>

  $(document).on('click', '.cal-btn', function(){
  const lia = $('input[name^=liability_name]').map(function(idx, elem) {
    return $(elem).val();
  }).get();

  const ass = $('input[name^=assets_name]').map(function(idx, elem) {
    return $(elem).val();
  }).get();

let totalAss = 0;
  for(let i = 0; i < ass.length; i++) {
    totalAss += ass[i] << 0;
}

let totalLia = 0;
 for(let i = 0; i < lia.length; i++) {
  totalLia += lia[i] << 0;
}
  let Nworth = totalAss - totalLia;
  $('#result').html(Nworth)
  return Nworth;

});

</script>
 </body>
</html>
