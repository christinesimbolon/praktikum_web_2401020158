USE praktikum_web_2401020158;

-- 1. Insert minimal 2 Program Studi
INSERT INTO program_studi (nama_prodi) VALUES
('Sistem Komputer'),
('Teknologi Informasi');

-- 2. Insert minimal 4 Mahasiswa (termasuk 1 data sementara)
INSERT INTO mahasiswa (nim, nama, email, usia, program_studi_id) VALUES
('2301010001', 'Citra Dewi', 'citra@example.com', 20, 1),
('2301010002', 'Dedi Kurniawan', 'dedi@example.com', 21, 1),
('2301020001', 'Eka Putra', 'eka@example.com', 19, 2),
('2301020099', 'Uji Hapus', 'hapus@example.com', 22, 2);

-- 3. UPDATE 1 data email
UPDATE mahasiswa
SET email = 'citra.dewi@example.com'
WHERE nim = '2301010001';

-- 4. DELETE 1 data sementara
DELETE FROM mahasiswa
WHERE nim = '2301020099';

-- 5. SELECT JOIN (menampilkan 3 data tersisa)
SELECT m.nim, m.nama, m.email, m.usia, p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p ON p.id = m.program_studi_id
ORDER BY m.nim;