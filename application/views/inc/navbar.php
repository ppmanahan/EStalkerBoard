<link href="<?=base_url()?>public/css/logo-nav.css" rel="stylesheet">
<link href="<?=base_url()?>public/css/bootstrap.vertical-tabs.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>public/css/bootstrap.vertical-tabs.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>public/css/bootstrap-table.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>public/css/jquery-ui.css" rel="stylesheet">
<link href="<?=base_url()?>public/css/jquery-ui.structure.css" rel="stylesheet">
<link href="<?=base_url()?>public/css/jquery-ui.structure.min.css" rel="stylesheet">
<link href="<?=base_url()?>public/css/jquery-ui.theme.css" rel="stylesheet">
<link href="<?=base_url()?>public/css/jquery-ui.theme.min.css" rel="stylesheet">
<link href="<?=base_url()?>public/dataTables/media/css/jquery.dataTables.css" rel="stylesheet">
<link href="<?=base_url()?>public/dataTables/media/css/jquery.dataTables_themeroller.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>public/css/dataTables.bootstrap.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?=base_url()?>public/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>public/js/jquery-2.1.1.min.js"></script>
<script src="<?=base_url()?>public/js/jquery.js"></script>
<script src="<?=base_url()?>public/js/flat-ui.min.js"></script>
<script src="<?=base_url()?>public/js/application.js"></script>
<script src="<?=base_url()?>public/js/bootstrap-table.js"></script>
<script src="<?=base_url()?>public/js/jquery-form.js"></script>
<script src="<?=base_url()?>public/js/jquery-ui.js"></script>
<script src="<?=base_url()?>public/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>public/dataTables/media/js/jquery.dataTables.js" type="text/javascript" charset="utf8" ></script>
<script src="<?=base_url()?>public/dataTables/media/js/jquery.dataTables.min.js" type="text/javascript" charset="utf8" ></script>



<style type = "text/css">

html, body{
    background-image: url('<?=base_url()?>public/img/es.png');
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-position:center;
    height: 100%;
}

.ui-tabs
{
    background: none;
}

.btn-file {
  position: relative;
  overflow: hidden;

}

.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 20px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  background: red;
  cursor: inherit;
  display: block;
}

input[readonly] {
  font-size: 20px;  
  background-color: white !important;
  cursor: text !important;
}

.eTable, .wTable, .small{
    font-size: 14px;
}

.small{
    margin-top: 10px;
    float: right;
}

#tabs1-1, #tabs2-1{
    padding-bottom: 60px;
}

#editWbillModal .modal-dialog {
  width: 50%;
}
#editEbillModal .modal-dialog {
  width: 50%;
}
#editBuildingModal .modal-dialog {
  width: 40%;
}
#report .modal-dialog {
  width: 50%;
}
#addBuildingModal .modal-dialog {
  width: 50%;
}

</style>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container-fluid">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a href=<?=$main?> class="navbar-brand" href=""> <img src="<?=base_url()?>public/img/navlogo1.png"/></a>
  </div><!--navbar-header-->
</div> <!--container-fluid-->
</div> <!--navbar-->


