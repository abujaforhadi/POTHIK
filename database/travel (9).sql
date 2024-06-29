-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 01:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'jafor', 'jafor'),
(3, 'ismail', 'ismail'),
(4, 'muntajima', 'muntajima');

-- --------------------------------------------------------

--
-- Table structure for table `blog_table`
--

CREATE TABLE `blog_table` (
  `topic_title` varchar(50) NOT NULL,
  `topic_date` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `duration` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `image_filename` varchar(50) NOT NULL,
  `topic_para` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_table`
--

INSERT INTO `blog_table` (`topic_title`, `topic_date`, `name`, `duration`, `person`, `cost`, `image_filename`, `topic_para`) VALUES
('Ahsan Manzil', '2023-12-15', 'Jafor', 3, 3, 1200, '1-ahsan-manzil.jpg', 'Visited this place as I was in Dhaka, ashan manzil is very famous in Dhaka, view of the river buri Ganga.'),
('Cox’s Bazar', '2024-05-27', 'Ismail', 5, 5, 20000, 'coxs.webp', 'To be brutally honest, this “beach” is not even a beach in the sense that any Westerner would understand. It’s basically a wide sediment plain that the sea laps over as the tide comes in. The “sand” again is a kind of sediment that resembles wet ceme'),
('Jaflong', '2024-05-15', 'Muntajima ', 2, 10, 10000, 'sy.jpg', 'Jaflong is one of beautiful place in Bangladesh,water &amp; stone looks very nice, i visited that place many times, last i visited 22 October 2022 with friend,that was excellent moments,i love jaflong and i wanna go again &amp; again'),
('Kaptai Lake', '2023-12-23', 'Jafor', 3, 3, 5200, 'kap.jpg', 'One of the best artificial manmade lake in Bangladesh at Rangamati. Hire a boat'),
('Padma Bridge ', '2023-12-22', 'Sojib', 1, 15, 5000, 'podma.jpeg', 'The largest bridge South Asia is located in Munshiganj, Dhaka, Bangladesh.'),
('Patenga Beach', '2023-12-25', 'jafor', 1, 10, 10000, 'pot.jpg', 'It’s a very scenic beach the end of Chattogram city. Very good road communication.'),
('Sajek Valley', '2023-12-22', 'Hadi', 2, 5, 25100, 'sajek.jpg', 'Sajek isunion at Baghaichari Upazila in Rangamati.\nyou have to came Kahgrachori first and than you have to hire jeep to go there'),
('Sundarbans', '2023-12-13', 'Joy', 4, 3, 21000, 'Sundarban-Safari-990x490.jpg', 'Sundarbans, The largest mangrove forest in the world which is the home of the most beautiful tiger in the world - the Royal Bengal Tiger - lies on the delta of the Ganges, Brahmaputra, and Meghna rivers on the Bay of Bengal. ');

-- --------------------------------------------------------

--
-- Table structure for table `booking_bus`
--

CREATE TABLE `booking_bus` (
  `bookingBus_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Bus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_tour`
--

CREATE TABLE `booking_tour` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_tour`
--

INSERT INTO `booking_tour` (`booking_id`, `user_id`, `tour_id`, `adults`, `children`, `total_price`) VALUES
(3, 95118, 2, 1, 0, 2500),
(4, 95118, 2, 1, 0, 2500),
(5, 95118, 3, 1, 0, 7500),
(6, 95118, 35, 3, 1, 52500),
(7, 95118, 35, 1, 0, 15000),
(8, 95118, 35, 1, 0, 15000),
(9, 95118, 35, 1, 0, 15000),
(10, 95118, 35, 1, 0, 15000),
(11, 95118, 4, 1, 0, 9500),
(12, 95118, 4, 1, 0, 9500);

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE `bus_details` (
  `bus_name` text NOT NULL,
  `source` text NOT NULL,
  `destination` text NOT NULL,
  `fare` int(50) NOT NULL,
  `seats_available` int(10) NOT NULL,
  `Bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`bus_name`, `source`, `destination`, `fare`, `seats_available`, `Bus_id`) VALUES
('SR 10:30pm Volvo AC', 'Bogura', 'Dhaka', 1100, 12, 0),
('Saintmartin Hyundai 8:30am Volvo AC', 'Khagrachari', 'Dhaka', 1600, 9, 1),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 2),
('Saintmartin Hyundai 8:30pm Volvo AC', 'Khagrachari', 'Dhaka', 1600, 20, 3),
('Hanif Enterprise 2:30pm Non AC', 'Khagrachari', 'Dhaka', 750, 18, 4),
('Saintmartin Hyundai 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 15, 5),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 6),
('Saintmartin Hyundai 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 20, 7),
('Hanif Enterprise 2:30pm Non AC', 'Dhaka', 'Khagrachari', 750, 18, 8),
('Ena Transport (Pvt) Ltd 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 19, 9),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 10),
('Evergreen Transport Ltd 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 26, 11),
('Ena Transport (Pvt) Ltd 2:30pm Non AC', 'Dhaka', 'Khagrachari', 750, 20, 12),
('Ena Transport (Pvt) Ltd 8:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1800, 19, 13),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 14),
('Hanif Enterprise 11:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1600, 26, 15),
('Evergreen Transport Ltd 8:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1600, 26, 16),
('Hanif Enterprise 5:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 10, 17),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 20, 18),
('Ena Transport (Pvt) Ltd 8:30pm Volvo AC', 'CoxsBazar', 'Dhaka', 1800, 19, 19),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 20),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 20, 21),
('Soudia Coach Service 8:30pm Volvo AC', 'Chittagong', 'Dhaka', 900, 25, 22),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 23),
('Hanif Enterprise 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 1200, 6, 24),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Chittagong', 'Dhaka', 1000, 17, 25),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 19, 26),
('Hanif Enterprise 5:30pm Non AC', 'Chittagong', 'Dhaka', 850, 10, 27),
('Saintmartin Travels 8:30pm Volvo AC', 'Dhaka', 'Chittagong', 1400, 26, 28),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'Chittagong', 'Dhaka', 800, 20, 29),
('Hanif Enterprise 11:30pm Volvo AC', 'CoxsBazar', 'Dhaka', 1600, 26, 30),
('Soudia Coach Service 8:30pm Volvo AC', 'Chittagong', 'Dhaka', 900, 25, 31),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'CoxsBazar', 'Dhaka', 1800, 19, 32),
('Hanif Enterprise 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 1200, 6, 33),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 34),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Chittagong', 'Dhaka', 1000, 17, 35),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 19, 36),
('Hanif Enterprise 5:30pm Non AC', 'Chittagong', 'Dhaka', 850, 10, 37),
('Saintmartin Travels 8:30pm Volvo AC', 'Dhaka', 'Chittagong', 1400, 26, 38),
('SR 07:30pm Volvo AC', 'Bogura', 'Dhaka', 1100, 20, 39),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 17, 40),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'Chittagong', 'Dhaka', 800, 20, 41),
('Soudia Coach Service 8:30pm Volvo AC', 'Rangpur', 'Dhaka', 900, 25, 42),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 43),
('Hanif Enterprise 11:30pm Non AC', 'Chittagong', 'Rangpur', 1200, 6, 44),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Chittagong', 'Dhaka', 1000, 17, 45),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 10, 46),
('Hanif Enterprise 5:30pm Non AC', 'Rangpur', 'Dhaka', 850, 30, 47),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Sylhet', 'Rangpur', 900, 29, 48),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 19, 49),
('Hanif Enterprise 5:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 10, 50),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Chittagong', 300, 20, 51),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 52),
('Hanif Enterprise 8:30pm Non AC', 'Rangpur', 'Sylhet', 900, 25, 53),
('Saintmartin Travels 8:30pm Volvo AC', 'Rangpur', 'Chittagong', 1400, 26, 55),
('Soudia Coach Service 8:30pm Volvo AC', 'Rangpur', 'Rajshahi', 250, 25, 56),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 57),
('Hanif Enterprise 11:30pm Non AC', 'Chittagong', 'Rajshahi', 1500, 6, 58),
('Tungipara Express 12:30pm Non AC', 'Rajshahi', 'Dhaka', 900, 20, 59),
('Evergreen Transport Ltd 8:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1600, 26, 60),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Rajshahi', 'Dhaka', 1800, 10, 61),
('Hanif Enterprise 5:30pm Non AC', 'Rajshahi', 'Dhaka', 850, 30, 62),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Sylhet', 'Rajshahi', 900, 29, 63),
('Tungipara Express 11:30pm Volvo AC', 'Rajshahi', 'Chittagong', 780, 19, 64),
('Hanif Enterprise 8:30pm Non AC', 'Sylhet', 'Rajshahi', 1200, 25, 65),
('Tungipara Express 8:30pm Non AC', 'Rajshahi', 'Khulna', 450, 5, 66),
('Hanif Enterprise 5:30pm Non AC', 'Bogura', 'Rangamati', 1350, 30, 77),
('Hanif Enterprise 8:30pm Non AC', 'Bogura', 'Sylhet', 900, 25, 97),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 98),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 100),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Bogura', 'Rajshahi', 200, 29, 102),
('SR 8:30am Volvo AC', 'Bogura', 'Dhaka', 1600, 15, 103),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1800, 19, 110),
('Hanif Enterprise 8:30pm Non AC', 'Rajshahi', 'Sylhet', 1200, 25, 120),
('Soudia Coach Service 8:30pm Volvo AC', 'Dhaka', 'Rangamati', 870, 25, 130),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 150),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 17, 160),
('Hanif Enterprise 5:30pm Non AC', 'Rangamati', 'Dhaka', 900, 22, 180),
('Hanif Enterprise 11:30pm AC', 'Dhaka', 'Rangamati', 1900, 25, 190),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1800, 11, 200),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Rajshahi', 'Dhaka', 1800, 10, 220),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Rangamati', 'Rajshahi', 1400, 29, 240),
('Hanif Enterprise 5:30pm Non AC', 'Dhaka', 'Rangamati', 850, 30, 260),
('Tungipara Express 11:30pm Volvo AC', 'Rangamati', 'Chittagong', 250, 19, 270),
('Hanif Enterprise 8:30pm Non AC', 'Sylhet', 'Rangamati', 1000, 20, 280),
('SR 10:30pm AC', 'Dhaka', 'Bogura', 900, 7, 300),
('Hanif Enterprise 8:30pm Non AC', 'Sylhet', 'Bogura', 1000, 20, 400),
('Hanif Enterprise 9:00pm Non AC', 'Dhaka', 'Bogura', 500, 15, 410),
('Hanif Enterprise 5:30pm Non AC', 'Bogura', 'Dhaka', 550, 22, 420),
('Hanif Enterprise 11:30pm AC', 'Dhaka', 'Bogura', 1300, 25, 520),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Bogura', 'Dhaka', 1800, 19, 560),
('Ena Transport (Pvt) Ltd 8:30pm Non AC', 'Rajshahi', 'Khulna', 450, 32, 710),
('Saintmartin Travels 8:30pm Volvo AC', 'Khulna', 'Chittagong', 1600, 26, 720),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Khulna', 1300, 20, 730),
('Soudia Coach Service 8:30pm Volvo AC', 'Dhaka', 'Rangamati', 870, 25, 961),
('SR 10:30pm Volvo AC', 'Bogura', 'Dhaka', 1100, 12, 963),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Bogura', 1300, 20, 990),
('SR 9:30pm Non AC', 'Bogura', 'Dhaka', 550, 15, 1040),
('Saintmartin Travels 8:30pm Volvo AC', 'Khulna', 'Chittagong', 1600, 26, 1170),
('Ena Transport (Pvt) Ltd 8:30pm Non AC', 'Rajshahi', 'Rangamati', 450, 32, 1230),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Bogura', 'Rajshahi', 200, 29, 1450),
('SR 8:30am Volvo AC', 'Dhaka', 'Bogura', 1600, 15, 1590),
('SR 10:30pm Volvo AC', 'Bogura', 'Dhaka', 1100, 12, 1780),
('Ena Transport (Pvt) Ltd 9:30pm Non AC', 'Dhaka', 'Bogura', 1600, 15, 1960),
('Hanif Enterprise 8:30pm Non AC', 'Rangamati', 'Sylhet', 1200, 25, 2110),
('SR 8:30am Non AC', 'Bogura', 'Dhaka', 700, 8, 2350),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Khulna', 1300, 20, 2610),
('Hanif Enterprise 8:30am Non AC', 'Rangamati', 'Dhaka', 780, 15, 2660),
('Ena Transport (Pvt) Ltd 9:30pm Non AC', 'Dhaka', 'Bogura', 600, 25, 3000),
('Hanif Enterprise 8:30am Non AC', 'Rangamati', 'Bogura', 780, 15, 5100),
('Ena Transport (Pvt) Ltd 8:30pm Non AC', 'Rajshahi', 'Bogura', 250, 32, 6410);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `availability_status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `name`, `location`, `availability_status`, `description`, `rating`, `image_path`, `price`) VALUES
(1, 'Hotel Afford Inn', 'Dhaka', 'available', 'Situated in Dhaka, within 1 km of Dhaka Airport Railway Station and 1.9 km of Uttara University, Hotel Afford Inn features accommodation with a shared lounge and free WiFi throughout the property a...', 4.0, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/499234136.jpg?k=c422f957cad5644e6a69fc5891f15ef325f7a120c9e2d171437ecfd18ccba12d&o=&hp=1', 1500.00),
(3, 'Seagull Hotel Ltd', 'Cox\'s Bazar', 'available', 'However, hidden deep in the house is the ultimate in luxury entertainment: a bowling alley! With two lanes, it\'s the perfect place to get competitive and even has a comfortable lounge space and TV screens so you can keep track of who\'s winning. At £2,052 ($2,608) a night, with a minimum stay of four nights, it\'ll be an expensive game of bowling. Facing the beachfront, Seagull Hotel Ltd offers 5-star accommodation in Cox\'s Bazar and has an outdoor swimming pool, garden and shared lounge.', 4.3, 'https://cf.bstatic.com/xdata/images/hotel/square600/490187215.webp?k=d5adb9348953e2990164408dc9b358b857636554a704891dab85d0595e135d58&o=', 2500.00),
(4, 'Hotel Omni Residency Dhaka', 'Dhaka', 'available', 'Situated in Dhaka, 400 metres from Primeasia University, Hotel Omni Residency Dhaka features accommodation with a fitness centre, free private parking, a shared lounge and a terrace.', 4.6, 'https://cf.bstatic.com/xdata/images/hotel/square600/249780871.webp?k=14be59f8b3b6854e2be5c0013c3e586464f132b78d9f4eea71df553af76ff819&o=', 2500.00),
(5, 'Dhaka Regency Hotel & Resort', 'Dhaka', 'available', 'Airport Road Nikunja 2, Dhaka City 1229 Bangladesh. The new-generation business-class hotel closest to the airport! In 15-stories high with over 250,000 sq. ft. of space, The hotel offers 220 luxuriously furnished Guest Rooms and Suites, Multi Cuisine Restaurants, authentic Thai Spa center, Health Club, live entertainment Bar, a Mediterranean Lounge and country’s most beautiful Roof Top Restaurant with Swimming Pool and World Class Venue facilities. ', 4.0, 'https://www.dhakaregency.com/images/home-slider/5.jpg', 4500.00),
(6, 'Hotel Tropical Daisy', 'Dhaka', 'available', '35/A 31/B Road Gulshan-2, Dhaka, Dhaka City 1212 Bangladesh. Situated in the heart of the buzzing capital of Bangladesh, the hotel offers all the amenities of a five-star hotel but for a fraction of the price. The interiors of the hotel as well as its services have been developed with the exclusive idea of making the guests’ stay in Dhaka as enjoyable and productive as possible.', 5.0, 'https://th.bing.com/th/id/OIP.1jai00P_PaZYMJf247VXJgHaDt?rs=1&pid=ImgDetMain', 5500.00),
(7, 'Hotel Sarina Dhaka', 'Dhaka', 'available', '17 Plot #27 Road Banani C/A, Dhaka City 1213 Bangladesh. Located at Banani adjacent to diplomatic enclave and the fast growing commercial area of Gulshan, Baridhara and Banani. Its 15 minutes drive from the Hazrat Shahjalal International Airport. Hotel Sarina Dhaka offers everything that a Business Traveler needs with an exclusive touch of personalized service.', 4.5, 'https://media-cdn.tripadvisor.com/media/photo-s/29/b2/b0/0e/hotel-exterior.jpg', 4000.00),
(8, 'Pan Pacific Sonargaon ', 'Dhaka', 'available', '107 Kazi Nazrul Islam Avenue GPO Box 3595, Dhaka City 1215 Bangladesh. Pan Pacific Sonargaon Dhaka welcomes you with a warm heart to enjoy the typical five-star facilities available; from first class surroundings to world-class hospitality in true Pan Pacific style, right from the airport.', 4.0, 'https://images.trvl-media.com/hotels/1000000/10000/500/476/1c7a0afb_z.jpg', 4200.00),
(9, 'InterContinental Dhaka, an IHG Hotel', 'Dhaka', 'available', '1 Minto Road G, Dhaka City 1000 Bangladesh, Located in the prestigious downtown business district, InterContinental Dhaka is the foremost name in luxury. The hotel boasts a Millennium modern outlook with a touch of local culture. It features 226 luxury rooms and suites, a selection of restaurants offering exquisite gastronomic experiences. Host your events in our state-of-the-art meeting spaces. Our outdoor Temperature-Controlled Swimming Pool, Fitness Centre and The Spa are the perfect destinations for unwinding during your travel.', 5.0, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/29/36/38/12/landscape.jpg?w=700&h=-1&s=1', 6800.00),
(10, 'The Westin Dhaka', 'Dhaka', 'available', 'Main Gulshan Avenue Plot 1 cwn , Road 45, Gulshan 2, Dhaka, Dhaka City 1212 Bangladesh, Relax, revive, and experience renewal at The Westin Dhaka - the five-star hotel in Gulshan, Dhaka, Bangladesh. Nestled in the new business district, we are steps from renowned shopping malls, foreign missions, restaurant, art, private clubs, and multinationals. Refreshing and contemporary, our 241 spacious guest rooms and suites offer modern amenities.', 4.5, 'https://www.hotel-board.com/picture/the-westin-dhaka-hotel-16101083.jpg', 6000.00),
(11, 'Praasad Paradise', 'Cox\'s Bazar', 'available', 'Plot-9 New Beach Road Hotel Motel Zone, Cox\'s Bazar 4700 Bangladesh. Praasad Paradise is a beach front hotel resort providing an ideal mix of value, comfort and convenience, it offers a budget friendly setting with an array of amenities designed for travelers like you. As your “home away from home,” the tower and lodge rooms offer a flat screen TV, air conditioning, and a seating area, and getting online is easy, with free wifi available.', 4.0, 'https://th.bing.com/th/id/R.6a2928967283e2d404bcfdfa39404c4d?rik=%2bodf1kKVcODjoA&pid=ImgRaw&r=0', 3800.00),
(12, 'Orchid Blue', 'Cox\'s Bazar', 'available', 'Marine Drive Road Inani Beach, Cox\'s Bazar 4700 Bangladesh. Excellent location beside Marine drive & sea, healthy environment, neat & clean rooms, safe, near to sea with sea view, well manageable rent with tasty foods.', 5.0, 'https://th.bing.com/th/id/R.b99023bbdb5426e3116bffe9e158d7f5?rik=bkJM00xjX0PyEA&pid=ImgRaw&r=0', 4000.00),
(13, 'Sea Pearl Beach Resort & Spa Cox\'s Bazar', 'Cox\'s Bazar', 'available', 'Jaliapalong, Inani, Ukhia, Cox\'s Bazar 4750 Bangladesh. Majority of our rooms have a sea view with a choice of balcony and kitchenettes. Multiple Food & Beverage venues serving local and international Cuisines.  Kids Zone, Ice Cream Parlor, Gaming Room, Bars, Pool and Snooker Room, Theatre, Amphitheatre, Spa and Wellness Centre. Tennis court and Badminton Courts, The largest destination for your MICE events. Beach Front area with Beach chairs, the largest pools in the country, boasting one even for the ladies.', 4.5, 'https://th.bing.com/th/id/OIP.hi-guZLWSsnXIut2_iX5jgHaE8?rs=1&pid=ImgDetMain', 7000.00),
(14, 'Ocean Paradise Hotel & Resort', 'Cox\'s Bazar', 'available', '28-29 Hotel Motel Zone, Kolatoli Road, Cox\'s Bazar 4700 Bangladesh, Ocean Paradise Hotel & Resort is an excellent choice for travelers visiting Cox\'s Bazar, offering a luxury environment alongside many helpful amenities designed to enhance your stay.', 5.0, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/b1/c9/1b/ocean-paradise-hotel.jpg?w=1200&h=-1&s=1', 7000.00),
(15, 'Sayeman Beach Resort', 'Cox\'s Bazar', 'available', 'After fifty years of glorious past, Sayeman Beach Resort revives its famed legacy of comfort, elegance and impeccable service. An eminent landmark constructed in 1964, this legendary first private hotel of Cox\'s Bazar is reborn, infusing modern sophistication into this vintage-chic, iconic hotel at a new beachfront location of Marine Drive, Kolatoli, Cox\'s Bazar. ', 5.0, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/e1/17/83/the-infinity-pool-on.jpg?w=700&h=-1&s=1', 7500.00),
(16, 'HOTEL PUSHPO BILASH', 'Khulna', 'available', 'Located in Khulna, HOTEL PUSHPO BILASH is connected to the airport. Local points of interest include Divisional Museum, Sixty Dome Mosque, and Bagerhat Museum. Spend some time exploring the area\'s activities, including outlet shopping.', 4.0, 'https://th.bing.com/th/id/OIP.2YgtgDBGvctszUIFEWDT4AAAAA?rs=1&pid=ImgDetMain', 2800.00),
(17, 'Western Inn International', 'Khulna', 'available', 'Western Inn International is located in Khulna. Local points of interest include Divisional Museum, Sixty Dome Mosque, and Bagerhat Museum.', 3.5, 'https://th.bing.com/th/id/R.02f866f39ecb426848ec0288126a0d04?rik=3kxkM2RK74nnXQ&pid=ImgRaw&r=0', 1800.00),
(18, 'Hotel Castle Salam', 'Khulna', 'available', 'Hotel Castle Salam is located in Khulna. Local points of interest include Divisional Museum, Sixty Dome Mosque, and Bagerhat Museum.', 4.0, 'https://cf.bstatic.com/images/hotel/max1280x900/237/237413310.jpg', 2100.00),
(19, 'Bono Nibash Hill Resort\r\n', 'Bandarban', 'available', 'Located in Bandarban, Bono Nibash Hill Resort is in the mountains.', 4.0, 'https://q-xx.bstatic.com/xdata/images/hotel/840x460/420912524.jpg?k=bdd5a8ad7853171fb624a379aa54f41e653896b5f732e84938020ccb58b2924a&o=', 5500.00),
(20, 'Hotel Night Heaven\r\n', 'Bandarban', 'available', 'Located in Bandarban, Hotel Night Heaven is in the mountains. Comfortable hotel with free breakfast and 24-hour front desk.', 4.0, 'https://th.bing.com/th/id/OIP.lllKGhflgIc5-XIVLml4uQHaE8?rs=1&pid=ImgDetMain', 5200.00),
(21, 'Hotel D\'more Bandarban\r\n', 'Bandarban', 'available', 'Hotel in Bandarban with free breakfast and 24-hour front desk. Hotel D\'more Bandarban is located in Bandarban.', 4.0, 'https://bandarban.hoteldmore.com/wp-content/uploads/2022/03/1-1.jpg', 3800.00),
(22, 'Hotel Hill Ambassador\r\n', 'Rangamati', 'available', ' Fishery Ghat, Kathaltoli, Opposite fire service office, 4500 Rāngāmāti, Bangladesh. Hotel Hill Ambassador is located in Rāngāmāti. Each accommodation at the 2-star hotel has city views, and guests can enjoy access to a terrace and to a restaurant. The accommodation provides room service and a 24-hour front desk for guests.\r\n\r\n', 2.5, 'https://q-xx.bstatic.com/xdata/images/hotel/max500/462742781.jpg?k=7a8cf29045349040ee1d7c55a69990de7a49c1d60466191939e2f314946a5777&s=450x450', 3800.00),
(23, 'Hotel Square Park\r\n', 'Rangamati', 'available', ' Doyel Chattar Old Bus Stand, 4500 Rāngāmāti, Bangladesh. Hotel Square Park offers accommodation in Rāngāmāti. Boasting room service, this property also provides guests with a restaurant. The hotel has family rooms.\r\n\r\n', 3.0, 'https://th.bing.com/th/id/OIP.Kbh6Gb5ZLUTdAim11e31uQHaFU?rs=1&pid=ImgDetMain', 3300.00),
(24, 'Hotel Diamond Park\r\n', 'Rangamati', 'available', ' Khaja Super Market,South side of Police Box,, 4000 Chittagong, Bangladesh. Guest rooms in the hotel are fitted with a TV. With a private bathroom equipped with a shower and free toiletries, rooms at Hotel Diamond Park also offer a city view. The nearest airport is Shah Amanat International Airport, 20 km from the accommodation.\r\n\r\n', 3.0, 'https://th.bing.com/th/id/R.69b8e137bdd4a78af6c744f8b09600a8?rik=uCJdZDrCGhtDyw&pid=ImgRaw&r=0', 3200.00),
(25, 'Hotel Regal Palace\r\n', 'Rangamati', 'available', ' Bahaddarhat Bus Terminal Green Plaza Shopping Center, Opposite of Shadhinota Coplex, 4000 Chittagong, Bangladesh', 3.5, 'https://th.bing.com/th/id/OIP.NpbmfX2UOUaGyY1uJ-ODZgHaE-?rs=1&pid=ImgDetMain', 4500.00),
(26, 'Royal Raj Hotel & Condominium\r\n', 'Rajshahi', 'available', 'Comfortable hotel with free breakfast and 24-hour front desk. Located in Rajshahi, Royal Raj Hotel & Condominium is in the city center and in a national park. Varendra Museum and Varendra Research Museum are cultural highlights, and some of the area\'s landmarks include Shrine of Hazrat Shah Mokhdum and Pancharatna Gobinda Mandir. Central Park and Zoo and Shahid Zia Shishu Park are also worth visiting.', 3.5, 'https://th.bing.com/th/id/OIP.-vuzKodsqcKtwZdPbBBi_AHaFj?rs=1&pid=ImgDetMain', 1800.00),
(27, 'Aronno Resort\r\n', 'Rajshahi', 'available', 'Riverfront hotel with free breakfast connected to a shopping center in Rajshahi. \r\n', 3.0, 'https://th.bing.com/th/id/OIP.6GVQ7_WbORbNFKnBqT9HvQHaHu?rs=1&pid=ImgDetMain', 1750.00),
(28, 'Hotel X Rajshahi\r\n', 'Rajshahi', 'available', 'Rajshahi comfortable hotel connected to the airport. Varendra Research Museum and Varendra Museum are cultural highlights, and some of the area\'s landmarks include Shrine of Hazrat Shah Mokhdum and Pancharatna Gobinda Mandir. Central Park and Zoo and Shahid Zia Shishu Park are also worth visiting.\r\n', 3.5, 'https://www.bdbooking.com/upload/property/hotel/thumb/750X560/739/060220220504097396298992948d88.jpg', 2100.00),
(29, 'Grand Park Hotel\r\n', 'Chattogram', 'available', ' Avenue Centre, 787 CDA Avenue, East Nasirabad, Chittagong, 4000 Chittagong, Bangladesh. Grand Park Hotel is located in Chittagong. Featuring a business centre, this property also provides guests with a restaurant. The accommodation provides a 24-hour front desk, airport transfers, room service and free WiFi.\r\n\r\n\r\n', 4.0, 'https://grandparkhotelksa.com/uploads/0000/1/2022/01/01/43ac856c-z-600.png', 3200.00),
(30, 'The Peninsula Chittagong Limited\r\n', 'Chattogram', 'available', ' Bulbul Centre, 486/B, O.R.Nizam Road, CDA Avenue, 4000 Chittagong, Bangladesh. The Peninsula Chittagong Limited is a 4-star property in Port City\'s upscale GEC Circle, a short 5-minute walk from Central Plaza shopping area. An outdoor pool, pampering spa treatments and a well-equipped fitness center are available. There is also a 24-hour front desk and free parking.\r\n', 4.0, 'https://static.readytotrip.com/upload/information_system_24/3/2/8/item_328955/information_items_328955.jpg', 3300.00),
(31, 'Radisson Blu Chattogram Bay View\r\n', 'Chattogram', 'available', ' SS Khaled Road Lalkhan Bazar, Chittagong, Bangladesh, 4000 Chittagong, Bangladesh. \r\nFeaturing a fitness centre, Radisson Blu Chittagong Bay View offers accommodation in Chittagong. Guests can enjoy the on-site multi-cuisine restaurant. Free WiFi is available throughout the property.\r\nRooms come with a flat-screen satellite TV and a seating area for your convenience. All rooms have views of the mountains or city. Every room is equipped with a private bathroom fitted with a shower.\r\nYou will find a 24-hour front desk and concierge desk at the property. Free parking is offered.\r\n', 4.0, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/19/72/cb/d2/exterior.jpg?w=900&h=-1&s=1', 3200.00),
(32, 'Well Park Residence Boutique Hotel & Suites\r\n', 'Chattogram', 'available', ' Plot # 02, Road # 01, O.R. Nizam Road, Chittagong, 4000 Chittagong, Bangladesh. Well Park Residence Boutique Hotel & Suites is located in Chittagong. With a restaurant, the 3-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. There is free private parking and the property provides paid airport shuttle service.\r\n', 4.5, 'https://th.bing.com/th/id/OIP.jr8w9-lDgStjIMyMjQB9wAHaE8?rs=1&pid=ImgDetMain', 3000.00),
(33, 'Hotel Noorjahan Grand', 'Sylhet', 'available', 'Comfortable hotel, walk to Shrine of Hazrat Shah Jalal. Shrine of Hazrat Shah Jalal and Keane Bridge are notable landmarks and Adventure World is a popular area attraction. Shahi Eidgah and Shahjalal University of Science and Technology are two other places to visit that come recommended. It Have  1 outdoor pool on site, Free cabanas and sun loungers available, Pool access: 8:00 AM - 6:00 PM.\r\n', 3.5, 'https://th.bing.com/th/id/R.cf430ce865552af8e0f143871e3daa98?rik=nEySq6UjgZ9N1Q&pid=ImgRaw&r=0', 2000.00),
(34, 'Grand Palace Hotel & Resorts Sylhet\r\n', 'Sylhet', 'available', 'Grand Palace Hotel & Resorts Sylhet is located in Sylhet. Local attractions include Adventure World and Dream Land, and travelers wishing to experience a bit of culture can try Osmani Museum. Luxury hotel with 2 restaurants and full-service spa. \r\n', 4.5, 'https://th.bing.com/th/id/OIP.lAMag8SiDzzeKtfV3EbgPgHaE8?rs=1&pid=ImgDetMain', 3600.00),
(35, 'Holy Inn\r\n', 'Sylhet', 'available', 'Holy Inn is located in Sylhet. Keane Bridge is a local landmark and some of the area\'s attractions include Adventure World and Dream Land. Comfortable hotel with free breakfast and 24-hour front desk\r\n', 3.5, 'https://th.bing.com/th/id/OIP.flj_p72ZNy5IXJt7ueNGjQHaEK?rs=1&pid=ImgDetMain', 1700.00),
(36, 'La Vista Hotel\r\n', 'Sylhet', 'available', 'La Vista Hotel is located in Sylhet. Keane Bridge is a local landmark and some of the area\'s attractions include Adventure World and Dream Land.', 3.5, 'https://th.bing.com/th/id/R.71f4bae4237f79793df53ebadd442304?rik=MmwV8%2fIA8QFDIw&pid=ImgRaw&r=0', 2000.00),
(37, 'Grand Sylhet Hotel & Resort\r\n', 'Sylhet', 'available', 'Located in Sylhet, Grand Sylhet Hotel & Resort is in the suburbs. Local attractions include Adventure World and Dream Land, and travelers wishing to experience a bit of culture can try Osmani Museum.', 5.0, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/364031722.jpg?k=8aab6c073cf508a36aebdc48fa0de1dc2391affb3d91f62cea64eb545bff58ff&o=&hp=1', 5800.00),
(38, 'Hotel Grand Park\r\n', 'Barisal', 'available', 'Hotel Grand Park is located in Barisal. Local points of interest include Planet World Park.', 4.0, 'https://th.bing.com/th/id/OIP.2l18Jfsfgavt3wOMV2ze0wHaE8?rs=1&pid=ImgDetMain', 3200.00),
(39, 'Richmart Resthouse\r\n', 'Barisal', 'available', 'Richmart Resthouse is located in Barisal. Local points of interest include Planet World Park.', 2.5, 'https://th.bing.com/th/id/OIP.yB5Azs_tTgDRjG5hYHWqzwHaEK?rs=1&pid=ImgDetMain', 1100.00),
(40, 'Hotel Charu\r\n', 'Barisal', 'available', 'Hotel Charu is located in Barisal. Local points of interest include Planet World Park.', 3.0, 'https://th.bing.com/th/id/OIP.Xw3qfwNJABMHsCaGSRw89AHaE7?rs=1&pid=ImgDetMain', 1300.00),
(41, 'Momo Inn', 'Bogra', 'available', 'Momo Inn offers accommodation in Bogra. The hotel has a year-round outdoor pool and barbecue, and guests can enjoy a meal at the restaurant', 4.9, 'https://images.trvl-media.com/lodging/32000000/31830000/31828300/31828245/0a0de6db.jpg?impolicy=resizecrop&rw=1200&ra=fit', 3000.00),
(42, 'Red Chillies', 'Bogra', 'available', 'Red Chillies offers accommodation in Bogra. The hotel has a year-round outdoor pool and barbecue, and guests can enjoy a meal at the restaurant', 3.6, 'https://images.trvl-media.com/lodging/32000000/31830000/31828300/31828245/25772b29.jpg?impolicy=resizecrop&rw=1200&ra=fit', 1600.00);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `tour_id` int(11) NOT NULL,
  `tour_Division` varchar(200) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `Place_type` varchar(25) NOT NULL,
  `tour_price` text NOT NULL,
  `tour_image` varchar(255) NOT NULL,
  `tour_register` date DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 3,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`tour_id`, `tour_Division`, `tour_name`, `Place_type`, `tour_price`, `tour_image`, `tour_register`, `rating`, `details`) VALUES
(2, 'Dhaka', 'Lalbag', 'Historical', '2500', './assets/products/d2.jpg', '2023-12-03', 3.5, '1 Days | Dhaka City Sight Seeing Tour Packages'),
(3, 'Rajshahi', 'Behula Lakshindar Basor Ghor', 'Historical', '7500', './assets/products/r1.jpg', '2023-12-03', 3.4, '4 Days / 3 Nights | Heritage Tour / History Tour / Archalogy Tour.'),
(4, 'Khulna', 'Sundarbans', 'Forest', '9500', './assets/products/k1.jpg', '2020-03-28', 4.3, '4 Nights / 3 Days | Trip to Sundarbans - Worlds Largest Mangrove Forest Belt & The Home of Royal Bengal Tiger. World Heritage Tour Itinerary For Nature and Wildlife Lovers'),
(5, 'Dhaka', 'Shahid Minar', 'Historical', '3500', './assets/products/d3.jpg', '2022-12-17', 4.5, '1 Days | Dhaka City Shahid Minar Tour Packages'),
(6, 'Dhaka', 'Jatiyo Sriti Shoudho', 'Historical', '2100', './assets/products/d5.jpg', '2022-12-17', 4.5, '1 Days | Dhaka City Jatiyo Sriti Shoudho Tour Packages'),
(7, 'Dhaka', 'Ahsan Manzil', 'Historical', '2100', './assets/products/d4.jpg', '2022-12-17', 4, '1 Days | Heritage Tour / History Tour / Archalogy Tour.'),
(8, 'Chittagong', 'Cox\'s Bazar Beach', 'SeaBeach', '8500', './assets/products/c1.jpg', '2022-12-17', 5, ' 4 Nights / 3 Days | Visit Inani Beach, Himchhari Falls, coxs bazar sea beach Enjoy Martins Island - watch the memorable sunset'),
(9, 'Chittagong', 'Boga Lake', 'Lake', '7500', './assets/products/c3.jpg', '2022-09-09', 4.5, '3 Days/ 2 Nights | Visit Boga Lake, Nilachal Tour.'),
(10, 'Chittagong', 'Nilachal', 'Hill', '7500', './assets/products/c4.jpg', '2020-03-28', 4, '3 Days/ 2 Nights | Visit Boga Lake, Nilachal Tour.'),
(11, 'Chittagong', 'Saint Martin Island', 'SeaBeach', '9800', './assets/products/c2.jpg', '2020-03-28', 5, ' 4 Nights / 3 Days | St. Martins Island, Saint Martin Coral Island, Chhera Dwip'),
(12, 'Rangpur', 'Kantajew Temple', 'Historical', '8500', './assets/products/ro1.jpg', '2023-01-03', 4.8, '3 Days / 2 Nights | Ramsagar, Kantajew Temple / History Tour / Archalogy Tour'),
(14, 'Chittagong', 'Sajek Valley', 'Hill', '6900', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/09/bd/d1/fc/sajek.jpg?w=800&h=-1&s=1', '2022-12-17', 5, ''),
(15, 'Rangpur', 'Ramsagar', 'PicnicSpot', '5500', './assets/products/ro2.jpg', '2023-01-03', 3.5, '1 Days| Ramsagar, Kantajew Temple / History Tour / Archalogy Tour'),
(16, 'Chittagong', 'kaptai lake', 'Lake', '6500', './assets/products/c6.jpg', '2022-12-22', 4.5, '1 Days | kaptai Lake Tour'),
(17, 'Chittagong', 'Patenga Beach', 'SeaBeach', '7300', './assets/products/c7.jpg', '2022-12-17', 3.5, '2 Days / 1 Nights | Patenga Sea Beach Tour'),
(20, 'Rangpur', 'Vinno Jogot', 'PicnicSpot', '4500', './assets/products/ro3.jpg', '2022-12-17', 3.5, '1 Days | Vinno Jogot Tour'),
(21, 'Rangpur', 'Shopnopuri', 'PicnicSpot', '4500', './assets/products/ro4.jpg', '2022-12-17', 4, '1 Days | Shopnopuri Tour'),
(22, 'Sylhet', 'Bisnakandi', 'Hill', '7800', './assets/products/s1.jpg', '2022-12-17', 4.5, '2 Days / 1 Nights | Bisnakandi, Jafflong Tour'),
(23, 'Sylhet', 'Jaflong', 'Mountain', '11000', './assets/products/s2.jpg', '2022-12-17', 5, '5 Days / 4 Nights | Shrine of Muslim Saints, Tamabil, Jafflong, Madhabkunda Waterfall, Tribe Village, Lawachara Rain Forest. Lemon, Pineapple, Rubber, Tea gardens.'),
(25, 'Sylhet', 'Ratargul Swamp Forest', 'Forest', '4500', './assets/products/s3.jpg', '2022-12-17', 5, '2 Days / 1 Nights | Ratargul Swamp Forest, Tanguar Haor Tour'),
(26, 'Sylhet', 'Tanguar Haor', 'Lake', '8500', './assets/products/s4.jpg', '2022-12-17', 4.5, '2 Days / 1 Nights | Ratargul Swamp Forest, Tanguar Haor Tour'),
(27, 'Rajshahi', 'Paharpur', 'Historical', '15000', './assets/products/r3.jpg', '2022-12-17', 3, '5 Days / 4 Nights | Heritage Tour / History Tour / Archalogy Tour / Buddhist Monastery Tour.'),
(28, 'Rangpur', 'Tajhat Palace', 'PicnicSpot', '10500', './assets/products/r4.jpg', '2022-12-19', 3.5, '5 Days / 4 Nights | Heritage Palace Tour / History Tour / Archalogy Tour.'),
(30, 'Rajshahi', 'Mahasthangarh', 'Historical', '10500', './assets/products/r5.jpg', '2022-12-19', 4, '5 Days / 4 Nights | Heritage Tour / History Tour / Archalogy Tour'),
(31, 'Rajshahi', 'Pancharatna Gobinda Temple', 'Historical', '10500', './assets/products/r2.jpg', '2022-12-19', 3.5, '5 Days / 4 Nights | Heritage Tour / History Tour / Archalogy Tour.'),
(32, 'Khulna', 'Shait-Gumbad Mosque', 'Historical', '15000', './assets/products/k2.jpg', '2022-12-09', 4, '4 Days | Heritage Tour / History Tour / Archalogy Tour.'),
(33, 'Khulna', 'Fakir Lalon Shah\'s Mazaar', 'Historical', '15000', './assets/products/k3.jpg', '2020-03-28', 3.2, '4 Days | Heritage Tour / History Tour / Archalogy Tour.'),
(34, 'Khulna', 'Shilaidaha Kuthibari', 'Historical', '15000', './assets/products/k4.jpg', '2020-03-28', 4, '4 Days | Heritage Tour / History Tour / Archalogy Tour.'),
(35, 'Khulna', 'Sat Gumbad Mosque', 'Historical', '15000', './assets/products/k5.jpg', '2023-12-03', 4, '4 Days | Heritage Tour / History Tour / Archalogy Tour.'),
(36, 'Mymensingh', 'Muktagachha Jomidar Bari', 'PicnicSpot', '7500', 'https://i0.wp.com/www.alonelytraveler.com/wp-content/uploads/2021/12/muktagachha-jomidar-bari1.jpg?w=800&ssl=1', '2023-12-17', 4, '2 Days | Heritage Tour / History Tour / Archalogy Tour.'),
(58, 'Dhaka', 'Sonargaon', 'PicnicSpot', '2500', './assets/products/d1.jpg', NULL, 4, '1 Days | Dhaka Sonargaon Sight Seeing Tour Packages');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `hotel_id`, `check_in_date`, `check_out_date`, `total_price`) VALUES
(39, 95118, 8, '2024-06-28', '2024-06-29', 4200.00),
(40, 7020, 8, '2024-06-28', '2024-06-29', 4200.00),
(41, 95118, 8, '2024-06-28', '2024-06-30', 8400.00),
(42, 95118, 24, '2024-06-28', '2024-06-30', 8400.00),
(43, 7020, 8, '2024-06-28', '2024-06-30', 8400.00),
(44, 95118, 8, '2024-06-28', '2024-06-30', 10920.00),
(45, 95118, 8, '2024-06-28', '2024-07-04', 32760.00),
(46, 96467, 10, '2024-06-26', '2024-06-29', 23400.00),
(47, 763, 9, '2024-06-28', '2024-06-29', 8840.00),
(48, 95118, 9, '2024-06-28', '2024-07-02', 35360.00),
(49, 95118, 9, '2024-06-28', '2024-07-02', 35360.00),
(50, 763, 9, '2024-06-28', '2024-07-02', 27200.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `number` text NOT NULL,
  `Fplace` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verify` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `number`, `Fplace`, `address`, `verification_code`, `is_verify`) VALUES
(55, 'Rakib', 'rakib@gmail.com', 'Rakib@321321', '01767956831', 'Hill', 'Dinajpur', 'b2898ddd', 0),
(737, 'Sofiq', 'abujaforhadi@yahoo.com', 'Jafor@556644', '01713793413', 'SeaBeach', 'West Shewrapara', '325d252b', 0),
(763, 'ismail', 'jafor.203002048@green.ac.bd', '123', '01767606839', 'PicnicSpot', 'Rangpur', '973d42fc', 0),
(1955, 'Rohim', 'rohim123@gmail.com', 'R0him@321', '01303456789', 'Hill', 'Dhaka', '67467b84', 0),
(2311, 'HAdi', 'rihim1aaj@gmail.com', '$2y$10$6H9VXVYQ2FRen8Yjy7jcuudxDb0hpfiYPlXQcONlzrg', '0159358941', 'Forest', 'Gaibandha', 'a71fd411', 0),
(2429, 'Muntajima1', 'muntajima1@gmail.com', '$2y$10$17EQQ8TuCzx2VFt1ojPMOO0os5Krz57agGNbjR6n50N', '0159358942', 'Picnic Spot', 'Dhaka', '5c66f018', 0),
(3153, 'Korim123', 'kori@k.com', 'Jasfjjs321', '01517805017', 'Sea Beach', 'Gaibandha', '09c6c370', 0),
(5229, 'jaforad', 'joy1@gmail.com', '$26$10$mkkczX6DfUQJYTumz.vmLOWEzvFHu2B01V4Qj9ctbqk', '01351356785', 'Forest', 'West Shewrapara', 'fade4675', 0),
(7020, 'Muntajima', 'muntajima@gmail.com', '$2y$10$mkkczX6DfUQJYTumz.vmLOWEzvFHu2B01V4Qj9ctbqk', '0159358942', 'Mountain', 'Dhaka', '0ed22149', 0),
(7472, 'Korim1235', 'kori1@k.com', 'J@f0r@123', '01517805017', 'Hill', 'Gaibandha', 'f0977f21', 0),
(16315, 'rohim32', 'sphillips@gmail.com', '$6132jca)czX6DfUQJYTumz.vmLOWEzvFHu2B01V4Qj9ctbqk', '01648569632', 'Historical', 'Dhaka', '4a8de781', 0),
(58747, 'ABUJAFO', 'abdulhadi.me.2010@gmail.com', '$2y$10$XJJN/bb8zf81Q/MRqUg0zuS0DKyATtxbhD60uCdKs7U', '0176760683', 'SeaBeach', 'Dhaka', '2d905ba1', 0),
(70696, 'ABU', 'abu@gmail.com', '$2y$10$mkkczXgsjhgagyuyYvFHu2B01V4Qj9ctbqk', '0159358966', 'Mountain', 'Sandorbon', '0ed22149', 0),
(86122, 'jafor556622', 'abdulhadi.m11e.2010@gmail.com', 'Jafor@332211', '01776606839', 'PicnicSpot', 'AAAA', '48ab2822', 0),
(95118, 'jafor', 'abujahadi1@gmail.com', '123', '01767766339', 'Hill', 'Mirpur', '839003e3ca2f194081968fc9c8de7a', 1),
(96467, 'AbuJaforHadi', 'abujaforhadi22@gmail.com', 'J@f0r@332211', '01767606839', 'PicnicSpot', 'Rangpur', '84d6278f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `blog_table`
--
ALTER TABLE `blog_table`
  ADD PRIMARY KEY (`topic_title`),
  ADD UNIQUE KEY `topic_title` (`topic_title`);

--
-- Indexes for table `booking_bus`
--
ALTER TABLE `booking_bus`
  ADD PRIMARY KEY (`bookingBus_id`),
  ADD KEY `booking_bus_ibfk_1` (`user_id`),
  ADD KEY `booking_bus_ibfk_2` (`Bus_id`);

--
-- Indexes for table `booking_tour`
--
ALTER TABLE `booking_tour`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bus_details`
--
ALTER TABLE `bus_details`
  ADD PRIMARY KEY (`Bus_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `foreign_key_user_id` (`user_id`),
  ADD KEY `foreign_key_home_id` (`hotel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tour`
--
ALTER TABLE `booking_tour`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_bus`
--
ALTER TABLE `booking_bus`
  ADD CONSTRAINT `booking_bus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `booking_bus_ibfk_2` FOREIGN KEY (`Bus_id`) REFERENCES `bus_details` (`Bus_id`);

--
-- Constraints for table `booking_tour`
--
ALTER TABLE `booking_tour`
  ADD CONSTRAINT `booking_tour_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `place` (`tour_id`),
  ADD CONSTRAINT `booking_tour_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `foreign_key_home_id` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `foreign_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
