CREATE TABLE messages (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          conversation_id INT NOT NULL,
                          sender_id INT NOT NULL,
                          body TEXT NOT NULL,
                          sent_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                          CONSTRAINT fk_msg_conv
                              FOREIGN KEY (conversation_id)
                                  REFERENCES conversations(id)
                                  ON DELETE CASCADE,
                          CONSTRAINT fk_msg_sender
                              FOREIGN KEY (sender_id)
                                  REFERENCES users(id)
                                  ON DELETE CASCADE
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
