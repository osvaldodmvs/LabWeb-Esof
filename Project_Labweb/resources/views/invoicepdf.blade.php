<h1>Invoice</h1>

<table>
    <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    @foreach ($data['items'] as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ $item['price'] }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2">Total</td>
        <td>{{ $data['total'] }}</td>
    </tr>
</table>