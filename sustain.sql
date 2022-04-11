-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2022 at 11:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sustain`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `newsletter` varchar(250) NOT NULL,
  `shipping` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(9) NOT NULL,
  `userId` int(9) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payMethod` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(9) NOT NULL,
  `name` varchar(70) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `keywords` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `name`, `price`, `category`, `description`, `img`, `keywords`) VALUES
(3, 'Ring Cuff Bracelet', '21.99', 'Bracelets', 'A polished steel bracelet with a main ring feature linked with a slim polished steel rope chain. Great for regular use or more upscale events.', 'img/ringcuffbracelet.png', 'bracelet silver polished steel ring slim sleek chain rope clean ecofriendly'),
(4, 'Simple Cuff Bracelet', '21.99', 'Bracelets', 'A unibody steel bracelet made from recast metals to create a great looking accessory perfect for any occasion. Pairs great with our other accessories for a more intricate, unique look.', 'img/simplecuffbracelet.png', 'bracelet unibody steel recast ecofriendly accessory clean sleek intricate complex sophisticated '),
(5, 'Burnt Sienna Brown Mineral Wrap Bracelet', '35.99', 'Bracelets', 'A natural mineral bracelet formed with sustainably sourced stones to create a unique multi-layered look perfect for casual wear. Bound with vegan leather featuring a smooth textured, natural look.', 'img/burntsiennabrown.jpeg', 'natural mineral ecofriendly colorful energy sustainable casual unique vegan '),
(6, 'Multicolor Glass Wrap Bracelet', '35.99', 'Bracelets', 'Re-blown from recycled glass this stylish bracelet features a hemp cord insert and lightly textured multicolor beads for a natural look. Perfect for casual events. ', 'img/multicolorglasswrap.png', 'recycled ecofriendly multicolor colorful charming elegant natural beaded casual recyclable recycled'),
(7, 'Tortoise Shell Glass Wrap Bracelet', '35.99', 'Bracelets', 'Sterling silver, featuring green semi-precious stone beads and other mixed metals wrapped in four stands of stretch cord.', 'img/tortoisglasswrap.jpeg', 'tortoise green colorful unique sleek silver ecofriendly beaded recycled stretch'),
(8, 'Majestic Blue Glass Wrap Bracelet', '35.99', 'Bracelets', 'Sterling silver, featuring blue semi-precious stone beads and other mixed metals wrapped in four stands of stretch cord.', 'img/majesticglasswrap.png', 'ecofriendly blue colorful unique sleek silver beaded recycled stretch'),
(9, 'Cool Ocean Breeze Glass Wrap Bracelet', '35.99', 'Bracelets', 'Sterling silver, semi-precious stone beads and other mixed metals wrapped in four stands of stretch cord. ', 'img/oceanglasswrap.png', 'silver turquoise stone stretch sleek ecofriendly colorful mixed metal glass cool '),
(10, 'Matte Multicolor Wrap Bracelet', '35.99', 'Bracelets', 'Sterling silver, semi-precious stone beads and other mixed metals wrapped in four stands of stretch cord.', 'img/matteglasswrap.png', 'silver stone stretch colorful multicolor matte sleek '),
(15, 'Sandy Stone Wrap Bracelet', '35.99', 'Bracelets', 'Sterling silver, semi-precious stone beads and other mixed metals wrapped in four strands of stretch cord.', 'img/sandwrapbracelet.jpeg', 'sand stone mixed precious solid color stretch wrap sterling silver '),
(16, 'Metallica Multi Stone Wrap Bracelet', '35.99', 'Bracelets', 'Sterling silver and bronze semi-precious stone beads and other mixed metals wrapped in four strands of stretch cord.', 'img/metallicawrapbracelet.png', 'metallica sterling silver bronze precious metal stretch colorful sharp sleek elegant'),
(17, 'Traditional Patterned Mini-Bead Bracelet', '25.00', 'Bracelets', 'Inspired by traditional American Indigenous designs, this bracelet features contrasting polished beads and a light hemp cord with a pull strap clasp. Great for casual wear or special events.', 'img/patternbeadbracelet.png', 'pattern traditional indigenous contrasting light colorful hemp casual formal'),
(18, 'Traditional Patterned Mini-Bead Bracelet', '25.00', 'Bracelets', 'Inspired by traditional American Indigenous designs, this bracelet features natural toned beads and a light hemp cord with a pull strap clasp. Great for casual wear or special events.', 'img/patternbeadbracelet-2.png', 'pattern traditional indigenous contrasting light colorful hemp casual formal'),
(19, 'Traditional Rope Bracelet', '22.99', 'Bracelets', 'Inspired by traditional American Indigenous designs, this bracelet features a weaved pattern that is specially designed to create a textured look while feeling smooth and soft to the touch. Great for casual events and wear.', 'img/tradropebracelet.png', 'traditional rope bracelet weaved textured smooth soft casual colorful elegant elaborate'),
(20, 'Multi-Color Brass Geode Ring', '19.99', 'Rings', 'Brass ring with a finely milled pattern featuring inserted texture geode stones of assorted colors. Great for casual and format events.', 'img/colorgeodering.png', 'colorful geode ring brass elegant sleek fancy formal casual decorative'),
(21, 'Variety Pack (4 Rings)', '19.99', 'Rings', 'Our special 4 pack of thin stylish rings perfect to stack for a intricate look or as a sole ring. Includes two steel, one copper, and one brass ring.', 'img/variety4pack.png', 'steel brass copper ring stylish sleek colorful variety '),
(22, 'Chevron Bend Ring', '19.99', 'Rings', 'A thin band with a unique chevron top style made from recast steel. Polished to perfection and perfect for a small addition to most situations.', 'img/chevronbendring.png', 'chevron thin silver unique elegant clean polished steel ring'),
(23, 'Embossed Ring Set', '25.99', 'Rings', 'A set of matching gold and steel cast rings sourced from remelted metals. Embossed floral patterns are featured on both, great for sharing with a friend as a gift and stylish on any occasion.', 'img/embossedringset.png', 'embossed ring friend split floral ring steel gold remelted ecofriendly gift'),
(24, 'Spiral Mineral Ring', '25.99', 'Rings', 'A stylish smooth natural abstract spiral design perfect for upscale events as an intriguing accessory. The polished mineral design creates a comfortable and easy to wear feeling.', 'img/spiralmineralring.png', 'spiral mineral smooth stylish natural intriguing unique polished comfortable'),
(25, 'Thin Five Ring Set', '29.99', 'Rings', 'A combination of brass, steel, and copper rings in a variety of different engraved designs. Great for stacking for a unique look or as a standalone addition to daily wear. Good for casual wear as well as more varied occasions.', 'img/fiveringset.png', 'combination brass steel copper ring variety engraved unique standalone daily comfortable casual flexible'),
(26, 'Multi Colored Ring', '25.00', 'Rings', 'A combination of polished brass, steel, and copper rings. Great for a unique look or as a standalone addition to daily wear. Good for casual wear as well as more varied occasions.', 'img/multicoloredring.png', 'colorful multiple brass steel copper ring unique standalone casual sleek polished'),
(27, 'Infinity Necklace', '30.00', 'Necklaces', 'A brass double stacked pendant with a finely sealed wax main necklace. Great for additions to casual wear or for finer occasions alike.', 'img/infinitynecklace.png', 'brass double stacked wax casual infinity pendant necklace elegant'),
(28, 'Beaded Mineral Necklace', '15.99', 'Necklaces', 'A waxed hemp cord necklace featuring sustainably sourced mineral ore. Stones are polished into a natural textured pattern. Nice for casual wear or finer occasions.', 'img/beadedmineralnecklace.png', 'wax hemp cord necklace sustainable ecofriendly mineral stone polished natural casual elegant colorful'),
(29, 'Earth Tone Mineral Necklace', '19.99', 'Necklaces', 'A waxed hemp cord interior with shaped and polished minerals to create a stylish design perfect for casual wear.', 'img/earthmineralnecklace.png', 'earth necklace mineral colorful wax hemp cord stylish elegant polished casual'),
(30, 'Brass Pearl Necklace', '29.99', 'Necklaces', 'A recast brass link necklace featuring a main brass and pearl charm with the necklace featuring small pearls in segments of the links. This necklace is great for upscale events or special occasions.', 'img/brasspearlnecklace.png', 'brass pearl necklace recast ecofriendly charm pearls links fancy elegant'),
(31, 'Brass Feather Necklace', '25.99', 'Necklaces', 'A smoothed vegan leather necklace with a minimalist touch. Features a brass feather design that is perfect for casual wear for a natural touch.', 'img/brassfeathernecklace.png', 'brass feather necklace smooth vegan leather minimalist casual elegant fancy'),
(32, 'Jade Pendant Necklace', '29.99', 'Necklaces', 'A small link necklace featuring a main brass pendant with a jade mineral stone insert. Features small jade fixtures within the construction of the necklace, perfect for upscale occasions or special occasions.', 'img/jadependantnecklace.png', 'jade pendant necklace brass mineral polished upscale fancy elegant link '),
(33, 'Thin Mineral Link Necklace', '15.99', 'Necklaces', 'A durable, thin, waxed hemp interior with polished mineral accents to accompany. Perfect for casual wear or as a nice addition to more formal attire.', 'img/minerallinknecklace.png', 'mineral thin polished casual formal elegant thin wax hemp durable ecofriendly'),
(34, 'Light Wood Charm Necklace', '19.99', 'Necklaces', 'A dark dyed, waxed hemp cord necklace with a light wood accent for a natural look and feel. Perfect for casual wear.', 'img/woodcharmnecklace.png', 'wood charm necklace light accent natural ecofriendly wax hemp casual elegant distinct'),
(35, 'Five Stone Pendant Necklace', '19.99', 'Necklaces', 'A waxed hemp cord necklace with 5 featured small polished ineral pendants with small mineral inserts in the main necklace. Sleek to the touch and light, great for casual wear.', 'img/fivestonenecklace.png', 'five stone pendant necklace wax hemp cord mineral polished sleek elegant casual fancy'),
(36, 'Brass Oval Charm Necklace', '19.99', 'Necklaces', 'A hemp cord necklace featuring an oval pendant with additional brass fixtures within the design of the cord. Good for upscale occasions or casual wear.', 'img/brassovalnecklace.png', 'hemp oval cord necklace pendant brass upscale fancy elegant casual'),
(37, 'Triple Stone Necklace', '22.99', 'Necklaces', 'A thin, dark dyed hemp cord necklace sealed with our in-house jewelry wax featuring a rounded disk triple stone mineral ornament. Great for minimalist or natural looks.', 'img/triplestonenecklace.png', 'triple stone necklace thin dark dyed hemp cord wax round mineral ornament minimalist natural elegant fancy'),
(38, 'Double Brass Disc Necklace', '25.99', 'Necklace', 'Brass formed into a beautiful, disced necklace.', 'img/doublediscnecklace.jpeg', 'brass beautiful elegant fancy formal casual ecofriendly'),
(39, 'Endless Drop Short Earrings', '21.00', 'Earrings', 'Brass piece hung by sterling silver ear wires. Light and comfortable for any occasion you are attending.', 'img/dropshortearrings.png', 'brass hung sterling silver wires earrings light comfortable fancy elegant'),
(40, 'Endless Drop Short Earrings', '21.00', 'Earrings', 'Silver piece hung by sterling silver ear wires. Light and comfortable for any occasion you are attending.', 'img/dropshortearrings-2.png', 'hung sterling silver wires earrings light comfortable fancy elegant'),
(41, 'Dangled Oval Short Earrings', '21.99', 'Earrings', 'Brass plates hung by sterling silver ear wires. Light and comfortable for any occasion you are attending.', 'img/ovalshortearrings.png', 'brass hung sterling silver ear light comfortable fancy elegant ecofriendly'),
(42, 'Dangled Oval Short Earrings', '21.00', 'Earrings', 'Sterling silver plates hung by sterling silver ear wires. Light and comfortable for any occasion you are attending.', 'img/ovalshortearrings-2.png', 'hung sterling silver ear light comfortable fancy elegant ecofriendly'),
(43, 'Flashy Drop Earrings', '25.00', 'Earrings', 'Plated silver earrings and hung with sterling silver ear wires. Feather light to make it comfortable to wear and to also wear for long periods of time. Perfect for casual wear or as a nice addition to more formal attire.', 'img/flashydropearrings.png', 'plated sterling silver feather light comfortable casual fancy formal elegant ecofriendly'),
(44, 'Flashy Drop Earrings', '25.00', 'Earrings', 'Platted brass earrings and hung with sterling silver ear wires. These are feather-light to make it comfortable to wear and to also wear for long periods of time. Perfect for casual wear or as a nice addition to more formal attire.', 'img/flashydropearrings-2.png', 'plated brass sterling silver feather light comfortable casual fancy formal elegant ecofriendly'),
(45, 'Darling Double Hoop Earrings', '25.00', 'Earrings', 'Combined metals of sterling silver and brass, hung with sterling silver ear wires. Pendants of sterling silver will not let yo0u down. These shimmering earrings will work with any outfit of the occasion.', 'img/doublehoopearrings.png', 'double hooper metal sterling silver brass hung pendants pendant shimmering elegant casual fancy formal ecofriendly'),
(46, 'Pink Sapphire Gemstone Short Earrings', '30.00', 'Earrings', 'Natural gemstone hung with sterling silver ear wires. One of the rarest gemstones you will come across. This gem will sure grab the attention of any crowd you walk in. Perfect for casual wear or as a nice addition to more formal attire.', 'img/pinksapphireearrings.png', 'pink sapphire gemstone natural sterling silver rare attention casual formal elegant fancy ecofriendly'),
(47, 'Moonstone Gemstone Short Earrings', '30.00', 'Earrings', 'Natural gemstone hung with sterling silver ear wires. One of the rarest gemstones you will come across. This gem will sure grab the attention of any crowd you walk in. Perfect for casual wear or as a nice addition to more formal attire.', 'img/moonstoneearrings.png', 'moonstone natural gemstone white gem attention casual formal elegant fancy ecofriendly sterling silver'),
(48, 'Apatite Gemstone Short Earrings', '30.00', 'Earrings', 'Natural gemstone hung with sterling silver ear wires. This gem will surely grab the attention of any crowd you walk in. Perfect for casual wear or as a nice addition to more formal attire.', 'img/apatiteearrings.png', 'natural gemstone apatite earrings ecofriendly silver sterling gem attention casual formal fancy elegant'),
(49, 'Textured Hoop Earrings', '25.00', 'Earrings', 'Brass is sourced from remelted metals. Embossed floral patterns are featured on the earrings. These earrings are great for wearing out on a night in the town.', 'img/texturedhoopearrings.png', 'brass remelted ecofriendly floral elegant embossed fancy casual elegant '),
(50, 'Textured Hoop Earrings', '25.00', 'Earrings', 'Steel is sourced from remelted metals. Embossed floral patterns are featured on the earrings. These earrings are great for wearing out on a night in the town.', 'img/texturedhoopearrings-2.png', 'steel remelted ecofriendly floral elegant embossed fancy casual elegant '),
(51, 'Darling Single Hoop Earrings', '25.00', 'Earrings', 'Sterling silver hung from sterling silver ear wires. Pendants of sterling silver will not let you down. These shimmering earrings will work with any outfit of the occasion.', 'img/darlinghoopearrings.png', 'sterling silver pendants shimmering elegant fancy casual formal ecofriendly'),
(52, 'Darling Single Hoop Earrings', '25.00', 'Earrings', 'Brass hung with brass ear wires. Pendants of gold will not let you down. These shimmering earrings will work with any outfit of the occasion.', 'img/darlinghoopearrings-2.png', 'brass gold pendants shimmering elegant fancy casual formal ecofriendly'),
(53, 'Textured Flower Earrings', '21.00', 'Earrings', 'Brass is sourced from remelted metals. Embossed floral patterns are featured, perfect for everyday wear or casual wear.', 'img/flowerearrings.png', 'brass remelted embossed floral everyday casual formal elegant fancy ecofriendly'),
(54, 'Beaded Mineral Earrings', '30.00', 'Earrings', 'Waxed hemp cord wrapped around sterling silver earrings featuring sustainably sourced mineral ore. Stones are polished into a nautral textured pattern. Simple and beautiful for any outfit.', 'img/beadedmineralearrings.png', 'wax hemp cord sterling silver sustainable mineral stones polished natural textured elegant fancy casual ecofriendly'),
(55, 'Starlight Earrings', '30.00', 'Earrings', 'Beaded, crystal, brass, and copper material all in our fun starlight earrings. Perfect for casual wear or as a nice addition to more formal attire.', 'img/starlightearrings.png', 'beaded crystal brass copper starlight earrings casual formal fancy elegant ecofriendly colorful unique'),
(56, 'Hammered Steel Ring (Black Powder Coated Steel)', '26.99', 'Rings', 'A black hammered style ring crafted with quality and sustainability in mind.', 'img/blkhammersteelring.jpeg', 'black ring quality sustainability sustainable ecofriendly powder coat dark sleek '),
(57, 'Hammered Steel Ring (Copper)', '26.99', 'Rings', 'A copper hammered style ring crafted with quality and sustainability in mind.', 'img/cophammersteelring.jpeg', 'copper ring quality sustainability sustainable ecofriendly light sleek '),
(58, 'Silver Acid Etching Ring', '34.99', 'Rings', 'Acid etched high tempered steel made to last for generations. Slight indentations on the rings edges for style. ', 'img/silveracidring.jpeg', 'silver acid ring indentation stylish dark sleek steel etched durable ecofriendly sustainable'),
(59, 'Natural Brass Ring', '29.99', 'Rings', 'A natural brass that was hand cut and polished using traditional methods. Choose this for a natural yet refined look.', 'img/naturalbrassring.jpeg', 'natural ecofriendly brass cut polished refined sleek bright eyecatching'),
(60, 'Woven PET Bracelet', '13.99', 'Bracelets', 'A woven bracelet with a blued steel clasp using recycled PET plastics to create a stylish addition to daily wear.', 'img/wovenPETbracelet.jpeg', 'woven bracelet PET steel recycled ecofriendly sustainable plastic stylish daily black dark'),
(61, 'Thin Vegan Leather Bracelet', '8.99', 'Bracelets', 'A thin vegan leather bracelet capped with resourced brass that works well with other accessories on a wrist or as a standalone feature.', 'img/veganleatherbracelet.jpeg', 'vegan leather bracelet thin brass standalone ecofriendly sustainable '),
(62, 'Lava Stone Pull Bracelet', '14.99', 'Bracelets', 'A Lava Stone and rope construction featuring brass accents and stylings. Great for semi-formal occasions and casual wear.', 'img/lavastonepullbracelet.jpeg', 'lava stone pull bracelet formal casual ecofriendly sustainable black dark brass'),
(63, 'Natural Mineral Bead Bracelet', '18.99', 'Bracelets', 'A vegan leather-bound bracelet featuring a blued steel clasp and mineral beads.', 'img/naturalmineralbeadbracelet.jpeg', 'natural mineral bead bracelet fancy vegan leather steel ecofriendly sustainable'),
(64, 'Steel Micro Rope Necklace', '23.99', 'Necklaces', 'A skilfully crafted necklace featuring flush links that form a seamless pattern sure to impress. Stylish with most outfits and accessories. ', 'img/steelmicronecklace.jpeg', 'links pattern steel micro necklace formal casual ecofriendly sustainable'),
(65, 'Rustic Steel Linked Necklace', '29.99', 'Necklaces', 'A rustic accented necklace based in traditional roman designs adapted for a modern time. Great for casual wear or for events. ', 'img/steellinkednecklace.jpeg', 'rustic accented steel linked necklace traditional roman modern casual formal ecofriendly sustainable'),
(66, 'Rustic Amber Necklace', '24.99', 'Necklaces', 'Natural Carved Amber linked using a vegan leather rope insert. Perfect for casual occasions or any nature based activity. ', 'img/rusticambernecklace.jpeg', 'rustic amber necklace carved natural linked vegan leather rope casual nature ecofriendly sustainable'),
(67, 'Tiger Eye Beaded Necklace', '17.99', 'Necklaces', 'A mesmerising polished tiger eye mineral necklace. Perfect for natural themed special occasions or casual wear around town. ', 'img/tigereyenecklace.jpeg', 'tiger eye necklace polished mineral natural themed formal casual ecofriendly sustainable'),
(68, 'Dark Ebony Wood Studs', '6.99', 'Earrings', 'A buffed ebony wood sealed with our in house skin safe wood sealer built to last. Stylish for any occasions. ', 'img/darkebonywoodstuds.jpeg', 'buffed ebony wood sealed stylish formal casual dark sleek ecofriendly sustainble'),
(69, 'Light Balsa Wood Studs', '6.59', 'Earrings', 'Natural Balsa wood studs built with stainless steel inserts. Wood is sealed with our in house wood sealer formulated to be skin safe. ', 'img/lightbalsawoodstuds.jpeg', 'natural balsa wood studs stainless steel sealed light casual formal ecofriendly sustainable'),
(70, 'Brass Colored Stainless Steel Studs', '5.99', 'Earrings', 'A process tinted stainless steel pair of studs perfect for any formal events or casual interactions. ', 'img/brasscolouredstuds.jpeg', 'tinted stainless steel studs formal casual bright eyecatching ecofriendly sustainable'),
(71, 'Black Textured Mineral Ore Earrings', '7.99', 'Earrings', 'Black metal frames with mineral ore disk inserts. Mineral ore is textured for a natural look perfect for casual wear.', 'img/blktexturedoreearrings.jpeg', 'black textured metal mineral ore disk natural elegant sleek dark ecofriendly sustainable');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(9) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
