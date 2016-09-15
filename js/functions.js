		/*popup*/
		function newPopup(){
			varWindow = window.open (
			'mentepositiva.html',
			'Mente Positiva',
			"width=360px, height=640px, top=100, left=110, scrollbars=yes ");
		}

		$(function () {
        $('.navbar-collapse ul li a:not(.dropdown-toggle)').bind('click touchstart', function () {
            	$('.navbar-toggle:visible').click();
            });
    	});