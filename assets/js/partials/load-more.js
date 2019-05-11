if ($('.load-more-posts').length ) {
  var page = 1,
      ppp = 9;

  $('.load-more-posts').on('click', function(e){
    e.preventDefault();
    if ( parseInt($(this).attr('data-ppp')) ) {
      ppp = parseInt($(this).attr('data-ppp'));
    }
    $(this).addClass('hidden');
    $.post(ajaxUrl, {
      action:'more_post_ajax',
      offset: (page * ppp),
      ppp: ppp
    }).success(function(posts){
      page++;
      if( posts.length ) {
        $('.posts-area').append(posts); //where the content gets filled in
        equal_height_run();
      }
      if( posts.length == 9 ) {
        $('.load-more-posts').removeClass('hidden');
      }
    });
  });
}
