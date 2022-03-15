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
                        foreach ($usuarios as $key => $value): 
                    ?>
                
                        <li>
                            <a href="<?php echo base_url('admin/usuarios/editar/').$value->id; ?>">
                            <h2><?php echo $value->email; ?></h2>
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
                            <form action="<?php echo base_url('admin/painel/atualizar/usuarios/'); ?><?php echo (isset($usuarios[0]->id))? $usuarios[0]->id : '';?>" method="post">
                                <div class="col-sm-12 col-md-9 col-lg-8">
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <?= $this->session->flashdata('success'); ?>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <!--BOTAO DE DELETAR *INICIO*-->
                                        <?php if (isset($usuarios[0]->id)): ?>
                                            <div class="form-group">
                                                <a href="<?php echo base_url('admin/painel/deletar/usuarios/').$usuarios[0]->id ?>" class="btn btn-danger">Deletar</a>
                                            </div>
                                        <?php endif; ?>
                                        <!--BOTAO DE DELETAR *FIM*-->
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">E-mail</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" name="email" value="<?php echo (isset($usuarios[0]->email))? $usuarios[0]->email : ''; ?>" class="form-control" id="field-11591251553">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-11591251553">Senha</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="password" name="senha" value="" class="form-control" id="field-11591251553">
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