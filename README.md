### UTILIZANDO A API ###

Podem ser testados os REQUEST a partir do software Postman (https://www.getpostman.com)

OS métodos utilizado de RESQUEST são:

* GET
  - /pessoas/ mostra a lista de todos cadastros
  - /pessoas/id (já cadastrado no banco na tabela pessoa): mostra as informações da pessoa.

* POST
  - /pessoas/ : através do Postman pode ser inserido uma nova pessoa utilizando um JSON.

* DELETE
  - /pessoas/id : através do Postman pode ser apagado um registro de uma pessoa através do id.

* PUT
  - /pessoas/id : atráves do Postman pode ser alterado um registro da pessoa utilizando um JSON. (ainda não terminei)


### BANCO DE DADOS ###

Código para criação da basa de dados utilizado na api.

```
CREATE DATABASE api;

CREATE TABLE pessoa (
  id int(6) UNSIGNED NOT NULL,
  name varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  password varchar(54) NOT NULL,
  email varchar(50) NOT NULL,
  dt_cadastro timestamp NULL DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE endereco (
    id_pessoa_fk int(10) NOT NULL,
    street varchar(50) NOT NULL,
    number varchar(5) NOT NULL,
    distric varchar(20) NOT NULL,
    city varchar(20) NOT NULL,
    country varchar(20) NOT NULL
    FOREIGN KEY (id_pessoa_fk) REFERENCES pessoa(id)
);

ALTER TABLE pessoa
  ADD PRIMARY KEY (id);
```
### OBSERVAÇÕES ###
Ainda resta fazer as validações e a parte de login.

Estrutura JSON utilizada
```
{
        "name": "Nathan",
        "email": "n@n.com",
        "password": "*******",
        "address": [
            {
                "street": "rua abc",
                "number": "210",
                "distric": "centro",
                "city": "Belo Horizonte",
                "state": "MG",
                "country": "Brasil"
            }
        ]
 }
 ```
