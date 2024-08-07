
# TODO API

This is a simple todo API project.

# How you set and run this project -

> Step 1: clone repo 

```bash
git clone https://github.com/sayful1411/todo-api.git && cd todo-api
```
   
> Step 2: run composer update

```bash
composer update
``` 

> Step 3: create .env

```bash
cp .env.example .env
```
  
> Step 4: generate a new key
  
```bash
php artisan key:generate
``` 

> Step 6: put a random JWT_KEY in .env
> example: KR04CXQGGSBGIHP88X57AOL0PNEBVNXZ
  
```bash
JWT_KEY=place_random_key
``` 
 
>  Step 7: run migration
> (I used SQLite database. It will ask a prompt to create SQLite database)

```bash
php artisan migrate 
``` 
 
>  Step 8: run project
  
```bash
php artisan serve
```

# Test in postman - (documentation added)
> https://documenter.getpostman.com/view/27177179/2s946o4pZb
