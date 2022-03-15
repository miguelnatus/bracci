<section class="section">
   <div class="container">
      <h1 class="title"><?php echo $translations->{lang($lang,'contato')}; ?></h1>
      <h2 class="subtitle"><?php echo $translations->{lang($lang,'contato_sub')}; ?></h2>
      <!-- <form name="contact" id="contato" method="post" action="/muito-obrigado-pelo-seu-contato"> -->
            

      <?php $attributes = array('class' => 'email', 'id' => 'contato'); ?>
         <?php echo form_open($lang.'/contato/enviar', $attributes); ?>
         <div class="form-success">
            <?php 
                echo $this->session->flashdata('success');
            ?>
         </div>
         <div class="form-error">
            <?php 
                echo $this->session->flashdata('error');
            ?>
         </div>

         <input type="hidden" name="form-name" value="contact"> 
         <p class="hidden"> 
            <label>Don’t fill this out if you're human: 
               <input name="bot-field-contact">
            </label> 
         </p>
         <input name="product_info" id="product_info" value="" type="hidden"> 
         <div class="field is-horizontal">
            <div class="field-label is-normal"> 
               <label class="label"><?php echo $translations->{lang($lang,'identificacao')}; ?></label> 
            </div>
            <div class="field-body">
               <div class="field">
                  <p class="control is-expanded has-icons-left">
                     <input class="input form-control" name="name" placeholder="<?php echo $translations->{lang($lang,'nome')}; ?>" required="true"> 
                     <span class="icon is-small is-left">
                        <svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                        </svg>
                        <!-- <i class="fas fa-user"></i> --> 
                     </span>
                     <?php echo form_error('name'); ?>
                  </p>
               </div>
               <div class="field">
                  <p class="control is-expanded has-icons-left">
                     <input class="input form-control" type="email" name="email" placeholder="Email" required="true"> 
                     <span class="icon is-small is-left">
                        <svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
                        </svg>
                        <!-- <i class="fas fa-envelope"></i> --> 
                     </span>
                     <?php echo form_error('email'); ?>
                  </p>
               </div>
            </div>
         </div>
         <div class="field is-horizontal">
            <div class="field-label"></div>
            <div class="field-body">
               <div class="field">
                  <p class="control is-expanded has-icons-left">
                     <input class="input form-control" placeholder="<?php echo $translations->{lang($lang,'cidade')}; ?>" name="city" required="true"> 
                     <span class="icon is-small is-left">
                        <svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                        </svg>
                        <!-- <i class="fas fa-map-marker-alt"></i> --> 
                     </span>
                     <?php echo form_error('city'); ?>
                  </p>
               </div>
               <div class="field">
                  <p class="control is-expanded has-icons-left">
                     <input class="input form-control" type="tel" name="phone" placeholder="<?php echo $translations->{lang($lang,'telefone')}; ?>"> 
                     <span class="icon is-small is-left">
                        <svg class="svg-inline--fa fa-phone fa-w-16" data-fa-transform="rotate-90" aria-hidden="true" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                           <g transform="translate(256 256)">
                              <g transform="translate(0, 0)  scale(1, 1)  rotate(90 0 0)">
                                 <path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z" transform="translate(-256 -256)"></path>
                              </g>
                           </g>
                        </svg>
                        <!-- <i class="fas fa-phone" data-fa-transform="rotate-90"></i> --> 
                     </span>
                  </p>
               </div>
            </div>
         </div>
         <div class="field is-horizontal">
            <div class="field-label is-normal mensagem"> 
               <label class="label"><?php echo $translations->{lang($lang,'mensagem')}; ?></label> 
            </div>
            <div class="field-body">
               <div class="field is-expanded">
                  <div class="control"> 
                     <textarea class="textarea form-control" name="message" placeholder="<?php echo $translations->{lang($lang,'mensagem_placeholder')}; ?>" required="true"></textarea> 
                     <?php echo form_error('message'); ?>
                  </div>
               </div>

            </div>
         </div>

         <div class="field is-horizontal">
            <div class="field-label"> </div>
            <div class="field-body">
               <div class="field">
                  <div class="control"> 
                     <button class="button is-primary"><?php echo $translations->{lang($lang,'enviar_mensagem')}; ?></button> 
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>