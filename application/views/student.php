<div class="container">
<a href="<?php echo site_url('adminPanel/main') ?>">&larr;<small> Back to main</small></a>
  <div class="row">
  <div class="main-wrap">
    <div class="page-header">
        <h5><?php echo $student['name'] ?></h5>
        <p><?php echo $student['student_number'] ?></p>
     </div>
     <small>Schedule</small>
     <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th></th>
                <th><small>Monday</small></th>
                <th><small>Tuesday</small></th>
                <th><small>Wednesday</small></th>
                <th><small>Thursday</small></th>
                <th><small>Friday</small></th>
                <th><small>Saturday</small></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><small>7:00 - 8:30</small></th>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
            <tr>
                <th><small>8:30 - 10:00</small></th>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
           <tr>
                <th><small>10:00 - 11:30</small></th>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
            <tr>
                <th><small>10:00 - 11:30</small></th>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
            <tr>
                <th><small>11:30 - 1:00</small></th>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
            <tr>
                <th><small>1:00 - 2:30</small></th>
                <td><small></small></td>
                <td><small</td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
            <tr>
                <th><small>2:30 - 4:00</small></th>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
            <tr>
                <th><small>4:00 - 5:30</small></th>
                <td><small>efefe</small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small>edef</small></td>

            </tr>
            <tr>
                <th><small>5:30 - 7:00</small></th>
                <td><small>efefe</small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>
                <td><small></small></td>

            </tr>
        </tbody>
    </table>
  </div>

  </div> <!--row--> 
<div class = "push"></div>
</div> <!-- container -->

<script type="text/javascript">
  //to set-up active icon image on page reload (wihtout click event)
  $(document).ready( function () {
    var currentTab = $('.nav-tabs .active').attr('id'); //get current tab on page reload
    if(currentTab == 'student-tab'){
      $('#student-image').attr('src', '<?=base_url()?>public/img/icons/png/student-active.png');
    } else if(currentTab == 'schedule-tab') {
      $('#schedule-image').attr('src', '<?=base_url()?>public/img/icons/png/sched-active.png');
    } else if(currentTab == 'subject-tab') {
      $('#subject-image').attr('src', '<?=base_url()?>public/img/icons/png/subject-active.png');
    }
  });

  $('#student-tab').click(function() {
    $('#student-image').attr('src', '<?=base_url()?>public/img/icons/png/student-active.png');
    $('#schedule-image').attr('src', '<?=base_url()?>public/img/icons/png/sched.png');
    $('#subject-image').attr('src', '<?=base_url()?>public/img/icons/png/subject.png');
  });

  $('#schedule-tab').click(function() {
    $('#schedule-image').attr('src', '<?=base_url()?>public/img/icons/png/sched-active.png');
    $('#student-image').attr('src', '<?=base_url()?>public/img/icons/png/student.png');
    $('#subject-image').attr('src', '<?=base_url()?>public/img/icons/png/subject.png');
  });

  $('#subject-tab').click(function() {
    $('#subject-image').attr('src', '<?=base_url()?>public/img/icons/png/subject-active.png');
    $('#student-image').attr('src', '<?=base_url()?>public/img/icons/png/student.png');
    $('#schedule-image').attr('src', '<?=base_url()?>public/img/icons/png/sched.png');
  });

  var starttime = false;
  var endtime = false;
  var day = false;

  $('input[type=checkbox]').change(function () {
    checked = $("input[type=checkbox]:checked").length;
    if (checked > 0) {
      day = true;
     }
     else {
      $('#search-sched').attr("disabled", 'disabled');
      day = false;
     }

    if(starttime==true && endtime==true && day==true)
    {
      $('#search-sched').removeAttr('disabled');
    }
  });

  $("#start-time").change(function() {
    var starttime_select = $("#start-time option:selected").val();
    if(starttime_select > 0){
      starttime = true;
    }
    else {
      $('#search-sched').attr("disabled", 'disabled');
      starttime = false;
    }

    if(starttime==true && endtime==true && day==true)
    {
      $('#search-sched').removeAttr('disabled');
    }
  });

  $("#end-time").change(function() {
    var endtime_select = $("#end-time option:selected").val();
    if(endtime_select > 0){
      endtime = true;
    }
    else {
      $('#search-sched').attr("disabled", 'disabled');
      endtime = false;
    }

    if(starttime==true && endtime==true && day==true)
    {
      $('#search-sched').removeAttr('disabled');
    }
  });

 
  $('#search-name').keyup(function(){
        //Remove whitespace before and after text and replace all whitespace
        //Between words with a single whitespace then lower case the search key
        var value = $.trim($(this).val()).replace(/\s+/g,' ').toLowerCase();

        var $namelist = $('.name-container');

        $namelist.each(function(){
            var name = $(this).data('name').replace(/\s+/g,' ').toLowerCase();
            console.log("name: " + name);
            if(name.indexOf(value) == -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $('#search-subject').keyup(function(){
        //Remove whitespace before and after text and replace all whitespace
        //Between words with a single whitespace then lower case the search key
        var value = $.trim($(this).val()).replace(/\s+/g,' ').toLowerCase();


        var $subjectlist = $('.subject-container');

        function wordInString(s, words){
          var all = '';
          var patt;

          keywords = words.split(" ");
          for(i = 0; i < keywords.length; i++){

            patt = '\\b' + keywords[i] + '\\b';
            if(i < keywords.length-1) {
              patt = patt + '|';
            }
            
            all = all + patt;
           
          } 
          return all;
        }

       
        $subjectlist.each(function(){
            var subjectname = $(this).data('name').replace(/\s+/g,' ').toLowerCase();
          
            if(subjectname.indexOf(value) == -1)
                $(this).hide();
            else
                $(this).show();
          
        });
    });
  



</script>

<script>
$('#tabPanel a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
  if(hash) {
    $('#tabPanel a[href="' + hash + '"]').tab('show');
  }
  else{
     $('#tabPanel a[data-toggle="tab"]:first').tab('show');
        }

function toggler(divId) {
    $("#" + divId).toggle();
}
</script>