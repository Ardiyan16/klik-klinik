-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2022 pada 04.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klik-klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(500) NOT NULL,
  `role_id` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `nama`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `email`, `username`, `password`, `picture`, `role_id`, `status`) VALUES
(5, 'Budi Yunior Valentino S.Tr.Kom', 'Jombang', '1999-02-13', '082111222333', 'magenz@gmail.com', 'owner', '$2y$10$Qr/.xUEZJlnlgpqwxt/zW.djAWvEEozmV299IGJKp9m/jr6DdMMwq', 'budi.png', '0', '1'),
(6, 'Bawik Ardiyan Ramadhan S.Tr.Kom', 'Jember', '1999-01-09', '082132881252', 'ardiyanramadhan4@gmail.com', 'admin', '$2y$10$j3ebdz3cWm3IHVZgxui1r.nNamtJM1EETLT1XVjO5YWZxF/L4wjHO', 'me2.jpeg', '1', '1'),
(7, 'Dr. Tirta S.Kes', 'Jakarta', '1990-03-08', '089128778191', 'tirta@kklinik.com', 'dokter1', '$2y$10$v/ov7cMXl94O8B/5n4YwHutl7qdPDXIJS51wd4wrJE1ilNN2H7qve', 'drtirta.jpg', '2', '1'),
(8, 'Dr. Retno Susilo S.Kes, M.Kes', 'Banyuwangi', '1987-05-06', '081235667112', 'retno@kklinik.com', 'dokter2', '$2y$10$/VOXGgGSRmGcIxcVgG3qLO50dgAuGVQckDgpDtpg7T2rVTCEZs9zm', 'dr_retno.jpg', '2', '1'),
(9, 'Mega Kharunia, S.Farm', 'Jember', '2000-01-13', '08923311234', 'megakh@kklinik.com', 'apoteker', '$2y$10$wIVT07k532S17avCYPWaYu.MHSXDaKwXzN22CWrBUQ7GRXhYOdySq', 'apoteker.jpg', '3', '1'),
(10, 'Yunita Sukmawati', 'Banyuwangi', '1999-06-08', '082135161819', 'yunita@kklinik.com', 'kasir', '$2y$10$yuKY9wHLqFALjMNMwPeOUeke40t81fOFRZonmLZT3tRY54g5RmDD.', 'IMG-20220624-WA0006.jpg', '4', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` int(1) NOT NULL,
  `images` varchar(500) DEFAULT NULL,
  `penulis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal`, `tag`, `deskripsi`, `kategori`, `images`, `penulis`) VALUES
(2, 'Waspada Badan Lemas Karena Asam Lambung', '2022-06-23', 'asam lambung, pencernaan, kesehatan pencernaan', '<p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Penyakit asam lambung adalah kondisi ketika\nseseorang mengalami gejala saluran pencernaan karena produksi asam lambung yang\nberlebihan.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Tanda dan gejala asam lambung bisa berupa\nnyeri ulu hati, mual, dan begah. Selain itu, penderitanya juga kerap merasakan\nbadan lemas. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Mengapa <b>badan bisa lemas karena asam\nlambung</b>? Lalu, apa penyebab badan lemas pada penderita asam lambung? <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:18.0pt;font-family:\"Arial\",sans-serif;\nmso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\">Penyebab Badan Lemas\nKarena Asam Lambung</span></b><span style=\"font-size:18.0pt;font-family:\"Arial\",sans-serif;\nmso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Ada lima penyebab badan lemas pada penderita\nasam lambung, di antaranya:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 16.5pt; font-family: Roboto;\">1. Turunnya Nafsu Makan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Bagi penderita asam lambung, biasanya keluhan\nakan timbul sesaat setelah makan. Mereka akan merasakan nyeri ulu hati usai\nmakan. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Hal ini tentunya menyebabkan gangguan makan,\nsehingga nafsu makan akan menurun dan nutrisi tidak tercukupi.\nPada akhirnya, badan akan terasa kurang bertenaga.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">2. Kurang Tidur</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Ketika seseorang mengalami asam lambung,\nberbaring akan memberikan rasa tidak nyaman. Sebab, berbaring dapat membuat isi\nlambung kembali naik ke esofagus dan kerongkongan.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Jika hal tersebut terjadi menjelang tidur,\ntentu saja kualitas dan waktu tidur akan terganggu. Alhasil, penderita bisa\nsaja mengalami badan lemas keesokan harinya.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">3. Stres</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Rasa tidak nyaman yang terjadi akibat penyakit\nasam lambung bisa menyebabkan stres. Dan, terjadinya stres dapat memicu\nkeluhan asam lambung yang parah.  <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Kombinasi kedua kondisi tersebut –\nasam lambung dan stres -- bisa membuat penderita merasa lelah dan\nlesu.  <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">4. Anemia</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Naiknya asam lambung dapat meningkatkan risiko\nluka pada lambung. Perlukaan pada lambung ini bisa mengakibatkan perdarahan\npada saluran cerna. Tanda-tandanya berupa buang air besar kehitaman dan muntah\ndarah kehitaman.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Pada sebagian besar kasus, perdarahan yang\nnyata tidak terlihat. Namun, perdarahan secara mikroskopis dapat terjadi. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Dalam jangka panjang, hal ini dapat\nmenyebabkan penurunan sel darah merah atau akrab dikenal dengan anemia. <a href=\"https://www.klikdokter.com/penyakit/anemia\"><span style=\"color:#017EBA\">Anemia</span></a> yang\nbiasanya terjadi adalah anemia defisiensi besi. Penderitanya akan mengeluh\nmudah lemas.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">5. Keganasan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Jika kamu sering mengalami perut terasa\npenuh, <a href=\"https://www.klikdokter.com/penyakit/nyeri-ulu-hati\"><span style=\"color:#017EBA\">nyeri ulu hati</span></a>, <a href=\"https://www.klikdokter.com/penyakit/mual\"><span style=\"color:#017EBA\">mual</span></a>,\ndan penurunan berat badan, bisa jadi ini bukan bagian dari gangguan asam\nlambung biasa.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Berbagai keluhan tersebut dapat menjadi bagian\ndari keganasan yang terjadi di daerah lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Seseorang dengan keganasan lambung dapat\nmengalami nyeri ulu hati, mual, dan perut terasa begah. Selain itu, penurunan\nberat badan bisa terjadi. Salah satu faktor risiko munculnya keganasan lambung\nadalah adanya ulkus lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:18.0pt;font-family:\"Arial\",sans-serif;\nmso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\">Cara Mengatasi Badan\nLemas Karena Asam Lambung</span></b><span style=\"font-size:18.0pt;font-family:\n\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Untuk mengatasi badan lemas karena kambuhnya\nasam lambung, diperlukan penanganan yang komprehensif. Selain pemberian obat\npenurun asam lambung, modifikasi gaya hidup juga diperlukan. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Berikut ini adalah cara menghilangkan rasa\nlemas dan gejala lainnya karena asam lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Hindari Makan secara Berlebihan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Jika kamu punya asam lambung, aturlah porsi\nmakanmu dengan baik. Hindari makan secara berlebihan dengan porsi yang besar.\nLebih baik, makanlah dengan porsi kecil namun dengan frekuensi yang lebih\nsering.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Tindakan ini\ndilakukan untuk mengurangi volume berlebih pada lambung, yang <a href=\"https://www.klikdokter.com/penyakit/penyakit-asam-lambung\"><span style=\"color:#017EBA\">menyebabkan naiknya asam lambung</span></a> ke esofagus\ndan memicu sensasi nyeri ulu hati.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Kurangi Makanan Berlemak dan Cokelat</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Ada beberapa makanan yang sebaiknya kamu\nhindari untuk <a href=\"https://www.klikdokter.com/penyakit/badan-lemas\"><span style=\"color:#017EBA\">mencegah badan lemas</span></a> akibat asam lambung.\nContohnya makanan berlemak, alkohol, dan cokelat.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Berbagai makanan tersebut dapat menyebabkan\nrelaksasi dari katup esofagus dan lambung. Hal ini akan mempermudah naiknya\nasam lambung dan menyebabkan nyeri ulu hati.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Jangan Konsumsi Obat Sembarangan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Terdapat jenis obat tertentu yang dapat\nmengakibatkan peningkatan asam lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Salah satu yang patut kamu waspadai adalah\nobat penghilang nyeri seperti obat antiinflamasi nonsteroid (OAINS).\nPenggunaan obat jenis ini dapat memicu perlukaan lambung lebih lanjut.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Hindari Langsung Rebahan Setelah Makan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Posisi paling nyaman bagi tubuh untuk\nmelakukan proses pencernaan adalah sikap tegak. Maka itu, jika kamu langsung\nrebahan setelah makan, proses pencernaan bisa saja terganggu.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Tidak cuma itu, langsung rebahan atau tiduran\nsetelah makan juga bisa meningkatkan asam lambung. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Berhenti Merokok</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\n\"Times New Roman\";color:#4A4A4A\">Jika ingin kondisi badan lemas karena asam\nlambung terobati, jauhilah rokok. Selain buruk untuk paru-paru, rokok juga\ntidak baik bagi kesehatan lambung.<o:p></o:p></span></p><p>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</p><p class=\"MsoNormal\"><o:p> </o:p></p>', 2, 'asamlambung.jpg', 'admin'),
(3, 'Ini Buah dan Sayur yang Bisa Digunakan untuk Masker Mata Alami!', '2022-06-23', 'masker wajah, kecantikan, perawatan wajah', '<p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Ketika melakukan perawatan wajah, kita sering meletakkan irisan\r\nmentimun di kedua mata yang terpejam. Tujuannya, biar terasa efek dingin\r\nmenyegarkan.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Namun, selain mentimun, masih ada lagi beberapa sayuran dan buah\r\nyang bisa dijadikan bahan&nbsp;<strong>masker mata alami.</strong><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Kulit di sekitar mata merupakan salah satu bagian tubuh yang\r\ndapat menunjukkan tanda-tanda penuaan dini. Pasalnya, kulit di area ini lebih\r\ntipis dan lebih halus ketimbang kulit di bagian tubuh yang lain.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Mata juga organ yang digunakan terus-menerus sepanjang hari.\r\nDari berkedip sampai mengekspresikan emosi. Tentu ini dapat menyebabkan penuaan\r\ndini. Belum lagi paparan sinar UV, stres, faktor genetik, serta gaya hidup yang\r\njuga bisa memengaruhi.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Nah, apa saja buah dan sayur yang dapat dijadikan bahan masker\r\nmata alami? Berikut di antaranya.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 30pt 0in 22.5pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#393939\">1. Stroberi<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Jika mata terasa lelah dan lingkaran di bawahnya semakin\r\nmenggelap, kamu bisa menggunakan stroberi untuk mengatasinya.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Stroberi mengandung antioksidan dan vitamin C tinggi, jadi\r\ntidaklah heran bila buah ini bagus untuk mata lelah.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Cara mengaplikasikan masker mata dari stroberi adalah lumatkan\r\ndulu stroberinya.&nbsp;Lalu, oleskan di bawah mata dan diamkan selama 30 menit.\r\nSetelah itu, bilas sampai bersih. Lakukan ini secara teratur untuk hasil\r\nmaksimal.&nbsp;<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">2. Kentang&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Kentang\r\njuga bisa menjadi bahan untuk masker mata alami. Karena, seperti stroberi,\r\nkentang dapat mengurangi lingkaran hitam di bawah mata.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Irisan\r\nkentang yang sudah dicuci bersih bisa kamu letakkan di mata tertutup. Atau,\r\nbisa juga kamu lumatkan dulu lalu oleskan ke area bawah mata. Diamkan selama 30\r\nmenit, kemudian bilas.<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">3. Semangka&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Buah yang\r\nsatu ini terkenal karena kandungan airnya yang melimpah, warnanya yang menarik,\r\nserta rasanya yang manis. Bonusnya lagi, kamu bisa menjadikan semangka sebagai\r\nmasker mata alami.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Semangka\r\nmengandung banyak air. Ini membuat mata jadi lebih relaks karena sensasi dingin\r\nyang diberikan. Selain itu, vitamin A dan C dalam semangka bisa membantu\r\nmeredakan&nbsp;<a href=\"https://www.klikdokter.com/penyakit/mata-kering\"><span style=\"color: rgb(1, 126, 186);\">mata kering</span></a>&nbsp;dan bengkak.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Kamu bisa\r\nmemotong agak tipis buah tersebut. Lalu, letakkan di mata yang terpejam dan\r\ntunggu hingga 30 menit<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">4. Pepaya&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Pepaya kerap dipakai dalam sabun\r\natau losion pencerah kulit karena kandungan vitamin C-nya yang tinggi.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Buah ini\r\njuga bisa dijadikan masker mata alami buatan sendiri, karena enzimnya bertindak\r\nsebagai&nbsp;<em>exfoliant</em>&nbsp;yang\r\nlembut.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Irislah\r\npepaya agak tipis, lalu letakkan di mata yang terpejam. Diamkan selama 15\r\nmenit, lalu bilas. Lakukan secara teratur untuk mendapatkan mata yang lebih\r\ncerah.&nbsp; <o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">5. Alpukat&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Lebih\r\nsuka masker yang teksturnya lebih&nbsp;<em>creamy</em>? Kamu bisa\r\nmenggunakan alpukat sebagai bahan maskermu.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Lumatkan\r\nalpukat, lalu oleskan ke area sekitar mata untuk memberi kelembapan dan hidrasi\r\nekstra. Diamkan selama 15 menit, lalu bilas.<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">6. Pisang&nbsp;</span><span style=\"font-size:\r\n10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">&nbsp;</span><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\"><o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Apakah kamu pernah membuat masker\r\ndari buah pisang? Jika belum, yuk dicoba. Pisang juga bisa membantu\r\nmeningkatkan area sekitar matamu,&nbsp;<em>lho!</em><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Haluskan\r\nsetengah pisang, tutup matamu rapat-rapat, lalu oleskan pisang tumbuk ke\r\nkelopak mata. Biarkan selama 15 menit, lalu bilas.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">7. Lettuce Iceberg</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\"><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Siapa sangka, sayuran yang kerap\r\nditemukan dalam salad ini bisa membantu kemerahan dan peradangan di area mata?\r\nYa,&nbsp;<em>lettuce\r\niceberg&nbsp;</em>bisa kamu jadikan bahan masker mata alami.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Ambil\r\nbeberapa iris&nbsp;<em>lettuce</em>&nbsp;<em>iceberg</em>&nbsp;untuk\r\ndiletakkan di mata yang tertutup. Biarkan selama 30 menit.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">8. Jambu Biji</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\"><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Buah berikutnya untuk masker mata\r\nadalah jambu biji. Jambu biji mengandung vitamin C dan merupakan sumber\r\nantioksidan yang baik.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Masker\r\nmata dari jambu biji dapat membantu mencegah dan mengurangi tanda awal\r\npenuaan.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Itu dia\r\ndelapan bahan untuk masker mata alami selain mentimun. Yang perlu kamu catat,\r\nkarena ini dari bahan alami, hasilnya tak bisa instan.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Untuk\r\nmendapatkan hasil yang maksimal, lakukan secara rutin dan sabar. Jangan lupa\r\nuntuk mencuci bersih dulu buah dan sayur yang digunakan.&nbsp;<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', 2, 'buah_dan_sayur.jpg', 'admin'),
(6, 'Klik Klinik memperoleh juara 1 pelayanan terbaik di Kecamatan Puger Kabupaten Jember', '2022-07-01', 'Penghargaan, kebanggaan', '<p>Tim Klik klinik memperoleh juara 1 dalam kategori pelayanan terbaik untuk kesehatan masyarakat. penghargaan tersebut diberikan oleh pemerinta kecamatan Puger Kabupaten Jember. </p><p>penghargaan tersebut diperoleh usai klik klinik menerapkan pelayanan menggunakan sistem teknologi informasi yang semakin mempermudah masyarakat dalam mendapatkan pelayanan kesehatan</p>', 1, 'penghargaan2.jpeg', 'admin');
INSERT INTO `berita` (`id`, `judul`, `tanggal`, `tag`, `deskripsi`, `kategori`, `images`, `penulis`) VALUES
(7, 'Gigi Anak Hitam: Penyebab, Penanganan, dan Pencegahannya', '2022-07-06', 'gigi, kesehatan gigi', '<p><span style=\"color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: 16px;\">Gigi anak hitam</span><span style=\"color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: 16px;\">&nbsp;adalah salah satu masalah gigi yang umum terjadi. Kondisi ini dapat membuat anak kehilangan kepercayaan dirinya karena keadaan gigi yang rusak dan berwarna kehitaman.</span></p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Normalnya, gigi berwarna putih kekuningan. Warna tersebut berasal dari jumlah kalsium yang ada di enamel gigi (lapisan luar keras).&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Namun, enamel gigi bisa menipis seiring berjalannya waktu sehingga membuat gigi tampak lebih gelap. Selain itu, enamel juga bisa ternoda dari luar sehingga menyebabkan gigi menghitam.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Untuk membantu anak mengatasi masalah ini, kenali penyebab dan cara mengatasi masalah&nbsp;gigi hitam pada anak.</p><h2 class=\"chakra-text css-eaeo5s\" id=\"penyebab-gigi-anak-hitam\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Penyebab gigi anak hitam</strong></h2><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Penyebab&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/penyebab-gigi-anak-rusak-dan-cara-merawatnya-orangtua-perlu-tahu\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">gigi anak</a>&nbsp;hitam umumnya disebabkan oleh dua faktor, yaitu permukaan luar gigi (ekstrinsik) atau bagian dalam gigi (intrinsik).&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Faktor ekstrinsik merupakan kerusakan yang disebabkan berbagai penyebab di luar gigi, sedangkan faktor intrinsik berasal dari kerusakan yang dimulai di dalam gigi dan berlanjut keluar.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Berdasarkan kedua faktor tersebut, berikut adalah sejumlah penyebab&nbsp;gigi anak hitam&nbsp;yang perlu diperhatikan orangtua.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">1. Tidak menjaga kebersihan gigi</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Apakah ada bintik hitam di gigi geraham anak? Bisa jadi hal tersebut terjadi karena mereka tidak menjaga kebersihan gigi dengan baik.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Jarang&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/mulut-bersih-maksimal-dengan-cara-menggosok-gigi-yang-benar\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">menyikat gigi</a>&nbsp;dapat menyebabkan sisa-sisa makanan menempel dan menjadi tempat kuman berkembang.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Akibatnya, plak pada gigi terbentuk dan membuat warna gigi anak menjadi kehitaman.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">2. Mengonsumsi makanan tertentu</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Penyebab&nbsp;gigi hitam pada anak&nbsp;juga dipicu konsumsi makanan atau minuman yang berwarna gelap, seperti teh, cokelat, dan cola.&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Asupan tersebut dapat menodai gigi sehingga membuatnya tampak hitam untuk sementara waktu.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">3. Karang gigi</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Gigi anak rusak hitam dapat terjadi akibat karang gigi. Karang gigi adalah&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/mengenal-plak-gigi-cikal-bakal-karang-gigi-hingga-gigi-berlubang\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">plak</a>&nbsp;keras yang menumpuk pada gigi dan biasanya muncul di bawah garis gusi. Plak ini terbentuk ketika bakteri dalam mulut bercampur dengan sisa-sisa makanan.&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Jika tidak dibersihkan, plak bisa menyebabkan terbentuknya karang gigi. Sebagian bentuk dari&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/penyebab-karang-gigi-dan-bahayanya-jika-didiamkan\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">karang gigi</a>&nbsp;ini dapat berwarna kehitaman sehingga gigi terlihat hitam pada anak.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">4. Cedera gigi</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Cedera gigi dapat menyebabkan&nbsp;gigi anak hitam. Misalnya, saat anak bermain dan terjatuh hingga menyebabkan cedera, kondisi tersebut dapat mengganggu pembentukan enamel gigi.&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain itu, perdarahan di dalam gigi akibat cedera juga dapat menyebabkan warna gigi menghitam.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">5. Gigi berlubang</strong></h3><figure class=\"chakra-stack css-owjkmg\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-bottom: 0px; display: flex; -webkit-box-align: center; align-items: center; flex-direction: column; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: medium;\"><span class=\"css-1pv9cat\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; display: inherit; position: relative; margin-top: var(--sehatq-space-4); border-radius: var(--sehatq-radii-xl); overflow: hidden; width: fit-content; margin-inline: auto;\"><span style=\"border: 0px; overflow-wrap: break-word; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; position: relative; max-width: 100%;\"><span style=\"border: 0px; overflow-wrap: break-word; display: block; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; max-width: 100%;\"><br></span></span></span></figure><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Gigi busuk hitam dapat dipicu oleh gigi berlubang. Kondisi ini terjadi akibat bakteri yang merusak enamel gigi sehingga menyebabkan munculnya lubang. Lubang tersebut membuat area sekitar gigi menjadi kehitaman.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\"><a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/penyebab-gigi-anak-berlubang-dan-cara-merawatnya\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">Gigi anak berlubang</a>&nbsp;hitam biasanya juga terasa menyakitkan, bahkan sampai membuat mereka rewel.&nbsp;Kondisi gigi busuk pada anak ini harus segera diatasi untuk mencegahnya semakin parah.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">6. Penggunaan obat tertentu</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Gigi hitam anak dapat disebabkan penggunaan obat tertentu. Misalnya, antibiotik tetrasiklin dan doksisiklin yang mempengaruhi pembentukan enamel gigi, termasuk mengurangi warna putih alaminya.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain itu, konsumsi suplemen zat besi cair juga dapat menyebabkan&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/tips-untuk-mendapatkan-gigi-putih\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">warna gigi</a>&nbsp;berubah.&nbsp;Itulah mengapa penting untuk berkonsultasi dengan dokter mengenai efek samping obat yang digunakan.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">7. Masalah genetik</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Faktor lain yang bisa menyebabkan&nbsp;gigi anak hitam&nbsp;adalah masalah genetik. Gen tertentu dapat mempengaruhi pembentukan enamel gigi sehingga menyebabkan perubahan warna pada gigi susu mereka.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">8. Kelainan enamel gigi</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Terkadang, ada kelainan dalam pembentukan enamel gigi. Kelainan tersebut bisa menyebabkan pewarnaan intrinsik gigi.&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Contoh kelainan enamel gigi adalah hipoplasia enamel, yaitu kelainan yang mengakibatkan enamel menipis dan membuat warna gigi berubah.</p><h2 class=\"chakra-text css-eaeo5s\" id=\"cara-mengatasi-gigi-hitam-pada-anak\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Cara mengatasi gigi hitam pada anak</strong></h2><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Sebaiknya Anda segera berkunjung ke dokter gigi anak untuk mengatasi masalah&nbsp;gigi hitam pada anak&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Dokter gigi akan melakukan perawatan yang tepat untuk anak sesuai dengan usia, kondisi yang mendasari, dan keparahan kondisinya.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Jika penyebab utama gigi hitam anak adalah karang gigi, dokter bisa menghilangkannya menggunakan alat khusus&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/tindakan-medis/scaling-gigi\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\"><em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">scaling</em></a>.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Sementara itu, jika penyebabnya adalah gigi berlubang, kondisi ini dapat diatasi dengan penambalan gigi pada area yang berlubang.&nbsp;Dokter akan menambal gigi dengan bahan tertentu, seperti resin atau asam akrilik, agar gigi tampak seperti semula.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Pemutihan gigi (<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">bleaching</em>) juga dapat dilakukan untuk membersihkan gigi hitam pada anak berusia 14 tahun ke atas. Namun, zat dan metode&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">bleaching</em>&nbsp;yang digunakan bergantung pada warna dan luasnya noda pada gigi.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Apabila kerusakan gigi dinilai parah, dokter mungkin akan menyarankan untuk&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/tindakan-medis/cabut-gigi\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">mencabut gigi</a>&nbsp;anak.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain itu, Anda perlu membantu anak menjaga kebersihan gigi dan mulutnya dengan baik, serta menghindari pemberian makanan tertentu yang dapat mengubah warna gigi anak.&nbsp;</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Jangan sampai masalah gigi pada anak semakin memburuk.</p><h2 class=\"chakra-text css-eaeo5s\" id=\"cara-mencegah-gigi-hitam-pada-anak\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Cara mencegah gigi hitam pada anak</strong></h2><figure class=\"chakra-stack css-owjkmg\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-bottom: 0px; display: flex; -webkit-box-align: center; align-items: center; flex-direction: column; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: medium;\"><span class=\"css-1pv9cat\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; display: inherit; position: relative; margin-top: var(--sehatq-space-4); border-radius: var(--sehatq-radii-xl); overflow: hidden; width: fit-content; margin-inline: auto;\"><span style=\"border: 0px; overflow-wrap: break-word; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; position: relative; max-width: 100%;\"><span style=\"border: 0px; overflow-wrap: break-word; display: block; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; max-width: 100%;\"><br></span></span></span></figure><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Orangtua dapat membantu mencegah masalah&nbsp;gigi anak hitam. Berikut adalah langkah pencegahan yang bisa dilakukan.</p><ul class=\"css-8f5w2\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; word-break: break-word; padding-inline-start: 20px; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: medium;\"><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Mulai bersihkan gigi anak segera setelah gigi pertamanya muncul. Anda bisa&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/cara-membersihkan-mulut-bayi-baru-lahir\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">membersihkan gigi</a>&nbsp;si kecil menggunakan kain kasa atau lap basah.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Pastikan anak menyikat gigi secara rutin sebanyak dua kali sehari menggunakan pasta gigi ber-fluoride. Ajarkan juga mereka teknik menyikat gigi yang benar.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Bantu anak menggunakan&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">flossing&nbsp;</em>(benang gigi) untuk membersihkan sela-sela giginya sekali sehari.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Rutin memeriksakan gigi anak ke dokter gigi setiap 6 bulan sekali agar kesehatan giginya terjaga.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Hindari memberi anak susu botol sebelum tidur. Kandungan gula pada&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/memberikan-susu-formula-untuk-bayi-baru-lahir\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">susu formula</a>&nbsp;dapat menyebabkan kerusakan gigi pada anak.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Beri anak asupan yang bernutrisi, seperti buah-buahan, sayur-mayur, dan biji-bijian.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Hindari memberikan makanan dan minuman yang tinggi gula karena bisa menyebabkan kerusakan gigi.</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Pastikan anak minum air putih dengan cukup. Hal tersebut dapat meningkatkan produksi air liur yang bermanfaat untuk melindungi gigi.</li></ul><h2 class=\"chakra-text css-eaeo5s\" id=\"tanda-mulut-dan-gigi-anak-sehat\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Tanda mulut dan gigi anak sehat</strong></h2><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Berikut adalah beberapa tanda mulut dan gigi anak sehat yang bisa orangtua perhatikan.</p><ul class=\"css-8f5w2\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; word-break: break-word; padding-inline-start: 20px; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: medium;\"><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Tidak bau mulut</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Lidah berwarna merah muda dan lembap</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Gigi kuat (tidak goyah, rapuh, ataupun sensitif terhadap makanan dan minuman dingin)</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Gusi merah muda dan kokoh</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Gigi tidak berlubang</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Susunan gigi rapi sehingga mudah dibersihkan, dan tidak membuat sisa makanan terjebak di sana</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Warna gigi sama (putih kekuningan alami).</li></ul><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Jika anak memiliki tanda mulut dan gigi yang sehat, Anda hanya perlu membantu merawat giginya dengan tepat dan rutin agar terhindar dari masalah yang mengganggu.</p><p><br></p>', 2, 'gigi_berlubang.jpg', 'admin');
INSERT INTO `berita` (`id`, `judul`, `tanggal`, `tag`, `deskripsi`, `kategori`, `images`, `penulis`) VALUES
(8, 'Beragam Manfaat Brokoli untuk Kesehatan, Termasuk Melawan Sel Kanker', '2022-07-06', 'Brololi, cegah kanker', '<p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Jika sedang bersemangat untuk memulai hidup sehat, maka kita bisa memasukkan sayur brokoli ke dalam menu diet. Sebab, ada beragam manfaat brokoli yang mungkin sebelumnya tak pernah Anda sangka.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Brokoli adalah makanan sehat yang tergolong ke dalam kelompok sayuran&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">cruciferous</em>, bersama dengan&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/dianggap-superfood-waspada-bahaya-pestisida-dalam-sayur-kale\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">sayur kale</a>, kembang kol, kubis, dan lobak. Sayuran hijau ini masuk ke dalam 20 makanan terbaik versi&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">Aggregate Nutrient Density Index</em>, karena nutrisinya yang menakjubkan. Apa saja manfaat sayur brokoli?</p><h2 class=\"chakra-text css-eaeo5s\" id=\"kandungan-gizi-brokoli\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\">Kandungan gizi brokoli</h2><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Khasiat brokoli di atas tentu ditopang oleh berbagai kandungan nutrisinya. Sayur brokoli kaya dengan beragam vitamin, mineral, molekul bioaktif, serta mengandung serat yang baik untuk pencernaan.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Dalam 91 gram (sekitar setengah gelas belimbing) sayur brokoli mentah mengandung zat nutrisi sebagai berikut.</p><ul class=\"css-8f5w2\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; word-break: break-word; padding-inline-start: 20px; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: medium;\"><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">6 gram karbohidrat</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">2,6 gram protein</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">0,3 gram lemak</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">2,4 gram serat</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">135% dari rekomendasi harian vitamin C</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">11% dari rekomendasi harian&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/lezat-dan-bergizi-ini-daftar-buah-yang-mengandung-vitamin-a\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">vitamin A</a></li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">116% dari rekomendasi harian vitamin K</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">14% dari rekomendasi hari vitamin B9 (folat)</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">8% dari rekomendasi harian kalium</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">3% dari rekomendasi harian selenium</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">6% dari rekomendasi harian fosfor</li></ul><h2 class=\"chakra-text css-eaeo5s\" id=\"ragam-manfaat-brokoli-untuk-kesehatan\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Ragam manfaat brokoli untuk kesehatan</strong></h2><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Ada banyak manfaat brokoli untuk hidup yang lebih sehat. Beberapa khasiat brokoli tersebut, yaitu:</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">1. Mengandung molekul antioksidan untuk perlindungan tubuh</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Secara umum, manfaat brokoli untuk menjaga kesehatan karena kandungan antioksidannya. Sayur brokoli merupakan salah satu dari sumber&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/apa-itu-antioksidan-dan-apa-fungsinya-untuk-kesehatan\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">molekul antioksidan</a>&nbsp;yang bisa dikonsumsi dengan mudah. Brokoli mengandung molekul antioksidan lutein and zeaxanthin yang bisa mencegah kondisi stres oksidatif, serta menjaga kesehatan mata.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain itu, sayur brokoli juga kaya akan glukorafanin, molekul yang dapat berubah menjadi molekul antioksidan yang disebut sulforafana saat dicerna tubuh. Berbagai penelitian menunjukkan, sulforafana dapat menurunkan risiko berbagai gangguan medis, seperti mengontrol gula darah dan mengurangi kolesterol.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">2. Mengandung molekul bioaktif untuk mengurangi inflamasi</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain antioksidan, sayur brokoli juga mengandung molekul bioaktif yang dapat mengurangi inflamasi. Molekul bioaktif tersebut ada yang bekerja bersinergi, dan ada pula yang bekerja sendiri-sendiri untuk kesehatan jaringan tubuh.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\"><a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.tandfonline.com/doi/full/10.3109/09637486.2013.830084\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">Sebuah studi</a>&nbsp;yang dimuat dalam International&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">Journal Foods Sciences and Nutrition</em>&nbsp;mengungkapkan, mengonsumsi sayur brokoli dapat menurunkan gejala inflamasi secara signifikan pada perokok. Penelitian ini dilakukan dengan memberikan sayur brokoli sebanyak 250 gram sehari pada responden selama 10 hari.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">3. Membantu menjaga kesehatan jantung</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Sayur brokoli juga berkhasiat menjaga kesehatan jantung. Misalnya, sayur brokoli dapat mencegah&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/penyakit/penyakit-jantung\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">penyakit jantung</a>, dengan mengontrol kadar kolesterol dan trigliserida. Beberapa penelitian juga membuktikan, mengonsumsi sayur brokoli dapat mengurangi risiko serangan jantung. Sayur brokoli juga mengandung serat, yang dapat menjaga kesehatan jantung.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">4. Melawan beberapa jenis kanker</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Berbagai penelitian membuktikan, sayur brokoli membantu mencegah kanker. Walau penelitian lebih lanjut masih diperlukan, tentu hal ini juga menggembirakan.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Beberapa jenis kanker yang dilaporkan dapat dilawan dengan sayur brokoli, yakni:</p><ul class=\"css-8f5w2\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; word-break: break-word; padding-inline-start: 20px; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;; font-size: medium;\"><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Kanker payudara</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\"><a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/penyakit/kanker-prostat\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">Kanker prostat</a></li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Kanker lambung</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Kanker ginjal</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\"><a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/penyakit/kanker-kandung-kemih\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">Kanker kandung kemih</a></li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Kanker kolorektal</li></ul><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">5. Membantu memperlambat penuaan</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Banyak radikal bebas di sekitar kita yang dapat mempercepat penuaan melalui proses stres oksidatif. Walau penuaan menjadi hal yang pasti, namun Anda dapat memperlambatnya dengan mengonsumsi brokoli.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Kandungan glukorafanin dalam brokoli, molekul yang dapat berubah menjadi molekul antioksidan sulforafana, yang berkhasiat untuk mencegah&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/beberapa-kebiasaan-ini-bisa-picu-wajah-menjadi-cepat-tua\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">penuaan dini</a>.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">6. Menjaga sistem daya tahan tubuh</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Sayur brokoli juga sangat kaya dengan vitamin C yang dapat membantu menjaga sistem imunitas tubuh. Meski selama ini identik dengan buah jeruk dan stroberi,&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/hidup-sehat-dengan-buah-yang-mengandung-vitamin-c-ini\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">vitamin C</a>&nbsp;juga banyak terkandung dalam brokoli.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain manfaat di atas, ada sejumlah khasiat brokoli lainnya. Sayur brokoli bermanfaat untuk menjaga kesehatan ibu dan janin saat kehamilan, menjaga kesehatan tulang dan sendi, serta memelihara kesehatan mulut dan gigi.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Selain itu, banyak penelitian juga menemukan khasiat brokoli untuk kesehatan mental dan fungsi otak, mengontrol kadar gula darah, serta baik untuk kesehatan pencernaan.</p><h2 class=\"chakra-text css-eaeo5s\" id=\"cara-sehat-mengolah-brokoli\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\">Cara sehat mengolah brokoli</h2><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Sayur brokoli dapat langsung dimakan maupun dimasak terlebih dahulu. Namun, kandungan nutrisinya sudah berubah jika sayur brokoli mengalami proses pengolahan, sebelum Anda menyantapnya.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: &quot;Open Sans&quot;;\">Memasak brokoli dengan merebus, menggoreng, mengukus, atau memasukkannya ke&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">microwave</em>, dapat mengurangi kandungan vitamin C, gula, dan protein dalam sayur ini. Mengukus menjadi cara paling baik untuk meminimalisir turunnya nutrisi brokoli.</p>', 2, 'brokoli.jpg', 'admin');
INSERT INTO `berita` (`id`, `judul`, `tanggal`, `tag`, `deskripsi`, `kategori`, `images`, `penulis`) VALUES
(9, 'Minum Air Putih Dingin Setelah Olahraga Apakah Aman?', '2022-07-06', 'air putih dingin, olahraga', '<p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Minum air dingin, air suhu ruangan, maupun air hangat pada dasarnya sama-sama memberikan manfaat bagi tubuh. Alasan utamanya tentu saja karena minum cairan dapat menjaga tubuh terhidrasi. Tapi, bagaimana dengan minum air dingin setelah olahraga? Ternyata, boleh-boleh saja dan tidak ada bahayanya. Ini penjelasannya.</p><h2 class=\"chakra-text css-eaeo5s\" id=\"manfaat-minum-air-dingin-setelah-olahraga\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Manfaat minum</strong>&nbsp;air dingin setelah olahraga</h2><figure class=\"chakra-stack css-owjkmg\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-bottom: 0px; display: flex; -webkit-box-align: center; align-items: center; flex-direction: column; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" medium;\"=\"\"><span class=\"css-1pv9cat\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; display: inherit; position: relative; margin-top: var(--sehatq-space-4); border-radius: var(--sehatq-radii-xl); overflow: hidden; width: fit-content; margin-inline: auto;\"><span style=\"border: 0px; overflow-wrap: break-word; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; position: relative; max-width: 100%;\"><span style=\"border: 0px; overflow-wrap: break-word; display: block; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; max-width: 100%;\"><br></span></span></span></figure><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Ketika berolahraga, tentu seseorang akan berkeringat karena proses pembakaran kalori dan metabolisme yang terjadi di tubuh. Proses ini membuat kita lebih rentan terkena dehidrasi atau kekurangan cairan, karena itu, setiap selesai olahraga, Anda disarankan untuk banyak minum air putih, termasuk air dingin.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Minum air&nbsp; dingin setelah olahraga bahkan memiliki beberapa manfaat, seperti:</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">1. Menghilangkan dahaga</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Minum air dingin setelah olahraga menjadi hal yang pasti menyegarkan dahaga setelah berolahraga selama sekian waktu. Bayangkan saja ketika sedang&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/apa-saja-manfaat-bersepeda-untuk-tubuh\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">bersepeda</a>,&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/memperbaiki-postur-tubuh-dengan-melakukan-pose-yoga-yang-benar\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">yoga</a>&nbsp;di ruangan yang dibuat panas, atau&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/tanpa-ribet-olahraga-kardio-ini-cocok-untuk-anda-yang-sibuk\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">olahraga cardio</a>&nbsp;lainnya. Minum air dingin tentu jadi hal yang menyegarkan, bukan?</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Setelah berolahraga, kita wajib minum air yang cukup untuk mencegah terjadinya dehidrasi. Minum air putih dingin bagi banyak orang bisa meningkatkan keinginan untuk minum lebih banyak air dibanding air suhu biasa apalagi yang hangat atau panas. Karena itu, minum air dingin setelah olahraga tetap dianjurkan.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">2. Baik untuk jantung</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Berdasarkan penelitian dari Acta Physiologia, terkuak bahwa minum air dingin setelah olahraga bisa meringankan kinerja jantung. Sementara itu, melansir dari Medicine Net, disebutkan bahwa minum air dingin setelah olahraga akan menurunkan detak jantung dan dapat membantu proses pemulihan setelah olahraga berjalan lebih baik.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">3. Membantu membakar lebih banyak kalori</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Tak hanya itu, selama ini juga berkembang mitos bahwa&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/artikel/apakah-air-es-bisa-menurunkan-berat-badan\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">minum air dingin bisa membantu mengurangi berat badan</a>. Ternyata, hal ini tidak sepenuhnya salah. University of Arkansas Medical School meneliti bahwa air dingin membantu membakar 8 kalori karena tubuh menghangatkan air yang masuk agar sesuai dengan suhu tubuh, jadi ada kemungkinan tubuh membakar lebih banyak kalori saat Anda minum air dingin. Namun, tentu hasilnya tidak signifikan dan tidak bisa dijadikan satu-satunya metode untuk menurunkan berat badan.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">4. Mengontrol suhu tubuh</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Journal of International Society of Sports Nutrition menemukan bahwa minum air dingin setelah olahraga membantu memperlambat naiknya temperatur tubuh usai berolahraga.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Minum air dingin sebelum dan saat olahraga juga akan membuat suhu tubuh meningkat secara perlahan – bukannya signifikan – sehingga memungkinkan olahraga lebih lama tanpa merasa kelelahan. Tak hanya itu, air dingin juga terasa lebih menyegarkan dan membuat tubuh merasa lebih dingin.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Namun tentu saja ini bukan harga mutlak. Bukan berarti mereka yang minum air dingin saat berolahraga akan jauh lebih kuat dibandingkan dengan mereka yang tidak minum air dingin.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Ada banyak faktor lain yang lebih penting. Mulai dari kondisi tubuh, kesehatan, frekuensi berolahraga, dan lainnya. Hal yang lebih krusial adalah memastikan tubuh terus terhidrasi saat berolahraga, bukan berapa temperatur air yang dikonsumsi.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Pastikan asupan cairan ini sesuai dengan seberapa banyak keringat yang keluar saat olahraga. Semakin tinggi intensitas olahraga, semain besar pula kebutuhan untuk mengembalikan asupan cairan ke tubuh.</p><h3 class=\"chakra-text css-lw5juy\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-lg); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">5. Air dingin lebih cepat terserap tubuh</strong></h3><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-1-5); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Benar bahwa tubuh bisa menyerap air dingin lebih cepat ketimbang air hangat. Dengan demikian, tubuh bisa terhidrasi dengan lebih cepat pula. Hal ini penting ketika berolahraga karena seseorang bisa kehilangan cairan dengan cepat, terutama jika berolahraga di bawah suhu panas.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Selain semua deretan manfaat di atas, tidak ada dampak berbahaya dari minum air dingin setelah olahraga. Tetap ingat bahwa yang paling penting adalah memastikan tubuh terhidrasi setelah kehilangan banyak cairan sepanjang berolahraga.</p><h2 class=\"chakra-text css-eaeo5s\" id=\"mengapa-kita-perlu-banyak-minum-setelah-olahraga\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-6); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: var(--sehatq-fontSizes-2xl); font-weight: var(--sehatq-fontWeights-semibold); word-break: break-word; line-height: 30px; font-family: var(--sehatq-fonts-poppins); color: rgb(54, 69, 79);\"><strong style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; font-weight: bold;\">Mengapa kita perlu banyak minum setelah olahraga?</strong></h2><figure class=\"chakra-stack css-owjkmg\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-bottom: 0px; display: flex; -webkit-box-align: center; align-items: center; flex-direction: column; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" medium;\"=\"\"><span class=\"css-1pv9cat\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; display: inherit; position: relative; margin-top: var(--sehatq-space-4); border-radius: var(--sehatq-radii-xl); overflow: hidden; width: fit-content; margin-inline: auto;\"><span style=\"border: 0px; overflow-wrap: break-word; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; position: relative; max-width: 100%;\"><span style=\"border: 0px; overflow-wrap: break-word; display: block; width: initial; height: initial; background: none; opacity: 1; margin: 0px; padding: 0px; max-width: 100%;\"><br></span></span></span></figure><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Terlepas dari suhu airnya, kita tetap harus banyak minum setelah olahraga. Pasalnya, olahraga membuat kita berkeringat dan mengeluarkan banyak cairan tubuh. Jika cairan tersebut tidak segera diganti, maka risiko terjadinya&nbsp;<a target=\"_blank\" rel=\"noopener noreferrer\" class=\"chakra-link css-1fvqfem\" href=\"https://www.sehatq.com/penyakit/dehidrasi\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; color: var(--sehatq-colors-sea-500); transition-property: var(--sehatq-transition-property-common); transition-duration: var(--sehatq-transition-duration-normal); transition-timing-function: var(--sehatq-transition-easing-ease-out); cursor: pointer; outline: transparent solid 2px; outline-offset: 2px; line-height: 30px; border-radius: var(--sehatq-radii-md); font-weight: var(--sehatq-fontWeights-normal); display: inline; -webkit-box-align: center; align-items: center; -webkit-box-pack: center; justify-content: center; height: auto; min-width: var(--sehatq-sizes-10); font-size: var(--sehatq-fontSizes-md); padding-inline-start: var(--sehatq-space-4); padding-inline-end: var(--sehatq-space-4); padding: 0px; vertical-align: baseline; word-break: break-word;\">dehidrasi</a>&nbsp;akan meningkat.</p><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Dehidrasi bisa menyebabkan kram otot yang parah setelah olahraga. Selain itu, berikut ini beberapa kondisi yang bisa terjadi jika Anda kurang minum setelah selesai olahraga:</p><ul role=\"list\" class=\"css-tu0njr\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-type: initial; margin-inline-start: 1em;\"><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Kelelahan</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Sakit kepala</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Sesak napas</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Kerusakan otot</li><li class=\"chakra-text css-nlj39t\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; word-break: break-word; line-height: 30px; margin-top: var(--sehatq-space-2);\">Serangan panas atau&nbsp;<em style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word;\">heatstroke</em>, terutama jika olahraga dilakukan di luar ruangan saat siang hari</li></ul><div class=\"css-hsw2c8\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-5); margin-bottom: var(--sehatq-space-5); padding-top: var(--sehatq-space-5); padding-bottom: var(--sehatq-space-5); padding-inline-start: var(--sehatq-space-6); padding-inline-end: var(--sehatq-space-6); background: var(--sehatq-colors-iceBlue-500); border-radius: var(--sehatq-radii-xl); color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" medium;\"=\"\"></div><p class=\"chakra-text css-eq7bd3\" style=\"border-width: 0px; border-style: solid; border-color: var(--sehatq-colors-gray-200); overflow-wrap: break-word; margin-top: var(--sehatq-space-4); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; word-break: break-word; line-height: 30px; font-size: medium; color: rgb(54, 69, 79); font-family: \" open=\"\" sans\";\"=\"\">Minum air dingin setelah olahraga tidaklah berbahaya. Justru, jika memang Anda lebih menyukai air dingin dibanding air biasa atau air hangat, maka tidak ada salahnya untuk minum air dingin sesuai kebutuhan agar risiko dehidrasi bisa berkurang.</p>', 2, 'minum-air-putih-setelah-olahraga.jpg', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_keuangan`
--

CREATE TABLE `buku_keuangan` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_trans_apotik`
--

CREATE TABLE `detail_trans_apotik` (
  `id` bigint(20) NOT NULL,
  `kode_trans` varchar(100) DEFAULT NULL,
  `kode_obat` varchar(50) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `subtotal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_trans_apotik`
--

INSERT INTO `detail_trans_apotik` (`id`, `kode_trans`, `kode_obat`, `qty`, `harga`, `subtotal`) VALUES
(1, 'TAKK20220725-00001', '2000100', '1', '10000', '10000'),
(2, 'TAKK20220725-00001', '2000101', '1', '12000', '12000'),
(3, 'TAKK20220726-00001', '2000100', '2', '10000', '20000'),
(6, 'TAKK20220801-00001', '2000101', '1', '12000', '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_poli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `id_dokter`, `id_poli`) VALUES
(1, 7, 1),
(2, 8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `senin` time DEFAULT NULL,
  `senin2` time DEFAULT NULL,
  `selasa` time DEFAULT NULL,
  `selasa2` time DEFAULT NULL,
  `rabu` time DEFAULT NULL,
  `rabu2` time DEFAULT NULL,
  `kamis` time DEFAULT NULL,
  `kamis2` time DEFAULT NULL,
  `jumat` time DEFAULT NULL,
  `jumat2` time DEFAULT NULL,
  `sabtu` time DEFAULT NULL,
  `sabtu2` time DEFAULT NULL,
  `minggu` time DEFAULT NULL,
  `minggu2` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `id_dokter`, `senin`, `senin2`, `selasa`, `selasa2`, `rabu`, `rabu2`, `kamis`, `kamis2`, `jumat`, `jumat2`, `sabtu`, `sabtu2`, `minggu`, `minggu2`) VALUES
(1, 7, '08:00:00', '15:00:00', '08:30:00', '16:00:00', '07:30:00', '14:45:00', '13:00:00', '20:00:00', '14:00:00', '20:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_vaksinasi`
--

CREATE TABLE `jadwal_vaksinasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `jenis_vaksin` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_vaksinasi`
--

INSERT INTO `jadwal_vaksinasi` (`id`, `judul`, `jenis_vaksin`, `tanggal`, `jam_mulai`, `jam_selesai`, `images`, `status`) VALUES
(2, 'Vaksinasi dosis 3 Covid 19 Tahap 1', 'Sinovac ,Astra Zenecca, dan Pfizer', '2022-07-05', '08:00:00', '12:00:00', 'vaksinasi.jpeg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karir`
--

CREATE TABLE `karir` (
  `id` int(11) NOT NULL,
  `bidang` varchar(200) DEFAULT NULL,
  `jml_dibutuhkan` int(5) DEFAULT NULL,
  `syarat_kebutuhan` text DEFAULT NULL,
  `batas_akhir` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karir`
--

INSERT INTO `karir` (`id`, `bidang`, `jml_dibutuhkan`, `syarat_kebutuhan`, `batas_akhir`, `status`) VALUES
(2, 'Staff IT Programmer', 1, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background: rgb(251, 251, 251); list-style: none; color: rgb(122, 122, 122); font-family: Roboto;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Pendidikan S1 Teknik Informatika / Sistem Informasi</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Diutamakan Berpengalaman dibidang sama</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Familiar dengan :</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   1. Bahasa Pemrograman (HTML, PHP, CSS, JavaScript)</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   2. Framework (CodeIgniter dan ExtJS)</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   3. Database (PostgreSQL, MySQL)</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   4. Pengerjaan aplikasi menggunakan Gitlab Repository / StandAlone</li></ul>', '2022-07-09', 1),
(3, 'Sekretariat & Hukum', 1, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background: rgb(251, 251, 251); list-style: none; color: rgb(122, 122, 122); font-family: Roboto;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Pendidikan S1 Hukum</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Berpengalaman membuat Legal Opinion</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Menguasai Hukum Kesehatan</li></ul>', '2022-07-09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` varchar(200) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_pembayaran`
--

CREATE TABLE `notifikasi_pembayaran` (
  `id` int(11) NOT NULL,
  `kode_trans` varchar(50) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tipe` int(1) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi_pembayaran`
--

INSERT INTO `notifikasi_pembayaran` (`id`, `kode_trans`, `role`, `keterangan`, `tipe`, `status`) VALUES
(1, 'TAKK20220725-00001', 4, 'Terdapat pembayaran baru, silahkan di cek', 1, 1),
(5, 'TAKK20220801-00001', 4, 'Terdapat pembayaran baru, silahkan di cek', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_pendaftaran`
--

CREATE TABLE `notifikasi_pendaftaran` (
  `id` int(11) NOT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis` int(1) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi_pendaftaran`
--

INSERT INTO `notifikasi_pendaftaran` (`id`, `id_pendaftaran`, `id_users`, `keterangan`, `jenis`, `status`) VALUES
(4, 5, 2, 'Pendaftaran anda telah dikonfirmasi', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_pengobatan`
--

CREATE TABLE `notifikasi_pengobatan` (
  `id` int(11) NOT NULL,
  `id_pengobatan` int(11) DEFAULT NULL,
  `id_auth` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi_pengobatan`
--

INSERT INTO `notifikasi_pengobatan` (`id`, `id_pengobatan`, `id_auth`, `keterangan`, `status`) VALUES
(1, 1, 7, 'Dokter, anda mempunyai pasien baru', 1),
(3, 3, 7, 'Dokter, anda mempunyai pasien baru', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kd_obat` varchar(50) DEFAULT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `harga` varchar(25) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `dosis` text DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `kd_obat`, `nama_obat`, `harga`, `stok`, `dosis`, `tgl_kadaluarsa`) VALUES
(1, '2000100', 'Paracetamol 500 mg 10 strip 10 kablet', '10000', 17, '500-1.000 mg atau 10–15 mg/kgBB, tiap 4–6 jam. Dosis maksimal 4.000 mg per hari. Bayi dan anak-anak: 10–15 mg/kgBB, tidak 4–6 jam. Dosis tidak boleh lebih dari 15 mg/kgBB per dosis', '2022-08-18'),
(2, '2000101', 'Bodrex Parcetamol, Caffeine', '12000', 5, 'Dewasa: 1 tablet, 3–4 kali sehari. Anak usia >12 tahun: 1 tablet, 3–4 kali sehari. Anak usia 6–12 tahun: 0,5–1 tablet, 3–4 kali sehari', '2022-08-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `nama_partner` varchar(100) DEFAULT NULL,
  `images_partner` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`id`, `nama_partner`, `images_partner`) VALUES
(1, 'BPJS Kesehatan', 'bpjs.png'),
(5, 'Prudential', 'prudential.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `kd_payment` varchar(50) NOT NULL,
  `id_pengobatan` int(11) DEFAULT NULL,
  `id_trans` varchar(100) DEFAULT NULL,
  `jml_dibayarkan` varchar(25) DEFAULT NULL,
  `total_biaya_pengobatan` varchar(25) DEFAULT NULL,
  `kembalian` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `kd_payment`, `id_pengobatan`, `id_trans`, `jml_dibayarkan`, `total_biaya_pengobatan`, `kembalian`) VALUES
(4, 'Payment-31072022-726', 1, 'TAKK20220725-00001', '50000', '47000', '3000'),
(5, 'Payment-31072022-276', NULL, 'TAKK20220726-00001', '20000', '20000', '0'),
(7, 'Payment-02082022-490', 3, 'TAKK20220801-00001', '70000', '62000', '8000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint(20) NOT NULL,
  `kd_pendaftaran` varchar(100) DEFAULT NULL,
  `id_users` int(20) DEFAULT NULL,
  `id_poli` int(11) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `no_antrian` varchar(10) DEFAULT NULL,
  `gejala` text NOT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `id_dokter` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `kd_pendaftaran`, `id_users`, `id_poli`, `tgl_pendaftaran`, `no_antrian`, `gejala`, `jam`, `id_dokter`, `keterangan`, `status`) VALUES
(5, 'KK-18072022-295', 2, 1, '2022-07-18', '1', 'badan panas, meriang (merindukan kasih sayang)', '1658124449', 7, '', 3),
(10, 'KK-01082022-404', 3, 1, '2022-08-01', '1', 'batuk panas pilek', '1659353655', 7, '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `kategori` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_diperoleh` date DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `nama`, `kategori`, `deskripsi`, `tgl_diperoleh`, `images`) VALUES
(1, 'Juara 1 pelayanan terbaik di kecamatan Puger Jember', 'Pelayanan Terbaik ', '<p>Penghargaan juara 1 untuk pelayanan terbaik. dengan adanya sistem yang terintegrasi membuat pihak klinik memperoleh penghargaan pelayanan terbaik. masyarakat merasa terbantu dengan pelayanan dari klik klinik<br></p>', '2022-02-10', 'penghargaan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengobatan`
--

CREATE TABLE `pengobatan` (
  `id` int(11) NOT NULL,
  `kode_pendaftaran` varchar(100) DEFAULT NULL,
  `tgl_pengobatan` date NOT NULL,
  `id_diagnosa` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_pengobatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengobatan`
--

INSERT INTO `pengobatan` (`id`, `kode_pendaftaran`, `tgl_pengobatan`, `id_diagnosa`, `keterangan`, `status_pengobatan`) VALUES
(1, 'KK-18072022-295', '2022-07-18', '1', NULL, 3),
(3, 'KK-01082022-404', '2022-08-01', '2', NULL, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(100) DEFAULT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`id`, `nama_poli`, `jam_buka`, `jam_tutup`) VALUES
(1, 'Poli Umum', '08:00:00', '15:00:00'),
(2, 'Poli Gigi', '09:00:00', '03:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `id_pengobatan` varchar(50) DEFAULT NULL,
  `resep` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_resep` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `id_pengobatan`, `resep`, `keterangan`, `status_resep`) VALUES
(3, '1', 'R/ Paracetamol 100 mg no 100 tab1', 'print jika obat kosong', 1),
(5, '3', 'R/ Bodrex 100 mg no 100 tab1', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'dokter'),
(3, 'apoteker'),
(4, 'kasir'),
(6, 'lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `diagnosa` varchar(250) DEFAULT NULL,
  `tarif` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `id_poli`, `diagnosa`, `tarif`) VALUES
(1, 1, 'Penyakit Rindu', '25000'),
(2, 1, 'Demam Umum', '50000'),
(3, 2, 'Orto Removeable (rahang)', '400000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_apotik`
--

CREATE TABLE `trans_apotik` (
  `id` bigint(20) NOT NULL,
  `kd_trans` varchar(100) DEFAULT NULL,
  `id_resep` varchar(100) DEFAULT NULL,
  `tgl_trans` date DEFAULT NULL,
  `apoteker` varchar(120) DEFAULT NULL,
  `total_qty` varchar(10) DEFAULT NULL,
  `total_biaya` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans_apotik`
--

INSERT INTO `trans_apotik` (`id`, `kd_trans`, `id_resep`, `tgl_trans`, `apoteker`, `total_qty`, `total_biaya`, `status`) VALUES
(1, 'TAKK20220725-00001', '3', '2022-07-25', 'Mega Kharunia, S.Farm', '2', '22000', 1),
(2, 'TAKK20220726-00001', NULL, '2022-07-26', 'Mega Kharunia, S.Farm', '2', '20000', 1),
(6, 'TAKK20220801-00001', '5', '2022-08-01', 'Mega Kharunia, S.Farm', '1', '12000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_rekmed` varchar(20) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `no_rekmed`, `name`, `tempat_lahir`, `tgl_lahir`, `email`, `alamat`, `no_telp`, `password`, `status`) VALUES
(1, '3501999789000010', '202211070001', 'Deny Fajar Irianto', 'Jember', '1996-12-25', 'denyfajar12@gmail.com', 'Jl Satir Dusun Kapuran Grenden Puger Jember', '082111222123', '$2y$10$Q28siWnTP1KYru8uSFyhHu6kk/3x06NoayA.HAjZaMngUs7y9l5Ga', 1),
(2, '3501999789000012', '202203070002', 'Maulina Sefia', 'Jember', '2002-08-17', 'maulina@gmail.com', 'Lojejer Jember', '081334081272', '$2y$10$88NXA9AfM4Xz5S80/HiZY.By/3/DsXft6qVMinvpdPrOR88uGR/Qe', 1),
(3, '3501999789000020', '202215070001', 'Marselino Ferdinan', 'Surabaya', '2004-04-06', NULL, 'surabaya', '082135161999', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `motto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `motto`) VALUES
(1, '<p><span style=\"color: rgb(68, 68, 68); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Menjadi Pusat Kesehatan Ibu & Anak yang dikelola secara profesional dengan sentuhan kemanusiaan</span><br></p>', '<ul style=\"margin: 15px 0px; padding: 0px 0px 0px 35px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background: transparent; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51); font-family: \"Open Sans\", sans-serif;\"><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.7; vertical-align: baseline; background: transparent; color: rgb(68, 68, 68);\">Ikut membantu program Pemerintah dalam menurunkan angka kematian Ibu saat melahirkan dan Bayi saat dilahirkan</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.7; vertical-align: baseline; background: transparent; color: rgb(68, 68, 68);\">Memberikan pelayanan kesehatan yang prima kepada Ibu & Anak sesuai dengan standar profesi melalui dukungan sumber daya manusia yang profesional dibidangnya</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.7; vertical-align: baseline; background: transparent; color: rgb(68, 68, 68);\">Mengutamakan kepentingan untuk pelayanan kesehatan pasien</li><li style=\"margin: 3px 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.7; vertical-align: baseline; background: transparent; color: rgb(68, 68, 68);\">Senantiasa berusaha untuk mewujudkan kepuasan pasien.</li></ul>', 'KAMI MELAYANI DENGAN SEPENUH HATI');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku_keuangan`
--
ALTER TABLE `buku_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_trans_apotik`
--
ALTER TABLE `detail_trans_apotik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_vaksinasi`
--
ALTER TABLE `jadwal_vaksinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karir`
--
ALTER TABLE `karir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_pembayaran`
--
ALTER TABLE `notifikasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_pendaftaran`
--
ALTER TABLE `notifikasi_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_pengobatan`
--
ALTER TABLE `notifikasi_pengobatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengobatan`
--
ALTER TABLE `pengobatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_apotik`
--
ALTER TABLE `trans_apotik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `buku_keuangan`
--
ALTER TABLE `buku_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_trans_apotik`
--
ALTER TABLE `detail_trans_apotik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal_vaksinasi`
--
ALTER TABLE `jadwal_vaksinasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karir`
--
ALTER TABLE `karir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_pembayaran`
--
ALTER TABLE `notifikasi_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_pendaftaran`
--
ALTER TABLE `notifikasi_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_pengobatan`
--
ALTER TABLE `notifikasi_pengobatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengobatan`
--
ALTER TABLE `pengobatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `trans_apotik`
--
ALTER TABLE `trans_apotik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
