<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Model\Cart;
use \Hcode\Model\Address;


class OrderReport extends Model {

	const SUCCESS = "Order-Success";
	const ERROR = "Order-Error";
	const SESSION = "OrderSession";


 	public static function quantOrders()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_addresses e USING(idaddress)
			INNER JOIN tb_persons f ON f.idperson = d.idperson
			WHERE year(a.dtregister) = '2019';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoJan()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '1';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoFev()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '2';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoMar()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '3';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoAbril()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '4';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoMaio()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '5';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoJun()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '6';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoJul()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '7';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoAgo()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '8';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoSet()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '9';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoOut()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '10';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoNov()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '11';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersPagoDez()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019' and MONTH(dtregister) = '12';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}


	public static function quantOrdersAgPagamento()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 1 AND year(dtregister) = '2019';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
    }


	public static function quantOrdersPago()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 3 AND year(dtregister) = '2019';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}


	public static function quantOrdersCancelados()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 7 AND year(dtregister) = '2019';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}

	public static function quantOrdersEntregue()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders where idstatus = 6 AND year(dtregister) = '2019';");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}


	public static function quantOrdersPgCincoDias()
	{ 
     	$sql = new Sql();
 
     	$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_orders WHERE idstatus = 3 AND dtregister
			BETWEEN CURRENT_DATE()-5 AND CURRENT_DATE() 
			AND now();");

     	if (count($count) > 0) {
         	return $count[0]['nrtotal'];
     	}
	}


	public static function somaVlTotalAgPagamento()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
			SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 1 AND year(b.dtregister) = '2019';
     	");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotalPago()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 3 AND year(b.dtregister) = '2019';
		");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotalCancelados()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 7 AND year(b.dtregister) = '2019';
		");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotalDevolvidos()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 6 AND year(b.dtregister) = '2019';
		");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotal()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("select SUM(vltotal) as valor_total from tb_orders;");

         	return $soma[0]['valor_total'];
     	
	}

	public static function TotalPagoMesJan()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '1' AND year(b.dtregister) = '2019' AND idstatus = 3;"
		);

        return $soma[0]['valor_total'];
     	
	}

	public static function TotalPagoMesFev()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
			SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '2' AND year(b.dtregister) = '2019' AND idstatus = 3;
		");

        return $soma[0]['valor_total'];
     	
	}

	public static function TotalPagoMesMar()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '3' AND year(b.dtregister) = '2019' AND idstatus = 3;
     	");

        return $soma[0]['valor_total'];
     	
	}

	public static function TotalPagoMesAbril()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '4' AND year(b.dtregister) = '2019' AND idstatus = 3;
     	");

        return $soma[0]['valor_total'];
     	
	}

	public static function TotalPagoMesMaio()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
     		SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '5' AND year(b.dtregister) = '2019' AND idstatus = 3;
		");

        return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesJun()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '6' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesJul()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '7' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesAgo()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '8' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesSet()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '9' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesOut()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '10' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesNov()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '11' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}

	public static function TotalPagoMesDez()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE MONTH(b.dtregister) = '12' AND year(b.dtregister) = '2019' AND idstatus = 3;");

         	return $soma[0]['valor_total'];	
	}



	public function listAllOrdersPagos()
	{

		$sql = new Sql();

		
		return $sql->select("
			SELECT * 
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_addresses e USING(idaddress)
			INNER JOIN tb_persons f ON f.idperson = d.idperson
			WHERE b.idstatus = 3
			ORDER BY a.dtregister DESC

		",[

		]);

	}

	public static function getlistAllOrdersPagos($status = 3)
	{

 		$sql = new Sql();

 		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_addresses e USING(idaddress)
			INNER JOIN tb_persons f ON f.idperson = d.idperson
			WHERE b.idstatus = $status
			ORDER BY a.dtregister DESC
		", [

		]);

 		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

 		return [
			'data'=>$results
			
		];
 	}

 	public static function getlistAllOrdersCancelados($status = 7)
	{

 		$sql = new Sql();

 		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_addresses e USING(idaddress)
			INNER JOIN tb_persons f ON f.idperson = d.idperson
			WHERE b.idstatus = $status
			ORDER BY a.dtregister DESC
		", [

		]);

 		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

 		return [
			'data'=>$results
			
		];
 	}


 	public static function getlistAllOrdersAgPagamento($status = 1)
	{

 		$sql = new Sql();

 		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_addresses e USING(idaddress)
			INNER JOIN tb_persons f ON f.idperson = d.idperson
			WHERE b.idstatus = $status
			ORDER BY a.dtregister DESC
		", [

		]);

 		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

 		return [
			'data'=>$results
			
		];
 	}


 	public static function somaVlTotalPago2019()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
			SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 3 AND year(b.dtregister) = '2019';
     	");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotalPago2020()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
			SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 3 AND year(b.dtregister) = '2020';
     	");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotalPago2021()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
			SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 3 AND year(b.dtregister) = '2021';
     	");

        return $soma[0]['valor_total'];
     	
	}

	public static function somaVlTotalPago2022()
	{ 
     	$sql = new Sql();
 
     	$soma = $sql->select("
			SELECT sum(vlnetamount) as valor_total 
			FROM tb_orders a 
			INNER JOIN tb_orderspagseguro b ON a.idorder = b.idorder
			WHERE idstatus = 3 AND year(b.dtregister) = '2022';
     	");

        return $soma[0]['valor_total'];
     	
	}

     	
	
}
	
?>