var equal_height_run = function() {
  $('[data-equal-height-watch]').css('height', 'auto');

  if ($(window).width() > 767) {
    $('[data-equal-height]').each(function() {
      var $this = $(this),
          previousHeight = 0,
          currentHeight = 0,
          largestHeight = 0;

      $this.find($('[data-equal-height-watch]')).each(function() {
        currentHeight = $(this).outerHeight();
        if (currentHeight > largestHeight) largestHeight = currentHeight;
        previousHeight = currentHeight;
      });

      $this.find($('[data-equal-height-watch]')).each(function() {
        $(this).outerHeight(largestHeight);
      });
    });
  }
}

var equal_height = function() {

  equal_height_run();

  $(window).on('resize', equal_height_run);
}; // var equal_height

equal_height();
