# Medical Bill Generator

## Description
A web application that generates and downloads a medical bill as a PDF based on a consultation. It is designed for clinics and healthcare providers to generate bills for their patients quickly.

## Features
- Generate PDF medical bills
- Display consult details (date, hour, patient DNI, doctor username, etc.)
- Adjustable pricing based on patient insurance status
- Responsive and user-friendly interface

## Technologies Used
- **Frontend:** React, JavaScript, TailwindCSS
- **Backend:** Laravel, PHP
- **PDF Generation:** DomPDF (Laravel package)
- **Database:** MySQL

## Color Reference

| Color              | Hex     |
| ------------------ | ------- |
| **Primary Color**   | #dbeafe |
| **Navigation Bar**  | #1f2937 |
| **Primary Button**  | #6b7280 |
| **Create Action**   | #059669 |
| **Update Action**   | #d97706 |
| **Delete Action**   | #dc2626 |

## Demo
![Demo Image](https://github.com/user-attachments/assets/7b910cea-3bc3-4f92-8272-fb9f7d4bff36)

## PDF Generated
![Generated PDF](https://github.com/user-attachments/assets/9c545cab-be39-43e6-9ef2-9e7856db6ddb)

## Installation
    
   ```bash
## Clone the repository:
```git clone https://github.com/GonS11/consultas.git

## Install dependencies

```composer install

## Generate the application key

```php artisan key:generate

## Run database migrations

```php artisan migrate

## Load seeders and fakers

```php artisan db:seed

## Run the application

```php artisan serve

## Authors

- [@GonS11](https://github.com/GonS11)
