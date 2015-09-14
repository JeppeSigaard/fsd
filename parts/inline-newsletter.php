<form id="nl-form" action="<?php echo admin_url('admin-ajax.php'); ?>">
    <input type="hidden" name="action" value="smamo_newsletter"/>
    <?php wp_nonce_field('smamo_newsletter','smamo_newsletter_nonce'); ?>
    <div>
        <span class="form-heading">Modtager:</span>
    </div>
    <div>
        <input name="email" type="email" required/>
        <label for="email">Indtast din emailadresse</label>
    </div>
    <div>
        <input name="name" type="text" required/>
        <label for="name">Indtast dit navn</label>
    </div>
    <div>
        <input name="company" type="text"/>
        <label for="company">Indtast evt. firmanavn</label>
    </div>
    <div class="right">
        <a href="#" class="submit arrow-link ">Tilmeld nyhedsbrev</a>
    </div>
</form>
   