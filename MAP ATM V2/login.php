<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div>
			<form action="XuLydangnhap.php" method="post"> 
				<table  align="center" border=1 bordercolor="red" >
					<tr>
					<td align="center">
						<h4>Đăng Nhập</h4>
					</td>
					</tr>
					<tr>
					<td height="auto">
							Tài Khoản : 
							<input type="text" name="username" ></input>
							</td>
					</tr>
					<tr>
					<td>
							Mật Khẩu :  
							<input type="password" name="password"/>
							</td>
					</tr>
					<tr>
					<td align="center">
							<input type="submit" value="Login" /> 	
					</td>
					</tr>			
				</table>
			</form>
		</div>
	</body>
</html>