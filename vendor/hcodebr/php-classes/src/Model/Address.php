<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\DB\Sqls;
use \Hcode\Model;


class Address extends Model {

	const SESSION_ERROR = "AddressError";

	public static function getCEP($nrcep)
	{

		$nrcep = str_replace("-", "", $nrcep);

		//https://viacep.com.br/ws/01001000/json/

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://viacep.com.br/ws/$nrcep/json/");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$data = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $data;
	}



	public static function getBuscarViagem($nrviagem)
	{
		$login = 'INTEGRACAOTESTE';
		$password = '12345';
		$nrviagem = str_replace("-", "",$nrviagem);

		//https://viacep.com.br/ws/01001000/json/

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://mundialgr.mundialrisk.com.br/ws_rest/public/api/viagem/$nrviagem");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

		$data = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $data;


	}

	public function loadBuscarViagem($nrviagem)
	{

		$data = Address::getBuscarViagem($nrviagem);	
				
		if(empty($data["viagens"]))
    		echo "Viagem não encontrada";

    		else

			foreach($data["viagens"] as $datas) {

			$this->setvloc_descricao_d($datas['destino']['vloc_descricao']);
			$this->setvloc_descricao_o($datas['origem']['vloc_descricao']);
			$this->setnomeTransportador($datas['pess_nome_transportador']);
			$this->setdataInicio($datas['viag_data_cadastro']);
			$this->setCliente($datas["emba_nome"]);
			$this->setviagemId($datas["viagemId"]);
			$this->setNumSM('$nrviagem');
			$this->setviag_valor_carga($datas["viag_valor_carga"]);


			foreach($datas["veiculos"] as $data) {


				$this->setplaca($data["placa"]);
				$this->setmarca($data["marca"]);
				$this->setmodelo($data["modelo"]);
				$this->setcor($data["cor"]);

			}

			foreach($datas["motoristas"] as $data) {


				$this->setnome_moto($data["nome_moto"]);
				$this->setcpf_moto($data["cpf_moto"]);
				$this->setvinculo_contratual($data["vinculo_contratual"]);


			}


			foreach($datas["terminais"] as $data) {


				$this->setvtec_descricao($data["vtec_descricao"]);
				$this->setterm_numero_terminal($data["term_numero_terminal"]);
				$this->setisca($data["isca"]);



			}

				

			}

	}


	public function save()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_veiculos_save(:idveiculo, :idperson, :marca, :modelo, :placa, :cor, :vtec_descricao, :term_numero_terminal, :NumSM)",  array(
		    ':idveiculo'=>$this->getidveiculo(),
		    ':idperson'=>$this->getidperson(),
		    ':marca'=>$this->getmarca(),
		    ':modelo'=>$this->getmodelo(),
		    ':placa'=>$this->getplaca(),
		    ':cor'=>$this->getcor(),
		    ':vtec_descricao'=>$this->getvtec_descricao(),
		    ':term_numero_terminal'=>$this->getterm_numero_terminal(),
		    ':NumSM'=>$this->getNumSM()
		    
	));


if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}


	public static function listGerentes()
	{

	$sqls = new Sqls();

	return $sqls->select("SELECT * FROM tb_gerentes where inativo = 0 order by nomeGerente");

	}


	public static function listSeguradoras()
	{

	$sqls = new Sqls();

	return $sqls->select("SELECT * FROM tb_seguradoras where inativo = 0 order by nomeSeguradora");

	}

	
	public static function listTiposSinistros()
	{

	$sqls = new Sqls();

	return $sqls->select("SELECT * FROM tb_tiposSinistro where inativo = 0 order by nomeSinistro");

	}


	public function loadFromCEP($nrcep)
	{

		$data = Address::getCEP($nrcep);

		if (isset($data['logradouro']) && $data['logradouro']) {

			$this->setdesaddress($data['logradouro']);
			$this->setdescomplement($data['complemento']);
			$this->setdesdistrict($data['bairro']);
			$this->setdescity($data['localidade']);
			$this->setdesstate($data['uf']);
			$this->setdescountry('Brasil');
			$this->setnrzipcode('$nrcep');

		} 		
	}

	/*public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_addresses_save(:idaddress, :idperson, :desaddress, :desnumber, :descomplement, :descity, :desstate, :descountry, :deszipcode, :desdistrict, :desdelivery)", [
		    ':idaddress'=>$this->getidaddress(),
		    ':idperson'=>$this->getidperson(),
		    ':desaddress'=>$this->getdesaddress(),
		    ':desnumber'=>$this->getdesnumber(),
		    ':descomplement'=>$this->getdescomplement(),
		    ':descity'=>$this->getdescity(),
		    ':desstate'=>$this->getdesstate(),
		    ':descountry'=>$this->getdescountry(),
		    ':deszipcode'=>$this->getdeszipcode(),
		    ':desdistrict'=>$this->getdesdistrict(),
		    ':desdelivery'=>$this->getdesdelivery()
	]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}*/

	public static function setMsgError($msg)
	{
		$_SESSION[Address::SESSION_ERROR] = $msg;
	}
	
	public static function getMsgError()
	{
		$msg = (isset($_SESSION[Address::SESSION_ERROR])) ? $_SESSION[Address::SESSION_ERROR] : "";

		Address::clearMsgError();

		return $msg;
	}
	
	public static function clearMsgError()
	{
		$_SESSION[Address::SESSION_ERROR] = NULL;
	}


}

?>