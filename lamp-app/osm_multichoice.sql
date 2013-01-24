-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:443
-- Generation Time: Jan 24, 2013 at 04:50 PM
-- Server version: 5.0.77
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osm_multichoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

DROP TABLE IF EXISTS `leaderboard`;
CREATE TABLE IF NOT EXISTS `leaderboard` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(80) NOT NULL,
  `score` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

-- --------------------------------------------------------

--
-- Table structure for table `multichoice`
--

DROP TABLE IF EXISTS `multichoice`;
CREATE TABLE IF NOT EXISTS `multichoice` (
  `PrimaryKey` int(10) unsigned NOT NULL auto_increment,
  `Category` varchar(30) NOT NULL,
  `Question` text NOT NULL,
  `Choices` text NOT NULL,
  `Answer` int(10) unsigned NOT NULL,
  `Difficulty` text,
  `reason` text NOT NULL,
  `upCount` int(11) NOT NULL,
  `downCount` int(11) NOT NULL,
  PRIMARY KEY  (`PrimaryKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `multichoice`
--

INSERT INTO `multichoice` VALUES
(5, 'Chemistry', 'What chemical is the principle source of energy at many of Earth''s hydrothermal vent systems?', 'Oxygen<ANSWER>Carbon dioxide<ANSWER>Hydrogen Sulfide<ANSWER>Iron Oxide', 2, 'Easy', 'Hydrothermal chemosynthesis relies on the conversion of sulfur for energy', 0, 0),
(10, 'Technology', 'An XBT is an oceanographic instrument that measures which of the following parameters?', 'Salinity<ANSWER>Oxygen<ANSWER>Iron<ANSWER>Temperature', 3, 'moderate', 'XBT=External BathyThermograph. T almost always temperature', 9, 6),
(11, 'Technology', 'A box corer is used for collecting samples of what?', 'Sediment<ANSWER>Fish<ANSWER>Water<ANSWER>Plankton', 0, 'easy', 'Box corers are not used for the other choices', 4, 2),
(12, 'Technology', 'When calculating a position fix, a GPS receiver solves for four position variables: longitude, latitude, height, and what other variable?', 'Satellite speed<ANSWER>Receiver speed<ANSWER>Receiver time drift<ANSWER>Satellite time drift', 2, 'Moderate', 'Receiver drift is proportionately the most critical of the choices', 6, 8),
(14, 'Social Sciences', 'How often have men descended to the Challenger Deep?', 'Never<ANSWER>Once<ANSWER>Twice<ANSWER>Three times', 2, 'Easy', 'Trieste, Don Walsh and Jacques Piccard, January  1960; and DEEPSEA CHALLENGER, James Cameron, March 2012.', 3, 0),
(15, 'Social Sciences', 'Which of the following is NOT an example of human-made structure designed to stabilize the shoreline?', 'Jetty<ANSWER>Pier<ANSWER>Groin<ANSWER>Breakwater', 1, 'Easy', 'A pier does not stabilize. All the other choices do.', 6, 5),
(16, 'Social Sciences', 'This word originates from the Norse word for piracy:', 'Sailor<ANSWER>Viking<ANSWER>Knarr<ANSWER>Leif', 1, 'Moderate', 'From Norse: Vik=bay and ing=coming from. Raiders coming from the bay', 5, 1),
(19, 'Physical Oceanography', 'What part of a tidal cycle has minimal current?', 'Ebb tide<ANSWER>Slack tide<ANSWER>Flood tide<ANSWER>Lunar tide', 1, 'Moderate', 'At slack tide, there is a point where the water hardly moves.', 7, 2),
(25, 'Marine Policy', 'This national marine sanctuary, sometimes called The Galapagos of California, is home to kelp forests, sea lions and blue whales.', 'Stellwagen Bank<ANSWER>Channel Islands<ANSWER>Monterey Bay<ANSWER>Olympic Coast', 1, 'Moderate', 'Channel Islands is known for these. Monterey is not. The others are not Californian.', 6, 2),
(28, 'Geology', 'What is the approximate age of the oldest oceanic crust?', '100 thousand years<ANSWER>1 million years<ANSWER>50 million years<ANSWER>180 million years', 3, 'Moderate', 'Due to subduction, any older ocean crust has returned to mantle.', 7, 0),
(29, 'Geology', 'What feature is missing from high tidal range coastlines?', 'Large tidal flats<ANSWER>Broad marshes<ANSWER>Amphidromic points<ANSWER>Strong currents', 2, 'moderate', 'High tidal ranges are usually in restricted bays. Amphidromic points need large expanses.', 4, 3),
(34, 'Biology', 'Seals have a variety of adaptations for deep dives. To avoid nitrogen narcosis, which adaptation is most helpful?', 'ATP production by fermentation rather than respiration<ANSWER>Exhaling at the start of the dive and collapsing the lungs<ANSWER>Reliance upon stored oxygen in blood and muscles<ANSWER>Re-routing blood flow to where it is most needed', 1, 'Moderate', 'The best way to avoid narcosis is to have less Nitrogen. Expelling it before diving helps to solve this problem', 10, 3),
(35, 'Biology', 'Approximately how many teeth can a shark lose and replace in its lifetime?''', '1,000,000<ANSWER>30,000<ANSWER>1,000<ANSWER>100', 1, 'Easy', 'While teeth are continually replaced  shark''s lifespan makes it unlikely to exceed 30 000 teeth', 0, 0),
(37, 'Physical Oceanography', 'What is the oceanic mixed layer?', 'a nearly isothermal layer near the ocean surface<ANSWER>a nearly isothermal layer near the ocean bottom<ANSWER>the atmospheric boundary layer just above the ocean surface<ANSWER>where mixing occurs in the deep ocean', 0, 'Moderate', 'The mixed layer is the top layer of ocean water.', 6, 3),
(38, 'Technology', 'The deep-scattering layer that reflects sonar, is caused by:', 'a thermocline<ANSWER>a halocline<ANSWER>living organisms<ANSWER>dissolved gases', 2, 'Easy', 'The daily vertical migration of organisms is so large as a biomass that it reflects and scatters sonar', 7, 5),
(39, 'Physical Oceanography', 'What is an estuary defined as?', 'any coastal or nearshore area<ANSWER>a breeding ground for migratory animals<ANSWER>the confluence of two or more currents<ANSWER>a semi-enclosed body, where fresh and salt water mix', 3, 'Easy', 'Where fresh water and salt water mix is the classic definition. The other answers don''t fit this definition.', 2, 2),
(40, 'Marine Policy', 'Which month was declared National Oceans Month under the proclamation of President Obama?', 'April<ANSWER>May<ANSWER>June<ANSWER>July', 2, 'Easy', 'Proclaimed on June 2nd, 2011 by President Obama', 8, 2),
(41, 'Geology', 'Where would you be most likely to find oil and natural gas reserves?', 'Back-arc spreading centers<ANSWER>Subduction zones<ANSWER>Active margins<ANSWER>Passive margins', 3, 'Easy', 'Oil and Natural gas are products of organic breakdown. Only a passive margin would allow the time needed for this process.', 5, 7),
(43, 'Biology', 'What is the term that describes why whales have larger concentrations of PCBs than smaller fishes?', 'bioremediation<ANSWER>bioluminescence<ANSWER>biomass<ANSWER>biomagnification', 3, 'Easy', 'The higher up the food chain the more toxins are concentrated. This is called biomagnification.', 7, 3),
(44, 'Chemistry', 'What are the two forms of calcium carbonate precipitated by living organisms?', 'Calcite and aragonite<ANSWER>Hematite and bauxite<ANSWER>Calcite and silicate<ANSWER>Nacrite and feldspar', 0, 'Moderate', 'Calcite and Aragonite is the only answer given that are both forms of Calcium Carbonate', 6, 2),
(45, 'Biology', 'Which of the following man-made materials has NOT been commonly used to create artificial reefs?', 'Car tires<ANSWER>Cars<ANSWER>Rubble from demolished bridges<ANSWER>Desk chairs', 3, 'Easy', 'Desk chairs are easily recyclable and don''t exist in enough quantity for reef building.', 6, 5),
(50, 'Physical Oceanography', 'What type of tidal pattern consists of one high tide and one low tide per day?', 'Diurnal<ANSWER>Mixed Semidiurnal<ANSWER>Mixed diurnal<ANSWER>Semidiurnal', 0, 'Easy', 'Diurnal means daily or once per day', 5, 3),
(51, 'Technology', 'What technology, used to detect submarines in World War I, was later adapted to ocean floor surveys?', 'EPIRB (Eee-Perb)<ANSWER>Echo sounder<ANSWER>Ponar<ANSWER>Altimeter', 1, 'Moderate', 'Echo Sounding or Sonar is used to study the dimensions of the ocean floor and objects upon it', 9, 3),
(52, 'Geology', 'What is the point on the surface of the Earth that is directly above an earthquake location called?', 'focus<ANSWER>hypocenter<ANSWER>hypercenter<ANSWER>epicenter', 3, 'Easy', 'The classic definition of an epicenter', 7, 2),
(53, 'Biology', 'What plant did the Integrated Ocean Drilling Program discover that lived in the Arctic 49 million years ago?', 'freshwater ferns<ANSWER>gingko trees<ANSWER>prickly pear cacti<ANSWER>cat tails', 0, 'Difficult', 'Azolla is a free floating freshwater fern  found in 2006 on ACEX 302', 6, 1),
(54, 'Chemistry', 'What gas molecules, consisting of methane surrounded by water, may in the future be a source of energy?', 'gas hydrate<ANSWER>sulfuric acid<ANSWER>hydrogen peroxide<ANSWER>sodium chloride', 0, 'Easy', 'Gas Hydrates is the only answer here that is a methane product', 4, 1),
(58, 'Biology', 'Which of the following is an important predator of the sea urchin?', 'Harbor seal<ANSWER>Sea otter<ANSWER>Giant Pacific octopus<ANSWER>Mola Mola', 1, 'Easy', 'Sea Otters dine on urchins, the others do not.', 4, 0),
(59, 'Biology', 'Which of the following is herbivorous?', 'humpback whale<ANSWER>manta ray<ANSWER>dugong<ANSWER>sea otter', 2, 'Easy', 'The dugong is the only herbivore here', 7, 2),
(60, 'Geology', 'The dominant process shaping coastal topography is which of the following?', 'Ice push<ANSWER>Seismic disturbances<ANSWER>Turbidity currents<ANSWER>Wave action', 3, 'Easy', 'Wave action is constant, the others are not. With time, wave action is dominant.', 9, 1),
(63, 'Biology', 'Thumb-splitter and Mantis shrimp are common names of members of which Arthropod order?', 'Isopoda (eye-soh-poh-dah)<ANSWER>Stomatopoda (stow-mah-tow-poh-dah)<ANSWER>Chelicerata (chuh-lis-er-ah-tah)<ANSWER>Cirripedia (sear-ih-pee-dee-ah)', 1, 'Moderate', 'Stomatapods are characterized by ''Raptorial appendages and eyes that will polarize light.', 4, 7),
(67, 'Biology', 'In a deep, partially-mixed estuary, the majority of primary production comes from what?', 'Macro algae<ANSWER>Unicellular algae on the sea bottom<ANSWER>Sea grasses<ANSWER>Phytoplankton', 3, 'Easy', 'Primary production from phytoplankton is so large it easily out-produces other sources.', 6, 3),
(68, 'Chemistry', 'Which greenhouse gas are scientists concerned about being released in to the atmosphere as permafrost in polar regions thaw?', 'methane<ANSWER>carbon dioxide<ANSWER>nitrous oxide<ANSWER>ozone', 0, 'Easy', 'Methane is a a product of organic decomposition  Organics trapped in permafrost will add much methane.', 5, 3),
(69, 'Geography', 'Which country has a coastline with a major upwelling area?', 'Namibia<ANSWER>Australia<ANSWER>Peru<ANSWER>Norway', 2, 'Easy', 'One of the largest upwellings off the coast of Peru--it feeds a rich fishing industry', 4, 2),
(70, 'Physical Oceanography', 'What does the Beaufort scale characterize?', 'Ocean temperature depth relationships<ANSWER>Wind speed and sea surface conditions<ANSWER>Seawater optical clarity<ANSWER>The temperature difference at the air-sea interface', 1, 'Easy', 'Named for Sir Francis Beaufort, first official use on the Beagle voyage of Darwin', 6, 4),
(72, 'Geography', 'What is the name given to the large continental landmass that existed some 200 million years before present?', 'Panacea (pan-ah-SEE-ah)<ANSWER>Pancreas (PAN-kree-us)<ANSWER>Pangaea (pan-JEE-uh)<ANSWER>Pachyderm (PAK-e-derm)', 2, 'Easy', 'Pangaea means "All Lands."', 4, 0),
(73, 'Biology', 'Which of the following is NOT a type of plankton?', 'Photoplankton<ANSWER>Ultraplankton<ANSWER>Phytoplankton<ANSWER>Zooplankton', 0, 'Easy', 'Photoplankton is not a term used. Phytoplankton covers the concept.', 6, 5),
(74, 'Biology', 'Which of the following is an example of nekton?', 'Plankton<ANSWER>Barnacles<ANSWER>Sipunculid worms<ANSWER>Sea turtles', 3, 'Easy', 'Turtles are the only "free swimmers" here.', 6, 3),
(75, 'Biology', 'Which of the following marine mammals is NOT found in or near Antarctica?', 'Polar bears<ANSWER>Emperor penguins<ANSWER>Leopard seals<ANSWER>Killer whales', 0, 'Easy', 'Arctic means "Bear." Antarctic "No Bear"', 3, 7),
(82, 'Technology', 'Which piece of equipment would be best for collecting a water sample?', 'Secchi disk<ANSWER>Niskin bottle<ANSWER>trawl<ANSWER>box corer', 1, 'Easy', 'Niskin bottles will hold water; the others are not designed to.', 7, 4),
(83, 'Biology', 'What animals dominated the ocean between about 245 million and 90 million years ago?', 'Sharks<ANSWER>Ichthyosaurs<ANSWER>Coelacanths (SEE-luh-canths)<ANSWER>Whales', 1, 'Easy', 'Ichthyosaurs were the large predators of this time. The others remain today.', 5, 3),
(85, 'Chemistry', 'Salinity has historically been measured by determining the amount of which of the following elements in the water?', 'Sodium<ANSWER>Chloride<ANSWER>Magnesium<ANSWER>Sulfate', 1, 'Moderate', 'Choride is in very constant proportions. It''s easy to measure and a reliable test for salinity.', 7, 5),
(86, 'Biology', 'What do Cnidarians (nih-dare-E-ans) release as a defense mechanism?', 'Statocysts<ANSWER>Otoliths<ANSWER>Nematocysts<ANSWER>Spicules (spic-U-ulhs)', 2, 'Moderate', 'Nematocysts (stinging Cells) is a needed characteristic to be classified as a Cnidarian', 10, 5),
(87, 'Physical Oceanography', 'How are tsunamis primarily formed?', 'Strong winds pushing water up against the land<ANSWER>Movement of the seafloor displacing large volumes of water<ANSWER>Landslides entering the ocean from nearby steep slopes on land<ANSWER>Sudden melting of ice', 1, 'Moderate', 'Of these answers, only movement of the sea floor is a primary cause of tsunamis.', 7, 1),
(88, 'Technology', 'A transmissometer (trans-miss-AH-mih-ter) is used to measure:', 'The diffusion rate across an osmotic membrane<ANSWER>The rate of mass transport of ocean currents<ANSWER>Tidal flow through a bay or inlet<ANSWER>Light transmittance in sea water', 3, 'Easy', 'Light is the best example of a transmitted energy here.', 5, 5),
(90, 'Physical Oceanography', 'What causes the four yearly seasons?', 'The orbit of the moon<ANSWER>The tilt of Earth<ANSWER>The changing distance of Earth to the sun<ANSWER>Fluctuations in the sun''s intensity', 1, 'Easy', 'Only the tilt of Earth. The others will not influence seasonal change', 11, 1),
(92, 'Physical Oceanography', 'Which of the following processes moves sand and is caused by breaking waves in the surf zone?', 'turbidity current<ANSWER>density underflow<ANSWER>longshore sediment transport<ANSWER>dissolved load', 2, 'Moderate', 'Longshore transport moves the sand. The others either do not or are not associated with the surf zone.', 6, 2),
(13, 'Physical Oceanography', 'What is the term that describes the height of a wave above the mean water level?', 'Wave amplitude<ANSWER>Wave height<ANSWER>Wavelength<ANSWER>Wave period', 0, 'Moderate', 'This is the classic definition of Amplitude. Also one half wave height', 11, 0),
(96, 'Chemistry', 'The Redfield ration refers to the molar ratio in descending order of which elements?', 'Nitrogen: Oxygen: Phosphorous<ANSWER>Carbon: Oxygen: Nitrogen<ANSWER>Oxygen: Silica: Phosphorous<ANSWER>Carbon: Nitrogen: Phosphorous', 3, 'Moderate', 'This is the ratio of the elements needed for plant growth', 0, 0),
(97, 'Geography', 'The major western boundary currents for the North Pacific and North Atlantic oceans are commonly known as which of the following?', 'California and the Azores<ANSWER>Kiroshio and the Gulf stream<ANSWER>Brazil and the Benguela<ANSWER>Antilles and the Eastern Australian', 1, 'Moderate', 'These are their given names', 0, 0),
(98, 'Biology', 'The lateral line system in teleost fishes is used primarily to detect which of the following?', 'Pressure<ANSWER>Temperature<ANSWER>Light intensity<ANSWER>Salinity', 0, 'Moderate', 'These pit like structures feel pressure changes and allow awareness  in total darkness', 0, 0),
(99, 'Biology', 'Agnathid fishes are primitive fishes that lack which of the following?', 'Mouths<ANSWER>Jaws<ANSWER>Fin rays<ANSWER>Gills', 1, 'Moderate', 'This class of fish totally lacks jaw bones', 0, 0),
(100, 'Biology', 'Primary productivity in the world’s arctic basins is often seasonal in nature due primarily to what environmental variability? ', 'Water temperature change<ANSWER>Fluctuations in shelf salinities<ANSWER>Oligotrophic or nutrient limiting conditions<ANSWER>Oscillations in Radiance', 3, 'Moderate', 'Different amounts of sunlight cause seasons in the ocean similar to those on land', 0, 0),
(101, 'Biology', 'What are the specialized stinging cells in the phylum Cnidaria are referred to as?', 'Nematocysts<ANSWER>Colloblasts<ANSWER>Endostyles<ANSWER>Pneumatophore', 0, 'Easy', 'These are contained in the cnidocytes', 0, 0),
(102, 'Biology', 'Anadromous fishes are those species of fish that can do which of the following?', 'Live in higher salinity water, but reproduce in freshwater<ANSWER>Live in fresh water, but reproduce in higher salinity water;<ANSWER>Live in surface water, but reproduce in deep water<ANSWER>Live in high latitude basins, but reproduce in temperate regions', 0, 'Difficult', 'All Anadromous fish breed in freshwater and live as adults in saltwater', 0, 0),
(103, 'Physical Oceanography', 'What oceanographic circulation feature provides nutrient rich waters to the surface?', 'Coriolis effect<ANSWER>Upwelling<ANSWER>Ekman transport<ANSWER>Frontal boundary movement', 1, 'Easy', 'Upwelling provides needed nutrients from the bottom tofeed planton', 0, 0),
(104, 'Geology', 'Which of the following is NOT a type of fault?', 'Strike-slip<ANSWER>Transform<ANSWER>Cisform<ANSWER> Dip-slip', 2, 'Easy', 'Cisform is not a geologic word', 0, 0),
(105, 'Physical Oceanography', 'Which of the following represents the different zones of the ocean from the surface to the bottom?', 'Abyssalpelagic – bathypelagic – epipelagic-oceanic<ANSWER>Oceanic-epipelagic-bathypelagic-abyssalpelagic<ANSWER>Epipelagic bathypelagic-hadalpelagic-abyssalpelagic<ANSWER>Oceanic – mesopelagic – epipelagic-abyssalpelagic', 1, 'Moderate', 'By standard definition', 0, 0),
(106, 'Geography', 'Which of the following is a major Eastern Boundary Ocean Current?', 'Kuroshio current<ANSWER>Labrador current<ANSWER>Oyashio current<ANSWER>California current', 3, 'Moderate', 'Kuroshio is western. Oyashio and Laborador are not major currents on western sides', 0, 0),
(107, 'Biology', 'Where are the sporophylls of Macrocystis found?', 'Just underneath the ocean surface<ANSWER>Within the haptera region<ANSWER>Just above the haptera region<ANSWER>In the middle of the water column', 2, 'Difficult', 'The holdfast is made of branching extensions called haptera that fix the plant to a hard substrate. Specialized blades called sporophylls are located at the base of the plants, branching off of the stipes just above the holdfast.', 0, 0),
(108, 'Biology', 'Members of the Phylum Ctenophora can often be observed with a rainblow like pattern running up and down the length of the body. What causes this light pattern?', 'Bioluminescence<ANSWER>Diffraction<ANSWER>Refraction<ANSWER>Fluoresence', 1, 'Moderate', 'Ctenophores do not produce light by diffracting available light along their length', 0, 0),
(109, 'Technology', 'Which of the following is NOT an acronym associated with a current ocean observatory system?', 'VENUS<ANSWER>MARS<ANSWER>NEPTUNE<ANSWER>PLUTO', 3, 'Difficult', 'NEPTUNE Canada is led by the University of Victoria; The Victoria Experimental Network Under the Sea (VENUS) is a shallow-water cabled observatory run by the University of Victoria; The Monterey Accelerated Research System (MARS) is part of the the Monterey Ocean Observing System ', 0, 0),
(110, 'Biology', 'The Cubozoa (within the Phylum Cnidaria) have how many image-forming eyes?', '0<ANSWER>2<ANSWER>4<ANSWER>6', 3, 'Moderate', 'These are light sensitive red spots', 0, 0),
(111, 'Biology', 'The Stauromedusae (within the Phylum Cnidaria) have been found in which of the following regions?', 'Drifting in the surface waters<ANSWER>Drifting in the mid-surface waters<ANSWER>On whale falls<ANSWER>Around hydrothermal vents', 3, 'Difficult', 'These are new species, related to shoreline species', 0, 0),
(112, 'Technology', 'Which of the following can damage bottom habitats?', 'Long lines<ANSWER>Purse seine nets<ANSWER>Bottom Trawls<ANSWER>Gill nets', 2, 'Easy', 'Trawls have contact with the bottom and "rake" the habitat', 0, 0),
(113, 'Biology', 'What is the main component of a shark skeleton?', 'Cartilage<ANSWER>Bone<ANSWER>Dentine<ANSWER>Chiton', 0, 'Easy', 'Cartilage defines this class of fish', 0, 0),
(114, 'Physical Oceanography', 'Which of the following does NOT influence sea surface salinity?', 'Air pressure<ANSWER>Precipitation<ANSWER>Evaporation<ANSWER>Runoff', 0, 'Easy', 'Air pressure has no direct effect', 0, 0),
(115, 'Social Sciences', 'Which Oceanographer is sometimes referred to as "Her Deepness"?', 'Kathleen Crane<ANSWER>Sylvia Earle<ANSWER>Ruth Turner<ANSWER>Deborah Steinberg', 1, 'Moderate', 'Sylvia made a record deep dive and has designed submersibles', 0, 0),
(116, 'Biology', 'A whale having larger concentrations of PCBs than smaller fishes is an example of which phenomenon?', 'Bioremediation<ANSWER>Bioluminescence<ANSWER>Biomass<ANSWER>Biomagnification', 3, 'Easy', 'Larger species concentrate chemicals by eating smaller species', 0, 0),
(117, 'Biology', 'Which of the following organisms is herbivorous?', 'Humpback whale<ANSWER>Manta ray<ANSWER>Dugong<ANSWER>Sea otter', 2, 'Moderate', 'Dugongs are the only species here that are not straight carnivors', 0, 0),
(118, 'Geography', 'Which of the following currents has the largest volume transport?', 'Gulf Stream<ANSWER>Benguela<ANSWER>Somali<ANSWER>Kuroshio', 0, 'Moderate', 'Owing to the shapes of the contients, the Gulfstream has a higher concentrated flow', 0, 0),
(119, 'Chemistry', 'Scientists are concerned about which greenhouse gas being released into the atmosphere as permafrost in Polar Regions thaws?', 'Methane<ANSWER>Carbon Dioxide<ANSWER>Nitrous oxide<ANSWER>Ozone', 0, 'Easy', 'Methane, a product of decay, has been trapped in permafrost for thousands of years', 0, 0),
(120, 'Chemistry', 'Which of the following ions is NOT a major constituent of seawater?', 'Sodium<ANSWER>Calcium<ANSWER>Potassium<ANSWER>Manganese', 3, 'Easy', 'Manganese is not as soluable as the others and precipitates out more quickly', 0, 0),
(121, 'Physical Oceanography', 'What is the major cause of the four yearly seasons?', 'Orbit of the Moon<ANSWER>Tilt of the Earth<ANSWER>Changing distance of Earth to the Sun<ANSWER>Fluctuations in the sun''s intensity', 1, 'Easy', 'Seasonal change is more constant. Only the tilt of the earth is not highly variable ', 0, 0),
(122, 'Physical Oceanography', 'What is a tornado over the ocean called?', 'Sea tornado<ANSWER>Water tornado<ANSWER>Waterspout<ANSWER>Hurricane', 2, 'Easy', 'Standard definition ', 0, 0),
(123, 'Chemistry', 'What is the primary cause of ocean acidification?', 'Increased coastal pollution<ANSWER>Ships dumping old batteries<ANSWER>Increased carbon dioxide in the atmosphere<ANSWER>Phytoplankton fecal pellets', 2, 'Easy', 'The reaction of water and carbon dioxide yields carbonic acid', 0, 0),
(124, 'Social Sciences', 'What organism is being considered as a source for biofuels?', 'Bacteria<ANSWER>Algae<ANSWER>Zebra Mussels<ANSWER>Zooplankton', 1, 'Easy', 'Efforts to make biofuel from algae have been under way for more than 3 decades, and have picked up considerable steam in recent years', 0, 0),
(125, 'Physical Oceanography', 'Which of the following is the definition of an estuary?', 'Any coastal or nearshore area<ANSWER>A breeding ground for migratory animals<ANSWER>The confluence of two or more currents<ANSWER>A semi-enclosed body of water where fresh and salt water mix', 3, 'Easy', 'Standard definition', 0, 0),
(126, 'Biology', 'Which predator dominated the ocean between about 245 million and 90 million years ago?', 'Giant squid<ANSWER>Icthyosaur<ANSWER>Coelacanth<ANSWER>Whale', 1, 'Difficult', 'Of the listed species, only the Coelocanth has this range in geologic time', 0, 0),
(127, 'Geography', 'Which of the following countries has a coastline without a major upwelling area?', 'Namibia<ANSWER>Australia<ANSWER>Peru<ANSWER>Norway', 3, 'Moderate', 'Norway is not close to any deep currents that would cause coastal upwelling', 0, 0),
(128, 'Technology', 'Which of the following is an example of active remote-sensing technology?', 'Charge-coupled devices<ANSWER>Photography<ANSWER>Riodmetry<ANSWER>Radio Detection and Ranging', 3, 'Moderate', 'The only one to not require visual or connected technology', 0, 0),
(129, 'Biology', 'Which of the following fish species is jawless?', 'Hagfish<ANSWER>Monkfish<ANSWER>Yellowtail flounder<ANSWER>Mackerel', 0, 'Easy', 'The others all have jaws', 0, 0),
(130, 'Technology', 'Which of the following aids navigation by providing information on water depth, coastal areas, tides, and navigational hazards?', 'GPS<ANSWER>Nautical Charts<ANSWER>Aeronautical Charts<ANSWER>Terminal Area Charts', 1, 'Easy', 'Nautical charts are the only ones here that deal with depths of water', 0, 0),
(131, 'Geography', 'Which of the following is NOT an example of an estuary?', 'Chesapeake Bay<ANSWER>San Francisco Bay<ANSWER>Puget Sound<ANSWER>Bay of Campeche', 3, 'Easy', 'Campeche is too large and open to be classified as an estuary', 0, 0),
(132, 'Geography', 'What is the name of the western boundary current in the North Pacific Ocean?', 'Benguela<ANSWER>Somali<ANSWER>Kuroshio<ANSWER>East Australia', 2, 'Easy', 'The only listed current in the North Pacific', 0, 0),
(133, 'Biology', 'Which of the following is a keystone predator of sea urchins on the Pacific Coast of North America?', 'Harbor seal<ANSWER>Sea otter<ANSWER>Giant Pacific octopus<ANSWER>Mola mola', 1, 'Easy', 'Sea Otters prey upon urchins as a normal dietary item', 0, 0),
(134, 'Technology', 'What does a hand-held refractometer measure?', 'Salinity<ANSWER>Pressure<ANSWER>Chlorophyll<ANSWER>Temperature', 0, 'Easy', 'A refractometer measures Salinity by the refractive index that changes with salinty', 0, 0),
(135, 'Physical Oceanography', 'What cycle refers to the movement of water through global reservoirs, such as the atmosphere, land, and the ocean?', 'Watershed<ANSWER>Hydrologic<ANSWER>Water life<ANSWER>Oceanographic', 1, 'Easy', 'Sometimes called the "Water Cycle," it accounts for cycling of all forms of water', 0, 0),
(136, 'Geology', 'What is the name of the point on Earth''s surface directly above an earthquake location?', 'Focus<ANSWER>Hypocenter<ANSWER>Hypercenter<ANSWER>Epicenter', 3, 'Easy', 'Standard definition', 0, 0),
(137, 'Technology', 'Which of the following pieces of equipment would be best for collecting a water sample?', 'Secchi disk<ANSWER>Niskin bottle<ANSWER>Trawl<ANSWER>Box corer', 1, 'Easy', 'Of these devices ,only the Niskin Bottle will hold water', 0, 0),
(138, 'Chemistry', 'Which of these is NOT considered a major ion in common seawater?', 'Sodium<ANSWER>Magnesium<ANSWER>Nitrate<ANSWER>Chloride', 2, 'Easy', 'Nitrate is not as soluble as the major constituents ', 0, 0),
(139, 'Physical Oceanography', 'If a wave''s height is 2 meters, what is its amplitude, in meters?', '0<ANSWER>0.5<ANSWER>1<ANSWER>2', 2, 'Moderate', 'Amplitude is equal to 1/2 of wave height', 0, 0),
(140, 'Chemistry', 'Which of the following are forms of calcium carbonate precipitated by living organisms?', 'Calcite and aragonite<ANSWER>Hematite and bauxite<ANSWER>Calcite and silicate<ANSWER>Nacrite and feldspar', 0, 'Difficult', 'W is the only answer where both products are chemically Calcium Carbonate', 0, 0),
(141, 'Social Sciences', 'Chesapeake Bay, Lake Erie, and the northern Gulf of Mexico all have what in common?', 'Invasive quagga mussels<ANSWER>Massive kills of blue crabs<ANSWER>Karenia brevis blooms<ANSWER>Summer hypoxia', 3, 'Moderate', 'Hypoxia or "Dead zones" are known to all of these locations', 0, 0),
(142, 'Marine Policy', 'What national law enacted in 1972 established federal responsibility for the conservation of marine mammals?', 'Fish and Wildlife Act<ANSWER>Endangered Species Act<ANSWER>Marine Mammal Protection Act<ANSWER>Non-indigenous Aquatic Nuisance Prevention and Control Act', 2, 'Moderate', 'The MMPA is the only act here that deals specifically with mammals', 0, 0),
(143, 'Physical Oceanography', 'Which of the following is NOT used to calculate the density of sea water?', 'Salinity<ANSWER>Oxygen content<ANSWER>Pressure<ANSWER>Temperature', 1, 'Easy', 'Oxygen content does not have the same direct effect on Density as the others and is not used', 0, 0),
(144, 'Biology', 'Which of the following is NOT believed to be a major cause of the declining salmon populations in the Pacific Northwest?', 'Overfishing<ANSWER>Habitat alteration<ANSWER>Increased temperatures<ANSWER>Dam removal', 3, 'Moderate', 'Dam removal should increase  Salmon abundance', 0, 0),
(145, 'Biology', 'Which of the following structures can NOT be used to determine the age of a fish?', 'Scales<ANSWER>Otoliths<ANSWER>Fin rays<ANSWER>Gills', 3, 'Moderate', 'Of these, Gills do not produce growth layers', 0, 0),
(146, 'Marine Policy', 'Why did the U.S. outlaw krill fishing in its Exclusive Economic Zone?', 'The nets used for krill fishing destroy the benthic coastal environment<ANSWER>To maintain a plentiful food supply for many species of marine life<ANSWER>Some krill are on the endangered species list<ANSWER>Krill represent a large portion of organic carbon which gets sequestered into the deep ocean', 1, 'Difficult', 'Krill are too vital to the ocean food chain to be massively harvested directly', 0, 0),
(147, 'Social Sciences', 'For calculation of longitude, celestial navigation depends critically on accurate timekeeping. The first portable and accurate chronometer was developed by whom?', 'John Harrison<ANSWER>John Hadley<ANSWER>Thomas Earnshaw<ANSWER>Sir Isaac Newton', 0, 'Difficult', 'Harrison''s Chronometer was first used by Capt. James Cook', 0, 0),
(148, 'Biology', 'What specialized cells are the defense mechanism of Cnidarians?', 'Statocysts<ANSWER>Otoliths<ANSWER>Nematocysts<ANSWER>Spicules', 2, 'Moderate', 'Nematocysts are a Cnidarian''s "stinging cells"', 0, 0),
(149, 'Geology', 'Which of the following is the dominant process shaping coastal topography?', 'Ice push<ANSWER>Seismic disturbances<ANSWER>Turbidity currents<ANSWER>Wave action', 3, 'Easy', 'Wave action is more constant and over time has a greater effect', 0, 0),
(150, 'Physical Oceanography', 'What unit describes the ratio of sound pressure to a known reference pressure on a logarithmic scale?', 'Decibel<ANSWER>Joule<ANSWER>Octave<ANSWER>Neper', 0, 'Difficult', 'Only the decibel deals with sound pressure here', 0, 0),
(151, 'Technology', 'Which technology, used to detect submarines in World War I, was later adapted to perform ocean floor surveys?', 'EPIRB<ANSWER>Echo sounder<ANSWER>Ponar<ANSWER>Altimeter', 1, 'Moderate', 'Developed as SONAR, Echo sounding is now a major component of undersea study', 0, 0),
(152, 'Biology', 'Which of the following is a toothed whale?', 'Right<ANSWER>Pilot<ANSWER>Sei<ANSWER>Minke', 1, 'Moderate', 'Pilot, all others are Baleen Whales', 0, 0),
(153, 'Technology', 'Which of the following could be used to determine water clarity?', 'Vibra-core<ANSWER>Niskin bottle<ANSWER>Secchi disk<ANSWER>Depth sounder', 2, 'Easy', 'This is the specific function of a Secchi Disk, a  visual clarity test', 0, 0),
(154, 'Biology', 'For those shark species whose tooth loss has been measured, approximately how many teeth are lost and replaced in a lifetime?', '3 million<ANSWER>30,000<ANSWER>3,000<ANSWER>300', 1, 'Difficult', 'Sharks constantly lose and erplace teeth as needed', 0, 0),
(155, 'Biology', 'Northern elephant seals come ashore during the spring and summer to do which of the following?', 'Mate<ANSWER>Give birth<ANSWER>Eat<ANSWER>Molt their fur', 3, 'Moderate', 'This is the only season they can be without their protective  coat', 0, 0),
(156, 'Chemistry', 'Together, sodium and chloride alone comprise approximately what percentage of the total salts in the ocean?', '100<ANSWER>90<ANSWER>50<ANSWER>10', 1, 'Easy', 'Na and Cl are the most soluble and abundant of constituent ions', 0, 0),
(157, 'Biology', 'The habitat of blue whales, tunas and swordfishes is best described as which of the following?', 'Benthic<ANSWER>Littoral<ANSWER>Estuarine<ANSWER>Pelagic', 3, 'Easy', 'All of these species swim in the open oceans', 0, 0),
(158, 'Biology', 'Which of the following are NOT impacted by the decreasing pH levels in ocean water, termed ocean acidification?', 'Growth rates of coral reefs<ANSWER>Mollusk shells<ANSWER>Diatom shells<ANSWER>Shark teeth', 2, 'Moderate', 'Diatom "tests" are composed of Silicon Dioxide: nearly inert to pH', 0, 0),
(159, 'Chemistry', 'Which chemical is the principle source of energy at many of Earth’s hydrothermal vent systems?', 'Oxygen<ANSWER>Carbon Dioxide<ANSWER>Hydrogen sulfide<ANSWER>Iron oxide', 2, 'Easy', 'In Chemosynthesis, Hydrogen Sulfide is broken down to fuel the process', 0, 0),
(160, 'Biology', 'Intensive aquaculture of which of the following organisms has contributed to loss of mangroves around the world?', 'Tilapia<ANSWER>Cod<ANSWER>Shrimp<ANSWER>Salmon', 2, 'Easy', 'Shrimp can be successfully grown in sub tropical waters where mangroves also grow', 0, 0),
(161, 'Geology', 'When traveling down the water column which will dissolve first?', 'A shell composed of aragonite<ANSWER>A shell composed of calcite<ANSWER>Neither will dissolve<ANSWER>A shell composed of calcium carbonate', 0, 'Difficult', 'Of the forms of calcium carbonate listed, Aragonite is the most soluble and will dissolve first with pressure', 0, 0),
(162, 'Geography', 'Which continent does NOT border the Indian Ocean?', 'Africa<ANSWER>Asia<ANSWER>North America<ANSWER>Australia', 2, 'Easy', 'North America has no Indian Ocean shorelines', 0, 0),
(163, 'Geology', 'Which of the following is NOT an example of a metamorphic rock?', 'Gneiss<ANSWER>Schist<ANSWER>Marble<ANSWER>Basalt', 3, 'Difficult', 'Basalt is an Igneous rock', 0, 0),
(164, 'Geography', 'Which landmass straddles a mid-ocean ridge?', 'Madagascar<ANSWER>Iceland<ANSWER>Greenland<ANSWER>Australia', 1, 'Moderate', 'Iceland straddles and is divided by the Mid Atlantic Ridge', 0, 0),
(165, 'Biology', 'Lophelia coral reefs in the North Atlantic are being primarily damaged by which of the following?', 'Rising temperatures<ANSWER>Trawling<ANSWER>Cyanide poisoning<ANSWER>Pfiesteria', 1, 'Moderate', 'Trawling directly damages the reef by "raking" the surface of the reef', 0, 0),
(166, 'Biology', 'To avoid nitrogen narcosis, which adaptation in seals is most helpful?', 'ATP production by fermentation rather than respiration<ANSWER>Exhaling at the start of the dive and collapsing the lungs<ANSWER>Reliance upon stored oxygen in blood and muscles<ANSWER>Re-routing blood flow to where it is most needed', 1, 'Difficult', 'By expelling air with 78% Nitrogen, Narcosis is reduced because the Nitrogen is not available', 0, 0),
(167, 'Geography', 'Which region is known by the nickname “Pirate Alley” due to the large amount of pirate activity in the area?', 'Yellow Sea<ANSWER>Arabian Sea<ANSWER>Okhotsk Sea<ANSWER>Gulf of Aden', 3, 'Moderate', 'Many of today''s pirates are active in the gulf off the coast of Somalia', 0, 0),
(168, 'Physical Oceanography', 'Stokes Law states that the sinking velocity of a particle depends on which of the following factors?', 'Whether the particle is phytoplankton or detritus<ANSWER>The stratification of the water column<ANSWER>The intensity of wave action at the surface<ANSWER>The size and density of the particle', 3, 'Difficult', 'This is partly true. It also depends on viscosity of the liquid', 0, 0),
(169, 'Geology', 'Defined as mass per unit volume, what property is a useful means of identifying rocks and minerals?', 'Relativity<ANSWER>Density<ANSWER>Luminosity<ANSWER>Heat Flow', 1, 'Easy', 'Standard definition of Density', 0, 0),
(170, 'Marine Policy', 'What 1979 Act gave the EPA the power to monitor and regulate the disposal of sewage sludge, industrial waste, radioactive waste and biohazardous materials into the nation''s territorial waters?', 'Oil Ocean Act<ANSWER>Anti-Debris Act<ANSWER>Debris Reduction Act<ANSWER>Ocean Dumping Act', 3, 'Moderate', 'Sometimes an answer is as simple as it sounds', 0, 0),
(171, 'Physical Oceanography', 'Which part of a tidal cycle has minimal current?', 'Ebb<ANSWER>Slack<ANSWER>Flood<ANSWER>Lunar', 1, 'Easy', 'Slack current occurs as a tide is about to change and the water becomes virtual still', 0, 0),
(172, 'Marine Policy', 'What United Nations conference, also known as the Earth Summit, led to the agreement to protect the biodiversity on Earth?', 'United Nations Conference on Trade and Development<ANSWER>United Nations Conference on Environment and Development<ANSWER>United Nations Conference on the Human Environment<ANSWER>Habitat International Coalition Conference', 1, 'Difficult', 'Held in 1992 in Brazil', 0, 0),
(173, 'Physical Oceanography', 'Which of the following is NOT a predominant characteristic of subtropical regions?', 'Weak winds<ANSWER>Weak surface currents<ANSWER>Clear skies with abundant sunshine<ANSWER>Stormy weather with high winds', 3, 'Moderate', 'Stormy weather with high winds is more typical of temperate zones', 0, 0),
(174, 'Marine Policy', 'In what year did the North American Pacific herring fishery collapse?', '1990<ANSWER>1993<ANSWER>1995<ANSWER>2000', 1, 'Difficult', 'Herring fisheries have collapsed in other oceans as well, North Pacific was 1993', 0, 0),
(175, 'Social Sciences', 'In 1933, the US tanker Ramapo encountered the highest wind wave ever measured reliably.  How tall was this wave, in meters?', '12<ANSWER>23<ANSWER>34<ANSWER>45', 2, 'Difficult', 'It happened on February 7, 1933 in the Pacific Ocean', 0, 0),
(176, 'Physical Oceanography', 'Which of the following is a characteristic of an estuarine turbidity maximum?', 'Increased flocculation<ANSWER>Low suspended sediment concentrations<ANSWER>Kelvin waves<ANSWER>Temperature change', 0, 'Difficult', 'Because of increased sediment load, more flocculation occurs. Especially with marine clays', 0, 0),
(177, 'Social Sciences', 'In 2006, which expedition, led by the grandson of Thor Heyerdahl, replicated the 1947 Kon Tiki voyage?', 'Thor Tiki<ANSWER>Nordic Voyage<ANSWER>Equatorial Expedition<ANSWER>Tangaroa Expedition', 3, 'Difficult', 'This expedition took place in 2006', 0, 0),
(178, 'Physical Oceanography', 'High tidal range coastlines do NOT feature which of the following?', 'Large tidal flats<ANSWER>Broad marshes<ANSWER>Amphidromic points<ANSWER>Strong currents', 2, 'Moderate', 'At the Amphidromic point, Tidal range is small. Such a point would not be near shore in a high tidal range', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
