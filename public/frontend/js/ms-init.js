/*
 * Master Slider Initialization and Options
 */

/*Document Ready*/
jQuery(document).ready(function($) {
	'use strict';


	/* MS Gallery
	******************************************/
	var slider1 = new MasterSlider();
	slider1.setup('masterslider1' , {
		width:1140,
		height:600,
		space:10,
		preload:3,
		view:'basic'
	});
	
	var gallery = new MSGallery('ms-gallery' , slider1);
	gallery.setup();


	/* Partial View Type 1
	******************************************/
	var slider2 = new MasterSlider();
	
	slider2.control('arrows');	
	slider2.control('slideinfo',{insertTo:"#partial-view-1" , autohide:false, align:'bottom', size:160});
	slider2.control('circletimer' , {color:"#FFFFFF" , stroke:9});
	
	slider2.setup('masterslider2' , {
		width:760,
		height:400,
		space:10,
		loop:true,
		view:'fadeWave',
		layout:'partialview'
	});


	/* Partial View Type 2
	******************************************/
	var slider3 = new MasterSlider();

	slider3.control('arrows');	
	slider3.control('circletimer' , {color:"#FFFFFF" , stroke:9});

	slider3.setup('masterslider3' , {
		width:760,
		height:400,
		space:10,
		loop:true,
		view:'partialWave',
		layout:'partialview'
	});


	/* Parallax Mask
	******************************************/
	var slider4 = new MasterSlider();

	slider4.control('arrows');	
	slider4.control('bullets' , {autohide:false, align:'bottom', margin:10});	
	slider4.control('scrollbar' , {dir:'h',color:'#3a3a3a'});

	slider4.setup('masterslider4' , {
		width:720,
		height:420,
		space:3,
		view:'parallaxMask'
	});

	
	/* Stack View
	******************************************/
	var slider5 = new MasterSlider();

	slider5.control('arrows');	
	slider5.control('bullets' , {autohide:false, align:'bottom', margin:10});	

	slider5.setup('masterslider5' , {
		width:720,
		height:420,
		space:3,
		view:'stack',
		loop:true
	});


	/* CSS3 Filter
	******************************************/
	var slider6 = new MasterSlider();

	slider6.control('arrows');	
	slider6.control('bullets' , {autohide:false, align:'bottom', margin:10});	

	slider6.setup('masterslider6' , {
		width:750,
		height:430,
		layout:'partialview',
		space:5,
		view:'basic',
		loop:true,
		filters: {
			grayscale:1,
			contrast:1.5
		}
	});


	/* Inside Laptop
	******************************************/
	var slider7 = new MasterSlider();
	slider7.setup('masterslider7' , {
		width:492,
		height:309,
		speed:20,
		preload:0,
		space:2,
		view:'mask'
	});
	slider7.control('arrows');	
	slider7.control('bullets',{autohide:false});	


});/*Document Ready End*/