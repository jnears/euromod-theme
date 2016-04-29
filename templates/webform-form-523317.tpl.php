<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 *
 * If a preview is enabled, these keys will be available on the preview page:
 * - $form['preview_message']: The preview message renderable.
 * - $form['preview']: A renderable representing the entire submission preview.
 */
?>
<?php
  // Print out the progress bar at the top of the page
  // print drupal_render($form['progressbar']);


  // Print out the preview message if on the preview page.
  if (isset($form['preview_message'])) {
    print '<div class="messages warning">';
    print drupal_render($form['preview_message']);
    print drupal_render($form['name']);
    print '</div>';
  }


  

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
   print "<div class='multi'>";
   print drupal_render($form['submitted']);
    print "</div >";
  // print "<fieldset>";
  // print "<legend>Personal Details:</legend>";
  // print drupal_render($form['submitted']['name']);
  // print drupal_render($form['submitted']['institution']);
  // print drupal_render($form['submitted']['email']);

  //  print "</fieldset>";

  
  // print "<hr>";


  // print "<fieldset>";
  // print "<legend>Datasets:</legend>";

  // print "<p>Please indicate which dataset(s) you would like to recieve:</p>";
  // print drupal_render($form['submitted']['do_not_require_datasets']);

  // print drupal_render($form['submitted']['eurostat_authorisation']);

 

  // print "<p><strong>[A] MOST RECENT DATASETS</strong></P>";


  // print "<label>EU-SILC UDB dataset</label>";
  
  // print "<div class='row multi'>";
  // print drupal_render($form['submitted']['eu_silc_udb_datasets_1']);
  // print drupal_render($form['submitted']['eu_silc_udb_datasets_2']);
  // print drupal_render($form['submitted']['eu_silc_udb_datasets_3']);
  // print "</div>";
  // print "</div>";

  // print "<hr>";

  // print "<label>National SILC datasets</label>";
  
  // print "<div class='row multi'>";
  //   print "<div class='col col-3 transparent match-height'>";
  //   print drupal_render($form['submitted']['national_silc_datasets_1']);
  //   print "</div>";
  //   print "<div class='col col-3 transparent match-height'>";
  //   print drupal_render($form['submitted']['national_silc_datasets_2']);
  //   print "</div>";  
  //   print "<div class='col col-3 transparent match-height'>";
  //   print drupal_render($form['submitted']['national_silc_datasets_3']);
  //   print "</div>";
  // print "</div>";

  

  // print "<hr>";

  // print "<div class='multi'>";
  //   print drupal_render($form['submitted']['other_non_silc_datasets']);
  // print "</div>";
  
    
  //   print "<hr>";


  //   print "<p><strong>[B] EARLIER DATASETS</strong></P>";


  //   print "<label>EU-SILC UDB datasets</label>";
  
  //   print "<div class='row multi'>";
  //     print "<div class='col col-3 transparent match-height'>";
  //     print drupal_render($form['submitted']['eu_silc_udb_datasets_earlier_1']);
  //     print "</div>";
  //     print "<div class='col col-3 transparent match-height'>";
  //     print drupal_render($form['submitted']['eu_silc_udb_datasets_earlier_2']);
  //     print "</div>";  
  //     print "<div class='col col-3 transparent match-height'>";
  //     print drupal_render($form['submitted']['eu_silc_udb_datasets_earlier_3']);
  //     print "</div>";
  //   print "</div>";

  // print "<hr>";





  //   print "</fieldset>";





  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above (buttons, hidden elements, etc).
 print "<div class='multi'>";
 print drupal_render_children($form);
 print "</div>";


