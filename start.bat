@echo off
title Laravel Starter

echo Pokrećem Laravel server...
start cmd /k php artisan serve

echo Pokrećem Vite (npm run dev)...
start cmd /k npm run dev

pause
