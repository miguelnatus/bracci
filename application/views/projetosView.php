<section class="section">
  <div class="container">
    <h1 class="title"><?php echo $translations->{lang($lang,'projetos')}; ?></h1>
	<div class="columns is-multiline is-mobile"> 
   	<?php foreach($projetos as $key => $value): ?>
		<div class="column is-one-third-tablet is-full-mobile">
			<a href="<?php echo url_test($value->imagem); ?>" class="gallery__link" data-fancybox="gallery" style="background-image: url(<?php echo url_test($value->imagem); ?>)"></a>
		</div>
	<?php endforeach; ?>
	</div>
  </div>
</section>