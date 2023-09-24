-- Tạo cơ sở dữ liệu
CREATE DATABASE library_project;

-- Sử dụng cơ sở dữ liệu
USE library_project;

-- Tạo bảng quản lý sách
CREATE TABLE books (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  publication_year INT NOT NULL,
  isbn VARCHAR(20) NOT NULL,
  quantity INT NOT NULL
);

-- Tạo bảng quản lý độc giả
CREATE TABLE readers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  contact_info VARCHAR(255) NOT NULL
);

-- Tạo bảng quản lý mượn/trả sách
CREATE TABLE loans (
  id INT PRIMARY KEY AUTO_INCREMENT,
  book_id INT NOT NULL,
  reader_id INT NOT NULL,
  borrow_date DATE NOT NULL,
  due_date DATE NOT NULL,
  return_date DATE,
  FOREIGN KEY (book_id) REFERENCES books (id),
  FOREIGN KEY (reader_id) REFERENCES readers (id)
);

-- Tạo bảng tổ chức hệ thống phân loại
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE books_categories (
  book_id INT NOT NULL,
  category_id INT NOT NULL,
  FOREIGN KEY (book_id) REFERENCES books (id),
  FOREIGN KEY (category_id) REFERENCES categories (id)
);

-- Tạo bảng quản lý tài liệu điện tử
CREATE TABLE electronic_documents (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  format VARCHAR(20) NOT NULL,
  url VARCHAR(255) NOT NULL
);