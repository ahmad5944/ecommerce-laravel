@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'Tambah ' . $pageTitle }}</h5>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning btn-sm"><i
                            class="ni ni-bold-left"></i>
                        Back</a>
                </div>
            </div><br>
            <div class="card">
                <form method="POST" action="{{ route($routePath . '.store') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Permission</label>
                                    <table class="table table-bordered">
                                        <tr class="bg-success">
                                            <td width="1%">
                                                <label class="checkbox">
                                                    <input id="head" type="checkbox">
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="head" class="m-0 text-white">Check All</label>
                                            </td>
                                        </tr>
                                        @php
                                            $lastp = '';
                                        @endphp
                                        @foreach ($permissions as $value)
                                            @php
                                                $v = '';
                                                $title = explode('-', $value->name);
                                                foreach ($title as $key => $ve) {
                                                    if ($key != count($title) - 1) {
                                                        $v .= ucfirst($ve . ' ');
                                                    }
                                                }
                                                $v = str_replace(' ', '-', $v);
                                            @endphp

                                            @if ($lastp != $v)
                                                <tr class="bg-primary">
                                                    <td>
                                                        <label class="checkbox checkbox-success">
                                                            <input class="head-2" data-child=".{{ $v }}"
                                                                type="checkbox" id="{{ $v }}-head">
                                                            <span></span>
                                                            <label class="checkbox">
                                                    </td>
                                                    <td>
                                                        <label for="{{ $v }}-head"
                                                            class="m-0 text-white">{{ str_replace('-', ' ', $v) }}</label>
                                                    </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td width="1%">
                                                    <label class="checkbox">
                                                        {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name all ' . $v, 'id' => $value->name]) }}
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label for="{{ $value->name }}"
                                                        class="m-0">{{ $value->name }}</label>
                                                </td>
                                            </tr>

                                            @php
                                                $lastp = $v;
                                            @endphp
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary me-1 waves-effect waves-float waves-light btn-sm font-small-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#head').click(function() {
            $(".all").prop('checked', this.checked);
            $(".head-2").prop('checked', this.checked);
        });
        $('.head-2').click(function() {
            var v = $(this).data('child');
            $(v).prop('checked', this.checked);
        });
    </script>
@endsection
