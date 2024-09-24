@extends('layouts.master', [
    'titre' => 'Details Clubs',
    'title' => 'Détails Clubs',
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
                                    <li class="nav-item"><a class="nav-link active" id="grid-tab" data-toggle="tab"
                                            href="#grid"><i class="fa fa-th"></i>
                                            Joueurs</a></li>
                                    <li class="nav-item"><a class="nav-link" id="addnew-tab" data-toggle="tab"
                                            href="#addnew"><i class="fa fa-plus"></i> Ajouter un joueur</a></li>
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
                <div class="tab-pane fade show active" id="grid" role="tabpanel">
                    <div class="row row-cards">
                        <div class="col-sm-12 col-md-12">
                            <div class="card p-3">
                                <div class="d-flex align-items-center px-2">
                                    <img class="avatar avatar-md mr-3"
                                        src="{{ $club->logo_club == '' ? asset('assets/images/xs/avatar1.jpg') : asset('clubsequipe') . '/' . $club->logo_club }}"
                                        alt="">
                                    <div>
                                        <div>{{ $club->nom_club }}</div>
                                        <small class="d-block text-muted">{{ $club->ville_club }}</small>
                                    </div>
                                    <div class="ml-auto text-muted">
                                        <a href="javascript:void(0)" title="Téléphone">{{ $club->phone_club }}</a>
                                        <a href="javascript:void(0)" class="d-none d-md-inline-block ml-3"
                                            title="Email">{{ $club->email_club }}</a>
                                        <a href="javascript:void(0)" class="d-none d-md-inline-block ml-3"
                                            title="Email">{{ $club->website_club }}</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center px-2">
                                    <img class="avatar avatar-md mr-3"
                                        src="{{ $club->photo_respo_club == '' ? asset('assets/images/xs/avatar1.jpg') : asset('clubsequipe') . '/' . $club->photo_respo_club }}"
                                        alt="">
                                    <div>
                                        <div>{{ $club->nom_respo_club }}</div>
                                        <small class="d-block text-muted">Propriétaire</small>
                                    </div>
                                    <div class="ml-auto text-muted">
                                        <a href="javascript:void(0)" title="Téléphone">{{ $club->phone_respo_club }}</a>
                                        <a href="javascript:void(0)" class="d-none d-md-inline-block ml-3"
                                            title="Email">{{ $club->email_respo_club }}</a>
                                        <a href="javascript:void(0)" class="d-none d-md-inline-block ml-3"
                                            title="Email">{{ $club->website_respo_club }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @forelse ($joueurs as $listJoueur)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-3">
                                    <a href="javascript:void(0)" class="mb-3" data-bs-toggle="modal"
                                        data-bs-target="#view{{ $listJoueur->id_joue }}">
                                        <img src="{{ $listJoueur == '' ? asset('assets/images/gallery/1.jpg') : asset('photojoueur' . '/' . $listJoueur->photo_joue) }}"
                                            alt="" class="rounded">
                                    </a>
                                    <div class="modal fade" id="view{{ $listJoueur->id_joue }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                        Détails
                                                    </h5>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <img src="{{ $listJoueur == '' ? asset('assets/images/gallery/1.jpg') : asset('photojoueur' . '/' . $listJoueur->photo_joue) }}"
                                                        alt="" class="rounded">
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <strong for="name">Nom & prénom</strong>
                                                            <p>{{ $listJoueur->nom_joue }} {{ $listJoueur->prenom_joue }}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <strong for="name">Date de naissance</strong>
                                                            <p>{{ $listJoueur->naissance_joue }}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <strong for="name">Téléphone</strong>
                                                            <p>{{ $listJoueur->phone_joue }}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <strong for="name">Adresse e-mail</strong>
                                                            <p>{{ $listJoueur->email_joue }}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <strong for="name">Poste</strong>
                                                            <p>{{ $listJoueur->poste_joue }}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <strong for="name">Dossards</strong>
                                                            <p>{{ $listJoueur->dossard_joue }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Compris</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center px-2">
                                        <div>
                                            <div>{{ $listJoueur->nom_joue }} {{ $listJoueur->prenom_joue }}</div>
                                            <small class="d-block text-muted">{{ $listJoueur->poste_joue }}</small>
                                        </div>
                                        <div class="ml-auto text-muted text-right">
                                            <a href="javascript:void(0)" class="icon" title="Gains"><i
                                                    class="fe fe-heart mr-1"></i> 2 000 000 F</a>
                                            <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"
                                                title="Vote"><i class="fe fe-star mr-1"></i> 42</a>
                                            <br>
                                            <a href="javascript:void(0)" class="icon" title="Modifier"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $listJoueur->id_joue }}"><i
                                                    class="fe fe-edit mr-1" style="color: blue"></i></a>
                                            <div class="modal fade" id="edit{{ $listJoueur->id_joue }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 800px;">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-white" style="background: blue;">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                Modification
                                                            </h5>
                                                        </div>
                                                        <form method="POST" action="{{ url('update-player') }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body text-left">
                                                                <input type="hidden" name="joueur"
                                                                    value="{{ $listJoueur->id_joue }}">
                                                                <div class="row clearfix">
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Nom</label>
                                                                            <input value="{{ $listJoueur->nom_joue }}"
                                                                                required name="name" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Prénom</label>
                                                                            <input value="{{ $listJoueur->prenom_joue }}"
                                                                                required name="lastname" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Date de naissance</label>
                                                                            <input
                                                                                value="{{ $listJoueur->naissance_joue }}"
                                                                                name="date" type="date"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Poste</label>
                                                                            <input value="{{ $listJoueur->poste_joue }}"
                                                                                required name="poste" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Dossards</label>
                                                                            <input value="{{ $listJoueur->dossard_joue }}"
                                                                                required name="dossard" type="number"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Téléphone</label>
                                                                            <input value="{{ $listJoueur->phone_joue }}"
                                                                                required name="phone" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>E-mail</label>
                                                                            <input value="{{ $listJoueur->email_joue }}"
                                                                                name="email" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group mt-2 mb-3">
                                                                            <input name="photo" type="file"
                                                                                class="dropify">
                                                                            <small id="fileHelp"
                                                                                class="form-text text-muted">Veuillez
                                                                                cliquer dans
                                                                                l'espace pour choisir la photo du
                                                                                joueur.</small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="background: blue;">Modifier</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"
                                                title="Supprimer" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $listJoueur->id_joue }}"><i
                                                    class="fe fe-trash mr-1" style="color: red"></i></a>
                                            <div class="modal fade" id="delete{{ $listJoueur->id_joue }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-white" style="background: red;">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                Suppression
                                                            </h5>
                                                        </div>
                                                        <form action="{{ url('delete-player') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="joueur"
                                                                value="{{ $listJoueur->id_joue }}">
                                                            <div class="modal-body text-left">
                                                                Voulez-vous supprimer?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <em>
                                Le club n'a pas d'effectif. Vous pouvez cliquer sur <strong style="color: red;">Ajouter un
                                    joueur</strong> au dessus...
                            </em>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="addnew" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ajout d'un joueur</h3>
                                </div>
                                <form class="card-body" method="POST" action="{{ url('create-player') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="club" value="{{ $club->id_club }}">
                                    <div class="row clearfix">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input required name="name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input required name="lastname" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date de naissance</label>
                                                <input name="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Poste</label>
                                                <input required name="poste" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Dossards</label>
                                                <input required name="dossard" type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                <input required name="phone" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input name="email" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-2 mb-3">
                                                <input name="photo" type="file" class="dropify">
                                                <small id="fileHelp" class="form-text text-muted">Veuillez cliquer dans
                                                    l'espace pour choisir la photo du joueur.</small>
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
