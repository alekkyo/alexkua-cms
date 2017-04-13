/*CREATE TABLE `articles_en` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `text` varchar(100) NOT NULL,
  `thumbnail_link` varchar(999) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `articles_fr` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `text` varchar(100) NOT NULL,
  `thumbnail_link` varchar(999) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `articles_text_en` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `article_text` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `articles_text_fr` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `article_text` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `blog_articles_en` (
  `ID` int(11) NOT NULL,
  `img_link` varchar(999) DEFAULT NULL,
  `article_text` longtext NOT NULL,
  `date_posted` datetime NOT NULL,
  `tags` varchar(999) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `blog_articles_fr` (
  `ID` int(11) NOT NULL,
  `img_link` varchar(999) DEFAULT NULL,
  `article_text` longtext NOT NULL,
  `date_posted` datetime NOT NULL,
  `tags` varchar(999) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `blog_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment_text` longtext NOT NULL,
  `up_likes` int(11) DEFAULT '0',
  `down_likes` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cle_magiques_en` (
  `ID` int(11) NOT NULL,
  `cle_magique_text` longtext NOT NULL,
  `date_posted` datetime NOT NULL,
  `auteur` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `cle_magiques_fr` (
  `ID` int(11) NOT NULL,
  `cle_magique_text` longtext NOT NULL,
  `date_posted` datetime NOT NULL,
  `auteur` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `langues` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` varchar(2) NOT NULL,
  `lang_text` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `publicite` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(999) NOT NULL,
  `link` varchar(999) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `recommendations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `blog_article_id` int(11) NOT NULL,
  `recommendation_text` longtext NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;*/

/* -- Schema:

alexkua_cms

-- Tables:

langues: ID, lang_id, lang_text

users: ID, email, password, firstname, lastname, telephone, active

articles_fr: ID, order, text, thumbnail_link, parent_id
articles_en:

articles_text_fr: ID, article_id, article_text
articles_text_en:

blog_articles_fr: ID, img_link, article_text, date_posted, tags, author_id
blog_articles_en

blog_comments: ID, blog_id, parent_comment_id, comment_text, up_like, down_like

publicite: ID, img_link, link

recommendations

cle_magiques

*/
