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
# Structure for the `branch` table : 
#

CREATE TABLE `branch` (
  `SysNum` int(11) NOT NULL AUTO_INCREMENT,
  `BranchCode` varchar(100) NOT NULL,
  `BranchName` varchar(50) NOT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `ContactNumber` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `BSize` varchar(50) DEFAULT 'goodwhs',
  `BSpace` varchar(50) DEFAULT 'Active',
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `BStatus` varchar(50) DEFAULT NULL,
  `DocDate` date DEFAULT NULL,
  PRIMARY KEY (`SysNum`),
  UNIQUE KEY `branch_code` (`BranchName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `goods_receipt` table : 
#

CREATE TABLE `goods_receipt` (
  `GR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRNum` varchar(100) DEFAULT NULL,
  `GR_Date` date DEFAULT NULL,
  `PO_Number` varchar(100) DEFAULT NULL,
  `Vendor_id` int(11) DEFAULT NULL,
  `Branch_id` int(11) DEFAULT NULL,
  `WhsCode` varchar(20) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `Payment_Terms` varchar(50) DEFAULT NULL,
  `TotalQty` decimal(10,2) DEFAULT NULL,
  `SubtotalAmnt` decimal(12,2) DEFAULT NULL,
  `DiscountAmnt` decimal(12,2) DEFAULT NULL,
  `GrandTotal` decimal(12,2) DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `GRStatus` enum('Draft','Received','Cancelled') DEFAULT 'Draft',
  `DocDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `CreatedBy` int(11) DEFAULT NULL,
  `LastUpdate` date DEFAULT NULL,
  PRIMARY KEY (`GR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `goods_receipt_items` table : 
#

CREATE TABLE `goods_receipt_items` (
  `GR_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `GR_ID` varchar(100) DEFAULT NULL,
  `ItemCode` varchar(100) DEFAULT NULL,
  `ItemName` varchar(100) DEFAULT NULL,
  `QtyReceived` decimal(10,2) DEFAULT NULL,
  `UnitCost` decimal(12,2) DEFAULT NULL,
  `TotalCost` decimal(12,2) DEFAULT NULL,
  `Condition` enum('Good','Defective','Caravan','Extra') DEFAULT 'Good',
  `Remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`GR_item_id`)
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
# Structure for the `purchase_orders_01` table : 
#

CREATE TABLE `purchase_orders_01` (
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
# Structure for the `useraccount` table : 
#

CREATE TABLE `useraccount` (
  `RowNum` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `UserPassword` varchar(200) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RowNum`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Structure for the `vendor` table : 
#

CREATE TABLE `vendor` (
  `SysNum` int(11) NOT NULL AUTO_INCREMENT,
  `VendorCode` varchar(100) DEFAULT NULL,
  `VendorName` varchar(300) DEFAULT NULL,
  `DocDate` date DEFAULT NULL,
  `VendorStatus` varchar(10) DEFAULT 'A',
  `ContactPerson` varchar(100) DEFAULT NULL,
  `ContactNumber` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Website` varchar(100) DEFAULT NULL,
  `BillingAddress` varchar(100) DEFAULT NULL,
  `Shipping_Address` varchar(100) DEFAULT NULL,
  `PaymentTerms` varchar(20) DEFAULT NULL,
  `VendorBank` varchar(50) DEFAULT NULL,
  `AccountName` varchar(50) DEFAULT NULL,
  `BankAccountNum` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SysNum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Definition for the `Add_New_Branch` procedure : 
#

CREATE PROCEDURE `Add_New_Branch`(IN pBCode VARCHAR(4), IN pBName VARCHAR(100), IN pBLoc VARCHAR(225), IN pCPerson VARCHAR(100), IN pCNumber VARCHAR(50), IN pEmail VARCHAR(50), IN pBsize VARCHAR(50), IN pBSpace VARCHAR(50))
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     INSERT INTO branch (
     BranchCode,
     BranchName,
     Location,
     ContactPerson,
     ContactNumber,
     Email,
     BSize,
     BSpace,
     BStatus,
     DocDate
     )
     VALUES (
     pBCode,
     pBName,
     pBLoc,
     pCPerson,
     pCNumber,
     pEmail,
     pBsize,
     pBSpace,
     'A',
     NOW()
     );
     
END;

#
# Definition for the `Add_New_Vendor` procedure : 
#

CREATE PROCEDURE `Add_New_Vendor`(
    IN pVCode VARCHAR(100),
    IN pVName VARCHAR(100),
    IN pContactPerson VARCHAR(100),
    IN pContactNum VARCHAR(100),
    IN pEmail VARCHAR(100),
    IN pWebsite VARCHAR(100),
    IN pBillingAddress VARCHAR(225),
    IN pShippingAddress VARCHAR(100),
    IN pPaymentTerms VARCHAR(50),
    IN pBank VARCHAR(100),
    IN pAccountName VARCHAR(100),
    IN pAccountNumber VARCHAR(100),
    IN pVStatus VARCHAR(10),
    IN pRemarks TEXT
)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

INSERT INTO vendor (
    VendorCode,
    VendorName,
    DocDate,
    VendorStatus,
    ContactPerson,
    ContactNumber,
    Email,
    Website,
    BillingAddress,
    Shipping_Address,
    PaymentTerms,
    VendorBank,
    BankAccountNum,
    AccountName,
    Remarks
)
VALUES(
    pVCode,
    pVName,
    NOW(),
    pVStatus,
    pContactPerson,
    pContactNum,
    pEmail,
    pWebsite,
    pBillingAddress,
    pShippingAddress,
    pPaymentTerms,
    pBank,
    pAccountNumber,
    pAccountName,
    pRemarks
);

END;

#
# Definition for the `Auto_PurchaseOrder_Num` procedure : 
#

CREATE PROCEDURE `Auto_PurchaseOrder_Num`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     SELECT CONCAT(
            'PO',
     LPAD(
        IFNULL(MAX(CAST(SUBSTRING(PO_Number,5) AS UNSIGNED)),0) + 1,
        17,
        '0'
        )
     ) AS PurchaseOrderNum
     FROM purchase_orders_01;
END;

#
# Definition for the `Auto_Vendor_Code` procedure : 
#

CREATE PROCEDURE `Auto_Vendor_Code`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     SELECT CONCAT(
            'VNDR',
     LPAD(
        IFNULL(MAX(CAST(SUBSTRING(VendorCode,5) AS UNSIGNED)),0) + 1,
        17,
        '0'
        )
     ) AS VendorCode
     FROM vendor;
END;

#
# Definition for the `Branch_Selection` procedure : 
#

CREATE PROCEDURE `Branch_Selection`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     SELECT BranchName, SysNum FROM `branch`
     GROUP BY BranchName, SysNum ORDER BY BranchName;
END;

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
# Definition for the `Vendor_Selection` procedure : 
#

CREATE PROCEDURE `Vendor_Selection`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
     SELECT VendorName, SysNum FROM `vendor`
GROUP BY VendorName, SysNum
ORDER BY VendorName;
END;

#
# Data for the `branch` table  (LIMIT 0,500)
#

INSERT INTO `branch` (`SysNum`, `BranchCode`, `BranchName`, `Location`, `ContactPerson`, `ContactNumber`, `Email`, `BSize`, `BSpace`, `Created`, `LastUpdate`, `BStatus`, `DocDate`) VALUES 
  (1,'BENA','BUENAVISTA','Brgy 2 Buenavista, Agusan del Norte','April Joy G. Baclayon','09497120810','buenavistaadn@rbusiness.com.ph','Medium','company_owned','2026-03-15 19:22:43','2026-03-15 19:22:43','A','2026-03-15'),
  (2,'CBAD','CABADBARAN','Cabadbaran, Agusan del Norte','Jonathan V. Biyo','09094512361','cabadbaran@rbusiness.com.ph','Small','rented','2026-03-15 19:24:46','2026-03-15 19:24:46','A','2026-03-15');

COMMIT;

#
# Data for the `useraccount` table  (LIMIT 0,500)
#

INSERT INTO `useraccount` (`RowNum`, `UserName`, `UserPassword`, `Role`, `FullName`) VALUES 
  (4,'reil','$2y$10$Ude.NUkQPw1Y6dUxZMB/lOsdsWeam.o6k90RBq7BSRl7N0y7XsJRC','1',NULL),
  (5,'padilla','$2y$10$JO0nsk2UkYBMXyuiT6qdxueCBvTbfuvV6NktILLLFpj2lRlScKcDa','2','Reil Padilla');

COMMIT;

#
# Data for the `vendor` table  (LIMIT 0,500)
#

INSERT INTO `vendor` (`SysNum`, `VendorCode`, `VendorName`, `DocDate`, `VendorStatus`, `ContactPerson`, `ContactNumber`, `Email`, `Website`, `BillingAddress`, `Shipping_Address`, `PaymentTerms`, `VendorBank`, `AccountName`, `BankAccountNum`, `Remarks`) VALUES 
  (1,'VNDR00000000000000001','CONDURA','2026-03-14','on','Reil P. Padilla','09098710084','conduraph@gmail.com.ph','conduraphilippines.com.ph','San Juan Buenavista Agusan Del Norte','Lipa City, Batangas 3042','15 Days','BPI','CONDURA','223012310123','N/A'),
  (2,'VNDR00000000000000002','HONDA','2026-03-14','on','Gio B. Takahashi','094875212154','hondamarketphilippines@gmail.com','hondaphilippines.com.ph','Benigno Aquino,Manduriao, Iloilo City Philippines','Kalibo, Aklan','15 Days','BDO','HONDA','002310021','N/A'),
  (3,'VNDR00000000000000003','OISHI','2026-03-14','on','Jaleah A. Barbosa','090912587454','oishiphilippines@gmail.com','www.oishi.com.ph','Lapu-Lapu City, Cebu','Iloilo City','30 Days','Security Bank','OISHI','00002312312','');

COMMIT;

