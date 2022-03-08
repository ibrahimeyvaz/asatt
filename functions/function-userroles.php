<?php
/* ----------------------------------- CUSTOM USER ROLE: IDEUM-KLANT ----------------------------------- */
function add_theme_caps() {
    $role = get_role( 'klant' );
    // create if neccesary
    if (!$role) $role = add_role('klant', 'Klant'); 
    // add theme specific roles
    
    
    $role->add_cap('read');
    
    $role->add_cap('delete_others_pages');
    $role->add_cap('delete_others_posts');
    $role->add_cap('delete_pages');
    $role->add_cap('delete_posts');
    $role->add_cap('delete_private_pages');
    $role->add_cap('delete_private_posts');
    $role->add_cap('delete_published_pages');
    $role->add_cap('delete_published_posts');
    $role->add_cap('edit_files');
    $role->add_cap('edit_others_pages');
    $role->add_cap('edit_others_posts');
    $role->add_cap('edit_pages');
    $role->add_cap('edit_posts');
    $role->add_cap('edit_private_pages');
    $role->add_cap('edit_private_posts');
	$role->add_cap('edit_published_pages');
	$role->add_cap('edit_published_posts');
	$role->add_cap('manage_links');
	$role->add_cap('manage_categories');
	$role->add_cap('publish_pages');
	$role->add_cap('publish_posts');
	$role->add_cap('read_private_pages');
	$role->add_cap('read_private_posts');
	$role->add_cap('upload_files');

}
add_action( 'admin_init', 'add_theme_caps');

// Must use all three filters for this to work properly.
add_filter( 'ninja_forms_admin_parent_menu_capabilities',   'nf_subs_capabilities' ); // Parent Menu
add_filter( 'ninja_forms_admin_all_forms_capabilities',     'nf_subs_capabilities' ); // Forms Submenu
add_filter( 'ninja_forms_admin_submissions_capabilities',   'nf_subs_capabilities' ); // Submissions Submenu

function nf_subs_capabilities( $cap ) {
    return 'edit_posts'; // EDIT: User Capability
}

/**
 * Filter hook used in the API route permission callback to retrieve submissions
 *
 * return bool as for authorized or not.
 */
add_filter( 'ninja_forms_api_allow_get_submissions', 'nf_define_permission_level', 10, 2 );
add_filter( 'ninja_forms_api_allow_delete_submissions', 'nf_define_permission_level', 10, 2 );
add_filter( 'ninja_forms_api_allow_update_submission', 'nf_define_permission_level', 10, 2 );
add_filter( 'ninja_forms_api_allow_handle_extra_submission', 'nf_define_permission_level', 10, 2 );
add_filter( 'ninja_forms_api_allow_email_action', 'nf_define_permission_level', 10, 2 );

function nf_define_permission_level() {

    $allowed = current_user_can("delete_others_posts");

    return $allowed;
}