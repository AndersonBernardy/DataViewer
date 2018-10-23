INSERT INTO `servertype` (`id_servertype`, `servertype`, `driver`) VALUES (NULL, 'MySql', 'mysql');
INSERT INTO `profile` (`id_profile`, `profile`) VALUES (NULL, 'Administrador'), (NULL, 'Convidado');
INSERT INTO `privilege` (`id_privilege`, `privilege`) VALUES (NULL, 'Select'), (NULL, 'Insert');
INSERT INTO `user` (`id_user`, `username`, `id_profile`) VALUES (NULL, 'admin', '1'), (NULL, 'guest', '2');
INSERT INTO `server` (`id_server`, `id_servertype`, `servername`, `port`, `username`, `password`) VALUES (NULL, '1', 'localhost', '3306', 'root', '');
INSERT INTO `databas` (`id_database`, `dbname`, `id_server`) VALUES (NULL, 'data_viewer', '1');

INSERT INTO `permission` (`id_user`, `id_database`, `select_privilege`, `insert_privilege`, `update_privilege`, `delete_privilege`) VALUES ('1', '1', '1', '1', '1', '1');

//INSERT INTO `permission` (`id_user`, `id_database`, `id_privilege`) VALUES ('1', '1', '1'), ('1', '1', '2');