-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 06:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'nm3244s6');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`) VALUES
(1, 'smartphones', 1),
(2, 'computers', 1),
(3, 'electronics and appliances', 1),
(4, 'lifestyle', 0),
(6, 'computer accessories', 1),
(7, 'mobile accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contactNo`, `message`, `date`) VALUES
(1, 'Maliha', 'maliha@gmail.com', 4564565, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `order_status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `postal_code`, `total_price`, `payment_type`, `payment_status`, `order_status`, `date`) VALUES
(1, 1, 'House #2, Mirpur-2', 'Dhaka', 1207, 27576, 'COD', 'Success', 5, '2020-11-04'),
(2, 1, 'House #2, Mirpur-2', 'Dhaka', 1207, 9070, 'COD', 'Pending', 1, '2020-11-04'),
(7, 1, 'House #2, Mirpur-2', 'Dhaka', 1207, 21357, 'COD', 'Success', 5, '2020-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 3, 1, 11499),
(2, 1, 14, 2, 2999),
(3, 1, 2, 1, 9999),
(4, 2, 4, 1, 8990),
(5, 3, 14, 1, 2999),
(6, 4, 4, 3, 8990),
(7, 4, 14, 3, 2999),
(8, 4, 2, 1, 9999),
(9, 5, 18, 2, 32990),
(10, 5, 14, 1, 2999),
(11, 6, 4, 1, 8990),
(12, 7, 4, 2, 8990),
(13, 7, 15, 3, 1099);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(555) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `short_description` varchar(2000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `sub_category_id`, `name`, `brand`, `price`, `quantity`, `color`, `image`, `short_description`, `description`, `status`) VALUES
(2, 1, 9, 'Huawei Matepad', 'Huawei', 9999, 6, 'Black', '872661059_box-1-2.jpg', 'Huawei Matepad T (WIFI) 2GB/16GB', '\r\n<ul>\r\n<li>Operating System: EMUI10 (Based on Android 10). No Google Play Services</li>\r\n<li>Display Size: 8.0 inches LCD</li>\r\n<li>Resolution: 1280 x 800, 189 PPI</li>\r\n<li>Chipset: MTK MT8768</li>\r\n<li>CPU: 4 x Cortex A53 2.0 GHz + 4 x Cortex A53 1.5 GHz</li>\r\n<li>GPU: IMG GE8320 650 MHz</li>\r\n<li>RAM: 2GB</li>\r\n<li>ROM: 16GB</li>\r\n<li>Rear Camera: 5 MP, f/2.2 aperture, Auto Focus</li>\r\n<li>Front Camera: 2 MP, f/2.4 aperture, Fixed Focal</li>\r\n<li>Battery: Non-removable Li-Po 5100 mAh battery</li>\r\n<li>WLAN: supported, 802.11 a/b/g/n/ac, 2.4 GHz and 5 GHz</li>\r\n<li>Bluetooth: BT 5.0, Bluetooth Low Energy is supported</li>\r\n</ul>', 1),
(3, 1, 16, 'Redmi 8A', 'Xiaomi', 11499, 3, 'Grey', '699518359_box-1-11.jpg', 'Redmi 8A Dual 2GB/32GB', '\r\n<ul> \r\n<li>Operating System: Android 9.0 (Pie), MIUI 11</li>\r\n<li>Processor: Qualcomm SDM439 Snapdragon 439</li>\r\n<li>CPU: Octa-core</li>\r\n<li>GPU: Adreno 505</li>\r\n<li>RAM: 2GB</li>\r\n<li>ROM: 32GB</li>\r\n<li>Display: 6.22 inches 720 x 1520 pixels</li>\r\n<li>Rear Camera: 13MP+2MP</li>\r\n<li>Front Camera: 8MP</li>\r\n<li>Battery: Non-removable Li-Po 5000 mAh battery (Fast charging 18W)</li>\r\n<li>Connectivity: Wi-Fi 802.11 b/g/n, Wi-Fi Direct, hotspot. Bluetooth: 4.2, A2DP, LE</li>\r\n<li>Sensors: Accelerometer, proximity, compass</li>\r\n</ul>', 1),
(4, 1, 3, 'vivo Y91C', 'vivo', 8990, 2, 'Red, Blue', '259968985_box-1-10.jpg', 'vivo Y91C 2020\r\n', '\r\n<ul> \r\n<li>OS: Funtouch OS 4.5 (Based on Android 8.1)</li>\r\n<li>Processor: MT6762R</li>\r\n<li>RAM: 2GB</li>\r\n<li>ROM: 32GB</li>\r\n<li>Front Camera: 5MP</li>\r\n<li>Back Camera: 13MP</li>\r\n<li>Display: 6.22” Full-incell Capacitive Multi-touch (1520 X 720 HD+)</li>\r\n<li>Battery: 4030mAh</li>\r\n<li>Connectivity: Wi-Fi 2.4G; Bluetooth 5.0</li>\r\n</ul>', 1),
(5, 1, 11, 'iPhone 7', 'Apple', 39999, 4, 'Rose Gold, White, Black', '778331318_box-1-8.jpg', 'Apple iPhone 7 - 128GB', 'iPhone 7 dramatically improves the most important aspects of the iPhone experience. It introduces advanced new camera systems. The best performance and battery life ever in an iPhone. Immersive stereo speaker.', 1),
(6, 2, 4, 'Asus Vivobook', 'Asus', 70000, 5, 'Grey', '449111131_box-6-2.jpg', 'ASUS VivoBook P1440FA Core i7 8th Gen 14\" HD Laptop', '<li>Processor: Intel Core i7-8565U Processor (8M Cache, 1.80 GHz up to 4.60 GHz)</li>\r\n<li>Display: 14” HD (1366 x 768) LED Display</li>\r\n<li>Memory: 8GB DDR4 RAM</li>\r\n<li>Storage: 1TB 7200rpm SATA HDD</li>\r\n<li>Graphics: Intel UHD Graphics</li>\r\n<li>Operating System: ENDLESS Operating System</li>\r\n<li>Battery: 4 -Cell 44 Wh Battery</li>\r\n<li>Adapter: 1 x AC adapter plug</li>\r\n<li>Plug type: ø4.5 (mm)</li>\r\n<li>Output : 19 V DC, A, 65 W</li>\r\n<li>Audio: Built-in 2 W Stereo Speakers with Microphone</li>\r\n<li>Special Feature: Finger Print</li>', 1),
(7, 2, 12, 'Microsoft Surface Pro 7', 'Microsoft', 95000, 3, 'Grey, Black', '406483052_box-6-6.jpg', 'Microsoft Surface Pro 7 10th Gen Core i5 8GB Ram 128GB SSD Touch Display Notebook with Win 10', '<ul>\r\n<li>Processor:	Quad-core 10th Gen Intel Core i5-1035G4 Processor (6 MB Cache, 1.10 GHz up to 3.70 GHz)</li>\r\n<li>Display Screen: 12.3” PixelSense Display</li>\r\n<li>Resolution: 2736 x 1824 (267 PPI)</li>\r\n<li>Aspect ratio: 3:2</li>\r\n<li>Touch: 10 point multi-touch</li>\r\n<li>Memory: 8GB LPDDR4x RAM</li>\r\n<li>Storage: 128GB SSD</li>\r\n<li>Graphics: Intel Iris Plus Graphics</li>\r\n<li>Operating System: Windows 10</li>\r\n<li>Battery: Up to 10.5 hours of typical device usage</li>\r\n<li>Adapter: 1 x Surface Connect port</li>', 1),
(8, 2, 7, 'HP Notebook 250 G7 Laptop', 'HP', 40000, 3, 'Dark Ash Silver', '716326464_box-6-7.jpg', 'HP Notebook 250 G7 Laptop 2A9A5PA#ACJ (Intel Celeron N4020/4GB Ram/1TB HDD/15.6 inch HD/Windows 10/Intel UHD Graphics/1.78Kg)', '<ul>\r\n<li>Processor: Intel® Core™ i3-7020U (2.3 GHz base frequency, 3 MB cache, 2 cores)</li>\r\n<li>Memory, standard: 4 GB DDR4-2133 SDRAM (1 x 4 GB)</li>\r\n<li>Video graphics: Intel® HD Graphics 620</li>\r\n\r\n\r\n\r\n\r\n<li>Hard drive: 1 TB 5400 rpm SATA</li>\r\n\r\n<li>Display: 15.6\" diagonal HD SVA BrightView micro-edge WLED-backlit (1366 x 768)</li>\r\n<li>Wireless connectivity: 802.11ac (1x1) Wi-Fi® and Bluetooth® 4.2 combo</li>\r\n<li>Network interface: Integrated 10/100/1000 GbE LAN</li>\r\n<li>Expansion slots: 1 multi-format SD media card reader</li>\r\n</ul>', 1),
(9, 3, 13, 'Vision AC BWC (3D)', 'Vision', 44370, 8, 'White', '978452410_box-2-6.jpg', 'Vision AC 1.5 Ton BWC (3D)', '<ul>\r\n<li>Function: Cooling</li>\r\n<li>Capacity (Ton): 1.5 ton</li>\r\n<li>Capacity (Btu/h): 18000 BTU/h</li>\r\n<li>3D (Yes/No): Yes</li>\r\n<li>Type: Split</li>\r\n<li>Rated cooling  power input (watt): 1680</li>\r\n<li>Voltage range: 220V-240V</li>\r\n<li>Frequency (Hz): 50 Hz</li>\r\n<li>Indoor Noise: 48 DB</li>\r\n<li>Outdoor Noise: 54 DB</li>\r\n<li>Display Type: Hidden Display</li>\r\n<li>Sleep Mode Timer (Yes/No): Yes</li>\r\n<li>Certification (If any): CE No</li>\r\n<li>Compressor Brand: Highly</li>\r\n<li>Compressor Type: Rotary</li>\r\n<li>Refrigerant: R410a</li>\r\n</ul>', 1),
(10, 3, 14, 'Sony X7000E ', 'Sony', 86990, 6, 'Grey, Black', '400847683_box-2-8.jpg', 'Sony X7000E 55\" 4K Ultra HD TV', '<ul>\r\n<li>Model: X7000E</li>\r\n<li>Screen Size: 55\" (54.6\")</li>\r\n<li>Display Type: LCD</li>\r\n<li>Resolution: 3840x2160</li>\r\n<li>Backlight type: Edge LED</li>\r\n<li>Backlight Dimming type: Frame Dimming</li>\r\n<li>Clarity Enhancement: 4K X-Reality™ PRO</li>\r\n<li>Color Enhancement: Live Colour™ Technology</li>\r\n<li>Contrast Enhancement: Dynamic Contrast Enhancer</li>\r\n<li>Motion Enhancer: Motionflow™ XR 200 (Native 50Hz)</li>\r\n<li>Audio Power Output: 10W+10W</li>\r\n<li>Speaker Type: Bass Reflex Speaker</li>\r\n<li>Sound Processing: ClearAudio+</li>\r\n<li>Sound Modes: Standard, Music, Cinema, Sports</li>\r\n<li>Operating System: Linux</li>\r\n<li>Internet Browser: Opera</li>\r\n<li>Power Consumption: 114W</li>\r\n<li>Power Requirements: AC 110-240V, 50/60Hz</li>\r\n</ul>', 1),
(12, 4, 6, 'SKMEI 9097SI', 'SKMEI', 2160, 10, 'Silver', '842924778_box-5-2.jpg', 'SKMEI 9097SI Silver Dial Stainless Steel Crono Style Men’s Watch', '<ul>\r\n<li>Item Type: Wristwatches</li>\r\n<li>Case Material: Stainless Steel</li>\r\n<li>Dial Window Material Type: Hardlex</li>\r\n<li>Dial Material Type: Stainless Steel</li>\r\n<li>Water Resistance Depth: 30m</li>\r\n<li>Movement: Quartz</li>\r\n<li>Dial Diameter: 4.3 cm</li>\r\n<li>Band Width: 20mm to 29mm</li>\r\n<li>Clasp Type: Folding Clasp with Safety</li>\r\n<li>Gender: Men</li>\r\n<li>Style: Fashion & Casual</li>\r\n<li>Dial Display: Analog</li>\r\n<li>Case Shape: Round</li>\r\n<li>Band Material Type: Stainless Steel</li>\r\n<li>Band Length: 24 cm</li>\r\n<li>Case Thickness: 12mm</li>\r\n<li>Band With: 20mm to 29mm</li>\r\n<li>Band Width: 2.2cm</li>\r\n</ul>', 1),
(13, 4, 17, 'Riffs Doux Amour', 'Riffs', 1800, 5, 'Black', '903296770_box-5-9.jpg', 'Riffs Doux Amour Eau De Perfume 100 ML', 'DOUX AMOUR by Riiffs Perfume is a seductive oriental fragrance that has a royal bouquet feel that created by combining traditional notes and represents a European romance between the men and women. This fragrance is a part of the Special collection that aims to capture the scent of the most precious flowers.', 1),
(14, 6, 5, 'Motorola Squads', 'Motorola', 2999, 6, 'Black', '330310324_box-4-8.jpg', 'Motorola Squads 300 Headphones', '<ul>\r\n<li>Wireless technology: Bluetooth</li>\r\n<li>Range: 10m</li>\r\n<li>Driver size: 30mm</li>\r\n<li>Playtime: 15 hours playtime per charge</li>\r\n<li>Ages: 3 or above</li>\r\n<li>Safe volume limit for kids: Available</li>\r\n<li>Maximum volume; Up to 85 db</li>\r\n<li>Bluetooth: Version 5.0</li>\r\n</ul>', 1),
(15, 6, 18, 'ESET Internet Security', 'ESET', 1099, 5, '', '483610618_box-4-3.jpg', 'ESET Internet Security 2020 - 3 User - 1 Year (CD) Multi Device', '', 1),
(17, 1, 2, 'realme 7i ', 'Realme', 23453, 2, 'Black', '969344878_box-1-7.jpg', 'realme 7i 8GB/128GB', '<ul>\r\n <li>   OS: Realme UI. Based on Android 10</li>\r\n<li>  Processor: Snapdragon 662 Processor</li>\r\n<li>  CPU: Octa-core, 11nm, up to 2.0GHz</li>\r\n<li>  GPU: Adreno 610</li>\r\n<li>  RAM: 8GB</li>\r\n<li>  ROM: 128GB</li>\r\n<li>  Display: 6.5 inches. LCD multi-touch display</li>\r\n<li>  Refresh Rate: 90Hz Ultra Smooth Display</li>\r\n<li>  Resolution：1600x720 HD+</li>\r\n<li>  Rear Camera: 64MP + 8MP+ 2MP+ 2MP</li>\r\n<li>  Front Camera: 16MP</li>\r\n<li>  Battery: Non-removable Li-Po 5000mAh battery (9V/2A Charging Adaptor)</li>\r\n<li>  Connectivity: Wi-Fi 2.4/5GHz, 802.11b/g/n/a/ac. Bluetooth 5.0</li>\r\n<li>  Sensor: Light sensor, Proximity sensor, Magnetic induction sensor, Acceleration sensor, Gyro-meter sensor, Fingerprint</li>\r\n  </ul>', 1),
(18, 1, 8, 'vivo V20', 'Vivo', 32990, 2, 'Purple, Black, White', '413684328_box-1-4.jpg', '', '<ul>\r\n<li>OS: Funtouch OS 11 (Based on Android 11)</li>\r\n<li>Processors: Qualcomm® Snapdragon™ 720G</li>\r\n<li>CPU Cores: Octa-core</li>\r\n<li>GPU: Adreno 618</li>\r\n<li>RAM: 8GB</li>\r\n<li>ROM: 128 GB</li>\r\n<li>Rear Camera: 64MP+8MP+2MP</li>\r\n<li>Front Camera: 44MP</li>\r\n<li>Screen: 6.44 inches</li>\r\n<li>Display Panel: AMOLED Screen, Capacitive multi-touch</li>\r\n<li>Resolution: 2400*1080 (FHD+)</li>\r\n<li>Battery: Non-removable Li-Po 4000 mAh battery (Fast charging: 33W)</li>\r\n<li>Connectivity: Wi-Fi2.4GHz, 5GHz. Bluetooth 5.1</li>\r\n<li>Sensors: Fingerprint (under display, optical), accelerometer, gyro, proximity, compass</li>\r\n</ul>', 1),
(19, 2, 19, 'Apple Macbook Pro 13.3', 'Apple', 118000, 3, 'Grey', '375970500_box-6-8.jpg', 'Apple Macbook Pro 13.3 Inch Retina Display with Touch Bar, Core i5-1.4GHz, 8GB Ram, 128GB SSD (MUHQ2P/A, 2019) Space Gray', '<ul>\r\n<li>Model: Apple Macbook Pro MUHQ2 2019 Space Gray</li>\r\n<li>Intel Core i5-8265U Processor (6M Cache, 1.60 GHz up to 3.90 GHz)</li>\r\n<li>8GB DDR3 SDRAM</li>\r\n<li>128GB SSD</li>\r\n<li>13.3\" (2560 x 1600) Retina Display</li>\r\n</ul>', 1),
(20, 2, 20, 'MSI Evolve GF63', 'MSI', 110000, 4, 'Black', '875854137_box-6-5.jpg', 'MSI Evolve GF63 Thin 10SCSR Core i7 10th Gen GTX 1650Ti 4GB Graphics 15.6\"144Hz FHD Gaming Laptop', '<ul>\r\n<li>Model: MSI Evolve GF63 Thin 10SCSR</li>\r\n<li>Intel Core i7-10750H Processor (12M Cache, 2.60 GHz up to 5.00 GHz)</li>\r\n<li>8GB RAM + 512GB PCIe SSD</li>\r\n<li>15.6\"FHD (1920x1080)144Hz, IPS Display</li>\r\n<li>GeForce GTX1650Ti with Max-Q 4GB Graphics</li>\r\n</ul>', 1),
(21, 2, 4, 'ASUS ZenBook Flip 13', 'Asus', 10200, 5, 'Pine Gray', '846125510_box-6-4.jpg', 'ASUS ZenBook Flip 13 UX363JA Core i5 10th Gen 13.3\" Full HD Laptop with Windows 10', '<ul>\r\n<li>Processor:	Intel Core i5-1035G1 Processor (6M Cache, 1.00 GHz up to 3.60 GHz)</li>\r\n<li>Display: 3.3” LED-backlit Full HD (1920 x 1080) 16:9 slim-bezel NanoEdge touchscreen</li>\r\n<li>3.9 mm-thin side bezel</li>\r\n<li>178° wide-view technology</li>\r\n<li>IPS-level (In-Plane Switching)</li>\r\n<li>Memory: 8GB 3733 MHz LPDDR4</li>\r\n<li>Storage: 512 GB PCIe NVMe 3.0 x2 M.2 SSD</li>\r\n<li>Graphics: Intel UHD Graphics</li>\r\n<li>Operating System: Windows 10</li>\r\n</ul>', 1),
(22, 3, 15, 'Havells  Water Purifier', 'Havells', 21500, 4, 'White, Green', '882655069_box-2-9.jpg', 'Havells Max 8L RO and UV Water Purifier', '<ul>\r\n<li>Flow rate: Up to 15 liters per hour</li>\r\n<li>Tank capacity: approximately 7 liters</li>\r\n<li>Purification technology: RO & UV Technology</li>\r\n<li>Purifying stages: 7 STAGES (RO+UV)</li>\r\n<li>Power rating (maximum): 45 W</li>\r\n<li>Pressure rating: 06-30 psi</li>\r\n<li>Ultraviolet lamp power rating: 4 W</li>\r\n<li>Input voltage range: 230 V, 50 Hz</li>\r\n</ul>', 1),
(23, 3, 21, 'Philips HI108/01 Classic Dry Iron', 'Philips', 1970, 4, 'White', '112746568_box-2-7.jpg', 'Philips HI108/01 Classic Dry Iron', '<ul>\r\n<li>Button groove speeds up ironing along buttons and seams</li>\r\n<li>Comfortable handle with texturing for easy grip</li>\r\n<li>Easy temperature control</li>\r\n<li>Slim tip soleplate reaches easily in tricky areas</li>\r\n<li>Temperature light indicates when the iron is hot enough</li>\r\n<li>Cord winder for easy cord storage</li>\r\n<li>The light weight iron helps to iron with less effort</li>\r\n</ul>', 1),
(24, 4, 6, 'Naviforce NF9086BBB', 'Naviforce', 2025, 3, 'Black', '446400407_box-5-1.jpg', 'Naviforce NF9086BBB Analog Men’s Watch', '<ul>\r\n<li>Display Type: Analog</li>\r\n<li>Watch Type: Wrist Watch</li>\r\n<li>Strap Material: Genuine Leather Strap</li>\r\n<li>Dual Time: NO</li>\r\n<li>Dial Color: Black</li>\r\n</ul>', 1),
(25, 4, 22, 'CURREN C9021L', 'Curren', 1710, 4, 'Rose gold', '142892113_box-5-6.jpg', 'CURREN C9021L Rose Gold White Dial Women’s Watch', '<ul>\r\n<li>Type: Casual Watch</li>\r\n<li>Display Type: Analog</li>\r\n<li>Movement Type: Mechanical</li>\r\n<li>Dial Case Diameter Size: 38 millimeters</li>\r\n<li>Dial Thickness: 0.8 Centimeter</li>\r\n<li>Watch Strap Length: 22 Centimeter</li>\r\n<li>Watch Strap Width: 1.8 Centimeter</li>\r\n<li>Band Material: Leather</li>\r\n<li>Watch Shape: Round</li>\r\n</ul>', 1),
(27, 4, 17, 'AL HARAMAIN Junoon Noir', 'Al Haramain', 8800, 5, 'Black', '960715042_box-5-11.jpg', 'AL HARAMAIN Junoon Noir Perfume for Men AHP1085 -75ML', 'Al Haramain Junoon Noir Spray 75ml comes with a great scent and the perfection of a well-balanced perfume that will cater to all the needs of the user who wants more than what the ordinary user needs with life\r\n<ul>\r\n<li>Top note:  Lime, Kumquat</li>\r\n<li>Middle note:  Orris, Jasmine, Lily of the Valley, Violet</li>\r\n<li>Base note:  Sandalwood, Cedar, Vanilla, Musk</li>\r\n</ul>', 1),
(28, 6, 24, 'KWG Orion P1', 'Orion', 1600, 4, 'Black', '143534600_box-4-12.jpg', 'KWG Orion P1 RGB Gaming Mouse', 'KWG ORION P1 is a RGB backlit optical gaming mouse. It is mainly a budget friendly mid-range gaming mouse. The total of keys is 7. On the other hand, its key life up 12000 times. Its resolution: is 800/1600/2400/3200/4800/8200/12000 DPI. If we come to size, it is really a stylist and colorful device. It’s Interface Type USB. It’s a wired mouse which cable 1.6m. Its operating voltage 5.0V.\r\n<ul>\r\n<li>Keys: 7</li>\r\n<li>Connection Type: 1.5 m (Braided Cable)</li>\r\n<li>Optical Sensor Resolution: 800/1600/2400/3200/4800/8200/12000 DPI</li>\r\n<li>Cable Length: 1.5m</li>\r\n<li>Color Option: RGB</li>\r\n<li>Ultrapolling: 1,000 Hz</li>\r\n</ul>', 1),
(29, 6, 23, 'Tenda F3 300mbps Router', 'Tenda', 1200, 4, 'White', '213175966_box-4-11.jpg', 'Tenda F3 300mbps Wireless 5DBI Router', 'F3 is specially designed for your smart home networking life. Chip to router what is heart to a human. Its superior Advanced Chip ensures stable and fast wireless performance, making it ideal for streaming music, uploading photos, video chatting, HD video streaming and other bandwidth-intensive tasks. Easy setup interface makes you can enjoy fluid WiFi experience effortlessly. No matter you are a tech-savvy enthusiast or a first-time user, F3 is super easy and intuitive to setup without time-consuming operations. F3 makes you enjoy an easy and freewheeling E-life.\r\n<ul>\r\n<li>Certification: CE ROHS 3C EAC NOM IC</li>\r\n<li>Humidity: Operating Environment:10% ~ 90% RH Non-condensing, Storage Environment:5% ~ 90% RH <li>Non-condensing</li>\r\n<li>Temperature: Operating Environment:0℃ ~ 40℃, Storage Environment:-40ºC~70ºC</li>\r\n<li>Dimension: 127.4mm*90.5mm*26mm</li>\r\n<li>DHCP Server: Support</li>\r\n<li>System Tool: Network Time, Sys Upgrade, Backup/Restore, Factory Default, Login Password, Sys Logs, Restart.</li>\r\n</ul>', 1),
(30, 7, 28, 'Huawei Watch Fit', 'Huawei', 9999, 2, 'Black', '661265955_box-3-6.jpg', 'Huawei Watch Fit', '<ul>   \r\n<li> Display: 1.64 inch AMOLED 456 x 280 HD</li>\r\n<li>Touchscreen: AMOLED (supports slide and touch gestures)</li>\r\n<li>GPS: Supported</li>\r\n<li>Memory: 4 GB</li>\r\n<li>Button: Full-screen touch + side button</li>\r\n<li>System Requirements: Android 5.0 or later, iOS 9.0 or later</li>\r\n<li>Bluetooth: 2.4 GHz, BT 5.0, BLE</li>\r\n<li>Battery Life: Typical usage: 10 days, Heavy usage: 7 days, GPS mode: 12 hours</li>\r\n</ul>', 1),
(31, 7, 26, 'Xiaomi 5V 3A USB Charger', 'Xiaomi', 510, 4, 'White', '301381700_box-3-7.jpg', 'Xiaomi 5V 3A USB Charger with USB Type C Cable', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage,', 1),
(32, 7, 27, 'OnePlus Bullets Earphone', 'OnePlus', 1335, 5, 'Black, Red', '876979154_box-3-4.jpg', 'OnePlus Bullets Type-C Earphones - Black', '<ul>   \r\n<li> Type: In-Ear</li>\r\n<li> Connectivity: Wired</li>\r\n<li> Frequency Response: 20 - 20,000 Hz</li>\r\n<li> Impedance: 24 Ω</li>\r\n<li> Connectors: USB Type-C</li>\r\n<li> Microphone: Yes</li>\r\n<li> Volume Control : Yes</li>\r\n</ul>', 1),
(33, 7, 27, 'Awei T28P TWS Earphone', 'Awei', 1699, 3, 'Black', '423848942_box-3-1.jpg', 'Awei T28P TWS Touch Wireless Earphones with LED Display', '<ul>   \r\n<li>Bluetooth version: v5.0</li>\r\n<li>Wireless range: up to 10m</li>\r\n<li>Speaker units: 2 x 6mm</li>\r\n<li>Impedance: 32 Ohms</li>\r\n<li>Music time: up to 3h</li>\r\n<li>Charging time: 1.5h (earphones); 3h (box)</li>\r\n<li>Charging case capacity: 500mAh</li>\r\n<li>Earphones battery capacity: 35mAh each</li>\r\n<li>Water-resistant level: IPX4</li>\r\n</ul>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category`, `status`) VALUES
(1, 1, 'Samsung', 1),
(2, 1, 'Realme', 1),
(3, 1, 'OPPO', 1),
(4, 2, 'Asus', 1),
(5, 6, 'Headphones', 1),
(6, 4, 'Men\'s Watch', 1),
(7, 2, 'HP', 1),
(8, 1, 'Vivo', 1),
(9, 1, 'Huawei', 1),
(10, 4, 'Women\'s Watch', 1),
(11, 1, 'iPhone', 1),
(12, 2, 'Microsoft Surface', 1),
(13, 3, 'AC', 1),
(14, 3, 'Television', 1),
(15, 3, 'Water Purifier', 1),
(16, 1, 'Xiaomi', 1),
(17, 4, 'Men\'s Perfume', 1),
(18, 6, 'Antivirus', 1),
(19, 2, 'Macbook', 1),
(20, 2, 'MSI', 1),
(21, 3, 'Iron', 1),
(22, 4, 'Women\'s Perfume', 1),
(23, 6, 'Router', 1),
(24, 6, 'Mouse', 1),
(25, 7, 'Powerbank', 1),
(26, 7, 'Charger and Adapter', 1),
(27, 7, 'Earphone', 1),
(28, 7, 'Smart Watch', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactNo`, `password`, `date`) VALUES
(1, 'maliha', 'maliha@gmail.com', 45678, '93122a9e4abcba124d5a7d4beaba3f89', '2020-10-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
