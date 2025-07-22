<?php
require 'function.php';
require 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
    crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Siemens Indonesia</a>
    <button
      class="btn btn-link btn-sm order-1 order-lg-0"
      id="sidebarToggle"
      href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form
      class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input
          class="form-control"
          type="text"
          placeholder="Search for..."
          aria-label="Search"
          aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          id="userDropdown"
          href="#"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div
          class="dropdown-menu dropdown-menu-right"
          aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a
              class="nav-link collapsed"
              href="#"
              data-toggle="collapse"
              data-target="#collapseLayouts"
              aria-expanded="false"
              aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Layouts
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div
              class="collapse"
              id="collapseLayouts"
              aria-labelledby="headingOne"
              data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
              </nav>
            </div>
            <a
              class="nav-link collapsed"
              href="#"
              data-toggle="collapse"
              data-target="#collapsePages"
              aria-expanded="false"
              aria-controls="collapsePages">
              <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
              </div>
              Pages
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div
              class="collapse"
              id="collapsePages"
              aria-labelledby="headingTwo"
              data-parent="#sidenavAccordion">
              <nav
                class="sb-sidenav-menu-nested nav accordion"
                id="sidenavAccordionPages">
                <a
                  class="nav-link collapsed"
                  href="#"
                  data-toggle="collapse"
                  data-target="#pagesCollapseAuth"
                  aria-expanded="false"
                  aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                  </div>
                </a>
                <div
                  class="collapse"
                  id="pagesCollapseAuth"
                  aria-labelledby="headingOne"
                  data-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a
                  class="nav-link collapsed"
                  href="#"
                  data-toggle="collapse"
                  data-target="#pagesCollapseError"
                  aria-expanded="false"
                  aria-controls="collapsePagesError">
                  Error
                  <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                  </div>
                </a>
                <div
                  class="collapse"
                  id="pagesCollapseError"
                  aria-labelledby="headingOne"
                  data-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chart-area"></i>
              </div>
              Charts
            </a>
            <a class="nav-link" href="tables.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Tables
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Start Bootstrap
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Dashboard</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>

          <div class="form-group row mt-4 align-items-center mb-3">
            <label for="inputProject" class="col-sm-auto col-form-label ml-3">Project :</label>
            <div class="col-sm-3">
              <input
                type="text"
                class="form-control"
                id="inputProject"
                placeholder="Enter Project Name" />
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table
                  class="table table-bordered"
                  id="inputDataTable"
                  width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th colspan="13">
                        <div class="form-inline d-flex justify-content-start">
                          <label for="signalFilterTable" class="mr-2">Filter Signal:</label>
                          <input
                            type="text"
                            class="form-control form-control-sm"
                            id="FilterTable"
                            placeholder="Search Name..." />
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <th></th>
                      <th>Bay 1</th>
                      <th>Bay 2</th>
                      <th>Bay 3</th>
                      <th>Bay 4</th>
                      <th>Bay 5</th>
                      <th>Bay 6</th>
                      <th>Bay 7</th>
                      <th>Bay 8</th>
                      <th>Bay 9</th>
                      <th>Bay 10</th>
                      <th>Bay 11</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Signal</td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                      <td>
                        <input
                          type="text"
                          class="form-control form-control-sm text-center"
                          placeholder="E01" />
                      </td>
                    </tr>
                    <tr>
                      <td>CB/Open Close Position</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Local/Remot Position</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 1 Phase R Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 1 Phase S Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 1 Phase T Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 2 Phase R Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 2 Phase S Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 2 Phase T Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 1 Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>TCS 2 Failure</td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-switch" data-status="off">
                          <span class="icon-check"><i class="fas fa-check text-success"></i></span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end mb-4">
            <button class="btn btn-primary" id="addAllDataBtn">ADD</button>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div
            class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Website 2025</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script
    src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
    crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
</body>

</html>