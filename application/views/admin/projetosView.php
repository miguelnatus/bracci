<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="container-fluid">
        <section class="wrapper main-wrapper row" style="">
            <?php
            //TESTE SE FOR PARA LISTAR TODOS
            if($acao=='busca'):
            ?>
            <form action="<?php echo base_url('admin/painel/ordenarprojetos/'); ?>" method="post" enctype="multipart/form-data">
                <ul class="sortable produtos col-sm-12">
                    <div class="col-12 col-md-10 col-lg-10 text-right ui-sortable-handle" style="margin-bottom: 10px;">
                        <div class="">
                            <input type="submit" value="Ordenar" class="btn btn-primary">
                            <!-- <button type="button" class="btn">Cancel</button> -->
                        </div>
                    </div>
                    
                    <?php
                        foreach ($projetos as $key => $value): 
                    ?>
                
                        <li>
                            <input type="hidden"  name="<?php echo $value->id; ?>" value="<?php echo $key; ?>">
                            <a href="<?php echo base_url('admin/projetos/editar/').$value->id; ?>">
                            <h2><img src="<?php echo url_test($value->imagem); ?>" height="50px" width="50px"><br/><?php echo $value->imagem; ?></h2>
                            </a>
                        </li>
                
                    <?php 
                        endforeach;
                    ?>
                </ul>
            </form>
            <?php
            //TESTE SE FOR PARA INSERIR OU ATUALIZAR UM ITEM
            else :
            ?>

            <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="row">
                            <form action="<?php echo base_url('admin/painel/atualizar/projetos/'); ?><?php echo (isset($projetos[0]->id))? $projetos[0]->id : '';?>" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($projetos[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/projetos/').$projetos[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Imagem</label>
                                            <div class="imagens">
                                                <?php if (isset($projetos[0]->imagem)&&$projetos[0]->imagem): //Se já tiver imagem para o filtro ?>
                                                    <ul>   
                                                        <li style="">
                                                            <img src="<?php echo (isset($projetos[0]->imagem))? url_test($projetos[0]->imagem) : ''; ?>" class="img-responsive" alt="">
                                                            <input type="hidden" name="imagem" value="<?php echo (isset($projetos[0]->imagem))? $projetos[0]->imagem : ''; ?>" class="form-control" id="field-11591251553">
                                                        </li>      
                                                    </ul>
                                                <?php else: ?>
                                                    <div class="imagensGaleria">
                                                        <input type="file" name="imagem" class="addImage form-control" />
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
                                            <div class="text-left">
                                                <input type="submit" value="Enviar" class="btn btn-primary">
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            
            <?php 
            endif; 
            ?>
        </section>
    </div>
</section>