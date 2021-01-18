<?php
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
if ($password == $re_password) { //建立连接
	$password = md5($password);
	$server = "127.0.0.1";
	$user = "root";
	$pwd = "123456";
	$database = "web";
	//连接数据库，且定位到数据库web
	$conn = mysqli_connect($server, $user, $pwd,$database); 
	// 检测连接
	if (mysqli_connect_error()) {
	    die("数据库连接失败: " . mysqli_connect_error());
	}
    $sql_select = "SELECT username FROM userinfo WHERE username = '$username'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断用户名是否已存在
    if ($username == $row['username']) { //用户名已存在，显示提示信息
        header("Location:register.php?err=1");
    } else { //用户名不存在，插入数据 //准备SQL语句
        $sql_insert = "INSERT INTO userinfo(username,password,email,phone) 
VALUES('$username','$password','$email','$phone')"; //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //关闭数据库
    mysqli_close($conn);
} else {
    header("Location:register.php?err=2");
}

?>