-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 08:09 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hid` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `dis` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hid`, `name`, `image`, `address`, `contact`, `info`, `dis`) VALUES
('101', 'Nanavati Hospital', '11.jpg', '1877, Doctor Anandrao Nair Marg,\r\nNear Agripada Police Station,\r\nMumbai Central East, Mumbai 400011', '5555555555', 'This iconic hospital was inaugurated by Pt. Jawaharlal Nehru in the year 1950. With over 6 decades of dedicated health care services, Dr. Balabhai Nanavati Hospital in Mumbai has created a niche for itself; both nationally and internationally for provision of exemplary medical facilities and treatments.', 'Diabetes'),
('102', 'SevenHills Hospital', '12.jpg', 'SevenHills Health City, Marol Maroshi Road,\r\nAndheri East, Mumbai - 400059', '7894561236', 'With a strong focus on comprehensive health care for patients, the SevenHills Hospital in Mumbai has made its mark felt in the medical domain with high class infrastructure and hi-tech equipments along with a strong workforce comprising of doctors, nursing and support staff.', 'Cancer'),
('103', 'Fortis C-DOC Hospital', 'ho1.jpg', 'Fortis C-Doc Hospital\r\nChirag Enclave, B-16,\r\nOpp. Devika Tower', '789456123', 'Fortis C-DOC Hospital is recognized for the department of Diabetes Care, Endocrinology and Metabolic Diseases all over India. There are various diabetes speciality clinics pertaining to different ailments related to the disease for helping patients deal with disorders. This hospital conducts workshops and therapy sessions for diabetics post treatment as well.', 'Cancer,Diabetes'),
('104', 'S.L. Raheja Hospital', 'ho2.jpg', 'S L Raheja Hospital\r\n1A, Raheja Rugnalaya Marg,\r\nMahim West, Mumbai - 400016', '9874563214', 'S.L. Raheja Hospital is a known name in the health-care industry because of the diverse fields like Diabetes and Diabetes Foot Surgery it caters to. These centers of excellence provide benchmarked standards of services and facilities to the patients situated across the nation and worldwide. Advanced diagnostic procedures are available to learn about different health conditions caused as a result of diabetes.', 'Cancer,Diabetes'),
('105', 'Apollo Hospital', 'ho3.jpg', 'Apollo Hospital\r\nNo.21, Greams Lane,\r\nOff Greams Road,\r\nChennai, Tamil Nadu - 600006', '9856321478', 'The Diabetology and Endocrinology centers at Apollo Hospital, Greams Road is one of the preferred destinations for diabetic patients in India. The clinical and surgical department follows quality standards in all its treatment measures. These centers are designed with latest technology and interventional tools to meet the diagnostic and therapeutic needs of its patients.', 'Cancer,Diabetes'),
('106', 'Indraprastha Apollo Hospital', 'ho4.jpg', 'Sarita Vihar, Delhi Mathura Road,\r\nNew Delhi - 110076, INDIA', '9562387412', 'Comprehensive care and treatments along with proper facilities for diagnosis of diabetes related issues is a benchmark for Indraprastha Apollo Hospital in Delhi. All type of diabetes patients are treated with care and compassion here. The hospital provides best infrastructure facilities and uses latest technology for treatments.', 'Diabetes,Cancer'),
('107', 'Manipal Hospital', 'ho4.jpg', 'Manipal Hospital\r\n98, HAL Airport Road,\r\nBangalore, Karnataka - 560017', '985472314', 'Manipal Hospital, HAL Road comprises of exclusive unit of diabetes, endocrinology and metabolic diseases serving quality health-care across the country. These departments are committed to early diagnosis and evidence based management of all types of diabetes disorders. Short-term and long-term complications associated with diabetes are treated using state-of-art therapeutic and diagnostic facilities.', 'Cancer,Diabetes'),
('108', 'Global Hospital', 'ho6.jpg', 'Global Hospital\r\n35, Dr. E Borges Road,\r\nOpp. Shirodkar High School,\r\nHospital Lane, Wadi Bandar,\r\nParel, Mumbai, Maharashtra - 400010', '8945621542', 'The strong team of hand picked diabetes experts and endocrinologist at Global Hospital, Mumbai ensure finest quality care to patients suffering from diabetes and associated metabolic diseases. This institute has set up a name among the top positions in our country for its diabetes care and treatments. The hospital offers advanced endoscopic procedures to treat major ailments caused due to diabetes.', 'Diabetes,Cancer');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cont` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `id` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `email`, `cont`, `address`, `id`, `pass`) VALUES
('John', 'john@gmail.com', '7234567896', 'Mumbai', '101', '101'),
('bolofinde', 'bolofbaba@gmail.com', '8322452388', 'addr', 'bolof2000', 'Dammy2k100'),
('dffs', 'das@gmail.com', 'sda', 'addr', 'sda', 'sdas');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `uid` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `pnames` varchar(1000) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`uid`, `name`, `pnames`, `price`) VALUES
('101', 'John', 'Samsung, Samsung Galaxy Grand Max 64GB, ', '10010'),
('101', 'John', 'Apple', '100'),
('101', 'John', 'Strawberries', '100'),
('101', 'John', 'Aloe Vera, Apple, Kiwi, Strawberries, Dragon Fruit, Papaya, Guava, Start Fruit, Black Berries, Grapes, BillBeries, Gymnema Sylvestre, Cinnamon, Cloves, Rosemary, Oregano, Sage, ', '1770'),
('101', 'John', 'Aloe Vera, Apple, Kiwi, Strawberries, Dragon Fruit, Papaya, Guava, Start Fruit, Black Berries, Grapes, BillBeries, Gymnema Sylvestre, Cinnamon, Cloves, Rosemary, Oregano, Sage, ', '1770'),
('101', 'John', 'Apple', '100'),
('101', 'John', 'Strawberries, Kiwi, ', '200'),
('101', 'John', 'Strawberries, Kiwi, ', '200'),
('101', 'John', 'Kiwi, Gymnema Sylvestre, ', '220'),
('101', 'John', 'Kiwi, Gymnema Sylvestre, ', '220'),
('101', 'John', 'Kiwi, Gymnema Sylvestre, ', '220'),
('101', 'John', 'Apple, Strawberries, ', '200'),
('101', 'John', 'Apple', '100'),
('101', 'John', 'Strawberries', '100'),
('bolof2000', 'bolofinde', 'Apple', '100'),
('bolof2000', 'bolofinde', 'Apple, Guava, ', '150'),
('bolof2000', 'bolofinde', 'Strawberries', '100');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `catg` varchar(50) NOT NULL,
  `desc1` varchar(5000) NOT NULL,
  `price` int(20) NOT NULL,
  `diseases` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `catg`, `desc1`, `price`, `diseases`) VALUES
(101, 'Aloe Vera', 'h1.jpg', 'Herbs', 'Aloe vera is a product of the prickly but succulent aloe vera plant, which has been used in herbal medicine for thousands of years due to its healing, rejuvenating and soothing properties.', 100, 'Diabetes,Cancer'),
(102, 'Apple', 'f1.png', 'Fruits', 'The apple tree is a deciduous tree in the rose family best known for its sweet, pomaceous fruit, the apple. It is cultivated worldwide as a fruit tree, and is the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 100, 'Diabetes'),
(103, 'Kiwi', 'f3.jpg', 'Fruits', 'Description about Kiwi', 100, 'Cancer'),
(104, 'Strawberries', 'f2.jpg', 'Fruits', 'Description about strawberries', 100, 'Diabetes,Cancer'),
(105, 'Dragon Fruit', 'f4.jpg', 'Fruits', 'Food & Drinks7 Amazing Dragon Fruit Benefits: The Antioxidant & Vitamin Powerhouse\r\n7 Amazing Dragon Fruit Benefits: The Antioxidant & Vitamin PowerhousePlavaneeta Borah , NDTV  |  Updated: August 28, 2017 09:51 ISTTweeterfacebookGoogle Plus Reddit\r\n7 Amazing Dragon Fruit Benefits: The Antioxidant & Vitamin Powerhouse\r\nThe bright pink fruit with its scaly outer looks exotic no doubt, and probably this is the reason why it dons a mystical name – dragon fruit. Belonging to the cactus family.', 150, 'Cancer,Dengue,Jaundice,Diabetes'),
(106, 'Papaya', 'f6.jpg', 'Fruits', 'Papaya is a mainstay on tropical buffets in exotic locations. You don\'t have to cruise to the Bahamas to enjoy one, though. Choose one from your supermarket that\'s ripe and ready to eat.', 80, 'Diabetes,Skin,Cancer'),
(107, 'Guava', 'f7.jpg', 'Fruits', 'Guavas are a part of the myrtle family, meaning they’re related to spices like cinnamon, nutmeg, and cloves. Try pairing guavas with those spices to bring out the flavour of both ingredients.', 50, 'Diabetes,Cancer'),
(108, 'Start Fruit', 'f8.jpg', 'Fruits', 'This special dessert recipe is beautiful to serve, plus easy to make and healthy too! It starts with slices of fresh star fruit (instructions on how to buy and prepare star fruit are included). Star fruit is similar in texture and taste to apples, and while it can be eaten fresh, in this recipe the star fruit slices are lightly cooked and then given a tropical-tasting mango-orange sauce. ', 120, 'Diabetes'),
(109, 'Black Berries', 'f9.jpg', 'Fruits', 'Wish Farms blackberries are the newest addition to our berry family.  Conventional and organic blackberries are available year round establishing the perfect complement to our strawberry and blueberry programs.  Blackberry growing regions include Florida, Georgia, North Carolina and Mexico.', 100, 'Diabetes'),
(110, 'Grapes', 'f10.jpg', 'Fruits', 'Grapes come in different colors and forms. There are red, green, and purple grapes, seedless grapes, grape jelly, grape jam and grape juice, raisins, currents, and sultanas, not to mention wine.', 120, 'Diabetes'),
(111, 'BillBeries', 'h2.jpg', 'Herbs', 'Bilberries (scientific name: vaccinium myrtillus) are a dark blue fruit, similar in appearance to blueberries but are smaller, softer and darker.', 120, 'Diabetes'),
(112, 'Gymnema Sylvestre', 'h3.jpg', 'Herbs', 'This powerful herb promotes glucose utilization in the cells thus lowering blood glucose. It also prevents the liver from releasing more glucose into the blood stream, lowers cholesterol and triglycerides. Some people feel Gymnema Sylvestre is one of the most powerful herbs for treating high blood glucose – both type 1 and 2 diabetics. Also Gymnema Sylvestre may help rejuvenate beta cells in the pancreas thus helping heal the condition.', 120, 'Diabetes'),
(113, 'Cinnamon', 'h4.jpg', 'Herbs', 'According to studies, cinnamon may have a positive effect on the glycemic control and the lipid profile in patients with diabetes mellitus type 2. This is because it contains 18% polyphenol content in dry weight. This popular Indian spice can improve insulin sensitivity and blood glucose control. ', 120, 'Diabetes'),
(114, 'Cloves', 'h5.jpg', 'Herbs', 'Cloves protect the heart, liver and lens of the eye of diabetic rats, according to studies. This spice contains 30% of the antioxidant phenol in dry weight, along with antioxidants anthocyanins and quercetin. ', 120, 'Diabetes,Cancer'),
(115, 'Rosemary', 'h6.jpg', 'Herbs', 'An aromatic herb that is used commonly to add flavor and aroma to meats and soups, Rosemary also helps normalize blood sugar levels naturally. It promotes weight loss as well, which is a double boon for many diabetics who struggle with weight issues. ', 120, 'Diabetes'),
(116, 'Oregano', 'h7.jpg', 'Herbs', 'Popular in Italian, Spanish and Mediterranean cooking, oregano is considered one of the best herbs to lower blood sugar levels.', 80, 'Diabetes'),
(117, 'Sage', 'h8.jpg', 'Herbs', 'Sage can have metformin-like effects, according to a study published in the British Journal of Nutrition. So you may want to consider cooking with this herb often. It has been used on traditional medicine for centuries, as one of the important herbs to reduce blood sugar. A word of warning – taking high doses of sage along with diabetes medications might cause your blood sugar to go too low, a condition called hypoglycemia. Monitor your blood sugar closely.', 70, 'Diabetes');

-- --------------------------------------------------------

--
-- Table structure for table `temp1`
--

CREATE TABLE `temp1` (
  `uid` varchar(50) NOT NULL,
  `pid` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`,`catg`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
