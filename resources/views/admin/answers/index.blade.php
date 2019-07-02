@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="col-sm-12">
            <h1 class="display-3">Answers</h1>
            <div class="mb-3">
                <a href="{{ route('answers.create')}}" class="btn btn-primary">New answer</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td class="d-none d-sm-table-cell">ID</td>
                        <td>Language</td>
                        <td>Question</td>
                        <td class="d-none d-sm-table-cell">Action</td>
                        <td colspan="2" style="width: 10%">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($answers as $answer)
                        <tr>
                            <td class="d-none d-sm-table-cell">{{ $answer->id }}</td>
                            <td>{{ $answer->language_id }}</td>
                            <td>{{ $answer->question }}</td>
                            <td class="d-none d-sm-table-cell">{{ $answer->action }}</td>
                            <td>
                                <a href="{{ route('answers.edit', $answer->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('answers.destroy', $answer->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
