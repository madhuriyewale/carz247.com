<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">                
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{ HTML::image('public/admin/img/avatar3.png' ,'', array('class' => 'img-circle')) }}
            </div>
            <div class="pull-left info">
                <p>Hello, Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/admin/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span>Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::route('cities'); }}"><i class="fa fa-angle-double-right"></i>Cities</a></li>
                    <li><a href="{{ URL::route('localities'); }}"><i class="fa fa-angle-double-right"></i>Localities</a></li>
                    <li><a href="{{ URL::route('services'); }}"><i class="fa fa-angle-double-right"></i>Services</a></li>
                    <li><a href="{{ URL::route('categories'); }}"><i class="fa fa-angle-double-right"></i>Categories</a></li>
                    <li><a href="{{ URL::route('packages'); }}"><i class="fa fa-angle-double-right"></i>Packages</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ URL::route('carz_listing'); }}">
                    <i class="fa fa-car"></i>
                    <span>Carz Listings</span>
                </a>
            </li>
          
            <li>
                <a href="{{ URL::route('orders'); }}">
                    <i class="fa fa-table"></i> <span>Orders</span>
                    <small class="badge pull-right bg-red">{{Helper::orders_count()}} </small>
                </a>
            </li>

            <li>
                <a href="{{ URL::route('venders'); }}">
                    <i class="fa fa-child"></i> <span>Vendors</span>
                    <small class="badge pull-right bg-red"></small>
                </a>
            </li>
            
             
          
            
            <li>
                <a href="{{ URL::route('users'); }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>  
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-flask"></i> <span>Miscellaneous</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::route('testimonials'); }}"><i class="fa fa-angle-double-right"></i>Testimonials</a> </li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Meta Tags</a> </li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Carz Info</a> </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::route('contact_enquiries'); }}"><i class="fa fa-angle-double-right"></i>Enquiries<small class="badge pull-right bg-yellow">{{ Helper::contact_count() }}</small></a> </li>
                    <li><a href="{{ URL::route('career_requests'); }}"><i class="fa fa-angle-double-right"></i>Career Requests<small class="badge pull-right bg-yellow">{{ Helper::careers_count() }}</small></a> </li>
                    <li><a href="{{ URL::route('partners_with_us'); }}"><i class="fa fa-angle-double-right"></i>Partner with us<small class="badge pull-right bg-yellow">{{ Helper::partner_count() }}</small></a> </li>
                </ul>
            </li>
            
            <li>
                <a href="{{ URL::route('sales'); }}">
                    <i class="fa fa-line-chart"></i> <span>Sales Summary</span>
                    <small class="badge pull-right bg-red"></small>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>