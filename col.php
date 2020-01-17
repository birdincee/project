<!DOCTYPE html>
<title>My Example</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<div class="container-fluid">
		
<!-- Carousel container -->
<div id="my-pics" class="carousel slide" data-ride="carousel" style="width:1080px;margin:auto;">

<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#my-pics" data-slide-to="0" class="active"></li>
<li data-target="#my-pics" data-slide-to="1"></li>
<li data-target="#my-pics" data-slide-to="2"></li>
</ol>

<!-- Content -->
<div class="carousel-inner" role="listbox">

<!-- Slide 1 -->
<div class="item active">
<img src="img/1.jpg" alt="Sunset over beach">
<div class="carousel-caption">
<!--<h3>Boracay</h3>-->
<!--<p>White Sand Beach.</p>-->
</div>
</div>

<!-- Slide 2 -->
<div class="item">
<img src="img/5.jpg" alt="Rob Roy Glacier"style="height:591px;margin:auto;">
<div class="carousel-caption">
<!--<h3>Boracay</h3>-->
<!--<p>White Sand Beach.</p>-->
</div>
</div>

<!-- Slide 3 -->
<div class="item">
<img src="img/7.jpg" alt="Longtail boats at Phi Phi" style="height:591px;margin:auto;">
<div class="carousel-caption">
<!--<h3>Boracay</h3>-->
<!--<p>White Sand Beach.</p>-->
</div>
</div>

</div>

<!-- Previous/Next controls -->
<a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
<span class="icon-prev" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
<span class="icon-next" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

</div>

</div>
		
<!-- jQuery library -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>