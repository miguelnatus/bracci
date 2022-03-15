<section class="section">
   <div class="container">
      <?php 
         
      ?>
      <div class="columns">
         <div class="column is-6">
            <div id="slider" class="flexslider">
               <div class="flex-viewport" style="">
                  <ul class="slides" style="">
                     <li style="" class="clone" aria-hidden="true">
                     	<a href="<?php echo url_test($content->imagem); ?>" title="Sustentabilidade"> 
                     		<img src="<?php echo url_test($content->imagem); ?>" alt="Sustentabilidade" itemprop="image" draggable="false"> 
                     	</a> 
                     </li>
                  </ul>
               </div>
               <ul class="flex-direction-nav">
                  <li class="flex-nav-prev"><a class="flex-prev flex-disabled" href="#" tabindex="-1"> </a></li>
                  <li class="flex-nav-next"><a class="flex-next flex-disabled" href="#" tabindex="-1"> </a></li>
               </ul>
            </div>
            <div id="carousel" class="flexslider">
               <div class="flex-viewport" style="">
                  <ul class="slides" style="">
                     <li style="" class="flex-active-slide">
                        <div>
                        	<img src="<?php echo url_test($content->imagem); ?>" alt="Sustentabilidade" itemprop="image" draggable="false">
                       	</div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="column is-6">
            <h1 class="title"><?php echo $content->{lang($lang,'title')}; ?></h1>
            <div class="content">
               <p><?php echo line($content->{lang($lang,'first_content')}); ?></p>
            </div>
         </div>
      </div>
      <div class="content">

         <p><?php echo line($content->{lang($lang,'content')}); ?></p>
         
      </div>
   </div>
</section>