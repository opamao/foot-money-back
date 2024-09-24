@extends('layouts.master', [
    'titre' => 'Clubs',
    'title' => 'Clubs',
])

@push('haut')
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/sweetalert/sweetalert.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/dropify/css/dropify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@push('bas')
    <script src="{{ asset('') }}assets/bundles/sweetalert.bundle.js"></script>
    <script src="{{ asset('') }}assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{ asset('assets') }}/assets/js/page/sweetalert.js"></script>
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
                                    <button class="btn btn-primary btn-block mb-1" title="">Recherche</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.status')
    <div class="section-body">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="list" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="table-responsive" id="users">
                                <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @forelse ($clubs as $listClub)
                                            <tr class>
                                                <td class="width35 hidden-xs">
                                                    {{ $i++ }}
                                                </td>
                                                <td class="text-center width40">
                                                    <div class="avatar d-block">
                                                        <img class="avatar"
                                                            src="{{ asset('clubsequipe') . '/' . $listClub->logo_club }}"
                                                            alt="avatar">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div><a href="javascript:void(0);">{{ $listClub->nom_club }}</a></div>
                                                    <div class="text-muted">{{ $listClub->phone_club }}</div>
                                                </td>
                                                <td class="hidden-xs">
                                                    <div class="text-muted">
                                                        <a href="#" class="">{{ $listClub->email_club }}</a>
                                                    </div>
                                                </td>
                                                <td class="hidden-sm">
                                                    <div class="text-muted">
                                                        {{ $listClub->ville_club }}
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <a class="btn btn-sm btn-link"
                                                        href="{{ route('clubs.show', $listClub->id_club) }}"
                                                        title="Détails"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-link" href="{{ route('clubs.edit', $listClub->id_club) }}"
                                                        title="Modifier"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-sm btn-link hidden-xs"
                                                        data-bs-toggle="modal" data-bs-target="#delete" title="Supprimer"><i
                                                            class="fa fa-trash"></i></button>
                                                    <div class="modal fade" id="delete" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-white"
                                                                    style="background: red;">
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
                                        @empty
                                            <tr>
                                                <strong style="color: red;">
                                                    Pas de club disponible
                                                </strong>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="grid" role="tabpanel">
                    <div class="row row-deck">
                        @forelse ($clubs as $listRespo)
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-status bg-blue"></div>
                                        <div class="mb-3"> <img
                                                src="{{ $listRespo->photo_respo_club == '' ? asset('assets/images/sm/avatar1.jpg') : asset('presis') . '/' . $listRespo->photo_respo_club }}"
                                                class="rounded-circle w100" alt> </div>
                                        <div class="mb-2">
                                            <h5 class="mb-0">{{ $listRespo->nom_respo_club }}</h5>
                                            <h5 class="mb-0">{{ $listRespo->phone_respo_club }}</h5>
                                            <a href="#">{{ $listRespo->email_respo_club }}</a>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <div class="d-flex align-items-center px-2">
                                            <img class="avatar avatar-md mr-3"
                                                src="{{ asset('clubsequipe') . '/' . $listRespo->logo_club }}"
                                                alt="">
                                            <div>
                                                <div>{{ $listRespo->nom_club }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <strong style="color: red;">
                                Président de club non disponible
                            </strong>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="addnew" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ajout d'un club</h3>
                                </div>
                                <form class="card-body" method="POST" action="{{ route('clubs.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-md-12 col-sm-12">
                                            <h5>Information sur le club</h5>
                                        </div>
                                        <br>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Nom club</label>
                                                <input required name="club" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Localité</label>
                                                <input required name="localite" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                <input name="phone" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="emailclub" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Site Web</label>
                                                <input name="site" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-2 mb-3">
                                                <input required name="logo" type="file" class="dropify">
                                                <small id="fileHelp" class="form-text text-muted">Veuillez cliquer dans
                                                    le cadre pour choisir le logo du club.</small>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12 col-sm-12">
                                            <h5>Information sur le président</h5>
                                        </div>
                                        <br>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input required name="president" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                <input name="telephone" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="emailrespo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Site Web</label>
                                                <input name="siterespo" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-2 mb-3">
                                                <input name="image" type="file" class="dropify" accept="image/*">
                                                <small id="fileHelp" class="form-text text-muted">Veuillez cliquer dans
                                                    le cadre pour choisir la photo du président.</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            <button type="reset" class="btn btn-outline-secondary">Annuler</button>
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
