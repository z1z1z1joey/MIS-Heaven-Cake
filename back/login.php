<?php


session_start();  // 啟用交談期
$id = "";
$password = "";
$msg = "";
// 取得表單欄位
if (isset($_POST["id"]))
   $id = $_POST["id"];
if (isset($_POST["password"]))
   $password = $_POST["password"];
// 檢查是否輸入使用者名稱和密碼
if ($id != "" && $password != "") {
   // 建立MySQL伺服器連接
   $db = mysql_connect("localhost","root","asd09720");
   mysql_select_db("login"); // 選擇資料庫
   // 建立SQL指令字串
   $sql = "SELECT * FROM customers WHERE password='";
   $sql.= $password."' AND id='".$id."'";
   $rows = mysql_query($sql); // 執行SQL指令字串
   // 是否查詢到記錄
   if (mysql_fetch_row($rows) != false) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      $_SESSION["id"] = $id;
	  if($_SESSION["id"]!="1001")
	  {
		header("Location:employee/index.php");}
      else
		  {
		 header("Location:boss/index.php");}
     // 轉址至首頁
   } else
      $msg =  "使用者名稱或密碼錯誤!<br/>";
   mysql_close($db);  // 關閉伺服器連接
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>用戶登錄頁面</title>
<link href="style/login.css" rel="stylesheet" type="text/css">
<script language="javascript">
function inputCheck(){
	var lname = document.form1.userName.value;
	if(lname == ""){
		alert("用戶名不能為空!");
		document.form1.userName.focus();
		return false;
	}
	var lpw = document.form1.login_pw.value;
	if(lpw == ""){
		alert("密碼不能為空!");
		document.form1.login_pw.focus();
		return false;
	}
	var lyz = document.form1.login_yz.value;
	if(lyz==""){
		alert("驗證碼不能為空!");
		document.form1.login_yz.focus();
        return false;
    }
	if(lname!="admin" || lpw!="admin"){
		alert("用戶名和密碼不正確!");
	}else{
		self.location='../page/index.html';
	}        
    return true;
}
</script>
</head>

<body>
<div id="login">
  <div id="login_t">
    <div id="title">
      <div id="tp"><img src="images/login_t.png" width="65" height="65"/></div>
      <div id="tw">admin</div>
      <div id="text">網站後台登錄</div>
    </div>
    <div id="line"> </div>
    <div id="lg">
      <form action="#" method="post" id="form1" name="form1">
        <div id="left">
        <label>用戶名：</label>
        <input type="text" name="id" size="20">
        <br/>
        <label>密　碼：</label>
        <input type="password" name="password" size="20">
        <br/>
            </div>
        <div id="right" ><input id="an" type="submit" value="登錄" ></div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
