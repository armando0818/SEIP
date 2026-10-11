<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="seip-shell">
<aside class="seip-sidebar">
  <div class="seip-brand">
    <?php if (has_custom_logo()) : ?>
      <div class="seip-logo-image"><?php the_custom_logo(); ?></div>
    <?php else : ?>
      <div class="seip-logo-mark">💡</div>
    <?php endif; ?>
    <div><strong>SEIP</strong><small>Evaluación • Innovación • Creatividad</small></div>
  </div>
  <nav class="seip-nav">
    <?php seip_menu_fallback(); ?>
  </nav>
  <div class="seip-side-quote">Tu opinión impulsa<br>una mejor educación<span></span></div>
</aside>

<main class="seip-main">
<header class="seip-topbar">
  <button class="seip-mobile-toggle" aria-label="Abrir menú">☰</button>
  <form class="seip-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input class="seip-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Buscar en el sitio..." aria-label="Buscar en el sitio">
  </form>
  <div class="seip-top-actions">
    <span class="seip-bell">♧</span>
    <div class="seip-user">
      <div class="seip-avatar">●</div>
      <div><strong>Estudiante</strong><small>Panel SEIP</small></div>
      <span>⌄</span>
    </div>
  </div>
</header>
