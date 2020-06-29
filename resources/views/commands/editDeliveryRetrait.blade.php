@extends('template_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/editDelivery.css') }}" />

@endsection

@section('content')

    <div class="command-steps">
        <h3 class="current-step">1 LIVRAISON</h3>
        <h1 class="off-step">2 PAIEMENT</h1>
        <h3 class="off-step">3 VERIFICATION</h3>
    </div>
    <hr class="little-hr">

    <section>
    <form class="global-body" action="{{ route('commands.updateWithDeliveryRetrait', $command) }}" method="POST" >
        @csrf


        <div class="create-address">

            <div class="title-group">
                <h2 class="title">Adresse de livraison</h2>
                <hr class="under-title">
            </div>

            <div class="choice">

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
            </div>




        <div class="addresse-infos">
                    <!--<div class="panel-heading">-->
                        <h3 class="title">Entrez votre ville pour sélectionner votre adresse de livraison </h3>
                    <!--</div>-->
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" class="form-controller" id="search" name="search"></input>
                        </div>

                        <table >

                            <tbody class="list-address">
                            </tbody>
                        </table>

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


        </div>
        </div>
        <div class="recap-div">

            <h2 class="sec-title">Récapitulatif de la commande</h2>
            <div class="global-infos-div">
                <p class="global-infos">Sous-total :</p><p class="global-infos">{{$command->total}} € </p>
            </div>
            <div class="global-infos-div">
                <p class="global-infos">Livraison :</p><p class="global-infos">{{$goodDelivery->price}} €</p>
            </div>
            <hr class="recap-hr">
            <div class="global-infos-div">
                <p class="global-infos">TOTAL :</p><p class="global-infos">{{$command->total + $goodDelivery->price}} €</p>
            </div>

            <input type="hidden" name="total" value="{{$command->total + $goodDelivery->price}}">
            <button class="submit-button"> Continuer </button>

        </div>

    </form>
</section>



@endsection


