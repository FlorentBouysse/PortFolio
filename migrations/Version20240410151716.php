<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410151716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE music_playlist (music_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_10914D0B399BBB13 (music_id), INDEX IDX_10914D0B6BBD148 (playlist_id), PRIMARY KEY(music_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music_music_category (music_id INT NOT NULL, music_category_id INT NOT NULL, INDEX IDX_3B05F9B2399BBB13 (music_id), INDEX IDX_3B05F9B2BC36F4F1 (music_category_id), PRIMARY KEY(music_id, music_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_skill_category (skill_id INT NOT NULL, skill_category_id INT NOT NULL, INDEX IDX_86DD17995585C142 (skill_id), INDEX IDX_86DD1799AC58042E (skill_category_id), PRIMARY KEY(skill_id, skill_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE music_playlist ADD CONSTRAINT FK_10914D0B399BBB13 FOREIGN KEY (music_id) REFERENCES music (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE music_playlist ADD CONSTRAINT FK_10914D0B6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE music_music_category ADD CONSTRAINT FK_3B05F9B2399BBB13 FOREIGN KEY (music_id) REFERENCES music (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE music_music_category ADD CONSTRAINT FK_3B05F9B2BC36F4F1 FOREIGN KEY (music_category_id) REFERENCES music_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_skill_category ADD CONSTRAINT FK_86DD17995585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_skill_category ADD CONSTRAINT FK_86DD1799AC58042E FOREIGN KEY (skill_category_id) REFERENCES skill_category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music_playlist DROP FOREIGN KEY FK_10914D0B399BBB13');
        $this->addSql('ALTER TABLE music_playlist DROP FOREIGN KEY FK_10914D0B6BBD148');
        $this->addSql('ALTER TABLE music_music_category DROP FOREIGN KEY FK_3B05F9B2399BBB13');
        $this->addSql('ALTER TABLE music_music_category DROP FOREIGN KEY FK_3B05F9B2BC36F4F1');
        $this->addSql('ALTER TABLE skill_skill_category DROP FOREIGN KEY FK_86DD17995585C142');
        $this->addSql('ALTER TABLE skill_skill_category DROP FOREIGN KEY FK_86DD1799AC58042E');
        $this->addSql('DROP TABLE music_playlist');
        $this->addSql('DROP TABLE music_music_category');
        $this->addSql('DROP TABLE skill_skill_category');
    }
}
