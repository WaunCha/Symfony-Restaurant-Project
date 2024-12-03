<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241203152437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, menu_items_id INT DEFAULT NULL, total_price DOUBLE PRECISION NOT NULL, order_time DATETIME NOT NULL, status VARCHAR(50) NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), INDEX IDX_F529939847E1EB12 (menu_items_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, table_number INT NOT NULL, reservation_time DATETIME NOT NULL, status VARCHAR(50) NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES youssef (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939847E1EB12 FOREIGN KEY (menu_items_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES youssef (id)');
        $this->addSql('ALTER TABLE menu ADD description LONGTEXT NOT NULL, ADD price DOUBLE PRECISION NOT NULL, ADD image VARCHAR(255) DEFAULT NULL, CHANGE sandwich name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939847E1EB12');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE menu DROP description, DROP price, DROP image, CHANGE name sandwich VARCHAR(255) NOT NULL');
    }
}
