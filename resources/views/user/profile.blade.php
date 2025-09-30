@extends('layouts.frontend.master')

@section('title', 'Profil Saya')

@section('content')
    <div class="container py-5">
        {{-- Alert Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-lg mx-auto" style="max-width: 800px; border-radius: 20px;">
            <div class="card-body text-center">

                {{-- Avatar --}}
                <div class="mb-4">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Avatar" class="rounded-circle shadow"
                            style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #0d6efd;">
                    @else
                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold mx-auto"
                            style="width: 150px; height: 150px; font-size: 3rem; border: 4px solid #0d6efd;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif

                    <div class="mt-3">
                        <input type="file" id="fileInput" name="image" accept="image/*" class="d-none"
                            form="profileForm" />
                        <button type="button" onclick="document.getElementById('fileInput').click()"
                            class="btn btn-outline-primary btn-sm rounded-pill px-4">
                            <i class="fas fa-camera"></i> Ganti Foto
                        </button>
                    </div>
                </div>

                {{-- FORM PROFIL --}}
                <form id="profileForm" action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data"
                    class="text-start">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control rounded-pill" id="name" name="name"
                                value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control rounded-pill" id="email" name="email"
                                value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-bold">Nomor Telepon</label>
                            <input type="text" class="form-control rounded-pill" id="phone" name="phone"
                                value="{{ old('phone', $user->phone) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="gender" class="form-label fw-bold">Jenis Kelamin</label>
                            <select id="gender" name="gender" class="form-control rounded-pill">
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('gender', $user->gender) == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P" {{ old('gender', $user->gender) == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="instagram" class="form-label fw-bold">Instagram</label>
                            <input type="text" class="form-control rounded-pill" id="instagram" name="instagram"
                                value="{{ old('instagram', $user->instagram) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="role" class="form-label fw-bold">Role</label>
                            <input type="text" class="form-control rounded-pill" id="role" name="role"
                                value="{{ old('role', $user->role) }}" readonly>
                        </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label fw-bold">Alamat</label>
                            <input type="text" class="form-control rounded-pill" id="address" name="address"
                                value="{{ old('address', $user->address) }}">
                        </div>

                        <div class="col-md-4">
                            <label for="province" class="form-label fw-bold">Provinsi</label>
                            <select id="province" name="province" class="form-control rounded-pill">
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="city" class="form-label fw-bold">Kota/Kabupaten</label>
                            <select id="city" name="city" class="form-control rounded-pill" disabled>
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="postal_code" class="form-label fw-bold">Kode Pos</label>
                            <input type="text" class="form-control rounded-pill" id="postal_code" name="postal_code"
                                value="{{ old('postal_code', $user->postal_code) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label fw-bold">Password Baru (opsional)</label>
                            <input type="password" class="form-control rounded-pill" id="password" name="password"
                                placeholder="Biarkan kosong jika tidak ingin ubah">
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control rounded-pill" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill fw-bold">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>

                        <!-- Tombol trigger modal -->
                        <button type="button" class="btn btn-danger rounded-pill fw-bold" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal">
                            <i class="fas fa-trash"></i> Hapus Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Akun -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus Akun</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus akun ini? <br>
                        Tindakan ini <strong>tidak dapat dibatalkan</strong> dan semua data akan hilang.</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('user.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Simpan nilai provinsi dan kota pengguna yang sudah ada
            const userProvinceId =
                "{{ old('province', $user->province) }}"; // Asumsi Anda menyimpan ID provinsi di DB
            const userCityId = "{{ old('city', $user->city) }}"; // Asumsi Anda menyimpan ID kota di DB

            // Fungsi untuk memuat provinsi
            function loadProvinces() {
                $.ajax({
                    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#province').empty().append('<option value="">Pilih Provinsi</option>');
                        $.each(data, function(key, value) {
                            $('#province').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });

                        // Set nilai provinsi jika ada (dari old() atau dari user data)
                        if (userProvinceId) {
                            $('#province').val(userProvinceId);
                            // Trigger change untuk memuat kota jika provinsi sudah terpilih
                            if (userCityId) {
                                loadCities(userProvinceId, userCityId);
                            } else {
                                loadCities(
                                    userProvinceId
                                ); // Load cities without pre-selecting if no userCityId
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching provinces:", status, error);
                        $('#province').empty().append(
                            '<option value="">Gagal memuat provinsi</option>');
                    }
                });
            }

            // Fungsi untuk memuat kota/kabupaten berdasarkan ID provinsi
            function loadCities(provinceId, selectedCityId = null) {
                if (provinceId) {
                    $('#city').prop('disabled', true); // Disable while loading
                    $.ajax({
                        url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + provinceId +
                            '.json',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#city').empty().append('<option value="">Pilih Kota/Kabupaten</option>')
                                .prop('disabled', false);
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                            // Set nilai kota jika ada (dari old() atau dari user data)
                            if (selectedCityId) {
                                $('#city').val(selectedCityId);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching cities:", status, error);
                            $('#city').empty().append('<option value="">Gagal memuat kota</option>')
                                .prop('disabled', true);
                        }
                    });
                } else {
                    $('#city').empty().append('<option value="">Pilih Kota/Kabupaten</option>').prop('disabled',
                        true);
                }
            }

            // Panggil fungsi loadProvinces saat dokumen siap
            loadProvinces();

            // Event listener saat provinsi dipilih
            $('#province').on('change', function() {
                var provinceId = $(this).val();
                loadCities(provinceId); // Tanpa selectedCityId, karena ini perubahan manual
            });
        });
    </script>
@endpush
