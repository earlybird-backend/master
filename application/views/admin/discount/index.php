<div id="content">
          <div class="box-element">
            <div class="box-head">
              <h3><?php echo $title;?></h3>
			  <b><?php echo anchor('admin_bak/plans/adddiscount', 'Add Dicount Setting');?></b>
            </div>
            <div class="productbox">

<div class="pagination" style="float:left; color:#FF0000;">
<?php
if($this->session->flashdata('message'))
{
	echo $this->session->flashdata('message');
}
?>
</div>
<?php //print_r($result); 
if(is_array($result) && sizeof($result)>0){ ?>
<div class="pagination" style="float:right;">
<?php echo $paginglinks; ?></div>
<table width="100%" cellspacing="0" cellpadding="4" border="0" class="data">
<tbody>

	<tr>
		<th valign="middle" width="5%">Sr.No</th>
		<th valign="middle" width="10%">Time Duration</th>
		<th valign="middle" width="10%">DurationType</th>
		<th valign="middle" width="10%">Discount (In %age)</th>
		<th valign="middle" width="10%">Action</th>
	</tr>
	<?php
	//echo '<pre>';print_r($result);
	$n = 0;
	$counter = 0;
	$counter =  $counter + $per_page;
	foreach($result as $key=>$v)
	{
	  $n++;
	  $counter++;
	 
	  if($n%2 == 0) $class = "even"; else $class = "";
	  

	?>
	<tr class="<?php echo $class;?>">
		<td><?php echo $counter;?></td>
		<td><?php echo $v['PlanDuration'];?></td>
		<td><?php echo $v['DurationType'];?></td>
		<td><?php echo $v['PlanDiscount'];?></td>
		
		<td> 
		<a href="<?php echo site_url('admin_bak/plans/editdiscount/'.$v['DiscountId'])?>"><img src="<?php echo base_url()?>img/icon_edit.png" alt="edit" title="edit" /></a>
		&nbsp;&nbsp;
		<a href="<?php echo site_url('admin_bak/plans/deletediscount/'.$v['DiscountId'])?>" onclick="return deleteRecordConfirm();"><img src="<?php echo base_url()?>img/cross.gif" alt="edit" title="edit" /></a></td>
		
		<tr>
	<?php }?>
</tbody>
</table>
<div class="pagination" style="float:right;">
<?php echo $paginglinks; ?></div>
<?php }else{?>
<p align="center">No Record Found!</p>
<?php }?>

			
			<p>&nbsp;</p>
			
			</div>
            <div class="clear"></div>			
          </div>
          <div class="clear"></div>
        </div>