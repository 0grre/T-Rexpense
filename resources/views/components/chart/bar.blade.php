<canvas id="chartBar"></canvas>

<!-- Chart bar -->
<script>
    {{--const chart_data = JSON.parse({{ $test }});--}}
    const chart_data = [0, 10, 5, 2, 20, 30, 45];
    const labelsBarChart = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
    ];
    const dataBarChart = {
        labels: labelsBarChart,
        datasets: [
            {
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: chart_data,
            },
        ],
    };

    const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {},
    };

    let chartBar = new Chart(
        document.getElementById("chartBar"),
        configBarChart
    );
</script>
