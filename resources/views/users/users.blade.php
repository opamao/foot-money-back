@extends('layouts.master', [
    'titre' => 'Utilisateurs',
    'title' => 'Utilisateurs',
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
    <div class="section-body">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="list" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="table-responsive" id="users">
                                <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                                    <tbody>
                                        @forelse ($users as $list)
                                            <?php $i = 1; ?>
                                            <tr class>
                                                <td class="width35 hidden-xs">
                                                    {{ $i++ }}
                                                </td>
                                                <td>
                                                    <div><a href="javascript:void(0);">{{ $list->nom_user }}
                                                            {{ $list->prenom_user }}</a></div>
                                                    <div class="text-muted">{{ $list->phone_user }}</div>
                                                </td>
                                                <td class="hidden-xs">
                                                    <div class="text-muted">
                                                        <a href="#" class="">{{ $list->email_user }}</a>
                                                    </div>
                                                </td>
                                                <td class="hidden-sm">
                                                    <div class="text-muted">
                                                        {{ $list->commune_user }}
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <a class="btn btn-sm btn-link" href="#" title="Détails"><i
                                                            class="fa fa-eye"></i></a>
                                                    <button type="button" class="btn btn-sm btn-link hidden-xs"
                                                        data-bs-toggle="modal" data-bs-target="#delete{{ $list->id_user }}"
                                                        title="Supprimer"><i class="fa fa-trash"></i></button>
                                                    <div class="modal fade" id="delete{{ $list->id_user }}"
                                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-white"
                                                                    style="background: red;">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                                        Suppression
                                                                    </h5>
                                                                </div>
                                                                <form action="{{ route('users.destroy', $list->id_user) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-body text-left">
                                                                        Voulez-vous supprimer?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Annuler</button>
                                                                        <button type="button"
                                                                            class="btn btn-danger">Supprimer</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <strong style="color: red;">
                                                Pas d'utilisateur disponible
                                            </strong>
                                        @endforelse
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
