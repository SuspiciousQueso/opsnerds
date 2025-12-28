CREATE TABLE work_experience (
                                 id INT AUTO_INCREMENT PRIMARY KEY,
                                 user_id INT NOT NULL,
                                 company VARCHAR(255),
                                 title VARCHAR(255),
                                 start_date DATE,
                                 end_date DATE,
                                 description TEXT,
                                 created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                                 CONSTRAINT fk_work_user
                                     FOREIGN KEY (user_id)
                                         REFERENCES users(id)
                                         ON DELETE CASCADE
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
