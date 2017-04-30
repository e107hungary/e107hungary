var e107 = e107 || {'settings': {}, 'behaviors': {}};

(function ($)
{

	/**
	 * Apply animation.css classes on elements.
	 *
	 * @type {{attach: e107.behaviors.e107HungaryAnimations.attach}}
	 */
	e107.behaviors.e107HungaryAnimations = {
		attach: function (context, settings)
		{
			$("body", context).once('pre-prettify').each(function ()
			{
				// make code pretty
				window.prettyPrint && prettyPrint();
			});

			$("[data-appear-animation]", context).once('e107-hungary-animations').each(function ()
			{
				var $this = $(this);
				$this.addClass('appear-animation');
				$this.addClass('animated');

				if($(window).width() > 767)
				{
					$this.appear(function ()
					{
						var delay = ($this.attr('data-appear-animation-delay') ? $this.attr("data-appear-animation-delay") : 1);

						if(delay > 1)
						{
							$this.css('animation-delay', delay + 'ms');
						}

						$this.addClass($this.attr('data-appear-animation'));

						setTimeout(function ()
						{
							$this.addClass('appear-animation-visible');
						}, delay);
					}, {accX: 0, accY: 0, one: false});
				}
				else
				{
					$this.addClass('appear-animation-visible');
				}
			});
		}
	};

	/**
	 * Initialize mobile navigation slide menu.
	 *
	 * @type {{attach: e107.behaviors.e107HungaryNavigationSlide.attach}}
	 */
	e107.behaviors.e107HungaryNavigationSlide = {
		attach: function (context, settings)
		{
			$("body", context).once('mobile-navigation-slide-menu').each(function ()
			{
				var $slidemenu = $('#slidemenu');

				if($(window).width() < 768)
				{
					$slidemenu.height($(window).height());
				}
				else
				{
					$slidemenu.height('50px');
				}

				//stick in the fixed 100% height behind the navbar but don't wrap it
				$('#slide-nav.navbar-inverse').after($('<div class="inverse" id="navbar-height-col"></div>'));
				$('#slide-nav.navbar-default').after($('<div id="navbar-height-col"></div>'));

				// Enter your ids or classes
				var toggler = '.navbar-toggle';
				var menuneg = '-100%';
				var slideneg = '-80%';

				$("#slide-nav").on("click", toggler, function (e)
				{
					$("html, body").animate({ scrollTop: 0 }, "fast");

					var selected = $(this).hasClass('slide-active');
					var $slidemenu = $('#slidemenu');

					$slidemenu.stop().animate({
						left: selected ? menuneg : '0px'
					});

					$('#navbar-height-col').stop().animate({
						left: selected ? slideneg : '0px'
					});

					$(this).toggleClass('slide-active', !selected);
					$slidemenu.toggleClass('slide-active');
				});

				var selected = '#slidemenu, body';

				$(document.body).bind('touchend', function (e) {
					if($(window).width() < 768)
					{
						$slidemenu.height($(window).height());
					}
					else
					{
						$slidemenu.height('50px');
					}
				});

				$(window).on("resize", function ()
				{
					var $slidemenu = $('#slidemenu');

					if($(window).width() > 767 && $('.navbar-toggle').is(':hidden'))
					{
						$(selected).removeClass('slide-active');
					}

					if($(window).width() < 768)
					{
						$slidemenu.height($(window).height());
					}
					else
					{
						$slidemenu.height('50px');
					}
				});
			});
		}
	};

})(jQuery);
