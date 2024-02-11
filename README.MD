# PHP Example for testing

This is a barebones PHP application, meant for demonstrating how to write tests.

I'll be honest, I did not have the time to research all PHP best practices, but it will do for an example.

A MySQL or MariaDB database is required to be running. You can check the properties in DatabaseConnector.php.
Two tables are required:

### Products

- ID (primary key, auto increment)
- Name (varchar(255))
- Price (float)

### Coupons

- ID (primary key, auto increment)
- Percentage (int)
    - Values in here should range from 1 to 99. You could do it differently, but it's the discount percentage, so it
      would be weird.
