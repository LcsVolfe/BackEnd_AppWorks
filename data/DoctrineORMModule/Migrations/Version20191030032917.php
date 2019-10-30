<?php declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030032917 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE AvaliacaoPrestador (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, comentario VARCHAR(255) NOT NULL, nota DOUBLE PRECISION NOT NULL, INDEX IDX_2A5542B2DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Servico (id INT AUTO_INCREMENT NOT NULL, pagamento_id INT DEFAULT NULL, descricao VARCHAR(255) NOT NULL, avaliacao_descricao VARCHAR(255) NOT NULL, avaliacao_nota DOUBLE PRECISION NOT NULL, INDEX IDX_CEF54A50E06F81F7 (pagamento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Pagamento (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, cartao_id INT DEFAULT NULL, prestador INT NOT NULL, valor DOUBLE PRECISION NOT NULL, descricao VARCHAR(255) NOT NULL, INDEX IDX_BCEEC9B5DB38439E (usuario_id), INDEX IDX_BCEEC9B52AF522B5 (cartao_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE EspecialidadePrestador (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, nome_especialidade VARCHAR(255) NOT NULL, descricao DOUBLE PRECISION NOT NULL, INDEX IDX_B397349CDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Cartao (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, cvv VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE AvaliacaoPrestador ADD CONSTRAINT FK_2A5542B2DB38439E FOREIGN KEY (usuario_id) REFERENCES oauth_users (id)');
        $this->addSql('ALTER TABLE Servico ADD CONSTRAINT FK_CEF54A50E06F81F7 FOREIGN KEY (pagamento_id) REFERENCES Pagamento (id)');
        $this->addSql('ALTER TABLE Pagamento ADD CONSTRAINT FK_BCEEC9B5DB38439E FOREIGN KEY (usuario_id) REFERENCES oauth_users (id)');
        $this->addSql('ALTER TABLE Pagamento ADD CONSTRAINT FK_BCEEC9B52AF522B5 FOREIGN KEY (cartao_id) REFERENCES Cartao (id)');
        $this->addSql('ALTER TABLE EspecialidadePrestador ADD CONSTRAINT FK_B397349CDB38439E FOREIGN KEY (usuario_id) REFERENCES oauth_users (id)');
        $this->addSql('ALTER TABLE oauth_users ADD pagamento_id INT DEFAULT NULL, ADD servico_id INT DEFAULT NULL, ADD cpf VARCHAR(15) NOT NULL, ADD telefone INT NOT NULL, ADD cep INT NOT NULL, ADD cidade VARCHAR(40) NOT NULL, ADD estado VARCHAR(40) NOT NULL, ADD bairro VARCHAR(80) NOT NULL, ADD rua VARCHAR(80) NOT NULL, ADD numero INT NOT NULL, ADD complemento VARCHAR(200) NOT NULL, ADD foto VARCHAR(140) NOT NULL, CHANGE first_name nome VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE oauth_users ADD CONSTRAINT FK_93804FF8E06F81F7 FOREIGN KEY (pagamento_id) REFERENCES Pagamento (id)');
        $this->addSql('ALTER TABLE oauth_users ADD CONSTRAINT FK_93804FF882E14982 FOREIGN KEY (servico_id) REFERENCES Servico (id)');
        $this->addSql('CREATE INDEX IDX_93804FF8E06F81F7 ON oauth_users (pagamento_id)');
        $this->addSql('CREATE INDEX IDX_93804FF882E14982 ON oauth_users (servico_id)');
        $this->addSql('ALTER TABLE oauth_users RENAME INDEX idx_93804ff819be1b30 TO IDX_93804FF8D60322AC');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oauth_users DROP FOREIGN KEY FK_93804FF882E14982');
        $this->addSql('ALTER TABLE oauth_users DROP FOREIGN KEY FK_93804FF8E06F81F7');
        $this->addSql('ALTER TABLE Servico DROP FOREIGN KEY FK_CEF54A50E06F81F7');
        $this->addSql('ALTER TABLE Pagamento DROP FOREIGN KEY FK_BCEEC9B52AF522B5');
        $this->addSql('DROP TABLE AvaliacaoPrestador');
        $this->addSql('DROP TABLE Servico');
        $this->addSql('DROP TABLE Pagamento');
        $this->addSql('DROP TABLE EspecialidadePrestador');
        $this->addSql('DROP TABLE Cartao');
        $this->addSql('DROP INDEX IDX_93804FF8E06F81F7 ON oauth_users');
        $this->addSql('DROP INDEX IDX_93804FF882E14982 ON oauth_users');
        $this->addSql('ALTER TABLE oauth_users DROP pagamento_id, DROP servico_id, DROP cpf, DROP telefone, DROP cep, DROP cidade, DROP estado, DROP bairro, DROP rua, DROP numero, DROP complemento, DROP foto, CHANGE nome first_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE oauth_users RENAME INDEX idx_93804ff8d60322ac TO IDX_93804FF819BE1B30');
    }
}
