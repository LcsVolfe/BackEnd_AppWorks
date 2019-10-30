PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE oauth_access_tokens (
    access_token VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(2000),
    CONSTRAINT access_token_pk PRIMARY KEY (access_token)
);
INSERT INTO oauth_access_tokens VALUES('7656a5446044615d9f2782ba9228f9fe1198b89d','testclient','testuser','2014-04-07 16:01:01',NULL);
INSERT INTO oauth_access_tokens VALUES('c151a35e37813a8c46853aeda2dc52faf0416f58','testclient','testuser','2014-04-07 16:08:09',NULL);
INSERT INTO oauth_access_tokens VALUES('d72459660b1451c7f9c4392ffb13e69e3c5825a8','testclient','testuser','2014-04-07 16:12:12',NULL);
INSERT INTO oauth_access_tokens VALUES('b56807cbb54aa7c7307f4cbf6075d4fbaea19cfc','testclient','testuser','2014-04-07 16:15:46',NULL);
INSERT INTO oauth_access_tokens VALUES('c1b1f85647d3f47d2b37c032081a4c3f418eb233','testclient2','testuser','2014-04-07 16:18:03',NULL);
INSERT INTO oauth_access_tokens VALUES('a7eb07a1116a3d3a4256b16eb8d8cbb762ca5d73','testclient','testuser','2018-06-29 15:38:17',NULL);
INSERT INTO oauth_access_tokens VALUES('040432d31010059a4a13aaf8cb275676b56a9a3f','testclient','testuser','2018-06-29 15:38:33',NULL);
INSERT INTO oauth_access_tokens VALUES('375abcd0e99852f459f505d218ccd045f8302c80','testclient','testuser','2018-06-29 15:39:15',NULL);
CREATE TABLE oauth_authorization_codes (
    authorization_code VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    redirect_uri VARCHAR(2000),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(2000), id_token VARCHAR(2000),
    CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code)
);
CREATE TABLE oauth_refresh_tokens (
    refresh_token VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(2000),
    CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token)
);
INSERT INTO oauth_refresh_tokens VALUES('807ce6f9ee52c203f9ffa5580af04722323dc226','testclient','testuser','2014-04-21 15:01:02',NULL);
INSERT INTO oauth_refresh_tokens VALUES('7370cca45ced22de4f55fe76124362f25d061132','testclient','testuser','2014-04-21 15:08:09',NULL);
INSERT INTO oauth_refresh_tokens VALUES('e6a76adf2c3cae2fb4a61ae123630f1d89da1856','testclient','testuser','2014-04-21 15:12:12',NULL);
INSERT INTO oauth_refresh_tokens VALUES('0134ae16b2e99a8e80c4665fa0780d524def189e','testclient','testuser','2014-04-21 15:15:46',NULL);
INSERT INTO oauth_refresh_tokens VALUES('77396248fa2986cb1f2ea687de835e45c83c7706','testclient2','testuser','2014-04-21 15:18:03',NULL);
INSERT INTO oauth_refresh_tokens VALUES('32e7a5908d5372852843d1f3524f6647c9e87318','testclient','testuser','2018-07-13 14:38:17',NULL);
INSERT INTO oauth_refresh_tokens VALUES('015bc37454e82e5f596c3fb44fc720d1c5b9d097','testclient','testuser','2018-07-13 14:38:33',NULL);
INSERT INTO oauth_refresh_tokens VALUES('b744c728c73a0290fc85c3e27748a79416eb0030','testclient','testuser','2018-07-13 14:39:15',NULL);
CREATE TABLE oauth_users (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(2000),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    CONSTRAINT username_pk PRIMARY KEY (username)
);
INSERT INTO oauth_users VALUES('testuser','$2y$10$5ICo6mbnWLsptjCZVfMu1e7p04FYpgiZydEG1KD4MI8Q2fcwuCu8e',NULL,NULL);
CREATE TABLE oauth_scopes (
    type VARCHAR(255) NOT NULL DEFAULT "supported",
    scope VARCHAR(2000),
    client_id VARCHAR (80)
, `is_default` TINYINT(1) NULL DEFAULT NULL);
CREATE TABLE oauth_jwt (
    client_id VARCHAR(80) NOT NULL,
    subject VARCHAR(80),
    public_key VARCHAR(2000),
    CONSTRAINT client_id_pk PRIMARY KEY (client_id)
);
CREATE TABLE oauth_clients (
  client_id varchar(80) PRIMARY KEY NOT NULL,
  client_secret varchar(80) NOT NULL,
  redirect_uri varchar(2000) NOT NULL,
  grant_types varchar(80),
  scope varchar(2000) DEFAULT(NULL),
  user_id varchar(255) DEFAULT(NULL)
);
INSERT INTO oauth_clients VALUES('testclient','$2y$10$5ICo6mbnWLsptjCZVfMu1e7p04FYpgiZydEG1KD4MI8Q2fcwuCu8e','/oauth/receivecode',NULL,NULL,NULL);
INSERT INTO oauth_clients VALUES('testclient2','','/oauth/receivecode',NULL,NULL,NULL);
COMMIT;
