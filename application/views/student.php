<div class="container">
<a href="<?php echo site_url('adminPanel/main') ?>">&larr;<small> Back to main</small></a>
  <div class="row">
  <div class="main-wrap">
    <div class="page-header">
        <h5><?php echo $student['name'] ?></h5>
        <p><?php echo $sn ?></p>
    </div>
    <small>Schedule</small>
    <img src="<?=base_url()?>public/img/icons/png/student.png" height="100" width="100" class="displayed" />
    <div class="result-wrap">
      <small>Total units: <b><?php echo $totalUnits['units'] ?></b></small>
      <hr style="height:1px; color:#999999; background-color:#999999;">
      <?php 
      $i=0;
      foreach($studentClasses as $studentClass):
        echo '<div class>';
          echo '<a href="' . site_url('adminPanel/subjects/' . $studentClass['class_code']) . '">' . '<span style="display:inline-block"><small>' . $studentClass['name'] . '</small></span></a>';
          echo '<span style="float: right;"><small>' . $studentClass['day'] . " " . $start[$i] . " - " . $end[$i] . '</small></span>';
        echo '</div>';
        echo '<hr>';
        $i++;
      endforeach 
      ?>
    </div>

  </div>

  </div> <!--row--> 
<div class = "push"></div>
</div> <!-- container -->
