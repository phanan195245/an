<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Sửa vị trí</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form action="diadiem_sua_xuly.php" method="post">
								<input type="text" class="form-control" id="ID" name="ID" hidden />
								<div class="form-group">
									<label for="TenDiaDiem">Tên địa điểm</label>
									<input type="text" class="form-control" id="TenDiaDiem" name="TenDiaDiem" required />
								</div>
								<div class="form-group">
									<label for="KinhDo">Kinh độ</label>
									<input type="text" class="form-control" id="KinhDo" name="KinhDo" required />
								</div>
								<div class="form-group">
									<label for="ViDo">Vĩ độ</label>
									<input type="text" class="form-control" id="ViDo" name="ViDo" required />
								</div>
								<div class="form-group">
									<label for="DiaChi">Địa chỉ</label>
									<input type="text" class="form-control" id="DiaChi" name="DiaChi" required />
								</div>
								
								<button type="submit" class="btn btn-primary"><i class="fal fa-edit"></i> Cập nhật</button>
							</form>
						</div>
						<div class="col-md-6">
							<div id="myMap" style="position:relative;width:100%;height:380px;"></div>
						</div>
					</div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var db = firebase.firestore();
			var map;
			var docRef = db.collection("diadiem").doc("<?php echo $_GET['id']; ?>");
			docRef.get().then(function(doc) {
				if (doc.exists) {
					$("#ID").val(doc.id);
					$("#TenDiaDiem").val(doc.data().TenDiaDiem);
					$("#KinhDo").val(doc.data().ToaDo.longitude);
					$("#ViDo").val(doc.data().ToaDo.latitude);
					$("#DiaChi").val(doc.data().DiaChi);
					
					map = new Microsoft.Maps.Map('#myMap', {
						credentials: 'Ava-7XwnPbXrlQ2oXTkuWJ1CtbRTz4oCI4xteuUDJ8r25eIjPVvikGXxm6srXQ6F',
						center: new Microsoft.Maps.Location(doc.data().ToaDo.latitude, doc.data().ToaDo.longitude),
						zoom: 18
					});
					
					var center = map.getCenter();
				
					var pin = new Microsoft.Maps.Pushpin(center, {
						title: doc.data().TenDiaDiem,
						draggable: true
					});
					
					Microsoft.Maps.Events.addHandler(pin, 'dragend', pushpinDragEnd);
					
					map.entities.push(pin);
				} else {
					console.log("No such document!");
				}
			}).catch(function(error) {
				console.log("Error getting document:", error);
			});
			
			function pushpinDragEnd(e)
			{
				$("#ViDo").val(e.target.getLocation().latitude);
				$("#KinhDo").val(e.target.getLocation().longitude);
			}
		</script>
	</body>
</html>