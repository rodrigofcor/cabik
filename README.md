<p align="center"><img src="https://user-images.githubusercontent.com/37222917/175830787-0ab1cdd4-57db-495a-aa60-42e68c5c0406.png" width="400"></p>
<h1 align="center">Cabik</h1>


Cabik é é um site para adoção de animais e ajuda financeira para os tutores. Meu projeto pessoal que iniciei em 2022 para meu TCC no curso de Análise e Desenvolvimento de Sistemas da universidade <a href="https://www.ulbra.br/canoas">ULBRA Canoas</a>. 

## TCC

- <a href="https://docs.google.com/presentation/d/e/2PACX-1vR6uoqCDlZcCdQVR-U36hlusPu6oql7XX4LMY7ZS-AGtSxtzZpgRZ3TUYei24l-_VOL3YiLQYLcrW4y/pub?start=false&loop=false&delayms=3000">Proposta</a>
- <a href="https://drive.google.com/file/d/14H2L4uLPvAG6ZCkRMZH6fU7kE_70z879/view?usp=sharing">Postêr</a>
- <a href="https://docs.google.com/document/d/e/2PACX-1vQhbxV7EFJ6M8Vo_QFgzVr4X-FghN2EPvrkW4xdwSuEEivtAeE2ts5H1Jce2fJWjIESQp62-eBzYF0W/pub">Artigo Final</a>
- <a href="https://www.youtube.com/watch?v=NbM7qeqq5j8">Apresentação</a>
- <a href="https://github.com/rodrigofcor/cabik/tree/f2874f4e974dd1c20a995a2b7264f030422af7be">Como era no momento em que o apresentei</a>

## Você pode experimentá-lo facilmente utilizando docker

### Para executar os containers:

- `docker compose up -d`

### Se estiver executando pela primeira vez ou caso tenha deletado os volumes siga os seguintes passos:</h3>

- Busque o id do container laravel com `docker ps`
- Entre no container laravel com `docker exec -it {id_do_container_laravel} bash`
- Após entrar no container execute `php artisan migrate && php artisan db:seed`

### Acessando o site:

- Através do endereço "localhost:8080" você poderá acessar com seu navegador

### Acessando o banco de dados

- Se quiser é possível acessar o banco de dados através de seu navegador com o phpmyadmin no endereço "localhost:8081". Ou usar um client mysql de sua preferência utilizando o endereço: "localhost", porta: "3306", usuário: "admin" e senha: "secret"

## Para executar o projeto sem utilizar docker

### <b>Obs:</b> Dependendo do seu ambiente poderá ser necessário ajustar ou adicionar mais etapas!

### Requisitos
 - node/npm
 - php 8.*
 - composer
 - mysql ou mariadb

### Configurando o ambiente: 

- Crie um arquivo ".env" baseado e no mesmo diretório do arquivo ".env.example", porém com os valores ajustados para seu ambiente
- Configure seu banco de dados e crie um schema de acordo como preencheu seu arquivo ".env"
- No arquivo "/config/filesystems.php" descomente a linha 16 e comente a linha 17
- `npm install`
- `composer install`
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate`
- `php artisab db:seed` 

### Para executar após ter seu ambiente configurado:

- Certifique-se que seu banco de dados esteja em execução
- Inicie o servidor local com`php artisan serve` e acesse com seu navegador no endereço e porta fornecidas

## Mockups Origiais

![mockup-cabik-bem-vindo](https://user-images.githubusercontent.com/37222917/175831181-c32e6371-4af1-43ce-902c-ec7e8dd7d238.png)

![mockup-cabik-criar-conta](https://user-images.githubusercontent.com/37222917/175831190-8f5d6e80-34f5-4357-a7f3-18402baad2dd.png)

![mockup-cabik-cadastrar-animal](https://user-images.githubusercontent.com/37222917/175831196-a2745272-788c-427d-81a6-fa6905a0ef01.png)

![mockup-cabik-perfil](https://user-images.githubusercontent.com/37222917/175831217-f3816db1-549c-4ed9-9db8-b27f8cd0b3b5.png)

![mockup-cabik-busca](https://user-images.githubusercontent.com/37222917/175831224-59825c5c-aeba-4818-b258-2afff45ebb04.png)
