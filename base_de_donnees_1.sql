CREATE TABLE `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phone` varchar(30),
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `role` (
  `id` integer PRIMARY KEY,
  `title` varchar(15),
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `users_role` (
  `user_id` integer,
  `role_id` integer,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `logement` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(100),
  `position_lat` double,
  `position_long` double,
  `adress` varchar (200) NOT NULL,
  `number_of_travelers` integer NOT NULL,
  `price` float NOT NULL,
  `id_type_logement` integer,
  `bedroom_number` integer NOT NULL,
  `kitchen` integer DEFAULT false,
  `bathroom_number` integer NOT NULL,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `type_logement` (
  `id` integer PRIMARY KEY,
  `type` varchar(20) NOT NULL,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `picture` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `url` varchar(70),
  `id_logement` integer,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `service` (
  `id` integer PRIMARY KEY,
  `title` varchar(30) NOT NULL,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `service_logement` (
  `id_logement` integer,
  `id_service` integer,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `booking` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `cancelled` integer DEFAULT false,
  `id_logement` integer,
  `id_user` integer,
  `avis_client` varchar(200),
  `final_price` float NOT NULL,
  `service_fee` float NOT NULL,
  `taxes` float NOT NULL,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `messages` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `text` varchar(255),
  `id_booking` integer NOT NULL,
  `user_id` integer NOT NULL,
  `created_at` timestamp DEFAULT now()
);

CREATE TABLE `action_entretien` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `entretien_user_id` integer,
  `desciption` varchar(70),
  `etat_dentretien` varchar(10),
  `id_booking` integer,
  `id_logement` integer,
  `entretien_status` varchar (100),
  `created_at` timestamp DEFAULT now()
);

CREATE UNIQUE INDEX `users_role_index_0` ON `users_role` (`user_id`, `role_id`);

CREATE UNIQUE INDEX `service_logement_index_1` ON `service_logement` (`id_logement`, `id_service`);

ALTER TABLE `users_role` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `users_role` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

ALTER TABLE `logement` ADD FOREIGN KEY (`id_type_logement`) REFERENCES `type_logement` (`id`);

ALTER TABLE `picture` ADD FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`);

ALTER TABLE `service_logement` ADD FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`);

ALTER TABLE `service_logement` ADD FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

ALTER TABLE `booking` ADD FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`);

ALTER TABLE `booking` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

ALTER TABLE `messages` ADD FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`);

ALTER TABLE `action_entretien` ADD FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`);
