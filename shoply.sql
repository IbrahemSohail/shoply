-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 05:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoply`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `image_path`) VALUES
(1, 'Food', '2025-02-10 15:56:27', '2025-02-10 15:56:27', 'categories/6DqqsVV8IEBIqsNG5WjpJHbiTR7lDOAg5XJU2jxC.jpg'),
(2, 'Clothes', '2025-02-10 15:56:42', '2025-02-10 15:56:42', 'categories/T3zyaWq22ePmesmMEu3mELu1Z5yTZbEnNS9Oostg.jpg'),
(3, 'Furniture', '2025-02-10 15:56:55', '2025-02-10 15:56:55', 'categories/FLLq1H5Yn1rKFfU3Up4SBAxXT6WLzOg8tIfsbKP3.jpg'),
(4, 'Electrical', '2025-02-10 15:57:08', '2025-02-10 15:57:08', 'categories/m3ikg3gmGNScEfgXUUPa5xL0mq5bbQVR3sBgQVzM.jpg'),
(6, 'Shoes', '2025-02-10 15:57:32', '2025-02-10 15:57:32', 'categories/LiTI2N4g2pIOdpc0IaGTL4waZILdzmypHvX90DD8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_28_094404_create_products_table', 1),
(5, '2024_12_28_094441_create_taxes_table', 1),
(6, '2024_12_28_094459_create_categories_table', 1),
(7, '2024_12_28_104146_add_coulmn_in_products_table', 1),
(8, '2025_01_03_133017_update_column_in_products_tabel', 1),
(9, '2025_01_21_101921_add_coulmn_in_products_table', 1),
(10, '2025_01_22_115250_add_image_in_categories_table', 1),
(11, '2025_01_29_104714_update_coulmn_in_product_table', 1),
(12, '2025_02_04_101643_update_column_in_products_table', 1),
(13, '2025_02_09_171247_create_carts_table', 1),
(14, '2025_02_11_091309_update_coloumn_in_products_table', 2),
(15, '2025_02_14_151115_add_is_admin_to_users_table', 3),
(16, '2025_02_15_155032_add_status_to_carts_table', 4),
(17, '2025_02_16_083545_remove_column_in_cart_table', 5),
(18, '2025_02_16_083746_create_orders_table', 6),
(19, '2025_02_16_084110_add_coloum_in_users_table', 7),
(20, '2025_02_16_091349_update_coloum_in_carts_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL DEFAULT '2025-02-16 08:39:59',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-02-16 09:06:07', '2025-02-16 07:06:07', '2025-02-16 07:06:07'),
(2, 2, '2025-02-16 09:16:40', '2025-02-16 07:16:40', '2025-02-16 07:16:40'),
(3, 2, '2025-02-16 09:17:54', '2025-02-16 07:17:54', '2025-02-16 07:17:54'),
(4, 2, '2025-02-16 10:21:58', '2025-02-16 08:21:58', '2025-02-16 08:21:58'),
(5, 2, '2025-02-16 10:27:47', '2025-02-16 08:27:47', '2025-02-16 08:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `tax` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `taxes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED DEFAULT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `description`, `size`, `price`, `tax`, `created_at`, `updated_at`, `taxes_id`, `categories_id`, `colors`, `image_path`) VALUES
(6, 'Golden Truffle Olive Oil', 'Luxury Truffle-Infused Extra Virgin Olive Oil', 'Cold-pressed extra virgin olive oil infused with Italian black truffle essence. Perfect for drizzling over pasta, risotto, or roasted vegetables.', '250ml', 18.99, 10, '2025-02-15 04:45:30', '2025-02-15 04:45:30', 1, 1, NULL, 'products/2GuBRvqzUejnALLwAY12tj5H9E1NZ9djRug5dx8h.jpg'),
(7, 'Himalayan Berry Bliss', 'Organic Goji Berry & Dark Chocolate Energy Bars', 'Vegan-friendly bars packed with Himalayan goji berries, 70% dark chocolate, and chia seeds for a guilt-free energy boost.', '0.5 kg', 4.5, 12, '2025-02-15 04:46:59', '2025-02-15 04:46:59', 2, 1, NULL, 'products/GXrmzfRoI82kUi0oR3BbRlRlT5PYV3JnMezsGLRe.jpg'),
(8, 'Umami Bomb Sauce', 'Fermented Soy & Shiitake Mushroom Glaze', 'A rich, savory sauce blending aged soy, shiitake mushrooms, and miso. Ideal for marinades, stir-fries, or dipping.', '200ml', 12.75, 10, '2025-02-15 04:48:07', '2025-02-15 04:48:07', 1, 1, NULL, 'products/YUwQsmYKSHya2FqKbgYrSJQLsDwTItCbCGntJzbK.jpg'),
(9, 'Midnight Espresso Beans', 'Single-Origin Ethiopian Dark Roast Coffee', 'Bold, smoky beans with notes of dark chocolate and black cherry. Ethically sourced and roasted in small batches.', '12oz', 16.99, 15, '2025-02-15 04:50:14', '2025-02-15 04:50:14', 3, 1, NULL, 'products/mLt0v0ai2LYJfzXPvPlsEb29RGUKCbLOT4S95amL.jpg'),
(10, 'Crispy Seaweed Thins', 'Sesame & Sea Salt Roasted Nori Snacks', 'Light, crispy seaweed sheets lightly seasoned with sesame and sea salt. A low-calorie, nutrient-dense snack.', '10-pack', 3.99, 10, '2025-02-15 04:51:12', '2025-02-15 04:51:12', 1, 1, NULL, 'products/kn67AnFpAa2wunNFH8RBshyevvWXkmVRieKcDXoU.png'),
(11, 'Dragonfruit Dream', 'Freeze-Dried Dragonfruit Cubes', 'Vibrant pink cubes with a sweet-tart flavor. Perfect for smoothie bowls, yogurt, or snacking. No additives.', '2oz pouch', 8.5, 12, '2025-02-15 04:52:09', '2025-02-15 04:52:09', 2, 1, NULL, 'products/uEN62jSv3KjZHK28ZfS9UeJHVqpbZ1r1GHUN6XkL.jpg'),
(12, 'Smoked Paprika Dust', 'Spanish Pimentón de La Vera', 'Authentic smoked paprika from Spain, adding depth to paella, grilled meats, or roasted potatoes.', '100g tin', 9.25, 15, '2025-02-15 04:53:13', '2025-02-15 04:53:13', 3, 1, NULL, 'products/xnZEY7IQ8lIfdCpFif7qwP5kSG65s4IL1euVrhZ9.jpg'),
(13, 'Cashew Camembert', 'Vegan Nut-Based Soft Cheese', 'Creamy, cultured cashew cheese with a bloomy rind. Dairy-free and rich in probiotics.', '150g', 14, 10, '2025-02-15 04:54:17', '2025-02-15 04:54:17', 1, 1, NULL, 'products/kDSbcIuKU6nlzPGH4gY376gSy1PcVS2v2XA3t1xK.jpg'),
(14, 'Salted Caramel Crunch', 'Artisanal Caramel Popcorn with Fleur de Sel', 'Handcrafted caramel-coated popcorn sprinkled with French sea salt. Sweet, salty, and irresistibly crunchy.', '8oz bag', 7.99, 10, '2025-02-15 04:55:28', '2025-02-15 04:55:28', 1, 1, NULL, 'products/PekK0ts80W9OxJ0MoiyYf8EifL5AOcCTe3wIs2bW.jpg'),
(15, 'Aurora Modular Sofa', 'Convertible 3-Seater with Memory Foam Cushions', 'A sleek, modular sofa with reversible chaise and premium linen upholstery. Perfect for open-concept living spaces.', NULL, 2499, 12, '2025-02-15 05:01:22', '2025-02-15 05:01:22', 2, 3, NULL, 'products/k0Khg7gFLeKOEP195hZRxBI1sjQLShRt9U3ijEzC.jpg'),
(16, 'Obsidian Marble Console', 'Handcrafted Black Marble Entryway Table', 'Striking black marble console with brass inlay details and two spacious drawers. Adds elegance to foyers or hallways.', NULL, 1850, 10, '2025-02-15 05:03:04', '2025-02-15 05:03:04', 1, 3, NULL, 'products/v7TnPY8JJCDGd7fZNkAk0R7oEos0uTMi3pjrWUvM.webp'),
(17, 'Boreal Reclaimed Wood Dining Table', 'Rustic Farmhouse Table for 8', 'Made from 100-year-old reclaimed pine, this table features a live-edge design and iron legs. Seats 8 comfortably.', NULL, 2999, 10, '2025-02-15 05:04:25', '2025-02-15 05:04:25', 1, 3, NULL, 'products/s9bKm0D9OdkWyvi3A86X7rIT1pn9C46anc1Ap5LU.webp'),
(18, 'Luna Adjustable Bed Frame', 'Smart Bed with Zero-Gravity Positioning', 'Motorized bed frame with built-in USB ports, under-bed lighting, and customizable sleep settings. Compatible with all mattresses.', NULL, 1799, 12, '2025-02-15 05:05:40', '2025-02-15 05:05:40', 2, 3, NULL, 'products/aWobbcym9UgghNLYMdwIb7qBaLhnQf1dwCVrHaa5.webp'),
(19, 'Nebula Pendant Light', 'Artisan Blown Glass Chandelier', 'Hand-blown glass pendant light with a celestial-inspired design. Creates a warm, diffused glow for dining areas or kitchens.', NULL, 675, 15, '2025-02-15 05:06:31', '2025-02-15 05:06:31', 3, 3, NULL, 'products/XFzn7JT7DZEYmZjuL5n9b4CvSuz8ublGvPGTFCDo.webp'),
(20, 'Fjord Ergonomic Office Chair', 'Lumbar-Support Executive Chair', 'Breathable mesh back, adjustable armrests, and 360-degree swivel. Designed for all-day comfort in home offices.', NULL, 449, 10, '2025-02-15 05:07:33', '2025-02-15 05:07:33', 1, 3, NULL, 'products/dO50GxTVo394Xf4tNBvY6BYOaAL0HlchhOVPkBA1.jpg'),
(21, 'Velvet Nomad Armchair', 'Mid-Century Accent Chair in Emerald Green', 'Bold velvet upholstery paired with walnut legs. A statement piece for reading nooks or living rooms.', NULL, 899, 10, '2025-02-15 05:08:41', '2025-02-15 05:08:41', 1, 3, NULL, 'products/JliUREDz0QJR3ZS6BknwWr8Vh3oohyRwLTrpl55U.webp'),
(22, 'Terra Floating Shelves', 'Minimalist Walnut Wall Shelves (Set of 3)', 'Sleek, wall-mounted shelves with hidden brackets. Ideal for displaying books, plants, or decor in small spaces.', NULL, 299, 10, '2025-02-15 05:09:36', '2025-02-15 05:09:36', 1, 3, NULL, 'products/m37rXlEKxz1XKbwPrH0uU3h3FfIFubqkI3NtsAxB.webp'),
(23, 'Horizon Media Cabinet', 'Mid-Century Modern TV Stand with Storage', 'Teak wood cabinet with hairpin legs, two sliding doors, and open shelving. Fits up to 65-inch TVs.', NULL, 1250, 15, '2025-02-15 05:10:38', '2025-02-15 05:10:38', 3, 3, NULL, 'products/piYLUT1uDEUF6AJQRp4JWcGNKyMgN4ycZBgQordR.jpg'),
(24, 'Solstice Outdoor Sectional', 'Weather-Resistant Wicker Lounge Set', 'All-weather rattan sectional with Sunbrella cushions. Includes a coffee table and seats 6—perfect for patios or balconies', NULL, 3499, 15, '2025-02-15 05:11:48', '2025-02-15 05:11:48', 3, 3, NULL, 'products/q1q2XRF9kYPYMHaG4iLMVN91NAjAQtKKU7d6ayhA.jpg'),
(25, 'VoltStream Pro', 'Smart Wi-Fi Surge Protector with USB-C', '8-outlet power strip with 4 USB ports (including 2 USB-C), app-controlled scheduling, and 4000-joule surge protection. Energy monitoring included.', NULL, 69.99, 10, '2025-02-15 05:25:47', '2025-02-15 05:25:47', 1, 4, NULL, 'products/Hl7hpMXMXjPOHdKf5HzbN8uPGh8B2vHkrODwbvua.jpg'),
(26, 'AeroBrew Elite', 'Programmable Espresso Machine with Milk Frother', '15-bar pressure espresso maker with customizable brew settings, rapid heat-up, and a built-in steam wand for lattes and cappuccinos.', NULL, 229, 10, '2025-02-15 05:26:55', '2025-02-15 05:26:55', 1, 4, NULL, 'products/rGZ8F7qEsMvzHzgIhDjly4JdGbhLxYrgF0LzfdvC.jpg'),
(27, 'Lumina 360°', 'Wi-Fi Smart LED Floor Lamp', 'Voice-controlled lamp with 16 million color options, dimming, and scheduling via Alexa/Google Home. Rotates 360° for adjustable ambient lighting.', NULL, 129.95, 15, '2025-02-15 05:28:02', '2025-02-15 05:28:02', 3, 4, NULL, 'products/GJnqF69OHWZn4hQKO5SFDl1Jseif1C2PjG0nSLkf.jpg'),
(28, 'FrostGuard Max', 'Energy Star Smart Refrigerator', '22 cu.ft. French door fridge with touchscreen, internal camera, and AI-powered temperature optimization. Connects to grocery apps.', NULL, 2499, 12, '2025-02-15 05:28:59', '2025-02-15 05:28:59', 2, 4, NULL, 'products/Y1RX0UGdIcQ75TZQ8yTnIqe9j57ayoqdCff7oa8N.png'),
(29, 'PowerPulse 10K', 'Portable Solar Generator with 10,000mAh', 'Solar-powered battery pack for camping/emergencies. Charges phones, laptops, and small appliances. Includes AC outlets and wireless charging pad.', NULL, 349, 15, '2025-02-15 05:29:51', '2025-02-15 05:29:51', 3, 4, NULL, 'products/nI3UgJVvyeXtvY9KEL34ctkS3gShyz8m4Nf12BGG.webp'),
(31, 'SonicBlade Quiet', 'Bladeless Tower Fan with HEPA Filter', 'Ultra-quiet fan with air purification, 90° oscillation, and 8 speed settings. Remote-controlled and energy-efficient.', NULL, 179.99, 12, '2025-02-15 05:31:31', '2025-02-15 05:31:31', 2, 4, NULL, 'products/HrVn92G0cj4cJPOYZWh8hSf9EBkY3z7kOM57x5in.jpg'),
(32, 'PixelGuard 4K', 'Outdoor Security Camera with AI Detection', 'Weatherproof 4K camera with night vision, motion tracking, and 2-way audio. Stores footage locally or in the cloud.', NULL, 199, 10, '2025-02-15 05:32:20', '2025-02-15 05:32:20', 1, 4, NULL, 'products/FtCUQaRAObgCdUZK3RsrXYwV7U4Xi1QENWOXanHM.jpg'),
(33, 'FlashCook Air', '6.5-Quart Digital Air Fryer', '7-in-1 appliance for frying, baking, roasting, and dehydrating. Pre-set cooking modes and non-stick dishwasher-safe basket.', NULL, 129.95, 12, '2025-02-15 05:33:03', '2025-02-15 05:33:03', 2, 4, NULL, 'products/VKRO4QS0FYWtzWQ6wyTrhsh9H3bjuCojHjj2l2Uj.webp'),
(34, 'HyperCharge Duo', '100W GaN Fast Charger (Dual USB-C)', 'Compact charger for laptops, tablets, and phones. Delivers 100W total output with foldable prongs for travel.', NULL, 79.5, 15, '2025-02-15 05:34:04', '2025-02-15 05:34:04', 3, 4, NULL, 'products/qnXfOoE5PkxT4JCjZiv4LCB6zWoon4u9yaPXyRT0.webp'),
(35, 'EchoVibe Pro', 'Noise-Canceling Wireless Earbuds', 'Bluetooth 5.3 earbuds with 30-hour playtime, IPX7 waterproofing, and customizable EQ. Ideal for workouts and calls.', NULL, 149, 10, '2025-02-15 05:34:59', '2025-02-15 05:34:59', 1, 4, NULL, 'products/Z9fKXoylSkcpGoYI2uJIqLQE0BdGigR32KAAzh0J.webp'),
(38, 'Midnight Mirage', 'Vegan Leather Moto Jacket', 'Cruelty-free faux leather jacket with quilted detailing, silver zippers, and a cropped fit. Perfect for edgy streetwear looks.', NULL, 149.99, 10, '2025-02-15 05:46:59', '2025-02-15 05:46:59', 1, 2, NULL, 'products/s1AdUxdS1KsCoe4Z8mIEbLm4Q0VSrmnZdL4piX5F.webp'),
(39, 'CloudTrek Joggers', 'High-Waisted Fleece Joggers', 'Ultra-soft, tapered joggers with an elastic waistband, side pockets, and ribbed cuffs. Ideal for lounging or gym-to-street style.', NULL, 59.95, 12, '2025-02-15 05:48:06', '2025-02-15 05:48:06', 2, 2, NULL, 'products/67dPA1RJIfmFEccV75sP6P0kvNh8W6Ntcd3fHtS7.webp'),
(40, 'SolarWave Tee', 'Unisex Organic Cotton Graphic T-Shirt', 'Lightweight tee made from 100% organic cotton, featuring a bold abstract sun print. Pre-shrunk for durability.', NULL, 34.5, 15, '2025-02-15 05:49:04', '2025-02-15 05:49:04', 3, 2, NULL, 'products/myuU7xV3BxAFddWqsGNOVomINKLhU42CRYdOEHN5.jpg'),
(41, 'Alpine Puffer Coat', 'Waterproof Recycled Down Parka', 'Eco-friendly winter coat filled with recycled down, featuring a detachable faux-fur hood and thermal-lined pockets.', NULL, 279, 10, '2025-02-15 05:50:50', '2025-02-15 05:50:50', 1, 2, NULL, 'products/wHcRw2qGtb4d1BZt6KIBsrKIW7Omnvs68VlC3Mwv.webp'),
(42, 'ZenLuxe Lounge Set', 'Matching Bamboo Fiber Hoodie & Joggers', 'Buttery-soft, breathable bamboo fabric set with a oversized hoodie and relaxed-fit joggers. Machine-washable.', NULL, 89.99, 10, '2025-02-15 05:51:39', '2025-02-15 05:51:39', 1, 2, NULL, 'products/ZMR0Mk92B8aVczNERTqxRCFrCC1MVPMxLdF1MTPI.webp'),
(43, 'Aurora Yoga Leggings', 'High-Compression 7/8 Leggings', 'Moisture-wicking, squat-proof leggings with a wide waistband and color-blocked ombre design. Perfect for HIIT or yoga.', NULL, 65, 15, '2025-02-15 05:53:55', '2025-02-15 05:53:55', 3, 2, NULL, 'products/3TdUMLnnesx4fXUtEque96bZWppnOeLL0ZCIGgOP.webp'),
(44, 'MarbleWave Scarf', 'Oversized Cashmere-Blend Wrap', 'Luxuriously soft scarf with a marbled gray-and-white pattern. Lightweight yet warm enough for transitional weather.', NULL, 89, 10, '2025-02-15 05:54:42', '2025-02-15 05:54:42', 1, 2, NULL, 'products/ItyJFB5vtei9aj8g6vz3NbxQXVDEJslV9wL0uiwk.jpg'),
(45, 'Terra Cargo Skirt', 'Utility Midi Skirt with Pockets', 'Heavy-duty cotton twill skirt featuring oversized cargo pockets, a belted waist, and an asymmetrical hem.', NULL, 74.99, 10, '2025-02-15 05:55:28', '2025-02-15 05:55:28', 1, 2, NULL, 'products/53U8HeLsati3EzBbH8KHWP256zIrWTG81wrHjfCh.webp'),
(46, 'SkyGlide XT', 'Lightweight Running Sneakers with Air Cushioning', 'Breathable mesh running shoes featuring responsive foam midsoles, reflective accents, and a grippy rubber outsole for road or trail runs.', NULL, 129.99, 12, '2025-02-15 06:04:17', '2025-02-15 06:04:17', 2, 6, NULL, 'products/OqSJOlUaqOm05n6XPFxBefxAVteNUgrQtzn3fU2X.jpg'),
(47, 'UrbanTrek Boot', 'Waterproof Ankle Boots for Men & Women', 'Rugged yet sleek boots with waterproof leather uppers, thermal insulation, and slip-resistant tread. Ideal for city commutes or light hiking.', NULL, 169.95, 15, '2025-02-15 06:06:43', '2025-02-15 06:06:43', 3, 6, NULL, 'products/EM0XqAdnqrYnK8fVNDGYVjMs6me8dTfoWn4ljYOi.webp'),
(48, 'Solstice Slide', 'Eco-Friendly Recycled EVA Sandals', 'Unisex slides made from 100% recycled EVA foam. Contoured footbed with arch support and quick-dry straps. Perfect for poolside or casual wear.', NULL, 39.5, 10, '2025-02-15 06:07:54', '2025-02-15 06:07:54', 1, 6, NULL, 'products/RCJTQ0m1evZZJWHIQHM1NdXFe7LXbE1PcNAGBeZs.webp'),
(49, 'VelvetLuxe Loafer', 'Vegan Suede Penny Loafers', 'Sophisticated slip-on loafers with a matte vegan suede finish, cushioned insole, and gold-tone hardware. Office-ready or weekend-chic.', NULL, 89, 10, '2025-02-15 06:08:47', '2025-02-15 06:08:47', 1, 6, NULL, 'products/UO5OBKEvemuUfZ3q8bAOa2EAwLeFnaKxAR8rXNmh.webp'),
(50, 'TrailBlaze Pro', 'Hiking Shoes with Vibram Outsole', 'Durable hiking shoes with Gore-Tex waterproofing, ankle support, and Vibram traction. Built for rocky terrain and long treks.', NULL, 199, 12, '2025-02-15 06:12:26', '2025-02-15 06:12:26', 2, 6, NULL, 'products/vqQTChbMs0NQWfXZekp3KnUNgit5wYqACt5oitdC.webp'),
(51, 'RetroWave 90s', 'Chunky Dad Sneakers in Neon Accents', 'Throwback sneakers with a chunky sole, neon piping, and retro branding. Combines ’90s nostalgia with modern comfort.', NULL, 109.95, 12, '2025-02-15 06:13:16', '2025-02-15 06:13:16', 2, 6, NULL, 'products/eYNDLVX0ABna0W1lL0mzQWpCJQe95RrR8YQ8LE8d.jpg'),
(52, 'BreezeKnit Slip-On', 'Breathable Knit Sneakers for Everyday Wear', 'Stretch-knit uppers with memory foam insoles and a flexible rubber sole. Machine-washable and ideal for travel or errands.', NULL, 74.99, 10, '2025-02-15 06:14:02', '2025-02-15 06:14:02', 1, 6, NULL, 'products/fkpDhtuAosW2EfGH005bxwordHXLwppbtLoVAui0.jpg'),
(53, 'StellarStiletto', 'Kitten Heel Pumps with Cushioned Arch', 'Elegant pointed-toe pumps with a 3-inch block heel, padded insole, and satin finish. Designed for all-day wear.', NULL, 139, 15, '2025-02-15 06:14:45', '2025-02-15 06:14:45', 3, 6, NULL, 'products/JtjV5EMU9Z8wpETlahUSVTWBY7AcW16Ihr1yTJCC.webp'),
(54, 'FrostGuard Boot', 'Insulated Winter Snow Boots', 'Heavy-duty boots with faux-fur lining, waterproof seams, and a thermal-rated outsole for sub-zero temperatures.', NULL, 149.95, 15, '2025-02-15 06:15:33', '2025-02-15 06:15:33', 3, 6, NULL, 'products/F3rNYDtc7i1YugObC7uVCV0aF3gXxh2goZQYZoxP.webp'),
(56, 'ZenBalance Sandal', 'Ergonomic Orthopedic Sandals', 'Podiatrist-approved sandals with adjustable straps, arch support, and a shock-absorbing sole. Ideal for plantar fasciitis relief.', NULL, 119, 12, '2025-02-15 06:17:40', '2025-02-15 06:17:40', 2, 6, NULL, 'products/Vzx6f82u9QZPSI8qchwpre3201f2poNse3vj88OL.webp');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KFh2ZDuiTJImkLCJeFQSid8797oQ7mElTcFs6KZa', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDZmTjVKVnpQUjFyMTE5Y2xpa3Bqb0FzRmJ4ZE9mcFI3eW9wcDhOcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1739702534);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
(1, 'Income tax', 10, '2025-02-10 16:07:21', '2025-02-10 16:07:21'),
(2, 'Excise Taxes', 12, '2025-02-11 07:07:03', '2025-02-11 07:07:03'),
(3, 'Capital Gains Tax', 15, '2025-02-11 07:07:41', '2025-02-11 07:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'ibrahim', 'ibrahim@gmail.com', NULL, '$2y$12$43JgUCuWo3np/RNmQzF3beJTHXUbOO3/AC12HPLrsV3QDqiLkLF0u', NULL, '2025-02-11 07:17:05', '2025-02-11 07:17:05', 1),
(2, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$12$ZWOZzdttC8u3diwIAESgnecuDcRP83NeQSH1b1ahb0vFymsVWGs9i', NULL, '2025-02-14 13:36:28', '2025-02-14 13:36:28', 0),
(3, 'abood', 'abood@gmail.com', NULL, '$2y$12$9CMe0fcc6oPsazda3CgXTezpuMXHYYwNZwHuHrCo3DdLKGUArWOlW', NULL, '2025-02-14 13:38:02', '2025-02-14 13:38:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_users_id_foreign` (`users_id`),
  ADD KEY `carts_products_id_foreign` (`products_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_taxes_id_foreign` (`taxes_id`),
  ADD KEY `products_categories_id_foreign` (`categories_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_taxes_id_foreign` FOREIGN KEY (`taxes_id`) REFERENCES `taxes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
