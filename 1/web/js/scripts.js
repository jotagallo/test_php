$(document).ready(function(){
  $('.btn-edit').click(function(){
    $('.edit-area').show();
    $('.btn-save-wrapper').show();
  });
  $('.btn-save').click(function(){
   $('#serialized').val($('.edit-wrapper').html());
   return true;
  });
  $('.sortable').nestedSortable({
    handle: 'div',
    items: 'li',
    toleranceElement: '> div'
  });
});

