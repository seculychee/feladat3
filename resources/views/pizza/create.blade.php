
{{-- Új pizza felvétele modal--}}
<div class="ui modal" id="new_pizza">
    <i class="close icon"></i>
    <div class="header">
        Pizza felvitele
    </div>

    <div class="content">
        <form class="ui form" action="{{route('admin_pizza.newpizza')}}" method="post">
            {{--      {{method_field('PUT')}}--}}
            {{ csrf_field() }}
            <div class="field">
                <label>Pizza neve</label>
                <input type="text" name="name" placeholder="Pizza neve">
            </div>
            <div class="field">
                <label>Ár</label>
                <input type="number" name="price" placeholder="Ár">
            </div>
            <div class="field">
                <label>Leírás</label>
                <textarea name="desc"></textarea>
            </div>

            <div class="ui black deny button">
                Mégse
            </div>
            <button type="submit" class="ui positive right labeled icon button">
                Mentés
                <i class="checkmark icon"></i>
            </button>
        </form>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $( "#pizza_new" ).click(function() {
            $('#new_pizza')
                    .modal('show')
            ;
        });
    });
    $('.ui.form')
            .form({
                fields: {
                    name: {
                        identifier: 'name',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Adja meg a pizza nevét!'
                            }
                        ]
                    },
                    price: {
                        identifier: 'price',
                        rules: [
                            {
                                type   : 'empty',
                                prompt : 'Adja meg az árat!'
                            }
                        ]
                    },
                }
            })
    ;
</script>