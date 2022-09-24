@extends('admin.layouts.mmaster')
@section('content')

    <h1>multi language</h1>
   <div>
       Langauge : <select onchange="changeLanguage(this.value)" >
           <option {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">English</option>
           <option {{session()->has('lang_code')?(session()->get('lang_code')=='fr'?'selected':''):''}} value="fr">urdu</option>
           <option {{session()->has('lang_code')?(session()->get('lang_code')=='bn'?'selected':''):''}} value="bn">Bangla</option>
       </select>
   </div>

   <h2>{{__("messages.product_name")}}</h2>



@endsection

@section('scripts')

<script>

    function changeLanguage(lang){
        window.location='{{url("change-language")}}/'+lang;
    }
    </script>

@endsection
