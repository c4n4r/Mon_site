<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422091244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE article_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE taxonomy_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE article (id INT NOT NULL, author_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, hook TEXT NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, views_count INT NOT NULL, video VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_23A0E66F675F31B ON article (author_id)');
        $this->addSql('CREATE TABLE article_taxonomy (article_id INT NOT NULL, taxonomy_id INT NOT NULL, PRIMARY KEY(article_id, taxonomy_id))');
        $this->addSql('CREATE INDEX IDX_A8FA4C567294869C ON article_taxonomy (article_id)');
        $this->addSql('CREATE INDEX IDX_A8FA4C569557E6F6 ON article_taxonomy (taxonomy_id)');
        $this->addSql('CREATE TABLE article_user (article_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(article_id, user_id))');
        $this->addSql('CREATE INDEX IDX_3DD151487294869C ON article_user (article_id)');
        $this->addSql('CREATE INDEX IDX_3DD15148A76ED395 ON article_user (user_id)');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, article_id INT DEFAULT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526C7294869C ON comment (article_id)');
        $this->addSql('CREATE TABLE taxonomy (id INT NOT NULL, image VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE taxonomy_taxonomy (taxonomy_source INT NOT NULL, taxonomy_target INT NOT NULL, PRIMARY KEY(taxonomy_source, taxonomy_target))');
        $this->addSql('CREATE INDEX IDX_50F290EAF7B8C7E2 ON taxonomy_taxonomy (taxonomy_source)');
        $this->addSql('CREATE INDEX IDX_50F290EAEE5D976D ON taxonomy_taxonomy (taxonomy_target)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_taxonomy ADD CONSTRAINT FK_A8FA4C567294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_taxonomy ADD CONSTRAINT FK_A8FA4C569557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomy (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_user ADD CONSTRAINT FK_3DD151487294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_user ADD CONSTRAINT FK_3DD15148A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE taxonomy_taxonomy ADD CONSTRAINT FK_50F290EAF7B8C7E2 FOREIGN KEY (taxonomy_source) REFERENCES taxonomy (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE taxonomy_taxonomy ADD CONSTRAINT FK_50F290EAEE5D976D FOREIGN KEY (taxonomy_target) REFERENCES taxonomy (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE article_taxonomy DROP CONSTRAINT FK_A8FA4C567294869C');
        $this->addSql('ALTER TABLE article_user DROP CONSTRAINT FK_3DD151487294869C');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C7294869C');
        $this->addSql('ALTER TABLE article_taxonomy DROP CONSTRAINT FK_A8FA4C569557E6F6');
        $this->addSql('ALTER TABLE taxonomy_taxonomy DROP CONSTRAINT FK_50F290EAF7B8C7E2');
        $this->addSql('ALTER TABLE taxonomy_taxonomy DROP CONSTRAINT FK_50F290EAEE5D976D');
        $this->addSql('DROP SEQUENCE article_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE taxonomy_id_seq CASCADE');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_taxonomy');
        $this->addSql('DROP TABLE article_user');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE taxonomy');
        $this->addSql('DROP TABLE taxonomy_taxonomy');
    }
}
