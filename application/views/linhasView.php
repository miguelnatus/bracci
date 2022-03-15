<section class="section page-infos">
   <div class="container">
      <?php //echo '<pre>'; print_r($linhas); ?>
      <h1 class="page-infos__title"><?php echo $linhas[0]->{lang($lang,'nome')}; ?></h1>
   </div>
</section>

<?php //$imagem = $sub_categorias->image; ?>
<?php
   // echo '<pre>';
   // print_r($acabamentos);
   // exit();
?>

<section class="section product-list">
   <div class="container">
      
            <h2 class="product-list__title">Produtos da Linha<?php //echo $value->{lang($lang,'title')}; ?></h2>
            
            <div class="columns is-multiline is-mobile product-list__line">
               <?php $produto_ref = ''; ?>  
               <?php foreach ($linhas as $key => $produto): ?>  
                  <?php //if($produto->produto_ref!=$produto_ref): ?>  
                     <div class="column is-half-mobile is-half-tablet is-half-desktop">
                        <div itemscope="" itemprop="itemListElement" itemtype="http://schema.org/Product" class="product-list__product">
                           <a class="" href="<?php echo get_link($lang,$produto->produto_ref,$produto->{lang($lang,'produto_nome')}); ?>">
                              <div class="product-list__product__image-block">
                                 <figure class="image product-list__product__image-block__image">
                                    <img src="<?php echo url_test($produto->produto_imagem); ?>" alt="<?php echo $produto->produto_ref; ?>" itemprop="image"> 
                                 </figure>
                              </div>
                              <div class="product-list__product__info-block">
                                 <div style="margin-bottom: 22px;">
                                    <div class="product-list__product__titles">
                                       <h3 class="product-list__product__titles__name" itemprop="name"><?php echo $produto->{lang($lang,'produto_nome')}; ?></h3>
                                       <!-- <h4 class="product-list__product__titles__complement"></h4> -->
                                    </div>
                                    <div class="product-list__product__infos">
                                       <div class="product-list__product__infos__code">
                                          <h5 class="product-list__product__infos__title">Código</h5>
                                          <h6 class="product-list__product__infos__subtitle" itemprop="sku"> <?php echo $produto->produto_ref; ?></h6>
                                       </div>
                                       
                                       <div>    
                                          <h5 class="product-list__product__infos__title">Acabamentos</h5>
                                          <div class="product-list__product__infos__finishes">
                                             <?php if(is_numeric(substr($produto->produto_ref,-1))): ?>
                                                <?php foreach ($produto->acabamentos as $acab): ?>
                                                   <?php if(is_numeric(substr($acab->referencia,-1))): ?>
                                                   <a href="<?php echo get_link($lang,$acab->referencia,$acab->{lang($lang,'nome')}); ?>" class="product-list__product__infos__finishes__image">
                                                      <img class="product-list__product__infos__finishes__image" src="<?php echo url_test($acab->imagem); ?>" alt="<?php echo $acab->filtro_nome; ?>" title="<?php echo $acab->filtro_nome; ?>">
                                                   </a>
                                                   <?php endif; ?>
                                                <?php endforeach; ?>
                                             <?php else: ?>
                                                <?php foreach ($produto->acabamentos as $acab): ?>
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
                                 <button class="cta cta--small cd-add-to-cart" data-prod='{"<?php echo get_link($lang,$produto->produto_ref,$produto->{lang($lang,'produto_nome')}); ?>": {"title": "<?php echo $produto->{lang($lang,'produto_nome')}; ?>", "image": "<?php echo url_test($produto->produto_imagem); ?>" ,  "ref": "<?php echo $produto->produto_ref; ?>"}}'>Adicionar ao Orçamento</button> 
                                 <button class="product-list__product__see-more visible-xs"><a class="" href="<?php echo get_link($lang,$produto->produto_ref,$produto->{lang($lang,'produto_nome')}); ?>">Ver mais</a></button> 
                              </div>
                           </a>
                        </div>
                     </div>

                  <?php //endif; //$produto_ref = $produto->produto_ref; ?>
               <?php endforeach; ?>  
            </div>
          
            
   </div>
</section>
