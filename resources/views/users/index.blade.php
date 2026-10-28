<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - GlowMart</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #F7F8F1, #F5F5E9, #EDF1E3);
            color: #354335;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 28px 20px;
            background: linear-gradient(180deg, #F5F5E9, #E8EDD9, #CBD5B2);
            border-right: 1px solid #E0E7D4;
            display: flex;
            flex-direction: column;
        }

        .brand {
            font-size: 27px;
            font-weight: bold;
            color: #435641;
            margin-bottom: 8px;
        }

        .brand span {
            color: #61745B;
        }

        .subtitle {
            font-size: 12px;
            color: #61745B;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            color: #61745B;
            margin: 22px 0 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #435641;
            padding: 13px 14px;
            border-radius: 9px;
            margin-bottom: 7px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(135deg, #82966A, #61745B, #435641);
            color: white;
        }

        .main {
            margin-left: 230px;
            padding: 30px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .topbar h1 {
            color: #435641;
            font-size: 27px;
            margin-bottom: 7px;
        }

        .topbar p {
            color: #61745B;
            font-size: 14px;
        }

        .user-info {
            background: white;
            padding: 13px 18px;
            border: 1px solid #E0E7D4;
            border-left: 4px solid #82966A;
            border-radius: 10px;
            font-size: 13px;
        }

        .panel {
            background: white;
            padding: 25px;
            border: 1px solid #E0E7D4;
            border-radius: 15px;
            box-shadow: 0 5px 18px #4356410A;
            margin-bottom: 25px;
        }

        .panel h2 {
            color: #435641;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #E8F3E3;
            color: #315B36;
            border: 1px solid #C9DFC1;
        }

        .error {
            background: #FCE8E6;
            color: #A12622;
            border: 1px solid #F3C6C2;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: bold;
            color: #435641;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #D5DDCA;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
            color: #354335;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #82966A;
            box-shadow: 0 0 0 3px #82966A20;
        }

        .form-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #61745B;
            color: white;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background: #435641;
        }

        .btn-secondary {
            background: #82966A;
        }

        .btn-secondary:hover {
            background: #61745B;
        }

        .btn-danger {
            background: #A34D4D;
        }

        .btn-danger:hover {
            background: #853838;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #E8EDD9;
            font-size: 13px;
        }

        th {
            background: #F5F5E9;
            color: #435641;
            font-weight: bold;
        }

        td {
            color: #493F43;
        }

        tbody tr:hover {
            background: #FAFBF6;
        }

        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .role-admin {
            background: #DDE7D2;
            color: #435641;
        }

        .role-staff {
            background: #F1E9D5;
            color: #78653D;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 8px 10px;
            font-size: 12px;
        }

        .inline-form {
            display: inline;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #82966A;
        }

        .footer {
            text-align: center;
            color: #82966A;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 190px;
                padding: 22px 13px;
            }

            .main {
                margin-left: 190px;
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 16px;
            }

            .panel {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">Glow<span>Mart</span></div>
    <div class="subtitle">Sistem Manajemen Toko</div>

    <div class="menu-title">Menu Admin</div>

    <nav class="menu">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('kategori.index') }}">Kategori</a>
        <a href="{{ route('produk.index') }}">Produk</a>
        <a href="{{ route('supplier.index') }}">Supplier</a>
        <a href="{{ route('transaksi-penjualan.index') }}">Transaksi Penjualan</a>
        <a href="{{ route('pembelian.index') }}">Barang Masuk</a>
        <a href="{{ route('barang-keluar.index') }}">Barang Keluar</a>
        <a href="{{ route('laporan.index') }}">Laporan</a>
        <a href="{{ route('users.index') }}" class="active">Manajemen User</a>
    </nav>

    <div style="margin-top:auto;padding-top:20px;border-top:1px solid #CBD5B2;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn" style="width:100%;">Logout</button>
        </form>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h1>Manajemen User</h1>
            <p>Kelola akun Admin dan Staff GlowMart.</p>
        </div>

        <div class="user-info">
            {{ auth()->user()->name }} (Admin)
        </div>
    </header>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin:8px 0 0 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="panel">
        <h2>Tambah Akun Pengguna</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        minlength="8"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="role">Role Pengguna</label>
                    <select id="role" name="role" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ old('role') === 'staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Tambah Pengguna</button>
            </div>
        </form>
    </section>

    <section class="panel">
        <h2>Daftar Pengguna</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="role {{ $user->role === 'admin' ? 'role-admin' : 'role-staff' }}">
                                    {{ $user->role ?? 'Belum diatur' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at?->format('d-m-Y') ?? '-' }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        onclick="toggleEdit({{ $user->id }})"
                                    >Edit</button>

                                    @if($user->id !== auth()->id())
                                        <form
                                            action="{{ route('users.destroy', $user) }}"
                                            method="POST"
                                            class="inline-form"
                                            onsubmit="return confirm('Yakin ingin menghapus akun {{ addslashes($user->name) }}?')"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    @else
                                        <span style="font-size:11px;color:#82966A;">Akun aktif</span>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <tr id="edit-{{ $user->id }}" style="display:none;">
                            <td colspan="6">
                                <form action="{{ route('users.update', $user) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-grid">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" value="{{ $user->name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ $user->email }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password Baru (opsional)</label>
                                            <input
                                                type="password"
                                                name="password"
                                                minlength="8"
                                                placeholder="Kosongkan jika tidak diubah"
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" required>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn">Simpan Perubahan</button>
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            onclick="toggleEdit({{ $user->id }})"
                                        >Batal</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">Belum ada akun pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <footer class="footer">
        &copy; {{ date('Y') }} GlowMart — Manajemen User
    </footer>

</main>

<script>
    function toggleEdit(id) {
        const row = document.getElementById('edit-' + id);

        if (row) {
            row.style.display = row.style.display === 'none' ? 'table-row' : 'none';
        }
    }
</script>

</body>
</html>
