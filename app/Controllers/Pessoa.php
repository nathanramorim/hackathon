<?php
namespace controllers;

use Models\Model;
	/*
	Classe pessoa
	*/
	class Pessoa extends Model{
		//Atributo para banco de dados
		private $PDO;
		private $app;

		private $setup = [
				'page' => 'Web Service',
				'title' => 'Segurança API REST',
				'content' => 'Segurança API REST',
				'members' => 'Nathan Amorim & Wagner Ferreira'
		];

		/*
		__construct
		Conectando ao banco de dados
		*/
		public function databaseSetup($app){
			$this->app = $app;
			$this->PDO = new \PDO('mysql:host=localhost;dbname=pbh', 'root', '12345'); //Conexão
			$this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); //habilitando erros do PDO
		}

		public function conexao(){
			var_dump(Model::connection());
		}

		public function index(){
			$arr = [
				'page' => 'Web Service',
				'title' => 'Segurança API REST',
				'content' => 'Segurança API REST',
				'members' => 'Nathan Amorim & Wagner Ferreira'
			];
			$this->app->render('home.php',['conf'=>$this->setup]);
		}

		public function setSetup($index,$label){
			if(array_key_exists($index, $this->setup))
			$this->setup[$index] = $label;
		}

		public function getSetup (){
			return $this->setup;
		}

		public function form(){
			$this->app->render('form.php',['conf'=>$this->setup]);
		}
		/*
		lista
		Listand pessoas
		*/
		public function lista(){
			$sth = $this->PDO->prepare("SELECT * FROM users");
			$sth->execute();
			$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$this->app->render('default.php',["data"=>$result],200); 
		}
		/*
		get
		param $id
		Pega pessoa pelo id
		*/
		public function get($id){
			$sth = $this->PDO->prepare("SELECT * FROM pessoa WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$sth->execute();
			$result = $sth->fetch(\PDO::FETCH_ASSOC);
			$this->app->render('default.php',["data"=>$result],200); 
		}
	
		/*
		setData
		passa o Json para um array separado Pessoa | Endereço
		*/
		public function setData($dados)
		{
			foreach ($dados as $key => $value) :
					if (is_string($value)):
						$pessoa[$key] =$value;
					elseif (!is_string($value)):
						foreach ($value as $end):
							foreach ($end as $key=>$end_v):
								$endereco[$key]= $end_v;
							endforeach;
						endforeach;
					endif;
			endforeach;
			$data ['pessoa'] = $pessoa;
			$data ['endereco'] = $endereco;
			return $data;
		}

		/*
		nova
		Cadastra pessoa
		*/
		public function nova(){
			var_dump($this->app->request->post('name')).die();
			$dados = json_decode($this->app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$keys = array_keys($dados); //Paga as chaves do array
			
			/*passando o Json para um array separado Pessoa | Endereço*/
			$data = $this->setData($dados);

			/*Separando o nome dos campos para pessoa*/
			foreach ($keys as $title):
				if ($title != 'address'):
					$keys_pe[] = $title;
				endif;
			endforeach;
			
			/*Separando o nome dos campos para endereço*/
			foreach ($dados['address'] as $end):
				foreach ($end as $title=>$b):
					$end_k[] = $title;
				endforeach;
			endforeach;
			
			/*
			O uso de prepare e bindValue é importante para se evitar SQL Injection
			*/
			$sth = $this->PDO->prepare("INSERT INTO pessoa (".implode(',', $keys_pe).") VALUES (:".implode(",:", $keys_pe).")");
			$end_sth = $this->PDO->prepare("INSERT INTO endereco (id_pessoa_fk,".implode(',', $end_k).") VALUES (:id_pessoa_fk,:".implode(",:", $end_k).")");
			
			/*bind pessoa*/
			foreach ($data['pessoa'] as $key => $value):
				if ($key == 'password'):
					$sth->bindValue(':'.$key,sha1($value));
				else:
					$sth->bindValue(':'.$key,$value);
				endif;
			endforeach;
			
			$return = $sth->execute();

			/* validação se usuário foi inserido para então inserir endereço*/
			if($return):
				$id = $this->PDO->lastInsertId();
				$end_sth ->bindValue(':id_pessoa_fk',$id);
			endif;
			
			/*bind endereço*/
			foreach ($data['endereco'] as $key => $value):
				$end_sth ->bindValue(':'.$key,$value);
			endforeach;			

			$end_sth->execute();

			//Retorna o id inserido
			$id = $this->app->render('default.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200); 
		}

		public function addNew(){
			$arr = [
				'name' => $this->app->request->post('name'),
				'phone' => $this->app->request->post('phone'),
				'email' => $this->app->request->post('email'),
				'message' => 'Ocorreu um erro!',
				'alert' => 'danger'
			];

			
			try {
				$sth = $this->PDO->prepare("INSERT INTO users VALUES (DEFAULT,:username, :email,:phone)");
				$sth->bindValue(':username',$arr['name']);
				$sth->bindValue(':email',$arr['email']);
				$sth->bindValue(':phone',$arr['phone']);
				if($sth->execute())
				$arr['message'] ='Dados gravados com sucesso!';$arr['alert'] = 'success';
				
			} catch(PDOException $e) {
				echo 'Error: ' . $e->getMessage();
			}
			
			
			return $this->app->render('form.php',["data"=>$arr,'conf'=>$this->setup],200);
		}

		/*
		editar
		param $id
		Editando pessoa
		*/
		public function editar($id){
			$dados = json_decode($this->app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$sets = [];
			foreach ($dados as $key => $VALUES) {
				$sets[] = $key." = :".$key;
			}

			$sth = $this->PDO->prepare("UPDATE pessoa SET ".implode(',', $sets)." WHERE id = :id");
			$sth ->bindValue(':id',$id);
			foreach ($dados as $key => $value) {
				$sth ->bindValue(':'.$key,$value);
			}
			//Retorna status da edição
			$this->app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200); 
		}

		/*
		excluir
		param $id
		Excluindo pessoa
		*/
		public function excluir($id){
			$sth = $this->PDO->prepare("DELETE FROM pessoa WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$this->app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200); 
		}
	}
