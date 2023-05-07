<li class="{{ Request::is('homes*') ? 'active' : '' }}">
    <a href="{!! url('home') !!}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li class="{{ Request::is('barangs*') ? 'active' : '' }}">
    <a href="{{ route('barangs.index') }}"><i class="fa fa-truck"></i><span>Barang</span></a>
</li>
<li class="treeview <?php if( 'active' == "" || 'active' == "" ) echo 'active'; ?>">
            <a href="#">
              <i class="fa fa-bar-chart"></i> <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ (Request::segment(1) == 'penjualans') ? 'active' : '' }}"><a href="{{ url('/penjualans') }}"><i class="fa fa-shopping-cart fa fa-shopping-cart"></i> Penjualan</span></a></li>
            </li>
               <li class="{{ (Request::segment(1) == 'pembelians') ? 'active' : '' }}"><a href="{{ url('/pembelians') }}"><i class="fa fa-shopping-cart fa fa-shopping-car"></i> Pembelian</span></a></li>       
 

        </ul>
</li>
<li class="treeview <?php if( 'active' == "" || 'active' == "" ) echo 'active'; ?>">
            <a href="#">
              <i class="fa fa-book"></i> <span>Retur</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ (Request::segment(1) == 'penjualan1s') ? 'active' : '' }}"><a href="{{ url('/penjualan1s') }}"><i class="fa fa-fw fa-suitcase"></i> Penjualan</span></a></li>
            </li>
               <li class="{{ (Request::segment(1) == 'pembelian1s') ? 'active' : '' }}"><a href="{{ url('/pembelian1s') }}"><i class="fa fa-fw fa-suitcase"></i> Pembelian</span></a></li>       
          
        </ul>
<li class="treeview <?php if( 'active' == "" || 'active' == "" ) echo 'active'; ?>">
            <a href="#">
              <i class="fa fa-book"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ (Request::segment(1) == 'laporan') ? 'active' : '' }}"><a href="{{ url('/laporan') }}"><i class="fa fa-fw fa-suitcase"></i> Penjualan</span></a></li>
            </li>
               <li class="{{ (Request::segment(1) == 'laporanp') ? 'active' : '' }}"><a href="{{ url('/laporanp') }}"><i class="fa fa-fw fa-suitcase"></i> Pembelian</span></a></li>       
          
        </ul>
        <li class="{{ Request::is('supliers*') ? 'active' : '' }}">
    <a href="{{ route('supliers.index') }}"><i class="fa fa-male"></i><span>Suplier</span></a>
</li>



<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>User</span></a>

     </ul>
<li class="{{ Request::is('lelangs*') ? 'active' : '' }}">
    <a href="{{ route('lelangs.index') }}"><i class="fa fa-edit"></i><span>Lelangs</span></a>
</li>

<li class="{{ Request::is('barangLelangs*') ? 'active' : '' }}">
    <a href="{{ route('barangLelangs.index') }}"><i class="fa fa-edit"></i><span>Barang Lelangs</span></a>
</li>

