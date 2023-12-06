<div class="row">
    <div class="col mt-xl-4 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <span class="col-12 col-sm-2"><b>Select time :</b></span>
                    <div class="form-check mt-2 col-12 col-sm-2">
                        <input class="form-check-input" type="radio" wire:model.live="option" value="per_month" id="per_month">
                        <label class="custom-control-label" for="per_month">Per month</label>
                    </div>
                    <div class="form-check col-12 col-sm-3">
                        <input class="form-check-input" type="radio" wire:model.live="option" value="per_week" id="per_week">
                        <label class="custom-control-label" for="per_week">Per week (Last 8 weeks)</label>
                    </div>
                    <div class="form-check col-12 col-sm-3">
                        <input class="form-check-input" type="radio" wire:model.live="option" value="per_day" id="per_day">
                        <label class="custom-control-label" for="per_day">Per day (Last 15 day)</label>
                    </div>
                    <div class="col-12 col-sm-2">
                        <a href="{{ route('reports.pdf', $option) }}" class="btn btn-warning text-dark"><i class="fa-solid fa-download"></i> &nbsp; PDF</a>
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