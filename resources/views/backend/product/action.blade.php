<div class="d-flex order-actions">
    <a href="{{route('admin.product.show', $model)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
    <a href="{{route('admin.product.edit', $model)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
    <a href="{{route('admin.product.destroy', $model)}}" class="btn btn-sm btn-danger mr-1"  data-table="product-table"><i class="fas fa-trash"></i></a>
</div>
