# WDPAI Starter App

Minimalna aplikacja PHP uruchamiana w kontenerach Nginx i PHP-FPM. Powstała podczas LABORATORIUM 1 jako punkt startowy projektu semestralnego.

## Funkcje

| Obszar | Co robi |
|---|---|
| Strona startowa | Wyświetla komunikat „Hi There! Let's start!”. |
| Środowisko | Uruchamia Nginx i PHP-FPM przez Docker Compose. |

## Tech stack

| Warstwa | Technologie |
|---|---|
| Backend | PHP 8.3 |
| Serwer HTTP | Nginx |
| Konteneryzacja | Docker, Docker Compose |

## Szybki start

```bash
docker compose up --build -d
```

Aplikacja: **http://localhost:8081**

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
