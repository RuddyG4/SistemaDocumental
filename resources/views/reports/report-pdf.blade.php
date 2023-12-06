<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/transparend-logo-icon.png') }}">
    <title>
        Report
    </title>

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col mt-xl-4 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <span class="col-12 col-sm-2"><b>Reporte personalizado</b></span>
                                <div class="mt-2 col-12 col-sm-2">
                                    @if ($option == 'per_month')
                                    <span class="col-12 col-sm-2">Reporte por mes (Del año en curso)</span>
                                    @elseif ($option == 'per_week')
                                    <span class="col-12 col-sm-2">Reporte de las últimas 8 semanas</span>
                                    @else
                                    <span class="col-12 col-sm-2">Reporte de los últimos 15 días</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Time')}}</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Folders viewed</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Folders downloaded</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Files viewed</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Files downloaded</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total_folder_viewed = 0;
                                        $total_folder_downloaded = 0;
                                        $total_file_viewed = 0;
                                        $total_file_downloaded = 0;
                                        @endphp
                                        @if ($option == 'per_month')
                                        @foreach ($times as $time)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $time }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['folders_viewed'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['folders_downloaded'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['files_viewed'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['files_downloaded'] }} </span>
                                            </td>
                                            @php
                                            $total_folder_viewed += $data[$time]['folders_viewed'];
                                            $total_folder_downloaded += $data[$time]['folders_downloaded'];
                                            $total_file_viewed += $data[$time]['files_viewed'];
                                            $total_file_downloaded += $data[$time]['files_downloaded'];
                                            @endphp
                                        </tr>
                                        @endforeach
                                        <tr class="bg-gray-200">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Total</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_folder_viewed }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_folder_downloaded }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_file_viewed }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_file_downloaded }} </span>
                                            </td>
                                        </tr>
                                        @elseif ($option == 'per_week')
                                        @foreach ($times as $index => $time)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">hace {{ $loop->index }} semana(s)</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$index]['folders_viewed'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$index]['folders_downloaded'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$index]['files_viewed'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$index]['files_downloaded'] }} </span>
                                            </td>
                                            @php
                                            $total_folder_viewed += $data[$index]['folders_viewed'];
                                            $total_folder_downloaded += $data[$index]['folders_downloaded'];
                                            $total_file_viewed += $data[$index]['files_viewed'];
                                            $total_file_downloaded += $data[$index]['files_downloaded'];
                                            @endphp
                                        </tr>
                                        @endforeach
                                        <tr class="bg-gray-200">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Total</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_folder_viewed }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_folder_downloaded }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_file_viewed }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_file_downloaded }} </span>
                                            </td>
                                        </tr>
                                        @elseif ($option == 'per_day')
                                        @foreach ($times as $time)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $time }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['folders_viewed'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['folders_downloaded'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['files_viewed'] }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $data[$time]['files_downloaded'] }} </span>
                                            </td>
                                            @php
                                            $total_folder_viewed += $data[$time]['folders_viewed'];
                                            $total_folder_downloaded += $data[$time]['folders_downloaded'];
                                            $total_file_viewed += $data[$time]['files_viewed'];
                                            $total_file_downloaded += $data[$time]['files_downloaded'];
                                            @endphp
                                        </tr>
                                        @endforeach
                                        <tr class="bg-gray-200">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Total</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_folder_viewed }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_folder_downloaded }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_file_viewed }} </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> {{ $total_file_downloaded }} </span>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    @stack('scripts')
</body>

</html>