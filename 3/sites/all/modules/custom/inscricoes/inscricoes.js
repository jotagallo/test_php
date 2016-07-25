(function($, Drupal)
{
  Drupal.behaviors.inscricoes = {
    attach:function(){
      $('.botao-inscricao').click(function(e){
        e.preventDefault();
        $.ajax({url: "/ajax/inscricao", dataType: 'json',
          success: function(result){
            $.colorbox({html:result.data});
            $('#cboxLoadedContent form.node-inscricao-form input.form-submit').click(function(e){
              e.preventDefault();
              if ($('#cboxLoadedContent form.node-inscricao-form #edit-title').val() == '' ||
                      $('#cboxLoadedContent form.node-inscricao-form #edit-field-sobrenome-und-0-value').val() == '') {
                        alert('Por favor, preencha os campos obrigatórios');
              } else {
                Drupal.behaviors.inscricoes.submit($('#cboxLoadedContent form.node-inscricao-form').serialize());
              }
              return false;

            });
          }
        });
      });
      return false;
    },
    submit:function(form) {
      $.ajax({url: "/ajax/inscricao/add", dataType: 'json', type: 'POST', data: form,
        success: function(result){
          if (result.data) {
            var nome = $('#cboxLoadedContent form.node-inscricao-form #edit-title').val();
            var sobrenome = $('#cboxLoadedContent form.node-inscricao-form #edit-field-sobrenome-und-0-value').val();
            $('#cboxClose').click();
            $('#content .content').html('<div class="inscricao>"<h4>Nome: '+nome+'<br /><h4>Sobrenome: '+sobrenome+'</br /></div>');
          } else {
            alert('Houve um erro ao salvar. Tente novamente.');
          }
        },
      });
    }
  };
}(jQuery, Drupal));