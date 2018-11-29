<?php
global $post;
$post_slug = $post->post_name;

$form = get_sub_field('gf_form');
$submit = get_sub_field('submit_text');
$confirmation = get_sub_field('confirmation');

$hide_fields = get_sub_field('hide_fields');


if (in_array('resource_center', $hide_fields)) {
    array_push($hide_fields, 'hide_password');
} else {
    array_push($hide_fields, 'show_password');
}

$hide_fields = implode(' ', $hide_fields);


$server = array(
    'site_url' => get_site_url(),
    'logged_in' => is_user_logged_in(),
    'uri' => $_SERVER["REQUEST_URI"],
    'slug' => $post_slug
);

$display_title = false;
$display_description = false;
$display_inactive = false;
$field_values = null;
$ajax = false;
$tabindex = null;
$echo = true;

$id = $form['id'];

$uri = $_SERVER["REQUEST_URI"];


$field_values = array(
    'server' => json_encode($server)
);

if ($submit) $field_values['submit'] = $submit;
if ($confirmation) $field_values['confirmation'] = $confirmation;
if ($hide_fields) $field_values['hide_fields'] = $hide_fields;

//$subject = $uri;
$pattern = '/contact-us/';
if (preg_match($pattern, $uri)) {
    $field_values['page'] = 'contact-us';
};

?>
<?php gravity_form($form['id'], $display_title, $display_description, $display_inactive, $field_values, $ajax, $tabindex, $echo); ?>
    <div id="gform-message" class="hide">Please fill in all required fields.</div>
<?php //var_dump(json_encode($server)); ?>
