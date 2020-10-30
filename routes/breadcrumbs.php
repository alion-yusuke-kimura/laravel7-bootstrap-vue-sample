<?php
    //ホーム
    Breadcrumbs::for('customer', function ($trail) {
        $trail->push('一覧', url('customer/'));
    });

    //ホーム > 作成
    Breadcrumbs::for('create', function ($trail) {
        $trail->parent('customer');
        $trail->push('作成', url('customer/create'));
    });

    //ホーム >　ユーザ名
    Breadcrumbs::for('show', function ($trail,$customer) {
        $trail->parent('customer');
        $trail->push($customer->name, url('customer/' .$customer->id));
    });

    //ホーム >　ユーザ名　>　編集
    Breadcrumbs::for('edit', function ($trail,$customer) {
        $trail->parent('show',$customer);
        $trail->push('編集', url('customer/' .$customer->id));
    });

    Breadcrumbs::for('search', function ($trail) {
        $trail->push('検索', url('customer/search'));
    });
