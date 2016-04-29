<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php print $fields['title']->content; ?>
<?php if (!empty($fields['field_pubs_authors']->content)): ?>
<p class="people-list"><?php print $fields['field_pubs_authors']->content; ?></p>
<?php endif; ?>

<time>
<?php if (!empty($fields['field_pubs_record_type']->content)): ?>
<?php print $fields['field_pubs_record_type']->content; ?>
<?php endif; ?>

<?php if (!empty($fields['field_pubs_series']->content)): ?>
<?php print $fields['field_pubs_series']->content; ?>
<?php endif; ?>

<?php if (!empty($fields['field_pubs_series_number']->content)): ?>
<?php $arr = $fields['field_pubs_series_number']->content;
$arr = strtoupper($arr);
 $arr = str_replace('-', '/', $arr);
  print $arr ?>
<?php endif; ?>
<?php if (!empty($fields['field_pubs_date']->content)): ?>
- <?php print $fields['field_pubs_date']->content; ?>
<?php endif; ?>

<?php $uri = '/Ufs/iserweb/virtual/iserrails/files/working-papers/euromod/' . $fields['field_pubs_series_number']->content . '.pdf' ?>
<?php if (file_exists($uri)): ?>
- <a href="/sites/default/files/downloads/<?php print $fields['field_pubs_series_number']->content; ?>.pdf"><b>download</b> <i class="fa fa-file-pdf-o"></i></a>
<?php endif; ?>
</time>

<?php if (!empty($fields['field_pubs_subjects']->content)): ?><p class="tags"><i class="fa fa-tags"></i> <?php print $fields['field_pubs_subjects']->content; ?></p><?php endif; ?>


