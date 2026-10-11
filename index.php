<?php get_header(); ?>

<div class="seip-content">
  <?php if (is_search()) : ?>
    <section class="seip-card seip-side-card">
      <h1><?php printf(esc_html__('Resultados para: %s','seip-dashboard'), esc_html(get_search_query())); ?></h1>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
          </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
      <?php else : ?>
        <p>No se encontraron resultados. Prueba con otras palabras.</p>
      <?php endif; ?>
    </section>
  <?php else : ?>
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('seip-card seip-side-card'); ?>>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <?php the_content(); ?>
        </article>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
    <?php endif; ?>
  <?php endif; ?>
</div>

<?php get_footer(); ?>