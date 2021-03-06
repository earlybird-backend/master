<?php
if (is_array($data) && sizeof($data) > 0) {
    extract($data[0]);
    //echo '<pre>';print_r($data[0]);
	
}
?>
<div id="content-wrapper">
   
	
    <div class="panel-heading"><span><a href="<?php echo site_url('admin_bak/plans/') ?>">Back</a></span>
<?php 
if($this->session->flashdata('invoicemessage'))
{
?>
	<span class="label label-success"><?php echo $this->session->flashdata('invoicemessage'); ?></span>

<?php	} ?>

<?php
if($this->session->flashdata('reportmessage'))
{
?>	
	<span class="label label-success"><?php echo $this->session->flashdata('reportmessage'); ?></span>

<?php
}
?>
	
	</div>

<div class="row">
        <div class="col-sm-12">
            <div class="panel-body">
				<div class="row form-group">
                    <label class="col-sm-4 control-label">ProposalID</label>
                    <div class="col-sm-8">
                        <?php $plansql = "SELECT * FROM `proposal_report_by_admin` "
                                                    . "WHERE `PlanId` ='" . $PlanId . "'";

                                            $planquery = $this->db->query($plansql);
                                            $plandata = $planquery->result_array();
                                         echo $plandata[0]['ReportId']	?>
                       </div>
                </div>
				
				<div class="row form-group">
                    <label class="col-sm-4 control-label">ExpectAPRType</label>
                    <div class="col-sm-8">
                        <?php echo $ExpectAPRRate; ?>
                       </div>
                </div>
				
				<div class="row form-group">
                    <label class="col-sm-4 control-label">ExpectAPR</label>
                    <div class="col-sm-8">
                        <?php echo $ExpectAPRPercent.'%'; ?>
                       </div>
                </div>
				
				<div class="row form-group">
                    <label class="col-sm-4 control-label">ClearAmount</label>
                    <div class="col-sm-8">
					<?php
									 $plansql = "SELECT * FROM `customer_early_pay_plans` "
                                                    . "WHERE `PlanId` ='" . $PlanId . "'";

                                            $planquery = $this->db->query($plansql);
                                            $plandata = $planquery->result_array();											
									$CurrencyType = "SELECT * FROM `apr_currency_by_admin` "
                                                    . "WHERE `CurrencyId` ='" .$plandata[0]['CurrencyType'] . "'";

                                            $CurrencyTypequery = $this->db->query($CurrencyType);
                                            $CurrencyName = $CurrencyTypequery->result_array();                                           
									 ?>
                       <?php if($InvAmount) { echo $CurrencyName[0]['CurrencySign'] . '' .  $InvAmount; } else { echo 'No payable Amount'; } ?>
                     </div>
                </div>
				
				
				
				<div class="row form-group">
                    <label class="col-sm-4 control-label">APR</label>
                    <div class="col-sm-8">
                       <?php echo $CalculateAPR; ?>
					   
                     </div>
                </div>
				
				<div class="row form-group">
                    <label class="col-sm-4 control-label">Earns</label>
                    <div class="col-sm-8">
                       <?php echo $Earns;?>
					 </div>
                </div>
				
				
				
            </div>

			
        </div>
    </div>

	
	<!--Default tabs-->
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Suppliers Data</span>
					</div>
					<div class="panel-body">
						<ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
							<li class="active">
								<a href="#uidemo-tabs-default-demo-supplier" data-toggle="tab">Supplier</a>
							</li>
							
							<li class="">
								<a href="#uidemo-tabs-default-demo-invoice" data-toggle="tab">Invoice</a>
							</li>
						</ul>

						<div class="tab-content tab-content-bordered">
							<div class="tab-pane fade active in" id="uidemo-tabs-default-demo-supplier">
						
						<table class="table table-bordered">
							<thead>
								<tr>
									
									<th>VendorCode</th>
									<th>Amount</th>
									
								</tr>
							</thead>
							<tbody>
							<?php 
							if(is_array($firsttabdata) && sizeof($firsttabdata)>0)
							{ 
							
								foreach($firsttabdata as $s=>$i)
								{
							?>
							
								<tr>
									
									<td><?php echo $i['supplier']; ?></td>
									<td><?php
									 $plansql = "SELECT * FROM `customer_early_pay_plans` "
                                                    . "WHERE `PlanId` ='" . $i['PlanId'] . "'";

                                            $planquery = $this->db->query($plansql);
                                            $plandata = $planquery->result_array();											
									$CurrencyType = "SELECT * FROM `apr_currency_by_admin` "
                                                    . "WHERE `CurrencyId` ='" .$plandata[0]['CurrencyType'] . "'";

                                            $CurrencyTypequery = $this->db->query($CurrencyType);
                                            $CurrencyName = $CurrencyTypequery->result_array();
                                           echo $CurrencyName[0]['CurrencySign'] . '' .  $i['InvAmount'];
									 ?></td>
									
								</tr>
							
							<?php	
								}
							}
								
							?>
							</tbody>
						</table>
					</div> <!-- / .tab-pane -->
							
							
							
							<div class="tab-pane fade" id="uidemo-tabs-default-demo-invoice">
								<table class="table table-bordered">
							<thead>
								<tr>
									
									<th>VendorCode</th>
									<th>Invoice</th>
									<th>Amount</th>
									<th>CurrentPaydate</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
							if(is_array($thirdtabdata) && sizeof($thirdtabdata)>0)
							{ 
							
								foreach($thirdtabdata as $p=>$s)
								{
							?>
								
								<tr>
									<td><?php echo $s['supplier']; ?></td>
									<td><?php echo $s['InvoiceId']; ?></td>
									<td><?php
									 $plansql = "SELECT * FROM `customer_early_pay_plans` "
                                                    . "WHERE `PlanId` ='" . $s['PlanId'] . "'";

                                            $planquery = $this->db->query($plansql);
                                            $plandata = $planquery->result_array();											
									$CurrencyType = "SELECT * FROM `apr_currency_by_admin` "
                                                    . "WHERE `CurrencyId` ='" .$plandata[0]['CurrencyType'] . "'";

                                            $CurrencyTypequery = $this->db->query($CurrencyType);
                                            $CurrencyName = $CurrencyTypequery->result_array();
                                           echo $CurrencyName[0]['CurrencySign'] . '' .  $s['InvAmount'];
									 ?></td>
									<td><?php echo $s['EstPaydate']; ?></td>
								</tr>
								<?php	
								}
							}
								
							?>
							</tbody>
						</table>
							</div> <!-- / .tab-pane -->
							
						</div> <!-- / .tab-content -->
					</div>
				</div>
	
	
</div>	