-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2020 at 03:36 PM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legibratest_medsAPI`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_of_product_class_descriptions_Sheet`
--

CREATE TABLE `list_of_product_class_descriptions_Sheet` (
  `Product_class` varchar(5) DEFAULT NULL,
  `Description` varchar(37) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_of_product_class_descriptions_Sheet`
--

INSERT INTO `list_of_product_class_descriptions_Sheet` (`Product_class`, `Description`) VALUES
('1', 'MEDICINES & VACCINES'),
('1.1', 'G.ANAESTHETICS &THEATRE AGENTS'),
('1.2', 'LOCAL ANAESTHETICS'),
('1.3', 'ANTIRETROVIRAL DRUGS'),
('10', 'DRUGS AFFECTING THE BLOOD'),
('10.0', 'LABORATORY REAGENTS & SUPPLIES'),
('10.1', 'ANTI-ANAEMIA DRUGS'),
('10.2', 'MEDICINES AFFECTING COAGULATION'),
('11', 'PLASMA SUBSTITUTES'),
('11.0', 'BLOOD PRODUCTS AND PLASMA SUBSTITUTES'),
('11.1', 'CHEMICALS FOR MOSQUITO NETS'),
('11.2', 'SPECT.READ GLASSES-PLASTIC FRM'),
('12', 'CARDIOVASCULAR DRUGS'),
('12.0', 'ANTI RETROVIRAL DRUGS'),
('12.1', 'ANTI-ANGINAL DRUGS'),
('12.3', 'ANTI-HYPERTENSIVE DRUGS'),
('12.4', 'MEDICINES USED IN HEART FAILURE'),
('12.5', 'ANTITHROMBOTIC MEDICINES'),
('12.6', 'LIPID-LOWERING AGENTS'),
('13', 'DERMATOLOGICAL DRUGS'),
('13.1', 'ANTI-FUNGAL DRUGS'),
('13.2', 'ANTI-INFECTIVE DRUGS'),
('13.3', 'ANTI-INFLAM.AND ANTI-PRURITIC'),
('13.4', 'ASTRINGENT DRUGS'),
('13.5', 'KERATOPLASTIC & KERATOLYTIC AG'),
('13.6', 'SCABICIDES'),
('15', 'DISINFECTANTS AND ANTISEPTICS'),
('16', 'DIURETICS'),
('17', 'GASTRO-INTESTINAL DRUGS'),
('17.1', 'ANTACIDS AND OTHER ANTI-ULCER'),
('17.2', 'ANTI-EMETIC DRUGS'),
('17.3', 'ANTI-INFLAMMATORY MEDICINES'),
('17.5', 'MEDICINES USED IN DIARRHOEA'),
('17.6', 'CATHARTIC (LAXATIVE) DRUGS'),
('17.7', 'DIARRHOEA,DRUGS USED IN'),
('18', 'HORMONES,OTHER ENDOCRINE DRUGS'),
('18.1', 'CORTICOSTEROIDS'),
('18.2', 'INSULINS & ANTIDIABETIC AGENTS'),
('18.3', 'ANTITHYROIDS/OVULATION INDUCER'),
('18.4', 'HORMONES'),
('18.5', 'OTHERS'),
('19', 'IMMUNOLOGICALS'),
('19.2', 'SERA AND IMMUNOGLOBULINS'),
('19.3', 'VACCINES'),
('2', 'MEDICAL & SURGICAL SUPPLIES'),
('2.1', 'NON OPIODS & NSAIMS'),
('2.10', 'SURGICAL BLADES'),
('2.11', 'X-RAY MATERIALS'),
('2.12', 'GENERAL MEDICAL & SURGICAL SUP'),
('2.2', 'OPIOD ANALGESICS'),
('2.3', 'BANDAGES'),
('2.4', 'CATHETERS'),
('2.5', 'CERVICAL COLLARS - FIRM'),
('2.6', 'CHEST DRAINAGE TUBES'),
('2.7', 'ENDOTRACHEAL TUBES'),
('2.8', 'NASO-GASTRIC (FEEDING) TUBES'),
('2.9', 'SUCTION TUBES'),
('20', 'MUSCLE RELAXANTS'),
('21', 'E.N.T PREPARATIONS'),
('21.1', 'OPTHALMOLOGIC/ENT PREPARATIONS'),
('21.2', 'ANTI-INFLAMMATORY AGENTS'),
('21.4', 'MIOTICS AND ANTIGLAUCOMA MEDICINES'),
('22', 'OXYTOCICS AND ANTIOXYTOCICS'),
('22.1', 'OXYTOCICS'),
('22.2', 'ANTIOXYTOCICS'),
('24', 'PSYCHOTHERAPEUTIC DRUGS'),
('25', 'RESPIRATORY TRACT DRUGS'),
('26', 'DRUGS COR.WATER,ELECTRO.& ACID'),
('26.1', 'ORAL'),
('26.2', 'PARENTERAL'),
('26.3', 'MISCELLANEOUS. (W.F.I)'),
('27', 'VITAMINS AND MINERALS'),
('28', 'MISCELLENEOUS'),
('29', 'MEDICAL EQUIPMENT & INSTRUMENTS'),
('29.1', 'GENERAL CATEGORY'),
('29.2', 'FORCEPS'),
('29.3', 'KIDNEY DISHES-STAINLESS STEEL'),
('29.4', 'SCISSORS-STAINLESS STEEL'),
('3', 'ANTI-ALLERGICS'),
('3.0', 'GLOVES'),
('3.1', 'GLOVES STERILE - SUPERIOR'),
('3.2', 'GLOVES STERILE - ORDINARY'),
('3.3', 'GLOVES - NON STERILE'),
('30', 'MEDICAL/SURGICAL SUPPLIES'),
('30.1', 'GEN.MEDICAL& SURGICAL SUPPLIES'),
('30.2', 'DETERGENTS & SOAPS'),
('30.3', 'BANDAGES'),
('30.4', 'CATHETERS'),
('30.5', 'CERVICAL COLLARS-FIRM'),
('30.6', 'CHEST DRAINAGE TUBE'),
('30.7', 'ENDOTRACHEAL TUBES'),
('30.8', 'FEEDING TUBES'),
('30.9', 'SUCTION TUBES'),
('31', 'GLOVES STERILE-ORDINARY'),
('31.1', 'GLOVES STERILE- SUPERIOR'),
('31.2', 'GLOVES-NON-STERILE'),
('32', 'I.V CANNULAS & GIVING SETS'),
('32.1', 'H.I.V  TEST REAGENTS'),
('32.2', 'H.I.V  SUPPLIES'),
('33', 'SCALP VEIN SETS'),
('34', 'NEEDLES'),
('35.1', 'SUTURES-ORDINARY QUALITY'),
('35.2', 'SUTURES-SUPERIOR QUALITY'),
('36', 'SYRINGES'),
('37', 'MOSQUITO NETS & CHEMICALS'),
('38', 'SPECTACLES-WITH PLASTIC FRAMES'),
('39', 'LABORATORY REAGENTS & SUPPLIES'),
('4', 'ANTIDOTES'),
('4.0', 'I.V. CANNULAS & GIVING SET'),
('4.1', 'I.V CANNULAS'),
('4.2', 'SCALP VEIN SET'),
('40', 'X-RAY MATERIALS'),
('41', 'INTRAVENOUS FLUID PRODUCTION'),
('42', 'PUBLICATIONS'),
('43', 'KEM-HOLOGIC KIT'),
('5', 'ANTI-EPILEPTICS'),
('5.0', 'NEEDLES & SYRINGES'),
('5.1', 'SURGICAL NEEDLES'),
('5.2', 'SYRINGES'),
('5.3', 'SUTURE NEEDLES'),
('6', 'ANTI-INFECTIVE DRUGS'),
('6.0', 'SUTURES - ORDINARY QUALITY'),
('6.1', 'ANTHELMINTHICS'),
('6.2', 'ANTIBACTERIALS -ORAL'),
('6.2.3', 'ANTILEPROSY MEDICINES'),
('6.2a', 'ANTIBACTERIALS-ORAL'),
('6.2c', 'ANTIBACTERIALS -INJECTABLES'),
('6.2d', 'ANTITUBERCULOSIS'),
('6.3', 'ANIFUNGAL MEDICINES'),
('6.4', 'ANTIVIRAL MEDICINES'),
('6.4.2', 'ANTIRETROVIRALS'),
('6.5', 'ANTIPROTOZOAL'),
('7.0', 'SUTURES - SUPERIOR QUALITY'),
('7.1', 'SUTURES - WITHOUT NEEDLE -75CM'),
('7.2', 'SUTURES - WITH CUTTING NEEDLE'),
('7.3', 'SUTURES - ROUND-BODIED NEEDLE'),
('8', 'ANTINEOPLASTIC AND IMMUN.DRUGS'),
('8.0', 'MEDICAL EQUIPMENT & INSTRUMENT'),
('8.1', 'GENERAL CATEGORY'),
('8.2', 'FORCEPS - STAINLESS STEEL'),
('8.3', 'HORMONES AND ANTIHORMONESL'),
('8.4', 'SCISSORS - STAINLESS STEEL'),
('9', 'ANTIPARKINSONISM DRUGS'),
('9.0', 'INFUSIONS'),
('9.1', '1,000ML - IN PLASTIC BOTTLLE'),
('9.2', '500ML - IN PLASTIC BOTTLE'),
('9.3', 'INTRAV FLUID PRODUCT\'-SUPPLIES'),
('NS01', 'ANAESTHETICS'),
('NS02', 'ANALGESICS'),
('NS03', 'ANTIALLERGICS'),
('NS04', 'ANTIDOTES'),
('NS05', 'ANTICONVULSANTS'),
('NS06', 'ANTI-INFECTIVES'),
('NS07', 'ANTIMIGRAINES'),
('NS08', 'ANTINEOPLASTICS'),
('NS09', 'ANTIPARKINSONISM'),
('NS10', 'MEDICINES AFFECTING THE BLOOD'),
('NS11', 'BLOOD PRODUCTS AND PLASMA SUB.'),
('NS12', 'CARDIVASCULAR'),
('NS13', 'DERMATOLOGICAL PRODUCTS'),
('NS14', 'DIAGNOSTICS AGENTS'),
('NS15', 'DISINFECTANTS AND ANTISEPTICS'),
('NS16', 'DIURETICS'),
('NS17', 'GASTROINTESTINAL MEDICINES'),
('NS18', 'HORMONES,ENDOCRINE MEDICINES'),
('NS19', 'IMMUNOLOGICALS'),
('NS20', 'MUSCLE RELAXANTS'),
('NS21', 'OPHTHALMOLOGICAL PREPARATIONS'),
('NS22', 'OXYTOCICS AND ANTIOXTOCICS'),
('NS23', 'PERITONEAL DIALYSIS SOLUTION'),
('NS24', 'PSYCHTHERAPEUTIC MEDICINES'),
('NS25', 'MEDICINES FOR RESPIRATORY TRAC'),
('NS26', 'SOLUTIONS FOR WATER,ELECTROLYT'),
('NS27', 'VITAMINS AND MINERALS'),
('NS29', 'OTHERS'),
('NSO8', 'ANTINEOPLASTICS'),
('STI', 'STI DRUG KIT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
