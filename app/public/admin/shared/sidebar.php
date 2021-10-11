<?php
use Project\Helper\Authorization;

?>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<?
    if(!Authorization::isEditor()){
        echo '
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/index">
                <div class="sidebar-brand-text mx-3">Admin Paneli</div>
            </a>
        ';
    }
    else
    {
        echo '
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-text mx-3">Editör Paneli</div>
        </a>
    ';
    }
?>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?
    if (!Authorization::isEditor())
    {
        echo '
            <li class="nav-item">
            <a class="nav-link" href="/admin/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Anasayfa</span></a>
            </li>
        ';
    }
?>

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
            <a class="collapse-item" href="/admin/news/addnew">Haber Ekle</a>
            <a class="collapse-item" href="/admin/news/news">Haberler</a>
        </div>
    </div>
</li>
<?


    if(!Authorization::isEditor())
    {
        echo '
        <!-- Nav Item - Users Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-cog"></i>
                <span>Kullanıcılar</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kullanıcılar</h6>
                    <a class="collapse-item" href="/admin/users/adduser">Kullanıcı Ekle</a>
                    <a class="collapse-item" href="/admin/users/users">Kullanıcılar</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Categories Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-cog"></i>
                <span>Kategoriler</span>
            </a>
            <div id="collapseCategories" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kategoriler</h6>
                    <a class="collapse-item" href="/admin/categories/addcategory">Kategori Ekle</a>
                    <a class="collapse-item" href="/admin/categories/categories">Kategoriler</a>
                </div>
            </div>
        </li><!-- Nav Item - Comments Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComments"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-cog"></i>
                <span>Yorumlar</span>
            </a>
            <div id="collapseComments" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Yorumlar</h6>
                    <a class="collapse-item" href="/admin/comments/comments">Yorumlar</a>
                </div>
            </div>
        </li><!-- Nav Item - Categories Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWaitings"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-cog"></i>
                <span>Silinme Bekleyenler</span>
            </a>
            <div id="collapseWaitings" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Bekleyen Kullanıcılar</h6>
                    <a class="collapse-item" href="/admin/users/deletelist">Bekleyenler</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Logs  Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/updatetime/updatetime">
                <i class="fas fa-fw fa-cog"></i>
                <span>Editör Güncelleme Süresi</span>
            </a>
        </li>
        <!-- Nav Item - Logs  Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/logs/log">
                <i class="fas fa-fw fa-cog"></i>
                <span>Loglar</span>
            </a>
        </li>';
    }
    if (Authorization::isAdmin())
    {
        echo '
        <!-- Nav Item - Maintance  Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="/maintance/maintance">
                <i class="fas fa-fw fa-cog"></i>
                <span>Bakım Modu</span>
            </a>
        </li>
        ';
    }
?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>