<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Sustain Jewelry Co.</title>
    <meta name="description" content="The Administrator Page for Sustain Jewelry">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="">
    <?php include("nav.html");?>
    <div id="wrapper">
        <! specify the encoding type of the form using the 
                enctype attribute >
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit"> 
        </form>

    </div>
   
                
            

</body>
<?php include("navfooter.php");?>

</html>