<?php
if (!defined('ABSPATH')) exit;

function seip_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array('height'=>54,'width'=>54,'flex-height'=>true,'flex-width'=>true));
    register_nav_menus(array('primary'=>'Menú principal'));
}
add_action('after_setup_theme','seip_setup');

function seip_register_content_types(){
    register_post_type('seip_project', array(
        'labels'=>array('name'=>'Proyectos','singular_name'=>'Proyecto','add_new_item'=>'Añadir proyecto','edit_item'=>'Editar proyecto'),
        'public'=>true,'has_archive'=>true,'rewrite'=>array('slug'=>'proyectos'),'show_in_rest'=>true,
        'menu_icon'=>'dashicons-lightbulb','supports'=>array('title','editor','excerpt','thumbnail','author'),
    ));
    register_post_type('seip_event', array(
        'labels'=>array('name'=>'Eventos','singular_name'=>'Evento','add_new_item'=>'Añadir evento','edit_item'=>'Editar evento'),
        'public'=>true,'has_archive'=>true,'rewrite'=>array('slug'=>'eventos'),'show_in_rest'=>true,
        'menu_icon'=>'dashicons-calendar-alt','supports'=>array('title','editor','excerpt','thumbnail','author'),
    ));
}
add_action('init','seip_register_content_types');

function seip_event_fields(){
    add_meta_box('seip_event_details','Fecha y hora del evento','seip_event_fields_html','seip_event','normal','high');
}
add_action('add_meta_boxes','seip_event_fields');
function seip_event_fields_html($post){
    wp_nonce_field('seip_save_event_details','seip_event_nonce');
    $date=get_post_meta($post->ID,'_seip_event_date',true);
    $time=get_post_meta($post->ID,'_seip_event_time',true);
    echo '<p><label for="seip_event_date">Fecha</label><br><input type="date" id="seip_event_date" name="seip_event_date" value="'.esc_attr($date).'" /></p>';
    echo '<p><label for="seip_event_time">Hora</label><br><input type="time" id="seip_event_time" name="seip_event_time" value="'.esc_attr($time).'" /></p>';
}
function seip_save_event_details($post_id){
    if (!isset($_POST['seip_event_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['seip_event_nonce'])),'seip_save_event_details')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post',$post_id)) return;
    foreach(array('date'=>'seip_event_date','time'=>'seip_event_time') as $key=>$field){
        if (isset($_POST[$field])) update_post_meta($post_id,'_seip_event_'.$key,sanitize_text_field(wp_unslash($_POST[$field])));
    }
}
add_action('save_post_seip_event','seip_save_event_details');

function seip_assets(){
    wp_enqueue_style('seip-style', get_stylesheet_uri(), array(), '1.4');
    wp_enqueue_script('seip-main', get_template_directory_uri().'/assets/js/main.js', array(), '1.4', true);
}
add_action('wp_enqueue_scripts','seip_assets');

function seip_menu_fallback(){
    $items=array(
        array('⌂','Inicio','#inicio'),
        array('✦','Nosotros','#nosotros'),
        array('☆','Evaluar docentes','#evaluar'),
        array('▣','Mis evaluaciones','#evaluaciones'),
        array('◇','Proyectos académicos','/proyectos/'),
        array('▦','Eventos y ferias','/eventos/'),
        array('♙','Mi perfil','#perfil'),
        array('⚙','Configuración','#configuracion')
    );
    foreach($items as $item){
        $url=($item[2][0]==='#') ? home_url($item[2]) : home_url($item[2]);
        echo '<a href="'.esc_url($url).'"><span class="icon">'.esc_html($item[0]).'</span>'.esc_html($item[1]).'</a>';
    }
}