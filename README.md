# 📦 Sistema de Controle de Estoque - Projeto Integrador Univesp

## Tecnologias
- **Laravel 12.50** + **PHP 8.2** + **MySQL**
- **Bootstrap 5** + **DomPDF** (relatórios)
- **Git/GitHub** (controle de versão)

## Funcionalidades
✅ **CRUD Produtos** (cadastrar/editar/excluir)  
✅ **Entradas** (+estoque)  
✅ **Saídas/Vendas** (-estoque com validações)  
✅ **Relatório PDF** (produtos críticos em vermelho)  
✅ **Interface responsiva** Bootstrap  

## Como testar
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
