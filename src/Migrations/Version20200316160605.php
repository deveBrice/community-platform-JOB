<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200316160605 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE uploaded_file (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, id_reviewer_id INT NOT NULL, id_content_id INT NOT NULL, UNIQUE INDEX UNIQ_794381C668458BE1 (id_reviewer_id), UNIQUE INDEX UNIQ_794381C6212A233A (id_content_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_upload (id INT AUTO_INCREMENT NOT NULL, id_content_id INT NOT NULL, id_upload_id INT NOT NULL, UNIQUE INDEX UNIQ_7F8B96B3212A233A (id_content_id), UNIQUE INDEX UNIQ_7F8B96B34CFA0616 (id_upload_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_network_publisher (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_social_network_id INT NOT NULL, UNIQUE INDEX UNIQ_FEECA55D79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_FEECA55DB765144 (id_social_network_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_network (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, api_key VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_content_id INT NOT NULL, content LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_9474526C79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_9474526C212A233A (id_content_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C668458BE1 FOREIGN KEY (id_reviewer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6212A233A FOREIGN KEY (id_content_id) REFERENCES content (id)');
        $this->addSql('ALTER TABLE content_upload ADD CONSTRAINT FK_7F8B96B3212A233A FOREIGN KEY (id_content_id) REFERENCES content (id)');
        $this->addSql('ALTER TABLE content_upload ADD CONSTRAINT FK_7F8B96B34CFA0616 FOREIGN KEY (id_upload_id) REFERENCES uploaded_file (id)');
        $this->addSql('ALTER TABLE social_network_publisher ADD CONSTRAINT FK_FEECA55D79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE social_network_publisher ADD CONSTRAINT FK_FEECA55DB765144 FOREIGN KEY (id_social_network_id) REFERENCES social_network (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C212A233A FOREIGN KEY (id_content_id) REFERENCES content (id)');
        $this->addSql('ALTER TABLE content ADD state VARCHAR(255) NOT NULL, ADD status LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE content_upload DROP FOREIGN KEY FK_7F8B96B34CFA0616');
        $this->addSql('ALTER TABLE social_network_publisher DROP FOREIGN KEY FK_FEECA55DB765144');
        $this->addSql('DROP TABLE uploaded_file');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE content_upload');
        $this->addSql('DROP TABLE social_network_publisher');
        $this->addSql('DROP TABLE social_network');
        $this->addSql('DROP TABLE comment');
        $this->addSql('ALTER TABLE content DROP state, DROP status');
    }
}
