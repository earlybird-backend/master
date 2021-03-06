<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Earlypay :: <?php echo $title; ?></title>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css" />

	<!-- Pixel Admin's stylesheets -->
	<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/pixel-admin.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/css/pages.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/widgets.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/rtl.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/themes.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.datetimepicker.full.js"></script>
	
</head>
<body class="theme-default main-menu-animated">
<script>var init = [];</script>
<div id="main-wrapper">
<!-- header starts here-->
  <?php if($header) echo $header; ?>
<!-- header ends here-->
  <?php if($middle) echo $middle; ?>
  
  <?php if($footer) echo $footer; ?>
	<div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->


<!-- Pixel Admin's javascripts -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/pixel-admin.min.js"></script>

<script type="text/javascript">
	init.push(function () {
		// Javascript code here
	})
	window.PixelAdmin.start(init);
	
	
$('.PlanStartTime').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
	
});

$('.PlanEndTime').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
	
});

$('.ProposalTime').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
	
});

$('.ApproveProposalTime').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
	
});


function planfailbyadmin(planid)
{

            $.ajax({
			  url: '<?php echo site_url('admin_bak/plans/planfinish/'); ?>/'+planid,
			  //data: 'planid=' + planid,
			  success: function(data)
				  {
					  $(".finishmsg").html(data);
					   window.setTimeout(function () {
							location.reload()
						}, 5000);
				  }
			  
			});
			
			
			
   
}


function plancancelbyadmin(planid)
{

            $.ajax({
			  url: '<?php echo site_url('admin_bak/plans/plancancel/'); ?>/'+planid,
			  //data: 'planid=' + planid,
			  success: function(data)
				  {
					  $(".cancelmsg").html(data);
					  window.setTimeout(function () {
							location.reload()
						}, 5000);
				  }
			  
			});
			
			
			
   
}

	
	
</script>
<script>
					init.push(function () {
						$('#supplierdatatables').dataTable();
						$('#supplierdatatables_wrapper .table-caption').text('Supplier List');
						$('#supplierdatatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
					});
				</script>

</body>
</html>