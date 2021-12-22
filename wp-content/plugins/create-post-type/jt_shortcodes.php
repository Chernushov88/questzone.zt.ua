<?php
  //all shortcodes
  /**
  *  Дата событий
  */
function jt_calendar_level_1($atts){
  ob_start();
    $array = array(
        "room1" => "Тайны да Винчи",
        "room2" => "Пятый элемент",
      );
    foreach ($array as $value) {
      echo do_shortcode('[jt-calendar-level-2 room="'.$value.'" date="'.$atts['date'].'"]') ;
    }
  $result = ob_get_clean();
  return $result;
}
add_shortcode('jt-calendar-level-1','jt_calendar_level_1');



function jt_calendar_level_2($atts){
  ob_start();
  ?>
  <div class="qroom-booking_quest_title-content">
    <div class="qroom-booking_quest_title" data-title="<?php echo $atts['room'] ?>">
      <span><?php echo $atts['room'] ?></span>
    </div>
    <table class="qroom-booking_times">
      <tbody>
        <?php echo do_shortcode('[jt-calendar-level-3 room="'.$atts['room'].'" date="'.$atts['date'].'"]') ; ?>
      </tbody>
    </table>
  </div>
<?php
  $result = ob_get_clean();
  return $result;
}
add_shortcode('jt-calendar-level-2','jt_calendar_level_2');

function jt_calendar_level_3($atts){
  ob_start();
  ?>
<tr>
  <?php
      $start = '8:0';
      $date3 = new DateTime($atts['date']);
      $days_M = array(1=>'января',2=>'февраля',3=>'марта',4=>'апрля', 5 =>'мая',6=>'июня',7=>'июля',8=>'августа',9=> 'сентября',10=> 'октября',11=> 'ноября',12=>'декабря');
      $data_W = ( $days_M[($date3->format('n'))] );
      $days_w = array('Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');
      $key = $date3->format('w');
      $date = new DateTime($atts['date']);
      $data_date = $date->format('d ');
      if ($atts['room']=='Тайны да Винчи') {
       $data_ID = 'kvest-komnata-1';
      }
      else{
        $data_ID = 'kvest-komnata-2';
      }
    $b =0;
    while ( $b < 9) {
      $echo_time = time_add_min($start, 90);
      $chek = $atts['room'].': '.$data_date.$data_W.' '.$echo_time;

      $args = array(
        'post_type' => 'jt_calendar',
        'title' => $chek
      );

      $post_set_array = get_posts($args);
      // echo $b;
      // echo '<br>';
      // echo '<h1><b>'.$key.'</b></h1>';
      if ( !empty($post_set_array) ) {
        $class = '<div class="qroom-booking_time _booked">Занято</div>';
      }
     /* elseif ( $b == 9 ) {
        // echo "test - 11100000111";
         $class = "<div class='qroom-booking_time _turquoise _pink' data-price='договорная'  data-title-h1='". $atts['room'] ."' data-time='". $echo_time ."' data-date='". $data_date.$data_W ."' data-id='".$data_ID."' onclick='qroom.quests.bookingPopup(this)'>". $echo_time . " </div>";
      }*/
      elseif ($b >= 0 || $key == 0 || $key == 6 ) {
        // echo "test - 111";
         $class = "<div class='qroom-booking_time _turquoise _blue' data-price='500'  data-title-h1='". $atts['room'] ."' data-time='". $echo_time ."' data-date='". $data_date.$data_W ."' data-id='".$data_ID."' onclick='qroom.quests.bookingPopup(this)'>". $echo_time . " </div>";
      }

      else{
        $class = "<div class='qroom-booking_time _turquoise' data-price='400' data-title-h1='". $atts['room'] ."' data-time='". $echo_time ."' data-date='". $data_date.$data_W ."' data-id='".$data_ID."' onclick='qroom.quests.bookingPopup(this)'>". $echo_time . " </div>";
      }
      echo "<td>".$class."</td>";
      $b++;
    }
  ?>
</tr>
<?php
  $result = ob_get_clean();
  return $result;
}
add_shortcode('jt-calendar-level-3','jt_calendar_level_3');