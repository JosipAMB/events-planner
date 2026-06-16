Evenementen Planner 

Een Laravel-applicatie voor het beheren en bekijken van evenementen. Beheerders kunnen evenementen aanmaken via een FilamentPHP dashboard. Bezoekers kunnen aankomende evenementen bekijken en zich aanmelden en afmelden. 

 

Vereisten 

PHP 8.2 of hoger 

Composer 

NPM 

SQLite 

 

Installatie 

1. Bestanden klaarzetten 

Terminal 

git clone <repository-url> events-planner 
cd events-planner 

2. PHP installeren 

Terminal 

composer install 

3. Omgevingsbestand instellen 

Terminal 

cp .env.example .env 
php artisan key:generate 

4. Database aanmaken en migraties uitvoeren 

Terminal 

touch database/database.sqlite 
php artisan migrate 

5. Frontend installeren 

Terminal 

npm install 

 

Opstarten 

Gebruik de handige shortcut die alles tegelijk opstart: 

Terminal 

composer run dev 

De applicatie is nu bereikbaar op http://localhost:8000 

 

Beheerdersaccount aanmaken 

Voor toegang tot het FilamentPHP dashboard maak je een beheerder aan via: 

Terminal 

php artisan make:filament-user 

Het dashboard is bereikbaar op http://localhost:8000/admin 

 

Wat kan de applicatie? 

Voor bezoekers (http://localhost:8000) 

Aankomende evenementen bekijken 

Zien hoeveel plekken er nog vrij zijn 

Aanmelden met naam en e-mailadres 

Afmelden voor een evenement 

Melding als een evenement vol is 

 

 

Voor beheerders (http://localhost:8000/admin) 

Evenementen aanmaken, bewerken en verwijderen 

Aanmeldingen per evenement bekijken 

 

Technische keuzes 

TALL-stack (TailwindCSS, AlpineJS, Laravel, Livewire) Alle onderdelen van de stack werken goed samen. Livewire zorgt ervoor dat de pagina reageert zonder te herladen, zonder dat je aparte JavaScript bestanden hoeft te schrijven. Dit houdt de code op één plek en makkelijk te onderhouden. 

FilamentPHP Het beheerderspaneel is gebouwd met FilamentPHP. Dit geeft een volledig dashboard met weinig code, waardoor er minder te onderhouden valt. 

SQLite Als database wordt SQLite gebruikt. Dit werkt direct zonder extra installatie, wat het opstarten voor iedereen eenvoudig maakt. 

spotsLeft() in het Model De berekening van beschikbare plekken staat in het Event model. Zo hoeft dit maar op één plek aangepast te worden als er iets verandert. 

 
