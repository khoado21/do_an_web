-- MySQL Script generated by MySQL Workbench
-- Mon Dec 20 10:59:39 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lkmt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lkmt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lkmt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `lkmt` ;

-- -----------------------------------------------------
-- Table `lkmt`.`danhgia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`danhgia` (
  `MADANHGIA` INT NOT NULL AUTO_INCREMENT,
  `MANGUOIDUNG` INT NULL DEFAULT NULL,
  `SOSAO` INT NULL DEFAULT NULL,
  `NGAYDANHGIA` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`MADANHGIA`),
  INDEX `FK_DANG` (`MANGUOIDUNG` ASC) VISIBLE,
  CONSTRAINT `FK_DANG`
    FOREIGN KEY (`MANGUOIDUNG`)
    REFERENCES `lkmt`.`nguoidung` (`MANGUOIDUNG`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`vaitronguoidung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`vaitronguoidung` (
  `MAQUYEN` INT NOT NULL AUTO_INCREMENT,
  `TENQUYEN` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`MAQUYEN`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`nguoidung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`nguoidung` (
  `MANGUOIDUNG` INT NOT NULL AUTO_INCREMENT,
  `MADANHGIA` INT NULL DEFAULT NULL,
  `MAQUYEN` INT NOT NULL,
  `USERNAME` VARCHAR(250) NULL DEFAULT NULL,
  `PASSWORD` VARCHAR(250) NULL DEFAULT NULL,
  `PASSWORD_RESET` VARCHAR(250) NULL DEFAULT NULL,
  `HOTEN` VARCHAR(250) NULL DEFAULT NULL,
  `NGAYSINH` DATE NULL DEFAULT NULL,
  `EMAIL` VARCHAR(250) NULL DEFAULT NULL,
  `DIACHI` VARCHAR(100) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `SDT` VARCHAR(15) NULL DEFAULT NULL,
  `NGAYTAO` DATE NULL DEFAULT NULL,
  `NGAYSUA` DATE NULL DEFAULT NULL,
  `VAITRO` VARCHAR(50) NULL DEFAULT NULL,
  `TRANGTHAI` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`MANGUOIDUNG`),
  INDEX `FK_DANG2` (`MADANHGIA` ASC) VISIBLE,
  INDEX `FK_PHANQUYEN` (`MAQUYEN` ASC) VISIBLE,
  CONSTRAINT `FK_DANG2`
    FOREIGN KEY (`MADANHGIA`)
    REFERENCES `lkmt`.`danhgia` (`MADANHGIA`),
  CONSTRAINT `FK_PHANQUYEN`
    FOREIGN KEY (`MAQUYEN`)
    REFERENCES `lkmt`.`vaitronguoidung` (`MAQUYEN`))
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`binhluan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`binhluan` (
  `MABINHLUAN` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `MANGUOIDUNG` INT NULL DEFAULT NULL,
  `NOIDUNG` VARCHAR(250) NULL DEFAULT NULL,
  `NGAYTAO` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`MABINHLUAN`),
  INDEX `FK_VIET` (`MANGUOIDUNG` ASC) VISIBLE,
  CONSTRAINT `FK_VIET`
    FOREIGN KEY (`MANGUOIDUNG`)
    REFERENCES `lkmt`.`nguoidung` (`MANGUOIDUNG`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`contact` (
  `MALH` INT NOT NULL AUTO_INCREMENT,
  `HOTEN` VARCHAR(250) NULL DEFAULT NULL,
  `EMAIL` VARCHAR(250) NULL DEFAULT NULL,
  `NOIDUNG` VARCHAR(250) NULL DEFAULT NULL,
  `TINHTRANGDON` VARCHAR(250) NULL DEFAULT NULL,
  `NGAYGUI` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`MALH`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`danhmuc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`danhmuc` (
  `MADM` INT NOT NULL AUTO_INCREMENT,
  `TENDM` VARCHAR(250) NULL DEFAULT NULL,
  `_MOTA` VARCHAR(250) NULL DEFAULT NULL,
  `HINHANH` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`MADM`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`thuonghieu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`thuonghieu` (
  `MATHUONGHIEU` INT NOT NULL AUTO_INCREMENT,
  `TENTHUONGHIEU` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`MATHUONGHIEU`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`sanpham`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`sanpham` (
  `MASP` INT NOT NULL AUTO_INCREMENT,
  `MATHUONGHIEU` INT NULL DEFAULT NULL,
  `MADM` INT NULL DEFAULT NULL,
  `TENSP` VARCHAR(500) NULL DEFAULT NULL,
  `CHITIET` VARCHAR(1000) NULL DEFAULT NULL,
  `DONGIA` DOUBLE NULL DEFAULT NULL,
  `GIAKM` DOUBLE NULL DEFAULT NULL,
  `BAOHANH` INT NULL DEFAULT NULL,
  `LUOTXEM` DOUBLE NULL DEFAULT NULL,
  `NGAYDANG` DATE NULL DEFAULT NULL,
  `SOLUONG` INT NULL DEFAULT NULL,
  `BANCHAY` TINYINT(1) NULL DEFAULT NULL,
  `HINHANH` VARCHAR(1000) NULL DEFAULT NULL,
  `TINHTRANGSP` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`MASP`),
  INDEX `FK_PHANLOAIDANHMUC` (`MADM` ASC) VISIBLE,
  INDEX `FK_TRONG` (`MATHUONGHIEU` ASC) VISIBLE,
  CONSTRAINT `FK_PHANLOAIDANHMUC`
    FOREIGN KEY (`MADM`)
    REFERENCES `lkmt`.`danhmuc` (`MADM`),
  CONSTRAINT `FK_TRONG`
    FOREIGN KEY (`MATHUONGHIEU`)
    REFERENCES `lkmt`.`thuonghieu` (`MATHUONGHIEU`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`voucher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`voucher` (
  `MAVOUCHER` INT NOT NULL AUTO_INCREMENT,
  `TENMA` VARCHAR(50) NULL DEFAULT NULL,
  `NGAYBD` DATE NULL DEFAULT NULL,
  `NGAYKT` DATE NULL DEFAULT NULL,
  `TYLE` DOUBLE NULL DEFAULT NULL,
  `TRANGTHAI` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`MAVOUCHER`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`giaohang`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`giaohang` (
  `MAGIAOHANG` INT NOT NULL AUTO_INCREMENT,
  `TENNGUOIGIAO` VARCHAR(250) NULL DEFAULT NULL,
  `NGAYGIAO` DATE NULL DEFAULT NULL,
  `SDT` VARCHAR(50) NULL DEFAULT NULL,
  `XACNHAN` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`MAGIAOHANG`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`donhang`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`donhang` (
  `MADONHANG` INT NOT NULL AUTO_INCREMENT,
  `MAVOUCHER` INT NULL DEFAULT NULL,
  `MAGIAOHANG` INT NULL DEFAULT NULL,
  `MANGUOIDUNG` INT NULL DEFAULT NULL,
  `NGAYDAT` DATE NULL DEFAULT NULL,
  `NGAYSHIP` DATE NULL DEFAULT NULL,
  `TONGDON` DOUBLE NULL DEFAULT NULL,
  `HOTEN` VARCHAR(250) NULL DEFAULT NULL,
  `SDT` VARCHAR(50) NULL DEFAULT NULL,
  `DIACHI` VARCHAR(250) NULL DEFAULT NULL,
  `GIOITINH` VARCHAR(250) NULL DEFAULT NULL,
  `PAYMENT` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `PAYMENT_INFO` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `SECURITY` VARCHAR(16) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `AMOUNT` DECIMAL(15,4) NOT NULL DEFAULT '0.0000',
  `EMAIL` VARCHAR(250) NULL DEFAULT NULL,
  `GHICHU` VARCHAR(300) NULL DEFAULT NULL,
  `SOTHEODOI` VARCHAR(50) NULL DEFAULT NULL,
  `VANCHUYEN` VARCHAR(50) NULL DEFAULT NULL,
  `TINHTRANGTHANHTOAN` VARCHAR(100) NULL DEFAULT NULL,
  `NGAYTHANHTOAN` DATE NULL DEFAULT NULL,
  `NGAYHETHAN` DATE NULL DEFAULT NULL,
  `TRANSACTIONID` VARCHAR(300) NULL DEFAULT NULL,
  `CREATED` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`MADONHANG`),
  INDEX `FK_CO` (`MANGUOIDUNG` ASC) VISIBLE,
  INDEX `FK_GIAO` (`MAGIAOHANG` ASC) VISIBLE,
  INDEX `FK_APDUNG` (`MAVOUCHER` ASC) VISIBLE,
  CONSTRAINT `FK_APDUNG`
    FOREIGN KEY (`MAVOUCHER`)
    REFERENCES `lkmt`.`voucher` (`MAVOUCHER`),
  CONSTRAINT `FK_CO`
    FOREIGN KEY (`MANGUOIDUNG`)
    REFERENCES `lkmt`.`nguoidung` (`MANGUOIDUNG`),
  CONSTRAINT `FK_GIAO`
    FOREIGN KEY (`MAGIAOHANG`)
    REFERENCES `lkmt`.`giaohang` (`MAGIAOHANG`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`ctdh`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`ctdh` (
  `MASP` INT NOT NULL AUTO_INCREMENT,
  `MADONHANG` INT NOT NULL,
  `DONGIA` DOUBLE NULL DEFAULT NULL,
  `SOLUONG` INT NULL DEFAULT NULL,
  `AMOUNT` DECIMAL(15,4) NOT NULL DEFAULT '0.0000',
  `STATUS` INT NULL DEFAULT NULL,
  PRIMARY KEY (`MASP`, `MADONHANG`),
  INDEX `FK_CTDH2` (`MADONHANG` ASC) VISIBLE,
  CONSTRAINT `FK_CTDH`
    FOREIGN KEY (`MASP`)
    REFERENCES `lkmt`.`sanpham` (`MASP`),
  CONSTRAINT `FK_CTDH2`
    FOREIGN KEY (`MADONHANG`)
    REFERENCES `lkmt`.`donhang` (`MADONHANG`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`hinhanh`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`hinhanh` (
  `MAANH` INT NOT NULL AUTO_INCREMENT,
  `MASP` INT NOT NULL,
  `LINKANH` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`MAANH`),
  INDEX `FK_GOM` (`MASP` ASC) VISIBLE,
  CONSTRAINT `FK_GOM`
    FOREIGN KEY (`MASP`)
    REFERENCES `lkmt`.`sanpham` (`MASP`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`nhacungcap`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`nhacungcap` (
  `MANCC` INT NOT NULL AUTO_INCREMENT,
  `TENNCC` VARCHAR(500) NULL DEFAULT NULL,
  `DIACHI` VARCHAR(500) NULL DEFAULT NULL,
  `THANHPHO` VARCHAR(450) NULL DEFAULT NULL,
  `SDT` VARCHAR(50) NULL DEFAULT NULL,
  `TINHTRANGXACNHAN` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`MANCC`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `lkmt`.`tintuc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lkmt`.`tintuc` (
  `MATINTUC` INT NOT NULL AUTO_INCREMENT,
  `NGUON` VARCHAR(250) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `TIEUDE` VARCHAR(500) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `NOIDUNG` VARCHAR(10000) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `NGAYDANG` DATE NULL DEFAULT NULL,
  `NGAYSUA` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`MATINTUC`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb3;

USE `lkmt`;

DELIMITER $$
USE `lkmt`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `lkmt`.`xoaanhlienquan`
BEFORE DELETE ON `lkmt`.`sanpham`
FOR EACH ROW
delete from hinhanh where MASP=OLD.MASP$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
