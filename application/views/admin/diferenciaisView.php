<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="container-fluid">
        <section class="wrapper main-wrapper row" style="">
            <?php
            //TESTE SE FOR PARA LISTAR TODOS
            if($acao=='busca'):
            ?>
                <ul>
                    <?php
                        foreach ($diferenciais as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/diferenciais/editar/').$value->id; ?>">
                            <h2><?php echo $value->nome; ?></h2>
                            </a>
                        </li>
                
                    <?php 
                        endforeach;
                    ?>
                </ul>
            <?php
            //TESTE SE FOR PARA INSERIR OU ATUALIZAR UM ITEM
            else :
            ?>

            <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="row">
                            <form action="<?php echo base_url('admin/painel/atualizar/diferenciais/'); ?><?php echo (isset($diferenciais[0]->id))? $diferenciais[0]->id : '';?>" enctype="multipart/form-data" method="post">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($diferenciais[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/diferenciais/').$diferenciais[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome" value="<?php echo (isset($diferenciais[0]->nome))? $diferenciais[0]->nome : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_en" value="<?php echo (isset($diferenciais[0]->nome_en))? $diferenciais[0]->nome_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_it" value="<?php echo (isset($diferenciais[0]->nome_it))? $diferenciais[0]->nome_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Descrição</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea name="descricao" id="" cols="30" rows="10" class="form-control"><?php echo (isset($diferenciais[0]->descricao))? $diferenciais[0]->descricao : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Descrição</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea name="descricao_en" id="" cols="30" rows="10" class="form-control"><?php echo (isset($diferenciais[0]->descricao_en))? $diferenciais[0]->descricao_en : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Descrição</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea name="descricao_it" id="" cols="30" rows="10" class="form-control"><?php echo (isset($diferenciais[0]->descricao_it))? $diferenciais[0]->descricao_it : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Imagem</label>

                                            <div class="imagens">
                                                <?php if(isset($diferenciais[0]->imagem)): ?>
                                                <ul>   
                                                    <li style="">
                                                      <img src="<?php echo (isset($diferenciais[0]->imagem))? url_test($diferenciais[0]->imagem) : ''; ?>" class="img-responsive" alt="">
                                                      <input type="hidden" name="imagem" value="<?php echo (isset($diferenciais[0]->imagem))? $diferenciais[0]->imagem : ''; ?>" class="form-control" id="field-11591251553">
                                                      <i class="fa fa-trash excluirImagem" aria-hidden="true"></i>
                                                    </li>      
                                                </ul>
                                                <?php else: ?>
                                                
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="file" name="imagem" value="<?php echo (isset($diferenciais[0]->imagem))? $diferenciais[0]->imagem : ''; ?>" class="form-control imagem-dif" id="field-11591251553">
                                                </div>
                                                <?php endif; ?>
                                               
                                            </div>

                                        </div>

                                        <input type="hidden" name="slug" value="<?php echo (isset($diferenciais[0]->slug))? $diferenciais[0]->slug : ''; ?>" class="form-control" id="field-11591251553">
                                        
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