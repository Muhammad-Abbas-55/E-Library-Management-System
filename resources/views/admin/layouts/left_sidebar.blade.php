
 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" class="small-box bg-green">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{!! asset('dist/img/uobs.jpg') !!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>UOBS E-Library </p>
          <a href="{{ route('dashboard') }}"><i class="fa fa-circle text-success"></i>Welcome</a>
        </div>
      </div>
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="overflow-y:auto;">
        <li class="header">MAIN NAVIGATION</li>

<!-- Dashboard -->
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>

 <!-- Books href="{{ URL::to('add-section') }}">  -->
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list text-aqua"></i> <span>Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('book.create') }}"><i class="fa fa-circle-o"></i> Add Book </a></li>         
            <li class=""><a href="{{ route ('book.index') }}"><i class="fa fa-circle-o"></i> View Books </a></li>
          </ul>
        </li>



  <!-- Authers --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-users text-aqua"></i> <span>Authors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('author.create') }}"><i class="fa fa-circle-o"></i> Add Author </a></li>
            <li class=""><a href="{{ route ('author.index') }}"><i class="fa fa-circle-o"></i> View Authors </a></li>
          </ul>
        </li>
  <!-- Shelf --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-users text-aqua"></i> <span>Shelf</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('shelf.create') }}"><i class="fa fa-circle-o"></i> Add Shelves </a></li>
            <li class=""><a href="{{ route ('shelf.index') }}"><i class="fa fa-circle-o"></i> View Shelves </a></li>
          </ul>
        </li>


         <!-- Categories --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Book Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('category.create') }}"><i class="fa fa-circle-o"></i> Add Categories </a></li>
            <li class=""><a href="{{ route ('category.index') }}"><i class="fa fa-circle-o"></i> View Categories </a></li>
          </ul>
      </li>


     <!-- Publisher --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Book Publisher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('publisher.index') }}"><i class="fa fa-circle-o"></i> Add Publisher </a></li>>
          </ul>
      </li>  
          <!-- Book Isssue --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Issue Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('bookissue.create') }}"><i class="fa fa-circle-o"></i> Issue Books</a></li>
            <li class=""><a href="{{ route ('bookissue.index') }}"><i class="fa fa-circle-o"></i> View Isssued Book </a></li>
          </ul>

      </li>

     <!-- Book Return --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Returned Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('bookreturn.create') }}"><i class="fa fa-circle-o"></i> Return Books</a></li>
            <li class=""><a href="{{ route ('bookreturn.index') }}"><i class="fa fa-circle-o"></i> View Returned Books </a></li>
          </ul>
      </li>


     <!-- Fine --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Fine Rules</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('fine.create') }}"><i class="fa fa-circle-o"></i> Add Rules </a></li>
            <li class=""><a href="{{ route ('fine.index') }}"><i class="fa fa-circle-o"></i> View List </a></li>
          </ul>
      </li>


      <!-- Student --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('student.create') }}"><i class="fa fa-circle-o"></i> Add Student </a></li>
            <li class=""><a href="{{ route ('student.index') }}"><i class="fa fa-circle-o"></i> View Student </a></li>
          </ul>
      </li>

      <!-- Staff --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('staff.create') }}"><i class="fa fa-circle-o"></i> Add Staff </a></li>
            <li class=""><a href="{{ route ('staff.index') }}"><i class="fa fa-circle-o"></i> View Staff </a></li>
          </ul>
      </li>

      <!-- E-book --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-aqua"></i> <span>E-Book</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('ebook.create') }}"><i class="fa fa-circle-o"></i> Add E-Book </a></li>
            <li class=""><a href="{{ route ('ebook.index') }}"><i class="fa fa-circle-o"></i> View E-Book </a></li>
          </ul>
      </li>

      
  <!-- User Role --> 

      <li class="treeview">
          <a href="#">
            <i class="fa fa-users text-aqua"></i> <span>View Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route ('role.index') }}"><i class="fa fa-circle-o"></i>View Admins </a></li>
          </ul>
        </li>

           <!-- Report --> 

        <li class="header">SUB NAVIGATION</li>
        <li><a href="{{ route ('report') }}"><i class="fa fa-circle-o text-red"></i> <span>Report</span></a></li>


        <!-- contact us -->
        <li class="header">SUB NAVIGATION</li>
        <li><a href="{{ route ('contact.show') }}"><i class="fa fa-circle-o text-red"></i> <span>Follow Us</span></a></li>

        <li><a href="{{ route ('news.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Library News & Events</a></li>
        <li><a href="{{ route ('about.index') }}"><i class="fa fa-circle-o text-red"></i> <span>About Us</a></li>
        <li><a href="{{ route ('feedback.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Feedback</a></li>

      

        <!-- contact us -->
      
 
      </ul>
    </section>

  </aside>
