
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 0px;
      border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: -1;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DAW Forum</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="#">Logout</a>
      	<li><a href="#">Post blog</a>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome Duarte Jerónimo</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(45).jpg" style="width:100%; height: 600px" alt="First Slide">
    </div>

    <div class="item">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg" style="width:100%; height: 600px" alt="Second Slide">
    </div>

    <div class="item">
      <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(47).jpg" style="width:100%; height: 600px" alt="Third Slide">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

{foreach item=post from=$Posts}

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">{$post.name}</div>
        <div class="panel-body">{$post.updated_at}</div>
        <div class="panel-body">{$post.created_at}</div>
        <div class="panel-body"><a href="#">{$post.email}</a></div>
        <div class="panel-footer">{$post.content}</div>
      </div>
    </div>
    
{/foreach}

<footer class="container-fluid text-right">
  <p>Designed by Duarte Jerónimo</p>
  </form>
</footer>

</body>
</html>
