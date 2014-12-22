{% extends "layouts/guest.volt" %}

{% block content %}


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="item active">
			<img src="/img/custom/carousel1.jpg" width="100%" height="500" alt="">
            <div class="carousel-caption">
              <h3>First slide label</h3>
              <p>Lorem ipsum dolor sit amet consectetur…</p>
            </div>
        </div>
        <div class="item">
			<img src="./img/custom/carousel2.jpg" width="100%" height="500" alt="">
            <div class="carousel-caption">
              <h3>Second slide label</h3>
              <p>Aliquam sit amet gravida nibh, facilisis gravida…</p>
            </div>
        </div>
        <div class="item">
			<img src="./img/custom/carousel3.jpg" width="100%" height="500" alt="">
            <div class="carousel-caption">
              <h3>Third slide label</h3>
              <p>Praesent commodo cursus magna vel…</p>
            </div>
        </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>


<div class="container">
	<div class="row-fluid">

	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
     $("#myCarousel").carousel({
         interval : 3000,
         pause: false
     });
});
</script>
{% endblock %}