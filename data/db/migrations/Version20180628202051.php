<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migração inicial base oAuth2
 */
final class Version20180628202051 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
	    $this->addSql('CREATE TABLE oauth_access_tokens(access_token character varying(40) NOT NULL, client_id character varying(80) NOT NULL, user_id character varying(255), expires timestamp(0) without time zone NOT NULL, scope character varying(2000), CONSTRAINT access_token_pk PRIMARY KEY (access_token))');
	    $this->addSql('CREATE TABLE oauth_authorization_codes ( authorization_code character varying(40) NOT NULL, client_id character varying(80) NOT NULL, user_id character varying(255), redirect_uri character varying(2000), expires timestamp(0) without time zone NOT NULL, scope character varying(2000), id_token character varying(2000), CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code))');
	    $this->addSql('CREATE TABLE oauth_clients(client_id character varying(80) NOT NULL, client_secret character varying(80) NOT NULL, redirect_uri character varying(2000) NOT NULL, grant_types character varying(80), scope character varying(2000),user_id character varying(255), CONSTRAINT clients_client_id_pk PRIMARY KEY (client_id))');
	    $this->addSql('CREATE TABLE oauth_jwt ( client_id character varying(80) NOT NULL, subject character varying(80), public_key character varying(2000),CONSTRAINT jwt_client_id_pk PRIMARY KEY (client_id))');
	    $this->addSql('CREATE TABLE oauth_refresh_tokens(
	    	refresh_token character varying(40) NOT NULL,
  			client_id character varying(80) NOT NULL,
  			user_id character varying(255),
  			expires timestamp(0) without time zone NOT NULL,
  			scope character varying(2000),
  			CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token))');
	   	$this->addSql('CREATE TABLE oauth_scopes(
	   		type character varying(255) NOT NULL DEFAULT \'supported\'::character varying,
	   		scope character varying(2000),
	   		client_id character varying(80),
	   		is_default smallint)');
	   	$this->addSql('CREATE TABLE oauth_users (
	   		username character varying(255) NOT NULL,
	   		password character varying(2000),
  			first_name character varying(255),
  			last_name character varying(255),
  			CONSTRAINT username_pk PRIMARY KEY (username)
		)');
		$this->addSql("INSERT INTO oauth_users VALUES('root','$2y$10$FKvA0uE5ccHCg/aQ8HZhGOeIWVJlh3YcmmCjb2OAo0FW.ksP2e5oW',NULL,NULL)");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE oauth_access_tokens');
	    $this->addSql('DROP TABLE oauth_authorization_codes');
	    $this->addSql('DROP TABLE oauth_clients');
	    $this->addSql('DROP TABLE oauth_jwt');
	    $this->addSql('DROP TABLE oauth_refresh_tokens');
	   	$this->addSql('DROP TABLE oauth_scopes');
	   	$this->addSql('DROP TABLE oauth_users');
    }
}
