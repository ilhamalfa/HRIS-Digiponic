<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    {{-- Header Logo Start --}}
    <link rel="icon" href="{{ asset('logo/brand-logo-white.webp') }}">
    {{-- Header Logo End --}}

    {{-- Google Fonts Start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
    {{-- Google Fonts End --}}

    {{-- Plugin CSS Start --}}
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    {{-- Plugin CSS End --}}

    {{-- Layout CSS Start --}}
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    {{-- Layout CSS End --}}

    {{-- Font Awesome Start --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Font Awesome End --}}

    {{-- Signature --}}
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

    {{-- Trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }

        trix-toolbar [data-trix-button-group]{
            background-color: whitesmoke;
        }
    </style>

    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px; 
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 1000px !important;
        }

        .signature-pad {
                position: absolute;
                left: 0;
                top: 0;
                width:400px;
                height:200px;
            }
    </style>

    <style>
        .wrapper {
        position: relative;
        width: 400px;
        height: 200px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width:400px;
        height:200px;
        background-color: white;
    }
    </style>

</head>

<body>
    <div class="container-scroller">

        {{-- Sidebar Start --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            {{-- Sidebar Brand Logo Start --}}
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo text-decoration-none" href="{{ url('/about') }}">
                    <span class="secondary-color-1-text">TECHSolution</span>
                </a>
                <a class="sidebar-brand brand-logo-mini" href="index.html">
                    <img src="{{ asset('logo/brand-logo-white.webp') }}" alt="Brand Logo" />
                </a>
            </div>
            {{-- Sidebar Brand Logo End --}}

            {{-- Sidebar Navigation Start --}}
            <ul class="nav">

                {{-- Sidebar Profile Box Start --}}
                <li class="nav-item profile">
                    @guest
                        <div class="profile-des">
                            <a class="nav-link" href="{{ route('login') }}">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                </span>
                                <span class="menu-title">Login</span>
                            </a>
                        </div>
                    @else
                    <div class="profile-desc">

                        {{-- Sidebar Profile Image & Name Start --}}
                        <div class="profile-pic">
                            <div class="count-indicator">
                                    <img class="img-xs rounded-circle"
                                    src="{{ asset('storage/' . Auth::user()->foto) }}" alt="">
                            </div>
                            <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal">
                                        {{ Auth::user()->nama }}
                                    </h5>
                                    <span>
                                        {{ Auth::user()->department }}
                                        <br>
                                        {{ Auth::user()->golongan }}
                                    </span>
                            </div>
                        </div>
                        {{-- Sidebar Profile Image & Name End --}}

                        {{-- Sidebar Profile 3 Dots Vertical Start --}}
                        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        {{-- Sidebar Profile 3 Dots Vertical End --}}

                        {{-- Sidebar Profile 3 Dots Vertical Menu Start --}}
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="{{ url('/Account/account-setting') }}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/profile/signature') }}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-check-circle-outline text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Digital Signature</p>
                                </div>
                            </a>   
                        </div>
                        {{-- Sidebar Profile 3 Dots Vertical Menu End --}}

                    </div>
                    @endguest

                </li>
                {{-- Sidebar Profile Box End --}}

                {{-- Sidebar Title Navigation Start --}}
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                {{-- Sidebar Title Navigation End --}}

                {{-- Sidebar Dashboard Start --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" href="">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                @guest
                    
                @else
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'SuperAdmin')
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('/data-user') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-account-multiple-outline"></i>
                                </span>
                                <span class="menu-title">Users Datas</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('admin/daftar-cuti') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-note-multiple"></i>
                                </span>
                                <span class="menu-title">Daftar Cuti</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('admin/izin') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-receipt"></i>
                                </span>
                                <span class="menu-title">Days Off</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('data-lowongan/') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-file-multiple"></i>
                                </span>
                                <span class="menu-title">lowongan</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role != 'Pelamar')
                        <li class="nav-item nav-category">
                            <span class="nav-link">Employee Navigation</span>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('#') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-file-multiple"></i>
                                </span>
                                <span class="menu-title">Absensi</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('pegawai/cuti') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-file-multiple"></i>
                                </span>
                                <span class="menu-title">cuti</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('pegawai/izin') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-file-multiple"></i>
                                </span>
                                <span class="menu-title">Izin</span>
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('pegawai/resign') }}">
                                <span class="menu-icon">
                                    <i class="mdi mdi-file-multiple"></i>
                                </span>
                                <span class="menu-title">Resign</span>
                            </a>
                        </li>
                    @endif
                @endguest
                {{-- Sidebar Dashboard End --}}

            </ul>
            {{-- Sidebar Navigation End --}}

        </nav>
        {{-- Sidebar End --}}

        <div class="container-fluid page-body-wrapper">

            {{-- Topbar Start --}}
            <nav class="navbar p-0 fixed-top d-flex flex-row">

                {{-- Topbar Brand Logo Responsive Media Start --}}
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="{{ asset('template/assets/images/logo-mini.svg') }}" alt="logo" />
                    </a>
                </div>
                {{-- Topbar Brand Logo Responsive Media End --}}

                {{-- Topbar Menu Start --}}
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

                    {{-- Topbar Hamburger Menu Start --}}
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    {{-- Topbar Hamburger Menu End --}}

                    {{-- Topbar Menu Right Side Start --}}
                    <ul class="navbar-nav navbar-nav-right">

                        {{-- Topbar Menu Right Side Mail Start --}}
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email"></i>
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">3 new messages</p>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('template/assets/images/faces/face4.jpg') }}"
                                            alt="image" class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center text-decoration-none p-3 mb-0" href="#">See
                                    all messages</a>
                            </div>
                        </li>
                        {{-- Topbar Menu Right Side Mail End --}}

                        {{-- Topbar Menu Right Side Information Start --}}
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown"
                                href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center text-decoration-none p-3 mb-0" href="#">See
                                    all notifications</a>
                            </div>
                        </li>
                        {{-- Topbar Menu Right Side Information End --}}

                        {{-- Topbar Menu Right Side Advandce Settings Start --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                        {{-- @foreach ($user as $user) --}}
                                        @guest
                                            <p class="mb-0 ms-2 d-none d-sm-block navbar-profile-name text-white">Login</p>
                                        @else
                                        <img class="img-xs rounded-circle"
                                        src="{{ asset('storage/' . Auth::user()->foto) }}" alt="">
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                            {{ Auth::user()->nama }}
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    {{-- @endforeach --}}
                                        @endguest
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                        {{-- Topbar Menu Right Side Advandce Settings End --}}

                    </ul>
                    {{-- Topbar Menu Right Side End --}}

                    {{-- Topbar Hamburger Menu Responsive Media Start --}}
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                    {{-- Topbar Hamburger Menu Responsive Media End --}}

                </div>
                {{-- Topbar Menu End --}}

            </nav>
            {{-- Topbar End --}}

            {{-- Main Content Start --}}
            <div class="main-panel">

                {{-- Main Content Start --}}
                <div class="content-wrapper">
                    @yield('content')
                </div>
                {{-- Main Content End --}}
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    {{-- Plugins JS Start --}}
    <script src="{{ asset('template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/assets/js/misc.js') }}"></script>
    <script src="{{ asset('template/assets/js/settings.js') }}"></script>
    <script src="{{ asset('template/assets/js/todolist.js') }}"></script>
    {{-- Plugins JS End --}}

    {{-- JS Start --}}
    <script src="{{ asset('template/assets/js/dashboard.js') }}"></script>
    {{-- JS End --}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/alamat.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    {{-- Digital Signature --}}
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        
        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
            image.src = url;
            $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                done(reader.result);
                };
                reader.readAsDataURL(file);
            }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
        });
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob); 
                reader.onloadend = function() {
                    var base64data = reader.result; 
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "crop-image-upload",
                        data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                        success: function(data){
                            console.log(data);
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        })
    </script>

    <script>
        // Signature Pad
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
        });
        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');

        $('#save').click(function (e) { 
            document.getElementById("signature").value = signaturePad.toDataURL();

            document.getElementById("myForm").submit();
        });


        cancelButton.addEventListener('click', function (event) {
        signaturePad.clear();
        });

        // End Signature Pad
    </script>

    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault
        })
    </script>

</body>

</html>