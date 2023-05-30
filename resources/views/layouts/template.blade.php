<!DOCTYPE html>
<html lang="en">

<head>
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

    {{-- CSS Start --}}
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/layout/style.css') }}">
    {{-- CSS End --}}

</head>

<body>

    {{-- Container Scroller Start --}}
    <div class="container-scroller">

        {{-- Sidebar Start --}}
        <nav class="sidebar sidebar-offcanvas bg-black" id="sidebar">

            {{-- Sidebar Brand Logo Start --}}
            <div class="bg-black sidebar-brand-wrapper d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo text-decoration-none" href="{{ url('/dashboard') }}">
                    <span class="text-white fw-bold fs-5">TECHSolution</span>
                </a>
                <a class="sidebar-brand brand-logo-mini" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('logo/brand-logo-white.webp') }}" alt="Brand Logo" />
                </a>
            </div>
            {{-- Sidebar Brand Logo End --}}

            {{-- Sidebar Navigation Start --}}
            <ul class="nav bg-black">

                {{-- Sidebar Profile Box Start --}}
                <li class="bg-black nav-item profile">
                    <div class="profile-desc">

                        {{-- Sidebar Profile Image & Name Start --}}
                        <div class="profile-pic">
                            <div class="count-indicator">
                                @if (isset(Auth::user()->foto))
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Profile Picture">
                                @else
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('storage/Pegawai/default/profile-user.png') }}"
                                        alt="Profile Picture">
                                @endif
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    {{ Auth::user()->nama }}
                                </h5>
                                <span class="text-white">
                                    {{ Auth::user()->department }}
                                    <br>
                                    {{ Auth::user()->golongan }}
                                </span>
                            </div>
                        </div>
                        {{-- Sidebar Profile Image & Name End --}}

                        {{-- Sidebar Profile 3 Dots Vertical Start --}}
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#threeDotsMenu">
                            <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                        </button>
                        {{-- Sidebar Profile 3 Dots Vertical End --}}

                    </div>
                </li>
                {{-- Sidebar Profile Box End --}}

                {{-- Sidebar Dashboard Start --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-table-columns text-white"></i>
                        </span>
                        <span class="menu-title text-white">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'SuperAdmin')
                    <li class="nav-item nav-category">
                        <span class="nav-link text-white">Admin Menu</span>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('/data-user') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-users text-white"></i>
                            </span>
                            <span class="menu-title text-white">User Data</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('admin/daftar-cuti') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-table-list text-white"></i>
                            </span>
                            <span class="menu-title text-white">Leave List</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('admin/izin') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-table-list text-white"></i>
                            </span>
                            <span class="menu-title text-white">Days Off List</span>
                        </a>
                    </li>
                    @if (Auth::user()->role == 'SuperAdmin')
                        <li class="nav-item menu-items">
                            <a class="nav-link" href="{{ url('/resign/daftar-resign') }}">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-table-list text-white"></i>
                                </span>
                                <span class="menu-title text-white">Resign List</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('data-lowongan/') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-suitcase text-white"></i>
                            </span>
                            <span class="menu-title text-white ">Vacancy List</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->golongan == 'Manager/Kadep')
                    <li class="nav-item nav-category">
                        <span class="nav-link text-white">Manager Menu</span>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('/employees-data') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-users text-white"></i>
                            </span>
                            <span class="menu-title text-white">User Data</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('kadep/daftar-cuti') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-table-list text-white"></i>
                            </span>
                            <span class="menu-title text-white">Leave List</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('kadep/daftar-perizinan') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-table-list text-white"></i>
                            </span>
                            <span class="menu-title text-white">Days Off List</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('kadep/daftar-resign') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-table-list text-white"></i>
                            </span>
                            <span class="menu-title text-white">Resign List</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item nav-category">
                    <span class="nav-link text-white">Employee Menu</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('#') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-calendar-days text-white"></i>
                        </span>
                        <span class="menu-title text-white">Absence</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('pegawai/cuti') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-file-signature text-white"></i>
                        </span>
                        <span class="menu-title text-white">Leave</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('pegawai/izin') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-file-signature text-white"></i>
                        </span>
                        <span class="menu-title text-white">Days Off</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('pegawai/resign') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-file-signature text-white"></i>
                        </span>
                        <span class="menu-title text-white">Resign</span>
                    </a>
                </li>
                {{-- Sidebar Dashboard End --}}

            </ul>
            {{-- Sidebar Navigation End --}}

        </nav>
        {{-- Sidebar End --}}

        {{-- Body Wrapper Start --}}
        <div class="container-fluid page-body-wrapper">

            {{-- Topbar Start --}}
            <nav class="navbar p-0 fixed-top d-flex flex-row justify-content-between">

                {{-- Topbar Brand Logo Responsive Media Start --}}
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center bg-black">
                    <a class="navbar-brand brand-logo-mini" href="{{ '/dashboard' }}">
                        <img src="{{ asset('logo/brand-logo-white.webp') }}" alt="Brand Logo" />
                    </a>
                </div>
                {{-- Topbar Brand Logo Responsive Media End --}}

                {{-- Topbar Menu Start --}}
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch bg-black">

                    {{-- Topbar Hamburger Menu Start --}}
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <i class="fa-solid fa-bars text-white"></i>
                    </button>
                    {{-- Topbar Hamburger Menu End --}}

                    {{-- Topbar Menu Right Side Start --}}
                    <ul class="navbar-nav navbar-nav-right">

                        {{-- Topbar Menu Right Side Mail Start --}}
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-envelope text-white"></i>
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list bg-white border-secondary"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0 text-black">Messages</h6>
                                <div class="dropdown-divider bg-secondary"></div>
                                <p class="p-3 mb-0 text-center text-black">3 new messages</p>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('template/assets/images/faces/face4.jpg') }}"
                                            alt="image" class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-black">Mark send you a message</p>
                                        <p class="text-muted mb-0 text-black"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center text-decoration-none p-3 mb-0 text-black"
                                    href="#">See
                                    all messages</a>
                            </div>
                        </li>
                        {{-- Topbar Menu Right Side Mail End --}}

                        {{-- Topbar Menu Right Side Information Start --}}
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown"
                                href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-bell text-white"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list bg-white border-secondary"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0 text-black">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item text-black">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-white"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item text-black">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-white"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item text-black">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-white"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center text-decoration-none p-3 mb-0 text-black"
                                    href="#">See
                                    all notifications</a>
                            </div>
                        </li>
                        {{-- Topbar Menu Right Side Information End --}}

                        {{-- Topbar Menu Right Side Advandce Settings Start --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    @guest
                                        <p class="mb-0 ms-2 d-none d-sm-block navbar-profile-name text-white">Login</p>
                                    @else
                                        @if (isset(Auth::user()->foto))
                                            <img class="img-xs rounded-circle"
                                                src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Profile Picture">
                                        @else
                                            <img class="img-xs rounded-circle"
                                                src="{{ asset('storage/Pegawai/default/profile-user.png') }}"
                                                alt="Profile Picture">
                                        @endif
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                            {{ Auth::user()->nama }}
                                            <i class="fa-solid fa-caret-down text-white"></i>
                                        @endguest
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list bg-white border-secondary"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0 text-black fw-bold">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item text-black bg-white">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success rounded-circle">
                                            <i class="fa-solid fa-gear text-white"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item text-black bg-white"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-danger rounded-circle">
                                            <i class="fa-solid fa-right-from-bracket text-white"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center text-black">Advanced settings</p>
                            </div>
                        </li>
                        {{-- Topbar Menu Right Side Advandce Settings End --}}

                    </ul>
                    {{-- Topbar Menu Right Side End --}}

                    {{-- Topbar Hamburger Menu Responsive Media Start --}}
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ms-auto"
                        type="button" data-toggle="offcanvas">
                        <i class="fa-solid fa-bars text-white"></i>
                    </button>
                    {{-- Topbar Hamburger Menu Responsive Media End --}}

                </div>
                {{-- Topbar Menu End --}}

            </nav>
            {{-- Topbar End --}}

            {{-- Main Panel Start --}}
            <div class="main-panel">

                {{-- Main Content Start --}}
                <div class="content-wrapper">
                    @yield('content')
                </div>
                {{-- Main Content End --}}

            </div>
            {{-- Main Panel End --}}

        </div>
        {{-- Body Wrapper End --}}

    </div>
    {{-- Container Scroller End --}}

    <div class="modal fade" id="threeDotsMenu" tabindex="1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h1 class="text-black fs-3 ms-3 fw-bold" id="exampleModalLabel">User Menu
                    </h1>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark m-auto"></i>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column">
                    <a href="{{ url('/Account/account-setting') }}" class="btn btn-primary my-1">
                        <i class="fa-solid fa-gear"></i>
                        <span>Profile Settings</span>
                    </a>
                    <a href="{{ url('/profile/signature') }}" class="btn btn-primary my-1">
                        <i class="fa-solid fa-file-signature"></i>
                        <span>Digital Signature</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

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

    {{-- Ajax --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/alamat.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    {{-- Digital Signature --}}
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
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
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function() {
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
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
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

        $('#save').click(function(e) {
            document.getElementById("signature").value = signaturePad.toDataURL();

            document.getElementById("myForm").submit();
        });


        cancelButton.addEventListener('click', function(event) {
            signaturePad.clear();
        });

        // End Signature Pad
    </script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault
        })
    </script>
</body>

</html>
