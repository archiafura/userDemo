<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180617092618 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espace_professionnel (id INT AUTO_INCREMENT NOT NULL, type_produit VARCHAR(255) NOT NULL, duree_dispo VARCHAR(255) NOT NULL, horaire_dispo VARCHAR(255) NOT NULL, conseil_utilisation VARCHAR(255) NOT NULL, img_produit VARCHAR(255) NOT NULL, type_event VARCHAR(255) NOT NULL, date_event VARCHAR(255) NOT NULL, lieu_event VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tableaudeborduser (id INT AUTO_INCREMENT NOT NULL, nomlivraison VARCHAR(255) NOT NULL, nomfacturation VARCHAR(255) NOT NULL, prenominfos VARCHAR(255) NOT NULL, nominfos VARCHAR(255) NOT NULL, prenomlivraison VARCHAR(255) NOT NULL, prenomfacturation VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, livraison VARCHAR(255) NOT NULL, facturation VARCHAR(255) NOT NULL, cplivraison VARCHAR(255) DEFAULT NULL, villelivraison VARCHAR(255) DEFAULT NULL, cpfacturation VARCHAR(255) DEFAULT NULL, villefacturation VARCHAR(255) DEFAULT NULL, emailinfos VARCHAR(255) NOT NULL, mdpinfos VARCHAR(255) NOT NULL, confirmmdpinfos VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD genre VARCHAR(100) NOT NULL, ADD birthday DATE NOT NULL, ADD tel INT NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD newletter TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE espace_professionnel');
        $this->addSql('DROP TABLE tableaudeborduser');
        $this->addSql('ALTER TABLE user DROP genre, DROP birthday, DROP tel, DROP ville, DROP newletter');
    }
}
