# Tehnički Pregled – Laravel Projekat

Ovo je školski Laravel projekat za predmet **Web programiranje**, student **Dušan Milenković**, odsek **IT 29/23**.

## 📦 Tehnologije
- Laravel 10
- PHP 8.2
- Bootstrap / Tailwind (kombinacija)
- MySQL
- JavaScript (DataTables, Chart.js)

## ⚙️ Pokretanje projekta

1. Kloniraj projekat:
   ```bash
   git clone https://github.com/dusannnm/Dusan_Milenkovic_29_23_IT.git
   cd Dusan_Milenkovic_29_23_IT
   ```

2. Instaliraj Laravel dependencije:
   ```bash
   composer install
   ```

3. Napravi `.env` fajl:
   ```bash
   cp .env.example .env
   ```

4. Generiši aplikacioni ključ:
   ```bash
   php artisan key:generate
   ```

5. Podesi `.env` fajl (MySQL konekcija itd.)

6. Pokreni migracije (ako su prisutne):
   ```bash
   php artisan migrate
   ```

7. Pokreni lokalni server:
   ```bash
   php artisan serve
   ```

## 📸 Sadržaj projekta

Aplikacija omogućava:
- Zakazivanje tehničkog pregleda
- CRUD za vozila, usluge i termine
- Admin panel sa statistikama i DataTables
- Dark modern UI (Vercel-style hero + admin panel)

## 👨‍🎓 Autor

**Dušan Milenković**  
IT 29/23 – Računarski fakultet  
dusan.milenkovic0402@gmail.com