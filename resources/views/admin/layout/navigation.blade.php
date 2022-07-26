 <aside id="left-panel" class="left-panel sticky-top" style="background-color: #00b894; overflow: hidden;">
     <nav class="navbar navbar-light navbar-expand-sm navbar-default" style="background-color: #00b894">
         <div class="navbar-header">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="fa fa-bars"></i>
             </button>
             <a class="navbar-brand" href="./"><img src="{{asset('images/logo1.png')}}" alt="Logo"></a>
             <!-- <a class="navbar-brand hidden" href="./"><img src="{{asset('public/images/logo2.png')}}" alt="Logo"></a> -->
         </div>
         <div id="main-menu" class="main-menu">
             <ul class="nav navbar-nav">
                 <li class="text-light">
                     <a href="{{ url ('/admin')}}"> <i class="menu-icon fa fa-dashboard text-light"></i>Dashboard </a>
                     <a href="{{ url ('/admin/datapenduduk')}}"> <i class="menu-icon fa fa-users text-light"></i>Data Penduduk </a>
                     <a href="{{ route ('datameninggal.index')}}"> <i class="menu-icon fa fa-users text-light"></i>Data Meninggal </a>
                     <a href="{{ url ('/admin/datapindah')}}"> <i class="menu-icon fa fa-users text-light"></i>Data Pindah </a>
                     <a href="{{ url ('/admin/datakeluarga')}}"> <i class="menu-icon fa fa-users text-light"></i>Data Keluarga </a>
                     @role('admin')
                     <a href="{{ url ('/admin/roles')}}"> <i class="menu-icon fa fa-briefcase text-light"></i>Role User </a>
                     <a href="{{ url ('/admin/users')}}"> <i class="menu-icon fa fa-user-circle text-light"></i>User </a>
                     @endrole
                 </li>
             </ul>
         </div><!-- /.navbar-collapse -->
     </nav>
 </aside><!-- /#left-panel -->