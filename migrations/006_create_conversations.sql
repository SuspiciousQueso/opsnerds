CREATE TABLE conversations (
                               id INT AUTO_INCREMENT PRIMARY KEY,
                               created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;

CREATE TABLE conversation_users (
                                    conversation_id INT NOT NULL,
                                    user_id INT NOT NULL,
                                    PRIMARY KEY (conversation_id, user_id),
                                    CONSTRAINT fk_conv_user_conv
                                        FOREIGN KEY (conversation_id)
                                            REFERENCES conversations(id)
                                            ON DELETE CASCADE,
                                    CONSTRAINT fk_conv_user_user
                                        FOREIGN KEY (user_id)
                                            REFERENCES users(id)
                                            ON DELETE CASCADE
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
