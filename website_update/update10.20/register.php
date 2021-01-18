<!DOCTYPE html>
<html>
	<head>
		<title>注册</title>
		<meta name="content-type"; charset="UTF-8">
	</head>
	<body> 
		<div class="content" align="center"> <!--头部--> 
		<div class="header"> <h1>注册页面</h1> </div> <!--中部--> 
		<div class="middle"> 
		<form action="registerAction.php" method="post"> <table border="0"> 
			<tr><td>用户名：</td> 
			<td><input type="text" id="id_name" name="username" required="required"></td> 
			</tr> <tr>
			 <td>密   码：</td> <td><input type="password" id="password" name="password" 
			required="required"></td> 
			</tr> <tr>
			 <td>重复密码：</td> <td><input type="password" id="re_password" 
			name="re_password" required="required"></td> </tr> <tr>
			<td>Email：</td> <td><input type="email" id="email" name="email" required="required"></td> </tr> <tr> 
			<td>电话：</td> <td><input type="text" id="phone" name="phone" required="required"></td> </tr> <tr> 
			<div style="text-align: center; margin-top: 30px;">
				<input type="submit" class="button" value="注册">
				<input type="reset" class="button" value="重置">
			</div>
		</form>
<?php
$err = isset($_GET["err"]) ? $_GET["err"] : "";
switch ($err) {
    case 1:
		echo "<script>alert('用户名{$user}已存在！请直接登录！')</script>";
		echo "<script>location.href='index.html'</script>";
        break;

    case 2:
		echo "<script>alert('密码与重复密码不一致！')</script>";
		echo "<script>location.href='register.php'</script>";
        break;

    case 3:
		echo "<script>alert('注册成功！请登录！')</script>";
		echo "<script>location.href='index.html'</script>";
        break;
}
?> 

</body>
</html>
