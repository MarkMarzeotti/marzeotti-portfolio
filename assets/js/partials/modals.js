// instanciate new modal
var contentLocation,
  content,
  modal = new tingle.modal({
    closeMethods: ['overlay', 'escape']
  }),
  modalSmall = new tingle.modal({
    closeMethods: ['overlay', 'escape'],
    cssClass: ['small-modal']
  });

$('.modal, .modal a').click(function(e) {
  e.preventDefault();
  contentLocation = $(this).attr('href');
  content = $(contentLocation).html();
  if (content) {
    modal.setContent(content);
    modal.open();
    content = '';
  }
});

$('.modal-small, .modal-small a').click(function() {
  e.preventDefault();
  contentLocation = $(this).attr('href');
  content = $(contentLocation).html();
  if (content) {
    modalSmall.setContent(content);
    modalSmall.open();
    content = '';
  }
});
