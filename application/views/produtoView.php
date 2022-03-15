<section class="section product-page__section">
   <div class="container product-page__wrapper">
      <section class="product-slider">
         <div class="section">
            <div class="container">
               <div id="slider" class="flexslider produto">
                  <div class="flex-viewport" style="">
                     <ul class="slides" style="">
                        <?php foreach ($imagens as $key => $value):  ?>
                        <li style="" class="flex-active-slide"> 
                        	<a data-fancybox="gallery" href="<?php echo url_test($value->imagem); ?>" title="<?php echo $produto->{lang($lang,'nome')}; ?>"> 
                        		<img src="<?php echo url_test($value->imagem); ?>" alt="<?php echo $produto->referencia; ?>" itemprop="image" draggable="false" class="lazy" > 
                        	</a> 
                        </li>

                        <?php endforeach; ?>

                     </ul>
                  </div>
                  <ul class="flex-direction-nav">
                     <li class="flex-nav-prev"><a class="flex-prev" href="#"> </a></li>
                     <li class="flex-nav-next"><a class="flex-next" href="#"> </a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div id="carousel" class="flexslider produto" >
               <ul class="slides" style="" >
                  <?php foreach ($imagens as $key => $value): ?>
                  <li style="" >
                     <div class="div-slide" > 
                     	<img src="<?php echo url_test($value->imagem); ?>" alt="<?php echo $produto->referencia; ?>" itemprop="image" draggable="false"> 
                     </div>
                  </li>
                  <?php endforeach; ?>
               </ul>
         </div>

      </section>
      <div class="product-page__main">
         <section class="product-page__section">
           <h1 class="product-page__title"><?php echo $produto->{lang($lang,'nome')}; ?></h1>
            <div class="product-list__product__infos">
               <div class="product-list__product__infos__code">
                  <h5 class="product-list__product__infos__title">Código</h5>
                  <h6 class="product-list__product__infos__subtitle" itemprop="sku"><?php echo $produto->referencia; ?></h6>
               </div>
               <div>
                  <?php if(isset($acab)): ?>
                  <h5 class="product-list__product__infos__title">Acabamentos</h5>
                  <div class="product-list__product__infos__finishes">
                     <?php foreach ($acab as $key => $value): ?>
                        <a href="<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'nome')}); ?>"> 
                           <img class="product-list__product__infos__finishes__image" src="<?php echo url_test($value->imagem); ?>" alt="<?php echo $value->filtro_nome; ?>" title="<?php echo $value->filtro_nome; ?>"> 
                        </a> 
                     <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
               </div> 
            </div>
         </section>
         <section class="product-page__section">
            <div class="">
               <h2 class="section-title section-title--small section-title--gray">Resumo do Produto</h2>
               <!-- <p><?php //echo line($produto->descricao); ?></p> -->
               <ul>
                  <?php echo line($descricao); ?>
               </ul>
               <ul>
                  <!-- <li><?php //echo line($produto->descricao); ?></li> -->
                  <!-- <li>Acabamento: <strong>Aço Escovado</strong></li>
                  <li>Utilização: Indicado para lavabos e banheiros</li>
                  <li>Indicação de quente e frio para melhor ajuste da temperatura</li>
                  <li>Comprimento da Bica: 13cm</li>
                  <li>Altura da Bica: 12,6cm</li>
                  <li>Furação necessária: 01 (35mm)</li>
                  <li>Bica Fixa</li>
                  <li>Conexão: G ½ (Padrão)</li> -->
               </ul>
            </div>
         </section>

         <section class="product-page__section product-page__section--no-mobile">
            <div class=""> 
               <a class="cta cd-add-to-cart cta--fixed-bottom" href="#" data-prod='{"<?php echo get_link($lang,$produto->referencia,$produto->{lang($lang,'nome')}); ?>": {"title": "<?php echo $produto->{lang($lang,'nome')}; ?>", "image": "<?php echo url_test($imagens[0]->imagem); ?>",  "ref": "<?php echo $produto->referencia; ?>" }}'>Adicionar ao Orçamento</a> 
            </div>
         </section>
      </div>
   </div>
</section>

<section class="section product-page__section">
   <div class="container">

      <?php if($produto->video!=null): ?>
      <h2 class="section-title section-title--small section-title--gray">Vídeo</h2>
      <iframe class="productVideo" width="100%" src="https://www.youtube.com/embed/<?php echo $produto->video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> 
      <a data-fancybox="video" data-type="iframe" data-src="https://www.youtube.com/embed/<?php echo $produto->video; ?>" href="javascript:;" class="button button_3d">
         <span class="icon has-text-danger">
            <svg class="svg-inline--fa fa-play fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
               <path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
            </svg>
            
         </span>
         <span>Assistir Vídeo</span> 
      </a>
      <?php endif; ?>
      <?php if($produto->modelo3d!=''): ?>
      <a href="<?php echo $produto->modelo3d; ?>" target="_blank" class="button button_3d">
         <span class="icon has-text-info">
            <svg class="svg-inline--fa fa-cube fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="cube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
               <path fill="currentColor" d="M239.1 6.3l-208 78c-18.7 7-31.1 25-31.1 45v225.1c0 18.2 10.3 34.8 26.5 42.9l208 104c13.5 6.8 29.4 6.8 42.9 0l208-104c16.3-8.1 26.5-24.8 26.5-42.9V129.3c0-20-12.4-37.9-31.1-44.9l-208-78C262 2.2 250 2.2 239.1 6.3zM256 68.4l192 72v1.1l-192 78-192-78v-1.1l192-72zm32 356V275.5l160-65v133.9l-160 80z"></path>
            </svg>
            
         </span>
         <span>Baixar bloco em 3D</span> 
      </a>
      <?php endif; ?>
   </div>
</section>

<section class="section product-page__section">
   <div class="container">
      <h2 class="section-title section-title--small section-title--gray"> Diferenciais </h2>
      <div class="features">
         <?php foreach ($diferenciais as $key => $value): ?>
         <div class="feature">
            <img class="feature__image" src="<?php echo url_test($value->imagem); ?>" alt="<?php echo $value->{lang($lang,'nome')}; ?>"> 
            <div>
               <h3 class="feature__title"><?php echo $value->{lang($lang,'nome')}; ?></h3>
            </div>
            <p class="feature__description"><?php echo $value->{lang($lang,'descricao')}; ?></p>
         </div>
         <?php endforeach; ?>
         
      </div>
   </div>
</section>

<section class="section product-page__section">
   <div class="container">
      <h2 class="section-title section-title--small section-title--gray"> Por que comprar BRACCI? </h2>
      <ul>
         <li>Produto de alto padrão com garantia de 05 anos</li>
         <li>Design italiano</li>
         <li>Assessoria na escolha e instalação dos produtos por nossa equipe de especialistas</li>
      </ul>
   </div>
</section>



<?php if(!empty($relacionados)): ?>
<section class="section product-list" style="background-color: #EAEAEA;">
   <div class="container">
      <h2 class="section-title section-title--small section-title--gray">Este produto combina com</h2>
      <div class="columns is-multiline is-mobile">
        
         <?php foreach($relacionados as $key => $value): ?>
         <div class="column is-half-mobile is-half-tablet is-half-desktop">
            <div itemscope="" itemprop="itemListElement" itemtype="http://schema.org/Product" class="product-list__product">
               <a class="productWidgetLink" href="<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'nome')}); ?>">
                  <div class="product-list__product__image-block">
                     <figure class="image product-list__product__image-block__image"> 
                        <img src="<?php echo url_test($value->imagem); ?>" alt="B01023BN" itemprop="image"> 
                     </figure>
                  </div>
                  <div class="product-list__product__info-block">
                     <div style="margin-bottom: 22px;">
                        <div class="product-list__product__titles">
                           <h3 class="product-list__product__titles__name" itemprop="name"><?php echo $value->{lang($lang,'nome')}; ?></h3>
                           <h4 class="product-list__product__titles__complement"></h4>
                        </div>
                        <div class="product-list__product__infos">
                           <div class="product-list__product__infos__code">
                              <h5 class="product-list__product__infos__title">Código</h5>
                              <h6 class="product-list__product__infos__subtitle" itemprop="sku"><?php echo $value->referencia; ?></h6>
                           </div>
                           <!-- <div>
                              <h5 class="product-list__product__infos__title">Acabamentos</h5>
                              <div class="product-list__product__infos__finishes"> 
                                 <img class="product-list__product__infos__finishes__image" src="<?php //echo base_url('public/img/acabamentos/acabamento-acoescovado.png'); ?>" alt="Aço Escovado" title="Aço Escovado"> 
                              </div>
                           </div>-->
                        </div> 
                     </div>
                     <button class="cta cta--small cd-add-to-cart" data-prod='{"<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'nome')}); ?>": {"title": "<?php echo $value->{lang($lang,'nome')}; ?>", "image": "<?php echo url_test($value->imagem); ?>",  "ref": "<?php echo $value->referencia; ?>" }}'>Adicionar ao Orçamento</button> 
                     <button class="product-list__product__see-more visible-xs">Ver mais</button> 
                  </div>
               </a>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>
<?php endif; ?>


