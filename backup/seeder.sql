/**
 * Seeder for DB
 */

/* ak_users */
TRUNCABLE TABLE `alexkua`.`ak_users`;
INSERT INTO `alexkua`.`ak_users` (`id`, `email`, `firstname`, `lastname`, `password`, `salt`, `telephone`, `role`, `active`, `profile_pic`) VALUES ('1', 'alexkua@me.com', 'Alex', 'Kua', '621ff7c8e618db8fab41a753992a90e0', '5a2bab2e17b0cb65887882a601cb7a6f4b38e635aaef', '(438) 870-0376', '1', '1', 'resources/img/default-profile.png');
