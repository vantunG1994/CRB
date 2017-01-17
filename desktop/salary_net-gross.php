<main>
		<section id="salary_demo">
			<div class="container">		
			<div class="tbl1">
				<div class="row">
					<h2 class="text-center">Tính lương NET sang GROSS và ngược lại</h2>
				</div>
				<div class="row">
				<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="row">
					<form method="post" action="" class="submit-form">
						<div class="form-group">
							<div class="col-md-4">
								<label>Mức lương cần tính:</label>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control txtluong" name="luong" value="" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label for="pwd">Bạn có bao nhiêu người phụ thuộc</label>
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control txtnumber" name="number" >
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<label for="pwd">Vùng</label>
							
								<input type="checkbox" name="vehicle" value="1"> 1
								<input type="checkbox" name="vehicle" value="2"> 2
								<input type="checkbox" name="vehicle" value="3"> 3
								<input type="checkbox" name="vehicle" value="4"> 4

								<a href="#" class="btn btn-default mr-left10px" >Chi Tiết</a>
							</div>
  						</div>
						<div class="form-group">
							<div class="col-md-3 col-md-offset-4 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-default" id = "Net" name="net">NET => GROSS</button>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-default" id = "Gross" name="gross">GROSS => NET</button>
							</div>
						</div>
					</form>
					
					</div>
					<div class="txtText">
						Mức lương tối thiểu vùng <br>
						- Vùng 1: 3,500,000 đồng/tháng <br>
						- Vùng 2: 3,100,000 đồng/tháng <br>
						- Vùng 3: 2,700,000 đồng/tháng <br>
						- Vùng 4: 2,400,000 đồng/tháng <br>
						Danh sách khu vực tỉnh thành:<br>
						- Vùng 1: Hà Nội, Quảng Ninh, Đà Nẵng, Tp.HCM, Bình Dương, Đồng Nai, Vũng Tàu. <br>
						- Vùng 2: Hải Phòng, Vĩnh Phúc, Thái Nguyên, Khánh Hoà, Bình Phước, Tây Ninh, Long An, An Giang, Cần Thơ, Cà Mau. <br>
						- Vùng 3: Hà Tây, Bắc Ninh, Hải Dương, Hưng Yên, Huế, Bình Định, Gia Lai, Đắc Lắc, Lâm Đồng, Ninh Thuận, Bình Thuận, ĐồngTháp, Tiền Giang, Vĩnh Long, <br>
							Bến Tre, Kiên Giang, Hậu Giang, Sóc Trăng, Bạc Liêu. <br>
						- Vùng 4: là các tỉnh còn lại.<br>
					</div>

					</div>	
				</div>
				
				</div> <!-- tbl1 -->
		<?php
		
			if(isset($_POST['net'])){
					$txtluong = $_POST['luong']; 
					$txtnumber = $_POST['number'];

					if($txtluong > 24200000){
						$bhxh_nv = 24200000 * 0.08;
						$bhtn_nv = $txtluong * 0.01;
						$bhyt_nv = 24200000 * 0.015;
						$total_bhnv = $bhtn_nv + $bhyt_nv + $bhxh_nv;

						$bhxh_ct = 24200000 * 0.18;
						$bhtn_ct = $txtluong * 0.01;
						$bhyt_ct = 24200000 * 0.03;
						$total_bhct = $bhtn_ct + $bhyt_ct + $bhxh_ct;

					} else {
						$bhxh_nv = $txtluong * 0.08;
						$bhtn_nv = $txtluong * 0.01;
						$bhyt_nv = $txtluong * 0.015;
						$total_bhnv = $bhtn_nv + $bhyt_nv + $bhxh_nv;

						$bhxh_ct = $txtluong * 0.18;
						$bhtn_ct = $txtluong * 0.01;
						$bhyt_ct = $txtluong * 0.03;
						$total_bhct = $bhtn_ct + $bhyt_ct + $bhxh_ct;

					}
					
					if($txtnumber > 0 && $txtnumber != null) {
						$total_npt = 3600000 * $txtnumber;
							
						} else {
							$total_npt = 0;
						}

						 $tong_tnchiuthue = $txtluong - (9000000 + $total_npt);
						
						 
						if($tong_tnchiuthue <= 4750000){
							$tong_thunhapchiuthue = $tong_tnchiuthue / 0.95;
						}else {
							if($tong_tnchiuthue > 4750000 && $tong_tnchiuthue <= 9250000){
								
								$tong_thunhapchiuthue = ($tong_tnchiuthue - 250000) / 0.9;
								
							}
							if($tong_tnchiuthue > 9250000 && $tong_tnchiuthue <= 16050000){
								
								$tong_thunhapchiuthue = ($tong_tnchiuthue - 750000) / 0.85;
							}
							if($tong_tnchiuthue > 16050000 && $tong_tnchiuthue <= 27250000){
								$tong_thunhapchiuthue = ($tong_tnchiuthue - 1650000) / 0.8;
							}
							if($tong_tnchiuthue > 27250000 && $tong_tnchiuthue <= 42250000){
								$tong_thunhapchiuthue = ($tong_tnchiuthue - 3250000) / 0.75;
							}
							if($tong_tnchiuthue > 42250000 && $tong_tnchiuthue <= 61850000){
								$tong_thunhapchiuthue = ($tong_tnchiuthue - 5850000) / 0.7;
							}
							if($tong_tnchiuthue > 61850000){
								$tong_thunhapchiuthue = ($tong_tnchiuthue - 9850000) / 0.65;
							}
						} //thu nhap chiu thue

							$total_TNCN = 0;
					 if($tong_thunhapchiuthue <= 5000000) {
					 	
					 	$tienthue_TNCN1 = $tong_thunhapchiuthue * 0.05;
					 		 	
					 	$total_TNCN = $total_TNCN + $tienthue_TNCN1;
					 	
	
					 }
					 else {
					 	if($tong_thunhapchiuthue  > 5000000 && $tong_thunhapchiuthue <= 10000000) {
					 		$a = $tong_thunhapchiuthue - 5000000;
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = $a * 0.1;
					 		$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2;
					 		
					 	}
					 	if($tong_thunhapchiuthue  > 10000000 && $tong_thunhapchiuthue <= 18000000) {
					 		$a = $tong_thunhapchiuthue - 10000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 =  $a* 0.15;
					 			$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3;

					 		
					 	}
					 	if($tong_thunhapchiuthue  > 18000000 && $tong_thunhapchiuthue <= 32000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 18000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 =  $a* 0.2;
					 		$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4;


					 		
					 	}
					 	if($tong_thunhapchiuthue  > 32000000 && $tong_thunhapchiuthue <= 52000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 32000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 = 14000000 * 0.2;
					 		$tienthue_TNCN5 =  $a* 0.25;
					 		$total_TNCN = ($tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4 + $tienthue_TNCN5);

					 		
					 	}
					 	if($tong_thunhapchiuthue  > 52000000 && $tong_thunhapchiuthue <= 80000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 52000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 = 14000000 * 0.2;
					 		$tienthue_TNCN5 = 20000000 * 0.25;
					 		$tienthue_TNCN6 = $a * 0.3;
					 		$total_TNCN = ($tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4 + $tienthue_TNCN5 + $tienthue_TNCN6);				 		
					 	}
					 	if($tong_thunhapchiuthue  > 80000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 80000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 = 14000000 * 0.2;
					 		$tienthue_TNCN5 = 20000000 * 0.25;
					 		$tienthue_TNCN6 = 28000000 * 0.3;
					 		$tienthue_TNCN7 = $a * 0.35;
					 		$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4 + $tienthue_TNCN5 + $tienthue_TNCN6 + $tienthue_TNCN7;
					 		
					 	}						
					 }
					$tong_thunhaptruocthue = $txtluong + $total_TNCN;
					
					 $tong_luonggross = $txtluong + $total_TNCN + $total_bhnv; 
					 $tong_chiphitienluong = $tong_luonggross + $total_bhct;

						 
						
						
					


					// $tntthue =	$txtluong;
					// $tong_thunhaptruocthue = $tntthue + $total_bhnv;

					//  $tong_tnchiuthue = 9000000 + $total_npt;
					//  if($tong_thunhaptruocthue > $tong_tnchiuthue){
					//  	$tong_thunhapchiuthue = $tong_thunhaptruocthue - $tong_tnchiuthue;
					//  }else {
					//  	$tong_thunhapchiuthue = 0;
					//  }


			}


			if(isset($_POST['gross'])) {

					$txtluong = $_POST['luong']; 
					$txtnumber = $_POST['number'];
					if($txtluong > 24200000){
						$bhxh_nv = 24200000 * 0.08;
						$bhtn_nv = $txtluong * 0.01;
						$bhyt_nv = 24200000 * 0.015;
						$total_bhnv = $bhtn_nv + $bhyt_nv + $bhxh_nv;

						$bhxh_ct = 24200000 * 0.18;
						$bhtn_ct = $txtluong * 0.01;
						$bhyt_ct = 24200000 * 0.03;
						$total_bhct = $bhtn_ct + $bhyt_ct + $bhxh_ct;

					} else {
						$bhxh_nv = $txtluong * 0.08;
						$bhtn_nv = $txtluong * 0.01;
						$bhyt_nv = $txtluong * 0.015;
						$total_bhnv = $bhtn_nv + $bhyt_nv + $bhxh_nv;

						$bhxh_ct = $txtluong * 0.18;
						$bhtn_ct = $txtluong * 0.01;
						$bhyt_ct = $txtluong * 0.03;
						$total_bhct = $bhtn_ct + $bhyt_ct + $bhxh_ct;

					}
					
					
					if($txtnumber > 0 && $txtnumber != null) {
						$total_npt = 3600000 * $txtnumber;
							
						} else {
							$total_npt = 0;
						}

						
					$tntthue =	$txtluong;
					$tong_thunhaptruocthue = $tntthue -$total_bhnv;

					 $tong_tnchiuthue = 9000000 + $total_npt;
					 if($tong_thunhaptruocthue > $tong_tnchiuthue){
					 	$tong_thunhapchiuthue = $tong_thunhaptruocthue - $tong_tnchiuthue;
					 }else {
					 	$tong_thunhapchiuthue = 0;
					 }	
						$total_TNCN = 0;
					 if($tong_thunhapchiuthue <= 5000000) {
					 	$tienthue_TNCN1 = $tong_thunhapchiuthue * 0.05;
					 	$total_TNCN += $tienthue_TNCN1;
	
					 }
					 else {
					 	if($tong_thunhapchiuthue  > 5000000 && $tong_thunhapchiuthue <= 10000000) {
					 		$a = $tong_thunhapchiuthue - 5000000;
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = $a * 0.1;
					 		$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2;
					 		
					 	}
					 	if($tong_thunhapchiuthue  > 10000000 && $tong_thunhapchiuthue <= 18000000) {
					 		$a = $tong_thunhapchiuthue - 10000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 =  $a* 0.15;
					 			$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3;

					 		
					 	}
					 	if($tong_thunhapchiuthue  > 18000000 && $tong_thunhapchiuthue <= 32000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 18000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 =  $a* 0.2;
					 		$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4;


					 		
					 	}
					 	if($tong_thunhapchiuthue  > 32000000 && $tong_thunhapchiuthue <= 52000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 32000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 = 14000000 * 0.2;
					 		$tienthue_TNCN5 =  $a* 0.25;
					 		$total_TNCN = ($tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4 + $tienthue_TNCN5);

					 		
					 	}
					 	if($tong_thunhapchiuthue  > 52000000 && $tong_thunhapchiuthue <= 80000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 52000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 = 14000000 * 0.2;
					 		$tienthue_TNCN5 = 20000000 * 0.25;
					 		$tienthue_TNCN6 = $a * 0.3;
					 		$total_TNCN = ($tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4 + $tienthue_TNCN5 + $tienthue_TNCN6);				 		
					 	}
					 	if($tong_thunhapchiuthue  > 80000000) {
					 		
					 		$a = $tong_thunhapchiuthue - 80000000;
					 	
					 		$tienthue_TNCN1 = 5000000 * 0.05;
					 		$tienthue_TNCN2 = 5000000 * 0.1;
					 		$tienthue_TNCN3 = 8000000 * 0.15;
					 		$tienthue_TNCN4 = 14000000 * 0.2;
					 		$tienthue_TNCN5 = 20000000 * 0.25;
					 		$tienthue_TNCN6 = 28000000 * 0.3;
					 		$tienthue_TNCN7 = $a * 0.35;
					 		$total_TNCN = $tienthue_TNCN1 + $tienthue_TNCN2 + $tienthue_TNCN3 + $tienthue_TNCN4 + $tienthue_TNCN5 + $tienthue_TNCN6 + $tienthue_TNCN7;
					 		
					 	}						
					 }
					$tong_chiphitienluong = $txtluong + $total_bhct;
					 $tong_luongnet = $txtluong - $total_TNCN - $total_bhnv; 
					 
				}	?>
				

				<div class="tbl3">
					<div class ="row">
						<div class="col-md-8 col-md-offset-2 col-xs-12">
							<h3>Diễn giải chi tiết (VND) </h3>
					
							<table class="table">
								<tbody>
									<tr>
										<td>Lương GROSS </td>
										<td><?php if(isset($_POST['net'])){
											echo isset($tong_luonggross)? number_format($tong_luonggross) : 0; 
										}else {
											echo isset($txtluong)?number_format($txtluong): 0; 
											}?>
												
										</td>
									</tr>
									<tr>
										<td>Lương NET</td>
										<td><?php
											if(isset($_POST['net'])){
												echo isset($txtluong)?number_format($txtluong):0;
											} else {
												echo isset($tong_luongnet)?number_format($tong_luongnet):0;
											}?>
										</td>
									</tr>
									<tr>
										<td>Tổng chi phí tiền lương</td>
										<td><?php echo isset($tong_chiphitienluong)?number_format($tong_chiphitienluong):0;?></td>
									</tr>
									<tr>
										<td>Bảo hiểm xã hội (8%)</td>
										<td><?php echo isset($bhxh_nv)? number_format($bhxh_nv):'0';?></td>
									</tr>
									<tr>
										<td>Bảo hiểm y tế (1.5%)</td>
										<td><?php echo isset($bhyt_nv)? number_format($bhyt_nv):'0';?></td>
									</tr>
									<tr>
										<td>Bảo hiểm thất nghiệp (1%)</td>
										<td><?php echo isset($bhtn_nv)? number_format($bhtn_nv):'0';?></td>
									</tr>
									<tr>
										<td>Tổng Cộng</td>
										<td><?php echo isset($total_bhnv)? number_format($total_bhnv):'0';?></td>
									</tr>
									<tr>
										<td>Giảm trừ gia cảnh bản thân</td>
										<td>9,000,000</td>
									</tr>
									<tr>
										<td>Giảm trừ người phụ thuộc</td>
										<td><?php echo isset($total_npt)? $total_npt :0 ?></td>
									</tr>
									<tr>
										<td>Thu nhập trước thuế</td>
										<td><?php echo isset($tong_thunhaptruocthue)? number_format($tong_thunhaptruocthue):0; ?></td>
									</tr>
									<tr>
										<td>Thu nhập chịu thuế</td>
										<td><?php echo isset($tong_thunhapchiuthue)? number_format($tong_thunhapchiuthue):0; ?></td>
									</tr>
									<tr>
										<td>Thuế thu nhập cá nhân phải đóng (*)</td>
										<td><?php echo isset($total_TNCN)?number_format($total_TNCN)." VNĐ":0; ?></td>
									</tr>
								</tbody>
							</table>
							<h3>Diễn giải chi tiết tiền thu nhập cá nhân (VND) </h3>
							<table class="table">
								<tbody>
									<tr>
										<td>Phần thu nhập chịu thuế</td>
										<td>Thuế suất</td>
										<td>Tiền nộp</td>
									</tr>
									<tr>
										<td>Đến 5 triệu VND</td>
										<td>5%</td>
										<td><?php echo isset($tienthue_TNCN1)? number_format($tienthue_TNCN1):0; ?></td>
									</tr>
									<tr>
										<td>Trên 5 triệu VND đến 10 triệu VND</td>
										<td>10%</td>
										<td><?php echo isset($tienthue_TNCN2)? number_format($tienthue_TNCN2):0; ?></td>
									</tr>
									<tr>
										<td>Trên 10 triệu VND đến 18 triệu VND</td>
										<td>15%</td>
										<td><?php echo isset($tienthue_TNCN3)? number_format($tienthue_TNCN3):0; ?></td>
									</tr>
									<tr>
										<td>Trên 18 triệu VND đến 32 triệu VND</td>
										<td>20%</td>
										<td><?php echo isset($tienthue_TNCN4)? number_format($tienthue_TNCN4):0; ?></td>
									</tr>
									<tr>
										<td>Trên 32 triệu VND đến 52 triệu VND</td>
										<td>25%</td>
										<td><?php echo isset($tienthue_TNCN5)? number_format($tienthue_TNCN5):0; ?></td>
									</tr>
									<tr>
										<td>Trên 32 triệu VND đến 52 triệu VND</td>
										<td>30%</td>
										<td><?php echo isset($tienthue_TNCN6)? number_format($tienthue_TNCN6):0; ?></td>
									</tr>
									<tr>
										<td>Trên 80 triệu VND</td>
										<td>35%</td>
										<td><?php echo isset($tienthue_TNCN7)? number_format($tienthue_TNCN7):0; ?></td>
									</tr>
									<tr>
										<td>Tổng tiền thuế TNCN</td>
										<td></td>
										<td><?php echo isset($total_TNCN)?number_format($total_TNCN)." VNĐ":0; ?></td>
									</tr>
								</tbody>
							</table>
							<h3>Người sử dụng lao động đóng</h3>
							<table class="table">
								<tr>
									<td>Lương GROSS</td>
									<td><?php if(isset($_POST['net'])){
											echo isset($tong_luonggross)? number_format($tong_luonggross) : 0; 
										}else {
											echo isset($txtluong)?number_format($txtluong): 0; 
											}?></td>
								</tr>
								<tr>
									<td>Bảo hiểm xã hội (18%)</td>
									<td><?php echo isset($bhxh_ct)? number_format($bhxh_ct):0;?></td>
								</tr>
								<tr>
									<td>Bảo hiểm y tế (3%)</td>
									<td><?php echo isset($bhyt_nv)? number_format($bhyt_nv):0;?></td>
								</tr>
								<tr>
									<td>Bảo hiểm thất nghiệp (1%)</td>
									<td><?php echo isset($bhtn_ct)? number_format($bhtn_ct):0;?></td>
								</tr>
								<tr>
									<td>Tổng tiền đóng bảo hiểm</td>
									<td><?php echo isset($total_bhct)? number_format($total_bhct)." VNĐ":0;?></td>
								</tr>
							</table>
							
						</div>
					</div>
				</div><!-- tbl3 -->
				
				
				
			</div>

		</section>
		</main>