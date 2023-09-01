@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ 'Tambah ' . $pageTitle }}</h4>
                    {{-- <button type="button" name="add" title="Add Multiple" id="add" class="btn btn-success btn-sm">+</button> --}}
                </div>
                <hr>
                <form method="POST" action="{{ route($routePath . '.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body" id="dynamicTable">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">Nama Permission</label>
                                    <input type="text" class="form-control" placeholder="user-list" name="name">
                                    <small class="text-danger">(Format Ada "list/create/edit/delete/show")</small>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="..." name="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-dark me-1 waves-effect waves-float waves-light">Submit</button>
                            <button type="reset"
                                class="btn btn-outline-danger me-1 waves-effect waves-float waves-light" >Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var i = 0;

        $("#add").click(function() {
            ++i;
            $("#dynamicTable").append(
                '<div class="row"><div class="col-md-12 col-12"><div class="mb-1"><label class="form-label">Nama Permission</label><input type="text" class="form-control" placeholder="user-list" name="name"><small class="text-danger">(Format Ada "list/create/edit/delete/show")</small></div><div class="mb-1"><label class="form-label">Deskripsi</label><textarea class="form-control" rows="5" placeholder="..." name="description"></textarea></div></div></div><div class="card-footer">'
            );
        });
    </script>
@endsection
