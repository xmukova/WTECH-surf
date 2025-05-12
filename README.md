# WTECH Eshop – FINALNE_ODOVZDANIE

## 📦 Commit: `fb5ab33`

Tento commit s názvom FINALNE_ODOVZDANIE obsahuje **kompletný ZIP súbor projektu**, vrátane priečinkov `images` a `storage`, ktoré sa nepodarilo nahrať do AIS kvôli veľkosti. Zvyšok projektu je riadne odovzdaný v AIS v riadnom čase.

---

## 🧾 Príručka na spustenie

### ✅ 1. Predpoklady

Pred spustením je potrebné mať nainštalované:

- PHP (verzia **8.1 alebo vyššia**)
- Composer
- PostgreSQL

---

### 2. Stiahnutie projektu

- Stiahnite si súbor `wtech_mauisurf.zip` z AIS a doplnte donho priečinky `images` a `storage`** zo ZIP súboru vo **finalnom commite [`fb5ab33`](https://github.com/xmukova/WTECH-surf/commit/fb5ab33)** (tie sa nam nepodarilo nahrat kvoli velkosti)
- Alebo stiahnite súbor `WTECH eshop.zip` z z posledného commitu 
- Rozbaľte zip subor

---

###  3. Otvorte priečinok projektu v termináli:  
- `cd moj_projekt`

---

###  4. Nainštalujte si PHP závislosti: 
- `composer install` 

---

###  5. Pripravte si súbor .env 
• Skopírujte .env.example do .env 
`cp .env.example .env `
• Upravte si ho podľa svojich nastavení 
- `DB_CONNECTION=pgsql `
- `DB_HOST=127.0.0.1 `
- `DB_PORT=5432` (alebo iný port v závislosti od vašej PostgreSQL konfigurácie) 
- `DB_DATABASE=databaza` (alebo iný názov) 
- `DB_USERNAME=postgres ` 
- `DB_PASSWORD=heslo` (heslo do PostgreSQL) 

---

###  6. Vygenerujte aplikačný kľúč 
- `php artisan key:generate `

---


###  7. Spustite migrácie a naplňte databázu dátami: 
- `php artisan migrate `
- `php artisan db:seed `

---

###  8. Spustite server 
`php artisan serve ` 
