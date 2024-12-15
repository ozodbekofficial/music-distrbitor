// MySQL jadvaliga litsenziya qo'shish
CREATE TABLE licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    music_id INT,
    license_type VARCHAR(100),
    price DECIMAL(10, 2),
    FOREIGN KEY (music_id) REFERENCES music(id)
);
