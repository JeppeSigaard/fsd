<form action="<?php echo admin_url('admin-ajax.php'); ?>" class="signup-form">
    <input type="hidden" name="action" value="smamo_signup">
    <?php wp_nonce_field('smamo_signup','smamo_signup_nonce') ?>
    <div>
        <h4>Medlemsoplysninger</h4>
    </div>
    <div>
        <input name="name" type="text" required>
        <label for="name">Dit navn (fornavn og efternavn)</label>    
    </div>
    <div class="split">
       <div>
           <input name="email" type="email" required>
            <label for="email">Primær e-mailadresse</label> 
       </div>
        <div>
            <input name="phone" type="text" required>
            <label for="phone">Telefonnummer</label>
        </div>
    </div>
    <div>
        <h4>Ansættelsesoplysninger</h4>
    </div>
    <div>
        <input type="text" name="work" required>
        <label for="work">Ansættelsessted</label>    
    </div>
    <div>
        <input type="text" name="position" required>
        <label for="position">Stilling</label>
    </div>
    <div>
        <input name="work_since" type="text">
        <label>Ansat siden</label>
    </div>
    <div>
        <h4>Personlige oplysninger</h4>
    </div>
    <div>
        <input name="birthday" type="text" required>
        <label for="birthday">Fødesldato</label>    
    </div>
    <div>
        <input name="address" type="text" required>
        <label for="address">Adresse</label>    
    </div>
    <div class="split">
        <div>
            <input name="post" type="text" required>
            <label for="post">Postnummer</label> 
        </div>
        <div>
            <input name="by" type="text" required>
            <label for="by">By</label> 
        </div>  
    </div>
    <div>
        <h4>Bemærkninger</h4>
    </div>
    <div>
        <textarea name="remarks" rows="1"></textarea>
        <label for="remarks">Eventuelle bemærkninger</label>
    </div>
    <div class="right">
        <a href="#" class="signup submit arrow-link">Indsend anmodning om medlemsskab</a>
    </div>
</form>
