<?php

namespace Apps\Http\Models;

class Infoconv
{
    private static $table1 = 'tb_dados_cpf';
    private static $table2 = 'tb_consulta_externa_comp';
    private static $table3 = 'tb_dados_naoencontrados';
    private static $table4 = 'tb_config';
    public static function consultainfoconvcnpj(array $dados, string $cnpj)
    {
        $pemfile = __DIR__ . '\infoconv2.pem';
        $password = 'cti@21';
        $listaCnpj = $cnpj;
        $cpfUsuario =  $dados['cpf'];
        $soapUrl = "https://acesso.infoconv.receita.fazenda.gov.br/ws/cnpj/consultarcnpj.asmx?wsdl";
        $options = [
            'local_cert' => $pemfile,
            'passphrase' => $password,
            'stream_context' => stream_context_create(
                [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ]
            )
        ];
        try {
            $soapClient = new \SoapClient($soapUrl, $options); //Declarando e instanciando o Objeto que fará a chamada e a troca de mensagens entre Cliente e Servidor usando o Protocolo SOAP.
            $params = array('CNPJ' => $listaCnpj, 'CPFUsuario' => $cpfUsuario); //Configurando os parâmetros de chamada que serão utilizados na requisição ao Serviço do InfoConv.
            $theResponse = $soapClient->ConsultarCNPJP3($params); //Faz a requisição e armazena a resposta do Webservice. O retorno é um objeto do tipo "Object(stdClass)".
            if ($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Erro == "") {
                Infoconv::salvarconsultainfoconvcnpj($dados, $cnpj);
                Infoconv::contabilizarconsultas();
                return Infoconv::salvardadosinfoconvcnpj($theResponse);
            } else {
                Infoconv::salconsultainfoconvnaoencontrado($cnpj);
                return false;
                // return  $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Erro;
            }
        } catch (SoapFault $exception) {
            // echo $exception->getMessage();
            return;
        }
    }
    public static function consultainfoconvcpf(array $dados, string $cpf)
    {
        //DADOS DE CONFIGURAÇÃO DO CERTIFICADO - Devem ser editados conforme as necessidades do Convenente
        $pemfile = __DIR__ . '\infoconv2.pem';
        $password = 'cti@21';
        //DADOS DE ENTRADA
        $listaCPF = $cpf;
        $cpfUsuario = $dados['cpf'];
        //CONFIGURAÇÃO DA CHAMADA SOAP - INCLUSÃO DO CERTIFICADO DIGITAL NA CHAMADA.
        //https://hom-acesso.infoconv.receita.fazenda.gov.br/ws/ - HOMOLOGAÇÃO
        //https://acesso.infoconv.receita.fazenda.gov.br/ws/ - PRODUCAÇÃO
        $soapUrl = "https://acesso.infoconv.receita.fazenda.gov.br/ws/cpf/consultarcpf.asmx?wsdl";
        $options = [
            'local_cert' => $pemfile,
            'passphrase' => $password,
            'stream_context' => stream_context_create(
                [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ]
            )
        ];
        try {
            $soapClient = new \SoapClient($soapUrl, $options); //Declarando e instanciando o Objeto que fará a chamada e a troca de mensagens entre Cliente e Servidor usando o Protocolo SOAP.
            $params = array('ListaDeCPF' => $listaCPF, 'CPFUsuario' => $cpfUsuario); //Configurando os parâmetros de chamada que serão utilizados na requisição ao Serviço do InfoConv.
            $theResponse = $soapClient->ConsultarCPFP3($params); //Faz a requisição e armazena a resposta do Webservice. O retorno é um objeto do tipo "Object(stdClass)".
            if ($theResponse->ConsultarCPFP3Result->PessoaPerfil3->Erro == "") {
                Infoconv::salvarconsultainfoconvcpf($dados, $cpf);
                Infoconv::contabilizarconsultas();
                return Infoconv::salvardadosinfoconvcpf($theResponse);
            } else {
                Infoconv::salconsultainfoconvnaoencontrado($cpf);
                return false;
                // return $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Erro;
            }
        } catch (SoapFault $exception) {
            echo $exception->getMessage();
            return;
        }
    }
    private static function salvarconsultainfoconvcnpj(array $dados, string $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $now = date('Y-m-d H:i:s');
        $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table2 . ' (nome_usuario,cpf_cnpj_consultado,cpf_consulta,tipo_consulta,empresa_consulta,base_consulta,data_consulta) VALUES(:nome_usuario,:cpf_cnpj_consultado,:cpf_consulta,:tipo_consulta,:empresa_consulta,:base_consulta,:data_consulta)');
        $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
        $queryInsert->bindValue(":cpf_cnpj_consultado", $cpf);
        $queryInsert->bindValue(":cpf_consulta", $dados['cpf']);
        $queryInsert->bindValue(":tipo_consulta", "CNPJ");
        $queryInsert->bindValue(":empresa_consulta", $dados['empresa']);
        $queryInsert->bindValue(":base_consulta", "Base Infoconv");
        $queryInsert->bindValue(":data_consulta", $now);
        $queryInsert->execute();
    }
    private static function salvarconsultainfoconvcpf(array $dados, string $cpf)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $now = date('Y-m-d H:i:s');
        $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table2 . ' (nome_usuario,cpf_cnpj_consultado,cpf_consulta,tipo_consulta,empresa_consulta,base_consulta,data_consulta) VALUES(:nome_usuario,:cpf_cnpj_consultado,:cpf_consulta,:tipo_consulta,:empresa_consulta,:base_consulta,:data_consulta)');
        $queryInsert->bindValue(":nome_usuario", $dados['nomeuser']);
        $queryInsert->bindValue(":cpf_cnpj_consultado", $cpf);
        $queryInsert->bindValue(":cpf_consulta", $dados['cpf']);
        $queryInsert->bindValue(":tipo_consulta", "CPF");
        $queryInsert->bindValue(":empresa_consulta", $dados['empresa']);
        $queryInsert->bindValue(":base_consulta", "Base Infoconv");
        $queryInsert->bindValue(":data_consulta", $now);
        $queryInsert->execute();
    }
    private static function salconsultainfoconvnaoencontrado(string $opc)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $today = date("Y-m-d H:i:s");
        $queryInsert = $connPdo->prepare('INSERT INTO  ' . self::$table3 . '(cnpj_cpf,data) VALUES(:cpf_cnpj,:data)');
        $queryInsert->bindValue(":cpf_cnpj", $opc);
        $queryInsert->bindValue(":data", $today);
        $queryInsert->execute();
    }
    private static function contabilizarconsultas()
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $queryUpdate = $connPdo->prepare('UPDATE ' . self::$table4 . ' SET valor_configuracao=valor_configuracao+1 WHERE id_configuracao=:id');
        $queryUpdate->bindValue(":id", 2);
        $queryUpdate->execute();
    }
    private static function salvardadosinfoconvcnpj($theResponse)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $cnpj = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNPJ;
        $estabelecimento = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Estabelecimento;
        $nomeEmpresarial = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NomeEmpresarial);
        $nomeFantasia = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NomeFantasia);
        $situacaoCadastral = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->SituacaoCadastral;
        $dataSituacaoCadastral = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->DataSituacaoCadastral;
        $cidadeExterior =  addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CidadeExterior);
        $codigoPais = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CodigoPais;
        $nomePais =  addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NomePais);
        $naturezaJuridica = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NaturezaJuridica;
        $dataAbertura = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->DataAbertura;
        $cnaePrincipal = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNAEPrincipal;
        $cnaeSecundarioCount = count($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNAESecundario->string);
        if ($cnaeSecundarioCount >= 2) {
            $cnaeSecundario = json_encode($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNAESecundario->string);
            $cnaeSecundario =   json_decode($cnaeSecundario, TRUE);
            $cnaeSecundario = implode(",", $cnaeSecundario);
        } else if ($cnaeSecundarioCount == 1) {
            $cnaeSecundario = json_encode($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNAESecundario->string);
            $cnaeSecundario =   json_decode($cnaeSecundario, TRUE);
        } else {
            $cnaeSecundario = "";
        }
        $tipoLogradouro =  addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->TipoLogradouro);
        $logradouro = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Logradouro);
        $numeroLogradouro = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NumeroLogradouro;
        $complemento = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Complemento);
        $bairro = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Bairro);
        $cep = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CEP;
        $uf = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->UF;
        $codigoMunicipio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CodigoMunicipio;
        $nomeMunicipio = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NomeMunicipio);
        $ddd1 = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->DDD1;
        $telefone1 = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Telefone1;
        $ddd2 = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->DDD2;
        $telefone2 = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Telefone2;
        $email = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Email);
        $cpfResponsavel = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CPFResponsavel;
        $nomeResponsavel = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NomeResponsavel);
        $capitalSocial = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CapitalSocial;
        $tipoCRCContadorPJ = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->TipoCRCContadorPJ;
        $classificacaoCRCContadorPJ = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->ClassificacaoCRCContadorPJ;
        $numeroCRCContadorPJ = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NumeroCRCContadorPJ;
        $ufCrcContadorPJ = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->UFCRCContadorPJ;
        $cnpjContador = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNPJContador;
        $tipoCRCContadorPF = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->TipoCRCContadorPF;
        $classificacaoCRCContadorPF = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->ClassificacaoCRCContadorPF;
        $numeroCRCContadorPF = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->NumeroCRCContadorPF;
        $ufCrcContadorPF = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->UFCRCContadorPF;
        $cpfContador = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CPFContador;
        $porte = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Porte;
        $opcaoSimples = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->OpcaoSimples;
        $dataOpcaoSimples = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->DataOpcaoSimples;
        $dataExclusaoSimples = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->DataExclusaoSimples;
        $cnpjSucedida = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->CNPJSucedida;
        $socios = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio;

        //INSERE OS DADOS DO CNPJ PESQUISADO NA BASE
        $salvaDadosCnpj = $connPdo->query("INSERT INTO `bd_infoconv`.`tb_dados_cnpj` (`cnpj`, `estabelecimento`, `nome_empresarial`, `nome_fantasia`, `situacao_cadastral`, `data_situacao_cadastral`, `cidade_exterior`, `codigo_pais`, `nome_pais`, `natureza_juridica`, `data_abertura`, `cnae_principal`, `cnae_secundario`, `tipo_logradouro`, `logradouro`, `numero_logradouro`, `complemento`, `bairro`, `cep`, `uf`, `codigo_municipio`, `nome_municipio`, `ddd1`, `telefone1`, `ddd2`, `telefone2`, `email`, `cpf_responsavel`, `nome_responsavel`, `capital_social`, `tipo_crc_contador_pj`, `classificacao_crc_contador_pj`, `numero_crc_contador_pj`, `uf_crc_contador_pj`, `cnpj_contador`, `tipo_crc_contador_pf`, `classificacao_crc_contador_pf`, `numero_crc_contador_pf`, `uf_crc_contador_pf`, `cpf_contador`, `porte`, `opcao_simples`, `data_opcao_simples`, `data_exclusao_simples`, `cnpj_sucedida`)
            VALUES ('$cnpj', '$estabelecimento','$nomeEmpresarial','$nomeFantasia','$situacaoCadastral','$dataSituacaoCadastral','$cidadeExterior','$codigoPais','$nomePais','$naturezaJuridica','$dataAbertura','$cnaePrincipal','$cnaeSecundario','$tipoLogradouro','$logradouro','$numeroLogradouro','$complemento','$bairro','$cep','$uf','$codigoMunicipio','$nomeMunicipio','$ddd1','$telefone1','$ddd2','$telefone2','$email','$cpfResponsavel','$nomeResponsavel','$capitalSocial', '$tipoCRCContadorPJ', '$classificacaoCRCContadorPJ', '$numeroCRCContadorPJ', '$ufCrcContadorPJ', '$cnpjContador', '$tipoCRCContadorPF', '$classificacaoCRCContadorPF', '$numeroCRCContadorPF','$ufCrcContadorPF', '$cpfContador', '$porte', '$opcaoSimples', '$dataOpcaoSimples', '$dataExclusaoSimples', '$cnpjSucedida');");
        // var_dump($salvaDadosCnpj);
        if ($salvaDadosCnpj) {
            $pegaID = $connPdo->lastInsertId();

            //VERIFICAÇÃO DOS SOCIOS
            $tamanhoSocio = sizeof($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio);
            if ($tamanhoSocio == 1) {
                $nomeSocio = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio->Nome);
                $tipoSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio->Tipo;
                $numeroSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio->Numero;
                $percentualParticipacaoSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio->PercentualParticipacao;
                $codigoPaisOrigemSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio->CodigoPaisOrigem;
                $nomePaisOrigemSocio = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio->NomePaisOrigem);

                //INSERE OS DADOS DOS SOCIOS NA BASE
                $salvaDadosSocioCnpj = $connPdo->query("INSERT INTO `bd_infoconv`.`tb_dados_cnpj_sociedade` (`id_dados_cnpj`, `tipo`, `nome`,`numero`, `percentual_participacao`, `codigo_pais_origem`, `nome_pais_origem`)
            VALUES ($pegaID, '$tipoSocio','$nomeSocio','$numeroSocio', '$percentualParticipacaoSocio', '$codigoPaisOrigemSocio', '$nomePaisOrigemSocio'); ");
            } else {
                for ($i = 0; $i < $tamanhoSocio; $i++) {
                    $nomeSocio = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio[$i]->Nome);
                    $tipoSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio[$i]->Tipo;
                    $numeroSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio[$i]->Numero;
                    $percentualParticipacaoSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio[$i]->PercentualParticipacao;
                    $codigoPaisOrigemSocio = $theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio[$i]->CodigoPaisOrigem;
                    $nomePaisOrigemSocio = addslashes($theResponse->ConsultarCNPJP3Result->CNPJPerfil3->Sociedade->Socio[$i]->NomePaisOrigem);
                    //INSERE OS DADOS DOS SOCIOS NA BASE
                    $salvaDadosSocioCnpj = $connPdo->query("INSERT INTO `bd_infoconv`.`tb_dados_cnpj_sociedade` (`id_dados_cnpj`, `tipo`, `nome`,`numero`, `percentual_participacao`, `codigo_pais_origem`, `nome_pais_origem`)
                VALUES ($pegaID, '$tipoSocio','$nomeSocio', '$numeroSocio', '$percentualParticipacaoSocio', '$codigoPaisOrigemSocio', '$nomePaisOrigemSocio'); ");
                }
            }
        }
        return $theResponse;
    }
    private  static function salvardadosinfoconvcpf($theResponse)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $cpf = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->CPF;
        $nome = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Nome;
        $situacaoCadastral = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->SituacaoCadastral;
        $residenteExterior = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->ResidenteExterior;
        $codigoPaisExterior = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->CodigoPaisExterior;
        $nomePaisExterior = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->NomePaisExterior;
        $nomeMae = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->NomeMae;
        $dataNascimento = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->DataNascimento;
        $sexo = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Sexo;
        $naturezaOcupacao = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->NaturezaOcupacao;
        $ocupacaoPrincipal = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->OcupacaoPrincipal;
        $exercicioOcupacao = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->ExercicioOcupacao;
        $tipoLogradouro = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->TipoLogradouro;
        $logradouro = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Logradouro;
        $numeroLogradouro = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->NumeroLogradouro;
        $complemento = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Complemento;
        $cep = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->CEP;
        $bairro = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Bairro;
        $codigoMunicipio = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->CodigoMunicipio;
        $municipio = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Municipio;
        $uf = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->UF;
        $ddd1 = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->DDD;
        $telefone1 = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Telefone;
        $unidadeAdministrativa = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->UnidadeAdministrativa;
        $anoObito = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->AnoObito;
        $estrangeiro = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->Estrangeiro;
        $dataAtualizacao = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->DataAtualizacao;
        $tituloEleitor = $theResponse->ConsultarCPFP3Result->PessoaPerfil3->TituloEleitor;
        $salvaDadosCpf = $connPdo->prepare('INSERT INTO  ' . self::$table1 . '  (`cpf`, `nome`, `situacao_cadastral`, `residente_exterior`, `codigo_pais_exterior`, `nome_pais_exterior`, `nome_mae`, `data_nascimento`, `sexo`, `natureza_ocupacao`, `ocupacao_principal`, `exercicio_ocupacao`, `tipo_logradouro`, `logradouro`, `numero`, `complemento`, `cep`, `bairro`, `codigo_municipio`, `municipio`, `uf`, `ddd1`, `telefone1`, `unidade_administrativa`, `ano_obito`, `estrangeiro`, `data_atualizacao`, `titulo`) 
          VALUES (:cpf, :nome,:situacaoCadastral,:residenteExterior, :codigoPaisExterior, :nomePaisExterior , :nomeMae, :dataNascimento, :sexo, :naturezaOcupacao, :ocupacaoPrincipal, 
          :exercicioOcupacao, :tipoLogradouro, :logradouro, :numeroLogradouro, :complemento, :cep, :bairro, :codigoMunicipio, :municipio, :uf, :ddd1 , :telefone1, :unidadeAdministrativa,:anoObito, :estrangeiro, :dataAtualizacao, :tituloEleitor);');
        $salvaDadosCpf->bindValue(':cpf', $cpf);
        $salvaDadosCpf->bindValue(':nome', $nome);
        $salvaDadosCpf->bindValue(':situacaoCadastral', $situacaoCadastral);
        $salvaDadosCpf->bindValue(':residenteExterior', $residenteExterior);
        $salvaDadosCpf->bindValue(':codigoPaisExterior', $codigoPaisExterior);
        $salvaDadosCpf->bindValue(':nomePaisExterior', $nomePaisExterior);
        $salvaDadosCpf->bindValue(':nomeMae', $nomeMae);
        $salvaDadosCpf->bindValue(':dataNascimento', $dataNascimento);
        $salvaDadosCpf->bindValue(':sexo', $sexo);
        $salvaDadosCpf->bindValue(':naturezaOcupacao', $naturezaOcupacao);
        $salvaDadosCpf->bindValue(':ocupacaoPrincipal', $ocupacaoPrincipal);
        $salvaDadosCpf->bindValue(':exercicioOcupacao', $exercicioOcupacao);
        $salvaDadosCpf->bindValue(':tipoLogradouro', $tipoLogradouro);
        $salvaDadosCpf->bindValue(':logradouro', $logradouro);
        $salvaDadosCpf->bindValue(':numeroLogradouro', $numeroLogradouro);
        $salvaDadosCpf->bindValue(':complemento', $complemento);
        $salvaDadosCpf->bindValue(':cep', $cep);
        $salvaDadosCpf->bindValue(':bairro', $bairro);
        $salvaDadosCpf->bindValue(':codigoMunicipio', $codigoMunicipio);
        $salvaDadosCpf->bindValue(':municipio', $municipio);
        $salvaDadosCpf->bindValue(':uf', $uf);
        $salvaDadosCpf->bindValue(':ddd1', $ddd1);
        $salvaDadosCpf->bindValue(':telefone1', $telefone1);
        $salvaDadosCpf->bindValue(':unidadeAdministrativa', $unidadeAdministrativa);
        $salvaDadosCpf->bindValue(':anoObito', $anoObito);
        $salvaDadosCpf->bindValue(':estrangeiro', $estrangeiro);
        $salvaDadosCpf->bindValue(':dataAtualizacao', $dataAtualizacao);
        $salvaDadosCpf->bindValue(':tituloEleitor', $tituloEleitor);
        $salvaDadosCpf->execute();
        if ($salvaDadosCpf) {
            return $theResponse;
        } else {
            throw new \Exception("Ocorreu  um erro inesperado");
        }
    }
}
