@extends('layouts.admin.master')

@section('productsActive')
    text-primary
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
    </nav>

    {{-- Judul dan Tombol --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Detail Produk: {{ $product->title }}</h4>
        <div>
            <a href="{{ route('admin.product.edit', $product->slug) }}" class="btn btn-success btn-sm me-2">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>
    </div>

    {{-- Kartu Detail Produk --}}
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                {{-- Gambar Produk --}}
                <div class="col-md-4 text-center">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid img-thumbnail" alt="{{ $product->title }}">
                    @else
                        <div class="text-muted">Tidak ada gambar</div>
                    @endif
                </div>

                {{-- Detail Tabel --}}
                <div class="col-md-8">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th width="35%">Judul Produk</th>
                            <td>{{ $product->title }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $product->type->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>SKU</th>
                            <td>{{ $product->sku ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Harga Awal</th>
                            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td>{{ $product->discount ?? 0 }}%</td>
                        </tr>
                        <tr>
                            <th>Harga Setelah Diskon</th>
                            <td>
                                @php
                                    $diskon = $product->discount ?? 0;
                                    $hargaAkhir = $product->price - ($product->price * $diskon / 100);
                                @endphp
                                Rp{{ number_format($hargaAkhir, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>{{ $product->stock }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($product->status)
                                    <span class="badge bg-primary">Published</span>
                                @else
                                    <span class="badge bg-danger">Draft</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Diperbarui Pada</th>
                            <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mt-4">
                <h5>Deskripsi Produk</h5>
                <div class="border rounded p-3 small bg-light">
                    {!! $product->description ?? '<em>Tidak ada deskripsi</em>' !!}
                </div>
            </div>
        </div>
    </div>
@endsection
