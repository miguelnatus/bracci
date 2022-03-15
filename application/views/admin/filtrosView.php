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
                        foreach ($filtros as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/filtros/editar/').$value->id; ?>">
                            <h2><?php echo $value->nome; ?></h2>
                            </a>
                        </li>
                
                    <?php 
                        endforeach;
                    ?>
                </ul>
            
            <?php
            
            elseif($acao=='ordenar-filtros'):
            ?>
                <ul>
                    <?php
                        foreach ($filtros as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/filtros/ordenarLinhas/').$value->id; ?>">
                            <h2><?php echo $value->nome; ?></h2>
                            </a>
                        </li>
                
                    <?php 
                        endforeach;
                    ?>
                </ul>

                        <?php
            
            elseif($acao=='ordenar-linhas'):
                
            ?>
            <div class="col-sm-12">       
                <section class="box">

                    <div class="content-body">

                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-10">
                            
                            <?php if ($this->session->flashdata('error')): ?>
                                <?= $this->session->flashdata('error'); ?>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('success')): ?>
                                <?= $this->session->flashdata('success'); ?>
                            <?php endif; ?>

                            <form action="<?php echo base_url('admin/painel/ordenarLinhas/').$id; ?>" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-10">
                                    <ul class="sortable ui-sortable linhas" style="padding-inline-start: 0px;">
                                        <?php
                                            // echo '<pre>';
                                            foreach ($produtos as $key => $value):
                                                // print_r($value);
                                        ?>
                                    
                                            <li>

                                                <input type="hidden" name="<?php echo $value->id; ?>" value="<?php echo $value->id_produto; ?>">
                                            
                                                <a>
                                                    <h2 style="display:inline-block;"><b><?php echo $value->linha_nome; ?></b> - </h2>
                                                    <h2 style="display:inline-block;"><?php echo $value->referencia; ?> - </h2>
                                                    <h2 style="display:inline-block;"><?php echo $value->produto_nome; ?></h2>
                                                    
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
            //TESTE SE FOR PARA INSERIR OU ATUALIZAR UM ITEM
            else :
            ?>

            <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="row">
                            <form action="<?php echo base_url('admin/painel/atualizar/filtros/'); ?><?php echo (isset($filtros[0]->id))? $filtros[0]->id : '';?>" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($filtros[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/filtros/').$filtros[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome" value="<?php echo (isset($filtros[0]->nome))? $filtros[0]->nome : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_en" value="<?php echo (isset($filtros[0]->nome_en))? $filtros[0]->nome_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Nome</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_it" value="<?php echo (isset($filtros[0]->nome_it))? $filtros[0]->nome_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Descrição</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea name="descricao" id="" cols="30" rows="10" class="form-control"><?php echo (isset($filtros[0]->descricao))? $filtros[0]->descricao : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Descrição</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea name="descricao_en" id="" cols="30" rows="10" class="form-control"><?php echo (isset($filtros[0]->descricao_en))? $filtros[0]->descricao_en : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Descrição</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea name="descricao_it" id="" cols="30" rows="10" class="form-control"><?php echo (isset($filtros[0]->descricao_it))? $filtros[0]->descricao_it : ''; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Imagem</label>
                                            <div class="imagens">
                                                <?php if (isset($filtros[0]->imagem)&&$filtros[0]->imagem): //Se já tiver imagem para o filtro ?>
                                                    <ul>   
                                                        <li style="">
                                                            <img src="<?php echo (isset($filtros[0]->imagem))? url_test($filtros[0]->imagem) : ''; ?>" class="img-responsive" alt="">
                                                            <input type="hidden" name="imagem" value="<?php echo (isset($filtros[0]->imagem))? $filtros[0]->imagem : ''; ?>" class="form-control" id="field-11591251553">
                                                            <i class="fa fa-trash excluirImagem" aria-hidden="true"></i>
                                                        </li>      
                                                    </ul>
                                                <?php else: ?>
                                                    <div class="imagensGaleria">
                                                        <input type="file" name="imagem" class="addImage form-control" />
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <input type="hidden" name="slug" value="<?php echo (isset($filtros[0]->slug))? $filtros[0]->slug : ''; ?>" class="form-control" id="field-11591251553">
                                        <input type="hidden" name="slug_en" value="<?php echo (isset($filtros[0]->slug_en))? $filtros[0]->slug_it : ''; ?>" class="form-control" id="field-11591251553">
                                        <input type="hidden" name="slug_it" value="<?php echo (isset($filtros[0]->slug_en))? $filtros[0]->slug_it : ''; ?>" class="form-control" id="field-11591251553">
                                        
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