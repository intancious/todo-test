## Tutorial Menjalankan Projek

Spesifikasi :
1.	Laravel 8
2.	PHP 7.4

Tools yang dibutuhkan :
1.	Laragon (phpMyadmin dan webserver)
2.	Text Editor Vscode
3.	Postman
Langkah Menjalankan Aplikasi :
1.	Clone project dari repository
2.	Buke folder project di vscode, duplicate file .env.example. kemudian rename menjadi .env.
Pada file .env lakukan perubahan nama database dengan nama seleksi
3.	Buat Database dengan nama seleksi
4.	Buka terminal dan jalankan php artisan key:generate untuk mengenerate app key baru
5.	Jalankan php artisan migrate (apabila pada database masih kosong) dan php artisan migrate:fresh (apabila database sudah terisi)
6.	Jalankan php artisan serve
7.	Buka browser dan jalankan ip/url yang dihasilkan oleh laravel local development :
http://127.0.0.1:8000
8.	Lakukan register menggunakan email dan password
9.	Buka postman
10.	Jalankan http request sesuai url dan method yang didaftarkan pada routes api.php
a.	 Lakukan Login/Autentifikasi dengan cara login sesuai email dan password yang telah diregister tadi pada postman.

Setelah sukses login maka akan tampil :

Setelah itu salin token tersebut dan masukkan pada Authorization setiap request baru pada HTTP Request :

Pastikan Typenya Bearer Token

 


b.	List Data Produk

Isikan port local development serve yang didapat dari menjalankan php artisan serve/folder_controller/routes
Untuk menampilkan list data produk menggunakan method GET
 

c.	Insert Data Produk

Untuk insert data, diperlukan membuat body dan form data sesuai inputan database. Insert data menggunakan method POST. Jika input data sukses maka akan tampil seperti dibawah ini :

 

d.	Edit Data Produk
Untuk edit data disini diperlukan tambahan pada http url yaitu http://127.0.0.1:8000/api/produk/id_datanya yang akan diedit
Disini edit menggunakan method POST.

Untuk update data, diperlukan membuat body dan form data sesuai inputan database. update data menggunakan method POST. Jika update data sukses maka akan tampil seperti dibawah ini :

Pada CRUD diatas selalu pastikan pada database, cek pada phpMyadmin


pada Id data 3 data sudah terupdate, dan ada penambahan data baru di id data 5.

e.	Delete Data Produk
Untuk delete link http request sama seperti pada edit/update harus memilih id yang akan dihapus, namun method yang digunakan yaitu DELETE. Diatas terlihat sukses delete, setelah dicek pada database di phpMyadmin yaitu :

data dengan id 3 sudah berhasil terhapus.
