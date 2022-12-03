<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Nhập địa điểm</h5>
				<div class="card-body">
					<?php
						$link = mysqli_connect("127.0.0.1", "root", "vertrigo", "bando");
						$sql = "SELECT ten_dia_diem, kinh_do, vi_do, ap_khom, xa_phuong, huyen_thi, so_duong, ten_duong FROM `dia_diem` WHERE id_loai = 7";
						$danhsach = mysqli_query($link, $sql);
						
						$diadiem = array();
						while($dong = mysqli_fetch_array($danhsach))
						{
							$data = array();
							$data['ten_dia_diem'] = $dong['ten_dia_diem'];
							$data['kinh_do'] = $dong['kinh_do'];
							$data['vi_do'] = $dong['vi_do'];
							
							$diachi = "";
							$diachi .= !empty($dong['so_duong']) ? $dong['so_duong'] . ", " : "";
							$diachi .= !empty($dong['ten_duong']) ? $dong['ten_duong'] . ", " : "";
							$diachi .= !empty($dong['ap_khom']) ? $dong['ap_khom'] . ", " : "";
							$diachi .= !empty($dong['xa_phuong']) ? $dong['xa_phuong'] . ", " : "";
							$diachi .= !empty($dong['huyen_thi']) ? $dong['huyen_thi'] : "";
							$data['dia_chi'] = $diachi;
							
							array_push($diadiem, $data);
						}
					?>
					
					<div id="KetQua">
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<span id="ThongBao"></span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var db = firebase.firestore();
			
			let diadiem = [
				<?php
					$i = 1;
					foreach($diadiem as $value)
					{
				?>
					{
						TenDiaDiem: "<?php echo $value['ten_dia_diem']; ?>",
						DiaChi: "<?php echo $value['dia_chi']; ?>",
						ToaDo: new firebase.firestore.GeoPoint(<?php echo $value['vi_do']; ?>, <?php echo $value['kinh_do']; ?>)
					<?php if(count($diadiem) == $i) { ?>
						}
					<?php } else { ?>
						},
					<?php } ?>
				<?php
						$i++;
					}
				?>
			];
			
			var batch = db.batch();
			
			diadiem.forEach((doc) => {
				var docRef = db.collection("diadiem").doc();
				batch.set(docRef, doc);
			});
			
			$("#KetQua").hide();
			batch.commit().then(data => {
				$("#KetQua").show();
				$("#ThongBao").html("Nhập thành công!");
				console.log(data);
			}).catch(error => {
				$("#KetQua").show();
				$("#ThongBao").html("Lỗi nhập dữ liệu!");
				console.log(error);
			});
		</script>
	</body>
</html>