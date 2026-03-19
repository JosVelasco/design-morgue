<?php
/**
 * Plugin Name: Design Morgue Workshop
 * Description: Admin notice and editor setup for the Design Morgue Playground workshop.
 */

// Inject Google Fonts for the notice chrome.
add_action( 'admin_head', function () {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
	echo '<link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&family=Special+Elite&display=swap" rel="stylesheet">';
	echo '<style>
		#design-morgue-notice { background:#0d0d0d; border-left:4px solid #c0392b; color:#e8e0d0; padding:0 24px 18px; margin:16px 20px 0; }
		#design-morgue-notice img { width:100%; max-width:100%; display:block; margin-bottom:12px; }
		#design-morgue-notice h2 { font-family:"UnifrakturMaguntia",serif; font-size:28px; color:#c0392b; margin:0 0 8px; font-weight:normal; }
		#design-morgue-notice p { font-family:"Special Elite",monospace; font-size:14px; color:#c8bfb0; margin:4px 0; line-height:1.6; }
		#design-morgue-notice a { font-family:"Special Elite",monospace; color:#e05252; font-weight:bold; text-decoration:none; border-bottom:1px dotted #e05252; }
		#design-morgue-notice a:hover { color:#ff7070; border-color:#ff7070; }
		#design-morgue-notice .morgue-tag { font-size:11px; letter-spacing:2px; text-transform:uppercase; color:#555; margin:0 0 6px; display:block; padding-top:18px; }
	</style>';
} );

// Inject fonts into the block editor canvas.
add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_style(
		'design-morgue-fonts',
		'https://fonts.googleapis.com/css2?family=Special+Elite&display=swap',
		array(),
		null
	);
	wp_add_inline_style( 'design-morgue-fonts', '
		.editor-styles-wrapper p, .wp-block-post-content p {
			font-family: "Special Elite", monospace !important;
		}
	' );
} );

// Quiz styles loaded in footer to override QSM's own stylesheet.
add_action( 'wp_footer', function () {
	echo '<style>
		.qsm-quiz-container.qmn_quiz_container .mlw_qmn_question p { font-weight: bold !important; }
		.qsm-submit-btn { display: none !important; }
		.mlw_custom_start { display: none !important; }
		.mlw_previous { display: none !important; }
		.quiz_section.qsm-question-wrapper { margin-bottom: 30px; }
	</style>';
}, 99 );

// Render the admin notice.
add_action( 'admin_notices', function () {
	$checklist = get_page_by_path( 'workshop-checklist' );
	$url       = $checklist ? admin_url( 'post.php?post=' . $checklist->ID . '&action=edit' ) : admin_url();
	$banner    = content_url( 'uploads/banner.jpg' );
	?>
	<div id="design-morgue-notice" class="notice">
		<img src="<?php echo esc_url( $banner ); ?>" alt="The Design Morgue workshop banner" />
		<span class="morgue-tag">Case No. DM-001 &mdash; Filed: <?php echo date( 'Y' ); ?></span>
		<h2>The Design Morgue</h2>
		<p>The specimens have been laid out. Each one died of a preventable condition.</p>
		<p>Your task: examine the evidence, identify the cause of death, and attempt resuscitation.</p>
		<p>&rarr; <a href="<?php echo esc_url( $url ); ?>">Open the Case Files &amp; Begin the Examination</a></p>
	</div>
	<?php
} );
