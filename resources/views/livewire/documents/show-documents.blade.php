<div>
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="mb-0">{{ Auth::user()->customer->company_name }}</h6>
            </div>
            <div class="col-xl-2 col-sm-6 text-end">
                <livewire:documents.create-folder />
            </div>
            <div class="col-xl-2 col-sm-6 text-end">
                <button type="button" class="btn btn-info btn-sm mb-0">
                    <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                    <span class="btn-inner--text">&nbsp; Upload file</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Owner</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last modified</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($folders as $folder)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1 cursor-pointer">
                                <!-- <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                            </div> -->
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $folder->folder_name }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $folder->description}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $folder->user->username }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{ $folder->created_at }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> --- </span>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>