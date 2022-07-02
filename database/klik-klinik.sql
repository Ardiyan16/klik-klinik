-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2022 pada 05.37
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
(6, 'Bawik Ardiyan Ramadhan S.Tr.Kom', 'Jember', '1999-01-09', '082132881252', 'ardiyanramadhan4@gmail.com', 'admin', '$2y$10$j3ebdz3cWm3IHVZgxui1r.nNamtJM1EETLT1XVjO5YWZxF/L4wjHO', 'me2.jpeg', '1', '1');

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
  `images` varchar(500) DEFAULT NULL,
  `penulis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal`, `tag`, `deskripsi`, `images`, `penulis`) VALUES
(2, 'Waspada Badan Lemas Karena Asam Lambung', '2022-06-23', 'asam lambung, pencernaan, kesehatan pencernaan', '<p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Penyakit asam lambung adalah kondisi ketika\r\nseseorang mengalami gejala saluran pencernaan karena produksi asam lambung yang\r\nberlebihan.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Tanda dan gejala asam lambung bisa berupa\r\nnyeri ulu hati, mual, dan begah. Selain itu, penderitanya juga kerap merasakan\r\nbadan lemas. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Mengapa <b>badan bisa lemas karena asam\r\nlambung</b>? Lalu, apa penyebab badan lemas pada penderita asam lambung? <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:18.0pt;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\">Penyebab Badan Lemas\r\nKarena Asam Lambung</span></b><span style=\"font-size:18.0pt;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Ada lima penyebab badan lemas pada penderita\r\nasam lambung, di antaranya:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 16.5pt; font-family: Roboto;\">1. Turunnya Nafsu Makan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Bagi penderita asam lambung, biasanya keluhan\r\nakan timbul sesaat setelah makan. Mereka akan merasakan nyeri ulu hati usai\r\nmakan. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Hal ini tentunya menyebabkan gangguan makan,\r\nsehingga nafsu makan akan menurun dan nutrisi tidak tercukupi.\r\nPada akhirnya, badan akan terasa kurang bertenaga.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">2. Kurang Tidur</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Ketika seseorang mengalami asam lambung,\r\nberbaring akan memberikan rasa tidak nyaman. Sebab, berbaring dapat membuat isi\r\nlambung kembali naik ke esofagus dan kerongkongan.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Jika hal tersebut terjadi menjelang tidur,\r\ntentu saja kualitas dan waktu tidur akan terganggu. Alhasil, penderita bisa\r\nsaja mengalami badan lemas keesokan harinya.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">3. Stres</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Rasa tidak nyaman yang terjadi akibat penyakit\r\nasam lambung bisa menyebabkan stres. Dan, terjadinya stres dapat memicu\r\nkeluhan asam lambung yang parah.  <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Kombinasi kedua kondisi tersebut –\r\nasam lambung dan stres -- bisa membuat penderita merasa lelah dan\r\nlesu.  <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">4. Anemia</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Naiknya asam lambung dapat meningkatkan risiko\r\nluka pada lambung. Perlukaan pada lambung ini bisa mengakibatkan perdarahan\r\npada saluran cerna. Tanda-tandanya berupa buang air besar kehitaman dan muntah\r\ndarah kehitaman.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Pada sebagian besar kasus, perdarahan yang\r\nnyata tidak terlihat. Namun, perdarahan secara mikroskopis dapat terjadi. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Dalam jangka panjang, hal ini dapat\r\nmenyebabkan penurunan sel darah merah atau akrab dikenal dengan anemia. <a href=\"https://www.klikdokter.com/penyakit/anemia\"><span style=\"color:#017EBA\">Anemia</span></a> yang\r\nbiasanya terjadi adalah anemia defisiensi besi. Penderitanya akan mengeluh\r\nmudah lemas.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">5. Keganasan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Jika kamu sering mengalami perut terasa\r\npenuh, <a href=\"https://www.klikdokter.com/penyakit/nyeri-ulu-hati\"><span style=\"color:#017EBA\">nyeri ulu hati</span></a>, <a href=\"https://www.klikdokter.com/penyakit/mual\"><span style=\"color:#017EBA\">mual</span></a>,\r\ndan penurunan berat badan, bisa jadi ini bukan bagian dari gangguan asam\r\nlambung biasa.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Berbagai keluhan tersebut dapat menjadi bagian\r\ndari keganasan yang terjadi di daerah lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Seseorang dengan keganasan lambung dapat\r\nmengalami nyeri ulu hati, mual, dan perut terasa begah. Selain itu, penurunan\r\nberat badan bisa terjadi. Salah satu faktor risiko munculnya keganasan lambung\r\nadalah adanya ulkus lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:18.0pt;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\">Cara Mengatasi Badan\r\nLemas Karena Asam Lambung</span></b><span style=\"font-size:18.0pt;font-family:\r\n\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";color:#4A4A4A\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Untuk mengatasi badan lemas karena kambuhnya\r\nasam lambung, diperlukan penanganan yang komprehensif. Selain pemberian obat\r\npenurun asam lambung, modifikasi gaya hidup juga diperlukan. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Berikut ini adalah cara menghilangkan rasa\r\nlemas dan gejala lainnya karena asam lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Hindari Makan secara Berlebihan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Jika kamu punya asam lambung, aturlah porsi\r\nmakanmu dengan baik. Hindari makan secara berlebihan dengan porsi yang besar.\r\nLebih baik, makanlah dengan porsi kecil namun dengan frekuensi yang lebih\r\nsering.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Tindakan ini\r\ndilakukan untuk mengurangi volume berlebih pada lambung, yang <a href=\"https://www.klikdokter.com/penyakit/penyakit-asam-lambung\"><span style=\"color:#017EBA\">menyebabkan naiknya asam lambung</span></a> ke esofagus\r\ndan memicu sensasi nyeri ulu hati.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Kurangi Makanan Berlemak dan Cokelat</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Ada beberapa makanan yang sebaiknya kamu\r\nhindari untuk <a href=\"https://www.klikdokter.com/penyakit/badan-lemas\"><span style=\"color:#017EBA\">mencegah badan lemas</span></a> akibat asam lambung.\r\nContohnya makanan berlemak, alkohol, dan cokelat.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Berbagai makanan tersebut dapat menyebabkan\r\nrelaksasi dari katup esofagus dan lambung. Hal ini akan mempermudah naiknya\r\nasam lambung dan menyebabkan nyeri ulu hati.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Jangan Konsumsi Obat Sembarangan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Terdapat jenis obat tertentu yang dapat\r\nmengakibatkan peningkatan asam lambung.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Salah satu yang patut kamu waspadai adalah\r\nobat penghilang nyeri seperti obat antiinflamasi nonsteroid (OAINS).\r\nPenggunaan obat jenis ini dapat memicu perlukaan lambung lebih lanjut.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Hindari Langsung Rebahan Setelah Makan</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Posisi paling nyaman bagi tubuh untuk\r\nmelakukan proses pencernaan adalah sikap tegak. Maka itu, jika kamu langsung\r\nrebahan setelah makan, proses pencernaan bisa saja terganggu.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Tidak cuma itu, langsung rebahan atau tiduran\r\nsetelah makan juga bisa meningkatkan asam lambung. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size: 14pt; font-family: Roboto;\">- Berhenti Merokok</span></b><span style=\"font-size: 14pt; font-family: Roboto;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 11.25pt 0in; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#4A4A4A\">Jika ingin kondisi badan lemas karena asam\r\nlambung terobati, jauhilah rokok. Selain buruk untuk paru-paru, rokok juga\r\ntidak baik bagi kesehatan lambung.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p> </o:p></p>', 'asamlambung.jpg', 'admin'),
(3, 'Ini Buah dan Sayur yang Bisa Digunakan untuk Masker Mata Alami!', '2022-06-23', 'masker wajah, kecantikan, perawatan wajah', '<p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Ketika melakukan perawatan wajah, kita sering meletakkan irisan\r\nmentimun di kedua mata yang terpejam. Tujuannya, biar terasa efek dingin\r\nmenyegarkan.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Namun, selain mentimun, masih ada lagi beberapa sayuran dan buah\r\nyang bisa dijadikan bahan&nbsp;<strong>masker mata alami.</strong><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Kulit di sekitar mata merupakan salah satu bagian tubuh yang\r\ndapat menunjukkan tanda-tanda penuaan dini. Pasalnya, kulit di area ini lebih\r\ntipis dan lebih halus ketimbang kulit di bagian tubuh yang lain.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Mata juga organ yang digunakan terus-menerus sepanjang hari.\r\nDari berkedip sampai mengekspresikan emosi. Tentu ini dapat menyebabkan penuaan\r\ndini. Belum lagi paparan sinar UV, stres, faktor genetik, serta gaya hidup yang\r\njuga bisa memengaruhi.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Nah, apa saja buah dan sayur yang dapat dijadikan bahan masker\r\nmata alami? Berikut di antaranya.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 30pt 0in 22.5pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#393939\">1. Stroberi<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Jika mata terasa lelah dan lingkaran di bawahnya semakin\r\nmenggelap, kamu bisa menggunakan stroberi untuk mengatasinya.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Stroberi mengandung antioksidan dan vitamin C tinggi, jadi\r\ntidaklah heran bila buah ini bagus untuk mata lelah.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:#4A4A4A\">Cara mengaplikasikan masker mata dari stroberi adalah lumatkan\r\ndulu stroberinya.&nbsp;Lalu, oleskan di bawah mata dan diamkan selama 30 menit.\r\nSetelah itu, bilas sampai bersih. Lakukan ini secara teratur untuk hasil\r\nmaksimal.&nbsp;<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">2. Kentang&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Kentang\r\njuga bisa menjadi bahan untuk masker mata alami. Karena, seperti stroberi,\r\nkentang dapat mengurangi lingkaran hitam di bawah mata.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Irisan\r\nkentang yang sudah dicuci bersih bisa kamu letakkan di mata tertutup. Atau,\r\nbisa juga kamu lumatkan dulu lalu oleskan ke area bawah mata. Diamkan selama 30\r\nmenit, kemudian bilas.<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">3. Semangka&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Buah yang\r\nsatu ini terkenal karena kandungan airnya yang melimpah, warnanya yang menarik,\r\nserta rasanya yang manis. Bonusnya lagi, kamu bisa menjadikan semangka sebagai\r\nmasker mata alami.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Semangka\r\nmengandung banyak air. Ini membuat mata jadi lebih relaks karena sensasi dingin\r\nyang diberikan. Selain itu, vitamin A dan C dalam semangka bisa membantu\r\nmeredakan&nbsp;<a href=\"https://www.klikdokter.com/penyakit/mata-kering\"><span style=\"color: rgb(1, 126, 186);\">mata kering</span></a>&nbsp;dan bengkak.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Kamu bisa\r\nmemotong agak tipis buah tersebut. Lalu, letakkan di mata yang terpejam dan\r\ntunggu hingga 30 menit<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">4. Pepaya&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Pepaya kerap dipakai dalam sabun\r\natau losion pencerah kulit karena kandungan vitamin C-nya yang tinggi.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Buah ini\r\njuga bisa dijadikan masker mata alami buatan sendiri, karena enzimnya bertindak\r\nsebagai&nbsp;<em>exfoliant</em>&nbsp;yang\r\nlembut.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Irislah\r\npepaya agak tipis, lalu letakkan di mata yang terpejam. Diamkan selama 15\r\nmenit, lalu bilas. Lakukan secara teratur untuk mendapatkan mata yang lebih\r\ncerah.&nbsp; <o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">5. Alpukat&nbsp;<o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Lebih\r\nsuka masker yang teksturnya lebih&nbsp;<em>creamy</em>? Kamu bisa\r\nmenggunakan alpukat sebagai bahan maskermu.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Lumatkan\r\nalpukat, lalu oleskan ke area sekitar mata untuk memberi kelembapan dan hidrasi\r\nekstra. Diamkan selama 15 menit, lalu bilas.<o:p></o:p></span></p><h2 style=\"margin: 30pt 0in 22.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">6. Pisang&nbsp;</span><span style=\"font-size:\r\n10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">&nbsp;</span><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\"><o:p></o:p></span></h2><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Apakah kamu pernah membuat masker\r\ndari buah pisang? Jika belum, yuk dicoba. Pisang juga bisa membantu\r\nmeningkatkan area sekitar matamu,&nbsp;<em>lho!</em><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Haluskan\r\nsetengah pisang, tutup matamu rapat-rapat, lalu oleskan pisang tumbuk ke\r\nkelopak mata. Biarkan selama 15 menit, lalu bilas.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">7. Lettuce Iceberg</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\"><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Siapa sangka, sayuran yang kerap\r\nditemukan dalam salad ini bisa membantu kemerahan dan peradangan di area mata?\r\nYa,&nbsp;<em>lettuce\r\niceberg&nbsp;</em>bisa kamu jadikan bahan masker mata alami.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Ambil\r\nbeberapa iris&nbsp;<em>lettuce</em>&nbsp;<em>iceberg</em>&nbsp;untuk\r\ndiletakkan di mata yang tertutup. Biarkan selama 30 menit.<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 16pt; font-family: Arial, sans-serif; color: rgb(57, 57, 57);\">8. Jambu Biji</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\"><o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Buah berikutnya untuk masker mata\r\nadalah jambu biji. Jambu biji mengandung vitamin C dan merupakan sumber\r\nantioksidan yang baik.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Masker\r\nmata dari jambu biji dapat membantu mencegah dan mengurangi tanda awal\r\npenuaan.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Itu dia\r\ndelapan bahan untuk masker mata alami selain mentimun. Yang perlu kamu catat,\r\nkarena ini dari bahan alami, hasilnya tak bisa instan.&nbsp;<o:p></o:p></span></p><p style=\"margin: 11.25pt 0in; line-height: 17.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#4A4A4A\">Untuk\r\nmendapatkan hasil yang maksimal, lakukan secara rutin dan sabar. Jangan lupa\r\nuntuk mencuci bersih dulu buah dan sayur yang digunakan.&nbsp;<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', 'buah_dan_sayur.jpg', 'admin');

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
(2, 'Staff IT Programmer', 1, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background: rgb(251, 251, 251); list-style: none; color: rgb(122, 122, 122); font-family: Roboto;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Pendidikan S1 Teknik Informatika / Sistem Informasi</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Diutamakan Berpengalaman dibidang sama</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Familiar dengan :</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   1. Bahasa Pemrograman (HTML, PHP, CSS, JavaScript)</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   2. Framework (CodeIgniter dan ExtJS)</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   3. Database (PostgreSQL, MySQL)</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">   4. Pengerjaan aplikasi menggunakan Gitlab Repository / StandAlone</li></ul>', '2022-06-30', 1),
(3, 'Sekretariat & Hukum', 1, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background: rgb(251, 251, 251); list-style: none; color: rgb(122, 122, 122); font-family: Roboto;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Pendidikan S1 Hukum</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Berpengalaman membuat Legal Opinion</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">– Menguasai Hukum Kesehatan</li></ul>', '2022-06-30', 0);

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
  `dosis` varchar(200) DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `kd_pendaftaran` varchar(100) DEFAULT NULL,
  `nik` int(20) DEFAULT NULL,
  `id_poli` int(11) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `no_antrian` varchar(10) DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengobatan`
--

CREATE TABLE `pengobatan` (
  `id` int(11) NOT NULL,
  `kode_pendaftaran` varchar(100) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `gejala` text DEFAULT NULL,
  `diagnosa` varchar(200) DEFAULT NULL,
  `biaya` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `poli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `kode_pendaftaran` varchar(50) DEFAULT NULL,
  `resep` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nik` int(20) NOT NULL,
  `no_rekmed` int(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `images_ktp` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `karir`
--
ALTER TABLE `karir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
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
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nik`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karir`
--
ALTER TABLE `karir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengobatan`
--
ALTER TABLE `pengobatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
