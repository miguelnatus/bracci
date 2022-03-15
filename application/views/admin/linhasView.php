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
                        foreach ($linhas as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/linhas/editar/').$value->id; ?>">
                            <h2><?php echo $value->nome; ?></h2>
                            </a>
                        </li>
                
                    <?php 
                        endforeach;
                    ?>
                </ul>
            


            <?php
            // Teste se for ordenar linhas

            elseif($acao=='ordenar-linhas'):
            
            ?>
            <div class="col-sm-12">       
                <section class="box">

                    <div class="content-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8">
                            <?php if ($this->session->flashdata('error')): ?>
                                <?= $this->session->flashdata('error'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('success')): ?>
                                <?= $this->session->flashdata('success'); ?>
                            <?php endif; ?>
                            <ul class="">    
            <?php

                foreach ($linhas as $key => $linha):
                    if($linha->imagem):
                    // echo $linha->nome;
            ?>
           
                    
                                    <li>
                                        <a href="<?php echo base_url('admin/linhas/ordenarProdutos/').$linha->id; ?>">
                                        <h2><?php echo $linha->nome; ?></h2>
                                        </a>
                                    </li>
                    

            <?php
                    endif;
                endforeach;

            ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php
            // Teste se for ordenar linhas

            elseif($acao=='ordenar-produtos'):
                foreach ($linhas as $key => $linha):
                    if($linha->imagem):
            ?>
            <div class="col-sm-12">       
                <section class="box">

                    <div class="content-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-8">
                            
                            <?php if ($this->session->flashdata('error')): ?>
                                <?= $this->session->flashdata('error'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('success')): ?>
                                <?= $this->session->flashdata('success'); ?>
                            <?php endif; ?>

                                <form action="<?php echo base_url('admin/painel/ordenar/').$linha->id; ?>" method="post" enctype="multipart/form-data">
                                    <div class="col-sm-12 col-md-12">
                                        <h1><b><?php echo $linha->nome; ?></b></h1>
                                        <ul class="sortable produtos" style="padding-inline-start: 0px;">
                                            <?php
                                                $cont = 1;
                                                foreach ($produtos as $key => $value): 
                                                   
                                            ?>
                                        
                                                <li id="">
                                                    <input type="hidden"  name="<?php echo $value->id; ?>" value="<?php echo $value->order; ?>">
                                                    <a href="<?php echo base_url('admin/produtos/editar/').$value->id_produto; ?>">
                                                        <h2 style="display:inline-block;"><b><?php echo $value->produto_nome; ?></b></h2>
                                                        <h2 style="display:inline-block;"><?php echo $value->referencia; ?></h2>
                                                    </a>
                                                </li>
                                        
                                            <?php 
                                                    
                                                endforeach;
                                            ?>
                                        </ul>
                                        <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
                                            <div class="text-left">
                                                <input type="submit" value="Salvar" class="btn btn-primary">
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>
                                    </div> 
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php 
                    endif;
                endforeach;
            ?>

            <?php
            //TESTE SE FOR PARA INSERIR OU ATUALIZAR UM ITEM
            else :
            ?>

            <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="row">
                            <form action="<?php echo base_url('admin/painel/atualizar/linhas/'); ?><?php echo (isset($linhas[0]->id))? $linhas[0]->id : '';?>" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($linhas[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/linhas/').$linhas[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome" value="<?php echo (isset($linhas[0]->nome))? $linhas[0]->nome : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_en" value="<?php echo (isset($linhas[0]->nome_en))? $linhas[0]->nome_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_it" value="<?php echo (isset($linhas[0]->nome_it))? $linhas[0]->nome_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Imagem</label>
                                            <div class="imagens">
                                                <?php if (isset($linhas[0]->imagem)&&$linhas[0]->imagem): //Se já tiver imagem para o filtro ?>
                                                    <ul>   
                                                        <li style="">
                                                            <img src="<?php echo (isset($linhas[0]->imagem))? url_test($linhas[0]->imagem) : ''; ?>" class="img-responsive" alt="">
                                                            <input type="hidden" name="imagem" value="<?php echo (isset($linhas[0]->imagem))? $linhas[0]->imagem : ''; ?>" class="form-control" id="field-11591251553">
                                                            <i class="fa fa-trash excluirImagem excluir-linha" aria-hidden="true"></i>
                                                        </li>      
                                                    </ul>
                                                <?php else: ?>
                                                    <div class="imagensGaleria">
                                                        <input type="file" name="imagem" class="addImage form-control" />
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group imagem-linha">
                                           <label class="form-label" for="field-11591251553">Imagem</label>
                                           <div class="imagens">
                                              <div class="imagensGaleria">
                                                 <input type="file" name="imagem" class="addImage form-control">
                                              </div>
                                           </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Novo?</label>
                                            <input type="checkbox" name="new" value="1" class="" id="field-11591251553" <?php if (isset($linhas[0]->new)) { echo ($linhas[0]->new) ? 'checked' : ''; } ?>>
                                        </div>

                                        <input type="hidden" name="slug" value="<?php echo (isset($linhas[0]->slug))? $linhas[0]->slug : ''; ?>" class="form-control" id="field-11591251553">
                                        
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