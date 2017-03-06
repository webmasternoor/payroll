<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Print_pdf extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('accounts','product','brand','category','billings','payrolls'),'',TRUE);
	}


function reciept_pdf($oid)
	{
		if($this->session->userdata('logged_in'))
		{
				$data['details'] = $this->billings->fetch_order_details($oid);
				$data['customer'] = $this->billings->fetch_customer_details($oid);
				$amount=0;
				$quantity=0;
				$vat=0;
				$dif=0;

				require APPPATH . 'plugins/fpdf.php';
            $pdf = new FPDF('p', 'mm', 'A4');
            //$pdf->AddPage();
            //font problem

            //this is a UTF-8 file, we won't need any encode/decode/iconv workarounds

            //define the path to the .ttf files you want to use
            define('FPDF_FONTPATH',"F:\fonts/");
            require('tfpdf.php');

            $pdf = new tFPDF();
           $pdf->AddPage();

            // Add Unicode fonts (.ttf files)
            $fontName = 'Siyamrupali';
            $pdf->AddFont($fontName,'','Siyamrupali.ttf',true);
            $pdf->AddFont($fontName,'B','Siyamrupali.ttf',true);

            //now use the Unicode font in bold
            $pdf->SetFont($fontName,'B',12);

            //anything else is identical to the old FPDF, just use Write(),Cell(),MultiCell()...
            //without any encoding trouble
            $pdf->Cell(100,20, "Some UTF-8 String");

            //font problem finished

				$pdf->SetFont('times','b',13); 
		        $pdf->Cell(0,5, 'Company Name', 0, 1, 'C');
		        $pdf->Ln(1);
		        $pdf->SetFont('times','',12);
		        $pdf->Cell(0,5, 'Company Address and Contact', 0, 1, 'C');
		        $pdf->Line(43,31,100,31);
		       	$pdf->Line(150,31,180,31);
		        $pdf->Line(42,41,100,41);
		        $pdf->Ln(5);
		        foreach($data['customer'] as $cust){
		                $pdf->Cell(125,5,'Customer Name:  '. $cust->customer_name, 0, 0, 'J');
		                $pdf->Cell(45,5,'Date :  '. $cust->date, 0,1, 'J');
		                $pdf->Ln(5);
		                $pdf->Cell(125,5,'Payment Type:  '. $cust->payment, 0, 0, 'J');
		                 $pdf->Ln(7);
		        }
		        	$pdf->Cell(10,7,'Qty',1,0,'C');
				    $pdf->Cell(10,7,'Unit',1,0,'C');
		      		$pdf->Cell(100,7,'Description',1,0,'C');
		      		$pdf->Cell(40,7,'Unit Price',1,0,'C');
					$pdf->Cell(30,7,'Amount',1,0,'C');
				
				 $pdf->Ln(7);
				foreach($data['details']  as $pdt)
				{	$pdf->Cell(10,7,$pdt->qty,1,0,'C');
					$pdf->Cell(10,7,' ',1,0,'C');
					$pdf->Cell(100,7,$pdt->product_name,1,0,'C');
					$pdf->Cell(40,7,number_format($pdt->price,2),1,0,'C');
					$pdf->Cell(30,7,"Php ".number_format($total = $pdt->qty * $pdt->price,2),1,0,'C');
					$pdf->Ln(7);
					$amount+=$total;
					$quantity+=$pdt->qty;
					$vat= 0.12 * $amount;
					$dif = $amount-$vat;
		
				}
					$pdf->Cell(50,7,'',1,0,'C');
				    $pdf->Cell(30,7,'',1,0,'C');
		      		$pdf->Cell(80,7,'',1,0,'C');
					$pdf->Cell(30,7,"",1,0,'C');
					$pdf->Ln(7);
		
					$pdf->Cell(50,7,'',1,0,'C');
				    $pdf->Cell(30,7,'',1,0,'C');
		      		$pdf->Cell(80,7,'Total Sale(Vat Inclusive)',1,0,'C');
					$pdf->Cell(30,7,"Php ".number_format($total = $pdt->qty * $pdt->price,2),1,0,'C');
					$pdf->Ln(7);
		
					$pdf->Cell(50,7,'',1,0,'C');
				    $pdf->Cell(30,7,'',1,0,'C');
		      		$pdf->Cell(80,7,'Less:VAT',1,0,'C');
					$pdf->Cell(30,7,"Php ".number_format($vat,2),1,0,'C');
					$pdf->Ln(7);
		
					$pdf->Cell(50,7,'VATable',1,0,'C');
				    $pdf->Cell(30,7,"Php ".number_format($vat,2),1,0,'C');
		      		$pdf->Cell(80,7,'Amount Net of VAT',1,0,'C');
					$pdf->Cell(30,7,"Php ".number_format($dif,2),1,0,'C');
					$pdf->Ln(7);
		
					$pdf->Cell(50,7,'VAT Zero Rated',1,0,'C');
				    $pdf->Cell(30,7,'',1,0,'C');
		      		$pdf->Cell(80,7,'Amount Due',1,0,'C');
					$pdf->Cell(30,7,"",1,0,'C');
					$pdf->Ln(7);
		
					$pdf->Cell(50,7,'VAT - 12%',1,0,'C');
				    $pdf->Cell(30,7,"Php ".number_format($vat,2),1,0,'C');
		      		$pdf->Cell(80,7,'Add: VAT',1,0,'C');
					$pdf->Cell(30,7,'',1,0,'C');
					$pdf->Ln(7);

					$pdf->Cell(50,7,'',1,0,'C');
				    $pdf->Cell(30,7,'',1,0,'C');
		      		$pdf->Cell(80,7,'Total Amount Due',1,0,'C');
					$pdf->Cell(30,7,"Php ".number_format($amount,2),1,0,'C');
					$pdf->Ln(7);


				$pdf->Cell(125,5,'Delivered By:  '.$pdt->L_name.','. $pdt->F_name." ".$pdt->M_name, 0, 0, 'J');

		        $pdf->Ln(5);

				$pdf->Output();
		        }else{
		        	redirect(base_url(''));
		        }


	}

	function download_pdf($oid)
	{

		if($this->session->userdata('logged_in'))
		{
		$data['details'] = $this->billings->fetch_order_details($oid);
		$data['customer'] = $this->billings->fetch_customer_details($oid);
		$amount=0;
		$quantity=0;
		$vat=0;
		$dif=0;



		require APPPATH . 'plugins/fpdf.php';

       	$pdf = new FPDF('p', 'mm', 'A4');
        $pdf->AddPage();
		$pdf->SetFont('times','b',13); 
        $pdf->Cell(0,5, 'Company Name', 0, 1, 'C');
        $pdf->Ln(1);
        $pdf->SetFont('times','',12);
        $pdf->Cell(0,5, 'Company Address and Contact', 0, 1, 'C');
        $pdf->Line(43,31,100,31);
       	$pdf->Line(150,31,180,31);
        $pdf->Line(42,41,100,41);
        $pdf->Ln(5);
        foreach($data['customer'] as $cust){
                $pdf->Cell(125,5,'Customer Name:  '. $cust->customer_name, 0, 0, 'J');
                $pdf->Cell(45,5,'Date :  '. $cust->date, 0,1, 'J');
                $pdf->Ln(5);
                $pdf->Cell(125,5,'Payment Type:  '. $cust->payment, 0, 0, 'J');
                 $pdf->Ln(7);
        }
        	$pdf->Cell(10,7,'Qty',1,0,'C');
		    $pdf->Cell(10,7,'Unit',1,0,'C');
      		$pdf->Cell(100,7,'Description',1,0,'C');
      		$pdf->Cell(40,7,'Unit Price',1,0,'C');
			$pdf->Cell(30,7,'Amount',1,0,'C');

		 $pdf->Ln(7);
		foreach($data['details']  as $pdt)
		{	$pdf->Cell(10,7,$pdt->qty,1,0,'C');
			$pdf->Cell(10,7,' ',1,0,'C');
			$pdf->Cell(100,7,$pdt->product_name,1,0,'C');
			$pdf->Cell(40,7,number_format($pdt->price,2),1,0,'C');
			$pdf->Cell(30,7,"Php ".number_format($total = $pdt->qty * $pdt->price,2),1,0,'C');
			$pdf->Ln(7);
			$amount+=$total;
			$quantity+=$pdt->qty;
			$vat= 0.12 * $amount;
			$dif = $amount-$vat;

		}
			$pdf->Cell(50,7,'',1,0,'C');
		    $pdf->Cell(30,7,'',1,0,'C');
      		$pdf->Cell(80,7,'',1,0,'C');
			$pdf->Cell(30,7,"",1,0,'C');
			$pdf->Ln(7);

			$pdf->Cell(50,7,'',1,0,'C');
		    $pdf->Cell(30,7,'',1,0,'C');
      		$pdf->Cell(80,7,'Total Sale(Vat Inclusive)',1,0,'C');
			$pdf->Cell(30,7,"Php ".number_format($total = $pdt->qty * $pdt->price,2),1,0,'C');
			$pdf->Ln(7);

			$pdf->Cell(50,7,'',1,0,'C');
		    $pdf->Cell(30,7,'',1,0,'C');
      		$pdf->Cell(80,7,'Less:VAT',1,0,'C');
			$pdf->Cell(30,7,"Php ".number_format($vat,2),1,0,'C');
			$pdf->Ln(7);

			$pdf->Cell(50,7,'VATable',1,0,'C');
		    $pdf->Cell(30,7,"Php ".number_format($vat,2),1,0,'C');
      		$pdf->Cell(80,7,'Amount Net of VAT',1,0,'C');
			$pdf->Cell(30,7,"Php ".number_format($dif,2),1,0,'C');
			$pdf->Ln(7);

			$pdf->Cell(50,7,'VAT Zero Rated',1,0,'C');
		    $pdf->Cell(30,7,'',1,0,'C');
      		$pdf->Cell(80,7,'Amount Due',1,0,'C');
			$pdf->Cell(30,7,"",1,0,'C');
			$pdf->Ln(7);

			$pdf->Cell(50,7,'VAT - 12%',1,0,'C');
		    $pdf->Cell(30,7,"Php ".number_format($vat,2),1,0,'C');
      		$pdf->Cell(80,7,'Add: VAT',1,0,'C');
			$pdf->Cell(30,7,'',1,0,'C');
			$pdf->Ln(7);

			$pdf->Cell(50,7,'',1,0,'C');
		    $pdf->Cell(30,7,'',1,0,'C');
      		$pdf->Cell(80,7,'Total Amount Due',1,0,'C');
			$pdf->Cell(30,7,"Php ".number_format($amount,2),1,0,'C');
			$pdf->Ln(7);


		$pdf->Cell(125,5,'Delivered By:  '.$pdt->L_name.','. $pdt->F_name." ".$pdt->M_name, 0, 0, 'J');

        $pdf->Ln(5);

		$pdf->Output('('.$cust->customer_name.')'.$cust->date.'.pdf','D');

		 }else{
		        	redirect(base_url(''));
		        }

	}

	public function payroll_pdf($id)
	{
		if($this->session->userdata('logged_in'))
		{
		$data["records"] = $this->accounts->profile($id);
		$data["payrolls"] = $this->payrolls->pay_history($id);
		$amount=0;
		$quantity=0;
		$vat=0;
		$dif=0;

		require APPPATH . 'plugins/fpdf.php';

       	$pdf = new FPDF('L', 'mm', 'A2');
        $pdf->AddPage();
		$pdf->SetFont('times','b',26);
        $pdf->Cell(0,5, 'TMSS', 0, 1, 'C');
        $pdf->Ln(5);
        $pdf->SetFont('times','',22);
        $pdf->Cell(0,5, 'Salary Details', 0, 1, 'C');
        $pdf->Ln(5);                                           ;
        $pdf->Cell(0,5, 'Kajipara, Mirpur-10, Dhaka.', 0, 1, 'C');

        $pdf->Ln(15);
        $pdf->Cell(125,5,'Name of the Department: ICT Ltd', 0, 1, 'J');
        $pdf->Ln(2);

            $pdf->SetFont('times','',14);
        	$pdf->Cell(30,7,'Date',1,0,'C');
        	$pdf->Cell(34,7,'Worked(days)',1,0,'C');
		    $pdf->Cell(28,7,'Basic Pay',1,0,'C');
		    $pdf->Cell(30,7,'House Rent',1,0,'C');
		    $pdf->Cell(28,7,'Medical',1,0,'C');
		    $pdf->Cell(30,7,'Conveyance',1,0,'C');
		    $pdf->Cell(24,7,'CPF',1,0,'C');
		    $pdf->Cell(24,7,'GIA',1,0,'C');
		    $pdf->Cell(24,7,'BF',1,0,'C');
		    $pdf->Cell(30,7,'Gross Total',1,0,'C');
   			$pdf->Cell(40,7,'Ded CPF TMSS',1,0,'C');
		    $pdf->Cell(40,7,'Ded CPF Own',1,0,'C');
		    $pdf->Cell(40,7,'Ded CPF Total',1,0,'C');
		    $pdf->Cell(40,7,'Ded GIA TMSS',1,0,'C');
		    $pdf->Cell(40,7,'Ded GIA Own',1,0,'C');
		    $pdf->Cell(40,7,'Ded GIA Total',1,0,'C');
		    $pdf->Cell(36,7,'Ded BF TMSS',1,0,'C');
		    $pdf->Cell(36,7,'Ded BF Own',1,0,'C');
		    $pdf->Cell(36,7,'Ded BF Total',1,0,'C');
		    $pdf->Cell(32,7,'Ded Total',1,0,'C');
			$pdf->Cell(36,7,'Net pay',1,0,'C');
		 $pdf->Ln(7);
		 foreach($data['payrolls']  as $pay)
		{
			$pdf->Cell(30,7,$pay->date,1,0,'C');
			$pdf->Cell(34,7,number_format($pay->dayswork,2),1,0,'C');
			$pdf->Cell(28,7,number_format($pay->basic,2),1,0,'C');
			$pdf->Cell(30,7,number_format($pay->hr,2),1,0,'C');
			$pdf->Cell(28,7,number_format($pay->medical,2),1,0,'C');
			$pdf->Cell(30,7,number_format($pay->conveyance,2),1,0,'C');
			$pdf->Cell(24,7,number_format($pay->cpf,2),1,0,'C');
			$pdf->Cell(24,7,number_format($pay->gia,2),1,0,'C');
			$pdf->Cell(24,7,number_format($pay->bf,2),1,0,'C');
			$pdf->Cell(30,7,number_format($pay->gross_total,2),1,0,'C');
			$pdf->Cell(40,7,number_format($pay->ded_cpf_tmss,2),1,0,'C');
			$pdf->Cell(40,7,number_format($pay->ded_cpf_self,2),1,0,'C');
			$pdf->Cell(40,7,number_format($pay->ded_cpf_total,2),1,0,'C');
			$pdf->Cell(40,7,number_format($pay->ded_gia_tmss,2),1,0,'C');
			$pdf->Cell(40,7,number_format($pay->ded_gia_self,2),1,0,'C');
			$pdf->Cell(40,7,number_format($pay->ded_gia_total,2),1,0,'C');
			$pdf->Cell(36,7,number_format($pay->ded_bf_tmss,2),1,0,'C');
			$pdf->Cell(36,7,number_format($pay->ded_bf_self,2),1,0,'C');
			$pdf->Cell(36,7,number_format($pay->ded_bf_total,2),1,0,'C');
			$pdf->Cell(32,7,number_format($pay->ded_total,2),1,0,'C');
			$pdf->Cell(36,7,number_format($pay->net_pay,2),1,0,'C');
			$pdf->Ln(7);

		}
		//$pdf->Cell(125,5,'Organized By:  '.$pdt->L_name.','. $pdt->F_name." ".$pdt->M_name, 0, 0, 'J');

        $pdf->Ln(5);
        foreach($data['records'] as $cust)
        		$pdf->Output('('.$cust->F_name.' '.$cust->M_name.' '.$cust->L_name.') - '.date('M - j - Y').'.pdf','D');

		 }else{
		        	redirect(base_url(''));
		        }

	}

	public function salary_sheet()
	{
		if($this->session->userdata('logged_in'))
		{
            if($data["salary"] = $this->payrolls->get_employee_with_leave('payroll_check')) {

                $error['month'] = $this->input->post('month');
                $error['year'] = $this->input->post('year');
                require APPPATH . 'plugins/fpdf.php';



                $pdf = new FPDF('L', 'mm', 'A2');
                $pdf->setDate($error['month'],$error['year'],'Salary Sheet');
                $pdf->AddPage();



                $pdf->SetFont('times','',32);
                $pdf->Cell(24,60,'SI.',1,0,'C');
                $pdf->Cell(120,60,"Name of",1,0,'C');
                $pdf->Cell(55,60,'ID No.',1,0,'C');
                $pdf->Cell(38,60,'Desig-',1,0,'C');
                $pdf->Cell(62,60,'Joining',1,0,'C');
                $pdf->Cell(35,60,'Grade',1,0,'C');
                $pdf->Cell(40,60,'Basic',1,0,'C');
                $pdf->Cell(45,60,'House',1,0,'C');
                $pdf->Cell(45,60,'Medical',1,0,'C');
                $pdf->Cell(45,60,'Conve-',1,0,'C');
                $pdf->Cell(35,60,'CPF',1,0,'C');
                $pdf->Cell(48,60,'GIA+BF',1,0,'C');
                $pdf->Cell(40,60,'Bonus',1,0,'C');
                $pdf->Cell(40,60,'Aya',1,0,'C');
                $pdf->Cell(40,60,'Credit',1,0,'C');
                $pdf->Cell(40,60,'Load',1,0,'C');
                $pdf->Cell(44,60,"City/Hill",1,0,'C');
                $pdf->Cell(40,60,'Risk',1,0,'C');
                $pdf->Cell(60,60,'Distance',1,0,'C');
                $pdf->Cell(65,60,'Arrear/Other',1,0,'C');
                $pdf->Cell(54,60,'Total',1,0,'C');
                $pdf->Cell(52,60,'Total',1,0,'C');
                $pdf->Cell(50,60,'Net',1,0,'C');
                $pdf->Cell(60,60,'Oath',1,0,'C');

                $pdf->Ln(30);


                $pdf->Cell(24,28,'No',0,0,'C');
                $pdf->Cell(120,28,"Employees",0,0,'C');
                $pdf->Cell(55,28,'',0,0,'C');
                $pdf->Cell(38,28,'nation',0,0,'C');
                $pdf->Cell(62,28,'Date',0,0,'C');
                $pdf->Cell(35,28,'',0,0,'C');
                $pdf->Cell(40,28,'',0,0,'C');
                $pdf->Cell(45,28,'Rent',0,0,'C');
                $pdf->Cell(45,28,'',0,0,'C');
                $pdf->Cell(45,28,'yance',0,0,'C');
                $pdf->Cell(35,28,'',0,0,'C');
                $pdf->Cell(48,28,'1+1=2%',0,0,'C');
                $pdf->Cell(40,28,'',0,0,'C');
                $pdf->Cell(40,28,'Allow',0,0,'C');
                $pdf->Cell(40,28,'Allow',0,0,'C');
                $pdf->Cell(40,28,' Allow',0,0,'C');
                $pdf->Cell(44,28,"Allow",0,0,'C');
                $pdf->Cell(40,28,'Allow',0,0,'C');
                $pdf->Cell(60,28,'Allow',0,0,'C');
                $pdf->Cell(65,28,'Allow',0,0,'C');
                $pdf->Cell(54,28,'Salary',0,0,'C');
                $pdf->Cell(52,28,'Deduction',0,0,'C');
                $pdf->Cell(50,28,'Pay',0,0,'C');
                $pdf->Cell(60,28,'Signature',0,0,'C');

                $pdf->Ln(30);



                /*		    $pdf->Cell(30,7,'Gross Total',1,0,'C');
                            $pdf->Cell(40,7,'Ded CPF TMSS',1,0,'C');
                            $pdf->Cell(40,7,'Ded CPF Own',1,0,'C');
                            $pdf->Cell(40,7,'Ded CPF Total',1,0,'C');
                            $pdf->Cell(40,7,'Ded GIA TMSS',1,0,'C');
                            $pdf->Cell(40,7,'Ded GIA Own',1,0,'C');
                            $pdf->Cell(40,7,'Ded GIA Total',1,0,'C');
                            $pdf->Cell(36,7,'Ded BF TMSS',1,0,'C');
                            $pdf->Cell(36,7,'Ded BF Own',1,0,'C');
                            $pdf->Cell(36,7,'Ded BF Total',1,0,'C');
                            $pdf->Cell(32,7,'Ded Total',1,0,'C');
                            $pdf->Cell(36,7,'Net pay',1,0,'C');*/

                foreach ($data['salary'] as $key => $pay) {
                    $pdf->Cell(24, 50, $key + 1, 1, 0, 'C');
                    $pdf->Cell(120, 50, substr($pay->PBI_NAME,0,18), 1, 0, 'C');
                    $pdf->Cell(55, 50, $pay->PBI_ID, 1, 0, 'C');
                    $pdf->Cell(38, 50, $pay->designation, 1, 0, 'C');
                    $pdf->Cell(62, 50, $pay->PBI_DOJ, 1, 0, 'C');
                    $pdf->Cell(35, 50, $pay->grade, 1, 0, 'C');
                    $pdf->Cell(40, 50, number_format($pay->basic+$pay->basic*$pay->PR_INCREMENT*.05), 1, 0, 'C');
                    $pdf->Cell(45, 50, number_format($pay->hr+$pay->hr*$pay->PR_INCREMENT*.05), 1, 0, 'C');
                    $pdf->Cell(45, 50, number_format($pay->medical+$pay->medical*$pay->PR_INCREMENT*.05), 1, 0, 'C');
                    $pdf->Cell(45, 50, number_format($pay->conveyance+$pay->conveyance*$pay->PR_INCREMENT*.05), 1, 0, 'C');
                    $pdf->Cell(35, 50, number_format($pay->cpf+$pay->cpf*$pay->PR_INCREMENT*.05), 1, 0, 'C');
                    $pdf->Cell(48, 50, number_format($pay->bf+$pay->bf*$pay->PR_INCREMENT*.05+$pay->gia+$pay->gia*$pay->PR_INCREMENT*.05), 1, 0, 'C');
                    $pdf->Cell(40, 50, '0', 1, 0, 'C');
                    $pdf->Cell(40, 50, number_format($pay->aya_allow), 1, 0, 'C');
                    $pdf->Cell(40, 50, number_format($pay->credit_allow), 1, 0, 'C');
                    $pdf->Cell(40, 50, number_format($pay->load_allow), 1, 0, 'C');
                    $pdf->Cell(44, 50, number_format($pay->city_allow), 1, 0, 'C');
                    $pdf->Cell(40, 50, number_format($pay->risk_allow), 1, 0, 'C');
                    $pdf->Cell(60, 50, number_format($pay->distance_allow), 1, 0, 'C');
                    $pdf->Cell(65, 50, number_format($pay->arrear), 1, 0, 'C');

/*                    $GROSS_TOTAL =$pay->net_pay+$pay->city_allow+$pay->aya_allow+$pay->credit_allow
                        +$pay->tech_allow+$pay->load_allow + $pay->risk_allow +$pay->arrear + $pay->ded_total;
                    $GROSS_TOTAL = $GROSS_TOTAL + $GROSS_TOTAL*$pay->PR_INCREMENT*.05;
                    $GROSS_TOTAL = $GROSS_TOTAL + $GROSS_TOTAL*pay->PR_INCREMENT*.05;
                    $TOTAL_DED =$pay->ded_total + $pay->ded_amount + $pay->oc + $pay->PR_TAX + $pay->bima;

                    $TOTAL_AMOUNT= $GROSS_TOTAL-$TOTAL_DED;*/
                    $GROSS_TOTAL =$pay->net_pay+$pay->city_allow+$pay->aya_allow+$pay->credit_allow
                        +$pay->tech_allow+$pay->load_allow + $pay->risk_allow +$pay->arrear + $pay->ded_total;
                    $GROSS_TOTAL = $GROSS_TOTAL + $GROSS_TOTAL*$pay->PR_INCREMENT*.05;

                    $TOTAL_DED =$pay->ded_total + $pay->ded_total*$pay->PR_INCREMENT*.05 +$pay->ded_amount
                        + $pay->oc + $pay->tax + $pay->bima + $pay->savings + $pay->dps;
                    $NET_PAY= $GROSS_TOTAL-$TOTAL_DED;
                    $pdf->Cell(54, 50, number_format($GROSS_TOTAL), 1, 0, 'C');
                    $pdf->Cell(52, 50, number_format($TOTAL_DED), 1, 0, 'C');
                    $pdf->Cell(50, 50, number_format($NET_PAY), 1, 0, 'C');
                    $pdf->Cell(60, 50, ' ', 1, 0, 'C');
                    $pdf->Ln(25);

                    $pdf->Cell(24, 25, '', 0, 0, 'C');
                    $pdf->Cell(120, 25, substr($pay->PBI_NAME,18), 0, 0, 'C');
                    $pdf->Cell(55, 25, '', 0, 0, 'C');
                    $pdf->Cell(38, 25, '', 0, 0, 'C');
                    $pdf->Cell(62, 25, '', 0, 0, 'C');
                    $pdf->Cell(35, 25, '', 0, 0, 'C');
                    $pdf->Cell(40, 25, '', 0, 0, 'C');
                    $pdf->Cell(45, 25, '', 0, 0, 'C');
                    $pdf->Cell(45, 25, '', 0, 0, 'C');
                    $pdf->Cell(45, 25, '', 0, 0, 'C');
                    $pdf->Cell(35, 25, '', 0, 0, 'C');
                    $pdf->Cell(48, 25, '', 0, 0, 'C');
                    $pdf->Cell(40, 25, '', 0, 0, 'C');
                    $pdf->Cell(40, 25, '', 0, 0, 'C');
                    $pdf->Cell(40, 25, '', 0, 0, 'C');
                    $pdf->Cell(40, 25, '', 0, 0, 'C');
                    $pdf->Cell(44, 25, '', 0, 0, 'C');
                    $pdf->Cell(40, 25, '', 0, 0, 'C');
                    $pdf->Cell(60, 25, '', 0, 0, 'C');
                    $pdf->Cell(65, 25, '', 0, 0, 'C');
                    $pdf->Cell(54, 25, '', 0, 0, 'C');
                    $pdf->Cell(52, 25, '', 0, 0, 'C');
                    $pdf->Cell(50, 25, '', 0, 0, 'C');
                    $pdf->Cell(60, 25, '', 0, 0, 'C');
                    $pdf->Ln(25);


                    /*            $pdf->Cell(36,30,number_format($pay->gross_total,2),1,0,'C');
                    $pdf->Cell(36,30,number_format($pay->ded_cpf_tmss,2),1,0,'C');
                    $pdf->Cell(36,30,number_format($pay->ded_cpf_self,2),1,0,'C');
                    $pdf->Cell(28,30,number_format($pay->ded_cpf_total,2),1,0,'C');
                    $pdf->Cell(45,30,number_format($pay->ded_gia_tmss,2),1,0,'C');
                    $pdf->Cell(52,30,number_format($pay->ded_gia_self,2),1,0,'C');
                    $pdf->Cell(50,30,number_format($pay->ded_gia_total,2),1,0,'C');
                    $pdf->Cell(56,30,number_format($pay->ded_bf_tmss,2),1,0,'C');
                    $pdf->Cell(46,30,number_format($pay->ded_bf_self,2),1,0,'C');
                    $pdf->Cell(60,30,number_format($pay->ded_bf_total,2),1,0,'C');*/

                }
                //$pdf->Cell(125,5,'Organized By:  '.$pdt->L_name.','. $pdt->F_name." ".$pdt->M_name, 0, 0, 'J');

                $pdf->Ln(5);
                $pdf->Output();//'Salary_sheet:'.date('M - j - Y').'.pdf','D'
            }else{
                $error['salary_sheet'] = 1;
                $this->load->view('errors',$error);
            }

        }else{
             redirect(base_url(''));
        }

	}

	public function deduction_sheet()
	{
		if($this->session->userdata('logged_in'))
		{
            if($data["salary"] = $this->payrolls->get_employee_with_leave()) {

                $error['month'] = $this->input->post('month');
                $error['year'] = $this->input->post('year');
                require APPPATH . 'plugins/fpdf.php';


                $pdf = new FPDF('L', 'mm', 'A2');
                $pdf->setDate($error['month'],$error['year'],'Deduction Sheet');
                $pdf->AddPage();

                $pdf->Ln(30);

                /*$pdf->SetFont('times','',25);
                $pdf->Cell(30,30,'SI. No.',1,0,'C');
                $pdf->Cell(80,30,"Name of Employee",1,0,'C');
                $pdf->Cell(32,30,'ID No.',1,0,'C');
                $pdf->Cell(50,30,'Designation',1,0,'C');
                $pdf->Cell(52,30,'Joining Date',1,0,'C');
                $pdf->Cell(30,30,'Grade',1,0,'C');
                $pdf->Cell(50,30,'Basic',1,0,'C');
                $pdf->Cell(50,30,'House Rent',1,0,'C');
                $pdf->Cell(45,30,'Medical',1,0,'C');
                $pdf->Cell(52,30,'Conveyance',1,0,'C');
                $pdf->Cell(36,30,'CPF',1,0,'C');
                $pdf->Cell(36,30,'GIA',1,0,'C');
                $pdf->Cell(36,30,'BF',1,0,'C');
                $pdf->Cell(28,30,'Bonus',1,0,'C');
                $pdf->Cell(45,30,'Aya Allow',1,0,'C');
                $pdf->Cell(52,30,'Credit Allow',1,0,'C');
                $pdf->Cell(50,30,'Load Allow',1,0,'C');
                $pdf->Cell(56,30,"City/Hill Allow",1,0,'C');
                $pdf->Cell(46,30,'Risk Allow',1,0,'C');
                $pdf->Cell(60,30,'Distance Allow',1,0,'C');
                $pdf->Cell(74,30,'Arrear/Other Allow',1,0,'C');
                $pdf->Cell(54,30,'Total Salary',1,0,'C');
                $pdf->Cell(64,30,'Total Deduction',1,0,'C');
                $pdf->Cell(50,30,'Net Pay',1,0,'C');
                $pdf->Cell(62,30,'Oath Signature',1,0,'C');

                $pdf->Ln(30);*/



                	    $pdf->Cell(30,7,'Gross Total',1,0,'C');
                            $pdf->Cell(40,7,'Ded CPF TMSS',1,0,'C');
                            $pdf->Cell(40,7,'Ded CPF Own',1,0,'C');
                            $pdf->Cell(40,7,'Ded CPF Total',1,0,'C');
                            $pdf->Cell(40,7,'Ded GIA TMSS',1,0,'C');
                            $pdf->Cell(40,7,'Ded GIA Own',1,0,'C');
                            $pdf->Cell(40,7,'Ded GIA Total',1,0,'C');
                            $pdf->Cell(36,7,'Ded BF TMSS',1,0,'C');
                            $pdf->Cell(36,7,'Ded BF Own',1,0,'C');
                            $pdf->Cell(36,7,'Ded BF Total',1,0,'C');
                            $pdf->Cell(32,7,'Ded Total',1,0,'C');
                            $pdf->Cell(36,7,'Net pay',1,0,'C');

                foreach ($data['salary'] as $key => $pay) {
                /*    $pdf->Cell(30, 40, $key + 1, 1, 0, 'C');
                    $pdf->Cell(80, 40, $pay->F_name, 1, 0, 'C');
                    $pdf->Cell(32, 40, $pay->account_id, 1, 0, 'C');
                    $pdf->Cell(50, 40, $pay->designation, 1, 0, 'C');
                    $pdf->Cell(52, 40, $pay->date_applied, 1, 0, 'C');
                    $pdf->Cell(30, 40, $pay->grade, 1, 0, 'C');
                    $pdf->Cell(50, 40, number_format($pay->basic, 2), 1, 0, 'C');
                    $pdf->Cell(50, 40, number_format($pay->hr, 2), 1, 0, 'C');
                    $pdf->Cell(45, 40, number_format($pay->medical, 2), 1, 0, 'C');
                    $pdf->Cell(52, 40, number_format($pay->conveyance, 2), 1, 0, 'C');
                    $pdf->Cell(36, 40, number_format($pay->cpf, 2), 1, 0, 'C');
                    $pdf->Cell(36, 40, number_format($pay->gia, 2), 1, 0, 'C');
                    $pdf->Cell(36, 40, number_format($pay->bf, 2), 1, 0, 'C');
                    $pdf->Cell(28, 40, '0', 1, 0, 'C');
                    $pdf->Cell(45, 40, '0', 1, 0, 'C');
                    $pdf->Cell(52, 40, '0', 1, 0, 'C');
                    $pdf->Cell(50, 40, '0', 1, 0, 'C');
                    $pdf->Cell(56, 40, '0', 1, 0, 'C');
                    $pdf->Cell(46, 40, '0', 1, 0, 'C');
                    $pdf->Cell(60, 40, '0', 1, 0, 'C');
                    $pdf->Cell(74, 40, '0', 1, 0, 'C');
                    $pdf->Cell(54, 40, number_format($pay->gross_total, 2), 1, 0, 'C');
                    $pdf->Cell(64, 40, number_format($pay->ded_total, 2), 1, 0, 'C');
                    $pdf->Cell(50, 40, number_format($pay->net_pay, 2), 1, 0, 'C');
                    $pdf->Cell(62, 40, ' ', 1, 0, 'C');
                */    $pdf->Ln(40);


                    $pdf->Cell(36,30,number_format($pay->gross_total,2),1,0,'C');
                    $pdf->Cell(36,30,number_format($pay->ded_cpf_tmss,2),1,0,'C');
                    $pdf->Cell(36,30,number_format($pay->ded_cpf_self,2),1,0,'C');
                    $pdf->Cell(28,30,number_format($pay->ded_cpf_total,2),1,0,'C');
                    $pdf->Cell(45,30,number_format($pay->ded_gia_tmss,2),1,0,'C');
                    $pdf->Cell(52,30,number_format($pay->ded_gia_self,2),1,0,'C');
                    $pdf->Cell(50,30,number_format($pay->ded_gia_total,2),1,0,'C');
                    $pdf->Cell(56,30,number_format($pay->ded_bf_tmss,2),1,0,'C');
                    $pdf->Cell(46,30,number_format($pay->ded_bf_self,2),1,0,'C');
                    $pdf->Cell(60,30,number_format($pay->ded_bf_total,2),1,0,'C');
                }
                //$pdf->Cell(125,5,'Organized By:  '.$pdt->L_name.','. $pdt->F_name." ".$pdt->M_name, 0, 0, 'J');

                $pdf->Ln(5);
                $pdf->Output();//'Salary_sheet:'.date('M - j - Y').'.pdf','D'
            }else{
                $error['salary_sheet'] = 1;
                $this->load->view('errors',$error);
            }

        }else{
             redirect(base_url(''));
        }

	}

}