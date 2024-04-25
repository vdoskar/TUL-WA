CREATE TABLE `tul_wa`.`users`
(
    `id`         INT          NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name`  VARCHAR(255) NOT NULL,
    `nickname`   VARCHAR(255) NOT NULL,
    `email`      VARCHAR(255) NOT NULL,
    `password`   VARCHAR(255) NOT NULL,
    `is_admin`   INT          NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE `users_nickname` (`nickname`)
) ENGINE = InnoDB;