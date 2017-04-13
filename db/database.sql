CREATE TABLE `ak_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT 'Role 1: Super admin\nRole 2: Admin\nRole 3: Editor/Regular user',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `profile_pic` varchar(300) NOT NULL DEFAULT 'resources/img/default-profile.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

