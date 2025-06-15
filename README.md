
# Task Manager

Um gerenciador de tarefas simples desenvolvido com Laravel. Permite ao usuário criar, visualizar, editar e excluir tarefas de forma prática.

A simple task manager developed with Laravel. It allows users to create, view, edit, and delete tasks in a practical way.

## Funcionalidades

- ✅ Criar novas tarefas  
- 📝 Editar tarefas existentes  
- 🗑️ Excluir tarefas concluídas  
- 👀 Visualizar tarefas pendentes
- ✔ Marcar tarefas como concluídas ou manter como ainda pendentes
- 🔎 Buscar tarefas por titulos
- 📌 Fixar tarefas importantes
A simple task manager developed with Laravel. It allows the user to create, view, edit and delete tasks in a practical way.

## Features

- ✅ Create new tasks
- 📝 Edit existing tasks
- 🗑️ Delete completed tasks
- 👀 View pending tasks
- ✔ Mark tasks as completed or keep as still pending
- 🔎 Search for tasks by title
- 📌 Pin important tasks
  

## Tech Stack

- **Back-end:** Laravel 12, PHP
- **Front-end:** Alpine.js, TailwindCSS, Laravel Blade
- **Database:** PostgreSQL
- **Development Tools:** Vite




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


