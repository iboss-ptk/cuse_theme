$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 100
        }, 1000);
        return false;
      }
    }
  });
});

var id = "";
function update_sidebar(tile_list, scrollTop, offset){
  var min = Number.POSITIVE_INFINITY;
  // find the top not passed element
  for (var i = tile_list.length - 1; i >= 0; i--) {
    var elem = tile_list[i];
    var is_passed = scrollTop > elem.top + elem.height - offset;
    if(is_passed) continue;
    min_canidate = elem.top - scrollTop
    if(min_canidate < min) {
      min = min_canidate;
      id = elem.id;
    }
  };
  return id;
}

function highlight_sidebar() {
  var st = $(this).scrollTop();
  var offset = 300;
  var current_highlight = "." + update_sidebar(tile_list, st, offset);
  if (current_highlight != last_highlight) {
    $('.present').removeClass('present');
    console.log($(current_highlight).addClass('present'));
    last_highlight = current_highlight;
  }
}

var tile_list = [];
var current_highlight = "";
var last_highlight = "";

$(document).ready(function(){
  var tile = $('.tile');
  for (var i = tile.length - 1; i >= 0; i--) {
    var tile_element = {
      "id": $(tile[i]).attr('id'),
      "jQuery_object": $(tile[i]),
      "top": $(tile[i]).offset().top,
      "height": $(tile[i]).height()
    };
    tile_list.push(tile_element);
  };
  highlight_sidebar();
  console.log(tile_list);
});

$(document).scroll(function(){
  highlight_sidebar();
});