
/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

 (function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
      $(document).foundation({
        topbar : {
            custom_back_text: true,
            back_text: "<i class='fi-arrow-left'></i> BACK"
          }
      }); // Initialize foundation JS for all pages
      var wpadminh = $('#wpadminbar').css("height");
      $('.wpam-debug').css({ height: wpadminh });
      $(window).resize(function() {
        var wpadminh = $('#wpadminbar').css("height");
        $('.wpam-debug').css({ height: wpadminh });
      });

      // hide nav on scroll down

    }
  },

  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
      // height equal viewport

      if ( $(".img-container img").css("height") < $(".img-container img").css("width") ) {
          $(".img-container").addClass("fit-horizontal");
      } else {
        $(".img-container").addClass("fit-vertical");
      }

      // this section is only for test purpose
      // ===== BEGIN =====
      //! jQuery Instagram - v0.3.1 - 2014-06-19
      !function(a){function b(b){var c="https://api.instagram.com/v1",d={};if(null==b.accessToken&&null==b.clientId)throw"You must provide an access token or a client id";if(d=a.extend(d,{access_token:b.accessToken||"",client_id:b.clientId||"",count:b.count||""}),null!=b.url)c=b.url;else if(null!=b.hash)c+="/tags/"+b.hash+"/media/recent";else if(null!=b.search)c+="/media/search",d=a.extend(d,b.search);else if(null!=b.userId){if(null==b.accessToken)throw"You must provide an access token";c+="/users/"+b.userId+"/media/recent"}else null!=b.location?(c+="/locations/"+b.location.id+"/media/recent",delete b.location.id,d=a.extend(d,b.location)):c+="/media/popular";return{url:c,data:d}}a.fn.instagram=function(c){var d=this;c=a.extend({},a.fn.instagram.defaults,c);var e=b(c);return a.ajax({dataType:"jsonp",url:e.url,data:e.data,success:function(a){d.trigger("didLoadInstagram",a)}}),this.trigger("willLoadInstagram",c),this},a.fn.instagram.defaults={accessToken:null,clientId:null,count:null,url:null,hash:null,userId:null,location:null,search:null}}(jQuery);
      // ====== END ======


      $('.instagram').on('willLoadInstagram', function(event, options) {
        // console.log(options);
      });
      $('.instagram').on('didLoadInstagram', function(event, response) {
        var igfeed = response.data;
        var igimgcount = 6;
        for (var i = igfeed.length - 1; i >= 0; i--) {
          if ( igimgcount <= 0 ) break;
          igimgcount--;
            if ( igfeed[i].images !== undefined ) { 
              var imgurl = igfeed[i].images.standard_resolution.url;
              // console.log("image");
              // console.log(igfeed[i]);
              $('.instagram').append("<a href='" + igfeed[i].link + "' target='_blank'><img class='small-6 no-pad' id='"+ igfeed[i].id +"' src = '" + imgurl + "'></img></a>")
            }
            else if ( igfeed[i].video !== undefined ) console.log("video");
        };
      });
      $('.instagram').instagram({
        // hashtag
        hash: 'cityscape',
        clientId: '77995f907c4348909e35165138fd2e62'
      });
      
      function meet_viewport_height(element) {
        var vp_height = $(window).height();
        $(element).css({ height: vp_height });
      }

      $(document).ready(function(){
        meet_viewport_height('#header');
        meet_viewport_height('#header-overlay');
        $('#header-overlay').css({ opacity: 0.5 });
      });

      $(window).resize(function() {
        meet_viewport_height('#header');
        meet_viewport_height('#header-overlay');
      });

      $(window).scroll(function(){
        // navbar trasition
        var scroll = $(window).scrollTop();
        // var scroll_bound = 500;

        // if (scroll > scroll_bound ) {
        //   $('nav').addClass('scrolled');
        // }

        // if (scroll <= scroll_bound ) {
        //   $('nav').removeClass('scrolled');
        // }

        // parallax section
        var $bgobj = $('header[data-type="background"]')
        var yPos = -($(window).scrollTop() / $bgobj.data('speed'));
        var coords = '50% '+ yPos + 'px';
        $bgobj.css({ backgroundPosition: coords });

        // header overlay
        var $overlay = $('.overlay');
        var header_height = $(window).height();
        var transparency = 0.5+(scroll/(5*header_height));
        $overlay.css({ opacity: transparency });
      });
    },

  },

  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
      console.log('x');
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
