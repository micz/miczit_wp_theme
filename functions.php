<?php
/**
 * Nisarg functions and definitions
 *
 * @package Nisarg
 */

 $miczit_theme_ver='v4-0926';


if ( ! function_exists( 'nisarg_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

/**
 * Nisarg only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

function nisarg_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Nisarg, use a find and replace
	 * to change 'nisarg' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nisarg', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270);
	add_image_size( 'nisarg-full-width', 1038, 576, true );
	add_image_size( 'miczit-full-width', 1024, 576, false );
	add_image_size( 'miczit-small-width', 200, 200, false );


	function register_nisarg_menus() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Top Primary Menu', 'nisarg' ),
			'primary_en' => esc_html__( 'Top Primary Menu EN', 'nisarg' ),
		) );
	}

	add_action( 'init', 'register_nisarg_menus' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery'
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nisarg_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );
}
endif; // nisarg_setup
add_action( 'after_setup_theme', 'nisarg_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function nisarg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nisarg_content_width', 640 );
}
add_action( 'after_setup_theme', 'nisarg_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nisarg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nisarg' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Progetti', 'nisarg' ),
		'id'            => 'progetti',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Fotografia', 'nisarg' ),
		'id'            => 'fotografia',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'nisarg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nisarg_scripts() {
	global $miczit_theme_ver;

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );

	wp_enqueue_style( 'nisarg-style', get_stylesheet_uri() , array(), $miczit_theme_ver);

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array('jquery'),'',true);

	wp_enqueue_script( 'nisarg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'nisarg-js', get_template_directory_uri() . '/js/nisarg.js',array('jquery'),$miczit_theme_ver,true);

	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(),'3.7.3',false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nisarg_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';


function nisarg_google_fonts() {
	$query_args = array(

		'family' => 'Lato:400,300italic,700|Source+Sans+Pro:400,400italic'
	);
	wp_register_style( 'nisarggooglefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'nisarggooglefonts');
}

add_action('wp_enqueue_scripts', 'nisarg_google_fonts');


function nisarg_new_excerpt_more( $more ) {
    return '...<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nisarg') . '<span class="screen-reader-text"> '. __(' Read More', 'nisarg').'</span></a></p>';
}
add_filter( 'excerpt_more', 'nisarg_new_excerpt_more' );

function custom_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 *  * @return string The Link format URL.
 */
function nisarg_get_link_url() {
	$nisarg_content = get_the_content();
	$nisarg_has_url = get_url_in_content( $nisarg_content );

	return ( $nisarg_has_url ) ? $nisarg_has_url : apply_filters( 'the_permalink', get_permalink() );
}

//================================ micz.it
function miczit_favicon_link() {
    echo '<link href="http://en.gravatar.com/avatar/6072f5dbcf8438bf469e4270a22723ca?s=16&r=any" rel="icon"/>'."\n";
    echo '<link href="http://en.gravatar.com/avatar/6072f5dbcf8438bf469e4270a22723ca" rel="apple-touch-icon" />'."\n";
}
add_action('wp_head', 'miczit_favicon_link');

function miczit_get_i18n_page($id,$short=false){
	$before='<div class="miczit_lang">';
	$after='</div>';
	$en_lang=get_post_meta($id,'en',true);
	if($en_lang){
		$msg_en='';
		if(!$short){
			$msg_en='Read this content in English ';
		}
		echo $before.'<a href="'.$en_lang.'#m">'.$msg_en.'<img alt="" title="English" src="'.get_stylesheet_directory_uri().'/images/uk-icon.png" border="0"/></a>'.$after;
	}else{
		$it_lang=get_post_meta($id,'it',true);
		if($it_lang){
			$msg_it='';
			if(!$short){
				$msg_it='Leggi questo contenuto in Italiano ';
			}
			echo $before.'<a href="'.$it_lang.'#m">'.$msg_it.'<img alt="" title="Italiano" src="'.get_stylesheet_directory_uri().'/images/italy-icon.png" border="0"/></a>'.$after;
		}
	}
}

function miczit_title_filter ( $title ) {
    if ( is_home() || is_front_page() )
        unset($title['tagline']);
    if (( is_tag() || is_category() )&&(miczit_get_user_lang()!='it')){
		if(is_category()){
			$category = get_category( get_query_var( 'cat' ) );
			$term_id = $category->cat_ID;
		}else{	//is a tag
			$tag = get_category( get_query_var( 'tag_id' ) );
			$term_id = $tag->term_id;
		}
		$miczit_english=get_term_meta( $term_id, 'miczit_english', true );
		if($miczit_english!=''){
			$title['title']=$miczit_english;
		}
	}
    return $title;
}
add_filter( 'document_title_parts', 'miczit_title_filter', 10, 1 );

function miczit_archive_title_filter ( $title ) {
    if (( is_tag() || is_category() )&&(miczit_get_user_lang()!='it')){
		if(is_category()){
			$category = get_category( get_query_var( 'cat' ) );
			$term_id = $category->cat_ID;
		}else{	//is a tag
			$tag = get_category( get_query_var( 'tag_id' ) );
			$term_id = $tag->term_id;
		}
		$miczit_english=get_term_meta( $term_id, 'miczit_english', true );
		if($miczit_english!=''){
			$title=$miczit_english;
		}
	}
    return $title;
}
add_filter( 'get_the_archive_title', 'miczit_archive_title_filter', 100, 1 );

function miczit_exclude_images_from_home( $query )
{
    if ( is_home() || is_front_page() )
    {
        set_query_var( 'tax_query' , array(
        	array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array(
					/*'post-format-aside',
					'post-format-audio',
					'post-format-chat',
					'post-format-gallery',*/
					'post-format-image',	//image post format are not shown in the homepage
				   /* 'post-format-link',
					'post-format-quote',
					'post-format-status',
					'post-format-video'*/
				),
				'operator' => 'NOT IN'
       		)
    	));
    	set_query_var('tag__not_in' , array( 254 ));	//post with this tag are not shown in the homepage
    }
}
add_action( 'pre_get_posts', 'miczit_exclude_images_from_home' );

function miczit_archive_title($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_month() ) {
            $title = sprintf( __( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
        }
    return $title;
}
add_filter( 'get_the_archive_title','miczit_archive_title');

function miczit_filter_tags( $term_links ) {
    $result = array();
    $exclude_tags = array( 'nohome' );
    foreach ( $term_links as $link ) {
        foreach ( $exclude_tags as $tag ) {
            if ( stripos( $link, $tag ) !== false ) continue 2;
        }
        $result[] = $link;
    }
    return $result;
}
add_filter( "term_links-post_tag", 'miczit_filter_tags', 100, 1 );

if ( ! function_exists( 'miczit_get_user_lang' ) ) :

function miczit_get_user_lang(){
	$user_pref_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	if($user_pref_langs){
		if(substr($user_pref_langs[0],0,2)=='it'){
			return 'it';
		}else{
			return 'en';
		}
	}
}

endif;

function miczit_search_filter($query){
	if (($query->is_search)&&!is_admin()) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','miczit_search_filter');


// TAG and CATEGORY translation - micz.it
//add field on form
function miczit_tag_lang_field_add() {
    ?>
        <div class="form-field">
            <label for="miczit_english"><?php _e( 'English', 'nisarg' ); ?></label>
            <input type="text" name="miczit_english" id="miczit_english" value="">
            <p class="description"><?php _e( 'English translation for the name field.', 'nisarg' ); ?></p>
        </div>
    <?php
}
add_action('add_tag_form_fields','miczit_tag_lang_field_add');
add_action('category_add_form_fields','miczit_tag_lang_field_add');

//edit field form
function miczit_tag_lang_field_edit($term) {
	$miczit_english=get_term_meta( $term->term_id, 'miczit_english', true );
    ?><tr class="form-field term-group-wrap">
        <th scope="row"><label for="miczit_english"><?php _e('English','nisarg'); ?></label></th>
        <td><input type="text" name="miczit_english" id="miczit_english" value="<?php echo $miczit_english; ?>">
        <p class="description"><?php _e( 'English translation for the name field.', 'nisarg' ); ?></p></td>
    </tr><?php
}
add_action('post_tag_edit_form_fields','miczit_tag_lang_field_Edit');
add_action('edit_category_form_fields','miczit_tag_lang_field_Edit');

//add column on list
function miczit_add_tag_column($columns){
    $columns['miczit_english'] = __('English','nisarg');
    return $columns;
}
add_filter('manage_edit-post_tag_columns', 'miczit_add_tag_column');
add_filter('manage_edit-category_columns', 'miczit_add_tag_column');

//make it sortable
function miczit_add_tag_sortable_column( $sortable_columns ) {
   $sortable_columns[ 'miczit_english' ] = 'miczit_english';
   return $sortable_columns;
}
add_filter( 'manage_edit-post_tag_sortable_columns', 'miczit_add_tag_sortable_column' );
add_filter( 'manage_edit-category_sortable_columns', 'miczit_add_tag_sortable_column' );

//Fill the new column
function miczit_tag_column_content( $content, $column_name, $term_id ){
    switch( $column_name ){
    case 'miczit_english' :
      return get_term_meta( $term_id, 'miczit_english', true );
      break;
    default: return $content;
    break;
  }
}
add_filter('manage_post_tag_custom_column', 'miczit_tag_column_content',10,3);
add_filter('manage_category_custom_column', 'miczit_tag_column_content',10,3);

//Save the new field - EDIT
function miczit_edit_tag_meta( $term_id, $taxonomy ) {
	$miczit_post_english='';
	if ( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX ){
		$miczit_post_english=$_POST['English'];
	}else{
		$miczit_post_english=$_POST['miczit_english'];
	}
	if( isset( $miczit_post_english ) && '' !== trim($miczit_post_english) ){
		update_term_meta( $term_id, 'miczit_english', esc_html($miczit_post_english) );
	}
}
add_action( 'edited_post_tag', 'miczit_edit_tag_meta' ,10,2);
add_action( 'edited_category', 'miczit_edit_tag_meta' ,10,2 );

//Save the new field - CREATE
function miczit_create_tag_meta( $term_id, $tt_id ) {
	$miczit_post_english='';
	if ( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX ){
		$miczit_post_english=$_POST['English'];
	}else{
		$miczit_post_english=$_POST['miczit_english'];
	}
	if( isset( $miczit_post_english ) && '' !== trim($miczit_post_english) ){
		add_term_meta( $term_id, 'miczit_english', esc_html($miczit_post_english) , true );
	}
}
add_action( 'created_post_tag', 'miczit_create_tag_meta',10,2 );
add_action( 'created_category', 'miczit_create_tag_meta',10,2 );

//Add custom filed to quick edit
function miczit_tag_quick_edit($column_name,$post_type,$taxonomy){
	if (($column_name != 'miczit_english')||($post_type!='edit-tags')) return;
	//$miczit_english=get_term_meta( $term->term_id, 'miczit_english', true );
	?><fieldset>
	<div class="inline-edit-col">
		<label>
		<span class="title"><?php _e('English','nisarg'); ?></span>
		<span class="input-text-wrap"><input type="text" name="<?php _e('English','nisarg'); ?>" value="" class="ptitle"></span>
		</label>
		</div>
		</fieldset><?php
}
add_action('quick_edit_custom_box','miczit_tag_quick_edit',10,3);

function miczit_quick_add_script() {
	wp_enqueue_script( 'miczit-quick-edit-tag', get_bloginfo( 'stylesheet_directory' ) . '/js/miczit-inline-edit-tax.js', array( 'jquery', 'inline-edit-post' ), '', true );
}
add_action('load-edit-tags.php','miczit_quick_add_script');

//translate the tax if needed
function miczit_translate_tax($terms, $post_ID, $taxonomy){
	if(is_admin()) return $terms;
	if(miczit_get_user_lang()=='it') return $terms;
	if(is_wp_error($terms)) return $terms;
	foreach ($terms as $i => $term){
		$miczit_english=get_term_meta( $terms[$i]->term_id, 'miczit_english', true );
		if($miczit_english!=''){
			$terms[$i]->name=$miczit_english;
		}
	}
	return $terms;
}
add_filter('get_the_terms', 'miczit_translate_tax',10,3);
add_filter('get_terms', 'miczit_translate_tax',10,3);

if(is_admin()){
	//photogray metabox
	function miczit_add_photo_metaboxes() {
		add_meta_box('miczit_photo_info', 'Photo Info', 'miczit_photo_info_metabox', 'post', 'normal', 'high');
	}
	add_action( 'add_meta_boxes', 'miczit_add_photo_metaboxes' );

	function miczit_photo_info_metabox($post){
		/*if(($post->post_type=='post')&&(get_post_format($post->post_ID)=='image')){
			echo 'test';
		}*/
		global $post;
		// Noncename needed to verify where the data originated
		echo '<input type="hidden" name="miczit_photo_info_noncename" id="miczit_photo_info_noncename" value="' .
		wp_create_nonce( wp_basename(__FILE__) ) . '" />';
		// Get data if its already been entered
		$miczit_photo_exif = get_post_meta($post->ID, '_miczit_photo_exif', true);
		$miczit_photo_data = get_post_meta($post->ID, '_miczit_photo_data', true);
		// Echo out the field
		echo 'Exif: <input type="text" name="_miczit_photo_exif" value="' . $miczit_photo_exif  . '" class="widefat" />';
		echo 'Data: <input type="text" name="_miczit_photo_data" value="' . $miczit_photo_data  . '" class="widefat" />';
	}


	// Save the Metabox Data

	function miczit_save_photo_meta($post_id, $post) {
		// verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times
		if(!isset($_POST['miczit_photo_info_noncename']))return;
		if ( !wp_verify_nonce( $_POST['miczit_photo_info_noncename'], wp_basename(__FILE__) )) {
			return $post->ID;
		}

		// Is the user allowed to edit the post or page?
		if ( !current_user_can( 'edit_post', $post->ID ))
			return $post->ID;

		// OK, we're authenticated: we need to find and save the data
		// We'll put it into an array to make it easier to loop though.

		$photo_meta['_miczit_photo_exif'] = $_POST['_miczit_photo_exif'];
		$photo_meta['_miczit_photo_data'] = $_POST['_miczit_photo_data'];

		// Add values of $photo_meta as custom fields

		foreach ($photo_meta as $key => $value) { // Cycle through the $events_meta array!
			if( $post->post_type == 'revision' ) return; // Don't store custom data twice
			$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
			if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
				update_post_meta($post->ID, $key, $value);
			} else { // If the custom field doesn't have a value
				add_post_meta($post->ID, $key, $value);
			}
			if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
		}

	}

	add_action('save_post', 'miczit_save_photo_meta', 1, 2); // save the custom fields
}