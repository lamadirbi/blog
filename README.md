![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/1.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/2.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/3.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/4.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/5.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/6.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/7.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/8.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/9.jpg)
![ ](https://raw.githubusercontent.com/lamadirbi/blog/81d5daed63f5a392700583193200897c9fc4fb98/image/10.jpg)
# Laravel Blog Application

This is a modern blog application built with Laravel 12, featuring user authentication, profile management, and post creation/editing capabilities. It uses Laravel Breeze for authentication and Tailwind CSS for styling.

## Features

- User registration and authentication
- User profile management
- Create, edit, and view blog posts
- Responsive design with Tailwind CSS
- Database migrations and seeders
- Background job processing
- Real-time event broadcasting

## Requirements

- PHP ^8.2
- Composer
- Node.js and NPM
- A database (MySQL, PostgreSQL, SQLite, etc.)

## Installation and Setup

Follow these steps to run the application for the first time:

1. **Clone the repository:**
   ```
   git clone https://github.com/lamadirbi/blog.git
   cd blog
   ```

2. **Install PHP dependencies:**
   ```
   composer install
   ```

3. **Set up environment file:**
   ```
   cp .env.example .env
   ```
   Configure your database settings in the `.env` file.

4. **Generate application key:**
   ```
   php artisan key:generate
   ```

5. **Run database migrations:**
   ```
   php artisan migrate
   ```

6. **Install Node.js dependencies:**
   ```
   npm install
   ```

7. **Build assets:**
   ```
   npm run build
   ```

8. **Start the development server:**
   ```
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Development

To run the application in development mode with hot reloading:

```
composer run dev
```

This will start the Laravel server, queue worker, and Vite dev server concurrently.

## Testing

Run the test suite with:

```
composer run test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


