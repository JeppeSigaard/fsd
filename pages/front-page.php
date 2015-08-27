
<?php get_template_part('parts/front','slider'); ?>

<section class="front-page-article read-width">
    <article <?php post_class(); ?>>
        <?php while(have_posts()) : the_post(); ?>
        <?php the_title('<h1 class="page-title">','</h1>'); ?>
        <?php the_content();?>
        <?php endwhile; ?>
    </article>
</section>


<section class="list-events-new">
   <div class="inner">
       <header class="post-list-header">
           <a href="#" class="arrow-link left">Kommende arrangementer</a>
       </header>
        <ul class="post-list list-wide">
           <?php $i= 0; while ($i < 3) : $i++;?>
           <?php get_template_part('parts/list','item'); ?>
           <?php endwhile; ?>
       </ul>
   </div>
</section>