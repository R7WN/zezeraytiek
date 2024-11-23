
CREATE TABLE bill (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    investor_name VARCHAR(255),
    investor_id VARCHAR(255),
    region VARCHAR(255),
    land VARCHAR(255),
    seeds VARCHAR(255),
    fertilizers VARCHAR(255),
    equipment VARCHAR(255),
    additional_services VARCHAR(255),
    total_price DECIMAL(10, 3),/* رقم 3 للفواصل بمعنى ياخذ 3 ارقام بعد الفاصلة*/
    payment_method VARCHAR(255)
);
