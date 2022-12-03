<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Vị trí các trụ ATM</h5>
				<div class="card-body">
					<div id="myMap" style='position:relative;width:100%;height:500px;'></div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script type="text/javascript">
		   var map, infobox;
		   function GetMap()
		   {
			   map = new Microsoft.Maps.Map('#myMap',{
				   center: new Microsoft.Maps.Location(10.378438, 105.439628),
				   zoom: 17
			   });
			   var center = map.getCenter();
			   	infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
				visible: false
				});
				infobox.setMap(map);
				var db = firebase.firestore();
				db.collection("diadiem").get().then(function(querySnapshot) 
				{
					querySnapshot.forEach(function(doc) 
					{
						var pin = new Microsoft.Maps.Pushpin(doc.data().ToaDo, {
							icon: 'images/atm1.png'
						});
						pin.metadata = {
							title: doc.data().TenDiaDiem,
							description: "Địa chỉ: " + doc.data().DiaChi
						};
						Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);
						map.entities.push(pin);
					});
				});
			}
			function pushpinClicked(e) 
			{
				var infoboxTemplate = '<div class="customInfobox"><div class="title">{title}</div>{description}</div>';
				if (e.target.metadata) {
					infobox.setOptions({
						location: e.target.getLocation(),
						title: e.target.metadata.title,
						description: e.target.metadata.description,
						htmlContent: infoboxTemplate.replace('{title}', e.target.metadata.title).replace('{description}', e.target.metadata.description),
						visible: true
					});
				}
			}
		</script>
	</body>
</html>