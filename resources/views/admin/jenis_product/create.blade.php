@extends('layouts.admin.master')

@section('productsActive')
    text-primary
@endsection

@section('content')
    <h1 class="mb-4" style="font-size:x-large">Tambah Jenis Produk</h1>
    <hr><br>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.jenis_product.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Jenis Produk</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" value="{{ old('name') }}" placeholder="Masukkan nama jenis produk...">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.jenis_product.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection
