<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180624210633 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espace_professionnel (id INT AUTO_INCREMENT NOT NULL, type_produit VARCHAR(255) NOT NULL, duree_dispo VARCHAR(255) NOT NULL, horaire_dispo VARCHAR(255) NOT NULL, conseil_utilisation VARCHAR(255) NOT NULL, img_produit VARCHAR(255) NOT NULL, type_event VARCHAR(255) NOT NULL, date_event VARCHAR(255) NOT NULL, lieu_event VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, livraison VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_24CC0DF2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier_product (panier_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_29F0C02CF77D927C (panier_id), INDEX IDX_29F0C02C4584665A (product_id), PRIMARY KEY(panier_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantity DOUBLE PRECISION NOT NULL, fournisseur VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tableaudeborduser (id INT AUTO_INCREMENT NOT NULL, nomlivraison VARCHAR(255) NOT NULL, nomfacturation VARCHAR(255) NOT NULL, prenominfos VARCHAR(255) NOT NULL, nominfos VARCHAR(255) NOT NULL, prenomlivraison VARCHAR(255) NOT NULL, prenomfacturation VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, livraison VARCHAR(255) NOT NULL, facturation VARCHAR(255) NOT NULL, cplivraison VARCHAR(255) DEFAULT NULL, villelivraison VARCHAR(255) DEFAULT NULL, cpfacturation VARCHAR(255) DEFAULT NULL, villefacturation VARCHAR(255) DEFAULT NULL, emailinfos VARCHAR(255) NOT NULL, mdpinfos VARCHAR(255) NOT NULL, confirmmdpinfos VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, tableaudeborduser_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, zip INT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, roles JSON NOT NULL, genre VARCHAR(100) NOT NULL, birthday DATE NOT NULL, tel INT NOT NULL, ville VARCHAR(255) NOT NULL, newletter TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64967E2C9B (tableaudeborduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier_product ADD CONSTRAINT FK_29F0C02CF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_product ADD CONSTRAINT FK_29F0C02C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64967E2C9B FOREIGN KEY (tableaudeborduser_id) REFERENCES tableaudeborduser (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE panier_product DROP FOREIGN KEY FK_29F0C02CF77D927C');
        $this->addSql('ALTER TABLE panier_product DROP FOREIGN KEY FK_29F0C02C4584665A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64967E2C9B');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2A76ED395');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE espace_professionnel');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE panier_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE tableaudeborduser');
        $this->addSql('DROP TABLE user');
    }
}
