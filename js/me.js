$('#slide-foto').slick({
	autoplay: true,
	dots: true,
	fade: true,
	centerMode: true,
  adaptiveHeight: true
});
$('.nilai-wisata').barrating({
	theme: 'bootstrap-stars'
});
$('.nilai-ulasan').barrating({
  theme: 'bootstrap-stars'
});
$('.nilai-wisata').barrating('readonly',true);
var $w = $(window).scroll(function(){
  if ( $w.scrollTop() > 100 ) {   
      $('.navbar-default').css({"background-color":"rgba(52, 152, 219, .7)", "border-color":"rgba(41, 128, 185, .7)" });
  } else {
      $('.navbar-default').css({"background-color":"rgb(52, 152, 219)", "border-color":"rgb(41, 128, 185)"});
  }
});