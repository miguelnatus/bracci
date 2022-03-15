<section class="section page-infos">
   <div class="container">
      <h1 class="page-infos__title"><?php echo $produtos[0]->{lang($lang,'filtro_nome')}; ?></h1>
      <p class="page-infos__description"><?php if(isset($produtos[0]->filtro_descricao)){ echo line($produtos[0]->{lang($lang,'filtro_descricao')}); } ?></p>
   </div>
</section>



<?php $imagem =  $produtos[0]->filtro_imagem; ?>
<?php $linha = '';?>

<section class="section product-list">
   <div class="container">
      <div class="columns is-multiline is-mobile product-list__line">
        
         <div class="columns is-multiline is-mobile">
   
            <?php foreach($produtos as $key => $value):  ?>
               <?php if($value->{lang($lang,'linha_nome')}!=$linha): $linha=$value->{lang($lang,'linha_nome')}; ?>
                  <div class="container list-title">
                     <h2 class="product-list__title"><?php echo $value->{lang($lang,'linha_nome')}; ?></h2>
                  </div>
               <?php endif; ?>
                     <div class="column is-half-mobile is-half-tablet is-half-desktop">
                        <div itemscope="" itemprop="itemListElement" itemtype="http://schema.org/Product" class="product-list__product">
                           <a class="" href="<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'produto_nome')}); ?>">
                              <div class="product-list__product__image-block">
                                 <figure class="image product-list__product__image-block__image">
                                    <img src="<?php echo url_test($value->produto_imagem); ?>" alt="<?php echo $value->referencia; ?>" itemprop="image"> 
                                 </figure>
                              </div>
                              <div class="product-list__product__info-block">
                                 <div style="margin-bottom: 22px;">
                                    <div class="product-list__product__titles">
                                       <h3 class="product-list__product__titles__name" itemprop="name"><?php echo $value->{lang($lang,'produto_nome')}; ?></h3>
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
                                             <?php if(is_numeric(substr($value->referencia,-1))): ?>
                                                <?php foreach ($value->acabamentos as $acab): ?>
                                                   <?php if(is_numeric(substr($acab->referencia,-1))): ?>
                                                   <a href="<?php echo get_link($lang,$acab->referencia,$acab->{lang($lang,'nome')}); ?>" class="product-list__product__infos__finishes__image">
                                                      <img class="product-list__product__infos__finishes__image" src="<?php echo url_test($acab->imagem); ?>" alt="<?php echo $acab->filtro_nome; ?>" title="<?php echo $acab->filtro_nome; ?>">
                                                   </a>
                                                   <?php endif; ?>
                                                <?php endforeach; ?>
                                             <?php else: ?>
                                                <?php foreach ($value->acabamentos as $acab): ?>
                                                   <?php if(!is_numeric(substr($acab->referencia,-1))): ?>
                                                   <a href="<?php echo get_link($lang,$acab->referencia,$acab->{lang($lang,'nome')}); ?>" class="product-list__product__infos__finishes__image">
                                                      <img class="product-list__product__infos__finishes__image" src="<?php echo url_test($acab->imagem); ?>" alt="<?php echo $acab->filtro_nome; ?>" title="<?php echo $acab->filtro_nome; ?>">
                                                   </a>
                                                   <?php endif; ?>
                                                <?php endforeach; ?>
                                             <?php endif; ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="cta cta--small cd-add-to-cart" data-prod='{"<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'produto_nome')}); ?>": {"title": "<?php echo $value->{lang($lang,'produto_nome')}; ?>", "image": "<?php echo url_test($value->produto_imagem); ?>",  "ref": "<?php echo $value->referencia; ?>" }}' >Adicionar ao Orçamento</button> 
                                 <button class="product-list__product__see-more visible-xs"><a class="" href="<?php echo get_link($lang,$value->referencia,$value->{lang($lang,'produto_nome')}); ?>">Ver mais</a></button> 
                              </div>
                           </a>
                        </div>
                     </div>

            <?php endforeach; ?>
         </div>
      </div>     
   </div>
</section>




