<?php declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112031306 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_users CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(2000) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE cpf cpf VARCHAR(15) DEFAULT NULL, CHANGE telefone telefone INT DEFAULT NULL, CHANGE cep cep INT DEFAULT NULL, CHANGE cidade cidade VARCHAR(40) DEFAULT NULL, CHANGE estado estado VARCHAR(40) DEFAULT NULL, CHANGE bairro bairro VARCHAR(80) DEFAULT NULL, CHANGE rua rua VARCHAR(80) DEFAULT NULL, CHANGE complemento complemento VARCHAR(200) DEFAULT NULL, CHANGE foto foto VARCHAR(140) DEFAULT NULL, CHANGE razao_social razao_social VARCHAR(255) DEFAULT NULL, CHANGE nome_fantasia nome_fantasia VARCHAR(255) DEFAULT NULL, CHANGE experiencias experiencias VARCHAR(255) DEFAULT NULL, CHANGE data_nascimento data_nascimento DATETIME DEFAULT NULL, CHANGE descricao descricao DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_users CHANGE username username VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE password password VARCHAR(2000) NOT NULL COLLATE utf8_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE cpf cpf VARCHAR(15) NOT NULL COLLATE utf8_unicode_ci, CHANGE telefone telefone INT NOT NULL, CHANGE cep cep INT NOT NULL, CHANGE cidade cidade VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE estado estado VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE bairro bairro VARCHAR(80) NOT NULL COLLATE utf8_unicode_ci, CHANGE rua rua VARCHAR(80) NOT NULL COLLATE utf8_unicode_ci, CHANGE complemento complemento VARCHAR(200) NOT NULL COLLATE utf8_unicode_ci, CHANGE foto foto VARCHAR(140) NOT NULL COLLATE utf8_unicode_ci, CHANGE razao_social razao_social VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE nome_fantasia nome_fantasia VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE experiencias experiencias VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE data_nascimento data_nascimento DATETIME NOT NULL, CHANGE descricao descricao DATETIME NOT NULL');
    }
}
