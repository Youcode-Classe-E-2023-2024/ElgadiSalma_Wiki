-- CREATE TABLE users (
--     id_user BIGINT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(255) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     password TEXT NOT NULL,
--     picture TEXT NULL,
--     CONSTRAINT users_email_uindex UNIQUE (email)
-- );

-- CREATE TABLE category (
--     id_category BIGINT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL
-- );

-- CREATE TABLE wikis (
--     id_wiki BIGINT AUTO_INCREMENT PRIMARY KEY,
--     title VARCHAR(255) NOT NULL,
--     description VARCHAR(500) NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
--     archive TINYINT(1) DEFAULT 0,
--     created_by BIGINT,
--     id_category BIGINT,
--     FOREIGN KEY (created_by) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE CASCADE,
--     FOREIGN KEY (id_category) REFERENCES category (id_category) ON UPDATE CASCADE ON DELETE CASCADE
-- );

-- CREATE TABLE tags (
--     id_tag BIGINT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL
-- );

-- CREATE TABLE tag_wiki (
--     id_wiki BIGINT,
--     id_tag BIGINT,
--     PRIMARY KEY (id_wiki, id_tag),
--     FOREIGN KEY (id_wiki) REFERENCES wikis (id_wiki) ON UPDATE CASCADE ON DELETE CASCADE,
--     FOREIGN KEY (id_tag) REFERENCES tags (id_tag) ON UPDATE CASCADE ON DELETE CASCADE
-- );