<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Currency List</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>

<body>

<table class="currencyList table">
	
</table>

<button class="addNewCurr"> Add new Currency</button>
<div style="display:none;">
	<input type="text" name="code" id="code"/>
		<input type="text" name="name" id="name"/>
			<input type="text" name="rate" id="rate"/>
	<div class="btn addCurrValue" >Add</div>
	<div class="btn resetCurrValue">Reset</div>
</div>
<div id="error" ></div>
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>

<script type="text/javascript">
function addrow(result){
	return "<tr><td>"+result['code']+"</td><td>"+result['name']+"</td><td>"+result['rate']+"</td></tr>";
}

function clearForm(){
	$('#code').val('');
	$('#name').val('');
	$('#rate').val('');	
}
			
	$(document).ready(function(){
        $.get('api/getCurrency.php',function(result){
			console.log(result);
			result = $.parseJSON(result);
			$output = '';
			for(var i=0; i< result.length; i++){
				$output += addrow(result[i]);
			}		
			$('.currencyList').html($output);
		});
		
		
		$('.addNewCurr').click(function(){
			$(this).next().show();
		});
		
		$('.resetCurrValue').click(function(){
			clearForm();				
		});
		
		$('.addCurrValue').click(function(){
			var params = {}
			params['code'] = $('#code').val();
			params['name']=$('#name').val();
			params['rate']=$('#rate').val();
//			console.log(params);
			$.post('api/addCurrency.php',params,function(result){
				//console.log(result);
				result = $.parseJSON(result);
				if(result.success){
					$('.currencyList').append(addrow(params));
					clearForm();
				}else{
					$('#error').html(result.msg);
				}
				//alert(result.success);
			});
		
		});
	});
</script>
</body>
</html>
