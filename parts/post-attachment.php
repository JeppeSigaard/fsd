<?php  $attachment = get_post_meta(get_the_ID(),'attach_file',false); if (!empty($attachment)) :?>
<div class="attachments">
    <header class="attachments-header">
        <strong>Hent filer: </strong>
    </header>
   <?php foreach($attachment as $att) : $attached = get_post($att); ?>
   <a class="arrow-link attachment" href="<?php echo wp_get_attachment_url($att) ?>"><?php echo $attached->post_title; ?></a>
   <?php endforeach; ?>
</div>
<?php endif; ?>