
   <!-- START CONTENT -->
   <section id="main-content" class="">
      <div class="container-fluid">
         <section class="wrapper main-wrapper row" style="">
            <div class="col-sm-6">
              <div class="jumbotron">
                <h1><?php echo $count_product; ?> Produtos</h1>
                <p><a class="btn btn-primary btn-lg" href="<?php echo base_url('admin/produtos'); ?>" role="button">Ver produtos</a></p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="jumbotron">
                <h1><?php echo $count_linhas; ?> Linhas</h1>
                <p><a class="btn btn-primary btn-lg" href="<?php echo base_url('admin/linhas'); ?>" role="button">Ver linhas</a></p>
              </div>
            </div>
         </section>
      </div>
   </section>