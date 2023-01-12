<?php
  /*
  Template Name: Отзывы 
  */    
  get_header(); ?> 
<div class="qroom-content">
  <div class="container">
    <div class="row">

      <div class="qroom-corporate-reviews">
        <h1 class="qroom-font_rbc _font_size_36 _weight_bold _ta-c qroom-corporate-reviews-title">Відгуки гравців</h1>
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content() ?>
        <?php endwhile; ?>
        <!-- post navigation -->
        <?php else: ?>
        <!-- no posts found -->
        <?php endif; ?> 

        <?php echo do_shortcode('[WPCR_SHOW POSTID="ALL" NUM="10" SHOWFORM = "0"  HIDEREVIEWS = "0"]'); ?>

      </div>


      <!-- <div id="comments_block" class="reviews">
        <div id="comments"></div>
        <div id="dots"></div>
        <div class="container">
          <div class="c2">
            Отзывы гравців
            <div id="comment-filter" class="f-select">
              <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label is-dirty" data-upgraded=",MaterialSelectfield">
                <select id="sortComments" class="mdl-selectfield__select" style="visibility: hidden;" name="">
                  <option value="">Новые</option>
                  <option value="expirience">По опыту</option>
                </select>
                <div class="mdl-selectfield__box" tabindex="1"><i class="material-icons" tabindex="-1">arrow_drop_down</i><span class="mdl-selectfield__box-value" tabindex="0">Новые</span></div>
                <div class="mdl-selectfield__list-option-box" tabindex="-1">
                  <ul tabindex="-1">
                    <li class="is-selected" tabindex="-1" data-value="0">Новые</li>
                    <li class="" tabindex="-1" data-value="1">По опыту</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="btn btn-blue leave-comment "><i> </i> Залишити відгук</div>
          </div>

          <div class="container-fluid comments-wrapper comments-wrapper-empty-3 ">
            <div>
              <div class="avatar"></div>
              <div class="review-content">
                <div class="name">
                  <a href="/comments?uid=13687">Руслана</a>
                  <div class="passage-confirm"><span class="passage-confirm__text">Прохождение подтверждено</span></div>
                  <span class="date">4 дня</span><span class="vis-hid date">27.11.2017 00:12:17</span>
                </div>
                <div class="quantity-wrap">
                  <div class="quantity-block">Игр на портале 2</div>
                  <div class="quantity-block">Отзывов 2</div>
                </div>
                <p class="comment-text-uniq-cut" style="display: none;">Отличный квест. Очень захватывающе и интересно . Рекомендую! Не пожалеете)))) Девочки -администраторы очень приветливые и позитивные. Спасибо всем, кто создавал этот квест и всем кто работает в квест комнате.</p>
                <p class="comment-text-uniq">Отличный квест. Очень захватывающе и интересно . Рекомендую! Не пожалеете)))) Девочки -администраторы очень приветливые и позитивные. Спасибо всем, кто создавал этот квест и всем кто работает в квест комнате.</p>
                <div class="overview-wrap">
                  <div class="left-side">
                    <div class="star-block">Атмосферность10</div>
                    <div class="star-block">Сюжет10</div>
                    <div class="star-block">Обслуживание10</div>
                  </div>
                  <div class="right-side">
                    <div class="star-block">Время прохождения 60 мин.</div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="avatar"></div>
              <div class="review-content">
                <div class="name"><a href="/comments?uid=34292">Ирина</a> <span class="date">4 дня</span><span class="vis-hid date">26.11.2017 19:05:05</span></div>
                <div class="quantity-wrap">
                  <div class="quantity-block">Игр на портале 0</div>
                  <div class="quantity-block">Отзывов 1</div>
                </div>
                <p class="comment-text-uniq-cut" style="display: none;">Прикольный квест, были с друзьями впервые, поэтому много тупили, но нам помогали, и мы почти уложились в час)) Очень крутые администраторы, спасибо им за тепло и доброту)) И очень понравились бонусы, спасибо!</p>
                <p class="comment-text-uniq">Прикольный квест, были с друзьями впервые, поэтому много тупили, но нам помогали, и мы почти уложились в час)) Очень крутые администраторы, спасибо им за тепло и доброту)) И очень понравились бонусы, спасибо!</p>
                <div class="overview-wrap">
                  <div class="left-side">
                    <div class="star-block">Атмосферность10</div>
                    <div class="star-block">Сюжет10</div>
                    <div class="star-block">Обслуживание10</div>
                  </div>
                  <div class="right-side">
                    <div class="star-block">Время прохождения 60 мин.</div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="avatar"></div>
              <div class="review-content">
                <div class="name"><a href="/comments?uid=34290">Денис</a> <span class="date">4 дня</span><span class="vis-hid date">26.11.2017 18:45:33</span></div>
                <div class="quantity-wrap">
                  <div class="quantity-block">Игр на портале 0</div>
                  <div class="quantity-block">Отзывов 1</div>
                </div>
                <p class="comment-text-uniq-cut" style="display: none;">Логичный, интересный и атмосферный квест, однозначно рекомендую к посещению.</p>
                <p class="comment-text-uniq">Логичный, интересный и атмосферный квест, однозначно рекомендую к посещению.</p>
                <div class="overview-wrap">
                  <div class="left-side">
                    <div class="star-block">Атмосферность10</div>
                    <div class="star-block">Сюжет10</div>
                    <div class="star-block">Обслуживание10</div>
                  </div>
                  <div class="right-side">
                    <div class="star-block">Время прохождения 40 мин.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid"><button id="more-reviews" class="btn btn-outline pd btn-md more-day" type="button">Показати ще</button></div>
        </div>
      </div> -->
      
    </div>
  </div>
</div>
<?php get_footer(); 
  ?>