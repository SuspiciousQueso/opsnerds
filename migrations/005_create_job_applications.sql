CREATE TABLE job_applications (
                                  id INT AUTO_INCREMENT PRIMARY KEY,
                                  job_id INT NOT NULL,
                                  applicant_id INT NOT NULL,
                                  cover_letter TEXT,
                                  status ENUM('submitted','reviewed','accepted','rejected') DEFAULT 'submitted',
                                  applied_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                                  CONSTRAINT fk_app_job
                                      FOREIGN KEY (job_id)
                                          REFERENCES jobs(id)
                                          ON DELETE CASCADE,
                                  CONSTRAINT fk_app_user
                                      FOREIGN KEY (applicant_id)
                                          REFERENCES users(id)
                                          ON DELETE CASCADE,
                                  UNIQUE KEY uniq_job_applicant (job_id, applicant_id)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
