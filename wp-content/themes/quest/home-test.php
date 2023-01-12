<?php
 /*
 Template Name: Главная test-2
 */    

get_header(); ?>
<script>
  var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
  var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
  var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
</script>
<?php 
  // function time_add_min( & $time, $min)
  //     {
  //         list($h, $m) = explode(':', $time);
  //         $h = ($h + floor(($m + $min) / 60)) % 24;
  //         $m = ($m + $min) % 60;
  //         $time = $h . ':' . $m;
  //         return str_pad($h, 2, '0', STR_PAD_LEFT).':'.str_pad($m, 2, '0', STR_PAD_LEFT);
  //     }
?>
<?php 
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
  ?>

<?php 
function date_function() {
  $date3 = new DateTime(date('d.m.Y'));
 $days_M = array(1=>'січень',2=>'лютий',3=>'березень',4=>'квітень', 5 =>'травень',6=>'червень',7=>'липень',8=>'серпень',9=> 'вересень',10=> 'жовтень',11=> 'листопад',12=>'грудень');
  $data_W = ( $days_M[($date3->format('n'))] );  
  $days_w = array('Нд.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');                
  $date = new DateTime(date('d.m.Y'));
  $date2 = new DateTime(date('d.m.Y')); 
  $date->modify('+'.$a.'day');
  $date2->modify('+'.$a.'day');          
  $data_date = $date->format('d');                    
  $data_date2 = $date2->format('d ');

  echo $data_date2.$data_W . ' &mdash; ';    

  $date2->add(new DateInterval('P20D'));
  $data_date2 = $date2->format('d ');
  echo $data_date2.$data_W;

}
?>

<div class="qroom-content _hidden">
<div class="qroom-default_content_header _black">
  <div class="qroom-quests_list">
    <div class="qroom-quests_item" id="qroom-quests-list-item-1032" data-filter="">
      <div class="qroom-quests_item_img_cover">
        <?php 
          if ( is_active_sidebar( 'img_room_home_1' ) ) : 
            dynamic_sidebar( 'img_room_home_1' );  
          endif; 
         ?>
        <!-- <div class="qroom-quests_item_img" style="background-image: url(/wp-content/uploads/2017/08/3.jpg);"></div> -->
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
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/kvest-komnata-1">Таємниці да Вінчі</a>
        </span>
      </div>
      <div class="qroom-quests_item_hover">
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/kvest-komnata-1" class="qroom-quests_item_hover_link"></a>
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
              <i class="material-icons">place</i> вул. Перемоги 3
            </div>
          </div>
          <div class="qroom-quests_item_btns">
            <div>
              <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/kvest-komnata-1#booking">Забронювати</a>
            </div>
            <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/kvest-komnata-1">Детальніше про квест</a>
          </div>
        </div>
      </div>
    </div>
    <div class="qroom-quests_item" id="qroom-quests-list-item-1062" data-filter="">
      <div class="qroom-quests_item_img_cover">
        <?php 
          if ( is_active_sidebar( 'img_room_home_2' ) ) : 
            dynamic_sidebar( 'img_room_home_2' );  
          endif; 
         ?>
        <!-- <div class="qroom-quests_item_img" style="background-image: url(/wp-content/themes/quest/images/fotolaba0.jpg);"></div> -->
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
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/five-element">Квест комната 2</a>
        </span>
      </div>
      <div class="qroom-quests_item_hover">
        <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/five-element" class="qroom-quests_item_hover_link"></a>
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
              <i class="material-icons">person_outline</i> 2-6 гравців
            </div>
            <div class="qroom-quests_item_info">
              <i class="material-icons">place</i> Пирогова 24
            </div>
          </div>
          <div class="qroom-quests_item_btns">
            <div>
              <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/five-element#booking">Забронювати</a>
            </div>
            <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/five-element">Детальніше про квест</a>
          </div>
        </div>
      </div>
    </div>
    <div class="qroom-quests_filter_holder">
      <div class="qroom-quests_filter">
      </div>
    </div>
  </div>
</div>

<div class="qroom-booking" id="booking">
  <div class="qroom-booking_header">
    <div class="qroom-content_inner">
      <div class="qroom-booking_title">
        Календар бронювання
      </div>
      <div class="qroom-booking_desc">
        <p style="font-size: 28px;">Чтобы записаться на игру -  выберите любое доступное время в одном из квестов. После нажатия на плитку со временем Вы попадете на страницу бронирования онлайн.</p><p style="font-size: 28px;">Или забронируйте игру по телефону: <a href="tel:+380971514542" title="097-15-14-542"><img src="/wp-content/uploads/2021/12/phone-31172_640-1.png" style="margin-top: 18px; margin-left: 28px;"></a></p> 
      </div>
      <div class="qroom-booking_dates qroom-booking_dates-title">
        <!-- 02 августа &mdash; 22 августа -->
        <?php echo date_function();   ?>
      </div>
    </div>
  </div>
  <div class="qroom-booking_body">
    <div class="qroom-content_inner">
      <div class="qroom-booking_dates_pick" id="qroom-booking_dates_pick" data-title="Натисніть на зручну дату, щоб переглянути розклад на цей день!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
        <?php        
          for ($a=0; $a < 21 ; $a++) {
            $date3 = new DateTime(date('d.m.Y'));
           $days_M = array(1=>'січень',2=>'лютий',3=>'березень',4=>'квітень', 5 =>'травень',6=>'червень',7=>'липень',8=>'серпень',9=> 'вересень',10=> 'жовтень',11=> 'листопад',12=>'грудень');
            $data_W = ( $days_M[($date3->format('n'))] );  
            $days_w = array('Нд.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');                
            $date = new DateTime(date('d.m.Y'));
            $date2 = new DateTime(date('d.m.Y')); 
            $date->modify('+'.$a.'day');
            $date2->modify('+'.$a.'day');          
            $data_date = $date->format('d');                    
            $data_date2 = $date2->format('d ');  
            $args = array(
              'post_type' => 'jt_calendar'
            );         
            print_r("
              <div class='qroom-booking_date_pick' data-date='". $data_date2.$data_W ."'>
                <div class='qroom-booking_date_pick_desc'>". $days_w[($date->format('w'))] ."</div>
                ".$data_date."
              </div>
              "
            );            
          }
        ?>
      </div>


      <div class="qroom-booking_holder" id="qroom_booking_holder" data-title="Натисніть на плитку зі зручним часом, щоб Забронювати гру!">
        <?php echo do_shortcode('[jt-calendar-level-1]'); ?>
      </div>
      <div class="qroom-booking_holder" data-title="Натисніть на плитку зі зручним часом, щоб Забронювати гру!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
        <div class="hidden booking-template">
          <div class="qroom-booking_time _booked">Занято</div>
        </div>
        <div class="qroom-booking_quest_title">
          <span>Таємниці да Вінчі</span>
        </div>
        <table class="qroom-booking_times">
          <tbody>
            
            <!-- <tr>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div id="qroom-booking_id-638740" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638740, gid: 100 })">19:00</div>
              </td>
              <td>
                <div id="qroom-booking_id-638741" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638741, gid: 1032 })">20:15</div>
              </td>
              <td>
                <div id="qroom-booking_id-638742" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638742, gid: 1032 })">21:30</div>
              </td>
              <td>
                <div id="qroom-booking_id-638743" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638743, gid: 1032 })">22:45</div>
              </td>
            </tr> -->
          </tbody>
        </table>
        <div class="qroom-booking_quest_title">
          <span>Квест комната 2</span>
        </div>
        <table class="qroom-booking_times">
          <tbody>
            <tr>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div class="qroom-booking_time _booked">Занято</div>
              </td>
              <td>
                <div id="qroom-booking_id-638749" class="qroom-booking_time _turquoise" onclick="qroom.quests.bookingPopup({ qid: 638749, gid: 1062 })">18:00</div>
              </td>
              <td>
                <div id="qroom-booking_id-638750" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638750, gid: 1062 })">19:15</div>
              </td>
              <td>
                <div id="qroom-booking_id-638751" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638751, gid: 1062 })">20:30</div>
              </td>
              <td>
                <div id="qroom-booking_id-638752" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638752, gid: 1062 })">21:45</div>
              </td>
              <td>
                <div id="qroom-booking_id-638753" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638753, gid: 1062 })">23:00</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="qroom-booking_prices">
        <div class="qroom-booking_prices_title">
          <span>Ціна за команду</span>
        </div>
        <div class="qroom-booking_prices_desc">
          Стоимость игры любой категории не зависит от количества человек в команде. Число гравців может варьироваться от 2 до 4.
        </div>
        <div class="_nclear">
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _turquoise" data-title="" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>1&#160;500</b>
              </td>
            </tr>
          </table>
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _blue" data-title="" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>2&#160;000</b>
              </td>
            </tr>
          </table>
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" data-title="" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>2&#160;500</b>
              </td> 
            </tr>
          </table> -->
        </div>
      </div>
      <div class="qroom-booking_prices_variants" onclick="qroom.quests.pricesTypesPopup();">
        <span class="qroom-js_link">Методи оплати</span>
      </div>
      <div class="_ta-c">
        Бронирование открыто на 21 день вперед. Если Вас интересует более поздняя дата, то позвоните нам, мы внесем вас в предварительное бронирование. Телефон <span class="ya-phone"> 097-15-14-542, 073-135-16-17</span>.
      </div>
   </div>
			</div> 
      <div class="hidden" id="qroom-prices_popup">
        <div class="qroom-location_popup_title">
          Методи оплати
        </div>
        <div class="qroom-popup_text">
          <p>Вы можете оплатить наши услуги следующими способами:</p>
          <ul>
            <li>Наличными перед началом квеста;</li>
            <li>Банковской картой перед началом квеста;<br/><img src="/wp-content/themes/quest/images/cards_accepted.jpg" style="padding-top:3px;"/></li>
            <li>Корпоративним клієнтам ми готові виставити рахунок для безготівкової оплати. Для отримання рахунку зв'яжіться, будь ласка, з нашим менеджером з корпоративних клієнтів за телефоном  <a href="tel:+380971514542">097-15-14-542</a> або поштою  <a class="qroom-dark-link" href="mailto:stavropol@questrooms.com">stavropol@questrooms.com</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="qroom-video">
  <div class="qroom-content_inner">
    <div class="qroom-video-in" style="padding-top: 60%;position: relative;">
      <iframe style="width: 100%;height: 100%;position: absolute;top: 0;"  src="https://www.youtube.com/embed/7hZNw0N_TfQ?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
</div>
<?php get_footer(); ?>