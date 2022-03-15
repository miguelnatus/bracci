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
                        if(isset($banners)):
                        foreach ($banners as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/banners/editar/').$value->id; ?>">
                            <h2><?php if($value->titulo){ echo $value->titulo; } else{ echo 'Banner - '.$value->id;  } ?></h2>
                            </a>
                        </li>
                
                    <?php
                        endforeach;
                        endif;
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
                            <form action="<?php echo base_url('admin/painel/atualizar/banners/'); ?><?php echo (isset($banners[0]->id))? $banners[0]->id : '';?>" enctype="multipart/form-data" method="post">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($banners[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/banners/').$banners[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Título</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="titulo" value="<?php echo (isset($banners[0]->titulo))? $banners[0]->titulo : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Título</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="titulo_en" value="<?php echo (isset($banners[0]->titulo_en))? $banners[0]->titulo_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Título</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="titulo_it" value="<?php echo (isset($banners[0]->titulo_it))? $banners[0]->titulo_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Subtítulo</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="subtitulo" value="<?php echo (isset($banners[0]->subtitulo))? $banners[0]->subtitulo : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Subtítulo</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="subtitulo_en" value="<?php echo (isset($banners[0]->subtitulo_en))? $banners[0]->subtitulo_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Subtítulo</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="subtitulo_it" value="<?php echo (isset($banners[0]->subtitulo_it))? $banners[0]->subtitulo_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Texto Botão</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="texto_botao" value="<?php echo (isset($banners[0]->texto_botao))? $banners[0]->texto_botao : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Texto Botão</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="texto_botao_en" value="<?php echo (isset($banners[0]->texto_botao_en))? $banners[0]->texto_botao_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Texto Botão</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="texto_botao_it" value="<?php echo (isset($banners[0]->texto_botao_it))? $banners[0]->texto_botao_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Link Botão</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="link_botao" value="<?php echo (isset($banners[0]->link_botao))? $banners[0]->link_botao : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(EN) Link Botão</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="link_botao_en" value="<?php echo (isset($banners[0]->link_botao_en))? $banners[0]->link_botao_en : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">(IT) Link Botão</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="link_botao_it" value="<?php echo (isset($banners[0]->link_botao_it))? $banners[0]->link_botao_it : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>
                                    

                                        <div class="form-group">
                                            <?php if(isset($banners[0]->imagem_desk) and isset($banners[0]->imagem_mobile)): ?>
                                            <label class="form-label" for="field-11591251553">Imagem Desktop</label>
                                            <div class="imagens">
                                               
                                                <ul>   
                                                    <li style="">
                                                      <img src="<?php echo (isset($banners[0]->imagem_desk))? url_test($banners[0]->imagem_desk) : ''; ?>" class="img-responsive" alt="">
                                                      <input type="hidden" name="imagem_desk" value="<?php echo (isset($banners[0]->imagem_desk))? $banners[0]->imagem_desk : ''; ?>" class="form-control" id="field-11591251553">
                                                      <i class="fa fa-trash excluirImagem" aria-hidden="true"></i>
                                                    </li>      
                                                </ul>
                                                
                                            </div>

                                            <label class="form-label" for="field-11591251553">Imagem Mobile</label>
                                            <div class="imagens">
                                               
                                                <ul>   
                                                    <li style="">
                                                      <img src="<?php echo (isset($banners[0]->imagem_mobile))? url_test($banners[0]->imagem_mobile) : ''; ?>" class="img-responsive" alt="">
                                                      <input type="hidden" name="imagem_mobile" value="<?php echo (isset($banners[0]->imagem_mobile))? $banners[0]->imagem_mobile : ''; ?>" class="form-control" id="field-11591251553">
                                                      <i class="fa fa-trash excluirImagem" aria-hidden="true"></i>
                                                    </li>      
                                                </ul>
                                                
                                            </div>
                                            <?php else: ?>
                                            <label class="form-label" for="field-11591251553">Imagem Desktop</label>
                                            <div class="imagens">

                                                <div class="imagensGaleria">
                                                   <input type="file" name="imagem_desk" class="addImage form-control" />
                                                </div>
                                           
                                            </div>
                                            <label class="form-label" for="field-11591251553">Imagem Mobile</label>
                                            <div class="imagens">

                                                <div class="imagensGaleria">
                                                   <input type="file" name="imagem_mobile" class="addImage form-control" />
                                                </div>
                                           
                                            </div>
                                             <?php endif; ?>
                                        </div>


                                        <div class="">

                                            <label class="form-label" for="field-11591251553">Posicionamento Horizontal</label>
                                            <input type="range" class="input-ver" name="vertical" list="tickmarks" value="<?php echo (isset($banners[0]->vertical))? $banners[0]->vertical : ''; ?>" min="0" max="100">
                                            <p class="value-ver"><strong><?php echo (isset($banners[0]->vertical))? $banners[0]->vertical : ''; ?></strong>%</p>
                                            <datalist id="tickmarks">
                                                <option value="0">
                                                <option value="10">
                                                <option value="20">
                                                <option value="30">
                                                <option value="40">
                                                <option value="50" label="50%">
                                                <option value="60">
                                                <option value="70">
                                                <option value="80">
                                                <option value="90">
                                                <option value="100">
                                            </datalist>
                                        </div>

                                        <div class="">
                                            <label class="form-label" for="field-11591251553">Posicionamento Vertical</label>
                                            <input type="range" class="input-hor" name="horizontal" list="tickmarks" value="<?php echo (isset($banners[0]->horizontal))? $banners[0]->horizontal : ''; ?>" min="0" max="100">
                                            <p class="value-hor"><strong><?php echo (isset($banners[0]->horizontal))? $banners[0]->horizontal : ''; ?></strong>%</p>
                                            <datalist id="tickmarks">
                                                <option value="0">
                                                <option value="10">
                                                <option value="20">
                                                <option value="30">
                                                <option value="40">
                                                <option value="50" label="50%">
                                                <option value="60">
                                                <option value="70">
                                                <option value="80">
                                                <option value="90">
                                                <option value="100">
                                            </datalist>
                                        </div>

                                        <div class="form-group">
                                            <br/>
                                            <label class="form-label" for="field-11591251553">Ativo?</label>
                                            <?php if(isset($banners[0]->ativo)): ?>
                                            <input type="checkbox" name="" value="<?php echo $banners[0]->ativo; ?>" class="ativo" id="field-11591251553" <?php if ($banners[0]->ativo==1) { echo ($banners[0]->ativo) ? 'checked' : ''; } ?>>
                                            <input type='hidden' name="ativo" value="<?php echo $banners[0]->ativo; ?>" class="ativo-hidden">
                                            <?php else: ?>
                                            <input type="checkbox" name="ativo" value="0" class="ativo-hidden" id="field-11591251553">
                                            <?php endif; ?>
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