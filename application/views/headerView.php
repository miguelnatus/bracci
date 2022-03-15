<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="index,follow" name="robots" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-192953971-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-192953971-1');
  </script>

  <title><?php if ($page_seo != '') {
            echo $page_seo . ' |';
          } ?> Bracci</title>

  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/favicon.png">

  <script>
    var url = "<?php echo base_url(); ?>";
    var lang = "<?php echo $this->uri->segment(1); ?>";
  </script>

  <meta content="Metais sofisticados" name="description" />
  <meta property="og:title" content="<?php if ($page_seo != '') {
                                        echo $page_seo . ' |';
                                      } ?> Bracci" />
  <meta property="og:description" content="Metais sofisticados" />
  <meta property="og:image" content="<?php echo base_url(); ?>public/img/logo.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/reset.css">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link rel="stylesheet" href="https://use.typekit.net/nko8qoz.css" />

  <!-- <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/style.css'); ?>">
  <?php if ($page_name == '') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/home.css'); ?>">
  <?php elseif ($page_name == 'contato') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/contato.css'); ?>">
  <?php elseif ($page_name == 'empresa') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/empresa.css'); ?>">
  <?php elseif ($page_name == 'sustentabilidade') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/sustentabilidade.css'); ?>">
  <?php elseif ($page_name == 'qualidade') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/sustentabilidade.css'); ?>">
  <?php elseif ($page_name == 'onde-comprar') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/onde-comprar.css'); ?>">
  <?php elseif ($page_name == 'categoria') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/categoria.css'); ?>">
  <?php elseif ($page_name == 'produto') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/produto.css'); ?>">
  <?php elseif ($page_name == 'projetos') : ?>
    <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/projetos.css'); ?>">
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo base_url() . assets_version('public/css/flexslider.css'); ?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.3/jquery.fancybox.css" integrity="sha512-L6KhGa9NQEs9kxn3m8v+fbwEcAcflTB33c8hIyFPOcsV/dcHZRZNVcdksRSAQy/CpZxLWxCZxeBQZA23fW9GiQ==" crossorigin="anonymous" />

  <!-- Hotjar Tracking Code for https://www.bracci.com.br -->
  <script>
    (function(h, o, t, j, a, r) {
      h.hj = h.hj || function() {
        (h.hj.q = h.hj.q || []).push(arguments)
      };
      h._hjSettings = {
        hjid: 953283,
        hjsv: 6
      };
      a = o.getElementsByTagName('head')[0];
      r = o.createElement('script');
      r.async = 1;
      r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
      a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
  </script>

  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '279918972957836');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=279918972957836&ev=PageView&noscript=1" /></noscript>
  <!-- End Facebook Pixel Code -->

</head>

<body>
  <main id="content">
    <header class="is-black">
      <div class="container">
        <div class="row">
          <div class="navbar-bracci col-xs-6 col-sm-2">
            <a href="<?php echo base_url(); ?>">
              <img src="<?php echo base_url(); ?>public/img/logo.png" alt="" class="img-responsive">
            </a>
          </div>
          <div class="hambuger col-xs-6">
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false"> <span aria-hidden="true"></span> <span aria-hidden="true"></span> <span aria-hidden="true"></span> </a>
          </div>

          <div class="menu-desk col-xs-12 col-sm-8">
            <nav>
              <ul>
                <div class="menu-link">
                  <li><a href="" class="white"><?php echo $translations->{lang($lang, 'acabamentos')}; ?></a></li>
                  <ul class="dropdown">
                    <?php foreach ($acabamento as $key => $acabamentos) : ?>
                      <li>
                        <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'acabamentos')}) . '/' . slugify($acabamentos->{lang($lang, 'nome')}); ?>"><?php echo $acabamentos->{lang($lang, 'nome')};  ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="menu-link">
                  <li><a href="" class="white">Ambientes</a></li>
                  <ul class="dropdown">

                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'ambientes')}) . '/' . slugify($translations->{lang($lang, 'banheiro_title')}); ?>"><?php echo $translations->{lang($lang, 'banheiro_title')}; ?></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'ambientes')}) . '/' . slugify($translations->{lang($lang, 'cozinha_title')}); ?>"><?php echo $translations->{lang($lang, 'cozinha_title')}; ?></a>
                    </li>

                  </ul>
                </div>
                <div class="menu-link">
                  <li><a href="" class="white"><?php echo $translations->{lang($lang, 'linhas')}; ?></a></li>
                  <ul class="dropdown">
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'acessorios')}); ?>"><?php echo $translations->{lang($lang, 'acessorios')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'banheiras_de_imersao')}); ?>"><?php echo $translations->{lang($lang, 'banheiras_de_imersao')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'chuveiros_termostaticos')}); ?>"><?php echo $translations->{lang($lang, 'chuveiros_termostaticos')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'chuveiros')}); ?>"><?php echo $translations->{lang($lang, 'chuveiros')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'complementos')}); ?>"><?php echo $translations->{lang($lang, 'complementos')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'cubas_de_banheiro')}); ?>"><?php echo $translations->{lang($lang, 'cubas_de_banheiro')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'cubas_de_cozinha')}); ?>"><?php echo $translations->{lang($lang, 'cubas_de_cozinha')}; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'misturadores_de_piso')}); ?>"><?php echo $translations->{lang($lang, 'misturadores_de_piso')}; ?>
                      </a>
                    </li>
                    <li class="misturadores">
                      <a href="#" style="font-weight: bold"><?php echo $translations->{lang($lang, 'misturadores')}; ?>
                      </a>
                      <ul class="dropdown-sub">
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'cirrus')}); ?>"><?php echo $translations->{lang($lang, 'cirrus')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'modena')}); ?>"><?php echo $translations->{lang($lang, 'modena')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'novacci')}); ?>"><?php echo $translations->{lang($lang, 'novacci')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'parisi')}); ?>"><?php echo $translations->{lang($lang, 'parisi')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'smart_sensor')}); ?>"><?php echo $translations->{lang($lang, 'smart_sensor')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'st_claire')}); ?>"><?php echo $translations->{lang($lang, 'st_claire')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'st_louise')}); ?>"><?php echo $translations->{lang($lang, 'st_louise')}; ?></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'linhas')}) . '/' . slugify($translations->{lang($lang, 'vercci')}); ?>"><?php echo $translations->{lang($lang, 'vercci')}; ?></a>
                        </li>
                      </ul>
                    </li>


                  </ul>
                </div>
                <div class="menu-link">
                  <li><a href="" class="white"><?php echo $translations->{lang($lang, 'sobre')}; ?></a></li>
                  <ul class="dropdown">
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'sustentabilidade')}); ?>"><?php echo $translations->{lang($lang, 'sustentabilidade')}; ?></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'empresa')}); ?>"><?php echo $translations->{lang($lang, 'empresa')}; ?></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'qualidade')}); ?>"><?php echo $translations->{lang($lang, 'qualidade')}; ?></a>
                    </li>

                    <li>
                      <a href="<?php echo base_url($lang . '/onde-comprar'); ?>">
                        Onde Comprar
                        <span class="navbar-item__new">New</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="menu-link link-contato">
                  <li><a href="<?php echo base_url($lang) . '/' . slugify($translations->{lang($lang, 'contato')}); ?>" class="white"><?php echo $translations->{lang($lang, 'contato')}; ?></a></li>
                </div>
              </ul>
            </nav>
          </div>
          <div id="menu-end" class="col-xs-12 col-sm-2">
            <div class="flags">
              <?php if ($lang != 'pt') : ?>
                <a title="Italiano" href="<?php echo base_url('pt'); ?>" class="flag">
                  <img class="flag__image" src="<?php echo base_url('public/img/svg/br.svg'); ?>" alt="Português">
                </a>
              <?php endif; ?>
              <?php if ($lang != 'en') : ?>
                <a title="English" href="<?php echo base_url('en'); ?>" class="flag">
                  <img class="flag__image" src="<?php echo base_url('public/img/svg/en.svg'); ?>" alt="English">
                </a>
              <?php endif; ?>
              <?php if ($lang != 'it') : ?>
                <a title="Italiano" href="<?php echo base_url('it'); ?>" class="flag">
                  <img class="flag__image" src="<?php echo base_url('public/img/svg/it.svg'); ?>" alt="Italiano">
                </a>
              <?php endif; ?>
              <a id="search-icon" class="navbar-item" href="#" title="Pesquisar">
                <span class="is-medium">
                  <svg class="svg-inline--fa fa-search fa-w-16 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                  </svg><!-- <i class="fas fa-search fa-lg"></i> --> </span>
              </a>
              <a class="whatsapp-button hidden-xs" href="https://wa.me/5554991779654" onclick="gtag('event', 'click', {'event_category': 'Whatsapp','event_label': 'Whatsapp'});" target="_blank">
                <img src="<?php echo base_url('public/img/logo-whatsapp-1536.png'); ?>" alt="Whatsapp da Bracci" class="whatsapp-button__logo img-responsive">
              </a>
            </div>
          </div>
        </div>
      </div>
      <a class="whatsapp-button visible-xs" href="https://wa.me/5554991779654" onclick="gtag('event', 'click', {'event_category': 'Whatsapp','event_label': 'Whatsapp'});" target="_blank">
        <img src="<?php echo base_url('public/img/logo-whatsapp-1536.png'); ?>" alt="Whatsapp da Bracci" class="whatsapp-button__logo img-responsive">
      </a>
    </header>
