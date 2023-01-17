<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\DB\Sqls;
use \Hcode\Model;


class Address extends Model {

	const SESSION_ERROR = "AddressError";


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

			$results = $sql->select("CALL sp_veiculos_saves(:idveiculo, :idperson, :marca, :modelo, :placa, :cor, :vtec_descricao, :term_numero_terminal, :NumSM)",  array(
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

			$results = $sql->select("CALL sp_iscas_saves(:idiscas, :isca, :tec_isca, :iscaPosicionando, :nIsca, :nTerminal, :nIscaPosicionando, :NumSM)",  array(
		    ':idiscas'=>$this->getidiscas(),
		    ':isca'=>$this->getisca(),
		    ':tec_isca'=>$this->gettec_isca(),
		    ':iscaPosicionando'=>$this->getiscaPosicionando(),
		    ':nIsca'=>$this->getnIsca(),
		    ':nTerminal'=>$this->getnTerminal(),
		    ':nIscaPosicionando'=>$this->getnIscaPosicionando(),
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


			$results = $sql->select("CALL sp_acionamentos_saves(:idacionamento,:tipo_acionamento,:datah,:nome,:contato,:local,:NumSM, :descricao, :acionamento2, :datah2, :nome2, :contato2, :local2, :descricao2, :acionamento3, :datah3, :nome3, :contato3, :local3, :descricao3, :acionamento4, :datah4, :nome4, :contato4, :local4, :descricao4)",  array(
		    ':idacionamento'=>$this->getidacionamento(),
		    ':tipo_acionamento'=>$this->gettipo_acionamento(),
		    ':datah'=>$this->getdatah(),
		    ':nome'=>$this->getnome(),
		    ':contato'=>$this->getcontato(),
		    ':local'=>$this->getlocal(),
		    ':NumSM'=>$this->getNumSM(),
		    ':descricao'=>$this->getdescricao(),
		    ':acionamento2'=>$this->getacionamento2(),
		    ':datah2'=>$this->getdatah2(),
		    ':nome2'=>$this->getnome2(),
		    ':contato2'=>$this->getcontato2(),
		    ':local2'=>$this->getlocal2(),
		    ':descricao2'=>$this->getdescricao2(),
		    ':acionamento3'=>$this->getacionamento3(),
		    ':datah3'=>$this->getdatah3(),
		    ':nome3'=>$this->getnome3(),
		    ':contato3'=>$this->getcontato3(),
		    ':local3'=>$this->getlocal3(),
		    ':descricao3'=>$this->getdescricao3(),
		    ':acionamento4'=>$this->getacionamento4(),
		    ':datah4'=>$this->getdatah4(),
		    ':nome4'=>$this->getnome4(),
		    ':contato4'=>$this->getcontato4(),
		    ':local4'=>$this->getlocal4(),
		    ':descricao4'=>$this->getdescricao4()
		    
	));



	

	}


	public function saveClientes()
	{

		$sql = new Sql();

			$results = $sql->select("CALL sp_clientes_save(:idcliente,:Cliente,:nomeEmbarcador,:nomeTransportador, :seguradora, :gerenteResponsavel, :acionar, :telefone,:NumSM,:Protocolo)",  array(
		    ':idcliente'=>$this->getidcliente(),
		    ':Cliente'=>$this->getCliente(),
		    ':nomeEmbarcador'=>$this->getnomeEmbarcador(),
		    ':nomeTransportador'=>$this->getnomeTransportador(),
		    ':seguradora'=>$this->getseguradora(),
		    ':gerenteResponsavel'=>$this->getgerenteResponsavel(),
		    ':acionar'=>$this->getacionar(),
		    ':telefone'=>$this->gettelefone(),
		    ':NumSM'=>$this->getNumSM(),
		    ':Protocolo'=>$this->getProtocolo()
		    
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

			$results = $sql->select("CALL sp_sinistros_saves(:idsinistro, :dtComunicado, :dtSinistro, :localSinistro, :latitude, :longitude, :Km, :tipoSinistro, :nomeComunicante, :NumSM, :Descritivo)",  array(
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

			$results = $sql->select("CALL sp_alertas_save(:idalerta,:perdaBateria, :dtAlertaBateria, :NumSM, :perdaSinal, :dtPerdaSinal, :btPanico, :dtBtPanico, :portaBauLateral, :dtPortaBauLateral, :desengateCarreta, :dtDesengateCarreta, :portaMotorista, :dtPortaMotorista, :ignicaoDesligada, :dtIgnicaoDesligada, :violacaoGrade, :dtViolacaoGrade, :perdaTerminal, :dtPerdaTerminal, :desvioRota, :dtDesvioRota, :portaBauTraseira, :dtPortaBauTraseira, :arrombamentoBau, :dtArrombamentoBau, :senhaPanico, :dtSenhaPanico, :portaPassageiro, :dtPortaPassageiro, :violacaoPainel, :dtViolacaoPainel)",  array(
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


	


		public function updateIps()
	{

		$sql = new Sql();


		 $sql->query("UPDATE tb_sinistros s
			join tb_acionamentos a on a.NumSM = s.NumSM
			join tb_veiculos v on v.NumSM = a.NumSM
			join tb_persons p on p.idperson = v.idperson
			join tb_viagens vg on vg.viagemId = v.NumSM
			join tb_motoristas m on m.NumSM = vg.viagemId
			join tb_iscas i on i.NumSM = m.NumSM
			join tb_clientes c on c.NumSM = i.NumSM
			join tb_alertas al on al.NumSM = c.NumSM
			join tb_acionamentos ac on ac.NumSM = al.NumSM
			set s.dtComunicado = :dtComunicado, s.dtSinistro = :dtSinistro,  s.localSinistro = :localSinistro, s.latitude = :latitude, s.longitude = :longitude, s.Km = :Km, s.tipoSinistro = :tipoSinistro, s.nomeComunicante = :nomeComunicante, s.Descritivo = :Descritivo, a.tipo_acionamento = :tipo_acionamento, a.datah = :datah, a.nome = :nome, a.contato = :contato, a.local = :local, a.descricao = :descricao, a.acionamento2 = :acionamento2, a.datah2 = :datah2, a.nome2 = :nome2, a.contato2 = :contato2, a.local2 = :local2, a.descricao2 = :descricao2, a.acionamento3 = :acionamento3, a.datah3 = :datah3, a.nome3 = :nome3, a.contato3 = :contato3, a.local3 = :local3, a.descricao3 = :descricao3, a.acionamento4 = :acionamento4, a.datah4 = :datah4, a.nome4 = :nome4, a.contato4 = :contato4, a.local4 = :local4, a.descricao4 = :descricao4, v.marca = :marca, v.modelo = :modelo, v.placa = :placa, v.cor = :cor, v.vtec_descricao = :vtec_descricao, v.term_numero_terminal = :term_numero_terminal, vg.dataInicio = :dataInicio, vg.Valor = :Valor, vg.cidadeOrigem = :cidadeOrigem, vg.cidadeDestino = :cidadeDestino, vg.Produtos = :Produtos, m.Motorista = :Motorista, m.CPF = :CPF, m.Vinculo = :Vinculo, i.isca = :isca, i.tec_isca = :tec_isca, i.iscaPosicionando = :iscaPosicionando, c.nomeEmbarcador =  :nomeEmbarcador, c.nomeTransportador = :nomeTransportador, c.seguradora = :seguradora, c.gerenteResponsavel = :gerenteResponsavel, c.acionar = :acionar, c.telefone = :telefone, c.Protocolo = :Protocolo, al.perdaBateria = :perdaBateria, al.dtAlertaBateria = :dtAlertaBateria, al.perdaSinal = :perdaSinal, al.dtPerdaSinal = :dtPerdaSinal, al.btpanico = :btPanico, al.dtBtPanico = :dtBtPanico, al.portaBauLateral = :portaBauLateral, al.dtPortaBauLateral = :dtPortaBauLateral, al.desengateCarreta = :desengateCarreta, al.dtDesengateCarreta = :dtDesengateCarreta, al.portaMotorista = :portaMotorista, al.dtPortaMotorista = :dtPortaMotorista, al.ignicaoDesligada = :ignicaoDesligada, al.dtIgnicaoDesligada = :dtIgnicaoDesligada, al.violacaoGrade = :violacaoGrade, al.dtViolacaoGrade = :dtViolacaoGrade, al.perdaTerminal = :perdaTerminal, al.dtPerdaTerminal = :dtPerdaTerminal, al.desvioRota = :desvioRota, al.dtDesvioRota = :dtDesvioRota, al.portaBauTraseira = :portaBauTraseira, al.dtPortaBauTraseira = :dtPortaBauTraseira, al.arrombamentoBau = :arrombamentoBau, al.dtArrombamentoBau = :dtArrombamentoBau, al.senhaPanico = :senhaPanico, al.dtSenhaPanico = :dtSenhaPanico, al.portaPassageiro = :portaPassageiro, al.dtPortaPassageiro = :dtPortaPassageiro, al.violacaoPainel = :violacaoPainel, al.dtViolacaoPainel = :dtViolacaoPainel where s.NumSM = :NumSM", [
				':dtComunicado'=>$this->getdtComunicado(),
			    ':dtSinistro'=>$this->getdtSinistro(),
			    ':localSinistro'=>$this->getlocalSinistro(),
			    ':latitude'=>$this->getlatitude(),
			    ':longitude'=>$this->getlongitude(),
			    ':Km'=>$this->getKm(),
			    ':tipoSinistro'=>$this->gettipoSinistro(),
			    ':nomeComunicante'=>$this->getnomeComunicante(),
			    ':Descritivo'=>$this->getDescritivo(),
			    ':tipo_acionamento'=>$this->gettipo_acionamento(),
			    ':datah'=>$this->getdatah(),
			    ':nome'=>$this->getnome(),
			    ':contato'=>$this->getcontato(),
			    ':local'=>$this->getlocal(),
			    ':descricao'=>$this->getdescricao(),
		    	':acionamento2'=>$this->getacionamento2(),
		    	':datah2'=>$this->getdatah2(),
		    	':nome2'=>$this->getnome2(),
		    	':contato2'=>$this->getcontato2(),
		    	':local2'=>$this->getlocal2(),
		    	':descricao2'=>$this->getdescricao2(),
		    	':acionamento3'=>$this->getacionamento3(),
		    	':datah3'=>$this->getdatah3(),
		    	':nome3'=>$this->getnome3(),
		    	':contato3'=>$this->getcontato3(),
		    	':local3'=>$this->getlocal3(),
		    	':descricao3'=>$this->getdescricao3(),
		    	':acionamento4'=>$this->getacionamento4(),
		    	':datah4'=>$this->getdatah4(),
		    	':nome4'=>$this->getnome4(),
		    	':contato4'=>$this->getcontato4(),
		    	':local4'=>$this->getlocal4(),
		    	':descricao4'=>$this->getdescricao4(),		
			    ':marca'=>$this->getmarca(),
			    ':modelo'=>$this->getmodelo(),
			    ':placa'=>$this->getplaca(),
			    ':cor'=>$this->getcor(),
			    ':vtec_descricao'=>$this->getvtec_descricao(),
			    ':term_numero_terminal'=>$this->getterm_numero_terminal(),
			    ':dataInicio'=>$this->getdataInicio(),
		    	':Valor'=>$this->getValor(),
		    	':cidadeOrigem'=>$this->getcidadeOrigem(),
		    	':cidadeDestino'=>$this->getcidadeDestino(),
		    	':Produtos'=>$this->getProdutos(),
		    	':Motorista'=>$this->getMotorista(),
		   		':CPF'=>$this->getCPF(),
		    	':Vinculo'=>$this->getVinculo(),
		    	':isca'=>$this->getisca(),
		    	':tec_isca'=>$this->gettec_isca(),
		    	':iscaPosicionando'=>$this->getiscaPosicionando(),
		    	':nomeEmbarcador'=>$this->getnomeEmbarcador(),
			    ':nomeTransportador'=>$this->getnomeTransportador(),
			    ':seguradora'=>$this->getseguradora(),
			    ':gerenteResponsavel'=>$this->getgerenteResponsavel(),
			    ':acionar'=>$this->getacionar(),
			    ':telefone'=>$this->gettelefone(),
			    ':Protocolo'=>$this->getProtocolo(),
			    ':perdaBateria'=>$this->getperdaBateria(),
			    ':dtAlertaBateria'=>$this->getdtAlertaBateria(),
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
			    ':dtViolacaoPainel'=>$this->getdtViolacaoPainel(),
			    ':NumSM'=>$this->getNumSM()
		    	


			]);
	

	}


	public static function listGerentes()
	{

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_gerentes where inativo = 0 order by nomeGerente");

	}


	public static function listSeguradoras()
	{

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_seguradoras where inativo = 0 order by nomeSeguradora");

	}

	
	public static function listTiposSinistros()
	{

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_tipossinistro where inativo = 0 order by nomeSinistro");

	}



	public static function getPageIps($page = 1, $itemsPerPage = 100)
	{
 		
 		$start = ($page - 1) * $itemsPerPage;

 		$sql = new Sql();

 		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * from tb_sinistros s
			Join tb_acionamentos a on a.NumSM = s.NumSM
			Join tb_veiculos v on v.NumSM = a.NumSM
			Join tb_persons p on p.idperson = v.idperson
			Join tb_viagens vg on vg.viagemId = v.NumSM
			Join tb_motoristas m on m.NumSM = vg.viagemId
			Join tb_iscas i on i.NumSM = m.NumSM
			Join tb_clientes c on c.NumSM = i.NumSM
			left Join tb_alertas al on al.NumSM = c.NumSM
			left Join tb_acionamentos ac on ac.NumSM = al.NumSM
			order by v.NumSM desc
			LIMIT $start, $itemsPerPage;
		");

 		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

 		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
 	}


 	 	public static function getPageSearchIps($search, $page = 1, $itemsPerPage = 100)
	{
 		
 		$start = ($page - 1) * $itemsPerPage;

 		$sql = new Sql();

 		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * from tb_sinistros s
			Join tb_acionamentos a on a.NumSM = s.NumSM
			Join tb_veiculos v on v.NumSM = a.NumSM
			Join tb_persons p on p.idperson = v.idperson
			Join tb_viagens vg on vg.viagemId = v.NumSM
			Join tb_motoristas m on m.NumSM = vg.viagemId
			Join tb_iscas i on i.NumSM = m.NumSM
			Join tb_clientes c on c.NumSM = i.NumSM
			left Join tb_alertas al on al.NumSM = c.NumSM
			left Join tb_acionamentos ac on ac.NumSM = al.NumSM
			where s.NumSM LIKE :search
			ORDER BY s.NumSM
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

 		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
 		
 		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];
 	}


 		public function getIps($idNumSm)

	{

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS 
			* from tb_sinistros s
			Join tb_acionamentos a on a.NumSM = s.NumSM
			Join tb_veiculos v on v.NumSM = a.NumSM
			Join tb_persons p on p.idperson = v.idperson
			Join tb_viagens vg on vg.viagemId = v.NumSM
			Join tb_motoristas m on m.NumSM = vg.viagemId
			Join tb_iscas i on i.NumSM = m.NumSM
			Join tb_clientes c on c.NumSM = i.NumSM
			left Join tb_alertas al on al.NumSM = c.NumSM
			left Join tb_acionamentos ac on ac.NumSM = al.NumSM
			where s.NumSM = :idNumSm",[
			':idNumSm'=>$idNumSm

		]);

		$this->setData($results[0]);


	}


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