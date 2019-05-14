	<!-- jQuery -->
	<script src="template/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="template/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="template/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="template/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="template/js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="template/js/jquery.magnific-popup.min.js"></script>
	<script src="template/js/magnific-popup-options.js"></script>


	<!-- Main JS (Do not remove) -->
	<script src="template/js/main.js"></script>

	<!-- 
	INFO:
	jQuery Cookie for Demo Purposes Only. 
	The code below is to toggle the layout to boxed or wide 
	-->
	<script src="template/js/jquery.cookie.js"></script>
	<script>
		$(function(){

			if ( $.cookie('layoutCookie') != '' ) {
				$('body').addClass($.cookie('layoutCookie'));
			}

			$('a[data-layout="boxed"]').click(function(event){
				event.preventDefault();
				$.cookie('layoutCookie', 'boxed', { expires: 7, path: '/'});
				$('body').addClass($.cookie('layoutCookie')); // the value is boxed.
			});

			$('a[data-layout="wide"]').click(function(event){
				event.preventDefault();
				$('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
				$.removeCookie('layoutCookie', { path: '/' }); // remove the value of our cookie 'layoutCookie'
			});
		});
	</script>