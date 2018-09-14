CREATE TABLE books (
  id INT PRIMARY_KEY,
  title VARCHAR(255) NOT_NULL,
  author VARCHAR(255) NOT_NULL,
  location VARCHAR(255) NOT_NULL,
  updated_at DATE NOT_NULL,
  created_at DATE NOT_NULL
);