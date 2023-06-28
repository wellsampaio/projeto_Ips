-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2023 às 15:31
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sinistros`
--
CREATE DATABASE IF NOT EXISTS `db_sinistros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sinistros`;

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_acionamentos_save` (`pidacionamento` INT(11), `ptipo_acionamento` VARCHAR(60), `pdatah` DATETIME(1), `pnome` VARCHAR(40), `pcontato` VARCHAR(40), `plocal` VARCHAR(60), `pNumSM` VARCHAR(30), `pdescricao` VARCHAR(200), `pacionamento2` VARCHAR(45), `pdatah2` DATETIME(1), `pnome2` VARCHAR(45), `pcontato2` VARCHAR(45), `plocal2` VARCHAR(45), `pdescricao2` VARCHAR(200), `pacionamento3` VARCHAR(45), `pdatah3` DATETIME(1), `pnome3` VARCHAR(45), `pcontato3` VARCHAR(45), `plocal3` VARCHAR(45), `pdescricao3` VARCHAR(200), `pacionamento4` VARCHAR(45), `pdatah4` DATETIME(1), `pnome4` VARCHAR(45), `pcontato4` VARCHAR(45), `plocal4` VARCHAR(45), `pdescricao4` VARCHAR(200))   BEGIN    
		
	INSERT INTO tb_acionamentos(tipo_acionamento,datah, nome, contato, local,NumSM, descricao, acionamento2, datah2, nome2, contato2, local2, descricao2, acionamento3, datah3, nome3, contato3, local3, descricao3, acionamento4, datah4, nome4, contato4, local4, descricao4)
        VALUES(ptipo_acionamento,pdatah, pnome, pcontato, plocal, pNumSM, pdescricao, pacionamento2, pdatah2, pnome2, pcontato2, plocal2, pdescricao2, pacionamento3, pdatah3, pnome3, pcontato3, plocal3, pdescricao3, pacionamento4, pdatah4, pnome4, pcontato4, plocal4, pdescricao4);

        
        SET pidacionamento = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_acionamentos WHERE idacionamento = pidacionamento;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_acionamentos_saves` (`pidacionamento` INT(11), `ptipo_acionamento` VARCHAR(60), `pdatah` VARCHAR(40), `pnome` VARCHAR(40), `pcontato` VARCHAR(40), `plocal` VARCHAR(60), `pNumSM` VARCHAR(30), `pdescricao` VARCHAR(200), `pacionamento2` VARCHAR(45), `pdatah2` VARCHAR(40), `pnome2` VARCHAR(45), `pcontato2` VARCHAR(45), `plocal2` VARCHAR(45), `pdescricao2` VARCHAR(200), `pacionamento3` VARCHAR(45), `pdatah3` VARCHAR(40), `pnome3` VARCHAR(45), `pcontato3` VARCHAR(45), `plocal3` VARCHAR(45), `pdescricao3` VARCHAR(200), `pacionamento4` VARCHAR(45), `pdatah4` VARCHAR(40), `pnome4` VARCHAR(45), `pcontato4` VARCHAR(45), `plocal4` VARCHAR(45), `pdescricao4` VARCHAR(200), `pacionamento5` VARCHAR(45), `pdatah5` VARCHAR(40), `pnome5` VARCHAR(45), `pcontato5` VARCHAR(45), `plocal5` VARCHAR(45), `pdescricao5` VARCHAR(200), `pacionamento6` VARCHAR(45), `pdatah6` VARCHAR(40), `pnome6` VARCHAR(45), `pcontato6` VARCHAR(45), `plocal6` VARCHAR(45), `pdescricao6` VARCHAR(200))   BEGIN    

 IF pidacionamento > 0 THEN
		
		UPDATE tb_acionamentos
        SET
			tipo_acionamento = ptipo_acionamento,
            datah = pdatah,
            nome = pnome,
            contato = pcontato,
            local = plocal,
            NumSM = pNumSM,
            descricao = pdescricao
		WHERE idacionamento = pidacionamento;
        
    END IF;
    
    SELECT * FROM tb_acionamentos WHERE NumSM = pNumSM;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addresses_save` (`pidaddress` INT(11), `pidperson` INT(11), `pdesaddress` VARCHAR(128), `pdesnumber` VARCHAR(16), `pdescomplement` VARCHAR(32), `pdescity` VARCHAR(32), `pdesstate` VARCHAR(32), `pdescountry` VARCHAR(32), `pdeszipcode` CHAR(8), `pdesdistrict` VARCHAR(32), `pdesdelivery` VARCHAR(32))   BEGIN
 
    IF pidaddress > 0 THEN
		
		UPDATE tb_addresses
        SET
	    idperson = pidperson,
            desaddress = pdesaddress,
            desnumber = pdesnumber,
            descomplement = pdescomplement,
            descity = pdescity,
            desstate = pdesstate,
            descountry = pdescountry,
            deszipcode = pdeszipcode, 
            desdistrict = pdesdistrict,
            desdelivery = pdesdelivery
		WHERE idaddress = pidaddress;
        
    ELSE
		
	INSERT INTO tb_addresses (idperson, desaddress, desnumber, descomplement, descity, desstate, descountry, deszipcode, desdistrict, desdelivery)
        VALUES(pidperson, pdesaddress, pdesnumber, pdescomplement, pdescity, pdesstate, pdescountry, pdeszipcode, pdesdistrict, pdesdelivery);
        
        SET pidaddress = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_addresses WHERE idaddress = pidaddress;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alertas_save` (`pidalerta` INT(11), `pperdaBateria` VARCHAR(10), `pdtAlertaBateria` DATETIME, `pNumSM` VARCHAR(45), `pperdaSinal` VARCHAR(15), `pdtPerdaSinal` DATETIME, `pbtPanico` VARCHAR(10), `pdtBtPanico` DATETIME, `pportaBauLateral` VARCHAR(10), `pdtPortaBauLateral` DATETIME, `pdesengateCarreta` VARCHAR(10), `pdtDesengateCarreta` DATETIME, `pportaMotorista` VARCHAR(10), `pdtPortaMotorista` DATETIME, `pignicaoDesligada` VARCHAR(10), `pdtIgnicaoDesligada` DATETIME, `pviolacaoGrade` VARCHAR(10), `pdtViolacaoGrade` DATETIME, `pperdaTerminal` VARCHAR(10), `pdtPerdaTerminal` DATETIME, `pdesvioRota` VARCHAR(10), `pdtDesvioRota` DATETIME, `pportaBauTraseira` VARCHAR(10), `pdtPortaBauTraseira` DATETIME, `parrombamentoBau` VARCHAR(10), `pdtArrombamentoBau` DATETIME, `psenhaPanico` VARCHAR(10), `pdtSenhaPanico` DATETIME, `pportaPassageiro` VARCHAR(10), `pdtPortaPassageiro` DATETIME, `pviolacaoPainel` VARCHAR(10), `pdtViolacaoPainel` DATETIME)   BEGIN    
		
	INSERT INTO tb_alertas(perdaBateria, dtAlertaBateria, NumSM, perdaSinal, dtPerdaSinal, btPanico, dtBtPanico, portaBauLateral, dtPortaBauLateral, desengateCarreta, dtDesengateCarreta, portaMotorista, dtPortaMotorista, ignicaoDesligada, dtIgnicaoDesligada, violacaoGrade, dtViolacaoGrade, perdaTerminal, dtPerdaTerminal, desvioRota, dtDesvioRota, portaBauTraseira, dtPortaBauTraseira, arrombamentoBau, dtArrombamentoBau, senhaPanico, dtSenhaPanico, portaPassageiro, dtPortaPassageiro, violacaoPainel, dtViolacaoPainel)
        VALUES(pperdaBateria, pdtAlertaBateria, pNumSM, pperdaSinal, pdtPerdaSinal, pbtPanico, pdtBtPanico, pportaBauLateral, pdtPortaBauLateral, pdesengateCarreta, pdtDesengateCarreta, pportaMotorista, pdtPortaMotorista, pignicaoDesligada, pdtIgnicaoDesligada, pviolacaoGrade, pdtViolacaoGrade, pperdaTerminal, pdtPerdaTerminal, pdesvioRota, pdtDesvioRota, pportaBauTraseira, pdtPortaBauTraseira, parrombamentoBau, pdtArrombamentoBau, psenhaPanico, pdtSenhaPanico, pportaPassageiro, pdtPortaPassageiro, pviolacaoPainel, pdtViolacaoPainel);
        
        SET pidalerta = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_alertas WHERE idalerta = pidalerta;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_carts_save` (`pidcart` INT, `pdessessionid` VARCHAR(64), `piduser` INT, `pdeszipcode` CHAR(8), `pvlfreight` DECIMAL(10,2), `pnrdays` INT)   BEGIN

    IF pidcart > 0 THEN
        
        UPDATE tb_carts
        SET
            dessessionid = pdessessionid,
            iduser = piduser,
            deszipcode = pdeszipcode,
            vlfreight = pvlfreight,
            nrdays = pnrdays
        WHERE idcart = pidcart;
        
    ELSE
        
        INSERT INTO tb_carts (dessessionid, iduser, deszipcode, vlfreight, nrdays)
        VALUES(pdessessionid, piduser, pdeszipcode, pvlfreight, pnrdays);
        
        SET pidcart = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_carts WHERE idcart = pidcart;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save` (`pidcategory` INT, `pdescategory` VARCHAR(64))   BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET descategory = pdescategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (descategory) VALUES(pdescategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_clientes_save` (`pidcliente` INT(11), `pCliente` VARCHAR(150), `pnomeEmbarcador` VARCHAR(100), `pnomeTransportador` VARCHAR(100), `pseguradora` VARCHAR(60), `pgerenteResponsavel` VARCHAR(32), `pacionar` VARCHAR(20), `ptelefone` VARCHAR(15), `pNumSM` VARCHAR(45), `pProtocolo` VARCHAR(45))   BEGIN		
	INSERT INTO tb_clientes (idcliente, Cliente, nomeEmbarcador, nomeTransportador, seguradora, gerenteResponsavel, acionar, telefone, NumSM, Protocolo)
        VALUES(pidcliente,pCliente, pnomeEmbarcador, pnomeTransportador, pseguradora, pgerenteResponsavel, pacionar, ptelefone, pNumSM, pProtocolo);
        
        SET pidcliente = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_clientes WHERE idcliente = pidcliente;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_clientes_saves` (`pidcliente` INT(11), `pCliente` VARCHAR(150), `pnomeEmbarcador` VARCHAR(100), `pnomeTransportador` VARCHAR(100), `pseguradora` VARCHAR(60), `pgerenteResponsavel` VARCHAR(32), `pacionar` VARCHAR(20), `ptelefone` VARCHAR(15), `pNumSM` VARCHAR(45), `pProtocolo` VARCHAR(45))   BEGIN		
	INSERT INTO tb_clientes (idcliente, Cliente, nomeEmbarcador, nomeTransportador, seguradora, gerenteResponsavel, acionar, telefone, NumSM, Protocolo)
        VALUES(pidcliente,pCliente, pnomeEmbarcador, pnomeTransportador, pseguradora, pgerenteResponsavel, pacionar, ptelefone, pNumSM, pProtocolo);
        
        SET pidcliente = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_clientes WHERE idcliente = pidcliente;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_iscas_save` (`pidiscas` INT(11), `pisca` VARCHAR(15), `ptec_isca` VARCHAR(45), `piscaPosicionando` VARCHAR(60), `pNumSM` VARCHAR(45))   BEGIN		
	INSERT INTO tb_iscas (idiscas, isca, tec_isca, iscaPosicionando, NumSM)
        VALUES(pidiscas, pisca, ptec_isca, piscaPosicionando, pNumSM);
        
        SET pidiscas = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_iscas WHERE idiscas = pidiscas;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_iscas_saves` (`pidiscas` INT(11), `pisca` VARCHAR(15), `ptec_isca` VARCHAR(45), `piscaPosicionando` VARCHAR(60), `pnIsca` VARCHAR(60), `pnTerminal` VARCHAR(60), `pnIscaPosicionando` VARCHAR(60), `pNumSM` VARCHAR(45))   BEGIN		
	INSERT INTO tb_iscas (idiscas, isca, tec_isca, iscaPosicionando, nIsca, nTerminal, nIscaPosicionando, NumSM)
        VALUES(pidiscas, pisca, ptec_isca, piscaPosicionando, pnIsca, pnTerminal, pnIscaPosicionando, pNumSM);
        
        SET pidiscas = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_iscas WHERE idiscas = pidiscas;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_motoristas_save` (`pidmotorista` INT(11), `pMotorista` VARCHAR(150), `pCPF` VARCHAR(60), `pVinculo` VARCHAR(60), `pNumSM` VARCHAR(30))   BEGIN    
		
	INSERT INTO tb_motoristas(Motorista, CPF, Vinculo, NumSM)
        VALUES(pMotorista, pCPF, pVinculo, pNumSM);
        
        SET pidmotorista = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_motoristas WHERE idmotorista = pidmotorista;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orderspagseguro_save` (`pidorder` INT, `pdescode` VARCHAR(36), `pvlgrossamount` DECIMAL(10,2), `pvldiscountamount` DECIMAL(10,2), `pvlfeeamount` DECIMAL(10,2), `pvlnetamount` DECIMAL(10,2), `pvlextraamount` DECIMAL(10,2), `pdespaymentlink` VARCHAR(256))   BEGIN
	
    DELETE FROM tb_orderspagseguro WHERE idorder = pidorder;
    
    INSERT INTO tb_orderspagseguro (idorder, descode, vlgrossamount, vldiscountamount, vlfeeamount, vlnetamount, vlextraamount, despaymentlink)
	VALUES(pidorder, pdescode, pvlgrossamount, pvldiscountamount, pvlfeeamount, pvlnetamount, pvlextraamount, pdespaymentlink);
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orders_save` (`pidorder` INT, `pidcart` INT(11), `piduser` INT(11), `pidstatus` INT(11), `pidaddress` INT(11), `pvltotal` DECIMAL(10,2))   BEGIN
	
	IF pidorder > 0 THEN
		
		UPDATE tb_orders
        SET
			idcart = pidcart,
            iduser = piduser,
            idstatus = pidstatus,
            idaddress = pidaddress,
            vltotal = pvltotal
		WHERE idorder = pidorder;
        
    ELSE
    
		INSERT INTO tb_orders (idcart, iduser, idstatus, idaddress, vltotal)
        VALUES(pidcart, piduser, pidstatus, pidaddress, pvltotal);
		
		SET pidorder = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * 
    FROM tb_orders a
    INNER JOIN tb_ordersstatus b USING(idstatus)
    INNER JOIN tb_carts c USING(idcart)
    INNER JOIN tb_users d ON d.iduser = a.iduser
    INNER JOIN tb_addresses e USING(idaddress)
    WHERE idorder = pidorder;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_save` (IN `pidproduct` INT(11), IN `pdesproduct` VARCHAR(64), IN `pvlprice` DECIMAL(10,2), IN `pvlfilling` VARCHAR(150), IN `pvlweight` DECIMAL(10,2), IN `pdesurl` VARCHAR(128))   BEGIN
	
	IF pidproduct > 0 THEN
		
		UPDATE tb_products
        SET 
			desproduct = pdesproduct,
            vlprice = pvlprice,
            vlfilling = pvlfilling,
            vlweight = pvlweight,
            desurl = pdesurl
        WHERE idproduct = pidproduct;
        
    ELSE
		
		INSERT INTO tb_products (desproduct, vlprice, vlfilling, vlweight, desurl) 
        VALUES(pdesproduct, pvlprice, pvlfilling, pvlweight, pdesurl);
        
        SET pidproduct = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_products WHERE idproduct = pidproduct;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sinistros_save` (`pidsinistro` INT(11), `pdtComunicado` DATETIME, `pdtSinistro` DATETIME, `plocalSinistro` VARCHAR(60), `platitude` VARCHAR(150), `plongitude` VARCHAR(150), `pKm` VARCHAR(60), `ptipoSinistro` VARCHAR(20), `pnomeComunicante` VARCHAR(50), `pNumSM` VARCHAR(20), `pDescritivo` VARCHAR(100000))   BEGIN    
		
	INSERT INTO tb_sinistros(idsinistro, dtComunicado, dtSinistro, localSinistro, latitude, longitude, Km, tipoSinistro, nomeComunicante, NumSM, Descritivo)
        VALUES(pidsinistro, pdtComunicado, pdtSinistro, plocalSinistro, platitude, plongitude, pKm, ptipoSinistro, pnomeComunicante, pNumSM, pDescritivo);
        SET pidsinistro = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_sinistros WHERE idsinistro = pidsinistro;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sinistros_saves` (`pidsinistro` INT(11), `pdtComunicado` DATETIME, `pdtSinistro` DATETIME, `plocalSinistro` VARCHAR(200), `platitude` VARCHAR(150), `plongitude` VARCHAR(150), `pKm` VARCHAR(60), `ptipoSinistro` VARCHAR(40), `pnomeComunicante` VARCHAR(100), `pNumSM` VARCHAR(20), `pDescritivo` VARCHAR(10000))   BEGIN    
		
	INSERT INTO tb_sinistros(idsinistro, dtComunicado, dtSinistro, localSinistro, latitude, longitude, Km, tipoSinistro, nomeComunicante, NumSM, Descritivo)
        VALUES(pidsinistro, pdtComunicado, pdtSinistro, plocalSinistro, platitude, plongitude, pKm, ptipoSinistro, pnomeComunicante, pNumSM, pDescritivo);
        SET pidsinistro = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_sinistros WHERE idsinistro = pidsinistro;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create` (`piduser` INT, `pdesip` VARCHAR(45))   BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save` (`piduser` INT, `pdesperson` VARCHAR(64), `pdeslogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pdesemail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)   BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete` (`piduser` INT)   BEGIN
    
    DECLARE vidperson INT;
    
    SET FOREIGN_KEY_CHECKS = 0;
	
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
	
    DELETE FROM tb_addresses WHERE idperson = vidperson;
    DELETE FROM tb_addresses WHERE idaddress IN(SELECT idaddress FROM tb_orders WHERE iduser = piduser);
	DELETE FROM tb_persons WHERE idperson = vidperson;
    
    DELETE FROM tb_userslogs WHERE iduser = piduser;
    DELETE FROM tb_userspasswordsrecoveries WHERE iduser = piduser;
    DELETE FROM tb_orders WHERE iduser = piduser;
    DELETE FROM tb_cartsproducts WHERE idcart IN(SELECT idcart FROM tb_carts WHERE iduser = piduser);
    DELETE FROM tb_carts WHERE iduser = piduser;
    DELETE FROM tb_users WHERE iduser = piduser;
    
    SET FOREIGN_KEY_CHECKS = 1;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save` (`pdesperson` VARCHAR(64), `pdeslogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pdesemail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)   BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_veiculos_save` (`pidveiculo` INT(11), `pidperson` INT(11), `pmarca` VARCHAR(100), `pmodelo` VARCHAR(128), `pplaca` VARCHAR(100), `pcor` VARCHAR(100), `pvtec_descricao` VARCHAR(100), `pterm_numero_terminal` VARCHAR(100), `pNumSM` VARCHAR(45))   BEGIN
 
		
		
        
		
	INSERT INTO tb_veiculos (idperson,marca, modelo, placa, cor, vtec_descricao, term_numero_terminal,NumSM)
        VALUES(pidperson,pmarca,pmodelo, pplaca, pcor, pvtec_descricao, pterm_numero_terminal, pNumSM);
        
        SET pidveiculo = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_veiculos WHERE idveiculo = pidveiculo;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_veiculos_saves` (`pidveiculo` INT(11), `pidperson` INT(11), `pmarca` VARCHAR(100), `pmodelo` VARCHAR(128), `pplaca` VARCHAR(100), `pcor` VARCHAR(100), `pvtec_descricao` VARCHAR(100), `pterm_numero_terminal` VARCHAR(100), `pNumSM` VARCHAR(45))   BEGIN
	INSERT INTO tb_veiculos (idperson,marca, modelo, placa, cor, vtec_descricao, term_numero_terminal,NumSM)
        VALUES(pidperson,pmarca,pmodelo, pplaca, pcor, pvtec_descricao, pterm_numero_terminal, pNumSM);
        
        SET pidveiculo = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_veiculos WHERE idveiculo = pidveiculo;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viagens_save` (`pidviagem` INT(11), `pNumSM` VARCHAR(30), `pdataInicio` VARCHAR(60), `pValor` VARCHAR(60), `pcidadeOrigem` VARCHAR(150), `pcidadeDestino` VARCHAR(150), `pProdutos` VARCHAR(60))   BEGIN    
		
	INSERT INTO tb_viagens(viagemId, dataInicio, Valor, cidadeOrigem, cidadeDestino,Produtos)
        VALUES(pNumSM, pdataInicio, pValor, pcidadeOrigem, pcidadeDestino, pProdutos);
        
        SET pidviagem = LAST_INSERT_ID();
        
    
    SELECT * FROM tb_viagens WHERE idviagem = pidviagem;
 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acionamentos`
--

CREATE TABLE `tb_acionamentos` (
  `idacionamento` int(11) NOT NULL,
  `tipo_acionamento` varchar(60) DEFAULT NULL,
  `datah` varchar(20) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `contato` varchar(40) DEFAULT NULL,
  `local` varchar(60) DEFAULT NULL,
  `NumSM` varchar(30) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `acionamento2` varchar(100) DEFAULT NULL,
  `datah2` varchar(40) DEFAULT NULL,
  `nome2` varchar(45) DEFAULT NULL,
  `contato2` varchar(45) DEFAULT NULL,
  `local2` varchar(45) DEFAULT NULL,
  `descricao2` varchar(200) DEFAULT NULL,
  `acionamento3` varchar(100) DEFAULT NULL,
  `datah3` varchar(40) DEFAULT NULL,
  `nome3` varchar(45) DEFAULT NULL,
  `contato3` varchar(45) DEFAULT NULL,
  `local3` varchar(45) DEFAULT NULL,
  `descricao3` varchar(200) DEFAULT NULL,
  `acionamento4` varchar(100) DEFAULT NULL,
  `datah4` varchar(40) DEFAULT NULL,
  `nome4` varchar(45) DEFAULT NULL,
  `contato4` varchar(45) DEFAULT NULL,
  `local4` varchar(45) DEFAULT NULL,
  `descricao4` varchar(200) DEFAULT NULL,
  `acionamento5` varchar(100) DEFAULT NULL,
  `datah5` varchar(40) DEFAULT NULL,
  `nome5` varchar(45) DEFAULT NULL,
  `contato5` varchar(45) DEFAULT NULL,
  `local5` varchar(45) DEFAULT NULL,
  `descricao5` varchar(200) DEFAULT NULL,
  `acionamento6` varchar(100) DEFAULT NULL,
  `datah6` varchar(40) DEFAULT NULL,
  `nome6` varchar(45) DEFAULT NULL,
  `contato6` varchar(45) DEFAULT NULL,
  `local6` varchar(45) DEFAULT NULL,
  `descricao6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_acionamentos`
--

INSERT INTO `tb_acionamentos` (`idacionamento`, `tipo_acionamento`, `datah`, `nome`, `contato`, `local`, `NumSM`, `descricao`, `acionamento2`, `datah2`, `nome2`, `contato2`, `local2`, `descricao2`, `acionamento3`, `datah3`, `nome3`, `contato3`, `local3`, `descricao3`, `acionamento4`, `datah4`, `nome4`, `contato4`, `local4`, `descricao4`, `acionamento5`, `datah5`, `nome5`, `contato5`, `local5`, `descricao5`, `acionamento6`, `datah6`, `nome6`, `contato6`, `local6`, `descricao6`) VALUES
(1, 'Site da PRF', '2023-01-19T21:30', 'Site', 'Site', 'Site', '2336877', 'Ocorrência registrada no site', 'Policia Rodoviária Federal', '2023-01-19T21:31', '', '(62) 3216-8893', 'Abadia de Goias /GO', 'Sem Sucesso', 'Policia Rodoviária Federal', '2023-01-19T21:33', '', '(62) 3216-8800', 'Marista de Goiania/GO', 'Sem Sucesso', 'Policia Rodoviária Federal', '2023-01-19T21:35', '', '(62)3216-8880', 'St. Asa Branca de Goiânia', 'Sem Sucesso', 'Pronta Resposta', '2023-01-20T22:30', 'Ativa', 'Grupo de PR Ativa', 'Grupo de PR Ativa', 'Pronta resposta Acionada e ', 'Central de Ocorrências Sascar', '2023-01-20T07:35', 'Hilary', '08006486003', 'Sascar', 'Realizado o Acionamento na Sascar.o Sascar'),
(2, 'PRF', '2023-01-21T04:09', 'Naia', '191', '', '2340999 ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', ''),
(3, 'Policia Militar', '2023-01-23T02:17', 'Sem sucesso', '(31) 3392-2931', '', '2338647', '', 'Policia Militar', '2023-01-23T02:20', 'Sem sucesso', '(31) 3354-1849', '', '', 'Policia Militar', '2023-01-23T02:25', 'Sem sucesso', '(31) 2191-6133', '', '', 'Policia Militar', '2023-01-23T02:28', 'PM Lemos', '(31) 3476-4669', '', 'Não coletou os dados', 'Policia Militar', '2023-01-23T02:33', 'PM Pascoal', '(31) 3201-0229', '18º Batalhão', 'Coletou os dados', 'Pronta Resposta', '2023-01-23T03:49', 'PR SOMBRA', 'Whatsapp', 'Grupo Sombra x Mundial', 'Acionamento para preservação'),
(4, 'Sompo Seguros', '2023-01-23T16:18', 'Elane', '08007233002', 'Sompo ', '2340661', 'Sompo Seguros acionada para envio de Reguladora ao local.', 'Pronta Resposta', '2023-01-23T16:51', 'ATIVA', 'GRUPO DE PR', 'GRUPO DE PR', 'Pronta resposta enviada ao local para preservação.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '', '', '', '', '', '2340552', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Pronta Resposta ', '2023-01-25T11:04', 'PR ATIVA', 'GRUPO ', 'GRUPO ', '2343048', 'Acionamento de PR via grupo', 'PRF', '2023-01-25T11:10', 'Agente Gilson', '(37) 99823-3806', 'Oliveira, MG', 'Acionamento policial', 'Sascar', '2023-01-25T11:30', 'Andressa', '4002-6004', 'Central acionamento Sascatr', 'Acionamento Rastreador Sascar', '', '', '', '', '', '', 'Sinarf', '2023-01-25T10:40', '', 'Online', '', 'Acionamento Sinarf Online', 'Transportador', '2023-01-25T09:20', 'Fabio', '51 9900-1149', 'Whatsapp', 'Transportador'),
(7, 'CCR (Concessionaria da via)', '2023-01-26T11:07', 'Keity', '08007736699', '', '2346999', 'Acionamos a concessionaria da via onde fomos informados que seriam enviados PRF + Bombeiros', 'Torre Pamcary', '2023-01-26T11:17', 'Renan', '08007404000', '', 'Acionamos o seguro da carga N° protocolo 456064', 'Corpo de Bombeiros', '2023-01-26T11:21', 'Leonardo', '193', '', 'Confirmação da ocorrência com o corpo de bombeiros (onde fomos informados que já havia uma vtr no local)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Policia Rodoviária Federal', '2023-01-19T21:31', NULL, '(62) 3216-8893', 'Abadia de Goias /GO', '2336877', 'Sem Sucesso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Policia Rodoviária Federal', '2023-01-19T21:33', NULL, '(62) 3216-8800', 'Marista de Goiania/GO', '2336877', 'Sem Sucesso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Policia Rodoviária Federal', '2023-01-19T21:35', NULL, '(62)3216-8880', 'St. Asa Branca de Goiânia', '2336877', 'Sem Sucesso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Pronta Resposta', '2023-01-20T22:30', 'Ativa', 'Grupo de PR Ativa', 'Grupo de PR Ativa', '2336877', 'Pronta resposta Acionada e ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Central de Ocorrências Sascar', '2023-01-20T07:35', 'Hilary', '8006486003', 'Sascar', '2336877', 'Realizado o Acionamento na Sascar.o Sascar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Policia Militar', '2023-01-23T02:20', 'Sem sucesso', '(31) 3354-1849', NULL, '2338647', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Policia Militar', '2023-01-23T02:25', 'Sem sucesso', '(31) 2191-6133', NULL, '2338647', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Policia Militar', '2023-01-23T02:28', 'PM Lemos', '(31) 3476-4669', NULL, '2338647', 'Não coletou os dados', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Policia Militar', '2023-01-23T02:33', 'PM Pascoal', '(31) 3201-0229', '18º Batalhão', '2338647', 'Coletou os dados', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Pronta Resposta', '2023-01-23T03:49', 'PR SOMBRA', 'Whatsapp', 'Grupo Sombra x Mundial', '2338647', 'Acionamento para preservação', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Pronta Resposta', '2023-01-23T16:51', 'ATIVA', 'GRUPO DE PR', 'GRUPO DE PR', '2340661', 'Pronta resposta enviada ao local para preservação.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'PRF', '2023-01-25T11:10', 'Agente Gilson', '(37) 99823-3806', 'Oliveira, MG', '2343048', 'Acionamento policial', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Sascar', '2023-01-25T11:30', 'Andressa', '4002-6004', 'Central acionamento Sascatr', '2343048', 'Acionamento Rastreador Sascar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Sinarf', '2023-01-25T10:40', NULL, 'Online', NULL, '2343048', 'Acionamento Sinarf Online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Transportador', '2023-01-25T09:20', 'Fabio', '51 9900-1149', 'Whatsapp', '2343048', 'Transportador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Torre Pamcary', '2023-01-26T11:17', 'Renan', '8007404000', NULL, '2346999', 'Acionamos o seguro da carga N° protocolo 456064', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Corpo de Bombeiros', '2023-01-26T11:21', 'Leonardo', '193', NULL, '2346999', 'Confirmação da ocorrência com o corpo de bombeiros (onde fomos informados que já havia uma vtr no local', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Policial', '2023-01-29T00:57', 'Isana', '190', '190', '2349194', 'Acionamento 190, Civil Isana recolheu os dados e ficou de fazer um alerta na região Nº do talão de acionamento: 1772', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Policial', '2023-01-29T00:58', '', 'Sinal-PRF', 'Sinal-PRF', '2349194', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Seguradora', '2023-01-30T17:10', 'Fernanda', '08007233002', '08007233002', '2351705', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Seguradora', '2023-01-31T01:40', 'Renato', '08007233002', '08007233002', '2349376', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Seguradora', '2023-02-02T12:40', 'Katia', '0800 723 3002', '0800 723 3002', '2355481', 'Seguradora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Pronta resposta', '2023-02-02T14:00', 'PR ATIVA', 'via grupo', 'via grupo', '2355481', 'Acionamento de PR para preservação', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Seguradora', '2023-02-03T16:30', 'Everton', '0800 723 3002', '0800 723 3002', '2358253', 'Seguradora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '', '', '', '', '', '2354060', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'PRF', '2023-02-06T15:30', 'ana', '191', '191', '2361100', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Policia miliar', '2023-02-06T18:10', 'mayara', '21 964362316', '21 964362316', '2361100', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Transportadora', '2023-02-06T14:54', 'Veridiana', '85 9766-7505', '85 9766-7505', '2361100', 'Transportadora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Seguradora', '2023-02-07T10:09', 'Fernanda', '08007233002', '08007233002', '2360192', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '', '', '', '', '', '2362224', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'COPON ', '2023-02-08T11:35', 'atendente civil Lucas ', '190', '190', '2363887', 'Foi passado os dados do veiculo e a localização de onde foi o ocorrido para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Cupom ', '2023-02-09T14:32', 'Sabrina', '190', '190', '2365419', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Policial ', '2023-02-09T23:30', 'PRF', '(64) 3413-4166', '(64) 3413-4166', '2361350', 'Sem sucesso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Policial ', '2023-02-09T23:33', 'PRF', '(34) 3459-0100', '(34) 3459-0100', '2361350', 'Sem sucesso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Policial ', '2023-02-09T23:35', 'PRF', '(34) 99806-3523', '(34) 99806-3523', '2361350', 'Sem sucesso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Policial ', '2023-02-09T23:40', 'PRF', '(62) 3216-8895', '(62) 3216-8895', '2361350', 'Agente Serafim informou que não atendia a região', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Sascar', '2023-02-09T23:40', 'Central de roubos e furtos da Sascar', '0800 648 6003', '0800 648 6003', '2361350', 'Em contato com a atendente Daniele onde a mesma informa que não pode coletar os dados sem a informação de sinistro confirmado.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Pronta Resposta', '2023-02-09T23:27', 'Ativa', '', '', '2361350', 'Enviado equipe de campo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Policial', '2023-02-09T23:43', 'Sinarf', 'Site', 'Site', '2361350', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'COPOM ', '2023-02-10T11:45', 'Atendente civil Helen ', '190', '190', '2367132', 'Foi passado os dados do veiculo e a localização de onde foi o ocorrido para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Seguradora', '2023-02-10T20:23', 'HDI Global', 'Luiz', 'Luiz', '2367803', 'Realizado acionamento onde recebemos a informação que seria enviado um perito no local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Brigada Militar ', '2023-02-13T15:00', '', '(51) 34835030', '(51) 34835030', '2369787', 'Apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Brigada Militar ', '2023-02-13T15:01', '', '(51) 33641133', '(51) 33641133', '2369787', 'Apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '20º Batalhão Militar ', '2023-02-13T15:02', '', '(51) 33869972', '(51) 33869972', '2369787', 'Apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Brigada Militar ', '2023-02-13T15:04', '', '(51) 33665808', '(51) 33665808', '2369787', 'Apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '11º Batalhão Militar ', '2023-02-13T15:06', '', '(51) 33446020', '(51) 33446020', '2369787', 'atendente informou que temos que ligar para o 20º batalhão pois eles que cuidam da area aonde ocorreu o sinistro. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'COPOM ', '2023-02-15T08:57', 'atendente civil Gabriel ', '190', '190', '2373100', 'Foi passado os dados do veiculo e a localização de onde foi o ocorrido para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Cupom ', '2023-02-15T16:23', 'SIPRIANO', '190', '190', '2372959', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'COPOM ', '2023-02-15T17:33', 'Samara', '190', '190', '2373068', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '21º brigada militar ', '2023-02-17T09:20', 'Soldado Santos ', '(51) 35865740', '(51) 35865740', '2376999', 'Foi passado os dados do veículos e sua localização para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Seguradora', '2023-02-21T14:07', 'Everton', '08007233002', '08007233002', '2379999', 'Realizado o acionamento da Sompo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'COPOM ', '2023-02-24T08:57', 'Atendente Civil Raquel ', '190', '190', '2383744', 'Foi passado os dados do veículos e sua localização para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'COPOM ', '2023-02-24T13:40', 'Atendente Civil Cristina ', '190', '190', '2384379', 'Foi passado os dados do veículos e sua localização para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Seguradora', '2023-02-27T08:30', 'Everton', '0800 723 3002', '0800 723 3002', '2385694', 'Realizado o acionamento da Sompo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Policial Militar ', '2023-02-27T07:34', '', '(34) 33177400', '(34) 33177400', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Policial Militar ', '2023-02-27T07:35', '', '(34) 33168889 ', '(34) 33168889 ', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Policial Militar ', '2023-02-27T07:33', '', '(34) 33116990 ', '(34) 33116990 ', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Policial Militar ', '2023-02-27T07:37', '', '(34) 33362747', '(34) 33362747', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Policial Militar ', '2023-02-27T07:38', '', '(34)33365656', '(34)33365656', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Policial Militar ', '2023-02-27T07:48', '', '(34) 33183833', '(34) 33183833', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Policial Militar ', '2023-02-27T08:18', '', '(34) 33183833', '(34) 33183833', '2351864', 'Sem sucesso, apenas chamava ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Policial Militar ', '2023-02-27T08:27', 'Atendente Civil Andreia ', '190 acionamento local ', '190 acionamento local ', '2351864', 'Foi passado os dados do veículos e sua localização para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'PRF', '2023-02-27T19:49', 'Marcos', '(71) 2101-2286', '(71) 2101-2286', '2383244', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'PRF', '2023-02-27T19:50', 'Sinarf', 'Site PRF', 'Site PRF', '2383244', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'Transportadora', '2023-02-27T12:36', 'grupo', 'grupo tdm', 'grupo tdm', '2383244', 'Transportadora ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'SGO', '2023-03-02T16:05', 'Cunha', '55 21 96924-4222', '55 21 96924-4222', '2389599', 'PR seguiu para o local ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'Policia ', '2023-03-02T16:13', 'muniz', '21 3777-5634', '21 3777-5634', '2389599', 'Sem sucesso (Operador informou que tem de ser presencial)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Sinarf', '2023-03-02T16:15', 'Sinarf', 'Online', 'Online', '2389599', 'Acionamento Online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'COPOM ', '2023-03-03T10:55', 'Atendente Civil Valeria ', '190 ', '190 ', '2393863 ', 'Foi passado os dados e a localização, atendente civil registrou o alerta no sistema. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'PRF', '2023-03-02T13:30', 'JEFEFERSON ', '022999821336', '022999821336', '2388807', 'PRF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'PR', '2023-03-02T14:18', 'On System', 'Grupo de PR', 'Grupo de PR', '2388807', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'PR', '2023-03-02T16:14', 'PR ATIVA', 'Grupo de PR', 'Grupo de PR', '2388807', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'PRF', '2023-03-03T05:00', 'MOREIRA ', '(22) 27850565', '(22) 27850565', '2388807', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Seguradora', '2023-03-05T19:40', 'José', '0800 723 3002', '0800 723 3002', '2395444', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '', '', '', '', '', '2396712', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Acionamento Reguladora', '2023-03-07T14:10', 'Everton', '08007233002', '08007233002', '2391455', 'Realizado o acionamento junto a SOMPO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'COPOM ', '2023-03-08T10:29', 'Soldado Stefanie ', '190', '190', '2399456', 'Foi passado os dados do veiculo para que pudessem enviar uma viatura ate o local ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'COPOM ', '2023-03-08T10:59', '', '190', '190', '2399545', 'atendente civil informou que ja havia registro de ocorrencia com a placa informada ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Cupom', '2023-03-09T10:18', 'Karina', '190', '190', '2401083', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'Segurado', '2023-03-10T16:04', 'Elaine', '08007233002', '08007233002', '2403305', 'Realizado o acionamento via Sompo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'COPOM-MG ', '2023-03-13T09:30', 'Atendente civil Luciana ', '190', '190', '2405044', 'Foi passado os dados do veiculo para que pudessem enviar uma viatura ate o local ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'COPOM ', '2023-03-14T11:38', 'Atendente civil Karina ', '190', '190', '2405287', 'Foi passado os dados do veiculo para que pudessem enviar uma viatura ate o local ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'COPOMRJ ', '2023-03-15T11:39', '', '(21) 23336768', '(21) 23336768', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'COPOMRJ ', '2023-03-15T11:39', '', '(21) 23334883', '(21) 23334883', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'COPOMRJ ', '2023-03-15T11:41', '', '(21) 23335263', '(21) 23335263', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'COPOMRJ ', '2023-03-15T11:41', '', '(21)24199413', '(21)24199413', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'COPOMRJ ', '2023-03-15T11:43', '', '(21) 23335263 ', '(21) 23335263 ', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'COPOMRJ ', '2023-03-15T11:46', '', '(21) 23336766', '(21) 23336766', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'COPOMRJ ', '2023-03-15T11:48', '', '(21) 23336801', '(21) 23336801', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'COPOMRJ ', '2023-03-15T11:49', '', '(21) 22531177', '(21) 22531177', '2407790', 'Apenas chamou ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '', '', '', '', '', '2409828', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'PRF', '2023-03-19T19:09', '', '(31) 3691-1572', '(31) 3691-1572', '2411991', 'Sem contato', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'PRF', '2023-03-19T19:10', '', '(31) 3671-9097', '(31) 3671-9097', '2411991', 'Sem contato', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'COPOM ', '2023-03-21T12:05', 'Atendente Civil Elen ', '190', '190', '2414929', 'Foi passado os dados do veiculo e a localização de onde foi o ocorrido para que a viatura fosse até o local. ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Cupom', '2023-03-23T09:55', 'BRUNO', '190', '190', '2418487', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '', '', '', '', '', '2419695', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'PR', '2023-03-25T12:39', 'sttark', 'GRUPO PR', 'GRUPO PR', '2418999', 'Pronta reposta ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'sascar', '2023-03-25T13:22', 'Juliane', '11 4002-6004', '11 4002-6004', '2418999', 'Acionamento Tecnologia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'PRF', '2023-03-25T13:53', 'PRF', '34 9806-3523', '34 9806-3523', '2418999', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Transportadora', '2023-03-25T12:23', 'Fabiano', '51 9900-1149', '51 9900-1149', '2418999', 'transportadora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'PRF', '2023-03-25T13:50', 'PRF', '34 9905-5381', '34 9905-5381', '2418999', 'Acionamento Policial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Policial', '2023-03-23T14:50', 'Sinarf', 'Site', 'Site', '2416993', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Transportadora', '2023-03-23T16:45', 'Fabiano', '(51) 99900-1149', '(51) 99900-1149', '2416993', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Policial ', '2023-03-23T19:37', 'Agente', '(34) 99806-3523', '(34) 99806-3523', '2416993', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Central de Roubos e Furtos Sascar', '2023-03-23T20:07', 'Vivian', '0800 648 6003 ', '0800 648 6003 ', '2416993', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Pronta resposta', '2023-03-23T21:00', 'Brooks', '', '', '2416993', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, '', '', '', '', '', '2393051', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'COPOM ', '2023-03-28T13:04', 'Atendente civil Caique ', '190', '190', '2423618', 'Foi passado os dados do veículo ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, '', '', '', '', '', '2426463', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'COPOM ', '2023-03-31T06:34', 'Atendente civil Priscila ', '190', '190', '2428321', 'Foi passado os dados do veículo ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, '', '', '', '', '', '2428294', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'Seguradora Sompo', '2023-04-02T22:10', 'Renato', '0800 723 3002 ', '0800 723 3002 ', '2429063', 'Atendente Renato coletou informações referente o sinistro.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'COPOM ', '2023-04-04T12:01', 'Atendente civil Luiz ', '190', '190', '2431824', 'Foi passado os dados do veículo ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'COPOM ', '2023-04-05T12:09', 'Atendente civil Samara ', '190', '190', '2433371', 'Foi passado os dados do veículo ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, '', '', '', '', '', '2434435', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Policial Militar', '2023-04-08T12:50', '', '190', '190', '2436910', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, '', '', '', '', '', '2493310', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, '', '', '', '', '', '2493824', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '', '', '', '', '', '2475564', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, '', '', '', '', '', '2465543', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, '', '', '', '', '', '24655438', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, '', '', '', '', '', '2467061', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '', '', '', '', '', '2467012', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '', '', '', '', '', '2477012', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '', '', '', '', '', '24777012', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '', '', '', '', '', '23777012', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '', '', '', '', '', '33777012', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '', '', '', '', '', '2461941', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alertas`
--

CREATE TABLE `tb_alertas` (
  `idalerta` int(11) NOT NULL,
  `perdaBateria` varchar(10) DEFAULT NULL,
  `dtAlertaBateria` datetime DEFAULT NULL,
  `NumSM` varchar(45) DEFAULT NULL,
  `perdaSinal` varchar(15) DEFAULT NULL,
  `dtPerdaSinal` datetime DEFAULT NULL,
  `btPanico` varchar(10) DEFAULT NULL,
  `dtBtPanico` datetime DEFAULT NULL,
  `portaBauLateral` varchar(10) DEFAULT NULL,
  `dtPortaBauLateral` datetime DEFAULT NULL,
  `desengateCarreta` varchar(10) DEFAULT NULL,
  `dtDesengateCarreta` datetime DEFAULT NULL,
  `portaMotorista` varchar(10) DEFAULT NULL,
  `dtPortaMotorista` datetime DEFAULT NULL,
  `ignicaoDesligada` varchar(10) DEFAULT NULL,
  `dtIgnicaoDesligada` datetime DEFAULT NULL,
  `violacaoGrade` varchar(10) DEFAULT NULL,
  `dtViolacaoGrade` datetime DEFAULT NULL,
  `perdaTerminal` varchar(10) DEFAULT NULL,
  `dtPerdaTerminal` datetime DEFAULT NULL,
  `desvioRota` varchar(10) DEFAULT NULL,
  `dtDesvioRota` datetime DEFAULT NULL,
  `portaBauTraseira` varchar(10) DEFAULT NULL,
  `dtPortaBauTraseira` datetime DEFAULT NULL,
  `arrombamentoBau` varchar(10) DEFAULT NULL,
  `dtArrombamentoBau` datetime DEFAULT NULL,
  `senhaPanico` varchar(10) DEFAULT NULL,
  `dtSenhaPanico` datetime DEFAULT NULL,
  `portaPassageiro` varchar(10) DEFAULT NULL,
  `dtPortaPassageiro` datetime DEFAULT NULL,
  `violacaoPainel` varchar(10) DEFAULT NULL,
  `dtViolacaoPainel` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alertas`
--

INSERT INTO `tb_alertas` (`idalerta`, `perdaBateria`, `dtAlertaBateria`, `NumSM`, `perdaSinal`, `dtPerdaSinal`, `btPanico`, `dtBtPanico`, `portaBauLateral`, `dtPortaBauLateral`, `desengateCarreta`, `dtDesengateCarreta`, `portaMotorista`, `dtPortaMotorista`, `ignicaoDesligada`, `dtIgnicaoDesligada`, `violacaoGrade`, `dtViolacaoGrade`, `perdaTerminal`, `dtPerdaTerminal`, `desvioRota`, `dtDesvioRota`, `portaBauTraseira`, `dtPortaBauTraseira`, `arrombamentoBau`, `dtArrombamentoBau`, `senhaPanico`, `dtSenhaPanico`, `portaPassageiro`, `dtPortaPassageiro`, `violacaoPainel`, `dtViolacaoPainel`) VALUES
(1, 'Não', NULL, '2336877', 'Sim', '2023-01-19 23:51:00', 'Sim', '2023-01-19 21:13:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(2, 'Não', NULL, '2340999 ', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-01-21 03:57:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(3, 'Não', NULL, '2338647', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-01-23 00:11:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(4, 'Não', NULL, '2340661', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(5, 'Não', NULL, '2340552', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(6, 'Não', NULL, '2343048', 'Não', NULL, 'Sim', '2023-01-25 09:09:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(7, 'Não', NULL, '2346999', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-01-26 10:58:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(8, 'Não', NULL, '2349194', 'Sim', '2023-01-28 22:21:00', 'Sim', '2023-01-28 22:22:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(9, 'Não', NULL, '2351705', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(10, 'Não', NULL, '2349376', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(11, 'Não', NULL, '2355481', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(12, 'Não', NULL, '2358253', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-03 12:07:00', 'Não', NULL),
(13, 'Não', NULL, '2354060', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(14, NULL, NULL, '2361100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Não', NULL, '2360192', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(16, 'Não', NULL, '2362224', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-07 11:04:00', 'Não', NULL),
(17, 'Não', NULL, '2363887', 'Não', NULL, 'Sim', '2023-02-08 11:16:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-08 11:15:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(18, 'Não', NULL, '2365419', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-09 14:31:00', 'Não', NULL),
(19, 'Não', NULL, '2361350', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-09 22:18:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(20, 'Não', NULL, '2367132', 'Não', NULL, 'Sim', '2023-02-10 11:45:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-10 11:36:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-10 11:39:00', 'Sim', '2023-02-10 11:40:00', 'Não', NULL, 'Sim', '2023-02-10 11:36:00', 'Não', NULL),
(21, 'Não', NULL, '2367803', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(22, 'Não', NULL, '2369787', 'Não', NULL, 'Sim', '2023-02-13 14:43:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-13 14:59:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-13 14:54:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(23, 'Não', NULL, '2373100', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-15 08:49:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-15 08:48:00', 'Não', NULL),
(24, 'Não', NULL, '2373068', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-15 17:25:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-15 17:24:00', 'Não', NULL),
(25, NULL, NULL, '2372959', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Não', NULL, '2376999', 'Não', NULL, 'Sim', '2023-02-17 09:17:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-17 09:13:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(27, 'Não', NULL, '2379999', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(28, 'Não', NULL, '2383744', 'Não', NULL, 'Sim', '2023-02-24 08:53:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-24 08:54:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(29, 'Não', NULL, '2384379', 'Não', NULL, 'Sim', '2023-02-24 13:35:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-24 13:46:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-24 13:48:00', 'Sim', '2023-02-24 13:48:00', 'Não', NULL, 'Sim', '2023-02-24 13:47:00', 'Não', NULL),
(30, 'Não', NULL, '2385694', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(31, 'Não', NULL, '2351864', 'Não', NULL, 'Sim', '2023-02-27 07:52:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-27 06:31:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-27 06:50:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-02-27 07:49:00', 'Não', NULL),
(32, 'Não', NULL, '2383244', 'Sim', '2023-02-26 22:48:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(33, 'Não', NULL, '2389599', 'Sim', '2023-03-02 15:57:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(34, 'Não', NULL, '2393863 ', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-03 10:50:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-03 10:57:00', 'Sim', '2023-03-03 10:57:00', 'Sim', '2023-03-03 10:52:00', 'Não', NULL, 'Não', NULL),
(35, 'Não', NULL, '2388807', 'Sim', '2023-03-02 00:10:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(36, 'Não', NULL, '2395444', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-05 17:39:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(37, 'Não', NULL, '2396712', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(38, 'Não', NULL, '2391455', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(39, 'Não', NULL, '2399456', 'Não', NULL, 'Sim', '2023-03-08 10:20:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-08 09:39:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-08 09:39:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-08 09:43:00', 'Não', NULL),
(40, 'Não', NULL, '2399545', 'Não', NULL, 'Sim', '2023-03-08 10:45:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-08 10:43:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(41, 'Não', NULL, '2401083', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-09 10:19:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-09 10:11:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-09 10:15:00', 'Não', NULL),
(42, 'Não', NULL, '2403305', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(43, 'Não', NULL, '2405044', 'Não', NULL, 'Sim', '2023-03-13 09:25:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-14 09:22:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-13 09:22:00', 'Não', NULL),
(44, 'Não', NULL, '2405287', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-14 11:06:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-14 11:08:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-14 11:05:00', 'Não', NULL),
(45, 'Não', NULL, '2407790', 'Não', NULL, 'Sim', '2023-03-15 11:33:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-15 11:36:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-15 11:36:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-15 11:37:00', 'Não', NULL),
(46, 'Não', NULL, '2409828', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-16 11:06:00', 'Não', NULL),
(47, 'Sim', '2023-03-19 18:06:00', '2411991', 'Sim', '2023-03-19 18:59:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-19 18:01:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(48, 'Não', NULL, '2414929', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-21 11:57:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(49, 'Não', NULL, '2418487', 'Não', NULL, 'Sim', '2023-03-23 09:59:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-23 08:46:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(50, 'Não', NULL, '2419695', 'Sim', '2023-03-24 04:47:00', 'Sim', '2023-03-24 01:59:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(51, 'Não', NULL, '2418999', 'Sim', '2023-03-25 15:28:00', 'Sim', '2023-03-25 12:23:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(52, 'Não', NULL, '2416993', 'Sim', '2023-03-23 14:38:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(53, 'Não', NULL, '2393051', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-27 17:51:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-27 17:52:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(54, 'Não', NULL, '2423618', 'Sim', '2023-03-28 13:02:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-28 13:01:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-28 13:00:00', 'Não', NULL),
(55, 'Não', NULL, '2426463', 'Não', NULL, 'Sim', '2023-03-31 12:25:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-31 12:26:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-31 12:25:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-31 12:26:00', 'Não', NULL),
(56, 'Não', NULL, '2428321', 'Não', NULL, 'Sim', '2023-03-31 06:29:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-31 06:27:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-31 06:27:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(57, 'Não', NULL, '2428294', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-03-31 09:27:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(58, 'Não', NULL, '2429063', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(59, 'Não', NULL, '2431824', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-04 12:11:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-04 11:52:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-04 12:11:00', 'Não', NULL),
(60, 'Não', NULL, '2433371', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-05 11:07:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-05 11:07:00', 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-05 11:07:00', 'Não', NULL),
(61, 'Não', NULL, '2434435', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(62, 'Não', NULL, '2436910', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-08 12:14:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Sim', '2023-04-08 12:14:00', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(63, 'Não', NULL, '2493310', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(64, 'Não', NULL, '2493824', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(65, 'Não', NULL, '2475564', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(66, 'Não', NULL, '2465543', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(67, 'Não', NULL, '24655438', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(68, 'Não', NULL, '2467061', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(69, 'Não', NULL, '2467012', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(70, 'Não', NULL, '2477012', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(71, 'Não', NULL, '24777012', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(72, 'Não', NULL, '23777012', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(73, 'Não', NULL, '33777012', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL),
(74, 'Não', NULL, '2461941', 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL, 'Não', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carts`
--

CREATE TABLE `tb_carts` (
  `idcart` int(11) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `deszipcode` char(8) DEFAULT NULL,
  `vlfreight` decimal(10,2) DEFAULT NULL,
  `nrdays` int(11) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cartsproducts`
--

CREATE TABLE `tb_cartsproducts` (
  `idcartproduct` int(11) NOT NULL,
  `idcart` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `dtremoved` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categories`
--

CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL,
  `descategory` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_categories`
--

INSERT INTO `tb_categories` (`idcategory`, `descategory`, `dtregister`) VALUES
(3, 'Bolos', '2018-06-09 23:53:49'),
(4, 'Doces', '2018-06-10 00:15:09'),
(5, 'Salgados', '2018-06-10 00:15:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `idcliente` int(11) NOT NULL,
  `Cliente` varchar(150) DEFAULT NULL,
  `nomeEmbarcador` varchar(60) DEFAULT NULL,
  `nomeTransportador` varchar(60) DEFAULT NULL,
  `seguradora` varchar(60) DEFAULT NULL,
  `gerenteResponsavel` varchar(60) DEFAULT NULL,
  `acionar` varchar(20) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `NumSM` varchar(45) DEFAULT NULL,
  `Protocolo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`idcliente`, `Cliente`, `nomeEmbarcador`, `nomeTransportador`, `seguradora`, `gerenteResponsavel`, `acionar`, `telefone`, `NumSM`, `Protocolo`) VALUES
(1, NULL, 'TDM TRANSPORTES LTDA', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2336877', ''),
(2, NULL, 'FAVORITA TRANSPORTES', 'FAVORITA TRANSPORTES', 'AXA XL', 'Luana Souza', 'Nao', NULL, '2340999 ', ''),
(3, NULL, 'TDM TRANSPORTES LTDA', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2338647', ''),
(4, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'SAMID TRANSPORTES E LOGISTICA ', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2340661', ''),
(5, NULL, 'TDM TRANSPORTES LTDA', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2340552', ''),
(6, NULL, 'CAMPARI DO BRASIL LTDA (EXTREMA-MG)', 'TRANSDALLA TRANSPORTES (CAMPARI)', 'SOMPO SEGUROS', 'Wagner Teixeira', 'Nao', NULL, '2343048', ''),
(7, NULL, 'RECKITT BENCKISER (BRASIL) LTDA.', 'LIRAN TRANSPORTES E LOG LTDA (RB)', 'SOMPO SEGUROS', 'Gabriel Rezende', 'Nao', NULL, '2346999', '456064'),
(8, NULL, ' TDM TRANSPORTES LTDA', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2349194', ''),
(9, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'NOVO RUMO TRANSPORTES (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Sim', '08007233002', '2351705', 'ST2301020396'),
(10, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'GTI - LOG S/A (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2349376', ''),
(11, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'TMSI LOGISTICA E TRANSPORTES LTDA (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Sim', '0800 723 3002', '2355481', 'ST2302020556'),
(12, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'SOMA LOGISTICA E LOCACAES - LTDA (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2358253', 'ST2302020596'),
(13, NULL, 'TDM', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2354060', ''),
(14, NULL, '', 'AMAB CARGAS & LOGISTICA LTDA', 'ALLIANZ SEGUROS', 'Romário Xavier', 'Nao', NULL, '2361100', ''),
(15, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'JS LOGISTICA LTDA (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2360192', 'ST2302020693'),
(16, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'ISAMU TRANSPORTES LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2362224', ''),
(17, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2363887', ''),
(18, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'UNCARGO TRANSPORTE E LOGISTICA LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2365419', ''),
(19, NULL, '', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2361350', ''),
(20, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'TRANSMIT SERVICOS LTDA - EPP (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2367132', ''),
(21, NULL, '', 'NOVA SAFRA TRANSPORTES LTDA', 'HDI GLOBAL SEGUROS', 'Alexandre Arantes', 'Sim', '0800 772 1233', '2367803', '052858'),
(22, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'ISAMU TRANSPORTES LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2369787', ''),
(23, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2373100', ''),
(24, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'TRANSMIT SERVICOS LTDA - EPP (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2372959', ''),
(25, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2373068', ''),
(26, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'ISAMU TRANSPORTES LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2376999', ''),
(27, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'GTI - LOG S/A (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2379999', 'ST2302021222'),
(28, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'TRANSMIT SERVICOS LTDA - EPP (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2383744', ''),
(29, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2384379', ''),
(30, NULL, 'USIMINAS SIDERURGICAS DE MINAS GERAIS S.A.', 'BUZIN TRANSPORTES LTDA (USIMINAS)', 'SOMPO SEGUROS', 'Wilton Ferreira', 'Nao', NULL, '2385694', 'ST2302021420'),
(31, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'JTI TRANSPORTES PRONTA ENTREGA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2351864', ''),
(32, NULL, '', 'TDM TRANSPORTES LTDA', 'FAIRFAX SEGUROS', 'Wallace Anselmo', 'Nao', NULL, '2383244', ''),
(33, NULL, 'RECKITT BENCKISER (BRASIL) LTDA.', 'TRANSMARONI TRANSPORTES BRASIL RODLTDA (RB)', 'SOMPO SEGUROS', 'Gabriel Rezende', 'Nao', NULL, '2389599', '457563'),
(34, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2393863 ', ''),
(35, NULL, '', 'AMAB CARGAS & LOGISTICA LTDA', 'ALLIANZ SEGUROS', 'Romário Xavier', 'Nao', NULL, '2388807', ''),
(36, NULL, 'USIMINAS SIDERURGICAS DE MINAS GERAIS S.A.', 'BNTG LOGISTICA LTDA (USIMINAS)', 'SOMPO SEGUROS', 'Wilton Ferreira', 'Sim', '0800 723 3002', '2395444', 'ST2303021706'),
(37, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'COOPERFENIX (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Sim', '', '2396712', 'ST2303021713'),
(38, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'TRANSPANORAMA TRANSPORTES', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2391455', 'ST2303021785'),
(39, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'UNCARGO TRANSPORTE E LOGISTICA LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2399456', ''),
(40, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2399545', ''),
(41, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2401083', ''),
(42, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'RODOATIVA TRANSPORTE LTDA (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2403305', 'ST2303021928'),
(43, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'TRANSMIT SERVICOS LTDA - EPP (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2405044', ''),
(44, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'JTI TRANSPORTES PRONTA ENTREGA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2405287', ''),
(45, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'MODAL TRANSPORTES LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2407790', ''),
(46, NULL, 'D CENTER DISTRIBUIDORA LTDA', 'DCENTER BARUERI SP', 'PLATINUM', 'Wilton Ferreira', 'Nao', NULL, '2409828', ''),
(47, NULL, 'USIMINAS SIDERURGICAS DE MINAS GERAIS S.A.', 'BORO TRANSPORTES LTDA (USIMINAS)', 'SOMPO SEGUROS', 'Wilton Ferreira', 'Sim', '0800 723 3002', '2411991', 'ST230302225'),
(48, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'UNCARGO TRANSPORTE E LOGISTICA LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2414929', ''),
(49, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2418487', ''),
(50, NULL, '', 'TRANSUL SERVICOS LOCACAO E TRANSPORTES LTDA', 'MAPFRE', 'Felipe Barreto', 'Nao', NULL, '2419695', ''),
(51, NULL, 'CAMPARI DO BRASIL LTDA (SUAPE-PE)', 'TRANSDALLA TRANSPORTES (CAMPARI)', 'SOMPO SEGUROS', 'Luana Souza', 'Nao', NULL, '2418999', ''),
(52, NULL, 'CAMPARI DO BRASIL LTDA (EXTREMA-MG)', 'TRANSDALLA TRANSPORTES (CAMPARI)', 'SOMPO SEGUROS', 'Luana Souza', 'Nao', NULL, '2416993', ''),
(53, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'JTI TRANSPORTES PRONTA ENTREGA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2393051', ''),
(54, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'UNCARGO TRANSPORTE E LOGISTICA LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2423618', ''),
(55, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'MODAL TRANSPORTES LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2426463', ''),
(56, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2428321', ''),
(57, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'RTT TRANSPORTES EXPRESS LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2428294', ''),
(58, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'COOPERFENIX (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Sim', '0800 723 3002 ', '2429063', 'ST2304022850'),
(59, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'DSE TRANSPORTE E ARMAZENAGEM LTDA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2431824', ''),
(60, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'JTI TRANSPORTES PRONTA ENTREGA (JTI)', 'ALLIANZ SEGUROS', 'Alexandre Arantes', 'Nao', NULL, '2433371', ''),
(61, NULL, 'SOLUCOES EM ACO USIMINAS S/A', 'NOVO RUMO TRANSPORTES (SOLUCOES USIMINAS)', 'SOMPO SEGUROS', 'Anderson Romano', 'Nao', NULL, '2434435', ''),
(62, NULL, 'D CENTER DISTRIBUIDORA LTDA', 'DCENTER BARUERI SP', 'HDI GLOBAL SEGUROS', 'Wilton Ferreira', 'Nao', NULL, '2436910', ''),
(63, NULL, '', 'RODO VASKI ARMAZENS GERAIS E TRANSPORTES LTDA', 'CHUBB', 'Felipe Barreto', 'Nao', NULL, '2493310', ''),
(64, NULL, 'SOTREQ S/A  (PECAS)', 'UNALOG - OP PECAS - SOTREQ', 'ARGO SEGUROS', 'Felipe Barreto', 'Nao', NULL, '2493824', ''),
(65, NULL, 'SOTREQ S/A  (PECAS)', 'UNALOG - OP PECAS - SOTREQ', 'ARGO SEGUROS', 'Felipe Barreto', 'Nao', NULL, '2475564', ''),
(66, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'UNCARGO TRANSPORTE E LOGISTICA LTDA (JTI)', 'ESSOR', 'Felipe Barreto', 'Nao', NULL, '2465543', ''),
(67, NULL, 'JT INTERNATIONAL DISTRIBUIDORA DE CIGARROS LTDA', 'UNCARGO TRANSPORTE E LOGISTICA LTDA (JTI)', 'ESSOR', 'Felipe Barreto', 'Nao', NULL, '24655438', ''),
(68, NULL, '', 'PRIME CARGO', 'HDI GLOBAL SEGUROS', 'Romário Xavier', 'Nao', NULL, '2467061', ''),
(69, NULL, '', 'PRIME CARGO', 'HDI GLOBAL SEGUROS', 'Romário Xavier', 'Nao', NULL, '2467012', ''),
(70, NULL, '', 'PRIME CARGO', 'HDI GLOBAL SEGUROS', 'Romário Xavier', 'Nao', NULL, '2477012', ''),
(71, NULL, '', 'PRIME CARGO', 'HDI GLOBAL SEGUROS', 'Romário Xavier', 'Nao', NULL, '24777012', ''),
(72, NULL, '', 'PRIME CARGO', 'HDI GLOBAL SEGUROS', 'Romário Xavier', 'Nao', NULL, '23777012', ''),
(73, NULL, '', 'PRIME CARGO', 'HDI GLOBAL SEGUROS', 'Romário Xavier', 'Nao', NULL, '33777012', ''),
(74, NULL, 'USIMINAS SIDERURGICAS DE MINAS GERAIS S.A.', 'KAIZEN LOGISTICA LTDA (USIMINAS)', 'HDI GLOBAL SEGUROS', 'Luana Souza', 'Nao', NULL, '2461941', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gerentes`
--

CREATE TABLE `tb_gerentes` (
  `idgerente` int(11) NOT NULL,
  `nomeGerente` varchar(150) NOT NULL,
  `inativo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_gerentes`
--

INSERT INTO `tb_gerentes` (`idgerente`, `nomeGerente`, `inativo`) VALUES
(1, 'Anderson Romano', 0),
(2, 'Denys Fagundes', 0),
(6, 'Gabriel Rezende', 0),
(7, 'Luana Souza', 0),
(8, 'Wellington Barros', 0),
(9, 'Wilton Ferreira', 0),
(10, 'Wagner Teixeira', 0),
(11, 'Alexandre Arantes', 0),
(12, 'Felipe Barreto', 0),
(13, 'Alexandro Lima', 1),
(14, 'Romário Xavier', 0),
(15, 'Wallace Anselmo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_iscas`
--

CREATE TABLE `tb_iscas` (
  `idiscas` int(11) NOT NULL,
  `isca` varchar(15) DEFAULT NULL,
  `tec_isca` varchar(45) DEFAULT NULL,
  `iscaPosicionando` varchar(15) DEFAULT NULL,
  `nIsca` varchar(60) DEFAULT NULL,
  `nTerminal` varchar(60) DEFAULT NULL,
  `nIscaPosicionando` varchar(60) DEFAULT NULL,
  `NumSM` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_iscas`
--

INSERT INTO `tb_iscas` (`idiscas`, `isca`, `tec_isca`, `iscaPosicionando`, `nIsca`, `nTerminal`, `nIscaPosicionando`, `NumSM`) VALUES
(1, 'N', '', 'Não', 'Nao', NULL, NULL, '2336877'),
(2, 'N', '', 'Não', 'Nao', NULL, NULL, '2340999 '),
(3, 'N', '', 'Não', 'Nao', NULL, NULL, '2338647'),
(4, 'N', '', 'Não', 'Nao', NULL, NULL, '2340661'),
(5, 'N', '', 'Não', 'Nao', NULL, NULL, '2340552'),
(6, 'S', 'Sascar', 'Não', '', '30D336000661', NULL, '2343048'),
(7, 'N', '', 'Não', 'Nao', NULL, NULL, '2346999'),
(8, 'S', '807136402', 'Sim', 'Nao', NULL, NULL, '2349194'),
(9, 'N', '', 'Não', 'Nao', NULL, NULL, '2351705'),
(10, 'N', '', 'Não', 'Nao', NULL, NULL, '2349376'),
(11, 'N', '', 'Não', 'Nao', NULL, NULL, '2355481'),
(12, 'N', '', 'Não', 'Nao', NULL, NULL, '2358253'),
(13, 'N', '', 'Não', 'Nao', NULL, NULL, '2354060'),
(14, 'N', '', 'Não', 'Nao', NULL, NULL, '2361100'),
(15, 'N', '', 'Não', 'Nao', NULL, NULL, '2360192'),
(16, 'N', '', 'Não', 'Nao', NULL, NULL, '2362224'),
(17, 'N', '', 'Não', 'Nao', NULL, NULL, '2363887'),
(18, 'N', '', 'Não', 'Nao', NULL, NULL, '2365419'),
(19, 'N', '', 'Não', 'Nao', NULL, NULL, '2361350'),
(20, 'N', '', 'Não', 'Nao', NULL, NULL, '2367132'),
(21, 'N', '', 'Não', 'Nao', NULL, NULL, '2367803'),
(22, 'N', '', 'Não', 'Nao', NULL, NULL, '2369787'),
(23, 'N', '', 'Não', 'Nao', NULL, NULL, '2373100'),
(24, 'N', '', 'Não', 'Nao', NULL, NULL, '2372959'),
(25, 'N', '', 'Não', 'Nao', NULL, NULL, '2373068'),
(26, 'N', '', 'Não', 'Nao', NULL, NULL, '2376999'),
(27, 'N', '', 'Não', 'Nao', NULL, NULL, '2379999'),
(28, 'N', '', 'Não', 'Nao', NULL, NULL, '2383744'),
(29, 'N', '', 'Não', 'Nao', NULL, NULL, '2384379'),
(30, 'N', '', 'Não', 'Nao', NULL, NULL, '2385694'),
(31, 'N', '', 'Não', 'Nao', NULL, NULL, '2351864'),
(32, 'N', '', 'Não', 'Nao', NULL, NULL, '2383244'),
(33, 'N', '', 'Não', 'Nao', NULL, NULL, '2389599'),
(34, 'N', '', 'Não', 'Nao', NULL, NULL, '2393863 '),
(35, 'N', '', 'Não', 'Nao', NULL, NULL, '2388807'),
(36, 'N', '', 'Não', 'Nao', NULL, NULL, '2395444'),
(37, 'N', '', 'Não', 'Nao', NULL, NULL, '2396712'),
(38, 'N', '', 'Não', 'Nao', NULL, NULL, '2391455'),
(39, 'N', '', 'Não', 'Nao', NULL, NULL, '2399456'),
(40, 'N', '', 'Não', 'Nao', NULL, NULL, '2399545'),
(41, 'N', '', 'Não', 'Nao', NULL, NULL, '2401083'),
(42, 'N', '', 'Não', 'Nao', NULL, NULL, '2403305'),
(43, 'N', '', 'Não', 'Nao', NULL, NULL, '2405044'),
(44, 'N', '', 'Não', 'Nao', NULL, NULL, '2405287'),
(45, 'N', '', 'Não', 'Nao', NULL, NULL, '2407790'),
(46, 'N', '', 'Não', 'Nao', NULL, NULL, '2409828'),
(47, 'N', '', 'Não', 'Nao', NULL, NULL, '2411991'),
(48, 'N', '', 'Não', 'Nao', NULL, NULL, '2414929'),
(49, 'N', '', 'Não', 'Nao', NULL, NULL, '2418487'),
(50, 'N', '', 'Não', 'Nao', NULL, NULL, '2419695'),
(51, 'N', '', 'Não', 'Nao', NULL, NULL, '2418999'),
(52, 'N', '', 'Não', 'Nao', NULL, NULL, '2416993'),
(53, 'N', '', 'Não', 'Nao', NULL, NULL, '2393051'),
(54, 'N', '', 'Não', 'Nao', NULL, NULL, '2423618'),
(55, 'N', '', 'Não', 'Nao', NULL, NULL, '2426463'),
(56, 'N', '', 'Não', 'Nao', NULL, NULL, '2428321'),
(57, 'N', '', 'Não', 'Nao', NULL, NULL, '2428294'),
(58, 'N', '', 'Não', 'Nao', NULL, NULL, '2429063'),
(59, 'N', '', 'Não', 'Nao', NULL, NULL, '2431824'),
(60, 'N', '', 'Não', 'Nao', NULL, NULL, '2433371'),
(61, 'N', '', 'Não', 'Nao', NULL, NULL, '2434435'),
(62, 'N', '', 'Não', 'Nao', NULL, NULL, '2436910'),
(63, 'N', '', 'Não', 'Nao', NULL, NULL, '2493310'),
(64, 'N', '', 'Não', 'Nao', NULL, NULL, '2493824'),
(65, 'N', '', 'Não', 'Nao', NULL, NULL, '2475564'),
(66, 'N', '', 'Não', 'Nao', NULL, NULL, '2465543'),
(67, 'N', '', 'Não', 'Nao', NULL, NULL, '24655438'),
(68, 'N', '', 'Não', 'Nao', NULL, NULL, '2467061'),
(69, 'N', '', 'Não', 'Nao', NULL, NULL, '2467012'),
(70, 'N', '', 'Não', 'Nao', NULL, NULL, '2477012'),
(71, 'N', '', 'Não', 'Nao', NULL, NULL, '24777012'),
(72, 'N', '', 'Não', 'Nao', NULL, NULL, '23777012'),
(73, 'N', '', 'Não', 'Nao', NULL, NULL, '33777012'),
(74, 'N', '', 'Não', 'Nao', NULL, NULL, '2461941');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_motoristas`
--

CREATE TABLE `tb_motoristas` (
  `idmotorista` int(11) NOT NULL,
  `Motorista` varchar(150) DEFAULT NULL,
  `CPF` varchar(60) DEFAULT NULL,
  `Vinculo` varchar(60) DEFAULT NULL,
  `NumSM` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_motoristas`
--

INSERT INTO `tb_motoristas` (`idmotorista`, `Motorista`, `CPF`, `Vinculo`, `NumSM`) VALUES
(1, 'MICHEL SERGIO DOS SANTOS', '359904718-90', 'TERCEIRO', '2336877'),
(2, 'JOSE LUIZ MARQUES DA SILVA', '37519158691', 'TERCEIRO', '2340999 '),
(3, 'VALDECIR MULLER', '594083679-87', 'TERCEIRO', '2338647'),
(4, 'JOAO PAULO SOEIRO SILVA', '096395376-16', 'TERCEIRO', '2340661'),
(5, 'JOSE LUIZ DE CARVALHO JUNIOR', '316303578-71', 'TERCEIRO', '2340552'),
(6, 'RINALDO BISPO DO NASCIMENTO ROCHA', '002746595-06', 'AGREGADO', '2343048'),
(7, 'CASSIANO JOSE BERTHOLO', '301705798-40', 'FIXO', '2346999'),
(8, 'DIEGO PEREIRA', '338436058-31', 'TERCEIRO', '2349194'),
(9, 'JOSE LUIZ GUIDO', '045949888-65', 'AGREGADO', '2351705'),
(10, 'ERNANDO RODRIGUES DA SILVA', '009907568-74', 'AGREGADO', '2349376'),
(11, 'ANDERSON LUIS ALVES', '215146138-67', 'TERCEIRO', '2355481'),
(12, 'LUIZ CARLOS DA SILVA', '502850506-30', 'TERCEIRO', '2358253'),
(13, 'SEVERINO MIGUEL DO NASCIMENTO', '004383857-05', 'TERCEIRO', '2354060'),
(14, 'ERALDO GUILHERMINO DA SILVA', '833579474-04', 'TERCEIRO', '2361100'),
(15, 'RENATO MARTINHO ALVES', '069934896-00', 'AGREGADO', '2360192'),
(16, 'PRESLEY DOS PASSOS SANTOS', '017872230-86', 'AGREGADO', '2362224'),
(17, 'JOSUE ALVES SANTOS', '323844908-77', '', '2363887'),
(18, 'WENDEL VAGNER XISTO', '303347978-29', '', '2365419'),
(19, 'TALLYSWAGNER DE OLIVEIRA SANTOS', '061450415-52', 'TERCEIRO', '2361350'),
(20, 'CARLOS ALEXANDRE DOS SANTOS FREITAS', '441293808-50', 'AGREGADO', '2367132'),
(21, 'DELANE DOS REIS MORAIS ROSA', '032827386-41', 'FIXO', '2367803'),
(22, 'PEDRO FELIPE ROZA', '030479770-70', 'AGREGADO', '2369787'),
(23, 'LUIS ALVES PEREIRA DE LIMA', '514778758-59', '', '2373100'),
(24, 'JEFFERSON SERRANO DE OLIVEIRA', '285460888-70', 'AGREGADO', '2372959'),
(25, 'WESLEY CORDEIRO DA SILVA', '472424598-00', '', '2373068'),
(26, 'JEIVISON RIBEIRO DOS SANTOS', '033153090-27', 'AGREGADO', '2376999'),
(27, 'FELIPE FLORA BRUSCHI', '081919266-01', 'AGREGADO', '2379999'),
(28, 'JEFFERSON SERRANO DE OLIVEIRA', '285460888-70', 'AGREGADO', '2383744'),
(29, 'OTAVIO MANOEL SOARES SILVA', '524372338-06', '', '2384379'),
(30, 'HITALLO MATHEUS PEREIRA SILVA', '130263226-44', 'TERCEIRO', '2385694'),
(31, 'REGINA CUNHA MARQUES', '013564366-09', '', '2351864'),
(32, 'ROGERIO GOMES OLIVEIRA', '047505801-12', 'TERCEIRO', '2383244'),
(33, 'ALEXANDRE SILVA DO NASCIMENTO', '109649648-80', 'FIXO', '2389599'),
(34, 'KLEBER ALVES DE FREITAS', '407035598-77', '', '2393863 '),
(35, 'PETERSON ALBERGARIA NASCIMENTO', '058369576-06', 'AGREGADO', '2388807'),
(36, 'PAULO SERGIO DE MORAES', '305453578-96', 'FIXO', '2395444'),
(37, 'EUGENIO LUIZ RIBOSKI', '113465599-10', 'TERCEIRO', '2396712'),
(38, 'TIAGO PEREIRA DA SILVA', '057490969-98', 'FIXO', '2391455'),
(39, 'MARCELO PELICULA FIRMINO JUNIOR', '439958588-99', '', '2399456'),
(40, 'BRUNO MARTINS TEIXEIRA', '342761458-13', '', '2399545'),
(41, 'LUIS ALVES PEREIRA DE LIMA', '514778758-59', '', '2401083'),
(42, 'RODRIGO VITOR DA SILVA', '013371976-61', 'TERCEIRO', '2403305'),
(43, 'PHILIPE ADRIANO DOS SANTOS MARQUES', '137951196-85', 'AGREGADO', '2405044'),
(44, 'ANDERSON LEODRO BRANDÃO', '375619818-99', 'FIXO', '2405287'),
(45, 'ALEXANDRO CINANDES DOS SANTOS', '022419387-26', '', '2407790'),
(46, 'ALINE BARBOSA MELO', '433142768-42', 'AGREGADO', '2409828'),
(47, 'WILLIAN FERNANDES VIEIRA', '108750516-00', 'AGREGADO', '2411991'),
(48, 'GISELE TATIANA SILVA', '219009708-80', 'AGREGADO', '2414929'),
(49, 'CHARLES EDUARDO SANTANA', '326795238-73', '', '2418487'),
(50, 'ALEX FERREIRA SANTOS', '070697864-17', 'TERCEIRO', '2419695'),
(51, 'WAGNER ALVES DOS SANTOS', '264256448-77', 'AGREGADO', '2418999'),
(52, 'EUCLIDES ALVES GUIMARES', '014398729-10', 'AGREGADO', '2416993'),
(53, 'WAISTEN ARLEI CEZAR', '982506636-91', '', '2393051'),
(54, 'JOSINALDO FERREIRA DE MOURA', '205940608-00', 'AGREGADO', '2423618'),
(55, 'ALEXSANDER NASCIMENTO DOS SANTOS', '033592757-21', '', '2426463'),
(56, 'FELIPE SANTOS SILVA', '230487688-90', '', '2428321'),
(57, 'NICOLAS OLIVEIRA PRADO', '404060538-12', 'AGREGADO', '2428294'),
(58, 'JULIANO AUGUSTO BATISTA LEBRON', '145212876-62', 'AGREGADO', '2429063'),
(59, 'ANDRE BELCHIOR DOS SANTOS', '358398338-60', '', '2431824'),
(60, 'GILBERTO APARECIDO PAQUIEL', '066401618-93', '', '2433371'),
(61, 'ELBEM CESAR SILVEIRA', '098714988-10', 'FIXO', '2434435'),
(62, 'SILVAN OLIVEIRA DOS SANTOS', '064871558-29', 'AGREGADO', '2436910'),
(63, 'DEMERSON LUIS DE MOURA', '080339036-00', 'FIXO', '2493310'),
(64, 'CLEBER VINICIUS ANTUNES DA SILVA', '120268516-11', 'AGREGADO', '2493824'),
(65, 'CLEBER VINICIUS ANTUNES DA SILVA', '120268516-11', 'AGREGADO', '2475564'),
(66, 'ANDRE LUIZ ARAUJO DE LIMA', '391845188-71', 'AGREGADO', '2465543'),
(67, 'ANDRE LUIZ ARAUJO DE LIMA', '391845188-71', 'AGREGADO', '24655438'),
(68, 'JOSE ANTONIO DA SILVA FARIA', '917145247-87', 'FIXO', '2467061'),
(69, 'JOSE ANTONIO DA SILVA FARIA', '917145247-87', 'FIXO', '2467012'),
(70, 'JOSE ANTONIO DA SILVA FARIA', '917145247-87', 'FIXO', '2477012'),
(71, 'JOSE ANTONIO DA SILVA FARIA', '917145247-87', 'FIXO', '24777012'),
(72, 'JOSE ANTONIO DA SILVA FARIA', '917145247-87', 'FIXO', '23777012'),
(73, 'JOSE ANTONIO DA SILVA FARIA', '917145247-87', 'FIXO', '33777012'),
(74, 'ROMARIO SILVA DE OLIVEIRA', '129003576-83', 'TERCEIRO', '2461941');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orders`
--

CREATE TABLE `tb_orders` (
  `idorder` int(11) NOT NULL,
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idaddress` int(11) NOT NULL,
  `vltotal` decimal(10,2) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_orders`
--

INSERT INTO `tb_orders` (`idorder`, `idcart`, `iduser`, `idstatus`, `idaddress`, `vltotal`, `dtregister`) VALUES
(3, 19, 1, 3, 17, '4.50', '2018-09-03 03:22:57'),
(4, 19, 1, 1, 18, '1.50', '2018-09-03 03:27:08'),
(5, 22, 1, 1, 22, '1.50', '2018-09-27 20:28:47'),
(6, 22, 1, 1, 24, '1.50', '2018-09-27 20:46:44'),
(7, 27, 1, 3, 25, '1.50', '2018-10-04 00:47:10'),
(8, 27, 1, 3, 26, '1.50', '2017-10-04 02:05:54'),
(9, 28, 1, 3, 27, '100.00', '2018-10-04 02:10:54'),
(10, 30, 1, 3, 28, '1.50', '2018-10-12 18:52:27'),
(11, 30, 1, 3, 29, '101.50', '2018-10-12 22:31:58'),
(12, 30, 1, 3, 30, '115.00', '2018-10-12 23:07:51'),
(13, 30, 1, 3, 31, '215.00', '2018-10-12 23:10:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orderspagseguro`
--

CREATE TABLE `tb_orderspagseguro` (
  `idorder` int(11) NOT NULL,
  `descode` varchar(36) NOT NULL,
  `vlgrossamount` decimal(10,2) NOT NULL,
  `vldiscountamount` decimal(10,2) NOT NULL,
  `vlfeeamount` decimal(10,2) NOT NULL,
  `vlnetamount` decimal(10,2) NOT NULL,
  `vlextraamount` decimal(10,2) NOT NULL,
  `despaymentlink` varchar(256) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_orderspagseguro`
--

INSERT INTO `tb_orderspagseguro` (`idorder`, `descode`, `vlgrossamount`, `vldiscountamount`, `vlfeeamount`, `vlnetamount`, `vlextraamount`, `despaymentlink`, `dtregister`) VALUES
(10, '19DCB6B8-EBFC-4774-8208-4D10A21422B1', '1.50', '0.00', '0.47', '1.03', '0.00', '', '2018-10-12 18:53:08'),
(11, '01D4280C-D4CA-41F9-B37A-5B421C9E180B', '101.50', '0.00', '5.46', '96.04', '0.00', '', '2018-10-12 22:32:28'),
(12, '4C020E4A-E59B-4CF1-8C05-563C9B3862DF', '115.00', '0.00', '20.43', '94.57', '0.00', '', '2018-10-12 23:08:33'),
(13, '75536402-AAEE-4921-93B3-E294E7082857', '215.00', '0.00', '37.85', '177.15', '0.00', '', '2018-10-12 23:10:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ordersstatus`
--

CREATE TABLE `tb_ordersstatus` (
  `idstatus` int(11) NOT NULL,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ordersstatus`
--

INSERT INTO `tb_ordersstatus` (`idstatus`, `desstatus`, `dtregister`) VALUES
(1, 'Em Aberto', '2017-03-13 03:00:00'),
(2, 'Aguardando Pagamento', '2017-03-13 03:00:00'),
(3, 'Pago', '2017-03-13 03:00:00'),
(4, 'Entregue', '2017-03-13 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_persons`
--

CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL,
  `desperson` varchar(64) NOT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_persons`
--

INSERT INTO `tb_persons` (`idperson`, `desperson`, `desemail`, `nrphone`, `dtregister`) VALUES
(1, 'Administrador Teste', 'wellington.victalino@gmail.com', 2147483647, '2017-03-01 03:00:00'),
(7, 'Suporte', 'suporte@casadedonabrasilina.com.br', 1112345678, '2017-03-15 16:10:27'),
(9, 'Flavia Martins', 'rastreamento@mundialrisk.com.br', 1199, '2018-10-13 16:54:00'),
(11, 'Joao Sampaio', 'joao@sandbox.pagseguro.com.br', 42062433, '2018-10-13 16:57:53'),
(12, 'Sheilany Dias', 'lider.jti@mundialrisk.com.br', 11959276910, '2018-10-13 16:59:59'),
(13, 'WELLINGTON VICTALINO SAMPAIO', 'wellington.victalino@gmail.com', 11956887456, '2018-10-13 17:00:38'),
(14, 'Kevin Leoni', 'rastreamento@mundialrisk.com.br', 1199, '2018-10-13 17:13:55'),
(16, 'Ingrid Karolina', 'supervisao@mundialrisk.com.br', 1199, '2023-01-05 19:32:05'),
(17, 'Wellington Barros', 'wellington.barros@mundialrisk.com', 1199, '2023-01-09 13:04:18'),
(18, 'Caliane Pereira', 'supervisao@mundialrisk.com.br', 1199, '2023-01-19 13:13:14'),
(19, 'Danilo Marques', 'supervisao@mundialrisk.com.br', 1199, '2023-01-19 13:32:33'),
(20, 'Murilo Reis', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-19 13:33:23'),
(21, 'Sarajane Ferreira ', 'supervisao@mundialrisk.com.br', 1199, '2023-01-19 13:34:30'),
(22, 'Maria Luiza', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-19 13:35:01'),
(23, 'Jessica Maria', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-19 13:37:26'),
(24, 'Inaria Leite', 'supervisao@mundialrisk.com.br', 1199, '2023-01-19 13:38:05'),
(25, 'Andressa Oliveira', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-19 14:53:12'),
(26, 'Denys Fagundes', 'denys.fagundes@mundialrisk.com.br', 1199, '2023-01-20 11:31:59'),
(27, 'Flavia Martins', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-20 14:01:40'),
(28, 'Flavia Martins', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-20 14:03:01'),
(29, 'Flavia Martins', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-20 14:06:47'),
(30, 'Flavia Kelly', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-20 14:13:22'),
(31, 'Natan do Nascimento', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-26 16:10:11'),
(32, 'Carla Bessa', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-26 16:10:59'),
(33, 'Fabiola Nascimento', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-26 16:12:06'),
(34, 'Alex Colombi', 'rastreamento@mundialrisk.com.br', 1199, '2023-01-26 16:13:13'),
(35, 'Thiago Catalani', 'thiago.catalani@mundialrisk.com.br', 1199, '2023-02-03 14:21:54'),
(36, 'Caliane De Sá', 'lider.dcenter@mundialrisk.com.br', 1199, '2023-03-16 15:18:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_products`
--

CREATE TABLE `tb_products` (
  `idproduct` int(11) NOT NULL,
  `desproduct` varchar(64) NOT NULL,
  `vlprice` decimal(10,2) NOT NULL,
  `vlfilling` varchar(150) NOT NULL,
  `vlweight` decimal(10,2) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_products`
--

INSERT INTO `tb_products` (`idproduct`, `desproduct`, `vlprice`, `vlfilling`, `vlweight`, `desurl`, `dtregister`) VALUES
(15, 'Doce Thor', '1.50', '', '2.00', 'doce-thor', '2018-07-08 16:43:01'),
(16, 'Doce Escudo CapitÃ£o AmÃ©rica', '1.50', '', '2.00', 'doce_escudo_capitao_america', '2018-07-08 17:21:40'),
(17, 'Doce Concha Diamante', '1.50', '', '2.00', 'doce_concha_diamante', '2018-07-08 17:22:09'),
(18, 'Doce Capacete do Homem de Ferro', '1.50', '', '2.00', 'Doce_Capacete_do_Homem_de_Ferro', '2018-07-08 17:22:29'),
(19, 'Bolo  Biblía Aberta', '1.50', 'Bolo de Chocolate com recheio de Morango', '2.00', 'Bolo  Biblía Aberta', '2018-07-08 17:24:58'),
(20, 'Bolo Branca de Neve', '100.00', '', '2.00', 'bolo branca de neve', '2018-10-04 02:10:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_productscategories`
--

CREATE TABLE `tb_productscategories` (
  `idcategory` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_productscategories`
--

INSERT INTO `tb_productscategories` (`idcategory`, `idproduct`) VALUES
(4, 15),
(4, 16),
(4, 17),
(4, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_seguradoras`
--

CREATE TABLE `tb_seguradoras` (
  `idseguradora` int(11) NOT NULL,
  `nomeSeguradora` varchar(150) NOT NULL,
  `inativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_seguradoras`
--

INSERT INTO `tb_seguradoras` (`idseguradora`, `nomeSeguradora`, `inativo`) VALUES
(1, 'SOMPO SEGUROS', 0),
(2, 'AXA XL', 0),
(3, 'ALLIANZ SEGUROS', 0),
(4, 'LIBERTY', 0),
(5, 'HDI GLOBAL SEGUROS', 0),
(6, 'HDI GLOBAL SEGUROS', 0),
(7, 'ESSOR', 0),
(8, 'MAPFRE', 0),
(9, 'ARGO SEGUROS', 0),
(10, 'TOKIO MARINE', 0),
(11, 'CHUBB', 0),
(12, 'FAIRFAX SEGUROS', 0),
(13, 'EZZE SEGUROS', 0),
(14, 'PLATINUM', 0),
(15, 'MITSUE', 0),
(16, 'QBE SEGUROS', 0),
(17, 'PORTO SEGURO', 0),
(18, 'AIG SEGUROS', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sinistros`
--

CREATE TABLE `tb_sinistros` (
  `idsinistro` int(11) NOT NULL,
  `dtComunicado` datetime DEFAULT NULL,
  `dtSinistro` datetime DEFAULT NULL,
  `localSinistro` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `latitude` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `longitude` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `Km` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `tipoSinistro` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `nomeComunicante` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `NumSM` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Descritivo` varchar(10000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_sinistros`
--

INSERT INTO `tb_sinistros` (`idsinistro`, `dtComunicado`, `dtSinistro`, `localSinistro`, `latitude`, `longitude`, `Km`, `tipoSinistro`, `nomeComunicante`, `NumSM`, `Descritivo`) VALUES
(1, '2023-01-20 09:20:00', '2023-01-19 21:13:00', 'BR-060 - Condomínio Anhanguera, Goiânia - GO', '-16.7207', '-49.3714', '165', 'Roubo de carga', 'Hilary', '2336877', '        Veiculo citado acima, gerou eventos informados. Acionamento realizado junto a central de ocorrências da Sascar, retornou informando que equipe encontrou equipamentos do rastreador do veiculo jogado no matagal, acionamento policial reforçado, em busca de veiculo e carga.                                          '),
(2, '2023-01-21 04:11:00', '2023-01-21 03:57:00', 'Santa Cruz, Betim/MG', '-19.956628228504844', '-44.14220488865539', '490', 'Roubo de carga', 'Luiz Felipe Marques', '2340999 ', '        Nossa central realizava o rastreamento do auto carga de placa: GNV1706, solicitação de número 2340999 quando às 03:57hs, imediatamente foi enviado os comandos de segurança como bloqueio, sirene e trava do baú. \r\n\r\nRealizamos o contato através do telefone (27) 999129808 onde quem nos atendeu foi a esposa do condutor que nos reportou que o condutor, e o filho do casal estavam rendidos por meliantes que estavam realizando o roubo da carga. \r\n\r\nRealizamos o acionamento policial através do telefone da PRF 191 onde a civil Naia coletou os dados pertinentes do sinistro e informou que a equipe mais próxima será deslocada ao ocorrido. \r\n\r\nRealizamos contato com o Sr. Marcelo da transportadora Favorita através do telefone (11) 94962-1040 onde este nos solicitou que uma equipe de campo fosse deslocada. Equipe do prestador On System em deslocamento. \r\n\r\nRealizamos um novo contato com telefone (27) 999129808 onde o filho do condutor nos informa que no momento em que a sirene do veículo tocou, ele e seu pai sairam para verificar o que se tratava, onde foram abordados por meliantes com posse de arma de fogo, que os ameaçaram e os colocaram no baú do veículo. Neste contato, fomos informados que a carga foi colocada em um veículo de modelo HR, onde os meliantes evadiram-se do local.\r\n\r\nSr. Luiz Felipe Marques nos informa que no local encontra-se duas viaturas do policiamento local realizando a confecção do Boletim de Ocorrência, e que foi enviado uma equipe de pericia ao local devido ao fato do modo de abordagem dos meliantes.\r\nSr. Marcelo da transportadora orienta a central a coletar os dados pertinentes ao sinistro e orientar o condutor a seguir viagem. \r\n       '),
(3, '2023-01-23 02:33:00', '2023-01-23 02:00:00', 'BR-040, 85 - A Definir Em Campo, Contagem - MG, 32150-193', '-19.873341', '-44.055690', '08', 'Tentativa', 'VALDECIR MULLER', '2338647', '        Nossa central realizava o rastreamento do auto carga de placa: IQM1B78, solicitação de monitoramento: 2338647 quando por volta das 00:11hs gerou evento de violação de baú , imediatamente foi enviado os comandos de segurança para o veículo devido a violação e o desvio de rota, realizamos contato com o condutor Sr. Valdecir através do telefone (47) 99646-8726 onde o mesmo confirmou os dados e informa que iria verificar, condutor informou que estava tudo bem e enviou as fotos para nossa central. \r\n\r\nPor volta das 02:33hs veículo retornou a gerar a violação de baú, sendo assim realizamos o contato novamente com o condutor onde o mesmo informou que um meliante tentou abrir o baú do veículo, imediatamente foi enviado os comandos de segurança e realizada as devidas confirmações, realizamos acionamento policial no 18º batalhão através do telefone (31) 3201-0229 em contato com o PM Pascoal onde o mesmo coletou os dados e informa que ira enviar uma VTR ao local. \r\n\r\nCondutor se deslocou para outro posto, onde por volta de 03:30 o mesmo comunicou que conseguiram levar parte da carga e identificou que a trava do baú estava quebrada e com lacre violado.\r\n\r\nImediatamente retornamos contato com PM Pascoal, onde informamos o ocorrido, o mesmo disponibilizou contato do batalhão responsável pela região, realizamos tentativa de contato com o 40º batalhão no número (31) 3036-0750, porem, sem sucesso.\r\n\r\nDevido a tentativa de roubo foi enviado uma equipe de Pronta resposta no local para realizar averiguação e preservação da carga.\r\n\r\nEm posse de maiores informações reportaremos.            '),
(4, '2023-01-23 15:47:00', '2023-01-23 15:00:00', 'Nossa Sra. Aparecida, Vitória da Conquista - BA', '-14.4931', '-40.5051', '03', 'Acidente', 'Leandro Aguiar', '2340661', 'Veiculo citado envolvido em acidente com vitimas e adernamento da carga transportada.'),
(5, '2023-01-24 12:13:00', '2023-01-24 12:00:00', 'BR-116 (Rod. Santos Dumont), KM 263, Teófilo Otoni - MG. ', '17°44\'46.1\"S', '41°29\'53.1\"W', '263,00', 'Acidente', 'JOSE LUIZ DE CARVALHO JUNIOR', '2340552', 'A nossa central realizava o rastreamento do auto carga quando em andamento perdeu o sinal na BR-116 (Rod. Santos Dumont), KM 263, Teófilo Otoni - MG. \r\nO condutor Sr. JOSE LUIZ DE CARVALHO JUNIOR, entrou em contato com a CM, pelo número: (11) 98436-2734, informando que teve que ir até um posto para conseguir o contato com a nossa central e completou que havia sofrido um acidente e o local era perigoso. Pediu para avisarmos a TDM. Passamos a situação no grupo da TDM onde o Sr. Fabio Borges, Coordenador da TDM autorizou o envio da equipe de campo.'),
(6, '2023-01-25 11:00:00', '2023-01-25 10:00:00', 'Oliveira, MG, 35540-000', '20°43\'49.1\"S', '44°46\'22.8\"W', '617', 'Roubo de carga', 'Central ', '2343048', '                Veículo gerou botão de pânico. Central tentou contato com o condutor, porém sem sucesso, informamos ao transportador, ao qual não havia dado retorno.  \r\nAcionamento PRF ativo, viaturas já em deslocamento, foram até o local e não localizaram o veículo localizaram apenas o equipamento do rastreador, estamos em contato com a PRF via whatsapp e estão buscando na região.\r\n\r\nAcionamento sascar realizado Atendente: Flaviane 4002-6004  \r\nAndressa - Central de ocorrencias: Protocolo 01796023 / Jhenifer - 01796111             '),
(7, '2023-01-26 10:58:00', '2023-01-26 10:58:00', 'Jardim Mutinga, Barueri - SP, 02675-031 ', '-23.49702426294773', '-46.81687557937349', 'KM 12', 'Incêndio', 'Cassiano Jose Bertholo', '2346999', 'Descrição ocorrecia e tratativas: O condutor do veículo em questão entrou em contato com a central às 10:52 informando que havia parado na via pois a roda da carreta travou e estava saindo fumaça. Logo na sequência às 10:58 o condutor informou que a roda havia pegado fogo e que o fogo estaria se alastrando com velocidade sobre a carreta. O condutor ainda usou o extintor de incêndio o auto para tentar apagar o fogo mas sem sucesso.\r\n\r\n26/01 às 10:58 – Condutor informou acentral quanto ao incêndio na carreta\r\n26/01 às 11:05 – Cotação de PR\r\n26/01 às 11:08 – Comunicado no grupo Reckitt x Liran\r\n26/01 às 11:10 – Cliente informou que não seria necessário PR\r\n26/01 às 11:12 – Acionamento CCR (concessionaria da via) finalizado com a atendente Keity (Foram acionados PRF + concessionária + corpo de bombeiros)\r\n26/01 às 11:17 – Acionamento junto a seguradora Pamcary junto ao atendente Renan (Protocolo N°456064)\r\n26/01 às 11:23 – Acionamento direto ao corpo de bombeiros (193) onde fomos informados que já haviam equipe no local\r\n26/01 às 11:24 – Condutor informou a central que o fogo havia sido controlado.\r\n26/01 às 11:56 – Atendente Renan da Pamcary nos informou que o inspetor chegaria ao local por volta das 12h30\r\n26/01 às 12:27 – Chegada da equipe Pamcary junto com o inspetor \r\n26/01 às 12:27 - Representantes do transportador no local está enviando veículo de transbordo e equipe de ajudantes para transferência das mercadorias e limpeza.'),
(8, '2023-01-29 05:58:00', '2023-01-28 22:22:00', 'Rodovia Raposo Tavares, Assis-SP', '-22.630480', '-50.528320 ', 'KM 457', 'Roubo de carga', 'Marcos Antonio (TDM)', '2349194', 'INFORMO QUE O ESTAVAMOS MONITORANDO O VEICULO QUANDO AS 22:22 HS GEROU ALERTA DE BOTAO DE PANICO, IMEDIATAMENTE FORAM ENVIADOS OS COMANDOS DE SEGURANÇA, REALIZAMOS TENTATIVA DE CONTATO COM O CONDUTOR DIEGO PEREIRA ESCRITO NO CPF 338.436.058-31, ATRAVEZ DO NUMERO (19) 99630-6930, POREM SEM SUCESSO, DE IMEDIATO FOI ACIONADO A TRANSPORTADORA TDM E O GERENTE DA CONTA SENHOR WALLACE, O GERENTE DA CONTA REALIZOU O ACIONAMENTO 190 COM A CIVIL ISANA RECOLHEU OS DADOS E FICOU DE FAZER UM ALERTA NA REGIÃO Nº DO TALÃO DE ACIONAMENTO: 1772, ACIONAMENTO PELA CENTRAL NO SINARF,  FEITO TENTATIVA DE CONTATO TAMBÉM : 01433431191 POLÍCIA MILITAR DO ESTADO DE SÃO PAULO; 01433431106 DELEGACIA DE POLÍCIA DE CANITAR E 01433248182 DELEGACIA SECCIONAL DE POLÍCIA DE OURINHOS, SEM SUCESSO SENDO AUTORIZADO A ACIONAR O PRONTA RESPOSTA MAIS PROXIMA DO LOCAL, PR SOMBRA FOI ACIONADA. O AGENTE FOI NO LOCAL DA PERDA POREM NÃO ENCONTROU O VEICULO OS MESMO REALIZOU A VARREDURA NO LOCAL, OS RESPONSAVEIS TRANSPOTADORAINFORMARAM A LOCALIZAÇÃO DA ISCA QUE ESTAVA POSICIONANDO, PR DESLOCOU ATE O LOCAL DA ISCA POREM SEM SUCESSO, FEITO ACIONAMENTO DO ANTENISTA NO LOCAL DA POSIÇÃO DA ISCA, O MESMO FOI ATE O LOCAL E LOCALIZOU DENTRO DA CARRETA POREM ESTAVA COM OUTRO CAVALO, FEITO CONTATO COM O POSTO POLICIAL MAIS PROXIMO, RECUPERADO A CARGA, GOLDEN SAT NO LOCAL REALIZANDO A PRESERVAÇÃO, VEICULO AGUARDADO O TRANSBORDO DO CAVALO.'),
(9, '2023-01-30 15:06:00', '2023-01-30 14:00:00', 'RUA: CADIRIRI, 1300 PARQUE DA MOOCA CEP: 03109-050', '-23.57647118215604', '-46.59658736505545', '1300', 'Carga danificada', '', '2351705', 'A Central de Monitoramento realizava o tele monitoramento do veículo, quando recebemos a informação do Thiago Leão, nos informando que assim que o veículo chegou ao seu destino, o cliente verificou que houve uma molhadura na carga.'),
(10, '2023-01-30 15:05:00', '2023-01-30 15:05:00', 'Av. dos Estado Unidos - Distrito Industrial, São Simão/SP', '-21.456851180083177', '-47.580547241140145', '1200', 'Carga danificada', '', '2349376', 'Nossa central realizava o rastreamento do auto carga de placa: DPE7G97, solicitação de monitoramento: 2349376 quando por volta das 15:00 a transportadora GTI-LOG nos reportou via e-mail, que pós entrega, o cliente alega que a carga havia sofrido molhadura, sendo necessário realizar acionamento junto a seguradora Sompo para que seja feita a devida averiguação. \r\nDesta forma, o acionamento foi feito através do telefone 0800 723 3002 onde o atendente Renato coletou os dados pertinentes ao sinistro e registrou em sistema, gerando o seguinte protocolo: ST2212018997. '),
(11, '2023-02-02 10:20:00', '2023-02-02 10:00:00', 'Estr. Guarulhos-Nazaré - São João', '-23.401434', '-46.448314', '38', 'Acidente', 'Talita Verdeiro (Transportador)', '2355481', 'Veículo tele monitorado, fomos informados via e-mail que o mesmo tombou na rodovia, expondo totalmente a carga. Condutor foi hospitalizado, PR em preservação até a chegada da reguladora no local. '),
(12, '2023-02-03 12:35:00', '2023-02-03 16:55:00', 'Itabirito/MG', '-20.254518300000', '-43.961791300000', '576', 'Deslizamento de carga', 'Pedro Felisberto (Transportadora) ', '2358253', 'Veículo em questão foi bloqueado na rodovia, devido eventos gerados em sistema, com isso a carga acabou deslizando. Houve a solicitação para acionamento da seguradora. '),
(13, '2023-02-05 10:19:00', '2023-02-04 22:03:00', 'R. Maria A De Souza Diniz Guimaraes, 750 - Chácaras Rio Pardo, Ribeirão Preto - SP, 14073-805', '21°06\'01.0\"S ', '47°47\'19.0\"W', '', 'Roubo de carga', 'Lucas / tdm', '2354060', 'Condutor informou duas motos suspeitas, próximo ao local onde iria pernoitar. Após informar pernoite, perdeu sinal minutos depois, onde vieram as violações de bateria, painel, desvio de rota! '),
(14, '2023-02-06 14:40:00', '2023-02-06 15:00:00', 'Rod. Santos Dumont, 850 - Parque Santa Lucia, Duque de Caxias - RJ, 25211-000', '22°40\'18.5\"S', '43°16\'39.0\"W', '143', 'Roubo de carga', 'Mundial Risk', '2361100', 'Tentativa de acionamento PRF na região, sem sucesso. 021 3503-2311\r\n021 3503-2342 \r\n021 3503-9000\r\n021 3503-2363\r\n021 3503-2341 /  21 2333-8415 - Militar RJ                                                                                                                                                                                                                                          Realizamos contato com o condutor Elder 11 95464 2771 às 18h26, onde o mesmo informou que foi abordado no endereço supracitado por dois meliantes que o levaram junto com o veículo para uma comunidade proxima, realizaram a descarga da mercadoria e liberaram o condutor junto com o veículo. O mesmo estava junto com Cabo Alcantra e Mayara, indo para a delegacia realizar o b.o de ocorrência.  '),
(15, '2023-02-07 08:56:00', '2023-02-07 08:00:00', 'Rod. Pres. Dutra, Itatiaia - RJ', '-22.48012353512217,', '-44.53537807983572', '315', 'Carga danificada', 'Seguro Carga', '2360192', 'A Central de Monitoramento realizava o monitoramento do veículo, quando recebemos a informação da Seguro Carga, informando que assim que o condutor chegou no cliente, houve avarias na carga.'),
(16, '2023-02-07 14:20:00', '2023-02-07 11:04:00', 'R. República', '-29.8993', '-51.1998', '810', 'Roubo de carga', 'Alexandre Arantes ', '2362224', '                Informo que estávamos monitorando o veiculo quando por voltas das 14:20 hs recebemos a informação que o veículo havia sido sinistrado, imediatamente entramos em contato com o condutor que nos contou os detalhes do ocorrido, ele estava na 21º entrega quando estava estacionando o carro no cliente veio um meliante armado batendo no vidro da porta anunciando o assalto e abrindo a porta do carona ocasionando alarme e bloqueio no carro, o condutor ainda tentou movimentar o carro a fim de se livrar do meliante porém sem sucesso, sobre fortes ameaças seguiu o que o bandido falava e o ajudou a descarregar a mercadoria, logo após foi liberado e pelo retrovisor o mesmo viu que um corsa cinza chumbo se aproxima e o meliante estava guardando a mercadoria, e para deslocar o carro do local o motorista solicitou comando a central e estava tão nervoso com a situação que não pressionou o botão de pânico e nem digitou a senha de sinistro e não pensou em avisar a central na hora que estava pedindo o comando que havida sido assaltado, depois o mesmo tentou ligar para 190 porém sem êxito como estava perto de um batalhão ele foi até o local fazer o boletim, e avisou a transportadora sobre o ocorrido. Segue para o conhecimento.             '),
(17, '2023-02-08 11:28:00', '2023-02-08 11:17:00', 'R. Deocleciano de Oliveira Filho', '-23.6686', '-46.7559', '546', 'Roubo de carga', 'Norman Marques ', '2363887', 'Informo que monitorávamos o veículo quando as 11:16 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida tentamos contato porém sem sucesso estava dando que o condutor estava em outra ligação, recebemos a confirmação do roubo pelo P.A que nos informou que o condutor estava em ligação com ele, mediante da confirmação foi feito o acionamento policial. Logo após conseguimos contato com o condutor que nos informou os detalhes do ocorrido, ele estava no cliente e foi destravar o baú para a ajudante pegar a mercadoria que seria entregue no cliente, quando foi abordado por dois meliantes anunciando o assalto e insinuando que estava armado e solicitando que abrisse o baú , o baú foi aberto e levado a mercadoria de 5 nota e se evadiram a pé do local, dando oportunidade do condutor pressionar o botão de pânico. Segue para o conhecimento. '),
(18, '2023-02-09 14:24:00', '2023-02-09 14:22:00', 'Av. Brg. Faria Lima, 1000 - Pinheiros', '-23.573200', '-46.694900', 'Número 1000 ', 'Roubo de carga', 'Wendel Vagner Xisto', '2365419', '        INFORMO QUE ESTAVAMOS MONITORANDO O VEICULO QUANDO ENTRAMOS EM CONTATO COM O CONDUTOR, SE- ESTAVA TUDO OK COM AS ENTREGAS AS 14:25 HS AFIRMOU QUE ACABAVA DE SER SINISTRADO, IMEDIATAMENTE FOI ENVIADO O COMANDO DE SEGURANCA, MEDIANTE DO OCORRIDO FOI FEITO ACIONAMENTO POLICIAL NO 190 COM ATENDENTE SABRINA, LOGO APOS FOI QUESTIONADO O CONDUTOR WENDEL VAGNER XISTO SOBRE OS FATOS OCORRIDOS. QUE NOS CONFIRMOU QUE FOI SINISTRADO, ENQUANTO ESTAVA JUNTO COM O AJUDANTE ATRAS DO VEICULO COM AS MACROS DE CHEGADA  AO CLIENTE E COM O BAU ABERTO SEPARANDO A MERCADORIA PARA REALIZAR ENTREGA EM SEGUIDA, QUANDO ESTAVAM SEPARANDO A MERCADORIA VEIO UM MELIANTE SUSPEITO E SUBTRAIU UM PACOTE DE CIGARRO COM 10 UNIDADES, E LOGO APOS SE EVADIU DO LOCAL A PE. O CONDUTOR FOI ORIENTADO A SEGUIR PARA UMA DELEGACIA MAIS PROXIMA PARA REALIZAR AS DEVIDAS TRATATIVAS JUNTO AS AUTORIDADES LOCAIS.      '),
(19, '2023-02-09 23:25:00', '2023-02-09 22:12:00', 'BR 153 - Centralina/MG ', '-18.637546675981863', '-49.18002965582137', '27', 'Furto', 'Tallyson ', '2361350', 'Nossa central realizava o rastreamento do auto carga quando por volta das 22:12hs gerou evento de parada indevida em local proibido, identificamos que o condutor cadastrado em SM não estava com o veículo e reportamos no grupo da TDM por volta 22:33hs porem sem retorno da transportadora. As 23:25hs o condutor correto Sr. Tallyson entrou em contato informando que a carga estaria sendo saqueada o mesmo informou que parou no local devido uma pane mecânica no veículo, sendo assim imediatamente acionamos o Fabio da transportadora TDM através do telefone (62) 99812-1428 onde o mesmo autorizou o envio de uma equipe de PR, realizamos tentativa de acionamento policial na região através do telefone: PRF de Morrinhos/GO - (64) 3413-4166, PRF de Frutal - (34) 3459-0100, PRF de Uberlândia/MG - (34) 99806-3523, PRF de Araguari - (34) 99811-0937 sem sucesso, realizado contato na PRF de Catalão/GO através do telefone (62) 3216-8895 em contato com o agente Serafim que informou não atender a região sendo assim realizamos acionamento via Sinarf.\r\nRealizamos tentativa de acionamento na central de roubos e furtos da sascar via 0800 648 6003 em contato com atendente Daniele onde a mesma informou que não consegue enviar equipe no local apenas com roubo confirmado para enviar um antenista. Ao chegar no marco zero foi identificado que a carga havia sido saqueada porem não temos a informação de quanto da carga foi levada. Em posse de maiores informações reportaremos. '),
(20, '2023-02-10 11:50:00', '2023-02-10 11:25:00', 'Av. Ver. João Batista Fitipaldi', '-23.5261 ', '-46.3048', '1043', 'Roubo de carga', 'Norman Marques ', '2367132', 'Informo que o monitorávamos o veiculo quando por volta das 11:30 hs gerou alerta de Jammer, imediatamente foi enviado o comando de segurança em seguida entramos em contato com o condutor porém sem sucesso, mediante do ocorrido foi passado a informação para o P.A, as 11:36 hs gerou alerta de porta e como não tínhamos contato com o condutor foi feito acionamento policial, logo após recebemos a confirmação do sinistro, conseguimos contato com o motorista que nos relatou como que foi o ocorrido, o mesmo estava saindo de um ponto de venda quando foi abordado por um meliante anunciando o assalto e solicitando que o ajudante adentrasse no baú, feito isso ele seguiu com o condutor para a cabine onde deu as instruções para o mesmo deslocar o carro para outro local, chegando no local na  R. da Paz, 19a - Vila Zeferina, Itaquaquecetuba - SP,  a porta do carona foi aberta o que ocasionou o bloqueio e sirene no carro, condutor aproveitou e pressionou o botão de pânico para avisar a central enquanto o meliante se direcionava para o baú ,a porta do baú foi violada e retirada a mercadoria. Segue para o conhecimento. '),
(21, '2023-02-10 19:58:00', '2023-02-10 18:08:00', 'Rodovia Anchieta São Paulo, Bairro Casqueiro', '-23.928274', '-46.395820', '60', 'Acidente', '', '2367803', 'Nossa central realizava o rastreamento do auto carga de placa: RNH5B16, solicitação de monitoramento: 2367803 quando por volta das 19:58hs recebemos a informação que o veículo havia tombado, imediatamente realizamos contato com o condutor Sr. Delane através do telefone (35) 99127-4237 o mesmo confirmou os dados e informou esta hospitalizado e que ao sair filial o auto carga veio a tombar devido a pista esta em obras no local, sendo assim realizamos o acionamento junto a seguradora HDI Global 0800 772 1233, onde falamos com atendente Luiz que coletou todas as informações da ocorrência para enviar um perito no local registrando o Processo: 052858. Em posse de maiores informações reportaremos. '),
(22, '2023-02-13 14:46:00', '2023-02-13 14:43:00', 'Rua da Infância ', '-30.0000 ', '-51.0993', '209', 'Roubo de carga', 'Pedro ', '2369787', '        Informo que monitorávamos o veiculo quando as 14:43 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida entramos em contato com o condutor que nos informou que foi sinistrado quando estava saindo do ponto de venda na rua da infância altura do numero 209 as 14:34 hs , o mesmo foi abordado por dois meliantes anunciando o assalto e  solicitando  que entrasse no carro e ficasse no banco do carona e que desse os comandos no teclado para o veiculo se deslocar, um dos meliantes entrou pela porta do motorista e deslocou o carro para outro local, chegando no local R. Dom Hélder Câmara, 336 - Santa Rosa de Lima, Porto Alegre - RS, foi passado macro de cliente e destravado o baú com o mesmo destravado foi retirado a mercadoria e os meliantes jogaram o celular do motorista dentro do baú e fecharam a porta e ameaçaram o condutor se caso o mesmo não colaborasse, logo após ser liberado o motorista deslocou o veiculo para outro lugar a fim de pedir ajuda e pressionou o botão de pânico para nos avisar sobre o ocorrido, ele parou em supermercado aonde conseguiu fazer o 190 na 20º batalhão de policia militar. Segue para o conhecimento.       '),
(23, '2023-02-15 08:53:00', '2023-02-15 08:46:00', 'Rua Martinho de Sousa', '-23.4998 ', '-46.4760', '693-533 ', 'Roubo de carga', 'Luiz Alves ', '2373100', 'Informo que monitorávamos o veiculo quando por volta das 08:53 hs o condutor nos informou que foi sinistrado quando estava em um ponto de venda, e foi abordado por 1 meliante anunciando assalto e solicitando que o condutor deslocasse o carro para outro lugar, chegando no local indicado foi dado macro de cliente e destravado o baú e feito o transbordo da carga para uma fiorino que estava aguardando no local com mais 2 meliantes, logo após liberaram o condutor e o ajudante. Segue para o conhecimento. '),
(24, '2023-02-15 16:20:00', '2023-02-15 16:17:00', 'Rua Professor Aurélio Arrobas Martins- Jardim Lucélia, São Paulo - SP', '-23.7603', '-46.6734', 'Número 370', 'Roubo de carga', '', '2372959', 'INFORMO QUE MONITORAVAMOS O VEICULO QUANDO POR VOLTA DAS 16:17 HS GEROU O ALERTA DE BOTAO DE PANICO, IMEDITAMENTE FOI ENVIADO O COMANDO DE SEGURANCA, EM SEGUIDA TENTAMOS CONTATO COM A CONDUTORA POREM SEM SUCESSO, MEDIANTE DO OCORRIDO FOI REALIZADO O ACIONAMENTO POLICIAL NO 190, LOGO APOS CONSEGUIMOS CONTATO COM A CONDUTORA NO TEL: +55 11 95147-6426 QUE NOS RELATOU QUE FOI SINISTRADO, QUANDO ESTAVA EM UMA DAS ENTREGAS, ELA PAROU PARA FAZER A ENTREGA PDV, QUANDO FOI RETORNAR PARA O VEICULO FOI ABORDADA POR DOIS MELIANTES ARMADOS EM CIMA DE UMA MOTO, UM DOS MELIANTES ENTROU NO CARRO E SOLICITOU QUE A MESMO DESLOCASSE O CARRO PARA OUTRO LOCAL E QUE ENVIASSE AS MACROS CORRETAS PARA NÃO LEVANTAR SUSPEITAS, CHEGANDO EM UM LOCAL MENOS VISADO. FOI ENVIADO MACRO DE CLIENTE E COM A SENHA PADRÃO DO CONDUTOR CONSEGUIRAM DESTRAVADO O SAQUEARAM ALGUMAS CAIXAS GRANDES E LOGO APOS SE EVADIRAM DO LOCAL A PE. O CONDUTOR FOI ORIENTADO A SEGUIR PARA UMA DELEGACIA MAIS PROXIMA REALIZAR AS DEVIDAS TRATATIVAS JUNTO AS AUTORIDADES LOCAIS.'),
(25, '2023-02-15 17:29:00', '2023-02-15 17:24:00', 'R. Edgard Pinto César Parque Santa Madalena, São Paulo - SP, 03982-150', '-23.613500', '-46.507600', '399', 'Roubo de carga', '', '2373068', 'INFORMO QUE MONITORAVAMOS O VEICULO QUANDO POR VOLTA DAS 17:30 HS AJUDANTE GUILHERME CORDEIRO ENTROU EM CONTATO INFORMANDO QUE FOI SINISTRADO, IMEDITAMENTE FOI ENVIADO O COMANDO DE SEGURANCA, EM SEGUIDA TENTAMOS NOVAMENTE COM O CONTATO COM O AJUDANTE, MEDIANTE DO OCORRIDO FOI REALIZADO O ACIONAMENTO POLICIAL NO 190, LOGO APOS CONSEGUIMOS CONTATO COM O CONDUTOR NO TEL: 011989328364 QUE NOS RELATOU QUE FOI SINISTRADO, QUANDO ESTAVA EM UMA DAS ENTREGAS, AGUARDANDO O AJUDANTE RETORNAR PARA O VEICULO QUANDO FOI ABORDADA POR 4 MELIANTES NÃO APRESENTANDO ARMA DE FOGO, UM DOS MELIANTES TENTARAM ARROMBAR A TRAVA DO BAU POREM SEM SUCESSO, FOI SAQUEADO A MERCADORIA QUE ESTA NA CABINE JUNTO DO AJUDANTE E LOGO APOS SE EVADIRAM DO LOCAL A PE. O CONDUTOR FOI ORIENTADO A SEGUIR PARA UMA DELEGACIA MAIS PROXIMA REALIZAR AS DEVIDAS TRATATIVAS JUNTO AS AUTORIDADES LOCAIS.'),
(26, '2023-02-17 09:17:00', '2023-02-17 09:10:00', 'Rua Guarani ', '-29.6865 ', '-51.1488', '116', 'Roubo de carga', 'Jeivison Ribeiro ', '2376999', 'Informo que monitorávamos o veiculo quando as 09:17 hs gerou o alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida entramos em contato com o condutor que nos confirmou que foi sinistrado quando estava chegando no primeiro cliente, ele foi para fazer a entrega quando foi abordado por 1 meliante armado anunciando o assalto e solicitando que o deslocasse o auto para outro lugar, chegando no local indicado foi dado a macro de chegada e destravado o baú, foi retirado a mercadoria e colocado no chão cerca de 5 caixas e logo após foi liberado pelo meliante quando estava em movimento o condutor pressionou o botão de pânico a fim de nos alertar sobre o ocorrido, ele só não pressionou o digitou a senha de sinistro antes pois estava em constante ameaça para que não nos alertasse. Foi feiro acionamento policial. segue para o conhecimento'),
(27, '2023-02-21 11:00:00', '2023-02-21 10:50:00', 'BR-381, KM 580, Carmópolis de Minas, MG, 35534-000.', '20°29\'07.8\"S', '44°35\'31.9\"W', '580', 'Acidente', 'FELIPE FLORA BRUSCHI', '2379999', 'A nossa central realizava o rastreamento do auto carga quando verificamos que o condutor iniciou a sua viagem sem informar a Central de Monitoramento. Em contato com o condutor Sr. FELIPE FLORA BRUSCHI, no número: 031 9 9403-1759, onde solicitamos ao mesmo a macro de inicio de viagem, mas nos informou que não iria mandar a macro, pois havia sofrido um acidente, Realizou a parada no acostamento e uma carreta bateu na sua traseira.'),
(28, '2023-02-24 08:59:00', '2023-02-24 08:52:00', 'R. Marguerita Alvarez', '-23.6795 ', '-46.6445', '3 A', 'Roubo de carga', 'Jefferson Serano ', '2383744', 'Informo que estávamos monitorando o veículo quando por volta das 08:53 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida tentamos contato com o condutor porém sem sucesso, mediante do ocorrido foi feito acionamento policial, logo após o condutor entrou em contato nos comunicando que havia sido roubado, ele estava indo para o próximo cliente quando percebeu que estava sendo seguido por duas motos, um dos meliantes se aproximou e solicitou que ele seguisse até outro lugar, chegando no local assim que ele parou o carro um outro veículo estacionou atrás com dois meliantes, foi solicitado que destravasse o baú ele deu macro de cliente e pressionou o botão de pânico a fim de avisar a central, com o baú destravado foi retirado a mercadoria ficando apenas alguns pacotes. em seguida os meliantes se evadiram do local. Segue para o conhecimento. '),
(29, '2023-02-24 13:51:00', '2023-02-24 13:46:00', 'R. Almeida Júnior', '-23.7687 ', '-46.7092', '21', 'Roubo de carga', 'Otavio ', '2384379', 'Informo que monitorávamos o veiculo quando as 13:35 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida tentamos contato com o condutor porém sem sucesso mediante do ocorrido foi feito acionamento policial no 190, em seguida tentamos contato novamente e quem nos atendeu foi a ajudante nos informando que estava tudo bem porém sua voz estava alterada e havia uma voz ao fundo solicitando que ela desligasse o celular, logo após foi pedido o comando para destravar o baú, em seguida o condutor entrou em contato nos informando que foi abordado por dois meliantes anunciando o assalto quando estava saindo do cliente no endereço: Rua Henrique Muzzio, 2-122 - Jardim Varginha, que os dois meliantes o prenderam no baú, fazendo a ajudante de refém, um dos meliantes entrou no carro e deslocou para outro lugar, chegando no local os meliantes arrombaram o baú e retiraram toda a mercadoria do auto. Segue para o conhecimento. '),
(30, '2023-02-27 08:00:00', '2023-02-27 08:00:00', 'Fernão Dias', '21°35\'41.0\"S', '45°14\'15.5\"W', '745', 'Deslizamento de carga', 'Marconi', '2385694', 'A Central de Monitoramento realizava o tele monitoramento do veículo, quando recebemos a informação via email do Sr. Marconi, informando que a carga deslizou.\r\n'),
(31, '2023-02-27 07:29:00', '2023-02-27 06:31:00', 'R. Dr. Sólon Fernandes', '-19.7787', '-47.9556', ' 681-633', 'Roubo de veículo', 'Supervisor Marcelo ', '2351864', 'Informo que monitorávamos o veículo quando as 07:29 hs o Supervisor de Frota Marcelo nos informou que assaltaram a condutora Regina, imediatamente foi enviado o comando de segurança, em seguida tentamos contato com a condutora porém sem sucesso, mediante do ocorrido foram feitos acionamentos policiais, que mandariam a viatura até o local onde estava posicionando, logo após recebemos a informação do Supervisor Marcelo que nos relatou como que foi ocorrido pois a condutora estava em estado de choque e estava hospitalizada, a mesma estava indo encontrar ele para fazer a conferencia da carga, mais antes de se encontrar com ele, ela parou em um cliente e ao retornar para o carro foi abordada por um meliante anunciando o assalto e solicitando que a condutora ficasse no banco do passageiro enquanto o meliante assumiu a direção do auto, o bandido percebeu que o carro era rastreado e perguntou do que ela estava carregada, ela respondeu que era de cigarro, o meliante mandou que ela digitasse a senha para desbloquear o carro, com o carro em movimento o bandido recebeu uma ligação e estava com o comparsa em ligação informando que o carro não era de mercado de livre e mesmo assim prosseguiram com o roubo, ele parou o carro em um local mais afastado na R. Adail Gomes Ferreira - Uberaba -MG , ela passou a macro de cliente e destravou o baú, ele solicitou que ela fosse embora do local a mesma seguiu pela rua até chegar em uma rodovia onde obteve ajuda, chegando em um lugar seguro a mesma ligou para a companheira e pediu para avisar ao Supervisor dela sobre o ocorrido, o Supervisor Marcelo foi avisado e foi socorrer a condutora e leva-la ao Hospital. Segue para o conhecimento. '),
(32, '2023-02-27 18:00:00', '2023-02-26 22:00:00', 'BR-110, KM 143 - Cícero Dantas, BA, 48410-000', '-10.587235', '-38.373680', '143', 'Roubo de carga', 'Condutor', '2383244', '*Violação de antena às 11h38*  Por volta das 19:20hs da data de 27/02, realizamos o contato com o condutor, onde este nos reporta que realizou a parada para manutenção, e por volta das 22:00hs de ontem foi abordado por 02 meliantes armados, que os renderam e os fizeram de refém. \r\nSr. Rogério informa que foi colocado no baú do veículo com as mão amarradas e os olhos vendados. Após ser rendido, os meliantes tomaram posse do veículo, e rodaram com ele até o amanhecer de hoje, onde liberaram o condutor em um matagal não identificado.  Sr. Rogério nos informa que pediu ajuda aos populares da região, onde estes os levaram a uma unidade da policia local para realizar a confecção do Boletim de ocorrência. Após sua ida na unidade da policia, sr. Rogério informa que fez a compra de um outro aparelho celular, devido ao seu ter sido levado junto aos demais pertences. Após a adquirir esse novo aparelho, e conseguir recuperar seu antigo chip, ele recebeu a informação de um amigo de que seu veículo havia sido deixado no Posto Fiscal localizado na divida entre o estado da Bahia com o estado de Alagoas. '),
(33, '2023-03-02 16:05:00', '2023-03-02 15:57:00', 'https://goo.gl/maps/https://www.google.com.br/maps/place/22%C2%B039\'47.9%22S+43%C2%B020\'38.4%22W/@-22.659874,-43.3474991,19.5z/data=!4m4!3m3!8m2!3d-22.6633!4d-43.344', '22°39\'47.9\"S', '43°20\'38.4\"W', '55', 'Roubo de carga', 'Alex Colombi', '2389599', 'Descrição ocorrência e tratativas: \r\n\r\nCondutor nº 4220143 ALEXANDRE SILVA DO NASCIMENTO. \r\nVeiculo gerou alerta de Jammer por volta das 15:57hrs. O sinal do rastreador sofreu varais interferências, impossibilitando assim a atuação de comandos enviados pela central MR e localização do veiculo de imediato. \r\n\r\nVeiculo voltou a comunicar por volta das 19:30hrs na comunidade Complexo do Alemão/RJ, onde as equipes foram até a entrada da comunidade e iniciaram uma tentativa de incursão. Não sendo possível viabilizar a operação, por volta das 21:30 o veiculo foi liberado a descer a comunidade, com diversas violações, entre elas, painel violado, pois os meliantes arrancaram o rastreador do veiculo, o condutor seguiu até um local seguro onde a Transportadora Transmaroni prestou os demais processos ao condutor.\r\n\r\nSegue ordem dos fatos:\r\n\r\n02/03 às 15:57 – Jammer\r\n02/03 às 16:01 – Enviou de bloqueio\r\n02/03 às 16:02 – Envio de desbloqueio (Não atuou)\r\n02/03 às 16:05 – Acionamento da PR, para o local do fato.\r\n02/03 às 16:08 – Informações no Grupo Rb X Maroni\r\n02/03 às 16:10 – Acionamento Torre Pamcary (Grupo)\r\n02/03 às 16:13 – Acionamento policial (21) 3777-5634 (Agente Munis) alegou que acionamento seria presencial.\r\n02/03 às 16:15 – SINARF\r\n02/03 às 16:20 – Envio de bloqueio \r\n02/03 às 16:28 – Equipe no local Informado (SGO)\r\n02/03 às 16:51 – Equipe no local, porem sem visualizar o veiculo.\r\n02/03 às 17:55 – Nova localização (Entrada da comunidade SGO)\r\n02/03 às 18:42 – Vídeo da equipe (SGO) no local\r\n02/03 às 19:00 - Vídeo da equipe (SGO) no local\r\n02/03 às 19:30 – Veiculo voltou a posicionar na comunidade do Alemão/RJ\r\n02/03 às 21:36 – Contato com condutor via mgs.\r\n02/03 às 21:44 – Condutor sendo escoltado para sair da comunidade \r\n02/03 às 21:55 – Para seguir para Filial do Transportador (Marlog)'),
(34, '2023-03-03 10:57:00', '2023-03-03 10:50:00', 'Tv. Metamorfose ', '-23.6062', '-46.4471', '136', 'Roubo de carga', 'Kleber ', '2393863 ', 'Informo que monitorávamos o veículo quando as 10:52 hs gerou alerta de senha de sinistro, imediatamente foi enviado o comando de segurança, em seguida tentamos contato com o condutor porém sem sucesso, mediante do ocorrido foi feito acionamento policial com a atendente civil Valeria, logo após conseguimos contato com o condutor que nos confirmou que foi roubado quando estava no cliente, ele parou para fazer a entrega porém não estava achando o endereço correto por um erro no nome da razão social que estava na nota, ele pediu ajuda para uma moradora da rua que falou que conhecia a pessoa e que iria chamar, quando veio dois meliantes se aproximando do carro e anunciando o assalto e abrindo a porta o que ocasionou bloqueio e sirene no auto o que fez os meliantes se irritarem e solicitarem que o condutor desligasse o alarme,, o condutor informou que precisaria digitar macro para liberar e aproveitou e colocou a senha de sinistro a fim de comunicar a central sobre o que estava acontecendo, os meliantes se evadiram do local levando mercadoria que seria entregue e mais alguns maços soltos. Segue para o conhecimento. '),
(35, '2023-03-03 06:47:00', '2023-03-02 00:15:00', 'Vila Nova de Campos, Campos dos Goytacazes - RJ', '21°26\'35.5\"S', '41°20\'33.0\"W', '27', 'Roubo de carga', 'Veridiana', '2388807', 'Veículo em questão em situação de sinistro, nossa central tentou diversas vezes contato com a transportadora Amab, através do número 85 9766-7505 (Veridiana), onde não obtivemos sucesso.  Com a suspeita de sinistro o GC. Romário Xavier conseguiu contato com o Sr. Francisco, onde de o mesmo autorizou o acionamento da equipe de PR, onde foram até o local e não localizaram o veículo. Nossa central continuou com os acionamentos na região. Na data de hoje, recebemos a confirmação do sinistro através da Srta Veridiana e recebemos o Boletim de ocorrência do roubo. '),
(36, '2023-03-05 17:57:00', '2023-03-05 17:00:00', 'Campina Grande do Sul/PR', '-25.150310735340252', '-48.8593603148746', '42', 'Deslizamento de carga', 'Wilton Ferreira', '2395444', 'INFORMAMOS QUE POR VOLTA DAS 17:57HS DA DATA DE HOJE, RECEBEMOS A INFORMAÇÃO DE QUE A CARRETA DESTA VIAGEM HAVIA \"TRINCADO\" EXPONDO A CARGA A DANOS E IMPOSSIBILITANDO QUE FOSSE POSSÍVEL DAR SEQUÊNCIA NA VIAGEM. \r\n\r\nREALIZAMOS O ACIONAMENTO JUNTO A SOMPO ATRAVÉS DO TELEFONE 0800 723 3002 ONDE O ATENDENTE JOSÉ\r\nCOLETOU OS DADOS PERTINENTES AO SINISTRO E REGISTROU EM SISTEMA, GERANDO O SEGUINTE PROTOCOLO: ST2303021705. '),
(37, '2023-03-06 09:32:00', '2023-03-06 09:00:00', 'AV.DOUTOR ANGELO TEXEIRA DA COSTA,', '-19.751928 ', '-43.880113', '602', 'Deslizamento de carga', 'Jaqueline Noel', '2396712', 'Via e-mail a responsável transportadora srª Jaqueline Noel, solicitou a abertura do sinistro do veiculo em questão. Conforme descrição, foi identificado que a bobina caiu da carreta dentro do cliente durante o processo de descarregamento.'),
(38, '2023-03-07 14:02:00', '2023-03-07 13:30:00', 'BR-486, Botuverá - SC, 88370-000', '27°16\'10.9\"S', '49°11\'52.8\"W', '', 'Acidente', 'TIAGO PEREIRA DA SILVA', '2391455', 'A nossa central realizava o rastreamento do auto carga quando o condutor Sr. TIAGO PEREIRA DA SILVA, entrou em contato com a Central de Monitoramento, através do número: +55 44 9752-6506, informando que havia sofrido um acidente. Estava na rota cadastrada da sua viagem, porém a rodovia é estreita demais e ao realizar a curva, a carreta derrapou e saiu da pista. Carreta e cavalo ficou em L. Condutor completou que está em um sitio proximo do local, solicitando socorro. Veículo não chegou a tombar mas está em duas rodas. Passamos a situação do ocorrido para a Transpanorama, no número: +55 44 9151-9994, onde solicitamos um guincho para puxar o cavalinho e carreta. '),
(39, '2023-03-08 10:24:00', '2023-03-08 09:58:00', 'Av. Santo Afonso', '-23.6781', '-46.6446', '372-374', 'Roubo de carga', 'Marcelo Pelicula ', '2399456', 'Informo que monitorávamos o veiculo quando por volta das 10:20 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida entramos em contato com o condutor que nos confirmou que foi roubado, ele estava em deslocamento quando percebeu que tinha dois meliantes em uma moto seguindo ele, os meliantes o alcançaram e anunciaram o assalto solicitando que o mesmo seguissem eles ate outro lugar, chegando no local foi destravado o baú enquanto um carro com baú estacionava, os meliantes não deixaram o condutor e o ajudante sair do carro, foi realizado o transbordo de toda a mercadoria logo após se evadiram levando a mercadoria e os pertences pessoais do motorista e do ajudante ao serem liberados pressionaram o botão de pânico a fim de avisar a central sobre o ocorrido. Segue para o conhecimento. '),
(40, '2023-03-08 10:50:00', '2023-03-08 10:42:00', 'Av. Primavera de Caiena', '-23.6146', '-46.5124', '369', 'Roubo de carga', 'Bruno Martins ', '2399545', '        Informo que monitorávamos o veiculo quando as 10:45 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida o condutor entrou em contato com a nossa equipe nos informando que foi sinistrado quando estava em uma das entregas, o ajudante desceu para realizar a entrega e quando abriu o baú percebeu que vinha dois meliantes correndo anunciando o assalto o ajudante correu para dentro da padaria onde era o cliente enquanto o motorista permaneceu dentro do carro, os meliantes se evadiram levando cerca de 2 caixas cheias de mercadoria. Segue para o conhecimento.       '),
(41, '2023-03-09 10:16:00', '2023-03-09 10:11:00', 'Estr. do Pêssego, 1200 - Colônia (Zona Leste),', '-23.542700', '-46.522200', '1200', 'Roubo de carga', 'Luiz Alves Pereira De Lima', '2401083', 'INFORMO QUE ESTAVAMOS MONITORANDO O VEICULO QUANDO POR VOLTA DAS 10:25 HS, O CONDUTOR NOS INFORMOU QUE FOI ASSALTANDO FOI ENVIADO OS COMANDOS DE SEGURANÇA PARA O VEICULO.  MEDIANTE DO OCORRIDO FOI FEITO O ACIONAMENTO POLICIAL, EM SEGUIDA O CONDUTOR NOS INFORMOU COM MAIS CALMA COMO QUE ACONTECEU O OCORRIDO, QUANDO ELE ESTAVA EM UMA DAS ENTREGAS EST. DO PÊSSEGO,1200 (CARREFOUR DA JACU-PÊSSEGO) ASSIM QUE SAIU DO CLIENTE PARA SEGUIR PARA O PROXIMO PDV. LOGO EM SEGUIDA FOI ABORDADO POR UM MOTOCICLISTA DANDO A VOZ DE ASSALTO APRESENTANDO ARMA DE FOGO, COM FORTES AMEAÇAS OBRIGADO O CONDUTOR A SEGUI-LO PARA UM LOCAL MENOS VISADO. CHEGANDO NO LOCAL EM SEGUIDA UMA FIORINO DA COR BRANCA SE APROXIMOU PARA REALIZAR UM FUTURO TRANSBORDO DA MERCADORIA. OBRIGADO O AJUDANTE A REALIZAR OS PROCEDIMENTOS DE ABERTURA DO BAU O AJUDANTE CONFIRMOU A SENHA PADRÃO E CONSEGUIRAM ABRIR O BAU E REALIZARAM O TRANSBORDO TOTAL DA MERCADORIA E EM SEGUIDA SE EVADIRAM DO LOCAL. O CONDUTOR FOI ORIENTADO A SEGUIR PARA UMA DELEGACIA MAIS PROXIMA PARA REALIZAR AS DEVIDAS ATRATATIVAS COM AS AUTORIZADES PUBLICAS.'),
(42, '2023-03-10 15:50:00', '2023-03-10 15:40:00', 'AV DR ANGELO TEIXEIRA DA COSTA 602', '-19.751224572582093, ', '-43.880328393074976', '602', 'Acidente', '', '2403305', 'A Central de Monitoramento realizava o tele monitoramento do veículo, quando recebemos a informação do Luiz Augusto que havia tido adernamento na carga.'),
(43, '2023-03-13 10:08:00', '2023-03-13 09:22:00', 'Rua Cana da Índia ', '-19.9795', '-44.0478', '329-249', 'Roubo de carga', 'Philipe Adriano ', '2405044', 'Informo que monitorávamos o veículo quando as 09:25 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança , em seguida entramos em contato com o condutor porém estava indo direto para a caixa postal, mediante do ocorrido foi realizado o acionamento policial na região, logo após o condutor nos enviou mensagem do teclado do rastreador nos confirmando que foi assaltado, o Supervisor Bruno foi de encontro com o condutor e pegou os detalhes do ocorrido, o mesmo estava em parado no ponto de venda para fazer a entrega, o ajudante desceu para pegar a mercadoria quando foi abordado por 2 meliantes anunciando o assalto e solicitando que tirassem a mercadoria do baú, foi feito o transbordo para um Palio Branco que estava estacionado perto do veículo, logo após os meliantes se evadiram do local levando a carga, os celulares do ajudante e do motorista e a chave do auto, assim que foram libertados pressionaram o botão de pânico a fim de avisar a central sobre o roubo. segue para o conhecimento. '),
(44, '2023-03-14 11:16:00', '2023-03-14 11:05:00', 'R. Antônio Caldas ', '-23.6349', '-46.7597', '73 ', 'Roubo de carga', 'Anderson Leodro ', '2405287', 'Informo que o monitorávamos o veículo quando as 11:16 hs o condutor entrou em contato com a nossa equipe e nos informou que foi sinistrado, ele estava em deslocamento quando foi abordado por duas motos com dois meliantes batendo no vidro do da porta solicitando que seguissem eles até outro lugar, o condutor na intenção de fugir dos meliantes acelerou o carro e um dos bandidos disparou com arma de fogo contra o auto, em seguida veio mais uma moto e um carro o cercando o obrigando a encostar o carro, o motorista encostou o carro e a porta do carona foi aberta ocasionando o bloqueio e sirene chamando a atenção dos pedestres que passaram por ali e estavam gritando para chamar a policia, com o risco de serem presos os meliantes se evadiram do local levando parte da mercadoria. Segue para o conhecimento.  '),
(45, '2023-03-15 11:38:00', '2023-03-15 11:33:00', 'R. Teixeira Campos ', '-22.8729 ', '-43.5133 ', '8 ', 'Roubo de carga', 'Alexsandro ', '2407790', 'Informo que monitorávamos o veículo quando por volta das 11:33 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida entramos em contato com o condutor porém sem sucesso, tentamos um segundo contato e o condutor nos confirmou que foi roubado, quando estava indo para a entrega na R. Teixeira Campos n 427, quando foi abordado por um meliante armado em uma moto anunciando o assalto e solicitando que o mesmo o seguisse até outro lugar , condutor pressionou o botão de pânico a fim de nos alertar, chegando no local o mesmo passou a macro de cliente, o baú foi aberto e retirado a mercadoria e transferido para um gol branco que estava estacionado no local, o meliante questionou se a carga tinha rastreador, motorista informou que não sabia, logo após condutor e ajudante foram liberados pelos meliantes, o motorista fez o 190 e se dirigiu para delegacia mais próxima a 35º DP de Campo Grande para realizar os devidos procedimentos junto as autoridades locais. Segue para o conhecimento.  '),
(46, '2023-03-16 12:02:00', '2023-03-16 11:06:00', 'RUA DR CARVALHO DE MENDONÇA', '-23.953397', ' -46.336667', '404', 'Roubo de carga', 'FERNANDO', '2409828', 'O veículo gerou porta do carona 11:06 no cliente de imediato a Central entrou em contato com a Motorista, onde a mesma informou que estava tudo certo e que abriu a porta sem querer, quando as 12:02 o responsável Fernando entrou em contato com a Central informado que o veículo foi roubado. Feito contato novamente com a motorista a mesma relatou que se encontrava no cliente e assim que entrou no veículo foi abordada por um meliante que entrou seguindo com o seu veículo e o outro meliante colocou ela em outro veículo, onde rodou uns dois quarteirões com a mesma e logo em seguida liberou a motorista informando que deixaram o veículo na Rua D Lara e que a chave estaria embaixo da roda. Ao chegar no veículo a grande que e de plástico estava cortada e só havia duas caixas todo o restante da mercadoria foi levado.'),
(47, '2023-03-19 17:58:00', '2023-03-19 17:57:00', 'Santa Luzia, MG', '-19.8154', '-43.8098', '445', 'Acidente', 'Alexander', '2411991', 'DADOS DO SINISTRO\r\n\r\nDESCRITIVO\r\n\r\nVALOR INFORMADO: R$ 141.320,84\r\nLOCAL DO SINISTRO: Santa Luzia, MG\r\nTIPO DE SINISTRO: Acidente\r\n\r\nDESCRICAO DO SINISTRO:\r\nInformamos que por volta das 17:56 do dia 19/03/2023 veiculo gerou parada indevida, em seguida gerou violação da antena, da bateria e do sensor de engate, quando a transportadora entro em contato através do WhatsApp de número (31) 9819-6854 informando que veículo havia se envolvido em um acidente com outro caminhão.\r\nEntramos em contato com o Sr. Heder da transportadora Boro através do telefone (37) 99180-8883, onde nos informou que não seria necessário envio da equipe de Pronta Resposta, o mesmo nos solicitou acionamento da seguradora do auto carga, no mesmo contato, Sr. Heder informou que condutor estava consciente e orientado, mas devido apresentar dores devido ao acidente, este estava recebendo atendimento pelo socorro que já encontrava-se no local.\r\nTentativa de acionamento da PRF em SABARÁ através do número (31) 3691-1572, porem, sem sucesso, realizamos tentativa de acionamento da PRF da NAÇÕES UNIDAS, através do número (31) 3671-9097, porem, sem sucesso.\r\nRealizamos acionamento junto a Sompo através do telefone  0800 723 3002 onde o atendente Wiilian coletou os dados pertinentes ao sinistro e registrou em sistema, gerando o seguinte protocolo: ST2303022253, em seguida recebemos o retorno da seguradora confirmando a abertura do sinistro.\r\n\r\n\r\nACIONAMENTOS REALIZADOS:\r\nSompo seguradora\r\n\r\nDATA/HORA TELEFONE ORGAO/DEPARTAMENTO/EMPRESA PESSOA ACIONADA:\r\n19/03/2023, as 18:50 através do número 0800 723 3002, realizamos acionamento da seguradora Sompo.\r\n\r\n\r\nMAIORES INFORMACOES, REPORTAREMOS.\r\n: \r\n'),
(48, '2023-03-21 12:01:00', '2023-03-22 11:55:00', 'R. Francisco Mariani', '-23.6873 ', '-46.7844', '65', 'Roubo de carga', 'Gisele ', '2414929', 'Informo que o monitorávamos o veiculo quando as 12:01 hs a condutora entrou em contato com a nossa equipe nos relatando que foi sinistrada quando estava em uma das entregas ela estava saindo do mercado Madrugadão ( R. João Robalo, 868 - Jardim Soraia, São Paulo - SP) veio 4 meliantes armados de moto anunciando o assalto e solicitando que a motorista deslocasse o carro para outro lugar, chegando ao local passou a macro de cliente e destravou o baú, logo após os meliantes se evadiram levando parte da mercadoria e o celular do ajudante, assim que foram libertados nos avisaram. Foi feito acionamento no 190 e orientamos a condutora a seguir para a delegacia mais próxima para realizar as devidas tratativas junto as autoridades locais . Segue para o conhecimento.  '),
(49, '2023-03-23 10:04:00', '2023-03-23 08:46:00', 'R. Francisco Borges, Bom Retiro', '-23.525', '-46.6324', '124', 'Roubo de carga', 'Transportador DSE', '2418487', 'INFORMO QUE MONITORAVAMOS O VEICULO QUANDO POR VOLTA DAS 09:59 HS GEROU O ALERTA DE BOTAO DE PANICO, IMEDITAMENTE FOI ENVIADO O COMANDO DE SEGURANCA, EM SEGUIDA TENTAMOS CONTATO COM A CONDUTORA POREM SEM SUCESSO, MEDIANTE DO OCORRIDO FOI REALIZADO O ACIONAMENTO POLICIAL NO COPOM 190, LOGO APOS CONSEGUIMOS CONTATO COM O CONDUTOR NO TEL: +55 11 94084-7103 QUE NOS RELATOU QUE FOI SINISTRADO, QUANDO ESTAVA EM UMA DAS ENTREGAS, PAROU PARA FAZER A ENTREGA PDV, QUANDO FOI RETORNAR PARA O VEICULO FOI ABORDADO POR UM MELIANTE ARMADO MONTADO EM UMA MOTO, COM FORTES AMEAÇAS OBRIGOU O CONDUTOR PARA SEGUILOS PARA UM LOCAL VAZIO, LOGO EM SEGUIDA UM VEICULO SUSPEITO SE APROXIMOU DA TRAZEIRA DO VEICULO, O SEGUNDO MELIANTE COM FORTE AMEÇAS OBRIGOU O CONDUTOR QUE ENVIASSE AS MACROS PADRÃO PARA NÃO LEVANTAR SUSPEITAS, CHEGANDO EM UM LOCAL MENOS VISADO. FOI ENVIADO MACRO DE CLIENTE E COM A SENHA PADRÃO DO CONDUTOR CONSEGUIRAM DESTRAVADO O BAU REALIZARAM O TRANSBORDO TOTAL DA MERCADORIA PARA O VEICULO SUSPEITO E LOGO APOS SE EVADIRAM DO LOCAL. O CONDUTOR FOI ORIENTADO A SEGUIR PARA UMA DELEGACIA MAIS PROXIMA REALIZAR AS DEVIDAS TRATATIVAS JUNTO AS AUTORIDADES LOCAIS.');
INSERT INTO `tb_sinistros` (`idsinistro`, `dtComunicado`, `dtSinistro`, `localSinistro`, `latitude`, `longitude`, `Km`, `tipoSinistro`, `nomeComunicante`, `NumSM`, `Descritivo`) VALUES
(50, '2023-03-24 10:45:00', '2023-03-24 10:45:00', 'Contagem - MG', '19°52\'32.3\"S', '44°03\'13.7\"W', '', 'Roubo de carga', '', '2419695', '        Veículo deu entrada em área de risco ás 23:41 do dia 23.03. Condutor informou início de pernoite ás 00:05 do dia 24.03, ás 00:59 pressionou botão de pânico, operadora informou na nc contato com condutor, \"situação normal\". Iniciamos as tratativas de perda de sinal, Sr Felipe Transul nos solicitou para tratativas de suspeita de sinistro, PR enviada sob autorização do transportador, varredura iniciada, sem localizar o veículo pelo local indicado. ás 16:37 roubo confirmado através do envio do B.O em nosso grupo de sinistro       '),
(51, '2023-03-25 13:20:00', '2023-03-25 12:23:00', 'BR-464, Uberaba - MG', '19°51\'24.2\"S ', '47°52\'08.9\"W', '190', 'Roubo de carga', 'Mundial Risk', '2418999', 'Veículo em questão estava com bloqueio vandalizado, transportadora ciente da situação. Condutor veio a acionar o botão de pânico, de imediato nossa central avisou a transportadora e foi autorizado envio de PR até o local, ao chegar no local indicado, o veículo não foi localizado, houve varredura na região, porém sem sucesso nas tentativas de localizar o veículo. Até o presente momento não temos informações sobre o condutor ou veículo. '),
(52, '2023-03-23 14:38:00', '2023-03-23 13:55:00', 'Uberaba/MG', '-19.216392', '-48.146840', 'BR 050 - Km 110', 'Roubo de carga', 'Central', '2416993', 'Prezado cliente, informo que nossa central realizava o rastreamento do auto cargo de placa LWS7D78, solicitação de monitoramento 2416993 quando por volta das 13:55hs o auto carga gerou evento de perda de sinal em nosso sistema. \r\nDe imediato enviamos os comandos de segurança ao veículo e realizamos a tentativa de contato com o condutor através do telefone (47) 9222-2872 onde não obtivemos sucesso.\r\n\r\nRealizamos o contato com o Sr. Fabiano da transportadora Trandalla através do telefone (51) 9900-1149 onde este havia nos informado que a região qual o auto carga trafegava era ruim de sinal, e que possivelmente o condutor estaria sem bateria em seu aparelho celular. \r\nQuestionamos ao Sr. Fabiano sobre o envio de uma equipe de Pronta Resposta para averiguação, mas este negou, nos informando que não julgava necessário. \r\n\r\nRealizamos o acionamento policial na região através do site oficial da PRF, e através do telefone (34) 998063523.\r\n\r\nRealizamos o acionamento da central de roubos e furtos da tecnologia Sascar através do telefone 0800 648 6003 onde a atendente Vivian coletou os dados pertinentes e registrou em sistema as informações, gerando o protocolo de número 01901830.\r\n\r\nDurante a noite do dia 23/03, Sr. Fabiano manteve um novo contato com a nossa central via e-mail, solicitando o acionamento de uma equipe de pronta resposta para averiguação, esta que foi enviado e realizou a varredura na região e postos próximos, porém o auto carga foi localizado. \r\n\r\nRealizamos o contato com o Sr. Arlindo da Campari do Brasil através do telefone de número (11) 98799-5991 onde este nos confirma que a carga não possuía isca, e mediante a circunstancia do auto carga não ter sido localizado, poderíamos finalizar a missão junto a equipe de pronta resposta. \r\n \r\nDurante o dia 26/03 por volta das 11:00hs, realizamos um novo contato com o Sr. Fabiano via aplicativo WhatsApp onde fomos informados que a carga havia sido recuperada.\r\n\r\nSegundo as informações reportadas pelo Sr. Fabiano, o auto trafegava em uma rodovia, momento em que foi parada por uma blitz policial, e devido ao acionamento feito anteriormente, a carga foi apreendida.'),
(53, '2023-03-27 18:02:00', '2023-03-27 17:50:00', 'BR120 ', '-19.8343 ', '-42.9823', 'KM 9', 'Roubo de carga', 'Waisten ', '2393051', 'Informo que monitorávamos o veiculo quando as 17:40 hs recebemos mensagens do condutor porém o mesmo apagou as mensagens, foi enviado mensagem porém sem retorno do mesmo, mediante o ocorrido ligamos para o condutor que nos informou que foi roubado, ele saindo do cliente quando um ônix branco estava seguindo ele, o mesmo reduziu a velocidade para que o carro ultrapassasse porem o carro permaneceu atrás dele, quando ele olhou para o lado o meliante estava mostrando a arma de fogo e solicitando que o mesmo abaixasse o vidro e encostasse o carro, o condutor deslocou o carro por mais alguns metros entrando em uma estrada, ele encostou o carro e os meliantes estacionaram o carro atrás do mesmo, anunciaram o assalto, o motorista informou que o carro era rastreado e passou a macro de cliente  e os meliantes ficaram nervosos com o bloqueio do auto, o motorista relatou que é normal o carro fazer isso e destravou o carro usando a senha normal, com o baú destravado foi retirado cerca de 8 a 9 caixas com mercadoria e colocado no ônix branco, logo após foi liberado. o condutor fez o 190 para a policia, e hoje irá fazer a contagem da carga para fazer o boletim de ocorrência junto as autoridades locais. Segue para o conhecimento. '),
(54, '2023-03-28 13:03:00', '2023-03-28 12:47:00', 'R. Francisco de Zurbaran,', '-23.7730', '-46.6687 ', '2 -142 ', 'Roubo de carga', 'Tatyane ', '2423618', 'Informo que monitorávamos o veiculo quando as 13:03 hs a ajudante entrou em contato com a nossa central nos informando que foram sinistrado, eles estavam se deslocando para uma das entregas quando se depararam com um transito na via devido há um caminhão que estava descarregando, quando veio dois meliantes e um deles estava com uma sacola de com fralda e o outro armado anunciando o assalto e informando que sabia como que funcionava o rastreador e que não tentassem nada, os meliantes adentraram no carro e solicitaram que deslocasse o carro para outro lugar no percurso os meliantes ficaram discutindo aonde seria o local do transbordo , chegando no local indicado foi dado a macro de chegada no cliente e destravado o baú, e retirado a mercadoria. Foi feito o acionamento policial no 190 com atendente civil caíque onde passamos os dados do veículo e o telefone da GR, e orientamos o condutor a ir para uma delegacia mais próxima para realizar as devidas tratativas junto as autoridades locais. Segue para o conhecimento. '),
(55, '2023-03-31 15:52:00', '2023-03-31 12:25:00', 'R. Dr. Paulo Cesar Gomes Pereira', '-22.9335', '-43.0227', '139-5 -', 'Roubo de carga', 'Vagner ', '2426463', 'Informo que monitorávamos o veículo de placa DWG5647 quando ad 12:25 hs gerou o botão de pânico, imediatamente foi enviado o comando de segurança, em seguida tentamos contato com o condutor porém sem sucesso, mediante do ocorrido foi informado ao Setor de Segurança que fez acionamento policial para o veiculo, após recebemos a informação que o mesmo estava realizando entrega sentindo centro de Itaipu, encostou um Gol de cor Prata ao lado do auto com dois meliantes armados anunciando o assalto e solicitando que seguissem eles, foi percorrido cerca de 1 km até outro lugar, chegando no local foi dado macro de chegada e destravado o baú, enquanto os meliantes  pegavam a mercadoria, o botão de pânico foi pressionado, logo após os meliantes se evadiram do local. Segue para o conhecimento. '),
(56, '2023-03-31 06:32:00', '2023-03-31 06:25:00', 'R. Henrique da Silva', '-23.5114', '-46.6754', ' 147-63', 'Roubo de carga', 'Felipe Santos', '2428321', 'Informo que monitorávamos o veículo quando as 06:29 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança, em seguida entramos em contato com o condutor via app o mesmo nos informou que tinha acabado de sair do CD quando foi fechado por um veiculo, o meliante anunciando o assalto e informando que sabia que o carro era rastreado e que não fizesse nada, o condutor passou a macro de cliente e destravou o baú, foi feito o transbordo da mercadoria e assim que foi liberado o motorista pressionou o botão de pânico. Segue para o conhecimento. '),
(57, '2023-03-31 09:43:00', '2023-03-31 09:25:00', 'Av. Santa Terezinha', '-23.5192 ', '-46.8388', '202', 'Roubo de veículo', 'Nicolas ', '2428294', 'Informo que monitorávamos o veículo quando as 09:43 hs recebemos a informação do condutor que o mesmo foi roubado,  ele parou para verificar o carro que estava fervendo quando parou uma fiorino atrás do carro com um rapaz suspeito que desceu do auto perguntando se o motorista precisava de ajuda, o mesmo respondeu que não precisava por conta do guincho do seguro, enquanto isso o outro rapaz abordou o ajudante e anunciou que era um assalto e como o mesmo viu as notas já sabia que o carro estava carregado, mediante a fortes ameaças que estavam fazendo com o ajudante, o condutor decidiu colaborar e destravou o baú, foi feito o transbordo da mercadoria e logo após serem liberados o condutor foi direto para uma base policial pedir uma ajuda pois tinha sido roubado, devido a falta de atendimento que teve ele foi em uma delegacia civil registrar o boletim de ocorrência. Segue para o conhecimento. '),
(58, '2023-04-02 20:45:00', '2023-04-02 20:45:00', 'Distrito Industrial, Três Corações - MG, 37410-000, Posto BR', '0', '0', '744', 'Deslizamento de carga', 'Eider de Castro', '2429063', 'DADOS DO SINISTRO\r\n\r\nDESCRITIVO\r\n\r\nVALOR INFORMADO:R$ 121.928,71\r\nLOCAL DO SINISTRO:BR-381, 744 - Distrito Industrial, Três Corações - MG, 37410-000, Posto BR\r\nTIPO DE SINISTRO: Carga correu\r\n\r\nDESCRICAO DO SINISTRO:\r\nNossa central foi comunicada pela transportadora através do email por volta das 20:45, onde Eider informou que condutor parou no posto e identificou que a carga de chapas estourou as cinstas e correu, o mesmo solicitou acionamento da seguradora referente ao sinistro.\r\nRealizado acionamento junto a Sompo através do telefone 0800 723 3002, por volta das 22:10, onde o atendente Renato coletou os dados pertinentes ao sinistro e registrou em sistema, gerando o seguinte protocolo: ST2304022850.\r\n\r\n\r\nACIONAMENTOS REALIZADOS: Seguradora\r\nDATA/HORA TELEFONE ORGAO/DEPARTAMENTO/EMPRESA PESSOA ACIONADA:\r\nRealizamos acionamento junto a seguradora Sompo através do número 0800 723 3002, na data de 02/04/2023 em contato com atendente Renato.\r\n\r\n\r\nMAIORS INFORMACOES, REPORTAREMOS.'),
(59, '2023-04-04 12:00:00', '2023-04-04 11:52:00', 'R. Manuel Paschoal', '-23.5130', '-46.4127', '440', 'Roubo de carga', 'Norman Marques ', '2431824', 'Informo que monitorávamos o veículo quando por volta das 12:00 hs recebemos a informação que o veículo foi sinistrado, imediatamente entramos em contato com o condutor que nos informou que estava seguindo para o cliente porém não estava achando a numeração correção quando parou o veiculo veio dois meliantes anunciando o assalto e solicitando que destravasse o baú, foi levado 4 caixas e logo após os meliantes se evadiram a pé do local. Foi feito acionamento policial no 190 com atendente civil Luiz, e orientamos o condutor a ir para uma delegacia mais próxima para realizar as devidas tratativas junto as autoridades locais. '),
(60, '2023-04-05 12:36:00', '2023-04-05 11:04:00', 'R. Maria Aguiar dos Santos', '-23.6712 ', '-46.7661 ', '121-1', 'Roubo de carga', 'Gilberto ', '2433371', 'Informo que monitorávamos o veículo quando as 11:53 hs recebemos a informação que o veiculo esta com suspeita, entramos em contato porém estava dando na caixa postal, mediante do ocorrido e da suspeita foi feito acionamento policial no 190 com atendente civil Samara, onde foi passado os dados do veículo e da GR, logo após o P.A Norman nos passou um numero de telefone para que falássemos com o condutor (11) 965741324 conseguimos falar com o condutor que nos informou que parou o carro perto do mercado Barbosa quando veio 4 motos com 4 meliantes anunciando o assalto e solicitando que deslocasse o carro para outro lugar, chegando no local os meliantes abriram as portas o que ocasionou bloqueio e sirene no carro, tentaram colocar o motorista e o ajudante no baú, logo após se evadiram levando algumas caixas. Segue para o conhecimento. '),
(61, '2023-04-06 15:58:00', '2023-04-06 15:58:00', ': AV doutor Franscisco Mesquitta 803', '0000000000', '0000000000', '', 'Deslizamento de carga', 'Danilo', '2434435', 'Fomos informados pela transportadora, que houve adernamento da carga, dentro do pátio de uma de suas filiais, acionamento sompo  seguros realizado Protocolo: ST2304023000, atendente Fernanda.'),
(62, '2023-04-08 12:45:00', '2023-04-08 12:45:00', 'Grajaú, São Paulo - SP', '-23.776639', '-46.678111', '', 'Roubo de carga', 'Silvan ', '2436910', 'Auto carga gerou violação de baú traseiro e abertura da porta do motorista por volta das 12:14hs realizamos tentativa de contato com o condutor Sr. Silvan porem sem sucesso sendo assim iniciamos as tratativas pertinentes as violações, após alguns minutos do ocorrido o condutor entrou em contato com a nossa central por volta das 12:45hs para comunicar o roubo, o mesmo informou que foi abordado por 4 meliantes onde o garupa que estava na moto assumiu a direção do veículo levando o mesmo e o ajudante para dentro de uma comunidade próximo ao local onde foi abordado. Ao adentrar na comunidade os meliantes pararam em uma construção e subtraíram os pacotes de medicamento, condutor ressalta que estava finalizando as entregas mas que não sabe informar quantas caixas foram subtraídas. Nossa central realizou o acionamento via 190 e orientou o condutor seguir para delegacia mais próxima para registrar o B.o do ocorrido. Em posse de maiores informações reportaremos. '),
(63, '2023-05-10 13:29:00', '2023-05-05 13:29:00', 'zsfafa', 's\\caf', 'fasasfasfas', '', 'Furto', '', '2493310', ''),
(64, '2023-05-15 13:32:00', '2023-05-25 13:32:00', 'fafadss', 'dssdg', 'sdgdsgsg', 'dsgsdg', 'Roubo de carga', '', '2493824', ''),
(65, '2023-05-15 13:32:00', '2023-05-25 13:32:00', 'fafadss', 'dssdg', 'sdgdsgsg', 'dsgsdg', 'Roubo de carga', '', '2475564', ''),
(66, '2023-05-03 15:58:00', '2023-05-10 15:58:00', 'BR-060 - Condomínio Anhanguera, Goiânia - GO', 'ssfsf', 'sfsfs', '', 'Carga danificada', '', '2465543', '        Informo que monitorávamos o veículo quando as 09:25 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança , em seguida entramos em contato com o condutor porém estava indo direto para a caixa postal, mediante do ocorrido foi realizado o acionamento policial na região, logo após o condutor nos enviou mensagem do teclado do rastreador nos confirmando que foi assaltado, o Supervisor Bruno foi de encontro com o condutor e pegou os detalhes do ocorrido, o mesmo estava em parado no ponto de venda para fazer a entrega, o ajudante desceu para pegar a mercadoria quando foi abordado por 2 meliantes anunciando o assalto e solicitando que tirassem a mercadoria do baú, foi feito o transbordo para um Palio Branco que estava estacionado perto do veículo, logo após os meliantes se evadiram do local levando a carga, os celulares do ajudante e do motorista e a chave do auto, assim que foram libertados pressionaram o botão de pânico a fim de avisar a central sobre o roubo. segue para o conhecimento.       '),
(67, '2023-05-03 15:58:00', '2023-05-10 15:58:00', 'BR-060 - Condomínio Anhanguera, Goiânia - GO', 'ssfsf', 'sfsfs', '', 'Carga danificada', '', '24655438', '        Informo que monitorávamos o veículo quando as 09:25 hs gerou alerta de botão de pânico, imediatamente foi enviado o comando de segurança , em seguida entramos em contato com o condutor porém estava indo direto para a caixa postal, mediante do ocorrido foi realizado o acionamento policial na região, logo após o condutor nos enviou mensagem do teclado do rastreador nos confirmando que foi assaltado, o Supervisor Bruno foi de encontro com o condutor e pegou os detalhes do ocorrido, o mesmo estava em parado no ponto de venda para fazer a entrega, o ajudante desceu para pegar a mercadoria quando foi abordado por 2 meliantes anunciando o assalto e solicitando que tirassem a mercadoria do baú, foi feito o transbordo para um Palio Branco que estava estacionado perto do veículo, logo após os meliantes se evadiram do local levando a carga, os celulares do ajudante e do motorista e a chave do auto, assim que foram libertados pressionaram o botão de pânico a fim de avisar a central sobre o roubo. segue para o conhecimento.       '),
(68, '2023-05-24 16:19:00', '2023-05-19 16:19:00', 'fdsfdsf', 'sfasafa', 'sfa', '', 'Carga danificada', 'sdsds', '2467061', 'Wéllington Sampaio teste'),
(69, '2023-05-24 16:19:00', '2023-05-19 16:19:00', 'fdsfdsf', 'sfasafa', 'sfa', '', 'Carga danificada', 'sdsds', '2467012', 'Wéllington Sampaio teste'),
(70, '2023-05-24 16:19:00', '2023-05-19 16:19:00', 'fdsfdsf', 'sfasafa', 'sfa', '', 'Carga danificada', 'sdsds', '2477012', 'Wéllington Sampaio teste'),
(71, '2023-05-24 16:19:00', '2023-05-19 16:19:00', 'fdsfdsf', 'sfasafa', 'sfa', '', 'Carga danificada', 'sdsds', '24777012', 'Wéllington Sampaio teste'),
(72, '2023-05-24 16:19:00', '2023-05-19 16:19:00', 'fdsfdsf', 'sfasafa', 'sfa', '', 'Carga danificada', 'sdsds', '23777012', 'Wéllington Sampaio teste'),
(73, '2023-05-24 16:19:00', '2023-05-19 16:19:00', 'fdsfdsf', 'sfasafa', 'sfa', '', 'Carga danificada', 'sdsds', '33777012', 'Wéllington Sampaio teste'),
(74, '2023-05-12 17:02:00', '2023-05-18 17:03:00', 'jvjvhhv', 'jbkbkjbjk', '5151.1.', 'v v ', 'Recuperado', '', '2461941', '                                        Wéllington teste                              ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipossinistro`
--

CREATE TABLE `tb_tipossinistro` (
  `idtipoSinistro` int(11) NOT NULL,
  `nomeSinistro` varchar(150) NOT NULL,
  `inativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tipossinistro`
--

INSERT INTO `tb_tipossinistro` (`idtipoSinistro`, `nomeSinistro`, `inativo`) VALUES
(1, 'Acidente', 0),
(2, 'Carga danificada', 0),
(3, 'Furto', 0),
(4, 'Incêndio', 0),
(5, 'Recuperado', 0),
(6, 'Roubo de carga', 0),
(7, 'Tentativa', 0),
(8, 'Deslizamento de carga', 0),
(9, 'Roubo de veículo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT 0,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
(1, 1, 'admin', '$2y$12$suWIc0FDJno4zkyVij2yyuHXfilkSbeLF5ju80uaAu0lVIaEb6Ewa', 1, '2017-03-13 03:00:00'),
(7, 7, 'suporte', '$2y$12$zlj.OgpJwRwfU5ezybrAweh/vUPl6S24CH5tYCPmr/ycRD0nh5kVe', 1, '2017-03-15 16:10:27'),
(9, 9, 'flavia.martins', '$2y$12$qvdZHr5a3CwZkqAAzv22f.vu9nHVNFGpqhjAPjmIV2kLmqElg/I3K', 1, '2018-10-13 16:54:00'),
(11, 11, 'joao', '$2y$12$.j9CzrCjRi8uH9LQCo.Bpetye5CUIVnqTBUK..zhPWs6YuqBw3s52', 1, '2018-10-13 16:57:53'),
(12, 12, 'sheilany.dias', '$2y$12$NZ6QHGQ34tbQ.u0WpQAjBubph5P4IE8zEr1puydTRvsiqoxFbXFpO', 0, '2018-10-13 16:59:59'),
(13, 13, 'anderson', '$2y$12$torzgTkhz0z2tOPB6yfBUOny74L8vYdoRXtnaicWxumBRylRZuU/S', 1, '2018-10-13 17:00:38'),
(14, 14, 'kevin.leoni', '$2y$12$uoj3t8VB9VBwMWfoMdpRZeJaTLp0r9xxVTGE2IN.z./P5.ZK7PC0q', 0, '2018-10-13 17:13:55'),
(16, 16, 'ingrid.karolina', '$2y$12$MXHbChz.cSL0GuGKKGItJe/NVFj7PiejcsHz7/2Zx059uqGtxViEW', 0, '2023-01-05 19:32:05'),
(17, 17, 'wellington.barros', '$2y$12$XaDz.b7Eo/7fYg30D7rCVOT2bA7cb6eTqvBsRFyTZNz9NQ0VI1PPu', 1, '2023-01-09 13:04:18'),
(18, 18, 'caliane.pereira', '$2y$12$mNSQ5NKS.8coaDbRs2e3l.oTystuFY/7Mds3HzaCG6dxJpedO/3uu', 0, '2023-01-19 13:13:14'),
(19, 19, 'danilo.marques', '$2y$12$C.mJMXwhd4QlsVz8Z9UGlukxpqCalapL.KP14L0pRRnex0Cxs2Nwq', 0, '2023-01-19 13:32:33'),
(20, 20, 'murilo.reis', '$2y$12$vxed9Y4HfSAnptC9b5mjxe3UnkaXSv17phPHC0ftemyF5jnbUaPke', 0, '2023-01-19 13:33:23'),
(21, 21, 'sarajane.ferreira', '$2y$12$eDXaAITncsfkzd.3HjyBgubmaiwULy5oGaTcutcCQpP7tG7e7LjBC', 0, '2023-01-19 13:34:30'),
(22, 22, 'maria.luiza', '$2y$12$CVJm7eWJCSeHxnUyIgscnuJIJtf1oVxBFSUmraEXs877.mJuDYRTW', 0, '2023-01-19 13:35:01'),
(23, 23, 'jessica.maria', '$2y$12$eY.IiSTHJ48zJ2gvQt3KfOWEmswAPcbJQQHoWzECFGwoqb7k2McH6', 0, '2023-01-19 13:37:26'),
(24, 24, 'inaria.leite', '$2y$12$ZqflzryH1VZ07AE.uHOmkOf3QA8yGMaVqtm70/SyfIoOPSGRLGXrm', 0, '2023-01-19 13:38:05'),
(25, 25, 'andressa.oliveira', '$2y$12$7E5n3yTLxGa3x9oFtl.Le.1M2zmDeN/TMJHEfSTlqb6pPoCs.yZ5.', 0, '2023-01-19 14:53:12'),
(26, 26, 'denis.fagundes', '$2y$12$OCpKiic7vMZbRqoMa29k7.uFbGAC7TPAXX3j6qHX7IthjgMp7HVZ.', 0, '2023-01-20 11:31:59'),
(30, 30, 'flavia.kelly', '$2y$12$K0uzsUVtgGbGcfk20eXGtefkfmbHuPJuZSRF5RtE4aVgyhj89wC7K', 0, '2023-01-20 14:13:23'),
(31, 31, 'natan.nascimento', '$2y$12$r2yilm3tHAczqsFGnqR8oecbQNaL/sAYvfVExwApHKAJiyjLqSXwW', 0, '2023-01-26 16:10:12'),
(32, 32, 'carla.bessa', '$2y$12$F.tUHvcUvIW7pGeYITBsdeccenkQiEhpHJL/A1Rl1q6c5nROlYxG6', 0, '2023-01-26 16:11:00'),
(33, 33, 'fabiola.nascimento', '$2y$12$Kjdfph35CID.46W2f3iSIeX08a7TSPdPOo8hdc.Slx3c7EaV2VIZy', 0, '2023-01-26 16:12:06'),
(34, 34, 'alex.colombi', '$2y$12$O8Qcx.OGdwWB7wmGBVI2P.s5e3OpGyB2uiqFoeUdJYw3TD1U2mRiG', 0, '2023-01-26 16:13:13'),
(35, 35, 'thiago.catalani', '$2y$12$ybEtm4H/qPm5qwTuXrS49uCa35QzFvAiAEQbJCWVMMnp.vsgp21QK', 0, '2023-02-03 14:21:55'),
(36, 36, 'caliane.sa', '$2y$12$I6Qj7jzyPc7JpZqCtI8HwuKozTNsUAxvE1Brmsk980AGO1rTLRlGy', 0, '2023-03-16 15:18:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_userslogs`
--

CREATE TABLE `tb_userslogs` (
  `idlog` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_userspasswordsrecoveries`
--

CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_userspasswordsrecoveries`
--

INSERT INTO `tb_userspasswordsrecoveries` (`idrecovery`, `iduser`, `desip`, `dtrecovery`, `dtregister`) VALUES
(1, 7, '127.0.0.1', NULL, '2017-03-15 16:10:59'),
(2, 7, '127.0.0.1', '2017-03-15 13:33:45', '2017-03-15 16:11:18'),
(3, 7, '127.0.0.1', '2017-03-15 13:37:35', '2017-03-15 16:37:12'),
(4, 13, '127.0.0.1', NULL, '2022-10-21 00:06:54'),
(5, 13, '127.0.0.1', NULL, '2022-10-21 00:21:46'),
(6, 13, '127.0.0.1', NULL, '2022-11-07 13:15:31'),
(7, 13, '127.0.0.1', NULL, '2022-11-08 13:25:19'),
(8, 13, '127.0.0.1', NULL, '2022-11-08 13:29:08'),
(9, 13, '127.0.0.1', NULL, '2022-11-08 13:29:42'),
(10, 13, '127.0.0.1', NULL, '2022-11-08 13:31:11'),
(11, 13, '127.0.0.1', NULL, '2022-11-08 13:31:31'),
(12, 13, '127.0.0.1', NULL, '2022-11-08 13:58:37'),
(13, 13, '127.0.0.1', NULL, '2022-11-08 14:04:00'),
(14, 13, '127.0.0.1', NULL, '2022-11-08 14:05:04'),
(15, 12, '127.0.0.1', NULL, '2022-11-08 14:06:36'),
(16, 13, '127.0.0.1', NULL, '2022-11-22 12:43:34'),
(17, 13, '127.0.0.1', NULL, '2022-11-22 12:49:20'),
(18, 13, '127.0.0.1', NULL, '2022-11-22 12:49:23'),
(19, 13, '127.0.0.1', NULL, '2022-11-22 12:49:52'),
(20, 13, '127.0.0.1', NULL, '2022-11-22 13:17:25'),
(21, 13, '127.0.0.1', NULL, '2022-11-22 13:18:47'),
(22, 13, '127.0.0.1', NULL, '2022-11-22 13:24:56'),
(23, 13, '127.0.0.1', NULL, '2022-11-22 13:25:49'),
(24, 13, '127.0.0.1', NULL, '2022-11-22 13:35:32'),
(25, 13, '127.0.0.1', NULL, '2022-11-22 13:39:48'),
(26, 13, '127.0.0.1', NULL, '2022-11-22 14:06:32'),
(27, 13, '127.0.0.1', NULL, '2022-11-22 14:07:06'),
(28, 13, '127.0.0.1', NULL, '2022-11-22 16:18:26'),
(29, 13, '127.0.0.1', NULL, '2022-11-22 17:26:08'),
(30, 13, '127.0.0.1', NULL, '2022-11-22 17:26:48'),
(31, 13, '127.0.0.1', NULL, '2022-11-22 17:26:50'),
(32, 13, '127.0.0.1', NULL, '2022-11-22 17:31:14'),
(33, 12, '127.0.0.1', NULL, '2022-11-22 17:33:37'),
(34, 12, '127.0.0.1', NULL, '2022-11-22 17:35:57'),
(35, 12, '127.0.0.1', NULL, '2022-11-22 17:35:59'),
(36, 12, '127.0.0.1', NULL, '2022-11-22 17:44:20'),
(37, 12, '127.0.0.1', NULL, '2022-11-22 17:47:00'),
(38, 12, '127.0.0.1', NULL, '2022-11-22 17:48:48'),
(39, 12, '127.0.0.1', NULL, '2022-11-22 18:41:41'),
(40, 12, '127.0.0.1', NULL, '2022-11-22 18:42:51'),
(41, 12, '127.0.0.1', NULL, '2022-11-22 18:42:54'),
(42, 12, '127.0.0.1', NULL, '2022-11-22 18:42:56'),
(43, 12, '127.0.0.1', NULL, '2022-11-22 18:42:58'),
(44, 13, '127.0.0.1', NULL, '2022-11-22 18:43:01'),
(45, 12, '127.0.0.1', NULL, '2022-11-23 12:00:04'),
(46, 12, '127.0.0.1', NULL, '2022-11-23 12:00:07'),
(47, 13, '127.0.0.1', NULL, '2022-11-23 12:03:32'),
(48, 12, '127.0.0.1', NULL, '2022-11-23 12:06:44'),
(49, 12, '127.0.0.1', NULL, '2022-11-23 12:10:31'),
(50, 12, '127.0.0.1', NULL, '2022-11-23 12:10:34'),
(51, 12, '127.0.0.1', NULL, '2022-11-23 12:10:36'),
(52, 12, '127.0.0.1', NULL, '2022-11-23 12:11:57'),
(53, 12, '127.0.0.1', NULL, '2022-11-23 12:14:42'),
(54, 12, '127.0.0.1', NULL, '2022-11-23 12:15:35'),
(55, 12, '127.0.0.1', NULL, '2022-11-23 12:15:38'),
(56, 12, '127.0.0.1', NULL, '2022-11-23 12:16:18'),
(57, 12, '127.0.0.1', NULL, '2022-11-23 12:16:21'),
(58, 12, '127.0.0.1', NULL, '2022-11-23 12:19:19'),
(59, 12, '127.0.0.1', NULL, '2022-11-23 19:25:54'),
(60, 13, '127.0.0.1', NULL, '2022-12-12 11:55:45'),
(61, 13, '127.0.0.1', NULL, '2022-12-12 14:03:52'),
(62, 13, '127.0.0.1', NULL, '2022-12-12 17:38:40'),
(63, 13, '127.0.0.1', NULL, '2022-12-12 17:39:45'),
(64, 13, '127.0.0.1', NULL, '2022-12-12 17:40:16'),
(65, 13, '127.0.0.1', '2022-12-12 14:52:39', '2022-12-12 17:47:40'),
(66, 13, '127.0.0.1', NULL, '2022-12-12 18:36:30'),
(67, 13, '127.0.0.1', NULL, '2022-12-12 18:36:30'),
(68, 13, '10.112.10.252', NULL, '2022-12-22 12:46:15'),
(69, 13, '10.112.10.173', '2023-01-06 13:34:18', '2023-01-06 13:33:50'),
(70, 13, '10.112.10.173', '2023-01-06 13:35:37', '2023-01-06 13:35:20'),
(71, 13, '10.112.10.173', NULL, '2023-01-06 13:36:44'),
(72, 13, '10.112.10.252', '2023-01-06 17:20:44', '2023-01-06 17:20:23'),
(73, 13, '10.112.10.252', NULL, '2023-01-06 17:21:30'),
(74, 13, '10.112.10.252', NULL, '2023-01-06 17:27:22'),
(75, 12, '127.0.0.1', '2023-01-06 17:32:09', '2023-01-06 17:31:12'),
(76, 13, '10.112.10.252', '2023-01-06 17:34:44', '2023-01-06 17:34:32'),
(77, 13, '10.112.10.252', '2023-01-06 17:47:30', '2023-01-06 17:47:04'),
(78, 13, '10.112.10.252', NULL, '2023-01-06 19:53:55'),
(79, 16, '10.112.10.163', '2023-01-25 16:46:50', '2023-01-25 16:45:59'),
(80, 9, '10.112.10.191', NULL, '2023-01-30 07:47:01'),
(81, 16, '10.112.10.163', NULL, '2023-02-02 16:02:01'),
(82, 16, '10.112.10.163', '2023-02-02 19:28:21', '2023-02-02 19:28:02'),
(83, 9, '10.112.10.175', NULL, '2023-02-02 19:28:31'),
(84, 16, '10.112.10.163', NULL, '2023-02-28 13:27:00'),
(85, 1, '10.112.10.252', NULL, '2023-02-28 13:53:34'),
(86, 1, '10.112.10.252', '2023-02-28 13:55:09', '2023-02-28 13:54:22'),
(87, 16, '10.112.10.163', NULL, '2023-03-07 08:41:01'),
(88, 16, '10.112.10.163', '2023-03-07 08:43:07', '2023-03-07 08:42:27'),
(89, 9, '10.112.10.163', NULL, '2023-03-07 08:43:40'),
(90, 16, '10.112.10.163', '2023-03-26 17:56:44', '2023-03-26 17:49:16'),
(91, 16, '10.112.10.163', NULL, '2023-04-09 10:40:44'),
(92, 16, '10.112.10.219', NULL, '2023-04-10 10:36:52'),
(93, 1, '10.112.10.252', '2023-04-10 12:23:30', '2023-04-10 12:23:10'),
(94, 1, '10.112.10.252', NULL, '2023-04-10 12:24:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculos`
--

CREATE TABLE `tb_veiculos` (
  `idveiculo` int(11) NOT NULL,
  `idperson` int(11) DEFAULT NULL,
  `marca` varchar(128) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `placa` varchar(100) DEFAULT NULL,
  `cor` varchar(100) DEFAULT NULL,
  `vtec_descricao` varchar(100) DEFAULT NULL,
  `term_numero_terminal` varchar(100) DEFAULT NULL,
  `NumSM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_veiculos`
--

INSERT INTO `tb_veiculos` (`idveiculo`, `idperson`, `marca`, `modelo`, `placa`, `cor`, `vtec_descricao`, `term_numero_terminal`, `NumSM`) VALUES
(1, 30, 'SCANIA T 112', 'SCANIA/T112 HW 4X2', 'JJD6G03', 'BRANCO', 'SASCAR SASCARGA', 'JJD6G03-2', '2336877'),
(2, 22, 'VOLVO', 'VOLVO NL10 340', 'GNV1706', 'BRANCA', 'ONIXSAT EQ.6 ONIXSMART 4.00', '312563', '2340999 '),
(3, 23, 'VOLVO', 'VOLVO/FM 370 4X2T', 'IQM1B78', 'LARANJA', 'SASCAR SASCARGA', 'IQM1B78-2', '2338647'),
(4, 30, 'M.BENZ', 'L1620', 'NWM7I56', 'BRANCA', 'TELEMONITORADOS', 'TELNWM7I56', '2340661'),
(5, 14, 'SCANIA /P', 'SCANIA/P94GA4X2NZ 310', 'HDG1G16', 'BRANCA', 'SASCAR SASCARGA', 'HDG1G16-1', '2340552'),
(6, 16, 'IVECO/TECTOR 240E28', 'TECTOR240E28', 'OPF7C60', 'VERMELHA', 'SASCAR SASCARGA', 'OPF7C60-2', '2343048'),
(7, 31, 'SCANIA', 'SCANIA R 440 A6X4', 'GJD6J56', 'FANTASIA', 'ONIXSAT EQ.55 ONIXCONNECTSMARTHIDRIDO 1.00', '384445', '2346999'),
(8, 21, 'OUTROS', '', 'HMV4H99', 'BRANCA', 'SASCAR SASCARGA', 'HMV4H99', '2349194'),
(9, 14, '', '', 'MKF7800', 'PRETO', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '388090', '2351705'),
(10, 22, 'VOLVO/FM 440 6X2T', 'VOLVO', 'DPE7G97', 'BRANCA', 'ONIXSAT EQ.51 ONIXCONNECTSLIM 1.00', '369737', '2349376'),
(11, 16, 'IVECO/TECTOR 240E25S', 'IVECO/TECTOR 240E28', 'FGF8A15', 'BRANCA', 'TELEMONITORADOS', 'TELFGF8A15', '2355481'),
(12, 16, 'M. BENZ', 'MERCEDES BENZ AXOR 2540 S', 'QQM3307', 'BRANCA', 'SASCAR SASCARGA', 'QQM3307', '2358253'),
(13, 19, 'VOLVO', 'VM 270 6X2R', 'EWJ9E74', 'BRANCA', 'OMNILINK - RI4484', '982149', '2354060'),
(14, 16, 'SCANIA R114', '1111', 'KNP3B61', 'VERMELHA', 'ONIXSAT EQ.6 ONIXSMART 4.00', '272643', '2361100'),
(15, 14, 'VOLVO/FM 440 6X2T', 'VOLVO/440 6X2T', 'MRV2182', 'BRANCA', 'ONIXSAT EQ.55 ONIXCONNECTSMARTHIDRIDO 1.00', '286596', '2360192'),
(16, 12, 'GM/MONTANA CONQUEST', 'CHEVROLT', 'IQA1919', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '417162', '2362224'),
(17, 12, '', '', 'EZB6B62', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '423304', '2363887'),
(18, 12, 'MONTANA', 'CHEVROLET/MONTANA LS2', 'QPN1H61', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '442338', '2365419'),
(19, 24, 'VOLVO', 'VOLVO/FH 400 6X2T', 'MEO6A64', 'BRANCA', 'SASCAR SASCARGA', 'MEO6A64-3', '2361350'),
(20, 12, 'FIAT', 'FIAT/ FIORINO FLEX', 'HMC5E02', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '437775', '2367132'),
(21, 24, 'IVECO/STRALIS 600S44T', 'IVECO/STRALIS 600S44T', 'RNH5B16', 'BRANCA', 'ONIXSAT EQ.6 ONIXSMART 4.00', '373924', '2367803'),
(22, 12, 'FIAT FIORINO FLEX', 'FIORINO FLEX', 'JCA1J50', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '425349', '2369787'),
(23, 12, 'FIAT/FIORINO FLEX', 'FIAT/FIORINO FLEX', 'FLX0J25', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '423162', '2373100'),
(24, 12, 'FIAT', 'FIAT / DOBLO CARGO 1.4', 'OQP0259', 'PRATA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '422588', '2372959'),
(25, 12, 'FIAT/ FIORINO FLEX', '2010', 'EMJ7I61', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '444386', '2373068'),
(26, 12, 'FIAT/ FIORINO IE', 'FIAT/FIORINO IE', 'IGL8J95', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '420324', '2376999'),
(27, 14, 'VW 12140 A', 'IVECO', 'MRM1J38', 'BRANCO', 'ONIXSAT EQ.55 ONIXCONNECTSMARTHIDRIDO 1.00', '437077', '2379999'),
(28, 12, 'FIAT', 'FIAT / DOBLO CARGO 1.4', 'OQP0259', 'PRATA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '422588', '2383744'),
(29, 12, 'FIAT / PALIO FIRE FLEX', 'FIAT FIORINO FLEX', 'EJY3E05', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '384394', '2384379'),
(30, 14, 'VW 13180', 'VOLKS', 'FSR2B14', 'BRANCA', 'SASCAR SASCARGA', 'FSR2B14', '2385694'),
(31, 12, 'FIAT/ FIORINO HD WK E', 'FIAT/ FIORINO HD WK E', 'ECI9E53', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '324515', '2351864'),
(32, 16, 'SCANIA /P', '340', 'CUE5C36', 'BRANCA', 'AUTOTRAC OBC FIRMWARE STANDARD 1', '363192|268536060', '2383244'),
(33, 34, 'FIAT', 'DUCATO MAXICARGO', 'FNT5J85', 'BRANCA', 'ONIXSAT EQ.55 ONIXCONNECTSMARTHIDRIDO 1.00', '410175', '2389599'),
(34, 12, 'FIAT/FIORINO 1.4 FLEX', 'FIAT/FIORINO 1.4 FLEX', 'BAC9E40', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '312143', '2393863 '),
(35, 16, 'SCANIA', 'SCANIA P124 GA 4X2NZ 360', 'MQM9F51', 'BRANCA', 'ONIXSAT EQ.6 ONIXSMART 4.00', '348790', '2388807'),
(36, 22, 'VOLVOFH', 'VOLVO', 'QJO5D80', 'VERMELHA', 'OMNILINK - RI4484', '979573', '2395444'),
(37, 20, 'VOLKSWAGEN', 'VW 24.250 CNC 6X2', 'MKM9671', 'BRANCA', 'TELEMONITORADOS', 'TELMKM9671', '2396712'),
(38, 14, 'SACANIA', '440 A6X2', 'GCV2D13', 'AZUL', 'SIGHRA - VERSAO HIBRIDO', '97522', '2391455'),
(39, 12, '', '', 'ATM5807', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '446709', '2399456'),
(40, 12, 'FIAT/FIORINO 1.4 FLEX', 'FIORINO FLEX', 'QOY6C47', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '402599', '2399545'),
(41, 12, 'FIAT/FIORINO FLEX', 'FIAT/FIORINO FLEX', 'FLX0J25', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '423162', '2401083'),
(42, 14, 'VOLVO/FH 460 6X2 T', 'VOLVO', 'NZF7995', 'BRANCA', 'TELEMONITORADOS', 'TELNZF7995', '2403305'),
(43, 12, 'FIAT', 'FIAT FIORINO 1.4 FLEX', 'QNN1D78', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '442681', '2405044'),
(44, 12, 'DODGE', 'E13', 'QIA5015', 'BRANCO', 'ONIXSAT EQ.36 ONIXSMART 5.00', '220409', '2405287'),
(45, 12, 'FIAT/ FIORINO HD WK E', 'FIAT/ FIORINO HD WK E', 'QWW6H04', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '423674', '2407790'),
(46, 36, 'FIAT', 'FIORINO', 'EBK5I84', 'BRANCA', 'SASCAR SASCARGA', 'EBK5I84', '2409828'),
(47, 23, '1719', 'M BENZ', 'GVJ3F38', 'BRANCA', 'ONIXSAT EQ.35 ONIXSMART 5.00', '420755', '2411991'),
(48, 12, 'FIAT DOBLO CARGO FLEX', 'DOBLO', 'GFH7B19', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '446109', '2414929'),
(49, 12, 'FIAT/ FIORINO 1.4 FLEX', '2015', 'FSE3J45', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '437442', '2418487'),
(50, 19, 'M BENZ AXOR 2540 S', '2540 S', 'MSS0G14', 'BRANCA', 'SASCAR SASCARGA', 'MSS0G14', '2419695'),
(51, 16, 'SCANIA R112 4X2', 'SCANIA T1124X2', 'ABU6289', 'BRANCA', 'SASCAR SASCARGA', 'ABU6289-2', '2418999'),
(52, 22, 'T112 HS', 'SCANIA', 'LWS7D78', 'BRANCA', 'SASCAR SASCARGA', 'LWS7D78-2', '2416993'),
(53, 12, 'FIAT/ FIORINO 1.4 FLEX', '2015', 'EXY3H32', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '432583', '2393051'),
(54, 12, '', '', 'FLU1F93', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '440429', '2423618'),
(55, 12, 'FIAT', 'FIAT/ FIORINO FLEX', 'DWG5647', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '430234', '2426463'),
(56, 12, 'FIAT FIORINO FLEX', 'FIORINO FLEX', 'DXY2F71', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '423189', '2428321'),
(57, 12, '', '', 'HHT0B68', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '447073', '2428294'),
(58, 23, 'IVECO', 'DAILY CD', 'HFD8G85', 'AZUL', 'TELEMONITORADOS', 'TELHFD8G85', '2429063'),
(59, 12, 'FIAT FIORINO IE', 'FIAT FIORINO IE', 'DOR6B13', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '422983', '2431824'),
(60, 12, '', '', 'HHP0C95', 'BRANCA', 'ONIXSAT EQ.54 ONIXCONNECTSMART 1.00', '395692', '2433371'),
(61, 19, 'MERCEDES BENZ/L', 'MERCEDES BENZ', 'EKU5758', 'BRANCA', 'SIGHRA - VERSAO HIBRIDO', '132220', '2434435'),
(62, 19, 'FIAT/FIORINO 1.4 FLEX', 'FIAT/FIORINO 1.4 FLEX', 'FOW1A97', 'BRANCA', 'SASCAR SASCARGA', 'FOW1A97', '2436910'),
(63, 1, 'M. BENZ', 'AXOR 2644S6X4', 'DAO7H60', 'BRANCA', 'SASCAR SASCARGA', 'DAO7H60-2', '2493310'),
(64, 1, 'SCANIA', 'SCANIA/R124 GA4X2NZ 420', 'MRQ5A66', 'BRANCA', 'ONIXSAT EQ.55 ONIXCONNECTSMARTHIDRIDO 1.00', '374817', '2493824'),
(65, 1, 'SCANIA', 'SCANIA/R124 GA4X2NZ 420', 'MRQ5A66', 'BRANCA', 'ONIXSAT EQ.55 ONIXCONNECTSMARTHIDRIDO 1.00', '374817', '2475564'),
(66, 1, '', '', 'DED4C63', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '449628', '2465543'),
(67, 1, '', '', 'DED4C63', 'BRANCA', 'ONIXSAT EQ.36 ONIXSMART 5.00', '449628', '24655438'),
(68, 1, 'M. BENS ATEGO', 'M. BENZ ATEGO 1718', 'FWJ3B94', 'BRANCA', 'OMNILINK - RI4484', '949054', '2467061'),
(69, 1, 'M. BENS ATEGO', 'M. BENZ ATEGO 1718', 'FWJ3B94', 'BRANCA', 'OMNILINK - RI4484', '949054', '2467012'),
(70, 1, 'M. BENS ATEGO', 'M. BENZ ATEGO 1718', 'FWJ3B94', 'BRANCA', 'OMNILINK - RI4484', '949054', '2477012'),
(71, 1, 'M. BENS ATEGO', 'M. BENZ ATEGO 1718', 'FWJ3B94', 'BRANCA', 'OMNILINK - RI4484', '949054', '24777012'),
(72, 1, 'M. BENS ATEGO', 'M. BENZ ATEGO 1718', 'FWJ3B94', 'BRANCA', 'OMNILINK - RI4484', '949054', '23777012'),
(73, 1, 'M. BENS ATEGO', 'M. BENZ ATEGO 1718', 'FWJ3B94', 'BRANCA', 'OMNILINK - RI4484', '949054', '33777012'),
(74, 7, 'SCANIA/R124 GA4X2NZ', 'SCANIA', 'HFD4776', 'VERMELHA', 'ONIXSAT EQ.35 ONIXSMART 5.00', '269647', '2461941');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_viagens`
--

CREATE TABLE `tb_viagens` (
  `idviagem` int(11) NOT NULL,
  `viagemId` varchar(150) DEFAULT NULL,
  `dataInicio` varchar(60) DEFAULT NULL,
  `Valor` varchar(60) DEFAULT NULL,
  `cidadeOrigem` varchar(150) DEFAULT NULL,
  `cidadeDestino` varchar(150) DEFAULT NULL,
  `Produtos` varchar(60) DEFAULT NULL,
  `Dtregistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_viagens`
--

INSERT INTO `tb_viagens` (`idviagem`, `viagemId`, `dataInicio`, `Valor`, `cidadeOrigem`, `cidadeDestino`, `Produtos`, `Dtregistro`) VALUES
(1, '2336877', '2023-01-18 11:38:58', '450000.00', 'CAFE BRASILEIRO - CUIABA', 'TRES CORACOES BRASILIA', '', '2023-01-20 17:54:16'),
(2, '2340999', '2023-01-20 23:22:08', '472963.34', 'AGUIA SUL CONTAGEM - MG', 'FAVORITA FILIAL APARECIDA DE GOIANIA', 'DIVERSOS', '2023-01-21 08:34:21'),
(3, '2338647', '2023-01-19 12:20:08', '450000.00', 'FLORA ITAJAI', 'TRANSPORTADORA FORTES', 'DIVERSOS', '2023-01-23 08:56:45'),
(4, '2340661', '2023-01-20 17:31:03', '61433.75', 'SOLUCOES USIMINAS SANTA LUZIA/MG', 'ALFA E CIA DISTRIBUIDORA (VITORIA DA CONQUISTA-BA)', 'Chapa de Aço', '2023-01-23 20:20:01'),
(5, '2340552', '2023-01-20 16:15:16', '204565.00', 'AX INDUSTRIA', 'LATASA RIO DE JANEIRO', 'Latinhas de Aluminio', '2023-01-24 20:10:42'),
(6, '2343048', '2023-01-23 18:20:07', '409462.45', 'CAMPARI EXTREMA', 'DVL-DISTRIBUIDORA - CONTAGEM', '', '2023-01-25 18:47:23'),
(7, '2346999', '2023-01-26 04:14:32', '259294.00', '(RB) RECKITT - EMBU/ SP', '(RB) SENDAS - CAJAMAR/ SP', '', '2023-01-26 19:36:18'),
(8, '2349194', '2023-01-27 12:44:27', '600000.00', 'CERVEJARIA KAISER PONTA GROSSA PR', 'SPAL CAMPO GRANDE MS', '', '2023-01-30 08:44:53'),
(9, '2351705', '2023-01-30 13:17:34', '141643.24', 'SU - SAO ROQUE', 'FERROLENE - SAO PAULO', '', '2023-01-30 21:00:57'),
(10, '2349376', '2023-01-27 15:10:17', '103677.67', 'SU SÃO ROQUE', 'FORTLINE ( SÃO SIMÃO )', 'Chapa de Aço', '2023-01-31 07:26:48'),
(11, '2355481', '2023-02-01 16:16:22', '91537.64', 'CONTAGEM - MG', 'DIADEMA-SP', '', '2023-02-02 19:34:51'),
(12, '2358253', '2023-02-03 08:51:42', '160919.26', 'SOLUCOES SANTA LUZIA', 'JESIANA INDUSTRIA', 'chapas de aço ', '2023-02-03 20:00:19'),
(13, '2354060', '2023-01-31 21:38:04', '235965.54', 'CONTINENTAL CAMACARI', 'INDUSTRIA E COMERCIO DE OLEOS FLORESTOPOLIS', '', '2023-02-05 19:56:05'),
(14, '2361100', '2023-02-06 12:53:13', '500000.00', 'GLP -CARREGAMENTO TEXACO - XERÉM X CABEDELO -PB - LUBNORTE', 'COMLUB - CABO DE SANTO AGOSTINHO', 'Alimentícios ', '2023-02-06 21:46:32'),
(15, '2360192', '2023-02-04 19:27:12', '257590.18', 'PATIO DAS TRANSPORTADORAS DA USIMINAS RMD', 'HYUNDAI - ITATIAIA', 'Chapa de Aço', '2023-02-07 14:22:26'),
(16, '2362224', '2023-02-07 07:16:32', '27305.39', 'JTI PORTO ALEGRE', 'JTI PORTO ALEGRE', 'Cigarro ', '2023-02-07 17:55:07'),
(17, '2363887', '2023-02-08 04:18:33', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-02-08 17:59:19'),
(18, '2365419', '2023-02-09 01:09:52', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'CIGARRO', '2023-02-09 20:14:39'),
(19, '2361350', '2023-02-06 15:57:18', '275556.32', 'JALLES MACHADO S/A', 'ARMAZENS GERAIS FASSINA', 'Açúcar ', '2023-02-10 09:34:48'),
(20, '2367132', '2023-02-10 01:14:26', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-02-10 18:02:34'),
(21, '2367803', '2023-02-10 11:34:19', '238079.93', 'DEICMAR S/A', 'UNIFI DO BRASIL LTDA', '', '2023-02-11 09:12:15'),
(22, '2369787', '2023-02-13 07:07:56', '58947.18', 'JTI PORTO ALEGRE', 'JTI PORTO ALEGRE', 'Cigarro ', '2023-02-13 18:31:47'),
(23, '2373100', '2023-02-15 02:03:17', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-02-15 17:48:35'),
(24, '2372959', '2023-02-15 00:33:29', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'CIGARRO', '2023-02-15 20:53:02'),
(25, '2373068', '2023-02-15 02:00:28', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', '', '2023-02-15 21:11:32'),
(26, '2376999', '2023-02-17 07:20:07', '16486.40', 'JTI PORTO ALEGRE', 'JTI PORTO ALEGRE', 'Cigarro', '2023-02-17 17:15:47'),
(27, '2379999', '2023-02-21 09:51:27', '274344.80', 'FERROLENE CONTAGEM -MG (  RUA AMERICO SANTIAGO PIACENZA)', 'COSMA DO BRASIL', 'Bubinas', '2023-02-21 18:50:51'),
(28, '2383744', '2023-02-24 03:19:47', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro', '2023-02-24 17:18:07'),
(29, '2384379', '2023-02-24 10:41:46', '10.00', 'SAO PAULO-SP ', 'SAO PAULO-SP ', 'Cigarro', '2023-02-24 17:35:08'),
(30, '2385694', '2023-02-25 09:04:27', '68790.58', 'USIMINAS SANTA LUZIA-MG (TISL)', 'ARMCO DO BRASIL S/A  - SAO PAULO-SP', 'Bubinas', '2023-02-27 13:37:41'),
(31, '2351864', '2023-01-30 15:33:12', '0.10', '(JTI) PRONTA ENTREGA/ BELO HORIZONTE - MG', '(JTI) PRONTA ENTREGA/ BELO HORIZONTE - MG', 'Cigarro', '2023-02-27 18:01:52'),
(32, '2383244', '2023-02-23 17:46:10', '274252.47', 'FLORA LUZIANIA GO', 'MATEUS SUPERMERCADOS CAJAZEIRAS PB', '', '2023-02-28 14:16:24'),
(33, '2389599', '2023-02-28 17:10:10', '328281.94', '(RB) RECKITT - ITUPEVA/ SP ', '(RB) RECKITT - VIANA/ES (LOG VIANA)', 'HIGIENE E LIMPEZA', '2023-03-03 11:20:49'),
(34, '2393863', '2023-03-03 04:34:31', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro', '2023-03-03 19:00:13'),
(35, '2388807', '2023-02-28 09:28:46', '530000.00', 'VIBRA - PETROBRAS - DUQUE DE CAXIAS RJ', 'MP LUB - RECIFE PE', 'Óleo automotivo ', '2023-03-03 19:35:59'),
(36, '2395444', '2023-03-04 00:30:45', '150000.00', 'USIMINAS CUBATAO-SP', 'IMPLEMENTOS AGRICOLAS JAN SA', 'BOBINA DE AÇO', '2023-03-06 07:44:38'),
(37, '2396712', '2023-03-06 09:03:08', '72967.35', 'SU - ACOS ALIANCA', 'SU - SANTA LUZIA', '', '2023-03-07 09:12:52'),
(38, '2391455', '2023-03-01 17:19:58', '310076.24', 'SOLUCOES IPATINGA', 'HERGEN S.A MAQUINAS - RIO DO SUL', 'Chapas', '2023-03-07 20:34:08'),
(39, '2399456', '2023-03-08 02:26:00', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarros ', '2023-03-08 18:42:52'),
(40, '2399545', '2023-03-08 06:03:13', '0.10', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarros ', '2023-03-08 18:54:07'),
(41, '2401083', '2023-03-09 03:44:22', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarros JTI', '2023-03-09 18:10:02'),
(42, '2403305', '2023-03-10 12:28:49', '119935.09', 'CENTRASA - SOLUCOES USIMINAS/CONTAGEM-MG', 'SOLUCOES EM ACO USIMINAS STA LUZIA', '', '2023-03-10 20:20:42'),
(43, '2405044', '2023-03-13 06:04:18', '20.00', 'CLARO SA AV GERALDO ROCHA 548 CONTAGEM MG', 'AV GERALDO ROCHA,548,CHACARAS COTIA,32183054,CONTAGEM,MG', 'Cigarros ', '2023-03-13 18:45:49'),
(44, '2405287', '2023-03-13 09:25:56', '0.10', '(JTI) PRONTA ENTREGA / SAO PAULO - SP', '(JTI) PRONTA ENTREGA / SAO PAULO - SP', '', '2023-03-14 16:54:20'),
(45, '2407790', '2023-03-14 21:20:18', '65000.00', 'RIO DE JANEIRO/RJ', 'RIO DE JANEIRO/RJ', 'Cigarros ', '2023-03-15 18:18:05'),
(46, '2409828', '2023-03-16 06:47:03', '0.01', 'LOG CENTER - UNIDADE SANTANA DE PARNAIBA', 'LOG CENTER - UNIDADE SANTANA DE PARNAIBA', 'MEDICAMENTOS', '2023-03-16 15:47:01'),
(47, '2411991', '2023-03-17 14:30:41', '141320.84', 'USIMINAS IPATINGA-MG', 'CENTRO DE SERVICO SA LTDA', 'Bobina', '2023-03-20 08:50:52'),
(48, '2414929', '2023-03-21 02:30:53', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-03-21 19:51:52'),
(49, '2418487', '2023-03-23 07:58:57', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarros JTI', '2023-03-23 18:37:46'),
(50, '2419695', '2023-03-23 23:22:31', '423388.43', 'POSTO LUIZA', 'TERMINAL TECAJU - TRACKER', '', '2023-03-24 19:58:05'),
(51, '2418999', '2023-03-23 13:43:02', '375983.50', 'CAMPARI EXTREMA', 'JR DISTRIBUIDORA * BRASILIA', '', '2023-03-26 18:27:00'),
(52, '2416993', '2023-03-22 08:52:08', '321000.00', 'CAMPARI EXTREMA', 'JR DISTRIBUICAO DE ALIMENTOS LTDA', '', '2023-03-27 11:52:17'),
(53, '2393051', '2023-03-02 15:13:17', '0.10', '(JTI) PRONTA ENTREGA/ BELO HORIZONTE - MG', '(JTI) PRONTA ENTREGA/ BELO HORIZONTE - MG', 'Cigarro ', '2023-03-28 11:10:47'),
(54, '2423618', '2023-03-28 03:31:33', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-03-28 19:16:53'),
(55, '2426463', '2023-03-29 19:04:42', '65000.00', 'RIO DE JANEIRO/RJ', 'RIO DE JANEIRO/RJ', 'Cigarro ', '2023-03-31 13:46:50'),
(56, '2428321', '2023-03-31 03:28:10', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-03-31 17:35:04'),
(57, '2428294', '2023-03-31 02:50:02', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', 'Cigarro ', '2023-03-31 20:58:00'),
(58, '2429063', '2023-03-31 13:49:08', '148701.21', 'SU - CENTRASA', 'TOWER ARUJA SP', '', '2023-04-03 03:36:05'),
(59, '2431824', '2023-04-04 00:58:35', '0.10', 'SAO PAULO-SP', 'SAO PAULO-SP', '', '2023-04-04 17:50:57'),
(60, '2433371', '2023-04-05 01:26:19', '0.10', 'SAO PAULO-SP', 'SAO PAULO-SP', '', '2023-04-05 17:43:06'),
(61, '2434435', '2023-04-05 16:48:02', '349995.95', 'FERROLENE CADIRIRI', 'METALSA - OSASCO', '', '2023-04-06 18:59:41'),
(62, '2436910', '2023-04-08 06:54:12', '1.00', 'LOG CENTER - UNIDADE SANTANA DE PARNAIBA', 'LOG CENTER - UNIDADE SANTANA DE PARNAIBA', '', '2023-04-10 11:22:45'),
(63, '2493310', '2023-05-24 16:09:35', '297514.35', 'FRIVASA', '10334-FRIDEL FRIGORIFICO DEL REY LTDA.', '', '2023-05-26 16:29:42'),
(64, '2493824', '2023-05-25 00:03:48', '1126279.25', 'FILIAL CATERPILLAR PIRACICABA (SOTREQ)', 'FILIAL FORTALEZA (SOTREQ)', '', '2023-05-26 16:33:09'),
(65, '2493824', '2023-05-25 00:03:48', '1126279.25', 'FILIAL CATERPILLAR PIRACICABA (SOTREQ)', 'FILIAL FORTALEZA (SOTREQ)', '', '2023-05-26 16:34:29'),
(66, '2465543', '2023-05-03 01:12:38', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', '', '2023-05-26 19:03:08'),
(67, '2465543', '2023-05-03 01:12:38', '10.00', 'SAO PAULO-SP', 'SAO PAULO-SP', '', '2023-05-26 19:11:11'),
(68, '2467061', '2023-05-04 00:28:57', '1074175.51', '(PRIME) FILIAL RIO', '(PRIME) MATRIZ SP', '', '2023-05-26 19:20:12'),
(69, '2467061', '2023-05-04 00:28:57', '1074175.51', '(PRIME) FILIAL RIO', '(PRIME) MATRIZ SP', '', '2023-05-26 19:30:33'),
(70, '2467061', '2023-05-04 00:28:57', '1074175.51', '(PRIME) FILIAL RIO', '(PRIME) MATRIZ SP', '', '2023-05-26 19:43:30'),
(71, '2467061', '2023-05-04 00:28:57', '1074175.51', '(PRIME) FILIAL RIO', '(PRIME) MATRIZ SP', '', '2023-05-26 19:45:18'),
(72, '2467061', '2023-05-04 00:28:57', '1074175.51', '(PRIME) FILIAL RIO', '(PRIME) MATRIZ SP', '', '2023-05-26 19:49:16'),
(73, '2467061', '2023-05-04 00:28:57', '1074175.51', '(PRIME) FILIAL RIO', '(PRIME) MATRIZ SP', '', '2023-05-26 19:50:38'),
(74, '2461941', '2023-04-28 14:35:28', '310791.92', 'USIMINAS IMBIRUCU/ BETIM-MG', 'SOLUCOES EM ACO - TAUBATE SP', 'Limpeza', '2023-05-26 20:03:58');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_acionamentos`
--
ALTER TABLE `tb_acionamentos`
  ADD PRIMARY KEY (`idacionamento`);

--
-- Índices para tabela `tb_alertas`
--
ALTER TABLE `tb_alertas`
  ADD PRIMARY KEY (`idalerta`);

--
-- Índices para tabela `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `FK_carts_users_idx` (`iduser`);

--
-- Índices para tabela `tb_cartsproducts`
--
ALTER TABLE `tb_cartsproducts`
  ADD PRIMARY KEY (`idcartproduct`),
  ADD KEY `FK_cartsproducts_carts_idx` (`idcart`),
  ADD KEY `FK_cartsproducts_products_idx` (`idproduct`);

--
-- Índices para tabela `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`idcategory`);

--
-- Índices para tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `tb_gerentes`
--
ALTER TABLE `tb_gerentes`
  ADD PRIMARY KEY (`idgerente`);

--
-- Índices para tabela `tb_iscas`
--
ALTER TABLE `tb_iscas`
  ADD PRIMARY KEY (`idiscas`);

--
-- Índices para tabela `tb_motoristas`
--
ALTER TABLE `tb_motoristas`
  ADD PRIMARY KEY (`idmotorista`);

--
-- Índices para tabela `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `FK_orders_users_idx` (`iduser`),
  ADD KEY `fk_orders_ordersstatus_idx` (`idstatus`),
  ADD KEY `fk_orders_carts_idx` (`idcart`),
  ADD KEY `fk_orders_addresses_idx` (`idaddress`);

--
-- Índices para tabela `tb_orderspagseguro`
--
ALTER TABLE `tb_orderspagseguro`
  ADD PRIMARY KEY (`idorder`);

--
-- Índices para tabela `tb_ordersstatus`
--
ALTER TABLE `tb_ordersstatus`
  ADD PRIMARY KEY (`idstatus`);

--
-- Índices para tabela `tb_persons`
--
ALTER TABLE `tb_persons`
  ADD PRIMARY KEY (`idperson`);

--
-- Índices para tabela `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`idproduct`);

--
-- Índices para tabela `tb_productscategories`
--
ALTER TABLE `tb_productscategories`
  ADD PRIMARY KEY (`idcategory`,`idproduct`),
  ADD KEY `fk_productscategories_products_idx` (`idproduct`);

--
-- Índices para tabela `tb_seguradoras`
--
ALTER TABLE `tb_seguradoras`
  ADD PRIMARY KEY (`idseguradora`);

--
-- Índices para tabela `tb_sinistros`
--
ALTER TABLE `tb_sinistros`
  ADD PRIMARY KEY (`idsinistro`);

--
-- Índices para tabela `tb_tipossinistro`
--
ALTER TABLE `tb_tipossinistro`
  ADD PRIMARY KEY (`idtipoSinistro`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `FK_users_persons_idx` (`idperson`);

--
-- Índices para tabela `tb_userslogs`
--
ALTER TABLE `tb_userslogs`
  ADD PRIMARY KEY (`idlog`),
  ADD KEY `fk_userslogs_users_idx` (`iduser`);

--
-- Índices para tabela `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  ADD PRIMARY KEY (`idrecovery`),
  ADD KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`);

--
-- Índices para tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD PRIMARY KEY (`idveiculo`),
  ADD KEY `fk_addresses_persons_idx` (`idperson`);

--
-- Índices para tabela `tb_viagens`
--
ALTER TABLE `tb_viagens`
  ADD PRIMARY KEY (`idviagem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_acionamentos`
--
ALTER TABLE `tb_acionamentos`
  MODIFY `idacionamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de tabela `tb_alertas`
--
ALTER TABLE `tb_alertas`
  MODIFY `idalerta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_carts`
--
ALTER TABLE `tb_carts`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cartsproducts`
--
ALTER TABLE `tb_cartsproducts`
  MODIFY `idcartproduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_gerentes`
--
ALTER TABLE `tb_gerentes`
  MODIFY `idgerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb_iscas`
--
ALTER TABLE `tb_iscas`
  MODIFY `idiscas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_motoristas`
--
ALTER TABLE `tb_motoristas`
  MODIFY `idmotorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_ordersstatus`
--
ALTER TABLE `tb_ordersstatus`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_persons`
--
ALTER TABLE `tb_persons`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_seguradoras`
--
ALTER TABLE `tb_seguradoras`
  MODIFY `idseguradora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_sinistros`
--
ALTER TABLE `tb_sinistros`
  MODIFY `idsinistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_tipossinistro`
--
ALTER TABLE `tb_tipossinistro`
  MODIFY `idtipoSinistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tb_userslogs`
--
ALTER TABLE `tb_userslogs`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  MODIFY `idrecovery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  MODIFY `idveiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_viagens`
--
ALTER TABLE `tb_viagens`
  MODIFY `idviagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD CONSTRAINT `fk_veiculos_idperson` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
