jQuery(document).ready(function() {
	
	/*Start-Responsive-Menu*/
jQuery('.toggle-icon').click(function() {
        jQuery("body").addClass("menu-visible");
    });
    jQuery('.close-toggle').click(function() {
        jQuery("body").removeClass("menu-visible");
        jQuery(".submenu-expand").removeClass("toggled-on");
        jQuery(".sub-menu,.ubermenu-submenu").removeClass("toggled-on");
    });

    jQuery(".ubermenu-has-submenu-drop > a").after('<button class="dropdown-toggle"></button>');
    jQuery(".ubermenu-has-submenu-drop > .ubermenu-submenu").prepend('<li class="sub-menu-back">Back </li>');
    jQuery(".ubermenu-row .ubermenu-has-submenu-drop > .ubermenu-submenu > .sub-menu-back").remove('.sub-menu-back');
	
    jQuery('.dropdown-toggle').on('click touchend', function() {
        jQuery(this).next(".ubermenu-submenu").addClass("toggle-on");
    });
    jQuery('.sub-menu-back').on('click touchend', function() {
        jQuery(this).parent(".ubermenu-submenu").removeClass("toggle-on");
    });
	jQuery(".ubermenu-tab .dropdown-toggle").click(function() {
	jQuery(this).siblings(a).trigger("click");
	})

    jQuery.lazyLoadXT.onload.addClass = 'animated fadeIn fast'

    jQuery('.banner-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,

    });
	
	jQuery('.service-section .row').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: false,
        
		responsive: [
        {
           breakpoint: 3000,
           settings: "unslick"
        },
		{
            breakpoint: 1200,
             settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					arrows: true,
					dots: false,
					
                }
        },
		{
            breakpoint: 767,
             settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: true,
					dots: false,
                }
        }
     ]

    })
	


    jQuery('.slideVertical').slick({
       infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: false,
    }) ; 


    jQuery(".transection-form span").click(function() {
        jQuery(".transection-search").toggleClass("active-form");
    });
    jQuery('#verticalTab').easyResponsiveTabs({
        type: 'vertical', //Types: default, vertical, accordion
        width: '1199px', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'vert_1', // The tab groups identifier
    });

    jQuery(".contact-menu > a").addClass("contact-menu");

    jQuery('.as-sw-hd').click(function(event){ 
    	event.preventDefault();
    	jQuerythis = jQuery(this);
    	jQuerythis.toggleClass('click_ed');
    	var attrButton = jQuery('body').find('.hidden-content').attr('data-lr');
		jQuery('body').find('.hidden-content').slideToggle('slow');
		if (attrButton === 'learn'){
			jQuerythis.find('span').text(jQuerythis.find('span').text() == 'learn less' ? 'learn more' : 'learn less');	
		} else if ( attrButton === 'view' ) {
			jQuerythis.find('span').text(jQuerythis.find('span').text() == 'View less' ? 'View more' : 'View less');	
		} else if ( attrButton === 'read' ) {
			jQuerythis.find('span').text(jQuerythis.find('span').text() == 'Read less' ? 'Read more' : 'Read less');	
		}
    });
	jQuery('#myModal').on('hide.bs.modal', function (e) {
	  jQuery('#myModal iframe').attr("src", jQuery("#myModal  iframe").attr("src"));
	});
	jQuery('#myModal-1').on('hide.bs.modal', function (e) {
	  jQuery('#myModal-1 iframe').attr("src", jQuery("#myModal-1  iframe").attr("src"));
	});
});

jQuery(window).load(function(){ 
    jQuery("#content-1").mCustomScrollbar({
        scrollButtons: {
            enable: true
        },
        theme: "light-thick",
        scrollbarPosition: "outside"
    });
	var slickattr = {infinite: false,slidesToShow: 3,slidesToScroll: 1,arrows: true,autoplay: false,
		adaptiveHeight: false ,	responsive: [{ breakpoint: 1200,settings: {infinite: true,slidesToShow: 1,		slidesToScroll: 1}}]};
	jQuery('.bussiness-slider').slick(slickattr);
	jQuery('#menu-item-199').click(function(){
		jQuery('.litigation-slider').show().slick(slickattr);
	});
	jQuery('#menu-item-200').click(function(){	
		jQuery('.additional-slider').show().slick(slickattr);
	});
	 
	 jQuery(window).on('resize orientationchange', function() {
	  jQuery('.service-section .row').slick('resize');
	});	

	// jQuery('.ubermenu-nav li').each(function(){  
		// var link = jQuery(this).find('a').attr('href'); 
		// if (link == '#') {
		// jQuery(this).addClass('dead-link-anchor'); 
		// jQuery('.dead-link-anchor > a').removeAttr('href');     
		// }
	// }); 
	
	

    jQuery('.ubermenu-nav li.ubermenu-item-has-children').each(function() {
        var link = jQuery(this).find('a').attr('href');
        if (link == '#') {
            jQuery(this).addClass('dead-link-anchor');
            jQuery('.dead-link-anchor > a').removeAttr('href');
        }
    });
   	jQuery('.ubermenu-nav li:not(".dead-link-anchor") > a').on('click touchend', function() {
					var link = jQuery(this); //preselect the link
					var redirectlink = link.attr('href');
						 setTimeout(function() {
								window.location = redirectlink;
					}, 100);
			   });
			   jQuery(".main-navigation ul li a").on('click touchend', function(){
  jQuery(this).find('span').css("color", "#000");   
});

document.addEventListener("touchstart", function() {}, true);

jQuery('.prectice-right').hide();
jQuery('.prectice-right.ubermenu-column-id-210').show();
jQuery( ".menutabtitle.tb1" ).click(
  function() {
	jQuery('.prectice-right').hide();
	jQuery('.ubermenu-column-id-210').show();
  }
);

jQuery( ".menutabtitle.tb2" ).click(
  function() {
	jQuery('.prectice-right').hide();
	jQuery('.ubermenu-column-id-805').show();
  }
);
jQuery( ".menutabtitle.tb3" ).click(
  function() {
	jQuery('.prectice-right').hide();
	jQuery('.ubermenu-column-id-815').show();
  }
);
});

