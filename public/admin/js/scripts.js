$(document).ready(function(){
  menuAdmin();
  duplicar();
  excluir();
  ordenacao();
  buscaProdutos();
  activeCheckbox();
});

function activeCheckbox(){
  $('input.ativo').change(function(event) {
    if($(this).prop('checked')){
      // $(this).prop('checked', true);
      $('input.ativo-hidden').val('1');
    }
    else{
      // $(this).prop('checked', false);
      $('input.ativo-hidden').val('0');
    }
  });
}



function buscaProdutos(){
  $("#txtBusca").keyup(function(){
    var texto = $(this).val();

    $("#ulItens li").css("display", "block");
    $("#ulItens li").each(function(){
      if($(this).children().text().toUpperCase().indexOf(texto.toUpperCase()) < 0)
        $(this).css("display", "none");
    });
  });
}
  


function ordenacao(){
  
  
  $(".sortable.linhas").sortable({
        connectWith: ".sortable",
        placeholder: 'dragHelper',
        scroll: true,
        revert: true,
        cursor: "move",
        update: function(event, ui) {
          var cad_id_item_list = $(this).sortable('toArray').toString();
          
          var cont = 1;
          $(this).children().each(function(index, el) {

            // $(this).children().val(index);
            
          });
            
        },
        start: function( event, ui ) {
                                        
        },
        stop: function( event, ui ) {
             
        }
    });

    $(".sortable.produtos").sortable({
        connectWith: ".sortable",
        placeholder: 'dragHelper',
        scroll: true,
        revert: true,
        cursor: "move",
        update: function(event, ui) {
          var cad_id_item_list = $(this).sortable('toArray').toString();
          // console.log(cad_id_item_list);
          var cont = 1;
          $(this).children().each(function(index, el) {

            $(this).children().val(index);
            
          });
            
        },
        start: function( event, ui ) {
                                        
        },
        stop: function( event, ui ) {
             
        }
    });

    $(".sortable.image").sortable({
        connectWith: ".sortable",
        placeholder: 'dragHelper',
        scroll: true,
        revert: true,
        cursor: "move",
        update: function(event, ui) {
          var cad_id_item_list = $(this).sortable('toArray').toString();
          // // console.log(cad_id_item_list);

          // var cont = 1;
          // $(this).children().each(function(index, el) {

          //   $(this).children().val(index);
            
          // });
            
        },
        start: function( event, ui ) {
                                        
        },
        stop: function( event, ui ) {
             
        }
    });

}


function menuAdmin(){

  $('#main-menu-wrapper li a').click(function(){

    $(this).next().toggle();
    $('#main-menu-wrapper li a').removeClass('open');
  $(this).parent().toggleClass('open');

  });

  $('li .sub-menu a').click(function(){
    // $('li .sub-menu a').removeClass('active');
    // $(this).addClass('active');
  });

}

function duplicar(){
  i = 1;
  $(".maisImagens").click(function(){
    i++;
    $(".imagensGaleria").after('<div><input type="file" name="img'+i+'" class="addImage form-control" /></div>');
  });
  
  $(".duplicar").click(function(){
    console.log($(this).parent().find('.cadastroMultiplo').html());
    $(this).parent().find('.cadastroMultiplo').after($(this).parent().find('.cadastroMultiplo').html());
  });
}

function excluir(){
  $(".excluir").click(function(){

    var item = $(this).parent();
    if (confirm('Deseja excluir?')){
      
      // if($(this).data('filtro')){
      $.ajax({
        url: site_url+'admin/painel/deleteOrder/'+$(this).data('order'),
        type: 'POST',
        data : {ajax: true},
        dataType : "html",
        async: true,
        success : function(sucesso) {
          // if (sucesso) {
          //   alert(sucesso);
          //   // item.hide();
          // } else {
          //   alert('Erro ao excluir. Tente mais tarde.');
          // }
        }
      });
      // }

      $.ajax({
        url: site_url+'admin/painel/deletar/'+$(this).data('conteudo')+'/'+$(this).data('id'),
        type: 'POST',
        data : {ajax: true},
        dataType : "html",
        async: true,
        success : function(sucesso) {
          if (sucesso) {
            alert(sucesso);
            item.hide();
          } else {
            alert('Erro ao excluir. Tente mais tarde.');
          }
        }
      });
    }
  });
  $('.imagem-linha').hide();
  $(".excluirImagem").click(function(){
    if (confirm('Após, clique em salvar ("ENVIAR")')){
      var item = $(this).parent();
      item.find('input').val('');
      item.hide();

      $('.imagem-linha').show();

    };
  });
}