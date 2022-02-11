## REVISI

- File index.php ke folder public :heavy_check_mark:
- Konfigurasi host, username, password, database_name  dalam Database.php masukkan/simpan dalam folder config dalam file config.php :heavy_check_mark:
- Method `insertWithPassword()` dan `insertWithoutPassword()` jadikan satu, dengan memberi pengkondisian :heavy_check_mark:
- Sintaks php di index.php ditempatkan paling atas, atas <!DOCTYPE> :heavy_check_mark:
- Tag HTML jangan dicampur dengan php :heavy_check_mark:
- Jangan foreach keseluruhan tag HTML :heavy_check_mark:
- Buatkan model untuk menghubungkan class dengan pemanggilan oleh sintaks php, file model tempatkan di dalam folder models :heavy_check_mark:
- Penggunaan for di dalam tag html jangan gunakan kurung kurawal, tapi titik dua dan endfor :heavy_check_mark:
- Tidak perlu membuka dan menutup koneksi di dalam file view/HTML :heavy_check_mark:
- Method `selectById()` dimasukkan dalam `selectAll()`, dengan memberikan pengkondisian di dalamnya :heavy_check_mark:
- `if`, `ifelse`, `else` dalam file delete/edit form jangan dicampur tag HTML :heavy_check_mark:
- File edit/delete form dan edit/delete proses dimasukkan dalam folder controllers :heavy_check_mark:
- Jarak operator dengan operand diberikan spasi :heavy_check_mark: