<div class="container">
<div class="row">
<div class="tabbable tabs-left"> <!-- required for floating -->

  <!--Nav Tabs-->
  <div class="col-xs-2">
    <ul class="nav nav-tabs tabs-left tabPanel" id="tabPanel">
      <li class="active" id="student-tab"><a href="#students" data-toggle="tab" style="font-size:15px;text-align:center;"><img src="<?=base_url()?>public/img/icons/png/student.png" height="100" width="100" class="displayed" id="student-image"/>Search by Student</a></li>
      <li id="schedule-tab"><a href="#schedule" data-toggle="tab" style="font-size:15px;text-align:center;"><img src="<?=base_url()?>public/img/icons/png/sched.png" height="100" width="100" class="displayed" id="schedule-image"/>Search by Schedule</a></li>
      <li id="subject-tab"><a href="#subject" data-toggle="tab" style="font-size:15px;text-align:center;"><img src="<?=base_url()?>public/img/icons/png/subject.png" height="100" width="100"  class="displayed" id="subject-image"/>Search by Subject</a></li>
    </ul>
  </div><!--col xs 2-->
  
  <!--Tab Pane--> 
  <div class="col-xs-10">    
  <div class="tab-content">

  <div class="tab-pane active" active id="students">
  <div class="tab-container">
        
    <div class="page-header">
      <h5>Search by Student</h5>
    </div><br/>

    <div class="row">
      
      <div class="input-group search">
        <input type="text" class="form-control" placeholder="Search" id="search-name">
        <span class="input-group-btn">
          <button type="submit" class="btn"><span class="fui-search"></span></button>
        </span>
      </div>               
      
    </div> <!--row-->

    <div class="row">
      <div class="col-xs-12">
        <br>

        <div class="list-wrap">

          <div class="name-container" data-name="Jolinarose R. Gaspar">
            <a href="<?php echo site_url('adminPanel/students/1') ?>"><small>Jolinarose R. Gaspar</small></a>
            <hr>
          </div>
          
          <div class="name-container" data-name="Patricia P. Manahan">
            <a href="<?php echo site_url('adminPanel/students/2') ?>"><small>Patricia P. Manahan</small></a>
            <hr>
          </div>
          
          <div class="name-container" data-name="Taylor Swift">
            <a href="<?php echo site_url('adminPanel/students/3') ?>"><small>Taylor Swift</small></a>
            <hr>
          </div>
          
          <div class="name-container" data-name="Sam Smith">
            <a href="<?php echo site_url('adminPanel/students/4') ?>"><small>Sam Smith</small></a>
            <hr>
          </div>

          <div class="name-container" data-name="Taylor Austria">
            <a href="<?php echo site_url('adminPanel/students/5') ?>"><small>Taylor Austria</small></a>
            <hr>
          </div>
         
        </div>
      </div>
    </div>
  </div> <!--tab-container -->
  </div> <!--tab-pane -->
                
  <div class="tab-pane" id="schedule">
  <div class="tab-container">
    <div class="page-header">
      <h5>Search by Schedule</h5> 
    </div><!-- page-header -->   
    <?php 
      $attributes = array('role' => 'form');
      echo form_open('adminPanel/statistics', $attributes);
    ?>
      <div class="row">
        <div class="col-xs-5">
          <div class="form-group">
          <p><small>Date</small></p>                
            <label class="checkbox checkbox-inline" for="mon">
              <input type="checkbox" data-toggle="checkbox" value="" id="mon">
                M
            </label>
            <label class="checkbox checkbox-inline" for="tues">
              <input type="checkbox" data-toggle="checkbox" value="" id="tues">
                T
            </label>
            <label class="checkbox checkbox-inline" for="wed">
              <input type="checkbox" data-toggle="checkbox" value="" id="wed">
                W
            </label>
            <label class="checkbox checkbox-inline" for="thurs">
              <input type="checkbox" data-toggle="checkbox" value="" id="thurs">
                Th
            </label>
            <label class="checkbox checkbox-inline" for="fri">
              <input type="checkbox" data-toggle="checkbox" value="" id="fri">
                F
            </label>
            <label class="checkbox checkbox-inline" for="sat">
              <input type="checkbox" data-toggle="checkbox" value="" id="sat">
                S
            </label>
          </div>  
        </div><!-- col-xs-6 -->
      
          <div class="col-xs-3">
            <div class="form-group"> 
              <p><small>Start Time</small></p>              
              <select class="form-control select select-info select-sm" data-toggle="select" id="start-time" name="start-time">
                <option value="">Select Time</option>
                <option value="1">7:00 am</option>
                <option value="2">8:30 am</option>
                <option value="3">10:00 am</option>
                <option value="4">11:30 pm</option>
                <option value="5">1:00 pm</option>
                <option value="6">2:30 pm</option>
                <option value="7">4:00 pm</option>
                <option value="8">5:30 pm</option>
                <option value="9">7:00 pm</option>
              </select>
            </div>
          </div><!-- col-xs-6 -->
          <div class="col-xs-1"></div>
          <div class="col-xs-3">
            <div class="form-group"> 
              <p><small>End Time</small></p>             
              <select class="form-control select select-info select-sm" data-toggle="select" id="end-time" name="end-time">
                <option value="">Select Time</option>
                <option value="1">7:00 am</option>
                <option value="2">8:30 am</option>
                <option value="3">10:00 am</option>
                <option value="4">11:30 pm</option>
                <option value="5">1:00 pm</option>
                <option value="6">2:30 pm</option>
                <option value="7">4:00 pm</option>
                <option value="8">5:30 pm</option>
                <option value="9">7:00 pm</option>
              </select>
            </div>
          </div><!-- col-xs-6 -->
      </div>  
      <div class="row">
        <div class="col-xs-offset-5">
          <button type="submit" class="btn btn-info btn-sm" value="Submit" name="search-sched" id="search-sched" disabled="">Submit</button>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-xs-12">
        <hr style="height:1px; color:#999999; background-color:#999999;"><div id="count" class="count" data-value="{{{ $count }}}" style="display:inline;"><b>43</b></div><span><small> people</small></span>

        <div class="result-wrap">
          <div class>
            <span style="display:inline-block"><small>Jolinarose R. Gaspar</small></span> 
            <span style="float: right;"><small>TTh 1 - 2:30</small></span>
          </div>
          <div>
            <small>09276824582</small>
          </div>
          <hr>

          <div class>
            <span style="display:inline-block"><small>Patricia P. Manahan</small></span> 
            <span style="float: right;"><small>WF 2:30 - 4</small></span>
          </div>
          <div>
            <small>09276824582</small>
          </div>
          <hr>
          <div class>
            <span style="display:inline-block"><small>Taylor Swift</small></span> 
            <span style="float: right;"><small>TTh 1 - 2:30</small></span>
          </div>
          <div>
            <small>09276824582</small>
          </div>
          <hr>
        </div>
      </div>
    </div> 
  </div> <!--tab-container-->
  </div><!--tab-pane-->
               
  <div class="tab-pane" id="subject">
  <div class="tab-container">
    <div class="page-header">
      <h5>Search by Subject</h5>
    </div><br/> <!-- page-header -->
    
    <div class="row">
      
      <div class="input-group search">
        <input type="text" class="form-control" placeholder="Search" id="search-subject">
        <span class="input-group-btn">
          <button type="submit" class="btn"><span class="fui-search"></span></button>
        </span>
      </div>               
      
    </div> <!--row-->

    <div class="row">
      <div class="col-xs-12">
        <br>

        <div class="list-wrap">

          <div class="subject-container" data-name="ES 11">
            <a href="<?php echo site_url('adminPanel/subjects/1') ?>"><small>ES 11</small></a>
            <hr>
          </div>
          
          <div class="subject-container" data-name="CS 133">
            <a href="<?php echo site_url('adminPanel/subjects/2') ?>"><small>CS 133</small></a>
            <hr>
          </div>
          
          <div class="subject-container" data-name="Physics 72">
            <a href="<?php echo site_url('adminPanel/subjects/3') ?>"><small>Physics 72</small></a>
            <hr>
          </div>
          
          <div class="subject-container" data-name="Math 54">
            <a href="<?php echo site_url('adminPanel/subjects/4') ?>"><small>Math 54</small></a>
            <hr>
          </div>

          <div class="subject-container" data-name="CE 22">
            <a href="<?php echo site_url('adminPanel/subjects/5') ?>"><small>CE 22</small></a>
            <hr>
          </div>
         
        </div>
      </div>
    </div>
    
  </div><!--tab container-->
  </div> <!--tab pane-->

  </div> <!--tab-content-->
  </div> <!--col-xs-10-->   

</div><!-- tabbable -->
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