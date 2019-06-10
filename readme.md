# MiniMVC 

Este repositório visa construir um projeto PHP no padrão de arquitetura MVC(Model, View, Controller), sem utilizar um framework.
Foi utilizado o Composer para fazer o autoloads das classes e namespaces no padrão psr-4. Mas não é necessário instalá-lo. 

### Pré-requisitos

```
PHP >= v5.6
MySQL >= 5.4
Apache >= 2.2 
```

### Instalação
```
 1 - Criar um banco de dados no mysql para utilizar os models de exemplo. Utilizado no projeto: 'supermercado'.
 2 - Executar o supermercado.sql na base que criou.
 3 - Jogar os arquivos da pasta 'src', na pasta raiz do servidor apache onde executará sua aplicação;
 4 - Dentro do projeto, abrir o arquivo 'Config/database.php'. Colocar os dados de conexão do seu banco de dados. O campo 'database_name', precisa ser o mesmo que atribuiu no passo 1.

 Obs. Há uma tabela chamada 'usuarios', para conseguir logar é necessário criar seu usuário desta tabela. A encriptação é feita da seguinte forma: sha1(md5(senha)). 
 Também existe um usuário para testes: 
   willian
   123456

 ```

### MVC / CRUD

Para demonstrar como utilizar todas as camadas do MVC, e também como fazer um CRUD simples, no projeto há de exemplo, um cadastro simples de produtos.

Abaixo o Modelo Entidade/Relacionamento do exemplo:
<p align="center"><img src="https://raw.githubusercontent.com/williudo/minimvc/master/mer.png"></p>

## Autores

* **Willian Rodrigues** - [github](https://github.com/williudo)

## Licensa

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
