<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><title>Invoice</title></head>


<table aria-labelledby="item-invoice">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Preço</th>
    </tr>
    @foreach ($data as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ $item['price']*$item['quantity'] }}€</td>
        </tr>
    @endforeach
    <tr>
        <br><br><br><br><br><br><br>
    </tr>
    <tr>
        <td colspan="3">Total: {{$value}}€</td>
        <?php
        $date=date('d-m-Y H:i');
        ?>
        <br>
        <tr><td>{{$date}}</td></tr>
    </tr>
</table>

</html>
