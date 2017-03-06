
<!--//basic information -->
</div><div class="container">
		<div class="">
			<div class="panel panel-success panel-heading">Basic information</div>
				<table id="collapseExample" class="table" id="demo" border="2" align="center">
				<?php foreach($records as $data):?>
						<tr>
							<th><h4>ID: <?php echo $ID = $data->PBI_ID?></h4></th>
							<th></th>
						</tr>
                    	<tr>
							<td><h4>Name: <?php echo $name = $data->PBI_NAME ?></h4></td>
							<td><h4>Date Employeed: <?php echo $data->PBI_DOJ?></h4></td>
						</tr>

						<tr>
							<td><h4>Grade: <?php echo $data->PBI_DESG_GRADE;?></h4></td>
						</tr>

				</table>
		</div>
<!--	basic infor close-->

	<br><br>
	<!--additional allowance start -->
	</div><div class="container">
		<div class="">
			<div class="panel panel-success panel-heading">Additional allowance & Increment</div>
			<table class="table"  border="2" align="left">
				<?php echo form_open('payroll/setup_update/'.$ID);?>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Aya Allowance<?php echo $data->PR_AYA;?></pre></td>
						<td width="100px"><pre class="bg-success"><input value="1" type="checkbox" <?php $data->PR_AYA==1 ? $check="checked" : $check= "unchecked"; echo $check;?> name="aya"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">City/Hill/Island Allowance<?php echo $data->PR_CITY;?></pre></td>
						<td width="100px"><pre class="bg-success"><input value="1" type="checkbox" <?php $data->PR_CITY==1 ? $check="checked" : $check= "unchecked"; echo $check;?> name="city"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Credit Allowance<?php echo $data->PR_CREDIT;?></pre></td>
						<td width="100px"><pre class="bg-success"><input  style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_CREDIT;?>" type="text" name="credit"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">TAX</pre></td>
						<td width="100px"><pre class="bg-success"><input   style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_TAX;?>" width="100px" type="text" name="tax"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Technical Allowance</pre></td>
						<td width="100px"><pre class="bg-success"><input style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_TECH;?>" width="100px" type="text" name="tech"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Load Allowance</pre></td>
						<td width="100px"><pre class="bg-success"><input value="<?php echo $data->PR_LOAD;?>" width="100px" type="text" name="load" style="color: #fff;height: 25px;text-align: center; background: #00dba3" /></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Risk Allowance</pre></td>
						<td width="100px"><pre class="bg-success"><input value="<?php echo $data->PR_RISK;?>" width="100px" type="text" name="risk" style="color: #fff;height: 25px;text-align: center; background: #00dba3" /></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Distance Allowance</pre></td>
						<td width="100px"><pre class="bg-success"><input value="<?php echo $data->PR_DISTANCE;?>" width="100px" type="text" name="distance" style="color: #fff;height: 25px;text-align: center; background: #00dba3" /></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Arrear/Other Allowance</pre></td>
						<td width="100px"><pre class="bg-success"><input value="<?php echo $data->PR_ARREAR_OTHER;?>" width="100px" type="text" name="arrear" style="color: #fff;height: 25px;text-align: center; background: #00dba3" /></pre></td>
					</tr>

					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Increment<?php echo $data->PR_INCREMENT;?></pre></td>
						<td class="btn"><input hidden type="button" onclick="decremmentValue()" id="minus" value="-" class="btn btn-success"  name="increment"/></td>
						<td class="btn"><input aria-disabled="true" hidden type="text" style="width: 60px;" id="number" value="<?php echo $data->PR_INCREMENT;?>" class="btn btn-success"  name="increment"/></td>
						<td class="btn"><input hidden type="button" onclick="incrementValue()"  value="+" class="btn btn-success"  name="increment"/></td>
					</tr>
			</table>
			</div>
	</div>
	<div class="container">
		<div class="">
			<div class="panel panel-success panel-heading">Additional deduction</div>
			<table class="table"  border="2" align="left">
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">TAX</pre></td>
						<td width="100px"><pre class="bg-success"><input   style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_TAX;?>" width="100px" type="text" name="tax"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Service Charge</pre></td>
						<td width="100px"><pre class="bg-success"><input  style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_SERVICE_CHARGE;?>" width="100px" type="text" name="service_charge"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">DPS</pre></td>
						<td width="100px"><pre class="bg-success"><input  style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_DPS;?>" width="100px" type="text" name="dps"/></pre></td>
					</tr>
					<tr style="border:1px solid white;">
						<td><pre class="bg-success" style="width: 230px;">Savings</pre></td>
						<td width="100px"><pre class="bg-success"><input  style="color: #fff;height: 25px;text-align: center; background: #00dba3" value="<?php echo $data->PR_SAVINGS;?>" width="100px" type="text" name="savings"/></pre></td>
					</tr>

			</table>
		</div>
			<div class="col-lg-offset-5">
				<input type="submit" value="UPDATE" name="update" class="btn btn-lg btn-success">
			</div>
			<?php echo form_close();?>
            <?php endforeach;?>
	</div>
	<!--	additional allowance close-->

	<script type="text/javascript">
			function incrementValue()
			{
				var value = parseInt(document.getElementById('number').value, 10);
				value = isNaN(value) ? 0 : value;
				value++;
				document.getElementById('number').value = value;
			}
			function decremmentValue()
			{
				var value = parseInt(document.getElementById('number').value, 10);
				value = isNaN(value) ? 0 : value;
				if (value>0)
				value--;
				document.getElementById('number').value = value;
			}
	</script>

