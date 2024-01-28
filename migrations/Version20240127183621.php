<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240127183621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create basic report structure';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE failure (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
		$this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, test_count INT NOT NULL, assertion_count INT NOT NULL, error_count INT NOT NULL, warning_count INT NOT NULL, failure_count INT NOT NULL, skip_count INT NOT NULL, time DOUBLE PRECISION NOT NULL, execution_timestamp DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_case (id INT AUTO_INCREMENT NOT NULL, failure_id INT DEFAULT NULL, test_class_id INT NOT NULL, name VARCHAR(255) NOT NULL, class VARCHAR(255) DEFAULT NULL, class_name VARCHAR(255) DEFAULT NULL, file VARCHAR(255) DEFAULT NULL, line VARCHAR(255) DEFAULT NULL, assertion_count INT NOT NULL, time DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_7D71B3CBBADC2069 (failure_id), INDEX IDX_7D71B3CB7F630046 (test_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_class (id INT AUTO_INCREMENT NOT NULL, testsuite_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, test_count INT NOT NULL, assertion_count INT NOT NULL, error_count INT NOT NULL, warning_count INT NOT NULL, failure_count INT NOT NULL, skip_count INT NOT NULL, time DOUBLE PRECISION NOT NULL, INDEX IDX_E695BF94E7F580AD (testsuite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testsuite (id INT AUTO_INCREMENT NOT NULL, report_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, test_count INT NOT NULL, assertion_count INT NOT NULL, error_count INT NOT NULL, warning_count INT NOT NULL, failure_count INT NOT NULL, skip_count INT NOT NULL, time DOUBLE PRECISION NOT NULL, INDEX IDX_4D60BEF24BD2A4C0 (report_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test_case ADD CONSTRAINT FK_7D71B3CBBADC2069 FOREIGN KEY (failure_id) REFERENCES failure (id)');
        $this->addSql('ALTER TABLE test_case ADD CONSTRAINT FK_7D71B3CB7F630046 FOREIGN KEY (test_class_id) REFERENCES test_class (id)');
        $this->addSql('ALTER TABLE test_class ADD CONSTRAINT FK_E695BF94E7F580AD FOREIGN KEY (testsuite_id) REFERENCES testsuite (id)');
        $this->addSql('ALTER TABLE testsuite ADD CONSTRAINT FK_4D60BEF24BD2A4C0 FOREIGN KEY (report_id) REFERENCES report (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test_case DROP FOREIGN KEY FK_7D71B3CBBADC2069');
        $this->addSql('ALTER TABLE test_case DROP FOREIGN KEY FK_7D71B3CB7F630046');
        $this->addSql('ALTER TABLE test_class DROP FOREIGN KEY FK_E695BF94E7F580AD');
        $this->addSql('ALTER TABLE testsuite DROP FOREIGN KEY FK_4D60BEF24BD2A4C0');
        $this->addSql('DROP TABLE failure');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE test_case');
        $this->addSql('DROP TABLE test_class');
        $this->addSql('DROP TABLE testsuite');
    }
}
