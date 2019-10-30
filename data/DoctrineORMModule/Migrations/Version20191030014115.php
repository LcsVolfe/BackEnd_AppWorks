<?php declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030014115 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Uploads_Mensais DROP FOREIGN KEY FK_5418943E1D431A41');
        $this->addSql('ALTER TABLE oauth_users DROP FOREIGN KEY FK_93804FF81D431A41');
        $this->addSql('ALTER TABLE Contabilidade DROP FOREIGN KEY FK_4501CB7F63FDE49A');
        $this->addSql('DROP TABLE Contabilidade');
        $this->addSql('DROP TABLE Empresa');
        $this->addSql('DROP TABLE Logs');
        $this->addSql('DROP TABLE LucroLiquidoAcumulado');
        $this->addSql('DROP TABLE LucroLiquidoMensal');
        $this->addSql('DROP TABLE Plano');
        $this->addSql('DROP TABLE Treinamento');
        $this->addSql('DROP TABLE Uploads_Mensais');
        $this->addSql('DROP TABLE oauth_programs');
        $this->addSql('DROP INDEX IDX_93804FF81D431A41 ON oauth_users');
        $this->addSql('ALTER TABLE oauth_users DROP Empresa_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Contabilidade (id INT AUTO_INCREMENT NOT NULL, Nome_Fantasia VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Razao_Social VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Cnpj VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Plano_id INT DEFAULT NULL, INDEX IDX_4501CB7F63FDE49A (Plano_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Empresa (id INT AUTO_INCREMENT NOT NULL, Nome_Fantasia VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Razao_Social VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Cnpj VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Contabilidade_id INT DEFAULT NULL, INDEX IDX_776A63CC66E5D40B (Contabilidade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Logs (id INT AUTO_INCREMENT NOT NULL, Data_Execucao DATE NOT NULL, Original LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\', Alteracao LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\', Tipo_Log VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Usuario_id INT DEFAULT NULL, INDEX IDX_50BD69629465404E (Usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE LucroLiquidoAcumulado (id INT AUTO_INCREMENT NOT NULL, Empresa VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Total DOUBLE PRECISION NOT NULL, Lucro_Prejuizo_Liquido DOUBLE PRECISION NOT NULL, Receitas_Operacionais DOUBLE PRECISION NOT NULL, Diferenca_Porcentagem DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE LucroLiquidoMensal (id INT AUTO_INCREMENT NOT NULL, Empresa VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Mes VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Ano VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Lucro_Prejuizo_Liquido DOUBLE PRECISION NOT NULL, Receitas_Operacionais DOUBLE PRECISION NOT NULL, Diferenca_Porcentagem DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Plano (id INT AUTO_INCREMENT NOT NULL, Nome VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Descricao VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Limite_De_Empresas INT NOT NULL, Preco DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Treinamento (id INT AUTO_INCREMENT NOT NULL, Titulo VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Status VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Descricao VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE Uploads_Mensais (id INT AUTO_INCREMENT NOT NULL, Ano VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Mes VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Data_Upload DATE NOT NULL, Receitas_Operacionais VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, Receita_De_Vendas DOUBLE PRECISION NOT NULL, Receita_De_Fretes_E_Entregas DOUBLE PRECISION NOT NULL, Outras_Receitas_1 DOUBLE PRECISION NOT NULL, Outras_Receitas_2 DOUBLE PRECISION NOT NULL, Deducoes_Da_Receita_Bruta DOUBLE PRECISION NOT NULL, Impostos_Sobre_Vendas DOUBLE PRECISION NOT NULL, Comissoes_Sobre_Vendas DOUBLE PRECISION NOT NULL, Descontos_Incondicionais DOUBLE PRECISION NOT NULL, Devolucoes_De_Vendas DOUBLE PRECISION NOT NULL, Outras_Deducoes_1 DOUBLE PRECISION NOT NULL, Outras_Deducoes_2 DOUBLE PRECISION NOT NULL, Receita_Liquida_De_Vendas DOUBLE PRECISION NOT NULL, Custos_Operacionais DOUBLE PRECISION NOT NULL, Custo_Das_Mercadorias_Vendidas DOUBLE PRECISION NOT NULL, Custo_Dos_Produtos_Vendidos DOUBLE PRECISION NOT NULL, Custo_Dos_Servicos_Prestados DOUBLE PRECISION NOT NULL, Outros_Custos DOUBLE PRECISION NOT NULL, Lucro_Bruto DOUBLE PRECISION NOT NULL, Despesas_Operacionais DOUBLE PRECISION NOT NULL, Despesas_Com_Vendas DOUBLE PRECISION NOT NULL, Despesas_Administrativas DOUBLE PRECISION NOT NULL, Despesas_Tributarias_Gerais DOUBLE PRECISION NOT NULL, Outras_Despesas_1 DOUBLE PRECISION NOT NULL, Outras_Despesas_2 DOUBLE PRECISION NOT NULL, Outras_Despesas_3 DOUBLE PRECISION NOT NULL, Outras_Despesas_4 DOUBLE PRECISION NOT NULL, Lucro_Prejuizo_Operacional DOUBLE PRECISION NOT NULL, Receitas_E_Despesas_Financeiras DOUBLE PRECISION NOT NULL, Receitas_E_Rendimentos_Financeiros DOUBLE PRECISION NOT NULL, Despesas_Financeiras DOUBLE PRECISION NOT NULL, Outras_Receitas_Financeiras DOUBLE PRECISION NOT NULL, Outras_Despesas_Financeiras DOUBLE PRECISION NOT NULL, Outras_Receitas_E_Despesas_Nao_Operacionais DOUBLE PRECISION NOT NULL, Outras_Receitas_Nao_Operacionais DOUBLE PRECISION NOT NULL, Outras_Despesas_Nao_Operacionais DOUBLE PRECISION NOT NULL, Lucro_Prejuizo_Liquido DOUBLE PRECISION NOT NULL, Desembolso_Com_Investimentos_E_Emprestimos DOUBLE PRECISION NOT NULL, Investimentos_Em_Imobilizado DOUBLE PRECISION NOT NULL, Emprestimos_E_Dividas DOUBLE PRECISION NOT NULL, Outros_Investimentos_E_Emprestimos DOUBLE PRECISION NOT NULL, Lucro_Prejuizo_Final DOUBLE PRECISION NOT NULL, Empresa_id INT DEFAULT NULL, INDEX IDX_5418943E1D431A41 (Empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE oauth_programs (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE Contabilidade ADD CONSTRAINT FK_4501CB7F63FDE49A FOREIGN KEY (Plano_id) REFERENCES Plano (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Logs ADD CONSTRAINT FK_50BD69629465404E FOREIGN KEY (Usuario_id) REFERENCES oauth_users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Uploads_Mensais ADD CONSTRAINT FK_5418943E1D431A41 FOREIGN KEY (Empresa_id) REFERENCES Empresa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE oauth_users ADD Empresa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oauth_users ADD CONSTRAINT FK_93804FF81D431A41 FOREIGN KEY (Empresa_id) REFERENCES Empresa (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_93804FF81D431A41 ON oauth_users (Empresa_id)');
    }
}
