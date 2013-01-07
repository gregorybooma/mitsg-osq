-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2011 at 02:10 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jesslin+ocean`
--

-- --------------------------------------------------------

--
-- Table structure for table `multichoice`
--

CREATE TABLE IF NOT EXISTS `multichoice` (
  `PrimaryKey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Category` varchar(30) NOT NULL,
  `Question` text NOT NULL,
  `Choices` text NOT NULL,
  `Answer` int(10) unsigned NOT NULL,
  `Difficulty` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PrimaryKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `multichoice`
--

INSERT INTO `multichoice` (`PrimaryKey`, `Category`, `Question`, `Choices`, `Answer`, `Difficulty`) VALUES
(1, 'Biology', 'Northern elephant seals come ashore during the spring and summer to do what?', 'Mate<ANSWER>Give birth<ANSWER>Eat<ANSWER>Molt their fur', 3, NULL),
(2, 'Chemistry', 'Together, sodium and chloride alone comprise approximately what percent of the total salts in the ocean?', '100<ANSWER>90<ANSWER>50<ANSWER>10', 1, NULL),
(3, 'Biology', 'The habitat of blue whales, tunas and swordfishes is best described as:', 'Benthic<ANSWER>Littoral<ANSWER>Estuarine<ANSWER>Pelagic', 3, NULL),
(4, 'Chemistry', 'Which of the following are NOT impacted by the decreasing pH levels in ocean water, termed ocean acidification?', 'Growth rates of coral reefs<ANSWER>Mollusk shells<ANSWER>Diatom shells<ANSWER>Shark teeth', 2, NULL),
(5, 'Chemistry', 'What chemical is the principle source of energy at many of Earth’s hydrothermal vent systems?', 'Oxygen<ANSWER>Carbon dioxide<ANSWER>Hydrogen Sulfide<ANSWER>Iron Oxide', 2, NULL),
(6, 'Biology', 'Intensive aquaculture of which of the following organisms has contributed to loss of mangroves around the world?', 'Tilapia<ANSWER>Cod<ANSWER>Shrimp<ANSWER>Salmon', 2, NULL),
(7, 'Chemistry', 'When traveling down the water column which will dissolve first?', 'A shell composed of aragonite<ANSWER>A shell composed of calcite<ANSWER>Neither will dissolve<ANSWER>A shell composed of calcium carbonate', 0, NULL),
(8, 'Geography', 'Which continent does NOT border the Indian Ocean?', 'Africa<ANSWER>Asia<ANSWER>North America<ANSWER>Australia', 2, NULL),
(9, 'Geology', 'Which of the following is NOT an example of a metamorphic rock?', 'Gneiss<ANSWER>Schist<ANSWER>Marble<ANSWER>Basalt', 3, NULL),
(10, 'Technology', 'An XBT is an oceanographic instrument that measures which of the following parameters?', 'Salinity<ANSWER>Oxygen<ANSWER>Iron<ANSWER>Temperature', 3, NULL),
(11, 'Technology', 'A box corer is used for collecting samples of what?', 'Sediment<ANSWER>Fish<ANSWER>Water<ANSWER>Plankton', 0, NULL),
(12, 'Technology', 'When calculating a position fix, a GPS receiver solves for four position variables: longitude, latitude, height, and what other variable?', 'Satellite speed<ANSWER>Receiver speed<ANSWER>Receiver time drift<ANSWER>Satellite time drift', 2, NULL),
(13, 'Technology', 'The first reliable measurement of the average depth of an ocean was made by which method', 'Timing the speed of earthquake-generated waves in the Pacific<ANSWER>Repeatedly lowering a lead line or sounding line in Antarctica<ANSWER>Using acoustic depth sounders in the Atlantic<ANSWER>Collecting deep sea sediments from multiple sites in the Arctic', 0, NULL),
(14, 'Social Sciences', 'How often have men descended to the Challenger Deep?', 'Never<ANSWER>Once<ANSWER>Twice<ANSWER>Three times', 1, NULL),
(15, 'Social Sciences', 'Which of the following is NOT an example of human-made structure designed to stabilize the shoreline?', 'Jetty<ANSWER>Pier<ANSWER>Groin<ANSWER>Breakwater', 1, NULL),
(16, 'Social Sciences', 'This word originates from the Norse word for piracy:', 'Sailor<ANSWER>Viking<ANSWER>Knarr<ANSWER>Leif', 1, NULL),
(17, 'Social Sciences', 'In 1933, the US tanker Ramapo encountered the highest wind wave ever measured reliably. How tall was this wave?', '12 meters<ANSWER>23 meters<ANSWER>34 meters<ANSWER>45meters', 2, NULL),
(18, 'Social Sciences', 'In 2006, which expedition, led by the grandson of Thor Heyerdahl (Higher-doll), replicated the 1947 Kon Tiki voyage? ', 'Thor Tiki<ANSWER>Nordic Voyage<ANSWER>Equatorial expedition<ANSWER>Tangaroa expedition', 3, NULL),
(19, 'Physical Oceanography', 'What part of a tidal cycle has minimal current?', 'Ebb tide<ANSWER>Slack tide<ANSWER>Flood tide<ANSWER>Lunar tide', 1, NULL),
(20, 'Physical Oceanography', 'Which of the following is NOT a predominant characteristic of subtropical regions?', 'Weak wind<ANSWER>Weak surface currents<ANSWER>Clear skies with abundant sunshine<ANSWER>Stormy weather with high winds', 3, NULL),
(21, 'Physical Oceanography', 'What does the term sigma-t define?', 'The specific gravity of sea water<ANSWER>The density anomaly of sea water<ANSWER>The density of sea water<ANSWER>The statistical variation in the density of sea water', 1, NULL),
(22, 'Physical Oceanography', 'Stokes Law states that the sinking velocity of a particle depends on which of the following factors?', 'Whether the particle is phytoplankton or detritus<ANSWER>The stratification of the water column<ANSWER>The intensity of wave action at the surface<ANSWER>The size and density of the particle', 3, NULL),
(23, 'Marine Policy', 'What 1979 Act gave the EPA the power to monitor and regulate the disposal of sewage sludge, industrial waste, radioactive waste and biohazardous materials into the nation''s territorial waters?', 'Oil Ocean Act<ANSWER>Anti-Debris Act<ANSWER>Debris Reduction Act<ANSWER>Ocean Dumping Act', 3, NULL),
(24, 'Marine Policy', 'What United Nations conference, also known as the Earth Summit, led to the agreement to protect the biodiversity on Earth?', 'United Nations Conference on Trade and Development<ANSWER>United Nations Conference on Environment and Development<ANSWER>United Nations Conference on the Human Environment<ANSWER>Habitat International Coalition Conference', 1, NULL),
(25, 'Marine Policy', 'This national marine sanctuary, sometimes called The Galapagos of California, is home to kelp forests, sea lions and blue whales.', 'Stellwagen Bank<ANSWER>Channel Islands<ANSWER>Monterey Bay<ANSWER>Olympic Coast', 1, NULL),
(26, 'Marine Policy', 'In what year did the North American Pacific herring fishery collapse?', '1990<ANSWER>1993<ANSWER>1995<ANSWER>2000', 1, NULL),
(27, 'Geology', 'Defined as mass per unit volume, what property is a useful means of identifying rocks and minerals?', 'Relativity<ANSWER>Density<ANSWER>Luminosity<ANSWER>Heat Flow', 1, NULL),
(28, 'Geology', 'What is the approximate age of the oldest oceanic crust?', '100 thousand years<ANSWER>1 million years<ANSWER>50 million years<ANSWER>180 million years', 3, NULL),
(29, 'Geology', 'High tidal range coastlines do NOT feature:', 'Large tidal flats<ANSWER>Broad marshes<ANSWER>Amphidromic points<ANSWER>Strong currents', 2, NULL),
(30, 'Geography', 'Which landmass straddles a mid-ocean ridge?', 'Madagascar<ANSWER>Iceland<ANSWER>Greenland<ANSWER>Australia', 1, NULL),
(31, 'Geography', 'Which region is known by the nickname "Pirate Alley" due to the large amount of pirate activity in the area?', 'Yellow Sea<ANSWER>Arabian Sea<ANSWER>Okhotsk Sea<ANSWER>Gulf of Aden', 3, NULL),
(32, 'Chemistry', 'Which of the following is a characteristic of an estuarine turbidity maximum?', 'Increased flocculation<ANSWER>Low suspended sediment concentrations<ANSWER>Kelvin waves<ANSWER>Temperature change', 0, NULL),
(33, 'Biology', 'Lophelia (LO-fee-lee-ua) coral reefs in the North Atlantic are being primarily damaged by:', 'Rising temperature<ANSWER>Trawling<ANSWER>Cyanide poisoning<ANSWER>Pfiesteria', 1, NULL),
(34, 'Biology', 'Seals have a variety of adaptations for deep dives. To avoid nitrogen narcosis, which adaptation is most helpful?', 'ATP production by fermentation rather than respiration<ANSWER>Exhaling at the start of the dive and collapsing the lungs<ANSWER>Reliance upon stored oxygen in blood and muscles<ANSWER>Re-routing blood flow to where it is most needed', 1, NULL);
