-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table petomatic.breeds: ~5 rows (approximately)
DELETE FROM `breeds`;
/*!40000 ALTER TABLE `breeds` DISABLE KEYS */;
INSERT INTO `breeds` (`id`, `breed_name`) VALUES
	(1, 'Golden Retriever'),
	(2, 'Bengal Cats'),
	(3, 'Husky'),
	(4, 'Burmese'),
	(5, 'Maine Coon'),
	(6, 'German Shepherd'),
	(7, 'Rottweiler');
/*!40000 ALTER TABLE `breeds` ENABLE KEYS */;

-- Dumping data for table petomatic.clients: ~6 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `client_name`, `client_lastname`, `client_photo`) VALUES
	(148, 'Peter', 'Hue', 'https://loremflickr.com/320/240/man'),
	(149, 'Monica', 'Jackson', 'https://loremflickr.com/320/240/man'),
	(150, 'Judy', 'Clark', 'https://loremflickr.com/320/240/man'),
	(151, 'Jack', 'Parker', 'https://loremflickr.com/320/240/man'),
	(152, 'Steve', 'Bobs', 'https://loremflickr.com/320/240/man'),
	(153, 'Lola', 'Ding', 'https://loremflickr.com/320/240/man'),
	(154, 'Lee', 'Loo', 'https://loremflickr.com/320/240/man'),
	(155, 'Zacc', 'Oom', 'https://loremflickr.com/320/240/man');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping data for table petomatic.pets: ~11 rows (approximately)
DELETE FROM `pets`;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` (`id`, `pet_name`, `species`, `pet_photo`, `breed_id`, `clients_id`) VALUES
	(18, 'Zack', 'Dog', 'https://loremflickr.com/320/240/pet', 6, 151),
	(19, 'Lilly', 'Cat', 'https://loremflickr.com/320/240/pet', 4, 151),
	(20, 'Barky', 'Dog', 'https://loremflickr.com/320/240/pet', 1, 150),
	(21, 'Pipi', 'Dog', 'https://loremflickr.com/320/240/pet', 1, 150),
	(22, 'Loca', 'Cat', 'https://loremflickr.com/320/240/pet', 4, 154),
	(23, 'Charlie', 'Dog', 'https://loremflickr.com/320/240/pet', 3, 153),
	(24, 'Doge', 'Dog', 'https://loremflickr.com/320/240/pet', 3, 149),
	(25, 'Nic', 'Cat', 'https://loremflickr.com/320/240/pet', 5, 149),
	(26, 'Clarky', 'Cat', 'https://loremflickr.com/320/240/pet', 2, 149),
	(27, 'Gus', 'Dog', 'https://loremflickr.com/320/240/pet', 3, 148),
	(28, 'Loki', 'Cat', 'https://loremflickr.com/320/240/pet', 4, 148),
	(29, 'Aki', 'Dog', 'https://loremflickr.com/320/240/pet', 1, 152);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;

-- Dumping data for table petomatic.staff: ~2 rows (approximately)
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `staff_name`, `staff_lastname`, `email`, `password`) VALUES
	(1, 'drVeljko', 'ilic', 'veljko@gmail', 'veljko'),
	(2, 'drPer', 'peric', 'pera@gmail', 'pera'),
	(5, 'Petar', 'Petrovic', 'pera@gmail.com', '$1$rasmusle$eNuE8Cc6AbNuoG.b6y76C1\n');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping data for table petomatic.types: ~5 rows (approximately)
DELETE FROM `types`;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `type`) VALUES
	(1, 'Checkup'),
	(2, 'Cosmetic'),
	(3, 'URGENT'),
	(9, 'Follow up'),
	(10, 'Operation');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping data for table petomatic.visits: ~0 rows (approximately)
DELETE FROM `visits`;
/*!40000 ALTER TABLE `visits` DISABLE KEYS */;
INSERT INTO `visits` (`id`, `pet_id`, `date`, `long_description`, `short_description`, `diagnosis`, `photo`, `staff_id`, `type_id`, `clients_id`) VALUES
	(3, 27, '2018-08-09', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution ', 'Nail Clippings', 'Healthy', '', 1, 2, 148),
	(4, 25, '2018-08-25', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution ', 'Dizzyness and Fearfull', 'Katalapsia', '', 1, 1, 149),
	(5, 18, '2018-08-11', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution ', 'Has multiple ticks', 'Ticks ', '', 1, 1, 151),
	(6, 26, '2018-08-08', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution ', 'Attacked by a cat', 'Flesh wounds', '', 1, 9, 149);
/*!40000 ALTER TABLE `visits` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
