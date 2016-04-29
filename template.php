<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  euromod_preprocess_html($variables, $hook);
  euromod_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // euromod_preprocess_node_page() or euromod_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.

 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function euromod_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

//function euromod_preprocess_page(&$variables) {
//print 'YIPEEE!!!';
//kpr($variables);

///]
function euromod_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
    // If the node type is "blog_madness" the template suggestion will be "page--blog-madness.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
  }
}


function euromod_preprocess_search_result(&$variables) {
  global $language;
  $result = $variables['result'];
  $variables['url'] = check_url($result['link']);
  $variables['title'] = check_plain($result['title']);
  if (isset($result['language']) && $result['language'] != $language->language && $result['language'] != LANGUAGE_NONE) {
    $variables['title_attributes_array']['xml:lang'] = $result['language'];
    $variables['content_attributes_array']['xml:lang'] = $result['language'];
  }


  $info = array();
  if (!empty($result['module'])) {
    $info['module'] = check_plain($result['module']);
  }
  if (!empty($result['date'])) {
    $info['date'] = '<span class="meta">Created ' . format_date($result['date'], 'short') . '</span>';
  }
  // Check for existence. User search does not include snippets.
  $variables['snippet'] = isset($result['snippet']) ? $result['snippet'] : '';
  // Provide separated and grouped meta information..
  $variables['info_split'] = $info;
  $variables['info'] = implode(' - ', $info);
  $variables['theme_hook_suggestions'][] = 'search_result__' . $variables['module'];
}


function euromod_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id = 'search-block-form') {
    $form['actions']['submit']['#attributes']['class'][] = 'wwrr';
    $form['search_block_form']['#attributes']['placeholder'] = t('Search'); // html5 placeholder
  }
  // if ($form_id = 'views-exposed-form-publications-page') {
  //   $form['actions']['submit']['#attributes']['class'][] = 'btn';
  //   $form['views_exposed_form_publications_page']['#default_value'] = t('Search'); // Set a default value for the textfield
  // }
}

function euromod_preprocess_views_exposed_form(&$vars, $hook) {
  // Specify the Form ID
  if ($vars['form']['#id'] == 'views-exposed-form-publications-page') {


    // Change the text on the submit button
    // $vars['form']['submit']['#value'] = t('Sedddddddddddarch');
    $vars['form']['submit']['#attributes']['class'][] = 'btn';
    $vars['reset_button'] = drupal_render($form['reset']);
    $vars['navigation']['anyname'] = array ( '#type' => 'markup','#value' => '<a href="#">My Custom Link</a>' );

    // Rebuild the rendered version (submit button, rest remains unchanged)
    unset($vars['form']['submit']['#printed']);
    $vars['button'] = drupal_render($vars['form']['submit']);
  }
}





function euromod_preprocess_node(&$variables) {
 // kpr($variables);

//   if ($variables['type'] == 'news'|| $variables['type'] == 'news') {
//     $node = $variables['node'];

// kpr($node);


//get series number and uppercase it
//replace all hypens  with forward slash
//$series_number = field_get_items('node', $node, 'field_pubs_series_number');
//$variables['formatted_series_number'] = strtoupper($series_number);
// $series_number = str_replace('-', '/', $series_number);
//  print '<p>' .  $record_type . ' - ' . $series_number . '</p>'

//$published_date = field_get_items('node', $node, 'field_pubs_series_number');
//$variables['submitted_day'] = strtoupper($published_date);


//$published_date = field_get_items('node', $node, 'field_pubs_date');
  //  $variables['submitted_day'] = format_date($published_date, 'custom', 'mdy');

// }

//fomart the date of submission and remove username
if ($variables['type'] == 'news') {
  $node = $variables['node'];
    $variables['date'] = format_date($node->created,  'custom', 'd M Y');
    // ...
    $variables['submitted'] = t('!datetime', 
        array('!datetime' => $variables['date']));

  }
}

// rename the pdf filename sent by webform2pdf module
function euromod_webform2pdf_filename($vars) {
  $sid = is_object($vars['submission']) ? $vars['submission']->sid : $vars['submission'];
  if($vars['node']->nid == 523317) {
    $pdf_file_name = "Input-data-request-form";
    $pdf_file_name .= !empty($sid) ? '-' . $sid : '';
    $pdf_file_name .= ".pdf";
  } else {
  $pdf_file_name = "webform_submission-" . $vars['node']->nid;
  $pdf_file_name .= !empty($sid) ? '-' . $sid : '';
  $pdf_file_name .= ".pdf";
  }
  return $pdf_file_name;
}



