<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="feed">
<?php foreach ($rows as $id => $row): ?>
  <article>
    <?php print $row; ?>
  </article>
<?php endforeach; ?>
</div>