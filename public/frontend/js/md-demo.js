/*
 * Morphing Devices Slideshow Demo
 */

var el = document.querySelector( '.md-slider' ),
	settings = {
		autoplay : true,
		interval : 3000,
		devices : [ 
			{ cName : 'md-device-1', canRotate : false, imgsrc : '../img/morph-devices/screen1.jpg' },
			{ cName : 'md-device-2', canRotate : false, imgsrc : '../img/morph-devices/screen2.jpg' },
			{ cName : 'md-device-3', canRotate : true, imgsrc : '../img/morph-devices/screen3.jpg', rotatedsrc : '../img/morph-devices/screen3r.jpg' },
			{ cName : 'md-device-4', canRotate : true, imgsrc : '../img/morph-devices/screen4.jpg', rotatedsrc : '../img/morph-devices/screen4r.jpg' }
		]
	},
	devicesTotal = settings.devices.length,
	ds = MorphingDevice( el, settings );

// create navigation triggers
var nav = document.createElement( 'nav' );
for( var i = 0; i < devicesTotal; ++i ) {

	var trigger = document.createElement( 'a' );
	trigger.className = i === 0 ? 'md-current' : '';
	trigger.setAttribute( 'href', '#' );
	trigger.setAttribute( 'pos', i );
	trigger.onclick = function( event ) {

		ds.stopSlideshow();
		var pos = Number( event.target.getAttribute( 'pos' ) );
		if( pos === ds.getCurrent() ) {
			return false;
		}
		ds.updateCurrentTrigger( event.target );
		ds.setCurrent( pos );
		ds.changeDevice();
		return false;

	};
	nav.appendChild( trigger );

}
el.appendChild( nav );

if( settings.autoplay ) {
	ds.startSlideshow();
}