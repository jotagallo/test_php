function parseMenuArray(element) {
  var array = new Array();
  var items = $(element).children();
  var i = 0;
  items.each(function(){
    var childs = $(items[i]).children();
    if (childs.length == 2) {
      obj = {'title': $(childs[0]).html(), 'href': $(childs[0]).attr('data-href'), 'child': parseMenuArray($(childs[1]))};
    } else {
      obj = {'title': $(childs[0]).html(), 'href': $(childs[0]).attr('data-href')};
    }
    array.push(obj);
    i++;
  });

  return array;
}

$(document).ready(function(){
  $('.btn-edit').click(function(){
    $('.edit-area').show();
    $('.btn-save-wrapper').show();
  });
  $('.btn-save').click(function(){
//   $('#serialized').val(parseMenuArray($('.edit-wrapper ol.sortable')));
   console.log(parseMenuArray($('.edit-wrapper ol.sortable')));
   return false;
  });
  $('.sortable').nestedSortable({
    handle: 'div',
    items: 'li',
    toleranceElement: '> div'
  });
});
