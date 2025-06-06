@extends('layouts.master', [
    'titre' => 'Tableau de bord',
    'title' => 'Tableau de bord',
])

@push('haut')
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/charts-c3/c3.min.css" />
@endpush
@push('bas')
    <script src="{{ asset('') }}assets/bundles/lib.vendor.bundle.js"></script>
    <script src="{{ asset('') }}assets/bundles/knobjs.bundle.js"></script>
    <script src="{{ asset('') }}assets/bundles/c3.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/page/project-index.js"></script>
@endpush
@section('content')
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h4>Bienvenu Richards!</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix row-deck">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nombre de joueurs</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="number mb-0 font-32 counter">31</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nombre de vote</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="number mb-0 font-32 counter">245</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dons</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="number mb-0 font-32 counter">500 000 000 FCFA</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nombre utilisateur</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="number mb-0 font-32 counter">12</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="row clearfix row-deck">
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Transaction historique</h3>
                            <div class="card-options">
                                <div class="item-action dropdown ml-2">
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-eye"></i> View Details </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-folder"></i> Move to</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-edit"></i> Rename</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table card-table mt-2">
                            <tbody>
                                <tr>
                                    <td class="w60"><img class="avatar" src="../assets/images/xs/avatar1.jpg"
                                            alt="Avatar"></td>
                                    <td>
                                        <p class="mb-0 d-flex justify-content-between"><span>Payment from
                                                #2583</span> <strong>$300</strong></p>
                                        <span class="text-muted font-13">Feb 21, 2019</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w60"><img class="avatar" src="../assets/images/xs/avatar2.jpg"
                                            alt="Avatar"></td>
                                    <td>
                                        <p class="mb-0 d-flex justify-content-between"><span>Payment from
                                                #1245</span> <strong>$1200</strong></p>
                                        <span class="text-muted font-13">March 14, 2019</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w60"><img class="avatar" src="../assets/images/xs/avatar3.jpg"
                                            alt="Avatar"></td>
                                    <td>
                                        <p class="mb-0 d-flex justify-content-between"><span>Payment from
                                                #8596</span> <strong>$780</strong></p>
                                        <span class="text-muted font-13">March 18, 2019</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w60"><img class="avatar" src="../assets/images/xs/avatar4.jpg"
                                            alt="Avatar"></td>
                                    <td>
                                        <p class="mb-0 d-flex justify-content-between"><span>Payment from
                                                #1526</span> <strong>$841</strong></p>
                                        <span class="text-muted font-13">April 27, 2019</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w60"><img class="avatar" src="../assets/images/xs/avatar5.jpg"
                                            alt="Avatar"></td>
                                    <td>
                                        <p class="mb-0 d-flex justify-content-between"><span>Payment from
                                                #4859</span> <strong>$235</strong></p>
                                        <span class="text-muted font-13">March 18, 2019</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer Satisfaction</h3>
                            <div class="card-options">
                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                                <div class="item-action dropdown ml-2">
                                    <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-eye"></i> View Details </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-folder"></i> Move to</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-edit"></i> Rename</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-baseline">
                                <h1 class="mb-0 mr-2">9.8</h1>
                                <p class="mb-0"><span class="text-success">1.6% <i class="fa fa-arrow-up"></i></span>
                                </p>
                            </div>
                            <h6 class="text-uppercase font-10">Performance Score</h6>
                            <div class="progress progress-xs">
                                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-orange" role="progressbar" style="width: 5%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-indigo" role="progressbar" style="width: 13%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter mb-0">
                                <tbody>
                                    <tr>
                                        <td class="tx-medium"><i class="fa fa-circle text-blue"></i> Excellent
                                        </td>
                                        <td class="text-right">3,007</td>
                                        <td class="text-right">50%</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-medium"><i class="fa fa-circle text-success"></i> Very
                                            Good</td>
                                        <td class="text-right">1,674</td>
                                        <td class="text-right">25%</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-medium"><i class="fa fa-circle text-info"></i> Good</td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">6%</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-medium"><i class="fa fa-circle text-orange"></i> Fair
                                        </td>
                                        <td class="text-right">98</td>
                                        <td class="text-right">5%</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-medium"><i class="fa fa-circle text-indigo"></i> Poor
                                        </td>
                                        <td class="text-right">512</td>
                                        <td class="text-right">10%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Overall Rating</h3>
                            <div class="card-options">
                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                                <div class="item-action dropdown ml-2">
                                    <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                        style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-eye"></i> View Details </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-folder"></i> Move to</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-edit"></i> Rename</a>
                                        <a href="javascript:void(0)" class="dropdown-item"><i
                                                class="dropdown-icon fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-baseline">
                                <h2 class="font-28 mr-2">4.2</h2>
                                <div class="font-14">
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p class="mb-0 font-12">Overall the quality or your support team’s efforts Rating.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-vcenter mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>5.0</strong></td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </td>
                                        <td class="text-right">432</td>
                                        <td class="text-right">58%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>4.0</strong></td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                        <td class="text-right">189</td>
                                        <td class="text-right">42%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>3.0</strong></td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                        <td class="text-right">125</td>
                                        <td class="text-right">23%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>2.0</strong></td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                        <td class="text-right">89</td>
                                        <td class="text-right">18%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>1.0</strong></td>
                                        <td>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </td>
                                        <td class="text-right">18</td>
                                        <td class="text-right">11%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Project Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Team</th>
                                            <th>Project</th>
                                            <th>Project Cost</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#AD1245</td>
                                            <td>Sean Black</td>
                                            <td>
                                                <ul class="list-unstyled team-info sm margin-0 w150">
                                                    <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                    <li class="ml-2"><span>2+</span></li>
                                                </ul>
                                            </td>
                                            <td>Angular Admin</td>
                                            <td>$14,500</td>
                                            <td>Done</td>
                                            <td><span class="tag tag-success">Delivered</span></td>
                                        </tr>
                                        <tr>
                                            <td>#DF1937</td>
                                            <td>Sean Black</td>
                                            <td>
                                                <ul class="list-unstyled team-info sm margin-0 w150">
                                                    <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                    <li class="ml-2"><span>2+</span></li>
                                                </ul>
                                            </td>
                                            <td>Angular Admin</td>
                                            <td>$14,500</td>
                                            <td>Pending</td>
                                            <td><span class="tag tag-success">Delivered</span></td>
                                        </tr>
                                        <tr>
                                            <td>#YU8585</td>
                                            <td>Merri Diamond</td>
                                            <td>
                                                <ul class="list-unstyled team-info sm margin-0 w150">
                                                    <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                </ul>
                                            </td>
                                            <td>One page html Admin</td>
                                            <td>$500</td>
                                            <td>Done</td>
                                            <td><span class="tag tag-orange">Submit</span></td>
                                        </tr>
                                        <tr>
                                            <td>#AD1245</td>
                                            <td>Sean Black</td>
                                            <td>
                                                <ul class="list-unstyled team-info sm margin-0 w150">
                                                    <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                </ul>
                                            </td>
                                            <td>Wordpress One page</td>
                                            <td>$1,500</td>
                                            <td>Done</td>
                                            <td><span class="tag tag-success">Delivered</span></td>
                                        </tr>
                                        <tr>
                                            <td>#GH8596</td>
                                            <td>Allen Collins</td>
                                            <td>
                                                <ul class="list-unstyled team-info sm margin-0 w150">
                                                    <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                    <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                    <li class="ml-2"><span>2+</span></li>
                                                </ul>
                                            </td>
                                            <td>VueJs Application</td>
                                            <td>$9,500</td>
                                            <td>Done</td>
                                            <td><span class="tag tag-success">Delivered</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
