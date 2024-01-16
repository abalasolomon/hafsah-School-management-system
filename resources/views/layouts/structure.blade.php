<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hefsef Science Adacamy</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

  <style>
    /* Add this to your CSS file or within a <style> tag in your HTML */
      @media print {
          .non-printable-items {
              display: none;
          }

          .only-printable-items {
              display: block;
          }
          .printable-items {
              /* Define styles for printable items */
          }

          .print-button {
              display: none; /* Hide the print button when printing */
          }
          .show-on-print{
            display: block;
          }
      }
      @media screen {

        .only-printable-items {
              display: none;
          }

          .print-button {
              display: block; /* Show the print button on the screen */
          }
      }


  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center non-printable-items ">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('img/logo.jpg')}}" alt="">
        <span class="d-none d-lg-block">Hafsah Science Acadamy</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">2</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 2 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>


            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items --> --}}

        </li><!-- End Notification Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"> {{ Auth::user()->name}} </span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar non-printable-items ">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @can('Access Staffs')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Staff</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('staff')}}">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          @can('Add Staff')
          <li>
            <a href="{{url('staff/create')}}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End Components Nav -->
      @endcan
      @can('Access Sections')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-sec" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Section</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-sec" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('section')}}">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          @can('Add Section')
          <li>
            <a href="{{url('section/create')}}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan

      @can('Access Classes')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Classes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('class/')}}">
              <i class="bi bi-circle"></i><span>View List</span>
            </a>
          </li>
          @can('Add class')
          <li>
            <a href="{{url('class/create')}}">
              <i class="bi bi-circle"></i><span>Add Class</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan
      
      
      @can('Access Subject')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Subject</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('subject.index') }}">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          @can('Add Subject')
          <li>
            <a href="{{ route('subject.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End Tables Nav -->
      @endcan

      @can('Access Inventory')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-invert" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-invert" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('inventory.index') }}">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          @can('Add Inventory item')
          <li>
            <a href="{{ route('inventory.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End Tables Nav -->
      @endcan

      @can('Access Students')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('student.index') }}">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          @can('Add student')
          <li>
            <a href="{{ route('student.create') }}">
              <i class="bi bi-circle"></i><span>Add New</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan

      @can('Access Sales')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#student-sales" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Sales Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="student-sales" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @can('Add Sales')
          <li>
            <a href="{{ route('sales.index') }}">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
          <li>
            <a href="{{ route('sales.report') }}">
              <i class="bi bi-circle"></i><span> Sales Report</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan

      @can('Access School Fee Payment')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-schfee" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>School Payment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-schfee" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('sales/school-fee')}}">
              <i class="bi bi-circle"></i><span>View List</span>
            </a>
          </li>
          <li>
            <a href="{{route('school-fee.index')}}">
              <i class="bi bi-circle"></i><span>View List</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      @can('Access Expenses')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-expenses" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-expenses" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('expenses.index')}}">
              <i class="bi bi-circle"></i><span> Expenses</span>
            </a>
          </li>
          <li>
            <a href="{{route('expenses.salary')}}">
              <i class="bi bi-circle"></i><span>Salary Expenses</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan
      
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav --> --}}
    </ul>

  </aside><!-- End Sidebar-->

  <div class="only-printable-items">
    <!-- ======= Header ======= -->
    <div id="print-header" class="container">
        <div class="row pt-5">
          <div class="col-md-4 pt-5 col-sm-4">
            <h1>HAFSAH SCIENCE ACADEMY</h1>
            <p>Nursery, Primary, Secondary & Tahfeez<br>
              Anguwar Dallatu, Near Sheikh Ja’afar Masjid<br>
             Buba, Gusau, Zamfara State, Nigeria</p>

          </div>
          <div class="col-md-3 pt-5 col-sm-3">
              <div class="printable-logo d-flex align-items-center">
                <img src="{{asset('img/logo.jpg')}}" style="max-height: 50px;" alt="">
              </div>
          </div>
          <div class="col-md-4 pt-5 col-sm-4">
            <p> أكاديمية حفصة للعلوم<br>
             روضة، ابتدائية، ثانوية وتحفيظ<br>
            أنغور دلاتو، بالقرب من مسجد الشيخ جعفر، غسو،<br>
            ولاية زمفرا، نيجيريا  </p>
          </div>
        </div>
    </div>
  </div>

  <main id="main" class="main">


    @yield('bread')

    <section class="section dashboard  ">
      <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-11">
                @yield('main')
            </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card non-printable-items ">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title"> <span></span></h5>
            </div>
          </div><!-- End Recent Activity -->
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer non-printable-items ">
    <div class="copyright">
      &copy; Copyright <strong><span>Hafsaf Science Adacamy </span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by Hafsaf Science Adacamy Team
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js') }}"></script>
  <script>
    new DataTable('#table');
    // Function to show Swal alert
    function showAlert(message, type) {
        Swal.fire({
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
    }

    // Check if a message exists in the session
    let alertMessage = '{{ session("success") }}';

    // If a message exists, show the alert
    if (alertMessage) {
        showAlert(alertMessage, 'success');
    }
</script>
@yield('script')
</body>

</html>