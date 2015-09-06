<?php

echo '<hr style="height:1px; color:#999999; background-color:#999999;"><div style="display:inline;"><b>' . $totalAvailable . '</b></div><span><small> people</small></span>';
echo '<div class="result-wrap">';
?>
<?php
	foreach ($freeStudents as $freeStudent):       
	echo '<div class>';
	  echo '<a href="' . site_url('adminPanel/students/' . $freeStudent['student_number']) . '">' . '<span style="display:inline-block"><small>' . $freeStudent['name'] . '</small></span></a>';
	  echo '<span style="float: right;"><small>' . $freeStudent['contact_number'] . '</small></span>';
	echo '</div>';
	echo '<hr>';
	endforeach 
?>
<?php
echo '</div>';
?>

