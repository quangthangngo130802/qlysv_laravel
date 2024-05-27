<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
        Preloader end
    ********************-->


<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="{{ asset('assetAdmin/images/logo.png') }}" alt="">
            <img class="logo-compact" src="{{ asset('assetAdmin/images/logo-text.png') }}" alt="">
            <img class="brand-title" src="{{ asset('assetAdmin/images/logo-text.png') }}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        {{-- <div class="search_bar dropdown">
                            <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                            <div class="dropdown-menu p-0 m-0">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                        </div> --}}
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            @php
                                $admin_name = Auth::guard('admin')->user()->admin_name;
                                if ($admin_name !== null) {
                                    echo $admin_name;
                                }
                            @endphp
                        </li>
                        <li class="nav-item dropdown notification_dropdown">
                            {{-- <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <div class="pulse-css"></div>
                            </a> --}}
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <ul class="list-unstyled">
                                    <li class="media dropdown-item">
                                        <span class="success"><i class="ti-user"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                    Successfully
                                                </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="primary"><i class="ti-shopping-cart"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="danger"><i class="ti-bookmark"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="primary"><i class="ti-heart"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="success"><i class="ti-image"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong> James.</strong> has added a<strong>customer</strong>
                                                    Successfully
                                                </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                </ul>
                                <a class="all-notification" href="#">See all notifications <i
                                        class="ti-arrow-right"></i></a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                @php
                                    $admin_avatar = Auth::guard('admin')->user()->admin_avatar;
                                @endphp
                                <img src="{{ asset('images/' . ($admin_avatar !== null ? $admin_avatar : '')) }}"
                                    alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./app-profile.html" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2">Profile </span>
                                </a>
                                {{-- <a href="./email-inbox.html" class="dropdown-item">
                                    <i class="icon-envelope-open"></i>
                                    <span class="ml-2">Inbox </span>
                                </a> --}}
                                <a href="{{ route('admin.logout') }}" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <li><a href="{{ route('admin.dashboard') }}" aria-expanded="false"><i
                            class="fa-solid fa-house"></i><span class="nav-text">Dashboard</span></a>
                    {{-- <ul aria-expanded="false">
                        <li><a href="./index.html">Dashboard 1</a></li>
                        <li><a href="./index2.html">Dashboard 2</a></li>
                    </ul> --}}
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="fa-solid fa-chart-pie"></i><span class="nav-text">Char</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.chart.form') }}">Pie Chart</a></li>

                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Class Section</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li><a href="{{ route('admin.addClassSectionDate.form') }}">Add Date</a></li>
                        {{-- <li><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li><a href="{{ route('admin.classSection.form') }}">Term</a></li> --}}
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Semester</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.semester.form') }}">Semester</a></li>

                        <li><a href="{{ route('admin.code.form') }}">Information</a></li>
                        <li><a href="{{ route('admin.term.form') }}">Term</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('admin.student.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-users"></i><span class="nav-text">Student</span></a></li>
                <li><a href="{{ route('admin.teacher.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-person-chalkboard"></i><span class="nav-text">Teacher</span></a></li>
                {{-- <li><a href="{{ route('admin.semester.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-layer-group"></i><span class="nav-text">Semester</span></a></li> --}}
                <li><a href="{{ route('admin.faculty.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-building-columns"></i><span class="nav-text">Faculty</span></a></li>
                <li><a href="{{ route('admin.major.form') }}" aria-expanded="false"><i
                            class="fa-brands fa-studiovinari"></i><span class="nav-text">Major</span></a></li>
                <li><a href="{{ route('admin.classroom.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-house-chimney-user"></i><span class="nav-text">Classroom</span></a>
                </li>
                <li><a href="{{ route('admin.class.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-people-roof"></i><span class="nav-text">Class</span></a></li>
                <li><a href="{{ route('admin.subject.form') }}" aria-expanded="false"><i
                            class="fa-solid fa-book"></i><span class="nav-text">Subject</span></a></li>


                <li><a href="{{ route('admin.course.form') }}" aria-expanded="false"><i
                            class="fa-brands fa-discourse"></i><span class="nav-text">Course</span></a></li>
                @hasRole(['Admin', 'Write'])
                    <li><a href="{{ route('admin.posts.form') }}" aria-expanded="false"><i
                                class="fa-solid fa-feather"></i><span class="nav-text">Posts</span></a></li>
                @endhasRole
                @hasRole(['Admin'])
                    <li><a href="{{ route('admin.permissions.form') }}" aria-expanded="false"> <i
                                class="fa-solid fa-user-tie"></i><span class="nav-text"> Grant Permissions</span></a></li>
                @endhasRole
                {{-- <li class="nav-label">Apps</li>

                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-chart-bar-33"></i><span class="nav-text">Charts</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./chart-flot.html">Flot</a></li>
                        <li><a href="./chart-morris.html">Morris</a></li>
                        <li><a href="./chart-chartjs.html">Chartjs</a></li>
                        <li><a href="./chart-chartist.html">Chartist</a></li>
                        <li><a href="./chart-sparkline.html">Sparkline</a></li>
                        <li><a href="./chart-peity.html">Peity</a></li>
                    </ul>
                </li>
                <li class="nav-label">Components</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-world-2"></i><span class="nav-text">Bootstrap</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./ui-accordion.html">Accordion</a></li>
                        <li><a href="./ui-alert.html">Alert</a></li>
                        <li><a href="./ui-badge.html">Badge</a></li>
                        <li><a href="./ui-button.html">Button</a></li>
                        <li><a href="./ui-modal.html">Modal</a></li>
                        <li><a href="./ui-button-group.html">Button Group</a></li>
                        <li><a href="./ui-list-group.html">List Group</a></li>
                        <li><a href="./ui-media-object.html">Media Object</a></li>
                        <li><a href="./ui-card.html">Cards</a></li>
                        <li><a href="./ui-carousel.html">Carousel</a></li>
                        <li><a href="./ui-dropdown.html">Dropdown</a></li>
                        <li><a href="./ui-popover.html">Popover</a></li>
                        <li><a href="./ui-progressbar.html">Progressbar</a></li>
                        <li><a href="./ui-tab.html">Tab</a></li>
                        <li><a href="./ui-typography.html">Typography</a></li>
                        <li><a href="./ui-pagination.html">Pagination</a></li>
                        <li><a href="./ui-grid.html">Grid</a></li>

                    </ul>
                </li>

                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-plug"></i><span class="nav-text">Plugins</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./uc-select2.html">Select 2</a></li>
                        <li><a href="./uc-nestable.html">Nestedable</a></li>
                        <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                        <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                        <li><a href="./uc-toastr.html">Toastr</a></li>
                        <li><a href="./map-jqvmap.html">Jqv Map</a></li>
                    </ul>
                </li>
                <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                            class="nav-text">Widget</span></a></li>
                <li class="nav-label">Forms</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-form"></i><span class="nav-text">Forms</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./form-element.html">Form Elements</a></li>
                        <li><a href="./form-wizard.html">Wizard</a></li>
                        <li><a href="./form-editor-summernote.html">Summernote</a></li>
                        <li><a href="form-pickers.html">Pickers</a></li>
                        <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                    </ul>
                </li>
                <li class="nav-label">Table</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                    <ul aria-expanded="false">
                        <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                        <li><a href="table-datatable-basic.html">Datatable</a></li>
                    </ul>
                </li>

                <li class="nav-label">Extra</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./page-register.html">Register</a></li>
                        <li><a href="./page-login.html">Login</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                            <ul aria-expanded="false">
                                <li><a href="./page-error-400.html">Error 400</a></li>
                                <li><a href="./page-error-403.html">Error 403</a></li>
                                <li><a href="./page-error-404.html">Error 404</a></li>
                                <li><a href="./page-error-500.html">Error 500</a></li>
                                <li><a href="./page-error-503.html">Error 503</a></li>
                            </ul>
                        </li>
                        <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>


    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->
