<?php
  /*
  Template Name: БЛОГ
  */ 
  
  get_header(); ?>
<script>
  var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
  var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
  var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
</script>

<div class="qroom-content ">
<div class="qroom-content_inner blog-list">
  <h1>Новости</h1>
<?php
// запрос
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
  <?php if ( $wpb_all_query->have_posts() ) : ?>
    <!-- the loop -->
    <?php $i=0; ?>

    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
      <div class="blog-item">
        <div class="blog-img" ><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a></div>
        <div class="blog-info">
          <h3>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
          <div class="blog-description">
            <?php the_excerpt(); ?>
          </div>
        </div>
      </div>
  <?php endwhile; ?>
  <!-- end of the loop -->
  <?php wp_reset_postdata(); ?>
  <?php endif; ?>
      
  <!--     <div class="blog-item">
    <div class="blog-img" style="background-image: url('https://спб.квеструм.рф/files/spb/news/sherlok.png')"></div>
    <div class="blog-info">
      
      <h3>
        <a href="/blog/kakie-xobbi-razvivayut-nash-mozg">Какие хобби развивают наш мозг? </a>
      </h3>
      <div class="blog-description">
        Долгое время считалось, что уровень интеллекта запрограммирован в генах и человеку остаётся только по максимуму использовать только то, что у него есть. Учёные же доказали, что можно постоянно развивать свои умственные способности, достаточно завести интересное хобби и почаще им заниматься! Что это может быть?
      </div>
    </div>
    </div>
    <div class="blog-item">
    <div class="blog-img" style="background-image: url('https://спб.квеструм.рф/files/spb/news/12(4).png')"></div>
    <div class="blog-info">
      
      <h3>
        <a href="/blog/vyezdnoj-kvest-velikij-getsbi">Выездной квест "Великий Гэтсби"</a>
      </h3>
      <div class="blog-description">
        Команда Квеструм провела выездной квест по мотивам фильма "Великий Гэтсби" для корпоратива сотрудниц компании DINS. Это был яркий, фееричный, зажигательный, полный безудержного веселья, танцев и блеска вечер - в лучших традициях вечеринок этого стиля. 
      </div>
    </div>
    </div>
    <div class="blog-item">
    <div class="blog-img" style="background-image: url('https://спб.квеструм.рф/files/spb/news/viezd4.jpg')"></div>
    <div class="blog-info">
      
      <h3>
        <a href="/blog/vyezdnoj-prazdnik">Выездной праздник от Квеструм!</a>
      </h3>
      <div class="blog-description">
        Вы знаете, что Квеструм - это не только шанс выбраться из одной из наших комнат, но возможность устроить интерактивное квест-шоу прямо на вашей площадке! Почему бы не поиграть на работе или, например, в модных сейчас лофтах? 
      </div>
    </div>
    </div>
    <div class="blog-item">
    <div class="blog-img" style="background-image: url('https://спб.квеструм.рф/files/spb/news/august/loreal.jpg')"></div>
    <div class="blog-info">
      
      <h3>
        <a href="/blog/vyezdnoj-kvest-v-ermitazhe-09-08-2017">Выездной квест в Эрмитаже! (09.08.2017)</a>
      </h3>
      <div class="blog-description">
        Корпоратив для команды L’oreal!
      </div>
    </div>
    </div> -->
  <!-- <div>
    <ul class="pagination">
      <li class="active"><a href="#">«</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="/blog?page=2">2</a></li>
      <li><a href="/blog?page=3">3</a></li>
      <li class="disabled"> <a href="#">...</a> </li>
      <li><a href="/blog?page=13">13</a></li>
      <li><a href="/blog?page=14">14</a></li>
      <li><a href="/blog?page=15">15</a></li>
      <li><a href="/blog?page=2">»</a></li>
    </ul>
  </div -->
</div>

<?php get_footer(); ?>