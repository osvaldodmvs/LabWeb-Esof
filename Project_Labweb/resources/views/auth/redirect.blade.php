@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->is_admin)
                    {{ __('Welcome, ') }}
                    {{ Auth::user()->name }}
                    @else
                    {{ __('You are logged in!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- redirect to home page after login after 1 second-->
<script>
    setTimeout(function(){
        window.location.href = "{{ url('/') }}";
    }, 2000);
</script>

@endsection
