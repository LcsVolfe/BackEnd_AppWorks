<?php declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030014244 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE oauth_roles (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(2000) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, Role_id INT DEFAULT NULL, INDEX IDX_93804FF819BE1B30 (Role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_authorization_codes (authorization_code VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255) DEFAULT NULL, redirect_uri VARCHAR(2000) DEFAULT NULL, expires DATETIME NOT NULL, scope VARCHAR(2000) DEFAULT NULL, id_token VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(authorization_code)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_refresh_tokens (refresh_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255) DEFAULT NULL, expires DATETIME NOT NULL, scope VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(refresh_token)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_clients (client_id VARCHAR(80) NOT NULL, client_secret VARCHAR(80) NOT NULL, redirect_uri VARCHAR(2000) NOT NULL, grant_types VARCHAR(80) DEFAULT NULL, scope VARCHAR(2000) DEFAULT NULL, user_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(client_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_scopes (scope VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, first_name VARCHAR(2000) DEFAULT NULL, client_id VARCHAR(80) DEFAULT NULL, is_default INT NOT NULL, PRIMARY KEY(scope)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_jwt (client_id VARCHAR(80) NOT NULL, subject VARCHAR(80) DEFAULT NULL, public_key VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(client_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oauth_access_tokens (access_token VARCHAR(40) NOT NULL, client_id VARCHAR(80) NOT NULL, user_id VARCHAR(255) NOT NULL, expires DATETIME DEFAULT NULL, scope VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(access_token)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oauth_users ADD CONSTRAINT FK_93804FF819BE1B30 FOREIGN KEY (Role_id) REFERENCES oauth_roles (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_users DROP FOREIGN KEY FK_93804FF819BE1B30');
        $this->addSql('DROP TABLE oauth_roles');
        $this->addSql('DROP TABLE oauth_users');
        $this->addSql('DROP TABLE oauth_authorization_codes');
        $this->addSql('DROP TABLE oauth_refresh_tokens');
        $this->addSql('DROP TABLE oauth_clients');
        $this->addSql('DROP TABLE oauth_scopes');
        $this->addSql('DROP TABLE oauth_jwt');
        $this->addSql('DROP TABLE oauth_access_tokens');
    }
}
