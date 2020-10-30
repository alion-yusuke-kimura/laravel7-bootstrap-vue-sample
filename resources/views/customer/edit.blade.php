@extends('layouts.app')

@section('content')
<div class="container">
    {{ Breadcrumbs::render('edit',$customer) }}
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

                    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">顧客コード</label>
                            <div class="col-sm-6">
                                <input type="text" class="col-sm-6 form-control" name="code" value="{{ old('code', $customer->code) }}" placeholder="顧客コード" required>
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('code') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">顧客名</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $customer->name) }}" placeholder="顧客名" required>
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">顧客名（カナ）</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name_kana" name="name_kana" value="{{ old('name_kana', $customer->name_kana) }}" placeholder="顧客名（カナ）">
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('name_kana') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">郵便番号</label>
                            <div class="col-sm-6">
                                <input type="text" class="col-sm-6 form-control" name="zip_code" value="{{ old('zip_code', $customer->zip_code) }}" placeholder="郵便番号">
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('zip_code') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">住所</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address', $customer->address) }}" placeholder="住所">
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('address') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">建物名</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="building_name" value="{{ old('building_name', $customer->building_name) }}" placeholder="建物名">
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('building_name') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">TEL</label>
                            <div class="col-sm-6">
                                <input type="text" class="col-sm-6 form-control" name="tel" value="{{ old('tel', $customer->tel) }}" placeholder="TEL">
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('tel') }}</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">FAX</label>
                            <div class="col-sm-6">
                                <input type="text" class="col-sm-6 form-control" name="fax" value="{{ old('fax', $customer->fax) }}" placeholder="FAX">
                            </div>
                            <span class="col-sm-3 help-block">{{ $errors->first('fax') }}</span>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="col-sm-3 btn btn-primary">更新</button>
                                <button class="col-sm-3 btn btn-primary" onclick="history.back()">戻る</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
