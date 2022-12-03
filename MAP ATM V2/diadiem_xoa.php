<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Xử lý xóa địa điểm</h5>
				<div class="card-body">
					
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			var db = firebase.firestore();
			
			db.collection("diadiem").doc("<?php echo $_GET['id']; ?>").delete().then(function() {
				location.href = "diadiem.php";
			}).catch(function(error) {
				console.error("Error removing document: ", error);
			});
		</script>
	</body>
</html>