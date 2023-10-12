# Large Import Application

This is a large CSV files import to application
## Stack Of Technology
1. Fullstack 
- Laravel 10
- Queue
- Boostrap
2. Memory Cache Management
- Redis
3. Database
- MariaDB

## Backend Installation
clone the project repository at
```bash
git clone https://github.com/teguhsusanto2304/large-import-csv-redis-queue
```
Preparing Database

```bash
CREATE DATABASE <a new database name>
```

installation.
start redis server
```bash
sudo service redis-server start
redis-cli 
127.0.0.1:6379> ping
PONG
```bash

intall application
```bash
cd large-import-csv-redis-queue
large-import-csv-redis-queue\ composer install
```
configure the database configuration in ***env.staging*** 
```bash
DB_HOST=<database hostname>
DB_USER=<database username>
DB_NAME=<database schema name>
DB_PASSWORD=<database user password>
DB_DRIVER=mysql <you can change to other database engine such as postgres>
SECRET_KEY=<secret key>
```
database migrating with
```bash
large-import-csv-redis-queue\ php artisan migrate
```
and then try to running the application
```bash
large-import-csv-redis-queue\ php artisan serve
```


You can now view application in the browser.

  Local:            http://<hostname>:<port> ex : http://localhost:8080
  On Your Network:  http://<ip address>:<port>
