ALTER TABLE player
ADD FOREIGN KEY (id_groupe) REFERENCES groupe(id);

ALTER TABLE `planningentrainement`.`groupe`
ADD UNIQUE `id_admin` (`id_admin`, `id`) USING BTREE;

ALTER TABLE groupe
ADD FOREIGN KEY (id_admin) REFERENCES player(id);

ALTER TABLE `planningentrainement`.`planning` 
DROP INDEX `id_groupe_index`,
ADD UNIQUE (`id_groupe`, `id`) USING BTREE;



