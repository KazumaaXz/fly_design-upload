<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil 7 artikel terbaru, termasuk relasi user dan category
        $articles = Article::with(['user', 'category'])->where('status', true)->latest()->limit(7)->get();
        $categories = Category::all();

        return view('home.main', compact('articles', 'categories'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('home.about.index', compact('categories'));
    }

    // controller untuk article
    public function articles(Request $request)
    {
        $query = Article::where('status', true)->latest();

        // Cek apakah ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            // Tambahkan kondisi pencarian berdasarkan nama atau email
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil hasil paginasi
        $articles = $query->paginate(6);

        $categories = Category::all();

        return view('home.articles.index', compact('articles', 'categories'));
    }

    public function articlesShow($slug)
    {
        $articles = Article::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('home.articles.show', compact('articles', 'categories'));
    }

    public function articlesCategories($categoryId)
    {
        // Mengambil artikel yang memiliki category_id yang sesuai
        $articles = Article::where('category_id', $categoryId)
            ->where('status', true)
            ->latest()
            ->paginate(8);

        $categories = Category::all();

        return view('home.articles.index', compact('articles', 'categories'));
    }

    // controller untuk informasi
    public function information(Request $request)
    {
        $query = Information::where('status', true)->latest();

        // Cek apakah ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            // Tambahkan kondisi pencarian berdasarkan nama atau email
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil hasil paginasi
        $information = $query->paginate(6);

        $categories = Category::all();

        return view('home.information.index', compact('information', 'categories'));
    }

    public function informationShow($slug)
    {
        $information = Information::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('home.information.show', compact('information', 'categories'));
    }

    // controller untuk form kontak

    public function contact()
    {
        return view('home.page.contact');
    }

    public function contactStore(Request $request)
    {
        // Validasi data yang masuk dari form, termasuk reCAPTCHA
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                // Aturan validasi untuk reCAPTCHA,
                'g-recaptcha-response' => 'required',
            ],
            [
                'g-recaptcha-response.required' => 'Silakan verifikasi bahwa Anda bukan robot.',
            ]
        );

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $body = json_decode((string) $response->body());

        if (!isset($body->success) || !$body->success) {
            // Jika verifikasi reCAPTCHA gagal
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.',
            ]);
        }

        try {
            // Simpan data ke database menggunakan model Contact
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Redirect kembali dengan pesan sukses
            Session::flash('success', 'Pesan Anda telah berhasil dikirim!');
            return redirect()->back();
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            Session::flash('error', 'Terjadi kesalahan saat mengirim pesan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // controller untuk team
    public function team(Request $request)
    {
        $team = User::where('role', 'author')->latest()->paginate(9);

        $categories = Category::all();

        return view('home.page.team', compact('team', 'categories'));
    }

    // controller untuk product
    public function products(Request $request)
    {
        $query = product::where('status', true)->latest();

        // Cek apakah ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            // Tambahkan kondisi pencarian berdasarkan nama atau email
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil hasil paginasi
        $products = $query->paginate(8);

        $types = Type::all();
        $sidebar = Information::latest()->limit(5)->get();

        return view('home.products.index', compact('products', 'types', 'sidebar'));
    }

    public function productsShow($slug)
    {
        // Mengambil produk utama berdasarkan slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Mengambil produk terkait berdasarkan type_id yang sama
        // dan mengecualikan produk yang sedang ditampilkan
        $relatedProducts = Product::where('type_id', $product->type_id)
            ->where('id', '!=', $product->id) // Pastikan produk yang sedang dilihat tidak ikut
            ->inRandomOrder() // Ambil secara acak
            ->limit(3) // Batasi hingga 3 produk terkait
            ->get();

        // Mengirimkan semua data ke view
        return view('home.products.show', compact('product', 'relatedProducts'));
    }

    public function productsTypes($typeId)
    {
        // Mengambil artikel yang memiliki type_id yang sesuai
        $products = Product::where('type_id', $typeId)
            ->where('status', true)
            ->latest()
            ->paginate(8);

        $types = Type::all();
        $sidebar = Information::latest()->limit(5)->get();

        return view('home.products.index', compact('products', 'types', 'sidebar'));
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
// Menampilkan halaman profile
    public function profile()
    {
        $user = Auth::user(); // ambil data user login
        return view('user.profile', compact('user'));
    }

    // Update profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi data
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'phone'  => 'nullable|string|max:20',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update field dasar
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Jika ganti password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
