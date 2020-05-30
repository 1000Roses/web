<?php 
	session_start();
	// echo "username is " . $_SESSION["username"] . ".<br>";
	// echo "password encrypted is " . $_SESSION["password"] . ".";

	// /---------------------------

		if (isset($_GET["logout"]) && $_GET["logout"]== true){
			$_SESSION['username'] = "";
			$_SESSION['password'] = "";
			setcookie("login", "", time() - 3600);
			// echo "soemthig";
			header("Location: http://localhost:8888");
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<!-- <script>
		window.onLoadCallback = function(){

			 gapi.load('auth2', function() {
    			// Library loaded.
    			 gapi.auth2.init({
			      client_id: '600445604444-dric9lv8c05n6653ntm5bpdhqv6tng0k.apps.googleusercontent.com'
			    });
  			});
			
			 
		

		}
	</script -->
	<meta name="google-signin-client_id" content="600445604444-dric9lv8c05n6653ntm5bpdhqv6tng0k.apps.googleusercontent.com">
	<style type="text/css">
		body{
				background-image: "bananaTree.png";
		}
	</style>
</head>
<body>
	

	<img id ="imgAccount" src="#" style="width: 100px;height: 100px;"> 
	<p id  = "nameAccount"></p>
	<p id = "emailAccount"></p>

	
	<button id ="logout"  onclick="location.href='http://localhost:8888/banoi.php?logout=true';" id = "logout"> logout here</button>
  	<button  id ="logoutGoogle" href="#" onclick="signOut();">Sign out google here</button>



<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "Upload lỗi rồi!";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upload/' . $_FILES['fileUpload']['name']);
        echo "upload thành công <br/>";
        echo 'Dường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br>';
        echo 'Loại file: ' . $_FILES['fileUpload']['type'] . '<br>';
        echo 'Dung lượng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';
    }
}
?>




	<script>

		document.getElementById("nameAccount").innerHTML = localStorage.getItem("accountName");
		document.getElementById("emailAccount").innerHTML = localStorage.getItem("accountEmail");
		document.getElementById("imgAccount").src = localStorage.getItem("accountImage");

		if (localStorage.getItem("accountName") != null){ // is google
			document.getElementById("logout").style.display = "none";

		}else{
			document.getElementById("logoutGoogle").style.display = "none";
		}

	function signOut() {
	        var auth2 = gapi.auth2.getAuthInstance();
	        auth2.signOut().then(function () {
	        console.log('User signed out.');
	        localStorage.removeItem("accountName");
	        localStorage.removeItem("accountEmail");
	        localStorage.removeItem("accountImage");
	        document.location.href='http://localhost:8888/index.php';
	        //redirecteđ page    kslsdkfjlskdfjklsdjflksdjflkds
	      });
    }

    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
  </script>

 
  
  	


	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</body>
</html>


