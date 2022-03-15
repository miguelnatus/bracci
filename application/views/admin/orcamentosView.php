<!-- START CONTENT -->
<section id="main-content" class="">
    <div class="container-fluid">
         <div class="col-sm-12">
                <section class="box">
                    <div class="content-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                   
                                    <th>Nome</th>
                                    <th>E-mail/Telefone</th>
                                    <th>Cidade</th>
                                    <th>Produto</th>
                                    <th>Mensagem</th>
                                </tr>
                                <?php
                                    foreach ($orcamento as $key => $value): 
                                ?>                                        
                                <tr>
                                    
                                    <td><?php echo $value->nome; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->cidade; ?></td>
                                    <td><?php echo $value->produto; ?></td>
                                    <td><?php echo $value->msg; ?></td>
                                    <!-- <td style="max-width:300px;max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                        <?php echo $value->produto; ?>
                                    </td>
                                    <td style="max-width:300px;max-width: 25ch;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                        <?php echo $value->msg; ?>
                                    </td> -->
                                    
                                </tr>       
                            
                                <?php 
                                    endforeach;
                                ?>
                            </table>
                        </div>
                    </div>
                </section>
        </section>
    </div>
</section>