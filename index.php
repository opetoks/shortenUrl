<?php
$codedlink ="";
if(isset($_POST['btn_lnk']))
{
$urlP = $_POST['urlink'];
$codedlink = "brt".rand(10,100).".ly";
file_put_contents('links.ini', "\r\n$codedlink=$urlP", LOCK_EX | FILE_APPEND);
//print_r($urlP);
}
if(isset($_POST['rd_lnk']))
{
$urlRd = $_POST['rdlink'];
//open links.ini file to check url
$lnks = parse_ini_file('links.ini');
//print_r($lnks);
if(array_key_exists($urlRd, $lnks)){
	header('Location: '.$lnks[$urlRd]);
}
else{
	header('HTTP/1.0 404 Not Found');
	echo 'No match found';
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shorten Your URL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">                                 
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20%;"><!-- //col-md-offset-4 -->
        			
                    <form class="form-inline" method="post">  
					  <div class="form-group input-group-lg">

					    <input type="text" class="form-control form-control-lg" name="urlink" placeholder="Paste your URL to Shorten here" pattern="https?://.+" required>

					  </div>
					  <button type="submit" name="btn_lnk" class="btn btn-primary">Shorten Url</button>
					</form>
					<hr>
					<form class="form-inline" method="post">
						<?php
                     if($codedlink!='')
                        {  
                        echo '<div style="color:red">The Short link for your URL is:<a href="'.$urlP.'">'.$codedlink.'</a> Click to redirect or copy and paste or type in the form below</div>';

                        echo '<div class="form-group input-group-lg">

					    <input type="text" class="form-control form-control-lg" name="rdlink" placeholder="brt30.ly" required>

					  </div>
					  <button type="submit" name="rd_lnk" class="btn btn-primary">Surve Url</button>';                                  
                           
                        }
                    ?> 
					</form>
					
                
        </div>
    </div>
</div>


</body>
</html>