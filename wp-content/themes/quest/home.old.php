<?php
  /*
   Template Name: Главная
   */
    get_header(); ?>
<script>
  var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
  var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
  var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
</script>
<?php
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
  ?>
<div class="qroom-content qroom-content-hom-page _hidden">
<div class="qroom-default_content_header _black">
  <div class="qroom-quests_list">
    <div class="qroom-quests_item" data-filter="">
      <div class="qroom-quests_item_img_cover">
        <!-- <div class="qroom-quests_item_img" style="background-image: url(/wp-content/uploads/2017/08/3.jpg);"></div> -->
        <?php
          if ( is_active_sidebar( 'img_room_home_1' ) ) :
            dynamic_sidebar( 'img_room_home_1' );
          endif;
          ?>
      </div>
      <div class="qroom-quests_item_stars _gold">
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
      </div>
      <div class="qroom-quests_item_title">
        <span>
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/da_vinci">Таємниці да Вінчі</a>
        </span>
      </div>
      <div class="qroom-quests_item_hover">
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/da_vinci" class="qroom-quests_item_hover_link"></a>
        <div class="qroom-quests_item_hover_inner">
          <div class="qroom-quests_item_level">
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock">lock_outline</i>
          </div>
          <div class="qroom-quests_item_infos">
            <div class="qroom-quests_item_info">
              <i class="fa fa-users" aria-hidden="true"></i> 2-4 гравців
            </div>
            <div class="qroom-quests_item_info">
              <i class="material-icons">person_outline</i> Вік 13+
            </div>
            <div class="qroom-quests_item_info">
              <i class="material-icons">place</i> Перемоги 3
            </div>
          </div>
          <div class="qroom-quests_item_btns">
            <div>
              <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/da_vinci#booking">Докладніше</a>
            </div>
            <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/da_vinci">Детальніше про квест</a>
          </div>
        </div>
      </div>
    </div>
    <div class="qroom-quests_item" data-filter="">
      <div class="qroom-quests_item_img_cover">
        <!-- <div class="qroom-quests_item_img" style="background-image: url(/wp-content/uploads/2023/01/five-element-1.jpg);"></div> -->
        <?php
          if ( is_active_sidebar( 'img_room_home_2' ) ) :
            dynamic_sidebar( 'img_room_home_2' );
          endif;
          ?>
      </div>
      <div class="qroom-quests_item_stars _gold">
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
      </div>
      <div class="qroom-quests_item_title">
        <span>
          <a href="/five-element" >П'ятий елемент</a>
          <!-- <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/five-element" >П'ятий елемент</a> -->
        </span>
      </div>
      <div class="qroom-quests_item_hover">
        <a href="/five-element" class="qroom-quests_item_hover_link" ></a>
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/five-element" class="qroom-quests_item_hover_link" ></a>
        <!-- <div class="h1" style="padding-top: 250px;font-size: 60px;font-weight: 900;line-height: 1.5;font-family: 'Berkshire Swash', cursive;">Скоро<br>відкриття!</div> -->
        <div class="qroom-quests_item_hover_inner">
          <div class="qroom-quests_item_level">
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock _active">lock_outline</i>
            <i class="material-icons _lock">lock_outline</i>
          </div>
          <div class="qroom-quests_item_infos">
            <div class="qroom-quests_item_info">
              <i class="material-icons">person_outline</i> 2-4 гравців
            </div>
            <div class="qroom-quests_item_info">
              <i class="material-icons">place</i> Перемоги 3
            </div>
          </div>
          <div class="qroom-quests_item_btns">
            <div>
              <a class="qroom-btn _big qr-booking-button" href="/five-element#booking"  >Докладніше</a>
              <!-- <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/five-element#booking"  >Забронювати</a> -->
            </div>
            <a href="/five-element"  >Детальніше про квест</a>
            <!-- <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/five-element"  >Детальніше про квест</a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="qroom-quests_filter_holder" style="display:none; min-height: 0;">
      <div class="qroom-quests_filter">
      </div>
    </div>
  </div>
</div>
<div class="qroom-booking" id="booking">
  <div class="qroom-booking_body" style='padding: 40px 0 32px;'>
    <div class="qroom-content_inner">
      <h1 class="qroom-font_rbc _font_size_36 _weight_bold _ta-c qroom-corporate-reviews-title" style=''>Новий атмосферний квеструм в Житомирі</h1>
    </div>
  </div>
  <div class="qroom-booking_header">
    <div class="qroom-content_inner">
      <div class="qroom-booking_title">
        КАЛЕНДАР БРОНЮВАННЯ
      </div>
      <div class="qroom-booking_desc">
        Виберіть зручну для вас дату та час
      </div>
      <div class="qroom-booking_dates">
        <!-- 02 августа &mdash; 22 августа -->
        <span id="firstDay"></span> &mdash; <span id="lastDay"></span>
      </div>
    </div>
  </div>
  <div class="qroom-booking_body">
    <div class="qroom-content_inner">
      <div class="qroom-booking_dates_pick" id="qroom-booking_dates_pick" data-title="Натисніть на зручну дату, щоб переглянути розклад на цей день!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
        <?php
          $date3 = new DateTime(date('d.m.Y'));
          $days_M = array(1=>'січень',2=>'лютий',3=>'березень',4=>'квітень', 5 =>'травень',6=>'червень',7=>'липень',8=>'серпень',9=> 'вересень',10=> 'жовтень',11=> 'листопад',12=>'грудень');
          $data_W = ( $days_M[($date3->format('n'))] );
          $days_w = array('Нд.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');
          $date = new DateTime(date('d.m.Y'));
          // $date2 = new DateTime(date('d.m.Y'));

          for ($a=0; $a < 21 ; $a++) {

            $data_date = $date->format('d');
            $data_change = $date->format('d.m.Y');
            $data_date_month = $date->format('d F');
            $data_date_month = ukr_date($data_date_month);
            // $args = array(
            //   'post_type' => 'jt_calendar'
            // );
            if ( $a==0 ) {
              $dateRoom = "
              <div class='qroom-booking_date_pick _active'  data-date='".$data_date_month."' onclick='functionHomeAjax(\"".$data_change."\",this);'>
                <div class='qroom-booking_date_pick_desc'>". $days_w[($date->format('w'))] ."</div>
                <div class='date-home'>".$data_date."</div>
              </div>
              ";
            }
            else{
              $dateRoom = "
              <div class='qroom-booking_date_pick '  data-date='".$data_date_month."' onclick='functionHomeAjax(\"".$data_change."\",this);'>
                <div class='qroom-booking_date_pick_desc'>". $days_w[($date->format('w'))] ."</div>
                <div class='date-home'>".$data_date."</div>
              </div>
              ";
            }



            $date->modify('+1day');
            print_r($dateRoom );
          }

          ?>
      </div>
      <?php
        $array = array(
           "room1" => "da_vinci",
           "room2" => "five-element",
         );
         foreach ($array as $value) {
           ?>
      <div id="<?php echo $value ?>" class="hide kvest-komnata-kontent">
        <?php
          $query = new WP_Query( array( 'pagename' => $value ) );
            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
            the_content();
            endwhile;
            else:
            endif;
          ?>
      </div>

      <?php
        }

        ?>
      <div id="qroom-booking_holder_id" class="qroom-booking_holder" data-title="Натисніть на плитку зі зручним часом, щоб Забронювати гру!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
        <?php
          echo do_shortcode('[jt-calendar-level-1 date="'.date('d.m.Y').'"]');
          ?>
      </div>
      <div class="qroom-booking_prices">

        <div class="qroom-booking_prices_desc">
          ВАРТІСТЬ ГРИ ВКАЗАНА ЗА КОМАНДУ З 2-4 ГРАВЦІВ. За додаткового гравця доплата 100 грн.
        </div>
        <div class="qroom-booking_prices_title">
          <span>Ціна за команду Таємниці да Вінчі</span>
        </div>
        <div class="_nclear">
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _turquoise" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>400</b>
              </td>
            </tr>
            </table> -->
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _blue" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>700</b>
              </td>
            </tr>
          </table>
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>договорная</b>
              </td>
            </tr>
            </table> -->
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>500</b>
              </td>
            </tr>
            </table> -->
        </div>
        <br>
        <div class="qroom-booking_prices_desc">
                  ВАРТІСТЬ ГРИ ВКАЗАНА ЗА КОМАНДУ З 2-6 ГРАВЦІВ. За додаткового гравця доплата 100 грн.
                </div>
        <div class="qroom-booking_prices_title">
          <span>Ціна за команду П'ятий елемент</span>
        </div>
        <div class="_nclear">
        <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
                    <tr>
                      <td>
                        <b>800</b>
                      </td>
                    </tr>
                    </table>
                    </div>

      </div>
    </div>
    <div class="qroom-content_inner">
      <div class="qroom-booking_prices_variants" onclick="pricesTypesPopup();">
        <span class="qroom-js_link">Методи оплати</span>
      </div>
      <div class="_ta-c">
        Бронювання відкрито на 21 день вперед. Якщо Вас цікавить більш пізня дата, то зателефонуйте нам, ми зробимо попереднє бронювання. <br>Телефон <span class="ya-phone">  097-15-14-542</span>
      </div>
      <div class="hidden" id="qroom-prices_popup">
        <div class="qroom-location_popup_title">
          Способи оплати
        </div>
        <div class="qroom-popup_text">
          <p>Ви можете оплатити наші послуги такими способами:</p>
          <ul>
            <li>Готівкою перед початком квесту;</li>
            <li>Банківською картою перед початком квесту;<br/><img src="/wp-content/themes/quest/images/cards_accepted.jpg" style="padding-top:3px;" alt='Карти для оплати'/></li>
            <li>Корпоративним клієнтам ми готові виставити рахунок для безготівкової оплати. Для отримання рахунку зв'яжіться, будь ласка, з нашим менеджером з корпоративних клієнтів за телефоном 8 (918) 758-62-58 або поштою <a class="qroom-dark-link" href="mailto:questzt@i.ua ">questzt@i.ua</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer();
  // UPDATE wp_options SET option_value = REPLACE (option_value, 'http://quest-game', 'http://questzone.zt.ua') WHERE option_name = 'home' OR option_name = 'siteurl';

  // UPDATE wp_posts SET guid = REPLACE (guid, 'http://quest-game', 'http://questzone.zt.ua');

  // UPDATE wp_posts SET post_content = REPLACE (post_content, 'http://quest-game', 'http://questzone.zt.ua');




  // UPDATE wp_options SET option_value = REPLACE (option_value, 'http://questzone.zt.ua', 'http://quest-game') WHERE option_name = 'home' OR option_name = 'siteurl';

  // UPDATE wp_posts SET guid = REPLACE (guid, 'http://questzone.zt.ua', 'http://quest-game');

  // UPDATE wp_posts SET post_content = REPLACE (post_content, 'http://questzone.zt.ua', 'http://quest-game');


  ?>