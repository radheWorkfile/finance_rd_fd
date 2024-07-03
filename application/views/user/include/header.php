 <style>
   .booth{
    margin-right: 60px;
   }
   .cls{
    width: 650px;
    height: 40px;
    margin-left:100px;
    font-weight:600;
   }
   .btn_succ{
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    box-shadow: none;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    margin-top: -40px;
    margin-left: 765px;
    padding: 5px 15px;
   }
 </style>
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
          <div class="booth">
            <form id="filter_voter_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6">
                   <input type="search" name="voter" id="voter" class="form-control form-control-sm cls" placeholder="Search Your Booth">
                </div>
                <input type="submit" value="search" name="submit" class="btn_succ">
              </div>
            </form>
          </div>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo base_url() . 'user/common/profile' ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <p class="text-sm text-muted"><i class="fas fa-user-edit"></i> Profile Edit</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url() . 'Site/index' ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <p class="text-sm text-muted"><i class="nav-icon fas fa-sign-out-alt"></i> Logout</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
 <!-- /.navbar -->