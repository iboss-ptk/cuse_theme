(function () {
    'use strict'
     
    var app = angular.module('application', []);
     
    app.controller('storeController', function ($scope) {
    	$scope.a = "kkk"
    });


// masonry

var container = document.querySelector('#container');
console.log(container);
var msnry = new Masonry( container, {
  // options...
  itemSelector: '.item',
  columnWidth: '.item',
  isFitWidth: true,
  gutter: '.gutter-sizer'
});
msnry.layout();

msnry.on('layoutComplete',  function( msnryInstance, laidOutItems ) {

        var rightMost = 0;

        for (var i = 0; i < laidOutItems.length; i++) {
            var rightEdge = laidOutItems[i].size.outerWidth + laidOutItems[i].position.x;
            if (rightEdge > rightMost) rightMost = rightEdge;
        }

        rightMost -= msnryInstance.gutter;

        if (rightMost > msnryInstance.gutter) msnryInstance.element.style.width = rightMost + "px";

    });

msnry.off('layoutComplete',  function( msnryInstance, laidOutItems ) {
	
	msnry.layout();

});


})();