@extends('layouts.master', [
    'titre' => 'Matchs',
    'title' => 'Matchs',
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
                                            Liste de matchs</a></li>
                                    <li class="nav-item"><a class="nav-link" id="addnew-tab" data-toggle="tab"
                                            href="#addnew"><i class="fa fa-plus"></i> Ajouter un match</a></li>
                                </ul>
                            </div>
                            <form action="#" method="POST">
                                <div class="row mt-2">
                                    <div class="col-lg-9 col-md-8 col-sm-8">
                                        <div class="input-group mb-1">
                                            <select name="journee" required class="form-control show-tick">
                                                <option value="">-- Journée --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4">
                                        <button class="btn btn-primary btn-block mb-1" title="">Recherche</button>
                                    </div>
                                </div>
                            </form>
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
                                        @forelse ($matchs as $list)
                                            <tr class>
                                                <td class="width35 hidden-xs">
                                                    J{{ $list->journee }}
                                                </td>
                                                <td class="text-center width40">
                                                    <div class="avatar d-block">
                                                        <img class="avatar"
                                                            src="{{ asset('clubsequipe') . '/' . $list->equipe_one_logo }}"
                                                            alt="avatar">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div><a href="javascript:void(0);">{{ $list->equipe_one }}</a></div>
                                                </td>
                                                <td class="hidden-sm">
                                                    <div class="text-muted text-center">
                                                        <a href="#" class="">{{ $list->libelle_stade }}</a>
                                                        <br>
                                                        {{ $list->debut }} <br>{{ $list->heure }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"><a
                                                            href="javascript:void(0);">{{ $list->equipe_two }}</a></div>
                                                </td>
                                                <td class="text-center width40">
                                                    <div class="avatar d-block">
                                                        <img class="avatar"
                                                            src="{{ asset('clubsequipe') . '/' . $list->equipe_two_logo }}"
                                                            alt="avatar">
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <button type="button" class="btn btn-sm btn-link hidden-xs"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $list->id_match }}" title="Supprimer"><i
                                                            class="fa fa-trash"></i></button>
                                                    <div class="modal fade" id="delete{{ $list->id_match }}"
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
                                                                <form
                                                                    action="{{ route('matchs.destroy', $list->id_match) }}"
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
                                                Pas de match disponible
                                            </strong>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="addnew" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ajout de match</h3>
                                </div>
                                <form class="card-body" method="POST" action="{{ route('matchs.store') }}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-md-3 col-sm-12">
                                            <label>Journée</label>
                                            <select name="journee" required class="form-control show-tick">
                                                <option value="">-- Journée --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input required name="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Heure</label>
                                                <input required name="time" type="time" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <label>Stade</label>
                                            <select required name="stade" class="form-control show-tick">
                                                <option value="">-- Stade --</option>
                                                @foreach ($stades as $listStade)
                                                    <option value="{{ $listStade->id_stade }}">
                                                        {{ $listStade->libelle_stade }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <label>Club</label>
                                            <select name="equipeOne" required class="form-control show-tick">
                                                <option value="">-- Equipe1 --</option>
                                                @foreach ($clubs as $listClub1)
                                                    <option value="{{ $listClub1->id_club }}">
                                                        {{ $listClub1->nom_club }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <label>Club</label>
                                            <select required name="equipeTwo" class="form-control show-tick">
                                                <option value="">-- Equipe2 --</option>
                                                @foreach ($clubs as $listClub2)
                                                    <option value="{{ $listClub2->id_club }}">
                                                        {{ $listClub2->nom_club }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mt-2">
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
