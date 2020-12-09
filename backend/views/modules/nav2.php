<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700&subset=latin,greek);
* {
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
}

html {
  height: 100%;
  font-size: 16px;
}

body {
  height: 100%;
  background: #F3F4F8;
}

header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 60px;
  background: white;
  box-shadow: inset 0 -1px 0 0 #edeef4;
}

sidebar {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  width: 240px;
  background: black;
}
sidebar .brand {
  padding: 20px 20px 5px;
}
sidebar .brand a {
  display: block;
  width: 70px;
  height: 70px;
  margin: 0 auto;
  padding: 0;
  font-size: 2.5rem;
  font-weight: 300;
  font-style: italic;
  text-align: center;
  text-decoration: none !important;
  line-height: 62px;
  color: white;
  background: #003b69;
  border-radius: 100%;
}
sidebar button.app-menu__button {
  display: block;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-pack: center;
          justify-content: center;
  width: 50px;
  height: 50px;
  margin: 0 auto 15px;
  padding: 14px;
  background: none;
  border: none;
  border-radius: 100%;
  outline: none !important;
}

sidebar button.app-menu__button .app-icon {
  position: relative;
  display: block;
  width: 22px;
  height: 22px;
  margin: 0 0 0 0px;
  padding: 0;
  background: none;
  border: none;
}

sidebar .menu-collapse {
  display: block;
  width: 100%;
  padding: 6px 20px;
  font-size: 0.8125rem;
  font-weight: 700;
  text-align: left;
  color: white;
  background: none;
  border: none;
  outline: none !important;
}
sidebar .menu-collapse.collapsed .caret {
  -webkit-transform: rotate(-90deg);
          transform: rotate(-90deg);
}
sidebar .menu-collapse .caret {
  margin-right: 6px;
  -webkit-transform-origin: center center;
          transform-origin: center center;
  -webkit-transition: -webkit-transform 0.2s ease-in;
  transition: -webkit-transform 0.2s ease-in;
  transition: transform 0.2s ease-in;
  transition: transform 0.2s ease-in, -webkit-transform 0.2s ease-in;
}
sidebar nav {
  max-height: calc(100vh - 145px);
  overflow: auto;
  /* Track */
  /* Handle */
}
sidebar nav::-webkit-scrollbar {
  width: 6px;
}
sidebar nav::-webkit-scrollbar-track {
  border-radius: 10px;
}
sidebar nav::-webkit-scrollbar-thumb {
  border-radius: 10px;
  background: #004983;
}
sidebar ul.nav {
  margin-bottom: 25px;
}
sidebar ul.nav li a {
  display: block;
  position: relative;
  padding-left: 50px;
  font-size: 0.875rem;
  font-weight: 400;
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 0.2px;
  color: white;
}
sidebar ul.nav li a:hover {
  color: rgba(185, 204, 220, 0.8);
  background: none;
}
sidebar ul.nav li a:focus {
  background: none;
}
sidebar ul.nav li a svg {
  position: absolute;
  top: 50%;
  left: 15px;
  width: 20px;
  height: 20px;
  fill: currentColor;
  -webkit-transform: translate(0, -50%);
  -webkit-transform: translate3d(0, -50%, 0);
  transform: translate(0, -50%);
  transform: translate3d(0, -50%, 0);
}
sidebar ul.nav li a .lnr-star {
  margin-top: -1px;
}
sidebar ul.nav li a span {
  display: block;
  position: absolute;
  top: 50%;
  left: 15px;
  width: 20px;
  height: 20px;
  margin-left: -1px;
  font-size: 1.5rem;
  font-weight: 300;
  text-align: center;
  line-height: 1.1rem;
  -webkit-transform: translate(0, -50%);
  -webkit-transform: translate3d(0, -50%, 0);
  transform: translate(0, -50%);
  transform: translate3d(0, -50%, 0);
}
sidebar ul.nav li.active a {
  color: rgba(185, 204, 220, 0.8);
  background: rgba(185, 204, 220, 0.1);
}




</style>

<header>

</header>

<sidebar>
	<div class="brand">
		<a href="#">α</a>
	</div>
  <button class="app-menu__button">
    <div class="app-icon">
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
      <span class="app-icon__component"></span>
    </div>
   </button>
	<nav>
		<button class="menu-collapse" type="button" data-toggle="collapse" data-target="#myContent" aria-expanded="false" aria-controls="collapseExample">
			<span class="caret"></span> My Content
		</button>
		<div class="collapse in" id="myContent">
			<ul class="nav">
				<li>
					<a href="#">
						<svg class="lnr lnr-star"><use xlink:href="#lnr-star"></use></svg>
						Favourites
					</a>
				</li>
				<li class="active">
					<a href="#">
						<svg class="lnr lnr-eye"><use xlink:href="#lnr-eye"></use></svg>
						Following
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="lnr lnr-tag"><use xlink:href="#lnr-tag"></use></svg>
						Lists
					</a>
				</li>
			</ul>
		</div>

		<button class="menu-collapse" type="button" data-toggle="collapse" data-target="#mainContent" aria-expanded="false" aria-controls="collapseExample">
			<span class="caret"></span> Main
		</button>
		<div class="collapse in" id="mainContent">
			<ul class="nav">
				<li>
					<a href="#">
						<svg class="lnr lnr-heart-pulse"><use xlink:href="#lnr-heart-pulse"></use></svg>
						Dashboard
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="lnr lnr-inbox"><use xlink:href="#lnr-inbox"></use></svg>
						Daily Report
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="lnr lnr-download"><use xlink:href="#lnr-download"></use></svg>
						Reports
					</a>
				</li>
			</ul>
		</div>

		<button class="menu-collapse" type="button" data-toggle="collapse" data-target="#fundNavigation" aria-expanded="false" aria-controls="collapseExample">
			<span class="caret"></span> Fund
		</button>
		<div class="collapse in" id="fundNavigation">
			<ul class="nav">
				<li>
					<a href="#">
						<svg class="lnr lnr-heart-pulse"><use xlink:href="#lnr-heart-pulse"></use></svg>
						Overview
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="lnr lnr-chart-bars"><use xlink:href="#lnr-chart-bars"></use></svg>
						Performance
					</a>
				</li>
				<li>
					<a href="#">
						<span>$</span>
						Unit Prices
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="lnr lnr-pie-chart"><use xlink:href="#lnr-pie-chart"></use></svg>
						Allocations
					</a>
				</li>
				<li>
					<a href="#">
						<span style="text-transform: lowercase">%</span>
						Attribution
					</a>
				</li>
				<li>
					<a href="#">
						<span style="text-transform: lowercase">&sigma;</span>
						Risk
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="lnr lnr-list"><use xlink:href="#lnr-list"></use></svg>
						Holdings
					</a>
				</li>
			</ul>

		</div>
	</nav>
</sidebar>

<script type="text/javascript">
$(document).ready(function(){
	$("button").on("click", function (e) {
		e.preventDefault();
		$(this).toggleClass("is-expanded");
	});
});
</script>