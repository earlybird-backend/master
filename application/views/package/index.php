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

if(is_array($discountsettings) && sizeof($discountsettings)>0)
{ 
	
	foreach($discountsettings as $t=>$d)
	{
		//pr($t);
		//pr($d);
	}
}	



if(is_array($result) && sizeof($result)>0)
{ 
	
	foreach($result as $k=>$v)
	{
	  //pr($k);
	  //pr($v);
	  
		if($v['PlanCategory']==$lang_slug)
		{
			$v['PlanId'];
			$v['PlanName'];
			$v['PlanSpace'];
			$v['PlanCost'];
			
		}
		elseif($v['PlanCategory']==$_SESSION['set_language'])
		{
			$v['PlanId'];
			$v['PlanName'];
			$v['PlanSpace'];
			$v['PlanCost'];
			$v['PlanUSDCost'];
			
		}
		
	  
	}
	
}


?>
	
<p style="text-align:center;"><?php if($this->session->flashdata('message')  && isset($_POST['Buy'])){
			echo $this->session->flashdata('message');
		}
	?></p>
	
	<!--div>
						<?php if($this->session->userdata("logged") == TRUE && $this->session->userdata('UserId'))
							{
					?>
					<a href="<?php echo base_url('users'); ?>" >Choose Box</a>
					
					<a href="<?php echo base_url('plans'); ?>" >Purchase Plans</a>
					
					<a href="<?php echo base_url('auth/logout'); ?>" >Logout</a>
					
							<?php }else{?>
						<a href="<?php echo base_url('auth'); ?>" >Sign in</a>
						<a href="<?php echo base_url('register'); ?>" >Get started</a>
							<?php } ?>
					</div-->
					
					
<!--      	<div class="panel panel-login">

			        <div class="panel-body">

			          <div class="row">

			            <div class="col-lg-12">

			              
						  <?php echo form_open_multipart('plans/order', array('name' => 'login', 'id' => 'login-form','class'=>'', 'role'=>'form', 'style'=>'display: block;')); ?>

			                <h2>Purchase Plans</h2>

			                  <div class="form-group">

			                   Purchase Space(in GB) or Extend Space<select name="PlanSpace" class="form-control" required >
							   <option value="">Select Space</option>
							   <option value="0">0</option>
							   <?php for($i=1;$i<=4;$i++){?>
									<option value="<?php echo $v['PlanSpace']*$i; ?>"><?php echo $v['PlanSpace']*$i; ?></option>
							   <?php }?>
							   
									</select>
								<?php echo form_error('PlanSpace','<p class="error">'); ?>
			                  </div>

			                  <div class="form-group with-btn">

			                    Select Time(in Year) or Extend Time<select name="PlanTime" class="form-control" required>
								<option value="">Select Time</option>
								<option value="0">0</option>
								 <?php for($k=0;$k<=2;$k++){?>
									<option value="<?php echo (2*$k + 1); ?>"><?php echo (2*$k + 1); ?></option>
							   <?php }?>
									<option value="10">10</option>
									</select>
								<?php echo form_error('PlanTime','<p class="error">'); ?>
			                  </div>

			                  

			                  <div class="col-xs-12 form-group text-center">     

			                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-login" value="Submit">

			                  </div>

			                 

			               <?php echo form_close(); ?>

			            </div>

			          </div>

			        </div>

        </div>-->

<div class="setting-wrap">
	<div class="container">
		<div class="row display-md-table">
			<div class="col-md-4 personalinfo-head display-md-table-cell">
				<div class="text-personal-info">
					<h3>Purchse Plan</h3>
					<span></span>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<div class="col-md-8 account-information display-md-table-cell">
				
				<div class="buy-plan-wrap">
					<img src="<?php echo base_url(); ?>assets/img/cloud.png">
					<?php 
						
					if($this->session->flashdata('planmessage')  ){ ?>
						<p style="text-align:center;" class="error"><?php echo $this->session->flashdata('planmessage'); ?></p>
					<?php } ?>
					<?php echo form_open_multipart('plans/order', array('name' => 'login', 'id' => 'login-form','class'=>'', 'role'=>'form', 'style'=>'display: block;')); ?>
					<div class="form-label">
						Purchase Space(in GB) or Extend Space
					</div>
					<div class="select-wrap">
						<select name="PlanSpace" required >
							<option value="">Select Space</option>
							   <option value="0" <?php echo set_select('PlanSpace', '0'); ?> >0</option>
							   <?php for($i=1;$i<=4;$i++){?>
									<option value="<?php echo $v['PlanSpace']*$i; ?>"><?php echo $v['PlanSpace']*$i; ?></option>
							   <?php }?>
							   
									</select>
								<?php echo form_error('PlanSpace','<p class="error">'); ?>
						</select>
					</div>

					<div class="form-label">
						Select Time(in Year) or Extend Time
					</div>
					<div class="select-wrap">
						<select name="PlanTime" required >
							<option value="">Select Time</option>
								<option value="0" <?php echo set_select('PlanTime', '0'); ?> >0</option>
								 <?php for($k=0;$k<=2;$k++){?>
									<option value="<?php echo (2*$k + 1); ?>"><?php echo (2*$k + 1); ?></option>
							   <?php }?>
									<option value="10">10</option>
									</select>
								<?php echo form_error('PlanTime','<p class="error">'); ?>
						</select>
					</div>

						


					<input type="submit" name="login-submit" id="login-submit" class="btn btn-rounded btn-border mr-l-10" value="Buy Plan">
                          <?php echo form_close(); ?>
                                </div>

			</div>
		</div>
	</div>
</div>
        

		    </div>

		  </div>

		</div>

	</div>