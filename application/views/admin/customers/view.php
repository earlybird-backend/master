<script language="javascript">
    $(document).ready(function () {
        $('#save').click(function () {           
             window.location = "<?php echo site_url('admin_bak/users/') ?>";            
        });       
    });

</script>
<?php
if (is_array($data) && sizeof($data) > 0) {
    extract($data[0]);
    //echo '<pre>';print_r($data);
}
?>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Dashboard</a></li>
    </ul>
    <div class="page-header">

        <div class="row">
            <!-- Page header, center on small screens -->
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>
			<a href="<?php echo site_url('admin_bak/users/') ?>">Back</a>

        </div>
    </div> <!-- / .page-header -->
    <div class="panel-heading"><span><?php echo $title; ?>&nbsp;&nbsp;Details</span></div>

    <div class="row">
        <div class="col-sm-12">   
            

            <div class="panel-body">               

                <div class="row form-group">
                    <label class="col-sm-4 control-label">User Name</label>
                    <div class="col-sm-8">
                        <?php echo $Username; ?>                
                       </div>
                </div>         

                 <div class="row form-group">
                    <label class="col-sm-4 control-label">EmailAddress</label>
                    <div class="col-sm-8">
                        <?php echo $EmailAddress; ?>              
                       </div>
                </div>

				<div class="row form-group">
                    <label class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-8">
                        <?php echo $Phone; ?>               
                       </div>
                </div>

				<div class="row form-group">
                    <label class="col-sm-4 control-label">Last Login</label>
                    <div class="col-sm-8">
                        <?php echo $LastLogin; ?>
                       </div>
                </div>	
                	<div class="row form-group">
                    <label class="col-sm-4 control-label">Total Space</label>
                    <div class="col-sm-8">
                        <?php echo $sumplan; ?>
                       </div>
                </div>
                
            </div>
        </div>
    </div>		