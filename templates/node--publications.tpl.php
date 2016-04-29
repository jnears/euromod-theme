<h3>Publication type:</h3>
<p><?php print $node->field_pubs_record_type["und"][0]["value"]; ?></p>


<?php 
if ($field_pubs_series_number): 
$series_number = $node->field_pubs_series_number["und"][0]["value"];
$series_number = strtoupper($series_number);
$series_number = str_replace('-', '/', $series_number);
endif;
?>

<?php if ($field_pubs_series_number): ?>
  <h3>Series Number:</h3>
  <p><?php print $series_number; ?></p>
<?php endif; ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>





<?php $authors = field_get_items('node', $node, 'field_pubs_authors');
if ($authors) {
$total_authors = count($authors);
  //print $total_authors;
  if ($total_authors == 1) {
  print '<h3>Author</h3>' ;
}
else  {
 print '<h3>Authors</h3>';
}
print  '<p>';
  $i=0;
    foreach ($authors as $author) {
      $i++;
      print '<a href="/publications/author/' . urlencode($author['value']) . '">' . $author['value'] . '</a>';

      if ($total_authors == 1) {
       print '';
      }
     else if ($total_authors == 2) {
        if ($i == 1) {
          print ' and ';
         }
        else {
          print '';
        }
      }
    else  {
      if ($i == $total_authors - 1) {
        print' and ';
       }
     else if ($i != $total_authors) {
       print', ';
       }

    }
  }
print '</p>';

}
?>



<?php if (!empty($content['field_pubs_date']));
print '<h3>Publication date</h3>' ;
print '<p>' . render($content['field_pubs_date']) . '</p>';
?>


<!-- get values for abstract and summary
check if abstract exists and print
if abstract doesn't exist but summary does print summary -->
<?php 
$abstract = field_get_items('node', $node, 'field_pubs_abstract');
$summary = field_get_items('node', $node, 'field_pubs_summary');
if ($abstract) {
  print "<h3>Abstract</h3>";
  print render($content['field_pubs_abstract']);
}
else {
  if ($summary){
    print "<h3>Summary</h3>";
    print render($content['field_pubs_summary']);
  }
}

?>


<?php if (!empty($content['field_pubs_journal_title'])): ?>
<h3>Published in</h3>
<?php print render($content['field_pubs_journal_title']); ?>
<?php endif; ?>


<?php if (!empty($content['field_pubs_doi'])): ?>
<h3>DOI</h3>


<p><?php print $node->field_pubs_doi["und"][0]["value"]; ?></p>


<?php endif; ?>

<?php if (!empty($content['field_pubs_issn'])): ?>
<h3>ISSN</h3>
<?php print render($content['field_pubs_issn']); ?>
<?php endif; ?>


<?php $items = field_get_items('node', $node, 'field_pubs_subjects');
if ($items) {
$total = count($items);
  //print $total;
  print '<h3>Subjects</h3>' ;
  print  '<p><i class="fa fa-tags tag"></i> ';
  $i=0;
    foreach ($items as $item) {
      $i++;
      print '<a href="/publications/subject/' . urlencode($item['value']) . '">' . $item['value'] . '</a>';

      if ($total == 1) {
       print '';
      }
     else if ($total == 2) {
        if ($i == 1) {
          print ' and ';
         }
        else {
          print '';
        }
      }
    else  {
      if ($i == $total - 1) {
        print' and ';
       }
     else if ($i != $total) {
       print', ';
       }

    }
  }
print '</p>';
}
?>


<?php if (!empty($content['field_pubs_links']) && $node->field_pubs_record_type["und"][0]["value"] !=  "EUROMOD Working Paper Series"): ?>
<h3>Links</h3>
<p><?php print $node->field_pubs_links["und"][0]["value"]; ?></p>
<?php endif; ?>

<?php if (!empty($content['field_pubs_notes'])): ?>
<h3>Notes</h3>
<?php print render($content['field_pubs_notes']); ?>
<?php endif; ?>




<?php
if ($field_pubs_series_number): 
$uri = 'public://working-papers/' . $node->field_pubs_series_number["und"][0]["value"] . '.pdf';
if (file_exists($uri)) {
print '<p><a class="btn" href="/sites/default/files/working-papers/' . $node->field_pubs_series_number["und"][0]["value"] . '.pdf">Paper Download <i class="fa fa-file-pdf-o"></i></a></p>';
}
endif;
?>


<?php if (!empty($content['related_records-block'])): ?>
<hr>
<h3>Related Publications</h3>
<?php endif; ?>

 <?php

//Render related publications view
$block = module_invoke('views', 'block_view', 'related_records-block');
if (!empty($block['content'])):
print "<hr><h3>Related publications</h3>";
endif;

print render($block['content']);
?>





    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
//      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
