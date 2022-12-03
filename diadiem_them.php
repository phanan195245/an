<!DOCTYPE html>
<html lang="en">
	<?php include "header.php";    ?>
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
				<h5 class="card-header">Thêm địa điểm</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form action="diadiem_them_xuly.php" method="post">
								<div class="form-group">
									<label for="TenDiaDiem">Tên địa điểm</label>
									<div id="KetQuaTimKiem">
										<input type="text" class="form-control" id="TenDiaDiem" name="TenDiaDiem" required />
									</div>
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
								
								<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
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
			var map;
			
			function GetMap()
			{
				map = new Microsoft.Maps.Map('#myMap', {
					credentials: 'Ava-7XwnPbXrlQ2oXTkuWJ1CtbRTz4oCI4xteuUDJ8r25eIjPVvikGXxm6srXQ6F',
					center: new Microsoft.Maps.Location(10.378436, 105.439658),
					zoom: 18
				});
				
				Microsoft.Maps.Events.addHandler(map, 'click', getLatlng);
				
				/*
				Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', function() {
					var options = {
						maxResults: 4,
						map: map
					};
					var manager = new Microsoft.Maps.AutosuggestManager(options);
					manager.attachAutosuggest('#TenDiaDiem', '#KetQuaTimKiem', selectedSuggestion);
				}); */
			}
			
			function getLatlng(e)
			{
				if(e.targetType == "map")
				{
					map.entities.clear();
					
					var point = new Microsoft.Maps.Point(e.getX(), e.getY());
					var locTemp = e.target.tryPixelToLocation(point);
					var location = new Microsoft.Maps.Location(locTemp.latitude, locTemp.longitude);
					
					var pin = new Microsoft.Maps.Pushpin(location, {
						draggable: true
					});
					
					Microsoft.Maps.Events.addHandler(pin, 'dragend', pushpinDragEnd);
					
					map.entities.push(pin);
					
					$("#ViDo").val(locTemp.latitude);
					$("#KinhDo").val(locTemp.longitude);
				}
			}
			
			function pushpinDragEnd(e)
			{
				$("#ViDo").val(e.target.getLocation().latitude);
				$("#KinhDo").val(e.target.getLocation().longitude);
			}
			
			function selectedSuggestion(suggestionResult)
			{
				map.entities.clear();
				map.setView({ bounds: suggestionResult.bestView });
				var pushpin = new Microsoft.Maps.Pushpin(suggestionResult.location, {
					draggable: true
				});
				
				$("#DiaChi").val(suggestionResult.formattedSuggestion);
				$("#ViDo").val(suggestionResult.location.latitude);
				$("#KinhDo").val(suggestionResult.location.longitude);
				
				Microsoft.Maps.Events.addHandler(pushpin, 'dragend', pushpinDragEnd);
				
				map.entities.push(pushpin);
			}
		</script>
	</body>
</html>