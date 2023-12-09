<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="profile.css" rel="stylesheet">
</head>

<body>
    <form method="post" accent-charset="utf-8" class="formprof" action="" enctype="multipart/form-data">
        <h1>Welcome User</h1>
        <div class="prof">

        <img id="user_preview_image" width="300px" height="150px">
        <br /><br />
        <input type="file" class="file" name="user_photo" onchange="document.getElementById('user_preview_image').src=window.URL.createObjectURL(this.files[0])" /> <br>
        <br />
        <input type="text" class="msg" name="msg" placeholder="Enter image description" />
        <br />
        <br />
        <input type="submit" class="up" name="upload" value="upload" />
        <br />
        <br />
        </div>
        <div>
        <input type="submit" class="done" name="submit" placeholder="Logout" value="Logout" />
        </div>
        <?php include 'profilecode.php' ?>
    </form>
</body>

</html>