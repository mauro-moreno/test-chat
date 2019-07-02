@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Update a language</h1>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                </div>
                <form method="post" action="{{ route('languages.update', $language->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control" name="id" maxlength="2" value="{{ $language->id }}"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" maxlength="100" value="{{ $language->name }}"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Update language</button>
                </form>
            </div>
        </div>
    </div>
@endsection
