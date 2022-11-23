<?
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/loginDAO.php');
class usuarioDAO extends model
{
        
	const table="tipo_anuncio";
	const nome="nome";
	const login="login";
	const senha="senha";
	const e_mail="e_mail";
	const tentativas="tentativas";
	
    public function login($login,$senha){
        $login=hash('sha512', $login_);
        $senha=hash('sha512', $senha);
        $mensagem_erro="";
        $this->cleanParams();
        try{
            $this->setParam(self::login,$login);
            $result=$this->find();
            if((isset($result))&&(isset($result["data"]))){
					if(count($result["data"])==0)
				    	$mensagem_erro="Usuário ou senha inválido";
					else{
						$record_id	= resultDataFieldByTitle($result,"id",0);
						$record_tentativas=resultDataFieldByTitle($result,"tentativas",0);
						$record_login=resultDataFieldByTitle($result,"login",0);
						$record_senha=resultDataFieldByTitle($result,"senha",0);
						$record_nome=resultDataFieldByTitle($result,"nome",0);
						if(($record_senha==$senha)&&($record_login==$login)){
							if(!isset($_SESSION)) session_start();
							$_SESSION["id"]		= $record_id;
							$_SESSION["login"]	= $login_;
							$_SESSION["usuario"]= $record_nome;
							$_SESSION["time"]	= time();
							$this->cleanParams();
							$this->setParams([
							    self::id=>$record_id
							    ,self::code=>''
							    ,self::code_time=>null
							    ,self::tentativas=>0
						    ]);
                            $this->update();
                            $login =new loginDAO([]);
                            $login->setParams([
								"id_usuarios"=>$record_id,
								"hora_inicio"=>date("H:i:s"),
								"hora_fim"=>date("H:i:s"),
								"data_inicio"=>date("Y-m-d"),
								"data_fim"=>date("Y-m-d")
						    ]);
						    $login->create();

						}
						else if($record_tentativas>=5) $mensagem_erro="Usuário bloqueado já fora usadas 5 tentativas tente recuperar a conta com link <b>Esqueceu a senha</b> acima";
						else
						{
						    $this->cleanParams();
						    $this->setParams(["id"=>$record_id,"tentativas"=>($record_tentativas+1)]);
						    $this->update();
							$mensagem_erro="Usuário ou senha inválido você possue ainda mais ".(5-$record_tentativas)." tentativas";
						}
						unset($record_id);
						unset($record_tentativas);
						unset($record_login);
						unset($record_senha);
						unset($record_nome);
					}
					unset($result);
				}
				unset($result); 
        }catch (Exception $error) {}
		unset($login);
		unset($senha);
		return ["mensagem_erro"=>$mensagem_erro];
    }

    public function __construct($model_attributes){
		parent::__construct($model_attributes,self::table,[self::id_menu,self::nome,self::login,self::senha,self::e_mail,self::tentativas]);
    }
}
  
?>	