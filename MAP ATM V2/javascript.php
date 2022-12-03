<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-analytics.js"></script>

<!-- Xác thực -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-auth.js"></script>

<!-- Dùng cho CSDL Cloud Firestore -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-firestore.js"></script>

<script>
	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	var firebaseConfig = {
    apiKey: "AIzaSyAqGPD9Ylfu2DfyDSFuEEIsQcE-wWRvgjY",
    authDomain: "agumap-pcl.firebaseapp.com",
    databaseURL: "https://agumap-pcl.firebaseio.com",
    projectId: "agumap-pcl",
    storageBucket: "agumap-pcl.appspot.com",
    messagingSenderId: "1004425860510",
    appId: "1:1004425860510:web:2cdd443bd514bd7b54728f",
    measurementId: "G-M9CHB3D6TQ"
	};
	// Initialize Firebase
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();
</script>

<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AvOTEUBD5DYDPJ7Oc5HnitUxUijAetCz9nN-0aom6r1GF1gsy50pM-GOEKYOdQE_' async defer></script>