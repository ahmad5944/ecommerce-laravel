<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        Kepegawaian
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}"rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">

            <div class="card">
                <form method="POST" action="{{ route('user.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body text-center">
                        <span class="text-danger">Akun anda belum ter verifikasi!</span>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
