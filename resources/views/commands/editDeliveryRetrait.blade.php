@extends('template_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>1 LIVRAISON</h1>
    <h3>2 PAIEMENT</h3>
    <h3>3 VERIFICATION</h3>

    <h2>Adresse de livraison</h2>
    <hr>
    <section>
    <form action="{{ route('commands.updateWithDeliveryRetrait', $command) }}" method="POST" >
        @csrf

            <input type="radio" name="mode" id="chk1">
            <label>Livraison à Domicile</label>

            <input type="radio" name="delivery_id" value="{{$goodDelivery->id}}" id="chk2" checked>
            <label>Livraison en Retrait</label>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#chk1').click(function(){
                    window.location.href = "{{ route('commands.editDelivery', [$command->id])}}";
                });
            });
        </script>
        <hr>


        <div>
            <h2>Récapitulatif de la commande</h2>

            <p>Sous-total : {{$command->total}} € </p>
            <p>Livraison : {{$goodDelivery->price}}€</p>

            <input type="hidden" name="price" value="10">

            <hr>
            <p>TOTAL : {{$command->total + $goodDelivery->price}} €</p>

            <input type="hidden" name="total" value="{{$command->total + $goodDelivery->price}}">
            <button type="submit"> Continuer </button>
        </div>


        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Addresses info </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-controller" id="search" name="search"></input>
                        </div>
                        <table class="table table-bordered table-hover">

                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{ route('search')}}',
                    data:{'search':$value},
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
        </script>
        <script type="text/javascript">
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>

        <div class="recap_div">

            <h2 class="sec_title">Récapitulatif de la commande</h2>
            <div class="global_infos_div">
                <p class="global_infos">Sous-total :</p><p class="global_infos">{{$command->total}} € </p>
            </div>
            <div class="global_infos_div">
                <p class="global_infos">Livraison :</p><p class="global_infos">{{$goodDelivery->price}}€</p>
            </div>
            <hr class="recap_hr">
            <div class="global_infos_div">
                <p class="global_infos">TOTAL :</p><p class="global_infos">{{$command->total + $goodDelivery->price}} €</p>
            </div>

            <input type="hidden" name="total" value="{{$command->total + $goodDelivery->price}}">
            <button class="submit_button" type="submit"> CONTINUER </button>

        </div>

    </form>
</section>



@endsection


