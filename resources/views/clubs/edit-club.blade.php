@extends('layouts.master', [
    'titre' => 'Clubs',
    'title' => 'Clubs',
])

@push('haut')
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/dropify/css/dropify.min.css">
@endpush
@push('bas')
    <script src="{{ asset('') }}assets/bundles/sweetalert.bundle.js"></script>
    <script src="{{ asset('') }}assets/plugins/dropify/js/dropify.min.js"></script>
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
<br>
    @include('layouts.status')
    <div class="section-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Modification</h3>
                    </div>
                    <form class="card-body" method="POST" action="{{ route('clubs.update', $club->id_club) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row clearfix">
                            <div class="col-md-12 col-sm-12">
                                <h5>Information sur le club</h5>
                            </div>
                            <br>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Nom club</label>
                                    <input value="{{ $club->nom_club }}" required name="club" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Localité</label>
                                    <input value="{{ $club->ville_club }}" required name="localite" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input value="{{ $club->phone_club }}" name="phone" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input value="{{ $club->email_club }}" type="email" name="emailclub" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Site Web</label>
                                    <input value="{{ $club->website_club }}" name="site" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mt-2 mb-3">
                                    <input name="logo" type="file" class="dropify">
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
                                    <input value="{{ $club->nom_respo_club }}" required name="president" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input value="{{ $club->phone_respo_club }}" name="telephone" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input value="{{ $club->email_respo_club }}" type="email" name="emailrespo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Site Web</label>
                                    <input value="{{ $club->website_respo_club }}" name="siterespo" type="text" class="form-control">
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
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
