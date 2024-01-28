<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="container">
  
        <form action="./../index.php?page=new_post" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">title</label>
              <input type="title" name="title" class="form-control" id="inputtitle4" placeholder="Email">
            </div>
            <div class="form-group col-md-12">
              <label for="content">content</label>
              <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
  </body>
</html>


