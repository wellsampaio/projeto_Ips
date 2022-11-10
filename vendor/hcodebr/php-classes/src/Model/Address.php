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
    		Address::setMsgError("Viagem não encontrada");

    		else

			foreach($data["viagens"] as $datas) {

			$this->setvloc_descricao_d($datas['destino']['vloc_descricao']);
			$this->setvloc_descricao_o($datas['origem']['vloc_descricao']);
			$this->setnomeTransportador($datas['pess_nome_transportador']);
			$this->setdataInicio($datas['viag_data_cadastro']);
			$this->setCliente($datas["emba_nome"]);
			$this->setnomeEmbarcador($datas["emba_nome"]);

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

	public function saveIscas()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_iscas_save(:idiscas, :isca, :tec_isca, :iscaPosicionando, :NumSM)",  array(
		    ':idiscas'=>$this->getidiscas(),
		    ':isca'=>$this->getisca(),
		    ':tec_isca'=>$this->gettec_isca(),
		    ':iscaPosicionando'=>$this->getiscaPosicionando(),
		    ':NumSM'=>$this->getNumSM()
		    
	));


		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}




	public static function checkSmExist($NumSM)
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_clientes WHERE NumSM = :NumSM", [
			':NumSM'=>$NumSM
		]);
		return (count($results) > 0);
	}



		public function saveAcionamento()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_acionamentos_save(:idacionamento,:tipo_acionamento,:datah,:nome,:contato,:local,:NumSM)",  array(
		    ':idacionamento'=>$this->getidacionamento(),
		    ':tipo_acionamento'=>$this->gettipo_acionamento(),
		    ':datah'=>$this->getdatah(),
		    ':nome'=>$this->getnome(),
		    ':contato'=>$this->getcontato(),
		    ':local'=>$this->getlocal(),
		    ':NumSM'=>$this->getNumSM()
		    
	));



			if (count($results) > 0) {
			$this->setData($results[0]);
		}

	

	}


	public function saveClientes()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_clientes_save(:idcliente,:Cliente,:nomeEmbarcador,:nomeTransportador, :seguradora, :gerenteResponsavel, :acionar, :telefone,:NumSM)",  array(
		    ':idcliente'=>$this->getidcliente(),
		    ':Cliente'=>$this->getCliente(),
		    ':nomeEmbarcador'=>$this->getnomeEmbarcador(),
		    ':nomeTransportador'=>$this->getnomeTransportador(),
		    ':seguradora'=>$this->getseguradora(),
		    ':gerenteResponsavel'=>$this->getgerenteResponsavel(),
		    ':acionar'=>$this->getacionar(),
		    ':telefone'=>$this->gettelefone(),
		    ':NumSM'=>$this->getNumSM()
		    
	));



			if (count($results) > 0) {
			$this->setData($results[0]);
		}

	

	}


		public function saveMotoristas()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_motoristas_save(:idmotorista,:Motorista,:CPF,:Vinculo,:NumSM)",  array(
		    ':idmotorista'=>$this->getidmotorista(),
		    ':Motorista'=>$this->getMotorista(),
		    ':CPF'=>$this->getCPF(),
		    ':Vinculo'=>$this->getVinculo(),
		    ':NumSM'=>$this->getNumSM()
		    
	));



			if (count($results) > 0) {
			$this->setData($results[0]);
		}

	

	}


	public function saveViagens()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_viagens_save(:idviagem, :viagemId, :dataInicio,:Valor,:cidadeOrigem,:cidadeDestino, :Produtos)",  array(
		    ':idviagem'=>$this->getidviagem(),
		    ':viagemId'=>$this->getviagemId(),
		    ':dataInicio'=>$this->getdataInicio(),
		    ':Valor'=>$this->getValor(),
		    ':cidadeOrigem'=>$this->getcidadeOrigem(),
		    ':cidadeDestino'=>$this->getcidadeDestino(),
		    ':Produtos'=>$this->getProdutos()
	));



			if (count($results) > 0) {
			$this->setData($results[0]);
		}

	

	}

public function saveSinistros()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_sinistros_save(:idsinistro , :dtComunicado, :dtSinistro, :localSinistro, :latitude, :longitude, :Km, :tipoSinistro, :nomeComunicante, :NumSM, :Descritivo )",  array(
		    ':idsinistro'=>$this->getidsinistro(),
		    ':dtComunicado'=>$this->getdtComunicado(),
		    ':dtSinistro'=>$this->getdtSinistro(),
		    ':localSinistro'=>$this->getlocalSinistro(),
		    ':latitude'=>$this->getlatitude(),
		    ':longitude'=>$this->getlongitude(),
		    ':Km'=>$this->getKm(),
		    ':tipoSinistro'=>$this->gettipoSinistro(),
		    ':nomeComunicante'=>$this->getnomeComunicante(),
		    ':NumSM'=>$this->getNumSM(),
		    ':Descritivo'=>$this->getDescritivo()
	));



			if (count($results) > 0) {
			$this->setData($results[0]);
		}

	

	}


	public function saveAlertas()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_alertas_save(:idalerta, :perdaBateria, :dtAlertaBateria, :NumSM, :perdaSinal, :dtPerdaSinal, :btPanico, :dtBtPanico, :portaBauLateral, :dtPortaBauLateral, :desengateCarreta, :dtDesengateCarreta, :portaMotorista, :dtPortaMotorista, :ignicaoDesligada, :dtIgnicaoDesligada, :violacaoGrade, :dtViolacaoGrade, :perdaTerminal, :dtPerdaTerminal, :desvioRota, :dtDesvioRota, :portaBauTraseira, :dtPortaBauTraseira, :arrombamentoBau, :dtArrombamentoBau, :senhaPanico, :dtSenhaPanico, :portaPassageiro, :dtPortaPassageiro, :violacaoPainel, :dtViolacaoPainel)",  array(
		    ':idalerta'=>$this->getidalerta(),
		    ':perdaBateria'=>$this->getperdaBateria(),
		    ':dtAlertaBateria'=>$this->getdtAlertaBateria(),
		    ':NumSM'=>$this->getNumSM(),
		    ':perdaSinal'=>$this->getperdaSinal(),
		    ':dtPerdaSinal'=>$this->getdtPerdaSinal(),
		    ':btPanico'=>$this->getbtPanico(),
		    ':dtBtPanico'=>$this->getdtBtPanico(),
		    ':portaBauLateral'=>$this->getportaBauLateral(),
		    ':dtPortaBauLateral'=>$this->getdtPortaBauLateral(),
		    ':desengateCarreta'=>$this->getdesengateCarreta(),
		    ':dtDesengateCarreta'=>$this->getdtDesengateCarreta(),
		    ':portaMotorista'=>$this->getportaMotorista(),
		    ':dtPortaMotorista'=>$this->getdtPortaMotorista(),
		    ':ignicaoDesligada'=>$this->getignicaoDesligada(),
		    ':dtIgnicaoDesligada'=>$this->getdtIgnicaoDesligada(),
		    ':violacaoGrade'=>$this->getviolacaoGrade(),
		    ':dtViolacaoGrade'=>$this->getdtViolacaoGrade(),
		    ':perdaTerminal'=>$this->getperdaTerminal(),
		    ':dtPerdaTerminal'=>$this->getdtPerdaTerminal(),
		    ':desvioRota'=>$this->getdesvioRota(),
		    ':dtDesvioRota'=>$this->getdtDesvioRota(),
		    ':portaBauTraseira'=>$this->getportaBauTraseira(),
		    ':dtPortaBauTraseira'=>$this->getdtPortaBauTraseira(),
		    ':arrombamentoBau'=>$this->getarrombamentoBau(),
		    ':dtArrombamentoBau'=>$this->getdtArrombamentoBau(),
		    ':senhaPanico'=>$this->getsenhaPanico(),
		    ':dtSenhaPanico'=>$this->getdtSenhaPanico(),
		    ':portaPassageiro'=>$this->getportaPassageiro(),
		    ':dtPortaPassageiro'=>$this->getdtPortaPassageiro(),
		    ':violacaoPainel'=>$this->getviolacaoPainel(),
		    ':dtViolacaoPainel'=>$this->getdtViolacaoPainel()
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