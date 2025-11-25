# TP9DPBO2425C1

## JANJI
Saya Shidqi Rasyad Firjatulah dengan NIM 2408156 mengerjakan TP9 pada mata kuliah DPBO untuk keberkahannya saya menyatakan bahwa saya tidak melakukan kecurangan sebagaimana yang dispesifikasikan.


---

## Desain Program
### Model
- DB.php -> mengatur koneksi database.
- Pembalap.php -> representasi objek pembalap / getter & setter
- Sirkuit.php -> representasi objek sirkuit / getter & setter
- TabelPembalap.php -> menjalankan query CRUD tabel pembalap.
- TabelSirkuit.php -> menjalankan query CRUD tabel sirkuit.
### Views 
- ViewPembalap.php -> Menampilkan list & form pembalap.
- ViewSirkuit.php -> Menampilkan list & form sirkuit.
- KontrakView.php dan KkontrakViewSirkuit.php -> Interface yang memastikan view punya method yang wajib
### Presenter 
- PresenterPembalap.php -> menghubungkan pembalap View dan model
- PresenterSirkuit.php -> menghubungkan sirkuit view dan model
- KontrakPresenter.php dan KontrakPresenterSirkuit.php -> inteface methode CRUD.
  


## Alur 
1. User membuka website -> tampilan halaman utama menampilkan list pembalap.
2. User dapat memilih menu:
    - pembalap
    - sirkuit
3. Pada tiap menu, user dapat melakukan CRUD:
   - create (tambah data)
   - read (menampilkan semua data)
   - update (edit data)
   - delete (hapus data)
# Dokumentasi



https://github.com/user-attachments/assets/c6a7ca2c-f7cc-4df5-8927-d16bb4f11143










