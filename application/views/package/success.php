<?php
/*if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}*/
?>

<?php
//echo $this->data['lang_slug'];
//echo $_SESSION['set_language'];
//echo $lang_slug;
//pr($result);

/*if(is_array($discountsettings) && sizeof($discountsettings)>0)
{ 
	
	foreach($discountsettings as $t=>$d)
	{
		//pr($t);
		//pr($d);
	}
}*/	



/*if(is_array($result) && sizeof($result)>0)
{ 
	
	foreach($result as $k=>$v)
	{
	  //pr($k);
	  //pr($v);
	  
		if($v['PlanCategory']==$lang_slug)
		{
			echo 'PlanId: '.$v['PlanId'];
			echo 'PlanName: '.$v['PlanName'];
			echo 'PlanSpace: '.$v['PlanSpace'];
			echo 'PlanCost: '.$v['PlanCost'];
			
		}
		elseif($v['PlanCategory']==$_SESSION['set_language'])
		{
			echo 'PlanId: '.$v['PlanId'];
			echo 'PlanName: '.$v['PlanName'];
			echo 'PlanSpace: '.$v['PlanSpace'];
			echo 'PlanCost: '.$v['PlanCost'];
			echo 'PlanUSDCost: '.$v['PlanUSDCost'];
			
		}
		
	  
	}
	
}*/


?>



<p style="text-align:center;"><?php if($this->session->flashdata('message') && isset($_POST['Buy'])){
			echo $this->session->flashdata('message');
		}
	?></p>
	
	<!--div>
						<?php //if($this->session->userdata("logged") == TRUE && $this->session->userdata('UserId'))
							//{
					?>
					<a href="<?php //echo base_url('users'); ?>" >Choose Box</a>
					
					<a href="<?php //echo base_url('plans'); ?>" >Purchase Plans</a>
					
					<a href="<?php //echo base_url('auth/logout'); ?>" >Logout</a>
					
							<?php //}else{?>
						<a href="<?php //echo base_url('auth'); ?>" >Sign in</a>
						<a href="<?php //echo base_url('register'); ?>" >Get started</a>
							<?php //} ?>
					</div-->
	
	
	
		      <!--	<div class="panel panel-login">

			        <div class="panel-body">

			          <div class="row">

			            <div class="col-lg-12">

			              <?php //echo form_open_multipart('plans/order',array('name' => 'login', 'id' => 'login-form','class'=>'', 'role'=>'form', 'style'=>'display: block;')); ?>
						  

			                <h2>Order Details</h2>

			                   <div class="table-responsive">
									<table class="table table-bordered">
									<thead>
									  <tr>
										<th>Total Space( <?php //echo $_SESSION['totalspace'];?> in GB)</th>
										<th>Time(in Year)</th>
										<th>Expiry Date</th>
										<th>Amout</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td><?php //if($_SESSION['space']){echo $_SESSION['space'];}else{echo $_SESSION['totalspace'];} ?></td>
										
										<td><?php //echo $_SESSION['time']; ?></td>
										
										<td><?php //echo $_SESSION['expiredate']; ?></td>
										
										<td><?php //echo $_SESSION['totalamount']; ?></td>
									  </tr>
									</table>
								</div> 

			                  

			                 

			                 <?php //echo form_close(); ?>

			               

			            </div>

			          </div>

			        </div>

		      </div>

		    </div>

		  </div>

		</div>

	</div>-->
<div class="setting-wrap">
    <div class="container">
        <div class="row display-md-table">
            <div class="col-md-4 personalinfo-head display-md-table-cell">
                <div class="text-personal-info">
                    <h3>Order</h3>
                    <span></span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-md-8 account-information display-md-table-cell">
                <?php echo form_open_multipart('plans/order', array('name' => 'login', 'id' => 'login-form', 'class' => '', 'role' => 'form', 'style' => 'display: block;')); ?>					
                <div class="order-wrap">
                    <table class="table order-table">
                        <tbody>
                            <?php if ($_SESSION['sumplan']) { ?>
                                <tr>
                                    <td><b>Current Space(G)</b></td>
                                    <td class="second"><?php echo $_SESSION['sumplan']; ?></td>
                                    <td><b>Current Expiry date </b></td>
                                    <td><?php echo $_SESSION['preexpiredate']; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td> <b> Space Plan(G) </b> </td>
                                <td class="second"><?php
                                    if ($_SESSION['space']) {
                                        echo $_SESSION['space'];
                                    } else {
                                        echo '0';
                                    }
                                    ?></td>
                                <td>  <b> Year Plan (year) </b> </td>
                                <td><?php                              
                                       echo $_SESSION['time'];
                                    
                                    ?></td>
                            </tr>
                            <tr>
                                <td><b>New Space(G) </b></td>
                                <td class="second"><?php echo $_SESSION['totalspace']; ?></td>
                                <td> <b> New expiry date </b></td>
                                <td><?php echo $_SESSION['expiredate']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
<div class="order-amt-wrap mr-t-40">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="70%">Item</th>
                                <th width="30%;" class="text-center">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($_SESSION['baseamount']) { ?>
                                <tr>
                                    <td>
                                        Amount for new add space
                                    </td>
                                    <td class="text-center">
                                        <?php echo $_SESSION['baseamount']; ?>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        Amount for new add space
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        echo '0';
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if ($_SESSION['previousplancost']) { ?>
                                <tr>
                                    <td>
                                        Amount for old space
                                    </td>
                                    <td class="text-center">
                                        <?php echo $_SESSION['previousplancost']; ?>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        Amount for old space
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        echo '0';
                                        ?>								
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if ($_SESSION['discount'] != 0) { ?>
                                <tr>
                                    <td>
                                        Discount
                                    </td>
                                    <td class="text-center">
                                        <?php echo '-' . $_SESSION['discount']; ?>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        Discount
                                    </td>
                                    <td class="text-center">
                                        0
                                    </td>                                    
        			</tr>
<?php } ?>
</tbody>

<tfoot>
    <tr>
        <td>
            Total
        </td>
        <td class="text-center">
            <?php echo $_SESSION['totalamount']; ?>
        </td>
    </tr>
</tfoot>
</table>
</div>

<div class="text-center mr-t-40">
    <a href="<?php echo base_url('users');?>" class="btn btn-rounded btn-border mr-l-10" id="popup-toggle" >Choose Box</a>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>