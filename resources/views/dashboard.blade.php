<x-app :$permissions>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Folders</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $total_folders }}
                                    <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="fa fa-folder text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Files</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $total_files }}
                                    <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="fa fa-file text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $users_count }}
                                    <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pendientes de revision</p>
                                @if($cantidad_pendientes_revision>0)
                                <h5 class="font-weight-bolder mb-0">
                                    <a href="{{route('documents.index_files_revision')}}">{{$cantidad_pendientes_revision}}</a>
                                </h5>
                                @else
                                <h5 class="font-weight-bolder mb-0">
                                    {{$cantidad_pendientes_revision}}
                                </h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2">
                <div class="card-body p-3">
                    <div class="border-radius-lg py-3 pe-1 mb-3">
                        <div class="chart">
                            <canvas id="myChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        const ctx = document.getElementById('myChart');
        let data = @json($data);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Folders created', 'Files uploaded', 'Folders viewed', 'Files viewed', 'Folders downloaded', 'Files downloaded'],
                datasets: [{
                    label: '# of Votes',
                    data: [data.folders_created, data.files_uploaded, data.folders_viewed, data.files_viewed, data.folders_downloaded, data.files_downloaded],
                    backgroundColor: '#141727',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        height: 200
                    }
                }
            }
        });
    </script>
    @endpush
</x-app>