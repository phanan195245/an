<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Xử lý thêm địa điểm</h5>
				<div class="card-body">
					
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var db = firebase.firestore();
			var kinhdo = <?php echo $_POST['KinhDo']; ?>.toFixed(7);
			var vido = <?php echo $_POST['ViDo']; ?>.toFixed(7);
			
			// Add a new document with a generated id.
			db.collection("diadiem").add({
				TenDiaDiem: "<?php echo $_POST['TenDiaDiem']; ?>",
				DiaChi: "<?php echo $_POST['DiaChi']; ?>",
				ToaDo: new firebase.firestore.GeoPoint(parseFloat(vido), parseFloat(kinhdo))
			})
			.then(function(docRef) {
				location.href = "diadiem.php";
			})
			.catch(function(error) {
				console.error("Error adding document: ", error);
			});
		</script>
	</body>
</html>