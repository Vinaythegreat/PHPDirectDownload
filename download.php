<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<form method="post">
File URL: <input name="url" class="form-control" placeholder="Enter File URL to download" /> <br>
Folder: <input name="Destination" class="form-control" placeholder="Optional Folder" /> <br>
<input name="submit" class="btn btn-primary" type="submit" />
</form>
<?php

if (!isset($_POST['submit'])) die();

    // folder to save downloaded files to. must end with slash
    $slash = '/';
    $destination_folder = $_POST['Destination'];
    if (strlen($destination_folder) == 0)
    {
    $destination_folder = "./";
    }
    else if ($slash != substr( $destination_folder, -1 ))
    {
     $destination_folder .= "/";
    }
    
    if (!is_dir( $destination_folder )) {
    	mkdir($destination_folder, 0755, true);
    	}
    
    $url = $_POST['url'];
    $newfname = $destination_folder . basename($url);
    if(file_put_contents($newfname, fopen($url, 'r')))
    {
    echo ' <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> File Downloaded Successfully </div> ';
    }
    else
    {
    echo '<div class="alert alert-danger fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Oops!</strong> File downloading Failed !!! </div>';
    }
    

?>