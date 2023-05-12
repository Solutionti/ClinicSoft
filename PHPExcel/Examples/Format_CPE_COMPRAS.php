<?php

    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    error_reporting(E_ALL ^ E_NOTICE);

    header("Access-Control-Allow-Origin: *");

    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

    $bodyRequest = file_get_contents("php://input");

    $data = json_decode($bodyRequest, true);

    $nombre_file = $data['nombre_file'];

    $Pag_f_inicio = $data['fecha1'];

    $Pag_f_fin = $data['fecha2'];

    $gastos = $data['gastos'];

    $ingresos_comision = $data['ingresos_comision'];

    $cajas = $data['cajas'];

    $laboratorios = $data['laboratorios'];

    

    require_once '../Classes/PHPExcel/IOFactory.php';

	$objPHPExcel = new PHPExcel();

	$objReader = PHPExcel_IOFactory::createReader('Excel2007');

	$objPHPExcel = $objReader->load('Format_CPE_COMPRAS.xlsx');

	$objWorksheet = $objPHPExcel->getSheetByName('Worksheet1'); 



	

	$objPHPExcel->setActiveSheetIndex(1);

	$objPHPExcel->getActiveSheet()->SetCellValue('F1', ' Registro de COMPRAS');

	$objPHPExcel->getActiveSheet()->SetCellValue('H5', date("d/m/Y", strtotime($Pag_f_inicio)).' - '.date("d/m/Y", strtotime($Pag_f_fin)));

	$idee_user_registrador = 99999999999;

	if($gastos != false){

		$base = 8;
		$base = $base + 1;

		

		$Tot_op_grav = 0;

		$Tot_igv = 0;

		$Tot_monto = 0;

		

		$Global_Tot_op_grav = 0;

		$Global_Tot_igv = 0;

		$Global_Tot_monto = 0;



		for ($i=0; $i < sizeof($gastos); $i++) {

			$base = $base + 1;

			if($idee_user_registrador!=$gastos[$i]['codigo_usuario_sys']){

				if($idee_user_registrador!=99999999999){

					/*******TOTALES*/

					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("K3"), 'K'.($base));

					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("L3"), 'L'.($base));

					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("M3"), 'M'.($base));

					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'J'.($base));

					$objPHPExcel->getActiveSheet()->SetCellValue('J'.($base), "Total Gasto Caja : " );

					$objPHPExcel->getActiveSheet()->SetCellValue('K'.($base), $Tot_op_grav );

					$objPHPExcel->getActiveSheet()->SetCellValue('L'.($base), $Tot_igv );

					$objPHPExcel->getActiveSheet()->SetCellValue('M'.($base), $Tot_monto );

					$base = $base + 1;

				}



				/*******Nombre CAJERO*/

				$base = $base + 1;

				$idee_user_registrador = $gastos[$i]['codigo_usuario_sys'];

				$objPHPExcel->getActiveSheet()->mergeCells('H'.($base).':J'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'H'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'I'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'J'.($base));

				$objPHPExcel->getActiveSheet()->SetCellValue('H'.($base), "CAJA : ".$gastos[$i]['user_reg']);

				$i = $i - 1;

				$Tot_op_grav = 0;

				$Tot_igv = 0;

				$Tot_monto = 0;

			}else{

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("A9"), 'A'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B9"), 'B'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C9"), 'C'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("D9"), 'D'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E9"), 'E'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F9"), 'F'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G9"), 'G'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H9"), 'H'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("I9"), 'I'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("J9"), 'J'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("K9"), 'K'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("L9"), 'L'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("M9"), 'M'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("N9"), 'N'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("O9"), 'O'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("P9"), 'P'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("Q9"), 'Q'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("R9"), 'R'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("S9"), 'S'.($base));

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("T9"), 'T'.($base));



				$objPHPExcel->getActiveSheet()->SetCellValue('A'.($base), ($i+1));

				$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), $gastos[$i]['f_emision']);

				$objPHPExcel->getActiveSheet()->SetCellValue('C'.($base), '');

				$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), $gastos[$i]['tipo_cpe']);

				$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $gastos[$i]['serie']);

				$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $gastos[$i]['numero']);



				$objPHPExcel->getActiveSheet()->SetCellValue('H'.($base), $gastos[$i]['tipo_doc']);

				$objPHPExcel->getActiveSheet()->SetCellValue('I'.($base), $gastos[$i]['nro_doc']);

				$objPHPExcel->getActiveSheet()->SetCellValue('J'.($base), $gastos[$i]['razon_social']);



				$objPHPExcel->getActiveSheet()->SetCellValue('K'.($base), ($gastos[$i]['op_grav']*1) );		$Tot_op_grav = $Tot_op_grav + ($gastos[$i]['op_grav']*1); $Global_Tot_op_grav = $Global_Tot_op_grav + ($gastos[$i]['op_grav']*1);

				$objPHPExcel->getActiveSheet()->SetCellValue('L'.($base), ($gastos[$i]['igv']*1) );			$Tot_igv = $Tot_igv + ($gastos[$i]['igv']*1); $Global_Tot_igv = $Global_Tot_igv + ($gastos[$i]['igv']*1);

				$objPHPExcel->getActiveSheet()->SetCellValue('M'.($base), ($gastos[$i]['monto']*1) );		$Tot_monto = $Tot_monto + ($gastos[$i]['monto']*1); $Global_Tot_monto = $Global_Tot_monto + ($gastos[$i]['monto']*1);

			}

		}



		$base = $base + 1;

		/*******TOTALES*/

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("K3"), 'K'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("L3"), 'L'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("M3"), 'M'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'J'.($base));
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.($base), "Total Gasto Caja : " );
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.($base), $Tot_op_grav );
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.($base), $Tot_igv );
		$objPHPExcel->getActiveSheet()->SetCellValue('M'.($base), $Tot_monto );

		$base = $base + 1;

		/*******TOTALES*/
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("K3"), 'K'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("L3"), 'L'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("M3"), 'M'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'J'.($base));
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.($base), "REPORTE TOTAL GASTOS : " );
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.($base), $Global_Tot_op_grav );
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.($base), $Global_Tot_igv );
		$objPHPExcel->getActiveSheet()->SetCellValue('M'.($base), $Global_Tot_monto );

		$base = $base + 1;



	}


	

	$objPHPExcel->setActiveSheetIndex(0);

	$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Reporte de INGRESOS/Comisiones - CLINICA');

	$objPHPExcel->getActiveSheet()->SetCellValue('E5', date("d/m/Y", strtotime($Pag_f_inicio)).' - '.date("d/m/Y", strtotime($Pag_f_fin)));

	$base = 7;

	





	if($cajas != false){

		$base = $base + 1;
		$base = $base + 1;
		$base = $base + 1;

		$objPHPExcel->getActiveSheet()->mergeCells('B'.($base).':G'.($base));

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'B'.($base));

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'C'.($base));

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'D'.($base));

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'E'.($base));

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'F'.($base));

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'G'.($base));

		$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), "  ------------------------- INGRESOS - Atenciones Médicas -------------------------   ");



		$Global_Tot_comison = 0;

		$Global_Tot_ingresos = 0;
		$Global_count_Efectivo=0;
		$Global_count_Credito=0;

		for ($QQ=0; $QQ < sizeof($cajas); $QQ++) {

			$idee_user_Docc = 99999999999;

			if($ingresos_comision != false){

				$Tot_comison = 0;
				$count_Efectivo=0;
				$count_Credito=0;
				$Tot_ingresos = 0;

				$Tot_monto = 0;

				$state_user = true; 

				for ($i=0; $i < sizeof($ingresos_comision); $i++) {
					if($ingresos_comision[$i]['codigo_doctor']!=199){
						if($cajas[$QQ]['usuario'] == $ingresos_comision[$i]['usuario']){

							if($state_user){

								$state_user = false; 

								$base = $base + 1;

								$base = $base + 1;

								$objPHPExcel->getActiveSheet()->mergeCells('B'.($base).':D'.($base));

								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("A8"), 'B'.($base));

								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("A8"), 'C'.($base));

								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("A8"), 'D'.($base));

								$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), "CAJERO : ".$ingresos_comision[$i]['usuario']);

							}



							$base = $base + 1;

							if($idee_user_Docc!=$ingresos_comision[$i]['medico']){

								if($idee_user_Docc!=99999999999){
									/*******TOTALES*/
									$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C2"), 'D'.($base));
									$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
									$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F2"), 'F'.($base));
									$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));
									$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'H'.($base));
									$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Totales --> Comision S/ ".$Tot_comison." " );
									//$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Tot_comison );
									$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $count_Credito);
									$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $count_Efectivo );
									$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $Tot_ingresos );
								}

					

								/*******Nombre CAJERO*/
								$base = $base + 1;
								$base = $base + 1;
								$idee_user_Docc = $ingresos_comision[$i]['medico'];
								$objPHPExcel->getActiveSheet()->mergeCells('B'.($base).':D'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'B'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'C'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
								$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), "Médico : ".$ingresos_comision[$i]['medico']);
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E8"), 'E'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F8"), 'F'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G8"), 'G'.($base));
								$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), "Tarjeta" );
								$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), "Efectivo" );
								$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), "Comision" );


								$i = $i - 1;

								$Tot_comison	= 0;

								$Tot_ingresos	= 0;
								$count_Efectivo=0;
								$count_Credito=0;
							}else{
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("A9"), 'A'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B9"), 'B'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C9"), 'C'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("D9"), 'D'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E9"), 'E'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F9"), 'F'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G9"), 'G'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H9"), 'H'.($base));
								$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("I9"), 'I'.($base));

								$objPHPExcel->getActiveSheet()->SetCellValue('A'.($base), ($i+1));
								$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), $ingresos_comision[$i]['documento']);
								$objPHPExcel->getActiveSheet()->SetCellValue('C'.($base), $ingresos_comision[$i]['nombre']." ".$ingresos_comision[$i]['apellido']);
								$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), $ingresos_comision[$i]['descripcion']);

								if($ingresos_comision[$i]['tipo_deposito']=="Efectivo"){
									$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), "");
									$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $ingresos_comision[$i]['total']);
									$count_Efectivo=$count_Efectivo+($ingresos_comision[$i]['total']);
									$Global_count_Efectivo=$Global_count_Efectivo+($ingresos_comision[$i]['total']);
								}else{
									$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $ingresos_comision[$i]['total']);
									$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), "");
									$count_Credito=$count_Credito+($ingresos_comision[$i]['total']);
									$Global_count_Credito=$Global_count_Credito+($ingresos_comision[$i]['total']);
								}
								
								$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $ingresos_comision[$i]['comision']);
								$Tot_comison = $Tot_comison + $ingresos_comision[$i]['comision'];
								$Global_Tot_comison = $Global_Tot_comison + $ingresos_comision[$i]['comision'];

							}

						}
					}
				}

				$base = $base + 1;
				/*******TOTALES*/
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C2"), 'D'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F2"), 'F'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Totales --> Comision S/ ".$Tot_comison." " );
				//$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Tot_comison );
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $count_Efectivo );
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $count_Credito );
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $Tot_comison );
			}else{

				

			}

			$base = $base + 1;



		}

		$base = $base + 1;

		/*******TOTALES*/

		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F2"), 'F'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));

		$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "TOTAL Ingresos MEDICOS  : " );

		$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Global_count_Credito );
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $Global_count_Efectivo);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $Global_Tot_ingresos );

		$base = $base + 1;

		/*******TOTALES*/

		$base = $base + 1;

		$base = $base + 1;

		$base = $base + 1;

	}




	/*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO********/

	$Lab_Tot_ingresos = 0;

	$Global_Lab_Tot_ingresos = 0;

	$Global_count_Efe_LAB=0;
	$Global_count_Cre_LAB=0;

	$count_Efectivo=0;
	$count_Credito=0;

	$base = $base + 1;



	if($laboratorios != false){

		$base = $base + 1;
		$base = $base + 1;

		$objPHPExcel->getActiveSheet()->mergeCells('B'.($base).':G'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'B'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'C'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'D'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'E'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'F'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B8"), 'G'.($base));
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), "  ------------------------- INGRESOS - Laboratorio  -------------------------  ");

		$user_reg = "ussserr";

		for ($i=0; $i < sizeof($laboratorios); $i++) {

			$base = $base + 1;

			if($user_reg!=$laboratorios[$i]['usuario']){

				if($user_reg!="ussserr"){

					/*******TOTALES*/
					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C2"), 'D'.($base));
					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F2"), 'F'.($base));
					$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));
					$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Totales : " );
					$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $count_Credito );
					$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $count_Efectivo );
					$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $Lab_Tot_ingresos );
					$base = $base + 1;
				}

				/*******Nombre CAJERO*/

				$base = $base + 1;
				$user_reg = $laboratorios[$i]['usuario'];
				$objPHPExcel->getActiveSheet()->mergeCells('B'.($base).':D'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'B'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'C'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), "Cajero : ".$laboratorios[$i]['usuario']);
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E8"), 'E'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F8"), 'F'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G8"), 'G'.($base));
				$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), "Tarjeta" );
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), "Efectivo" );
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), "INGRESOS" );

				$i = $i - 1;

				$Lab_Tot_ingresos	= 0;
				$count_Efectivo=0;
				$count_Credito=0;

			}else{

				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("A9"), 'A'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B9"), 'B'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C9"), 'C'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("D9"), 'D'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E9"), 'E'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F9"), 'F'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G9"), 'G'.($base));
				$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H9"), 'H'.($base));

				$objPHPExcel->getActiveSheet()->SetCellValue('A'.($base), ($i+1));
				$objPHPExcel->getActiveSheet()->SetCellValue('B'.($base), $laboratorios[$i]['documento']);
				$objPHPExcel->getActiveSheet()->SetCellValue('C'.($base), $laboratorios[$i]['apellido']." ".$laboratorios[$i]['nombre']);
				$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), $laboratorios[$i]['descripcion']);

				
				if($laboratorios[$i]['tipo_deposito']=="Efectivo"){
					$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), "");
					$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $laboratorios[$i]['precio']);
					$count_Efectivo=$count_Efectivo+($laboratorios[$i]['precio']);
					$Global_count_Efe_LAB=$Global_count_Efe_LAB+($laboratorios[$i]['precio']);
				}else{
					$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $laboratorios[$i]['precio']);
					$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), "");
					$count_Credito=$count_Credito+($laboratorios[$i]['precio']);
					$Global_count_Cre_LAB=$Global_count_Cre_LAB+($laboratorios[$i]['precio']);
				}
				//$Tot_comison = $Tot_comison + $laboratorios[$i]['total'];$Global_Tot_comison = $Global_Tot_comison + $laboratorios[$i]['total'];
				$Lab_Tot_ingresos = $Lab_Tot_ingresos + $laboratorios[$i]['precio'];$Global_Lab_Tot_ingresos = $Global_Lab_Tot_ingresos + $laboratorios[$i]['precio'];
				//$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $laboratorios[$i]['total']);
				//$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $laboratorios[$i]['precio']);
				$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $laboratorios[$i]['precio']);

			}

		}

		$base = $base + 1;
		/*******TOTALES*/
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("C2"), 'D'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F2"), 'F'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Totales : " );
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $count_Credito );
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $count_Efectivo);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $Lab_Tot_ingresos );

		$base = $base + 1;
		/*******TOTALES*/
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F2"), 'F'.($base));
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "TOTAL Ingresos LABORATORIO  : " );
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Global_count_Cre_LAB );
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.($base), $Global_count_Efe_LAB);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.($base), $Global_Lab_Tot_ingresos );
	}

	/*******TOTALES*/

	/*******TOTALES*/

	/*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO********/
	/*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO*******LABORATORIO********/

	$base = $base + 1;
	$base = $base + 1;
	$base = $base + 1;
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'E'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'F'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'G'.($base));
	//$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E2"), 'E'.($base));
	//$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'F'.($base));
	//$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G2"), 'G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Total EFECTIVO :" );
	$objPHPExcel->getActiveSheet()->mergeCells('E'.($base).':G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Global_count_Efe_LAB + $Global_count_Efectivo );

	$base = $base + 1;
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'E'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'F'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Total TARJETA :" );
	$objPHPExcel->getActiveSheet()->mergeCells('E'.($base).':G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Global_count_Cre_LAB + $Global_count_Credito );

	$base = $base + 1;
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'E'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'F'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Total COMISION :" );
	$objPHPExcel->getActiveSheet()->mergeCells('E'.($base).':G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Global_Tot_comison );
	
	$base = $base + 1;
	$base = $base + 1;
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'E'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'F'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'G'.($base));
	$valor__ = ($Global_count_Efe_LAB + $Global_count_Efectivo)-($Global_Tot_comison);
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Total CAJA :" );
	$objPHPExcel->getActiveSheet()->mergeCells('E'.($base).':G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $valor__);
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.($base), "(-)" );

	$base = $base + 1;
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("B2"), 'D'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'E'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'F'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Total GASTOS :" );
	$objPHPExcel->getActiveSheet()->mergeCells('E'.($base).':G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $Global_Tot_monto );

	$base = $base + 1;
	$valor__ = $valor__-$Global_Tot_monto;
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("E8"), 'D'.($base));
	$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("F7"), 'E'.($base));
	if($valor__==0){
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("H2"), 'E'.($base));
	}else if($valor__<0){
		$objPHPExcel->getActiveSheet()->duplicateStyle($objPHPExcel->getActiveSheet()->getStyle("G7"), 'E'.($base));
	}

	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Saldo en CAJA :" );
	$objPHPExcel->getActiveSheet()->mergeCells('E'.($base).':G'.($base));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.($base), $valor__ );

	/*******TOTALES*/
	$base = $base + 1;
	if($valor__==0){
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "CERO INGRESOS " );
	}else if($valor__<0){
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "Los ingresos no cubren la comisión." );
	}
	$base = $base + 1;
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.($base), "" );
    //$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
    //$objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('REPORTES/'.$nombre_file.'.xlsx');