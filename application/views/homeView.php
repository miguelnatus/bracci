<div id="home">
	

	<section id="bannerhome">
		<?php //echo '<pre>'; print_r($banners); ?>
		<?php foreach($banners as $key => $value): ?>
			<?php if($value->ativo==1): ?>
			
				<div class="row-wrap">
					<a class="" href="<?php echo $value->{lang($lang,'link_botao')}; ?>">
						<div class="background-desktop hidden-xs" style="background:url(<?php echo url_test($value->imagem_desk); ?>);">
							
						</div>
						<div class="background-mobile visible-xs item" style="background:url(<?php echo url_test($value->imagem_mobile); ?>);">
							
						</div>
					</a>

					<?php //if($value->titulo): ?>
					
					<div class="title-banner item" style="">
						<div class="container">			
							<div class="position-banner hidden-xs" style="margin-left:<?php echo $value->vertical; ?>%">
								<h2 class="title"><?php echo $value->{lang($lang,'titulo')}; ?></h2> 
								<h3 class="subtitle"><?php echo $value->{lang($lang,'subtitulo')}; ?></h3> 
								<a class="btn-black" href="<?php echo $value->{lang($lang,'link_botao')}; ?>" title="<?php echo $value->{lang($lang,'texto_botao')};  ?>"><?php echo $value->{lang($lang,'texto_botao')};  ?></a>
							</div>
							<div class="position-banner visible-xs">
								<h2 class="title"><?php echo $value->{lang($lang,'titulo')}; ?></h2> 
								<h3 class="subtitle"><?php echo $value->{lang($lang,'subtitulo')}; ?></h3> 
								<a class="btn-black" href="<?php echo $value->{lang($lang,'link_botao')}; ?>" title="<?php echo $value->{lang($lang,'texto_botao')};  ?>"><?php echo $value->{lang($lang,'texto_botao')};  ?></a>
							</div>
						</div>
					</div>

					<?php //endif; ?>
					
				</div>

			<?php endif; ?>
		<?php endforeach; ?>	
	</section>
	
	<section class="ambients">		

		<div class="ambients__ambient"> 
			<a class="ambients__image-link" href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'ambientes')}).'/'.slugify($banheiro->{lang($lang,'nome')}); ?>">
				<img class="ambients__image img-responsive" src="<?php echo url_test($banheiro->imagem); ?>" alt="<?php echo $banheiro->{lang($lang,'nome')}; ?>"> 
			</a> 
			<div class="ambients__infos"> 
				<h3 class="ambients__infos__title"><?php echo $translations->{lang($lang,'banheiro_title')}; ?></h3> 
				<h4 class="ambients__infos__subtitle"><?php echo $translations->{lang($lang,'banheiro_subtitle')}; ?></h4> 
				<p class="ambients__infos__text"><?php echo $translations->{lang($lang,'banheiro_text')}; ?></p>
				<a class="cta" href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'ambientes')}).'/'.slugify($banheiro->{lang($lang,'nome')}); ?>"><?php echo $translations->{lang($lang,'ver_produtos')}; ?></a> 
			</div> 
		</div>

		<div class="ambients__ambient"> 
			<a class="ambients__image-link" href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'ambientes')}).'/'.slugify($translations->{lang($lang,'cozinha_title')}); ?>">
				<img class="ambients__image img-responsive" src="<?php echo url_test($cozinha->imagem); ?>" alt="<?php echo $cozinha->{lang($lang,'nome')}; ?>"> 
			</a> 
			<div class="ambients__infos"> 
				<h3 class="ambients__infos__title"><?php echo $translations->{lang($lang,'cozinha_title')}; ?></h3> 
				<h4 class="ambients__infos__subtitle"><?php echo $translations->{lang($lang,'cozinha_subtitle')}; ?></h4> 
				<p class="ambients__infos__text"><?php echo $translations->{lang($lang,'cozinha_text')}; ?></p>
				<a class="cta" href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'ambientes')}).'/'.slugify($cozinha->{lang($lang,'nome')}); ?>"><?php echo $translations->{lang($lang,'ver_produtos')}; ?></a> 
			</div> 
		</div>
		
	</section>
	<section class="section finishes-grid" id="acabamentos">
	   <div class="container">
	      <h3 class="title section-title"><?php echo $translations->{lang($lang,'acabamentos')}; ?></h3>	        
	      <div class="columns is-multiline is-mobile">
	      	<?php  foreach ($acabamento as $key => $content): ?>
	        <div class="column is-flex is-one-third-mobile is-one-third-tablet is-2-desktop">
	            <a href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'acabamentos')}).'/'.slugify($content->{lang($lang,'nome')}); ?>" class="finishes-grid__link">
	               <div class="grid-item grid-item-acab">
	                  <img src="<?php echo base_url($content->imagem); ?>" class="img-responsive grid-item__image" alt="<?php echo $content->{lang($lang,'nome')}; ?>"> 
	                  <h4 class="grid-item__title"><?php echo $content->{lang($lang,'nome')}; ?></h4>
	               </div>
	            </a>
	        </div>
	    	<?php endforeach; ?>
	      </div>
	   </div>
	</section>

	<section class="section linhas" id="linhas">
	   <div class="container">
	      <h3 class="title section-title section-title--gray"><?php echo $translations->{lang($lang,'linhas')}; ?></h3>
	      <div class="columns is-multiline is-mobile">

	        <div class="column is-half-mobile is-one-third-tablet is-3-desktop">
	            <a class="finishes-grid__link" href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'acessorios')}); ?>">
	               <div class="grid-item">
	                    <img src="<?php echo url_test('https://res.cloudinary.com/dqnaebclw/image/upload/c_fit,f_auto,h_200,q_auto,w_200/v1598295756/Homepage/FILTRO_2.jpg'); ?>" alt="<?php echo $translations->{lang($lang,'acessorios')}; ?>" class="img-responsive grid-item__image"> 
	                    <h4 class="grid-item__title"><?php echo $translations->{lang($lang,'acessorios')}; ?></h4>
	               </div>
	            </a>
	        </div>

	      	<?php foreach ($linha as $key => $value): ?>
	      	<?php if($value->imagem!=NULL): ?>
	        <div class="column is-half-mobile is-one-third-tablet is-3-desktop">
	            <a class="finishes-grid__link" href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'linhas')}).'/'.slugify($value->{lang($lang,'nome')}); ?>">
	               <div class="grid-item">

	               		<?php if($value->new == 1): ?>
						<div class="new visible-xs"></div>
	               		<div class="grid-item__new hidden-xs">New</div>
	               		<?php endif; ?>
	                    <img src="<?php echo url_test($value->imagem); ?>" alt="<?php echo $value->{lang($lang,'nome')}; ?>" class="img-responsive grid-item__image"> 
	                    <h4 class="grid-item__title"><?php echo $value->{lang($lang,'nome')}; ?></h4>
	               </div>
	            </a>
	        </div>
	    	<?php endif; ?>
	    	<?php endforeach; ?>

	      </div>
	   </div>
	</section>
	<section class="section">
	    <div class="container">
	      	<h3 class="title section-title"><?php echo $translations->{lang($lang,'projetos')}; ?></h3>


	      	<div class="projects">
	      		<?php foreach($projetos as $key => $value): if($key<5): ?>
		      	<a class="projects__fancy" href="<?php echo url_test($value->imagem); ?>" data-fancybox="gallery" > 
		      		<img class="projects__image" src="<?php echo url_test($value->imagem); ?>" alt=""> 
		      	</a>
	      		<?php endif; endforeach; ?>
	      	</div>
           
		    <div class="projects__cta"> 
		      	<a href="<?php echo base_url($lang.'/projetos-com-bracci'); ?>" class="cta"><?php echo $translations->{lang($lang,'cta')};  ?></a> 
		    </div>
	    </div>
	</section>
	<section class="section home-institutional">
	    <div class="container">
	      <div class="home-institutional__border">
	         <h2 class="home-institutional__title"></h2>
	         <div class="home-institutional__content">
	            <div class="home-institutional__content__left"><?php echo line($translations->{lang($lang,'institutional_text')});  ?></div>
	            <div class="home-institutional__content__right"><?php echo line($translations->{lang($lang,'institutional_text2')}); ?></div>
	         </div>
	         <a href="<?php echo base_url($lang).'/'.slugify($translations->{lang($lang,'empresa')}); ?>" class="home-institutional__cta"><?php echo $translations->{lang($lang,'institutional_cta')}; ?></a>
	      </div>
	   </div>
	</section>

</div>
