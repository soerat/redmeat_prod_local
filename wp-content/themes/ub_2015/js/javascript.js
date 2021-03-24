/***********MOBILE MENU************/
$(document).ready(function(){
	$('#menu').slicknav();
});


/***********NEWS CAROUSEL************/
$(document).ready(function() {
 
  var owl = $("#owl-demo");
 
  owl.owlCarousel({
	  items : 3, //10 items above 1000px browser width
	  itemsDesktop : [1000, 3],
	  itemsDesktopSmall : [999, 2],
	  itemsMobile : [730, 1], // itemsMobile disabled - inherit from itemsTablet option
	  autoPlay: 3000,
	  stopOnHover: true
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
	owl.trigger('owl.next');
  })
  $(".prev").click(function(){
	owl.trigger('owl.prev');
  })
  $(".play").click(function(){
	owl.trigger('owl.play',5000); //owl.play event accept autoPlay speed as second parameter
  })
  $(".stop").click(function(){
	owl.trigger('owl.stop');
  })
 
});





/*WebFontConfig = {
  google: { families: [ 'Oswald:300:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})(); */
