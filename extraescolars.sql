-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: arigomysql10.db
-- Generation Time: Aug 22, 2020 at 11:28 AM
-- Server version: 10.3.17-MariaDB-1:10.3.17+maria~xenial
-- PHP Version: 7.3.13-nfsn1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extraescolars`
--
CREATE DATABASE IF NOT EXISTS `extraescolars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `extraescolars`;

-- --------------------------------------------------------

--
-- Table structure for table `altres-cursos-extraescolar`
--

CREATE TABLE `altres-cursos-extraescolar` (
  `altcurext` int(11) NOT NULL,
  `extescid` int(11) NOT NULL,
  `cursid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `altres-cursos-extraescolar`
--

INSERT INTO `altres-cursos-extraescolar` (`altcurext`, `extescid`, `cursid`) VALUES
(1, 254, 3);

-- --------------------------------------------------------

--
-- Table structure for table `alumnes`
--

CREATE TABLE `alumnes` (
  `alumneid` int(11) NOT NULL,
  `nom` char(25) NOT NULL,
  `llinatge1` char(25) NOT NULL,
  `llinatge2` char(25) NOT NULL,
  `cursid` int(11) NOT NULL,
  `classeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumnes`
--

INSERT INTO `alumnes` (`alumneid`, `nom`, `llinatge1`, `llinatge2`, `cursid`, `classeid`) VALUES
(484, 'COLTON', 'SHANNON', 'MARSHALL\r\n', 14, 20),
(485, 'AMELIA', 'BURT', 'SHAW\r\n', 14, 20),
(486, 'RASHAD', 'CORTEZ', 'BLAKE\r\n', 14, 20),
(487, 'DEVIN', 'HOBBS', 'JOYCE\r\n', 14, 20),
(488, 'KAREEM', 'RICH', 'CASE\r\n', 14, 20),
(489, 'LEE', 'HOLMES', 'WARE\r\n', 14, 20),
(490, 'AMETHYST', 'HARRINGTON', 'HOOPER\r\n', 14, 20),
(491, 'ZEUS', 'TREVINO', 'FRANKS\r\n', 14, 20),
(492, 'YOLANDA', 'HALE', 'LOTT\r\n', 14, 20),
(493, 'MELODIE', 'YATES', 'SHANNON\r\n', 14, 20),
(494, 'EATON', 'CANTU', 'CUMMINGS\r\n', 14, 20),
(495, 'WARREN', 'HURLEY', 'KANE\r\n', 14, 20),
(496, 'RAY', 'JOYNER', 'MCKAY\r\n', 14, 20),
(497, 'NIGEL', 'SHARPE', 'SERRANO\r\n', 14, 20),
(498, 'HUNTER', 'BOONE', 'HAMMOND\r\n', 14, 20),
(499, 'SASHA', 'GARZA', 'SOLIS\r\n', 14, 20),
(500, 'MELODIE', 'BATES', 'DUFFY\r\n', 14, 20),
(501, 'ADENA', 'POTTS', 'POPE\r\n', 14, 20),
(502, 'CASSANDRA', 'GARCIA', 'RAMOS\r\n', 14, 20),
(503, 'MASON', 'FIGUEROA', 'MORAN\r\n', 14, 20),
(504, 'SIGOURNEY', 'LAMBERT', 'ESPINOZA\r\n', 14, 20),
(505, 'RACHEL', 'PITTMAN', 'FARMER\r\n', 14, 20),
(506, 'LEILANI', 'DAVIS', 'MERRITT\r\n', 14, 20),
(507, 'MACON', 'WALTON', 'YATES\r\n', 14, 20),
(508, 'AUSTIN', 'CARLSON', 'NGUYEN\r\n', 14, 20),
(509, 'CADE', 'DRAKE', 'PARSONS\r\n', 14, 21),
(510, 'MARGARET', 'WATSON', 'BEST\r\n', 14, 21),
(511, 'SETH', 'MCCARTY', 'BUCHANAN\r\n', 14, 21),
(512, 'MICHAEL', 'KIRKLAND', 'GILMORE\r\n', 14, 21),
(513, 'OREN', 'MCCALL', 'HOWARD\r\n', 14, 21),
(514, 'COOPER', 'WALLS', 'WALL\r\n', 14, 21),
(515, 'SHAFIRA', 'HAYES', 'PERRY\r\n', 14, 21),
(516, 'JAYME', 'NASH', 'PECK\r\n', 14, 21),
(517, 'JADE', 'PARK', 'HUMPHREY\r\n', 14, 21),
(518, 'HAMISH', 'ALLISON', 'RAY\r\n', 14, 21),
(519, 'GRAHAM', 'TOWNSEND', 'DIXON\r\n', 14, 21),
(520, 'MEGAN', 'HODGES', 'BALLARD\r\n', 14, 21),
(521, 'ALINE', 'LAWRENCE', 'YOUNG\r\n', 14, 21),
(522, 'BRITANNI', 'COOLEY', 'DAVIDSON\r\n', 14, 21),
(523, 'QUINCY', 'CORTEZ', 'TRUJILLO\r\n', 14, 21),
(524, 'OWEN', 'LANG', 'JOHNSON\r\n', 14, 21),
(525, 'BRODY', 'PETERSON', 'WEBB\r\n', 14, 21),
(526, 'ROBERT', 'MORTON', 'LAMB\r\n', 14, 21),
(527, 'KELLY', 'OBRIEN', 'ONEAL\r\n', 14, 21),
(528, 'QUAIL', 'FLYNN', 'NORTON\r\n', 14, 21),
(529, 'TALLULAH', 'WELCH', 'MASSEY\r\n', 14, 21),
(530, 'EBONY', 'RANDALL', 'SOLOMON\r\n', 14, 21),
(531, 'GUINEVERE', 'GOMEZ', 'MARSH\r\n', 14, 21),
(532, 'VERNON', 'WEBB', 'CARPENTER\r\n', 14, 21),
(533, 'MELANIE', 'HALL', 'GALLAGHER\r\n', 14, 21),
(534, 'BRETT', 'KANE', 'GOMEZ\r\n', 14, 22),
(535, 'RAYMOND', 'GOODMAN', 'GUERRERO\r\n', 14, 22),
(536, 'ALLEN', 'FINLEY', 'CURTIS\r\n', 14, 22),
(537, 'BREE', 'HALL', 'WASHINGTON\r\n', 14, 22),
(538, 'SHAY', 'JAMES', 'SNYDER\r\n', 14, 22),
(539, 'LYLE', 'WEBSTER', 'NAVARRO\r\n', 14, 22),
(540, 'LESLIE', 'ROMAN', 'WILCOX\r\n', 14, 22),
(541, 'CALVIN', 'LAMBERT', 'FARLEY\r\n', 14, 22),
(542, 'CEDRIC', 'WADE', 'HUFF\r\n', 14, 22),
(543, 'HECTOR', 'HART', 'HAHN\r\n', 14, 22),
(544, 'LAVINIA', 'HUNT', 'WINTERS\r\n', 14, 22),
(545, 'ALTHEA', 'HUBBARD', 'BENJAMIN\r\n', 14, 22),
(546, 'TRAVIS', 'DOWNS', 'ENGLISH\r\n', 14, 22),
(547, 'MARIKO', 'ACEVEDO', 'RAYMOND\r\n', 14, 22),
(548, 'HEDLEY', 'POLLARD', 'SHEPARD\r\n', 14, 22),
(549, 'SONIA', 'WALSH', 'ELLIS\r\n', 14, 22),
(550, 'ARIANA', 'LE', 'CHEN\r\n', 14, 22),
(551, 'CLINTON', 'LOVE', 'CUMMINGS\r\n', 14, 22),
(552, 'ABRA', 'ALEXANDER', 'DANIEL\r\n', 14, 22),
(553, 'RUBY', 'MCCLURE', 'RIDDLE\r\n', 14, 22),
(554, 'JORDAN', 'MOODY', 'SLATER\r\n', 14, 22),
(555, 'LANCE', 'ORTEGA', 'MANN\r\n', 14, 22),
(556, 'RALPH', 'LUNA', 'HOLLOWAY\r\n', 14, 22),
(557, 'YAEL', 'MACDONALD', 'MARKS\r\n', 14, 22),
(558, 'URIAH', 'BOWMAN', 'MANNING\r\n', 14, 22),
(559, 'DORIAN', 'VELEZ', 'COMBS\r\n', 15, 23),
(560, 'ALI', 'LEE', 'MCKENZIE\r\n', 15, 23),
(561, 'BURKE', 'BAILEY', 'COLLINS\r\n', 15, 23),
(562, 'CONAN', 'WILEY', 'FREDERICK\r\n', 15, 23),
(563, 'NATALIE', 'LE', 'ACOSTA\r\n', 15, 23),
(564, 'STACY', 'HARRIS', 'HOOD\r\n', 15, 23),
(565, 'MACKENZIE', 'HODGES', 'KEITH\r\n', 15, 23),
(566, 'WESLEY', 'BIRD', 'CROSS\r\n', 15, 23),
(567, 'KANE', 'GRAHAM', 'HURLEY\r\n', 15, 23),
(568, 'SOPHIA', 'PARKS', 'WITT\r\n', 15, 23),
(569, 'CHRISTOPHER', 'WEBSTER', 'MORRIS\r\n', 15, 23),
(570, 'RALPH', 'WOODS', 'MOODY\r\n', 15, 23),
(571, 'LAITH', 'KIRK', 'WORKMAN\r\n', 15, 23),
(572, 'RAJAH', 'PHELPS', 'ROJAS\r\n', 15, 23),
(573, 'HARDING', 'DENNIS', 'AYERS\r\n', 15, 23),
(574, 'JEREMY', 'BALDWIN', 'GAY\r\n', 15, 23),
(575, 'ALLEN', 'MEADOWS', 'HOFFMAN\r\n', 15, 23),
(576, 'HILLARY', 'FOWLER', 'HOWELL\r\n', 15, 23),
(577, 'NITA', 'ACEVEDO', 'KRAMER\r\n', 15, 23),
(578, 'SALVADOR', 'WATERS', 'ROSARIO\r\n', 15, 23),
(579, 'REMEDIOS', 'PERKINS', 'HAYDEN\r\n', 15, 23),
(580, 'JULIET', 'WILLIAMSON', 'MORROW\r\n', 15, 23),
(581, 'FIONA', 'DELEON', 'GRIMES\r\n', 15, 23),
(582, 'JERRY', 'DECKER', 'CANTRELL\r\n', 15, 23),
(583, 'INGA', 'MCCOY', 'SOLOMON\r\n', 15, 23),
(584, 'HARLAN', 'DOTSON', 'HOPKINS\r\n', 15, 24),
(585, 'WENDY', 'RANDOLPH', 'MCGOWAN\r\n', 15, 24),
(586, 'JEROME', 'PETERSON', 'DAY\r\n', 15, 24),
(587, 'BRETT', 'PATTON', 'LOGAN\r\n', 15, 24),
(588, 'MARSHALL', 'MCNEIL', 'KLINE\r\n', 15, 24),
(589, 'TASHYA', 'EVANS', 'ROGERS\r\n', 15, 24),
(590, 'AUDRA', 'SHARP', 'BERG\r\n', 15, 24),
(591, 'KAREEM', 'BURRIS', 'INGRAM\r\n', 15, 24),
(592, 'NOEL', 'GUTIERREZ', 'ADKINS\r\n', 15, 24),
(593, 'BEVERLY', 'HART', 'MUNOZ\r\n', 15, 24),
(594, 'RASHAD', 'WHITE', 'JENSEN\r\n', 15, 24),
(595, 'HADLEY', 'WOOTEN', 'KLEIN\r\n', 15, 24),
(596, 'GAVIN', 'CANNON', 'PUGH\r\n', 15, 24),
(597, 'JUSTINA', 'WILLIS', 'BERG\r\n', 15, 24),
(598, 'CYRUS', 'REED', 'EVERETT\r\n', 15, 24),
(599, 'COLT', 'CERVANTES', 'SHAW\r\n', 15, 24),
(600, 'VINCENT', 'CLEMONS', 'HEAD\r\n', 15, 24),
(601, 'DEIRDRE', 'ORTEGA', 'BYRD\r\n', 15, 24),
(602, 'BERNARD', 'PARKER', 'BUCKNER\r\n', 15, 24),
(603, 'ABRAHAM', 'BRIGHT', 'KRAMER\r\n', 15, 24),
(604, 'JORDEN', 'GUERRERO', 'FLYNN\r\n', 15, 24),
(605, 'ROSS', 'GATES', 'BROCK\r\n', 15, 24),
(606, 'SHAFIRA', 'BALL', 'KNOX\r\n', 15, 24),
(607, 'CONNOR', 'WALSH', 'RAMSEY\r\n', 15, 24),
(608, 'NEVE', 'HENDRICKS', 'LITTLE\r\n', 15, 24),
(609, 'LINDA', 'DORSEY', 'MELTON\r\n', 15, 25),
(610, 'IGNATIUS', 'REYES', 'FARMER\r\n', 15, 25),
(611, 'DOMINIC', 'WATSON', 'KNOX\r\n', 15, 25),
(612, 'QUINN', 'LARSEN', 'SLOAN\r\n', 15, 25),
(613, 'NEHRU', 'CARNEY', 'ROBBINS\r\n', 15, 25),
(614, 'FRANCESCA', 'BAXTER', 'LEE\r\n', 15, 25),
(615, 'SHEA', 'WILKERSON', 'JOHNSON\r\n', 15, 25),
(616, 'GRAY', 'RAMIREZ', 'RAMOS\r\n', 15, 25),
(617, 'NEVADA', 'MCCULLOUGH', 'WARE\r\n', 15, 25),
(618, 'SIMON', 'WILEY', 'BRADSHAW\r\n', 15, 25),
(619, 'GIACOMO', 'LONG', 'CASE\r\n', 15, 25),
(620, 'APHRODITE', 'SHANNON', 'MOORE\r\n', 15, 25),
(621, 'BRENT', 'NEAL', 'BLAIR\r\n', 15, 25),
(622, 'JANE', 'DAVIDSON', 'BALL\r\n', 15, 25),
(623, 'CAIRO', 'BALLARD', 'MATHIS\r\n', 15, 25),
(624, 'FITZGERALD', 'CARNEY', 'HEWITT\r\n', 15, 25),
(625, 'HYACINTH', 'BRYAN', 'CHRISTENSEN\r\n', 15, 25),
(626, 'MADELINE', 'RODGERS', 'BRUCE\r\n', 15, 25),
(627, 'MARTIN', 'ELLISON', 'DAVENPORT\r\n', 15, 25),
(628, 'QUENTIN', 'SHARP', 'BONNER\r\n', 15, 25),
(629, 'ZOE', 'HOPPER', 'CRAWFORD\r\n', 15, 25),
(630, 'MERRITT', 'ALEXANDER', 'FLYNN\r\n', 15, 25),
(631, 'RAHIM', 'BOONE', 'WALL\r\n', 15, 25),
(632, 'JERRY', 'DOMINGUEZ', 'CRAIG\r\n', 15, 25),
(633, 'ACTON', 'VALENTINE', 'SOSA\r\n', 15, 25),
(634, 'BORIS', 'DIAZ', 'PATEL\r\n', 16, 26),
(635, 'SALVADOR', 'HOLDEN', 'MCGUIRE\r\n', 16, 26),
(636, 'SIMONE', 'MCDONALD', 'COLON\r\n', 16, 26),
(637, 'OCTAVIUS', 'SPARKS', 'BENTLEY\r\n', 16, 26),
(638, 'MYRA', 'VILLARREAL', 'HENSLEY\r\n', 16, 26),
(639, 'ALEXA', 'BURRIS', 'HAYES\r\n', 16, 26),
(640, 'HOYT', 'BERNARD', 'RIGGS\r\n', 16, 26),
(641, 'JACOB', 'WOODWARD', 'RODGERS\r\n', 16, 26),
(642, 'KELLY', 'SOLIS', 'JEFFERSON\r\n', 16, 26),
(643, 'INDIA', 'BROWN', 'JUAREZ\r\n', 16, 26),
(644, 'ASHER', 'KIDD', 'CALDERON\r\n', 16, 26),
(645, 'REBECCA', 'TATE', 'HIGGINS\r\n', 16, 26),
(646, 'CAMERON', 'ATKINSON', 'WOLFE\r\n', 16, 26),
(647, 'WILMA', 'ANDERSON', 'AGUILAR\r\n', 16, 26),
(648, 'SKYLER', 'BARRY', 'MORRIS\r\n', 16, 26),
(649, 'REGAN', 'DANIEL', 'MORAN\r\n', 16, 26),
(650, 'LARS', 'AGUILAR', 'HOWARD\r\n', 16, 26),
(651, 'SUMMER', 'CASH', 'TURNER\r\n', 16, 26),
(652, 'BARBARA', 'MENDOZA', 'LEVINE\r\n', 16, 26),
(653, 'TANISHA', 'GUERRA', 'KENT\r\n', 16, 26),
(654, 'EMMANUEL', 'BLANCHARD', 'ORTEGA\r\n', 16, 26),
(655, 'ROANNA', 'BRUCE', 'STOKES\r\n', 16, 26),
(656, 'BLAKE', 'PRINCE', 'HAWKINS\r\n', 16, 26),
(657, 'CYNTHIA', 'MCCLURE', 'ROBERTSON\r\n', 16, 26),
(658, 'JOSEPH', 'VANCE', 'COPELAND\r\n', 16, 26),
(659, 'SAWYER', 'MORENO', 'STUART\r\n', 16, 27),
(660, 'MADELINE', 'QUINN', 'HERNANDEZ\r\n', 16, 27),
(661, 'KEATON', 'NIELSEN', 'STEELE\r\n', 16, 27),
(662, 'HARLAN', 'DIXON', 'WILLIS\r\n', 16, 27),
(663, 'ANTHONY', 'HULL', 'WILDER\r\n', 16, 27),
(664, 'ALEXANDER', 'BURGESS', 'FINCH\r\n', 16, 27),
(665, 'ALFREDA', 'BRADY', 'GILBERT\r\n', 16, 27),
(666, 'MIRA', 'VANCE', 'HANSON\r\n', 16, 27),
(667, 'GRIFFIN', 'HINTON', 'YANG\r\n', 16, 27),
(668, 'JAMALIA', 'ADKINS', 'WEBER\r\n', 16, 27),
(669, 'KEITH', 'RAMOS', 'SNYDER\r\n', 16, 27),
(670, 'BO', 'NORTON', 'KNIGHT\r\n', 16, 27),
(671, 'COLT', 'NORTON', 'WALLACE\r\n', 16, 27),
(672, 'WILLA', 'SHANNON', 'RANDOLPH\r\n', 16, 27),
(673, 'JOY', 'PRICE', 'VASQUEZ\r\n', 16, 27),
(674, 'HOP', 'HARDY', 'MELTON\r\n', 16, 27),
(675, 'RUDYARD', 'COTE', 'BARR\r\n', 16, 27),
(676, 'STONE', 'LEONARD', 'MADDEN\r\n', 16, 27),
(677, 'DAVIS', 'STEIN', 'GAMBLE\r\n', 16, 27),
(678, 'OCTAVIA', 'HYDE', 'SPENCE\r\n', 16, 27),
(679, 'JENETTE', 'MOORE', 'COOLEY\r\n', 16, 27),
(680, 'MARIS', 'BARLOW', 'COLLINS\r\n', 16, 27),
(681, 'CLARE', 'JONES', 'ALFORD\r\n', 16, 27),
(682, 'MCKENZIE', 'NIELSEN', 'VARGAS\r\n', 16, 27),
(683, 'PRICE', 'MITCHELL', 'DELACRUZ\r\n', 16, 27),
(684, 'LACEY', 'BURGESS', 'CASEY\r\n', 16, 28),
(685, 'HILEL', 'LUCAS', 'KIRKLAND\r\n', 16, 28),
(686, 'NICHOLAS', 'BRANCH', 'GROSS\r\n', 16, 28),
(687, 'PAMELA', 'CERVANTES', 'KIRK\r\n', 16, 28),
(688, 'LINUS', 'TREVINO', 'PRINCE\r\n', 16, 28),
(689, 'ARISTOTLE', 'ORTEGA', 'MICHAEL\r\n', 16, 28),
(690, 'BARRETT', 'BLEVINS', 'OWEN\r\n', 16, 28),
(691, 'LEANDRA', 'ROCHA', 'WEST\r\n', 16, 28),
(692, 'RAVEN', 'POTTER', 'POLLARD\r\n', 16, 28),
(693, 'CHANNING', 'YOUNG', 'FREDERICK\r\n', 16, 28),
(694, 'THADDEUS', 'HOLMES', 'SANCHEZ\r\n', 16, 28),
(695, 'AMIR', 'GEORGE', 'REEVES\r\n', 16, 28),
(696, 'REED', 'WEBB', 'RIVAS\r\n', 16, 28),
(697, 'REGINA', 'HOGAN', 'MATTHEWS\r\n', 16, 28),
(698, 'FRITZ', 'NORTON', 'HUDSON\r\n', 16, 28),
(699, 'STONE', 'GUTIERREZ', 'DAY\r\n', 16, 28),
(700, 'HALLA', 'AGUIRRE', 'MULLEN\r\n', 16, 28),
(701, 'MARSHALL', 'BENNETT', 'RUTLEDGE\r\n', 16, 28),
(702, 'NOELANI', 'ROSALES', 'CLAYTON\r\n', 16, 28),
(703, 'NIGEL', 'HOLDEN', 'BRADFORD\r\n', 16, 28),
(704, 'ZENA', 'MERRILL', 'ORTIZ\r\n', 16, 28),
(705, 'BRADLEY', 'GRIFFITH', 'JACOBS\r\n', 16, 28),
(706, 'KYRA', 'YATES', 'SHERMAN\r\n', 16, 28),
(707, 'RHONDA', 'ALVARADO', 'BAIRD\r\n', 16, 28),
(708, 'JEROME', 'MCDANIEL', 'GAY\r\n', 16, 28),
(709, 'DENTON', 'FINLEY', 'MCCARTHY\r\n', 2, 2),
(710, 'GRADY', 'HARRISON', 'FERNANDEZ\r\n', 2, 2),
(711, 'IMANI', 'WALLS', 'WILDER\r\n', 2, 2),
(712, 'HECTOR', 'GUY', 'OLIVER\r\n', 2, 2),
(713, 'KAITLIN', 'GREGORY', 'ROMERO\r\n', 2, 2),
(714, 'TALON', 'POWERS', 'ROWE\r\n', 2, 2),
(715, 'TEAGAN', 'HOLMES', 'MARTINEZ\r\n', 2, 2),
(716, 'STEPHANIE', 'CROSS', 'BENTLEY\r\n', 2, 2),
(717, 'IVY', 'GREGORY', 'CHAPMAN\r\n', 2, 2),
(718, 'ALLEGRA', 'CORTEZ', 'MCMAHON\r\n', 2, 2),
(719, 'PALMER', 'THOMAS', 'FRANCO\r\n', 2, 2),
(720, 'VINCENT', 'WALLS', 'HARPER\r\n', 2, 2),
(721, 'MERRITT', 'SHELTON', 'MORTON\r\n', 2, 2),
(722, 'ALDEN', 'FRY', 'ROACH\r\n', 2, 2),
(723, 'CODY', 'CALDWELL', 'RIVAS\r\n', 2, 2),
(724, 'OLIVER', 'FERGUSON', 'BLACKBURN\r\n', 2, 2),
(725, 'JAMALIA', 'GUY', 'HOWELL\r\n', 2, 2),
(726, 'CALEB', 'WARREN', 'DUNN\r\n', 2, 2),
(727, 'FITZGERALD', 'DIXON', 'MCFARLAND\r\n', 2, 2),
(728, 'LIONEL', 'KING', 'KANE\r\n', 2, 2),
(729, 'BRITTANY', 'KNAPP', 'BARR\r\n', 2, 2),
(730, 'INGA', 'OSBORNE', 'VINSON\r\n', 2, 2),
(731, 'AXEL', 'CANNON', 'SMALL\r\n', 2, 2),
(732, 'SYLVESTER', 'REYNOLDS', 'GIBBS\r\n', 2, 2),
(733, 'JESSE', 'MCKAY', 'RAMIREZ\r\n', 2, 2),
(734, 'EMERY', 'ALSTON', 'MANNING\r\n', 2, 3),
(735, 'JORDAN', 'GALLAGHER', 'ALEXANDER\r\n', 2, 3),
(736, 'LYDIA', 'BOYD', 'HOGAN\r\n', 2, 3),
(737, 'CAIRO', 'STONE', 'SNIDER\r\n', 2, 3),
(738, 'KARINA', 'MORALES', 'SHEPARD\r\n', 2, 3),
(739, 'SYDNEY', 'HOUSE', 'MORRIS\r\n', 2, 3),
(740, 'TANNER', 'HANSEN', 'ENGLAND\r\n', 2, 3),
(741, 'JOEL', 'WASHINGTON', 'BURNETT\r\n', 2, 3),
(742, 'NYSSA', 'MACIAS', 'ORTEGA\r\n', 2, 3),
(743, 'ADARA', 'CAMPBELL', 'MCFADDEN\r\n', 2, 3),
(744, 'KADEN', 'SYKES', 'DRAKE\r\n', 2, 3),
(745, 'LILLITH', 'NEWTON', 'DELGADO\r\n', 2, 3),
(746, 'BUFFY', 'CARNEY', 'HULL\r\n', 2, 3),
(747, 'XANTHUS', 'WATSON', 'FOLEY\r\n', 2, 3),
(748, 'GERMANE', 'TYLER', 'SANDOVAL\r\n', 2, 3),
(749, 'COLIN', 'GLASS', 'HOWARD\r\n', 2, 3),
(750, 'ACTON', 'CAIN', 'NUNEZ\r\n', 2, 3),
(751, 'PORTER', 'WILKINS', 'DOWNS\r\n', 2, 3),
(752, 'KEVYN', 'BENTLEY', 'JOHNSTON\r\n', 2, 3),
(753, 'KARINA', 'JACOBSON', 'CHERRY\r\n', 2, 3),
(754, 'ROBERT', 'ROSS', 'MORRISON\r\n', 2, 3),
(755, 'JESCIE', 'MCKENZIE', 'WIGGINS\r\n', 2, 3),
(756, 'TASHA', 'AVERY', 'MAYNARD\r\n', 2, 3),
(757, 'SYLVIA', 'DOTSON', 'BURNETT\r\n', 2, 3),
(758, 'DREW', 'DOUGLAS', 'MCLEAN\r\n', 2, 3),
(759, 'NITA', 'MCKNIGHT', 'RUSH\r\n', 2, 4),
(760, 'FRANCESCA', 'FINLEY', 'NICHOLS\r\n', 2, 4),
(761, 'SYLVESTER', 'MULLEN', 'BUCKLEY\r\n', 2, 4),
(762, 'HAMMETT', 'SIMS', 'HOLDER\r\n', 2, 4),
(763, 'CARL', 'RAMOS', 'VARGAS\r\n', 2, 4),
(764, 'TIMOTHY', 'HARDY', 'MEADOWS\r\n', 2, 4),
(765, 'GUINEVERE', 'GENTRY', 'GUERRA\r\n', 2, 4),
(766, 'TANNER', 'GILMORE', 'CALDWELL\r\n', 2, 4),
(767, 'GWENDOLYN', 'STANLEY', 'WARREN\r\n', 2, 4),
(768, 'GARY', 'GREENE', 'STANLEY\r\n', 2, 4),
(769, 'BARBARA', 'CASEY', 'ERICKSON\r\n', 2, 4),
(770, 'ADRIENNE', 'DAY', 'ROLLINS\r\n', 2, 4),
(771, 'LILLIAN', 'CARLSON', 'SAUNDERS\r\n', 2, 4),
(772, 'BORIS', 'NICHOLSON', 'BONNER\r\n', 2, 4),
(773, 'RACHEL', 'ROWLAND', 'TUCKER\r\n', 2, 4),
(774, 'ISABELLA', 'BRITT', 'HOWARD\r\n', 2, 4),
(775, 'AURORA', 'HOLLOWAY', 'MAYNARD\r\n', 2, 4),
(776, 'ZIA', 'KLEIN', 'OLIVER\r\n', 2, 4),
(777, 'CHAVA', 'SWEENEY', 'FRANCO\r\n', 2, 4),
(778, 'CARTER', 'BARLOW', 'HERRING\r\n', 2, 4),
(779, 'RAJAH', 'PUCKETT', 'ADAMS\r\n', 2, 4),
(780, 'MADESON', 'MYERS', 'PACHECO\r\n', 2, 4),
(781, 'LESLEY', 'WIGGINS', 'JACOBS\r\n', 2, 4),
(782, 'MARIS', 'WITT', 'LEVINE\r\n', 2, 4),
(783, 'SYDNEE', 'MORAN', 'TERRELL\r\n', 2, 4),
(784, 'NOAH', 'ALLEN', 'CAMPOS\r\n', 3, 5),
(785, 'DAVID', 'BRADY', 'TANNER\r\n', 3, 5),
(786, 'AMERY', 'HERNANDEZ', 'PITTMAN\r\n', 3, 5),
(787, 'EAGAN', 'LE', 'MAYNARD\r\n', 3, 5),
(788, 'LEE', 'SCOTT', 'GAINES\r\n', 3, 5),
(789, 'CONNOR', 'STAFFORD', 'FROST\r\n', 3, 5),
(790, 'SCARLETT', 'HEATH', 'WHITE\r\n', 3, 5),
(791, 'HUNTER', 'SPARKS', 'MCKINNEY\r\n', 3, 5),
(792, 'CHEROKEE', 'CRAFT', 'BLACKBURN\r\n', 3, 5),
(793, 'NINA', 'DECKER', 'SANDERS\r\n', 3, 5),
(794, 'XANDER', 'MERRILL', 'NOBLE\r\n', 3, 5),
(795, 'DALE', 'DUNLAP', 'CLEMONS\r\n', 3, 5),
(796, 'CHASE', 'HESTER', 'SPEARS\r\n', 3, 5),
(797, 'DARIUS', 'MCBRIDE', 'UNDERWOOD\r\n', 3, 5),
(798, 'INGRID', 'FITZPATRICK', 'KIDD\r\n', 3, 5),
(799, 'MAGGIE', 'WALLER', 'SAMPSON\r\n', 3, 5),
(800, 'UTA', 'KIM', 'SEARS\r\n', 3, 5),
(801, 'CHEROKEE', 'WILKINS', 'COLLINS\r\n', 3, 5),
(802, 'LAWRENCE', 'OWENS', 'LIVINGSTON\r\n', 3, 5),
(803, 'HU', 'EDWARDS', 'GUTHRIE\r\n', 3, 5),
(804, 'NEIL', 'SANTANA', 'WALTER\r\n', 3, 5),
(805, 'RENEE', 'BOND', 'CLEMENTS\r\n', 3, 5),
(806, 'ROANNA', 'RAMOS', 'NORRIS\r\n', 3, 5),
(807, 'SASHA', 'LARA', 'MANNING\r\n', 3, 5),
(808, 'AUTUMN', 'HARDING', 'COMPTON\r\n', 3, 5),
(809, 'KEIKO', 'SAVAGE', 'CHASE\r\n', 3, 5),
(810, 'MAILE', 'GOULD', 'ROGERS\r\n', 3, 5),
(811, 'QUINN', 'ROY', 'ANTHONY\r\n', 3, 5),
(812, 'STEPHEN', 'SPENCER', 'SCHULTZ\r\n', 3, 6),
(813, 'LAITH', 'GRAHAM', 'COLEMAN\r\n', 3, 6),
(814, 'HYACINTH', 'WEAVER', 'CARPENTER\r\n', 3, 6),
(815, 'ISAIAH', 'JEFFERSON', 'HARRIS\r\n', 3, 6),
(816, 'IDONA', 'DOTSON', 'LANGLEY\r\n', 3, 6),
(817, 'MEGHAN', 'JONES', 'LOPEZ\r\n', 3, 6),
(818, 'LYNN', 'HURLEY', 'VEGA\r\n', 3, 6),
(819, 'WINIFRED', 'LANDRY', 'WOODARD\r\n', 3, 6),
(820, 'MERRILL', 'PECK', 'BURRIS\r\n', 3, 6),
(821, 'COLTON', 'PALMER', 'MAYNARD\r\n', 3, 6),
(822, 'ALISA', 'DAUGHERTY', 'HOPKINS\r\n', 3, 6),
(823, 'JONAH', 'BOWEN', 'RIDDLE\r\n', 3, 6),
(824, 'NICOLE', 'BOLTON', 'GILLESPIE\r\n', 3, 6),
(825, 'CONSTANCE', 'BEASLEY', 'GARZA\r\n', 3, 6),
(826, 'CHRISTIAN', 'STOKES', 'BULLOCK\r\n', 3, 6),
(827, 'ARTHUR', 'DANIELS', 'LESTER\r\n', 3, 6),
(828, 'DANIEL', 'CARDENAS', 'SILVA\r\n', 3, 6),
(829, 'NAIDA', 'BLACKBURN', 'AYALA\r\n', 3, 6),
(830, 'SETH', 'CHERRY', 'FRANCIS\r\n', 3, 6),
(831, 'MAILE', 'FERGUSON', 'IRWIN\r\n', 3, 6),
(832, 'KASPER', 'BUCK', 'WOODWARD\r\n', 3, 6),
(833, 'CARTER', 'ALVARADO', 'BENJAMIN\r\n', 3, 6),
(834, 'HALL', 'ONEAL', 'PICKETT\r\n', 3, 6),
(835, 'RICHARD', 'LESTER', 'HURST\r\n', 3, 6),
(836, 'AUBREY', 'PERRY', 'MEYER\r\n', 3, 6),
(837, 'IMOGENE', 'DOUGLAS', 'RIVERA\r\n', 3, 6),
(838, 'NICHOLAS', 'RIGGS', 'MAYNARD\r\n', 3, 6),
(839, 'ROTH', 'GUTHRIE', 'BURKS\r\n', 3, 6),
(840, 'FELIX', 'HOWARD', 'GROSS\r\n', 3, 7),
(841, 'BRETT', 'LANG', 'STONE\r\n', 3, 7),
(842, 'WANG', 'REID', 'GOOD\r\n', 3, 7),
(843, 'YOLANDA', 'KNIGHT', 'HAYES\r\n', 3, 7),
(844, 'DIETER', 'WHEELER', 'COX\r\n', 3, 7),
(845, 'EZEKIEL', 'MCKAY', 'VANCE\r\n', 3, 7),
(846, 'RAVEN', 'PIERCE', 'MAYS\r\n', 3, 7),
(847, 'DORIS', 'PETTY', 'ODOM\r\n', 3, 7),
(848, 'OCTAVIUS', 'GREER', 'MORGAN\r\n', 3, 7),
(849, 'MAXINE', 'BOYER', 'SHELTON\r\n', 3, 7),
(850, 'MALACHI', 'HUFF', 'DAVID\r\n', 3, 7),
(851, 'FINN', 'CORTEZ', 'STEELE\r\n', 3, 7),
(852, 'ERICH', 'SYKES', 'CHRISTIAN\r\n', 3, 7),
(853, 'COLLEEN', 'ZAMORA', 'MELTON\r\n', 3, 7),
(854, 'WYNNE', 'HERRERA', 'HURST\r\n', 3, 7),
(855, 'DOROTHY', 'CHERRY', 'RAMOS\r\n', 3, 7),
(856, 'KENNAN', 'LITTLE', 'BATES\r\n', 3, 7),
(857, 'LEE', 'FLOYD', 'BERGER\r\n', 3, 7),
(858, 'RAHIM', 'WILLIAM', 'HOUSE\r\n', 3, 7),
(859, 'CHARLES', 'AYALA', 'JOHNS\r\n', 3, 7),
(860, 'KAY', 'SPENCE', 'LOWERY\r\n', 3, 7),
(861, 'CADE', 'WILKINSON', 'SHELTON\r\n', 3, 7),
(862, 'JUSTINE', 'BOWMAN', 'YORK\r\n', 3, 7),
(863, 'DALTON', 'MELTON', 'RYAN\r\n', 3, 7),
(864, 'RHIANNON', 'GREER', 'TRAVIS\r\n', 3, 7),
(865, 'SYDNEE', 'FRANKLIN', 'RICHARDS\r\n', 3, 7),
(866, 'TROY', 'LEVY', 'MERCER\r\n', 3, 7),
(867, 'OCTAVIUS', 'BENJAMIN', 'WARD\r\n', 3, 7),
(868, 'HANAE', 'BALLARD', 'GREGORY\r\n', 3, 7),
(869, 'CULLEN', 'HARRISON', 'KNOX\r\n', 4, 8),
(870, 'DAVIS', 'HEATH', 'HOLLOWAY\r\n', 4, 8),
(871, 'KAREN', 'CLAYTON', 'ESPINOZA\r\n', 4, 8),
(872, 'MOLLIE', 'CAMERON', 'MCLAUGHLIN\r\n', 4, 8),
(873, 'PATRICIA', 'MCDONALD', 'ROTH\r\n', 4, 8),
(874, 'FITZGERALD', 'RODGERS', 'BRAY\r\n', 4, 8),
(875, 'OCTAVIUS', 'BRANCH', 'PITTMAN\r\n', 4, 8),
(876, 'ISHMAEL', 'BOYD', 'GOODMAN\r\n', 4, 8),
(877, 'LYSANDRA', 'GONZALES', 'PRESTON\r\n', 4, 8),
(878, 'CHRISTEN', 'MULLINS', 'RIOS\r\n', 4, 8),
(879, 'NOEL', 'FLETCHER', 'CROSS\r\n', 4, 8),
(880, 'HARRISON', 'HATFIELD', 'GRAY\r\n', 4, 8),
(881, 'JULIE', 'BOYER', 'HARDING\r\n', 4, 8),
(882, 'RAE', 'COBB', 'COMBS\r\n', 4, 8),
(883, 'TOBIAS', 'HYDE', 'LANG\r\n', 4, 8),
(884, 'AHMED', 'CARROLL', 'SANTOS\r\n', 4, 8),
(885, 'CAMILLA', 'HERMAN', 'MARKS\r\n', 4, 8),
(886, 'NINA', 'GOLDEN', 'CAREY\r\n', 4, 8),
(887, 'VIOLET', 'MCDANIEL', 'BLANKENSHIP\r\n', 4, 8),
(888, 'ELIZABETH', 'HANSEN', 'CANNON\r\n', 4, 8),
(889, 'INA', 'WILCOX', 'MIDDLETON\r\n', 4, 8),
(890, 'AZALIA', 'MCCORMICK', 'PAGE\r\n', 4, 8),
(891, 'GARTH', 'ALLISON', 'HALEY\r\n', 4, 8),
(892, 'REUBEN', 'BENSON', 'LOTT\r\n', 4, 8),
(893, 'IVORY', 'FLETCHER', 'WILLIAM\r\n', 4, 8),
(894, 'ISAAC', 'FLORES', 'PACE\r\n', 4, 8),
(895, 'MIRIAM', 'WOOTEN', 'HAWKINS\r\n', 4, 9),
(896, 'BRYNNE', 'NORRIS', 'RICH\r\n', 4, 9),
(897, 'NEIL', 'WEISS', 'BLEVINS\r\n', 4, 9),
(898, 'COLORADO', 'HENSON', 'RILEY\r\n', 4, 9),
(899, 'LILA', 'NEAL', 'DYER\r\n', 4, 9),
(900, 'NATALIE', 'SINGLETON', 'RUSSO\r\n', 4, 9),
(901, 'ALI', 'TANNER', 'AGUILAR\r\n', 4, 9),
(902, 'GEORGIA', 'FLETCHER', 'DECKER\r\n', 4, 9),
(903, 'MELISSA', 'BIRD', 'TILLMAN\r\n', 4, 9),
(904, 'STUART', 'CLARK', 'WALLER\r\n', 4, 9),
(905, 'LENORE', 'HUMPHREY', 'SULLIVAN\r\n', 4, 9),
(906, 'RENEE', 'GREEN', 'GARZA\r\n', 4, 9),
(907, 'BEVIS', 'LAMBERT', 'DONOVAN\r\n', 4, 9),
(908, 'GAVIN', 'BROCK', 'HENDRIX\r\n', 4, 9),
(909, 'PHELAN', 'WALL', 'FROST\r\n', 4, 9),
(910, 'ALICE', 'MASON', 'MEDINA\r\n', 4, 9),
(911, 'ECHO', 'CAMPOS', 'HEWITT\r\n', 4, 9),
(912, 'EDWARD', 'HOUSTON', 'BRENNAN\r\n', 4, 9),
(913, 'CEDRIC', 'SHIELDS', 'SALAZAR\r\n', 4, 9),
(914, 'CHARDE', 'HIGGINS', 'FULLER\r\n', 4, 9),
(915, 'SANDRA', 'POOLE', 'FRANCO\r\n', 4, 9),
(916, 'JARROD', 'TODD', 'PIERCE\r\n', 4, 9),
(917, 'NICOLE', 'KENNEDY', 'BENTLEY\r\n', 4, 9),
(918, 'LESTER', 'BARRY', 'DILLARD\r\n', 4, 9),
(919, 'BEVIS', 'NORRIS', 'GAMBLE\r\n', 4, 9),
(920, 'SHELLIE', 'MOSS', 'WILLIAMS\r\n', 4, 9),
(921, 'CEDRIC', 'FLYNN', 'BRIGGS\r\n', 4, 9),
(922, 'ORI', 'MERCADO', 'MANN\r\n', 4, 10),
(923, 'KARLEIGH', 'BURTON', 'BUTLER\r\n', 4, 10),
(924, 'TYLER', 'VANG', 'KELLER\r\n', 4, 10),
(925, 'BLAINE', 'HAYNES', 'STEWART\r\n', 4, 10),
(926, 'KATELYN', 'BLEVINS', 'PETTY\r\n', 4, 10),
(927, 'RICHARD', 'CHANG', 'BATTLE\r\n', 4, 10),
(928, 'MOSES', 'MCCLAIN', 'LANGLEY\r\n', 4, 10),
(929, 'JUSTINE', 'DIAZ', 'HAMPTON\r\n', 4, 10),
(930, 'HANNAH', 'LANCASTER', 'DICKERSON\r\n', 4, 10),
(931, 'MCKENZIE', 'REILLY', 'FOX\r\n', 4, 10),
(932, 'IGOR', 'CALHOUN', 'HAYES\r\n', 4, 10),
(933, 'KNOX', 'BRUCE', 'MORROW\r\n', 4, 10),
(934, 'BIANCA', 'MARTIN', 'SIMON\r\n', 4, 10),
(935, 'PERRY', 'ALSTON', 'SWEET\r\n', 4, 10),
(936, 'FULTON', 'GRAVES', 'WADE\r\n', 4, 10),
(937, 'KELSIE', 'SYKES', 'ROY\r\n', 4, 10),
(938, 'MURPHY', 'ALVARADO', 'ATKINSON\r\n', 4, 10),
(939, 'QUINLAN', 'PENNINGTON', 'SWEENEY\r\n', 4, 10),
(940, 'TANNER', 'BOONE', 'WOOD\r\n', 4, 10),
(941, 'MERRITT', 'FOLEY', 'HORTON\r\n', 4, 10),
(942, 'MAXINE', 'MENDOZA', 'PATEL\r\n', 4, 10),
(943, 'EATON', 'SYKES', 'VELASQUEZ\r\n', 4, 10),
(944, 'KERMIT', 'BURRIS', 'RAYMOND\r\n', 4, 10),
(945, 'HASAD', 'BUCHANAN', 'RODRIQUEZ\r\n', 4, 10),
(946, 'ROANNA', 'RUSSELL', 'BROCK\r\n', 4, 10),
(947, 'GAY', 'BUTLER', 'BENDER\r\n', 4, 10),
(948, 'KARLEIGH', 'CURRY', 'BRADY\r\n', 5, 11),
(949, 'DARIUS', 'PALMER', 'RAMOS\r\n', 5, 11),
(950, 'LARS', 'CLINE', 'BUCK\r\n', 5, 11),
(951, 'CLINTON', 'MAYS', 'BURGESS\r\n', 5, 11),
(952, 'CULLEN', 'DUNN', 'SANTIAGO\r\n', 5, 11),
(953, 'LANCE', 'GAY', 'GREENE\r\n', 5, 11),
(954, 'AUGUST', 'COOK', 'DICKERSON\r\n', 5, 11),
(955, 'KARYN', 'WALKER', 'PRINCE\r\n', 5, 11),
(956, 'BRANDEN', 'WILLIAMSON', 'MCKINNEY\r\n', 5, 11),
(957, 'COLORADO', 'LEWIS', 'VAUGHAN\r\n', 5, 11),
(958, 'EDEN', 'VELEZ', 'SIMS\r\n', 5, 11),
(959, 'MAGEE', 'HOOVER', 'NOLAN\r\n', 5, 11),
(960, 'KYLAN', 'DONOVAN', 'MADDEN\r\n', 5, 11),
(961, 'MIRA', 'RAMOS', 'MACIAS\r\n', 5, 11),
(962, 'KIBO', 'DAVIDSON', 'OWENS\r\n', 5, 11),
(963, 'RYAN', 'JENSEN', 'PETTY\r\n', 5, 11),
(964, 'TEEGAN', 'DANIELS', 'SUTTON\r\n', 5, 11),
(965, 'MAXWELL', 'SNIDER', 'MOON\r\n', 5, 11),
(966, 'TARA', 'LONG', 'LUNA\r\n', 5, 11),
(967, 'ELIANA', 'GONZALEZ', 'WILKINSON\r\n', 5, 11),
(968, 'MADISON', 'PARSONS', 'GALLEGOS\r\n', 5, 11),
(969, 'LEVI', 'CONWAY', 'HINTON\r\n', 5, 11),
(970, 'GALVIN', 'BARRETT', 'SMALL\r\n', 5, 11),
(971, 'SUKI', 'DORSEY', 'ALLISON\r\n', 5, 11),
(972, 'ORLA', 'BARR', 'CORTEZ\r\n', 5, 11),
(973, 'EATON', 'BROWNING', 'HOWELL\r\n', 5, 11),
(974, 'TANNER', 'CHURCH', 'DICKERSON\r\n', 5, 11),
(975, 'SIMON', 'BLAIR', 'BURT\r\n', 5, 11),
(976, 'LANCE', 'COOK', 'GRIFFIN\r\n', 5, 12),
(977, 'DARIUS', 'REYNOLDS', 'VINSON\r\n', 5, 12),
(978, 'TANNER', 'MOODY', 'MUNOZ\r\n', 5, 12),
(979, 'JUSTINE', 'BUTLER', 'REID\r\n', 5, 12),
(980, 'PAMELA', 'JACOBS', 'COOK\r\n', 5, 12),
(981, 'BRITTANY', 'BRAY', 'FITZGERALD\r\n', 5, 12),
(982, 'MAITE', 'PENNINGTON', 'COMBS\r\n', 5, 12),
(983, 'JASON', 'CAIN', 'ROMERO\r\n', 5, 12),
(984, 'OREN', 'BEACH', 'MAYNARD\r\n', 5, 12),
(985, 'IVY', 'MOORE', 'CARR\r\n', 5, 12),
(986, 'DOROTHY', 'COBB', 'GUTHRIE\r\n', 5, 12),
(987, 'LUNEA', 'FLORES', 'LEON\r\n', 5, 12),
(988, 'TATYANA', 'LAMB', 'AUSTIN\r\n', 5, 12),
(989, 'SHELLEY', 'MCCRAY', 'CASTANEDA\r\n', 5, 12),
(990, 'HANNAH', 'NIELSEN', 'BURGESS\r\n', 5, 12),
(991, 'JORDEN', 'DEAN', 'CARTER\r\n', 5, 12),
(992, 'THEODORE', 'BROWN', 'WONG\r\n', 5, 12),
(993, 'HARLAN', 'FLOYD', 'COOK\r\n', 5, 12),
(994, 'VLADIMIR', 'CERVANTES', 'BELL\r\n', 5, 12),
(995, 'COLORADO', 'GARRISON', 'YORK\r\n', 5, 12),
(996, 'LILLIAN', 'VANG', 'WOODARD\r\n', 5, 12),
(997, 'PAKI', 'CROSBY', 'HAMILTON\r\n', 5, 12),
(998, 'LEVI', 'RHODES', 'KING\r\n', 5, 12),
(999, 'BARRY', 'CLAY', 'SWEET\r\n', 5, 12),
(1000, 'MARTENA', 'HENDERSON', 'FINCH\r\n', 5, 12),
(1001, 'ALFONSO', 'LINDSAY', 'RANDALL\r\n', 5, 12),
(1002, 'XANTHUS', 'BAUER', 'MONTOYA\r\n', 5, 13),
(1003, 'CALEB', 'MERRITT', 'BATES\r\n', 5, 13),
(1004, 'LEONARD', 'CASTRO', 'COOK\r\n', 5, 13),
(1005, 'WILLOW', 'BRITT', 'COOLEY\r\n', 5, 13),
(1006, 'ADRIENNE', 'WHITEHEAD', 'KOCH\r\n', 5, 13),
(1007, 'GRADY', 'SOLOMON', 'JARVIS\r\n', 5, 13),
(1008, 'OCEAN', 'POTTER', 'GARRISON\r\n', 5, 13),
(1009, 'REED', 'LYONS', 'HURST\r\n', 5, 13),
(1010, 'CLIO', 'BRENNAN', 'DAVID\r\n', 5, 13),
(1011, 'HOLLY', 'MIRANDA', 'LAWSON\r\n', 5, 13),
(1012, 'PETER', 'HOPPER', 'MCKAY\r\n', 5, 13),
(1013, 'LANI', 'GUZMAN', 'DEJESUS\r\n', 5, 13),
(1014, 'KITRA', 'REYNOLDS', 'HOOVER\r\n', 5, 13),
(1015, 'MACEY', 'CLINE', 'DAVIDSON\r\n', 5, 13),
(1016, 'HARLAN', 'CARDENAS', 'BENTON\r\n', 5, 13),
(1017, 'VICTOR', 'TYSON', 'MENDEZ\r\n', 5, 13),
(1018, 'NATHAN', 'BARTON', 'LITTLE\r\n', 5, 13),
(1019, 'BIANCA', 'JONES', 'HANSON\r\n', 5, 13),
(1020, 'CHANEY', 'MCFADDEN', 'CASH\r\n', 5, 13),
(1021, 'QUINTESSA', 'FRANKS', 'WARREN\r\n', 5, 13),
(1022, 'LYLE', 'ROSS', 'ROSS\r\n', 5, 13),
(1023, 'YOKO', 'WEBER', 'REYNOLDS\r\n', 5, 13),
(1024, 'KATELYN', 'MEYER', 'JOSEPH\r\n', 5, 13),
(1025, 'TATYANA', 'CORTEZ', 'CONRAD\r\n', 5, 13),
(1026, 'CHARLES', 'BRAY', 'TERRELL\r\n', 5, 13),
(1027, 'WYLIE', 'WHITFIELD', 'RIOS\r\n', 5, 13),
(1028, 'AIDAN', 'MARSHALL', 'HARTMAN\r\n', 5, 13),
(1029, 'NASIM', 'SERRANO', 'SPARKS\r\n', 6, 14),
(1030, 'JASMINE', 'BAILEY', 'HOLDEN\r\n', 6, 14),
(1031, 'DENISE', 'POWELL', 'PHILLIPS\r\n', 6, 14),
(1032, 'BO', 'MOONEY', 'WHITNEY\r\n', 6, 14),
(1033, 'COLT', 'PETTY', 'EVANS\r\n', 6, 14),
(1034, 'CLINTON', 'COOKE', 'FERGUSON\r\n', 6, 14),
(1035, 'STEEL', 'HOWELL', 'MCMILLAN\r\n', 6, 14),
(1036, 'FITZGERALD', 'CLAY', 'CHANEY\r\n', 6, 14),
(1037, 'FARRAH', 'HOWE', 'MARKS\r\n', 6, 14),
(1038, 'NOLAN', 'BALL', 'WEISS\r\n', 6, 14),
(1039, 'SCARLET', 'COLEMAN', 'GEORGE\r\n', 6, 14),
(1040, 'TOBIAS', 'HOWELL', 'NASH\r\n', 6, 14),
(1041, 'ALI', 'SANCHEZ', 'WALLS\r\n', 6, 14),
(1042, 'HILDA', 'HOLDER', 'GUY\r\n', 6, 14),
(1043, 'PALMER', 'LARSEN', 'GILBERT\r\n', 6, 14),
(1044, 'JACQUELINE', 'BURKS', 'EVANS\r\n', 6, 14),
(1045, 'ELTON', 'WILKERSON', 'WEAVER\r\n', 6, 14),
(1046, 'IGNACIA', 'WILCOX', 'CAMACHO\r\n', 6, 14),
(1047, 'CARLOS', 'RYAN', 'HART\r\n', 6, 14),
(1048, 'CHESTER', 'POWERS', 'COPELAND\r\n', 6, 14),
(1049, 'NATHANIEL', 'BROWNING', 'CAMPOS\r\n', 6, 14),
(1050, 'LUCIAN', 'MEDINA', 'GRAHAM\r\n', 6, 14),
(1051, 'ERIN', 'JOYCE', 'BROOKS\r\n', 6, 14),
(1052, 'NEVADA', 'HURST', 'HERNANDEZ\r\n', 6, 14),
(1053, 'NELL', 'GRAHAM', 'HUGHES\r\n', 6, 14),
(1054, 'WILLIAM', 'KNIGHT', 'HAMPTON\r\n', 6, 14),
(1055, 'BARRY', 'HEWITT', 'NICHOLSON\r\n', 6, 15),
(1056, 'HEIDI', 'MYERS', 'LYNCH\r\n', 6, 15),
(1057, 'WINTER', 'SCHULTZ', 'MCCARTHY\r\n', 6, 15),
(1058, 'APRIL', 'WALSH', 'OLIVER\r\n', 6, 15),
(1059, 'YVONNE', 'CABRERA', 'BAKER\r\n', 6, 15),
(1060, 'NAOMI', 'BOONE', 'GARDNER\r\n', 6, 15),
(1061, 'CARTER', 'MICHAEL', 'RANDALL\r\n', 6, 15),
(1062, 'YULI', 'COOLEY', 'BAUER\r\n', 6, 15),
(1063, 'NATHAN', 'PHILLIPS', 'KERR\r\n', 6, 15),
(1064, 'XENA', 'TERRY', 'SPENCE\r\n', 6, 15),
(1065, 'JULIE', 'HURLEY', 'MADDOX\r\n', 6, 15),
(1066, 'BELL', 'COOLEY', 'STOUT\r\n', 6, 15),
(1067, 'VIRGINIA', 'FRANKS', 'SLOAN\r\n', 6, 15),
(1068, 'BLAIR', 'GUERRA', 'JOHNSTON\r\n', 6, 15),
(1069, 'YEN', 'RAMIREZ', 'KNIGHT\r\n', 6, 15),
(1070, 'JUSTINA', 'MOLINA', 'MYERS\r\n', 6, 15),
(1071, 'CHANNING', 'OCHOA', 'BRIGGS\r\n', 6, 15),
(1072, 'NEVILLE', 'GILLESPIE', 'WORKMAN\r\n', 6, 15),
(1073, 'FELIX', 'KNOWLES', 'MELENDEZ\r\n', 6, 15),
(1074, 'KIMBERLY', 'WYATT', 'RICHARD\r\n', 6, 15),
(1075, 'MADALINE', 'KLEIN', 'STARK\r\n', 6, 15),
(1076, 'WANG', 'PITTS', 'CABRERA\r\n', 6, 15),
(1077, 'MARIKO', 'SMALL', 'NEAL\r\n', 6, 15),
(1078, 'APHRODITE', 'MOONEY', 'GATES\r\n', 6, 15),
(1079, 'NOLAN', 'REYES', 'MARSHALL\r\n', 6, 15),
(1080, 'REED', 'SERRANO', 'HERMAN\r\n', 6, 15),
(1081, 'URIEL', 'GRIFFIN', 'HAYES\r\n', 6, 16),
(1082, 'WANG', 'VINCENT', 'CRANE\r\n', 6, 16),
(1083, 'RAFAEL', 'LEONARD', 'DURHAM\r\n', 6, 16),
(1084, 'YEO', 'GRANT', 'PARK\r\n', 6, 16),
(1085, 'KASIMIR', 'POPE', 'GRAVES\r\n', 6, 16),
(1086, 'TREVOR', 'DONOVAN', 'TYLER\r\n', 6, 16),
(1087, 'OLYMPIA', 'WILLIAMSON', 'MORALES\r\n', 6, 16),
(1088, 'LEVI', 'HOPPER', 'HESS\r\n', 6, 16),
(1089, 'MELYSSA', 'DELANEY', 'MILLER\r\n', 6, 16),
(1090, 'BLAKE', 'CALLAHAN', 'EWING\r\n', 6, 16),
(1091, 'KIMBERLEY', 'PETERSON', 'HORNE\r\n', 6, 16),
(1092, 'EMMANUEL', 'SPENCER', 'RHODES\r\n', 6, 16),
(1093, 'JADEN', 'SCHNEIDER', 'ROGERS\r\n', 6, 16),
(1094, 'BENJAMIN', 'DURAN', 'SNIDER\r\n', 6, 16),
(1095, 'MARI', 'ERICKSON', 'BATTLE\r\n', 6, 16),
(1096, 'NYSSA', 'ESTES', 'ROSALES\r\n', 6, 16),
(1097, 'NOELANI', 'CARDENAS', 'KENNEDY\r\n', 6, 16),
(1098, 'XAVIER', 'BUCK', 'SPENCE\r\n', 6, 16),
(1099, 'KARLEIGH', 'FOSTER', 'STRICKLAND\r\n', 6, 16),
(1100, 'THADDEUS', 'BROOKS', 'RICHARDSON\r\n', 6, 16),
(1101, 'KADEEM', 'CRUZ', 'SHERMAN\r\n', 6, 16),
(1102, 'ISAAC', 'OWENS', 'KING\r\n', 6, 16),
(1103, 'ZACHARY', 'WHEELER', 'BRITT\r\n', 6, 16),
(1104, 'BRENT', 'WALSH', 'RUSH\r\n', 6, 16),
(1105, 'CHASTITY', 'HINTON', 'HERRERA\r\n', 6, 16),
(1106, 'GRIFFITH', 'DALTON', 'KRAMER\r\n', 6, 16),
(1107, 'HECTOR', 'JOYCE', 'GALLOWAY\r\n', 7, 17),
(1108, 'YVETTE', 'NGUYEN', 'MERRILL\r\n', 7, 17),
(1109, 'JOEL', 'COLON', 'HUGHES\r\n', 7, 17),
(1110, 'PHILIP', 'NEAL', 'BENTLEY\r\n', 7, 17),
(1111, 'UMA', 'STEVENS', 'AGUIRRE\r\n', 7, 17),
(1112, 'DIANA', 'FOWLER', 'SULLIVAN\r\n', 7, 17),
(1113, 'QUYN', 'COLE', 'WEISS\r\n', 7, 17),
(1114, 'SANDRA', 'GARCIA', 'ASHLEY\r\n', 7, 17),
(1115, 'BLAZE', 'CARLSON', 'HARDIN\r\n', 7, 17),
(1116, 'DREW', 'BRENNAN', 'PENNINGTON\r\n', 7, 17),
(1117, 'IAN', 'CONWAY', 'ORTEGA\r\n', 7, 17),
(1118, 'NAYDA', 'RATLIFF', 'PUCKETT\r\n', 7, 17),
(1119, 'RUBY', 'GONZALES', 'CANNON\r\n', 7, 17),
(1120, 'LAITH', 'JACKSON', 'COOKE\r\n', 7, 17),
(1121, 'MONTANA', 'MCCONNELL', 'CAMACHO\r\n', 7, 17),
(1122, 'HARLAN', 'MORALES', 'BOYER\r\n', 7, 17),
(1123, 'CARTER', 'RYAN', 'CURRY\r\n', 7, 17),
(1124, 'ALYSSA', 'SANDERS', 'JUSTICE\r\n', 7, 17),
(1125, 'OPRAH', 'CAIN', 'BARKER\r\n', 7, 17),
(1126, 'FELIX', 'BATES', 'BEACH\r\n', 7, 17),
(1127, 'NICHOLE', 'MADDEN', 'SMITH\r\n', 7, 17),
(1128, 'IONA', 'BAILEY', 'COHEN\r\n', 7, 17),
(1129, 'MARTIN', 'TODD', 'ELLISON\r\n', 7, 17),
(1130, 'BRENNA', 'REYES', 'GRAHAM\r\n', 7, 17),
(1131, 'MIRA', 'JENKINS', 'JOSEPH\r\n', 7, 17),
(1132, 'CHANDLER', 'JOSEPH', 'BROCK\r\n', 7, 17),
(1133, 'ABIGAIL', 'ONEIL', 'BRAY\r\n', 7, 17),
(1134, 'GRANT', 'JOYCE', 'GAMBLE\r\n', 7, 17),
(1135, 'COBY', 'WARD', 'BROCK\r\n', 7, 18),
(1136, 'DUNCAN', 'COBB', 'KINNEY\r\n', 7, 18),
(1137, 'KEITH', 'LANE', 'FLOWERS\r\n', 7, 18),
(1138, 'LEN', 'NEAL', 'FLEMING\r\n', 7, 18),
(1139, 'AMITY', 'BERGER', 'WASHINGTON\r\n', 7, 18),
(1140, 'DAPHNE', 'STEPHENSON', 'COOLEY\r\n', 7, 18),
(1141, 'HENRY', 'HUMPHREY', 'HENSLEY\r\n', 7, 18),
(1142, 'MELINDA', 'BOYER', 'LEWIS\r\n', 7, 18),
(1143, 'LYNN', 'WASHINGTON', 'CAMPBELL\r\n', 7, 18),
(1144, 'AIDAN', 'MCCLURE', 'FRANKLIN\r\n', 7, 18),
(1145, 'ALIKA', 'CHURCH', 'WALTER\r\n', 7, 18),
(1146, 'FITZGERALD', 'HOLT', 'BARR\r\n', 7, 18),
(1147, 'ZENA', 'WALLACE', 'KIM\r\n', 7, 18),
(1148, 'LILAH', 'DALE', 'SANDOVAL\r\n', 7, 18),
(1149, 'REUBEN', 'GILMORE', 'NEWTON\r\n', 7, 18),
(1150, 'ADRIENNE', 'FITZPATRICK', 'HOLMAN\r\n', 7, 18),
(1151, 'XANDRA', 'LANE', 'RIVERS\r\n', 7, 18),
(1152, 'KIBO', 'LANGLEY', 'LEE\r\n', 7, 18),
(1153, 'KERMIT', 'WHITAKER', 'LOGAN\r\n', 7, 18),
(1154, 'RAJAH', 'SMALL', 'FLETCHER\r\n', 7, 18),
(1155, 'WILLIAM', 'CLEVELAND', 'FLOYD\r\n', 7, 18),
(1156, 'WILMA', 'BERGER', 'MCINTOSH\r\n', 7, 18),
(1157, 'IRIS', 'DAY', 'UNDERWOOD\r\n', 7, 18),
(1158, 'DAVIS', 'BRADFORD', 'KNAPP\r\n', 7, 18),
(1159, 'CHRISTEN', 'STRICKLAND', 'FRANK\r\n', 7, 18),
(1160, 'ELTON', 'CURRY', 'BROWN\r\n', 7, 18),
(1161, 'KUAME', 'BOLTON', 'REEVES\r\n', 7, 18),
(1162, 'RILEY', 'GRAY', 'HUGHES\r\n', 7, 18),
(1163, 'LEE', 'DEJESUS', 'KINNEY\r\n', 7, 19),
(1164, 'SEPTEMBER', 'ONEIL', 'RANDOLPH\r\n', 7, 19),
(1165, 'TALON', 'WILKINSON', 'WARD\r\n', 7, 19),
(1166, 'VLADIMIR', 'SHARP', 'RIVERS\r\n', 7, 19),
(1167, 'MELVIN', 'DODSON', 'CALLAHAN\r\n', 7, 19),
(1168, 'CHRISTIAN', 'HUMPHREY', 'GOOD\r\n', 7, 19),
(1169, 'URIELLE', 'RAMOS', 'SUTTON\r\n', 7, 19),
(1170, 'HALEE', 'BENTON', 'WHITEHEAD\r\n', 7, 19),
(1171, 'COLE', 'DECKER', 'GAMBLE\r\n', 7, 19),
(1172, 'FLAVIA', 'BECKER', 'BROOKS\r\n', 7, 19),
(1173, 'HILEL', 'OWENS', 'JOYNER\r\n', 7, 19),
(1174, 'MAGEE', 'AYERS', 'STAFFORD\r\n', 7, 19),
(1175, 'BERNARD', 'WARD', 'VELAZQUEZ\r\n', 7, 19),
(1176, 'VIVIEN', 'CARSON', 'DEAN\r\n', 7, 19),
(1177, 'IOLA', 'HOOVER', 'REED\r\n', 7, 19),
(1178, 'KENNETH', 'MORIN', 'SHARPE\r\n', 7, 19),
(1179, 'RUBY', 'MORRIS', 'SIMON\r\n', 7, 19),
(1180, 'JOSEPHINE', 'DORSEY', 'VANCE\r\n', 7, 19),
(1181, 'ZEUS', 'PRESTON', 'JOYCE\r\n', 7, 19),
(1182, 'COLIN', 'RICHARD', 'PARRISH\r\n', 7, 19),
(1183, 'HEDLEY', 'BENNETT', 'SUMMERS\r\n', 7, 19),
(1184, 'KIERAN', 'MOONEY', 'MONROE\r\n', 7, 19),
(1185, 'SKYLER', 'WILKINSON', 'GONZALES\r\n', 7, 19),
(1186, 'PHELAN', 'GAMBLE', 'GREENE\r\n', 7, 19),
(1187, 'ARETHA', 'NUNEZ', 'GOODWIN\r\n', 7, 19),
(1188, 'HERMIONE', 'NORTON', 'WILCOX\r\n', 7, 19),
(1189, 'GRIFFITH', 'MEYERS', 'ALEXANDER\r\n', 7, 19),
(1190, 'LEONARD', 'WHITLEY', 'STONE', 7, 19);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `classeid` int(11) NOT NULL,
  `nom` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`classeid`, `nom`) VALUES
(2, '1R EP - A'),
(3, '1R EP - B'),
(4, '1R EP - C'),
(5, '2N EP - A'),
(6, '2N EP - B'),
(7, '2N EP - C'),
(8, '3R EP - A'),
(9, '3R EP - B'),
(10, '3R EP - C'),
(11, '4T EP - A'),
(12, '4T EP - B'),
(13, '4T EP - C'),
(14, '5E EP - A'),
(15, '5E EP - B'),
(16, '5E EP - C'),
(17, '6E EP - A'),
(18, '6E EP - B'),
(19, '6E EP - C'),
(20, '4T EI - A'),
(21, '4T EI - B'),
(22, '4T EI - C'),
(23, '5E EI - A'),
(24, '5E EI - B'),
(25, '5E EI - C'),
(26, '6E EI - A'),
(27, '6E EI - B'),
(28, '6E EI - C');

-- --------------------------------------------------------

--
-- Table structure for table `configuracio`
--

CREATE TABLE `configuracio` (
  `clau` char(50) NOT NULL,
  `valor` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `configuracio`
--

INSERT INTO `configuracio` (`clau`, `valor`) VALUES
('activacio', '2020-08-08-21-10'),
('correcciohoraservidor', '7200'),
('correuadmin', 'admin@example.com'),
('correucontacte', 'extraescolars@example.com'),
('correuresponsable', 'extraescolars@example.com'),
('cursactual', '2019-20'),
('debug', 'off'),
('nomcentre', 'La meva escola'),
('tiquetcount', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `curs`
--

CREATE TABLE `curs` (
  `cursid` int(11) NOT NULL,
  `nom` char(25) NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curs`
--

INSERT INTO `curs` (`cursid`, `nom`, `ordre`) VALUES
(2, 'PRIMER DE PRIMARIA', 10),
(3, 'SEGON DE PRIMARIA', 20),
(4, 'TERCER DE PRIMARIA', 30),
(5, 'QUART DE PRIMARIA', 40),
(6, 'CINQUE DE PRIMARIA', 50),
(7, 'SISE DE PRIMARIA', 60),
(14, 'PARVULARI 3', 3),
(15, 'PARVULARI 4', 5),
(16, 'PARVULARI 5', 7);

-- --------------------------------------------------------

--
-- Table structure for table `extraescolars`
--

CREATE TABLE `extraescolars` (
  `extescid` int(11) NOT NULL,
  `nom` char(25) NOT NULL,
  `cursid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extraescolars`
--

INSERT INTO `extraescolars` (`extescid`, `nom`, `cursid`) VALUES
(248, 'INICIACIO ESPORTIVA 1R', 2),
(249, 'IOGA 1R', 2),
(250, 'ENGLISH 1R', 2),
(251, 'COR 1R', 2),
(252, 'COR  1R', 2),
(253, 'BALL MODERN 1R', 2),
(254, 'TEST 1R I 2N', 2),
(255, 'INICIACIO ESPORTIVA 2N', 3),
(256, 'IOGA 2N', 3),
(257, 'ENGLISH 2N', 3),
(258, 'COR 2N', 3),
(259, 'BALL MODERN 2N', 3),
(260, 'ESCACS 2N', 3),
(261, 'JOCS COOPERATIUS I 3R', 4),
(262, 'IOGA 3R', 4),
(263, 'ENGLISH 3R', 4),
(264, 'COR 3R', 4),
(265, 'BALL MODERN 3R', 4),
(266, 'ESCACS 3R', 4),
(267, 'JOCS COOPERATIUS II 4T', 5),
(268, 'IOGA 4T', 5),
(269, 'ENGLISH 4T', 5),
(270, 'COR 4T', 5),
(271, 'BALL MODERN 4T', 5),
(272, 'ESCACS 4T', 5),
(273, 'ESPORTS ALTERNATIUS 5E', 6),
(274, 'IOGA 5E', 6),
(275, 'ENGLISH 5E', 6),
(276, 'COR 5E', 6),
(277, 'BALL MODERN 5E', 6),
(278, 'ESCACS 5E', 6),
(279, 'TEATRE 5E', 6),
(280, 'CLUB DE DEBAT 5E', 6),
(281, 'ESPORTS ALTERNATIUS 6E', 7),
(282, 'IOGA 6E', 7),
(283, 'ENGLISH 6E', 7),
(284, 'COR 6E', 7),
(285, 'BALL MODERN 6E', 7),
(286, 'TEATRE 6E', 7),
(287, 'CLUB DE DEBAT 6E', 7);

-- --------------------------------------------------------

--
-- Table structure for table `hores`
--

CREATE TABLE `hores` (
  `horaid` int(11) NOT NULL,
  `sessionid` int(11) NOT NULL,
  `dia` enum('DILLUNS','DIMARTS','DIMECRES','DIJOUS') NOT NULL,
  `hora` enum('12','13','14','17') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hores`
--

INSERT INTO `hores` (`horaid`, `sessionid`, `dia`, `hora`) VALUES
(1, 427, 'DILLUNS', '13'),
(2, 428, 'DIMECRES', '12'),
(3, 429, 'DIJOUS', '13'),
(4, 430, 'DIMARTS', '13'),
(5, 431, 'DIMECRES', '12'),
(6, 431, 'DIMECRES', '14'),
(7, 432, 'DILLUNS', '12'),
(8, 433, 'DIMECRES', '14'),
(9, 434, 'DIJOUS', '14'),
(10, 435, 'DIMARTS', '14'),
(11, 435, 'DIJOUS', '14'),
(12, 436, 'DIMARTS', '14'),
(13, 437, 'DILLUNS', '13'),
(14, 438, 'DILLUNS', '12'),
(15, 439, 'DIMARTS', '13'),
(16, 440, 'DIMECRES', '14'),
(17, 441, 'DILLUNS', '14'),
(18, 442, 'DIJOUS', '14'),
(19, 443, 'DIMARTS', '14'),
(20, 444, 'DIMECRES', '13'),
(21, 445, 'DIJOUS', '12'),
(22, 446, 'DIMARTS', '14'),
(23, 446, 'DIJOUS', '14'),
(24, 447, 'DIMARTS', '13'),
(25, 448, 'DIJOUS', '17'),
(26, 449, 'DILLUNS', '14'),
(27, 450, 'DIMECRES', '13'),
(28, 451, 'DIJOUS', '12'),
(29, 452, 'DILLUNS', '13'),
(30, 453, 'DIJOUS', '13'),
(31, 454, 'DILLUNS', '14'),
(32, 455, 'DIMARTS', '13'),
(33, 456, 'DIMECRES', '12'),
(34, 457, 'DIMARTS', '14'),
(35, 457, 'DIJOUS', '14'),
(36, 458, 'DIMARTS', '12'),
(37, 459, 'DIMARTS', '17'),
(38, 460, 'DILLUNS', '14'),
(39, 461, 'DIMARTS', '12'),
(40, 462, 'DIMECRES', '12'),
(41, 463, 'DILLUNS', '12'),
(42, 464, 'DIMARTS', '14'),
(43, 465, 'DILLUNS', '14'),
(44, 466, 'DIMARTS', '12'),
(45, 467, 'DIJOUS', '13'),
(46, 468, 'DIMARTS', '14'),
(47, 468, 'DIJOUS', '14'),
(48, 469, 'DIJOUS', '13'),
(49, 470, 'DIMECRES', '17'),
(50, 471, 'DIMARTS', '14'),
(51, 472, 'DIMECRES', '14'),
(52, 473, 'DIJOUS', '14'),
(53, 474, 'DIMARTS', '12'),
(54, 475, 'DIMECRES', '13'),
(55, 476, 'DILLUNS', '13'),
(56, 477, 'DIMARTS', '13'),
(57, 478, 'DIJOUS', '14'),
(58, 479, 'DIMARTS', '14'),
(59, 479, 'DIJOUS', '14'),
(60, 480, 'DIJOUS', '12'),
(61, 481, 'DIJOUS', '13'),
(62, 482, 'DILLUNS', '12'),
(63, 483, 'DIMARTS', '13'),
(64, 484, 'DIMARTS', '14'),
(65, 485, 'DIMECRES', '13'),
(66, 486, 'DIJOUS', '14'),
(67, 487, 'DIMECRES', '12'),
(68, 488, 'DIJOUS', '12'),
(69, 489, 'DILLUNS', '13'),
(70, 490, 'DIMARTS', '14'),
(71, 491, 'DIJOUS', '13'),
(72, 492, 'DIMARTS', '14'),
(73, 492, 'DIJOUS', '14'),
(74, 493, 'DIJOUS', '14'),
(75, 494, 'DILLUNS', '13'),
(76, 495, 'DIMARTS', '12');

-- --------------------------------------------------------

--
-- Table structure for table `inscripcions`
--

CREATE TABLE `inscripcions` (
  `inscid` int(11) NOT NULL,
  `nomresp` char(30) NOT NULL,
  `correuresp` char(35) NOT NULL,
  `alumneid` int(11) NOT NULL,
  `extescid` int(11) NOT NULL,
  `sessionid` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionid` int(11) NOT NULL,
  `nom` char(25) NOT NULL,
  `extescid` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `nombrehores` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionid`, `nom`, `extescid`, `places`, `nombrehores`) VALUES
(427, 'INI. ESP. 1R DL', 248, 30, '1'),
(428, 'INI. ESP. 1R DX', 248, 30, '1'),
(429, 'INI. ESP. 1R DJ', 248, 30, '1'),
(430, 'IOGA 1R DM', 249, 16, '1'),
(431, 'IOGA 1R DX', 249, 16, '1'),
(432, 'ENGLISH 1R DL', 250, 2, '1'),
(433, 'ENGLISH 1R DX', 250, 28, '1'),
(434, 'ENGLISH 1R DJ', 250, 28, '1'),
(435, 'COR 1R DM I DJ', 251, 100, '2'),
(436, 'BALL 1R DM', 253, 30, '1'),
(437, 'TEST 1R I 2N DL 13', 254, 30, '1'),
(438, 'INI. ESP. 2N DL', 255, 30, '1'),
(439, 'INI. ESP. 2N DM', 255, 30, '1'),
(440, 'INI. ESP. 2N DX', 255, 30, '1'),
(441, 'IOGA 2N DL', 256, 16, '1'),
(442, 'IOGA 2N DJ', 256, 16, '1'),
(443, 'ENGLISH 2N DM', 257, 28, '1'),
(444, 'ENGLISH 2N DX', 257, 28, '1'),
(445, 'ENGLISH 2N DJ', 257, 28, '1'),
(446, 'COR 2N DM I DJ', 258, 100, '2'),
(447, 'BALL 2N DM', 259, 30, '1'),
(448, 'ESCACS 2N DJ', 260, 28, '1'),
(449, 'JOC COOP 3R DL', 261, 30, '1'),
(450, 'JOC COOP 3R DX', 261, 30, '1'),
(451, 'JOC COOP 3R DJ', 261, 30, '1'),
(452, 'IOGA 3R DL', 262, 16, '1'),
(453, 'IOGA 3R DJ', 262, 16, '1'),
(454, 'ENGLISH 3R DL', 263, 28, '1'),
(455, 'ENGLISH 3R DM', 263, 28, '1'),
(456, 'ENGLISH 3R DX', 263, 28, '1'),
(457, 'COR 3R DM I DJ', 264, 100, '2'),
(458, 'BALL 3R DM', 265, 30, '1'),
(459, 'ESCACS 3R DM', 266, 28, '1'),
(460, 'JOC COOP 4T DL', 267, 30, '1'),
(461, 'JOC COOP 4T DM', 267, 30, '1'),
(462, 'JOC COOP 4T DX', 267, 30, '1'),
(463, 'IOGA 4T DL', 268, 16, '1'),
(464, 'IOGA 4T DM', 268, 16, '1'),
(465, 'ENGLISH 4T DL', 269, 28, '1'),
(466, 'ENGLISH 4T DM', 269, 28, '1'),
(467, 'ENGLISH 4T DJ', 269, 28, '1'),
(468, 'COR 4T DM I DJ', 270, 100, '2'),
(469, 'BALL 4T DJ', 271, 30, '1'),
(470, 'ESCACS 4T DX', 272, 28, '1'),
(471, 'ESP ALT 5E DM', 273, 30, '1'),
(472, 'ESP ALT 5E DX', 273, 30, '1'),
(473, 'ESP ALT 5E DJ', 273, 30, '1'),
(474, 'IOGA 5E DM', 274, 16, '1'),
(475, 'IOGA 5E DX', 274, 16, '1'),
(476, 'ENGLISH 5E DL', 275, 28, '1'),
(477, 'ENGLISH 5E DM', 275, 28, '1'),
(478, 'ENGLISH 5E DJ', 275, 28, '1'),
(479, 'COR 5E DM I DJ', 276, 100, '2'),
(480, 'BALL 5E DJ', 277, 30, '1'),
(481, 'ESCACS 5E DJ', 278, 28, '1'),
(482, 'TEATRE 5E DL', 279, 60, '1'),
(483, 'DEBAT 5E DM', 280, 28, '1'),
(484, 'ESP ALT 6E DM', 281, 30, '1'),
(485, 'ESP ALT 6E DX', 281, 30, '1'),
(486, 'ESP ALT 6E DJ', 281, 30, '1'),
(487, 'IOGA 6E DX', 282, 16, '1'),
(488, 'IOGA 6E DJ', 282, 16, '1'),
(489, 'ENGLISH 6E DL', 283, 28, '1'),
(490, 'ENGLISH 6E DM', 283, 28, '1'),
(491, 'ENGLISH 6E DJ', 283, 28, '1'),
(492, 'COR 6E DM I DJ', 284, 100, '2'),
(493, 'BALL 6E DJ', 285, 30, '1'),
(494, 'TEATRE 6E DL', 286, 60, '1'),
(495, 'DEBAT 6E DM', 287, 28, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `altres-cursos-extraescolar`
--
ALTER TABLE `altres-cursos-extraescolar`
  ADD PRIMARY KEY (`altcurext`),
  ADD KEY `extescid` (`extescid`),
  ADD KEY `cursid` (`cursid`);

--
-- Indexes for table `alumnes`
--
ALTER TABLE `alumnes`
  ADD PRIMARY KEY (`alumneid`),
  ADD KEY `cursid` (`cursid`),
  ADD KEY `classeid` (`classeid`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`classeid`);

--
-- Indexes for table `configuracio`
--
ALTER TABLE `configuracio`
  ADD PRIMARY KEY (`clau`);

--
-- Indexes for table `curs`
--
ALTER TABLE `curs`
  ADD PRIMARY KEY (`cursid`);

--
-- Indexes for table `extraescolars`
--
ALTER TABLE `extraescolars`
  ADD PRIMARY KEY (`extescid`),
  ADD KEY `cursid` (`cursid`);

--
-- Indexes for table `hores`
--
ALTER TABLE `hores`
  ADD PRIMARY KEY (`horaid`),
  ADD KEY `sessionid` (`sessionid`);

--
-- Indexes for table `inscripcions`
--
ALTER TABLE `inscripcions`
  ADD PRIMARY KEY (`inscid`),
  ADD KEY `alumneid` (`alumneid`),
  ADD KEY `extescid` (`extescid`),
  ADD KEY `sessionid` (`sessionid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionid`),
  ADD KEY `extescid` (`extescid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `altres-cursos-extraescolar`
--
ALTER TABLE `altres-cursos-extraescolar`
  MODIFY `altcurext` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumnes`
--
ALTER TABLE `alumnes`
  MODIFY `alumneid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1191;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `classeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `curs`
--
ALTER TABLE `curs`
  MODIFY `cursid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `extraescolars`
--
ALTER TABLE `extraescolars`
  MODIFY `extescid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `hores`
--
ALTER TABLE `hores`
  MODIFY `horaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `inscripcions`
--
ALTER TABLE `inscripcions`
  MODIFY `inscid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `altres-cursos-extraescolar`
--
ALTER TABLE `altres-cursos-extraescolar`
  ADD CONSTRAINT `altres-cursos-extraescolar_ibfk_1` FOREIGN KEY (`extescid`) REFERENCES `extraescolars` (`extescid`),
  ADD CONSTRAINT `altres-cursos-extraescolar_ibfk_2` FOREIGN KEY (`cursid`) REFERENCES `curs` (`cursid`);

--
-- Constraints for table `alumnes`
--
ALTER TABLE `alumnes`
  ADD CONSTRAINT `alumnes_ibfk_1` FOREIGN KEY (`cursid`) REFERENCES `curs` (`cursid`),
  ADD CONSTRAINT `alumnes_ibfk_2` FOREIGN KEY (`classeid`) REFERENCES `classe` (`classeid`);

--
-- Constraints for table `extraescolars`
--
ALTER TABLE `extraescolars`
  ADD CONSTRAINT `extraescolars_ibfk_1` FOREIGN KEY (`cursid`) REFERENCES `curs` (`cursid`);

--
-- Constraints for table `hores`
--
ALTER TABLE `hores`
  ADD CONSTRAINT `hores_ibfk_1` FOREIGN KEY (`sessionid`) REFERENCES `sessions` (`sessionid`);

--
-- Constraints for table `inscripcions`
--
ALTER TABLE `inscripcions`
  ADD CONSTRAINT `inscripcions_ibfk_1` FOREIGN KEY (`extescid`) REFERENCES `extraescolars` (`extescid`),
  ADD CONSTRAINT `inscripcions_ibfk_2` FOREIGN KEY (`alumneid`) REFERENCES `alumnes` (`alumneid`),
  ADD CONSTRAINT `inscripcions_ibfk_3` FOREIGN KEY (`sessionid`) REFERENCES `sessions` (`sessionid`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `extescid` FOREIGN KEY (`extescid`) REFERENCES `extraescolars` (`extescid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
