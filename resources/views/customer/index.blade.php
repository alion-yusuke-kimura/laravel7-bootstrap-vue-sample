@extends('layouts.app')

@section('content')
<div class="container">
    {{ Breadcrumbs::render('customer') }}
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">検索条件</div>
                {{-- <div class="card-body">
                    <div class="search">
                        {{ Form::open(['method' => 'GET']) }}
                        {{ Form::input('text','code' ,'', null) }}
                        {{ Form::input('text','name', '', null) }}
                        {{ Form::close() }}
                    </div>
                </div> --}}
                <form method="get" action="{{ route('customer.search') }}" >
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>顧客ID:</th>
                                <td><input type="text" name="code"></td>
                            </tr>
                            <tr>
                                <th>顧客名:</th>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <a class="btn btn-primary" href="{{ route('customer.index') }}">解除</a>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="col-sm-3 btn btn-primary">検索</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ route('customer.create') }}">Create</a>
                    <table class="table table-striped" >
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">@sortablelink('id','ID')</th>
                                <th scope="col">@sortablelink('code','顧客コード')</th>
                                <th scope="col">@sortablelink('name','顧客名')</th>
                                <th scope="col">@sortablelink('name_kana','顧客名（カナ）')</th>
                                <th scope="col">@sortablelink('zip_code','郵便番号')</th>
                                <th scope="col">@sortablelink('address','住所')</th>
                                <th scope="col">@sortablelink('building_name','建物名')</th>
                                <th scope="col">@sortablelink('tel','TEL')</th>
                                <th scope="col">@sortablelink('fax','FAX')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td><a href="{{ route('customer.show', $customer->id) }}">{{ $customer->id }}</a></td>
                                <td>{{ $customer->code }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->name_kana }}</td>
                                <td>
                                    @isset($customer->zip_code)
                                        {{  substr($customer->zip_code,0,3) . "-" . substr($customer->zip_code,3,4) }}
                                    @endisset
                                </td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->building_name }}</td>
                                <td>{{ $customer->tel }}</td>
                                <td>{{ $customer->fax }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $customers ->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

