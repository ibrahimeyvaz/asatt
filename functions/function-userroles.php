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
	$role->add_cap('publish_pages');
	$role->add_cap('publish_posts');
	$role->add_cap('read_private_pages');
	$role->add_cap('read_private_posts');
	$role->add_cap('upload_files');

}
add_action( 'admin_init', 'add_theme_caps');

add_action('admin_menu', 'remove_built_in_roles');

function remove_built_in_roles()
{
    global $wp_roles;

    $roles_to_remove = array('subscriber', 'contributor', 'author', 'editor', 'seo-editor');

    foreach ($roles_to_remove as $role) {
        if (isset($wp_roles->roles[$role])) {
            $wp_roles->remove_role($role);
        }
    }
}