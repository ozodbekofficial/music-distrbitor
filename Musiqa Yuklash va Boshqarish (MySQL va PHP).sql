CREATE TABLE music (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    price DECIMAL(10, 2),
    release_date DATE
);
