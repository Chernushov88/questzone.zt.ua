<?php
/*
Template Name: Сертификат
*/ 

get_header(); ?>
<script>
  // var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
  // var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
  // var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
  // var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
</script>
<div class="qroom-content _hidden">
<!-- <div class="qroom-page_top_box qroom-gift_top qroom-box_page" style="background-image: url(/wp-content/themes/quest/images/gift_top.jpg)"> -->
<div class="qroom-page_top_box qroom-gift_top qroom-box_page" style="background-image: url(/wp-content/uploads/2018/06/4.jpg)">
  <div class="qroom-box_linear_mask"></div>
  <div class="qroom-box_pattern_mask"></div>
  <div class="qroom-content_inner qroom-gift_form_top">
    <div class="qroom-gift_form">
      <h1 class="qroom-gift_form_title">
          Купити подарунковий сертифікат
      </h1>
      <p class="qroom-gift_form_sub-title">У нас ви завжди можете придбати подарунковий сертифікат на проходження квесту, який стане чудовим подарунком рідним, близьким та друзям. <br>
          Ви зможете перевірити їх на кмітливість, вміння мислити нестандартно та швидко орієнтуватися у новій обстановці. <br>
          Такий подарунок буде несподіваним, цікавим та дуже оригінальним. <br>
          Власник сертифікату може зателефонувати та забронювати кімнату для проходження квесту, уточнивши кількість осіб та зручний час.</p><ul class="qroom-gift_form_desc" style="display:none;">
            <li><strong>Сертифікат III категорії</strong> на квест у будній день до 18 години - <strong class="currency rub">1700</strong></li>
            <li><strong>Сертифікат II категорії</strong> на квест у будній день на будь-який час - <strong class="currency rub">2200</strong></li>
            <li><strong>Сертифікат І категорії</strong> – на квест у будь-який день на будь-який час – <strong class="currency rub">2700</strong></li>
      </ul>
      <p class="qroom-gift_form_sub-title">Мы бесплатно доставим любой сертификат по Житомиру!</p>
      <div class="qroom-form_outer">
        <div class="qroom-form_contact">
          <div class="qroom-user_ava" style="background-image: url(/wp-content/uploads/2017/10/stavropol.jpg);"></div>
          <div class="qroom-form_contact_manager">
            <div class="qroom-form_contact_manager_name"></div>
            <div class="qroom-form_contact_manager_destiny">
              Менеджер &quot;quest zone&quot;<br /><br />
            </div>
            <div class="qroom-form_contact_manager_phone">
              <span class="ya-phone"></span>
            </div>
          </div>
        </div>
        <form  id="myform2" class="qroom-form"  action="javascript:send('/forma.php','myform2','result');" method="post">
          <div class="qroom-form_field">
            <input type="text" class="qroom-input qroom-need_validate phone" placeholder="Ваш телефон *" name="phone" required="">
          </div>
           <div class="relative">
            <div class="" onClick="sendForm()">
              <input type="submit"  class="qroom-btn _big"  value="Замовити сертифікат">
            </div>
            <div class="qroom-form_additional">
              <div id="result"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <i class="material-icons qroom-about_arrow_bottom">arrow_downward</i>
</div>
<div class="qroom-gift_presentation qroom-content_inner" style="display:none;"> 
  <h2 class="_font_size_36 qroom-font_rbc _weight_bold qroom-gift_presentation_title _ta-c">
      КВЕСТ ПОЧНЕТЬСЯ ПРЯМО ПІД ЧАС СВЯТА!
  </h2>
  <div class="qroom-gift_presentation_text">
      Подарунковий сертифікат захований усередині скриньки. Щоб його дістати, потрібно провести ключик лабіринтом - прямо до замочка!
  </div>
  <div class="qroom-gift_presentation_pic"></div>
</div>
<div class="qroom-gift_how">
  <h2 class="_font_size_36 qroom-font_rbc _weight_bold qroom-gift_presentation_title _ta-c">
      ЯК ПРИДБАТИ СЕРТИФІКАТ?
  </h2>
  <div class="qroom-gift_how_list">
    <div class="qroom-gift_how_item">
      <div class="qroom-gift_how_item_icn material-icons">phone</div>
      <div class="qroom-gift_how_item_title">Спосіб №1</div>
        Зателефонувати
      <div class="qroom-gift_how_item_phone">
        <div class="material-icons">phone</div>
        097-15-14-542 <br>
      </div>
        та замовити доставку у нашого менеджера
    </div>
    <div class="qroom-gift_how_item">
      <div class="qroom-gift_how_item_icn material-icons">touch_app</div>
      <div class="qroom-gift_how_item_title">Спосіб №2</div>
        Надіслати заявку, натиснувши кнопку &laquo;Замовити&raquo;
    </div>
    <div class="qroom-gift_how_item">
      <div class="qroom-gift_how_item_icn material-icons">directions_walk</div>
      <div class="qroom-gift_how_item_title">Спосіб №3</div>
        Самостійно забрати сертифікат на адресу <br>(г. Житомир вул. Перемоги 3).
    </div>
  </div>
  <div class="_ta-c">
    <div class="qroom-btn _big _white qroom-gift_how_btn" onclick="qroom.navScroll($('.qroom-gift_form_top'))">
      Замовити
    </div>
  </div>
</div>
<div class="qroom-gifts_examples" style="display:none;">
  <div class="qroom-gifts_examples_title">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis dolorum eligendi expedita explicabo facilis incidunt laboriosam odio porro quia quis repellendus reprehenderit, sapiente sequi similique sint vel vitae voluptas.
  </div>
  <div class="qroom-gifts_examples_img"></div>
</div>
<div style="display:none;" class="qroom-gift_form_box" style="background-image: url(/wp-content/themes/quest/images/gift_form_bg.jpg)" >
  <div class="qroom-box_linear_mask"></div>
  <div class="qroom-box_pattern_mask"></div>
  <div class="qroom-gift_form_title"></div>

  <form id="myform3" class="qroom-form" action="javascript:send('/forma-2.php','myform3','result2');" method="post">
    <div class="qroom-form_field">
      <input type="text" class="qroom-input qroom-need_validate" name="name" placeholder="Ваш Имя *" required/>
      <div class="qroom-form_field_error"></div>
    </div>

    <div class="qroom-form_field">
      <input type="text" class="qroom-input qroom-need_validate phone" name="phone" placeholder="Ваш телефон *" required/>
      <div class="qroom-form_field_error"></div>
    </div>

    <div class="qroom-form_field">
      <input type="text" class="qroom-input" name="address" placeholder="Адрес" required/>
      <div class="qroom-form_field_error"></div>
    </div>

    <!-- <div class="qroom-form_field">
      <input type="date" class="qroom-input" name="PreferDeliveryTime" placeholder="Желаемые дата доставки" />
      <div class="qroom-form_field_error"></div>
    </div> -->

    <div class="qroom-form_field">
      <textarea name="descr" class="qroom-textarea" placeholder="Комментарий" required></textarea>
    </div>

    <div class="relative">
      <div class="" onClick="sendForm2()">
        <input type="submit"  class="qroom-btn _big"  value="Замовити сертификат">
      </div>
      <div class="qroom-form_additional">
        <div id="result2"></div>
      </div>
    </div>
  </form>


</div>
<div class="qroom-gifts_info _ta-c">
  <div class="qroom-content_inner">
    <div class="qroom-gifts_info_title"></div>
  </div>
</div> 
<div class="qroom-quests_list">
  <div class="qroom-quests_item" id="qroom-quests-list-item-1032" data-filter="">
    <div class="qroom-quests_item_img_cover">
      <?php 
          if ( is_active_sidebar( 'img_room_home_1' ) ) : 
            dynamic_sidebar( 'img_room_home_1' );  
          endif; 
         ?>
      <!-- <div class="qroom-quests_item_img" style="background-image: url(/wp-content/uploads/2018/06/4.jpg)"></div> -->
    </div>
    <div class="qroom-quests_item_stars _gold">
      <i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>
    </div>
    <div class="qroom-quests_item_title">
      <span>
      <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/da_vinci">&#171;Таємниці да Вінчі&#187;</a>
      </span>
    </div>
    <div class="qroom-quests_item_hover">
      <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/da_vinci/" class="qroom-quests_item_hover_link"></a>
      <div class="qroom-quests_item_hover_inner">
        <div class="qroom-quests_item_level">
          <i class="material-icons _lock _active">lock_outline</i><i class="material-icons _lock _active">lock_outline</i><i class="material-icons _lock _active">lock_outline</i><i class="material-icons _lock _active">lock_outline</i><i class="material-icons _lock">lock_outline</i>
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
            <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/#booking">Забронювати</a>
          </div>
          <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/da_vinci/">Детальніше про квест</a>
        </div>
      </div>
    </div>
  </div>
  <div class="qroom-quests_item" id="qroom-quests-list-item-1062" data-filter="">
    <div class="qroom-quests_item_img_cover">
      <!-- <div class="qroom-quests_item_img" style="background-image: url(/wp-content/themes/quest/images/5-element0.jpg);"></div> -->
      <?php 
          if ( is_active_sidebar( 'img_room_home_2' ) ) : 
            dynamic_sidebar( 'img_room_home_2' );  
          endif; 
         ?>
    </div>
    <div class="qroom-quests_item_stars _gold">
      <i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>
    </div>
    <div class="qroom-quests_item_title">
      <span>
      <a href="/five-element" >&#171;П'ятий елемент&#187;</a>
      <!-- <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/five-element" >&#171;П'ятий елемент&#187;</a> -->
      </span>
    </div>
    <div class="qroom-quests_item_hover">
      <a href="/five-element"  class="qroom-quests_item_hover_link"></a>
       <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/five-element"  class="qroom-quests_item_hover_link"></a>
      <!--<div class="h1" style="padding-top: 100px;font-size: 60px;font-weight: 900;line-height: 1.5;font-family: 'Berkshire Swash', cursive;">Скоро<br>відкриття!</div>-->
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
            <!-- <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/five-element#booking" >Забронювати</a> -->
            <a class="qroom-btn _big qr-booking-button" href="/five-element#booking" >Забронювати</a>
          </div>
          <a href="/five-element" >Детальніше про квест</a>
          <!-- <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/five-element" >Детальніше про квест</a> -->
        </div>
      </div>
    </div>
  </div>
  <div class="qroom-quests_filter_holder">
    <div class="qroom-quests_filter"></div>
  </div>
</div>


<?php get_footer(); ?>
