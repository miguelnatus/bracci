<section class="section">
   <div class="container">
      <div class="columns">
         <div class="column is-6">
            <div id="slider" class="flexslider">
               <div class="flex-viewport" style="">
                  <ul class="slides" style="">
                     <li style="" class="clone" aria-hidden="true">
                        <a href="<?php echo base_url('public/img/uploads/qualidade.jpeg'); ?>" title="Qualidade"> 
                           <img src="<?php echo base_url('public/img/uploads/qualidade.jpeg'); ?>" alt="Qualidade" itemprop="image" draggable="false"> 
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
               <div class="flex-viewport" style="overflow: hidden; position: relative;">
                  <ul class="slides" style="width: 200%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                     <li style="width: 7px; margin-right: 2px; float: left; display: block;" class="flex-active-slide">
                        <div> 
                           <img src="<?php echo base_url('public/img/uploads/qualidade.jpeg'); ?>" alt="Qualidade" itemprop="image" draggable="false"> 
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="column is-6">
            <h1 class="title"><?php echo line($content->{lang($lang,'qualidade')}); ?></h1>
            <div class="content">
               <p><?php echo line($content->{lang($lang,'firstcontent')}); ?></p>
            </div>
         </div>
      </div>
      <div class="content">
         <p><strong><?php echo line($content->{lang($lang,'title_content')}); ?></strong></p>
         <p><?php echo line($content->{lang($lang,'content')}); ?></p>
      </div>
   </div>
</section>
