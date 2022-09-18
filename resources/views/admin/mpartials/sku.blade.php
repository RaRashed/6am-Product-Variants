
   <table class="table table-bordered">
      <thead>
         <tr>
            <td class="text-center">
               <label for="" class="control-label">Name</label>
            </td>
            <td class="text-center">
               <label for="" class="control-label">Code</label>
            </td>

         </tr>
      </thead>
      <tbody>
@foreach ($products as $product )

@endforeach
         <tr>

            <td>
             {{$product->name}}
            </td>
            <td>
              {{ $product->code }}

         </tr>

   </tbody>
</table>
