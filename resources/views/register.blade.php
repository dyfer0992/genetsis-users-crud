<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .container {
                height: 100vh;
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .alert {
                width: 60%;
            }

            form {
                width: 80%;
            }

            .buttons {
                display: flex;
                justify-content: center;
            }

            .buttons button {
                width: 80%;
            }

            .preferences .form-check {
                margin-left: 15px;
            }

            .form-check-label {
                cursor: pointer;
            }

        </style>
    </head>
    <body>


        <div class="container">

            <h1>{{ __('form.header.users') }}</h1>

            @if(session()->has('errors'))
                <div class="alert alert-danger">
                    <ul>
                    @foreach (json_decode($errors, true) as $errorsForField)
                        @foreach ($errorsForField as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form method="post" action="{{ route('store') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name">{{ __('form.fields.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', '') }}">
                </div>
                <div class="form-group">
                    <label for="name">{{ __('form.fields.surname') }}</label>
                    <input type="text" class="form-control" id="surname" name="surname" required value="{{ old('surname', '') }}">
                </div>
                <div class="form-group">
                    <label for="name">{{ __('form.fields.address') }}</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', '') }}">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('form.fields.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', '') }}">
                </div>


                <div class="form-group">
                    <label for="province_id">{{ __('form.fields.province') }}</label>
                    <select class="form-control" id="province_id" name="province_id" required>
                        <option value="" selected>- {{ __('form.actions.choose-province') }} -</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id_provincia }}"
                                @if(old('province_id') == $province->id_provincia) selected @endif
                            >{{ $province->provincia }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="gender">{{ __('form.fields.gender') }}</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="" selected>- {{ __('form.actions.choose-gender') }} -</option>
                        <option value="male"
                                @if(old('gender') == 'male') selected @endif
                        >Hombre</option>
                        <option value="female"
                                @if(old('gender') == 'female') selected @endif
                        >Mujer</option>
                    </select>
                </div>

                <div class="preferences">
                    <span>{{ __('form.actions.choose-preferences') }}</span>
                    @foreach ($preferences as $preference)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $preference->preference_id }}" id="preference-{{ $preference->preference_id }}" name="preferences[]">
                            <label class="form-check-label" for="preference-{{ $preference->preference_id }}">
                                {{ $preference->preferencia }}
                            </label>
                        </div>
                    @endforeach
                </div>



                <div class="buttons">

                    <button type="submit" class="btn btn-primary">{{ __('form.actions.register') }}</button>
                </div>
            </form>
        </div>
    </body>
</html>
