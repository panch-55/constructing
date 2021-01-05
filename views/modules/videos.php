<style type="text/css">
	.divVideos{
		background-image:linear-gradient(rgba(0, 0, 0,0.5),rgba(0, 0, 0,0.5)),url(../views/images/anamul.jpg);
	   -webkit-background-size: cover;
	   -moz-background-size: cover;
	   -o-background-size: cover;
	   background-size: cover;
	   height: 100%;
	   width: 100% ;
	   text-align: center;
	 }
	video{
		width: 100%;
		max-height: 200px;
		margin-bottom: 20px;
	}
	h1{
		color: white;
	}
	.ourWork{
		background-color: rgba(37,23,59,0.8);
		min-height: 465px;
	}
	.displayVideo{
		display: none;
	}
	.textAnimationVideo{
		display: inline-block;
	  	animation: fadeInDown; /* referring directly to the animation's @keyframe declaration */
	  	animation-duration: 1s; /* don't forget to set a duration! */
	}

</style>
<div class="container-fluid divVideos p-5">
	<div class="row pt-4 pb-4">
		<div class="col-lg-6 ourWork p-5 mb-5">
			<div id="textVideo">
				<h5 style="color: red;" class="videoTitle displayVideo">About our work</h5>
				<h1 class="videoSubTitle displayVideo">Our Work, see what we can do...</h1>
					<p style="color: white;" class="viedoContent displayVideo">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	<div class="col-lg-6">
		<div class="row">
			<?php 
				$mostrarVideos = new videosController();
      			$mostrarVideos->selectVideosController();
			 ?>
			<!--
				<div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
					<video controls>
					    <source src="views/videos/005 Variables PHP.mp4" type="video/mp4">
					</video>
				</div>
				<div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
					<video controls>
					    <source src="views/videos/005 Variables PHP.mp4" type="video/mp4">
					</video>
				</div>
				<div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
					<video controls>
					    <source src="views/videos/005 Variables PHP.mp4" type="video/mp4">
					</video>
				</div>
			-->
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		var waypoint4 = new Waypoint({
	  		element: document.getElementById('top1'),
	  		handler: function() {
	  			$('.videoTitle').removeClass('textAnimationVideo');
	    		$('.videoSubTitle').removeClass('textAnimationVideo');
	    		$('.viedoContent').removeClass('textAnimationVideo');
		  	}
		});
		var waypoint4 = new Waypoint({
	  		element: document.getElementById('botArticulos'),
	  		handler: function() {
	  			$('.videoTitle').addClass('textAnimationVideo').one(animationEnd, function() {
	    				$('.videoSubTitle').addClass('textAnimationVideo').one(animationEnd, function() {
	    					$('.viedoContent').addClass('textAnimationVideo');
						});
				});
		  	}
		});
	});
</script>