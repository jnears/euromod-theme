<?php


?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

    

  <div class="content"<?php print $content_attributes; ?>>
    <main class="feed">
    

    <?php if ($display_submitted): ?>
    <time>
      <?php print $submitted; ?>
    </time>

<?php if ($content['field_news_stand_first']): ?>
  <p class="lead">
    <?php print render($node->field_news_stand_first["und"][0]["value"]); ?>
  </p>
<?php endif; ?>

<?php if ($field_news_featured_image): ?>
<figure><?php print render($content['field_news_featured_image']); ?>
<?php if ($content['field_news_image_caption']): ?>
<figcaption><?php print render($node->field_news_image_caption["und"][0]["value"]); ?></figcaption>
<?php endif; ?>
</figure>
<?php endif; ?>


<?php print render($content['body']); ?>

<?php print render($content['field_news_image_credit']); ?>

  <?php endif; ?>
    
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
     
    ?>







</main>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
