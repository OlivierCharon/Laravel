@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                    You will be redirected to the home page in a few moment...
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    setTimeout(function (){
        window.location.href = "{{ route('welcome') }}";
    }, 3000)
</script>
@endsection
