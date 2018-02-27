<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" href="<?php echo $base_url?>favicon.ico" type='image/x-icon'>
	<base href="<?php echo $base_url; ?>" />


	<?php
		foreach ($meta_data as $name => $content)
		{
			if (!empty($content))
				echo "<meta name='$name' content='$content'>".PHP_EOL;
		}

		foreach ($stylesheets as $media => $files)
		{
			foreach ($files as $file)
			{
				$url = starts_with($file, 'http') ? $file : base_url($file);
				echo "<link href='$url' rel='stylesheet' media='$media'>".PHP_EOL;
			}
		}

		foreach ($scripts['head'] as $file)
		{
			$url = starts_with($file, 'http') ? $file : base_url($file);
			echo "<script src='$url'></script>".PHP_EOL;
		}
	?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<title><?php echo $page_title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<script>

	</script>
	</head>
	<body class="<?php echo $body_class; if($page_title == 'login'){echo ' bg';} ?> ">

	<script>
	function checkLoginState() {
	FB.getLoginStatus(function(response) {
	  console.log(response);
		if(response.status === 'connected'){
			var token = response.authResponse.accessToken;
			var fb_id = response.authResponse.userID;
			FB.api(
		  '/'+fb_id,
		  'GET',
		  {},
		  function(response) {
		      // Insert your code here
					console.log(response);
					var sendInfo = {
           full_name: response.name,
           social_id: fb_id,
           provider: 'facebook',
           token: token
       };

       $.ajax({
           type: "POST",
           url: "<?php echo $base_url; ?>"+"rest/addUser",
           dataType: "json",
					 data: sendInfo,
           success: function (response) {
               if (response.status === 'true') {
                   window.location.href="<?php echo $base_url.'home'; ?> ";
               } else {

               }
           }


       });

		  }
		);
		}
	});
	}
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '127311501087627',
	      cookie     : true,
	      xfbml      : true,
	      version    : 'v2.12'
	    });

	    FB.AppEvents.logPageView();

	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
