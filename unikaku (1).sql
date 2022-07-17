-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2022 pada 12.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unikaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `mulai` timestamp NULL DEFAULT NULL,
  `selesai` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kegiatan`, `mulai`, `selesai`) VALUES
(7, 'admin liburan ke singapore', '2022-06-25 08:12:00', '2022-06-26 08:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'MEDAN', '10000'),
(2, 'DILUAR MEDAN', '30000'),
(3, 'DEKAT UNIKA', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(9, 48, 'Yosalvin oi oi', 'MANDIRI', 90000, '2022-06-20', '20220620094113Bukti-Transfer-BCA.jpg'),
(11, 47, 'windi waruwu', 'BRI', 40000, '2022-06-21', '20220621081507Bukti-Transfer-BCA.jpg'),
(12, 49, 'yosalvin', 'BRI', 109000, '2022-06-22', '202206221056128ce228c3-de0a-48fb-895a-d618c149d72b.jpg'),
(13, 52, 'windi waruwu', 'BRI', 5550000, '2022-06-25', '20220625100610Bukti-Transfer-BCA.jpg'),
(14, 54, 'windi waruwu', 'BRI', 5520000, '2022-06-25', '20220625100756Bukti-Transfer-BCA.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status_pembelian` varchar(80) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `nama_kota`, `tarif`, `status_pembelian`, `resi_pengiriman`) VALUES
(43, '4', 1, '2022-06-16', 70000, 'jalan ass', 'MEDAN/kg', 10000, 'pending', ''),
(44, '2', 2, '2022-06-17', 230000, 'jalan flamboyan no 3 gg seroja medan sumatera utara', 'DILUAR MEDAN/kg', 30000, 'pending', ''),
(46, '2', 2, '2022-06-17', 244000, 'jalan flamboyan raya,Gg,cempoka No.12b, Sempakata,Medan-Selayang,Sumater Utara', 'DILUAR MEDAN/kg', 30000, 'pending', ''),
(47, '2', 2, '2022-06-20', 40000, 'jalan samarinda no 23 medan denai', 'DILUAR MEDAN/kg', 30000, 'sudah kirim pembayaran', ''),
(49, '5', 1, '2022-06-21', 109999, 'jalan bunga kembang sepatu no 45 b medan', 'MEDAN/kg', 10000, 'sudah kirim pembayaran', ''),
(51, '2', 1, '2022-06-25', 5599999, 'jalan jalan', 'MEDAN', 10000, 'pending', ''),
(53, '6', 2, '2022-06-25', 129999, 'jalan cempoka', 'DILUAR MEDAN', 30000, 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 19, 1, 2, '', 0, 0),
(7, 22, 5, 2, '', 0, 0),
(8, 23, 9, 1, '', 0, 0),
(9, 23, 8, 1, '', 0, 0),
(10, 24, 3, 2, '', 0, 0),
(11, 25, 6, 1, '', 0, 0),
(12, 26, 8, 2, '', 0, 0),
(13, 27, 4, 1, '', 0, 0),
(14, 32, 3, 1, '', 0, 0),
(15, 33, 5, 1, '', 0, 0),
(16, 33, 6, 1, '', 0, 0),
(17, 34, 1, 2, '', 0, 0),
(18, 35, 2, 1, '', 0, 0),
(19, 36, 7, 1, '', 0, 0),
(20, 36, 2, 1, '', 0, 0),
(21, 37, 8, 1, '', 0, 0),
(22, 37, 9, 1, '', 0, 0),
(23, 38, 4, 1, '', 0, 0),
(24, 39, 4, 2, '', 0, 0),
(25, 40, 4, 1, '', 0, 0),
(26, 41, 5, 1, '', 0, 0),
(27, 42, 6, 1, '', 0, 0),
(28, 43, 3, 2, '', 0, 0),
(29, 43, 2, 1, '', 0, 0),
(30, 44, 9, 1, '', 0, 0),
(31, 44, 8, 1, '', 0, 0),
(32, 46, 7, 1, '', 0, 0),
(33, 46, 2, 1, '', 0, 0),
(34, 46, 1, 1, '', 0, 0),
(35, 46, 3, 1, '', 0, 0),
(36, 47, 3, 1, '', 0, 0),
(37, 48, 2, 2, '', 0, 0),
(38, 49, 4, 1, '', 0, 0),
(39, 49, 3, 1, '', 0, 0),
(40, 50, 6, 1, '', 0, 0),
(41, 51, 5, 1, '', 0, 0),
(42, 51, 4, 1, '', 0, 0),
(43, 52, 1, 1, '', 0, 0),
(44, 52, 5, 1, '', 0, 0),
(45, 53, 4, 1, '', 0, 0),
(46, 53, 3, 1, '', 0, 0),
(47, 54, 5, 1, '', 0, 0),
(48, 54, 3, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `pesan`) VALUES
(2, 'stephen', 'algroigwithnme@gmail.com                                      ', 'barang saya belum nyampe gimana  itu'),
(4, 'lukmi', 'adas@gmail.com', 'saya belum dapat email Dengan menggunakan script sederhana pada contoh project di atas kita telah berhasil menampilkan data dari database menggunakan bahasa pemrograman php. Selain cara sederhana di atas masih ada beberapa cara yang dapat digunakan untuk '),
(5, 'windi waruwui', 'windi@gmail.com', 'barang tidak lengkap disini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `namaproduk` varchar(25) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` varchar(16) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `namaproduk`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 'Kaos Hitam/t-shirt', 'FIT TO L LD (lingkar dada): 96-100 cm P (panjang): 70 cm Bahan: Cotton combed 30 dan sangat nyaman dipakai oleh siapapun yang ingin memakainya karena saya tau didalambaju ini tersimpan 9 biju yang dapat mengendalikan 9 elemen sekaligus', '40000', '64224254_aaeed3db-8814-4408-808b-a282ac0319f3_596_740.jpg'),
(2, 'gula pasir', 'gula pasir murah', '40000', '2f4f1e17-8305-4d48-8d61-08c74d2f6cd2.jpg'),
(3, 'tisu paseo ', 'lembut dan menyerap air', '10000', 'b0b460ed-583c-4c61-a52d-38067f9e449c.jpg'),
(4, 'John&amp;Jill Sandal Slid', 'Color : Black Strap Upper : Single-Bandage Neo Leather Midsole : Contoured Eva F', '89999', '9de5c70c-e9f5-4565-911f-bd2823c46638.jpg'),
(5, 'LAPTOP HP 250 G8 ', 'LAPTOP HP 250 G8 - i3 1115G4 RAM 8GB 512SSD W10 15.4 SLIM BEZEL NUMPAD - Non Bun', '5500000', '816eec9f-8c4c-447d-8840-0df17ee62f34.png'),
(6, 'Sling Bag Walker 2.0 - Vi', 'Tersedia dalam 7 pilihan warna, WALKER Sling Bag 2.0 ini punya adjustable strap ', '79000', '1bfb837e-141f-4843-839e-eedc17b714d0.png'),
(7, 'Earphone Wire Control', 'CIJI S21 Earphone Wire Control Powerful Bass Stereo Sound - Kuning', '124000', '414b77b3-bd82-489e-b1ea-583a41cd3957.jpg'),
(8, '10000mAh Powerbank', 'Robot RT180 10000mAh Powerbank Dual Input Port Micro USB &amp; Type C - Hijau', '115000', '5326660d-9c4d-48f3-8237-18a9806d6609.jpg'),
(9, 'Jacket Smith ', 'Triple F Harrington Jacket Smith - army, L', '85000', '9ded748b-8513-40d7-89af-ab56c36d99c9.jpg'),
(10, 'Sofa Bed Vecla R 2 Duduka', 'Idemu Sofa Bed Vecla R 2 Dudukan Furnitur Minimalis 2 Seater  Sofa Bed Vecla R 2 Dudukan Idemu hadir untuk membuat berbagai ruang yang ada di rumah anda menjadi lebih indah. Sofa Bed Vecla R Idemu memiliki desain yang minimalis sehingga membuat ruangan di', '4674400', '8ce228c3-de0a-48fb-895a-d618c149d72b.jpg'),
(11, ' Lemari Anak Baby Loker L', 'Lemari dua pintu yang dilengkapi kaca dengan bentuk yang minimalis, terbuat dari kayu olahan yang dilaminas.  SPESIFIKASI: Ukuran: P 80 cm x L 40 cm x T 120 cm', '546870', '7e7fc5ae-6dde-4c51-8122-4887b3b5c2e2.png'),
(12, 'Kipas angin Bekas', 'Masih layak pake no minus', '45000', 'c92250d47752d6184be94a251bbed471.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `nohp`, `password`, `level`) VALUES
(1, 'adminganteng', 'admin@unikastore.com', '', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'windiii', 'windiii@gmail.com', '081234567890', '202cb962ac59075b964b07152d234b70', ''),
(3, 'albert', 'albert@gmail.com', '081234567890', '202cb962ac59075b964b07152d234b70', ''),
(4, 'andi gulo ', 'andibukanmain@gmail.com', '095373265044', '202cb962ac59075b964b07152d234b70', ''),
(5, 'Yosalvin', 'yosalvin@gmail.com', '081234654323', '202cb962ac59075b964b07152d234b70', ''),
(6, 'windi kartika w', 'windi@gmail.com', '081234556789', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
