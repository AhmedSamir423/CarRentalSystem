-- Insert Offices
INSERT INTO Offices (location, phone) VALUES
('Cairo Office', '01001234567'),
('Alexandria Office', '01007654321'),
('Giza Office', '01009876543');

-- Insert Cars
INSERT INTO Cars (plate_id, model, year, status, office_id) VALUES
('ABC123', 'Toyota Corolla', 2020, 'active', 1),
('XYZ789', 'Honda Civic', 2019, 'rented', 2),
('LMN456', 'Chevrolet Malibu', 2021, 'active', 3),
('DEF321', 'Ford Focus', 2018, 'out_of_service', 1);

-- Insert Customers
INSERT INTO Customers (name, email, phone, address) VALUES
('Ahmed Samir', 'ahmed.samir@example.com', '01012345678', '123 Elm Street, Cairo'),
('Sarah Ali', 'sarah.ali@example.com', '01087654321', '456 Oak Avenue, Alexandria'),
('Kareem Hassan', 'kareem.hassan@example.com', '01023456789', '789 Pine Road, Giza');

-- Insert Reservations
INSERT INTO Reservations (customer_id, plate_id, pickup_date, return_date) VALUES
(1, 'XYZ789', '2024-12-20', '2024-12-25'),
(2, 'LMN456', '2024-12-22', '2024-12-27'),
(3, 'ABC123', '2024-12-23', '2024-12-30');

-- Insert Payments
INSERT INTO Payments (reservation_id, amount, payment_date) VALUES
(1, 500.00, '2024-12-21'),
(2, 750.00, '2024-12-23'),
(3, 600.00, '2024-12-24');
