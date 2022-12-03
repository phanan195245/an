<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<?php 
	if(!isset($_SESSION['login']))
	{
		echo("<meta http-equiv='refresh' content='0; url=login.php' />");
		
	}
	?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			<div class="card mt-3">
				<h5 class="card-header">Danh sách vị trí ATM</h5>
				<div class="card-body">
					<a href="diadiem_them.php" class="btn btn-success mb-2"><i class="fal fa-plus"></i> Thêm vị trí mới</a>
					<table class="table table-bordered table-hover table-sm mb-0">
						<thead>
							<tr>
								<th width="5%">STT</th>
								<th>Vị trí</th>
								<th width="10%">Kinh độ</th>
								<th width="10%">Vĩ độ</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody id="showData">
							
						</tbody>
					</table>
				</div>
			</div>		
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var db = firebase.firestore();
			db.collection("diadiem").get().then(function(querySnapshot) {
				var output = "";
				var stt = 1;
				querySnapshot.forEach(function(doc) {
					output += "<tr>";
						output += "<td>" + stt + "</td>";
						output += "<td><span class='font-weight-bold text-primary'>" + doc.data().TenDiaDiem + "</span><span class='d-block small'>Địa chỉ: " + doc.data().DiaChi + "</span></td>";
						output += "<td>" + doc.data().ToaDo.longitude + "</td>";
						output += "<td>" + doc.data().ToaDo.latitude + "</td>";
						output += "<td class='text-center'><a href='diadiem_sua.php?id=" + doc.id + "'><i class='fal fa-edit'></i></a></td>";
						output += "<td class='text-center'><a href='diadiem_xoa.php?id=" + doc.id + "' onclick='return confirm(\"Bạn có muốn xóa địa điểm " + doc.data().TenDiaDiem + " không\")'><i class='fal fa-trash-alt text-danger'></i></a></td>";
					output += "</tr>";
					stt++;
				});
				$("#showData").html(output);
			});
		</script>
	</body>
</html>