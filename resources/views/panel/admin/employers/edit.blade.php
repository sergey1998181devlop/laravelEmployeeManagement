@extends('layouts.app')

@section('content')
    <div class="container">
        @php /** @var \App\Models\BlogCategory $item */ @endphp
        @include('panel.admin.employers.includes.result_messages')
        @if($item->exists)
{{--            Обновление статьи--}}
            <form method="POST" action="{{ route('panel.admin.employers.update' , $item->id) }}">
                @method('PATCH')
        @else
{{--            Добавление новой статьи--}}
            <form method="POST" action="{{ route('panel.admin.employers.store' ) }}">
        @endif
            @csrf
            @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('panel.admin.employers.includes.employer_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('panel.admin.employers.includes.employer_edit_add_col')
                    </div>
                </div>
            </div>
        </form>

      </form>
@endsection
