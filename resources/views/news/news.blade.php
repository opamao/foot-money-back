@extends('layouts.master', [
    'titre' => 'Actualites',
    'title' => 'Actualités',
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
                                            Actualités</a></li>
                                    <li class="nav-item"><a class="nav-link" id="addnew-tab" data-toggle="tab"
                                            href="#addnew"><i class="fa fa-plus"></i> Ajouter actualité</a></li>
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
                        @forelse ($news as $list)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-3">
                                    <a href="javascript:void(0)" class="mb-3" data-bs-toggle="modal"
                                        data-bs-target="#view{{ $list->id_news }}">
                                        <img src="{{ $list->photo_news == '' ? asset('assets/images/gallery/1.jpg') : asset('actualites' . '/' . $list->photo_news) }}"
                                            alt="" class="rounded">
                                    </a>
                                    <div class="modal fade" id="view{{ $list->id_news }}" data-bs-backdrop="static"
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
                                                    <img src="{{ $list->photo_news == '' ? asset('assets/images/gallery/1.jpg') : asset('actualites' . '/' . $list->photo_news) }}"
                                                        alt="" class="rounded">
                                                    <hr>
                                                    <strong for="name">{{ $list->titre_news }}</strong>
                                                    <p>{{ $list->contenu_news }}
                                                    </p>
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
                                            <div>{{ $list->titre_news }}</div>
                                            <small class="d-block text-muted">{{ $list->created_at }}</small>
                                            <a href="javascript:void(0)" class="icon" title="Vues"><i
                                                    class="fe fe-eye mr-1"></i> {{ $list->view_news }}</a>
                                        </div>
                                        <div class="ml-auto text-muted">
                                            <a href="javascript:void(0)" class="icon" title="Modifier"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $list->id_news }}"><i
                                                    class="fe fe-edit mr-1" style="color: blue"></i></a>
                                            <div class="modal fade" id="edit{{ $list->id_news }}" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 800px;">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-white" style="background: blue;">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                Modification
                                                            </h5>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('news.update', $list->id_news) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body text-left">
                                                                <div class="row clearfix">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Titre</label>
                                                                            <input value="{{ $list->titre_news }}"
                                                                                required name="libelle" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group mt-3">
                                                                            <label>Contenu</label>
                                                                            <textarea required name="contenu" rows="4" class="form-control no-resize"
                                                                                placeholder="Veuillez saisir la description...">{{ $list->contenu_news }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group mt-2 mb-3">
                                                                            <input name="photo" type="file"
                                                                                class="dropify">
                                                                            <small id="fileHelp"
                                                                                class="form-text text-muted">Veuillez
                                                                                cliquer dans
                                                                                l'espace pour choisir la photo.</small>
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
                                                data-bs-target="#delete{{ $list->id_news }}"><i class="fe fe-trash mr-1"
                                                    style="color: red"></i></a>
                                            <div class="modal fade" id="delete{{ $list->id_news }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-white" style="background: red;">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                Suppression
                                                            </h5>
                                                        </div>
                                                        <form action="{{ route('news.destroy', $list->id_news) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
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
                                Pas d'actualité disponible. Vous pouvez cliquer sur <strong style="color: red;">Ajouter
                                    actualité</strong> au dessus...
                            </em>
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="addnew" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ajout d'actualité</h3>
                                </div>
                                <form class="card-body" method="POST" action="{{ route('news.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Titre</label>
                                                <input required name="libelle" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-3">
                                                <label>Contenu</label>
                                                <textarea required name="contenu" rows="4" class="form-control no-resize"
                                                    placeholder="Veuillez saisir la description..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-2 mb-3">
                                                <input required name="photo" type="file" class="dropify">
                                                <small id="fileHelp" class="form-text text-muted">Veuillez cliquer dans
                                                    l'espace pour choisir la photo.</small>
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
