<?php
	session_start();
	if(!$_SESSION['userId']){
		header("Location: index.php"); /* Redirect browser */
		exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Conversion</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

</head>

<body>

<div class="row-fluid">
  <div class="control-group">
    <label class="control-label">From</label>
    <div class="controls">
		<select name="fromCurrency" class="fromCurrency">
		</select>

    </div>
  </div>
  <div class="control-group">
    <label class="control-label">TO</label>
    <div class="controls">
		<select name="toCurrency" class="toCurrency">
		</select>
    </div>
  </div>
  
  
  <div class="control-group">
    <div class="controls">      
		<input type="text" name="currency" id="currency" placeholder="Enter currency" />
	</div>
  </div>

  <div class="control-group">
    <div class="controls">      
		<button class="convert">Convert</button> &nbsp; &nbsp; ConversionResult : <span class="conversionResult"></span>
    </div>
	
  </div>
  
  
  <div class="control-group">
    <div class="controls">      
		<a href="currencyList.php" class="btn">Currency Management</a>
    </div>
  </div>
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
function addrow(result){
	return "<option value='"+result.rate+"' data-code='"+result.code+"'>"+result.name+" -- "+result.rate+"</option>";
}

			
	$(document).ready(function(){
        $.get('api/getCurrency.php',function(result){
			console.log(result);
			result = $.parseJSON(result);
			$output = '';
			for(var i=0; i< result.length; i++){
				$output += addrow(result[i]);
			}		
			console.log($output);
			$('.fromCurrency').html($output);			
			$('.toCurrency').html($output);

		});
		
		$('.convert').click(function(){
			var fromCurrency = $('.fromCurrency').val();
			var toCurrency = $('.toCurrency').val();			
			var currency = $('#currency').val();
			
			$('.conversionResult').html((currency*fromCurrency)*toCurrency);

		});
		
	});
</script>
</body>
</html>
