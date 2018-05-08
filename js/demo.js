function sizeScreen(){
    var pos_nav = $('#mainNav').offset().top;
    var height = $(window).height();
    var width = $(window).width();

    $('header').css("height", height);
    $('section').css("height", 'auto');
    var aux = $('#assis').height();
    $('#shandow').css('height', aux);
}
setInterval(function(){sizeScreen();}, 10);
$(window).scroll(function(){
      "use strict"; // Start of use strict

      // Smooth scrolling using jQuery easing
      $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: (target.offset().top - 54)
            }, 1000, "easeInOutExpo");
            return false;
          }
        }
      });

      // Closes responsive menu when a scroll trigger link is clicked
      $('.js-scroll-trigger').click(function() {
          $('.navbar-collapse').collapse('hide');
      });
      $('body').scrollspy({ target: '#mainNav', offset: 54})
      // Collapse Navbar
      var nav = $('#mainNav');
      var navbarCollapse = function() {
        if (nav.offset().top > 90) {
          $("#mainNav").addClass("navbar-shrink");
        }else {
          $("#mainNav").removeClass("navbar-shrink");
          // Collapse now if page is not at top
        }
      };
      navbarCollapse();
 });
