<?php
if (is_array($data) && sizeof($data) > 0) {
   // extract($data[0]);
    //echo '<pre>';print_r($data[0]);
	
}
?>
<div id="content-wrapper">    
   
	
    <div class="panel-heading custom-btn btn-add"><span><a href="<?php echo site_url('admin_bak/customers/') ?>">Back</a></span></div>

    <div class="row mr-top-20">
        <div class="col-sm-12">   
            

            <div class="panel-body">               

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Company ID</label>
                    <div class="col-sm-8">
                        <?php echo $data[0]->UserId;; ?>                
                       </div>
                </div>         

                 <div class="row form-group">
                    <label class="col-sm-4 control-label">Company Name</label>
                    <div class="col-sm-8">
                        <?php echo $data[0]->CompanyName; ?>              
                       </div>
                </div>

				<div class="row form-group">
                    <label class="col-sm-4 control-label">Industry</label>
                    <div class="col-sm-8">
                        <?php echo $data[0]->Industry; ?>               
                       </div>
                </div>
                
                
                <?php
                     $countrysql = "SELECT * from county where id='" . $data[0]->Country . "'";
                    $countrystatus = $this->db->query($countrysql);
                    $countrydata = $countrystatus->result_array();                   
                    if ($countrydata) {
                        foreach ($countrydata as $p => $s) {
                               $countryname = $s['name'];
                        }
                    }
                    ?>

				<div class="row form-group">
                    <label class="col-sm-4 control-label">Country</label>
                    <div class="col-sm-8">
                        <?php echo $countryname; ?>
                       </div>
                </div>	
                	<div class="row form-group">
                    <label class="col-sm-4 control-label">Capital Cost</label>
                    <div class="col-sm-8">
                        <?php  ?>
                       </div>
                </div>
                
            </div>
        </div>
    </div>	

<?php //} ?>	