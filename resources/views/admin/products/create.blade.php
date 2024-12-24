@extends('admin.index')
@section('title', 'Thêm sản phẩm')
@can('nvkho')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block col-lg-8">
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name"
                                        placeholder="Tên sản phẩm" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Tên danh mục</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="category_id" id="selectSm" class="form-control-sm form-control">
                                        <option value="0">Chọn --</option>
                                        @foreach ($data as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>                                                
                                        @endforeach                                            
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số lượng</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="text-input" name="quantity" placeholder="Số lượng sản phẩm" class="form-control" value="{{ old('quantity') }}"></div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh sản phẩm</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá sản phẩm</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="price"
                                        placeholder="" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                                <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Trạng thái</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="inline-checkbox1" name="status"
                                            {{ old('status') == 'on' ? 'checked' : '' }} class="form-check-input "
                                            >
                                            Kích hoạt
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@endcan