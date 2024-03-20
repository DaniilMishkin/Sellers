# Sellers Service

Laravel REST API for importing sellers CSV files and displaying sellers, contacts and sales.

## Requirements
- composer
- PHP

## Installation
Run the following command from the terminal:
```
./deploy.sh
```

## Usage
- POST `/load`: Upload a CSV file
- GET `/sellers/{id}`: Provide complete seller data via id
- GET `/sellers/{id}/contacts`: Provide a list of all contacts established by the seller.
- GET `/sellers/{id}/sales`: Provide a list of all sales data accomplished by the seller.
- GET `/sales/{year}`: Provide an object with two properties: stats (netAmount, grossAmount, taxAmount, profit, % profit) and sales (list of the all sales matching the period).

## Run tests
```
php artisan test
```

## Preview

#### Load CSV file
![app preview](https://raw.githubusercontent.com/freelancerwebro/sellers-service/main/resources/images/load.png)

#### Get seller by ID
![app preview](https://raw.githubusercontent.com/freelancerwebro/sellers-service/main/resources/images/seller.png)

#### Get seller contacts
![app preview](https://raw.githubusercontent.com/freelancerwebro/sellers-service/main/resources/images/contacts.png)

#### Get seller sales
![app preview](https://raw.githubusercontent.com/freelancerwebro/sellers-service/main/resources/images/sales.png)

#### Get year stats
![app preview](https://raw.githubusercontent.com/freelancerwebro/sellers-service/main/resources/images/stats.png)