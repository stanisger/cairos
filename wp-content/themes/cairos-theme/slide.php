  <!--carrusel-->
<div class="container">

  <div id="carousel-cairo-home" class="carousel slide carousel-fade" data-ride="carousel"  >

    <div class="carousel-inner">

      <?php if( have_rows('slide') ): ?>
        <?php while( have_rows('slide') ): the_row();
        $image = get_sub_field('image');
        $title= get_sub_field('title');
        $descript = get_sub_field('descript');
        $link = get_sub_field('link');
      ?>

        <div class="carousel-item">
   
          <!--imagen-->
           <?php if( !empty($image) ): ?>
                  <image 
                   class="d-block w-100" 
                   src="<?php echo $image['url']; ?>" 
                   alt="<?php echo $image['alt']; ?>"
                  />
            <?php endif; ?>


            <div class="carousel-caption d-none d-md-block">
              <h1 class="cm-text-dark "> <?php echo $title; ?></h1>
              <p class"cm-text-body"> <?php echo $descript; ?></p>
              <a href=" <?php echo $link; ?>" class="btn btn-outline-primary"> ver más</a>
            </div>


        </div>


      <?php endwhile; else: ?>
     <?php endif; ?>
   
    </div>

    <a class="carousel-control-prev" href="#carousel-cairo-home" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carousel-cairo-home" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>

</div>

<script type="text/javascript">
  $( ".carousel-inner div.carousel-item:first-child" ).addClass('active');
</script>
