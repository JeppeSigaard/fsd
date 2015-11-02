<?php
$admit_form = get_post_meta(get_the_ID(),'add_form',true);
if( $admit_form === '1') :
?>
<form id="admission-form" action="<?php echo admin_url('admin-ajax.php'); ?>">
    <input type="hidden" name="action" value="smamo_admission"/>
    <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
    <?php wp_nonce_field('smamo_newsletter','smamo_newsletter_nonce'); ?>
    <div>
        <span class="form-heading">Du kan tilmelde dig til <?php the_title(); ?> ved at udfylde formularen herunder</span>
    </div> 
    <div>
        <input name="name" type="text" required/>
        <label for="name">Indtast dit navn</label>
    </div>
    <div>
        <input name="email" type="email" required/>
        <label for="email">Indtast din email-adresse</label>
    </div>
    <div>
        <input name="company" type="text"/>
        <label for="company">Indtast evt. firmanavn</label>
    </div>
    <div class="right">
        <a href="#" class="submit arrow-link ">Tilmeld til arrangement</a>
    </div>
</form>

<?php endif; ?>