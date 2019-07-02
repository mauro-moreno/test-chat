@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Update an answer</h1>
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
                <form method="post" action="{{ route('answers.update', $answer->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="language_id">Language:</label>
                        <select type="text" class="form-control" name="language_id" id="language_id">
                            @foreach($languages as $language)
                                <option {{ $language->id === $answer->language_id ? 'selected' : '' }}
                                        value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" class="form-control" name="question" maxlength="100" id="question"
                               value="{{ $answer->question }}"/>
                    </div>

                    <div class="form-group">
                        <label for="answer">Answer:</label>
                        <textarea type="text" class="form-control" name="answer"
                                  id="answer">{{ $answer->answer }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="action">Action:</label>
                        <select type="text" class="form-control" name="action" id="action">
                            @foreach($actions as $key => $action)
                                <option value="{{ $key }}"
                                    {{ $key === $answer->action ? 'selected' : '' }}>{{ $action }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="parameter">Action parameter:</label>
                        <input type="text" class="form-control" name="parameter" maxlength="100" id="parameter"
                               value="{{ $answer->parameter }}"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Update answer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
