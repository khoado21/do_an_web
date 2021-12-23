-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lkmt
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binhluan` (
  `MABINHLUAN` int NOT NULL AUTO_INCREMENT,
  `MASP` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MANGUOIDUNG` int DEFAULT NULL,
  `NOIDUNG` varchar(250) DEFAULT NULL,
  `NGAYTAO` date DEFAULT NULL,
  PRIMARY KEY (`MABINHLUAN`),
  KEY `FK_VIET` (`MANGUOIDUNG`),
  KEY `FK_MASP` (`MASP`),
  CONSTRAINT `FK_MASP` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`),
  CONSTRAINT `FK_VIET` FOREIGN KEY (`MANGUOIDUNG`) REFERENCES `nguoidung` (`MANGUOIDUNG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binhluan`
--

LOCK TABLES `binhluan` WRITE;
/*!40000 ALTER TABLE `binhluan` DISABLE KEYS */;
/*!40000 ALTER TABLE `binhluan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `MALH` int NOT NULL AUTO_INCREMENT,
  `HOTEN` varchar(250) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `NOIDUNG` varchar(250) DEFAULT NULL,
  `TINHTRANGDON` varchar(250) DEFAULT NULL,
  `NGAYGUI` date DEFAULT NULL,
  PRIMARY KEY (`MALH`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Errik','errik123@gmail.com','Hợp tác làm ăn','đã nhận','2021-12-23'),(2,'Perk','Perk123@gmail.com','Hợp tác làm ăn','đã nhận','2021-12-23');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctdh`
--

DROP TABLE IF EXISTS `ctdh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ctdh` (
  `MASP` int NOT NULL AUTO_INCREMENT,
  `MADONHANG` int NOT NULL,
  `DONGIA` double DEFAULT NULL,
  `SOLUONG` int DEFAULT NULL,
  `AMOUNT` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `STATUS` int DEFAULT NULL,
  PRIMARY KEY (`MASP`,`MADONHANG`),
  KEY `FK_CTDH2` (`MADONHANG`),
  CONSTRAINT `FK_CTDH` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`),
  CONSTRAINT `FK_CTDH2` FOREIGN KEY (`MADONHANG`) REFERENCES `donhang` (`MADONHANG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctdh`
--

LOCK TABLES `ctdh` WRITE;
/*!40000 ALTER TABLE `ctdh` DISABLE KEYS */;
INSERT INTO `ctdh` VALUES (1,2,2,2190000,0.0000,NULL),(1,5,1150000,2,2300000.0000,0),(1,6,1150000,1,1150000.0000,0),(1,7,1150000,1,1150000.0000,0),(1,12,1150000,1,1150000.0000,0),(2,4,2190000,2,4380000.0000,0),(2,7,2190000,1,2190000.0000,0),(2,10,2190000,2,4380000.0000,0),(5,7,2700000,1,2700000.0000,0);
/*!40000 ALTER TABLE `ctdh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhgia`
--

DROP TABLE IF EXISTS `danhgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhgia` (
  `MADANHGIA` int NOT NULL AUTO_INCREMENT,
  `MANGUOIDUNG` int DEFAULT NULL,
  `SOSAO` int DEFAULT NULL,
  `NGAYDANHGIA` date DEFAULT NULL,
  PRIMARY KEY (`MADANHGIA`),
  KEY `FK_DANG` (`MANGUOIDUNG`),
  CONSTRAINT `FK_DANG` FOREIGN KEY (`MANGUOIDUNG`) REFERENCES `nguoidung` (`MANGUOIDUNG`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhgia`
--

LOCK TABLES `danhgia` WRITE;
/*!40000 ALTER TABLE `danhgia` DISABLE KEYS */;
INSERT INTO `danhgia` VALUES (1,5,4,'2021-05-11'),(2,5,2,'2021-12-11');
/*!40000 ALTER TABLE `danhgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `MADM` int NOT NULL AUTO_INCREMENT,
  `TENDM` varchar(250) DEFAULT NULL,
  `_MOTA` varchar(250) DEFAULT NULL,
  `HINHANH` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`MADM`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (1,'Ram-Máy tính','sd','d'),(2,'Bàn phím','d','f'),(3,'Chuột','d','f'),(4,'Ổ cứng máy tính','d','f'),(5,'Tai nghe','a','s'),(7,'CPU- Bộ vi xử lý','s','s');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donhang` (
  `MADONHANG` int NOT NULL AUTO_INCREMENT,
  `MAVOUCHER` int DEFAULT NULL,
  `MAGIAOHANG` int DEFAULT NULL,
  `MANGUOIDUNG` int DEFAULT NULL,
  `NGAYDAT` date DEFAULT NULL,
  `NGAYSHIP` date DEFAULT NULL,
  `TONGDON` double DEFAULT NULL,
  `HOTEN` varchar(250) DEFAULT NULL,
  `SDT` varchar(50) DEFAULT NULL,
  `DIACHI` varchar(250) DEFAULT NULL,
  `GIOITINH` varchar(250) DEFAULT NULL,
  `PAYMENT` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PAYMENT_INFO` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SECURITY` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AMOUNT` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `EMAIL` varchar(250) DEFAULT NULL,
  `GHICHU` varchar(300) DEFAULT NULL,
  `SOTHEODOI` varchar(50) DEFAULT NULL,
  `VANCHUYEN` varchar(50) DEFAULT NULL,
  `TINHTRANGTHANHTOAN` varchar(100) DEFAULT NULL,
  `NGAYTHANHTOAN` date DEFAULT NULL,
  `NGAYHETHAN` date DEFAULT NULL,
  `CREATED` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`MADONHANG`),
  KEY `FK_CO` (`MANGUOIDUNG`),
  KEY `FK_GIAO` (`MAGIAOHANG`),
  KEY `FK_APDUNG` (`MAVOUCHER`),
  CONSTRAINT `FK_APDUNG` FOREIGN KEY (`MAVOUCHER`) REFERENCES `voucher` (`MAVOUCHER`),
  CONSTRAINT `FK_CO` FOREIGN KEY (`MANGUOIDUNG`) REFERENCES `nguoidung` (`MANGUOIDUNG`),
  CONSTRAINT `FK_GIAO` FOREIGN KEY (`MAGIAOHANG`) REFERENCES `giaohang` (`MAGIAOHANG`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donhang`
--

LOCK TABLES `donhang` WRITE;
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` VALUES (1,1,2,5,'2021-11-05','2021-01-01',NULL,'Lucy','091231','32/52 khánh Hội','Nữ','','','',0.0000,NULL,'Giao buổi sáng',NULL,NULL,NULL,NULL,NULL,0),(2,1,2,NULL,'2021-11-05','2021-01-01',NULL,'Khang','0891214','12/23 Chi phương','Nam','','','',0.0000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(3,NULL,2,NULL,'2021-11-25','0000-00-00',0,'Do Le lmao khoa','0336773624','địa chỉ gì đó ở đây k ','','','','',0.0000,'','','','','','0000-00-00','0000-00-00',0),(4,NULL,NULL,15,'2021-11-04',NULL,NULL,'Do Le lmao khoa','4','Đồng Nai',NULL,'offline','','',4380000.0000,'khoadole21@lmao.com','web scam vl',NULL,NULL,'1',NULL,NULL,1639564456),(5,NULL,NULL,15,'2021-11-25',NULL,NULL,'Do Le lmao khoa','4','Đồng Nai',NULL,'nganluong','','',2300000.0000,'khoadole21@lmao.com','web scam vl',NULL,NULL,'1',NULL,NULL,1639564490),(6,NULL,NULL,15,'2021-12-17',NULL,NULL,'Do Le lmao khoa','4','Đồng Nai',NULL,'nganluong','','',1150000.0000,'khoadole21@lmao.com','',NULL,NULL,'0',NULL,NULL,1639712790),(7,NULL,NULL,15,'2021-12-18',NULL,NULL,'Do Le lmao khoa','4','Đồng Nai',NULL,'tienmat','','',6040000.0000,'khoadole21@lmao.com','',NULL,NULL,'1',NULL,NULL,1639814664),(10,NULL,NULL,15,'2021-12-19',NULL,NULL,'Do Le lmao khoa','4','Đồng Nai',NULL,'nganluong','','',4380000.0000,'khoadole21@lmao.com','',NULL,NULL,'1',NULL,NULL,1639903345),(12,NULL,NULL,NULL,'2021-12-19','0000-00-00',0,'Do Le lmao khoa','0336773624','Theshiba','','nganluong','','',1150000.0000,'khoadole21@lmao.com','','','','0','0000-00-00','0000-00-00',1639907262);
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giaohang`
--

DROP TABLE IF EXISTS `giaohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giaohang` (
  `MAGIAOHANG` int NOT NULL AUTO_INCREMENT,
  `TENNGUOIGIAO` varchar(250) DEFAULT NULL,
  `NGAYGIAO` date DEFAULT NULL,
  `SDT` varchar(50) DEFAULT NULL,
  `XACNHAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MAGIAOHANG`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giaohang`
--

LOCK TABLES `giaohang` WRITE;
/*!40000 ALTER TABLE `giaohang` DISABLE KEYS */;
INSERT INTO `giaohang` VALUES (1,'Huy Cận','2021-11-12','092341','đã giao'),(2,'Gia Vân','2021-11-24','0912341','chưa giao');
/*!40000 ALTER TABLE `giaohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hinhanh` (
  `MAANH` int NOT NULL AUTO_INCREMENT,
  `MASP` int NOT NULL,
  `LINKANH` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`MAANH`),
  KEY `FK_GOM` (`MASP`),
  CONSTRAINT `FK_GOM` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hinhanh`
--

LOCK TABLES `hinhanh` WRITE;
/*!40000 ALTER TABLE `hinhanh` DISABLE KEYS */;
INSERT INTO `hinhanh` VALUES (21,1,'samsung_sodimm_2_40dd81621a8d45b4ac7c177bbd3bc446.jpg'),(22,4,'501af5e8842052e6672e35b33eb5d142_8c2185cce02542fc971a8a4ca768aa9d_ddb052995b6d4c94bbc678ba8016bc99.jpg'),(23,4,'untitled-1_gearvn_f0969540e49b4bf59d2c2116e32d3d6f_5df7dc3cac63483394b5f444178a3e6e.jpg'),(24,3,'ec474861f464b173968573acaf952ddc_ce9c788eeca844dbb9548161616ac367_b4aa0b81d93b4d56a90cc62b74ca217c.jpg'),(25,3,'ff193ca617bac412a6789f973458c496_493fafc3dac9471982efd268c34a0e50_18bc263bc2f24691a8f94f1322963fe2.jpg'),(26,5,'37177_leopold_fc660m_pd_light_pink_2.jpg'),(27,5,'37177_leopold_fc660m_pd_light_pink_3.jpg'),(28,10,'ban-phim-co-dareu-ek8100-led-rgb-3_cf10b846f6f24e1bb8f1e8389c61764b.jpg'),(29,10,'ban-phim-co-dareu-ek8100-led-rgb-2_5fa89b53b99d4446b1d5e4a25b5d6a04.jpg'),(30,11,'1280_2_dd727f96ae934ba68a19f6805e6ab1ea.png'),(31,11,'1280_4_16897c926b474eb9b2c82494be51471a.png'),(32,12,'13466_08ccd255158541338630263bce7fb380.png'),(33,12,'13469_8435cffd4c1b46daba2ed69f76276b19.png'),(34,13,'8963_98bf972f103c48b0b805fceda8c3a0c5.png'),(35,13,'6739_acc78c28fa9d4e80a437f49a77225e8f.png'),(36,14,'lk145_01.jpg'),(37,14,'gearvn-ban-phim-gaming-dareu-lk145-usb-03_a0094f23e8e24e6695ee0a7efed74276.png'),(38,15,'ban-phim-co-akko-3098b-multi-modes-neon-01_9427af70c0dc43ea9ee1b0603e3a61ea.jpg'),(39,15,'ban-phim-co-akko-3098b-multi-modes-neon-02_486890f897a047b6900d4555c2eecc97.jpg'),(40,15,'ban-phim-co-akko-3098b-multi-modes-neon-03_396ac1f1e4574f8fb17fb18ec2ef662e.jpg'),(41,16,'19250429-a_2ndgen_ryzen5_radeon_spire_back_0d5974da553c46ef9b68ab1887dfa5bd.png'),(42,16,'gearvn-amd-ryzen-5-3400g-6mb-3-7ghz-4-nhan-8-luong-7_82067577e78549f8a7ced0f5b75c469b.jpg'),(43,20,'logitech-m330-silent-plus__4__d0caf208a205448cac7605b765a3cec6.png'),(44,22,'h370-gallery-01_679ef7144c3d4f0cae5d4594bc7006a0.png'),(45,22,'h370-gallery-04_abc8c7b4527d4bc4934d8b0f2e1b0be0.png'),(46,23,'gvn_log_g331a_d7223069ca7c480bb0f76a02346ffaab.jpg'),(47,23,'gvn_log_g331b_2cb22e2a74e7476ca82bc6f063e42575.jpg'),(48,24,'gearvn_com-products-tai-nghe-astro-a10-blue-4_4b9f75a2f11146f8a9cc8e2ac40b405f.jpg'),(49,24,'gearvn_com-products-tai-nghe-astro-a10-blue-3_3901e96b8f50419eafa23527dcb2f613.jpg'),(50,25,'sd-kingston-a400-480gb-2-5-sata-iii-3_5ad8830639014050b4548c7dff1e083c_e0ef4109796d4eeb82eeab6fe0e6a532.jpg'),(51,25,'sd-kingston-a400-480gb-2-5-sata-iii-2_0ce9182f47e64d0393871fb8677242ae_22f2e2adf81048639120dfdcecd73afa.jpg'),(52,26,'ssd-kingston-a400-120gb-m-2-sata-3-4_34ba2334d7a740d2835878bb958cd22b.jpg'),(53,26,'ssd-kingston-a400-120gb-m-2-sata-32_3036a233ee394520b273d1d3833a72c1.jpg'),(56,27,'sd-kingston-nv1-500gb-m-2-pcie-nvme-2_9ed406bf475149f59d26c54892824d1e_4885c94c946840bcb066c4596600ac73.jpg'),(57,27,'sd-kingston-nv1-500gb-m-2-pcie-nvme-3_5d112355cede4dd8860e948779945521_a212b65ad25d4f9cadfc2143c6276f1a.jpg');
/*!40000 ALTER TABLE `hinhanh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nguoidung` (
  `MANGUOIDUNG` int NOT NULL AUTO_INCREMENT,
  `MADANHGIA` int DEFAULT NULL,
  `MAQUYEN` int NOT NULL,
  `USERNAME` varchar(250) DEFAULT NULL,
  `PASSWORD` varchar(250) DEFAULT NULL,
  `PASSWORD_RESET` varchar(250) DEFAULT NULL,
  `HOTEN` varchar(250) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `DIACHI` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `NGAYSUA` date DEFAULT NULL,
  `VAITRO` varchar(50) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MANGUOIDUNG`),
  KEY `FK_DANG2` (`MADANHGIA`),
  KEY `FK_PHANQUYEN` (`MAQUYEN`),
  CONSTRAINT `FK_DANG2` FOREIGN KEY (`MADANHGIA`) REFERENCES `danhgia` (`MADANHGIA`),
  CONSTRAINT `FK_PHANQUYEN` FOREIGN KEY (`MAQUYEN`) REFERENCES `vaitronguoidung` (`MAQUYEN`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nguoidung`
--

LOCK TABLES `nguoidung` WRITE;
/*!40000 ALTER TABLE `nguoidung` DISABLE KEYS */;
INSERT INTO `nguoidung` VALUES (1,NULL,1,'haohan2801','123',NULL,'Tăng Hảo','2001-01-28','haohan123@gmail.com','lmao','123','2021-11-11',NULL,'admin',1),(2,NULL,2,'philong','philong',NULL,'Phi Long','2001-01-22','hasdohan123@gmail.com','xd','456','2021-11-11',NULL,'nhân viên bán hàng',1),(3,NULL,1,'anhkhoa','anhkhoa',NULL,'Anh Khoa','2001-01-23','haas123@gmail.com',NULL,'789','2021-11-20',NULL,'admin',1),(4,NULL,1,'thanhieu','thanhieu',NULL,'Thân Hiếu','2001-01-21','giang@gmail.com',NULL,'1','2021-11-12',NULL,'admin',1),(5,NULL,3,'khanhthanh','123',NULL,'Thành','2001-01-25','haohan123@lmao.com',NULL,'2','2021-11-01',NULL,'khách hàng',1),(6,NULL,3,'giahuy','123',NULL,'Gia huy',NULL,'huy123@gnail.com',NULL,'3','2021-12-02',NULL,'khách  hàng',1),(15,NULL,1,'altkhoa','Theshiba123',NULL,'Do Le lmao khoa','2001-03-01','khoadole21@lmao.com','Đồng Nai','566','0000-00-00','2021-12-19','admin chúa hề',0);
/*!40000 ALTER TABLE `nguoidung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhacungcap` (
  `MANCC` int NOT NULL AUTO_INCREMENT,
  `TENNCC` varchar(500) DEFAULT NULL,
  `DIACHI` varchar(500) DEFAULT NULL,
  `THANHPHO` varchar(450) DEFAULT NULL,
  `SDT` varchar(50) DEFAULT NULL,
  `TINHTRANGXACNHAN` tinyint DEFAULT NULL,
  PRIMARY KEY (`MANCC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhacungcap`
--

LOCK TABLES `nhacungcap` WRITE;
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
INSERT INTO `nhacungcap` VALUES (1,'50','1000000',NULL,NULL,NULL),(2,'100','2000000',NULL,NULL,NULL),(3,'10','500000',NULL,NULL,NULL);
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `MASP` int NOT NULL AUTO_INCREMENT,
  `MATHUONGHIEU` int DEFAULT NULL,
  `MADM` int DEFAULT NULL,
  `TENSP` varchar(500) DEFAULT NULL,
  `CHITIET` varchar(1000) DEFAULT NULL,
  `DONGIA` double DEFAULT NULL,
  `GIAKM` double DEFAULT NULL,
  `BAOHANH` int DEFAULT NULL,
  `LUOTXEM` double DEFAULT NULL,
  `NGAYDANG` date DEFAULT NULL,
  `SOLUONG` int DEFAULT NULL,
  `BANCHAY` tinyint(1) DEFAULT NULL,
  `HINHANH` varchar(1000) DEFAULT NULL,
  `TINHTRANGSP` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MASP`),
  KEY `FK_PHANLOAIDANHMUC` (`MADM`),
  KEY `FK_TRONG` (`MATHUONGHIEU`),
  CONSTRAINT `FK_PHANLOAIDANHMUC` FOREIGN KEY (`MADM`) REFERENCES `danhmuc` (`MADM`),
  CONSTRAINT `FK_TRONG` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuonghieu` (`MATHUONGHIEU`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,1,1,'(8GB DDR4 1x8GB 3200) RAM Laptop Samsung 8GB 3200 CL22 SODIMM','Thiết kế cổ điển, hiệu năng ấn tượng\nThiết kế cổ điển với hiệu năng cao và chế tạo bằng các thành phần chất lượng. Ram laptop Samsung mang lại hiệu quả sử dụng cao dành cho công việc hàng ngày của bạn.\nMột hệ thống tối ưu là một hệ thống vận hành mượt mà và ổn định. Nhà sản xuất cung cấp một bus ram cao lên đến 3200Mhz đem lại hiệu quả sử dụng rất tốt. Các tác vụ sử dụng một cách mượt mà với độ trễ thấp và tính ổn định lâu dài.',1450000,1150000,36,87,'2021-12-21',50,NULL,'samsung_sodimm_1_c5019814158b4007acdc1cf4570cdc34.jpg','còn'),(2,2,1,'(16GB DDR4 1x16GB 3200) RAM Laptop Team Group 16GB 3200 SODIMM','Dễ dàng lắp đặt và nâng cấp',2190000,2190000,36,98,'2021-12-21',50,NULL,'team_sodimm_c00c3c61cd134af9aa51bb584a2a0f68_2909cd472c754033965cbfb7a422bdd2.jpg','còn'),(3,2,1,'(8GB DDR4 1x8GB 3200) RAM TeamGroup T-Force Delta RGB White','Hiệu năng ấn tượng, tốc độ cao',1190000,1100000,60,78,'2021-12-21',50,NULL,'68e91758f660b09202afa1d25c9ef748_de239228b8934ef7bbab782a6bb7771d_0ee010bf31a14b4e87e3c0f8a00f4555.jpg','còn'),(4,2,1,'(8GB DDR4 1x8GB 3200) RAM TeamGroup T-Force Delta RGB Black','Hiệu năng ấn tượng, tốc độ cao',1190000,1100000,60,59,'2021-12-21',50,NULL,'b009154f9963656b7a55f1a93b91f1b8_9a41f0b66e26430580accff8ad7706ea_811b8f21341a4872969f36c91953dbf3.jpg','còn'),(5,5,2,'Bàn phím Leopold FC660MPD Light Pink','Keycap PBT Doubleshot\nVới chất liệu nhựa keycap PBT Doubleshot dày 1.5mm cao cấp nhất hiện nay góp phần tăng cảm giác thoải mái khi gõ phím cùng với chất lượng không hao mòn bởi thời gian.\nĐộ ổn định cao cấp với khung CHERRY Stabilizer\nVới các phím Shift, Spacebar, Enter và Backspace sẽ luôn luôn ở trạng thái cân bằng cho dù bạn có ấn ở góc độ nào đi chăng nữa. Với khung trục ổn định không hề bị ảnh hưởng bởi thời gian. Chắc chắn sẽ cực kì hữu dụng!',2750000,2700000,24,73,'2021-12-21',0,NULL,'37177_leopold_fc660m_pd_light_pink.jpg','Liên hệ'),(10,7,2,'Bàn phím cơ DareU EK8100 RGB - D Switch (Blue/Red/Brown)',NULL,990000,990000,24,2,'2021-12-21',10,NULL,'ek8100_1_22968c292e96463cb303ba7a9eb054b1.png','Còn hàng'),(11,7,2,'Bàn phím Gaming DareU EK1280 RGB - D Switch (Blue/Red/Brown)',NULL,1080000,NULL,24,NULL,'2021-12-23',10,NULL,'1280_1_8a65342e507f4785ab3e71a3bda62921.png','Còn hàng'),(12,7,2,'Bàn phím cơ DareU EK884 RGB (D Switch - Blue/Red/Brown)',NULL,899000,NULL,24,NULL,'2021-12-23',10,NULL,'ek884_1_250cebe3aba64a98b401748cb239a44e.png','Còn hàng'),(13,7,2,'Bàn phím Dare-U EK880 RGB - Black - D Switch (Blue/Red/Brown)',NULL,880000,NULL,24,2,'2021-12-23',10,NULL,'ek880thumb_bce977608e2848488b47cd340febe4c8.png','Còn hàng'),(14,7,2,'Bàn phím Gaming DareU LK145 USB - D Switch (Blue/Red/Brown)',NULL,480000,NULL,24,5,'2021-12-23',10,NULL,'lk145.jpg','Còn hàng'),(15,8,2,'Bàn phím cơ AKKO 3098N Multi-modes NEON (TTC switch)',NULL,2990000,NULL,24,5,'2021-12-21',10,NULL,'ban-phim-co-akko-3098b-multi-modes-neon-ava_4c3b4f75889c4e0e82463f98bd11b1a1.jpg','Còn hàng'),(16,9,7,'AMD Ryzen 5 3400G / 6MB / 4.2GHz / 4 nhân 8 luồng / AM4',NULL,4590000,NULL,24,2,'2021-12-23',10,NULL,'ryzen_5_3400g_gearvn__4e97afc81deb458db0731dceac013ff1.jpg','Còn hàng'),(17,9,7,'AMD Ryzen 3 3200G / 6MB / 4.0GHz / 4 nhân 4 luồng / AM4',NULL,2990000,2900000,24,NULL,'2021-12-23',10,NULL,'ryzen_5_3200g_gearvn_e799782ec0cd4d46b675a04c2a399a451.jpg','Còn hàng'),(18,9,7,'AMD Ryzen 9 3900x /70MB /3.8GHz /12 nhân 24 luồng',NULL,12990000,12000000,36,NULL,'2021-12-23',10,NULL,'ryzen_9_gen3_gearvn_e5d4fc47094e44d7af5a6bed5e2e8fe8.jpg','Còn hàng'),(19,4,3,'Chuột gaming Logitech G300S',NULL,290000,NULL,36,NULL,'2021-12-21',10,NULL,'thumbchuot1_ce0ac24e7f9545c691e6189b87f6b38f_(1).png','Còn hàng'),(20,4,3,'Chuột không dây Logitech M331 Silent',NULL,330000,NULL,24,NULL,'2021-12-21',10,NULL,'logitech-m330-silent-plus__2__6fea6916aac144a5ae06b8bf59d2014d.png','Còn hàng'),(21,4,3,'Chuột Logitech G Pro X Superlight Wireless White',NULL,2990000,NULL,36,NULL,'2021-12-21',10,NULL,'gearvn-chuot-logitech-g-pro-x-superlight-wireless-white-2_b4d99aaf30e34e35b77db6eb5bc7d540.jpg','Còn hàng'),(22,4,5,'Tai nghe Logitech H370',NULL,490000,450000,36,3,'2021-12-23',10,NULL,'h370-gallery-03_79db316849d6423f876f2834d27465eb.png','Còn hàng'),(23,4,5,'Tai nghe Logitech G331',NULL,1549000,NULL,24,NULL,'2021-12-23',10,NULL,'gvn_log_g331_84c98419c68c422a92eb2ee5a955cba9.png','Còn hàng'),(24,4,5,'Tai nghe Astro A10 Blue',NULL,990000,NULL,24,NULL,'2021-12-23',10,NULL,'gearvn_com-products-tai-nghe-astro-a10-blue-1_10d6a04396724ca6876563bcfaa69a25.png','Còn hàng'),(25,10,4,'SSD Kingston A400 120GB 2.5\' SATA III',NULL,990000,NULL,36,NULL,'2021-12-23',10,NULL,'ston-a400-480gb-2-5-sata-iii-1_-_copy_33e62d6fbef94f12ad2386515aa0e947_c303879e2dbe4be8ae2aa2656942a6b8.jpg','Liên hệ'),(26,10,4,'SSD KINGSTON A400 120GB M.2 Sata 3',NULL,790000,NULL,24,2,'2021-12-23',10,NULL,'ssd-kingston-a400-120gb-m-2-sata-3-1_1848dd5f8e754491979f4127722bf7e7.jpg','Còn hàng'),(27,10,4,'SSD Kingston NV1 250GB M.2 PCIe NVMe',NULL,990000,NULL,24,NULL,'2021-12-23',10,NULL,'sd-kingston-nv1-500gb-m-2-pcie-nvme-1_83a07c394b514f75b5773b7c2d315114_e8f1f6f3e13a4ca59f76fdd40d7ca80a.jpg','Còn hàng');
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuonghieu`
--

DROP TABLE IF EXISTS `thuonghieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuonghieu` (
  `MATHUONGHIEU` int NOT NULL AUTO_INCREMENT,
  `TENTHUONGHIEU` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`MATHUONGHIEU`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuonghieu`
--

LOCK TABLES `thuonghieu` WRITE;
/*!40000 ALTER TABLE `thuonghieu` DISABLE KEYS */;
INSERT INTO `thuonghieu` VALUES (1,'Samsung'),(2,'TeamGroup'),(3,'Corsair'),(4,'Logitech'),(5,'Leopold '),(7,'Dare-U'),(8,'Akko'),(9,'AMD '),(10,'Kingston');
/*!40000 ALTER TABLE `thuonghieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tintuc` (
  `MATINTUC` int NOT NULL AUTO_INCREMENT,
  `NGUON` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TIEUDE` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `NOIDUNG` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `NGAYDANG` date DEFAULT NULL,
  `NGAYSUA` date DEFAULT NULL,
  PRIMARY KEY (`MATINTUC`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tintuc`
--

LOCK TABLES `tintuc` WRITE;
/*!40000 ALTER TABLE `tintuc` DISABLE KEYS */;
INSERT INTO `tintuc` VALUES (1,'Khoa','Laptop PC quả thật đang có vấn đề với webcam, nhưng cái \'tai thỏ\' của Apple không phải là giải pháp đúng','Vừa qua, Apple đã công bố laptop MacBook Pro mới, đi kèm với bộ vi xử lý M1 Pro và M1 Max mạnh mẽ, màn hình LED mini 1.000-nit tuyệt đẹp và viền hẹp. Màn hình có một phần bị che khuất bởi notch, thứ mà Apple đã phổ biến với iPhone X và trên MacBook Pro, phần notch đó chứa một webcam Full HD.','2021-11-25','2021-11-25'),(2,'Hảo','RTX 3090 vừa mua đã nóng tới 110 độ C, thử mở ra xem thì thấy điều bất ngờ','Một lý do hết sức ngớ ngẩn và cũng không kém phần hài hước đã khiến cho chiếc RTX 3090 Founder Edition gặp tình trạng quá nhiệt.','2021-11-25',NULL);
/*!40000 ALTER TABLE `tintuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaitronguoidung`
--

DROP TABLE IF EXISTS `vaitronguoidung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaitronguoidung` (
  `MAQUYEN` int NOT NULL AUTO_INCREMENT,
  `TENQUYEN` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`MAQUYEN`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaitronguoidung`
--

LOCK TABLES `vaitronguoidung` WRITE;
/*!40000 ALTER TABLE `vaitronguoidung` DISABLE KEYS */;
INSERT INTO `vaitronguoidung` VALUES (1,'quản lý'),(2,'nhân viên'),(3,'khách hàng');
/*!40000 ALTER TABLE `vaitronguoidung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voucher`
--

DROP TABLE IF EXISTS `voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voucher` (
  `MAVOUCHER` int NOT NULL AUTO_INCREMENT,
  `TENMA` varchar(50) DEFAULT NULL,
  `NGAYBD` date DEFAULT NULL,
  `NGAYKT` date DEFAULT NULL,
  `TYLE` double DEFAULT NULL,
  `TRANGTHAI` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`MAVOUCHER`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher`
--

LOCK TABLES `voucher` WRITE;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
INSERT INTO `voucher` VALUES (1,'RAM10','2021-11-11','2021-11-30',0.2,'còn'),(2,'RAM15','2021-11-11','2021-11-30',0.15,'còn');
/*!40000 ALTER TABLE `voucher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-23  9:52:30
