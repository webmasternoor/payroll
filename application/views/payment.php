<?php
    test();
    function test(){
    echo 'testing';
} ?>

<div class="container">
<div class="panel panel-success panel-heading">Regular Payment for ICT Department</div>
<div class="table-responsive">
    <div class="heading text-center">
        <h2>TMSS</h2>
        <h3>Salary for the month of <?php echo DateTime::createFromFormat('!m', $month)->format('F');?>- <?php echo $year ?></h3><br><br>
    </div>
    <?php
    if($results){ ?>
        <table class="table_payscale table table-hover text-center" border="2">
			<tr style="border:1px solid white;">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="7"><pre class="bg-success" style="border-bottom:none;text-align:center;">ALLOWANCE ---------- ALLOWANCE ---------- ALLOWANCE ---------- ALLOWANCE ---------- ALLOWANCE</pre></th>

                <th colspan="14" style="text-align: center"><pre class="bg-success">DEDUCTION ----------- DEDUCTION ----------- DEDUCTION ----------- DEDUCTION ----------- DEDUCTION ----------- DEDUCTION ----------- DEDUCTION ----------- DEDUCTION ----------- DEDUCTION </pre></th>
                <th></th>
            </tr>
            <tr style="border:1px solid white;">
                    <th><pre class="bg-success"><input type="checkbox" id='selecctall' /></pre></th>
                    <th><pre class="bg-success" style="width: 100px;text-align:center;">ID No</pre></th>
                    <th><pre class="bg-success">Employee Name</pre></th>
                    <th><pre class="bg-success">Designation</pre></th>
                    <th><pre class="bg-success">Days worked</pre></th>
                    <th><pre class="bg-success">Basic</pre></th>
                    <th><pre class="bg-success">House Rent</pre></th>
                    <th><pre class="bg-success">Medical(20%)</pre></th>
                    <th><pre class="bg-success">Conveyance(10%)</pre></th>
                    <th><pre class="bg-success">CPF(10%)</pre></th>
                    <th><pre class="bg-success">GIA(1%)</pre></th>
                    <th><pre class="bg-success">BF(1%)</pre></th>
                    <th><pre class="bg-success">Aya Allow</pre></th>
                    <th><pre class="bg-success">Credit Allow</pre></th>
                    <th><pre class="bg-success">Load Allow</pre></th>
                    <th><pre class="bg-success">City/Hill Allow</pre></th>
                    <th><pre class="bg-success">Risk Allow</pre></th>
                    <th><pre class="bg-success">Distance Allow</pre></th>
                    <th><pre class="bg-success">Technical Allow</pre></th>
                    <th><pre class="bg-success">Deduction CPF TMSS(10%)</pre></th>
                <th><pre class="bg-success">CPF Own(5%)</pre></th>
                <th><pre class="bg-success">Deduction CPF Total</pre></th>
                <th><pre class="bg-success">Deduction GIA TMSS(1%)</pre></th>
                <th><pre class="bg-success">Deduction GIA Own(1%)</pre></th>
                <th><pre class="bg-success">Deduction GIA Total</pre></th>
                <th><pre class="bg-success">Deduction BF TMSS(1%)</pre></th>
                <th><pre class="bg-success">Deduction BF Own(1%)</pre></th>
                <th><pre class="bg-success">Deduction BF Total</pre></th>
                <th><pre class="bg-success">Late/Absent/Fine</pre></th>
                <th><pre class="bg-success">Bima</pre></th>
                <th><pre class="bg-success">TAX</pre></th>
                <th><pre class="bg-success">SAVINGS</pre></th>
                <th><pre class="bg-success">DPS</pre></th>
                <th><pre class="bg-success">Gross Total</pre></th>
                <th><pre class="bg-success">Deduction Total</pre></th>
                    <th><pre class="bg-success">Net Pay</pre></th>
              </tr>
            <?php
            echo form_open('payroll/payment_confirm');

            foreach ($results as $data) {
                ?>
    			<tr>
                    <td><pre><input type="checkbox"  style="text-align:center;width: 100%;" class="checkbox1" name="check_id[]" style="text-align:center;width: 100%;" value="<?php echo $data->account_id;?>"/></pre></td>
                    <td><pre><input name="id[]"  style="text-align:center;width: 100%;" type="text" value="<?php echo $data->account_id;?>" readonly/></pre></td>
                    <td><pre><input name="designation[]" style="text-align:center;width: 100%;" value="<?php echo $data->PBI_NAME;?>" readonly/></pre></td>
                    <td><pre><input name="designation[]" style="text-align:center;width: 100%;" value="<?php echo $data->designation;?>" readonly/></pre></td>
                    <td><pre><input name="pay_scale[]" type="text" style="text-align:center;width: 100%;" value="<?php echo cal_days_in_month(CAL_GREGORIAN, $month,$year)-$data->day;?>" readonly/></pre></td>
                    <td><pre><input name="basic" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->basic;?>" readonly/></pre></td>
                    <td><pre><input name="hr" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->hr;?>" readonly/></pre></td>
                    <td><pre><input name="medical[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->medical;?>" readonly/></pre></td>
                    <td><pre><input name="conveyance" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->conveyance;?>" readonly/></pre></td>
                    <td><pre><input name="cpf" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->cpf;?>" readonly/></pre></td>
                    <td><pre><input name="gia" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->gia;?>" readonly/></pre></td>
                    <td><pre><input name="bf" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->bf;?>" readonly/></pre></td>
                    <?php
                    $aya_allow= $data->PR_AYA;
                    if($aya_allow==1)
                        $aya_allow= $data->aya_allow;
                    ?>
                    <td><pre><input name="aya[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $aya_allow;?>" readonly/></pre></td>
                    <td><pre><input name="credit[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_CREDIT;?>" readonly/></pre></td>
                    <td><pre><input name="load[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_LOAD;?>" readonly/></pre></td>
                    <?php
                    $city_allow= $data->PR_CITY;
                    if($city_allow==1)
                        $city_allow= $data->city_allow;
                    ?>
                    <td><pre><input name="city[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $city_allow;?>" readonly/></pre></td>
                    <td><pre><input name="risk[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_RISK;?>" readonly/></pre></td>
                    <td><pre><input name="distance[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_DISTANCE;?>" readonly/></pre></td>
                    <td><pre><input name="tech[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_TECH;?>" readonly/></pre></td>
                    <td><pre><input name="ded_cpf_tmss" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_cpf_tmss;?>" readonly/></pre></td>
                    <td><pre><input name="ded_cpf_self" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_cpf_self;?>" readonly/></pre></td>
                    <td><pre><input name="ded_cpf_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_cpf_total;?>" readonly/></pre></td>
                    <td><pre><input name="ded_gia_tmss" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_gia_tmss;?>" readonly/></pre></td>
                    <td><pre><input name="ded_gia_self" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_gia_self;?>" readonly/></pre></td>
                    <td><pre><input name="ded_gia_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_gia_total;?>" readonly/></pre></td>
                    <td><pre><input name="ded_bf_tmss" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_bf_tmss;?>" readonly/></pre></td>
                    <td><pre><input name="ded_bf_self" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_bf_self;?>" readonly/></pre></td>
                    <td><pre><input name="ded_bf_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_bf_total;?>" readonly/></pre></td>
                    <td><pre><input name="ded_day" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->ded_amount+$data->oc;?>" readonly/></pre></td>
                    <td><pre><input name="bima[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->bima;?>" readonly/></pre></td>
                    <td><pre><input name="ded_tax[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_TAX;?>" readonly/></pre></td>
                    <td><pre><input name="savings[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_SAVINGS;?>" readonly/></pre></td>
                    <td><pre><input name="dps[]" type="text" style="text-align:center;width: 100%;" value="<?php echo $data->PR_DPS;?>" readonly/></pre></td>

                    <?php
                    $GROSS_TOTAL =$data->net_pay+$city_allow+$aya_allow+$data->PR_CREDIT
                        +$data->PR_TECH+$data->PR_LOAD+$data->PR_RISK +$data->PR_ARREAR_OTHER+$data->ded_total;
                    $GROSS_TOTAL = $GROSS_TOTAL + $GROSS_TOTAL*$data->PR_INCREMENT*.05;
                    $TOTAL_DED =$data->ded_total + $data->ded_amount + $data->oc + $data->PR_TAX + $data->bima;

                    $TOTAL_AMOUNT= $GROSS_TOTAL-$TOTAL_DED;
                    ?>

                    <td><pre><input name="gross_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $GROSS_TOTAL;?>" readonly/></pre></td>
                    <td><pre><input name="ded_total" type="text" style="text-align:center;width: 100%;" value="<?php echo $TOTAL_DED ?>" readonly/></pre></td>
                    <td><pre><input name="net_pay" type="text" style="text-align:center;width: 100%;" value="<?php echo $TOTAL_AMOUNT;?>" readonly/></pre></td>
                </tr>
    			<?php
            } ?>

			</table>
        </div><br><br>
        <button class="btn btn-lg btn-success center-block" value="CONFIRM PAYMENT" type="submit" name="paid">CONFIRM PAYMENT</button>
        <?php
    }
    else { ?>
        <div>
            <h1 class="text-danger text-center">Sorry! Incomplete absent table for the month of
                <?php echo DateTime::createFromFormat('!m', $month)->format('F') ; ?>-  <?php echo $year ?></h1>
            <br><h3 class="text-danger text-center">Please, click below to complete the absent table for the month.</h3><br><hr>
            <a href="<?php echo base_url('payroll/leave_count/'.$ab=1); ?>"> <button class="btn btn-danger btn-sm center-block">Absent Count</button></a>
        </div>
        <?php
    } ?>

<!--<hr><hr><hr>
<div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

<div id="exTab2" class="container">
    <ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2" data-toggle="tab">Without clearfix</a>
			</li>
			<li><a href="#3" data-toggle="tab">Solution</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
				</div>
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
				</div>
            <div class="tab-pane" id="3">
            <h3>add clearfix to tab-content (see the css)</h3>
				</div>
			</div>
  </div>
  </div>-->


