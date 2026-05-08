# PHPrenotation system
![phpprenotation system](https://github.com/user-attachments/assets/efcbf1bd-8114-4632-aced-27452898d297)

**PHPrenotation System** is a lightweight and customizable reservation system written in PHP. It is designed to manage online bookings for any type of event or service — such as escape rooms, tours, workshops, or appointments — with a simple and clear interface.

---

## Features

- Dynamic selection of available dates (loaded from a MySQL database)
- Simple and mobile-friendly user interface
- Easy to customize for any kind of event or activity
- Fully written in **LARAVEL**, with no external backend dependencies

---

## Start


1. Start the Docker Compose Services:

```bash
docker compose -f compose.dev.yaml up -d
```

2. Install Laravel Dependencies:

```bash
docker compose -f compose.dev.yaml exec workspace bash
composer install
npm install
npm run dev
```

3. Run Migrations:

```bash
docker compose -f compose.dev.yaml exec workspace php artisan migrate
```

4. Access the Application:

Open your browser and navigate to [http://localhost](http://localhost).

---

## License

This project is released under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html).  
You are free to use, modify, and distribute this software, provided that any derivative works are also licensed under the GPL.

---
