  <header class="main-header" >

<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 17px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
  }
  .button {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 6px 18px;
    border-radius: 4%;
    float:center;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 2px 4px;
    cursor: pointer;
  }

  .button2 {background-color: #008CBA;} /* Blue */
  .button3 {background-color: #f44336;} /* Red */ 
  .button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
  .button5 {background-color: #555555;} /* Black */


/* store */

  * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="logo" style="background:  #388800">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>D</b>ashboard</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background: green">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" >
        <li class="dropdown user user-menu">
        
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{!! asset('dist/img/uobs.jpg') !!}" class="user-image" alt="User Image">
              <span class="hidden-xs" >Libraian Profile | Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background: green">
                <img src="{!! asset('dist/img/uobs.jpg') !!}" class="img-circle" alt="User Image">

                <p>
                Admin</br> UOBS Librarian
                  <small>Member since Oct. 2020</small>
                </p>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile.show') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <form method="POST" action="{{ route('logout') }}" >
                   @csrf
                   <x-jet-responsive-nav-link href="{{ route('logout') }}" class="btn btn-default btn-flat"
                       onclick="event.preventDefault();
                       this.closest('form').submit();">
                       {{ __('Logout') }}
                   </x-jet-responsive-nav-link>
                </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
