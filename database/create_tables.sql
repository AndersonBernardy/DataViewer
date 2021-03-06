CREATE TABLE `data_viewer`.`user` ( `id_user` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(64) NOT NULL , `id_profile` INT NOT NULL , PRIMARY KEY (`id_user`), UNIQUE (`username`)) ENGINE = InnoDB;
CREATE TABLE `data_viewer`.`profile` ( `id_profile` INT NOT NULL AUTO_INCREMENT , `profile` VARCHAR(32) NOT NULL , PRIMARY KEY (`id_profile`), UNIQUE (`profile`)) ENGINE = InnoDB;
CREATE TABLE `data_viewer`.`server` ( `id_server` INT NOT NULL AUTO_INCREMENT , `id_servertype` INT NOT NULL , `servername` VARCHAR(32) NOT NULL , `port` INT NOT NULL , `username` VARCHAR(32) NOT NULL , `password` VARCHAR(64) NOT NULL , PRIMARY KEY (`id_server`), UNIQUE (`servername`)) ENGINE = InnoDB;
CREATE TABLE `data_viewer`.`servertype` ( `id_servertype` INT NOT NULL AUTO_INCREMENT , `servertype` VARCHAR(32) NOT NULL , `driver` VARCHAR(16) NOT NULL , PRIMARY KEY (`id_servertype`), UNIQUE (`servertype`), UNIQUE (`driver`)) ENGINE = InnoDB;
CREATE TABLE `data_viewer`.`databas` ( `id_database` INT NOT NULL AUTO_INCREMENT , `dbname` VARCHAR(64) NOT NULL , `id_server` INT NOT NULL , PRIMARY KEY (`id_database`)) ENGINE = InnoDB;
ALTER TABLE `user` ADD FOREIGN KEY (`id_profile`) REFERENCES `profile`(`id_profile`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `server` ADD FOREIGN KEY (`id_servertype`) REFERENCES `servertype`(`id_servertype`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `databas` ADD FOREIGN KEY (`id_server`) REFERENCES `server`(`id_server`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `data_viewer`.`permission` ( `id_user` INT NOT NULL , `id_database` INT NOT NULL , `select_privilege` BOOLEAN NOT NULL DEFAULT FALSE , `insert_privilege` BOOLEAN NOT NULL DEFAULT FALSE , `update_privilege` BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY (`id_user`, `id_database`)) ENGINE = InnoDB;
ALTER TABLE `permission` ADD FOREIGN KEY (`id_database`) REFERENCES `databas`(`id_database`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `permission` ADD FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `permission` ADD `delete_privilege` BOOLEAN NOT NULL DEFAULT FALSE AFTER `update_privilege`;


//CREATE TABLE `data_viewer`.`permission` ( `id_user` INT NOT NULL , `id_database` INT NOT NULL , `id_privilege` INT NOT NULL , PRIMARY KEY (`id_user`, `id_database`, `id_privilege`)) ENGINE = InnoDB;
//CREATE TABLE `data_viewer`.`privilege` ( `id_privilege` INT NOT NULL AUTO_INCREMENT , `privilege` VARCHAR(32) NOT NULL , PRIMARY KEY (`id_privilege`), UNIQUE (`privilege`)) ENGINE = InnoDB;
//ALTER TABLE `permission` ADD FOREIGN KEY (`id_database`) REFERENCES `databas`(`id_database`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `permission` ADD FOREIGN KEY (`id_privilege`) REFERENCES `privilege`(`id_privilege`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `permission` ADD FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
