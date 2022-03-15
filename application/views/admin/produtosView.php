<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="container" style="margin:0;">
        <section class="wrapper main-wrapper row" style="">
            
            <?php
            //TESTE SE FOR PARA LISTAR TODOS
            if($acao=='busca'):
            ?>
                
                    
                <div class="busca-produtos">
                    <div class="form-group">
                        <div class="pull-right">
                           <label>Buscar Produtos</label>
                            <input type="email" class="form-control"  id="txtBusca" placeholder="Digite aqui..." style="width:200px;" > 
                        </div>    
                    </div>                          
                </div>
                    
                <ul id="ulItens">
                    <?php
                        foreach ($produtos as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/produtos/editar/').$value->id; ?>">
                            <h2 style="display:inline-block;"><b><?php echo $value->nome; ?></b></h2>
                            <h2 style="display:inline-block;"><?php echo $value->referencia; ?></h2>
                            </a>
                        </li>
                
                    <?php 
                        endforeach;
                    ?>
                </ul>
            <?php
            //TESTE SE FOR PARA INSERIR OU ATUALIZAR UM ITEM
            else:
            ?>
            <div class="col-sm-12">
                <?php 
                    // echo '<pre>';
                    // print_r($produtos_filtros);
                    // exit();
                ?>
                <section class="box">
                    <div class="content-body">
                        <div class="row">
                           <form action="<?php echo base_url('admin/produtos/atualizar/'); ?><?php echo (isset($produtos[0]->id))? $produtos[0]->id : '';?>" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($produtos[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/produtos/').$produtos[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Nome</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="nome" value="<?php echo (isset($produtos[0]->nome))? $produtos[0]->nome : ''; ?>" class="form-control" id="field-11591251553">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">(EN) Nome</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="nome_en" value="<?php echo (isset($produtos[0]->nome_en))? $produtos[0]->nome_en : ''; ?>" class="form-control" id="field-11591251553">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">(IT) Nome</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="nome_it" value="<?php echo (isset($produtos[0]->nome_it))? $produtos[0]->nome_it : ''; ?>" class="form-control" id="field-11591251553">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Referência</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="referencia" value="<?php echo (isset($produtos[0]->referencia))? $produtos[0]->referencia : ''; ?>" class="form-control" id="field-11591251553">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Preço</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="preco" value="<?php echo (isset($produtos[0]->preco))? $produtos[0]->preco : ''; ?>" class="form-control" id="field-11591251553">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Imagens</label>
                                                <div class="imagensGaleria">
                                                    <input type="file" name="img" class="addImage form-control" />
                                                </div>
                                                <span class="botaoPequeno maisImagens" style="cursor:pointer;">mais imagens &#10133;</span>
                                            </div>

                                            <div class="form-group">
                                                <div class="imagens">
                                                    <ul class="sortable image">
                                                        <?php 
                                                            // echo '<pre>';
                                                            // print_r($produtos_imagens);
                                                            // exit();
                                                        ?>
                                                        <?php foreach($produtos_imagens as $key => $pi): ?>
                                                            <li style="">
                                                                <input type="hidden"  name="order_image[]" value="<?php echo $pi->id; ?>">
                                                                <img src="<?php echo url_test($pi->imagem); ?>" class="img-responsive" alt="">
                                                                <i class="fa fa-trash excluir" data-id="<?php echo $pi->id; ?>"  data-conteudo="produtos_imagens" aria-hidden="true"></i>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                               
                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Descrição</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <textarea name="descricao" id="" cols="30" rows="10" class="form-control"><?php echo (isset($produtos[0]->descricao))? $produtos[0]->descricao : ''; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">(EN) Descrição</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <textarea name="descricao_en" id="" cols="30" rows="10" class="form-control"><?php echo (isset($produtos[0]->descricao_en))? $produtos[0]->descricao_en : ''; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">(IT) Descrição</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <textarea name="descricao_it" id="" cols="30" rows="10" class="form-control"><?php echo (isset($produtos[0]->descricao_it))? $produtos[0]->descricao_it : ''; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Modelo 3D</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <textarea name="modelo3d" id="" cols="30" rows="10" class="form-control"><?php echo (isset($produtos[0]->modelo3d))? $produtos[0]->modelo3d : ''; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Vídeo</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <textarea name="video" id="" cols="30" rows="10" class="form-control"><?php echo (isset($produtos[0]->video))? $produtos[0]->video : ''; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Linha</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <select name="linha_id" class="form-control">
                                                        <option>Selecione a Linha</option>
                                                        <?php foreach($linhas as $lin): ?>
                                                            <option value="<?php echo $lin->id ?>" <?php if (isset($produtos[0]->linha_id)){ echo ($produtos[0]->linha_id == $lin->id)? 'selected' : '';} ?>><?php echo $lin->nome; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Filtros (Acabamentos, Ambientes)</label>
                                                <div class="form-group">
                                                    <span class="desc"></span>
                                                    <div class="controls cadastroMultiplo">
                                                        <select name="filtros[]" class="addImage form-control">
                                                            <option  value="">Adicione um filtro</option>
                                                            <?php foreach($filtros as $fil): ?>
                                                                <option value="<?php echo $fil->id ?>"><?php echo $fil->nome; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary botaoPequeno duplicar">Adicionar filtros &#10133;</button>
                                                <!-- <span class="botaoPequeno duplicar" style="cursor:pointer;">mais filtros &#10133;</span> -->
                                            </div>

                                            <div class="form-group">
                                                <div class="wrapper main-wrapper row">
                                                    <ul class="list-group">
                                                        <?php foreach($produtos_filtros as $pf): ?>
                                                            <li value="<?php echo $pf->produtos_filtros_id; ?>" class="list-group-item">
                                                                <div class="form-group">
                                                                    <span><?php echo $pf->nome; ?></span>
                                                                </div>

                                                                <button type="submit" data-id="<?php echo $pf->produtos_filtros_id; ?>"  data-conteudo="produtos_filtros"  data-order="<?php echo $pf->order_id; ?>" class="btn btn-danger excluir">Excluir</button>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Produtos Relacionados</label>
                                                <div class="form-group">
                                                    <span class="desc"></span>
                                                    <div class="controls cadastroMultiplo">
                                                        <select name="relacionados[]" class="addImage form-control">
                                                            <option  value="">Adicione um Produto Relacionado</option>
                                                            <?php foreach($produtos_r as $pro): ?>
                                                                <option value="<?php echo $pro->id; ?>"><?php echo $pro->nome; ?> - <?php echo $pro->referencia; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary botaoPequeno duplicar">Adicionar relacionados &#10133;</button>
                                                <!-- <span class="botaoPequeno duplicar" style="cursor:pointer;">Adicionar relacionados &#10133;</span> -->
                                            </div>

                                            <div class="form-group">
                                                <div class="wrapper main-wrapper row">
                                                    <ul class="list-group">
                                                       
                                                        <?php foreach($produtos_relacionados as $pr): ?>
                                                            <li data-id="<?php echo $pr->id; ?>" class="list-group-item"><?php echo $pr->nome; ?> - <?php echo $pr->referencia; ?>
                                                                <!-- <i class="fa fa-trash excluir" data-id="<?php echo $pr->id; ?>" data-conteudo="produtos_relacionados" aria-hidden="true"></i> -->
                                                                <button type="submit" data-id="<?php echo $pr->id; ?>"  data-conteudo="produtos_relacionados" class="btn btn-danger excluir">Excluir</button>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                                
                                                


                                            <div class="form-group">
                                                <label class="form-label" for="field-11591251553">Diferenciais</label>
                                                <div class="form-group">
                                                    <span class="desc"></span>
                                                    <div class="controls cadastroMultiplo">
                                                        <select name="diferenciais[]" class="form-control">
                                                            <option value="">Adicione um diferencial</option>
                                                            <?php foreach($diferenciais as $dif): ?>
                                                                <option value="<?php echo $dif->id ?>"><?php echo $dif->nome; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary botaoPequeno duplicar">Adicionar diferenciais &#10133;</button>
                                                <!-- <span class="botaoPequeno duplicar" style="cursor:pointer;">Adicionar diferenciais &#10133;</span> -->
                                            </div>

                                            <div class="form-group">
                                                <div class="wrapper main-wrapper row">
                                                    <ul class="list-group">
                                                        <?php foreach($produtos_diferenciais as $pd): ?>
                                                            <li class="list-group-item">
                                                                <span><?php echo $pd->nome; ?></span>
                                                                <!-- <i class="fa fa-trash excluir" data-id="<?php echo $pd->id; ?>" data-conteudo="produtos_diferenciais" aria-hidden="true"></i> -->
                                                                <button type="submit" data-id="<?php echo $pd->id; ?>"  data-conteudo="produtos_diferenciais" class="btn btn-danger excluir">Excluir</button>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
                                            <div class="text-left">
                                                <input type="submit" value="Enviar" class="btn btn-primary">
                                                <a href="<?php echo base_url('admin/painel'); ?>" class="btn btn-default">Cancel</a>
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