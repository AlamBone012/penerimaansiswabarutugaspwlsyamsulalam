CREATE DATABASE IF NOT EXISTS db_penerimaan_siswa;
USE db_penerimaan_siswa;

CREATE TABLE calon_siswa (
    id_siswa INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nisn VARCHAR(20),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    alamat TEXT,
    no_hp VARCHAR(15)
);

CREATE TABLE pendaftaran (
    id_pendaftaran INT AUTO_INCREMENT PRIMARY KEY,
    id_siswa INT,
    tanggal_pendaftaran DATE,
    jalur_pendaftaran ENUM('Reguler', 'Prestasi', 'Afirmasi'),
    FOREIGN KEY (id_siswa) REFERENCES calon_siswa(id_siswa)
);

CREATE TABLE hasil_seleksi (
    id_hasil INT AUTO_INCREMENT PRIMARY KEY,
    id_siswa INT,
    nilai_tes INT,
    status ENUM('Lulus', 'Tidak Lulus'),
    keterangan TEXT,
    FOREIGN KEY (id_siswa) REFERENCES calon_siswa(id_siswa)
);
