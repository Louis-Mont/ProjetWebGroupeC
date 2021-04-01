<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401130003 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `double` (id INT AUTO_INCREMENT NOT NULL, number1 INT NOT NULL, number2 INT NOT NULL, ask_result TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_couples (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_couples_double (liste_couples_id INT NOT NULL, double_id INT NOT NULL, INDEX IDX_31CFFBC88EDC6F75 (liste_couples_id), INDEX IDX_31CFFBC8DC1BA693 (double_id), PRIMARY KEY(liste_couples_id, double_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_couples_double ADD CONSTRAINT FK_31CFFBC88EDC6F75 FOREIGN KEY (liste_couples_id) REFERENCES liste_couples (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_couples_double ADD CONSTRAINT FK_31CFFBC8DC1BA693 FOREIGN KEY (double_id) REFERENCES `double` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_couples_double DROP FOREIGN KEY FK_31CFFBC8DC1BA693');
        $this->addSql('ALTER TABLE liste_couples_double DROP FOREIGN KEY FK_31CFFBC88EDC6F75');
        $this->addSql('DROP TABLE `double`');
        $this->addSql('DROP TABLE liste_couples');
        $this->addSql('DROP TABLE liste_couples_double');
    }
}
