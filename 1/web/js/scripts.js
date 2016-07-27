function parseMenuArray(element) {
  var menu = {};
  var items = $(element).children();
  var i = 0;
  items.each(function(){
    var childs = $(items[i]).children();
    if (childs.length == 2) {
      obj = {'title': $(childs[0]).html(), 'href': $(childs[0]).attr('data-href'), 'child': parseMenuArray($(childs[1]))};
    } else {
      obj = {'title': $(childs[0]).html(), 'href': $(childs[0]).attr('data-href')};
    }
    menu[i] = obj;
    i++;
  });

  return JSON.stringify(menu);
}

function bindSortable() {
  $('.sortable').nestedSortable({
    handle: 'div',
    items: 'li',
    toleranceElement: '> div'
  });
  $('span.close').click(function(){
    $(this).closest('li').remove();
  });
}

$(document).ready(function(){
  $('.btn-edit').click(function(){
    $('.edit-area').show();
    $('.btn-save-wrapper').show();
  });
  $('.btn-save').click(function(){
    $('span.close').each(function(){
      $(this).remove();
    });
   $('#serialized').val(parseMenuArray($('.edit-wrapper ol.sortable')));
    return true;
   });

  $('.link-add').click(function(){
    var title = $('.link-title').val();
    var href = $('.link-href').val();
    var mkp = '<li class="mjs-nestedSortable-leaf" style="display: list-item;"><div data-href="/'+href+'" class="ui-sortable-handle">'+title+'<span class="close">X</span></div></li>';
    $('.sortable').append(mkp);
    bindSortable();
  });

  bindSortable();
});
