-- Create Offices Table
CREATE TABLE Offices (
    office_id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255) NOT NULL,
    phone VARCHAR(15)
);

-- Create Cars Table
CREATE TABLE Cars (
    plate_id VARCHAR(50) PRIMARY KEY,
    model VARCHAR(100) NOT NULL,
    year YEAR NOT NULL,
    status ENUM('active', 'out_of_service', 'rented') DEFAULT 'active',
    office_id INT,
    FOREIGN KEY (office_id) REFERENCES Offices(office_id) ON DELETE SET NULL
);

-- Create Customers Table
CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address TEXT
);

-- Create Reservations Table
CREATE TABLE Reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    plate_id VARCHAR(50) NOT NULL,
    pickup_date DATE NOT NULL,
    return_date DATE NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id) ON DELETE CASCADE,
    FOREIGN KEY (plate_id) REFERENCES Cars(plate_id) ON DELETE CASCADE
);

-- Create Payments Table
CREATE TABLE Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    FOREIGN KEY (reservation_id) REFERENCES Reservations(reservation_id) ON DELETE CASCADE
);
