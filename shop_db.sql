-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 11:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `profile`) VALUES
('', 'gianna', 'gianna@gmail.com', '72b1ddf9b91795e4bde0de7811e8e35865e1f0f7', 'Untitled-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `qty`) VALUES
('R7qVe8YjEF4WAvagtQZ5', 'f1pECQ94qKMIRPiZxeHy', 'qQqM4EyjuDjclDTtwXLn', '100', '1'),
('plJIIrcekWIDd7Sd5rBM', 'f1pECQ94qKMIRPiZxeHy', 'VRrtqvWQtHS6o6uk4TOc', '150', '1'),
('62zdhXTE6XorbRQ6qwUC', 'Knbij8kSOViZc1lobg4u', '0bgaAlQEwlfUWPv6F6lJ', '20', '1'),
('SlCIlPSLscTQtBEpYphi', 'Knbij8kSOViZc1lobg4u', 'VRrtqvWQtHS6o6uk4TOc', '150', '1'),
('DCchoJE6u3Rllxu1v5eU', 'Knbij8kSOViZc1lobg4u', 'qQqM4EyjuDjclDTtwXLn', '100', '1'),
('K7ast6Q06gmQc7MYEdox', 'Knbij8kSOViZc1lobg4u', 'sCmWsfR11hGY7nn2UeEg', '243', '1'),
('3KkqW6W9JEsh9hZS1nqh', 'Knbij8kSOViZc1lobg4u', '5B4XijBS8sa15FBcUc8W', '150', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
('123456789abcdebgfh', '0987654321oqiwyetf', 'deo', 'deo@gmail.com', 'salad', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis nihil voluptas quas esse dolores modi eveniet temporibus, delectus quo provident unde incidunt beatae ipsa nostrum eius veritatis facere. Sint, exercitationem.'),
('123456789abcdebgfi', '0y87654321oqiwyetf', 'gianna', 'gianna@gmail.com', 'salad', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis nihil voluptas quas esse dolores modi eveniet temporibus, delectus quo provident unde incidunt beatae ipsa nostrum eius veritatis facere. Sint, exercitationem.'),
('123456aa9abcdebgfh', '0987654321oq98yetf', 'bhuki', 'bhuki@gmail.com', 'salad', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis nihil voluptas quas esse dolores modi eveniet temporibus, delectus quo provident unde incidunt beatae ipsa nostrum eius veritatis facere. Sint, exercitationem.'),
('111456789abcdebgfh', '0bb7654321oqiwyetf', 'gregory', 'gregoryo@gmail.com', 'salad', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis nihil voluptas quas esse dolores modi eveniet temporibus, delectus quo provident unde incidunt beatae ipsa nostrum eius veritatis facere. Sint, exercitationem.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`, `payment_status`) VALUES
('1234567890abcdee', '9876543212abcdef', 'gianna', '0679781371', 'gianna@gmail.com', 'mbezi', 'street', 'credit or derbit h on delivery', '25SA', '120', '25', '2023-03-27', 'completed', 'complete'),
('1234567890abcdee', '9876543212abcdef', 'gianna', '0679781371', 'gianna@gmail.com', 'mbezi', 'street', 'credit or debit on delivery', '25SA', '120', '25', '2023-03-27', 'completed', 'complete'),
('1225567890abcdef', '9846543211abcdef', 'bhuki', '0676781971', 'bhuki@gmail.com', 'tabata', 'street', 'cash on delivery', '254SDA', '10', '26', '2023-01-26', 'in progress', 'pending'),
('67890abcdef', '9856543211abcdef', 'gregory', '0676781871', 'gregory@gmail.com', 'ubungo', 'street', 'credit or debit card', '23SDA', '200', '25', '2023-01-25', 'in progress', 'complete'),
('1237567890abcdef', '9866543211abcdef', 'burna', '0676781771', 'burna@gmail.com', 'mwenge', 'street', 'cash on delivery', '22SDA', '150', '24', '2023-01-24', 'in progress', 'pending'),
('1238567890abcdef', '9776543211abcdef', 'maziku', '0676781671', 'maziku@gmail.com', 'africana', 'street', 'credit or debit card', '212DA', '19', '23', '2023-01-23', 'in progress', 'complete'),
('1239567890abcdef', '9886543211abcdef', 'salim', '0676781571', 'salim@gmail.com', 'bunju', 'street', 'cash on delivery', '21SDA', '29', '22', '2023-01-22', 'in progress', 'pending'),
('1240567890abcdef', '9896543211abcdef', 'jude', '0676781471', 'jude@gmail.com', 'tegeta', 'street', 'credit or debit card', '20SDA', '15', '21', '2023-01-21', 'in progress', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_detail` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `product_detail`, `status`) VALUES
('0bgaAlQEwlfUWPv6F6lJ', 'veg burger', '20', 'food-1.png', 'burgers', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusanda', 'active'),
('VRrtqvWQtHS6o6uk4TOc', 'chocolate shake', '150', 'food-37.png', 'shakes and desserts', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delLorem ipsum dolor sit amet cons', 'deactive'),
('qQqM4EyjuDjclDTtwXLn', 'Family combo', '100', 'food-33.png', 'family dinner', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae culpa expedita, quibusdam qui id officiis necessitatibus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Est iure enim in. Quas totam dicta natus vel fugiat, illo itaque delectus accusantium recusandae cu', 'active'),
('h9I5x1sP8cfSPnBq5Pkr', 'tyttttt', '3244', '3.jpg', 'burgers', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'deactive'),
('5B4XijBS8sa15FBcUc8W', 'Chick and Strips', '150', 'food-2.png', 'tacos, fries  and sides', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.', 'active'),
('sCmWsfR11hGY7nn2UeEg', 'grilled cool wrap', '243', 'food-3.png', 'family dinner', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo sunt doloribus reprehenderit. Veniam voluptas quam animi eaque sequi quod sed sunt voluptates autem, est sint aperiam doloremque praesentium et dolorem.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `select_one` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `confirmation` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `name`, `email`, `number`, `select_one`, `date`, `time`, `comment`, `confirmation`) VALUES
('1234577890qwerty', '1234587890uiopas', 'gregory', 'gregory@gmail.com', '0677781371', 'select one', '2023-05-28', '9 AM', 'book table', 'complete'),
('1234577870qwerty', '1234587090uiopas', 'gianna', 'gianna@gmail.com', '0679781371', 'select two', '2023-05-27', '10 AM', 'book table', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
('R9H8G7F6E5D4C3B2', '0bgaAlQEwlfUWPv6F6lJ', 'RBefUN8mV2Dh72Lvo559', '5', 'Excellent Content', 'I learned a lot from this post. Highly recommend!', '2024-11-14'),
('A1B2C3D4E5F6G7H8', 'VRrtqvWQtHS6o6uk4TOc', '0ZFx1sCkmWc0hfKgRdMr', '4', 'Good Read', 'The post was informative but could use more examples.', '2024-11-15'),
('K8J7I6H5G4F3E2D1', 'qQqM4EyjuDjclDTtwXLn', 'mpIdP7F6yKMYjHjP9a6a', '3', 'Average Content', 'The content was okay but lacked depth.', '2024-11-16'),
('X1Y2Z3W4V5U6T7S8', 'h9I5x1sP8cfSPnBq5Pkr', 'G6L5eQnZhxaA4E1voPwd', '2', 'Great Insights', 'The post gave good insights into the topic, but more details could be included.', '2024-11-17'),
('M9N8O7P6Q5R4S3T2', '5B4XijBS8sa15FBcUc8W', 'Knbij8kSOViZc1lobg4u', '1', 'Highly Informative', 'A very well-written post with plenty of useful information. Highly recommended!', '2024-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`) VALUES
('RBefUN8mV2Dh72Lvo559', 'deo', 'deo@gmail.com', 'e8ca7d6501cc53e9414e531380c254509e71a423', 'Untitled-1.jpg'),
('0ZFx1sCkmWc0hfKgRdMr', 'gianna', 'gianna@gmail.com', '72b1ddf9b91795e4bde0de7811e8e35865e1f0f7', 'WIN_20230321_10_00_52_Pro.jpg'),
('mpIdP7F6yKMYjHjP9a6a', 'maka', 'maka@gmail.com', '990b7c412b4ff4482ab2f15009d556bf2d937534', 'pass-pdf.png'),
('G6L5eQnZhxaA4E1voPwd', 'gregory', 'gregory@gmail.com', '103febca8282301c88d7014bf9446121ad7f52c3', 'photo.png'),
('Knbij8kSOViZc1lobg4u', 'laura', 'laura@gmail.com', '94745df4bd94de756ea5436584fec066fc7898d5', 'Screenshot 2024-10-12 155635.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `price`) VALUES
('u0LvSq7HyLT319vXYqNm', 'f1pECQ94qKMIRPiZxeHy', 'qQqM4EyjuDjclDTtwXLn', '100'),
('oRZfBZpyFhygRPs0PRGf', 'Knbij8kSOViZc1lobg4u', '5B4XijBS8sa15FBcUc8W', '150');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
