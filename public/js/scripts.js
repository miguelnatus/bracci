$(document).ready(function(){

  // console.log(url+lang+"/orcamento/enviar/");
  var cartWrapper = $('.cd-cart-container');


  var cartBody = cartWrapper.find('.body');
  var cartList = cartBody.find('ul').eq(0);
  var cartTrigger = cartWrapper.children('.cd-cart-trigger');
  var cartCount = cartTrigger.children('.count');
  var addToCartBtn = $('.cd-add-to-cart');
  var checkoutBtn = $('.checkout');
  var checkoutForm = $('.cart-form');
  var sendBtn = $('.send');
  var cartMessage = $('.cart-message');
  var body = $('body');

  menu();
  slide();
  ondeComprar();
  cart();
  modal();
  populateCart();
  quickUpdateCart();
  googleTrack();
  orcamento();

  $('.body ul').on('click', '.delete-item', function (event) {
      // alert(event.target);
      event.preventDefault();
      removeProduct($(event.target).parents('.product'));
  });

});


function addProduct(prod) {
  if (storageAvailable('localStorage')) {
    if (!localStorage.getItem('cart')) {
      prod[Object.keys(prod)[0]]['quantity'] = 1;
      localStorage.setItem('cart', JSON.stringify(prod));
    } else {
      var cart = JSON.parse(localStorage.getItem('cart'));
      if (cart.hasOwnProperty(Object.keys(prod)[0])) {
        if (cart[Object.keys(prod)[0]]['quantity'] < 9) {
          cart[Object.keys(prod)[0]]['quantity'] += 1;
        }
      } else {
        cart[Object.keys(prod)[0]] = prod[Object.keys(prod)[0]];
        cart[Object.keys(prod)[0]]['quantity'] = 1;
      }
      localStorage.setItem('cart', JSON.stringify(cart));
    }
    // alert(1);
    populateCart();
  } else {
    // Redireciona para o Contato
  }
}

function removeProduct(product) {
  var topPosition = product.offset().top - $('.body').children('ul').offset().top;

  product.css('top', topPosition + 'px').addClass('deleted');

  var cart = JSON.parse(localStorage.getItem('cart'));
  delete cart[$(product).data('prod')];
  localStorage.setItem('cart', JSON.stringify(cart));

  $('.body ul').find('.deleted').remove();
  quickUpdateCart();
}

function quickUpdateCart() {
  var quantity = 0;
  // alert($(window).width());

  $('.body ul').children('li:not(.deleted)').each(function () {
    var singleQuantity = Number(
      $(this)
        .find('select')
        .val()
    );
    quantity = quantity + singleQuantity;
  });

  console.log(quantity);
  // alert(quantity);
  if($(window).width()>767){
    if(quantity>0){
      $('.whatsapp-button').css('right','15%');
      $('.cd-cart-container').show();
    }
    else{
      $('.whatsapp-button').css('right','5%');
      $('.cd-cart-container').hide();
    }
  }
  else{
    if(quantity>0){
      $('.whatsapp-button').css('right','25%');
      $('.cd-cart-container').show();
    }
    else{
      $('.whatsapp-button').css('right','5%');
      $('.cd-cart-container').hide();
    }
  }

  // $('ul.count').text(quantity);

  $('.count')
    .find('li')
    .eq(0)
    .text(quantity);
  $('.count')
    .find('li')
    .eq(1)
    .text(quantity + 1);
}

function populateCart() {
  var productAdded = '';
  var cart = JSON.parse(localStorage.getItem('cart'));
  // console.log(cart);
  // onclick="removeProduct();"
  for (var key in cart) {
    console.log(cart[key].image);
    productAdded +=
      '<li class="product" data-prod="' +
      key +
      '"><div class="product-image"><a href="/' +
      key +
      '"><img src="' +
      cart[key].image +
      '" alt="placeholder"></a></div><div class="product-details"><h3><a href="' +
      key +
      '">' +
      cart[key].title +
      '</a></h3><div class="actions"><a href="#0"  class="delete-item">Deletar</a><div class="quantity"><label for="cd-product-' +
      key +
      '">Qtd</label><span class="select-quantity"><select id="cd-product-' +
      key +
      '" data-prod="' +
      key +
      '" name="quantity"><option value="1"' +
      compareQuantity(cart[key].quantity, 1) +
      '>1</option><option value="2"' +
      compareQuantity(cart[key].quantity, 2) +
      '>2</option><option value="3"' +
      compareQuantity(cart[key].quantity, 3) +
      '>3</option><option value="4"' +
      compareQuantity(cart[key].quantity, 4) +
      '>4</option><option value="5"' +
      compareQuantity(cart[key].quantity, 5) +
      '>5</option><option value="6"' +
      compareQuantity(cart[key].quantity, 6) +
      '>6</option><option value="7"' +
      compareQuantity(cart[key].quantity, 7) +
      '>7</option><option value="8"' +
      compareQuantity(cart[key].quantity, 8) +
      '>8</option><option value="9"' +
      compareQuantity(cart[key].quantity, 9) +
      '>9</option></select></span></div></div></div></li>';
  }
  $('.body ul').html(productAdded);



}

function compareQuantity(a, b) {
  // alert(1);
  if (a == b) {
    return 'selected';
  } else {
    return '';
  }
}

function storageAvailable(type) {
  try {
    var storage = window[type],
      x = '__storage_test__';
    storage.setItem(x, x);
    storage.removeItem(x);
    return true;
  } catch (e) {
    return (
      e instanceof DOMException &&
      // everything except Firefox
      (e.code === 22 ||
        // Firefox
        e.code === 1014 ||
        // test name field too, because code might not be present
        // everything except Firefox
        e.name === 'QuotaExceededError' ||
        // Firefox
        e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
      // acknowledge QuotaExceededError only if there's something already stored
      storage.length !== 0
    );
  }
}

function modal(){
    $('#search-icon').click(function(event) {
       $('#search-modal').addClass('is-active')
    });

    $('.modal-background,button.modal-close.is-large').click(function(event) {
        // alert(1);
       $('#search-modal').removeClass('is-active');
    });
}

$('input.search-input').typeahead({

    source:  function (query, process) {

      setTimeout(function() {

        return $.get(url+'/'+lang+'/search', { query: query }, function (data) {
          $('.search-result').html(data);
        });

      }, 500);


    }
});

function cart(){

  $('.cd-add-to-cart,.adicionar').on('click', function (event) {
    $('.cd-cart-container').removeClass('cart-open');
    $('.cart-message').addClass('cart-message-open');
    setTimeout(function () {
      $('.cart-message').removeClass('cart-message-open');
    }, 2000);
    event.preventDefault();
    addProduct($(this).data('prod'));

    quickUpdateCart();
  });



  $('.cd-cart-trigger').click(function(){

      $('.cd-cart-container').toggleClass('cart-open');
      $('.cd-cart-trigger').toggleClass('opacity');
      $('.cd-cart ul').show();
  });

  $('a.checkout.btn').click(function(event) {
      $('.cd-cart ul').hide();
      $('#orcamento').show();
      $(this).hide();
      $('input.send').show();
  });


}

function orcamento(){

  $('a.checkout.btn').click(function(){
    // alert(1);
    var cart = JSON.parse(localStorage.getItem('cart'));
    var inputs = '';

    for (var key in cart) {
      inputs +=
        '<a href= ' +
        key +
        ' style= color:#000; >' +
        cart[key].title + ' - ' + cart[key].ref + ' - Qtd: ' + cart[key].quantity +
        '</a><br/><br/>';
    }

  
    var input = '<input type="hidden" value="'+inputs+'" name="produto" />';

    $("form#orcamento").append(input);

  });


  $('.send.btn').click( async () => {
      window.location.href = "thankyou.php";

      var nome  = $('.input.nome').val();
      var email = $('.input.whats-email').val();
      var cidade = $('.input.cidade').val();
      var msg   = $('.textarea.mensagem').val();

      $('.input.produtos').val(localStorage.getItem('cart'));

      /* Validando */
      if(nome.length <= 3){
          alert('Informe seu nome');
          return false;
      }
      if(email.length <= 5){
          alert('Informe seu email');
          return false;
      }
      if(cidade.length <= 3){
          alert('Informe a sua cidade');
          return false;
      }

      // var cart_products = '<table width="" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid #eee; padding: 0 0 20px 0; margin: 0 0 20px 0;">';
      var cart_products = '';

      var inputs = '';
      
      // var cart = JSON.parse(localStorage.getItem('cart'));

      // for (var key in cart) {
      //   inputs += 
      //   '<input type="text" value="'+key+'" name="url" />' + 
      //   '<input type="text" value="'+cart[key].title+'" name="nome" />' +
      //   '<input type="text" value="'+cart[key].quantity+'" name="qtd" />' +

      //   ;
          
      // }

      // $("#retornoHTML").html(data);

      for (var key in cart) {
        cart_products +=
          '<a href="' +
          key +
          '" style="color:#000;">' +
          cart[key].title + ' - ' + cart[key].ref + ' - Qtd: ' + cart[key].quantity +
          '</a><br/>';
      }

      const utm_source = localStorage.getItem('utm_source');

      var urlData = "&nome=" + nome +
      "&email=" + email +
      "&cidade=" + cidade +
      "&produto=" + cart_products +
      "&msg=" + msg;
      // "&utm_source=" + utm_source;

      console.log(urlData);

      localStorage.removeItem('cart');
      // $.ajax({
      //    type: "POST",
      //    url: url+lang+"/orcamento/enviar/",
      //    async: true,
      //    data: urlData,
      //    success: function(data) {
      //     $('#retornoHTML').html(data);

      //    },
      //    beforeSend: function() {
      //     $('.loading').fadeIn('fast');
      //    },
      //    complete: function(){
      //     localStorage.removeItem('cart');

      //     $('.loading').fadeOut('fast');

      //    }
      // })
      // .done(function(data){
      //   $("#retornoHTML").html(data);

      // })
      // .fail(function(jqXHR, textStatus, msg){

      //   console.log(msg);
      // });
  });
}

function menu(){
  $('.navbar-burger').click(function(){
    $('.menu-desk,#menu-end').toggleClass('is-active');
    $('.navbar-burger').toggleClass('h-active');
  });

}

function ondeComprar(){

  $('.showroom-btn').click(function(){
    $(this).addClass('tab-list__tab--active');
    $('.showroom').addClass('tab-list__section--active');
    $('.venda-direta').removeClass('tab-list__section--active');
    $('.onde-comprar-btn').removeClass('tab-list__tab--active');
  });

  $('.onde-comprar-btn').click(function(){
    $(this).addClass('tab-list__tab--active');
    $('.showroom').removeClass('tab-list__section--active');
    $('.venda-direta').addClass('tab-list__section--active');
    $('.showroom-btn').removeClass('tab-list__tab--active');
  });

}

function slide(){


  var itemWidth = window.innerWidth/7;

  if($(window).width()<=768){
    $("#carousel").flexslider({
      animation: "slide",
      controlNav: false,
      directionNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: itemWidth,
      // minItems: 10,
      // maxItems: 18,
      itemMargin: 3,
      asNavFor: "#slider"
    });
  }
  else{
    $("#carousel").flexslider({
      animation: "slide",
      controlNav: false,
      directionNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: 120,
      minItems: 18,
      maxItems: 18,
      itemMargin: 2,
      asNavFor: "#slider"
    });
  }



  $("#slider").flexslider({
    touch: true,
    controlNav: false,
    directionNav: true,
    slideshowSpeed: 6000,
    animation: "slide",
    animationSpeed: 600,
    initDelay: 0,
    sync: "#carousel",
    prevText: " ",
    nextText: " ",
    before: function(slider) {
      // Fires asynchronously with each slider animation
      var slides = slider.slides,
        index = slider.animatingTo,
        $slide = $(slides[index]),
        $img = $slide.find("img[data-src]"),
        current = index,
        nxt_slide = current + 1,
        prev_slide = current - 1;

      $slide
        .parent()
        .find(
          "img.lazy:eq(" +
            current +
            "), img.lazy:eq(" +
            prev_slide +
            "), img.lazy:eq(" +
            nxt_slide +
            ")"
        )
        .each(function() {
          var src = $(this).attr("data-src");
          $(this)
            .attr("src", src)
            .removeAttr("data-src");
        });
    }
  });

  $(".clone a").removeAttr("data-fancybox");

  $('[data-fancybox="gallery"]').fancybox({
    loop: true,
    buttons: ["zoom", "share", "close"],
    idleTime: false
  });

  $('[data-fancybox="3d"]').fancybox({
    idleTime: false,
    iframe: {
      css: {
        width: "1000px",
        height: "600px",
        "max-width": "80%",
        "max-height": "80%"
      },
      preload: false
    }
  });


}

function googleTrack() {
  const url = window.location.toString();
  const googleSource = url.includes('utm_source=Google');

  if (googleSource) {
    localStorage.setItem('utm_source', 'Google');
  }
}
