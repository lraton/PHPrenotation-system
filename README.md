# PHPrenotation system
![phpprenotation system](https://github.com/user-attachments/assets/efcbf1bd-8114-4632-aced-27452898d297)

**PHPrenotation System** is a lightweight and customizable reservation system written in PHP. It is designed to manage online bookings for any type of event or service — such as escape rooms, tours, workshops, or appointments — with a simple and clear interface.

---

## 🧩 Features

- 📅 Dynamic selection of available dates (loaded from a MySQL database)
- 🎨 Simple and mobile-friendly user interface
- 🏗️ Easy to customize for any kind of event or activity
- ⚙️ Fully written in **PHP**, with no external backend dependencies

---

## 📂 Current File Structure
```
/phprenotation-system/
├── index.php # Main monolithic entry point
├── selezione.php # Second monolithic
├── prenotazione.php # Third monolithic
├── concluso.php # Fourth monolithic
├── db.php # DB configuration
├── admin.html # admin login
├── admin.php # admin
├── cancellaprenotazione.php # admin remove prenotation
├── db.php # DB configuration
├── assets/
│   ├── style/ # CSS folder
│   └── img/ # Image assets
├── controllers/
├── includes/
└── views/
```

---

## 📌 TODO

- [ ] **Refactor to MVC**:  
  Separate logic (controllers), presentation (views), and data access (models) into a clean MVC-style architecture.
  
- [ ] **Improve CSS & UX**:  
  Make the interface more modern and mobile responsive, improve accessibility, and add smoother UI feedback (e.g., loading indicators, disabled states).

- [ ] **Internationalization (i18n)**:  
  Add support for multiple languages using language files or simple translation methods.

---

## 📃 License

This project is released under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html).  
You are free to use, modify, and distribute this software, provided that any derivative works are also licensed under the GPL.

---
