CREATE TABLE IF NOT EXISTS `init` (
  `firstInit` TINYINT(1) NOT NULL DEFAULT 1,
  `password`  VARCHAR(255) NOT NULL
);

INSERT INTO `init` (`firstInit`, `password`)
SELECT 1, 'init123'
WHERE NOT EXISTS (SELECT 1 FROM `init`);

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `isAdmin` TINYINT(1) NOT NULL DEFAULT 0,
  `isAccountant` TINYINT(1) NOT NULL DEFAULT 0,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  `position` VARCHAR(150) NOT NULL,
  `contract_number` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email`)
);

CREATE TABLE IF NOT EXISTS `projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(255) NOT NULL,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `user_id` INT NOT NULL,
  `project_description` TEXT NULL,
  `project_status` VARCHAR(50) NOT NULL DEFAULT 'Nowy',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  CONSTRAINT `fk_projects_user`
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `files` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file_name` VARCHAR(255) NOT NULL,
  `uploader_name` VARCHAR(100) NOT NULL,
  `uploader_surname` VARCHAR(100) NOT NULL,
  `upload_date` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `invoicelogs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file_name` VARCHAR(255) NOT NULL,
  `user_name` VARCHAR(100) NOT NULL,
  `user_surname` VARCHAR(100) NOT NULL,
  `log_date` VARCHAR(50) NOT NULL,
  `action` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
);
