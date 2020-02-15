Appointments API
-
This is based on a Dentist surgery.

A Postman collection can be imported from here: https://www.getpostman.com/collections/0c69c01f1ee2714396d5 - This has example requests set up for each endpoint.

An appointment consists of three different entities as well as a date and time of the appointment.

Those entities are:
- A Customer
- A Staff Member
- A Service

This API supports CRUD operations on each of the above entities as well as an appointment. On creation or deletion of an appointment a record will be added to an email queue which a cron would then run and send any unsent emails.

Note: This email sending functionality can be seen by browsing to http://localhost/emails/send after creating / deleted appointments via the API.

Customers 
-

| Request | URL | Result |
| ------- | --- | --- |
| GET | /api/customers | List all customers |
| GET | /api/customers/1 | Show customer with id of 1 |
| POST | /api/customers | Create a new customer |
| PUT / PATCH | /api/customers/1 | Show customer with id of 1 |
| DELETE | /api/customers/1 | Delete customer with id of 1

The customer will consist of:
- int - id
- string - email
- string - firstname
- string - lastname
- date (yyyy-mm-dd hh:ii:ss)  - created_at
- date (yyyy-mm-dd hh:ii:ss)  - updated_at

To create a customer a POST request must be made to /api/customers and must contain the following data:
- string - email
- string - firstname
- string - lastname

Staff Members 
-

| Request | URL | Result |
| ------- | --- | --- |
| GET | /api/staff_members | List all staff members |
| GET | /api/staff_members/1 | Show staff member with id of 1 |
| POST | /api/staff_members | Create a new staff member |
| PUT / PATCH | /api/staff_members/1 | Show staff member with id of 1 |
| DELETE | /api/staff_members/1 | Delete staff member with id of 1

The staff member will consist of:
- int - id
- string - email
- string - firstname
- string - lastname
- date (yyyy-mm-dd hh:ii:ss)  - created_at
- date (yyyy-mm-dd hh:ii:ss)  - updated_at

To create a staff member a POST request must be made to /api/staff_members and must contain the following data:
- string - email
- string - firstname
- string - lastname

Services 
-

| Request | URL | Result |
| ------- | --- | --- |
| GET | /api/services | List all services |
| GET | /api/services/1 | Show service with id of 1 |
| POST | /api/services | Create a new service |
| PUT / PATCH | /api/services/1 | Show service with id of 1 |
| DELETE | /api/services/1 | Delete service with id of 1

The service will consist of:
- int - id
- string - name
- date (yyyy-mm-dd hh:ii:ss)  - created_at
- date (yyyy-mm-dd hh:ii:ss)  - updated_at

To create a service a POST request must be made to /api/services and must contain the following data:
- string - name

Appointments
-

| Request | URL | Result |
| ------- | --- | --- |
| GET | /api/appointments | List all appointments |
| GET | /api/appointments/1 | Show appointment with id of 1 |
| POST | /api/appointments | Create a new appointment |
| PUT / PATCH | /api/appointments/1 | Show appointment with id of 1 |
| DELETE | /api/appointments/1 | Delete appointment with id of 1

An appointment will consist of:
- int - id
- int - customer_id
- int - staff_member_id
- int - service_id
- date (yyyy-mm-dd hh:ii:ss) - The date and time of the appointment
- date (yyyy-mm-dd hh:ii:ss)  - created_at
- date (yyyy-mm-dd hh:ii:ss)  - updated_at

To create an appointment a POST request must be made to /api/appointments and must contain the following data:
- int - customer_id
- int - staff_member_id
- int - service_id
- date (yyyy-mm-dd hh:ii:ss) - The date and time of the appointment

Appointment GET requests will also include the related customer, staff member and service info. I.e. names and email address of customers and staff members as well as the name of the service.

Docker
-
If you have docker installed then you can run the app easily via docker

- Clone the repo
- Browse to the Laravel app folder `cd appointments/src` and run `composer install`
- Browse to the docker folder `cd ../appointments/docker`
- Run docker `docker-compose up -d` 
- To run migrations you must do so from within the docker container.
- Run `docker exec -it php sh` to get shell access to the PHP docker container
- Browse to the api folder `cd api`
- Run the migrations with seed data `php artisan migrate --seed` 
- In your browser go to `http://localhost/` and, all being well, you will see `Appointments API` printed on your screen.
