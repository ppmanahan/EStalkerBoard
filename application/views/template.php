<?php 
$data['title'] = "E-Stalker Board";
$this->load->view('inc/header_view', $data);
		
$data['main'] = site_url('adminPanel/main');
$this->load->view('inc/navbar', $data); ?>

<div id="main_content">
<?php $this->load->view($main_content); ?>
</div>

<?php $this->load->view('inc/footer_view'); ?>