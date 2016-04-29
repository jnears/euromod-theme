<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $body[0]['value']; ?>

  <div class="row">
    <div class="col col-2 transparent match-height">    
      <?php if (!empty($content['field_newsletters_image'])): ?>
        <?php print render($content['field_newsletters_image']); ?>
      <?php endif; ?>
    </div>
    <div class="col col-2 transparent autoimage match-height">
      <h3>Current issue:</h3>

      <?php if (!empty($content['field_newsletters_current_issue'])): ?>
        <?php print render($content['field_newsletters_current_issue']); ?>
      <?php endif; ?>
    
      <h3>Archive issues:</h3>

      <?php if (!empty($content['field_newsletters_archive_issues'])): ?>
        <?php print render($content['field_newsletters_archive_issues']); ?>
      <?php endif; ?>

    </div>
  </div>

</div>
