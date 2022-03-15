<?php //echo '<pre>'; print_r($produtos); exit(); ?>
<?php //echo '<pre>'; print_r($linha); exit(); ?>
<section class="section page-infos">
   <div class="container">
      <h1 class="page-infos__title"><?php echo $acabamento_content->{lang($lang,'nome')}; ?></h1>
      <p class="page-infos__description"><?php echo line($acabamento_content->{lang($lang,'descricao')}); ?></p>
   </div>
</section>



<?php $imagem = $acabamento_content->imagem; ?>
<?php $linha = '';?>



<section class="section product-list">
   <div class="container">
      <div class="columns is-multiline is-mobile product-list__line">
        
         <div class="columns is-multiline is-mobile">
   
            <?php foreach($produtos as $key => $value):  ?>
               <?php if($value->{lang($lang,'linha')}!=$linha): $linha=$value->{lang($lang,'linha')}; ?>
                  <div class="container list-title">
                     <h2 class="product-list__title"><?php echo $value->{lang($lang,'linha')}; ?></h2>
                  </div>
               <?php endif; ?>
                  <?php //foreach ($produtos as $key => $value): ?>
                     <?php //if($value->pl_id==$linhas->linha_id): //echo $linhas->id; ?>
                     <div class="column is-half-mobile is-half-tablet is-half-desktop">
                        <div itemscope="" itemprop="itemListElement" itemtype="http://schema.org/Product" class="product-list__product">
                           <a class="productWidgetLink" href="<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'nome')}); ?>">
                              <div class="product-list__product__image-block">
                                 <figure class="image product-list__product__image-block__image">
                                    <img src="<?php echo url_test($value->produto_imagem); ?>" alt="<?php echo $value->referencia; ?>" itemprop="image"> 
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
                                       <div>
                                          <h5 class="product-list__product__infos__title">Acabamentos</h5>
                                          <div class="product-list__product__infos__finishes"> 
                                             <img class="product-list__product__infos__finishes__image" src="<?php echo url_test($imagem); ?>" alt="Aço Escovado" title="Aço Escovado"> 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="cta cta--small cd-add-to-cart" data-prod='{"<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'nome')}); ?>": {"title": "<?php echo $value->{lang($lang,'nome')}; ?>", "image": "<?php echo url_test($value->produto_imagem); ?>"}}' >Adicionar ao Orçamento</button> 
                                 <button class="product-list__product__see-more visible-xs"><?php echo get_link($lang,$value->referencia,$value->{lang($lang,'produto_nome')}); ?>">Ver mais</a></button> 
                              </div>
                           </a>
                        </div>
                     </div>
                     <?php //endif; ?>
                  <?php //endforeach; ?>
            <?php endforeach; ?>
         </div>
      </div>     
   </div>
</section>




