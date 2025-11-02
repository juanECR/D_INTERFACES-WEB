<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>Eventos | Taplox - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Taplox: An advanced, fully responsive admin dashboard template packed with features to streamline your analytics and management needs." />
    <meta name="author" content="StackBros" />
    <meta name="keywords" content="Taplox, admin dashboard, responsive template, analytics, modern UI, management tools" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow" />
    <meta name="theme-color" content="#ffffff">

    <!-- App favicon -->
    <link rel="shortcut icon" href="src/view/assets/images/favicon.ico">

    <!-- Google Font Family link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor css -->
    <link href="src/view/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="src/view/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="src/view/assets/css/style.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config js -->
    <script src="src/view/assets/js/config.js"></script>
     
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
        const base_url_server = '<?php echo BASE_URL_SERVER; ?>';
        const session_session = '<?php echo $_SESSION['sesion_id']; ?>';
        const token_token = '<?php echo $_SESSION['sesion_token']; ?>';
    </script>
</head>

<body>

    <!-- START Wrapper -->
    <div class="app-wrapper">

        <!-- Topbar Start -->
        <header class="app-topbar">
             <div class="container-fluid">
                  <div class="navbar-header">
                       <div class="d-flex align-items-center gap-2">
                            <!-- Menu Toggle Button -->
                            <div class="topbar-item">
                                 <button type="button" class="button-toggle-menu topbar-button">
                                      <iconify-icon icon="solar:hamburger-menu-outline"
                                           class="fs-24 align-middle"></iconify-icon>
                                 </button>
                            </div>

                            <!-- App Search-->
                            <form class="app-search d-none d-md-block me-auto">
                                 <div class="position-relative">
                                      <input type="search" class="form-control" placeholder="admin,widgets..."
                                           autocomplete="off" value="">
                                      <iconify-icon icon="solar:magnifer-outline" class="search-widget-icon"></iconify-icon>
                                 </div>
                            </form>
                       </div>

                       <div class="d-flex align-items-center gap-2">
                            <!-- Theme Color (Light/Dark) -->
                            <div class="topbar-item">
                                 <button type="button" class="topbar-button" id="light-dark-mode">
                                      <iconify-icon icon="solar:moon-outline"
                                           class="fs-22 align-middle light-mode"></iconify-icon>
                                      <iconify-icon icon="solar:sun-2-outline"
                                           class="fs-22 align-middle dark-mode"></iconify-icon>
                                 </button>
                            </div>

                            <!-- Notification -->
                            <div class="dropdown topbar-item">
                                 <button type="button" class="topbar-button position-relative"
                                      id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">
                                      <iconify-icon icon="solar:bell-bing-outline" class="fs-22 align-middle"></iconify-icon>
                                      <span
                                           class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">5<span
                                                class="visually-hidden">unread messages</span></span>
                                 </button>
                                 <div class="dropdown-menu py-0 dropdown-lg dropdown-menu-end"
                                      aria-labelledby="page-header-notifications-dropdown">
                                      <div class="p-2 border-bottom bg-light bg-opacity-50">
                                           <div class="row align-items-center">
                                                <div class="col">
                                                     <h6 class="m-0 fs-16 fw-semibold"> Notifications (5)</h6>
                                                </div>
                                                <div class="col-auto">
                                                     <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                                          <small>Clear All</small>
                                                     </a>
                                                </div>
                                           </div>
                                      </div>
                                      <div data-simplebar style="max-height: 250px;">
                                           <!-- Item -->
                                           <a href="javascript:void(0);" class="dropdown-item p-2 border-bottom text-wrap">
                                                <div class="d-flex">
                                                     <div class="flex-shrink-0">
                                                          <img src="src/view/assets/images/users/avatar-1.jpg"
                                                               class="img-fluid me-2 avatar-sm rounded-circle" alt="avatar-1" />
                                                     </div>
                                                     <div class="flex-grow-1">
                                                          <p class="mb-0"><span class="fw-medium">Sally Bieber </span>started
                                                               following you. Check out their profile!"</span></p>
                                                     </div>
                                                </div>
                                           </a>
                                           <!-- Item -->
                                           <a href="javascript:void(0);" class="dropdown-item p-2 border-bottom">
                                                <div class="d-flex">
                                                     <div class="flex-shrink-0">
                                                          <div class="avatar-sm me-2">
                                                               <span
                                                                    class="avatar-title text-bg-info fw-semibold fs-20 rounded-circle">
                                                                    G
                                                               </span>
                                                          </div>
                                                     </div>
                                                     <div class="flex-grow-1">
                                                          <p class="mb-0 fw-medium">Gloria Chambers</p>
                                                          <p class="mb-0 text-wrap">
                                                               mentioned you in a comment: '@admin, check this out!
                                                          </p>
                                                     </div>
                                                </div>
                                           </a>
                                      </div>
                                      <div class="text-center p-2">
                                           <a href="javascript:void(0);" class="btn btn-primary btn-sm">View All Notification <i
                                                     class="bx bx-right-arrow-alt ms-1"></i></a>
                                      </div>
                                 </div>
                            </div>

                            <!-- User -->
                            <div class="dropdown topbar-item">
                                 <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      <span class="d-flex align-items-center">
                                           <img class="rounded-circle" width="32" src="src/view/assets/images/users/avatar-1.jpg"
                                                alt="avatar-3">
                                      </span>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-end">
                                      <!-- item-->
                                      <h6 class="dropdown-header">Welcome!</h6>

                                      <a class="dropdown-item" href="#">
                                           <iconify-icon icon="solar:user-outline"
                                                class="align-middle me-2 fs-18"></iconify-icon><span class="align-middle">My
                                                Account</span>
                                      </a>

                                      <a class="dropdown-item" href="#">
                                           <iconify-icon icon="solar:wallet-outline"
                                                class="align-middle me-2 fs-18"></iconify-icon><span
                                                class="align-middle">Pricing</span>
                                      </a>
                                      <a class="dropdown-item" href="#">
                                           <iconify-icon icon="solar:help-outline"
                                                class="align-middle me-2 fs-18"></iconify-icon><span
                                                class="align-middle">Help</span>
                                      </a>
                                      <a class="dropdown-item" href="auth-lock-screen.html">
                                           <iconify-icon icon="solar:lock-keyhole-outline"
                                                class="align-middle me-2 fs-18"></iconify-icon><span class="align-middle">Lock
                                                screen</span>
                                      </a>

                                      <div class="dropdown-divider my-1"></div>

                                      <a class="dropdown-item text-danger" onclick="cerrar_sesion();"
                                           <iconify-icon icon="solar:logout-3-outline"
                                                class="align-middle me-2 fs-18"></iconify-icon><span
                                                class="align-middle">Logout</span>
                                      </a>
                                 </div>
                            </div>
                       </div>
                  </div>
             </div>
        </header>
        <!-- Topbar End -->

        <!-- App Menu Start -->
        <div class="app-sidebar">
             <!-- Sidebar Logo -->
             <div class="logo-box">
                  <a href="inicio" class="logo-dark">
                       <img src="https://cdn-ilaofhl.nitrocdn.com/abCJYHZFgffoRCdICUWLLcdawAGEsiUC/assets/images/optimized/rev-44c4c1b/sige.pe/wp-content/uploads/2023/06/Logo-Sige-Final-2017-06.png" class="logo-sm" alt="logo sm">
                       <img src="https://cdn-ilaofhl.nitrocdn.com/abCJYHZFgffoRCdICUWLLcdawAGEsiUC/assets/images/optimized/rev-44c4c1b/sige.pe/wp-content/uploads/2023/06/Logo-Sige-Final-2017-06.png" class="logo-lg" alt="logo dark">
                  </a>

                  <a href="inicio" class="logo-light">
                       <img src="src/view/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
                       <img src="src/view/assets/images/logo-light.png" class="logo-lg" alt="logo light">
                  </a>
             </div>

             <div class="scrollbar" data-simplebar>

                  <ul class="navbar-nav" id="navbar-nav">

                       <li class="menu-title">Menu...</li>

                       <li class="nav-item">
                            <a class="nav-link" href="inicio">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:widget-2-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Dashboard </span>
                                 <span class="badge bg-primary badge-pill text-end">New</span>
                            </a>
                       </li>
                       <li class="nav-item">
                            <a class="nav-link" href="eventos">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:chart-square-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Eventos </span>
                            </a>
                       </li>
                       <li class="nav-item">
                            <a class="nav-link" href="tokensApi">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:key-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Tokens API </span>
                            </a>
                       </li>

                       <li class="nav-item">
                            <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarAuthentication">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:user-circle-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Authentication </span>
                            </a>
                            <div class="collapse" id="sidebarAuthentication">
                                 <ul class="nav sub-navbar-nav">
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="auth-signin.html">Sign In</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="auth-signup.html">Sign Up</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="auth-password.html">Reset Password</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="auth-lock-screen.html">Lock Screen</a>
                                      </li>
                                 </ul>
                            </div>
                       </li>

                       <li class="nav-item">
                            <a class="nav-link menu-arrow" href="#sidebarError" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarError">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:danger-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Error Pages</span>
                            </a>
                            <div class="collapse" id="sidebarError">
                                 <ul class="nav sub-navbar-nav">
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="pages-404.html">Pages 404</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="pages-404-alt.html">Pages 404 Alt</a>
                                      </li>
                                 </ul>
                            </div>
                       </li>

                       <li class="menu-title">UI Kit...</li>

                       <li class="nav-item">
                            <a class="nav-link menu-arrow" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarForms">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:box-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Forms </span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                 <ul class="nav sub-navbar-nav">
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="forms-basic">Basic Elements</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="forms-flatpicker.html">Flatpicker</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="forms-validation.html">Validation</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="forms-fileuploads.html">File Upload</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="forms-editors.html">Editors</a>
                                      </li>
                                 </ul>
                            </div>
                       </li>

                       <li class="nav-item">
                            <a class="nav-link menu-arrow" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarTables">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:checklist-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Tables </span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                 <ul class="nav sub-navbar-nav">
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="tables-basic.html">Basic Tables</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="tables-gridjs.html">Grid Js</a>
                                      </li>
                                 </ul>
                            </div>
                       </li>

                       <li class="nav-item">
                            <a class="nav-link menu-arrow" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarIcons">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:crown-star-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Icons </span>
                            </a>
                            <div class="collapse" id="sidebarIcons">
                                 <ul class="nav sub-navbar-nav">
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="icons-boxicons.html">Boxicons</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="icons-solar.html">Solar Icons</a>
                                      </li>
                                 </ul>
                            </div>
                       </li>

                       <li class="nav-item">
                            <a class="nav-link menu-arrow" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarMaps">
                                 <span class="nav-icon">
                                      <iconify-icon icon="solar:map-outline"></iconify-icon>
                                 </span>
                                 <span class="nav-text"> Maps </span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                 <ul class="nav sub-navbar-nav">
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="maps-google.html">Google Maps</a>
                                      </li>
                                      <li class="sub-nav-item">
                                           <a class="sub-nav-link" href="maps-vector.html">Vector Maps</a>
                                      </li>
                                 </ul>
                            </div>
                       </li>
                  </ul>
             </div>
        </div>
        <!-- App Menu End -->