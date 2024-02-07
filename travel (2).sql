-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 12:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
(1, 'admin', 'admin');

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
('Ahsan Manzil', '2023-12-15', 'Admin', 3, 3, 1200, '1-ahsan-manzil.jpg', 'Visited this place as I was in Dhaka, ashan manzil is very famous in Dhaka, view of the river buri Ganga.'),
('Kaptai Lake', '2023-12-23', 'Jafor', 3, 3, 5200, 'kap.jpg', 'One of the best artificial manmade lake in Bangladesh at Rangamati. Hire a boat'),
('Padma Bridge Mawa', '2023-12-22', 'Sojib', 1, 15, 5000, 'podma.jpeg', 'The largest bridge South Asia is located in Munshiganj, Dhaka, Bangladesh.'),
('Patenga Beach', '2023-12-25', 'Admin', 1, 10, 10000, 'pot.jpg', 'It’s a very scenic beach the end of Chattogram city. Very good road communication.'),
('Sajek Valley', '2023-12-22', 'Hadi', 2, 5, 25100, 'sajek.jpg', 'Sajek isunion at Baghaichari Upazila in Rangamati.\nyou have to came Kahgrachori first and than you have to hire jeep to go there'),
('Sundarbans', '2023-12-13', 'Joy', 4, 3, 21000, 'Sundarban-Safari-990x490.jpg', 'Sundarbans, The largest mangrove forest in the world which is the home of the most beautiful tiger in the world - the Royal Bengal Tiger - lies on the delta of the Ganges, Brahmaputra, and Meghna rivers on the Bay of Bengal. ');

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE `bus_details` (
  `bus_name` text NOT NULL,
  `source` text NOT NULL,
  `destination` text NOT NULL,
  `fare` int(50) NOT NULL,
  `seats_available` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`bus_name`, `source`, `destination`, `fare`, `seats_available`) VALUES
('Saintmartin Hyundai 8:30am Volvo AC', 'Khagrachari', 'Dhaka', 1600, 9),
('Hanif Enterprise 9:30pm Non AC', 'Khagrachari', 'Dhaka', 750, 10),
('Saintmartin Hyundai 8:30pm Volvo AC', 'Khagrachari', 'Dhaka', 1600, 20),
('Hanif Enterprise 2:30pm Non AC', 'Khagrachari', 'Dhaka', 750, 18),
('Saintmartin Hyundai 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 15),
('Hanif Enterprise 9:30pm Non AC', 'Dhaka', 'Khagrachari', 750, 10),
('Saintmartin Hyundai 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 20),
('Hanif Enterprise 2:30pm Non AC', 'Dhaka', 'Khagrachari', 750, 18),
('Ena Transport (Pvt) Ltd 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 19),
('Hanif Enterprise 9:30pm Non AC', 'Dhaka', 'Khagrachari', 750, 10),
('Evergreen Transport Ltd 8:30pm Volvo AC', 'Dhaka', 'Khagrachari', 1600, 26),
('Ena Transport (Pvt) Ltd 2:30pm Non AC', 'Dhaka', 'Khagrachari', 750, 20),
('Ena Transport (Pvt) Ltd 8:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1800, 19),
('Hanif Enterprise 9:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 10),
('Hanif Enterprise 11:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1600, 26),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 14),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1800, 18),
('Hanif Enterprise 5:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 10),
('Evergreen Transport Ltd 8:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1600, 26),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'Dhaka', 'CoxsBazar', 1100, 20),
('Ena Transport (Pvt) Ltd 8:30pm Volvo AC', 'CoxsBazar', 'Dhaka', 1800, 19),
('Hanif Enterprise 9:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 10),
('Hanif Enterprise 11:30pm Volvo AC', 'CoxsBazar', 'Dhaka', 1600, 26),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 14),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'CoxsBazar', 'Dhaka', 1800, 18),
('Hanif Enterprise 5:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 10),
('Evergreen Transport Ltd 8:30pm Volvo AC', 'Dhaka', 'CoxsBazar', 1600, 26),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Dhaka', 1100, 20),
('Soudia Coach Service 8:30pm Volvo AC', 'Chittagong', 'Dhaka', 900, 25),
('Hanif Enterprise 9:30pm Non AC', 'Chittagong', 'Dhaka', 750, 9),
('Hanif Enterprise 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 1200, 6),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Chittagong', 'Dhaka', 1000, 14),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 18),
('Hanif Enterprise 5:30pm Non AC', 'Chittagong', 'Dhaka', 850, 10),
('Saintmartin Travels 8:30pm Volvo AC', 'Dhaka', 'Chittagong', 1400, 25),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'Chittagong', 'Dhaka', 800, 20),
('Soudia Coach Service 8:30pm Volvo AC', 'Chittagong', 'Dhaka', 900, 25),
('Hanif Enterprise 9:30pm Non AC', 'Chittagong', 'Dhaka', 750, 9),
('Hanif Enterprise 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 1200, 6),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Chittagong', 'Dhaka', 1000, 14),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 18),
('Hanif Enterprise 5:30pm Non AC', 'Chittagong', 'Dhaka', 850, 10),
('Saintmartin Travels 8:30pm Volvo AC', 'Dhaka', 'Chittagong', 1400, 25),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'Chittagong', 'Dhaka', 800, 20),
('Soudia Coach Service 8:30pm Volvo AC', 'Rangpur', 'Dhaka', 900, 25),
('Hanif Enterprise 9:30pm Non AC', 'Chittagong', 'CoxsBazar', 350, 15),
('Hanif Enterprise 11:30pm Non AC', 'Chittagong', 'Rangpur', 1200, 6),
('Ena Transport (Pvt) Ltd 12:30pm Non AC', 'Chittagong', 'Dhaka', 1000, 14),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 9),
('Hanif Enterprise 5:30pm Non AC', 'Rangpur', 'Dhaka', 850, 30),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Sylhet', 'Rangpur', 900, 29),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Chittagong', 'Dhaka', 780, 18),
('Saintmartin Travels 8:30pm Volvo AC', 'Rangpur', 'Chittagong', 1400, 25),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Chittagong', 300, 20),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1600, 15),
('Hanif Enterprise 8:30pm Non AC', 'Rangpur', 'Sylhet', 900, 25),
('Soudia Coach Service 8:30pm Volvo AC', 'Rangpur', 'Rajshahi', 250, 25),
('Hanif Enterprise 9:30pm Non AC', 'Rajshahi', 'CoxsBazar', 1700, 15),
('Hanif Enterprise 11:30pm Non AC', 'Chittagong', 'Rajshahi', 1500, 6),
('Tungipara Express 12:30pm Non AC', 'Rajshahi', 'Dhaka', 900, 20),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Rajshahi', 'Dhaka', 1800, 9),
('Hanif Enterprise 5:30pm Non AC', 'Rajshahi', 'Dhaka', 850, 30),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Sylhet', 'Rajshahi', 900, 29),
('Tungipara Express 11:30pm Volvo AC', 'Rajshahi', 'Chittagong', 780, 19),
('Hanif Enterprise 8:30pm Non AC', 'Sylhet', 'Rajshahi', 1200, 25),
('Tungipara Express 8:30pm Non AC', 'Rajshahi', 'Khulna', 450, 5),
('Ena Transport (Pvt) Ltd 8:30pm Non AC', 'Rajshahi', 'Khulna', 450, 32),
('Saintmartin Travels 8:30pm Volvo AC', 'Khulna', 'Chittagong', 1600, 25),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Khulna', 1300, 20),
('Hanif Enterprise 9:30pm Non AC', 'Rangpur', 'CoxsBazar', 1600, 15),
('Hanif Enterprise 8:30pm Non AC', 'Rajshahi', 'Sylhet', 1200, 25),
('Soudia Coach Service 8:30pm Volvo AC', 'Dhaka', 'Rangamati', 870, 25),
('Hanif Enterprise 9:30pm Non AC', 'Rajshahi', 'Rangamati', 1700, 15),
('Hanif Enterprise 11:30pm AC', 'Dhaka', 'Rangamati', 1900, 25),
('Hanif Enterprise 5:30pm Non AC', 'Rangamati', 'Dhaka', 900, 22),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Rajshahi', 'Dhaka', 1800, 9),
('Hanif Enterprise 5:30pm Non AC', 'Dhaka', 'Rangamati', 850, 30),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Rangamati', 'Rajshahi', 1400, 29),
('Tungipara Express 11:30pm Volvo AC', 'Rangamati', 'Chittagong', 250, 19),
('Hanif Enterprise 8:30pm Non AC', 'Sylhet', 'Rangamati', 1000, 20),
('Hanif Enterprise 8:30am Non AC', 'Rangamati', 'Dhaka', 780, 15),
('Ena Transport (Pvt) Ltd 8:30pm Non AC', 'Rajshahi', 'Rangamati', 450, 32),
('Saintmartin Travels 8:30pm Volvo AC', 'Khulna', 'Chittagong', 1600, 25),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Khulna', 1300, 20),
('Hanif Enterprise 9:30pm Non AC', 'Rangamati', 'CoxsBazar', 1600, 15),
('Hanif Enterprise 8:30pm Non AC', 'Rangamati', 'Sylhet', 1200, 25),
('Soudia Coach Service 8:30pm Volvo AC', 'Dhaka', 'Rangamati', 870, 25),
('Hanif Enterprise 9:00pm Non AC', 'Dhaka', 'Bogura', 500, 15),
('Hanif Enterprise 11:30pm AC', 'Dhaka', 'Bogura', 1300, 25),
('Hanif Enterprise 5:30pm Non AC', 'Bogura', 'Dhaka', 550, 22),
('Ena Transport (Pvt) Ltd 11:30pm Volvo AC', 'Bogura', 'Dhaka', 1800, 18),
('Hanif Enterprise 5:30pm Non AC', 'Bogura', 'Rangamati', 1350, 30),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Bogura', 'Rajshahi', 200, 29),
('SR 8:30am Volvo AC', 'Bogura', 'Dhaka', 1600, 15),
('SR 9:30pm Non AC', 'Bogura', 'Dhaka', 550, 15),
('SR 10:30pm Volvo AC', 'Bogura', 'Dhaka', 1300, 10),
('SR 8:30am Non AC', 'Bogura', 'Dhaka', 600, 5),
('SR 9:30pm Non AC', 'Bogura', 'Dhaka', 700, 25),
('SR 10:30pm Volvo AC', 'Bogura', 'Dhaka', 1100, 3),
('Ena Transport (Pvt) Ltd 6:30pm Volvo AC', 'Bogura', 'Rajshahi', 200, 29),
('SR 8:30am Volvo AC', 'Dhaka', 'Bogura', 1600, 15),
('Ena Transport (Pvt) Ltd 9:30pm Non AC', 'Dhaka', 'Bogura', 1600, 15),
('SR 10:30pm Volvo AC', 'Dhaka', 'Bogura', 1300, 10),
('SR 8:30am Non AC', 'Bogura', 'Dhaka', 700, 5),
('Ena Transport (Pvt) Ltd 9:30pm Non AC', 'Dhaka', 'Bogura', 600, 25),
('SR 10:30pm AC', 'Dhaka', 'Bogura', 900, 7),
('Hanif Enterprise 8:30pm Non AC', 'Sylhet', 'Bogura', 1000, 20),
('Hanif Enterprise 8:30am Non AC', 'Rangamati', 'Bogura', 780, 15),
('Ena Transport (Pvt) Ltd 8:30pm Non AC', 'Rajshahi', 'Bogura', 250, 32),
('Ena Transport (Pvt) Ltd 7:30pm Non AC', 'CoxsBazar', 'Bogura', 1300, 20),
('Hanif Enterprise 9:30pm Non AC', 'Rangamati', 'Bogura', 1600, 15),
('Hanif Enterprise 8:30pm Non AC', 'Bogura', 'Sylhet', 900, 25);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(37, 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `availability_status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `name`, `location`, `availability_status`, `description`, `rating`, `image_path`, `price`) VALUES
(1, 'Hotel Afford Inn', 'Dhaka', 'not_available', 'Situated in Dhaka, within 1 km of Dhaka Airport Railway Station and 1.9 km of Uttara University, Hotel Afford Inn features accommodation with a shared lounge and free WiFi throughout the property a...', 4.0, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/499234136.jpg?k=c422f957cad5644e6a69fc5891f15ef325f7a120c9e2d171437ecfd18ccba12d&o=&hp=1', 1500.00),
(2, 'Hotel Omni Residency Dhaka', 'Dhaka', 'available', 'Situated in Dhaka, 400 metres from Primeasia University, Hotel Omni Residency Dhaka features accommodation with a fitness centre, free private parking, a shared lounge and a terrace.', 4.2, 'https://cf.bstatic.com/xdata/images/hotel/square600/249780871.webp?k=14be59f8b3b6854e2be5c0013c3e586464f132b78d9f4eea71df553af76ff819&o=', 2500.00),
(3, 'Seagull Hotel Ltd', 'Cox\'s Bazar', 'available', 'However, hidden deep in the house is the ultimate in luxury entertainment: a bowling alley! With two lanes, it\'s the perfect place to get competitive and even has a comfortable lounge space and TV screens so you can keep track of who\'s winning. At £2,052 ($2,608) a night, with a minimum stay of four nights, it\'ll be an expensive game of bowling. Facing the beachfront, Seagull Hotel Ltd offers 5-star accommodation in Cox\'s Bazar and has an outdoor swimming pool, garden and shared lounge.', 4.3, 'https://cf.bstatic.com/xdata/images/hotel/square600/490187215.webp?k=d5adb9348953e2990164408dc9b358b857636554a704891dab85d0595e135d58&o=', 2500.00),
(4, 'Hotel Omni Residency Dhaka', 'Dhaka', 'not_available', 'Situated in Dhaka, 400 metres from Primeasia University, Hotel Omni Residency Dhaka features accommodation with a fitness centre, free private parking, a shared lounge and a terrace.', 4.6, 'https://cf.bstatic.com/xdata/images/hotel/square600/249780871.webp?k=14be59f8b3b6854e2be5c0013c3e586464f132b78d9f4eea71df553af76ff819&o=', 2500.00),
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
(29, 'Grand Park Hotel\r\n', 'Chattogram', 'not_available', ' Avenue Centre, 787 CDA Avenue, East Nasirabad, Chittagong, 4000 Chittagong, Bangladesh. Grand Park Hotel is located in Chittagong. Featuring a business centre, this property also provides guests with a restaurant. The accommodation provides a 24-hour front desk, airport transfers, room service and free WiFi.\r\n\r\n\r\n', 4.0, 'https://grandparkhotelksa.com/uploads/0000/1/2022/01/01/43ac856c-z-600.png', 3200.00),
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` text NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Dhaka', 'Sonargaon', '750', './assets/products/d1.jpg', NULL),
(2, 'Dhaka', 'Lalbag', '700', './assets/products/d2.jpg', '2023-12-03'),
(3, 'Rajshahi', 'Behula Lakshindar Basor Ghor', '1300', './assets/products/r1.jpg', '2023-12-03'),
(4, 'Khulna', 'Sundarbans', '7000', './assets/products/k1.jpg', '2020-03-28'),
(5, 'Dhaka', 'Shahid Minar', '600', './assets/products/d3.jpg', '2022-12-17'),
(6, 'Dhaka', 'Jatiyo Sriti Shoudho', '500', './assets/products/d5.jpg', '2022-12-17'),
(7, 'Dhaka', 'Ahsan Manzil', '500', './assets/products/d4.jpg', '2022-12-17'),
(8, 'Chittagong', 'Cox\'s Bazar Beach', '3500', './assets/products/c1.jpg', '2022-12-17'),
(9, 'Chittagong', 'Boga Lake', '2500', './assets/products/c3.jpg', '2022-09-09'),
(10, 'Chittagong', 'Nilachal', '3000', './assets/products/c4.jpg', '2020-03-28'),
(11, 'Chittagong', 'Saint Martin Island', '6800', './assets/products/c2.jpg', '2020-03-28'),
(12, 'Rangpur', 'Kantajew Temple', '1800', './assets/products/ro1.jpg', '2023-01-03'),
(14, 'Chittagong', 'Sajek Valley', '3900', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/09/bd/d1/fc/sajek.jpg?w=800&h=-1&s=1', '2022-12-17'),
(15, 'Rangpur', 'Ramsagar', '2100', './assets/products/ro2.jpg', '2023-01-03'),
(16, 'Chittagong', 'kaptai lake', '2700', './assets/products/c6.jpg', '2022-12-22'),
(17, 'Chittagong', 'Patenga Beach', '2300', './assets/products/c7.jpg', '2022-12-17'),
(20, 'Rangpur', 'vinno jogot', '1900', './assets/products/ro3.jpg', '2022-12-17'),
(21, 'Rangpur', 'Shopnopuri', '1900', './assets/products/ro4.jpg', '2022-12-17'),
(22, 'Sylhet', 'Bisnakandi', '2350', './assets/products/s1.jpg', '2022-12-17'),
(23, 'Sylhet', 'Jaflong', '2350', './assets/products/s2.jpg', '2022-12-17'),
(25, 'Sylhet', 'Ratargul Swamp Forest', '2750', './assets/products/s3.jpg', '2022-12-17'),
(26, 'Sylhet', 'Tanguar Haor', '2550', './assets/products/s4.jpg', '2022-12-17'),
(27, 'Rajshahi', 'Paharpur', '2600', './assets/products/r3.jpg', '2022-12-17'),
(28, 'Rajshahi', 'Tajhat Palace', '1960', './assets/products/r4.jpg', '2022-12-19'),
(29, 'Rajshahi', 'Varendra Research Museum', '1950', './assets/products/r6.jpg', '2022-12-19'),
(30, 'Rajshahi', 'Mahasthangarh', '1390', './assets/products/r5.jpg', '2022-12-19'),
(31, 'Rajshahi', 'Pancharatna Gobinda Temple', '1700', './assets/products/r2.jpg', '2022-12-19'),
(32, 'Khulna', 'Shait-Gumbad Mosque', '2750', './assets/products/k2.jpg', '2022-12-09'),
(33, 'Khulna', 'Fakir Lalon Shah\'s Mazaar', '2950', './assets/products/k3.jpg', '2020-03-28'),
(34, 'Khulna', 'Shilaidaha Kuthibari', '2670', './assets/products/k4.jpg', '2020-03-28'),
(35, 'Khulna', 'Sat Gumbad Mosque', '2800', './assets/products/k5.jpg', '2023-12-03'),
(36, 'Mymensingh', 'Muktagachha Jomidar Bari', '1750', 'https://i0.wp.com/www.alonelytraveler.com/wp-content/uploads/2021/12/muktagachha-jomidar-bari1.jpg?w=800&ssl=1', '2023-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `home_id` int(255) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `home_id`, `check_in_date`, `check_out_date`, `total_price`) VALUES
(8, 95118, 1, '2024-01-12', '2024-01-16', 6000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `number` text NOT NULL,
  `nid` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verify` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `number`, `nid`, `address`, `verification_code`, `is_verify`) VALUES
(1955, 'Rohim', 'rohim123@gmail.com', 'R0him@321', '01303456789', 2147483647, 'Dhaka', '67467b84', 0),
(5293, 'ismail', 'joy1@gmail.com', '@A1234567hf', '01310323085', 2147483647, 'West Shewrapara', 'fade4675', 0),
(39525, 'Sojib', 'sphillips@utm.edu', 'A@321asdf', '01648569632', 2147483647, 'Dhaka', '66310c89', 0),
(58157, 'jafor1', 'abuja2forhadi@gmail.com', 'a!ASSD32155', '01303744717', 2147483647, 'House-470/2/A,Flat # 6-B, Mirpur,Sher-E-Bangla Nag', '06b0acee', 0),
(80373, 'Joy Pal', 'joy@gmail.com', '#12Abjoypal', '01310323085', 2147483647, 'West Shewrapara', '2d1dc7ae', 0),
(95118, 'jafor', 'abujaforhadi1@gmail.com', '123', '203002048', 2147483647, 'House-470/2/A,Flat # 6-B, Mirpur,Sher-E-Bangla Nag', '839003e3ca2f194081968fc9c8de7a', 1);

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`cart_id`, `user_id`, `item_id`) VALUES
(29, 1, 11);

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
  ADD PRIMARY KEY (`topic_title`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `foreign_key_user_id` (`user_id`),
  ADD KEY `foreign_key_home_id` (`home_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `foreign_key_home_id` FOREIGN KEY (`home_id`) REFERENCES `home` (`home_id`),
  ADD CONSTRAINT `foreign_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
