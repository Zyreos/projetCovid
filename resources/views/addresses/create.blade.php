
@section('create')


        <h1 class="t1">Création d'une address</h1>
<form action="{{route('addresses.store')}}" method="POST" >
    @csrf
    <div>
        <input type="text" name="address1"  placeholder="Addresse 1">
    </div>
    <div>
        <input type="text" name="address2" placeholder="Addresse 2">
    </div>
    <div>
        <input type="number" name="postcode" placeholder="Code postal">
    </div>
    <div>
        <input type="text" name="city" placeholder="Ville">
    </div>
    <div>
        <input type="text" name="country" placeholder="Pays">
    </div>
    <button type="submit"> Ajouter </button>
</form>
@endsection
