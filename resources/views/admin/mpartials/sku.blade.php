{{-- <table class="table table-bordered">
    <thead>
       <tr>
          <td class="text-center">
             <label for="" class="control-label">Variant</label>
          </td>
          <td class="text-center">
             <label for="" class="control-label">Variant Price</label>
          </td>
          <td class="text-center">
             <label for="" class="control-label">SKU</label>
          </td>
          <td class="text-center">
             <label for="" class="control-label">Quantity</label>
          </td>
       </tr>
    </thead>
    <tbody>
@foreach ($products as $product )


<tr>
    <td>
       <label for="" class="control-label">{{ $product->name }}</label>
    </td>

    <td>


    </td>
    <td>

    </td>
    <td>

    </td>
 </tr>

@endforeach
</tbody>
</table> --}}


{{
print_r(combinations($options))}}
