# Book Vehicle Application
This is an application for admin to book a mining vehicle, then an Invoice will be created and waiting for a chosen Approver to approve the vehicle booking.

[Entity Relationship Diagram (ERD)](https://drive.google.com/file/d/1pTbhSm3zgdZQbeaNU66r5jUMd88xOgSJ/view?usp=sharing) for this Application

## Technologies Used
| Name       | Version        |
| ---------- | -------------- |
|Framework   | Laravel 10     |
|Composer    | 2.2.4          |
|PHP         | 8.2.0          |
|Node        | v16.13.2       |
|npm         | 8.1.2          |
|XAMPP       | v3.3.0         |
|MySQL       | 10.4.27-MariaDB|
|Apache      | 2.4.54 (Win64) |

### php.ini file configuration (for laravel-excel)
- [x] PhpSpreadsheet: `^1.21
- [x] PHP extension php_zip enabled
- [x] PHP extension php_xml enabled
- [x] PHP extension php_gd2 enabled
- [x] PHP extension php_iconv enabled
- [x] PHP extension php_simplexml enabled
- [x] PHP extension php_xmlreader enabled
- [x] PHP extension php_zlib enabled

## Installation
### 1. Run XAMPP Control Panel (Apache, MySQL)

### 2. Open your terminal in htdocs folder inside xampp folder, then clone this repository 
```bash
git clone https://github.com/jevoncloanda/BookVehicleApp.git
```
### 3. cd into the project
```bash
cd BookVehicleApp
```
### 4. Install Composer dependencies
```bash
composer install
```
### 5. Install npm dependencies
```bash
npm install && npm run build
```
### 6. Create a copy of your .env
```bash
cp .env.example .env
```
### 7. Generate app encryption key
```bash
php artisan key:generate
```
### 8. Create an empty database in MySQL
### 9. Configure .env file and connect Laravel to the database
### 10. Migrate and seed the database
```bash
php artisan migrate:fresh --seed
```

# How to use the application
## Run the application
```bash
php artisan serve
```
## 2. Login to the application
### For Admin
There is only 1 user for admin:
> name      : Admin ,
> role      : Admin ,
> email     : admin@gmail.com ,
> password  : admin1234 ,

### For Approver
There are 5 users for approver
> name      : Andi ,
> role      : Approver ,
> email     : andi@gmail.com ,
> password  : andi1234 ,

> name      : Budi ,
> role      : Approver ,
> email     : budi@gmail.com ,
> password  : budi1234 ,

> name      : Chaki ,
> role      : Approver ,
> email     : chaki@gmail.com ,
> password  : chaki1234 ,

> name      : Dodit ,
> role      : Approver ,
> email     : dodit@gmail.com ,
> password  : dodit1234 ,

> name      : Elang ,
> role      : Approver ,
> email     : elang@gmail.com ,
> password  : elang1234 ,

## 3. Dashboard
### For Admin
In the admin dashboard, there are the following items:
- Vehicle Graph
    - This is a graph of all available vehicles, the data are divided per vehicle type
- Create New Vehicle
    - In this page, admin can create a new vehicle, lets say the company just bought a new vehicle
- Book a Vehicle
    - In this page, there will be a list of all vehicles available in which they can click to redirect to the create invoice page
    - In the create invoice page, admin can submit a vehicle booking request which will be sent to the assigned approver
- Invoices Graph
    - This is a graph of all invoices, the data are divided per Approver by (total, pending, approved, denied)
- See All Invoice(s)
    - In this page, admin can see the list of all invoices with its details
- See Pending Invoice(s)
    - In this page, admin can see the list of all pending invoices with its details
- Export Button
    - This button allows admin to download invoices data in Excel

### For Approver
In the approver dashboard, there are the following items:
- Invoices Graph
    - This is a different graph with the invoices graph in admin dashboard, this graph is specific only for invoices assigned to the approver, the data is divided by (total, pending, approved, denied)
- Invoice(s) Awaiting Approval
    - In this page, approver will see the list of all pending invoices that are assigned to him/her and all its details, which then he/she can approve or deny the invoice
- Invoice(s) List
    - In this page, approver will see the list of all invoices that are assigned to him/her and all its details, he/she can also approve or deny the invoice in this page

