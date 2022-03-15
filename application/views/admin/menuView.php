<body class="pace-done">
	<div class="page-topbar">
		<div class="container-fluid">
	        <div class="logo-area">
	        </div>
	        <div class="quick-area">
	        <div class="pull-left">
	         
	        </div>
	        <div class="pull-right">
	            <ul class="info-menu right-links list-inline list-unstyled">
		            <li class="profile list-inline-item showopacity">
		               <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
		               <span><?php echo $usuario['email']; ?><i class="fa fa-angle-down"></i></span>
		               </a>
		            </li>
		           <!--  <li class="chat-toggle-wrapper list-inline-item">
		               <a href="#" data-toggle="chatbar" class="toggle_chat">
		               <i class="fa fa-comments"></i>
		               <span class="badge badge-pill badge-accent">9</span>
		               <i class="fa fa-times"></i>
		               </a>
		            </li> -->
	            </ul>
	        </div>

	    </div>

	</div>

	<div class="page-container row-fluid container-fluid">
      <div class="col-sm-6 pull-right">
        <a href="<?php echo base_url('admin/painel/deleteCache'); ?>" class="btn btn-danger dropdown-toggle pull-right" style="margin: 14px 0 14px 0;">
          Limpar cache
        </a>
      </div>
   <!-- SIDEBAR - START -->
    <div class="page-sidebar pagescroll expandit">
      
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
        
         <ul class="wraplist" style="height: auto;">
            <li class=""> 
               <a href="<?php echo base_url('admin/painel/'); ?>">
               <i class="fa fa-dashboard"></i>
               <span class="title">Dashboard</span>
               </a>
            </li>
            <li class="">
               <a href="#">
               <i class="fa fa-cubes"></i>
               <span class="title">Produtos</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/produtos'); ?>">Todos os Produtos</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/produtos/editar'); ?>">Adicionar Produto</a>
                  </li>
               </ul>
            </li>
            <li class="">
               <a href="<?php echo base_url('admin/orcamentos/'); ?>">
               <i class="fa fa-cubes"></i>
               <span class="title">Orçamentos</span>
               <span class="arrow "></span>
               </a>
            </li>
            <li class="">
               <a href="#">
               <i class="fa fa-tags"></i>
               <span class="title">Linhas</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/linhas/'); ?>">Todas as Linhas</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/linhas/editar'); ?>">Adicionar Linha</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/linhas/ordenarlinhas'); ?>">Ordenar Produtos</a>
                  </li>
               </ul>
            </li>
            <li class="">
               <a href="#">
               <i class="fa fa-desktop"></i>
               <span class="title">Projetos</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/projetos/'); ?>">Todos os Projetos</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/projetos/editar'); ?>">Adicionar Projeto</a>
                  </li>
               </ul>
            </li>
            <li class="">
               <a href="#">
               <i class="fa fa-filter"></i>
               <span class="title">Filtros</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/filtros/'); ?>">Todos os Filtros</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/filtros/editar'); ?>">Adicionar Filtro</a>
                  </li>

                  <li>
                     <a class="" href="<?php echo base_url('admin/filtros/ordenarfiltros'); ?>">Ordenar Produtos</a>
                  </li>
               </ul>
            </li>
            <li class="">
               <a href="#">
               <i class="fa fa-plus"></i>
               <span class="title">Diferenciais</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/diferenciais/'); ?>">Todos os Diferenciais</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/diferenciais/editar'); ?>">Adicionar Diferenciais</a>
                  </li>
               </ul>
            </li>

            <li class="">
               <a href="#">
               <i class="fa fa-file-image-o"></i>
               <span class="title">Banner</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/banners/'); ?>">Todos os Banners</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/banners/editar'); ?>">Adicionar Banners</a>
                  </li>
               </ul>
            </li>

            <li class="">
               <a href="#">
               <i class="fa fa-copy"></i>
               <span class="title">Conteúdos</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/conteudos/'); ?>">Todos os Conteúdos</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/conteudos/editar'); ?>">Adicionar Conteúdo</a>
                  </li>
               </ul>
            </li>
            <li class="">
               <a href="#">
               <i class="fa fa-key"></i>
               <span class="title">Usuários</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a class="" href="<?php echo base_url('admin/usuarios/'); ?>">Todos os Usuários</a>
                  </li>
                  <li>
                     <a class="" href="<?php echo base_url('admin/usuarios/editar'); ?>">Adicionar Usuário</a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- MAIN MENU - END -->
   </div>
   <!--  SIDEBAR - END -->