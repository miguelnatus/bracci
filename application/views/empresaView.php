<section class="section">
   <div class="container">
      <div class="columns">
         <div class="column is-6 col-sm-6">
            <div id="slider" class="flexslider empresa">
               <div class="flex-viewport" style="">
                  <ul class="slides" style="">

                     <li style="" class="flex-active-slide"> 
                     	<a data-fancybox="gallery" href="<?php echo base_url('public/img/uploads/empresa.jpeg'); ?>" title="Empresa" class="fancybox" rel="group"> 
                     		<img src="<?php echo base_url('public/img/uploads/empresa.jpeg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                     	</a> 
                     </li>

                    <li aria-hidden="true" style="">
                      <a data-fancybox="gallery" href="<?php echo base_url('public/img/goods-bracci1.jpg'); ?>" title="Empresa" class="fancybox" rel="group"> 
                        <img class="lazy" alt="Empresa" itemprop="image" draggable="false" src="<?php echo base_url('public/img/goods-bracci1.jpg'); ?>"> 
                      </a> 
                     </li>

                      <li style="" class=""> 
                        <a data-fancybox="gallery" data-fancybox="gallery" href="<?php echo base_url('public/img/uploads/whatsapp-image-2019-08-15-at-8.28.20-am.jpeg'); ?>" title="Empresa" class="fancybox" rel="group"> 
	                     	   <img class="lazy" alt="Empresa" itemprop="image" draggable="false" src="<?php echo base_url('public/img/uploads/whatsapp-image-2019-08-15-at-8.28.20-am.jpeg'); ?>"> 
	                      </a> 
                    	</li>

                    <li style="" class=""> 
                     	<a data-fancybox="gallery" href="<?php echo base_url('public/img/uploads/goodsbracci2.jpg'); ?>" title="Empresa" class="fancybox" rel="group"> 
                     		<img class="lazy" alt="Empresa" itemprop="image" draggable="false" src="<?php echo base_url('public/img/uploads/goodsbracci2.jpg'); ?>"> 
                     	</a> 
                    </li>

                    <li style="" class="clone" aria-hidden="true"> 
                    	<a data-fancybox="gallery" href="<?php echo base_url('public/img/uploads/empresa.jpeg'); ?>" title="Empresa" class="fancybox" rel="group"> 
                    		<img src="<?php echo base_url('public/img/uploads/empresa.jpeg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                    	</a> 
                    </li>

                  </ul>
               </div>
               <ul class="flex-direction-nav">
                  <li class="flex-nav-prev"><a class="flex-prev" href="#"> </a></li>
                  <li class="flex-nav-next"><a class="flex-next" href="#"> </a></li>
               </ul>
            </div>
            <div id="carousel" class="flexslider empresa">
               <div class="flex-viewport" style="">
                  <ul class="slides" style="">
                    <li style="" class="flex-active-slide">
                        <div> 
                          <img src="<?php echo base_url('public/img/uploads/empresa.jpeg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                        </div>
                     </li>
                     <li style="" class="">
                        <div> 
                          <img src="<?php echo base_url('public/img/goods-bracci1.jpg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                        </div>
                     </li>
                     
                     <li style="" class="">
                        <div> 
                          <img src="<?php echo base_url('public/img/uploads/whatsapp-image-2019-08-15-at-8.28.20-am.jpeg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                        </div>
                     </li>
                     <li style="" class="">
                        <div> 
                          <img src="<?php echo base_url('public/img/uploads/goodsbracci2.jpg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                        </div>
                     </li>
                     <li style="" class="">
                        <div> 
                          <img src="<?php echo base_url('public/img/uploads/empresa.jpeg'); ?>" alt="Empresa" itemprop="image" draggable="false"> 
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="column is-6 col-sm-6">
            <h1 class="title"><?php echo $content->{lang($lang,'title')}; ?></h1>
            <div class="content">
               <p><?php echo line($content->{lang($lang,'firstcontent')}); ?></p>
            </div>
         </div>
      </div>
      <div class="content col-sm-12">
         <p><strong><?php echo line($content->{lang($lang,'visao')}); ?></strong></p>
         <p><?php echo line($content->{lang($lang,'visao_content')}); ?></p>
         <p><strong><?php echo line($content->{lang($lang,'missao')}); ?></strong></p>
         <p><?php echo line($content->{lang($lang,'missao_content')}); ?></p>
         <p><strong><?php echo line($content->{lang($lang,'valores')}); ?></strong></p>
         <p><?php echo line($content->{lang($lang,'valores_content')}); ?></p>
      </div>
   </div>
</section>