function slideSwitch() 
				{
				var $active = $('#slideshow IMG.active');

				if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

				var $next =  $active.next().length ? $active.next()
					: $('#slideshow IMG:first');
    
				/*var $sibs  = $active.siblings();
				var rndNum = Math.floor(Math.random() * $sibs.length );
				var $next  = $( $sibs[ rndNum ] );
				*/


				$active.addClass('last-active');

				$next.css({opacity: 0.0})
					.addClass('active')
					.animate({opacity: 1.0}, 1000, function() 
					{
						$active.removeClass('active last-active');
					});
				}

				$(function() {
					setInterval( "slideSwitch()", 5000 );
				});
		
		
function hidevogel1()
		{
			document.getElementById('vogel1').style.display="none";
		}