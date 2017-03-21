<html>
<head>
<title> Simple Currency Converstion</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
</head>

<body>
<div class="container">


<div class="row-fuild">
	demo email : sathishinlinux@gmail.com
	password : 123455
</div>

<div class="row-fluid">
<form class="form-horizontal" id="formLogin">
  <div class="control-group">
    <label class="control-label">Email</label>
    <div class="controls">
      <input type="text" id="email" name="email" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Password</label>
    <div class="controls">
      <input type="password" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">      
      <button type="submit" class="btn signIn">Sign in</button>
      <a href="https://php.net"  target="_blank" class="btn ">Sign up</a>
    </div>
  </div>
  <div class="error"></div>
</form>

</div>
</div>


<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
     $("#formLogin").validate({
              rules: {
                  "email": {
                      required: true,
                      email: true
                  },  
                  "password": {
                      required: true                   
                  } 
              }
          });



    $('.signIn').click(function(){
        //alert("I am Clicking");        
        if(!$("#formLogin").valid()){
          return false;
        }else{
          var params = {}
          params["email"] = $("#email").val();
          params["password"] = $("#password").val();

          $.post('api/LoginCheck.php',params,function(result){
            //console.log(result);
			result = $.parseJSON(result);
			//alert(result.success);
			
			if(result.success){
				//alert("sdfsdfgds");
				window.location = 'conversion.php';
			}else{
				$('.error').html(result.msg);
			}
          })
          return false;



        }
        

    });
  });

</script>
</body>
</html>