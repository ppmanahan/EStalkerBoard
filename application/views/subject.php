<div class="container">
<a href="<?php echo site_url('adminPanel/main') ?>">&larr;<small> Back to main</small></a>
  <div class="row">
  <div class="main-wrap">
    <div class="page-header">
        <h5><?php echo $subject['name'] ?></h5>
    </div><br>
     <small>Total number of members taking this subject: </small><span><b><?php echo $totalEnrolled ?></b></span>
     <div class="list-wrap">

        <?php foreach ($enrolledStudents as $enrolledStudent): ?>       
          <div class='subject-container'>
            <?php echo "<a href='" . site_url('adminPanel/students/' . $enrolledStudent['student_number']) . "'><small>" . $enrolledStudent['name'] . "</small></a>" ?>
            <hr>
          </div>
        <?php endforeach ?>
        
     </div>
  </div>

  </div> <!--row--> 
<div class = "push"></div>
</div> <!-- container -->
