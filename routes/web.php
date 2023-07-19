<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentController;
use App\Http\Livewire\Form;
use App\Http\Livewire\Home;
use App\Http\Livewire\Post;
use App\Http\Livewire\User;
use App\Http\Livewire\Action;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Images;
use App\Http\Livewire\Product;
use App\Http\Livewire\Students;
use App\Http\Livewire\Uploads;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Pembahasan component
// Halaman post
Route::get('/post', Post::class);

// Pembahasan component
// Halaman user
Route::get('/user', User::class);

// Pembahasan Route
// Halaman home
Route::get('/home/{name?}', Home::class);

// Pembahasan property model binding pada beberapa input data
// Halaman Form
Route::get('/form', Form::class);

// Pembahasan Action pada form
// Halaman Action
Route::get('/action', Action::class);

// Pembahasan life cycle hook
// Halaman Product
Route::get('/product', Product::class);

// Pembahasan form validation
// Halaman Contact
Route::get('/contact', Contact::class);

// Pembahasan database
// Halaman Users
Route::get('/users', User::class);

// Pembahasan Pagination
// Halaman Users
Route::get('/all-users', Users::class);

// Pembahasan CRUD Livewire
// Halaman Student
Route::get('/students', Students::class);

// Pembahasan File Uploads
// Halaman Uploads
Route::get('/uploads', Uploads::class);

// Pembahasan Multiple File Image Uploads
// Halaman Images
Route::get('/upload-images', Images::class);

// Export data excel dan csv
Route::get('/export-excel',[User::class,'exportIntoExcel']);

Route::get('/export-csv',[User::class,'exportIntoCSV']);

// Export data pdf
Route::get('/get-all-user',[User::class,'getAllUser']);

Route::get('/download-pdf',[User::class,'downloadPDF']);

// Import data CSV atau Excel
Route::get('/import-form',[User::class,'importForm']);

Route::post('/import',[User::class,'import'])->name('user.import');

// Cetak satu data user ke dalam pdf
Route::get('/print_pdf/{id}',[User::class,'print_pdf']);

// Tampilan data ke dalam highcharts
Route::get('/chart',[ChartController::class,'index']);

// Tampilan data ke dalam bar charts
Route::get('/bar-chart',[ChartController::class,'barChart']);

// Mengirim pesan ke email
Route::get('/send-email',[MailController::class, 'sendEmail']);

// Dropdown daerah jquery ajax
Route::get('/form', [DaerahController::class, 'index']);

Route::post('/getkabupaten', [DaerahController::class, 'getkabupaten'])->name('getkabupaten');

Route::post('/getkecamatan', [DaerahController::class, 'getkecamatan'])->name('getkecamatan');

Route::post('/getdesa', [DaerahController::class, 'getdesa'])->name('getdesa');

// CRUD AJAX

// Proses menampilkan semua data
Route::get('/studentss',[StudentController::class,'index']);

// Proses tambah data
Route::post('/add-student',[StudentController::class,'addStudent'])->name('student.add');

// Proses mengambil data untuk diubah
Route::get('/studentss/{id}',[StudentController::class,'getStudentById']);

// Proses menyimpan data yang sudah diubah
Route::put('/studentss',[StudentController::class,'updateStudent'])->name('student.update');

// Proses menghapus data
Route::delete('/studentss/{id}',[StudentController::class,'deleteStudent']);

// Proses menghapus data yang dipilih
Route::delete('/selected-students',[StudentController::class,'deleteCheckedStudents'])->name('student.deleteSelected');

// Library Yajra Datatables
Route::get('/employee',[EmployeeController::class,'index']);

// Consume API (HTTP Client)

// Menampilkan semua data lewat API Website lain di dalam tabel
Route::get('/asuransis', [ClientController::class, 'getAllAsuransi'])->name('asuransis.getallasuransi');

// Menampilkan semua data Post
Route::get('/posts', [ClientController::class, 'getAllPost'])->name('posts.getallpost');

// Menampilkan satu data post berdasarkan id
Route::get('/posts/{id}', [ClientController::class, 'getPostById'])->name('posts.getpostbyid');

// Menambah data Post
Route::get('/add-post',[ClientController::class, 'addPost'])->name('posts.addpost');

// Mengubah data post berdasarkan id
Route::get('/update-post',[ClientController::class, 'updatePost'])->name('posts.update');

// Menghapus data post berdasarkan id
Route::get('/delete-post/{id}',[ClientController::class, 'deletePost'])->name('posts.delete');