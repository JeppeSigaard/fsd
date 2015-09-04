
<?php get_template_part('parts/front','slider'); ?>

<section class="front-page-article">
    <div class="inner read-width">
        <article <?php post_class(); ?>>
            <?php while(have_posts()) : the_post(); ?>
            <?php the_title('<h1 class="page-title">','</h1>'); ?>
            <?php the_content();?>
            <?php endwhile; ?>
        </article>
    </div>
</section>


<?php get_template_part('parts/aside','controller'); ?>


<!--
<section class="list-events-new">
   <div class="inner read-width">
       <header class="post-list-header">
           <a href="#" class="arrow-link">Kommende arrangementer</a>
       </header>
        <ul class="post-list list-wide list-split">
           <?php $i= 0; while ($i < 4) : $i++;?>
           <?php get_template_part('parts/list','item'); ?>
           <?php endwhile; ?>
       </ul>
   </div>
</section>
-->

<section class="newsletter-subscribe">
    <article class="inner read-width">
        <h3>Modtag nyhedsbrev</h3>
        <p>Modtag FSD’s nyhedsbrev og hold dig orienteret om kommende arrangementer og relevante begivenheder</p>
        <form>
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
                <a href="#" class="submit arrow-link invert">Tilmeld nyhedsbrev</a>
            </div>
        </form>
    </article>
</section>