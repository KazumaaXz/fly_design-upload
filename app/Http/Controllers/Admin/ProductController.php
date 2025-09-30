<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['user', 'type'])->latest();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Jika pengguna adalah author, hanya tampilkan artikel miliknya
        if ($user && $user->isAuthor()) {
            $query->where('user_id', $user->id);
        }

        // Cek apakah ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchTerm = $request->search;
            // Tambahkan kondisi pencarian berdasarkan 'title' artikel
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%');
            });
        }

        // Cek apakah ada parameter 'status' dalam request
        if ($request->has('status')) {
            // Pastikan status adalah boolean yang valid (0 atau 1)
            $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($status !== null) {
                $query->where('status', $status);
            }
        }

        // Ambil hasil paginasi
        $products = $query->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_desc' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048', // Perhatikan, di sini hanya satu gambar
            'status' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'user_id' => Auth::id(), // ID user yang login
            'type_id' => $request->type_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'meta_desc' => $request->meta_desc,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'sku' => $request->sku,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        return view('admin.product.create', compact('types', 'categories'));
    }

    public function edit(Product $product)
    {
        $types = Type::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'types', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'type_id' => 'required|exists:types,id',
            'title' => 'required|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'nullable|boolean',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id . '|max:255',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // KOREKSI: Menyimpan langsung ke disk 'public' di folder 'products'
            $imagePath = $request->file('image')->store('products', 'public');
        } elseif ($request->input('remove_image')) {
            // Jika user memilih untuk menghapus gambar
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
                $imagePath = null;
            }
        }

        $product->update([
            // 'user_id' => $request->user_id,
            'type_id' => $request->type_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'meta_desc' => $request->meta_desc,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => $request->boolean('status', false),
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'sku' => $request->sku,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus!');
    }
}
