
# Task Manager

Um gerenciador de tarefas simples desenvolvido com Laravel. Permite ao usuário criar, visualizar, editar e excluir tarefas de forma prática.

## Features

- ✅ Criar novas tarefas  
- 📝 Editar tarefas existentes  
- 🗑️ Excluir tarefas concluídas  
- 👀 Visualizar tarefas pendentes

## Tech Stack

- **Back-end:** Laravel 12, PHP
- **Front-end:** Alpine.js, TailwindCSS, Laravel Blade
- **Database:** PostgreSQL
- **Development Tools:** XAMPP, Vite




## Author

- [@dannte0](https://www.github.com/dannte0)


## Run Locally

Clone the project.

```bash
  git clone https://github.com/dannte0/Wdone
```

Go to the project directory.

```bash
  cd Wdone
```

Install dependencies.

```bash
  composer install

  npm install
```

Copy the `.env` file and generate the app key.
```bash
  cp .env.example .env

  php artisan key generate
```

Run the migrations.

```bash
  php artisan migrate
```

Start the server.

```bash
  composer run dev 
```

or

```bash
  php artisan serve
```

The best way is `composer run dev` since it runs the `php artisan serve` and `npm run dev` commands.

## Badges

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)



## License

[MIT](https://choosealicense.com/licenses/mit/)


## Useful Links

- [Laravel Docs](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Alpine.js Docs](https://alpinejs.dev/start-here)
- [PostgreSQL Docs](https://www.postgresql.org/docs/)
## Feedback

If you have any feedback, feel free to open an issue or contact me through [GitHub](https://github.com/dannte0).


