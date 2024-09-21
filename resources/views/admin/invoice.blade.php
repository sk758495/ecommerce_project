<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.invoice-container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.invoice-header {
    text-align: center;
    margin-bottom: 20px;
}

.invoice-header h1 {
    margin: 0;
    color: #333;
}

.customer-info,
.company-info {
    margin-bottom: 20px;
}

.customer-info h2,
.company-info h2 {
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table,
th,
td {
    border: 1px solid #ddd;
}

th,
td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

.product-image {
    max-width: 100px;
    height: auto;
}
    </style>
</head>
<body>
    <div class="invoice-container">
        <header class="invoice-header">
            <h1>Invoice</h1>
        </header>

        <section class="customer-info">
            <h2>Customer Information</h2>
            <p><strong>Name:</strong>{{ $data->name }}</p>
            <p><strong>Phone:</strong> {{ $data->phone }}</p>
            <p><strong>Address:</strong> {{ $data->rec_address }}</p>
        </section>

        <section class="invoice-details">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->product->title }}</td>
                        <td>{{ $data->product->price }}</td>
                        <td>1</td>
                        <td><img src="products/{{ $data->product->image }}" alt="Product 1" class="product-image"></td>
                    </tr>
                    
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </section>

        <footer class="company-info">
            <h2>Company Information</h2>
            <p><strong>Company Name:</strong> XYZ Corporation</p>
            <p><strong>Address:</strong> Vadodara Gujarat , India</p>
            <p><strong>Mobile:</strong> (+91) 98988569854</p>
        </footer>
    </div>
</body>
</html>
