<h1 align="center">
    <a href="/">
        <img src="./assets/posticon.png" alt="Posts" width="30" height="24">
            Posts
    </a>
</h1>
<p align="center">Crie posts e receba comentários.</p>

<p align="center">
    <img src="https://img.shields.io/badge/laravel-gray?logo=laravel"/>
    <img src="https://img.shields.io/badge/docker-5742f5?logo=docker"/>
</p>

### Structure

- [x] Laravel ;
- [x] Docker ;

### Requirements

1. Copie o `.env.example` e renomeie para `.env` dentro de ` ./posts_api/  `;

2. Execute o comando abaixo para subir as imagens:

   > `docker compose up`

3. Execute as migrations para criação das tabelas, dentro do container da api:

   > `php artisan migrate`
