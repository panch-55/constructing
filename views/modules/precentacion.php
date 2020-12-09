<?php

 ?>

<style type="text/css">
	.myCard{
		border: 0px !important;
		display: none;
	}
	.text{
		font-family: sans-serif;
		font-weight: bold;
		color: #26264B;
	}
	.barText{
		position:relative;
		height:2px;
		background-color: #E7E7E7;
		margin-top: -6px;
		margin-bottom: 12px;
	}
	p{
		color: #969696;
	}
	.colorIcon{
		 color: #FF8A33;
	}
	.start-button{
		display: inline-block;
	  	margin: 0 0.5rem;
	  	animation: bounce; /* referring directly to the animation's @keyframe declaration */
	  	animation-duration: 2s; /* don't forget to set a duration! */
	}
	.titleAnimate{
		display: inline-block;
	  	animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
	  	animation-duration: 0.8s; /* don't forget to set a duration! */
	}
	.cardAnimation{
		display: block;
	  	animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
	  	animation-duration: 0.5s; /* don't forget to set a duration! */
	}
	#basic-waypoint{
		margin-bottom: 10px!important;
		min-height: 600px!important;
	}
	.title{

	}
	.precentacion{
		width: 100%!important;
		margin-left: -1px!important;
	}
</style>
	<div class="row mt-5 pl-3 pr-3 mr-3 ml-3" id="basic-waypoint">
		<div class="col-12 title">
			<div class="text-center">
				<h1 style="color: #26264B; font-size: 4em!important; font-family: OCR A Std, monospace; font-weight: bold;" >WHY CHOOSE US</h1>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
			<div class="card myCard myCard1" style="max-width: 400px;">
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-5">
			    <i class="fa fa-home fa-4x colorIcon"></i>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text">Lorem Ipsum</h5>
			        <hr>
			        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			      </div>
			    </div>
			  </div>
			</div>

		</div>

	    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
	    	<div class="card myCard myCard2" style="max-width: 400px;">
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-5">
			     <i class="fa fa-bolt fa-4x colorIcon" aria-hidden="true"></i>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text">Lorem Ipsum</h5>
			        <hr>
			        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			      </div>
			    </div>
			  </div>
			</div>

	    </div>

	     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
	     	<div class="card myCard myCard3" style="max-width: 400px;">
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-5">
			     <i class="fa fa-bath fa-4x colorIcon" aria-hidden="true"></i>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text">Lorem Ipsum</h5>
			        <hr>
			        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			      </div>
			    </div>
			  </div>
			</div>

	    </div>

	     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
	     	<div class="card myCard myCard4" style="max-width: 400px;">
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-5">
			     <i class="fa fa-leaf fa-4x colorIcon" aria-hidden="true"></i>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text">Lorem Ipsum</h5>
			        <hr>
			        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			      </div>
			    </div>
			  </div>
			</div>

	    </div>

	     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
	     	<div class="card myCard myCard5" style="max-width: 400px;">
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-5">
			     <i class="fa fa-wrench fa-4x colorIcon"></i>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text">Lorem Ipsum</h5>
			        <hr>
			        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			      </div>
			    </div>
			  </div>
			</div>
	    </div>

	     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
	     	<div class="card myCard myCard6" style="max-width: 400px;">
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-5">
			     <i class="fas fa-paint-roller fa-4x colorIcon"></i>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text">Lorem Ipsum</h5>
			        <hr>
			        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			      </div>
			    </div>
			  </div>
			</div>
	    </div>

	</div>

<script type="text/javascript">
$(document).ready(function(){
	var waypoint2 = new Waypoint({
	  element: document.getElementById('top1'),
	  handler: function() {
	    $('.myCard').removeClass('cardAnimation');
	    $('.card').removeClass('cardAnimationArticuloRight');
	    $('.card').removeClass('cardAnimationArticuloLeft');
	  }
	});
	var waypoint = new Waypoint({
	  element: document.getElementById('botSlide'),
	  handler: function() {
	    $('.myCard1').addClass('cardAnimation').one(animationEnd, function() {
	    	$('.myCard2').addClass('cardAnimation').one(animationEnd, function() {
	    		$('.myCard3').addClass('cardAnimation').one(animationEnd, function() {
	    			$('.myCard4').addClass('cardAnimation').one(animationEnd, function() {
	    				$('.myCard5').addClass('cardAnimation').one(animationEnd, function() {
	    					$('.myCard6').addClass('cardAnimation');
						});
					});
				});
			});
		});
	  }
	});
	var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		$("#myButton").click(function() {
		    $(this).addClass('start-button').one(animationEnd, function() {
		    	$('#myButton').removeClass('start-button');

		        $('.title').addClass('titleAnimate').one(animationEnd, function() {
		        	$('.title').removeClass('titleAnimate');
		         });
		    });
	});
});
</script>
