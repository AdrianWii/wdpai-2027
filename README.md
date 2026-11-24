# WDPAI Starter App

Minimalna aplikacja PHP uruchamiana w kontenerach Nginx i PHP-FPM. Powstała podczas LABORATORIUM 1 jako punkt startowy projektu semestralnego.

## Funkcje

| Obszar | Co robi |
|---|---|
| Strona startowa | Wyświetla komunikat „Hi There! Let's start!”. |
| Projekty | Pobiera projekty i ich właścicieli z PostgreSQL. |
| Środowisko | Uruchamia Nginx, PHP-FPM, PostgreSQL i pgAdmin przez Docker Compose. |

## Tech stack

| Warstwa | Technologie |
|---|---|
| Backend | PHP 8.3 |
| Serwer HTTP | Nginx |
| Baza danych | PostgreSQL 16, PDO |
| Konteneryzacja | Docker, Docker Compose |

## Szybki start

```bash
docker compose up --build -d
```

Aplikacja: **http://localhost:8080**

pgAdmin: **http://localhost:5050**

## Inicjalizacja bazy danych

Compose montuje katalog `docker/db/init/` jako
`/docker-entrypoint-initdb.d` w kontenerze PostgreSQL. Oficjalny entrypoint
wykonuje pliki `*.sql` w kolejności alfabetycznej, ale tylko wtedy, gdy katalog
danych PostgreSQL jest pusty (czyli podczas pierwszej inicjalizacji wolumenu).

W demo pliki pełnią rolę prostych migracji startowych:

1. `001_create_users.sql` tworzy tabelę `users`.
2. `002_create_projects.sql` tworzy tabelę `projects` i klucz obcy do `users`.
3. `003_seed_demo.sql` dodaje dane pokazowe.

Dodanie kolejnego pliku do katalogu nie uruchomi go automatycznie dla istniejącej
bazy. W środowisku demonstracyjnym można odtworzyć bazę od zera:

```bash
docker compose down -v
docker compose up --build -d
```

`down -v` usuwa dane z wolumenu, dlatego nie jest sposobem na migracje produkcyjne.
W rozwijanej aplikacji warto użyć narzędzia migracyjnego, które zapisuje historię
wykonanych zmian i uruchamia tylko brakujące migracje.

PostgreSQL zamienia niecytowane identyfikatory na małe litery, dlatego zapis
`CREATE TABLE USERS` i `CREATE TABLE users` prowadzi do tabeli `users`. Cytowana
nazwa `"USERS"` byłaby wrażliwa na wielkość liter i wymagałaby cudzysłowów w każdym
zapytaniu, dlatego projekt używa standardowej nazwy `users`.

## Połączenie z bazą

`src/Database.php` jest Singletonem: prywatny konstruktor blokuje `new Database()`,
a `Database::getInstance()` tworzy obiekt tylko przy pierwszym użyciu. Dzięki temu
repozytoria w obrębie jednego żądania PHP korzystają z tego samego połączenia PDO.
To upraszcza konfigurację i zapobiega przypadkowemu otwieraniu wielu połączeń.

Warto pamiętać, że Singleton jest kompromisem dydaktycznym: ukrywa zależność i może
utrudniać testy. Dlatego bazowa klasa `Repository` pozwala opcjonalnie przekazać PDO
w konstruktorze. W większym projekcie lepszym rozwiązaniem byłby dependency injection.

Przepływ danych dla `/projects`:

```text
Routing -> ProjectController -> ProjectRepository -> PDO/PostgreSQL
                                            -> dane -> View -> HTML
```

## Zasady developmentu

- Nazwy techniczne zapisujemy po angielsku.
- Sekrety przechowujemy w `.env`, którego nie commitujemy.
- Każdy commit opisuje jedną logiczną zmianę.

## Struktura projektu

```text
.
├── docker/
│   ├── nginx/
│   └── php/
├── public/
│   └── index.php
├── docker-compose.yaml
└── README.md
```

## Autorzy

- Imię i nazwisko — zakres odpowiedzialności
