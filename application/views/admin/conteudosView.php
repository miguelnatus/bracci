<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="container-fluid">
         <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="table-responsive">
                                <?php
                                //TESTE SE FOR PARA LISTAR TODOS
                                if($acao=='busca'):
                                ?>
                             <table class="table table-hover table-striped">
                                <tr>
                                  <th>Campo</th>
                                  <th>Página</th>
                                  <th>Conteúdo</th>
                                  <th>Idioma</th>
                                  <th></th>
                                </tr>
                                <?php
                                    foreach ($conteudos as $key => $value): 
                                ?>
                           
                                        
                                <tr>
                                    
                                    <td>
                                        <a href="<?php echo base_url('admin/conteudos/editar/').$value->id; ?>">
                                        <?php echo $value->nome_campo; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $value->pagina; ?></td>
                                    <td style="max-width:300px;max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                        <?php echo $value->conteudo; ?>
                                    </td>
                                    <td><?php echo $value->language; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/conteudos/editar/').$value->id; ?>">Editar</a>
                                    </td>
                                    
                                </tr>       
                            
                                <?php 
                                    endforeach;
                                ?>
                            </table>
                        </div>
                    </div>
                </section>
            <?php
            //TESTE SE FOR PARA INSERIR OU ATUALIZAR UM ITEM
            else :
            ?>

            <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="row">
                            <form action="<?php echo base_url('admin/painel/atualizar/conteudos/'); ?><?php echo (isset($conteudos[0]->id))? $conteudos[0]->id : '';?>" method="post">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($conteudos[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/conteudos/').$conteudos[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Página</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="pagina" value="<?php echo (isset($conteudos[0]->pagina))? $conteudos[0]->pagina : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Nome Campo</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="nome_campo" value="<?php echo (isset($conteudos[0]->nome_campo))? $conteudos[0]->nome_campo : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Idioma</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                               <select name="language" class="form-control">
                                                    <?php if(isset($conteudos[0]->language)): ?>
                                                        <option value="<?php echo (isset($conteudos[0]->language))? $conteudos[0]->language : ''; ?>"><?php echo (isset($conteudos[0]->language))? $conteudos[0]->language : ''; ?></option>
                                                    <?php else: ?>
                                                        <option value="pt">PT</option>
                                                        <option value="en">EN</option>
                                                        <option value="it">IT</option>
                                                    <?php endif; ?> 
                                               </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Conteúdo</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea name="conteudo" id="" cols="30" rows="10" class="form-control"><?php echo (isset($conteudos[0]->conteudo))? $conteudos[0]->conteudo : ''; ?></textarea>
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