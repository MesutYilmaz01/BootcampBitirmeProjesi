
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/public/admin/">
    <div class="sidebar-brand-text mx-3">Admin Paneli</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/public/admin/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Anasayfa</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    MENÜ
</div>

<!-- Nav Item - News Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Haberler</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Haberler</h6>
            <a class="collapse-item" href="/public/admin/news/addnew.php">Haber Ekle</a>
            <a class="collapse-item" href="/public/admin/news/news.php">Haberler</a>
        </div>
    </div>
</li>

<!-- Nav Item - Users Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Kullanıcılar</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kullanıcılar</h6>
            <a class="collapse-item" href="utilities-color.html">Kullanıcı Ekle</a>
            <a class="collapse-item" href="utilities-border.html">Kullanıcılar</a>
        </div>
    </div>
</li>

<!-- Nav Item - Categories Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Kategoriler</span>
    </a>
    <div id="collapseCategories" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kategoriler</h6>
            <a class="collapse-item" href="/public/admin/categories/addcategory.php">Kategori Ekle</a>
            <a class="collapse-item" href="/public/admin/categories/categories.php">Kategoriler</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>