CREATE DATABASE IF NOT EXISTS encuestas_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE encuestas_db;

CREATE TABLE encuestas (
                           id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                           titulo VARCHAR(150) NOT NULL,
                           descripcion TEXT,
                           activa TINYINT(1) NOT NULL DEFAULT 1,
                           fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                           INDEX (activa)
) ENGINE=InnoDB;

CREATE TABLE preguntas (
                           id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                           encuesta_id BIGINT UNSIGNED NOT NULL,
                           texto VARCHAR(255) NOT NULL,
                           tipo ENUM('abierta','unica_opcion','multiple_opcion') NOT NULL,
                           orden INT UNSIGNED NOT NULL DEFAULT 1,
                           INDEX (encuesta_id),
                           CONSTRAINT fk_preguntas_encuesta
                               FOREIGN KEY (encuesta_id)
                                   REFERENCES encuestas(id)
                                   ON DELETE CASCADE
                                   ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE opciones (
                          id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          pregunta_id BIGINT UNSIGNED NOT NULL,
                          texto VARCHAR(150) NOT NULL,
                          orden INT UNSIGNED NOT NULL DEFAULT 1,
                          INDEX (pregunta_id),
                          CONSTRAINT fk_opciones_pregunta
                              FOREIGN KEY (pregunta_id)
                                  REFERENCES preguntas(id)
                                  ON DELETE CASCADE
                                  ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE respuestas (
                            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            encuesta_id BIGINT UNSIGNED NOT NULL,
                            fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            INDEX (encuesta_id),
                            CONSTRAINT fk_respuestas_encuesta
                                FOREIGN KEY (encuesta_id)
                                    REFERENCES encuestas(id)
                                    ON DELETE CASCADE
                                    ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE respuestas_detalle (
                                    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    respuesta_id BIGINT UNSIGNED NOT NULL,
                                    pregunta_id BIGINT UNSIGNED NOT NULL,
                                    opcion_id BIGINT UNSIGNED NULL,
                                    texto_respuesta TEXT NULL,
                                    INDEX (respuesta_id),
                                    INDEX (pregunta_id),
                                    CONSTRAINT fk_detalle_respuesta
                                        FOREIGN KEY (respuesta_id)
                                            REFERENCES respuestas(id)
                                            ON DELETE CASCADE
                                            ON UPDATE CASCADE,
                                    CONSTRAINT fk_detalle_pregunta
                                        FOREIGN KEY (pregunta_id)
                                            REFERENCES preguntas(id)
                                            ON DELETE CASCADE
                                            ON UPDATE CASCADE,
                                    CONSTRAINT fk_detalle_opcion
                                        FOREIGN KEY (opcion_id)
                                            REFERENCES opciones(id)
                                            ON DELETE SET NULL
                                            ON UPDATE CASCADE
) ENGINE=InnoDB;