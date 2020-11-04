@extends('layouts.app')

@section('content')
<div class="container">
    {{ Breadcrumbs::render('show',$guest) }}
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

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">顧客コード</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->code }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">顧客名</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->name }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">顧客名（カナ）</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->name_kana }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">郵便番号</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->zip_code }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">住所</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->address }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">建物名</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->building_name }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">TEL</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->tel }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">FAX</label>
                        <div class="col-sm-9 col-form-label">{{ $guest->fax }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="col-sm-3 btn btn-primary" onclick="location.href='{{ route('guest.edit', $guest->id) }}'">編集</button>
                            <button class="col-sm-3 btn btn-primary" onclick="history.back()">戻る</button>
                            <form action="{{ route('guest.destroy', $guest->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="col-sm-3 btn btn-danger">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
