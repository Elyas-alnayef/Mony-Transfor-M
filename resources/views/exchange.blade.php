<x-app>
    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="content">
        <div class="container mt-5">
            <h2 class="mb-4">Currency Exchange Rates</h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Currency Code</th>
                            <th scope="col">Exchange Rate (to USD)</th>
                        </tr>
                    </thead>
                    <tbody id="exchangeRateTableBody">
                        <!-- Data will be dynamically inserted here using JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            // Replace this with your actual API endpoint for currency exchange rates
            const apiUrl = 'https://v6.exchangerate-api.com/v6/ed64762217edb2dad1f1efc9/latest/USD';

            // Fetch exchange rates from the API
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const exchangeRateTableBody = document.getElementById('exchangeRateTableBody');

                    // Loop through the data and populate the table
                    for (const currency in data.conversion_rates) {
                        const exchangeRate = data.conversion_rates[currency];
                        const row = `<tr><td>${currency}</td><td>${exchangeRate}</td></tr>`;
                        exchangeRateTableBody.innerHTML += row;
                    }
                })
                .catch(error => console.error('Error fetching exchange rates:', error));
        </script>

        <!-- Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </x-slot>
</x-app>
