<?php declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180629202353 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA schema_scl');
        $this->addSql('CREATE TABLE schema_scl.scl_parametros (id_parametro INT NOT NULL, ano_vigente INT NOT NULL, semestre_vigente INT NOT NULL, PRIMARY KEY(id_parametro))');
        $this->addSql('DROP TABLE doctrine_migration_versions');
        $this->addSql('DROP TABLE oauth_access_tokens');
        $this->addSql('DROP TABLE oauth_authorization_codes');
        $this->addSql('DROP TABLE oauth_clients');
        $this->addSql('DROP TABLE oauth_jwt');
        $this->addSql('DROP TABLE oauth_refresh_tokens');
        $this->addSql('DROP TABLE oauth_scopes');
        $this->addSql('DROP TABLE oauth_users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE doctrine_migration_versions (version VARCHAR(255) NOT NULL, PRIMARY KEY(version))');
        $this->addSql('CREATE TABLE oauth_access_tokens (access_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255) DEFAULT NULL, expires TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, scope VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(access_token))');
        $this->addSql('CREATE TABLE oauth_authorization_codes (authorization_code VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255) DEFAULT NULL, redirect_uri VARCHAR(2000) DEFAULT NULL, expires TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, scope VARCHAR(2000) DEFAULT NULL, id_token VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(authorization_code))');
        $this->addSql('CREATE TABLE oauth_clients (client_id VARCHAR(80) NOT NULL, client_secret VARCHAR(80) NOT NULL, redirect_uri VARCHAR(2000) NOT NULL, grant_types VARCHAR(80) DEFAULT NULL, scope VARCHAR(2000) DEFAULT NULL, user_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(client_id))');
        $this->addSql('CREATE TABLE oauth_jwt (client_id VARCHAR(80) NOT NULL, subject VARCHAR(80) DEFAULT NULL, public_key VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(client_id))');
        $this->addSql('CREATE TABLE oauth_refresh_tokens (refresh_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255) DEFAULT NULL, expires TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, scope VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(refresh_token))');
        $this->addSql('CREATE TABLE oauth_scopes (type VARCHAR(255) DEFAULT \'supported\' NOT NULL, scope VARCHAR(2000) DEFAULT NULL, client_id VARCHAR(80) DEFAULT NULL, is_default SMALLINT DEFAULT NULL)');
        $this->addSql('CREATE TABLE oauth_users (username VARCHAR(255) NOT NULL, password VARCHAR(2000) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(username))');
        $this->addSql('DROP TABLE schema_scl.scl_parametros');
    }
}
