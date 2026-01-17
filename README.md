# ERP System – Projekt inżynierski (PHP + MySQL)

Projekt inżynierski przedstawiający system ERP do zarządzania małą firmą, obejmujący podstawowe procesy biznesowe: użytkowników, projekty oraz operacje na danych.  
System został zbudowany jako klasyczna aplikacja webowa (PHP + MySQL) i uruchamiany lokalnie przy użyciu Docker Compose.

Projekt ma charakter edukacyjny / demonstracyjny i służy do pokazania:
- pracy z relacyjną bazą danych i zapytaniami SQL  
- struktury systemu typu ERP  
- konfiguracji środowiska aplikacyjnego  
- podstawowych mechanizmów bezpieczeństwa (hashowanie haseł, pepper)

---

## Technologie
- Backend: PHP 8.x  
- Baza danych: MySQL 8.0  
- Zarządzanie DB: phpMyAdmin  
- Środowisko: Docker, Docker Compose  
- Frontend: HTML / CSS  
- Bezpieczeństwo: SHA-256 + pepper (env)

---

## Funkcjonalności
- System logowania użytkowników  
- Role użytkowników (administrator / użytkownik)  
- Zarządzanie projektami  
- Operacje na danych firmowych  
- Rejestrowanie zdarzeń (logi)  
- Panel administracyjny  
- Inicjalizacja systemu przy pierwszym uruchomieniu  

---

## Struktura bazy danych
Baza danych zawiera m.in. następujące tabele:
- users – użytkownicy systemu  
- projects – projekty przypisane do użytkowników  
- files – pliki i operacje na danych  
- invoicelogs – logi operacji  
- init – stan pierwszej inicjalizacji systemu  

Schemat bazy danych inicjalizowany jest automatycznie przy starcie kontenerów.

---

## Uruchomienie projektu (lokalnie)

### Wymagania
- Docker  
- Docker Compose  

### Kroki
1. Sklonuj repozytorium:
   git clone <repo_url>
   cd wondi-erp

2. Uruchom środowisko:
   docker compose up -d --build

3. Aplikacja będzie dostępna pod adresami:
   - ERP: http://localhost:8080  
   - phpMyAdmin: http://localhost:8081  

---

## Dane dostępowe (demo)
- Pierwsze logowanie inicjalizacyjne  
  Hasło: init123  

Po pierwszym logowaniu system umożliwia utworzenie konta administratora.

Uwaga: Dane są przykładowe i przeznaczone wyłącznie do demonstracji.

---

## Bezpieczeństwo
- Hasła użytkowników są hashowane przy użyciu SHA-256 z użyciem peppera  
- Pepper przechowywany jest w zmiennej środowiskowej APP_PEPPER  
- Dane dostępowe do bazy danych pobierane są ze zmiennych środowiskowych  
- Projekt nie jest przeznaczony do użycia produkcyjnego bez dodatkowych zabezpieczeń  

---

## Cel projektu
Projekt został wykonany jako praca inżynierska i ma na celu zaprezentowanie:
- zrozumienia działania systemów ERP  
- pracy z relacyjną bazą danych  
- konfiguracji środowiska aplikacyjnego  
- podstawowych zagadnień związanych z wdrożeniami systemów IT  

---

## Status
Projekt zakończony – wersja demonstracyjna.
