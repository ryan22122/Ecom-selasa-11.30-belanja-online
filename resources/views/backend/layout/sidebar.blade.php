<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="{{ asset('backend/assets') }}/images/profile.png" class="img-circle img-responsive" alt=""></a>
                    <h6>{{ auth()->user()->nama }}</h6>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li>
                        <form action="{{ url('/logout') }}" method="post" id="formLogout">
                            @csrf
                        </form>
                        <a href="#" class="btnLogout"><i class="icon-switch2"></i> <span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{ request()->is('admin/transaksi*') ? 'active' : '' }}"><a href="{{ url('/admin/transaksi') }}"><i class="icon-cart5"></i> <span>Data Transaksi</span></a></li>
                    <li class="{{ request()->is('admin/kategori*') ? 'active' : '' }}"><a href="{{ url('/admin/kategori') }}"><i class="icon-stack"></i> <span>Data Kategori</span></a></li>
                    <li class="{{ request()->is('admin/barang*') ? 'active' : '' }}"><a href="{{ url('/admin/barang') }}"><i class="icon-price-tags"></i> <span>Data Barang</span></a></li>
                    <li class="{{ request()->is('admin/user*') ? 'active' : '' }}"><a href="{{ url('/admin/user') }}"><i class="icon-users"></i> <span>Data User</span></a></li>
                    <!-- /page kits -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
