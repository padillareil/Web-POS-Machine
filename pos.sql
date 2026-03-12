# SQL Manager 2005 Lite for MySQL 3.7.7.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : pos


SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `pos`
    CHARACTER SET 'utf8mb4'
    COLLATE 'utf8mb4_general_ci';

USE `pos`;

#
# Structure for the `branches` table : 
#

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `warehouse_type` enum('goodwhs','repowhs','defective','caravan','overflow','consignment','transit') DEFAULT 'goodwhs',
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `branch_code` (`branch_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `item_purchase_orders_01` table : 
#

CREATE TABLE `item_purchase_orders_01` (
  `SysNum` int(11) NOT NULL AUTO_INCREMENT,
  `PO_Number` varchar(100) DEFAULT NULL,
  `PO_Date` date DEFAULT NULL,
  `SupplierName` varchar(400) DEFAULT NULL,
  `SupplierCode` varchar(100) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `Branch` varchar(100) DEFAULT NULL,
  `Warehouse` varchar(100) DEFAULT 'GDWH',
  `Currency` varchar(20) DEFAULT NULL,
  `PaymentTerms` varchar(100) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `PO_Status` varchar(20) DEFAULT 'Draft',
  `RequestedBy` varchar(100) DEFAULT NULL,
  `ApprovedBy` varchar(100) DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `DocumentDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `DocumentTime` time DEFAULT NULL,
  PRIMARY KEY (`SysNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `purchase_order_items_03` table : 
#

CREATE TABLE `purchase_order_items_03` (
  `LineID` int(11) NOT NULL AUTO_INCREMENT,
  `PO_Number` varchar(100) DEFAULT NULL,
  `ItemCode` varchar(200) DEFAULT NULL,
  `ItemName` varchar(200) DEFAULT NULL,
  `Barcode` varchar(100) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Unit` varchar(50) DEFAULT NULL,
  `OrderedQty` decimal(15,2) DEFAULT NULL,
  `RecievedQty` decimal(15,2) DEFAULT NULL,
  `UnitCost` decimal(15,2) DEFAULT NULL,
  `Discount` decimal(15,2) DEFAULT NULL,
  `Tax` decimal(15,2) DEFAULT NULL,
  `LineTotal` decimal(15,2) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT 'GDWHS',
  `Remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`LineID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `purchase_order_totals_02` table : 
#

CREATE TABLE `purchase_order_totals_02` (
  `RowNum` int(11) NOT NULL AUTO_INCREMENT,
  `TotalQty` decimal(15,2) DEFAULT NULL,
  `SubTotal` decimal(15,2) DEFAULT NULL,
  `DiscountTotal` decimal(15,2) DEFAULT NULL,
  `TaxTotal` decimal(15,2) DEFAULT NULL,
  `GrandTotal` decimal(15,2) DEFAULT NULL,
  `LineID` int(11) DEFAULT NULL,
  PRIMARY KEY (`RowNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `useraccount` table : 
#

CREATE TABLE `useraccount` (
  `RowNum` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `UserPassword` varchar(200) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RowNum`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `vendor` table : 
#

CREATE TABLE `vendor` (
  `RowNum` int(11) NOT NULL AUTO_INCREMENT,
  `CardCode` varchar(100) DEFAULT NULL,
  `Vendor` varchar(100) DEFAULT NULL,
  `DocDate` date DEFAULT NULL,
  `VendorStatus` varchar(11) DEFAULT 'A',
  PRIMARY KEY (`RowNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Definition for the `LOGIN` procedure : 
#

CREATE PROCEDURE `LOGIN`(IN pUName VARCHAR(100))
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     SELECT
           RowNum,
           UserName,
           UserPassword,
           Role
     FROM
         `useraccount`
     WHERE UserName = pUName;
     
END;

#
# Definition for the `SESSION_ACCOUNT` procedure : 
#

CREATE PROCEDURE `SESSION_ACCOUNT`(IN pUid INTEGER(11))
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     SELECT
           RowNum,
           UserName,
           Userpassword,
           Role
     FROM
         `useraccount`
     WHERE RowNum = pUid;
     
END;

#
# Data for the `useraccount` table  (LIMIT 0,500)
#

INSERT INTO `useraccount` (`RowNum`, `UserName`, `UserPassword`, `Role`) VALUES 
  (4,'reil','$2y$10$Ude.NUkQPw1Y6dUxZMB/lOsdsWeam.o6k90RBq7BSRl7N0y7XsJRC','1'),
  (5,'padilla','$2y$10$JO0nsk2UkYBMXyuiT6qdxueCBvTbfuvV6NktILLLFpj2lRlScKcDa','2');

COMMIT;

