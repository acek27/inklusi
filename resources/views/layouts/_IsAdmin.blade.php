<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="category.html">Beranda</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#">Berita</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Lihat Berita</a></li>
            <li><a class="dropdown-item" href="{{route('berita.index')}}">Kelola Berita</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#">Kegiatan</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="category.html">Lihat Kegiatan</a></li>
            <li><a class="dropdown-item" href="{{route('kegiatan.index')}}">Kelola Kegiatan</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#">Regulasi</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Lihat Regulasi</a></li>
            <li><a class="dropdown-item" href="{{route('regulasi.index')}}">Kelola Regulasi</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#">Galeri</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="category.html">Lihat Galeri</a></li>
            <li><a class="dropdown-item" href="{{route('galeri.index')}}">Kelola Gambar</a></li>
            <li><a class="dropdown-item" href="{{route('video.index')}}">Kelola Video</a></li>
        </ul>
    </li>
</ul>
