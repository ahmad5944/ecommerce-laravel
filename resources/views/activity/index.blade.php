@extends('layouts.template')

@section('content')
    <div class="d-sm-flex justify-content-between">
        <div>
            <a href="javascript:;" class="btn btn-icon btn-outline-white">
                New Activity
            </a>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline">
                <a href="javascript:;" class="btn btn-outline-white dropdown-toggle " data-bs-toggle="dropdown"
                    id="navbarDropdownMenuLink2">
                    Filters
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2"
                    data-popper-placement="left-start">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Paid</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Refunded</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Canceled</a></li>
                    <li>
                        <hr class="horizontal dark my-2">
                    </li>
                    <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Filter</a></li>
                </ul>
            </div>
            <button class="btn btn-icon btn-outline-white ms-2 export" data-type="csv" type="button">
                <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
                <span class="btn-inner--text">Export CSV</span>
            </button>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Completion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">Tali Sepatu</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">working</span>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">60%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0">
                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">Pemasangan Sol</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-success"></i>
                                <span class="text-dark text-xs">done</span>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">100%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">Pewarnaan Sepatu</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-danger"></i>
                                <span class="text-dark text-xs">canceled</span>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">30%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="30" style="width: 30%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">QC Sepatu</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-danger"></i>
                                <span class="text-dark text-xs">canceled</span>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">0%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0"
                                            aria-valuemin="0" aria-valuemax="0" style="width: 0%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">Pembuatan Alas Sepatu</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">working</span>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">80%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80"
                                            aria-valuemin="0" aria-valuemax="80" style="width: 80%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">Pembuatan Insole</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-success"></i>
                                <span class="text-dark text-xs">done</span>
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs">100%</span>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
