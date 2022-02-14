@extends('layouts.app')

@section('content')


    <div class="col-md-12 mt-5 text-center">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>Welcome</h1>
        <p class="mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam exercitationem minus iste, quia
            vel
            sunt tempore perferendis nesciunt necessitatibus voluptatem impedit eum obcaecati? Quisquam quasi saepe
            iste ea, nisi tenetur!</p>
    </div>




@endsection
