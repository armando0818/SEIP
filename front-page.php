<?php get_header(); ?>
<div class="seip-content"><div class="seip-marquee" aria-label="Tu voz también construye una mejor educación">
  <div class="seip-marquee-track">
    <div class="seip-marquee-group"><span>Tu voz también construye una mejor educación</span><b>•</b><span>Participa, comparte, transforma</span><b>•</b><span>Tu voz también construye una mejor educación</span><b>•</b></div>
    <div class="seip-marquee-group" aria-hidden="true"><span>Tu voz también construye una mejor educación</span><b>•</b><span>Participa, comparte, transforma</span><b>•</b><span>Tu voz también construye una mejor educación</span><b>•</b></div>
  </div>
</div>
<div class="seip-grid">
<div>
<section class="seip-card seip-hero" id="inicio">
  <div class="seip-hero-copy">
    <div class="seip-kicker">PLATAFORMA EDUCATIVA</div>
    <h1>SEIP</h1>
    <h2 class="seip-slogan">Tu voz también construye<br>una <span>mejor educación</span></h2>
    <p>Un espacio para compartir ideas, impulsar proyectos y construir juntos una educación mejor.</p>
    <a class="seip-btn" href="<?php echo esc_url(home_url('/proyectos/')); ?>">Explorar proyectos <span>→</span></a>
  </div>
  <div class="seip-hero-features">
    <div class="seip-feature"><div class="round">★</div><b>Participa</b><small>con tu voz</small></div>
    <div class="seip-feature"><div class="round">💡</div><b>Comparte</b><small>tus ideas</small></div>
    <div class="seip-feature"><div class="round">♧</div><b>Impulsa</b><small>la innovación</small></div>
    <div class="seip-feature"><div class="round">↗</div><b>Construye</b><small>el cambio</small></div>
  </div>
</section>

<section class="seip-shortcuts">
  <a class="seip-card seip-shortcut" href="<?php echo esc_url(home_url('/proyectos/')); ?>"><div class="round">◇</div><h3>Proyectos</h3><p>Conoce iniciativas educativas y sus avances.</p><span class="seip-arrow">→</span></a>
  <a class="seip-card seip-shortcut" href="<?php echo esc_url(home_url('/eventos/')); ?>"><div class="round">▦</div><h3>Eventos</h3><p>Entérate de ferias, encuentros y actividades.</p><span class="seip-arrow">→</span></a>
  <a class="seip-card seip-shortcut" id="evaluar" href="#evaluar"><div class="round">☆</div><h3>Evaluación docente</h3><p>Participa en la mejora continua de la enseñanza.</p><span class="seip-arrow">→</span></a>
</section>

<section class="seip-card seip-projects" id="proyectos">
  <div class="seip-section-head"><div><span class="seip-kicker">IDEAS EN ACCIÓN</span><h2>Proyectos destacados</h2></div><a class="seip-link" href="<?php echo esc_url(home_url('/proyectos/')); ?>">Ver todos →</a></div>
  <div class="seip-project-grid">
  <?php $projects=new WP_Query(array('post_type'=>'seip_project','posts_per_page'=>3,'post_status'=>'publish')); ?>
  <?php if($projects->have_posts()): while($projects->have_posts()): $projects->the_post(); ?>
    <article class="seip-project">
      <?php if(has_post_thumbnail()): ?><a class="seip-project-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a><?php endif; ?>
      <span class="seip-tag">Proyecto</span><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p><?php echo esc_html(get_the_excerpt() ?: wp_trim_words(get_the_content(),20)); ?></p>
      <footer><span><?php echo esc_html(get_the_date()); ?></span><a href="<?php the_permalink(); ?>" aria-label="Ver proyecto">→</a></footer>
    </article>
  <?php endwhile; wp_reset_postdata(); else: ?>
    <p class="seip-empty">Pronto compartiremos proyectos. Si tienes permisos de administración, puedes añadirlos desde <strong>Proyectos → Añadir proyecto</strong>.</p>
  <?php endif; ?>
  </div>
</section>
</div>

<aside class="seip-right">
  <section class="seip-card seip-side-card seip-welcome" id="perfil">
    <span class="seip-kicker">COMUNIDAD SEIP</span><h2>Ideas que mejoran la educación</h2><p>Este espacio crece con la participación de estudiantes y docentes.</p>
    <div class="seip-tip">💡 Comparte, aprende y construye en comunidad.</div>
  </section>
  <section class="seip-card seip-side-card" id="evaluaciones">
    <div class="seip-section-head"><div><span class="seip-kicker">EN LA PLATAFORMA</span><h2>Contenido publicado</h2></div></div>
    <div class="seip-stats">
      <div class="seip-stat"><div class="seip-stat-icon">◇</div><div><strong><?php echo (int)wp_count_posts('seip_project')->publish; ?></strong><small>Proyectos</small></div></div>
      <div class="seip-stat"><div class="seip-stat-icon">▦</div><div><strong><?php echo (int)wp_count_posts('seip_event')->publish; ?></strong><small>Eventos</small></div></div>
    </div>
  </section>
  <section class="seip-card seip-side-card seip-events" id="eventos">
    <div class="seip-section-head"><div><span class="seip-kicker">AGENDA</span><h2>Próximos eventos</h2></div><a class="seip-link" href="<?php echo esc_url(home_url('/eventos/')); ?>">Ver todos →</a></div>
    <?php $events=new WP_Query(array('post_type'=>'seip_event','posts_per_page'=>3,'post_status'=>'publish','meta_key'=>'_seip_event_date','orderby'=>'meta_value','order'=>'ASC','meta_query'=>array(array('key'=>'_seip_event_date','value'=>current_time('Y-m-d'),'compare'=>'>=','type'=>'DATE')))); ?>
    <?php if($events->have_posts()): while($events->have_posts()): $events->the_post(); $event_date=get_post_meta(get_the_ID(),'_seip_event_date',true); $event_time=get_post_meta(get_the_ID(),'_seip_event_time',true); ?>
      <a class="event" href="<?php the_permalink(); ?>"><div class="seip-date"><b><?php echo esc_html($event_date ? date_i18n('d',strtotime($event_date)) : get_the_date('d')); ?></b><small><?php echo esc_html($event_date ? date_i18n('M',strtotime($event_date)) : get_the_date('M')); ?></small></div><div><div class="seip-event-title"><?php the_title(); ?></div><div class="seip-event-meta"><?php echo esc_html($event_time ?: 'Ver detalles'); ?></div></div><span>›</span></a>
    <?php endwhile; wp_reset_postdata(); else: ?><p class="seip-empty">Aún no hay eventos próximos publicados.</p><?php endif; ?>
  </section>
  <div class="seip-innovation" id="configuracion"><div><span>•</span><br>La innovación<br>empieza contigo</div><b>›</b></div>
</aside>
</div>
<section class="seip-card seip-about" id="nosotros">
  <div class="seip-about-copy">
    <span class="seip-kicker">QUIÉNES SOMOS</span>
    <h2>Innovación que nace <span>en el aula</span></h2>
    <p>SEIP (Sistema de Evaluación e Innovación Pedagógica) es una plataforma web que permite a los estudiantes evaluar de forma confidencial aspectos de la enseñanza, como metodologías, claridad, creatividad e interacción en clase. Además, ofrece un espacio para que los docentes publiquen y compartan proyectos académicos, Ferias de Logros, Expotecnias y otras iniciativas innovadoras. La plataforma también incluye estadísticas y reconocimientos que promueven la mejora continua, la creatividad y la innovación dentro de la comunidad educativa.</p>
  </div>
  <aside class="seip-about-points">
    <div class="seip-about-point"><span>01</span><div><strong>Evaluación confidencial</strong><small>Una voz segura para mejorar la enseñanza.</small></div></div>
    <div class="seip-about-point"><span>02</span><div><strong>Proyectos e iniciativas</strong><small>Ideas que se comparten y se convierten en acción.</small></div></div>
    <div class="seip-about-point"><span>03</span><div><strong>Mejora continua</strong><small>Creatividad e innovación para toda la comunidad.</small></div></div>
  </aside>
</section>
</div>
<?php get_footer(); ?>