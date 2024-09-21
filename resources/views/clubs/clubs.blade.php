@extends('layouts.master', [
    'titre' => 'Clubs',
    'title' => 'Clubs',
])

@push('haut')
    <link rel="stylesheet" href="../assets/plugins/sweetalert/sweetalert.css" />
    <link rel="stylesheet" href="../assets/plugins/dropify/css/dropify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@push('bas')
    <script src="../assets/bundles/sweetalert.bundle.js"></script>
    <script src="../assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="assets/js/page/sweetalert.js"></script>
    <script>
        $(function() {
            "use strict";

            $('.dropify').dropify();

            var drEvent = $('#dropify-event').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
        });
    </script>
@endpush

@section('content')
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex justify-content-between">
                                <ul class="nav nav-tabs b-none">
                                    <li class="nav-item"><a class="nav-link active" id="list-tab" data-toggle="tab"
                                            href="#list"><i class="fa fa-list-ul"></i>
                                            Liste</a></li>
                                    <li class="nav-item"><a class="nav-link" id="grid-tab" data-toggle="tab"
                                            href="#grid"><i class="fa fa-th"></i>
                                            Présidents</a></li>
                                    <li class="nav-item"><a class="nav-link" id="addnew-tab" data-toggle="tab"
                                            href="#addnew"><i class="fa fa-plus"></i> Ajouter un club</a></li>
                                </ul>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-9 col-md-8 col-sm-12">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control search" placeholder="Recherche...">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <button class="btn btn-primary btn-block mb-1"
                                        title="">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="list" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="table-responsive" id="users">
                                <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                                    <tbody>
                                        <tr class>
                                            <td class="width35 hidden-xs">
                                                1
                                            </td>
                                            <td class="text-center width40">
                                                <div class="avatar d-block">
                                                    <img class="avatar" src="../assets/images/xs/avatar4.jpg"
                                                        alt="avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div><a href="javascript:void(0);">Nom club</a></div>
                                                <div class="text-muted">+264-625-2583</div>
                                            </td>
                                            <td class="hidden-xs">
                                                <div class="text-muted">
                                                    <a href="#" class="">adresse e-mail</a>
                                                </div>
                                            </td>
                                            <td class="hidden-sm">
                                                <div class="text-muted">
                                                    situation géographique
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a class="btn btn-sm btn-link" href="{{ url('details-clubs') }}"
                                                    title="Détails"><i class="fa fa-eye"></i></a>
                                                <button type="button" class="btn btn-sm btn-link hidden-xs"
                                                    data-bs-toggle="modal" data-bs-target="#delete" title="Supprimer"><i
                                                        class="fa fa-trash"></i></button>
                                                <div class="modal fade" id="delete" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-white" style="background: red;">
                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                    Suppression
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                Voulez-vous supprimer?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="button"
                                                                    class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="grid" role="tabpanel">
                    <div class="row row-deck">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="card-status bg-blue"></div>
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar1.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Paul Schmidt</h5>
                                        <p class="text-muted"><a href="../../../../cdn-cgi/l/email-protection.html"
                                                class="__cf_email__"
                                                data-cfemail="f3b2929f9a899696879b9c9e9280b39a9d959cdd909c9e">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar8.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar2.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Andrew Patrick</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="753414191c0f1010011d1a181406351c1b131a5b161a18">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar3.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Mary Schneider</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="7d3c1c1114071818091512101c0e3d14131b12531e1210">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="card-status bg-green"></div>
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar4.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Sean Black</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="4706262b2e3d2222332f282a2634072e2921286924282a">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar6.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar5.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar5.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">David Wallace</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="afeecec3c6d5cacadbc7c0c2cedcefc6c1c9c081ccc0c2">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="card-status bg-pink"></div>
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar6.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Andrew Patrick</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="bafbdbd6d3c0dfdfced2d5d7dbc9fad3d4dcd594d9d5d7">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar5.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar6.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar2.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Michelle Green</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="4203232e2b382727362a2d2f2331022b2c242d6c212d2f">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar8.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="mb-3"> <img src="../assets/images/sm/avatar4.jpg"
                                            class="rounded-circle w100" alt> </div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">Mary Schneider</h5>
                                        <p><a href="../../../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                                data-cfemail="2d6c4c4144574848594542404c5e6d44434b42034e4240">[email&#160;protected]</a>
                                        </p>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
                                            deleniti fugit incidunt</span>
                                    </div>
                                    <span class="font-12 text-muted">Common Contact</span>
                                    <ul class="list-unstyled team-info margin-0 pt-2">
                                        <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                        <li><img src="../assets/images/xs/avatar7.jpg" alt="Avatar"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="addnew" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Client</h3>
                                    <div class="card-options ">
                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                                class="fe fe-chevron-up"></i></a>
                                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                                                class="fe fe-x"></i></a>
                                    </div>
                                </div>
                                <form class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input data-provide="datepicker" data-date-autoclose="true"
                                                    class="form-control" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <label>Gender</label>
                                            <select class="form-control show-tick">
                                                <option value>-- Gender --</option>
                                                <option value="10">Male</option>
                                                <option value="20">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Enter Your Email</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Website URL</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>LinkedIN</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Behance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-2 mb-3">
                                                <input type="file" class="dropify">
                                                <small id="fileHelp" class="form-text text-muted">This is some
                                                    placeholder block-level help text for the above input. It's a bit
                                                    lighter and easily wraps to a new line.</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-3">
                                                <label>Messages</label>
                                                <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
